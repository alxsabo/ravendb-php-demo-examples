<?php

namespace RavenDB\Tests;

use PHPUnit\Framework\TestCase;
use RavenDB\Constants\DocumentsIndexing;
use RavenDB\Documents\DocumentStoreInterface;
use RavenDB\Documents\Indexes\IndexErrors;
use RavenDB\Documents\Indexes\IndexErrorsArray;
use RavenDB\Documents\Operations\DatabaseStatistics;
use RavenDB\Documents\Operations\GetStatisticsOperation;
use RavenDB\Documents\Operations\Indexes\GetIndexErrorsOperation;
use RavenDB\Documents\Operations\IndexInformation;
use RavenDB\Exceptions\TimeoutException;
use RavenDB\Type\Duration;
use RavenDB\Utils\Stopwatch;

class RavenTestDriver extends TestCase
{
    public static function waitForIndexing(
        DocumentStoreInterface $store,
        ?string $database = null,
        ?\DateInterval $timeout = null,
        ?string $nodeTag = null
    ): void {
        $admin = $store->maintenance()->forDatabase($database);

        if ($timeout == null) {
            $timeout = Duration::ofMinutes(1);
        }

        $sp = Stopwatch::createStarted();

        while ($sp->elapsedInMillis() < $timeout->toMillis()) {

            /** @var DatabaseStatistics $databaseStatistics */
            $databaseStatistics = $admin->send(new GetStatisticsOperation("wait-for-indexing", $nodeTag));

            $indexes = array_filter(
                $databaseStatistics->getIndexes()->getArrayCopy(),
                function(IndexInformation $index) {
                    return !$index->getState()->isDisabled();
                }
            );

            $indexesAreValid = true;
            $hasError = false;

            /** @var IndexInformation $index */
            foreach ($indexes as $index) {
                if ($index->isStale() || str_starts_with($index->getName(), DocumentsIndexing::SIDE_BY_SIDE_INDEX_NAME_PREFIX)) {
                    $indexesAreValid = false;
                }

                if ($index->getState()->isError()) {
                    $hasError = true;
                }
            }

            if ($hasError) {
                break;
            }

            if ($indexesAreValid) {
                return;
            }

            try {
                usleep(100);
            } catch (\Throwable $e) {
                throw new RuntimeException($e);
            }
        }

        $errors = $admin->send(new GetIndexErrorsOperation());
        $allIndexErrorsText = "";
        $formatIndexErrors = function(IndexErrors $indexErrors): string {
            $errorsListText = implode(PHP_EOL, array_map(function($x) {return '-' . $x->getError();}, $indexErrors->getErrors()->getArrayCopy()));
            return "Index " . $indexErrors->getName() . " (" . count($indexErrors->getErrors()) . " errors): " . PHP_EOL . $errorsListText;
        };
        if (!empty($errors)) {
            $allIndexErrorsText = implode(PHP_EOL, array_map($formatIndexErrors, $errors->getArrayCopy()));
        }

        throw new TimeoutException("The indexes stayed stale for more than " . $timeout->getSeconds() . "." . $allIndexErrorsText);
    }

    public static function waitForIndexingErrors(?DocumentStoreInterface $store, ?Duration $timeout, string ...$indexNames): IndexErrorsArray
    {
        if ($timeout == null) {
            $timeout = Duration::ofSeconds(15);
        }

        $sw = Stopwatch::createStarted();

        while ($sw->elapsed() < $timeout->getSeconds()) {
            /** @var IndexErrorsArray $indexes */
            $indexes = $store->maintenance()->send(new GetIndexErrorsOperation($indexNames));

            /** @var IndexErrors $index */
            foreach ($indexes as $index) {
                if ($index->getErrors() != null && count($index->getErrors()) > 0) {
                    return $indexes;
                }
            }

            usleep(32000);
        }

        throw new TimeoutException("Got no index error for more than " . $timeout->toString());
    }
}