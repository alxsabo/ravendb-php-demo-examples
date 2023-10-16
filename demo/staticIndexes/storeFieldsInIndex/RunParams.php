<?php

namespace RavenDB\Demo\staticIndexes\storeFieldsInIndex;

class RunParams
{
    private ?string $companyId = null;

    public function getCompanyId(): ?string
    {
        return $this->companyId;
    }

    public function setCompanyId(?string $companyId): void
    {
        $this->companyId = $companyId;
    }
}