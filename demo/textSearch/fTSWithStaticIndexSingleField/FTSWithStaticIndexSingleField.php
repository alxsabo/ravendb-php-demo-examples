<?php

namespace RavenDB\Demo\textSearch\fTSWithStaticIndexSingleField;

//region Usings
//endregion

use RavenDB\Demo\common\DocumentStoreHolder;
use RavenDB\Demo\common\models\Category;

class FTSWithStaticIndexSingleField
{
    public function __invoke(RunParams $runParams): array
    {
        $searchTerm = $runParams->getSearchTerm();

        //region Demo
        $categoriesWithSearchTerm = [];

        $session = DocumentStoreHolder::getStore()->openSession();
        try {
            //region Step_4
            $categoriesWithSearchTerm = $session->query(Category::class, Categories_DescriptionText::class)
                ->whereEquals("CategoryDescription", $searchTerm)
                ->toList();
            //endregion
        } finally {
            $session->close();
        }
        //endregion

        return $categoriesWithSearchTerm;
    }
}