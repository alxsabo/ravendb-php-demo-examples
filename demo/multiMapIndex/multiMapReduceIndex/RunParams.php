<?php

namespace RavenDB\Demo\multiMapIndex\multiMapReduceIndex;

class RunParams
{
    private ?int $minCompaniesCount = null;
    private ?int $minItemsCount = null;

    public function getMinCompaniesCount(): ?int
    {
        return $this->minCompaniesCount;
    }

    public function setMinCompaniesCount(?int $minCompaniesCount): void
    {
        $this->minCompaniesCount = $minCompaniesCount;
    }

    public function getMinItemsCount(): ?int
    {
        return $this->minItemsCount;
    }

    public function setMinItemsCount(?int $minItemsCount): void
    {
        $this->minItemsCount = $minItemsCount;
    }
}