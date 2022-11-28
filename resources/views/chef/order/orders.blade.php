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
        {{ trans('home.all_order') }}
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

                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                    <br><br>
                                    <div class="table-responsive">
                                        <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                                               data-page-length="50"
                                               style="text-align: center">
                                            <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>{{ trans('home.user_id') }}</th>
                                                @foreach($meal_types as $meal_type)
                                                <th>{{ (lang() == 'ar') ? $meal_type->name_ar :  $meal_type->name_en }}</th>
                                                @endforeach
                                                <th>{{ trans('home.created_at')}}</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($orders as $order)
                                                @php

                                                @endphp
                                                <tr>
                                                    <td>#{{ $order->id }}</td>
                                                    <td>#{{ $order->user_id }}</td>
                                                    <td>{{ ($order->meal->meal_type_id == 3) ? (lang() == 'ar') ? $order->meal->name_ar : '' : '---' }}</td>
                                                    <td>{{ ($order->meal->meal_type_id == 4) ? (lang() == 'ar') ? $order->meal->name_ar : '' : '---' }}</td>
                                                    <td>{{ ($order->meal->meal_type_id == 5) ? (lang() == 'ar') ? $order->meal->name_ar : '' : '---' }}</td>
                                                    <td>{{ ($order->meal->meal_type_id == 6) ? (lang() == 'ar') ? $order->meal->name_ar : '' : '---' }}</td>
                                                    <td>{{ $order->date_of_order }}</td>
                                                </tr>
                                            @endforeach
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
    <!-- row closed -->
@endsection
@section('js')
    @toastr_js
    @toastr_render

@endsection
