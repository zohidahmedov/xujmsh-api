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
            'name' => ['type' => 'string'],
            'amount' => ['type' => 'number']
        ];
        $this->listRelation = ['service'];
        $this->showRelation = ['service'];
    }


}
