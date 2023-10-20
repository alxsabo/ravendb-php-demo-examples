<?php

namespace RavenDB\Demo\spatial\spatialQuery;

class RunParams
{
    private ?int $radius = null;

    public function getRadius(): ?int
    {
        return $this->radius;
    }

    public function setRadius(?int $radius): void
    {
        $this->radius = $radius;
    }
}