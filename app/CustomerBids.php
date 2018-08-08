<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CustomerBids extends Model
{
    protected  $guarded = [];
    public function product()
    {
        return $this->belongsTo(Products::class);
    }
}
