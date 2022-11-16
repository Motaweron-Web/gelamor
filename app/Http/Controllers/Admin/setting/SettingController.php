<?php

namespace App\Http\Controllers\Admin\setting;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SettingStore;
use App\Models\Setting;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Contracts\Validation\ValidatorAwareRule;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        $setting = Setting::first();
        return view('admin.setting.index', compact('setting'));
    } // end index

    public function update(SettingStore $request)
    {
        try {

            $setting = Setting::findOrFail($request->id);

            $setting->update($request->all());
            toastr()->success(trans('messages.update_message_success'));
            return redirect()->route('setting.index');
        }catch (Validator $validator) {
            toastr()->error($validator->errors()->all());
            return redirect()->back();
        }
    } // end update

    public function privacy()
    {
        $setting = Setting::first();
        return view('admin.setting.privacy', compact('setting'));
    } // end privacy

    public function privacy_update(Request $request)
    {
        try {
            $request->validate([
                'privacy_ar' => 'required',
                'privacy_en' => 'required',
            ],[
                'privacy_ar.required' => trans('validation.privacy_ar.required'),
                'privacy_en.required' => trans('validation.privacy_en.required'),
            ]);

            $privacy = Setting::findOrFail($request->id);
            $privacy->update($request->all());
            toastr()->success(trans('messages.update_message_success'));
            return redirect()->route('setting.privacy');

        }   catch (Validator $validator) {
            toastr()->error($validator->errors()->all());
            return redirect()->back();
        }
    } // end privacy update

    public function about()
    {
        $setting = Setting::first();
        return view('admin.setting.about', compact('setting'));
    } // end about

    public function about_update(Request $request)
    {
        try {
            $request->validate([
                'about_ar' => 'required',
                'about_en' => 'required',
            ],[
                'about_ar.required' => trans('validation.about_ar.required'),
                'about_en.required' => trans('validation.about_en.required'),
            ]);

            $about = Setting::findOrFail($request->id);
            $about->update($request->all());
            toastr()->success(trans('messages.update_message_success'));
            return redirect()->route('setting.about');

        }   catch (Validator $validator) {
            toastr()->error($validator->errors()->all());
            return redirect()->back();

//            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    } // end about update

    public function terms()
    {
        $setting = Setting::first();
        return view('admin.setting.terms', compact('setting'));
    } // end about

    public function terms_update(Request $request)
    {
        try {
            $request->validate([
                'terms_ar' => 'required',
                'terms_en' => 'required',
            ],[
                'terms_ar.required' => trans('validation.terms_ar.required'),
                'terms_en.required' => trans('validation.terms_en.required'),
            ]);

            $terms = Setting::findOrFail($request->id);
            $terms->update($request->all());
            toastr()->success(trans('messages.update_message_success'));
            return redirect()->route('setting.terms');

        }   catch (Validator $validator) {
            toastr()->error($validator->errors()->all());
            return redirect()->back();
        }
    } // end about update

}
