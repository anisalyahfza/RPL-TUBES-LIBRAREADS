<div class="aside aside-left aside-fixed d-flex flex-column flex-row-auto" id="kt_aside">
    <!--begin::Brand-->
    <div class="brand flex-column-auto" id="kt_brand">
        <!--begin::Logo-->
        <span class="brand-logo mt-6">
            <img src="{{ asset('assets/images/logo-sidebar.png') }}" class="max-h-40px" alt="" />
        </span>
        <!--end::Logo-->
        <!--begin::Toggle-->
        <button class="brand-toggle btn btn-sm px-0" id="kt_aside_toggle">
            <span class="svg-icon svg-icon svg-icon-xl">
                <!--begin::Svg Icon | path:assets/media/svg/icons/Navigation/Angle-double-left.svg-->
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                    height="24px" viewBox="0 0 24 24" version="1.1">
                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <polygon points="0 0 24 0 24 24 0 24" />
                        <path
                            d="M5.29288961,6.70710318 C4.90236532,6.31657888 4.90236532,5.68341391 5.29288961,5.29288961 C5.68341391,4.90236532 6.31657888,4.90236532 6.70710318,5.29288961 L12.7071032,11.2928896 C13.0856821,11.6714686 13.0989277,12.281055 12.7371505,12.675721 L7.23715054,18.675721 C6.86395813,19.08284 6.23139076,19.1103429 5.82427177,18.7371505 C5.41715278,18.3639581 5.38964985,17.7313908 5.76284226,17.3242718 L10.6158586,12.0300721 L5.29288961,6.70710318 Z"
                            fill="#000000" fill-rule="nonzero"
                            transform="translate(8.999997, 11.999999) scale(-1, 1) translate(-8.999997, -11.999999)" />
                        <path
                            d="M10.7071009,15.7071068 C10.3165766,16.0976311 9.68341162,16.0976311 9.29288733,15.7071068 C8.90236304,15.3165825 8.90236304,14.6834175 9.29288733,14.2928932 L15.2928873,8.29289322 C15.6714663,7.91431428 16.2810527,7.90106866 16.6757187,8.26284586 L22.6757187,13.7628459 C23.0828377,14.1360383 23.1103407,14.7686056 22.7371482,15.1757246 C22.3639558,15.5828436 21.7313885,15.6103465 21.3242695,15.2371541 L16.0300699,10.3841378 L10.7071009,15.7071068 Z"
                            fill="#000000" fill-rule="nonzero" opacity="0.3"
                            transform="translate(15.999997, 11.999999) scale(-1, 1) rotate(-270.000000) translate(-15.999997, -11.999999)" />
                    </g>
                </svg>
                <!--end::Svg Icon-->
            </span>
        </button>
        <!--end::Toolbar-->
    </div>
    <!--end::Brand-->
    <!--begin::Aside Menu-->
    <div class="aside-menu-wrapper flex-column-fluid" id="kt_aside_menu_wrapper">
        <!--begin::Menu Container-->
        <div id="kt_aside_menu" class="aside-menu my-4" data-menu-vertical="1" data-menu-scroll="1"
            data-menu-dropdown-timeout="500">
            <ul class="menu-nav">
                <li class="menu-section">
                    <h4 class="menu-text font-weight-boldest">GENRE</h4>
                    <i class="menu-icon ki ki-bold-more-hor icon-md"></i>
                </li>
                <li class="menu-item menu-item-submenu menu-item-open" aria-haspopup="true" data-menu-toggle="hover">
                    <p class="menu-link">
                        <span class="menu-text font-weight-boldest">Fiction</span>
                    </p>
                    <div class="menu-submenu">
                        <i class="menu-arrow"></i>
                        <ul class="menu-subnav">
                            <li class="menu-item menu-item-parent" aria-haspopup="true">
                                <span class="menu-link">
                                    <span class="menu-text">Fiction</span>
                                </span>
                            </li>
                            <li class="menu-item {{ Route::currentRouteNamed('member.dashboard.category') && Route::current()->parameter('category') == 'Science+Fiction' ? 'menu-item-active' : '' }}"
                                aria-haspopup="true">
                                <a href="{{ route('member.dashboard.category', ['category' => urlencode('Science Fiction')]) }}"
                                    class="menu-link">
                                    <span class="menu-text">Science Fiction</span>
                                </a>
                            </li>
                            <li class="menu-item {{ Route::currentRouteNamed('member.dashboard.category') && Route::current()->parameter('category') == 'Horror+Fiction' ? 'menu-item-active' : '' }}"
                                aria-haspopup="true">
                                <a href="{{ route('member.dashboard.category', ['category' => urlencode('Horror Fiction')]) }}"
                                    class="menu-link">
                                    <span class="menu-text">Horror Fiction</span>
                                </a>
                            </li>
                            <li class="menu-item {{ Route::currentRouteNamed('member.dashboard.category') && Route::current()->parameter('category') == 'Romance+Fiction' ? 'menu-item-active' : '' }}"
                                aria-haspopup="true">
                                <a href="{{ route('member.dashboard.category', ['category' => urlencode('Romance Fiction')]) }}"
                                    class="menu-link">
                                    <span class="menu-text">Romance Fiction</span>
                                </a>
                            </li>
                            <li class="menu-item {{ Route::currentRouteNamed('member.dashboard.category') && Route::current()->parameter('category') == 'Action+Fiction' ? 'menu-item-active' : '' }}"
                                aria-haspopup="true">
                                <a href="{{ route('member.dashboard.category', ['category' => urlencode('Action Fiction')]) }}"
                                    class="menu-link">
                                    <span class="menu-text">Action Fiction</span>
                                </a>
                            </li>
                            <li class="menu-item {{ Route::currentRouteNamed('member.dashboard.category') && Route::current()->parameter('category') == 'Fantasy+Fiction' ? 'menu-item-active' : '' }}"
                                aria-haspopup="true">
                                <a href="{{ route('member.dashboard.category', ['category' => urlencode('Fantasy Fiction')]) }}"
                                    class="menu-link">
                                    <span class="menu-text">Fantasy Fiction</span>
                                </a>
                            </li>
                            <li class="menu-item {{ Route::currentRouteNamed('member.dashboard.category') && Route::current()->parameter('category') == 'Crime+Fiction' ? 'menu-item-active' : '' }}"
                                aria-haspopup="true">
                                <a href="{{ route('member.dashboard.category', ['category' => urlencode('Crime Fiction')]) }}"
                                    class="menu-link">
                                    <span class="menu-text">Crime Fiction</span>
                                </a>
                            </li>

                        </ul>
                    </div>
                </li>
                <li class="menu-item menu-item-submenu menu-item-open" aria-haspopup="true" data-menu-toggle="hover">
                    <p class="menu-link">
                        <span class="menu-text font-weight-boldest">Non Fiction</span>
                    </p>
                    <div class="menu-submenu">
                        <ul class="menu-subnav">
                            <li class="menu-item menu-item-parent" aria-haspopup="true">
                                <span class="menu-link">
                                    <span class="menu-text">Non Fiction</span>
                                </span>
                            </li>
                            <li class="menu-item {{ Route::currentRouteNamed('member.dashboard.category') && Route::current()->parameter('category') == 'History' ? 'menu-item-active' : '' }}"
                                aria-haspopup="true">
                                <a href="{{ route('member.dashboard.category', ['category' => 'History']) }}"
                                    class="menu-link">
                                    <span class="menu-text">History</span>
                                </a>
                            </li>
                            <li class="menu-item {{ Route::currentRouteNamed('member.dashboard.category') && Route::current()->parameter('category') == 'Biography' ? 'menu-item-active' : '' }}"
                                aria-haspopup="true">
                                <a href="{{ route('member.dashboard.category', ['category' => 'Biography']) }}"
                                    class="menu-link">
                                    <span class="menu-text">Biography</span>
                                </a>
                            </li>
                            <li class="menu-item {{ Route::currentRouteNamed('member.dashboard.category') && Route::current()->parameter('category') == 'Autobiography' ? 'menu-item-active' : '' }}"
                                aria-haspopup="true">
                                <a href="{{ route('member.dashboard.category', ['category' => 'Autobiography']) }}"
                                    class="menu-link">
                                    <span class="menu-text">Autobiography</span>
                                </a>
                            </li>
                            <li class="menu-item {{ Route::currentRouteNamed('member.dashboard.category') && Route::current()->parameter('category') == 'Cookbook' ? 'menu-item-active' : '' }}"
                                aria-haspopup="true">
                                <a href="{{ route('member.dashboard.category', ['category' => 'Cookbook']) }}"
                                    class="menu-link">
                                    <span class="menu-text">Cookbook</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
        <!--end::Menu Container-->
    </div>
    <!--end::Aside Menu-->
</div>
