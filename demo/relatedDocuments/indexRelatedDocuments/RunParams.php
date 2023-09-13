<?php

namespace RavenDB\Demo\relatedDocuments\indexRelatedDocuments;

class RunParams
{
    private ?string $categoryName = null;

    public function getCategoryName(): ?string
    {
        return $this->categoryName;
    }

    public function setCategoryName(?string $categoryName): void
    {
        $this->categoryName = $categoryName;
    }
}