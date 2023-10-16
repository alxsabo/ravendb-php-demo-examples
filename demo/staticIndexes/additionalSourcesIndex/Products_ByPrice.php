<?php

namespace RavenDB\Demo\staticIndexes\additionalSourcesIndex;

//region Usings
use RavenDB\Documents\Indexes\AbstractIndexCreationTask;
use RavenDB\Documents\Indexes\AdditionalSourcesArray;

//endregion

//region Demo
//region Step_1
class Products_ByPrice extends AbstractIndexCreationTask
{
//endregion

    public function __construct()
    {
        parent::__construct();

        //region Step_3
        $this->map = "docs.Products.Select(product => new {" .
            "    ProductName = product.Name," .
            "    OriginalPrice = product.PricePerUnit," .
            "    SalePrice = DiscountUtils.CalcSalePrice(product.PricePerUnit)," .
            "    ProfitPrice = DiscountUtils.CalcProfitPrice(product.PricePerUnit)" .
            "})";
        //endregion

        //region Step_4
        $this->setAdditionalSources(["DiscountLogic" => self::ADDITIONAL_SOURCE]);
        //endregion
    }

    //region Step_6
    public const ADDITIONAL_SOURCE = "public static class DiscountUtils" .
        "{" .
        "    public static decimal CalcSalePrice(decimal price)" .
        "    {" .
        "        return price - price / 100M * 25M;" .
        "    }" .
        "     " .
        "    public static decimal CalcProfitPrice(decimal price)" .
        "    {" .
        "        return price + price / 100M * 25M;" .
        "    }" .
        "}";
    //endregion

}
//endregion
