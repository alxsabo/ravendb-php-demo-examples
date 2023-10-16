<?php

namespace RavenDB\Demo\staticIndexes\storeFieldsInIndex;

//region Usings
//endregion

use DateTime;

//region Demo
//region Step_2
class OrderProjectedDetails
{
    private ?DateTime $OrderedAt = null;
    private ?int $TotalItemsOrdered = null;

    public function getOrderedAt(): ?DateTime
    {
        return $this->OrderedAt;
    }

    public function setOrderedAt(?DateTime $OrderedAt): void
    {
        $this->OrderedAt = $OrderedAt;
    }

    public function getTotalItemsOrdered(): ?int
    {
        return $this->TotalItemsOrdered;
    }

    public function setTotalItemsOrdered(null|int|string $TotalItemsOrdered): void
    {
        $this->TotalItemsOrdered = is_string($TotalItemsOrdered) ? intval($TotalItemsOrdered) : $TotalItemsOrdered;
    }
}
//endregion
//endregion