<?php

namespace RavenDB\Demo\staticIndexes\projectIndexResults;

//region Usings
use RavenDB\Documents\Queries\QueryData;
//endregion

use RavenDB\Demo\common\DocumentStoreHolder;

class ProjectIndexResults
{
    public function __invoke(RunParams $runParams): array
    {
        $startYear = $runParams->getStartYear();

        //region Demo
        $employeesSinceYear = [];

        $session = DocumentStoreHolder::getStore()->openSession();
        try {
            $employeesQuery = $session
                //region Step_5
                ->query(IndexEntry::class, Employees_ByWorkPeriod::class)
                ->whereGreaterThan("WorkingInCompanySince", $startYear)
                //endregion
                //region Step_6
                ->selectFields(EmployeeProjectedDetails::class,
                    QueryData::customFunction("employee ",
                        "{ FirstName: employee.FirstName," .
                        "  Phone: employee.HomePhone," .
                        "  Location: employee.Address.City + ' ' + employee.Address.Country }"));
                //endregion

            //region Step_7
            $employeesSinceYear = $employeesQuery->toList();
            //endregion
        } finally {
            $session->close();
        }
        //endregion

        return $employeesSinceYear;
    }
}