<?php

namespace RavenDB\Demo\multiMapIndex\multiMapIndexBasic;

//region Usings
use RavenDB\Documents\Indexes\AbstractMultiMapIndexCreationTask;
//endregion

//region Demo
//region Step_1
class CompaniesAndSuppliers_ByName extends AbstractMultiMapIndexCreationTask
{
//endregion

    //region Step_3
    public function __construct()
    {
        parent::__construct();

        $this->addMap("docs.Companies.Select(company => new {" .
            "    Name = company.Name" .
            "})");

        $this->addMap("docs.Suppliers.Select(supplier => new {" .
            "    Name = supplier.Name" .
            "})");
    }
    //endregion

}
//endregion