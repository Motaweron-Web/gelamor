<?php

namespace App\Http\Controllers\Admin\special_order;

use App\Http\Controllers\Controller;
use App\Models\OrderSpecial;
use App\Http\Requests\StoreSpecialOrderRequest;

class SpecialOrderController extends Controller
{
//    public function index()
//    {
//        $special_orders = OrderSpecial::get();
//        return view('admin.order_special.index', compact('special_orders', 'components'));
//    }

    public function store(StoreSpecialOrderRequest $request)
    {
        $inputs = $request->all();


        if (OrderSpecial::create($inputs)) {
            toastr()->success(trans('messages.create_message_success'));
            return redirect()->back();
        }else
        {
            toastr()->error(trans('message.message_fail'));
            return redirect()->back();
        }
    }
}
