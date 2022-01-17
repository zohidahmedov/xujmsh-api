<?php


namespace App\Services;


use App\Models\CalculatingType;
use App\Models\PaymentType;
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

    public function show($id)
    {
        $model = parent::show($id);
        $model->default_payment_type = $model->default_payment_type;
        return $model;
    }

    public function create($params)
    {
        $model = parent::create($params);

        PaymentType::query()->create([
           'service_id' => $model->id,
           'amount' => $params['default_amount'],
           'name' => 'Oddiy',
           'is_default' => 1
        ]);
        return $model;
    }
    public function update($params, $id)
    {
        $model = parent::update($params, $id);

        $model->default_payment_type->update(['amount' => $params['default_amount']]);

        return $model;
    }
}
