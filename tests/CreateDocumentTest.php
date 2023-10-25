<?php

namespace RavenDB\Tests;

use PHPUnit\Framework\TestCase;
use RavenDB\Demo\basics\createDocument\CreateDocument;
use RavenDB\Demo\basics\createDocument\RunParams;
use RavenDB\Demo\common\DocumentStoreHolder;
use RavenDB\Demo\common\models\Company;

class CreateDocumentTest extends TestCase
{
    public function testCreateDocument(): void
    {
        $runParams = new RunParams();
        $runParams->setCompanyName("companyName1");
        $runParams->setCompanyPhone("companyPhone1");
        $runParams->setContactName("contactName1");
        $runParams->setContactTitle("contactTitle1");

        $createDocument = new CreateDocument;
        $newId = $createDocument($runParams);

        $session = DocumentStoreHolder::getStore()->openSession();
        try {

            $newDocument = $session->load(Company::class, $newId);

            $this->assertNotNull($newDocument);
            $this->assertEquals("companyPhone1", $newDocument->getPhone());

        } finally {
            $session->close();

            $cleanupSession = DocumentStoreHolder::getStore()->openSession();
            try {
                $cleanupSession->delete($newId);
                $cleanupSession->saveChanges();
            } finally {
                $cleanupSession->close();
            }
        }
    }
}