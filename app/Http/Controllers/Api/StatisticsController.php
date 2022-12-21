<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserPackage;
use Carbon\Carbon;
use DateTime;
use Illuminate\Http\Request;
use function date_modify;

class StatisticsController extends Controller
{
    public function index(Request $request)
    {
        try {
            $user = User::find(auth()->guard('user-api')->id());

            $start = Carbon::now()->subDays(7)->format('Y-m-d');
            $end = Carbon::now()->format('Y-m-d');
            $days_list = [];
            for ($i = $start; $i < $end; $i++) {
                $days_list[$i] = $i;
            }


            return helperJson($days_list);

        } catch (\Exception $exception) {
            return returnMessageError($exception->getMessage(), 500);
        }
    }
}
