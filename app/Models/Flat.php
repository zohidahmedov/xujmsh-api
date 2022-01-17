<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Flat extends Model
{
    protected $guarded = ['id'];

    public function house()
    {
        return $this->belongsTo(House::class);
    }
}
