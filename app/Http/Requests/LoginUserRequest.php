<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginUserRequest extends FormRequest
{

    public function authorize(){


        return true;
    }


    public function rules(){

        return [
            'email' => 'required|email',
            'password' => 'required',

        ];
    }

    public function messages(){

        return [


            'email.required' => 'البريد الالكتروني للمستخدم مطلوب',
            'email.email' => 'البريد الالكتروني يجب ان يكون ايميل',
            'password.required' => 'كلمه المرور مطلوبه',


        ];
    }
}
