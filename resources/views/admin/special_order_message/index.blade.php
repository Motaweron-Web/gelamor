@extends('layouts_admin.master')
@section('css')
    @toastr_css
    @section('title')
        @lang('home.special_order_message')
    @stop
@endsection
@section('page-header')
    <!--breadcrumb -->
    @section('PageTitle')
        @lang('home.special_order_message')
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
                                                <th>{{ trans('home.user_id') }}</th>
                                                <th>{{ trans('home.name') }}</th>
                                                <th>{{ trans('home.created_at') }}</th>
                                                <th>{{ trans('home.actions') }}</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php $i = 0; ?>
                                            @foreach ($specials as $special)
                                                <tr>
                                                    <td>{{ $special->user->id }}</td>
                                                    <td>{{ $special->user->name }}</td>
                                                    <td>{{ $special->created_at->format('Y-m-d') }}</td>
                                                    <td>
                                                        <button type="button" class="btn btn-danger btn-sm"
                                                                data-toggle="modal"
                                                                data-target="#delete{{ $special->id }}"
                                                                title="{{ trans('home.delete') }}"><i
                                                                class="fa fa-trash"></i></button>
                                                        <button type="button" class="btn btn-info btn-sm"
                                                                data-toggle="modal"
                                                                data-target="#show{{ $special->user->id }}"
                                                                title="{{ trans('home.show') }}"><i
                                                                class="fa fa-eye"></i> {{ trans('home.read_massage') }}
                                                        </button>
                                                        <button type="button" class="btn btn-success btn-sm"
                                                                data-toggle="modal"
                                                                data-target="#add_meal{{ $special->user_id }}"
                                                                title="{{ trans('home.order_special') }}">
                                                            {{ trans('home.add_meal') }}
                                                        </button>
                                                        <button type="button" class="btn btn-primary btn-sm"
                                                                data-toggle="modal"
                                                                data-target="#show_meal{{ $special->user_id }}"
                                                                title="{{ trans('home.meals') }}">
                                                            {{ trans('home.meals') }}
                                                        </button>
                                                    </td>
                                                </tr>

                                                <!-- add_modal_Meal Special -->
                                                <div class="modal fade" id="add_meal{{ $special->user_id }}"
                                                     tabindex="-1" role="dialog"
                                                     aria-labelledby="exampleModalLabel"
                                                     aria-hidden="true">
                                                    <div class="modal-dialog modal-lg" role="document">
                                                        <div class="modal-content ">
                                                            <div class="modal-header">
                                                                <h5 style="font-family: 'Cairo', sans-serif;"
                                                                    class="modal-title"
                                                                    id="exampleModalLabel">
                                                                    {{ trans('home.add_meal') }}
                                                                </h5>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                        aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <!-- add_form -->
                                                                <form action="{{ route('order_special.store') }}"
                                                                      method="post">
                                                                    {{--                                                                    {{ method_field('patch') }}--}}
                                                                    @csrf
                                                                    <input type="hidden" name="user_id"
                                                                           value="{{ $special->user_id }}"/>
                                                                    <div class="row">
                                                                        <div class="col-6" hidden>
                                                                            <label for="user_id"
                                                                                   class="mr-sm-2">{{ trans('home.user') }}
                                                                                :</label>
                                                                            <input id="user_id" type="text"
                                                                                   name="user_id"
                                                                                   class="form-control"
                                                                                   value="{{ $special->user_id }}"
                                                                                   required disabled>
                                                                        </div>
                                                                        <div class="col-6">
                                                                            <label for="user_id"
                                                                                   class="mr-sm-2">{{ trans('home.meal_type') }}
                                                                                :</label>

                                                                            <select class="form-control lg"
                                                                                    name="meal_type_id"
                                                                                    style="height: calc(4.1rem + 2px);"
                                                                            >
                                                                                <option disabled
                                                                                        selected>@lang('home.meal_type')
                                                                                </option>
                                                                                @foreach ($meals_type as $meal_type)
                                                                                    <option
                                                                                        value="{{ $meal_type->id }}">
                                                                                        {{ lang() == 'ar' ? $meal_type->name_ar : $meal_type->name_en }}
                                                                                    </option>
                                                                                @endforeach
                                                                            </select>
                                                                            <label for="date_of_order"
                                                                                   class="mr-sm-2">{{ trans('home.date_meal') }}
                                                                                :</label>
                                                                            <input id="date_of_order" type="date"
                                                                                   name="date_of_order"
                                                                                   class="form-control"
                                                                                   required>


                                                                            <label for="protein"
                                                                                   class="mr-sm-2">{{ trans('home.protein') }}
                                                                                :</label>
                                                                            <input id="protein" type="number"
                                                                                   name="protein"
                                                                                   class="form-control"
                                                                                   required>
                                                                        </div>
                                                                        <div class="col-6">
                                                                            <label for="Name_en"
                                                                                   class="mr-sm-2">{{ trans('home.components_list') }}
                                                                                :</label>
                                                                            <select class="form-control"
                                                                                    name="component_ids[]"
                                                                                    style="height: calc(10.1rem + 2px);"
                                                                                    required
                                                                                    multiple data-live-search="true">
                                                                                <option selected
                                                                                        disabled>@lang('home.components_list')</option>
                                                                                @foreach($components as $c)
                                                                                    <option
                                                                                        value="{{ $c->id }}">
                                                                                        {{ (lang() == 'ar') ? $c->name_ar : $c->name_en }}
                                                                                    </option>
                                                                                @endforeach
                                                                            </select>
                                                                        </div>

                                                                        <div class="col-6" hidden>
                                                                            <input id="type" type="hidden" name="type"
                                                                                   class="form-control"
                                                                                   value="{{ 'patient' }}"
                                                                                   required>
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


                                                <!-- show message -->
                                                <div class="modal fade" id="show{{ $special->user->id }}" tabindex="-1"
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
                                                                        <div class="card card-body">
                                                                            <label for="Title"
                                                                                   class="mr-sm-2">{{ trans('home.subject') }}
                                                                                :</label>
                                                                            <h6>{{ $special->title  }}</h6>

                                                                            <label for="Title"
                                                                                   class="mr-sm-2">{{ trans('home.message') }}
                                                                                :</label>
                                                                            <h5>{{ $special->message }}</h5>
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

                                                <!-- show Meals -->
                                                <div class="modal fade" id="show_meal{{ $special->user_id }}"
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
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                        aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <input type="text" hidden name="role_id" value="1">
                                                                <div class="row">
                                                                        <?php
                                                                        $meal_types = \App\Models\OrderSpecial::where('user_id', $special->user->id)
                                                                            ->get();
                                                                        ?>
                                                                    @foreach($meal_types as $meal_type)
                                                                        <div class="col-12">
                                                                            <button
                                                                                style="width: 100px;position: relative;top: 58px;right: 600px;z-index: 2;"
                                                                                class="btn btn-sm btn-danger delete-btn "
                                                                                type="button"
                                                                                data-id="{{ $special->user->id }}"
                                                                                data-meal="{{ $meal_type->meal_type->id }}">
                                                                                @lang('home.delete')
                                                                            </button>
                                                                            <div class="card card-body mb-3 meal_type"
                                                                                 id="meal_type">
                                                                                <label>{{ trans('home.meals') }}
                                                                                    : </label>
                                                                                <h4>{{ lang() == 'ar' ? $meal_type->meal_type->name_ar : $meal_type->meal_type->name_en }}</h4>
                                                                            </div>
                                                                        </div>
                                                                    @endforeach
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
                                                <div class="modal fade" id="delete{{ $special->id }}" tabindex="-1"
                                                     role="dialog"
                                                     aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 style="font-family: 'Cairo', sans-serif;"
                                                                    class="modal-title"
                                                                    id="exampleModalLabel">
                                                                    {{ trans('home.delete_chef') }}
                                                                </h5>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                        aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form action="{{ route('special.delete') }}"
                                                                      method="post">
                                                                    {{--                                                                    {{ method_field('POST') }}--}}
                                                                    @csrf
                                                                    <h6>{{ trans('home.warning_delete') }}</h6>
                                                                    <input id="id" type="hidden" name="id"
                                                                           class="form-control"
                                                                           value="{{ $special->id }}">
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary"
                                                                                data-dismiss="modal">{{ trans('home.close') }}</button>
                                                                        <button type="submit"
                                                                                class="btn btn-danger">{{ trans('home.delete') }}</button>
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

    <script>

        $('.delete-btn').on('click', function (e) {
            e.preventDefault();

            var id = $(this).data('id');
            var meal = $(this).data('meal');
            $(this).next('.meal_type').fadeOut();
            $(this).fadeOut();
            $.ajax({
                method: "POST",
                url: '/admin/special_order_message/deleteMeal',
                data: {
                    _token: '{{ csrf_token() }}',
                    user_id: id,
                    meal_type_id: meal,
                },
                success: function () {
                    $(this).next('.meal_type').fadeOut();
                    toastr.success('تم الحدف بنجاح')
                },
                error: function () {
                    toastr.error('Try again !')
                }
            })
        })
    </script>

@endsection
