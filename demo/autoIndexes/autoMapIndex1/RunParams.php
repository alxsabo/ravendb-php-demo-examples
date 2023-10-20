<?php

namespace RavenDB\Demo\autoIndexes\autoMapIndex1;

class RunParams
{
    private ?string $firstName = null;

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function setFirstName(?string $firstName): void
    {
        $this->firstName = $firstName;
    }
}