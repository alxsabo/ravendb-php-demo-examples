<?php

namespace RavenDB\Demo\multiMapIndex\multiMapIndexBasic;

//region Usings
//endregion

use RavenDB\Demo\common\DocumentStoreHolder;

class MultiMapIndexBasic
{
    public function __invoke(RunParams $runParams): array
    {
        $namePrefix = $runParams->getNamePrefix() ?? "A";

        //region Demo
        $companiesAndSuppliersNames = [];

        //region Step_4
        $session = DocumentStoreHolder::getStore()->openSession();
        try {
            $companiesAndSuppliersNames = $session->query(IndexEntry::class, CompaniesAndSuppliers_ByName::class)
                ->whereStartsWith("Name", $namePrefix)
                ->toList();
        } finally {
            $session->close();
        }
        //endregion
        //endregion

        return $companiesAndSuppliersNames;
    }
}