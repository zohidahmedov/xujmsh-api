<?php


namespace App\Repositories;


use App\Models\Flat;

class FlatRepository extends BaseRepository
{

    public function __construct(Flat $entity)
    {
        $this->entity = $entity;
    }

    public function store($params)
    {
        dd($params);
        return $this->entity->create($params);
    }
}
