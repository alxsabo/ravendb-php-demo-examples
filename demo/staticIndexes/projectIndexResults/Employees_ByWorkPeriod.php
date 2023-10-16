<?php

namespace RavenDB\Demo\staticIndexes\projectIndexResults;

//region Usings
use RavenDB\Documents\Indexes\AbstractIndexCreationTask;
//endregion

//region Demo
//region Step_1
class Employees_ByWorkPeriod extends AbstractIndexCreationTask
{
//endregion

    //region Step_4
    public function __construct()
    {
        parent::__construct();
        $this->map =
            "docs.Employees.Select(employee => new {" .
            "      WorkingInCompanySince = employee.HiredAt.Year" .
            "})";
    }
    //endregion
}
//endregion