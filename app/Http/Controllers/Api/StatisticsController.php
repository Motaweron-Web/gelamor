<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserPackage;
use Carbon\Carbon;
use Illuminate\Http\Request;

class StatisticsController extends Controller
{
    public function index(Request $request)
    {
        try {
            $user = User::find(auth()->guard('user-api')->id());
            $last_week = Carbon::now()->subDays(7);

        } catch (\Exception $exception) {
            return returnMessageError($exception->getMessage(), 500);
        }
    }
}
