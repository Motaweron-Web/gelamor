<?php

namespace App\Http\Controllers\Chef\Auth;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    public function index()
    {
        if (Auth::guard('chef')->check()) {
            return redirect()->route('chef.home');
        }
        return view('chef.auth.login');
    }

    public function login(Request $request)
    {
        $data = $request->validate([
            'email' => 'required|exists:chefs',
            'password' => 'required'
        ], [
            'email.exists' => 'هذا البريد غير مسجل معنا',
            'email.required' => 'يرجي ادخال البريد الالكتروني',
            'password.required' => 'يرجي ادخال كلمة المرور',
        ]);
        if (Auth::guard('chef')->attempt($data)) {
            toastr()->success(trans('messages.login_success'));
            return redirect()->route('chef.home');
        } else {
            toastr()->success(trans('messages.login_error'));
            return redirect()->route('chef.login');
        }
    }

    public function logout()
    {
        Auth::guard('chef')->logout();
        toastr()->info('تم تسجيل الخروج');
        return redirect()->route('select-login');
    }

}//end class
