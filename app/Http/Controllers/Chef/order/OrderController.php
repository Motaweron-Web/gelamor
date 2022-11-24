<?php

namespace App\Http\Controllers\Chef\order;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::get();
        return view('chef.order.index', compact('orders'));
    }
}
