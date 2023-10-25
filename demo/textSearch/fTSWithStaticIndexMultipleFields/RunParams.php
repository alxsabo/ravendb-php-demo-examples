<?php

namespace RavenDB\Demo\textSearch\fTSWithStaticIndexMultipleFields;

class RunParams
{
    private ?string $searchTerm = null;

    public function getSearchTerm(): ?string
    {
        return $this->searchTerm;
    }

    public function setSearchTerm(?string $searchTerm): void
    {
        $this->searchTerm = $searchTerm;
    }
}