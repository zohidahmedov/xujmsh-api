<?php


namespace App\Services;


use App\Repositories\FlatRepository;

class FlatService extends BaseService
{
    public function __construct(FlatRepository $repo)
    {
        $this->repo = $repo;
        $this->filter_fields = [
            'billing_number' => ['type' => 'string'],
            'house_id' => ['type' => 'number'],
            'number' => ['type' => 'number'],
            'full_name' => ['type' => 'string'],
            'phone' => ['type' => 'string']
        ];
        $this->listRelation = ['house'];
        $this->showRelation = ['house'];
    }

    public function service($id)
    {
        $model = $this->repo->getById($id);
        if($this->showRelation && count($this->showRelation)) {
            foreach ($this->showRelation as $relation) {
                return ($model->$relation->paymentTypes);
                $model->$relation->paymentTypes;
            }
        }
        return $model;
    }

    public function show($id)
    {
        $model = $this->repo->getById($id);
        if($this->showRelation && count($this->showRelation)) {
            foreach ($this->showRelation as $relation) {
                $model->$relation->paymentTypes;
            }
        }
        return $model;
    }
}
