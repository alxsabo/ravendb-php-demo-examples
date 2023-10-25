<?php

namespace RavenDB\Demo\textSearch\highlightQueryResultsCustomized;

class RunParams
{
    private ?int $fragmentLength = null;
    private ?int $fragmentCount = null;
    private ?string $tag1 = null;
    private ?string $tag2 = null;
    private ?string $tag3 = null;
    private ?string $tag4 = null;

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

    public function getTag1(): ?string
    {
        return $this->tag1;
    }

    public function setTag1(?string $tag1): void
    {
        $this->tag1 = $tag1;
    }

    public function getTag2(): ?string
    {
        return $this->tag2;
    }

    public function setTag2(?string $tag2): void
    {
        $this->tag2 = $tag2;
    }

    public function getTag3(): ?string
    {
        return $this->tag3;
    }

    public function setTag3(?string $tag3): void
    {
        $this->tag3 = $tag3;
    }

    public function getTag4(): ?string
    {
        return $this->tag4;
    }

    public function setTag4(?string $tag4): void
    {
        $this->tag4 = $tag4;
    }
}