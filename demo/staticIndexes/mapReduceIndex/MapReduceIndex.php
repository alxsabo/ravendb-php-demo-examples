<?php

namespace RavenDB\Demo\staticIndexes\mapReduceIndex;

//region Usings
//endregion

use RavenDB\Demo\common\DocumentStoreHolder;

class MapReduceIndex
{
    public function __invoke(RunParams $runParams)
    {
        $country = $runParams->getCountry();
        $numberOfEmployeesFromCountry = 0;

        //region Demo
        $session = DocumentStoreHolder::getStore()->openSession();
        try {
            //region Step_5
            $queryResult = $session->query(Employees_ByCountryResult::class, Employees_ByCountry::class)
                ->whereEquals("Country", $country)
                ->firstOrDefault();

            $numberOfEmployeesFromCountry = $queryResult != null ? $queryResult->getCountryCount() : 0;
            //endregion
        } finally {
            $session->close();
        }
        //endregion

        return $numberOfEmployeesFromCountry;
    }
}