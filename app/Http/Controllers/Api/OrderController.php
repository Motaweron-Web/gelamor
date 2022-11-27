<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Meal;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class OrderController extends Controller{


    public function store(Request $request){


        try {

            $rules = [

                'meal_id' => 'required|exists:meals,id',
                'date_of_order' => 'required|date|date_format:Y-m-d',
                'protein'  => 'required'


            ];

            $messages = [

                'meal_id.required' => 'رقم الوجبه مطلوب',
                'date_of_order.required' => 'تاريخ الوجبه مطلوب',
                'date_of_order.date' => 'تاريخ الوجبه يجب ان يكون تاريخ',
                'date_of_order.date_format' => 'تاريخ الوجبه يجب ان يكون سنه وشهر ويوم',
                'protein.required' => 'نسبه بروتين الوجبه مطلوبه',


            ];


            $validator = Validator::make($request->all(),$rules,$messages);


            if($validator->fails()){

                return returnMessageError($validator->errors(),422);

            }


            Order::create([

                'user_id' => auth('user-api')->id(),
                'meal_id' => $request->meal_id,
                'date_of_order' => $request->date_of_order,
                'protein'  => $request->protein

            ]);

            return returnMessageError("meal created successfully",201);


        }catch (\Exception $e){

            return returnMessageError($e->getMessage(),500);

        }



    }
}
