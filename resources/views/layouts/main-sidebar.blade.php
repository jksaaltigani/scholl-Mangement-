<div class="container-fluid">
    <div class="row">
        <!-- Left Sidebar start-->
        <div class="side-menu-fixed">
            <div class="scrollbar side-menu-bg">
                <ul class="nav navbar-nav side-menu" id="sidebarnav">
                    <!-- menu item Dashboard-->
                    <li>
                        <a href="{{ route('dashboard') }}">
                            <div class="pull-left"><i class="ti-home"></i><span
                                    class="right-nav-text">{{ __('site.dashboard') }}</span>
                            </div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>


                    </li>
                    <!-- menu title -->
                    <li class="mt-10 mb-10 text-muted pl-4 font-medium menu-title">{{ __('site.grades') }} </li>
                    <!-- menu item Elements-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#elements">
                            <div class="pull-left"><i class="ti-palette"></i><span
                                    class="right-nav-text">{{ __('site.grades') }}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="elements" class="collapse" data-parent="#sidebarnav">
                            <li><a href="{{ route('grades.index') }}">{{ __('site.show grades') }}</a></li>
                        </ul>
                    </li>
                    <!-- menu item calendar-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#calendar-menu">
                            <div class="pull-left"><i class="ti-calendar"></i><span
                                    class="right-nav-text">{{ __('site.class_room') }}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="calendar-menu" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="{{ route('classrooms.index') }}">{{ __('site.class room list') }} </a>
                            </li>
                        </ul>
                    </li>
                    <!-- menu item todo-->
                    <li>
                        <a href="{{ route('Sections.index') }}"><i class="ti-menu-alt"></i><span
                                class="right-nav-text">{{ __('site.Sections') }}</span> </a>
                    </li>
                    <!-- menu item chat-->
                    <li class="mt-10 mb-10 text-muted pl-4 font-medium menu-title">{{ __('site.studetn & parent') }}
                    </li>

                    <li>
                        <a href="{{ route('add_parent') }}"><i class="ti-comments"></i><span
                                class="right-nav-text">{{ __('site.parent') }}
                            </span></a>
                    </li>
                    <!-- menu item mailbox-->
                    <li>
                        <a href="{{ route('teachers.index') }}"><i class="ti-email"></i><span
                                class="right-nav-text">{{ __('site.teachers') }}</span> <span
                                class="badge badge-pill badge-warning float-right mt-1">12</span> </a>
                    </li>
                    <!-- menu item Charts-->
                    {{-- <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#chart">
                            <div class="pull-left"><i class="ti-pie-chart"></i><span
                                    class="right-nav-text">{{ __('site.student') }}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                    </li> --}}
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#chart">
                            <div class="pull-left"><i class="ti-pie-chart"></i><span
                                    class="right-nav-text">{{ __('site.student') }}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="chart" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="{{ route('student.index') }}">{{ __('site.showStudent') }} </a> </li>
                            <li> <a href="{{ route('student.create') }}">{{ __('site.add student') }} </a> </li>
                            <li> <a href="{{ route('promotions_form') }}">{{ __('site.promotions student') }}
                                </a>
                            </li>
                        </ul>
                    </li>


                    <!-- menu font icon-->
                    <!-- menu title -->
                    <li class="mt-10 mb-10 text-muted pl-4 font-medium menu-title"> عمليات الاداريه </li>
                    <!-- menu item Widgets-->

                    <!-- menu item Form-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#Form">
                            <div class="pull-left"><i class="ti-files"></i><span class="right-nav-text">
                                    {{ __('site.promotion process') }}
                                </span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>

                        {{-- -------------------------- form -------------------------------------- control --}}
                        <ul id="Form" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="{{ route('promotions_form') }}">{{ __('site.promotions student') }}
                                </a>
                            </li>
                            <li> <a href="{{ route('pormation.table') }}">{{ __('site.promotions table') }}
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#jksa1">
                            <div class="pull-left"><i class="ti-files"></i><span class="right-nav-text">
                                    {{ __('site.garduted') }}
                                </span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>

                        {{-- -------------------------- form -------------------------------------- control --}}
                        <ul id="jksa1" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="{{ route('stgarduted.index') }}">{{ __('site.garduted table') }}
                                </a>
                            </li>
                            <li> <a href="{{ route('stgarduted.create') }}">{{ __('site.add garduted') }}
                                </a>
                            </li>
                        </ul>

                    </li>

                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#font-icon">
                            <div class="pull-left"><i class="ti-home"></i><span class="right-nav-text">
                                    {{ __('site.fess') }}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>

                        <ul id="font-icon" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="{{ route('fees.index') }}">{{ __('site.fess') }}</a> </li>
                            <li> <a href="{{ route('fees.create') }}">{{ __('site.add fess') }}</a> </li>
                        </ul>

                    </li>
                    <li>
                        <a href="{{ route('invoices.index') }}"><i class="ti-menu-alt"></i><span
                                class="right-nav-text">{{ __('site.invocie table') }}</span> </a>
                    </li>
                    <li>
                        <a href="{{ route('recept.index') }}"><i class="ti-menu-alt"></i><span
                                class="right-nav-text">{{ __('site.recept table') }}</span> </a>
                    </li>
                </ul>
            </div>
        </div>
