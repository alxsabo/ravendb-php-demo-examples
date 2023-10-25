<?php

namespace RavenDB\Demo\textSearch\highlightQueryResultsMapReduce;

//region Usings
use RavenDB\Documents\Indexes\AbstractIndexCreationTask;
use RavenDB\Documents\Indexes\FieldIndexing;
use RavenDB\Documents\Indexes\FieldStorage;
use RavenDB\Documents\Indexes\FieldTermVector;

//endregion

//region Demo
//region Step_1
class ArtistsAllSongs extends AbstractIndexCreationTask
//endregion
{
    public function __construct()
    {
        parent::__construct();

        //region Step_3
        $this->map = "docs.LastFms.Select(song => new {" .
            "    Artist = song.Artist," .
            "    AllSongTitles = song.Title" .
            "})";
        //endregion

        //region Step_4
        $this->reduce = "results.GroupBy(result => result.Artist).Select(g => new {" .
            "    Artist = g.Key," .
            "    AllSongTitles = String.Join(\" \", g.Select(x => x.AllSongTitles))" .
            "})";
        //endregion

        //region Step_5
        $this->store("Artist", FieldStorage::yes());

        $this->store("AllSongTitles", FieldStorage::yes());
        $this->index("AllSongTitles", FieldIndexing::search());
        $this->termVector("AllSongTitles", FieldTermVector::withPositionsAndOffsets());
        //endregion
    }
}
//endregion
