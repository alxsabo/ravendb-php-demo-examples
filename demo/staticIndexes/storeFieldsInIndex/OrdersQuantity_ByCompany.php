<?php

namespace RavenDB\Demo\staticIndexes\storeFieldsInIndex;

//region Usings
use RavenDB\Documents\Indexes\AbstractIndexCreationTask;
use RavenDB\Documents\Indexes\FieldStorage;
//endregion

//region Demo
//region Step_1
class OrdersQuantity_ByCompany extends AbstractIndexCreationTask
{
//endregion

    public function __construct()
    {
        //region Step_4
        parent::__construct();
        $this->map = "docs.Orders.Select(order => new { " .
            "   Company = order.Company, " .
            "   TotalItemsOrdered = Enumerable.Sum(order.Lines, orderLine => ((int) orderLine.Quantity)) " .
            "})";
        //endregion

        //region Step_5
        $this->store("TotalItemsOrdered", FieldStorage::yes());
        //endregion
    }
}
//endregion
