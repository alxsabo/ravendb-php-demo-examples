<?php

namespace RavenDB\Demo\facetedSearch\facetsBasics;

//region Usings
use RavenDB\Documents\Indexes\AbstractIndexCreationTask;
//endregion

//region demo
//region Step_1
class Products_ByCategoryAndPrice extends AbstractIndexCreationTask
{
    public function __construct()
    {
        parent::__construct();

        $this->map = "docs.Products.Select(product => new {" .
            "    CategoryName = (this.LoadDocument(product.Category, \"Categories\")).Name," .
            "    PricePerUnit = product.PricePerUnit" .
            "})";
    }
}
//endregion
//endregion