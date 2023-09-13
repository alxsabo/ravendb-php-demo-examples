<?php

namespace RavenDB\Demo\relatedDocuments\indexRelatedDocuments;

//region Usings
//endregion
use RavenDB\Demo\common\DocumentStoreHolder;
use RavenDB\Demo\common\models\Product;

class IndexRelatedDocuments
{
    public function __invoke(RunParams $runParams): array
    {
        $categoryName = $runParams->getCategoryName();

        //region Demo
        $productsWithCategoryName = [];

        $session = DocumentStoreHolder::getStore()->openSession();
        try {
            //region Step_3
            $productsWithCategoryName = $session
                ->query(Product::class, Products_ByCategoryName::class)
                    ->whereEquals("CategoryName", $categoryName)
                ->toList();
            //endregion
        } finally {
            $session->close();
        }
        //endregion

        return $productsWithCategoryName;
    }
}