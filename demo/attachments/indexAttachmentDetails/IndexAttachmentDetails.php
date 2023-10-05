<?php

namespace RavenDB\Demo\attachments\indexAttachmentDetails;

//region Usings
//endregion

use RavenDB\Demo\common\DocumentStoreHolder;
use RavenDB\Demo\common\models\Employee;

class IndexAttachmentDetails
{
    public function __invoke(RunParams $runParams): array
    {
        $attachmentContentType = $runParams->getAttachmentContentType() ?? "image/jpeg";
        $attachmentMinSize = $runParams->getAttachmentMinSize() ?? 18000;

        //region Demo
        $employeesWithMatchingAttachments = [];

        $session = DocumentStoreHolder::getStore()->openSession();
        try {
            //region Step_5
            $employeesWithMatchingAttachments = $session->query(Employee::class, Employees_ByAttachmentDetails::class)
                ->whereEquals("AttachmentContentTypes", $attachmentContentType)
                ->whereGreaterThan("AttachmentSizes", $attachmentMinSize)
                ->toList();
            //endregion
        } finally {
            $session->close();
        }
        //endregion

        return $employeesWithMatchingAttachments;
    }
}