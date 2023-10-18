<?php

namespace RavenDB\Demo\javascriptIndexes\javascriptMapIndex;

//region using
//endregion

//region Demo
//region Step_1
class IndexEntry
{
    public ?string $FullName = null;
    public ?string $Country = null;
    public ?int $WorkingInCompanySince = null;
    public ?int $NumberOfTerritories = null;

    public function getFullName(): ?string
    {
        return $this->FullName;
    }

    public function setFullName(?string $FullName): void
    {
        $this->FullName = $FullName;
    }

    public function getCountry(): ?string
    {
        return $this->Country;
    }

    public function setCountry(?string $Country): void
    {
        $this->Country = $Country;
    }

    public function getWorkingInCompanySince(): ?int
    {
        return $this->WorkingInCompanySince;
    }

    public function setWorkingInCompanySince(?int $WorkingInCompanySince): void
    {
        $this->WorkingInCompanySince = $WorkingInCompanySince;
    }

    public function getNumberOfTerritories(): ?int
    {
        return $this->NumberOfTerritories;
    }

    public function setNumberOfTerritories(?int $NumberOfTerritories): void
    {
        $this->NumberOfTerritories = $NumberOfTerritories;
    }
}
//endregion
//endregion