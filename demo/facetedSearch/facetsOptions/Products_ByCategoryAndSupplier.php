<?php

namespace RavenDB\Demo\facetedSearch\facetsOptions;

//region Usings
use RavenDB\Documents\Indexes\AbstractIndexCreationTask;

//endregion

//region Demo
//region Step_1
class Products_ByCategoryAndSupplier extends AbstractIndexCreationTask
{
    public function __construct()
    {
        parent::__construct();

        $this->map = "docs.Products.Select(product => new {" .
            "    CategoryName = (this.LoadDocument(product.Category, \"Categories\")).Name," .
            "    Supplier = product.Supplier" .
            "})";
    }
}
//endregion
//endregion