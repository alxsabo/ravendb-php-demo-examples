<?php

namespace RavenDB\Demo\textSearch\fTSWithStaticIndexMultipleFields;

//region Usings
use RavenDB\Documents\Indexes\AbstractIndexCreationTask;
use RavenDB\Documents\Indexes\FieldIndexing;
//endregion

//region Demo
//region Step_1
class Song_TextData extends AbstractIndexCreationTask
{
//endregion
    public function __construct()
    {
        parent::__construct();

        //region Step_2
        $this->map = "docs.LastFms.Select(song => new { " .
            "    SongData = new object[] { " .
            "        song.Artist, " .
            "        song.Title, " .
            "        song.Tags, " .
            "        song.TrackId " .
            "    } " .
            "})";
        //endregion

        //region Step_3
        $this->index("SongData", FieldIndexing::search());
        //endregion
    }
}
//endregion