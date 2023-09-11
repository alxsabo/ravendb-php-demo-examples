<?php

namespace RavenDB\Demo\common\models;

use DateTime;
use RavenDB\Type\StringArray;

class Employee
{
    private ?String $id = null;
    private ?String $lastName = null;
    private ?String $firstName = null;
    private ?String $title = null;
    private ?Address $address = null;
    private ?DateTime $hiredAt = null;
    private ?DateTime $birthday = null;
    private ?String $homePhone = null;
    private ?String $extension = null;
    private ?String $reportsTo = null;
    private ?StringArray $notes = null;
    private ?StringArray $territories = null;

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
        return $this->lastName;
    }

    public function setLastName(?string $lastName): void
    {
        $this->lastName = $lastName;
    }

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function setFirstName(?string $firstName): void
    {
        $this->firstName = $firstName;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(?string $title): void
    {
        $this->title = $title;
    }

    public function getAddress(): ?Address
    {
        return $this->address;
    }

    public function setAddress(?Address $address): void
    {
        $this->address = $address;
    }

    public function getHiredAt(): ?DateTime
    {
        return $this->hiredAt;
    }

    public function setHiredAt(?DateTime $hiredAt): void
    {
        $this->hiredAt = $hiredAt;
    }

    public function getBirthday(): ?DateTime
    {
        return $this->birthday;
    }

    public function setBirthday(?DateTime $birthday): void
    {
        $this->birthday = $birthday;
    }

    public function getHomePhone(): ?string
    {
        return $this->homePhone;
    }

    public function setHomePhone(?string $homePhone): void
    {
        $this->homePhone = $homePhone;
    }

    public function getExtension(): ?string
    {
        return $this->extension;
    }

    public function setExtension(?string $extension): void
    {
        $this->extension = $extension;
    }

    public function getReportsTo(): ?string
    {
        return $this->reportsTo;
    }

    public function setReportsTo(?string $reportsTo): void
    {
        $this->reportsTo = $reportsTo;
    }

    public function getNotes(): ?StringArray
    {
        return $this->notes;
    }

    public function setNotes(?StringArray $notes): void
    {
        $this->notes = $notes;
    }

    public function getTerritories(): ?StringArray
    {
        return $this->territories;
    }

    public function setTerritories(?StringArray $territories): void
    {
        $this->territories = $territories;
    }
}
