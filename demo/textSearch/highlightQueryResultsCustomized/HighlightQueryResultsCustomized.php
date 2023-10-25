<?php

namespace RavenDB\Demo\textSearch\highlightQueryResultsCustomized;

//region Usings
use RavenDB\Demo\common\DocumentStoreHolder;
use RavenDB\Demo\common\models\Employee;
use RavenDB\Documents\Queries\Highlighting\HighlightingOptions;
use RavenDB\Documents\Queries\Highlighting\Highlightings;
//endregion

class HighlightQueryResultsCustomized
{
    public function __invoke(RunParams $runParams)
    {
        $fragmentLength = $runParams->getFragmentLength() ?? 100;
        $fragmentCount = $runParams->getFragmentCount() ?? 1;

        $tag1 = $runParams->getTag1() ?? "+++";
        $tag2 = $runParams->getTag2() ?? "+++";
        $tag3 = $runParams->getTag3() ?? "<<<";
        $tag4 = $runParams->getTag4() ?? ">>>";

        $titleHighlightings = new Highlightings();
        $notesHighlightings = new Highlightings();
        //region Demo
        $employeesResults = [];

        $session = DocumentStoreHolder::getStore()->openSession();
        try {

        //region Step_4
        $tagsToUse1 = new HighlightingOptions();
            $tagsToUse1->setPreTags([ $tag1 ]);
            $tagsToUse1->setPostTags([ $tag2 ]);

            $tagsToUse2 = new HighlightingOptions();
            $tagsToUse2->setPreTags([ $tag3 ]);
            $tagsToUse2->setPostTags([ $tag4 ]);
            //endregion

            //region Step_5
            $employeesResults = $session->query(Employee::class, EmployeesDetails::class)
                ->highlight("Title", $fragmentLength, $fragmentCount, $tagsToUse1, $titleHighlightings)
                ->highlight("Notes", $fragmentLength, $fragmentCount, $tagsToUse2, $notesHighlightings)
                ->search("Title", "manager")
                ->search("Notes", "sales")
                ->toList();
            //endregion

            //region Step_6
            if (count($employeesResults) > 0) {
                $employeeId = $employeesResults[0]->getId();
                $titleFragments = $titleHighlightings->getFragments($employeeId);
                $notesFragments = $notesHighlightings->getFragments($employeeId);
            }
            //endregion
        } finally {
            $session->close();
        }
        //endregion

        $highlightResults = [];

        /** @var Employee $employee */
        foreach ($employeesResults as $employee) {
            $titleFragments = $titleHighlightings->getFragments($employee->getId());

            foreach ($titleFragments as $item) {
                $itemResults = new DataToShow();
                $itemResults->setDocumentId($employee->getId());
                $itemResults->setIndexField($titleHighlightings->getFieldName());
                $itemResults->setFragment($item);

                $highlightResults[] = $itemResults;
            }

            $notesFragments = $notesHighlightings->getFragments($employee->getId());
            foreach ($notesFragments as $item) {
                $itemResults = new DataToShow();
                $itemResults->setDocumentId($employee->getId());
                $itemResults->setIndexField($notesHighlightings->getFieldName());
                $itemResults->setFragment($item);

                $highlightResults[] = $itemResults;
            }
        }

        usort($highlightResults, function(DataToShow $a, DataToShow $b) {
            return $a->getIndexField() < $b->getIndexField();
        });
        return $highlightResults;
    }
}