<?php

namespace RavenDB\Tests\spatialIndexes;

use RavenDB\Demo\common\DocumentStoreHolder;
use RavenDB\Demo\spatial\spatialIndex\Companies_ByLocation;
use RavenDB\Demo\spatial\spatialIndex\SpatialIndex;
use RavenDB\Demo\spatial\spatialQuery\SpatialQuery;
use RavenDB\Tests\RavenTestDriver;

class SpatialIndexesTest extends RavenTestDriver
{
    public function testSpatialIndex(): void
    {
        DocumentStoreHolder::getStore()->executeIndex(new Companies_ByLocation());
        $this->waitForIndexing(DocumentStoreHolder::getStore());

        $companies = (new SpatialIndex())();

        $this->assertCount(4, $companies);
        $this->assertNotNull($companies[0]->getName());
    }

    public function testSpatialQuery(): void
    {
        $runParams = new \RavenDB\Demo\spatial\spatialQuery\RunParams();
        $runParams->setRadius(2);

        $results = (new SpatialQuery())($runParams);

        $this->assertCount(2, $results);
        $this->assertNotNull($results[0]->getEmployeeName());
    }
}