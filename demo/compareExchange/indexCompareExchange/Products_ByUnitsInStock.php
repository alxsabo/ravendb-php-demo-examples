<?php

namespace RavenDB\Demo\compareExchange\indexCompareExchange;

//region Usings
use RavenDB\Documents\Indexes\AbstractIndexCreationTask;
//endregion

//region demo
//region Step_1
class Products_ByUnitsInStock extends AbstractIndexCreationTask
{
//endregion

    //region Step_3
    public function __construct()
    {
        parent::__construct();

        $this->map = "docs.Products.Select(product => new {" .
            "    UnitsInStock = this.LoadCompareExchangeValue(Id(product))" .
            "})";
    }
    //endregion
}
//endregion