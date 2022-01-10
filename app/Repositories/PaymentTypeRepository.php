<?php


namespace App\Repositories;


use App\Models\PaymentType;

class PaymentTypeRepository extends BaseRepository
{

    public function __construct(PaymentType $entity)
    {
        $this->entity = $entity;
    }
}
