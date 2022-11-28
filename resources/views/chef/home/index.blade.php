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
    {{--    <div class="row">--}}
    {{--        <div class="col-md-12 mb-30">--}}
    {{--            <div class="card card-statistics h-100">--}}
    {{--                <div class="card-body">--}}
    {{--                    <h1>التقويم</h1>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--    </div>--}}
    <style>
        .greenCard {
            background: #2fbe21 !important;
            border-radius: 10px !important;
        }

        .greenCardText h4, .greenCardText p, .greenCalendar, .greenCardText h1 {
            color: #FFFFFF !important;
        }
    </style>
    <div class="row">
        <?php $start = \Carbon\Carbon::now();
        $end = \Carbon\Carbon::now()->addDays(8);
        ?>
        @for($i = $start ; $i <= $end ; $i->modify('+1 day'))
            <div class="{{ ($i->isToday()) ? 'col-12 mb-4' : 'col-xl-4 col-lg-6 col-md-6 mb-30'  }} ">
                <?php $id = $i->format('Y-m-d'); ?>
                <a href="{{ route('chef.orders',$id) }}">
                    <div
                        class="card card-statistics h-100 {{ ($i->isToday() == \Carbon\Carbon::today() ) ? 'greenCard' : ''}}">
                        <div class="card-body">
                            <div class="clearfix">
                                <div class="float-left">
                                    <span class="text-success">
                                        <i class="fa fa-calendar highlight-icon {{ ($i->isToday() == \Carbon\Carbon::today() ) ? 'greenCalendar' : ''}} "
                                           aria-hidden="true"></i>
                                    </span>
                                </div>
                                <div
                                    class="float-right text-right {{ ($i->isToday() == \Carbon\Carbon::today() ) ? 'greenCardText' : ''}} ">
                                    <p class="card-text text-dark">
                                        {{ ($i->isToday() == \Carbon\Carbon::today() ) ? 'today' : \Carbon\Carbon::parse($i)->dayName }}
                                    </p>
                                    <h4>{{ $i->format('Y-m-d')  }}</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        @endfor
        <div class="col-4 mb-4">
            <?php $id = $i->format('Y-m-d'); ?>
            <a href="{{ route('chef.all_orders') }}">
                <div
                    class="card card-statistics h-100 greenCard">
                    <div class="card-body">
                        <div class="clearfix">
                            <div class="float-left">
                                    <span class="text-success">
                                        <i class="fa fa-calendar highlight-icon greenCalendar"
                                           aria-hidden="true"></i>
                                    </span>
                            </div>
                            <div
                                class="float-right text-right greenCardText" style="text-align: center">
                                <h1>{{ trans('home.all_order') }}</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        {{--        <div class="col-xl-3 col-lg-6 col-md-6 mb-30">--}}
        {{--            <div class="card card-statistics h-100">--}}
        {{--                <div class="card-body">--}}
        {{--                    <div class="clearfix">--}}
        {{--                        <div class="float-left">--}}
        {{--                                    <span class="text-warning">--}}
        {{--                                        <i class="fas fa-globe highlight-icon" aria-hidden="true"></i>--}}
        {{--                                    </span>--}}
        {{--                        </div>--}}
        {{--                        <div class="float-right text-right">--}}
        {{--                            <p class="card-text text-dark">@lang('home.countries')</p>--}}
        {{--                            <h4>{{\App\Models\Country::count()}}</h4>--}}
        {{--                        </div>--}}
        {{--                    </div>--}}
        {{--                    <p class="text-muted pt-3 mb-0 mt-2 border-top">--}}
        {{--                        <i class="fas fa-binoculars mr-1" aria-hidden="true"></i><a href="#!"--}}
        {{--                                                                                    target="_blank"><span--}}
        {{--                                class="text-danger">@lang('home.more')</span></a>--}}
        {{--                    </p>--}}
        {{--                </div>--}}
        {{--            </div>--}}
        {{--        </div>--}}
        {{--        <div class="col-xl-3 col-lg-6 col-md-6 mb-30">--}}
        {{--            <div class="card card-statistics h-100">--}}
        {{--                <div class="card-body">--}}
        {{--                    <div class="clearfix">--}}
        {{--                        <div class="float-left">--}}
        {{--                                    <span class="text-success">--}}
        {{--                                        <i class="fa fa-shopping-bag highlight-icon" aria-hidden="true"></i>--}}
        {{--                                    </span>--}}
        {{--                        </div>--}}
        {{--                        <div class="float-right text-right">--}}
        {{--                            <p class="card-text text-dark">@lang('home.orders')</p>--}}
        {{--                            <h4>{{\App\Models\OrderSpecial::count()}}</h4>--}}
        {{--                        </div>--}}
        {{--                    </div>--}}
        {{--                    <p class="text-muted pt-3 mb-0 mt-2 border-top">--}}
        {{--                        <i class="fas fa-binoculars mr-1" aria-hidden="true"></i><a--}}
        {{--                            href="" target="_blank"><span--}}
        {{--                                class="text-danger">@lang('home.more')</span></a>--}}
        {{--                    </p>--}}
        {{--                </div>--}}
        {{--            </div>--}}
        {{--        </div>--}}
        {{--        <div class="col-xl-3 col-lg-6 col-md-6 mb-30">--}}
        {{--            <div class="card card-statistics h-100">--}}
        {{--                <div class="card-body">--}}
        {{--                    <div class="clearfix">--}}
        {{--                        <div class="float-left">--}}
        {{--                                    <span class="text-primary">--}}
        {{--                                        <i class="fas fa-chalkboard highlight-icon" aria-hidden="true"></i>--}}
        {{--                                    </span>--}}
        {{--                        </div>--}}
        {{--                        <div class="float-right text-right">--}}
        {{--                            <p class="card-text text-dark">@lang('home.packages')</p>--}}
        {{--                            <h4>{{\App\Models\Package::count()}}</h4>--}}
        {{--                        </div>--}}
        {{--                    </div>--}}
        {{--                    <p class="text-muted pt-3 mb-0 mt-2 border-top">--}}
        {{--                        <i class="fas fa-binoculars mr-1" aria-hidden="true"></i><a href="#!"--}}
        {{--                                                                                    target="_blank"><span--}}
        {{--                                class="text-danger">@lang('home.more')</span></a>--}}
        {{--                    </p>--}}
        {{--                </div>--}}
        {{--            </div>--}}
        {{--        </div>--}}
        {{--        <div class="col-xl-3 col-lg-6 col-md-6 mb-30">--}}
        {{--            <div class="card card-statistics h-100">--}}
        {{--                <div class="card-body">--}}
        {{--                    <div class="clearfix">--}}
        {{--                        <div class="float-left">--}}
        {{--                                    <span class="text-primary">--}}
        {{--                                        <i class="fas fa-chalkboard highlight-icon" aria-hidden="true"></i>--}}
        {{--                                    </span>--}}
        {{--                        </div>--}}
        {{--                        <div class="float-right text-right">--}}
        {{--                            <p class="card-text text-dark">@lang('home.packages')</p>--}}
        {{--                            <h4>{{\App\Models\Package::count()}}</h4>--}}
        {{--                        </div>--}}
        {{--                    </div>--}}
        {{--                    <p class="text-muted pt-3 mb-0 mt-2 border-top">--}}
        {{--                        <i class="fas fa-binoculars mr-1" aria-hidden="true"></i><a href="#!"--}}
        {{--                                                                                    target="_blank"><span--}}
        {{--                                class="text-danger">@lang('home.more')</span></a>--}}
        {{--                    </p>--}}
        {{--                </div>--}}
        {{--            </div>--}}
        {{--        </div>--}}
        {{--        <div class="col-xl-3 col-lg-6 col-md-6 mb-30">--}}
        {{--            <div class="card card-statistics h-100">--}}
        {{--                <div class="card-body">--}}
        {{--                    <div class="clearfix">--}}
        {{--                        <div class="float-left">--}}
        {{--                                    <span class="text-primary">--}}
        {{--                                        <i class="fas fa-chalkboard highlight-icon" aria-hidden="true"></i>--}}
        {{--                                    </span>--}}
        {{--                        </div>--}}
        {{--                        <div class="float-right text-right">--}}
        {{--                            <p class="card-text text-dark">@lang('home.packages')</p>--}}
        {{--                            <h4>{{\App\Models\Package::count()}}</h4>--}}
        {{--                        </div>--}}
        {{--                    </div>--}}
        {{--                    <p class="text-muted pt-3 mb-0 mt-2 border-top">--}}
        {{--                        <i class="fas fa-binoculars mr-1" aria-hidden="true"></i><a href="#!"--}}
        {{--                                                                                    target="_blank"><span--}}
        {{--                                class="text-danger">@lang('home.more')</span></a>--}}
        {{--                    </p>--}}
        {{--                </div>--}}
        {{--            </div>--}}
        {{--        </div>--}}
        {{--        <div class="col-xl-3 col-lg-6 col-md-6 mb-30">--}}
        {{--            <div class="card card-statistics h-100">--}}
        {{--                <div class="card-body">--}}
        {{--                    <div class="clearfix">--}}
        {{--                        <div class="float-left">--}}
        {{--                                    <span class="text-primary">--}}
        {{--                                        <i class="fas fa-chalkboard highlight-icon" aria-hidden="true"></i>--}}
        {{--                                    </span>--}}
        {{--                        </div>--}}
        {{--                        <div class="float-right text-right">--}}
        {{--                            <p class="card-text text-dark">@lang('home.packages')</p>--}}
        {{--                            <h4>{{\App\Models\Package::count()}}</h4>--}}
        {{--                        </div>--}}
        {{--                    </div>--}}
        {{--                    <p class="text-muted pt-3 mb-0 mt-2 border-top">--}}
        {{--                        <i class="fas fa-binoculars mr-1" aria-hidden="true"></i><a href="#!"--}}
        {{--                                                                                    target="_blank"><span--}}
        {{--                                class="text-danger">@lang('home.more')</span></a>--}}
        {{--                    </p>--}}
        {{--                </div>--}}
        {{--            </div>--}}
        {{--        </div>--}}
    </div>
    <!-- row closed -->
@endsection
@section('js')
    @toastr_js
    @toastr_render

@endsection
