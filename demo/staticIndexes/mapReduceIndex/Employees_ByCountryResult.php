<?php

namespace RavenDB\Demo\staticIndexes\mapReduceIndex;

//region Demo
//region Step_4
class Employees_ByCountryResult
{
    private ?String $country = null;
    private ?int $countryCount = null;

    public function getCountry(): ?string
    {
        return $this->country;
    }

    public function setCountry(?string $country): void
    {
        $this->country = $country;
    }

    public function getCountryCount(): ?int
    {
        return $this->countryCount;
    }

    public function setCountryCount(?int $countryCount): void
    {
        $this->countryCount = $countryCount;
    }
}
//endregion
//endregion