<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Notification;
use App\Http\Resources\NotificationResource;

class NotificationControllr extends Controller
{
    public function index()
    {
        try {
            $notification = Notification::where('user_id',auth()->guard('user-api')->user()->id)->get();
            // dd($notification);
            return helperJson(  NotificationResource::collection($notification), 'تم عرض البيانات بنجاح',200);

        } catch (\Exception $exception) {
            return returnMessageError($exception->getMessage(),500);
        }
    }
}
