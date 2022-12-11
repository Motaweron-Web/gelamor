<?php

namespace App\Http\Controllers\Admin\user;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::get();
        return view('admin.user.index', compact('users'));
    } // end index

    public function delete(Request $request)
    {
        $admin = User::find($request->id);
        $admin->delete();
        toastr()->success(trans('messages.delete_message_success'));
        return redirect()->back();
    } // end delete
}
