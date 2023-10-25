<?php

namespace RavenDB\Tests;

use RavenDB\Demo\common\DocumentStoreHolder;
use RavenDB\Demo\common\models\Company;
use RavenDB\Demo\revisions\getRevisions\GetRevisions;
use RavenDB\Tests\driver\RavenTestDriver;

class RevisionsTest extends RavenTestDriver
{


    public function testGetRevisions(): void
    {
        $documentId = "companies/7-A";

        $session = DocumentStoreHolder::getStore()->openSession();
        try {

            $documentToRestore = $session->load(Company::class, $documentId);

            $companies = (new GetRevisions())();

            try {
                $this->assertNotEmpty($companies);
            } finally {
                $cleanupSession = DocumentStoreHolder::getStore()->openSession();
                try {
                    $cleanupSession->delete($documentId);
                    $cleanupSession->saveChanges();

                    $cleanupSession->store($documentToRestore);
                    $cleanupSession->saveChanges();
                } finally {
                    $cleanupSession->close();
                }
            }
        } finally {
            $session->close();
        }
    }
}