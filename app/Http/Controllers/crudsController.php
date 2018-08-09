<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class crudsController extends Controller
{
    public function productList()
    {
        return view('dashboard.products');
    }
}
