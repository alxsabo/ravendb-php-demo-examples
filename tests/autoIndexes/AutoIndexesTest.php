<?php

namespace RavenDB\Tests\autoIndexes;

use RavenDB\Demo\autoIndexes\autoMapIndex1\AutoMapIndex1;
use RavenDB\Demo\autoIndexes\autoMapIndex2\AutoMapIndex2;
use RavenDB\Demo\autoIndexes\autoMapReduceIndex\AutoMapReduceIndex;
use RavenDB\Tests\RavenTestDriver;

class AutoIndexesTest extends RavenTestDriver
{
    public function testAutoMapIndex1(): void
    {
        $runParams = new \RavenDB\Demo\autoIndexes\AutoMapIndex1\RunParams();
        $runParams->setFirstName("Steven");

        $employee = (new AutoMapIndex1())($runParams);

        $this->assertNotNull($employee);
        $this->assertNotNull($employee->getFirstName());
        $this->assertEquals("Steven", $employee->getFirstName());
    }

    public function testAutoMapIndex2(): void
    {
        $runParams = new \RavenDB\Demo\autoIndexes\AutoMapIndex2\RunParams();
        $runParams->setCountry("UK");

        $employee = (new AutoMapIndex2())($runParams);

        $this->assertNotNull($employee);
        $this->assertNotNull($employee->getFirstName());
        $this->assertEquals("Anne", $employee->getFirstName());
    }

    public function testAutoMapReduceIndex(): void
    {
        $result = (new AutoMapReduceIndex())();

        $this->assertNotNull($result);
        $this->assertNotNull($result[0]->getCountry());
        $this->assertTrue($result[0]->getNumberOfEmployees() > 0);
    }
}