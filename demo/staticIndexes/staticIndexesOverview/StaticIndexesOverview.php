<?php

namespace RavenDB\Demo\staticIndexes\staticIndexesOverview;

//region Usings
//endregion

use RavenDB\Demo\common\DocumentStoreHolder;
use RavenDB\Demo\common\models\Employee;

class StaticIndexesOverview
{
    public function __invoke()
    {
        //region Demo
        $queryResults = [];

        //region Step_3
        (new Employees_ByLastName())->execute(DocumentStoreHolder::getStore());
        //endregion

        $session = DocumentStoreHolder::getStore()->openSession();
        try {
            //region Step_4
            $queryOnIndex = $session->query(Employee::class, Employees_ByLastName::class)
                ->whereEquals("LastName", "SomeName");

            $queryResults = $queryOnIndex->toList();
            //endregion
        } finally {
            $session->close();
        }
        //endregion
    }
}