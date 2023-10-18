<?php

namespace RavenDB\Demo\multiMapIndex\multiMapReduceIndex;

//region Usings
//endregion

use RavenDB\Demo\common\DocumentStoreHolder;

class MultiMapReduceIndex
{
    public function __invoke(RunParams $runParams): array
    {
        $minCompaniesCount = $runParams->getMinCompaniesCount() ?? 5;
        $minItemsCount = $runParams->getMinItemsCount() ?? 2000;
        //region Demo
        //region Step_5
        $commerceDetails = [];

        $session = DocumentStoreHolder::getStore()->openSession();
        try {
            $commerceDetails = $session->query(IndexEntry::class, CityCommerceDetails::class)
                ->whereGreaterThan("NumberOfCompaniesInCity", $minCompaniesCount)
                ->orElse()
                ->whereGreaterThan("NumberOfItemsShippedToCity", $minItemsCount)
                ->orderBy("CityName")
                ->toList();
        } finally {
            $session->close();
        }
        //endregion
        //endregion

        return $commerceDetails;
    }
}