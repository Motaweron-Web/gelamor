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
        @lang('home.packages')
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
                                    <button type="button" class="button x-small" data-toggle="modal"
                                            data-target="#addModal">
                                        @lang('home.add_package')
                                    </button>
                                    <br><br>

                                    <div class="table-responsive">
                                        <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                                               data-page-length="50"
                                               style="text-align: center">
                                            <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>{{ trans('home.name') }}</th>
                                                <th>{{ trans('home.package_type') }}</th>
                                                <th>{{ trans('home.start') }}</th>
                                                <th>{{ trans('home.expiry_date') }}</th>
                                                <th>{{ trans('home.actions') }}</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php $i = 0; ?>

                                            @foreach ($packages as $package)
                                                @if($package->status == 'show')
                                                    <tr>
                                                            <?php $i++; ?>
                                                        <td>{{ $i }}</td>
                                                        <td>{{ lang() == 'ar' ? $package->name_ar : $package->name_en  }}</td>
                                                        <td>{{ $package->type  }}</td>
                                                        <td>{{ $package->start->format('Y-m-d')  }}</td>
                                                        <td>{{ $package->end->format('Y-m-d')  }}</td>
                                                        <td>
                                                            <button type="button" class="btn btn-danger btn-sm"
                                                                    data-toggle="modal"
                                                                    data-target="#delete{{ $package->id }}"
                                                                    title="{{ trans('home.delete') }}"><i
                                                                    class="fa fa-trash"></i>
                                                            </button>
                                                            <button type="button" class="btn btn-info btn-sm"
                                                                    data-toggle="modal"
                                                                    data-target="#edit{{ $package->id }}"
                                                                    title="{{ trans('home.edit') }}"><i
                                                                    class="fa fa-edit"></i></button>
                                                            <button type="button" class="btn btn-warning btn-sm"
                                                                    data-toggle="modal"
                                                                    data-target="#show{{ $package->id }}"
                                                                    title="{{ trans('home.edit') }}"><i
                                                                    class="fa fa-eye"></i></button>
                                                        </td>
                                                    </tr>

                                                    <!-- show_modal_Grade -->
                                                    <div class="modal fade" id="show{{ $package->id }}" tabindex="-1"
                                                         role="dialog"
                                                         aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog modal-lg" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 style="font-family: 'Cairo', sans-serif;"
                                                                        class="modal-title"
                                                                        id="exampleModalLabel">
                                                                        {{ trans('home.package_show') }}
                                                                    </h5>
                                                                    <button type="button" class="close"
                                                                            data-dismiss="modal"
                                                                            aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="card card-body">
                                                                        <div class="row">
                                                                            <div class="col-6">
                                                                                <label
                                                                                    for="">{{ trans('home.name') }}</label>
                                                                                <h5>{{ lang() == 'ar' ? $package->name_ar : $package->name_en }}</h5>
                                                                            </div>
                                                                            <div class="col-6">
                                                                                <label
                                                                                    for="">{{ trans('home.type_package') }}</label>
                                                                                <h5>{{ $package->type }}</h5>
                                                                            </div>
                                                                            <div class="col-6">
                                                                                <label
                                                                                    for="">{{ trans('home.start') }}</label>
                                                                                <h5>{{ $package->start->format('Y-m-d') }}</h5>
                                                                            </div>
                                                                            <div class="col-6">
                                                                                <label
                                                                                    for="">{{ trans('home.end') }}</label>
                                                                                <h5>{{ $package->end->format('Y-m-d') }}</h5>
                                                                            </div>
                                                                            <div class="col-6">
                                                                                <label
                                                                                    for="">{{ trans('home.currency') }}</label>
                                                                                <h5>{{ lang() == 'ar' ? $package->currency->name_ar : $package->currency->name_en }}</h5>
                                                                            </div>
                                                                            <div class="col-6">
                                                                                <label
                                                                                    for="">{{ trans('home.price') }}</label>
                                                                                <h5>{{ number_format($package->price,2) }}</h5>
                                                                            </div>
                                                                            <div class="col-6">
                                                                                <label
                                                                                    for="">{{ trans('home.price') }}</label>
                                                                                <h5>{{ number_format($package->price,2) }}</h5>
                                                                            </div>
                                                                            <div class="col-12">
                                                                                <label
                                                                                    for="">{{ trans('home.details') }}</label>
                                                                                <h5>{{ lang() == 'ar' ? $package->details_ar : $package->details_en }}</h5>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <br>
                                                                    @php
                                                                        $mealType_packages = \App\Models\MealTypePackage::where('package_id',$package->id)->get();
                                                                    @endphp
                                                                    <div class="card card-body">
                                                                        <div class="row">
                                                                            <div class="col-12">
                                                                                <label for="">{{ trans('home.meal_type') }}</label>
                                                                                @foreach($mealType_packages as $mealType)
                                                                                <h5></h5>
                                                                                @endforeach
                                                                            </div>
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
                                                    <!-- End Show Modal -->

                                                    <!-- edit_modal -->
                                                    <div class="modal fade" id="edit{{ $package->id }}" tabindex="-1"
                                                         role="dialog"
                                                         aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog modal-lg" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 style="font-family: 'Cairo', sans-serif;"
                                                                        class="modal-title"
                                                                        id="exampleModalLabel">
                                                                        {{ trans('home.package_edit') }}
                                                                    </h5>
                                                                    <button type="button" class="close"
                                                                            data-dismiss="modal"
                                                                            aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <!-- add_form -->
                                                                    <form action="{{ route('packageUpdate') }}"
                                                                          method="post">
                                                                        @csrf
                                                                        <input type="hidden" name="id"
                                                                               value="{{ $package->id }}"/>
                                                                        <div class="row">
                                                                            <div class="col-6">
                                                                                <label for="Name"
                                                                                       class="mr-sm-2">{{ trans('home.name_ar') }}
                                                                                    :</label>
                                                                                <input id="name" type="text"
                                                                                       name="name_ar"
                                                                                       class="form-control"
                                                                                       value="{{ $package->name_ar }}"
                                                                                       required>
                                                                            </div>
                                                                            <div class="col-6">
                                                                                <label for="Name_en"
                                                                                       class="mr-sm-2">{{ trans('home.name_en') }}
                                                                                    :</label>
                                                                                <input type="text" class="form-control"
                                                                                       value="{{ $package->name_ar }}"
                                                                                       name="name_en" required>
                                                                            </div>
                                                                            <div class="col-6">
                                                                                <label for="Description_en"
                                                                                       class="mr-sm-2">{{ trans('home.details_ar') }}
                                                                                    :</label>
                                                                                <input type="text" class="form-control"
                                                                                       value="{{ $package->details_ar }}"
                                                                                       name="details_ar" required>
                                                                            </div>
                                                                            <div class="col-6">
                                                                                <label for="Name_en"
                                                                                       class="mr-sm-2">{{ trans('home.details_en') }}
                                                                                    :</label>
                                                                                <input type="text" class="form-control"
                                                                                       value="{{ $package->details_en }}"
                                                                                       name="details_en" required>
                                                                            </div>
                                                                            <div class="col-6">
                                                                                <label for="End"
                                                                                       class="mr-sm-2">{{ trans('home.start') }}
                                                                                    :</label>
                                                                                <input type="date" class="form-control"
                                                                                       value="{{ $package->start->format('Y-m-d') }}"
                                                                                       name="start" required>
                                                                            </div>
                                                                            <div class="col-6">
                                                                                <label for="End"
                                                                                       class="mr-sm-2">{{ trans('home.end') }}
                                                                                    :</label>
                                                                                <input type="date" class="form-control"
                                                                                       value="{{ $package->end->format('Y-m-d') }}"
                                                                                       name="end" required>
                                                                            </div>
                                                                            <div class="col-6">
                                                                                <label for="currency_ar"
                                                                                       class="mr-sm-2">{{ trans('home.currency') }}
                                                                                    :</label>
                                                                                <select class="form-control"
                                                                                        style="height: 4rem"
                                                                                        name="currency_id" required>
                                                                                    <option value="" disabled
                                                                                            selected>{{ trans('home.currency') }}</option>
                                                                                    @foreach($currencies as $currency)
                                                                                        <option
                                                                                            value="{{ $currency->id  }}" {{ $package->currency_id == $currency->id ? 'selected' : '' }}>
                                                                                            {{ lang() == 'ar' ? $currency->name_ar : $currency->name_en }}
                                                                                        </option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </div>
                                                                            <div class="col-6">
                                                                                <label for="price"
                                                                                       class="mr-sm-2">{{ trans('home.price') }}
                                                                                    :</label>
                                                                                <input type="number"
                                                                                       class="form-control"
                                                                                       value="{{ $package->price }}"
                                                                                       name="start" required>
                                                                            </div>
                                                                            <div class="col-12">
                                                                                <label for="type"
                                                                                       class="mr-sm-2">{{ trans('home.type_package') }}
                                                                                    :</label>
                                                                                <select class="form-control"
                                                                                        style="height: 4rem"
                                                                                        name="type">
                                                                                    <option value=""
                                                                                            disabled
                                                                                            selected>{{ trans('home.package_type') }}</option>
                                                                                    <option
                                                                                        {{ ($package->type == 'basic') ? 'selected' : '' }} value="basic">{{trans('home.package_basic')}}</option>
                                                                                    <option
                                                                                        {{ ($package->type == 'special') ? 'selected' : '' }} value="special">{{trans('home.package_special')}}</option>
                                                                                </select>
                                                                            </div>
                                                                            <div class="col-12">
                                                                                <label for="type_meal"
                                                                                       class="mr-sm-2">{{ trans('home.meal_type') }}
                                                                                    :</label>
                                                                                @php
                                                                                    $mealType_packages = \App\Models\MealTypePackage::where('package_id',$package->id)->get();
                                                                                @endphp
                                                                                <div class="form-check">
                                                                                    <input type="checkbox"
                                                                                           class="form-check-input"
                                                                                           name="meal_type_ids[]"
                                                                                           value="1"
                                                                                           @foreach($mealType_packages as $meal_type)
                                                                                               {{ $meal_type->meal_type_id == 1 ? 'checked' : '' }}
                                                                                           @endforeach
                                                                                           style="scale: 1.2">
                                                                                    <label class="form-check-label">
                                                                                        {{ trans('home.breakfast') }}
                                                                                    </label>
                                                                                </div>
                                                                                <div class="form-check">
                                                                                    <input type="checkbox"
                                                                                           class="form-check-input"
                                                                                           name="meal_type_ids[]"
                                                                                           value="2"
                                                                                           @foreach($mealType_packages as $meal_type)
                                                                                               {{ $meal_type->meal_type_id == 2 ? 'checked' : '' }}
                                                                                           @endforeach
                                                                                           style="scale: 1.2">
                                                                                    <label class="form-check-label">
                                                                                        {{ trans('home.lunch') }}
                                                                                    </label>
                                                                                </div>
                                                                                <div class="form-check">
                                                                                    <input type="checkbox"
                                                                                           class="form-check-input"
                                                                                           name="meal_type_ids[]"
                                                                                           value="3"
                                                                                           @foreach($mealType_packages as $meal_type)
                                                                                               {{ $meal_type->meal_type_id == 3 ? 'checked' : '' }}
                                                                                           @endforeach
                                                                                           style="scale: 1.2">
                                                                                    <label class="form-check-label">
                                                                                        {{ trans('home.dinner') }}
                                                                                    </label>
                                                                                </div>
                                                                                <div class="form-check">
                                                                                    <input type="checkbox"
                                                                                           class="form-check-input"
                                                                                           name="meal_type_ids[]"
                                                                                           value="4"
                                                                                           @foreach($mealType_packages as $meal_type)
                                                                                               {{ $meal_type->meal_type_id == 4 ? 'checked' : '' }}
                                                                                           @endforeach
                                                                                           style="scale: 1.2">
                                                                                    <label class="form-check-label">
                                                                                        {{ trans('home.snacks') }}
                                                                                    </label>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <br><br>

                                                                        <div class="modal-footer">
                                                                            <button type="button"
                                                                                    class="btn btn-secondary"
                                                                                    data-dismiss="modal">{{ trans('home.close') }}</button>
                                                                            <button type="submit"
                                                                                    class="btn btn-success">{{ trans('home.update') }}</button>
                                                                        </div>
                                                                    </form>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- end edit_modal -->

                                                    <!-- delete_modal_Grade -->
                                                    <div class="modal fade" id="delete{{ $package->id }}" tabindex="-1"
                                                         role="dialog"
                                                         aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 style="font-family: 'Cairo', sans-serif;"
                                                                        class="modal-title"
                                                                        id="exampleModalLabel">
                                                                        {{ trans('home.delete_package') }}
                                                                    </h5>
                                                                    <button type="button" class="close"
                                                                            data-dismiss="modal"
                                                                            aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <form action="{{ route('package.delete') }}"
                                                                          method="post">
                                                                        {{--                                                                    {{ method_field('Delete') }}--}}
                                                                        @csrf
                                                                        <h6>{{ trans('home.warning_delete') }}</h6>
                                                                        <input id="id" type="hidden" name="id"
                                                                               class="form-control"
                                                                               value="{{ $package->id }}">
                                                                        <div class="modal-footer">
                                                                            <button type="button"
                                                                                    class="btn btn-secondary"
                                                                                    data-dismiss="modal">{{ trans('home.close') }}</button>
                                                                            <button type="submit"
                                                                                    class="btn btn-danger">{{ trans('home.delete_package') }}</button>
                                                                        </div>
                                                                    </form>
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


                        <!-- add_modal_Grade -->
                        <div class="modal fade" id="addModal" tabindex="-1" role="dialog"
                             aria-labelledby="exampleModalLabel"
                             aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <v class="modal-content">
                                    <div class="modal-header">
                                        <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                            id="exampleModalLabel">
                                            {{ trans('home.add_package') }}
                                        </h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <!-- add_form -->
                                        <form action="{{ route('package.store') }}" method="POST" id="addForm">
                                            @csrf

                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <label for="name"
                                                           class="mr-sm-2">{{ trans('home.package_name_ar') }}
                                                        :</label>
                                                    <input id="name_ar" type="text" name="name_ar" class="form-control"
                                                           required>
                                                    <label for="details_ar"
                                                           class="mr-sm-2">{{ trans('home.details_ar') }}
                                                        :</label>
                                                    <textarea id="details_ar" name="details_ar" class="form-control"
                                                              required></textarea>
                                                    <label for="start"
                                                           class="mr-sm-2">{{ trans('home.start')}}
                                                        :</label>
                                                    <input id="start" type="date" name="start" class="form-control"
                                                           required>
                                                    <label for="currency_ar"
                                                           class="mr-sm-2">{{ trans('home.currency') }}
                                                        :</label>
                                                    <select class="form-control" style="height: 4rem"
                                                            name="currency_id" required>
                                                        <option value="" disabled
                                                                selected>{{ trans('home.currency') }}</option>
                                                        @foreach($currencies as $currency)
                                                            <option value="{{ $currency->id  }}">
                                                                {{ lang() == 'ar' ? $currency->name_ar : $currency->name_en }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    {{--                                                    <label for="status"--}}
                                                    {{--                                                           class="mr-sm-2">{{ trans('home.payment') }}--}}
                                                    {{--                                                        :</label>--}}
                                                    {{--                                                    <select class="form-control" style="height: 4rem" name="payment_method" required>--}}
                                                    {{--                                                        <option value="" disabled--}}
                                                    {{--                                                                selected>{{ trans('home.payment') }}</option>--}}
                                                    {{--                                                        <option value="visa">{{ trans('home.visa') }}</option>--}}
                                                    {{--                                                        <option value="cash">{{ trans('home.cash') }}</option>--}}
                                                    {{--                                                        <option value="wallet">{{ trans('home.wallet') }}</option>--}}
                                                    {{--                                                    </select>--}}
                                                </div>
                                                <div class="col-lg-6">
                                                    <label for="name"
                                                           class="mr-sm-2">{{ trans('home.package_name_en') }}
                                                        :</label>
                                                    <input id="name_en" type="text" name="name_en" class="form-control"
                                                           required>
                                                    <label for="details_en"
                                                           class="mr-sm-2">{{ trans('home.details_en') }}
                                                        :</label>
                                                    <textarea id="details_en" name="details_en" class="form-control"
                                                              required></textarea>
                                                    <label for="end"
                                                           class="mr-sm-2">{{ trans('home.end') }}
                                                        :</label>
                                                    <input id="end" type="date" name="end" class="form-control"
                                                           required>
                                                    <label for="price"
                                                           class="mr-sm-2">{{ trans('home.price') }}
                                                        :</label>
                                                    <input id="price" type="number" name="price" class="form-control"
                                                           required>
                                                </div>
                                                <div class="col-12">
                                                    <label for="type"
                                                           class="mr-sm-2">{{ trans('home.type_package') }}
                                                        :</label>
                                                    <select class="form-control" style="height: 4rem" name="type">
                                                        <option value="" disabled
                                                                selected>{{ trans('home.type_package') }}</option>
                                                        <option
                                                            value="basic">{{ trans('home.normal_package') }}</option>
                                                        <option
                                                            value="special">{{ trans('home.private_package') }}</option>
                                                    </select>
                                                </div>
                                                <div class="col-12">
                                                    <label for="type_meal"
                                                           class="mr-sm-2">{{ trans('home.meal_type') }}
                                                        :</label>

                                                    <div class="form-check">
                                                        <input type="checkbox" class="form-check-input"
                                                               name="meal_type_ids[]" value="1" style="scale: 1.2">
                                                        <label class="form-check-label">
                                                            {{ trans('home.breakfast') }}
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input type="checkbox" class="form-check-input"
                                                               name="meal_type_ids[]" value="2" style="scale: 1.2">
                                                        <label class="form-check-label">
                                                            {{ trans('home.lunch') }}
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input type="checkbox" class="form-check-input"
                                                               name="meal_type_ids[]" value="3" style="scale: 1.2">
                                                        <label class="form-check-label">
                                                            {{ trans('home.dinner') }}
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input type="checkbox" class="form-check-input"
                                                               name="meal_type_ids[]" value="4" style="scale: 1.2">
                                                        <label class="form-check-label">
                                                            {{ trans('home.snacks') }}
                                                        </label>
                                                    </div>

                                                </div>

                                                <br><br>


                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">{{ trans('home.close') }}</button>
                                                    <button type="submit" class="btn btn-success"
                                                            id="addBtn">{{ trans('home.add') }}</button>
                                                </div>
                                        </form>
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
