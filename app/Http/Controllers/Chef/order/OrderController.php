<?php

namespace App\Http\Controllers\Chef\order;

use App\Http\Controllers\Controller;
use App\Models\MealType;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index($id)
    {
        $meal_types = MealType::get();
//        $users = User::whereHas('meal')->get();
        $orders = Order::where('date_of_order', $id)->groupBy('user_id')->get();
        return view('chef.order.index', compact('orders','meal_types'));
    } // end of index

    public function details($id,$user_id, $meal_type_id)
    {
        $orders = Order::where('date_of_order', $id)->get();
        $user = User::find($user_id);
        $meal_type = MealType::where('name_en',$meal_type_id)->get();
        return view('chef.order.details', compact('user','meal_type','orders'));
    }
}
