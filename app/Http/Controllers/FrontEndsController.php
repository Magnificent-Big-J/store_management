<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Products;
use App\CustomerBids;


class FrontEndsController extends Controller
{
    public function loginUser()
    {
        return view('auth.login');
    }
    public function product_bid()
    {

    }
}
