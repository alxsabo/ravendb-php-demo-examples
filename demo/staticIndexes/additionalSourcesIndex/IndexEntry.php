<?php

namespace RavenDB\Demo\staticIndexes\additionalSourcesIndex;

//region Usings
//endregion

//region Demo
//region Step_2
class IndexEntry
{
    private ?string $productName = null;
    private ?float $originalPrice = null;
    private ?float $salePrice = null;
    private ?float $profitPrice = null;

    public function getOriginalPrice(): ?float
    {
        return $this->originalPrice;
    }

    public function setOriginalPrice(?float $originalPrice): void
    {
        $this->originalPrice = $originalPrice;
    }

    public function getSalePrice(): ?float
    {
        return $this->salePrice;
    }

    public function setSalePrice(?float $salePrice): void
    {
        $this->salePrice = $salePrice;
    }

    public function getProfitPrice(): ?float
    {
        return $this->profitPrice;
    }

    public function setProfitPrice(?float $profitPrice): void
    {
        $this->profitPrice = $profitPrice;
    }
}
//endregion
//endregion