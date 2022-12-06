<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Http\Requests\LoginUserRequest;
use App\Http\Requests\StoreUserRequest;
use App\Http\Resources\UserResource;
use App\Models\ContactUs;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller{


    public function register(StoreUserRequest $request){


        try {

            if ($image = $request->file('img')) {

                $destinationPath = 'img_user/';
                $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
                $image->move($destinationPath, $profileImage);
                $request['img'] = "$profileImage";

            }

            $user = User::create([

                'name_ar' =>  $request->name_ar,
                'name_en' =>  $request->name_en,
                'email' =>  $request->email,
                'password' =>  Hash::make($request->password),
                'phone' =>  $request->phone,
                'location_ar' => $request->location_ar,
                'location_en' => $request->location_en,
                'country_id' => $request->country_id,
                'img' => $profileImage ?? "default.png",

            ]);


            return returnDataSuccess("تم تسجيل بيانات المستخدم بنجاح",200,"user",new UserResource($user));

        }catch (\Exception $exception){

            return returnMessageError($exception->getMessage(),500);
        }


    }


    public function login(LoginUserRequest $request){


        try {


            $token = auth()->guard('user-api')->attempt($request->only(['email','password']));

            if(!$token){


                return returnMessageError("يوجد خطاء ببيانات الدخول حاول مره اخري","404");
            }


            $user = new UserResource(auth()->guard('user-api')->user());
            $user->token = $token;


            return returnDataSuccess("تم تسجيل دخول المستخدم بنجاح",200,"user",$user);

        }catch (\Exception $exception){


            return returnMessageError($exception->getMessage(),"500");

        }

    }


    //logout user
    public function logout(){


        try {

            auth()->guard('user-api')->logout();

            return returnMessageSuccess("تم تسجيل خروج المستخدم بنجاح","201");

        }catch (\Exception $exception){


            return returnMessageError($exception->getMessage(),500);

        }

    }





    public function contact_us(Request $request){


        try {

            $rules = [


                'name' => 'required',
                'email' => 'required|email',
                'subject' => 'required',
                'message' => 'required'


            ];


            $messages = [

                'name.required' => 'اسم المستخدم مطلوب',
                'email.required' => 'البريد الالكتروني للمستخدم مطلوب',
                'email.email' => 'البريد الالكتروني يجب ان يكون ايميل',
                'subject.required' => 'تفاصيل المشكله',
                'message.required' => 'سبب المشكله'


            ];

            $validator = Validator::make($request->all(),$rules,$messages);

            if($validator->fails()){

                return returnMessageError($validator->errors(),422);
            }


            $contact_us = ContactUs::create([

                'name' => $request->name,
                'email' => $request->email,
                'subject' => $request->subject,
                'message' => $request->message,

            ]);

            return returnDataSuccess("تم تسجيل المشكله بنجاح",201,"contact",$contact_us);


        }catch (\Exception $exception){


            return returnMessageError($exception->getMessage(),500);

        }


    }

}
