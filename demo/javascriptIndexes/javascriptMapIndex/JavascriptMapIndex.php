<?php

namespace RavenDB\Demo\javascriptIndexes\javascriptMapIndex;

//region using
//endregion

use RavenDB\Demo\common\DocumentStoreHolder;
use RavenDB\Demo\common\models\Employee;

class JavascriptMapIndex
{
    public function __invoke(RunParams $runParams): array
    {
        $startYear = $runParams->getStartYear();

        //region Demo
        $employeesFromUSA = [];
        $session = DocumentStoreHolder::getStore()->openSession();
        try {
            //region Step_4
            $employeesFromUSA = $session->query(IndexEntry::class, Employees_ByImportantDetailsJS::class)
                ->whereEquals("Country", "USA")
                ->whereGreaterThan("WorkingInCompanySince", $startYear)
                ->selectFields(Employee::class)
                ->toList();
            //endregion
        } finally {
            $session->close();
        }
        //endregion
        return $employeesFromUSA;
    }
}