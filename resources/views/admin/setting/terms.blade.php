@extends('layouts_admin.master')
@section('css')
    @toastr_css
    @section('title')
        @lang('home.terms')
    @stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
    @section('PageTitle')
        @lang('home.terms')
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

                    <form method="post" action="{{ route('setting.terms_update') }}" autocomplete="off">
                        @csrf
                        <h6 style="font-family: 'Cairo', sans-serif;color: blue"></h6><br>
                        <input name="id" value="{{ $setting->id }}" type="hidden" hidden>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>@lang('home.terms_ar') : <span class="text-danger">*</span></label>
                                    <textarea type="text" name="terms_ar" id="editor1"
                                              class="form-control">{{ $setting->terms_ar }}</textarea>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>@lang('home.terms_en') : <span class="text-danger">*</span></label>
                                    <textarea class="form-control" name="terms_en" id="editor2"
                                              type="text">{{ $setting->terms_en }}</textarea>
                                </div>
                            </div>
                        </div>

                        <br>
                        <button class="btn btn-success btn-sm nextBtn btn-lg pull-right"
                                type="submit">@lang('home.update')</button>
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

    <script src="//cdn.ckeditor.com/4.9.2/full/ckeditor.js"></script>

    <script>
        CKEDITOR.replace('editor1');
        CKEDITOR.replace('editor2');
    </script>
@endsection
