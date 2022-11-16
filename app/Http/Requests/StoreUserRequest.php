<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
{

    public function authorize(){


        return true;
    }


    public function rules(){

        return [

            'name_ar' => 'required',
            'name_en' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'phone' => 'required|numeric|unique:users,phone',
            'location_ar' => 'required|string',
            'location_en' => 'required|string',
            'country_id' => 'required|exists:countries,id',
        ];
    }

    public function messages(){

        return [

            'name_ar.required' => 'اسم المستخدم بالعربي مطلوب',
            'name_en.required' => 'اسم المستخدم بالانجليزي مطلوب',
            'email.required' => 'البريد الالكتروني للمستخدم مطلوب',
            'email.email' => 'البريد الالكتروني يجب ان يكون ايميل',
            'email.unique' => 'هذا البريد موجود من قبل',
            'phone.unique' => 'هذا الهاتف مستخدم من قبل',
            'password.required' => 'كلمه المرور مطلوبه',
            'password.min' => 'كلمه المرور يجب ان لا تقل عن 6 حروف',
            'phone.required' => 'الهاتف الجوال مطلوب',
            'phone.numeric' => 'الهاتف الجوال يجب ان يكون ارقام',
            'location_ar.required' => 'موقع العميل باللغه العربيه مطلوب',
            'location_ar.string' => 'موقع العميل باللغه العربيه يجب ان يكون نص وليس ارقام',
            'location_en.required' => 'موقع العميل باللغه الانجليزيه مطلوب',
            'location_en.string' => 'موقع العميل باللغه الانجليزيه يجب ان يكون نص وليس ارقام',
            'country_id.required' => 'رقم البلد التابع لها العميل مطلوبه',
            'country_id.exists' => 'هذه البلده غير موجوده بسجل البيانات',

        ];
    }
}
