<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateComponentRequest extends FormRequest
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
            'img' => 'nullable|image',
            'protein' => 'required|numeric',
            'calories' => 'required|numeric',
            'fats' => 'required|numeric',
            'carbohydrates' => 'required|numeric',
            'component_categories_id' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'img.required' => trans('validation.image_required'),
            'img.image' => trans('validation.image_required'),
        ];
    }
}
