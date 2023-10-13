<?php

namespace RavenDB\Demo\queries\queryByDocumentId;

class RunParams
{
    private ?string $employeeDocumentId = null;

    public function getEmployeeDocumentId(): ?string
    {
        return $this->employeeDocumentId;
    }

    public function setEmployeeDocumentId(?string $employeeDocumentId): void
    {
        $this->employeeDocumentId = $employeeDocumentId;
    }
}