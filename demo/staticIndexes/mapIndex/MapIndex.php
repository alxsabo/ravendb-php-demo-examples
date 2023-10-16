<?php

namespace RavenDB\Demo\staticIndexes\mapIndex;

//region Usings
//endregion

use RavenDB\Demo\common\DocumentStoreHolder;
use RavenDB\Demo\common\models\Employee;

class MapIndex
{
    public function __invoke(RunParams $runParams): array
    {
        $startYear = $runParams->getStartYear();

        //region Demo
        $employeesFromUSA = [];

        $session = DocumentStoreHolder::getStore()->openSession();
        try {
            //region Step_3
            $employeesFromUSA = $session->query(Employee::class, Employees_ImportantDetails::class)
                ->whereEquals("Country", "USA")
                ->whereGreaterThan("WorkingInCompanySince", $startYear)
                ->toList();
            //endregion
        } finally {
            $session->close();
        }
        //endregion

        return $employeesFromUSA;
    }
}