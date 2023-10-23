<?php

namespace RavenDB\Demo\compareExchange\indexCompareExchange;

//region demo
//region Step_2
class IndexEntry
{
    private ?int $unitsInStock = null;

    public function getUnitsInStock(): ?int
    {
        return $this->unitsInStock;
    }

    public function setUnitsInStock(?int $unitsInStock): void
    {
        $this->unitsInStock = $unitsInStock;
    }
}
//endregion
//endregion