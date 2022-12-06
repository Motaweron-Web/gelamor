<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\InvoiceResource;
use App\Models\Invoice;
use App\Models\Meal;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class OrderController extends Controller{


    public function store(Request $request){


        try {

            $rules = [

                'invoice_date'  => 'required|date|date_format:Y-m-d',
                'details'       => 'array|min:1'

            ];

            $messages = [

                'invoice_date.required'    => 'تاريخ الوجبه مطلوب',
                'invoice_date.date'        => 'تاريخ الوجبه يجب ان يكون تاريخ',
                'invoice_date.date_format' => 'تاريخ الوجبه يجب ان يكون سنه وشهر ويوم',

            ];


            $validator = Validator::make($request->all(),$rules,$messages);

            if($validator->fails()){

                return returnMessageError($validator->errors(),422);

            }

            $data['invoice_date'] = $request->invoice_date;
            $data['user_id'] = auth()->guard('user-api')->id();
            $invoice = Invoice::create($data);

            $invoice_id = Invoice::find($invoice->id);

            $invoice_id->meals()->sync($request->details);

            return returnDataSuccess("invoice created successfully",201,"invoice",new InvoiceResource($invoice));


        }catch (\Exception $e){

            return returnMessageError($e->getMessage(),500);

        }


    }
}
