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
                                    <h1 style="text-align: center;
                                    font-weight: bolder;
                                    margin-top: 28px;
                                    margin-bottom: 0px;">{{ trans('home.all_order') }}
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
                                                <th colspan="4" align="center">{{ trans('home.all_order') }}</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @if($invoices->count() > 0)
                                                @foreach($invoices as $invoice)
                                                    <tr>
                                                        <td>#{{ $invoice->id }}<br><small>({{ $invoice->invoice_date }}
                                                                )</small></td>
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
                                            @else
                                                <tr>
                                                    <td colspan="10" align="center">{{ trans('home.no_data') }}</td>
                                                </tr>
                                            @endif
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
                                    margin-bottom: 0px;">{{ trans('home.all_order') }}
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
                                            @if($orders_special->count() > 0)
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
                                            @endif
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
