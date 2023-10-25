<?php

namespace RavenDB\Demo\textSearch\highlightQueryResultsMapReduce;

class RunParams
{
    private ?string $searchTerm = null;
    private ?string $preTag = null;
    private ?string $postTag = null;
    private ?int $fragmentLength = null;
    private ?int $fragmentCount = null;

    public function getSearchTerm(): ?string
    {
        return $this->searchTerm;
    }

    public function setSearchTerm(?string $searchTerm): void
    {
        $this->searchTerm = $searchTerm;
    }

    public function getPreTag(): ?string
    {
        return $this->preTag;
    }

    public function setPreTag(?string $preTag): void
    {
        $this->preTag = $preTag;
    }

    public function getPostTag(): ?string
    {
        return $this->postTag;
    }

    public function setPostTag(?string $postTag): void
    {
        $this->postTag = $postTag;
    }

    public function getFragmentLength(): ?int
    {
        return $this->fragmentLength;
    }

    public function setFragmentLength(?int $fragmentLength): void
    {
        $this->fragmentLength = $fragmentLength;
    }

    public function getFragmentCount(): ?int
    {
        return $this->fragmentCount;
    }

    public function setFragmentCount(?int $fragmentCount): void
    {
        $this->fragmentCount = $fragmentCount;
    }
}