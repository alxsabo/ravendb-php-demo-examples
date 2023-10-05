<?php

namespace RavenDB\Demo\attachments\indexAttachmentDetails;

class RunParams
{
    private ?string $attachmentContentType = null;
    private ?int $attachmentMinSize = null;

    public function getAttachmentContentType(): ?string
    {
        return $this->attachmentContentType;
    }

    public function setAttachmentContentType(?string $attachmentContentType): void
    {
        $this->attachmentContentType = $attachmentContentType;
    }

    public function getAttachmentMinSize(): ?int
    {
        return $this->attachmentMinSize;
    }

    public function setAttachmentMinSize(?int $attachmentMinSize): void
    {
        $this->attachmentMinSize = $attachmentMinSize;
    }
}