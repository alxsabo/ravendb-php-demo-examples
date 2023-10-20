<?php

namespace RavenDB\Demo\spatial\spatialIndex;

//region Usings
use RavenDB\Documents\Indexes\AbstractIndexCreationTask;
//endregion

//region Demo
//region Step_1
class Companies_ByLocation extends AbstractIndexCreationTask
{
//endregion
    public function __construct()
    {
        parent::__construct();

        //region Step_3
        $this->map = "docs.Companies.Select(company => new {" .
            "    CompanyName = company.Name," .
            "    LocationCoordinates = this.CreateSpatialField(((double ? ) company.Address.Location.Latitude), ((double ? ) company.Address.Location.Longitude))" .
            "})";
        //endregion

        //region Step_4
        $this->spatial("LocationCoordinates", function($factory) { return $factory->geography()->quadPrefixTreeIndex(5); });
        //endregion
    }
}
//endregion