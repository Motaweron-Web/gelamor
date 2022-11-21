<div class="container-fluid">
    <div class="row">
        <!-- Left Sidebar start-->
        <div class="side-menu-fixed">
            <div class="scrollbar side-menu-bg" style="overflow: scroll">
                <ul class="nav navbar-nav side-menu" id="sidebarnav">
                    <!-- menu item Dashboard-->
                    @if(Auth::guard('admin')->check())
                        <li>
                            <a href="{{ route('admin.home') }}">
                                <div class="pull-left"><i class="ti-home"></i><span
                                        class="right-nav-text">@lang('home.main')</span>
                                </div>
                                <div class="clearfix"></div>
                            </a>
                        </li>
                        <!-- menu title -->
                        <li class="mt-10 mb-10 text-muted pl-4 font-medium menu-title">@lang('home.elements') </li>

                        <!-- Admins -->
                        <li>
                            <a href="javascript:void(0);" data-toggle="collapse" data-target="#Grades-menu">
                                <div class="pull-left"><i class="fas fa-shield"></i><span
                                        class="right-nav-t">@lang('home.admins')</span></div>
                                <div class="pull-right"><i class="ti-plus"></i></div>
                                <div class="clearfix"></div>
                            </a>
                            <ul id="Grades-menu" class="collapse" data-parent="#sidebarnav">
                                <li><a href="{{ route('admin.index') }}">@lang('home.admin_list')</a></li>

                            </ul>
                        </li>

                        <!--  chefs -->

                        <li>
                            <a href="javascript:void(0);" data-toggle="collapse" data-target="#Grades-chef">
                                <div class="pull-left"><i class="fas fa-hat-chef"></i><span
                                        class="right-nav-t">@lang('home.chef')</span></div>
                                <div class="pull-right"><i class="ti-plus"></i></div>
                                <div class="clearfix"></div>
                            </a>
                            <ul id="Grades-chef" class="collapse" data-parent="#sidebarnav">
                                <li><a href="{{ route('chef.index') }}">@lang('home.chef_list')</a></li>

                            </ul>
                        </li>
                        <!-- users -->
                        <li>
                            <a href="javascript:void(0);" data-toggle="collapse" data-target="#classes-menu">
                                <div class="pull-left"><i class="fa fa-users"></i><span
                                        class="right-nav-text">@lang('home.users')</span></div>
                                <div class="pull-right"><i class="ti-plus"></i></div>
                                <div class="clearfix"></div>
                            </a>
                            <ul id="classes-menu" class="collapse" data-parent="#sidebarnav">
                                <li><a href="{{ route('users.index') }}">@lang('home.user_list')</a></li>
                            </ul>
                        </li>

                        <!-- Meals -->
                        <li>
                            <a href="javascript:void(0);" data-toggle="collapse" data-target="#meal-menu">
                                <div class="pull-left"><i class="fas fa-utensils"></i><span
                                        class="right-nav-text">@lang('home.meals')</span></div>
                                <div class="pull-right"><i class="ti-plus"></i></div>
                                <div class="clearfix"></div>
                            </a>
                            <ul id="meal-menu" class="collapse" data-parent="#sidebarnav">
                                <li><a href="{{ route('meal_type.index') }}">@lang('home.meal_type_list')</a></li>
                                <li><a href="{{ route('meals.index') }}">@lang('home.meals_list')</a></li>
                                <li><a href="{{ route('custom_meal.index') }}">@lang('home.custom_meals_list')</a></li>
                            </ul>
                        </li>

                        <!-- Components -->
                        <li>
                            <a href="javascript:void(0);" data-toggle="collapse" data-target="#users-menu">
                                <div class="pull-left"><i class="fas fa-carrot"></i><span
                                        class="right-nav-text">@lang('home.components')</span></div>
                                <div class="pull-right"><i class="ti-plus"></i></div>
                                <div class="clearfix"></div>
                            </a>
                            <ul id="users-menu" class="collapse" data-parent="#sidebarnav">
                                <li><a href="{{ route('components.index') }}">@lang('home.components_list')</a></li>
                            </ul>
                        </li>




                        <!-- Settings -->
                        <li>
                            <a href="javascript:void(0);" data-toggle="collapse" data-target="#sections-menu">
                                <div class="pull-left"><i class="fas fa-gears"></i><span
                                        class="right-nav-text">@lang('home.setting')</span></div>
                                <div class="pull-right"><i class="ti-plus"></i></div>
                                <div class="clearfix"></div>
                            </a>
                            <ul id="sections-menu" class="collapse" data-parent="#sidebarnav">
                                <li><a href="{{ route('setting.index') }}">@lang('home.setting_list')</a></li>
                                <li><a href="{{ route('setting.terms') }}">@lang('home.terms')</a></li>
                                <li><a href="{{ route('setting.privacy') }}">@lang('home.privacy')</a></li>
                                <li><a href="{{ route('setting.about') }}">@lang('home.about')</a></li>
                            </ul>
                        </li>






































                        {{---------------------CHEF LAyout ---------------}}
                        {{---------------------CHEF LAyout ---------------}}
                        {{---------------------CHEF LAyout ---------------}}
                        {{---------------------CHEF LAyout ---------------}}
                    @else
                        <li>
                            <a href="{{ route('chef.home') }}">
                                <div class="pull-left"><i class="ti-home"></i><span
                                        class="right-nav-text">@lang('home.main')</span>
                                </div>
                                <div class="clearfix"></div>
                            </a>
                        </li>
                        <!-- menu title -->
                        <li class="mt-10 mb-10 text-muted pl-4 font-medium menu-title">@lang('home.elements') </li>

                        <li>
                            <a href="javascript:void(0);" data-toggle="collapse" data-target="#classes-menu">
                                <div class="pull-left"><i class="fa fa-users"></i><span
                                        class="right-nav-text">@lang('home.orders')</span></div>
                                <div class="pull-right"><i class="ti-plus"></i></div>
                                <div class="clearfix"></div>
                            </a>
                            <ul id="classes-menu" class="collapse" data-parent="#sidebarnav">
                                <li><a href="#!">@lang('home.order_day')</a></li>
                                <li><a href="#!">@lang('home.all_order')</a></li>
                            </ul>
                        </li>
                    @endif

                </ul>
            </div>
        </div>


        <!-- Left Sidebar End-->

        <!--=================================
