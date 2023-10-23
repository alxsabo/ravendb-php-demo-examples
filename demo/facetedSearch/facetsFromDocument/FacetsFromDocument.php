<?php

namespace RavenDB\Demo\facetedSearch\facetsFromDocument;

//region Usings
use RavenDB\Documents\Queries\Facets\Facet;
use RavenDB\Documents\Queries\Facets\FacetResult;
use RavenDB\Documents\Queries\Facets\FacetSetup;
use RavenDB\Documents\Queries\Facets\FacetValue;
use RavenDB\Documents\Queries\Facets\RangeFacet;
//endregion

use RavenDB\Demo\common\DocumentStoreHolder;
use RavenDB\Demo\common\models\Product;

class FacetsFromDocument
{
    public function __invoke(RunParams $runParams): array
    {
        $range1 = $runParams->getRange1() ?? 25;
        $range2 = $runParams->getRange2() ?? 50;
        $range3 = $runParams->getRange3() ?? 100;

        $facetsResults = [];

        //region Demo
        $queryResults = null;

        $session = DocumentStoreHolder::getStore()->openSession();
        try {

            //region Step_2
            $facetSetup = new FacetSetup();
            $facetSetup->setId("myFacetSetupDocumentID");

            $facet = new Facet();
            $facet->setFieldName("Category");
            $facetSetup->setFacets([ $facet ]);

            $rangeFacet = new RangeFacet();
            $rangeFacet->setRanges([
                    "PricePerUnit < " . $range1,
                    "PricePerUnit >= " . $range1 . " and PricePerUnit < " . $range2,
                    "PricePerUnit >= " . $range2 . " and PricePerUnit < " . $range3,
                    "PricePerUnit >= " . $range3
                ]);
            $facetSetup->setRangeFacets([ $rangeFacet ]);
            //endregion

            //region Step_3
            $session->store($facetSetup);
            $session->saveChanges();
            //endregion

            //region Step_4
            $queryResults = $session->query(Product::class, Products_ByCategoryAndPrice::class)
                ->aggregateUsing("myFacetSetupDocumentID")
                ->execute();
            //endregion
        } finally {
            $session->close();
        }
        //endregion

        /** @var FacetResult $result */
        foreach ($queryResults as $result) {
            $facetName = $result->getName();
            /** @var FacetValue $item */
            foreach ($result->getValues() as $item) {
                $facetResult = new MyFacetResult();
                $facetResult->setFacetName($facetName); // i.e. PricePerUnit
                $facetResult->setFacetRange($item->getRange()); // i.e. PricePerUnit < 50
                $facetResult->setFacetCount($item->getCount());

                $facetsResults[] = $facetResult;
            }
        }

        return $facetsResults;
    }
}