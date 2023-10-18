<?php

namespace RavenDB\Demo\javascriptIndexes\javascriptMapIndex;

//region using
use RavenDB\Documents\Indexes\AbstractJavaScriptIndexCreationTask;
//endregion

//region Demo
//region Step_1
class Employees_ByImportantDetailsJS extends AbstractJavaScriptIndexCreationTask
{
//endregion
    //region Step_3
    public function __construct()
    {
        parent::__construct();

        $this->setMaps([
                "map('Employees', function (employee) {" .
                "   return {" .
                "       FullName: employee.FirstName + ' ' + employee.LastName," .
                "       Country: employee.Address.Country," .
                "       WorkingInCompanySince: new Date(employee.HiredAt).getFullYear()," .
                "       NumberOfTerritories: employee.Territories.length" .
                "   };" .
                "})"
            ]);
    }
    //endregion
}
//endregion
