<?php

namespace App\Http\Controllers\Api\Password;

use App\Http\Controllers\Controller;
use App\Http\Requests\Password\ResetRequest;
use App\Models\ResetCodePassword;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ResetPasswordController extends Controller
{
    public function __invoke(ResetRequest $request)
    {
        // find the code
        $passwordReset = ResetCodePassword::firstWhere('code', $request->code);

        // check if it does not expired: the time is one hour
        if ($passwordReset->created_at->addHour() < now()) {
            $passwordReset->delete();
            return helperJson(null, ['message' => trans('passwords.code_is_expire')], 422);
        }

        $password = Hash::make($request->password);
        // find user's email
        $user = User::firstWhere('email', $passwordReset->email);

        // update user password
        $user->update(['password' => $password]);

        // delete current code
        $passwordReset->delete();

        return response(['message' =>'password has been successfully reset'], 200);
    }
}
