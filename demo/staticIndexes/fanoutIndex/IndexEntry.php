<?php

namespace RavenDB\Demo\staticIndexes\fanoutIndex;

//region Demo
//region Step_2
class IndexEntry
{
    private ?string $productId = null;
    private ?string $productName = null;

    public function getProductId(): ?string
    {
        return $this->productId;
    }

    public function setProductId(?string $productId): void
    {
        $this->productId = $productId;
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
//endregion
//endregion