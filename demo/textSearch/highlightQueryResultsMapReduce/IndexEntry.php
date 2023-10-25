<?php

namespace RavenDB\Demo\textSearch\highlightQueryResultsMapReduce;

//region Demo
//region Step_2
class IndexEntry
{
    private ?string $artist = null;
    private ?string $allSongTitles = null;

    public function getArtist(): ?string
    {
        return $this->artist;
    }

    public function setArtist(?string $artist): void
    {
        $this->artist = $artist;
    }

    public function getAllSongTitles(): ?string
    {
        return $this->allSongTitles;
    }

    public function setAllSongTitles(?string $allSongTitles): void
    {
        $this->allSongTitles = $allSongTitles;
    }
}
//endregion
//endregion