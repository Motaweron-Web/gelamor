@extends('layouts_admin.master')
@section('css')
    @toastr_css
    @section('title')
        @lang('home.notification')
    @stop
@endsection
@section('page-header')
    <!--breadcrumb -->
    @section('PageTitle')
        @lang('home.notification')
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
                                                <th>{{ trans('home.subject') }}</th>
                                                <th>{{ trans('home.message') }}</th>
                                                <th>{{ trans('home.actions') }}</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                           <?php $i = 0; ?>
                                            @foreach ($notifications as $notification)
                                                <tr>
                                                        <?php $i++; ?>
                                                    <td>{{ $i }}</td>
                                                    <td>{{ $notification->title }}</td>
                                                    <td>{{ $notification->message }}</td>
                                                    <td>
                                                        <button type="button" class="btn btn-danger btn-sm"
                                                        data-toggle="modal"
                                                        data-target="#delete{{ $notification->id }}"
                                                        title="{{ trans('home.delete') }}"><i
                                                        class="fa fa-trash"></i></button>
                                                    </td>
                                                </tr>


                                                <!-- show_modal_contact-us -->
                                                <div class="modal fade" id="show{{ $notification->id }}" tabindex="-1"
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
                                                                <input type="text" hidden name="role_id" value="1">
                                                                <div class="row">
                                                                    <div class="col-6">
                                                                        <label for="Name"
                                                                               class="mr-sm-2">{{ trans('home.name') }}
                                                                            :</label>
                                                                        <input id="name" type="text" name="name"
                                                                               class="form-control"
                                                                               value="{{ $notification->title  }}"
                                                                               disabled>
                                                                    </div>
                                                                    <div class="col-6">
                                                                        <label for="email"
                                                                               class="mr-sm-2">{{ trans('home.email') }}
                                                                            :</label>
                                                                        <input id="name" type="text" name="name"
                                                                               class="form-control"
                                                                               value="{{ $notification->message }}"
                                                                               disabled>
                                                                    </div>
                                                                    <div class="col-6">
                                                                        <label for="subject"
                                                                               class="mr-sm-2">{{ trans('home.subject') }}
                                                                            :</label>
                                                                        <input id="subject" type="text" name="subject"
                                                                               class="form-control"
                                                                               value="{{ $notification->title }}"
                                                                               disabled>
                                                                    </div>
                                                                    <div class="col-6">
                                                                        <label for="created_at"
                                                                               class="mr-sm-2">{{ trans('home.created_at') }}
                                                                            :</label>
                                                                        <input id="created_at" type="text" name="created_at"
                                                                               class="form-control"
                                                                               value="{{ $notification->created_at->diffForHumans() }}"
                                                                               disabled>
                                                                    </div>
                                                                    <div class="col-12">
                                                                        <label for="message"
                                                                               class="mr-sm-2">{{ trans('home.message') }}
                                                                            :</label>
                                                                        <textarea class="form-control" id="message" name="message" rows="10" disabled>{{ $notification->message }}</textarea>
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
                                                <div class="modal fade" id="delete{{ $notification->id }}" tabindex="-1"
                                                     role="dialog"
                                                     aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 style="font-family: 'Cairo', sans-serif;"
                                                                    class="modal-title"
                                                                    id="exampleModalLabel">
                                                                    {{ trans('home.delete_notification') }}
                                                                </h5>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                        aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form action="{{ route('notification.delete') }}"
                                                                      method="POST">
                                                                    {{--                                                                    {{ method_field('POST') }}--}}
                                                                    @csrf
                                                                    <h6>{{ trans('home.warning_delete') }}</h6>
                                                                    <input id="id" type="hidden" name="id"
                                                                           class="form-control"
                                                                           value="{{ $notification->id }}">
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary"
                                                                                data-dismiss="modal">{{ trans('home.close') }}</button>
                                                                        <button type="submit"
                                                                                class="btn btn-danger">{{ trans('home.delete_notification') }}</button>
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
