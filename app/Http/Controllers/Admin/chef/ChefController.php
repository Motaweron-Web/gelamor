<?php

namespace App\Http\Controllers\Admin\chef;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreChefRequest;
use Illuminate\Http\Request;
use App\Models\Chef;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateChefRequest;

class ChefController extends Controller
{
    public function index()
    {
        $chefs = Chef::get();
        return view('admin.chef.index', compact('chefs'));
    }

    public function store(StoreChefRequest $request)
    {
        $inputs = $request->all();
        $inputs['password'] = Hash::make($request->password);

        if(Chef::create($inputs))
        {
            toastr()->success(trans('messages.create_message_success'));
            return redirect()->route('chef.index');
        }else
        {
            toastr()->error(trans('message.message_fail'));
            return redirect()->route('chef.index');
        }
    }// end store

    public function delete(Request $request)
    {
        $chef = Chef::find($request->id);
        $chef->delete();
        toastr()->success(trans('messages.delete_message_success'));
        return redirect()->route('chef.index');
    }// end delete


    public function update(UpdateChefRequest $request)
    {
        $chefs = Chef::find($request->id);
        $inputs = $request->all();

        if ($request->has('password') && $request->password != null)
            $inputs['password'] = Hash::make($request->password);
        else
            unset($inputs['password']);

        if ($chefs->update($inputs)) {
            toastr()->success(trans('messages.update_message_success'));
            return redirect()->route('chef.index');
        } else {
            toastr()->error(trans('messages.message_fail'));
            return redirect()->route('chef.index');
        }

    }
}
