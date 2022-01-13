<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PaymentType extends Model
{
    protected $guarded = ['id'];

    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}
