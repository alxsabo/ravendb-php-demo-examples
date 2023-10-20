<?php

namespace RavenDB\Demo\spatial\spatialQuery;

class EmployeeDetails
{
    private ?string $employeeName = null;
    private ?float $longitude = null;
    private ?float $latitude = null;

    public function getEmployeeName(): ?string
    {
        return $this->employeeName;
    }

    public function setEmployeeName(?string $employeeName): void
    {
        $this->employeeName = $employeeName;
    }

    public function getLongitude(): ?float
    {
        return $this->longitude;
    }

    public function setLongitude(?float $longitude): void
    {
        $this->longitude = $longitude;
    }

    public function getLatitude(): ?float
    {
        return $this->latitude;
    }

    public function setLatitude(?float $latitude): void
    {
        $this->latitude = $latitude;
    }
}