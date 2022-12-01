@extends('layouts_admin.master')
@section('css')
    @toastr_css
    @section('title')
        @lang('home.meal_type_list')
    @stop
@endsection
@section('page-header')
    <!--breadcrumb -->
    @section('PageTitle')
        @lang('home.meal_type_list')
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
                                    <button type="button" class="button x-small" data-toggle="modal"
                                            data-target="#addModal">
                                        @lang('home.add_meal_type_list')
                                    </button>
                                    <br><br>

                                    <div class="table-responsive">
                                        <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                                               data-page-length="50"
                                               style="text-align: center" >
                                            <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>{{ trans('home.name') }}</th>
                                                <th>{{ trans('home.details') }}</th>
                                                <th>{{ trans('home.package_type') }}</th>
                                                <th>{{ trans('home.actions') }}</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php $i = 0; ?>
                                            @foreach ($meal_type as $type)
                                                <tr>
                                                        <?php $i++; ?>
                                                    <td>{{ $i }}</td>
                                                    <td>{{ (lang() == 'ar') ? $type->name_ar : $type->name_en }}</td>
                                                    <td>{{ (lang() == 'ar') ? $type->details_ar : $type->details_en }}</td>
                                                    <td>{{ (lang() == 'ar') ? $type->package->name_ar : $type->package->name_en }}</td>
                                                    <td>
                                                        <button type="button" class="btn btn-info btn-sm"
                                                                data-toggle="modal"
                                                                data-target="#update{{ $type->id }}"
                                                                title="{{ trans('home.edit') }}"><i
                                                                class="fa fa-edit"></i></button>
                                                        <button type="button" class="btn btn-danger btn-sm"
                                                                data-toggle="modal"
                                                                data-target="#delete{{ $type->id }}"
                                                                title="{{ trans('home.delete') }}"><i
                                                                class="fa fa-trash"></i></button>
                                                        <button type="button" class="btn btn-warning btn-sm"
                                                                data-toggle="modal"
                                                                data-target="#show{{ $type->id }}"
                                                                title="{{ trans('home.update') }}"><i
                                                                class="fa fa-eye"></i>
                                                        </button>
                                                    </td>
                                                </tr>


                                                <!-- update_modal_meal Type -->
                                                <div class="modal fade" id="update{{ $type->id }}" tabindex="-1"
                                                     role="dialog"
                                                     aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-lg" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 style="font-family: 'Cairo', sans-serif;"
                                                                    class="modal-title"
                                                                    id="exampleModalLabel">
                                                                    {{ trans('home.edit_meal_type_list') }}
                                                                </h5>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                        aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <!-- add_form -->
                                                                <form action="{{ route('meal_type.update') }}"
                                                                      method="post">
                                                                    {{--                                                                    {{ method_field('patch') }}--}}
                                                                    @csrf
                                                                    <input type="text" hidden name="role_id" value="1">
                                                                    <div class="row">
                                                                        <div class="col-6">
                                                                            <label for="Name"
                                                                                   class="mr-sm-2">{{ trans('home.name_ar') }}
                                                                                :</label>
                                                                            <input id="name" type="text" name="name_ar"
                                                                                   class="form-control"
                                                                                   value="{{ $type->name_ar }}"
                                                                                   required>
                                                                            <input id="id" type="hidden" name="id"
                                                                                   class="form-control"
                                                                                   value="{{ $type->id }}">
                                                                        </div>
                                                                        <div class="col-6">
                                                                            <label for="Name_en"
                                                                                   class="mr-sm-2">{{ trans('home.name_en') }}
                                                                                :</label>
                                                                            <input type="text" class="form-control"
                                                                                   value="{{ $type->name_en }}"
                                                                                   name="name_en" required>
                                                                        </div>
                                                                        <div class="col-12">
                                                                            <label for="Name_en"
                                                                                   class="mr-sm-2">{{ trans('home.details_ar') }}
                                                                                :</label>
                                                                            <input type="text" class="form-control"
                                                                                   value="{{ $type->details_ar }}"
                                                                                   name="details_ar">
                                                                        </div>
                                                                        <div class="col-12">
                                                                            <label for="Name_en"
                                                                                   class="mr-sm-2">{{ trans('home.details_en') }}
                                                                                :</label>
                                                                            <input type="text" class="form-control"
                                                                                   value="{{ $type->details_en }}"
                                                                                   name="details_en">
                                                                        </div>
                                                                        <div class="col-12">
                                                                            <label for="Name_en"
                                                                                   class="mr-sm-2">{{ trans('home.package_type') }}
                                                                                :</label>
                                                                            <select class="form-control"
                                                                                    name="package_id"
                                                                                    style="height: calc(4.1rem + 2px);">
                                                                                <option value="" disabled
                                                                                        selected>@lang('home.package_type')</option>
                                                                                @foreach($packages as $package)
                                                                                    <option
                                                                                        value="{{ $package->id }}" {{ ($package->id == $type->package->id) ? 'selected' : '' }} >
                                                                                        {{ (lang() == 'ar') ? $package->name_ar : $package->name_en }}
                                                                                    </option>
                                                                                @endforeach
                                                                            </select>
                                                                        </div>
                                                                    </div>

                                                                    <br><br>

                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary"
                                                                                data-dismiss="modal">{{ trans('home.close') }}</button>
                                                                        <button type="submit"
                                                                                class="btn btn-success">{{ trans('home.update') }}</button>
                                                                    </div>
                                                                </form>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- show_modal_meal type -->
                                                <div class="modal fade" id="show{{ $type->id }}" tabindex="-1"
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
                                                                <!-- add_form -->
                                                                {{--                                                                <form action="{{ route('admin.update') }}"--}}
                                                                {{--                                                                      method="post">--}}
                                                                {{--                                                                    {{ method_field('patch') }}--}}
                                                                @csrf
                                                                <div class="row">
                                                                    <div class="col-6">
                                                                        <label for="Name"
                                                                               class="mr-sm-2">{{ trans('home.name') }}
                                                                            :</label>
                                                                        <input id="name" type="text" name="name"
                                                                               class="form-control"
                                                                               value="{{ (lang() == 'ar') ? $type->name_ar : $type->name_en }}"
                                                                               disabled>
                                                                    </div>
                                                                    <div class="col-6">
                                                                        <label for="email"
                                                                               class="mr-sm-2">{{ trans('home.package_type') }}
                                                                            :</label>
                                                                        <input id="name" type="text" name="name"
                                                                               class="form-control"
                                                                               value="{{ (lang() == 'ar') ? $type->package->name_en : $type->package->name_en }}"
                                                                               disabled>
                                                                    </div>

                                                                    <div class="col-12">
                                                                        <label for="email"
                                                                               class="mr-sm-2">{{ trans('home.details') }}
                                                                            :</label>
                                                                        <textarea id="details" type="text" name="details"
                                                                                  rows="4"
                                                                                  class="form-control"
                                                                                  disabled>
                                                                            {{ (lang() == 'ar') ? $type->details_ar : $type->details_en }}
                                                                        </textarea>
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
                                                </div>

                                                <!-- delete_modal_Grade -->
                                                <div class="modal fade" id="delete{{ $type->id }}" tabindex="-1"
                                                     role="dialog"
                                                     aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 style="font-family: 'Cairo', sans-serif;"
                                                                    class="modal-title"
                                                                    id="exampleModalLabel">
                                                                    {{ trans('home.delete_meal_type_list') }}
                                                                </h5>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                        aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form action="{{ route('meal_type.delete') }}"
                                                                      method="POST">
                                                                    {{--                                                                    {{ method_field('POST') }}--}}
                                                                    @csrf
                                                                    <h6>{{ trans('home.warning_delete') }}</h6>
                                                                    <input id="id" type="hidden" name="id"
                                                                           class="form-control"
                                                                           value="{{ $type->id }}">
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary"
                                                                                data-dismiss="modal">{{ trans('home.close') }}</button>
                                                                        <button type="submit"
                                                                                class="btn btn-danger">{{ trans('home.delete_meal_type_list') }}</button>
                                                                    </div>
                                                                </form>
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


                        <!-- add_modal_Meal Type -->
                        <div class="modal fade" id="addModal" tabindex="-1" role="dialog"
                             aria-labelledby="exampleModalLabel"
                             aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content ">
                                    <div class="modal-header">
                                        <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                            id="exampleModalLabel">
                                            {{ trans('home.add_meal_type_list') }}
                                        </h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <!-- add_form -->
                                        <form action="{{ route('meal_type.store') }}"
                                              method="post">
                                            {{--                                                                    {{ method_field('patch') }}--}}
                                            @csrf
                                            <div class="row">
                                                <div class="col-6">
                                                    <label for="Name"
                                                           class="mr-sm-2">{{ trans('home.name_ar') }}
                                                        :</label>
                                                    <input id="name" type="text" name="name_ar"
                                                           class="form-control"
                                                           required>
                                                </div>
                                                <div class="col-6">
                                                    <label for="Name_en"
                                                           class="mr-sm-2">{{ trans('home.name_en') }}
                                                        :</label>
                                                    <input type="text" class="form-control"
                                                           name="name_en" required>
                                                </div>
                                                <div class="col-12">
                                                    <label for="Name_en"
                                                           class="mr-sm-2">{{ trans('home.details_ar') }}
                                                        :</label>
                                                    <input type="text" class="form-control"
                                                           name="details_ar" required>
                                                </div>
                                                <div class="col-12">
                                                    <label for="Name_en"
                                                           class="mr-sm-2">{{ trans('home.details_en') }}
                                                        :</label>
                                                    <input type="text" class="form-control"
                                                           name="details_en" required>
                                                </div>
                                                <div class="col-12">
                                                    <label for="Name_en"
                                                           class="mr-sm-2">{{ trans('home.package_type') }}
                                                        :</label>
                                                    <select class="form-control" name="package_id"
                                                            style="height: calc(4.1rem + 2px);">
                                                        <option value="" disabled
                                                                selected>@lang('home.package_type')</option>
                                                        @foreach($packages as $package)
                                                            <option value="{{ $package->id }}">
                                                                {{ (lang() == 'ar') ? $package->name_ar : $package->name_en }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            <br><br>

                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">{{ trans('home.close') }}</button>
                                                <button type="submit"
                                                        class="btn btn-success">{{ trans('home.add') }} </button>
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
