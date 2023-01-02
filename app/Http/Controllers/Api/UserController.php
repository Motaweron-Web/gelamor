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


    public function register(Request $request){

        try {

            $rules = [

                'name'       => 'required',
                'email'      => 'required|email|unique:users,email',
                'password'   => 'required|min:6',
                'phone'      => 'required|numeric|unique:users,phone',
                'location'   => 'required|string',
                'country_id' => 'required|exists:countries,id',

            ];
            $validator = Validator::make($request->all(), $rules, [

                'country_id.exists' => 404,
                'email.unique'      => 405,
                'phone.unique'      => 406,
            ]);

            if ($validator->fails()) {

                $errors = collect($validator->errors())->flatten(1)[0];

                if (is_numeric($errors)) {

                    $errors_arr = [

                        405 => 'Failed,Email already exists',
                        406 => 'Failed,Phone already exists',
                        404 => 'Failed,Country not found',

                    ];
                    $code = collect($validator->errors())->flatten(1)[0];
                    return helperJson(null, isset($errors_arr[$errors]) ? $errors_arr[$errors] : 500, $code);
                }
                return response()->json(['data' => null, 'message' => $validator->errors()->first(), 'code' => 422], 200);
            }

            if ($image = $request->file('img')) {

                $destinationPath = 'img_user/';
                $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
                $image->move($destinationPath, $profileImage);
                $request['img'] = "$profileImage";

            }

            $user = User::create([

                'name' =>  $request->name,
                'email' =>  $request->email,
                'password' =>  Hash::make($request->password),
                'phone' =>  $request->phone,
                'location' => $request->location,
                'country_id' => $request->country_id,
                'img' => $profileImage ?? "default.png",

            ]);
            $user['token'] = auth()->guard('user-api')->attempt($request->only(['email','password']));

            return helperJson(new UserResource($user), "تم تسجيل بيانات المستخدم بنجاح");


        }catch (\Exception $exception){

            return returnMessageError($exception->getMessage(),500);
        }
    }

    public function login(Request $request){


        try {

            $rules = [

                'email'    => 'required|email|exists:users,email',
                'password' => 'required',
            ];

            $validator = Validator::make($request->all(), $rules, [

                'email.email' => 405,
                'email.exists' => 407,

            ]);

            if ($validator->fails()) {

                $errors = collect($validator->errors())->flatten(1)[0];

                if (is_numeric($errors)) {

                    $errors_arr = [

                        405 => 'Failed,Email must be a valid email address',
                        407 => 'Failed,Email of user not valid',

                    ];
                    $code = collect($validator->errors())->flatten(1)[0];
                    return helperJson(null, isset($errors_arr[$errors]) ? $errors_arr[$errors] : 500, $code);
                }
                return response()->json(['data' => null, 'message' => $validator->errors()->first(), 'code' => 422], 200);
            }


            $token = auth()->guard('user-api')->attempt($request->only(['email','password']));

            if(!$token){
                return helperJson(null, "password of user not valid",422);
            }

            $user = new UserResource(auth()->guard('user-api')->user());
            $user->token = $token;

            return helperJson(new UserResource($user), "تم تسجيل دخول المستخدم بنجاح");


        }catch (\Exception $exception){

            return returnMessageError($exception->getMessage(),500);

        }

    }


    //logout user
    public function logout(){


        try {

            auth()->guard('user-api')->logout();
            return returnMessageSuccess("تم تسجيل خروج المستخدم بنجاح",200);

        }catch (\Exception $exception){
            return returnMessageError($exception->getMessage(),500);
        }

    }

    //delete user
    public function delete(){

        try {

            $delete_user = User::find(auth()->guard('user-api')->id());
            $delete_user->delete();
            return returnMessageSuccess("تم حذف المستخدم بنجاح",201);

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
