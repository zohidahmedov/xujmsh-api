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
    public function getDefaultPaymentTypeAttribute()
    {
        return $this->paymentTypes()->where('is_default', 1)->first();
    }
}
