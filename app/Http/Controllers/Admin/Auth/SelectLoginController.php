<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SelectLoginController extends Controller
{
    public function index()
    {
        return view('layouts.select-login');
    }
}
