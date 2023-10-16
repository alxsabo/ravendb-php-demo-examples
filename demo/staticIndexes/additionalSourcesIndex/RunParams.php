<?php

namespace RavenDB\Demo\staticIndexes\additionalSourcesIndex;

class RunParams
{
    private ?int $price = null;

    public function getPrice(): ?int
    {
        return $this->price;
    }

    public function setPrice(?int $price): void
    {
        $this->price = $price;
    }
}