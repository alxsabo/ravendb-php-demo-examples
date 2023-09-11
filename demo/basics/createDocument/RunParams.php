<?php

namespace RavenDB\Demo\basics\createDocument;

class RunParams
{
    private ?String $companyName = null;
    private ?String $companyPhone = null;
    private ?String $contactName = null;
    private ?String $contactTitle = null;

    public function getCompanyName(): ?string
    {
        return $this->companyName;
    }

    public function setCompanyName(?string $companyName): void
    {
        $this->companyName = $companyName;
    }

    public function getCompanyPhone(): ?string
    {
        return $this->companyPhone;
    }

    public function setCompanyPhone(?string $companyPhone): void
    {
        $this->companyPhone = $companyPhone;
    }

    public function getContactName(): ?string
    {
        return $this->contactName;
    }

    public function setContactName(?string $contactName): void
    {
        $this->contactName = $contactName;
    }

    public function getContactTitle(): ?string
    {
        return $this->contactTitle;
    }

    public function setContactTitle(?string $contactTitle): void
    {
        $this->contactTitle = $contactTitle;
    }

}