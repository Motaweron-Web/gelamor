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
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
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
                                                        <table id="datatable"
                                                               class="table  table-hover table-sm table-bordered p-0"
                                                               data-page-length="50"

                                                               style="text-align: center">
                                                            <thead>
                                                            <tr>
                                                                <th>#</th>
                                                                <th>{{ trans('home.name') }}</th>
                                                                <th>{{ trans('home.email') }}</th>
                                                                <th>{{ trans('home.actions') }}</th>
                                                                <th>المجموع</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            <?php $i = 0; ?>
                                                            <tr>
                                                                <td>{{ $i+1 }}</td>
                                                                <td>a</td>
                                                                <td>a</td>
                                                                <td>a</td>
                                                                <td>a</td>
                                                            </tr>
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

</script>
@endsection
