<?php

namespace RavenDB\Demo\staticIndexes\projectIndexResults;

//region Demo
//region Step_2
class IndexEntry
{
    private ?int $workingInCompanySince = null;

    public function getWorkingInCompanySince(): ?int
    {
        return $this->workingInCompanySince;
    }

    public function setWorkingInCompanySince(?int $workingInCompanySince): void
    {
        $this->workingInCompanySince = $workingInCompanySince;
    }
}
//endregion
//endregion