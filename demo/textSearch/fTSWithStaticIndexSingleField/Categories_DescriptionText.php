<?php

namespace RavenDB\Demo\textSearch\fTSWithStaticIndexSingleField;

//region Usings
use RavenDB\Documents\Indexes\AbstractIndexCreationTask;
use RavenDB\Documents\Indexes\FieldIndexing;
//endregion

//region Demo
//region Step_1
class Categories_DescriptionText extends AbstractIndexCreationTask
{
//endregion
    public function __construct()
    {
        parent::__construct();

        //region Step_2
        $this->map = "docs.Categories.Select(category => new { " .
            "    CategoryDescription = category.Description " .
            "})";
        //endregion

        //region Step_3
        $this->index("CategoryDescription", FieldIndexing::search());
        //endregion
    }
}
//endregion