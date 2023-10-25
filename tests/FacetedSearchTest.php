<?php

namespace RavenDB\Tests;

use RavenDB\Demo\common\DocumentStoreHolder;
use RavenDB\Demo\facetedSearch\facetsAggregations\FacetsAggregations;
use RavenDB\Demo\facetedSearch\facetsBasics\FacetsBasics;
use RavenDB\Demo\facetedSearch\facetsFromDocument\FacetsFromDocument;
use RavenDB\Demo\facetedSearch\facetsOptions\FacetsOptions;
use RavenDB\Tests\driver\RavenTestDriver;

class FacetedSearchTest extends RavenTestDriver
{
    public function testFacetsBasic(): void
    {
        DocumentStoreHolder::getStore()->executeIndex(new \RavenDB\Demo\facetedSearch\facetsBasics\Products_ByCategoryAndPrice());
        $this->waitForIndexing(DocumentStoreHolder::getStore());

        $runParams = new \RavenDB\Demo\facetedSearch\facetsBasics\RunParams();
        $facetResults = (new FacetsBasics())($runParams);

        $this->assertNotNull($facetResults);
        $this->assertCount(12, $facetResults);
        $this->assertEquals("Product Category", $facetResults[0]->getFacetName());
    }

    public function testFacetsAggregations(): void
    {
        DocumentStoreHolder::getStore()->executeIndex(new \RavenDB\Demo\facetedSearch\facetsAggregations\Products_ByCategoryPriceAndUnits());
        $this->waitForIndexing(DocumentStoreHolder::getStore());

        $runParams = new \RavenDB\Demo\facetedSearch\facetsAggregations\RunParams();
        $results = (new FacetsAggregations())($runParams);

        $this->assertNotNull($results);
        $this->assertCount(2, $results);
        $this->assertArrayHasKey("CategoryName", $results);
        $this->assertNotNull($results["CategoryName"]);
        $this->assertCount(16, $results["CategoryName"]->getValues());
    }

    public function testFacetsFromDocument(): void
    {
        DocumentStoreHolder::getStore()->executeIndex(new \RavenDB\Demo\facetedSearch\facetsFromDocument\Products_ByCategoryAndPrice());
        $this->waitForIndexing(DocumentStoreHolder::getStore());

        $runParams = new \RavenDB\Demo\facetedSearch\facetsFromDocument\RunParams();
        $results = (new FacetsFromDocument())($runParams);

        $this->assertNotNull($results);
        $this->assertCount(12, $results);
        $this->assertEquals("beverages", $results[0]->getFacetRange());
    }

    public function testFacetsOptions(): void
    {
        DocumentStoreHolder::getStore()->executeIndex(new \RavenDB\Demo\facetedSearch\facetsOptions\Products_ByCategoryAndSupplier());
        $this->waitForIndexing(DocumentStoreHolder::getStore());

        $runParams = new \RavenDB\Demo\facetedSearch\facetsOptions\RunParams();
        $results = (new FacetsOptions())($runParams);

        $this->assertNotNull($results);
        $this->assertCount(2, $results);
        $this->assertEquals(64, $results["Supplier"]->getRemainingHits());
    }
}