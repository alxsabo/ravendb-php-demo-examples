<?php

namespace RavenDB\Demo\textSearch\highlightQueryResultsBasics;

//region Usings
use RavenDB\Demo\common\DocumentStoreHolder;
use RavenDB\Demo\common\models\Employee;
use RavenDB\Documents\Queries\Highlighting\Highlightings;
use RavenDB\Documents\Queries\Query;
use RavenDB\Documents\Session\DocumentQuery;

//endregion

class HighlightQueryResultsBasics
{
    public function __invoke(RunParams $runParams): array
    {
        $fragmentLength = $runParams->getFragmentLength();
        $fragmentCount = $runParams->getFragmentCount();
        $notesHighlightings = new Highlightings();

        //region Demo
        $employeesResults = [];

        $session = DocumentStoreHolder::getStore()->openSession();
        try {
            //region Step_4
            $employeesResults = $session->query(Employee::class, Query::index("EmployeesDetails"))
                    ->highlight("Notes", $fragmentLength, $fragmentCount, null, $notesHighlightings)
                    ->search("Notes", "sales")
                    ->toList();
            //endregion

            //region Step_5
            if (count($employeesResults) > 0) {
                $employeeId = $employeesResults[0]->getId();
                $notesFragments = $notesHighlightings->getFragments($employeeId);
            }
            //endregion
        } finally {
            $session->close();
        }
        //endregion
        return $employeesResults;
    }
}