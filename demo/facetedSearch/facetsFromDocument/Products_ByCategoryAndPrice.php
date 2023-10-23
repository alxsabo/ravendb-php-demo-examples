<?php

namespace RavenDB\Demo\facetedSearch\facetsFromDocument;

//region Usings
use RavenDB\Documents\Indexes\AbstractIndexCreationTask;
//endregion

//region Demo
//region Step_1
class Products_ByCategoryAndPrice extends AbstractIndexCreationTask
{
    public function __construct()
    {
        parent::__construct();

        $this->map = "docs.Products.Select(product => new {" .
            "    Category = (this.LoadDocument(product.Category, \"Categories\")).Name," .
            "    PricePerUnit = product.PricePerUnit" .
            "})";
    }
}
//endregion
//endregion