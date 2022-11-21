@extends('layouts_admin.master')
@section('css')
    @toastr_css
    @section('title')
        @lang('home.complaints_and_reports')
    @stop
@endsection
@section('page-header')
    <!--breadcrumb -->
    @section('PageTitle')
        @lang('home.complaints_and_reports')
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
{{--                                        @lang('home.add_chef')--}}
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
                                                <th>{{ trans('home.subject') }}</th>
                                                <th>{{ trans('home.created_at') }}</th>
                                                <th>{{ trans('home.actions') }}</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                           <?php $i = 0; ?>
                                            @foreach ($contact_us as $contact)
                                                <tr>
                                                        <?php $i++; ?>
                                                    <td>{{ $i }}</td>
                                                    <td>{{ $contact->name }}</td>
                                                    <td>{{ $contact->email }}</td>
                                                    <td>{{ $contact->subject }}</td>
                                                    <td>{{ $contact->created_at->diffForHumans() }}</td>
                                                    <td>
                                                        <button type="button" class="btn btn-info btn-sm"
                                                                data-toggle="modal"
                                                                data-target="#show{{ $contact->id }}"
                                                                title="{{ trans('home.show') }}"><i
                                                                class="fa fa-eye"></i></button>
                                                        <button type="button" class="btn btn-danger btn-sm"
                                                                data-toggle="modal"
                                                                data-target="#delete{{ $contact->id }}"
                                                                title="{{ trans('home.delete') }}"><i
                                                                class="fa fa-trash"></i></button>
{{--                                                        <button type="button" class="btn btn-warning btn-sm"--}}
{{--                                                                data-toggle="modal"--}}
{{--                                                                data-target="#show{{ $contact->id }}"--}}
{{--                                                                title="{{ trans('home.update') }}"><i class="fa fa-eye"></i>--}}
{{--                                                        </button>--}}
                                                    </td>
                                                </tr>


                                                <!-- update_modal_Grade -->
{{--                                                <div class="modal fade" id="update{{ $contact->id }}" tabindex="-1"--}}
{{--                                                     role="dialog"--}}
{{--                                                     aria-labelledby="exampleModalLabel" aria-hidden="true">--}}
{{--                                                    <div class="modal-dialog modal-lg" role="document">--}}
{{--                                                        <div class="modal-content">--}}
{{--                                                            <div class="modal-header">--}}
{{--                                                                <h5 style="font-family: 'Cairo', sans-serif;"--}}
{{--                                                                    class="modal-title"--}}
{{--                                                                    id="exampleModalLabel">--}}
{{--                                                                    {{ trans('home.edit_chef') }}--}}
{{--                                                                </h5>--}}
{{--                                                                <button type="button" class="close" data-dismiss="modal"--}}
{{--                                                                        aria-label="Close">--}}
{{--                                                                    <span aria-hidden="true">&times;</span>--}}
{{--                                                                </button>--}}
{{--                                                            </div>--}}
{{--                                                            <div class="modal-body">--}}
{{--                                                                <!-- add_form -->--}}
{{--                                                                <form action="{{ route('chef.update') }}"--}}
{{--                                                                      method="post">--}}
{{--                                                                    --}}{{--                                                                    {{ method_field('patch') }}--}}
{{--                                                                    @csrf--}}
{{--                                                                    <input type="text" hidden name="role_id" value="1">--}}
{{--                                                                    <div class="row">--}}
{{--                                                                        <div class="col-6">--}}
{{--                                                                            <label for="Name"--}}
{{--                                                                                   class="mr-sm-2">{{ trans('home.name') }}--}}
{{--                                                                                :</label>--}}
{{--                                                                            <input id="name" type="text" name="name"--}}
{{--                                                                                   class="form-control"--}}
{{--                                                                                   value="{{ $contact->name }}"--}}
{{--                                                                                   required>--}}
{{--                                                                            <input id="id" type="hidden" name="id"--}}
{{--                                                                                   class="form-control"--}}
{{--                                                                                   value="{{ $contact->id }}">--}}
{{--                                                                        </div>--}}
{{--                                                                        <div class="col-6">--}}
{{--                                                                            <label for="Name_en"--}}
{{--                                                                                   class="mr-sm-2">{{ trans('home.email') }}--}}
{{--                                                                                :</label>--}}
{{--                                                                            <input type="email" class="form-control"--}}
{{--                                                                                   value="{{ $contact->email }}"--}}
{{--                                                                                   name="email" required>--}}
{{--                                                                        </div>--}}
{{--                                                                        <div class="col-12">--}}
{{--                                                                            <label for="Name_en"--}}
{{--                                                                                   class="mr-sm-2">{{ trans('home.password') }}--}}
{{--                                                                                :</label>--}}
{{--                                                                            <input type="password" class="form-control"--}}
{{--                                                                                   placeholder="(optional)"--}}
{{--                                                                                   name="password">--}}
{{--                                                                        </div>--}}
{{--                                                                    </div>--}}

