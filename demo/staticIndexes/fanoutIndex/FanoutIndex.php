<?php

namespace RavenDB\Demo\staticIndexes\fanoutIndex;

//region Usings
//endregion

use RavenDB\Demo\common\DocumentStoreHolder;
use RavenDB\Demo\common\models\Order;

class FanoutIndex
{
    public function __invoke(RunParams $runParams): array
    {
        $namePrefix = $runParams->getNamePrefix() ?? "Chocolade";

        //region Demo
        $orders = [];

        //region Step_4
        $session = DocumentStoreHolder::getStore()->openSession();
        try {

            $orders = $session->query(Order::class, Orders_ByProductDetails::class)
                ->whereStartsWith("ProductName", $namePrefix)
                ->toList();
        } finally {
            $session->close();
        }
        //endregion
        //endregion

        return $orders;
    }
}