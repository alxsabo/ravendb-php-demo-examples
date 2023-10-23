<?php

namespace RavenDB\Demo\compareExchange\createCompareExchange;

class RunParams
{
    private ?string $cmpXchgKey = null;
    private ?string $cmpXchgValue = null;

    public function getCmpXchgKey(): ?string
    {
        return $this->cmpXchgKey;
    }

    public function setCmpXchgKey(?string $cmpXchgKey): void
    {
        $this->cmpXchgKey = $cmpXchgKey;
    }

    public function getCmpXchgValue(): ?string
    {
        return $this->cmpXchgValue;
    }

    public function setCmpXchgValue(?string $cmpXchgValue): void
    {
        $this->cmpXchgValue = $cmpXchgValue;
    }
}