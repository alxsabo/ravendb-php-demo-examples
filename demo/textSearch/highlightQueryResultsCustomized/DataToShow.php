<?php

namespace RavenDB\Demo\textSearch\highlightQueryResultsCustomized;

class DataToShow
{
    private ?string $documentId = null;
    private ?string $indexField = null;
    private ?string $fragment = null;

    public function getDocumentId(): ?string
    {
        return $this->documentId;
    }

    public function setDocumentId(?string $documentId): void
    {
        $this->documentId = $documentId;
    }

    public function getIndexField(): ?string
    {
        return $this->indexField;
    }

    public function setIndexField(?string $indexField): void
    {
        $this->indexField = $indexField;
    }

    public function getFragment(): ?string
    {
        return $this->fragment;
    }

    public function setFragment(?string $fragment): void
    {
        $this->fragment = $fragment;
    }
}