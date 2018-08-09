<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Products;
use App\CustomerBids;


class FrontEndsController extends Controller
{
    public function index()
    {
        $products = Products::orderBy('id','desc')->paginate(9);

        return view('index',compact('products'));
    }
    public function loginUser()
    {
        return view('auth.login');
    }
    public function product_bid()
    {

    }
}
