<?php

namespace RavenDB\Demo\staticIndexes\storeFieldsInIndex;

//region Usings
//endregion

use RavenDB\Demo\common\DocumentStoreHolder;

class StoreFieldsInIndex
{
    public function __invoke(RunParams $runParams): array
    {
        $companyId = $runParams->getCompanyId();
        (new OrdersQuantity_ByCompany())->execute(DocumentStoreHolder::getStore());

        //region Demo
        $ordersDetails = [];

        $session = DocumentStoreHolder::getStore()->openSession();
        try {

            $ordersQuery = $session
                //region Step_6
                ->query(IndexEntry::class, OrdersQuantity_ByCompany::class)
                ->whereEquals("Company", $companyId)
                //endregion
                //region Step_7
                ->selectFields(OrderProjectedDetails::class);
                //endregion

            //region Step_8
            $ordersDetails = $ordersQuery->toList();
            //endregion
        } finally {
            $session->close();
        }
        //endregion

        return $ordersDetails;
    }
}
