<?php

namespace RavenDB\Demo\textSearch\fTSWithStaticIndexMultipleFields;

//region Usings
//endregion

use RavenDB\Demo\common\DocumentStoreHolder;
use RavenDB\Demo\common\models\LastFm;

class FTSWithStaticIndexMultipleFields
{
    public function __invoke(RunParams $runParams): array
    {
        $searchTerm = $runParams->getSearchTerm();

        //region Demo
        $results = [];

        $session = DocumentStoreHolder::getMediaStore()->openSession();
        try {
            //region Step_4
            $results = $session->query(LastFm::class, Song_TextData::class)
                ->search("SongData", $searchTerm)
                ->take(20)
                ->toList();
            //endregion
        } finally {
            $session->close();
        }
        //endregion

        return $results;
    }
}