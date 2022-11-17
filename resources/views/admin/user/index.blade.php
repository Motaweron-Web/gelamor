@extends('layouts_admin.master')
@section('css')
    @toastr_css
    @section('title')
        @lang('home.users')
    @stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
    @section('PageTitle')
        @lang('home.users')
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

{{--                                    <button type="button" class="button x-small" data-toggle="modal"--}}
{{--                                            data-target="#addModal">--}}
{{--                                        @lang('home.add_admin')--}}
{{--                                    </button>--}}
                                    <br><br>

                                    <div class="table-responsive">
                                        <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                                               data-page-length="50"
                                               style="text-align: center">
                                            <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>{{ trans('home.name') }}</th>
                                                <th>{{ trans('home.email') }}</th>
                                                <th>{{ trans('home.image') }}</th>
                                                <th>{{ trans('home.actions') }}</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php $i = 0; ?>
                                            @foreach ($users as $user)
                                                <tr>
                                                        <?php $i++; ?>
                                                    <td>{{ $i }}</td>

                                                    <td>{{ lang() == 'ar' ? $user->name_ar : $user->name_en }}</td>
                                                    <td>{{ $user->email }}</td>
                                                    <td>
                                                        <img src="{{ getFile($user->img) }}" width="10%" height="10%">
                                                    </td>
                                                    <td>
                                                        <button type="button" class="btn btn-info btn-sm"
                                                                data-toggle="modal"
                                                                data-target="#show{{ $user->id }}"
                                                                title="{{ trans('home.edit') }}"><i
                                                                class="fa fa-edit">{{ trans('home.show') }}</i></button>
                                                        <button type="button" class="btn btn-danger btn-sm"
                                                                data-toggle="modal"
                                                                data-target="#delete{{ $user->id }}"
                                                                title="{{ trans('home.delete') }}"><i
                                                                class="fa fa-trash"></i></button>
                                                    </td>
                                                </tr>

                                                <!-- show_modal_users -->
                                                <div class="modal fade" id="show{{ $user->id }}" tabindex="-1"
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
{{--                                                                    @csrf--}}
                                                                    <input type="text" hidden name="role_id" value="1">
                                                                    <div class="row">
                                                                        <div class="col-12">
                                                                            <img src="{{ asset('assets/images/user1.jpg') }}" class="form-control" style="border-radius: 150px;   display: block;
  margin-left: auto;
  margin-right: auto;
  width: 50%;">
                                                                        </div>
                                                                    </div>
                                                                        <div class="row">
                                                                        <div class="col-12">
                                                                            <label for="Name"
                                                                                   class="mr-sm-2">{{ trans('home.name') }}
                                                                                :</label>
                                                                            <input id="name" type="text" name="name"
                                                                                   class="form-control"
                                                                                   value="{{ $user->name_ar}}"
                                                                                   value="{{ lang() == 'ar' ? $user->name_ar : $user->name_en }}"
                                                                                   disabled>
                                                                        </div>
                                                                        <div class="col-12">
                                                                            <label for="email"
                                                                                   class="mr-sm-2">{{ trans('home.email') }}
                                                                                :</label>
                                                                            <input id="name" type="text" name="name"
                                                                                   class="form-control"
                                                                                   value="{{ $user->email }}"
                                                                                   disabled>
                                                                        </div>
                                                                            <div class="col-12">
                                                                                <label for="phone"
                                                                                       class="mr-sm-2">{{ trans('home.phone') }}
                                                                                    :</label>
                                                                                <input id="phone" type="text" name="phone"
                                                                                       class="form-control"
                                                                                       value="{{ $user->phone }}"
                                                                                       disabled>
                                                                            </div>
                                                                        <div class="col-12">
                                                                            <label for="location"
                                                                                   class="mr-sm-2">{{ trans('home.location') }}
                                                                                :</label>
                                                                            <input id="location" type="text" name="location"
                                                                                   class="form-control"

                                                                                   value="{{ $user->location_ar. LaravelLocalization::getCurrentLocale() }}"
                                                                                   value="{{ lang() == 'ar' ? $user->location_ar : $user->location_en }}"
                                                                                   disabled>
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
                                                </div>


                                                <!-- delete_modal_Grade -->
                                                <div class="modal fade" id="delete{{ $user->id }}" tabindex="-1"
                                                     role="dialog"
                                                     aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 style="font-family: 'Cairo', sans-serif;"
                                                                    class="modal-title"
                                                                    id="exampleModalLabel">
                                                                    {{ trans('home.delete_admin') }}
                                                                </h5>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                        aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form action="{{ route('user.delete') }}"
                                                                      method="post">
{{--                                                                    {{ method_field('Delete') }}--}}
                                                                    @csrf
                                                                    <h6>{{ trans('home.warning_delete') }}</h6>
                                                                    <input id="id" type="hidden" name="id"
                                                                           class="form-control"
                                                                           value="{{ $user->id }}">
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary"
                                                                                data-dismiss="modal">{{ trans('home.close') }}</button>
                                                                        <button type="submit"
                                                                                class="btn btn-danger">{{ trans('home.delete_admin') }}</button>
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


                        <!-- add_modal_Grade -->
                        <div class="modal fade" id="addModal" tabindex="-1" role="dialog"
                             aria-labelledby="exampleModalLabel"
                             aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                            id="exampleModalLabel">
                                            {{ trans('home.add_admin') }}
                                        </h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <!-- add_form -->
                                        <form action="{{ route('admin.store') }}" method="POST" id="addForm">
                                            @csrf
                                            <input type="text" hidden name="role_id" value="1">
                                            <div class="row">
                                                <div class="col-6">
                                                    <label for="name"
                                                           class="mr-sm-2">{{ trans('home.name') }}
                                                        :</label>
                                                    <input id="name" type="text" name="name" class="form-control"
                                                           required maxlength="120">
                                                </div>
                                                <div class="col-6">
                                                    <label for="Name_en"
                                                           class="mr-sm-2">{{ trans('home.email') }}
                                                        :</label>
                                                    <input type="email" class="form-control" name="email" required>
                                                </div>
                                                <div class="col-12">
                                                    <label for="Name_en"
                                                           class="mr-sm-2">{{ trans('home.password') }}
                                                        :</label>
                                                    <input type="password" class="form-control"
                                                           name="password" required maxlength="60">
                                                </div>
                                            </div>
                                            <br><br>
                                    </div>
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
    <!-- row closed -->
@endsection
@section('js')
    @toastr_js
    @toastr_render

@endsection
