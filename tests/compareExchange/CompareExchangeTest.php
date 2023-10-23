<?php

namespace RavenDB\Tests\compareExchange;

use RavenDB\Demo\common\DocumentStoreHolder;
use RavenDB\Demo\compareExchange\createCompareExchange\CreateCompareExchange;
use RavenDB\Demo\compareExchange\indexCompareExchange\IndexCompareExchange;
use RavenDB\Demo\compareExchange\indexCompareExchange\Products_ByUnitsInStock;
use RavenDB\Tests\RavenTestDriver;

class CompareExchangeTest extends RavenTestDriver
{
    public function testCreateCompareExchange(): void
    {
        $runParams = new \RavenDB\Demo\compareExchange\createCompareExchange\RunParams();
        $result = (new CreateCompareExchange())($runParams);

        $this->assertNotNull($result);
    }

    public function testIndexCompareExchange(): void
    {
        DocumentStoreHolder::getStore()->executeIndex(new Products_ByUnitsInStock());
        $this->waitForIndexing(DocumentStoreHolder::getStore());

        $runParams = new \RavenDB\Demo\compareExchange\indexCompareExchange\RunParams();
        $runParams->setMinValue(25);

        $products = (new IndexCompareExchange())($runParams);

        $this->assertCount(7, $products);
        $this->assertNotNull($products[0]->getName());
    }
}