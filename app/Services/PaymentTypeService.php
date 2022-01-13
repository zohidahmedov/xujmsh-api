<?php


namespace App\Services;


use App\Repositories\PaymentTypeRepository;

class PaymentTypeService extends BaseService
{
    public function __construct(PaymentTypeRepository $repo)
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
