<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Resources\PackageResource;
use App\Http\Resources\UserResource;
use App\Models\Package;
use App\Models\User;
use App\Models\UserPackage;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Request;

class ProfileController extends Controller
{


    public function getProfile()
    {


        try {

            $user = auth()->guard('user-api')->user();

            return returnDataSuccess("تم الحصول علي بيانات المستخدم بنجاح", 200, "user", new UserResource($user));

        } catch (\Exception $exception) {


            return returnMessageError($exception->getMessage(), 500);

        }

    }


    public function update(UpdateUserRequest $request)
    {


        try {

            if ($image = $request->file('img')) {

                $destinationPath = 'img_user/';
                $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
                $image->move($destinationPath, $profileImage);
                $request['img'] = "$profileImage";

            }

            $user_id = auth()->guard('user-api')->id();

            $user = User::find($user_id);

            if (!$user) {

                return returnMessageError("user not found", 404);

            }

            $user->update([

                'name_ar' => $request->name_ar,
                'name_en' => $request->name_en,
                'email' => $request->email,
                'password' => Hash::make($request->password) ?? $user->password,
                'phone' => $request->phone,
                'location_ar' => $request->location_ar,
                'location_en' => $request->location_en,
                'country_id' => $request->country_id,
                'img' => $profileImage ?? $user->img,

            ]);


            return returnDataSuccess("تم تعديل بيانات المستخدم بنجاح", 200, "user", new UserResource($user));

        } catch (\Exception $exception) {

            return returnMessageError($exception->getMessage(), 500);
        }

    }

    public function checkPackage(Request $request)
    {
        try {

            $user = User::find(auth()->guard('user-api')->id());
            $package = UserPackage::select('package_id', 'created_at')->where('user_id', $user->id)
                ->where('status', '1')
                ->first();

            if ($package) {
                return helperJson([
                    new PackageResource($package->package),
                    'Subscription date' => $package->created_at->format('Y-m-d')
                ], 'you are in Package', 200);
            } else {
                return helperJson(null, 'You are not subscribed to any package', 204);
            }
        } catch (\Exception $exception) {
            return returnMessageError($exception->getMessage(), 500);
        }
    }
}
