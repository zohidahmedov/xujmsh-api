<?php


namespace App\Services;


use App\Repositories\ServiceRepository;

class ServiceService extends BaseService
{
    public function __construct(ServiceRepository $repo)
    {
        $this->repo = $repo;
        $this->filter_fields = [
            'name' => ['type' => 'string']
        ];
        $this->listRelation = ['paymentTypes'];
        $this->showRelation = ['paymentTypes'];
    }


}
