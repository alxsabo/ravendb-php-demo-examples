<?php

namespace RavenDB\Tests;

use RavenDB\Demo\common\DocumentStoreHolder;
use RavenDB\Demo\multiMapIndex\multiMapIndexBasic\CompaniesAndSuppliers_ByName;
use RavenDB\Demo\multiMapIndex\multiMapIndexBasic\MultiMapIndexBasic;
use RavenDB\Demo\multiMapIndex\multiMapIndexCustomizedFields\Contacts_ByNameAndTitle;
use RavenDB\Demo\multiMapIndex\multiMapIndexCustomizedFields\MultiMapIndexCustomizedFields;
use RavenDB\Demo\multiMapIndex\multiMapReduceIndex\CityCommerceDetails;
use RavenDB\Demo\multiMapIndex\multiMapReduceIndex\MultiMapReduceIndex;
use RavenDB\Tests\driver\RavenTestDriver;

class MultiMapIndexTest extends RavenTestDriver
{
    public function testMultiMapIndexBasic(): void
    {
        DocumentStoreHolder::getStore()->executeIndex(new CompaniesAndSuppliers_ByName());
        $this->waitForIndexing(DocumentStoreHolder::getStore());

        $results = (new MultiMapIndexBasic())(new \RavenDB\Demo\multiMapIndex\multiMapIndexBasic\RunParams());

        $this->assertCount(5, $results);
        $this->assertNotNull($results[0]->getName());
    }

    public function testMultiMapIndexCustomizedFields(): void
    {
        DocumentStoreHolder::getStore()->executeIndex(new Contacts_ByNameAndTitle());
        $this->waitForIndexing(DocumentStoreHolder::getStore());

        $list = (new MultiMapIndexCustomizedFields())(new \RavenDB\Demo\multiMapIndex\multiMapIndexCustomizedFields\RunParams());

        $this->assertCount(3, $list);
        $this->assertNotNull($list[0]->getContactName());
    }

    public function testMultiMapReduceIndex(): void
    {
        DocumentStoreHolder::getStore()->executeIndex(new CityCommerceDetails());
        $this->waitForIndexing(DocumentStoreHolder::getStore());

        $results = (new MultiMapReduceIndex())(new \RavenDB\Demo\multiMapIndex\multiMapReduceIndex\RunParams());

        $this->assertCount(4, $results);
        $this->assertNotNull($results[0]->getCityName());
    }
}