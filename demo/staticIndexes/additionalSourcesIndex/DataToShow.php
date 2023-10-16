<?php

namespace RavenDB\Demo\staticIndexes\additionalSourcesIndex;

class DataToShow
{
    private ?string $productName = null;
    private ?float $originalPrice = null;
    private ?float $salesPrice = null;
    private ?float $profitPrice = null;

    public function getProductName(): ?string
    {
        return $this->productName;
    }

    public function setProductName(?string $productName): void
    {
        $this->productName = $productName;
    }

    public function getOriginalPrice(): ?float
    {
        return $this->originalPrice;
    }

    public function setOriginalPrice(?float $originalPrice): void
    {
        $this->originalPrice = $originalPrice;
    }

    public function getSalesPrice(): ?float
    {
        return $this->salesPrice;
    }

    public function setSalesPrice(?float $salesPrice): void
    {
        $this->salesPrice = $salesPrice;
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