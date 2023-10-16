<?php

namespace RavenDB\Demo\staticIndexes\storeFieldsInIndex;

//region Usings
//endregion

//region Demo
//region Step_2
class IndexEntry
{
    private ?string $Company = null;
    private ?int $TotalItemsOrdered = null;

    public function getCompany(): ?string
    {
        return $this->Company;
    }

    public function setCompany(?string $Company): void
    {
        $this->Company = $Company;
    }

    public function getTotalItemsOrdered(): ?int
    {
        return $this->TotalItemsOrdered;
    }

    public function setTotalItemsOrdered(?int $TotalItemsOrdered): void
    {
        $this->TotalItemsOrdered = $TotalItemsOrdered;
    }
}
//endregion
//endregion