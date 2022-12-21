<?php

namespace App\Http\Controllers\Admin\notification;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Notification;

class NotificationController extends Controller
{
    public function index()
    {
        $notifications = Notification::get();
        return view('admin.notification.index', compact('notifications'));
    }

    public function delete(Request $request)
    {
        $notifications = Notification::find($request->id);

        $notifications->delete();

        toastr()->success(trans('messages.delete_message_success'));
        return redirect()->back();
    }

    //End Delete
}
