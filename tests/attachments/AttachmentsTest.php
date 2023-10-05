<?php

namespace RavenDB\Tests\attachments;

use RavenDB\Demo\attachments\indexAttachmentDetails\Employees_ByAttachmentDetails;
use RavenDB\Demo\attachments\indexAttachmentDetails\IndexAttachmentDetails;
use RavenDB\Demo\attachments\loadAttachment\LoadAttachment;
use RavenDB\Demo\attachments\storeAttachment\StoreAttachment;
use RavenDB\Demo\common\DocumentStoreHolder;

use RavenDB\Tests\RavenTestDriver;

class AttachmentsTest extends RavenTestDriver
{
    private const DEFAULT_DOCUMENT_ID = "companies/2-A";

    public function testLoadAttachment(): void
    {
        $params = new \RavenDB\Demo\attachments\loadAttachment\RunParams();
        $params->setAttachmentName('image.jpg');

        $result = (new LoadAttachment())($params);

        $this->assertEquals("Attachment image.jpg was loaded successfully", $result);
    }

    public function testStoreAttachment(): void
    {
        $name = 'new-image.png';

        $params = new \RavenDB\Demo\attachments\storeAttachment\RunParams();
        $params->setDocumentId(self::DEFAULT_DOCUMENT_ID);
        $params->setAttachmentName($name);
        $params->setContentType('image/png');
        $params->setAttachment(implode(array_map("chr", [1, 2, 3, 4, 5])));

        $session = DocumentStoreHolder::getStore()->openSession();
        try {
            $result = (new StoreAttachment())($params);

            $this->assertEquals("Attachment $name was stored successfully on document " . self::DEFAULT_DOCUMENT_ID, $result);
        } finally {
            if ($session->advanced()->attachments()->exists(self::DEFAULT_DOCUMENT_ID, $name)) {
                $session->advanced()->attachments()->delete(self::DEFAULT_DOCUMENT_ID, $name);
                $session->saveChanges();
            }

            $session->close();
        }
    }

    function testIndexAttachmentDetails(): void
    {
        DocumentStoreHolder::getStore()->executeIndex(new Employees_ByAttachmentDetails());
        $this->waitForIndexing(DocumentStoreHolder::getStore());

        $runParams = new \RavenDB\Demo\attachments\indexAttachmentDetails\RunParams();

        $employees = (new IndexAttachmentDetails())($runParams);

        $this->assertCount(2, $employees);
        $this->assertNotNull($employees[0]->getLastName());
    }
}