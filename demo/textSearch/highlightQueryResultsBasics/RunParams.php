<?php

namespace RavenDB\Demo\textSearch\highlightQueryResultsBasics;

class RunParams
{
    private ?int $fragmentLength = null;
    private ?int $fragmentCount = null;

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