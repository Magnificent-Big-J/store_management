<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontEndsController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }
}
