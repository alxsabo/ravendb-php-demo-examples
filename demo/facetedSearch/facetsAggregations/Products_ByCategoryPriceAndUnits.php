<?php

namespace RavenDB\Demo\facetedSearch\facetsAggregations;

//region Usings
use RavenDB\Documents\Indexes\AbstractIndexCreationTask;
//endregion

//region demo
//region Step_1
class Products_ByCategoryPriceAndUnits extends AbstractIndexCreationTask
{
    public function __construct()
    {
        parent::__construct();

        $this->map = "docs.Products.Select(product => new {" .
            "    CategoryName = (this.LoadDocument(product.Category, \"Categories\")).Name," .
            "    PricePerUnit = product.PricePerUnit," .
            "    UnitsInStock = product.UnitsInStock" .
            "})";
    }
}
//endregion
//endregion