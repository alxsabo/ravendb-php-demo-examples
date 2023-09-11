<?php

namespace RavenDB\Demo\basics\deleteDocument;

class RunParams
{
    private ?String $documentId = null;

    public function getDocumentId(): ?string
    {
        return $this->documentId;
    }

    public function setDocumentId(?string $documentId): void
    {
        $this->documentId = $documentId;
    }
}