<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\InvoiceResource;
use App\Http\Resources\SpecialOrderResource;
use App\Models\Invoice;
use App\Models\Meal;
use App\Models\Order;
use App\Models\OrderSpecial;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class OrderController extends Controller
{


    public function store(Request $request)
    {


        try {

            $rules = [

                'invoice_date' => 'required|date|date_format:Y-m-d',
                'details' => 'array|min:4'

            ];

            $messages = [

                'invoice_date.required' => 'تاريخ الوجبه مطلوب',
                'invoice_date.date' => 'تاريخ الوجبه يجب ان يكون تاريخ',
                'invoice_date.date_format' => 'تاريخ الوجبه يجب ان يكون سنه وشهر ويوم',

            ];


            $validator = Validator::make($request->all(), $rules, $messages);

            if ($validator->fails()) {

                return returnMessageError($validator->errors(), 422);

            }

            $data['invoice_date'] = $request->invoice_date;
            $data['user_id'] = auth()->guard('user-api')->id();
            $invoice = Invoice::create($data);

            $invoice_id = Invoice::find($invoice->id);

            $invoice_id->meals()->sync($request->details);

            return helperJson(new InvoiceResource($invoice),'Order created successfully',201);


        } catch (\Exception $e) {

            return returnMessageError($e->getMessage(), 500);

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

            $messages = [
                'meal_type_ids.required' => 'نوع الوجبة مطلوب',
                'component_ids.required' => 'يجب اختيار المكونات',
                'component_ids.min' => 'يجب اختيار مكون علي الاقل',
                'date_of_order.date_format' => 'التاريخ يجب ان يكون سنه وشهر ويوم',
                'date_of_order.required' => 'التاريخ مطلوب',
                'protein.required' => 'كمية البروتين مطلوبة',
            ];

            $validator = Validator::make($request->all(), $rules, $messages);

            if ($validator->fails()) {

                return returnMessageError($validator->errors(), 422);
            }

            $data['date_of_order'] = $request->date_of_order;
            $data['component_ids'] = $request->component_ids;
            $data['meal_type_id'] = $request->meal_type_id;
            $data['protein'] = $request->protein;
            $data['type'] = $request->type;
            $data['user_id'] = auth()->guard('user-api')->id();

            $special_order = OrderSpecial::create($data);

            return helperJson(new SpecialOrderResource($special_order), 'Special Order Created Successfully ',201);

        } catch (\Exception $e) {
            return returnMessageError($e->getMessage(), 500);
        }

    } // end store
}
