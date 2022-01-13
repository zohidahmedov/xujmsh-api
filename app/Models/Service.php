<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $guarded = ['id'];

    public function calculatingType()
    {
        return $this->belongsTo(CalculatingType::class);
    }

    public function paymentTypes()
    {
        return $this->hasMany(PaymentType::class);
    }
}
