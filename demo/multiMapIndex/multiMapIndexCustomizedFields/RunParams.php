<?php

namespace RavenDB\Demo\multiMapIndex\multiMapIndexCustomizedFields;

class RunParams
{
    private ?string $namePrefix = null;
    private ?string $titlePrefix = null;

    public function getNamePrefix(): ?string
    {
        return $this->namePrefix;
    }

    public function setNamePrefix(?string $namePrefix): void
    {
        $this->namePrefix = $namePrefix;
    }

    public function getTitlePrefix(): ?string
    {
        return $this->titlePrefix;
    }

    public function setTitlePrefix(?string $titlePrefix): void
    {
        $this->titlePrefix = $titlePrefix;
    }
}