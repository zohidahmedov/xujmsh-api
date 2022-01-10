<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class House extends Model
{
    protected $guarded = ['id'];

    public function paymentTypes()
    {
        $this->belongsToMany(PaymentType::class);
    }
}
