<?php

namespace RavenDB\Demo\common\models;

class Region
{
    private ?String $id = null;
    private ?String $name = null;
    private ?TerritoryList $territories = null;

    public function getId(): ?string
    {
        return $this->id;
    }

    public function setId(?string $id): void
    {
        $this->id = $id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): void
    {
        $this->name = $name;
    }

    public function getTerritories(): ?TerritoryList
    {
        return $this->territories;
    }

    public function setTerritories(?TerritoryList $territories): void
    {
        $this->territories = $territories;
    }
}