<?php

namespace RavenDB\Demo\facetedSearch\facetsOptions;

class RunParams
{
    private ?int $start = null;
    private ?int $pageSize = null;
    private ?string $includeRemainingTerms = null;

    public function getStart(): ?int
    {
        return $this->start;
    }

    public function setStart(?int $start): void
    {
        $this->start = $start;
    }

    public function getPageSize(): ?int
    {
        return $this->pageSize;
    }

    public function setPageSize(?int $pageSize): void
    {
        $this->pageSize = $pageSize;
    }

    public function getIncludeRemainingTerms(): ?string
    {
        return $this->includeRemainingTerms;
    }

    public function setIncludeRemainingTerms(?string $includeRemainingTerms): void
    {
        $this->includeRemainingTerms = $includeRemainingTerms;
    }
}