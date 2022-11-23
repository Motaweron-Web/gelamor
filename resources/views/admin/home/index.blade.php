@extends('layouts_admin.master')
@section('css')
    @toastr_css
    @section('title')
        @lang('home.main')
    @stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
    @section('PageTitle')
        @lang('home.main')
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
                        <div class="col-xl-3 col-lg-6 col-md-6 mb-30">
                            <div class="card card-statistics h-100">
                                <div class="card-body">
                                    <div class="clearfix">
                                        <div class="float-left">
                                    <span class="text-success">
                                        <i class="fa fa-users highlight-icon" aria-hidden="true"></i>
                                    </span>
                                        </div>
                                        <div class="float-right text-right">
                                            <p class="card-text text-dark">@lang('home.users')</p>
                                            <h4>{{\App\Models\User::count()}}</h4>
                                        </div>
                                    </div>
                                    <p class="text-muted pt-3 mb-0 mt-2 border-top">
                                        <i class="fas fa-binoculars mr-1" aria-hidden="true"></i><a
                                            href="{{ route('users.index') }}" target="_blank"><span
                                                class="text-danger">@lang('home.more')</span></a>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-6 col-md-6 mb-30">
                            <div class="card card-statistics h-100">
                                <div class="card-body">
                                    <div class="clearfix">
                                        <div class="float-left">
                                    <span class="text-warning">
                                        <i class="fas fa-globe highlight-icon" aria-hidden="true"></i>
                                    </span>
                                        </div>
                                        <div class="float-right text-right">
                                            <p class="card-text text-dark">@lang('home.countries')</p>
                                            <h4>{{\App\Models\Country::count()}}</h4>
                                        </div>
                                    </div>
                                    <p class="text-muted pt-3 mb-0 mt-2 border-top">
                                        <i class="fas fa-binoculars mr-1" aria-hidden="true"></i><a href="#!"
                                                                                                    target="_blank"><span
                                                class="text-danger">@lang('home.more')</span></a>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-6 col-md-6 mb-30">
                            <div class="card card-statistics h-100">
                                <div class="card-body">
                                    <div class="clearfix">
                                        <div class="float-left">
                                    <span class="text-success">
                                        <i class="fa fa-shopping-bag highlight-icon" aria-hidden="true"></i>
                                    </span>
                                        </div>
                                        <div class="float-right text-right">
                                            <p class="card-text text-dark">@lang('home.orders')</p>
                                            <h4>{{\App\Models\OrderSpecial::count()}}</h4>
                                        </div>
                                    </div>
                                    <p class="text-muted pt-3 mb-0 mt-2 border-top">
                                        <i class="fas fa-binoculars mr-1" aria-hidden="true"></i><a
                                            href="" target="_blank"><span
                                                class="text-danger">@lang('home.more')</span></a>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-6 col-md-6 mb-30">
                            <div class="card card-statistics h-100">
                                <div class="card-body">
                                    <div class="clearfix">
                                        <div class="float-left">
                                    <span class="text-primary">
                                        <i class="fas fa-chalkboard highlight-icon" aria-hidden="true"></i>
                                    </span>
                                        </div>
                                        <div class="float-right text-right">
                                            <p class="card-text text-dark">@lang('home.packages')</p>
                                            <h4>{{\App\Models\Package::count()}}</h4>
                                        </div>
                                    </div>
                                    <p class="text-muted pt-3 mb-0 mt-2 border-top">
                                        <i class="fas fa-binoculars mr-1" aria-hidden="true"></i><a href="#!"
                                                                                                    target="_blank"><span
                                                class="text-danger">@lang('home.more')</span></a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <a href="{{ route('contact_us.index') }}"> <span
                                    class="btn btn-success btn mb-3">{{ trans('home.messages') }}</span></a>
                            <table id="" class="table  table-hover table-sm table-bordered p-0"
                                   data-page-length="50"
                                   style="text-align: center">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>{{ trans('home.name') }}</th>
                                    <th>{{ trans('home.email') }}</th>
                                    <th>{{ trans('home.subject') }}</th>
                                    <th>{{ trans('home.created_at') }}</th>
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
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
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
