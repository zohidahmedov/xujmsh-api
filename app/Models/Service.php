<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $guarded = ['id'];

    public function paymentTypes()
    {
        $this->hasMany(PaymentType::class);
    }
}
