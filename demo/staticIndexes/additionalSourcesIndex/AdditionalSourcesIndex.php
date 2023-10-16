<?php

namespace RavenDB\Demo\staticIndexes\additionalSourcesIndex;

//region Usings
//endregion

use RavenDB\Demo\common\DocumentStoreHolder;
use RavenDB\Demo\common\models\Product;

class AdditionalSourcesIndex
{
    public function __invoke(RunParams $runParams): array
    {
        $price = $runParams->getPrice() ?? 5;

        //region Demo
        $lowCostProducts = [];
        //region Step_5
        $session = DocumentStoreHolder::getStore()->openSession();
        try {
            $lowCostProducts = $session->query(Product::class, Products_ByPrice::class)
                ->whereLessThan("SalePrice", $price)
                ->orderBy("SalePrice")
                ->toList();
        } finally {
            $session->close();
        }
        //endregion
        //endregion

        // Manipulate results to show because index fields are Not stored.
        $productsData = [];
        /** @var Product $item */
        foreach ($lowCostProducts as $item) {
            $dataToShow = new DataToShow();
            $dataToShow->setProductName($item->getName());
            $dataToShow->setOriginalPrice($item->getPricePerUnit());
            $dataToShow->setSalesPrice($item->getPricePerUnit() - $item->getPricePerUnit() / 100 * 25);
            $dataToShow->setProfitPrice($item->getPricePerUnit() + $item->getPricePerUnit() / 100 * 25);
            $productsData[] = $dataToShow;
        }

        return $productsData;
    }
}