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
            ];
    }

    public function messages()
    {
        return [
           //
        ];
    }
}
