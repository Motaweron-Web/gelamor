<?php

namespace App\Http\Controllers\Admin\home;

use App\Http\Controllers\Controller;
use App\Models\ContactUs;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        $data['contact_us'] = ContactUs::get();
        return view('admin.home.index')->with($data);
    }
}
