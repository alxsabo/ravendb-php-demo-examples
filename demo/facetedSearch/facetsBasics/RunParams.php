<?php

namespace RavenDB\Demo\facetedSearch\facetsBasics;

class RunParams
{
    private ?int $range1 = null;
    private ?int $range2 = null;
    private ?int $range3 = null;

    public function getRange1(): ?int
    {
        return $this->range1;
    }

    public function setRange1(?int $range1): void
    {
        $this->range1 = $range1;
    }

    public function getRange2(): ?int
    {
        return $this->range2;
    }

    public function setRange2(?int $range2): void
    {
        $this->range2 = $range2;
    }

    public function getRange3(): ?int
    {
        return $this->range3;
    }

    public function setRange3(?int $range3): void
    {
        $this->range3 = $range3;
    }
}