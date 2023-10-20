<?php

namespace RavenDB\Demo\common\models;

use DateTime;
use RavenDB\Type\StringList;

class LastFm
{
    private ?string $id = null;
    private ?string $artist = null;
    private ?string $trackId = null;
    private ?string $title = null;
    private ?DateTime $timeStamp = null;
    private ?StringList $tags = null;

    public function getId(): ?string
    {
        return $this->id;
    }

    public function setId(?string $id): void
    {
        $this->id = $id;
    }

    public function getArtist(): ?string
    {
        return $this->artist;
    }

    public function setArtist(?string $artist): void
    {
        $this->artist = $artist;
    }

    public function getTrackId(): ?string
    {
        return $this->trackId;
    }

    public function setTrackId(?string $trackId): void
    {
        $this->trackId = $trackId;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(?string $title): void
    {
        $this->title = $title;
    }

    public function getTimeStamp(): ?DateTime
    {
        return $this->timeStamp;
    }

    public function setTimeStamp(?DateTime $timeStamp): void
    {
        $this->timeStamp = $timeStamp;
    }

    public function getTags(): ?StringList
    {
        return $this->tags;
    }

    public function setTags(?StringList $tags): void
    {
        $this->tags = $tags;
    }
}
