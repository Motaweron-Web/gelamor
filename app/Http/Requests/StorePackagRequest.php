<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePackagRequest extends FormRequest
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
            'start' => 'required|date',
            'end' => 'required|date',
            'currency_ar' => 'nullable',
            'currency_en' => 'required',
            'type' => 'required',
//            'payment_method' => 'required',
            'status' => 'nullable',

        ];
    }
     public function messages() {
        return [
            'name_ar.required' => 'اسم المستخدم بالعربي مطلوب',
            'name_en.required' => 'اسم المستخدم بالانجليزي مطلوب',
            'details_ar.required' => 'التفاصيل باللغة العربية مطلوبة',
            'details_en.required' => 'التفاصيل باللغة الانجليزية مطلوبة',
            'start.required' => 'بداية تجديد الباقة ',
            'end.required' => 'انتهاء الباقة مطلوب',
        ];
     }
}
