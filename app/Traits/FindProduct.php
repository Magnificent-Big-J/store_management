<?php
/**
 * Created by PhpStorm.
 * User: Joel.Mnisi
 * Date: 2018/08/08
 * Time: 02:20 PM
 */

namespace App\Traits;
use App\Products;
use App\Providers;

trait FindProduct{

    public function findProduct($id)
    {
        return Products::find($id);
    }
}