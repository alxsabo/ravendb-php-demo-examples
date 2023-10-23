<?php

namespace RavenDB\Demo\facetedSearch\facetsFromDocument;

class MyFacetResult
{
    private ?string $facetName = null;
    private ?string $facetRange = null;
    private ?float $facetCount = null;

    public function getFacetName(): ?string
    {
        return $this->facetName;
    }

    public function setFacetName(?string $facetName): void
    {
        $this->facetName = $facetName;
    }

    public function getFacetRange(): ?string
    {
        return $this->facetRange;
    }

    public function setFacetRange(?string $facetRange): void
    {
        $this->facetRange = $facetRange;
    }

    public function getFacetCount(): ?float
    {
        return $this->facetCount;
    }

    public function setFacetCount(?float $facetCount): void
    {
        $this->facetCount = $facetCount;
    }
}