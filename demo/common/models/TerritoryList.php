<?php

namespace RavenDB\Demo\common\models;

use RavenDB\Type\TypedList;

class TerritoryList extends TypedList
{
    protected function __construct()
    {
        parent::__construct(Territory::class);
    }
}