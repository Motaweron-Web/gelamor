<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePackageRequest extends FormRequest
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
        return [
            'name_ar' => 'required',
            'name_en' => 'required',
            'details_ar' => 'required',
            'details_en' => 'required',
            'start' => 'required|date_format:Y-m-d',
            'end' => 'required|date_format:Y-m-d',
            'currency_ar' => 'nullable',
            'currency_en' => 'required',
            'type' => 'required',
            'status' => 'nullable',
            'meal_type_ids' => 'required|array',

        ];
    }
    public function messages()
    {
        return [
            'component_ids.required' => trans('validation.component_ids')
        ];
    }
}
