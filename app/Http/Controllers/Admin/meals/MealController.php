<?php

namespace App\Http\Controllers\Admin\meals;

use App\Http\Controllers\Controller;
use App\Models\Chef;

class MealController extends Controller
{
    public function index()
    {
        $chefs = Chef::get();
        return view('admin.meals.index',compact('chefs'));
    }
}
