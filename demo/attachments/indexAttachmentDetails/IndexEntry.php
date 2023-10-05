<?php

namespace RavenDB\Demo\attachments\indexAttachmentDetails;

//region Demo
//region Step_2
class IndexEntry
{
    private ?array $attachmentNames = null;
    private ?array $attachmentContentTypes = null;
    private ?array $attachmentHashes = null;
    private ?array $attachmentSizes = null;

    public function getAttachmentNames(): ?array
    {
        return $this->attachmentNames;
    }

    public function setAttachmentNames(?array $attachmentNames): void
    {
        $this->attachmentNames = $attachmentNames;
    }

    public function getAttachmentContentTypes(): ?array
    {
        return $this->attachmentContentTypes;
    }

    public function setAttachmentContentTypes(?array $attachmentContentTypes): void
    {
        $this->attachmentContentTypes = $attachmentContentTypes;
    }

    public function getAttachmentHashes(): ?array
    {
        return $this->attachmentHashes;
    }

    public function setAttachmentHashes(?array $attachmentHashes): void
    {
        $this->attachmentHashes = $attachmentHashes;
    }

    public function getAttachmentSizes(): ?array
    {
        return $this->attachmentSizes;
    }

    public function setAttachmentSizes(?array $attachmentSizes): void
    {
        $this->attachmentSizes = $attachmentSizes;
    }
}
//endregion
//endregion
