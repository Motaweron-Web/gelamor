<?php

namespace App\Http\Controllers\Admin\meals;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreComponentRequest;
use App\Http\Requests\UpdateComponentRequest;
use App\Models\Component;
use App\Traits\PhotoTrait;
use Illuminate\Http\Request;

class ComponentController extends Controller
{
    use PhotoTrait;

    public function index()
    {
        $component = Component::get();
        return view('admin.component.index', compact('component'));
    } // end of index

    public function store(StoreComponentRequest $request)
    {
        $inputs = $request->all();

        if ($request->has('img')) {
            $inputs['img'] = $this->saveImage($request->img , 'assets/uploads/components');
        }

        if (Component::create($inputs)) {
            toastr()->success(trans('messages.create_message_success'));
            return redirect()->route('components.index');
        } else {
            toastr()->error(trans('message.message_fail'));
            return redirect()->route('components.index');
        }
    }// end store

    public function delete(Request $request)
    {
        $chef = Component::find($request->id);
        $chef->delete();
        toastr()->error(trans('messages.delete_message_success'));
        return redirect()->route('components.index');
    }// end delete


    public function update(UpdateComponentRequest $request)
    {
        $meal_type = Component::find($request->id);

        $inputs = $request->all();
        if ($request->has('img')) {
            if (file_exists($meal_type->img)) {
                unlink($meal_type->img);
            }
            $inputs['img'] = $this->saveImage($request->img, 'assets/uploads/components');
        }
        if ($meal_type->update($inputs)) {
            toastr()->success(trans('messages.update_message_success'));
            return redirect()->route('components.index');
        } else {
            toastr()->error(trans('messages.message_fail'));
            return redirect()->route('components.index');
        }

    } // end update
}
