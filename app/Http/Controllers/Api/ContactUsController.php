<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContactUsRequest;
use App\Models\ContactUs;

class ContactUsController extends Controller
{
    public function store(ContactUsRequest $request)
    {
        try {
            $message = ContactUs::create($request->all());

            return returnDataSuccess("تم إرسال الرسالة بنجاح",200,'message',$message);

        }catch (\Exception $exception){

            return returnMessageError($exception->getMessage(),500);
        }

    }
}
