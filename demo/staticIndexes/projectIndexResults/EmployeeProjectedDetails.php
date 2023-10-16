<?php

namespace RavenDB\Demo\staticIndexes\projectIndexResults;

//region Demo
//region Step_3
class EmployeeProjectedDetails
{
    private ?string $firstName = null;
    private ?string $phone = null;
    private ?string $location = null;

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function setFirstName(?string $firstName): void
    {
        $this->firstName = $firstName;
    }

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function setPhone(?string $phone): void
    {
        $this->phone = $phone;
    }

    public function getLocation(): ?string
    {
        return $this->location;
    }

    public function setLocation(?string $location): void
    {
        $this->location = $location;
    }
}
//endregion
//endregion