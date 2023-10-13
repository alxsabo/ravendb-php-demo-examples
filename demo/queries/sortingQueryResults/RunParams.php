<?php

namespace RavenDB\Demo\queries\sortingQueryResults;

class RunParams
{
    private ?float $numberOfUnits = null;

    public function getNumberOfUnits(): ?float
    {
        return $this->numberOfUnits;
    }

    public function setNumberOfUnits(?float $numberOfUnits): void
    {
        $this->numberOfUnits = $numberOfUnits;
    }
}