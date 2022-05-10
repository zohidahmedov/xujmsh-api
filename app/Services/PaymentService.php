<?php


namespace App\Services;


use App\Repositories\PaymentRepository;

class PaymentService extends BaseService
{
    public function __construct(PaymentRepository $repo)
    {
        $this->repo = $repo;
        $this->filter_fields = [
            'service_id' => ['type' => 'number'],
            'amount' => ['type' => 'number']
        ];
        $this->listRelation = ['service'];
        $this->showRelation = ['service'];
    }
    public function create($params)
    {
        return $this->repo->store($params);
    }


}
