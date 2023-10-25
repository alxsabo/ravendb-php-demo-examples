<?php

namespace RavenDB\Demo\textSearch\fTSQuerySearchBoosting;

class RunParams
{
    private ?float $boost1 = null;
    private ?float $boost2 = null;
    private ?float $boost3 = null;

    public function getBoost1(): ?float
    {
        return $this->boost1;
    }

    public function setBoost1(?float $boost1): void
    {
        $this->boost1 = $boost1;
    }

    public function getBoost2(): ?float
    {
        return $this->boost2;
    }

    public function setBoost2(?float $boost2): void
    {
        $this->boost2 = $boost2;
    }

    public function getBoost3(): ?float
    {
        return $this->boost3;
    }

    public function setBoost3(?float $boost3): void
    {
        $this->boost3 = $boost3;
    }
}