<?php

namespace App\Http\Controllers\Chef\order;

use App\Http\Controllers\Controller;
use App\Models\Invoice;
use App\Models\Meal;
use App\Models\MealType;
use App\Models\OrderSpecial;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index($date)
    {
        $meal_types = MealType::select("name_" . lang() . " as name", 'id')->pluck('name', 'id')->toArray();
        $invoices = Invoice::where('invoice_date', $date)->get();
        $orders = \App\Models\Order::groupBy('meal_id')->get();
        $orders_special = OrderSpecial::where('date_of_order', $date)->groupBy('user_id')->get();
        return view('chef.order.index', compact('invoices', 'meal_types', 'orders_special', 'orders','date'));
    }// end of index

    public function allOrders()
    {
        $invoices = Invoice::get();
        $orders_special = OrderSpecial::get();
        return view('chef.order.orders', compact('invoices', 'orders_special'));
    }
}
