<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSpecialOrderRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
//        dd(request()->all());
        return [
            'user_id' => 'required',
            'meal_type_id' => 'required',
            'component_ids' => 'required|array',
            'date_of_order' => 'required|date',
            'protein' => 'required|numeric',
            'type' => 'required',
        ];
    }
}
