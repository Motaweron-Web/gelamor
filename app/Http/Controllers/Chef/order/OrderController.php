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
    public function index($date)
    {
        $data['meal_types'] = MealType::get();
         $users_orders = Order::where('date_of_order', $date)->groupBy('user_id')->pluck('user_id')->toArray();
         $data['users'] = User::whereIn('id', $users_orders)->get();
        return view('chef.order.index', $data);
    } // end of index

    public function orders()
    {
        $orders = Order::get();
        $meal_types = MealType::get();
        return view('chef.order.orders',compact('orders','meal_types'));
    }
}
