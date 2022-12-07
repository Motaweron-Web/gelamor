<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest{

    public function authorize(){


        return true;
    }


    public function rules(){

        return [

            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . auth('user-api')->id(),
            'password' => 'nullable|min:6',
            'phone' => 'required|numeric|unique:users,phone,' . auth('user-api')->id(),
            'location' => 'required|string',
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
            'password.min' => 'كلمه المرور يجب ان لا تقل عن 6 حروف',
            'phone.required' => 'الهاتف الجوال مطلوب',
            'phone.numeric' => 'الهاتف الجوال يجب ان يكون ارقام',
            'location.required' => 'موقع العميل مطلوب',
            'location.string' => 'موقع العميل يجب ان يكون نص وليس ارقام',
            'country_id.required' => 'رقم البلد التابع لها العميل مطلوبه',
            'country_id.exists' => 'هذه البلده غير موجوده بسجل البيانات',

        ];
    }
}
