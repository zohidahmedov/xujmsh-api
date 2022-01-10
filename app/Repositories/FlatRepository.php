<?php


namespace App\Repositories;


use App\Models\Flat;

class FlatRepository extends BaseRepository
{

    public function __construct(Flat $entity)
    {
        $this->entity = $entity;
    }
}
