<?php

namespace RavenDB\Demo\compareExchange\indexCompareExchange;

//region Usings
//endregion

use RavenDB\Demo\common\DocumentStoreHolder;
use RavenDB\Demo\common\models\Product;

class IndexCompareExchange
{
    public function __invoke(RunParams $runParams): array
    {
        $minValue = $runParams->getMinValue();

        //region demo
        $products = [];

        $session = DocumentStoreHolder::getStore()->openSession();
        try {
            //region Step_4
            $products = $session->query(IndexEntry::class, Products_ByUnitsInStock::class)
                ->whereGreaterThan("UnitsInStock" , $minValue)
                ->ofType(Product::class)
                ->toList();
            //endregion
        } finally {
            $session->close();
        }
        //endregion

        return $products;
    }
}