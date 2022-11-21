<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCustomMealRequest extends FormRequest
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
            'img' => 'required|image',
            'protein' => 'required|numeric',
            'calories' => 'required|numeric',
            'Fats' => 'required|numeric',
            'carbohydrates' => 'required|numeric',
            'user_id' => 'required',
        ];
    }

    public function messages()
    {
        return [
           //
        ];
    }
}
