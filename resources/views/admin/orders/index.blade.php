@extends('layouts_admin.master')
@section('css')
    @toastr_css
    @section('title')
        @lang('home.orders')
    @stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
    @section('PageTitle')
        @lang('home.orders')
    @stop
    <!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row" xmlns="http://www.w3.org/1999/html">
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

                                    {{--                                    <button type="button" class="button x-small" data-toggle="modal"--}}
                                    {{--                                            data-target="#addModal">--}}
                                    {{--                                        @lang('home.add_admin')--}}
                                    {{--                                    </button>--}}
                                    <br><br>

                                    <div class="table-responsive">
                                        <table id="datatable" class="table  table-hover table-sm table-bordeblue p-0"
                                               data-page-length="50"
                                               style="text-align: center">
                                            <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>{{ trans('home.name') }}</th>
                                                <th>{{ trans('home.date_meal') }}</th>
                                                <th>{{ trans('home.details') }}</th>
                                                <th>{{ trans('home.comments') }}</th>
                                                <th>@lang('home.actions')</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php $i = 0; ?>
                                            @foreach ($invoices as $invoice)
                                                <tr>
                                                    <td>{{ $invoice->id }}</td>
                                                    <td>{{ $invoice->user->name }}</td>
                                                    <td>{{ $invoice->invoice_date }}</td>
                                                    <td>
                                                        <button type="button" class="btn btn-success btn-sm"
                                                                data-toggle="modal"
                                                                data-target="#details{{ $invoice->id }}"
                                                                title="{{ trans('home.details') }}"><i
                                                                class="fa fa-eye"></i> {{trans('home.details')}}
                                                        </button>
                                                    </td>
                                                    <td>
                                                        @if($invoice->comment !== null)
                                                            <button type="button" class="btn btn-info btn-sm"
                                                                    data-toggle="modal"
                                                                    data-target="#comment{{ $invoice->id }}"
                                                                    title="{{ trans('home.show') }}"><i
                                                                    class="fa fa-comment"></i> {{trans('home.show')}}
                                                            </button>
                                                        @else
                                                            <button type="button" class="btn btn-info btn-sm"
                                                                    data-toggle="modal"
                                                                    disabled
                                                                    data-target="#comment{{ $invoice->id }}"
                                                                    title="{{ trans('home.show') }}"><i
                                                                    class="fa fa-comment"></i> {{ trans('home.no_data') }}
                                                            </button>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if($invoice->status == 0)
                                                            <button style="cursor: pointer" data-id="{{$invoice->id}}"
                                                                    class="btn btn-sm btn-danger statusSpan"
                                                                    title="Hints : click to send to chef">{{ trans('home.hanging') }}</button>
                                                        @else
                                                            <button style="cursor: pointer" data-id="{{$invoice->id}}"
                                                                    class="btn btn-sm btn-success statusSpan"> {{ trans('home.has_send') }}
                                                            </button>
                                                        @endif
                                                    </td>
                                                </tr>

                                                <!-- details invoice -->
                                                <div class="modal fade" id="details{{ $invoice->id }}" tabindex="-1"
                                                     role="dialog"
                                                     aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <?php $orders = \App\Models\Order::where('invoice_id', $invoice->id)->get(); ?>
                                                    <div class="modal-dialog modal-lg" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 style="font-family: 'Cairo', sans-serif;"
                                                                    class="modal-title"
                                                                    id="exampleModalLabel">
                                                                    {{ trans('home.show') }}
                                                                </h5>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                        aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="row">
                                                                    <div class="col-12">
                                                                        <label>تفاصيل الوجبات</label>
                                                                        @foreach($orders as $order)
                                                                            <div class="card card-statistics"
                                                                                 style="margin: 10px">
                                                                                <div style="margin: 10px">
                                                                                    <label>#{{ $loop->iteration }}</label><br/>
                                                                                    <lable>{{ trans('home.meal_type_') }}</lable>
                                                                                    <h3>{{ (lang() == 'ar') ? $order->meal->meal_type->name_ar : $order->meal->meal_type->name_en  }}</h3>
                                                                                    <lable>{{ trans('home.meal_name') }}</lable>
                                                                                    <h3>{{ (lang() == 'ar') ? $order->meal->name_ar : $order->meal->name_en  }}</h3>
                                                                                </div>
                                                                            </div>
                                                                        @endforeach
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <br><br>

                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                        data-dismiss="modal">{{ trans('home.close') }}</button>
                                                            </div>
                                                            {{--                                                                </form>--}}

                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- comment invoice -->
                                                <div class="modal fade" id="comment{{ $invoice->id }}" tabindex="-1"
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
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                        aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="row">
                                                                    <div class="col-12">
                                                                        <div class="card card-statistics"
                                                                             style="margin: 10px">
                                                                            <div style="margin: 10px">
                                                                                <label>{{ trans('home.comments') }}</label>
                                                                                <h3>{{ $invoice->comment }}</h3>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <br><br>

                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                        data-dismiss="modal">{{ trans('home.close') }}</button>
                                                            </div>
                                                            {{--                                                                </form>--}}

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

    <script>
        // change users status
        $(document).on('click', '.statusSpan', function (event) {
            var id = $(this).data("id")
            $.ajax({
                type: 'POST',
                url: "{{route('orders.status')}}",
                data: {
                    '_token': "{{csrf_token()}}",
                    'id': id,
                },
                success: function (data) {
                    if (data.success === true) {
                        // toastr.success(data.message)
                        location.reload();
                    } else {
                        toastr.error('هناك خطأ ما ...')
                    }
                }
            })
        });
    </script>

@endsection
