<?php

namespace App\Http\Controllers\Chef\order;

use App\Http\Controllers\Controller;
use App\Models\Meal;
use App\Models\MealType;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index($id)
    {
        $meal_types = MealType::get();
        $orders = Order::where('date_of_order', $id)->groupBy('user_id')->get();
        return view('chef.order.index', compact('orders','meal_types'));
    } // end of index

    public function orders()
    {
        $orders = Order::get();
        $meal_types = MealType::get();
        return view('chef.order.orders',compact('orders','meal_types'));
    }
}
