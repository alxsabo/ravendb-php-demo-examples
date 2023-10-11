<?php

namespace RavenDB\Demo\revisions\enableRevisions;

class RunParams
{
    private ?string $collection1 = null;
    private ?string $collection2 = null;

    public function getCollection1(): ?string
    {
        return $this->collection1;
    }

    public function setCollection1(?string $collection1): void
    {
        $this->collection1 = $collection1;
    }

    public function getCollection2(): ?string
    {
        return $this->collection2;
    }

    public function setCollection2(?string $collection2): void
    {
        $this->collection2 = $collection2;
    }
}