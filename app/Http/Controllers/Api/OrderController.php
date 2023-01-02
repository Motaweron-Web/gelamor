<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\FirebaseNotification;
use App\Http\Resources\InvoiceResource;
use App\Http\Resources\SpecialOrderResource;
use App\Models\Invoice;
use App\Models\Meal;
use App\Models\Order;
use App\Models\OrderSpecial;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class OrderController extends Controller{

    use FirebaseNotification;
    public function store(Request $request){

//        return $request;
        try {
            $rules = [

                'invoice_date' => 'required|date|date_format:Y-m-d',
                'details'      => 'array|min:4'
            ];

            $validator = Validator::make($request->all(), $rules, [

                'invoice_date.date'            => 406,
                'invoice_date.date_format'     => 407,
            ]);

            if ($validator->fails()) {

                $errors = collect($validator->errors())->flatten(1)[0];

                if (is_numeric($errors)) {

                    $errors_arr = [

                        406 => 'Failed,Invoice date must be date',
                        407 => 'Failed,The date format must be Y-m-d',

                    ];
                    $code = collect($validator->errors())->flatten(1)[0];
                    return helperJson(null, isset($errors_arr[$errors]) ? $errors_arr[$errors] : 500, $code);
                }
                return response()->json(['data' => null, 'message' => $validator->errors()->first(), 'code' => 422], 200);
            }

            $invoice = Invoice::create([

                 'user_id' => auth()->guard('user-api')->id(),
                 'invoice_date' => $request->invoice_date,

            ]);

            for ($i = 0; $i < count($request->meal_id); $i++) {

                Order::create([
                    'invoice_id' => $invoice->id,
                    'meal_id' => $request->meal_id[$i],
                    'protein' => $request->protein[$i],
                    'comment' => $request->comment[$i]
                ]);
            }
             $this->sendNotification('رساله جديده لديك','تم اضافه طلب جديد');
            return helperJson(new InvoiceResource($invoice),'Order created successfully',200);

        } catch (\Exception $e) {

            return helperJson(null, $e->getMessage(), 500);

        }

    } // end of store

    public function specialStore(Request $request)
    {
        try {

            $rules = [

                'meal_type_id' => 'required',
                'component_ids' => 'required|array|min:1',
                'date_of_order' => 'required|date|date_format:Y-m-d',
                'protein' => 'required',
                'type' => 'required',
            ];

            $validator = Validator::make($request->all(), $rules, [

                'component_ids.min'          => 405,
                'date_of_order.date'         => 406,
                'date_of_order.date_format'  => 407,
            ]);

            if ($validator->fails()) {

                $errors = collect($validator->errors())->flatten(1)[0];

                if (is_numeric($errors)) {

                    $errors_arr = [
                        405 => 'Failed,Component_ids must be an min 1',
                        406 => 'Failed,Date of order  must be date',
                        407 => 'Failed,The date of order format must be Y-m-d',

                    ];
                    $code = collect($validator->errors())->flatten(1)[0];
                    return helperJson(null, isset($errors_arr[$errors]) ? $errors_arr[$errors] : 500, $code);
                }
                return response()->json(['data' => null, 'message' => $validator->errors()->first(), 'code' => 422], 200);
            }

           $special_order = OrderSpecial::create([

                'date_of_order' => $request->date_of_order,
                'component_ids' => $request->component_ids,
                'meal_type_id' => $request->meal_type_id,
                'protein' => $request->protein,
                'type' => $request->type,
                'user_id' => Auth::guard('user-api')->id()

            ]);

            return helperJson(new SpecialOrderResource($special_order), 'Special Order Created Successfully ',200,200);

        } catch (\Exception $exception) {

            return helperJson(null,$exception->getMessage(), 500);
        }

    } // end store
}
