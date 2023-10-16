<?php

namespace RavenDB\Tests\queries;

use PHPUnit\Framework\TestCase;
use RavenDB\Demo\queries\filteringResultsBasics\FilteringResultsBasics;
use RavenDB\Demo\queries\filteringResultsMultipleConditions\FilteringResultsMultipleConditions;
use RavenDB\Demo\queries\fullCollectionQuery\FullCollectionQuery;
use RavenDB\Demo\queries\pagingQueryResults\PagingQueryResults;
use RavenDB\Demo\queries\projectingIndividualFields\ProjectingIndividualFields;
use RavenDB\Demo\queries\projectingUsingFunctions\ProjectingUsingFunctions;
use RavenDB\Demo\queries\queryByDocumentId\QueryByDocumentId;
use RavenDB\Demo\queries\queryExample\QueryExample;
use RavenDB\Demo\queries\sortingQueryResults\SortingQueryResults;

class QueriesTest extends TestCase
{
    public function testQueryExample(): void
    {
        $employees = (new QueryExample())();

        $this->assertNotNull($employees);
        $this->assertCount(5, $employees);
        $this->assertNotNull($employees[0]->getFirstName());
    }

    public function testFullCollectionQuery(): void
    {
        $companies = (new FullCollectionQuery())();

        $this->assertNotNull($companies);
        $this->assertCount(91, $companies);
        $this->assertNotNull($companies[0]->getName());
    }

    public function testQueryByDocumentId(): void
    {
        $runParams = new \RavenDB\Demo\queries\queryByDocumentId\RunParams();
        $runParams->setEmployeeDocumentId("employees/1-A");

        $employee = (new QueryByDocumentId())($runParams);

        $this->assertNotNull($employee);
        $this->assertNotNull($employee->getLastName());
    }

    public function testFilteringResultsBasics(): void
    {
        $employees = (new FilteringResultsBasics())();

        $this->assertNotNull($employees);
        $this->assertCount(1, $employees);
        $this->assertNotNull("Anne", $employees[0]->getFirstName());
    }

    public function atestFilteringResultsMultipleConditions(): void
    {
        $runParams = new \RavenDB\Demo\queries\filteringResultsMultipleConditions\RunParams();
        $runParams->setCountry("USA");

        $employees = (new FilteringResultsMultipleConditions())($runParams);

        $this->assertNotNull($employees);
        $this->assertCount(3, $employees);
        $this->assertEquals("Anne", $employees[0]->getFirstName());
    }

    public function testProjectingUsingFunctions(): void
    {
        $details = (new ProjectingUsingFunctions())();

        $this->assertNotNull($details);
        $this->assertCount(9, $details);

        $this->assertNotNull($details[0]->getTitle());
        $this->assertNotNull($details[0]->getFullName());
    }

    public function testProjectingIndividualFields(): void
    {
        $details = (new ProjectingIndividualFields())();

        $this->assertNotNull($details);
        $this->assertCount(91, $details);

        $this->assertNotNull($details[0]->getCity());
        $this->assertNotNull($details[0]->getCompanyName());
        $this->assertNotNull($details[0]->getCountry());
    }

    public function testSortingQueryResults(): void
    {
        $runParams = new \RavenDB\Demo\queries\sortingQueryResults\RunParams();
        $runParams->setNumberOfUnits(20);

        $products = (new SortingQueryResults())($runParams);

        $this->assertNotNull($products);
        $this->assertCount(19, $products);
        $this->assertNotNull($products[0]->getName());
    }

    public function testPagingQueryResults(): void
    {
        $runParams = new \RavenDB\Demo\queries\pagingQueryResults\RunParams();
        $runParams->setResultsToSkip(10);
        $runParams->setResultsToTake(5);

        $companies = (new PagingQueryResults())($runParams);

        $this->assertNotNull($companies);
        $this->assertCount(5, $companies);
        $this->assertNotNull($companies[0]->getName());
    }
}