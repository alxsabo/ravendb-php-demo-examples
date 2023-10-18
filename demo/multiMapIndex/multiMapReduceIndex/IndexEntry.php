<?php

namespace RavenDB\Demo\multiMapIndex\multiMapReduceIndex;

//region demo
//region Step_2
class IndexEntry
{
    private ?string $cityName = null;
    private ?int $numberOfCompaniesInCity = null;
    private ?int $numberOfSuppliersInCity = null;
    private ?int $numberOfItemsShippedToCity = null;

    public function getCityName(): ?string
    {
        return $this->cityName;
    }

    public function setCityName(?string $cityName): void
    {
        $this->cityName = $cityName;
    }

    public function getNumberOfCompaniesInCity(): ?int
    {
        return $this->numberOfCompaniesInCity;
    }

    public function setNumberOfCompaniesInCity(?int $numberOfCompaniesInCity): void
    {
        $this->numberOfCompaniesInCity = $numberOfCompaniesInCity;
    }

    public function getNumberOfSuppliersInCity(): ?int
    {
        return $this->numberOfSuppliersInCity;
    }

    public function setNumberOfSuppliersInCity(?int $numberOfSuppliersInCity): void
    {
        $this->numberOfSuppliersInCity = $numberOfSuppliersInCity;
    }

    public function getNumberOfItemsShippedToCity(): ?int
    {
        return $this->numberOfItemsShippedToCity;
    }

    public function setNumberOfItemsShippedToCity(?int $numberOfItemsShippedToCity): void
    {
        $this->numberOfItemsShippedToCity = $numberOfItemsShippedToCity;
    }
}
//endregion
//endregion