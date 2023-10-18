<?php

namespace RavenDB\Demo\multiMapIndex\multiMapReduceIndex;

//region Usings
use RavenDB\Documents\Indexes\AbstractMultiMapIndexCreationTask;
//endregion

//region demo
//region Step_1
class CityCommerceDetails extends AbstractMultiMapIndexCreationTask
{
//endregion
    public function __construct()
    {
        parent::__construct();

        //region Step_3
        $this->addMap("docs.Companies.Select(company => new {" .
            "    CityName = company.Address.City," .
            "    NumberOfCompaniesInCity = 1," .
            "    NumberOfSuppliersInCity = 0," .
            "    NumberOfItemsShippedToCity = 0" .
            "})");

        $this->addMap("docs.Suppliers.Select(supplier => new {" .
            "    CityName = supplier.Address.City," .
            "    NumberOfCompaniesInCity = 0," .
            "    NumberOfSuppliersInCity = 1," .
            "    NumberOfItemsShippedToCity = 0" .
            "})");

        $this->addMap("docs.Orders.Select(order => new {" .
            "    CityName = order.ShipTo.City," .
            "    NumberOfCompaniesInCity = 0," .
            "    NumberOfSuppliersInCity = 0," .
            "    NumberOfItemsShippedToCity = Enumerable.Sum(order.Lines, x => ((int) x.Quantity))" .
            "})");
        //endregion
        //region Step_4
        $this->reduce = "results.GroupBy(result => result.CityName).Select(g => new {" .
            "    CityName = g.Key," .
            "    NumberOfCompaniesInCity = Enumerable.Sum(g, x => ((int) x.NumberOfCompaniesInCity))," .
            "    NumberOfSuppliersInCity = Enumerable.Sum(g, x0 => ((int) x0.NumberOfSuppliersInCity))," .
            "    NumberOfItemsShippedToCity = Enumerable.Sum(g, x1 => ((int) x1.NumberOfItemsShippedToCity))" .
            "})";
        //endregion
    }

}
//endregion
