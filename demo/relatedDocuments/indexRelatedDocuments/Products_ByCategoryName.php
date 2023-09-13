<?php

namespace RavenDB\Demo\relatedDocuments\indexRelatedDocuments;

//region Usings
use RavenDB\Documents\Indexes\AbstractIndexCreationTask;
//endregion

//region Demo
//region Step_1
class Products_ByCategoryName extends AbstractIndexCreationTask
{
//endregion

    //region Step_2
    public function __construct() {
        parent::__construct();

        $this->map = 'docs.products.Select(product => new { ' .
            '    CategoryName = (this.LoadDocument(product.Category, "Categories")).Name ' .
            '})';
    }
    //endregion
}
//endregion
