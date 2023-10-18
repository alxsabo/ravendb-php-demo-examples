<?php

namespace RavenDB\Tests\javascriptMapIndex;

use RavenDB\Demo\common\DocumentStoreHolder;
use RavenDB\Demo\javascriptIndexes\javascriptMapIndex\Employees_ByImportantDetailsJS;
use RavenDB\Demo\javascriptIndexes\javascriptMapIndex\JavascriptMapIndex;
use RavenDB\Tests\RavenTestDriver;

class JavascriptMapIndexTest extends RavenTestDriver
{
    public function testJavascriptMapIndex(): void
    {
        DocumentStoreHolder::getStore()->executeIndex(new Employees_ByImportantDetailsJS());
        $this->waitForIndexing(DocumentStoreHolder::getStore());

        $runParams = new \RavenDB\Demo\javascriptIndexes\javascriptMapIndex\RunParams();
        $runParams->setStartYear(1993);

        $employees = (new JavascriptMapIndex())($runParams);

        print_r($employees);

        $this->assertCount(1, $employees);
        $this->assertNotNull($employees[0]->getFirstName());
    }
}