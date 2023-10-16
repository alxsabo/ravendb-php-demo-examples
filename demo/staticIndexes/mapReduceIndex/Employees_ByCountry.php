<?php

namespace RavenDB\Demo\staticIndexes\mapReduceIndex;

//region Usings
use RavenDB\Documents\Indexes\AbstractIndexCreationTask;
//endregion

//region Demo
//region Step_1
class Employees_ByCountry extends AbstractIndexCreationTask
{
//endregion
    public function __construct()
    {
        //region Step_2
        parent::__construct();

        $this->map = "docs.Employees.Select(employee => new { " .
            "    Country = employee.Address.Country, " .
            "    CountryCount = 1 " .
            "})";
        //endregion

        //region Step_3
        $this->reduce = "results.GroupBy(result => result.Country).Select(g => new { " .
            "    Country = g.Key, " .
            "    CountryCount = Enumerable.Sum(g, x => x.CountryCount) " .
            "})";
        //endregion
    }
}
//endregion
