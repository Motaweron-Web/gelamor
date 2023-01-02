<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Component;
use App\Models\Invoice;
use App\Models\Meal;
use App\Models\Order;
use App\Models\OrderSpecial;
use App\Models\User;
use App\Models\UserPackage;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StatisticsController extends Controller
{
    public function index(Request $request)
    {
        try {
            $user = User::find(auth()->guard('user-api')->id());

            $package = UserPackage::where('user_id', $user->id)
                ->where('status', '=', '1')->select('*')->first();

            $start = Carbon::now()->modify('-7 day');
            $end = Carbon::now()->modify('-1 day');
            $days_list = [];
//            dd($end);
            for ($i = $start; $i <= $end; $i->modify('+1 day')) {
                if ($package->package->type == 'special') {
                    $special_order = OrderSpecial::where('user_id', $user->id)
                        ->where('date_of_order', '=', $i)
                        ->first();

                    $days_list[] =
                        [
                            'date' => Carbon::parse($i)->format('Y-m-d'),
                            'calories' => (isset($special_order->component_ids)) ? array_sum(Component::whereIn('id', $special_order->component_ids)
                                ->pluck('calories')->toArray()) : 0 ,
                            'day' => Carbon::parse($i)->dayName,
                        ];

                } else {

                    $invoice = Invoice::where('user_id', $user->id)
                        ->where('invoice_date', '=', $i)
                        ->select('id')
                        ->pluck('id')->toArray();
                    $order = Order::whereIn('invoice_id', $invoice)->pluck('meal_id')->toArray();

                    $days_list[] =
                        [
                            'date' => $i,
                            'calories' => (isset($order)) ? array_sum(Meal::whereIn('id', $order)
                                ->pluck('calories')->toArray()) : 0,
                        ];
                }

            }

            return helperJson($days_list,'تم الحصول علي بيانات الاحصائيات بنجاح',200);

        } catch (\Exception $exception) {
            return returnMessageError($exception->getMessage(), 500);
        }
    }
}
