<?php

namespace RavenDB\Demo\relatedDocuments\loadRelatedDocuments;

class RunParams
{
    private ?float $pricePerUnit = null;
    private ?String $phone = null;

    public function getPricePerUnit(): ?float
    {
        return $this->pricePerUnit;
    }

    public function setPricePerUnit(?float $pricePerUnit): void
    {
        $this->pricePerUnit = $pricePerUnit;
    }

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function setPhone(?string $phone): void
    {
        $this->phone = $phone;
    }
}