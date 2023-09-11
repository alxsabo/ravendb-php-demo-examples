<?php

namespace RavenDB\Demo\common\models;

class Supplier
{
    private ?String $id = null;
    private ?Contact $contact = null;
    private ?String $name = null;
    private ?Address $address = null;
    private ?String $phone = null;
    private ?String $fax = null;
    private ?String $homePage = null;

    public function getId(): ?string
    {
        return $this->id;
    }

    public function setId(?string $id): void
    {
        $this->id = $id;
    }

    public function getContact(): ?Contact
    {
        return $this->contact;
    }

    public function setContact(?Contact $contact): void
    {
        $this->contact = $contact;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): void
    {
        $this->name = $name;
    }

    public function getAddress(): ?Address
    {
        return $this->address;
    }

    public function setAddress(?Address $address): void
    {
        $this->address = $address;
    }

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function setPhone(?string $phone): void
    {
        $this->phone = $phone;
    }

    public function getFax(): ?string
    {
        return $this->fax;
    }

    public function setFax(?string $fax): void
    {
        $this->fax = $fax;
    }

    public function getHomePage(): ?string
    {
        return $this->homePage;
    }

    public function setHomePage(?string $homePage): void
    {
        $this->homePage = $homePage;
    }
}