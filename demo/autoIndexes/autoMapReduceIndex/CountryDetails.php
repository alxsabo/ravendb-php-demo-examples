<?php

namespace RavenDB\Demo\autoIndexes\autoMapReduceIndex;

//region Usings
//endregion

//region Demo
//region Step_1
class CountryDetails
{
    private ?string $country = null;
    private ?int $numberOfEmployees = null;

    public function getCountry(): ?string
    {
        return $this->country;
    }

    public function setCountry(?string $country): void
    {
        $this->country = $country;
    }

    public function getNumberOfEmployees(): ?int
    {
        return $this->numberOfEmployees;
    }

    public function setNumberOfEmployees(?int $numberOfEmployees): void
    {
        $this->numberOfEmployees = $numberOfEmployees;
    }
}
//endregion
//endregion