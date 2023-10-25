<?php

namespace RavenDB\Tests;

use PHPUnit\Framework\TestCase;
use RavenDB\Demo\common\DocumentStoreHolder;
use RavenDB\Demo\common\models\Product;
use RavenDB\Demo\relatedDocuments\createRelatedDocuments\CreateRelatedDocuments;
use RavenDB\Demo\relatedDocuments\indexRelatedDocuments\IndexRelatedDocuments;
use RavenDB\Demo\relatedDocuments\indexRelatedDocuments\Products_ByCategoryName;
use RavenDB\Demo\relatedDocuments\loadRelatedDocuments\LoadRelatedDocuments;
use RavenDB\Demo\relatedDocuments\queryRelatedDocuments\QueryRelatedDocuments;

class RelatedDocumentsTest extends TestCase
{
    public function testCreateRelatedDocument(): void
    {
        $params = new \RavenDB\Demo\relatedDocuments\createRelatedDocuments\RunParams();
        $params->setProductName("p1");
        $params->setSupplierName("s2");
        $params->setSupplierPhone("123");

        $product = (new CreateRelatedDocuments)($params);

        $session = DocumentStoreHolder::getStore()->openSession();
        try {

            $loadedDocument = $session->load(Product::class, $product->getId());

            $this->assertNotNull($loadedDocument->getSupplier());
            $this->assertNotNull($loadedDocument->getCategory());
        } finally {
            $session->close();

            $cleanupSession = DocumentStoreHolder::getStore()->openSession();
            try {
                $categoryId = $product->getCategory();
                $supplierId = $product->getSupplier();
                $productId = $product->getId();

                $cleanupSession->delete($categoryId);
                $cleanupSession->delete($supplierId);
                $cleanupSession->delete($productId);

                $cleanupSession->saveChanges();
            } finally {
                $cleanupSession->close();
            }
        }
    }

    // Rest of the tests are here just to verify that code is runnable without any exception

    public function testLoadRelatedDocuments(): void
    {
        $params = new \RavenDB\Demo\relatedDocuments\loadRelatedDocuments\RunParams();
        $params->setPhone('(+972)52-5486969');
        $params->setPricePerUnit(12);

        $result = (new LoadRelatedDocuments)($params);

        $this->assertEquals('Document products/34-A was edited successfully', $result);
    }

    public function testQueryRelatedDocuments(): void
    {
        $result = (new QueryRelatedDocuments)();
        $this->assertEquals("The Product Documents were updated successfully", $result);
    }

    public function testIndexRelatedDocuments(): void
    {
        //test prerequisites
        (new Products_ByCategoryName())->execute(DocumentStoreHolder::getStore());

        $params = new \RavenDB\Demo\relatedDocuments\indexRelatedDocuments\RunParams();
        $params->setCategoryName('Produce');

        $result = (new IndexRelatedDocuments)($params);

        $this->assertCount(5, $result);
    }
}