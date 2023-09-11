<?php

namespace RavenDB\Demo\basics\loadAndEditDocument;

class RunParams
{
    private ?String $companyName = null;

    public function getCompanyName(): ?string
    {
        return $this->companyName;
    }

    public function setCompanyName(?string $companyName): void
    {
        $this->companyName = $companyName;
    }
}