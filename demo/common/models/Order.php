<?php

namespace RavenDB\Demo\common\models;

use DateTime;

class Order
{
    private ?String $id = null;
    private ?String $company = null;
    private ?String $employee = null;
    private ?DateTime $orderedAt = null;
    private ?DateTime $requireAt = null;
    private ?DateTime $shippedAt = null;
    private ?Address $shipTo = null;
    private ?String $shipVia = null;
    private ?float $freight = null;
    private ?OrderLineList $lines = null;

    public function getId(): ?string
    {
        return $this->id;
    }

    public function setId(?string $id): void
    {
        $this->id = $id;
    }

    public function getCompany(): ?string
    {
        return $this->company;
    }

    public function setCompany(?string $company): void
    {
        $this->company = $company;
    }

    public function getEmployee(): ?string
    {
        return $this->employee;
    }

    public function setEmployee(?string $employee): void
    {
        $this->employee = $employee;
    }

    public function getOrderedAt(): ?DateTime
    {
        return $this->orderedAt;
    }

    public function setOrderedAt(?DateTime $orderedAt): void
    {
        $this->orderedAt = $orderedAt;
    }

    public function getRequireAt(): ?DateTime
    {
        return $this->requireAt;
    }

    public function setRequireAt(?DateTime $requireAt): void
    {
        $this->requireAt = $requireAt;
    }

    public function getShippedAt(): ?DateTime
    {
        return $this->shippedAt;
    }

    public function setShippedAt(?DateTime $shippedAt): void
    {
        $this->shippedAt = $shippedAt;
    }

    public function getShipTo(): ?Address
    {
        return $this->shipTo;
    }

    public function setShipTo(?Address $shipTo): void
    {
        $this->shipTo = $shipTo;
    }

    public function getShipVia(): ?string
    {
        return $this->shipVia;
    }

    public function setShipVia(?string $shipVia): void
    {
        $this->shipVia = $shipVia;
    }

    public function getFreight(): ?float
    {
        return $this->freight;
    }

    public function setFreight(?float $freight): void
    {
        $this->freight = $freight;
    }

    public function getLines(): ?OrderLineList
    {
        return $this->lines;
    }

    public function setLines(?OrderLineList $lines): void
    {
        $this->lines = $lines;
    }
}