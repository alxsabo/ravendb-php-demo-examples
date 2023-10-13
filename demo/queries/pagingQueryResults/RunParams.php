<?php

namespace RavenDB\Demo\queries\pagingQueryResults;

class RunParams
{
    private ?int $resultsToSkip = null;
    private ?int $resultsToTake = null;

    public function getResultsToSkip(): ?int
    {
        return $this->resultsToSkip;
    }

    public function setResultsToSkip(?int $resultsToSkip): void
    {
        $this->resultsToSkip = $resultsToSkip;
    }

    public function getResultsToTake(): ?int
    {
        return $this->resultsToTake;
    }

    public function setResultsToTake(?int $resultsToTake): void
    {
        $this->resultsToTake = $resultsToTake;
    }
}