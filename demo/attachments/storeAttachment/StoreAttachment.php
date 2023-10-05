<?php

namespace RavenDB\Demo\attachments\storeAttachment;

//region Usings
//endregion

use RavenDB\Demo\common\DocumentStoreHolder;

class StoreAttachment
{
    private const DEFAULT_DOCUMENT_ID = "companies/2-A";

    public function __invoke(RunParams $runParams): string
    {
        $documentId = $runParams->getDocumentId() ?? self::DEFAULT_DOCUMENT_ID;

        $attachmentName = $runParams->getAttachmentName();
        $contentType = $runParams->getContentType();
        $attachment = $runParams->getAttachment();

        //region Demo
        $session = DocumentStoreHolder::getStore()->openSession();
        try {
            //region Step_1
            $stream = $attachment;

            // NOTES for Danielle:

            // streaming content currently is not supported in PHP version, maybe one day
            // we are uploading just simple string, so maybe this step is not necessary

            // string to be uploaded as attachment can also be created as:  $stream = implode(array_map("chr", [1, 2, 3, 4, 5]));

            //endregion

            //region Step_2
            $session->advanced()->attachments()->store($documentId, $attachmentName, $stream, $contentType);
            //endregion

            //region Step_3
            $session->saveChanges();
            //endregion

        } finally {
            $session->close();
        }
        //endregion

        return "Attachment $attachmentName was stored successfully on document $documentId";
    }
}