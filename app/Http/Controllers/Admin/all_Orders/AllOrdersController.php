<?php

namespace App\Http\Controllers\Admin\all_Orders;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\Invoice;

class AllOrdersController extends Controller
{
    public function index()
    {
        $invoices = Invoice::get();
        return view('admin.orders.index', compact('invoices'));
    }

    public function status(Request $request)
    {
        $invoice = Invoice::find($request->id);
        ($invoice->status == '0') ? $invoice->status = '1' : $invoice->status = '0';
        $invoice->save();
        return response()->json(
            [
                'success' => true,
                'message' => 'تم تغيير حالة المستخدم بنجاح'
            ]);
    }
}
