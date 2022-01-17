<?php


namespace App\Repositories;


use App\Models\Service;

class ServiceRepository extends BaseRepository
{

    public function __construct(Service $entity)
    {
        $this->entity = $entity;
    }

    public function getPaginate($query, int $perPage = null)
    {
        $data = parent::getPaginate($query, $perPage);
         $data->each(function ($item) {
             $item->append('default_payment_type');
         });
        return $data;
    }
}
