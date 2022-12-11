<?php

namespace App\Http\Controllers\Admin\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminStoreRequest;
use App\Http\Requests\AdminUpdateRequest;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use mysql_xdevapi\Exception;
use Validator;
use Nette\Schema\ValidationException;

class AdminController extends Controller
{
    public function index()
    {
        $admins = Admin::get();
        return view('admin.admin.index', compact('admins'));
    } // end index

    public function store(AdminStoreRequest $request)
    {
        $inputs = $request->all();
        $inputs['password'] = Hash::make($request->password);
        if (Admin::create($inputs)) {
            toastr()->success(trans('messages.create_message_success'));
            return redirect()->route('admin.index');
        } else {
            toastr()->error(trans('messages.message_fail'));
            return redirect()->route('admin.index');
        }
    } // end store

    public function update(AdminUpdateRequest $request)
    {

        $admin = Admin::find($request->id);
        $inputs = $request->all();

        if ($request->has('password') && $request->password != null)
            $inputs['password'] = Hash::make($request->password);
        else
            unset($inputs['password']);

        if ($admin->update($inputs)) {
            toastr()->success(trans('messages.update_message_success'));
            return redirect()->route('admin.index');
        } else {
            toastr()->error(trans('messages.message_fail'));
            return redirect()->route('admin.index');
        }
    }

    public function delete(Request $request)
    {
        $admin = Admin::find($request->id);
        $admin->delete();
        toastr()->success()(trans('messages.delete_message_success'));
        return redirect()->back();
    }
}
