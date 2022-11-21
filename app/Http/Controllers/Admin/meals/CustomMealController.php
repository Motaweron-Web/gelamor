<?php

namespace App\Http\Controllers\Admin\meals;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCustomMealRequest;
use App\Http\Requests\UpdateCustomMealRequest;
use App\Models\CustomMeal;
use App\Models\User;
use App\Traits\PhotoTrait;
use Illuminate\Http\Request;

class CustomMealController extends Controller
{
    use PhotoTrait;

    public function index()
    {
        $users = User::get();
        $custom_meals = CustomMeal::get();
        return view('admin.custom_meals.index', compact('custom_meals', 'users'));
    } // end of index

    public function store(StoreCustomMealRequest $request)
    {
        $inputs = $request->all();

        if ($request->has('img')) {
            $inputs['img'] = $this->saveImage($request->img, 'assets/uploads/custom_meals');
        }

        if (CustomMeal::create($inputs)) {
            toastr()->success(trans('messages.create_message_success'));
            return redirect()->route('custom_meal.index');
        } else {
            toastr()->error(trans('message.message_fail'));
            return redirect()->route('custom_meal.index');
        }
    }// end store

    public function delete(Request $request)
    {
        $chef = CustomMeal::find($request->id);
        $chef->delete();
        toastr()->error(trans('messages.delete_message_success'));
        return redirect()->route('custom_meal.index');
    }// end delete


    public function update(UpdateCustomMealRequest $request)
    {
        $custom_meal = CustomMeal::find($request->id);

        $inputs = $request->all();
        if ($request->has('img')) {
            if (file_exists($custom_meal->img)) {
                unlink($custom_meal->img);
            }
            $inputs['img'] = $this->saveImage($request->img, 'assets/uploads/custom_meals');
        }
        if ($custom_meal->update($inputs)) {
            toastr()->success(trans('messages.update_message_success'));
            return redirect()->route('custom_meal.index');
        } else {
            toastr()->error(trans('messages.message_fail'));
            return redirect()->route('custom_meal.index');
        }

    } // end update
}
