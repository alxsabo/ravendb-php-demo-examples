<?php

namespace RavenDB\Demo\staticIndexes\projectIndexResults;

class RunParams
{
    private ?int $startYear = null;

    public function getStartYear(): ?int
    {
        return $this->startYear;
    }

    public function setStartYear(?int $startYear): void
    {
        $this->startYear = $startYear;
    }
}