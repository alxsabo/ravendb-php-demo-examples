<?php

namespace RavenDB\Demo\spatial\spatialIndex;

//region Usings
//endregion

use RavenDB\Demo\common\DocumentStoreHolder;
use RavenDB\Demo\common\models\Company;

class SpatialIndex
{
    public function __invoke(): array
    {
        //region Demo
        $companiesNearSeattle = [];

        $session = DocumentStoreHolder::getStore()->openSession();
        try {
        //region Step_5
        $wktPolygon = "POLYGON ((-125.06868394091362 41.855902525062724," .
            " -109.99544175341362 41.888625730467275," .
            " -116.76301987841362 50.59949235579767,"  .
            " -125.26643784716362 50.592518406260766," .
            " -125.06868394091362 41.855902525062724))";
            //endregion

            $seattleLatitude = 47.6062;
            $seattleLongitude = -122.3321;

            //region Step_6
            $companiesNearSeattle = $session->query(Company::class, Companies_ByLocation::class)
                ->spatial("LocationCoordinates", function($spatialCriteria) use ($wktPolygon) { return $spatialCriteria->within($wktPolygon); })
                ->orderByDistance("LocationCoordinates", $seattleLatitude, $seattleLongitude)
                ->toList();
            //endregion
        } finally {
            $session->close();
        }
        //endregion

        return $companiesNearSeattle;
    }
}