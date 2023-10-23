<?php

namespace RavenDB\Demo\facetedSearch\facetsAggregations;

class RunParams
{
    private ?float $range1 = null;
    private ?float $range2 = null;
    private ?float $range3 = null;

    public function getRange1(): ?float
    {
        return $this->range1;
    }

    public function setRange1(?float $range1): void
    {
        $this->range1 = $range1;
    }

    public function getRange2(): ?float
    {
        return $this->range2;
    }

    public function setRange2(?float $range2): void
    {
        $this->range2 = $range2;
    }

    public function getRange3(): ?float
    {
        return $this->range3;
    }

    public function setRange3(?float $range3): void
    {
        $this->range3 = $range3;
    }
}