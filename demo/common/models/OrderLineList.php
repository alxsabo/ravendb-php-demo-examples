<?php

namespace RavenDB\Demo\common\models;

use RavenDB\Type\TypedList;

class OrderLineList extends TypedList
{
    public function __construct()
    {
        parent::__construct(OrderLine::class);
    }
}