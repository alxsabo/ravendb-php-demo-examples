<?php

namespace RavenDB\Demo\multiMapIndex\multiMapIndexBasic;

//region Demo
//region Step_2
class IndexEntry
{
    private ?string $name = null;

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): void
    {
        $this->name = $name;
    }
}
//endregion
//endregion