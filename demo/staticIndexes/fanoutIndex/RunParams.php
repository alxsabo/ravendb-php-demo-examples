<?php

namespace RavenDB\Demo\staticIndexes\fanoutIndex;

class RunParams
{
    private ?string $namePrefix = null;

    public function getNamePrefix(): ?string
    {
        return $this->namePrefix;
    }

    public function setNamePrefix(?string $namePrefix): void
    {
        $this->namePrefix = $namePrefix;
    }
}