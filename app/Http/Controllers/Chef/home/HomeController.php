<?php

namespace App\Http\Controllers\Chef\home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('chef.home.index');
    }
}
