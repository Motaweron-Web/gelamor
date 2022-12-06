<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class SettingStoreRequest extends FormRequest
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
            'location_ar' => 'required',
            'location_en' => 'required',
            'name_ar' => 'required',
            'name_en' => 'required',
//            'about_ar' => 'required',
//            'about_en' => 'required',
//            'privacy_ar' => 'required',
//            'privacy_en' => 'required',
//            'terms_ar' => 'required',
//            'terms_en' => 'required',
            'facebook' => 'nullable|url',
            'whatsapp' => 'required|numeric',
            'snapchat' => 'nullable|url',
        ];
    }

    public function messages()
    {
        return [
//            'location_ar.required' => trans('validation.location_ar.required'),
//            'location_en.required' => trans('validation.location_en.required'),
//            'name_ar.required' => trans('validation.name_ar.required'),
//            'name_en.required' => trans('validation.name_en.required'),
//            'about_ar.required' => trans('validation.about_ar.required'),
//            'about_en.required' => trans('validation.about_en.required'),
//            'privacy_ar.required' => trans('validation.privacy_ar.required'),
//            'privacy_en.required' => trans('validation.privacy_en.required'),
//            'terms_ar.required' => trans('validation.terms_ar.required'),
//            'terms_en.required' => trans('validation.terms_en.required'),
//            'facebook.required' => trans('validation.facebook.required'),
//            'facebook.url' => trans('validation.facebook.url'),
//            'whatsapp.required' => trans('validation.whatsapp.required'),
            'whatsapp.numeric' => trans('validation.whatsapp_numeric'),
//            'snapchat.required' => trans('validation.snapchat.required'),
//            'snapchat.url' => trans('validation.snapchat.url'),
        ];
    }
}
