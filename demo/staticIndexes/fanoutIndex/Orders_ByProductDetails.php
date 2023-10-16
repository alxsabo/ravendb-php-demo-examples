<?php

namespace RavenDB\Demo\staticIndexes\fanoutIndex;

//region Usings
use RavenDB\Documents\Indexes\AbstractIndexCreationTask;
//endregion

//region Demo
//region Step_1
class Orders_ByProductDetails extends AbstractIndexCreationTask
{
//endregion

    //region Step_3
    public function __construct()
    {
        parent::__construct();
            $this->map = "docs.Orders.SelectMany(order => order.Lines, (order, orderLine) => new {" .
                "    ProductId = orderLine.Product," .
                "    ProductName = orderLine.ProductName" .
                "})";
        }
    //endregion
}
//endregion
