{{--@php use App\Models\Order; @endphp--}}
@extends('layouts_admin.master')
@section('css')
    @toastr_css
    @section('title')
        @if(\Carbon\Carbon::now()->format('Y-m-d') == $date)
            @lang('home.order_day')
        @else
            {{ \Carbon\Carbon::parse($date)->dayName }}
        @endif
    @stop
@endsection
@section('page-header')
    <!--breadcrumb -->
    @section('PageTitle')
        @if(\Carbon\Carbon::now()->format('Y-m-d') == $date)
            @lang('home.order_day')
        @else
            {{ \Carbon\Carbon::parse($date)->dayName }}
        @endif
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
                                    @if(\Carbon\Carbon::now()->format('Y-m-d') == $date)
                                        <h1 style="text-align: center;
                                    font-weight: bolder;
                                    margin-top: 28px;
                                    margin-bottom: 0px;">{{ trans('home.order_day') }}
                                            <small>({{ trans('home.basic_orders') }})</small>
                                        </h1>
                                    @else
                                        <h1 style="text-align: center;
                                    font-weight: bolder;
                                    margin-top: 28px;
                                    margin-bottom: 0px;">{{ \Carbon\Carbon::parse($date)->dayName }}
                                            <small>({{ trans('home.basic_orders') }})</small>
                                        </h1>
                                    @endif
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
                                            @if($invoices->count() > 0)
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
                                            @else
                                                <tr>
                                                    <td colspan="4" align="center">{{ trans('home.no_data') }}</td>
                                                </tr>
                                            @endif
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @if(\Carbon\Carbon::now()->format('Y-m-d') == $date)
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
                                                   data-page -length="50"
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
                                                @if($invoices->count() > 0)
                                                    @foreach($orders as $order)
                                                            <?php $meal_count = \App\Models\Order::where('meal_id', $order->meal_id)->groupBy('meal_id')->count(); ?>
                                                        <tr>
                                                            <td>#{{  $order->meal_id }}</td>
                                                            @if($order->invoice->invoice_date == $invoice->invoice_date)
                                                                <td>
                                                                    <div
                                                                        style="display: grid">{{ (lang() == 'ar') ? $order->meal->name_ar : $order->meal->name_en }}</div>
                                                                </td>
                                                            @endif
                                                            <td>
                                                                <div style="display: grid">X{{ $meal_count }}</div>
                                                            </td>
                                                            <td>
                                                                <button type="button" class="btn btn-info btn-sm"
                                                                        data-toggle="modal"
                                                                        data-target="#comment{{ $order->meal->id }}"
                                                                        title="{{ trans('home.show') }}"><i
                                                                        class="fa fa-comment"></i> {{ trans('home.special_orders') }}
                                                                </button>
                                                            </td>
                                                        </tr>
                                                        <!-- show order comments -->
                                                        <div class="modal fade" id="comment{{ $order->meal->id }}"
                                                             tabindex="-1"
                                                             role="dialog"
                                                             aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog modal-lg" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 style="font-family: 'Cairo', sans-serif;"
                                                                            class="modal-title"
                                                                            id="exampleModalLabel">
                                                                            {{ trans('home.show') }}
                                                                        </h5>
                                                                        <button type="button" class="close"
                                                                                data-dismiss="modal"
                                                                                aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <div class="row">
                                                                            <div class="col-12" style="margin: 10px 31px;
                                                                flex: 0px">
                                                                                <div class="card card-body">
                                                                                    <label>@lang('home.comments')</label>
                                                                                    <h4>{{ $invoice->comment }}</h4>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <br><br>

                                                                        <div class="modal-footer">
                                                                            <button type="button"
                                                                                    class="btn btn-secondary"
                                                                                    data-dismiss="modal">{{ trans('home.close') }}</button>
                                                                        </div>
                                                                        {{--                                                                </form>--}}

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                @else
                                                    <tr>
                                                        <td colspan="4" align="center">{{ trans('home.no_data') }}</td>
                                                    </tr>
                                                @endif
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                        <div class="col-xl-12 mb-30">
                            <div class="card card-statistics h-100">
                                <div class="card-body">
                                    @if(\Carbon\Carbon::now()->format('Y-m-d') == $date)
                                        <h1 style="text-align: center;
                                    font-weight: bolder;
                                    margin-top: 28px;
                                    margin-bottom: 0px;">{{ trans('home.order_day') }}
                                            <small>({{ trans('home.special_orders') }})</small>
                                        </h1>
                                    @else
                                        <h1 style="text-align: center;
                                    font-weight: bolder;
                                    margin-top: 28px;
                                    margin-bottom: 0px;">{{ \Carbon\Carbon::parse($date)->dayName }}
                                            <small>({{ trans('home.special_orders') }})</small>
                                        </h1>
                                    @endif
                                    <br><br>
                                    <div class="table-bordeblue">
                                        <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                                               data-page-length="50"
                                               style="text-align: center">
                                            <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>{{ trans('home.user_id') }}</th>
                                                <th>{{ trans('home.breakfast') }}
                                                    <small>({{ trans('home.components') }}
                                                        )</small></th>
                                                <th>{{ trans('home.lunch') }} <small>({{ trans('home.components') }}
                                                        )</small></th>
                                                <th>{{ trans('home.dinner') }}
                                                    <small>({{ trans('home.components') }}
                                                        )</small></th>
                                                <th>{{ trans('home.snacks') }}
                                                    <small>({{ trans('home.components') }}
                                                        )</small></th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @if($orders_special->count() > 0)
                                                @foreach($orders_special as $special)
                                                    @php
                                                        $orders_specials = \App\Models\OrderSpecial::where('date_of_order', $invoice->invoice_date)
                                                        ->where('user_id',$special->user_id)->get();
                                                    @endphp
                                                    <tr>
                                                        <td>#{{ $special->id }}</td>
                                                        <td>#{{ $special->user->id }}</td>
                                                        <td>
                                                            @foreach($orders_specials as $value)
                                                                @if($value->meal_type_id == 1)
                                                                    <div>{{ '#'. $value->component->id }} {{ (lang() == 'ar') ? $value->component->name_ar : $value->component->name_en }}</div>
                                                                @endif
                                                            @endforeach
                                                        </td>
                                                        <td>
                                                            @foreach($orders_specials as $value)
                                                                @if($value->meal_type_id == 2)
                                                                    <div>{{ '#'. $value->component->id }} {{ (lang() == 'ar') ? $value->component->name_ar : $value->component->name_en }}</div>
                                                                @endif
                                                            @endforeach
                                                        </td>
                                                        <td>
                                                            @foreach($orders_specials as $value)
                                                                @if($value->meal_type_id == 3)
                                                                    <div>{{ '#'. $value->component->id }} {{ (lang() == 'ar') ? $value->component->name_ar : $value->component->name_en }}</div>
                                                                @endif
                                                            @endforeach
                                                        </td>
                                                        <td>
                                                            @foreach($orders_specials as $value)
                                                                @if($value->meal_type_id == 4)
                                                                    <div>{{ '#'. $value->component->id }} {{ (lang() == 'ar') ? $value->component->name_ar : $value->component->name_en }}</div>
                                                                @endif
                                                            @endforeach
                                                        </td>
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
                                    @if(\Carbon\Carbon::now()->format('Y-m-d') == $date)
                                        <h1 style="text-align: center;
                                    font-weight: bolder;
                                    margin-top: 28px;
                                    margin-bottom: 0px;">{{ trans('home.order_day') }}
                                            <small>({{ trans('home.special_orders_patient') }})</small>
                                        </h1>
                                    @else
                                        <h1 style="text-align: center;
                                    font-weight: bolder;
                                    margin-top: 28px;
                                    margin-bottom: 0px;">{{ \Carbon\Carbon::parse($date)->dayName }}
                                            <small>({{ trans('home.special_orders_patient') }})</small>
                                        </h1>
                                    @endif
                                    <br><br>
                                    <div class="table-bordeblue">
                                        <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                                               data-page-length="50"
                                               style="text-align: center">
                                            <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>{{ trans('home.user_id') }}</th>
                                                <th>{{ trans('home.breakfast') }}
                                                    <small>({{ trans('home.components') }}
                                                        )</small></th>
                                                <th>{{ trans('home.lunch') }} <small>({{ trans('home.components') }}
                                                        )</small></th>
                                                <th>{{ trans('home.dinner') }}
                                                    <small>({{ trans('home.components') }}
                                                        )</small></th>
                                                <th>{{ trans('home.snacks') }}
                                                    <small>({{ trans('home.components') }}
                                                        )</small></th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @if($orders_special->count() > 0)
                                                @foreach($orders_special as $special)
                                                    @php
                                                        $orders_specials = \App\Models\OrderSpecial::where('date_of_order', $invoice->invoice_date)
                                                        ->where('user_id',$special->user_id)->get();
                                                    @endphp
                                                    <tr>
                                                        <td>#{{ $special->id }}</td>
                                                        <td>#{{ $special->user->id }}</td>
                                                        <td>
                                                            @foreach($orders_specials as $value)
                                                                @if($value->meal_type_id == 1)
                                                                    <div>{{ '#'. $value->component->id }} {{ (lang() == 'ar') ? $value->component->name_ar : $value->component->name_en }}</div>
                                                                @endif
                                                            @endforeach
                                                        </td>
                                                        <td>
                                                            @foreach($orders_specials as $value)
                                                                @if($value->meal_type_id == 2)
                                                                    <div>{{ '#'. $value->component->id }} {{ (lang() == 'ar') ? $value->component->name_ar : $value->component->name_en }}</div>
                                                                @endif
                                                            @endforeach
                                                        </td>
                                                        <td>
                                                            @foreach($orders_specials as $value)
                                                                @if($value->meal_type_id == 3)
                                                                    <div>{{ '#'. $value->component->id }} {{ (lang() == 'ar') ? $value->component->name_ar : $value->component->name_en }}</div>
                                                                @endif
                                                            @endforeach
                                                        </td>
                                                        <td>
                                                            @foreach($orders_specials as $value)
                                                                @if($value->meal_type_id == 4)
                                                                    <div>{{ '#'. $value->component->id }} {{ (lang() == 'ar') ? $value->component->name_ar : $value->component->name_en }}</div>
                                                                @endif
                                                            @endforeach
                                                        </td>
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
