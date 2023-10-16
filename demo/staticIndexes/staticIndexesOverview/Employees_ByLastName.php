<?php

namespace RavenDB\Demo\staticIndexes\staticIndexesOverview;

//region Usings
use RavenDB\Documents\Indexes\AbstractIndexCreationTask;
//endregion

//region Demo
//region Step_1
class Employees_ByLastName extends AbstractIndexCreationTask
{
//endregion

    //region Step_2
    public function __construct()
    {
        parent::__construct();
        // Define:
        //    Map(s) functions
        //    Reduce function
        //    Additional indexing options per field
    }
    //endregion
}
//endregion