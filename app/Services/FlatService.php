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


}
