<?php

namespace RavenDB\Demo\textSearch\fTSQuerySearchWildcards;

class RunParams
{
    private ?string $start = null;
    private ?string $end = null;
    private ?string $middle = null;
    private ?int $numberOfResults = null;

    public function getStart(): ?string
    {
        return $this->start;
    }

    public function setStart(?string $start): void
    {
        $this->start = $start;
    }

    public function getEnd(): ?string
    {
        return $this->end;
    }

    public function setEnd(?string $end): void
    {
        $this->end = $end;
    }

    public function getMiddle(): ?string
    {
        return $this->middle;
    }

    public function setMiddle(?string $middle): void
    {
        $this->middle = $middle;
    }

    public function getNumberOfResults(): ?int
    {
        return $this->numberOfResults;
    }

    public function setNumberOfResults(?int $numberOfResults): void
    {
        $this->numberOfResults = $numberOfResults;
    }
}