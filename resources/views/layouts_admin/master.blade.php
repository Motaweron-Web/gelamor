<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="HTML5 Template"/>
    <meta name="description" content="Gelamor"/>
    <meta name="author" content="potenzaglobalsolutions.com"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
    @include('layouts.head')
</head>

<body>

<div class="wrapper" style="font-family: 'Cairo', sans-serif">

    <!--=================================
preloader -->

{{--    <div id="pre-loader">--}}
{{--        <img src="{{ URL::asset('assets/images/pre-loader/'. (lang() == 'ar' ? 'loader-ar.svg' : 'loader-en.svg')) }}"--}}
{{--             alt="">--}}
{{--    </div>--}}

    <!--=================================
preloader -->

    @include('layouts_admin.main-header')
    @if(Auth::guard('admin')->check())
        @include('layouts_admin.main-sidebar')
    @endif

    <!--=================================
 Main content -->
    <!-- main-content -->
    @if(Auth::guard('admin')->check())
        <div class="content-wrapper">
            @else
                <div style="margin: 80px 45px;">
                    @endif

                    @yield('page-header')
                    <div class="page-title">
                        <div class="row">
                            <div class="col-sm-6">
                                <h4 class="mb-0" style="font-family: 'Cairo', sans-serif">@yield('PageTitle')</h4>
                            </div>
                            <div class="col-sm-6">
                                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                                    @if(Auth::guard('admin')->check())
                                        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}"
                                                                       class="default-color">{{trans('home.main')}}</a>
                                        </li>
                                    @else
                                        <li class="breadcrumb-item"><a href="{{ route('chef.home') }}"
                                                                       class="default-color">{{trans('home.main')}}</a>
                                        </li>
                                    @endif
                                    <li class="breadcrumb-item active">@yield('PageTitle')</li>
                                </ol>
                            </div>
                        </div>

                        @yield('content')

                        <!--=================================
wrapper -->

                        <!--=================================
             footer -->

                        @include('layouts_admin.footer')
                    </div><!-- main content wrapper end-->
                </div>
        </div>
</div>

<!--=================================
footer -->

@include('layouts_admin.footer-scripts')
@yield('js')

</body>

</html>
