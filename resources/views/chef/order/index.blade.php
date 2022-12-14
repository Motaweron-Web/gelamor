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
                                                    <th>{{ trans('home.count') . ' ' . trans('home.meals') }}</th>
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
                                                                        @php
                                                                            $comments = \App\Models\Order::where('meal_id',$order->meal->id)
                                                                            ->get();
                                                                        @endphp
                                                                        <div class="row">
                                                                            <div class="col-12"
                                                                                 style="margin: 10px 31px;flex: 0px;">
                                                                                @foreach($comments as $comment)
                                                                                @if($comment->comment !== null)
                                                                                    <div class="card card-body"
                                                                                         style="margin-bottom: 5px">
                                                                                        <label>@lang('home.user_id')
                                                                                            [{{ $comment->invoice->user_id }}]</label>
                                                                                        <h5>{{lang() == 'ar' ? 'رقم الطلب' : 'Order NUM' }}
                                                                                            [{{$comment->invoice_id }}]</h5>
                                                                                        <h4>{{ ($comment->comment !== null) ? $comment->comment : 'No Comment for this meal' }}</h4>
                                                                                    </div>
                                                                                    @endif
                                                                                @endforeach
                                                                            </div>
                                                                        </div>

                                                                        <br><br>

                                                                        <div class="modal-footer">
                                                                            <button type="button"
                                                                                    class="btn btn-secondary"
                                                                                    data-dismiss="modal">{{ trans('home.close') }}</button>
                                                                        </div>

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
                                                <th colspan="4" align="center">{{ trans('home.order_day') }} (
                                                    <small>@lang('home.components')</small> )
                                                </th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @if($orders_special->count() > 0 )
                                                @foreach($orders_special as $special)
                                                    <tr>
                                                        <td>#{{ $special->id }}</td>
                                                        <td>#{{ $special->user->id }}</td>
                                                        <td>
                                                                <?php $orders_specials = \App\Models\OrderSpecial::where('user_id', $special->user_id)
                                                                ->get(); ?>
                                                            @foreach($orders_specials as $special_order)
                                                                <button type="button" class="btn btn-sm btn-success"
                                                                        data-toggle="modal"
                                                                        data-target="#show{{ $special_order->id }}"
                                                                        title="{{ trans('home.breakfast') }}">
                                                                    {{ lang() == 'ar' ? $special_order->meal_type->name_ar : $special_order->meal_type->name_en }}
                                                                </button>
                                                            @endforeach
                                                        </td>
                                                    </tr>
                                                    @foreach($orders_specials as $special_order)
                                                        <!-- show_modal_meal type -->
                                                        <div class="modal fade" id="show{{ $special_order->id }}"
                                                             tabindex="-1"
                                                             role="dialog"
                                                             aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog modal-lg" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 style="font-family: 'Cairo', sans-serif;"
                                                                            class="modal-title"
                                                                            id="exampleModalLabel">
                                                                            {{ trans('home.show') . 'ID['. $special_order->id .']' }}
                                                                        </h5>
                                                                        <button type="button" class="close"
                                                                                data-dismiss="modal"
                                                                                aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <div class="card card-body">
                                                                            <div class="col-6">
                                                                                <label for="Name"
                                                                                       class="mr-sm-2">{{ trans('home.meal_type_') }}
                                                                                    :</label>
                                                                                <h5>{{ $special_order->meal_type->name_ar }}</h5>
                                                                            </div>
                                                                            <div class="col-12">
                                                                                <label for="email"
                                                                                       class="mr-sm-2">{{ trans('home.details') }}
                                                                                    :</label>
                                                                                    <?php $component_order = \App\Models\Component::whereIn('id', $special_order->component_ids)->get(); ?>
                                                                                @foreach($component_order as $component)
                                                                                    <div>
                                                                                        <img
                                                                                            style="width: 5%; height: 30px; margin-left: 10px; margin-bottom: 10px; border-radius: 50%;"
                                                                                            src="{{ asset($component->img) }}">
                                                                                        <h5 style="display: contents;">{{ lang() == 'ar' ? $component->name_ar : $component->name_en }}</h5>
                                                                                    </div>
                                                                                @endforeach
                                                                            </div>
                                                                        </div>

                                                                        <br><br>

                                                                        <div class="modal-footer">
                                                                            <button type="button"
                                                                                    class="btn btn-secondary"
                                                                                    data-dismiss="modal">{{ trans('home.close') }}</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach
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
                                                <th colspan="4" align="center">{{ trans('home.order_day') }} (
                                                    <small>@lang('home.components')</small> )
                                                </th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @if($orders_patient->count() > 0 )
                                                @foreach($orders_patient as $special)
                                                    <tr>
                                                        <td>#{{ $special->id }}</td>
                                                        <td>#{{ $special->user->id }}</td>
                                                        <td>
                                                                <?php $orders_specials = \App\Models\OrderSpecial::where('user_id', $special->user_id)
                                                                ->get(); ?>
                                                            @foreach($orders_specials as $special_order)
                                                                <button type="button" class="btn btn-sm btn-success"
                                                                        data-toggle="modal"
                                                                        data-target="#show{{ $special_order->id }}"
                                                                        title="{{ trans('home.breakfast') }}">
                                                                    {{ lang() == 'ar' ? $special_order->meal_type->name_ar : $special_order->meal_type->name_en }}
                                                                </button>
                                                            @endforeach
                                                        </td>
                                                    </tr>
                                                    @foreach($orders_specials as $special_order)
                                                        <!-- show_modal_meal type -->
                                                        <div class="modal fade" id="show{{ $special_order->id }}"
                                                             tabindex="-1"
                                                             role="dialog"
                                                             aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog modal-lg" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 style="font-family: 'Cairo', sans-serif;"
                                                                            class="modal-title"
                                                                            id="exampleModalLabel">
                                                                            {{ trans('home.show') . 'ID['. $special_order->id .']' }}
                                                                        </h5>
                                                                        <button type="button" class="close"
                                                                                data-dismiss="modal"
                                                                                aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <div class="card card-body">
                                                                            <div class="col-6">
                                                                                <label for="Name"
                                                                                       class="mr-sm-2">{{ trans('home.meal_type_') }}
                                                                                    :</label>
                                                                                <h5>{{ $special_order->meal_type->name_ar }}</h5>
                                                                            </div>
                                                                            <div class="col-12">
                                                                                <label for="email"
                                                                                       class="mr-sm-2">{{ trans('home.details') }}
                                                                                    :</label>
                                                                                    <?php $component_order = \App\Models\Component::whereIn('id', $special_order->component_ids)->get(); ?>
                                                                                @foreach($component_order as $component)
                                                                                    <div>
                                                                                        <img
                                                                                            style="width: 5%; height: 30px; margin-left: 10px; margin-bottom: 10px; border-radius: 50%;"
                                                                                            src="{{ asset($component->img) }}">
                                                                                        <h5 style="display: contents;">{{ lang() == 'ar' ? $component->name_ar : $component->name_en }}</h5>
                                                                                    </div>
                                                                                @endforeach
                                                                            </div>
                                                                        </div>

                                                                        <br><br>

                                                                        <div class="modal-footer">
                                                                            <button type="button"
                                                                                    class="btn btn-secondary"
                                                                                    data-dismiss="modal">{{ trans('home.close') }}</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach
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
