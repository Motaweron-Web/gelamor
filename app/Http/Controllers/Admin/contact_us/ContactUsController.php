<?php

namespace App\Http\Controllers\Admin\contact_us;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ContactUs;

class ContactUsController extends Controller
{
    public function index()
    {
        $contact_us = ContactUs::get();
        return view('admin.contact_us.index', compact('contact_us'));
    }

    public function delete(Request $request)
    {
        $contact_us = ContactUs::find($request->id);
        $contact_us->delete();
        toastr()->success(trans('messages.delete_message_success'));
        return redirect()->route('contact_us.index');
    }
    // End Delete
}
