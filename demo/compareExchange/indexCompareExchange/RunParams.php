<?php

namespace RavenDB\Demo\compareExchange\indexCompareExchange;

class RunParams
{
    private ?int $minValue = null;

    public function getMinValue(): ?int
    {
        return $this->minValue;
    }

    public function setMinValue(?int $minValue): void
    {
        $this->minValue = $minValue;
    }
}