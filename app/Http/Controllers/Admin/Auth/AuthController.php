<?php

namespace App\Http\Controllers\Admin\Auth;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    public function index()
    {
        if (Auth::guard('admin')->check()) {
            return redirect()->route('admin.home');
        }
        return view('admin.auth.login');
    }

    public function login(Request $request)
    {
        $data = $request->validate([
            'email' => 'required|exists:admins',
            'password' => 'required'
        ], [
            'email.exists' => 'هذا البريد غير مسجل معنا',
            'email.required' => 'يرجي ادخال البريد الالكتروني',
            'password.required' => 'يرجي ادخال كلمة المرور',
        ]);
        if (Auth::guard('admin')->attempt($data)) {
            toastr()->success(trans('messages.login_success'));
            return redirect()->route('admin.home');
        } else {
            toastr()->success(trans('messages.login_error'));
            return redirect()->route('admin.login');
        }
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        toastr()->info('تم تسجيل الخروج');
        return redirect()->route('select-login');
    }

}//end class
