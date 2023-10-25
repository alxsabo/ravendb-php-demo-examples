<?php

namespace RavenDB\Demo\textSearch\fTSQuerySearchOperators;

class RunParams
{
    private ?string $term1 = null;
    private ?string $term2 = null;
    private ?string $term3 = null;

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

    public function getTerm3(): ?string
    {
        return $this->term3;
    }

    public function setTerm3(?string $term3): void
    {
        $this->term3 = $term3;
    }
}