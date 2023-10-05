<?php

namespace RavenDB\Demo\attachments\indexAttachmentDetails;

//region Usings
use RavenDB\Documents\Indexes\AbstractIndexCreationTask;
//endregion

//region Demo
//region Step_1
class Employees_ByAttachmentDetails extends AbstractIndexCreationTask
{
//endregion

    public function __construct()
    {
        //region Step_3
        parent::__construct();

        $this->map = "docs.Employees.Select(employee => new {" .
            "    employee = employee," .
            "    attachments = this.AttachmentsFor(employee)" .
        //endregion
        //region Step_4
            "}).Select(this0 => new {" .
            "    AttachmentNames = Enumerable.ToArray(this0.attachments.Select(x => x.Name))," .
            "    AttachmentContentTypes = Enumerable.ToArray(this0.attachments.Select(x0 => x0.ContentType))," .
            "    AttachmentHashes = Enumerable.ToArray(this0.attachments.Select(x1 => x1.Hash))," .
            "    AttachmentSizes = Enumerable.ToArray(this0.attachments.Select(x2 => x2.Size))" .
            "})";
        //endregion
    }
}
//endregion