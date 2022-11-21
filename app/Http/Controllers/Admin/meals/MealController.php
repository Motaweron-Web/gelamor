<?php

namespace App\Http\Controllers\Admin\meals;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreMealRequest;
use App\Http\Requests\UpdateMealRequest;
use App\Models\Meal;
use App\Models\MealType;
use App\Traits\PhotoTrait;
use Illuminate\Http\Request;

class MealController extends Controller
{
    use PhotoTrait;

    public function index()
    {
        $meal_type = MealType::get();
        $meals = Meal::get();
        return view('admin.meals.index', compact('meals', 'meal_type'));
    } // end of index

    public function store(StoreMealRequest $request)
    {
        $inputs = $request->all();

        if ($request->has('img')) {
            $inputs['img'] = $this->saveImage($request->img, 'assets/uploads/meals');
        }

        if (Meal::create($inputs)) {
            toastr()->success(trans('messages.create_message_success'));
            return redirect()->route('meals.index');
        } else {
            toastr()->error(trans('message.message_fail'));
            return redirect()->route('meals.index');
        }
    }// end store

    public function delete(Request $request)
    {
        $chef = Meal::find($request->id);
        $chef->delete();
        toastr()->error(trans('messages.delete_message_success'));
        return redirect()->route('meals.index');
    }// end delete


    public function update(UpdateMealRequest $request)
    {
        $meal_type = Meal::find($request->id);

        $inputs = $request->all();
        if ($request->has('img')) {
            if (file_exists($meal_type->img)) {
                unlink($meal_type->img);
            }
            $inputs['img'] = $this->saveImage($request->img, 'assets/uploads/meals');
        }
        if ($meal_type->update($inputs)) {
            toastr()->success(trans('messages.update_message_success'));
            return redirect()->route('meals.index');
        } else {
            toastr()->error(trans('messages.message_fail'));
            return redirect()->route('meals.index');
        }

    } // end update
}
