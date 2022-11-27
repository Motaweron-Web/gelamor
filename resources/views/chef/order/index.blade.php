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


                        @if ($errors->any())
                            <div class="error">{{ $errors->first('Name') }}</div>
                        @endif


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
                                                @foreach($meal_types as $type)
                                                    <th>{{ ( lang() == 'ar' ) ? $type->name_ar : $type->name_en }}</th>
                                                @endforeach
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($orders as $order)
                                                    <?php
                                                    $order_day = \App\Models\Order::where('date_of_order', $order->date_of_order)
                                                        ->where('user_id', $order->user_id)
                                                        ->first();
                                                    ?>
                                                <tr>
                                                    <td>{{ $order->id }}</td>
                                                    <td>#{{ $order->user->id }}</td>
                                                    <td>
                                                        @if($order_day->meal->meal_type->id == 3)
                                                            <button type="button" class="btn btn-success btn"
                                                                    data-toggle="modal"
                                                                    data-target="#breakfast{{ $order->user->id }}{{ $order_day->meal->meal_type->id }}"
                                                                    title="{{ trans('home.show') }}"><i
                                                                    class="fa fa-eye"> {{ trans('home.breakfast') }}</i>
                                                            </button>
                                                        @else
                                                            ---
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if($order_day->meal->meal_type->id == 4)
                                                            <button type="button" class="btn btn-success btn"
                                                                    data-toggle="modal"
                                                                    data-target="#lunch{{ $order->user->id }}"
                                                                    title="{{ trans('home.show') }}"><i
                                                                    class="fa fa-eye"> {{ trans('home.lunch') }}</i>
                                                            </button>
                                                        @else
                                                            ---
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if($order_day->meal->meal_type->id == 5)
                                                            <button type="button" class="btn btn-success btn"
                                                                    data-toggle="modal"
                                                                    data-target="#dinner{{ $order->user->id }}"
                                                                    title="{{ trans('home.show') }}"><i
                                                                    class="fa fa-eye"> {{ trans('home.dinner') }}</i>
                                                            </button>
                                                        @else
                                                            ---
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if($order_day->meal->meal_type->id == 6)
                                                            <button type="button" class="btn btn-success btn"
                                                                    data-toggle="modal"
                                                                    data-target="#snacks{{ $order->user->id }}"
                                                                    title="{{ trans('home.show') }}"><i
                                                                    class="fa fa-eye"> {{ trans('home.snacks') }}</i>
                                                            </button>
                                                        @else
                                                            ---
                                                        @endif
                                                    </td>
                                                </tr>
                                            </tbody>

                                            <!-- order_breakfast -->
                                            <div class="modal fade"
                                                 id="breakfast{{ $order->user->id }}{{ $order_day->meal->meal_type->id }}"
                                                 tabindex="-1"
                                                 role="dialog"
                                                 aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-lg" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 style="font-family: 'Cairo', sans-serif;"
                                                                class="modal-title"
                                                                id="exampleModalLabel">
                                                                {{ trans('home.breakfast') }}
                                                            </h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="row">
                                                                    <?php
                                                                    $order_day = \App\Models\Order::where('date_of_order', $order->date_of_order)
                                                                        ->where('user_id', $order->user_id)
                                                                        ->first();
                                                                    ?>
                                                                @if($order_day->meal->meal_type->id == 3)
                                                                    <div class="col-12">
                                                                        <label for="Name"
                                                                               class="mr-sm-2">{{ trans('home.breakfast') }}
                                                                            :</label>


                                                                        <input id="name" type="text" name="name"
                                                                               class="form-control"
                                                                               style="font-size: 20px"
                                                                               value="{{ (lang() == 'ar') ? $order_day->meal->name_ar : $order_day->meal->name_en }}"
                                                                               disabled>
                                                                    </div>
                                                                    <div class="col-12">
                                                                        <label for="email"
                                                                               class="mr-sm-2">{{ trans('home.components_list') }}
                                                                            :</label>
                                                                        @foreach($order_day->meal->component as $component)
                                                                            <input id="name" type="text" name="name"
                                                                                   style="font-size: 15px"
                                                                                   class="form-control"
                                                                                   value="{{ lang() == 'ar' ? $component->name_ar : $component->name_en }}"
                                                                                   disabled>
                                                                        @endforeach
                                                                    </div>
                                                                    <div class="col-12">
                                                                        <label for="email"
                                                                               class="mr-sm-2">{{ trans('home.protein') }}
                                                                            :</label>
                                                                        <input id="name" type="text" name="name"
                                                                               style="font-size: 15px"
                                                                               class="form-control"
                                                                               value="{{ $order_day->protein }} @lang('home.protein')"
                                                                               disabled>
                                                                    </div>
                                                                @else
                                                                    <div class="col-12">
                                                                        <h1 style="text-align: center">NO DATA</h1>
                                                                    </div>
                                                                @endif

                                                            </div>

                                                            <br><br>

                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                        data-dismiss="modal">{{ trans('home.close') }}</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- order_lunch -->
                                            <div class="modal fade"
                                                 id="lunch{{ $order->user->id }}"
                                                 tabindex="-1"
                                                 role="dialog"
                                                 aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-lg" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 style="font-family: 'Cairo', sans-serif;"
                                                                class="modal-title"
                                                                id="exampleModalLabel">
                                                                {{ trans('home.lunch') }}
                                                            </h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="row">
                                                                    <?php
                                                                    $order_day = \App\Models\Order::where('date_of_order', $order->date_of_order)
                                                                        ->where('user_id', $order->user_id)
                                                                        ->first();
                                                                    ?>
                                                                @if($order_day->meal->meal_type->id == 4)
                                                                    <div class="col-12">
                                                                        <label for="Name"
                                                                               class="mr-sm-2">{{ trans('home.lunch') }}
                                                                            :</label>


                                                                        <input id="name" type="text" name="name"
                                                                               class="form-control"
                                                                               style="font-size: 20px"
                                                                               value="{{ (lang() == 'ar') ? $order_day->meal->name_ar : $order_day->meal->name_en }}"
                                                                               disabled>
                                                                    </div>
                                                                    <div class="col-12">
                                                                        <label for="email"
                                                                               class="mr-sm-2">{{ trans('home.components_list') }}
                                                                            :</label>
                                                                        @foreach($order_day->meal->component as $component)
                                                                            <input id="name" type="text" name="name"
                                                                                   style="font-size: 15px"
                                                                                   class="form-control"
                                                                                   value="{{ lang() == 'ar' ? $component->name_ar : $component->name_en }}"
                                                                                   disabled>
                                                                        @endforeach
                                                                    </div>
                                                                    <div class="col-12">
                                                                        <label for="email"
                                                                               class="mr-sm-2">{{ trans('home.protein') }}
                                                                            :</label>
                                                                        <input id="name" type="text" name="name"
                                                                               style="font-size: 15px"
                                                                               class="form-control"
                                                                               value="{{ $order_day->protein }} @lang('home.protein')"
                                                                               disabled>
                                                                    </div>
                                                                @else
                                                                    <div class="col-12">
                                                                        <h1 style="text-align: center">NO DATA</h1>
                                                                    </div>
                                                                @endif

                                                            </div>

                                                            <br><br>

                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                        data-dismiss="modal">{{ trans('home.close') }}</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- order_dinner -->
                                            <div class="modal fade"
                                                 id="dinner{{ $order->user->id }}"
                                                 tabindex="-1"
                                                 role="dialog"
                                                 aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-lg" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 style="font-family: 'Cairo', sans-serif;"
                                                                class="modal-title"
                                                                id="exampleModalLabel">
                                                                {{ trans('home.dinner') }}
                                                            </h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="row">
                                                                    <?php
                                                                    $order_day = \App\Models\Order::where('date_of_order', $order->date_of_order)
                                                                        ->where('user_id', $order->user_id)
                                                                        ->first();
                                                                    ?>
                                                                @if($order_day->meal->meal_type->id == 5)
                                                                    <div class="col-12">
                                                                        <label for="Name"
                                                                               class="mr-sm-2">{{ trans('home.dinner') }}
                                                                            :</label>


                                                                        <input id="name" type="text" name="name"
                                                                               class="form-control"
                                                                               style="font-size: 20px"
                                                                               value="{{ (lang() == 'ar') ? $order_day->meal->name_ar : $order_day->meal->name_en }}"
                                                                               disabled>
                                                                    </div>
                                                                    <div class="col-12">
                                                                        <label for="email"
                                                                               class="mr-sm-2">{{ trans('home.components_list') }}
                                                                            :</label>
                                                                        @foreach($order_day->meal->component as $component)
                                                                            <input id="name" type="text" name="name"
                                                                                   style="font-size: 15px"
                                                                                   class="form-control"
                                                                                   value="{{ lang() == 'ar' ? $component->name_ar : $component->name_en }}"
                                                                                   disabled>
                                                                        @endforeach
                                                                    </div>
                                                                    <div class="col-12">
                                                                        <label for="email"
                                                                               class="mr-sm-2">{{ trans('home.protein') }}
                                                                            :</label>
                                                                        <input id="name" type="text" name="name"
                                                                               style="font-size: 15px"
                                                                               class="form-control"
                                                                               value="{{ $order_day->protein }} @lang('home.protein')"
                                                                               disabled>
                                                                    </div>
                                                                @else
                                                                    <div class="col-12">
                                                                        <h1 style="text-align: center">NO DATA</h1>
                                                                    </div>
                                                                @endif

                                                            </div>

                                                            <br><br>

                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                        data-dismiss="modal">{{ trans('home.close') }}</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- order_breakfast -->
                                            <div class="modal fade"
                                                 id="snacks{{ $order->user->id }}"
                                                 tabindex="-1"
                                                 role="dialog"
                                                 aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-lg" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 style="font-family: 'Cairo', sans-serif;"
                                                                class="modal-title"
                                                                id="exampleModalLabel">
                                                                {{ trans('home.snacks') }}
                                                            </h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="row">

                                                                @if($order_day->meal->meal_type->id == 6)
                                                                    <div class="col-12">
                                                                        <label for="Name"
                                                                               class="mr-sm-2">{{ trans('home.snacks') }}
                                                                            :</label>


                                                                        <input id="name" type="text" name="name"
                                                                               class="form-control"
                                                                               style="font-size: 20px"
                                                                               value="{{ (lang() == 'ar') ? $order_day->meal->name_ar : $order_day->meal->name_en }}"
                                                                               disabled>
                                                                    </div>
                                                                    <div class="col-12">
                                                                        <label for="email"
                                                                               class="mr-sm-2">{{ trans('home.components_list') }}
                                                                            :</label>
                                                                        @foreach($order_day->meal->component as $component)
                                                                            <input id="name" type="text" name="name"
                                                                                   style="font-size: 15px"
                                                                                   class="form-control"
                                                                                   value="{{ lang() == 'ar' ? $component->name_ar : $component->name_en }}"
                                                                                   disabled>
                                                                        @endforeach
                                                                    </div>
                                                                    <div class="col-12">
                                                                        <label for="email"
                                                                               class="mr-sm-2">{{ trans('home.protein') }}
                                                                            :</label>
                                                                        <input id="name" type="text" name="name"
                                                                               style="font-size: 15px"
                                                                               class="form-control"
                                                                               value="{{ $order_day->protein }} @lang('home.protein')"
                                                                               disabled>
                                                                    </div>
                                                                @else
                                                                    <div class="col-12">
                                                                        <h1 style="text-align: center">NO DATA</h1>
                                                                    </div>
                                                                @endif

                                                            </div>

                                                            <br><br>

                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                        data-dismiss="modal">{{ trans('home.close') }}</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach
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
