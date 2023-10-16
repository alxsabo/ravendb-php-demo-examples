<?php

namespace RavenDB\Demo\staticIndexes\mapIndex;

//region Usings
use RavenDB\Documents\Indexes\AbstractIndexCreationTask;
//endregion

//region Demo
//region Step_1
class Employees_ImportantDetails extends AbstractIndexCreationTask
{
//endregion
    //region Step_2
    public function __construct()
    {
        parent::__construct();
        $this->map = "docs.Employees.Select(employee => new { " .
            "    FullName = (employee.FirstName + \" \") + employee.LastName, " .
            "    Country = employee.Address.Country, " .
            "    WorkingInCompanySince = employee.HiredAt.Year, " .
            "    NumberOfTerritories = employee.Territories.Count " .
            "})";
    }
    //endregion
}
//endregion
