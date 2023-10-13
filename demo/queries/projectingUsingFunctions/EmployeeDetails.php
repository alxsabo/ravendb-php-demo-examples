<?php

namespace RavenDB\Demo\queries\projectingUsingFunctions;

//region Usings
use Symfony\Component\Serializer\Annotation\SerializedName;
//endregion

//region Demo
class EmployeeDetails
{
    #[SerializedName("FullName")]
    public ?string $fullName = null;
    #[SerializedName("Title")]
    public ?string $title = null;
//endregion

    public function getFullName(): ?string
    {
        return $this->fullName;
    }

    public function setFullName(?string $fullName): void
    {
        $this->fullName = $fullName;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(?string $title): void
    {
        $this->title = $title;
    }
//region Demo
}
//endregion