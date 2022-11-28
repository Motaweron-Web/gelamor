@extends('layouts_admin.master')
@section('css')
    @toastr_css
    @section('title')
        @lang('home.orders')
    @stop
@endsection
@section('page-header')
    <!--breadcrumb -->
    @section('PageTitle')
        @lang('home.orders')
    @stop
    <!-- breadcrumb -->
@endsection
@section('content')

    <!-- row -->
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    <div class="row">
                        <div class="col-xl-12 mb-30">
                            <div class="card card-statistics h-100">
                                <div class="card-body">
                                    <br><br>
                                    <div class="table-responsive">
                                        <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                                               data-page-length="50"
                                               style="text-align: center">
                                            <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>{{ trans('home.user_id') }}</th>
                                                @foreach($meal_types as $type)
                                                    <th>{{ ( lang() == 'ar' ) ? $type->name_ar : $type->name_en }}</th>
                                                @endforeach
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td>##</td>
                                                <td>#</td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>







    <!-- row -->

    <!-- row closed -->
@endsection
@section('js')
    @toastr_js
    @toastr_render

@endsection
