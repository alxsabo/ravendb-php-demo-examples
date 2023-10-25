<?php

namespace RavenDB\Demo\textSearch\fTSQuerySearchBasics;

class RunParams
{
    private ?string $term1 = null;
    private ?string $term2 = null;

    public function getTerm1(): ?string
    {
        return $this->term1;
    }

    public function setTerm1(?string $term1): void
    {
        $this->term1 = $term1;
    }

    public function getTerm2(): ?string
    {
        return $this->term2;
    }

    public function setTerm2(?string $term2): void
    {
        $this->term2 = $term2;
    }
}