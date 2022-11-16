<?php

namespace App\Http\Controllers\Admin\home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        return view('admin.home.index');
    }
}
