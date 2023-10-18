<?php

namespace RavenDB\Demo\multiMapIndex\multiMapIndexCustomizedFields;

//region Usings
//endregion

//region Demo
//region Step_2
class IndexEntry
{
    public ?string $ContactName = null;
    public ?string $ContactTitle = null;
    public ?string $Collection = null;

    public function getContactName(): ?string
    {
        return $this->ContactName;
    }

    public function setContactName(?string $ContactName): void
    {
        $this->ContactName = $ContactName;
    }

    public function getContactTitle(): ?string
    {
        return $this->ContactTitle;
    }

    public function setContactTitle(?string $ContactTitle): void
    {
        $this->ContactTitle = $ContactTitle;
    }

    public function getCollection(): ?string
    {
        return $this->Collection;
    }

    public function setCollection(?string $Collection): void
    {
        $this->Collection = $Collection;
    }
}
//endregion
//endregion