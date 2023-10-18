<?php

namespace RavenDB\Demo\multiMapIndex\multiMapIndexCustomizedFields;

//region Demo
//region Step_3
class ProjectedEntry extends IndexEntry
{
    public ?string $phone = null;

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function setPhone(?string $phone): void
    {
        $this->phone = $phone;
    }
}
//endregion
//endregion