<?php


namespace App\Repositories;


use App\Models\House;

class HouseRepository extends BaseRepository
{

    public function __construct(House $entity)
    {
        $this->entity = $entity;
    }
}
