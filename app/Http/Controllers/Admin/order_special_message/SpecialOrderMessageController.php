<?php

namespace App\Http\Controllers\Admin\order_special_message;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SpecialOrderMessage;

class SpecialOrderMessageController extends Controller
{
    public function index()
    {
        $specials = SpecialOrderMessage::get();
        return view('admin.special_order_message.index', compact('specials'));
    }

    public function delete(Request $request)
    {
        $specials = SpecialOrderMessage::find($request->id);
        $specials->delete();
        toastr()->success(trans('messages.delete_message_success'));
        return redirect()->back();
    }
    //End Delete
}
