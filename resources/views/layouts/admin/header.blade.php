<div id="kt_header" class="header header-fixed">
    <!--begin::Container-->
    <div class="container-fluid d-flex align-items-stretch justify-content-between">
        <!--begin::Header Menu Wrapper-->
        <div class="header-menu-wrapper header-menu-wrapper-left" id="kt_header_menu_wrapper">
            <!--begin::Header Menu-->
            <div id="kt_header_menu" class="header-menu header-menu-mobile header-menu-layout-default">
                <!--begin::Header Nav-->
                <ul class="menu-nav">
                    <li
                        class="menu-item menu-item-submenu {{ Route::currentRouteNamed('admin.dashboard.*') ? 'menu-item-active' : '' }}">
                        <a href="{{ route('admin.dashboard.index') }}" class="menu-link">
                            <span class="menu-text">Dashboard</span>
                            <i class="menu-arrow"></i>
                        </a>
                    </li>
                    <li
                        class="menu-item menu-item-submenu {{ Route::currentRouteNamed('admin.books.*') ? 'menu-item-active' : '' }}">
                        <a href="{{ route('admin.books.index') }}" class="menu-link">
                            <span class="menu-text">Books</span>
                            <i class="menu-arrow"></i>
                        </a>
                    </li>
                    <li
                        class="menu-item menu-item-submenu {{ Route::currentRouteNamed('admin.members.*') ? 'menu-item-active' : '' }}">
                        <a href="{{ route('admin.members.index') }}" class="menu-link">
                            <span class="menu-text">Member</span>
                            <i class="menu-arrow"></i>
                        </a>
                    </li>
                    <li class="menu-item menu-item-submenu {{ Route::currentRouteNamed('admin.statistic.*') ? 'menu-item-active' : '' }}">
                        <a href="{{ route('admin.statistic.index') }}" class="menu-link">
                            <span class="menu-text">Statistic</span>
                            <i class="menu-arrow"></i>
                        </a>
                    </li>
                </ul>
                <!--end::Header Nav-->
            </div>
            <!--end::Header Menu-->
        </div>
        <!--end::Header Menu Wrapper-->
        <!--begin::Topbar-->
        <div class="topbar">
            <!--begin::Notifications-->
            <div class="dropdown">
                <!--begin::Toggle-->
                <div class="topbar-item">
                    {{-- @if (Auth::user()->role == 'MEMBER')
                        @livewire('components.layout.component-search-bar')
                    @endif --}}
                </div>
                <div class="topbar-item" data-toggle="dropdown" data-offset="10px,0px">
                    <div class="btn btn-icon btn-clean btn-dropdown btn-lg mr-1 pulse pulse-primary">
                        <span class="svg-icon svg-icon-xl svg-icon-primary">
                            <!--begin::Svg Icon | path:assets/media/svg/icons/Code/Compiling.svg-->
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect x="0" y="0" width="24" height="24" />
                                    <path
                                        d="M2.56066017,10.6819805 L4.68198052,8.56066017 C5.26776695,7.97487373 6.21751442,7.97487373 6.80330086,8.56066017 L8.9246212,10.6819805 C9.51040764,11.267767 9.51040764,12.2175144 8.9246212,12.8033009 L6.80330086,14.9246212 C6.21751442,15.5104076 5.26776695,15.5104076 4.68198052,14.9246212 L2.56066017,12.8033009 C1.97487373,12.2175144 1.97487373,11.267767 2.56066017,10.6819805 Z M14.5606602,10.6819805 L16.6819805,8.56066017 C17.267767,7.97487373 18.2175144,7.97487373 18.8033009,8.56066017 L20.9246212,10.6819805 C21.5104076,11.267767 21.5104076,12.2175144 20.9246212,12.8033009 L18.8033009,14.9246212 C18.2175144,15.5104076 17.267767,15.5104076 16.6819805,14.9246212 L14.5606602,12.8033009 C13.9748737,12.2175144 13.9748737,11.267767 14.5606602,10.6819805 Z"
                                        fill="#000000" opacity="0.3" />
                                    <path
                                        d="M8.56066017,16.6819805 L10.6819805,14.5606602 C11.267767,13.9748737 12.2175144,13.9748737 12.8033009,14.5606602 L14.9246212,16.6819805 C15.5104076,17.267767 15.5104076,18.2175144 14.9246212,18.8033009 L12.8033009,20.9246212 C12.2175144,21.5104076 11.267767,21.5104076 10.6819805,20.9246212 L8.56066017,18.8033009 C7.97487373,18.2175144 7.97487373,17.267767 8.56066017,16.6819805 Z M8.56066017,4.68198052 L10.6819805,2.56066017 C11.267767,1.97487373 12.2175144,1.97487373 12.8033009,2.56066017 L14.9246212,4.68198052 C15.5104076,5.26776695 15.5104076,6.21751442 14.9246212,6.80330086 L12.8033009,8.9246212 C12.2175144,9.51040764 11.267767,9.51040764 10.6819805,8.9246212 L8.56066017,6.80330086 C7.97487373,6.21751442 7.97487373,5.26776695 8.56066017,4.68198052 Z"
                                        fill="#000000" />
                                </g>
                            </svg>
                            <!--end::Svg Icon-->
                        </span>
                        <span class="pulse-ring"></span>
                    </div>
                </div>
                <!--end::Toggle-->
                <!--begin::Dropdown-->
                <div class="dropdown-menu p-0 m-0 dropdown-menu-right dropdown-menu-anim-up dropdown-menu-lg">
                    <!--begin::Header-->
                    <div class="d-flex flex-column pt-12 bgi-size-cover bgi-no-repeat rounded-top"
                        style="background-image: url({{ url('assets/media/misc/bg-1.jpg') }})">
                        <!--begin::Title-->
                        <h4 class="d-flex flex-center rounded-top mb-5">
                            <span class="text-white"> {{ Auth::user()->email }}</span>
                        </h4>
                        <!--end::Title-->
                    </div>
                    <!--end::Header-->
                    <!--begin::Content-->
                    <div class="tab-content">
                        <!--begin::Tabpane-->
                        <div class="tab-pane active show p-8" id="topbar_notifications_notifications" role="tabpanel">
                            <!--begin::Action-->
                            <div class="d-flex flex-center pt-7">
                                <a href="{{ route('logout') }}"
                                    class="btn btn-light-danger font-weight-bold text-center"
                                    onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    LOG OUT
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                            <!--end::Action-->
                        </div>
                        <!--end::Tabpane-->
                        <!--begin::Tabpane-->
                        <div class="tab-pane" id="topbar_notifications_events" role="tabpanel">
                            <!--begin::Nav-->
                            <div class="navi navi-hover scroll my-4" data-scroll="true" data-height="300"
                                data-mobile-height="200">
                                <!--begin::Item-->
                                <a href="#" class="navi-item">
                                    <div class="navi-link">
                                        <div class="navi-icon mr-2">
                                            <i class="flaticon2-line-chart text-success"></i>
                                        </div>
                                        <div class="navi-text">
                                            <div class="font-weight-bold">New report has been received</div>
                                            <div class="text-muted">23 hrs ago</div>
                                        </div>
                                    </div>
                                </a>
                                <!--end::Item-->
                                <!--begin::Item-->
                                <a href="#" class="navi-item">
                                    <div class="navi-link">
                                        <div class="navi-icon mr-2">
                                            <i class="flaticon2-paper-plane text-danger"></i>
                                        </div>
                                        <div class="navi-text">
                                            <div class="font-weight-bold">Finance report has been generated</div>
                                            <div class="text-muted">25 hrs ago</div>
                                        </div>
                                    </div>
                                </a>
                                <!--end::Item-->
                                <!--begin::Item-->
                                <a href="#" class="navi-item">
                                    <div class="navi-link">
                                        <div class="navi-icon mr-2">
                                            <i class="flaticon2-user flaticon2-line- text-success"></i>
                                        </div>
                                        <div class="navi-text">
                                            <div class="font-weight-bold">New order has been received</div>
                                            <div class="text-muted">2 hrs ago</div>
                                        </div>
                                    </div>
                                </a>
                                <!--end::Item-->
                                <!--begin::Item-->
                                <a href="#" class="navi-item">
                                    <div class="navi-link">
                                        <div class="navi-icon mr-2">
                                            <i class="flaticon2-pin text-primary"></i>
                                        </div>
                                        <div class="navi-text">
                                            <div class="font-weight-bold">New customer is registered</div>
                                            <div class="text-muted">3 hrs ago</div>
                                        </div>
                                    </div>
                                </a>
                                <!--end::Item-->
                                <!--begin::Item-->
                                <a href="#" class="navi-item">
                                    <div class="navi-link">
                                        <div class="navi-icon mr-2">
                                            <i class="flaticon2-sms text-danger"></i>
                                        </div>
                                        <div class="navi-text">
                                            <div class="font-weight-bold">Application has been approved</div>
                                            <div class="text-muted">3 hrs ago</div>
                                        </div>
                                    </div>
                                </a>
                                <!--end::Item-->
                                <!--begin::Item-->
                                <a href="#" class="navi-item">
                                    <div class="navi-link">
                                        <div class="navi-icon mr-2">
                                            <i class="flaticon2-pie-chart-3 text-warning"></i>
                                        </div>
                                        <div class="navinavinavi-text">
                                            <div class="font-weight-bold">New file has been uploaded</div>
                                            <div class="text-muted">5 hrs ago</div>
                                        </div>
                                    </div>
                                </a>
                                <!--end::Item-->
                                <!--begin::Item-->
                                <a href="#" class="navi-item">
                                    <div class="navi-link">
                                        <div class="navi-icon mr-2">
                                            <i class="flaticon-pie-chart-1 text-info"></i>
                                        </div>
                                        <div class="navi-text">
                                            <div class="font-weight-bold">New user feedback received</div>
                                            <div class="text-muted">8 hrs ago</div>
                                        </div>
                                    </div>
                                </a>
                                <!--end::Item-->
                                <!--begin::Item-->
                                <a href="#" class="navi-item">
                                    <div class="navi-link">
                                        <div class="navi-icon mr-2">
                                            <i class="flaticon2-settings text-success"></i>
                                        </div>
                                        <div class="navi-text">
                                            <div class="font-weight-bold">System reboot has been successfully completed
                                            </div>
                                            <div class="text-muted">12 hrs ago</div>
                                        </div>
                                    </div>
                                </a>
                                <!--end::Item-->
                                <!--begin::Item-->
                                <a href="#" class="navi-item">
                                    <div class="navi-link">
                                        <div class="navi-icon mr-2">
                                            <i class="flaticon-safe-shield-protection text-primary"></i>
                                        </div>
                                        <div class="navi-text">
                                            <div class="font-weight-bold">New order has been placed</div>
                                            <div class="text-muted">15 hrs ago</div>
                                        </div>
                                    </div>
                                </a>
                                <!--end::Item-->
                                <!--begin::Item-->
                                <a href="#" class="navi-item">
                                    <div class="navi-link">
                                        <div class="navi-icon mr-2">
                                            <i class="flaticon2-notification text-primary"></i>
                                        </div>
                                        <div class="navi-text">
                                            <div class="font-weight-bold">Company meeting canceled</div>
                                            <div class="text-muted">19 hrs ago</div>
                                        </div>
                                    </div>
                                </a>
                                <!--end::Item-->
                                <!--begin::Item-->
                                <a href="#" class="navi-item">
                                    <div class="navi-link">
                                        <div class="navi-icon mr-2">
                                            <i class="flaticon2-fax text-success"></i>
                                        </div>
                                        <div class="navi-text">
                                            <div class="font-weight-bold">New report has been received</div>
                                            <div class="text-muted">23 hrs ago</div>
                                        </div>
                                    </div>
                                </a>
                                <!--end::Item-->
                                <!--begin::Item-->
                                <a href="#" class="navi-item">
                                    <div class="navi-link">
                                        <div class="navi-icon mr-2">
                                            <i class="flaticon-download-1 text-danger"></i>
                                        </div>
                                        <div class="navi-text">
                                            <div class="font-weight-bold">Finance report has been generated</div>
                                            <div class="text-muted">25 hrs ago</div>
                                        </div>
                                    </div>
                                </a>
                                <!--end::Item-->
                                <!--begin::Item-->
                                <a href="#" class="navi-item">
                                    <div class="navi-link">
                                        <div class="navi-icon mr-2">
                                            <i class="flaticon-security text-warning"></i>
                                        </div>
                                        <div class="navi-text">
                                            <div class="font-weight-bold">New customer comment recieved</div>
                                            <div class="text-muted">2 days ago</div>
                                        </div>
                                    </div>
                                </a>
                                <!--end::Item-->
                                <!--begin::Item-->
                                <a href="#" class="navi-item">
                                    <div class="navi-link">
                                        <div class="navi-icon mr-2">
                                            <i class="flaticon2-analytics-1 text-success"></i>
                                        </div>
                                        <div class="navi-text">
                                            <div class="font-weight-bold">New customer is registered</div>
                                            <div class="text-muted">3 days ago</div>
                                        </div>
                                    </div>
                                </a>
                                <!--end::Item-->
                            </div>
                            <!--end::Nav-->
                        </div>
                        <!--end::Tabpane-->
                        <!--begin::Tabpane-->
                        <div class="tab-pane" id="topbar_notifications_logs" role="tabpanel">
                            <!--begin::Nav-->
                            <div class="d-flex flex-center text-center text-muted min-h-200px">All caught up!
                                <br />No new notifications.
                            </div>
                            <!--end::Nav-->
                        </div>
                        <!--end::Tabpane-->
                    </div>
                    <!--end::Content-->
                </div>
                <!--end::Dropdown-->
                <div id="kt_quick_cart" class="offcanvas offcanvas-right p-10 offcanvas-off">
                    <!--begin::Header-->
                    .
                    <div class="offcanvas-header d-flex align-items-center justify-content-between pb-7"
                        kt-hidden-height="47" style="">
                        <h4 class="font-weight-bold m-0">Notifikasi</h4>
                        <a href="#" class="btn btn-xs btn-icon btn-light btn-hover-primary"
                            id="kt_quick_cart_close">
                            <i class="ki ki-close icon-xs text-muted"></i>
                        </a>
                    </div>
                    <!--end::Header-->
                </div>
            </div>
            <!--end::Notifications-->
        </div>
        <!--end::Topbar-->
    </div>
    <!--end::Container-->
</div>
