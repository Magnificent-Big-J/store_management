<?php

namespace App;

use App\Traits\FindProduct;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{

    protected  $guarded = [];
    public function customerBids()
    {
        return $this->hasMany(CustomerBids::class);
    }

}
