<?php

namespace App\Http\Controllers\Admin\package;

use App\Http\Controllers\Controller;
use App\Models\Currency;
use App\Models\UserPackage;
use Illuminate\Http\Request;
use App\Models\Package;
use App\Models\MealTypePackage;
use App\Http\Requests\StorePackagRequest;
use App\Http\Requests\UpdatePackageRequest;

class PackageController extends Controller
{
    public function index()
    {
        $packages = Package::get();
        $currencies = Currency::get();

        return view('admin.packages.myPackages', compact('packages', 'currencies'));
    } // end index

    public function store(StorePackagRequest $request)
    {
        $inputs = $request->all();


        $package = Package::create($inputs);
        if ($package) {
            $package->meal_type()->attach($request->meal_type_ids);
            toastr()->success(trans('messages.create_message_success'));
            return redirect()->route('package.index');
        } else {
            toastr()->error(trans('message.message_fail'));
            return redirect()->route('package.index');
        }
    } // end store


    public function update(StorePackagRequest $request)
    {
        $inputs = $request->all();
        $package = Package::find($request->id);
        if ($package->update($inputs)) {
            $package->meal_type()->sync($request->meal_type_ids);
            toastr()->success(trans('messages.update_message_success'));
            return redirect()->route('myPackage.index');
        } else {
            toastr()->error(trans('messages.message_fail'));
            return redirect()->route('meals.index');
        }

    } // end update


    public function activePackage()
    {
        $user_package = UserPackage::get();
        return view('admin.packages.activePackage', compact('user_package'));
    } // end function

    public function hangingPackage()
    {
        $user_package = UserPackage::where('status', '0')->get();
        return view('admin.packages.hangingPackage', compact('user_package'));
    } // end function

    public function delete(Request $request)
    {
        $package = Package::find($request->id);
        $package->delete();
        toastr()->error(trans('messages.delete_message_success'));
        return redirect()->back();
    } // end delete

    public function changeStatus(Request $request)
    {
        $package = UserPackage::find($request->id);
        ($package->status == '0') ? $package->status = '1' : $package->status = '0';
        $package->save();
        return response()->json(
            [
                'success' => true,
                'message' => 'تم تغيير حالة المستخدم بنجاح'
            ]);
    } // end Change State


}
