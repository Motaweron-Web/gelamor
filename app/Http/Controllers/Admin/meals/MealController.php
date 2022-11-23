<?php

namespace App\Http\Controllers\Admin\meals;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreMealRequest;
use App\Http\Requests\UpdateMealRequest;
use App\Models\Component;
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
        $component = Component::get();
        return view('admin.meals.index', compact('meals', 'meal_type','component'));
    } // end of index

    public function store(StoreMealRequest $request)
    {
        $inputs = $request->all();

        if ($request->has('img')) {
            $inputs['img'] = $this->saveImage($request->img, 'assets/uploads/meals');
        }
            $meal = Meal::create($inputs);

        if ($meal) {
            $meal->component()->attach($request->component_ids);
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
        $meal = Meal::find($request->id);

        $inputs = $request->all();
        if ($request->has('img')) {
            if (file_exists($meal->img)) {
                unlink($meal->img);
            }
            $inputs['img'] = $this->saveImage($request->img, 'assets/uploads/meals');
        }
        if ($meal->update($inputs)) {
            $meal->component()->sync($request->component_ids);
            toastr()->success(trans('messages.update_message_success'));
            return redirect()->route('meals.index');
        } else {
            toastr()->error(trans('messages.message_fail'));
            return redirect()->route('meals.index');
        }

    } // end update
}
