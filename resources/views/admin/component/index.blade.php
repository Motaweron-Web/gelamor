@extends('layouts_admin.master')
@section('css')
    @toastr_css
    @section('title')
        @lang('home.type')
    @stop
@endsection
@section('page-header')
    <!--breadcrumb -->
    @section('PageTitle')
        @lang('home.type')
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
                                        @lang('home.add') @lang('home.type')
                                    </button>
                                    <br><br>

                                    <div class="table-responsive">
                                        <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                                               data-page-length="50"
                                               style="text-align: center">
                                            <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>{{ trans('home.type') }}</th>
                                                <th>{{ trans('home.components_list') }}</th>
                                                <th>{{ trans('home.actions') }}</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php $i = 0; ?>
                                            @foreach ($component_categories as $component)
                                                <tr>
                                                        <?php $i++; ?>
                                                    <td>{{ $i }}</td>
                                                    <td>{{ (lang() == 'ar') ? $component->name_ar : $component->name_en }}</td>
                                                    <td>
                                                        <form action="{{ route('components.details') }}" method="get">
                                                            @csrf
                                                            <input hidden type="text" name="id"
                                                                   value="{{ $component->id }}">
                                                            <button type="submit" class="btn btn-warning btn-sm"
                                                                    title="{{ trans('home.components_list') }}"><i
                                                                    class="fa fa-eye"> {{ trans('home.components_list') }}</i>
                                                            </button>
                                                        </form>
                                                    </td>
                                                    <td>
                                                        <button type="button" class="btn btn-danger btn-sm"
                                                                data-toggle="modal"
                                                                data-target="#delete{{ $component->id }}"
                                                                title="{{ trans('home.delete') }}"><i
                                                                class="fa fa-trash"></i></button>
                                                        <button type="button" class="btn btn-info btn-sm"
                                                                data-toggle="modal"
                                                                data-target="#update{{ $component->id }}"
                                                                title="{{ trans('home.edit') }}"><i
                                                                class="fa fa-edit"></i></button>
                                                    </td>
                                                </tr>


                                                <!-- update_modal_meal Type -->
                                                <div class="modal fade" id="update{{ $component->id }}" tabindex="-1"
                                                     role="dialog"
                                                     aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-lg" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 style="font-family: 'Cairo', sans-serif;"
                                                                    class="modal-title"
                                                                    id="exampleModalLabel">
                                                                    {{ trans('home.edit_component') }}
                                                                </h5>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                        aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <!-- add_form -->
                                                                <form action="{{ route('updateCategory') }}"
                                                                      method="post" enctype="multipart/form-data">
                                                                    {{--                                                                    {{ method_field('patch') }}--}}
                                                                    @csrf
                                                                    <div class="row">
                                                                        <div class="col-6">
                                                                            <label for="Name"
                                                                                   class="mr-sm-2">{{ trans('home.name_ar') }}
                                                                                :</label>
                                                                            <input id="name" type="text" name="name_ar"
                                                                                   class="form-control"
                                                                                   value="{{ $component->name_ar }}"
                                                                                   required>
                                                                            <input id="id" type="hidden" name="id"
                                                                                   class="form-control"
                                                                                   value="{{ $component->id }}">
                                                                        </div>
                                                                        <div class="col-6">
                                                                            <label for="Name_en"
                                                                                   class="mr-sm-2">{{ trans('home.name_en') }}
                                                                                :</label>
                                                                            <input type="text" class="form-control"
                                                                                   value="{{ $component->name_en }}"
                                                                                   name="name_en" required>
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
                                                <!-- delete_modal_Grade -->
                                                <div class="modal fade" id="delete{{ $component->id }}" tabindex="-1"
                                                     role="dialog"
                                                     aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 style="font-family: 'Cairo', sans-serif;"
                                                                    class="modal-title"
                                                                    id="exampleModalLabel">
                                                                    {{ trans('home.type') }}
                                                                </h5>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                        aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form action="{{ route('deleteCategory') }}"
                                                                      method="POST">
                                                                    {{--                                                                    {{ method_field('POST') }}--}}
                                                                    @csrf
                                                                    <h6>{{ trans('home.warning_delete') }}</h6>
                                                                    <input id="id" type="hidden" name="id"
                                                                           class="form-control"
                                                                           value="{{ $component->id }}">
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary"
                                                                                data-dismiss="modal">{{ trans('home.close') }}</button>
                                                                        <button type="submit"
                                                                                class="btn btn-danger">{{ trans('home.delete') . ' ' .trans('home.type') }}</button>
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
                                            {{ trans('home.add') . ' ' . trans('home.type') }}
                                        </h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <!-- add_form -->
                                        <form action="{{ route('storeCategory') }}"
                                              method="post" enctype="multipart/form-data">
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
                                            </div>

                                            <br><br>

                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">{{ trans('home.close') }}</button>
                                                <button type="submit"
                                                        class="btn btn-success">{{ trans('home.add') }}</button>
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

    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    <script language="javascript" type="text/javascript">
        $(function () {
            $("#fileupload").change(function () {
                $("#dvPreview").html("");
                var regex = /^([a-zA-Z0-9\s_\\.\-:])+(.jpg|.jpeg|.gif|.png|.bmp)$/;
                if (regex.test($(this).val().toLowerCase())) {
                    if ($.browser.msie && parseFloat(jQuery.browser.version) <= 9.0) {
                        $("#dvPreview").show();
                        $("#dvPreview")[0].filters.item("DXImageTransform.Microsoft.AlphaImageLoader").src = $(this).val();
                    } else {
                        if (typeof (FileReader) != "undefined") {
                            $("#dvPreview").show();
                            $("#dvPreview").append("<img />");
                            var reader = new FileReader();
                            reader.onload = function (e) {
                                $("#dvPreview img").attr("src", e.target.result);
                            }
                            reader.readAsDataURL($(this)[0].files[0]);
                        } else {
                            alert("This browser does not support FileReader.");
                        }
                    }
                } else {
                    alert("Please upload a valid image file.");
                }
            });
        });
    </script>
    <!-- row closed -->
@endsection
@section('js')
    @toastr_js
    @toastr_render

@endsection
