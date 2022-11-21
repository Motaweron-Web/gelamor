<?php

namespace App\Http\Controllers\Admin\meals;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreMealTypeRequest;
use App\Models\MealType;
use App\Models\Package;
use Illuminate\Http\Request;

class MealTypeController extends Controller
{
    public function index()
    {
        $packages = Package::all();
        $meal_type = MealType::get();
        return view('admin.meal_type.index',compact('meal_type','packages'));
    } // end of index

    public function store(StoreMealTypeRequest $request)
    {
        $inputs = $request->all();

        if(MealType::create($inputs))
        {
            toastr()->success(trans('messages.create_message_success'));
            return redirect()->route('meal_type.index');
        }else
        {
            toastr()->error(trans('message.message_fail'));
            return redirect()->route('meal_type.index');
        }
    }// end store

    public function delete(Request $request)
    {
        $chef = MealType::find($request->id);
        $chef->delete();
        toastr()->error(trans('messages.delete_message_success'));
        return redirect()->route('meal_type.index');
    }// end delete


    public function update(StoreMealTypeRequest $request)
    {
        $meal_type = MealType::find($request->id);
        $inputs = $request->all();

        if ($meal_type->update($inputs)) {
            toastr()->success(trans('messages.update_message_success'));
            return redirect()->route('meal_type.index');
        } else {
            toastr()->error(trans('messages.message_fail'));
            return redirect()->route('meal_type.index');
        }

    } // end update

} // end class
