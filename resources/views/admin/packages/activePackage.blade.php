@extends('layouts_admin.master')
@section('css')
    @toastr_css
    @section('title')
        @lang('home.packages')
    @stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
    @section('PageTitle')
        @lang('home.activated_packages')
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
                                    <div class="table-responsive">
                                        <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                                               data-page-length="50"
                                               style="text-align: center">
                                            <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>{{ trans('home.users') }}</th>
                                                <th>{{ lang() == 'ar' ? 'اسم الباقة' : 'Package Name'}}</th>
                                                <th>{{ lang() == 'ar' ? 'تفاصيل الباقة' : 'Package details' }}</th>
                                                <th>{{ trans('home.payment') }}</th>
                                                <th>{{ trans('home.actions') }}</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php $i = 0; ?>

                                            @foreach ($user_package as $package)
                                                @if($package->status == 1)
                                                    <tr>
                                                            <?php $i++; ?>
                                                        <td>{{ $i }}</td>
                                                        <td>{{ lang() == 'ar' ? $package->user->name_ar : $package->user->name_en  }}</td>
                                                        <td>{{ lang() == 'ar' ? $package->package->name_ar : $package->package->name_en }}</td>
                                                        <td>
                                                            <button type="button" class="btn btn-info btn-sm"
                                                                    data-toggle="modal"
                                                                    data-target="#show{{ $package->package_id }}"
                                                                    title="{{ trans('home.show') }}"><i
                                                                    class="fa fa-eye"></i> {{ trans('home.details') }}
                                                            </button>
                                                        </td>
                                                        <td>{{ (trans('home.'.$package->payment_method)) }}</td>
                                                        <td>
                                                            @if($package->status == 0)
                                                                <button style="cursor: pointer" data-id="{{$package->id}}"
                                                                        class="btn btn-sm btn-danger statusSpan" title="Hints : click to Active Package">{{ trans('home.hanging') }}</button>
                                                            @else
                                                                <button style="cursor: pointer" data-id="{{$package->id}}"
                                                                        class="btn btn-sm btn-success statusSpan"> {{ lang() == 'ar' ? 'مفعل'  : 'activated' }}
                                                                </button>
                                                            @endif
                                                        </td>
                                                    </tr>

                                                    <!-- show_modal_Grade -->
                                                    <div class="modal fade" id="show{{$package->package_id}}"
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
                                                                        <div class="col-lg-6">
                                                                            <label for="name"
                                                                                   class="mr-sm-2">{{ lang() == 'ar' ? trans('home.package_name_ar') : trans('home.package_name_en') }}
                                                                                :</label>
                                                                            <input id="name_ar" type="text"
                                                                                   name="name_ar" class="form-control"
                                                                                   disabled
                                                                                   value="{{ lang() == 'ar' ? $package->package->name_ar : $package->package->name_en }}">
                                                                            <label for="start"
                                                                                   class="mr-sm-2">{{ trans('home.start')}}
                                                                                :</label>
                                                                            <input id="start" type="text" name="start"
                                                                                   class="form-control"
                                                                                   required
                                                                                   value="{{ $package->package->start->format('Y-m-d') }}"
                                                                                   disabled>
                                                                            <label for="price"
                                                                                   class="mr-sm-2">{{ trans('home.price') }}
                                                                                :</label>
                                                                            <input id="price" type="number" name="price"
                                                                                   class="form-control"
                                                                                   required
                                                                                   value="{{ $package->package->price }}"
                                                                                   disabled>
                                                                        </div>
                                                                        <div class="col-6">
                                                                            <label for="type"
                                                                                   class="mr-sm-2">{{ trans('home.type_package') }}
                                                                                :</label>
                                                                            <input id="price" type="text" name="price"
                                                                                   class="form-control"
                                                                                   required
                                                                                   value="{{ $package->package->type }}"
                                                                                   disabled>
                                                                            <label for="end"
                                                                                   class="mr-sm-2">{{ trans('home.end') }}
                                                                                :</label>
                                                                            <input id="end" type="text" name="end"
                                                                                   class="form-control"
                                                                                   required
                                                                                   value="{{ $package->package->end->format('Y-m-d') }}"
                                                                                   disabled>
                                                                            <label for="currency_ar"
                                                                                   class="mr-sm-2">{{ trans('home.currency') }}
                                                                                :</label>
                                                                            <input id="start" type="text" name="start"
                                                                                   class="form-control"
                                                                                   required
                                                                                   value="{{ lang() == 'ar' ? $package->package->currency->name_ar : $package->package->currency->name_en }}"
                                                                                   disabled>
                                                                        </div>
                                                                        <div class="col-12">
                                                                            <label for="details_ar"
                                                                                   class="mr-sm-2">{{ lang() == 'ar' ? trans('home.details_ar') : trans('home.details_en') }}
                                                                                :</label>
                                                                            <input id="start" type="text" name="start"
                                                                                   class="form-control"
                                                                                   required
                                                                                   value="{{ lang() == 'ar' ? $package->package->details_ar : $package->package->details_en }}"
                                                                                   disabled>
                                                                        </div>
                                                                    </div>

                                                                </div>

                                                                <br><br>

                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                            data-dismiss="modal">{{ trans('home.close') }}</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                            @endif
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
                url: "{{route('packageStatus')}}",
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
