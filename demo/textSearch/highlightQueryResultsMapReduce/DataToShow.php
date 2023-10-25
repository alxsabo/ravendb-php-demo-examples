<?php

namespace RavenDB\Demo\textSearch\highlightQueryResultsMapReduce;

class DataToShow
{
    private ?string $artist = null;
    private ?string $songFragment = null;

    public function getArtist(): ?string
    {
        return $this->artist;
    }

    public function setArtist(?string $artist): void
    {
        $this->artist = $artist;
    }

    public function getSongFragment(): ?string
    {
        return $this->songFragment;
    }

    public function setSongFragment(?string $songFragment): void
    {
        $this->songFragment = $songFragment;
    }
}