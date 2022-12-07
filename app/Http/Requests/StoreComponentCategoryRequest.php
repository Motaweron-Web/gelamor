<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreComponentCategoryRequest extends FormRequest
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
        ];
    }

    public function messages()
    {
        return [
           //
        ];
    }
}
