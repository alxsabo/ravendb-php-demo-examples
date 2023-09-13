<?php

namespace RavenDB\Demo\relatedDocuments\createRelatedDocuments;

class RunParams
{
    private ?String $supplierName = null;
    private ?String $supplierPhone = null;
    private ?String $productName = null;

    public function getSupplierName(): ?string
    {
        return $this->supplierName;
    }

    public function setSupplierName(?string $supplierName): void
    {
        $this->supplierName = $supplierName;
    }

    public function getSupplierPhone(): ?string
    {
        return $this->supplierPhone;
    }

    public function setSupplierPhone(?string $supplierPhone): void
    {
        $this->supplierPhone = $supplierPhone;
    }

    public function getProductName(): ?string
    {
        return $this->productName;
    }

    public function setProductName(?string $productName): void
    {
        $this->productName = $productName;
    }
}