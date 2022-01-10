<?php


namespace App\Services;


use App\Repositories\FlatRepository;

class ServiceService extends BaseService
{
    public function __construct(FlatRepository $repo)
    {
        $this->repo = $repo;
        $this->filter_fields = [
            'name' => ['type' => 'string']
        ];
        $this->listRelation = ['paymentTypes'];
        $this->showRelation = ['paymentTypes'];
    }


}
