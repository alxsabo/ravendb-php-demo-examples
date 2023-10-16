<?php

namespace RavenDB\Demo\staticIndexes\mapReduceIndex;

class RunParams
{
    private ?string $country = null;

    public function getCountry(): ?string
    {
        return $this->country;
    }

    public function setCountry(?string $country): void
    {
        $this->country = $country;
    }

}