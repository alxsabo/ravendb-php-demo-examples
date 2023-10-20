<?php

namespace RavenDB\Demo\spatial\spatialIndex;

//region Demo
//region Step_2
class IndexEntry
{
    private ?string $companyName = null;
    private ?string $locationCoordinates = null;

    public function getCompanyName(): ?string
    {
        return $this->companyName;
    }

    public function setCompanyName(?string $companyName): void
    {
        $this->companyName = $companyName;
    }

    public function getLocationCoordinates(): ?string
    {
        return $this->locationCoordinates;
    }

    public function setLocationCoordinates(?string $locationCoordinates): void
    {
        $this->locationCoordinates = $locationCoordinates;
    }
}
//endregion
//endregion