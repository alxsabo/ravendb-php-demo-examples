<?php

namespace RavenDB\Demo\multiMapIndex\multiMapIndexCustomizedFields;

//region Usings
use RavenDB\Documents\Indexes\AbstractMultiMapIndexCreationTask;
use RavenDB\Documents\Indexes\FieldStorage;
//endregion

//region Demo
//region Step_1
class Contacts_ByNameAndTitle extends AbstractMultiMapIndexCreationTask
{
//endregion
    public function __construct()
    {
        parent::__construct();

        //region Step_4
        $this->addMap("docs.Employees.Select(employee => new {" .
            "    ContactName = (employee.FirstName + \" \") + employee.LastName," .
            "    ContactTitle = employee.Title," .
            "    Collection = this.MetadataFor(employee)[\"@collection\"]" .
            "})");

        $this->addMap("docs.Companies.Select(company => new {" .
            "    ContactName = company.Contact.Name," .
            "    ContactTitle = company.Contact.Title," .
            "    Collection = this.MetadataFor(company)[\"@collection\"]" .
            "})");

        $this->addMap("docs.Suppliers.Select(supplier => new {" .
            "    ContactName = supplier.Contact.Name," .
            "    ContactTitle = supplier.Contact.Title," .
            "    Collection = this.MetadataFor(supplier)[\"@collection\"]" .
            "})");
        //endregion
        //region Step_5
        $this->store("ContactName", FieldStorage::yes());
        $this->store("ContactTitle", FieldStorage::yes());
        $this->store("Collection", FieldStorage::yes());
        //endregion
    }
}
//endregion