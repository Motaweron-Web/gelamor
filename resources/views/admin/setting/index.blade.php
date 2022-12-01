@extends('layouts_admin.master')
@section('css')
    @toastr_css
    @section('title')
        @lang('home.setting_list')
    @stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
    @section('PageTitle')
        @lang('home.setting_list')
    @stop
    <!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="post"  action="{{ route('setting.update') }}" autocomplete="off">
                        @csrf
                        <h6 style="font-family: 'Cairo', sans-serif;color: blue"> </h6><br>
                        <input name="id" value="{{ $setting->id }}" type="hidden" hidden>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>@lang('home.name_ar') : <span class="text-danger">*</span></label>
                                    <input  type="text" name="name_ar" value="{{ $setting->name_ar }}"  class="form-control" required>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>@lang('home.name_en') : <span class="text-danger">*</span></label>
                                    <input  class="form-control" name="name_en" value="{{ $setting->name_en }}" type="text" required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>@lang('home.location_ar') : <span class="text-danger">*</span></label>
                                    <input  type="text" name="location_ar" value="{{ $setting->location_ar }}" class="form-control" required>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>@lang('home.location_en') : <span class="text-danger">*</span></label>
                                    <input  class="form-control" name="location_en" value="{{ $setting->location_en }}" type="text" required>
                                </div>
                            </div>
                        </div>

{{--                        <div class="row">--}}
{{--                            <div class="col-md-6">--}}
{{--                                <div class="form-group">--}}
{{--                                    <label>@lang('home.about_ar') : <span class="text-danger">*</span></label>--}}
{{--                                    <input  type="text" name="about_ar" value="{{ $setting->about_ar }}"  class="form-control">--}}
{{--                                </div>--}}
{{--                            </div>--}}

{{--                            <div class="col-md-6">--}}
{{--                                <div class="form-group">--}}
{{--                                    <label>@lang('home.about_en') : <span class="text-danger">*</span></label>--}}
{{--                                    <input  class="form-control" name="about_en" value="{{ $setting->about_en }}" type="text" >--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="row">--}}
{{--                            <div class="col-md-6">--}}
{{--                                <div class="form-group">--}}
{{--                                    <label>@lang('home.privacy_ar') : <span class="text-danger">*</span></label>--}}
{{--                                    <input  type="text" name="privacy_ar" value="{{ $setting->privacy_ar }}"  class="form-control">--}}
{{--                                </div>--}}
{{--                            </div>--}}

{{--                            <div class="col-md-6">--}}
{{--                                <div class="form-group">--}}
{{--                                    <label>@lang('home.privacy_en') : <span class="text-danger">*</span></label>--}}
{{--                                    <input  class="form-control" name="privacy_en" value="{{ $setting->privacy_en }}"  type="text" >--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="row">--}}
{{--                            <div class="col-md-6">--}}
{{--                                <div class="form-group">--}}
{{--                                    <label>@lang('home.terms_ar') : <span class="text-danger">*</span></label>--}}
{{--                                    <input  type="text" name="terms_ar" value="{{ $setting->terms_ar }}"  class="form-control">--}}
{{--                                </div>--}}
{{--                            </div>--}}

{{--                            <div class="col-md-6">--}}
{{--                                <div class="form-group">--}}
{{--                                    <label>@lang('home.terms_en') : <span class="text-danger">*</span></label>--}}
{{--                                    <input  class="form-control" value="{{ $setting->terms_en }}"  name="terms_en" type="text" >--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>@lang('home.facebook') : <span class="text-danger">*</span></label>
                                    <input  type="url" name="facebook" value="{{ $setting->facebook }}"   class="form-control" required>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>@lang('home.whatsapp') : <span class="text-danger">*</span></label>
                                    <input  class="form-control" value="{{ $setting->whatsapp }}"  name="whatsapp" type="tel" required >
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>@lang('home.snapchat') : <span class="text-danger">*</span></label>
                                    <input  class="form-control" value="{{ $setting->snapchat }}"  name="snapchat" type="url" required >
                                </div>
                            </div>
                        </div>

                        <br>
                        <button class="btn btn-success btn-sm nextBtn btn-lg pull-right" type="submit">@lang('home.update')</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
    <!-- row closed -->
@endsection
@section('js')
    @toastr_js
    @toastr_render

@endsection
