<?php


namespace App\Services;


use App\Models\CalculatingType;
use App\Repositories\ServiceRepository;

class ServiceService extends BaseService
{
    public function __construct(ServiceRepository $repo)
    {
        $this->repo = $repo;
        $this->filter_fields = [
            'name' => ['type' => 'string'], 'calculating_type_id' => ['type' => 'number']
        ];
        $this->listRelation = ['paymentTypes', 'calculatingType'];
        $this->showRelation = ['paymentTypes', 'calculatingType'];
    }
    public function getCalculatingTypes()
    {
        return CalculatingType::all();
    }

}
