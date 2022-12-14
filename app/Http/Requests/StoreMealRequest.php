<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMealRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
//        dd(request()->all());
        return [
            'name_ar' => 'required',
            'name_en' => 'required',
            'img' => 'required|image|mimes:jpeg,jpg,png,gif',
            'protein' => 'required|numeric',
            'calories' => 'required|numeric',
            'Fats' => 'required|numeric',
            'carbohydrates' => 'required|numeric',
            'meal_type_id' => 'required',
            'component_ids' => 'required|array|min:1',
        ];
    }

    public function messages()
    {
        return [
           'img.required' => trans('validation.image_required'),
            'component_ids.required' => trans('validation.component_ids'),
        ];
    }
}
