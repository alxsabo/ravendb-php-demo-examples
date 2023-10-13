<?php

namespace RavenDB\Demo\queries\projectingIndividualFields;

//region Demo
class CompanyDetails
{
    private ?string $companyName = null;
    private ?string $city = null;
    private ?string $country = null;
//endregion
    public function getCompanyName(): ?string
    {
        return $this->companyName;
    }

    public function setCompanyName(?string $companyName): void
    {
        $this->companyName = $companyName;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(?string $city): void
    {
        $this->city = $city;
    }

    public function getCountry(): ?string
    {
        return $this->country;
    }

    public function setCountry(?string $country): void
    {
        $this->country = $country;
    }
//region Demo
}
//endregion