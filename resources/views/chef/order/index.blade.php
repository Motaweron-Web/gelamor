{{--@php use App\Models\Order; @endphp--}}
@extends('layouts_admin.master')
@section('css')
    @toastr_css
    @section('title')
        @lang('home.order_day')
    @stop
@endsection
@section('page-header')
    <!--breadcrumb -->
    @section('PageTitle')
        @lang('home.order_day')
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
                                    <h1 style="text-align: center;
                                    font-weight: bolder;
                                    margin-top: 28px;
                                    margin-bottom: 0px;">{{ trans('home.order_day') }}
                                        <small>({{ trans('home.basic_orders') }})</small></h1>
                                    <br><br>
                                    <div class="table-bordeblue">
                                        <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                                               data-page-length="50"
                                               style="text-align: center">
                                            <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>{{ trans('home.user_id') }}</th>
                                                <th colspan="4" align="center">{{ trans('home.order_day') }}</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($invoices as $invoice)
                                                <tr>
                                                    <td>#{{ $invoice->id }}</td>
                                                    <td>#{{ $invoice->user->id }}</td>
                                                    @foreach($invoice->details as $meal)
                                                        <td>
                                                            <div>{{ lang() == 'ar' ? $meal->meal->meal_type->name_ar : $meal->meal->meal_type->name_en}}</div>
                                                            <div>{{ lang() == 'ar' ? $meal->meal->name_ar : $meal->meal->name_en}}</div>
                                                            <div>{{ trans('home.protein'). ' ' . $meal->protein }}</div>
                                                        </td>
                                                    @endforeach
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-12 mb-30">
                            <div class="card card-statistics h-100">
                                <div class="card-body">
                                    <h1 style="text-align: center;
                                    font-weight: bolder;
                                    margin-top: 28px;
                                    margin-bottom: 0px;">{{ trans('home.total') }}</h1>
                                    <br><br>
                                    <div class="table-bordeblue">
                                        <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                                               data-page-length="50"
                                               style="text-align: center">
                                            <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>{{ trans('home.order_day') }}</th>
                                                <th>{{ trans('home.basic_orders') }}</th>
                                                <th>{{ trans('home.special_orders') }}</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php $orders = \App\Models\Order::get(); ?>
                                            <tr>
                                                <td>#</td>
                                                <td>
                                                    @foreach($orders as $order)
                                                        @if($invoices == null)
                                                            @if($order->invoice->invoice_date == $invoice->invoice_date)
                                                                <div
                                                                    style="display: grid">{{ (lang() == 'ar') ? $order->meal->name_ar : $order->meal->name_en }}</div>
                                                            @endif
                                                        @endif
                                                    @endforeach
                                                </td>
                                                <?php $commnets = \App\Models\Comment::where('meal_id', $order->meal->id)->get(); ?>
                                                <td>
                                                    <div style="display: grid">X{{ $invoices->count() }}</div>
                                                </td>
                                                <td>
                                                    <div style="display: grid; border: 1px solid #2FBE21">
                                                        @foreach($commnets as $comment)
                                                            {{ trans('home.user_id') .' [ ' . $comment->user_id .' ] ' }}
                                                            <br>
                                                            @if($invoices == null)
                                                            {{  'اسم الوجبة' .' [ '}} {{(lang() == 'ar') ? $meal->meal->name_ar : $meal->meal->name_en}}  {{' ] ' }}
                                                            @endif
                                                            <br>
                                                            <h6 style="margin: 0px">Comments</h6>
                                                            {{ $comment->comment }}
                                                        @endforeach
                                                    </div>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-12 mb-30">
                            <div class="card card-statistics h-100">
                                <div class="card-body">
                                    <h1 style="text-align: center;
                                    font-weight: bolder;
                                    margin-top: 28px;
                                    margin-bottom: 0px;">{{ trans('home.order_day') }}
                                        <small>({{ trans('home.special_orders') }})</small></h1>
                                    <br><br>
                                    <div class="table-bordeblue">
                                        <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                                               data-page-length="50"
                                               style="text-align: center">
                                            <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>{{ trans('home.user_id') }}</th>
                                                <th>{{ trans('home.breakfast') }} <small>({{ trans('home.components') }}
                                                        )</small></th>
                                                <th>{{ trans('home.lunch') }} <small>({{ trans('home.components') }}
                                                        )</small></th>
                                                <th>{{ trans('home.dinner') }} <small>({{ trans('home.components') }}
                                                        )</small></th>
                                                <th>{{ trans('home.snacks') }} <small>({{ trans('home.components') }}
                                                        )</small></th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($orders_special as $special)
                                                <tr>
                                                    <td>#{{ $special->id }}</td>
                                                    <td>#{{ $special->user->id }}</td>
                                                    @if($special->meal_type_id == 1)
                                                        <td>{{ (lang() == 'ar') ? $special->component->name_ar : $special->component->name_en }}</td>
                                                    @else
                                                        <td>---</td>
                                                    @endif
                                                    @if($special->meal_type_id == 2)
                                                        <td>{{ (lang() == 'ar') ? $special->component->name_ar : $special->component->name_en }}</td>
                                                    @else
                                                        <td>---</td>
                                                    @endif
                                                    @if($special->meal_type_id == 3)
                                                        <td>{{ (lang() == 'ar') ? $special->component->name_ar : $special->component->name_en }}</td>
                                                    @else
                                                        <td>---</td>
                                                    @endif
                                                    @if($special->meal_type_id == 4)
                                                        <td>{{ (lang() == 'ar') ? $special->component->name_ar : $special->component->name_en }}</td>
                                                    @else
                                                        <td>---</td>
                                                    @endif
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






    <!-- row -->

    <!-- row closed -->
@endsection
@section('js')
    @toastr_js
    @toastr_render
@endsection
