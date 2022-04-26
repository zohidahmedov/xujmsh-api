<?php


namespace App\Repositories;


use App\Models\Service;

class ServiceRepository extends BaseRepository
{

    public function __construct(Service $entity)
    {
        $this->entity = $entity;
    }
}
