<?php

namespace RavenDB\Demo\attachments\storeAttachment;

class RunParams
{
    private ?string $documentId = null;
    private ?string $attachment = null;
    private ?string $attachmentName = null;
    private ?string $contentType = null;

    public function getDocumentId(): ?string
    {
        return $this->documentId;
    }

    public function setDocumentId(?string $documentId): void
    {
        $this->documentId = $documentId;
    }

    public function getAttachment(): ?string
    {
        return $this->attachment;
    }

    public function setAttachment(?string $attachment): void
    {
        $this->attachment = $attachment;
    }

    public function getAttachmentName(): ?string
    {
        return $this->attachmentName;
    }

    public function setAttachmentName(?string $attachmentName): void
    {
        $this->attachmentName = $attachmentName;
    }

    public function getContentType(): ?string
    {
        return $this->contentType;
    }

    public function setContentType(?string $contentType): void
    {
        $this->contentType = $contentType;
    }
}