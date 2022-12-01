<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateMealRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'name_ar' => 'required',
            'name_en' => 'required',
            'img' => 'nullable|image|mimes:jpeg,jpg,png,gif',
            'protein' => 'required|numeric',
            'calories' => 'required|numeric',
            'Fats' => 'required|numeric',
            'carbohydrates' => 'required|numeric',
            'meal_type_id' => 'required',
            'component_ids' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'component_ids.required' => trans('validation.component_ids')
        ];
    }
}
