<?php

namespace RavenDB\Demo\textSearch\highlightQueryResultsCustomized;

//region Usings
use RavenDB\Documents\Indexes\AbstractIndexCreationTask;
use RavenDB\Documents\Indexes\FieldIndexing;
use RavenDB\Documents\Indexes\FieldStorage;
use RavenDB\Documents\Indexes\FieldTermVector;
//endregion

//region Demo
//region Step_1
class EmployeesDetails extends AbstractIndexCreationTask
{
//endregion

    public function __construct()
    {
        parent::__construct();

        //region Step_2
        $this->map = "docs.Employees.Select(employee => new {" .
            "    Title = employee.Title," .
            "    Notes = employee.Notes[0]" .
            // employee.Notes is a string array,
            // indexing only the first element for this example
            "})";
        //endregion

        //region Step_3
        $this->store("Title", FieldStorage::yes());
        $this->index("Title", FieldIndexing::search());
        $this->termVector("Title", FieldTermVector::withPositionsAndOffsets());

        $this->store("Notes", FieldStorage::yes());
        $this->index("Notes", FieldIndexing::search());
        $this->termVector("Notes", FieldTermVector::withPositionsAndOffsets());
        //endregion
    }
}
//endregion