{{--                                                                    <br><br>--}}

{{--                                                                    <div class="modal-footer">--}}
{{--                                                                        <button type="button" class="btn btn-secondary"--}}
{{--                                                                                data-dismiss="modal">{{ trans('home.close') }}</button>--}}
{{--                                                                        <button type="submit"--}}
{{--                                                                                class="btn btn-success">{{ trans('home.update') }}</button>--}}
{{--                                                                    </div>--}}
{{--                                                                </form>--}}

{{--                                                            </div>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}

                                                <!-- show_modal_chefs -->
                                                <div class="modal fade" id="show{{ $contact->id }}" tabindex="-1"
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
                                                                <input type="text" hidden name="role_id" value="1">
                                                                <div class="row">
                                                                    <div class="col-6">
                                                                        <label for="Name"
                                                                               class="mr-sm-2">{{ trans('home.name') }}
                                                                            :</label>
                                                                        <input id="name" type="text" name="name"
                                                                               class="form-control"
                                                                               value="{{ $contact->name }}"
                                                                               disabled>
                                                                    </div>
                                                                    <div class="col-6">
                                                                        <label for="email"
                                                                               class="mr-sm-2">{{ trans('home.email') }}
                                                                            :</label>
                                                                        <input id="name" type="text" name="name"
                                                                               class="form-control"
                                                                               value="{{ $contact->email }}"
                                                                               disabled>
                                                                    </div>
                                                                    <div class="col-6">
                                                                        <label for="subject"
                                                                               class="mr-sm-2">{{ trans('home.subject') }}
                                                                            :</label>
                                                                        <input id="subject" type="text" name="subject"
                                                                               class="form-control"
                                                                               value="{{ $contact->subject }}"
                                                                               disabled>
                                                                    </div>
                                                                    <div class="col-6">
                                                                        <label for="created_at"
                                                                               class="mr-sm-2">{{ trans('home.created_at') }}
                                                                            :</label>
                                                                        <input id="created_at" type="text" name="created_at"
                                                                               class="form-control"
                                                                               value="{{ $contact->created_at }}"
                                                                               disabled>
                                                                    </div>
                                                                    <div class="col-12">
                                                                        <label for="message"
                                                                               class="mr-sm-2">{{ trans('home.message') }}
                                                                            :</label>
                                                                        <textarea class="form-control" id="message" name="message" rows="10"></textarea>
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
                                                <div class="modal fade" id="delete{{ $contact->id }}" tabindex="-1"
                                                     role="dialog"
                                                     aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 style="font-family: 'Cairo', sans-serif;"
                                                                    class="modal-title"
                                                                    id="exampleModalLabel">
                                                                    {{ trans('home.delete_report') }}
                                                                </h5>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                        aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form action="{{ route('contact_us.delete') }}"
                                                                      method="POST">
                                                                    {{--                                                                    {{ method_field('POST') }}--}}
                                                                    @csrf
                                                                    <h6>{{ trans('home.warning_delete') }}</h6>
                                                                    <input id="id" type="hidden" name="id"
                                                                           class="form-control"
                                                                           value="{{ $contact->id }}">
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary"
                                                                                data-dismiss="modal">{{ trans('home.close') }}</button>
                                                                        <button type="submit"
                                                                                class="btn btn-danger">{{ trans('home.delete_report') }}</button>
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
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content ">
                                    <div class="modal-header">
                                        <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                            id="exampleModalLabel">
                                            {{ trans('home.add_chef') }}
                                        </h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <!-- add_form -->
                                        <form action="{{route('chef.store')}}" method="POST" id="addForm">
                                            @csrf
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
