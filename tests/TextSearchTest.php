<?php

namespace RavenDB\Tests;

use RavenDB\Demo\common\DocumentStoreHolder;
use RavenDB\Demo\textSearch\fTSQuerySearchBasics\FTSQuerySearchBasics;
use RavenDB\Demo\textSearch\fTSQuerySearchBoosting\FTSQuerySearchBoosting;
use RavenDB\Demo\textSearch\fTSQuerySearchOperators\FTSQuerySearchOperators;
use RavenDB\Demo\textSearch\fTSQuerySearchWildcards\FTSQuerySearchWildcards;
use RavenDB\Demo\textSearch\fTSWithStaticIndexMultipleFields\FTSWithStaticIndexMultipleFields;
use RavenDB\Demo\textSearch\fTSWithStaticIndexSingleField\FTSWithStaticIndexSingleField;
use RavenDB\Demo\textSearch\highlightQueryResultsBasics\HighlightQueryResultsBasics;
use RavenDB\Demo\textSearch\highlightQueryResultsCustomized\HighlightQueryResultsCustomized;
use RavenDB\Demo\textSearch\highlightQueryResultsMapReduce\HighlightQueryResultsMapReduce;
use RavenDB\Tests\driver\RavenTestDriver;

class TextSearchTest extends RavenTestDriver
{
    public function testFTSQuerySearchBasics(): void
    {
        $runParams = new \RavenDB\Demo\textSearch\fTSQuerySearchBasics\RunParams();
        $runParams->setTerm1("Washington");
        $runParams->setTerm2("Colorado");

        $employees = (new FTSQuerySearchBasics())($runParams);

        $this->assertNotNull($employees);
        $this->assertNotNull($employees[0]->getFirstName());
    }

    public function testFTSQuerySearchBoosting(): void
    {
        $runParams = new \RavenDB\Demo\textSearch\fTSQuerySearchBoosting\RunParams();
        $runParams->setBoost1(100);
        $runParams->setBoost2(20);
        $runParams->setBoost3(5);

        $employees = (new FTSQuerySearchBoosting())($runParams);

        $this->assertNotNull($employees);
        $this->assertCount(9, $employees);
        $this->assertNotNull($employees[0]->getFirstName());
    }

    public function testFTSQuerySearchOperators(): void
    {
        $runParams = new \RavenDB\Demo\textSearch\fTSQuerySearchOperators\RunParams();
        $runParams->setTerm1("Spanish");
        $runParams->setTerm2("Portuguese");
        $runParams->setTerm3("Manager");

        $employees = (new FTSQuerySearchOperators())($runParams);

        $this->assertNotNull($employees);
        $this->assertCount(3, $employees);
        $this->assertNotNull($employees[0]->getFirstName());
    }

    public function testFTSQuerySearchWildcards(): void
    {
        $runParams = new \RavenDB\Demo\textSearch\fTSQuerySearchWildcards\RunParams();

        $runParams->setStart("ma");
        $runParams->setEnd("lin");
        $runParams->setMiddle("oliv");
        $runParams->setNumberOfResults(10);

        $fmList = (new FTSQuerySearchWildcards())($runParams);

        $this->assertNotNull($fmList);
        $this->assertCount(10, $fmList);
        $this->assertNotNull($fmList[0]->getArtist());
    }

    public function testFTSWithStaticIndexMultipleFields(): void
    {
        DocumentStoreHolder::getMediaStore()->executeIndex(new \RavenDB\Demo\textSearch\fTSWithStaticIndexMultipleFields\Song_TextData());
        $this->waitForIndexing(DocumentStoreHolder::getStore());

        $runParams = new \RavenDB\Demo\textSearch\fTSWithStaticIndexMultipleFields\RunParams();
        $runParams->setSearchTerm("Floyd");

        $results = (new FTSWithStaticIndexMultipleFields())($runParams);

        $this->assertCount(15, $results);
        $this->assertNotNull($results[0]->getArtist());
    }

    public function testFTSWithStaticIndexSingleField(): void
    {
        DocumentStoreHolder::getStore()->executeIndex(new \RavenDB\Demo\textSearch\fTSWithStaticIndexSingleField\Categories_DescriptionText());
        $this->waitForIndexing(DocumentStoreHolder::getStore());

        $runParams = new \RavenDB\Demo\textSearch\fTSWithStaticIndexSingleField\RunParams();
        $runParams->setSearchTerm("pasta");

        $categories = (new FTSWithStaticIndexSingleField())($runParams);

        $this->assertCount(1, $categories);
        $this->assertNotNull($categories[0]->getName());
    }

    public function testHighlightQueryResultsBasics(): void
    {
        DocumentStoreHolder::getStore()->executeIndex(new \RavenDB\Demo\textSearch\highlightQueryResultsBasics\EmployeesDetails());
        $this->waitForIndexing(DocumentStoreHolder::getStore());

        $runParams = new \RavenDB\Demo\textSearch\highlightQueryResultsBasics\RunParams();

        $runParams->setFragmentLength(50);
        $runParams->setFragmentCount(2);

        $employees = (new HighlightQueryResultsBasics())($runParams);

        $this->assertCount(4, $employees);
        $this->assertNotNull($employees[0]->getFirstName());
    }

    public function testHighlightQueryResultsCustomized(): void
    {
        DocumentStoreHolder::getStore()->executeIndex(new \RavenDB\Demo\textSearch\highlightQueryResultsCustomized\EmployeesDetails());
        $this->waitForIndexing(DocumentStoreHolder::getStore());

        $runParams = new \RavenDB\Demo\textSearch\highlightQueryResultsCustomized\RunParams();
        $results = (new HighlightQueryResultsCustomized())($runParams);

        $this->assertCount(5, $results);
        $this->assertEquals("employees/5-A", $results[0]->getDocumentId());
    }

    public function testHighlightQueryResultsMapReduce(): void
    {
        DocumentStoreHolder::getMediaStore()->executeIndex(new \RavenDB\Demo\textSearch\highlightQueryResultsMapReduce\ArtistsAllSongs());
        $this->waitForIndexing(DocumentStoreHolder::getMediaStore());

        $runParams = new \RavenDB\Demo\textSearch\highlightQueryResultsMapReduce\RunParams();
        $results = (new HighlightQueryResultsMapReduce())($runParams);

        $this->assertCount(13, $results);
        $this->assertEquals("Alicia Keys", $results[0]->getArtist());
    }


}