<?php


namespace App\Services;


use App\Repositories\HouseRepository;

class HouseService extends BaseService
{
    public function __construct(HouseRepository $repo)
    {
        $this->repo = $repo;
        $this->filter_fields = ['number' => ['type' => 'string'], 'address' => ['type' => 'string']];
        $this->listRelation = [];
    }
    public function create($params)
    {
        $model = parent::create($params);

        $model->paymentTypes()->attach($params['payment_types_ids']);

        return $model;
    }

    public function update($params, $id)
    {
        $model = parent::update($params, $id);

        $model->paymentTypes()->sync($params['payment_types_ids']);

        return $model;
    }
}
