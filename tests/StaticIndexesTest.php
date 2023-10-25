<?php

namespace RavenDB\Tests;

use RavenDB\Demo\common\DocumentStoreHolder;
use RavenDB\Demo\staticIndexes\additionalSourcesIndex\AdditionalSourcesIndex;
use RavenDB\Demo\staticIndexes\additionalSourcesIndex\Products_ByPrice;
use RavenDB\Demo\staticIndexes\fanoutIndex\FanoutIndex;
use RavenDB\Demo\staticIndexes\fanoutIndex\Orders_ByProductDetails;
use RavenDB\Demo\staticIndexes\mapIndex\Employees_ImportantDetails;
use RavenDB\Demo\staticIndexes\mapIndex\MapIndex;
use RavenDB\Demo\staticIndexes\mapReduceIndex\Employees_ByCountry;
use RavenDB\Demo\staticIndexes\mapReduceIndex\MapReduceIndex;
use RavenDB\Demo\staticIndexes\projectIndexResults\Employees_ByWorkPeriod;
use RavenDB\Demo\staticIndexes\projectIndexResults\ProjectIndexResults;
use RavenDB\Demo\staticIndexes\storeFieldsInIndex\OrdersQuantity_ByCompany;
use RavenDB\Demo\staticIndexes\storeFieldsInIndex\StoreFieldsInIndex;
use RavenDB\Tests\driver\RavenTestDriver;

class StaticIndexesTest extends RavenTestDriver
{
    public function testAdditionalSourcesIndex(): void
    {
        DocumentStoreHolder::getStore()->executeIndex(new Products_ByPrice());
        $this->waitForIndexing(DocumentStoreHolder::getStore());

        $results = (new AdditionalSourcesIndex())(new \RavenDB\Demo\staticIndexes\additionalSourcesIndex\RunParams());

        $this->assertCount(3, $results);
        $this->assertEquals(2.5, $results[0]->getOriginalPrice(), 0);
    }

    public function testMapIndex(): void
    {
        $runParams = new \RavenDB\Demo\staticIndexes\mapIndex\RunParams();
        $runParams->setStartYear(1993);

        DocumentStoreHolder::getStore()->executeIndex(new Employees_ImportantDetails());
        $this->waitForIndexing(DocumentStoreHolder::getStore());

        $employees = (new MapIndex())($runParams);

        $this->assertCount(1, $employees);
        $this->assertEquals("employees/8-A", $employees[0]->getId());
    }

    public function testMapReduceIndex(): void
    {
        $runParams = new \RavenDB\Demo\staticIndexes\mapReduceIndex\RunParams();
        $runParams->setCountry("USA");

        DocumentStoreHolder::getStore()->executeIndex(new Employees_ByCountry());
        $this->waitForIndexing(DocumentStoreHolder::getStore());

        $numberOfEmployees = (new MapReduceIndex())($runParams);

        $this->assertEquals(5, $numberOfEmployees);
    }

    public function testProjectIndexResults(): void
    {
        DocumentStoreHolder::getStore()->executeIndex(new Employees_ByWorkPeriod());
        $this->waitForIndexing(DocumentStoreHolder::getStore());

        $params = new \RavenDB\Demo\staticIndexes\projectIndexResults\RunParams();
        $params->setStartYear(1993);

        $result = (new ProjectIndexResults())($params);

        $this->assertCount(3, $result);
        $this->assertNotNull($result[0]->getFirstName());
    }

    public function testStoreFieldsInIndex(): void
    {
        DocumentStoreHolder::getStore()->executeIndex(new OrdersQuantity_ByCompany());
        $this->waitForIndexing(DocumentStoreHolder::getStore());

        $runParams = new \RavenDB\Demo\staticIndexes\storeFieldsInIndex\RunParams();
        $runParams->setCompanyId("companies/1-A");

        $orders = (new StoreFieldsInIndex())($runParams);

        $this->assertCount(6, $orders);
        $this->assertNotNull($orders[0]->getOrderedAt());
    }

    public function testFanoutIndex(): void
    {
        $runParams = new \RavenDB\Demo\staticIndexes\fanoutIndex\RunParams();
        $runParams->setNamePrefix("Chocolade");

        DocumentStoreHolder::getStore()->executeIndex(new Orders_ByProductDetails());
        $this->waitForIndexing(DocumentStoreHolder::getStore());

        $orders = (new FanoutIndex())($runParams);

        $this->assertCount(6, $orders);
        $this->assertNotNull($orders[0]->getCompany());
    }
}