@extends('layouts_admin.master')
@section('css')
    @toastr_css
    @section('title')
        @lang('home.components_list')
    @stop
@endsection
@section('page-header')
    <!--breadcrumb -->
    @section('PageTitle')
        @lang('home.components_list')
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
                                        @lang('home.add_component')
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
                                                <th>{{ trans('home.image') }}</th>
                                                <th>{{ trans('home.actions') }}</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php $i = 0; ?>
                                            @foreach ($component as $type)
                                                <tr>
                                                        <?php $i++; ?>
                                                    <td>{{ $i }}</td>
                                                    <td>{{ (lang() == 'ar') ? $type->name_ar : $type->name_en }}</td>
                                                    <td>
                                                        <img src="{{ getFile($type->img) }}"
                                                             onclick="window.open(this.src)" href="javascript:void(0);"
                                                             width="80px" height="80px" style="border-radius: 40%;">
                                                    </td>
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
                                                                    {{ trans('home.edit_component') }}
                                                                </h5>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                        aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <!-- add_form -->
                                                                <form action="{{ route('components.update') }}"
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
                                                                                   class="mr-sm-2">{{ trans('home.image') }}
                                                                                :</label>
                                                                            <input class="form-control" id="fileupload" type="file" name="img">
                                                                        </div>

                                                                        <div class="col-12" id="dvPreview">
                                                                        </div>

                                                                        <div class="col-6">
                                                                            <label for="Name_en"
                                                                                   class="mr-sm-2">{{ trans('home.protein') }}
                                                                                :</label>
                                                                            <input type="number" class="form-control"
                                                                                   value="{{ $type->protein }}"
                                                                                   name="protein" required>
                                                                        </div>
                                                                        <div class="col-6">
                                                                            <label for="Name_en"
                                                                                   class="mr-sm-2">{{ trans('home.calories') }}
                                                                                :</label>
                                                                            <input type="number" class="form-control"
                                                                                   value="{{ $type->calories }}"
                                                                                   name="calories" required>
                                                                        </div>
                                                                        <div class="col-6">
                                                                            <label for="Name_en"
                                                                                   class="mr-sm-2">{{ trans('home.Fats') }}
                                                                                :</label>
                                                                            <input type="number" class="form-control"
                                                                                   value="{{ $type->fats }}"
                                                                                   name="fats" required>
                                                                        </div>
                                                                        <div class="col-6">
                                                                            <label for="Name_en"
                                                                                   class="mr-sm-2">{{ trans('home.carbohydrates') }}
                                                                                :</label>
                                                                            <input type="number" class="form-control"
                                                                                   value="{{ $type->carbohydrates }}"
                                                                                   name="carbohydrates" required>
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
                                                                               class="mr-sm-2">{{ trans('home.name_ar') }}
                                                                            :</label>
                                                                        <input id="name" type="text" name="name_ar"
                                                                               class="form-control"
                                                                               value="{{ $type->name_ar }}"
                                                                               required disabled>
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
                                                                               name="name_en" required disabled>
                                                                    </div>

                                                                    <div class="col-12">
                                                                        <label for="Name_en"
                                                                               class="mr-sm-2">{{ trans('home.image') }}
                                                                            :</label>
                                                                        <img src="{{ getFile($type->img) }}"
                                                                             onclick="window.open(this.src)" href="javascript:void(0);"
                                                                             width="80px" height="80px" style="border-radius: 40%; margin: 10px">
                                                                    </div>

                                                                    <div class="col-6">
                                                                        <label for="Name_en"
                                                                               class="mr-sm-2">{{ trans('home.protein') }}
                                                                            :</label>
                                                                        <input type="number" class="form-control"
                                                                               value="{{ $type->protein }}"
                                                                               name="protein" required disabled>
                                                                    </div>
                                                                    <div class="col-6">
                                                                        <label for="Name_en"
                                                                               class="mr-sm-2">{{ trans('home.calories') }}
                                                                            :</label>
                                                                        <input type="number" class="form-control"
                                                                               value="{{ $type->calories }}"
                                                                               name="calories" required disabled>
                                                                    </div>
                                                                    <div class="col-6">
                                                                        <label for="Name_en"
                                                                               class="mr-sm-2">{{ trans('home.Fats') }}
                                                                            :</label>
                                                                        <input type="number" class="form-control"
                                                                               value="{{ $type->fats }}"
                                                                               name="Fats" required disabled>
                                                                    </div>
                                                                    <div class="col-6">
                                                                        <label for="Name_en"
                                                                               class="mr-sm-2">{{ trans('home.carbohydrates') }}
                                                                            :</label>
                                                                        <input type="number" class="form-control"
                                                                               value="{{ $type->carbohydrates }}"
                                                                               name="carbohydrates" required disabled>
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
                                                                    {{ trans('home.delete_component') }}
                                                                </h5>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                        aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form action="{{ route('components.delete') }}"
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
                                                                                class="btn btn-danger">{{ trans('home.delete_component') }}</button>
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
                                            {{ trans('home.add_component') }}
                                        </h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <!-- add_form -->
                                        <form action="{{ route('components.store') }}"
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
                                                           required>
                                                    <input id="id" type="hidden" name="id"
                                                           class="form-control">
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
                                                           class="mr-sm-2">{{ trans('home.image') }}
                                                        :</label>
                                                    <input class="form-control" type="file" accept="image/*" name="img">
                                                </div>

                                                <div class="col-6">
                                                    <label for="Name_en"
                                                           class="mr-sm-2">{{ trans('home.protein') }}
                                                        :</label>
                                                    <input type="number" class="form-control"
                                                           name="protein" required>
                                                </div>
                                                <div class="col-6">
                                                    <label for="Name_en"
                                                           class="mr-sm-2">{{ trans('home.calories') }}
                                                        :</label>
                                                    <input type="number" class="form-control"
                                                           name="calories" required>
                                                </div>
                                                <div class="col-6">
                                                    <label for="Name_en"
                                                           class="mr-sm-2">{{ trans('home.Fats') }}
                                                        :</label>
                                                    <input type="number" class="form-control"
                                                           name="fats" required>
                                                </div>
                                                <div class="col-6">
                                                    <label for="Name_en"
                                                           class="mr-sm-2">{{ trans('home.carbohydrates') }}
                                                        :</label>
                                                    <input type="number" class="form-control"
                                                           name="carbohydrates" required>
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
                    }
                    else {
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
