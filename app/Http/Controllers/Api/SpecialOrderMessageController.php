<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SpecialOrderMessage;
use Illuminate\Support\Facades\Validator;

class SpecialOrderMessageController extends Controller
{
    public function store(Request $request)
    {

        try {
            $rules = [
                'title' => 'required',
                'message' => 'required'
            ];

            $messages = [
                'title.required' => 'عنوان الرسالة مطلوب',
                'message.required' => 'حقل الرسالة مطلوب',
            ];


            $validator = Validator::make($request->all(), $rules, $messages);

            if ($validator->fails()) {
                return returnMessageError($validator->errors(), 404);
            }


            $data['title'] = $request->title;
            $data['message'] = $request->message;
            $data['user_id'] = auth()->guard('user-api')->id();

            $specials = SpecialOrderMessage::create($data);

            return helperJson(null, 'تم ارسال الرسالة بنجاح', 201);

        } catch (\Exception $e) {

            return returnMessageError($e->getMessage(), 500);

        }


    }
}
