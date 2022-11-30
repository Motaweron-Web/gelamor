<?php

namespace App\Http\Controllers\Admin\all_Orders;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Invoice;

class AllOrdersController extends Controller
{
    public function index()
    {
        $invoices = Invoice::get();
        return view('admin.orders.index', compact('invoices'));
    }
}
