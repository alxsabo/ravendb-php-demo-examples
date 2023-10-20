<?php

namespace RavenDB\Demo\common\models;

use DateTime;
use RavenDB\Type\StringArray;
use Symfony\Component\Serializer\Annotation\SerializedName;

class Employee
{
    private ?string $id = null;
    private ?String $LastName = null;
    private ?String $FirstName = null;
    private ?string $Title = null;
    private ?Address $Address = null;
    private ?DateTime $HiredAt = null;
    private ?DateTime $Birthday = null;
    private ?string $HomePhone = null;
    private ?string $Extension = null;
    private ?string $ReportsTo = null;
    private ?StringArray $Notes = null;
    private ?StringArray $Territories = null;

    public function getId(): ?string
    {
        return $this->id;
    }

    public function setId(?string $id): void
    {
        $this->id = $id;
    }

    public function getLastName(): ?string
    {
        return $this->LastName;
    }

    public function setLastName(?string $lastName): void
    {
        $this->LastName = $lastName;
    }

    public function getFirstName(): ?string
    {
        return $this->FirstName;
    }

    public function setFirstName(?string $FirstName): void
    {
        $this->FirstName = $FirstName;
    }

    public function getTitle(): ?string
    {
        return $this->Title;
    }

    public function setTitle(?string $Title): void
    {
        $this->Title = $Title;
    }

    public function getAddress(): ?Address
    {
        return $this->Address;
    }

    public function setAddress(?Address $Address): void
    {
        $this->Address = $Address;
    }

    public function getHiredAt(): ?DateTime
    {
        return $this->HiredAt;
    }

    public function setHiredAt(?DateTime $HiredAt): void
    {
        $this->HiredAt = $HiredAt;
    }

    public function getBirthday(): ?DateTime
    {
        return $this->Birthday;
    }

    public function setBirthday(?DateTime $Birthday): void
    {
        $this->Birthday = $Birthday;
    }

    public function getHomePhone(): ?string
    {
        return $this->HomePhone;
    }

    public function setHomePhone(?string $HomePhone): void
    {
        $this->HomePhone = $HomePhone;
    }

    public function getExtension(): ?string
    {
        return $this->Extension;
    }

    public function setExtension(?string $Extension): void
    {
        $this->Extension = $Extension;
    }

    public function getReportsTo(): ?string
    {
        return $this->ReportsTo;
    }

    public function setReportsTo(?string $ReportsTo): void
    {
        $this->ReportsTo = $ReportsTo;
    }

    public function getNotes(): ?StringArray
    {
        return $this->Notes;
    }

    public function setNotes(?StringArray $Notes): void
    {
        $this->Notes = $Notes;
    }

    public function getTerritories(): ?StringArray
    {
        return $this->Territories;
    }

    public function setTerritories(?StringArray $Territories): void
    {
        $this->Territories = $Territories;
    }
}
