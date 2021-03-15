
<!doctype html>
<html lang="en">
<head>
        
        <meta charset="utf-8" />
        <title>@yield('title')</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" />
        <meta name="author" />
        @include('admin.partials.css')
        @yield('css')
    </head>
    <body data-sidebar="colored">
        <div id="preloader">
            <div id="status">
                <div class="spinner-chase">
                    <div class="chase-dot"></div>
                    <div class="chase-dot"></div>
                    <div class="chase-dot"></div>
                    <div class="chase-dot"></div>
                    <div class="chase-dot"></div>
                    <div class="chase-dot"></div>
                </div>
            </div>
        </div>
        <div id="layout-wrapper">
            @include('admin.partials.header')
            <div class="vertical-menu">
                <div data-simplebar class="h-100">
                    <div id="sidebar-menu">
                        <ul class="metismenu list-unstyled" id="side-menu">
                            <li class="menu-title" key="t-menu">Navigation</li>
                            <li>
                                <a href="{{route('dashboard.index')}}" class="waves-effect">
                                    <i class="bx bx-home-circle"></i>
                                    <span key="t-dashboards">Dashboard</span>
                                </a>
                            </li>
                            <li class="menu-title" key="t-menu">Manajemen</li>
                            <li>
                                <a href="javascript: void(0);" class="has-arrow waves-effect">
                                    <i class="bx bx-store-alt"></i>
                                    <span key="t-crypto">Outlet</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li><a href="{{route('outlet.create')}}" key="t-wallet">Add New Outlet</a></li>
                                    <li><a href="{{route('outlet.index')}}" key="t-buy">List Outlet</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript: void(0);" class="has-arrow waves-effect">
                                    <i class="bx bx-group"></i>
                                    <span key="t-crypto">Member</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li><a href="{{route('member.create')}}" key="t-wallet">Add New Member</a></li>
                                    <li><a href="{{route('member.index')}}" key="t-buy">List Member</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript: void(0);" class="has-arrow waves-effect">
                                    <i class="bx bx-book-content"></i>
                                    <span key="t-crypto">Paket</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li><a href="{{route('paket.create')}}" key="t-wallet">Add New Paket</a></li>
                                    <li><a href="{{route('paket.index')}}" key="t-buy">List Paket</a></li>
                                </ul>
                            </li>
                            <li class="menu-title">Navigation</li>
                            
                            <li>
                                <a href="javascript: void(0);" class="has-arrow waves-effect">
                                    <i class="bx bx-cart-alt"></i>
                                    <span key="t-crypto">Transaction</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li><a href="{{route('transaction.create')}}" key="t-wallet">Add New Order</a></li>
                                    <li><a href="{{route('transaction.index')}}" key="t-buy">Order List</a></li>
                                </ul>
                            </li>
                            <li class="menu-title" key="t-menu">Administrator</li>
                            <li>
                                <a href="javascript: void(0);" class="has-arrow waves-effect">
                                    <i class="bx bx-user"></i>
                                    <span key="t-crypto">Users Management</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li><a href="{{route('cms_users.create')}}" key="t-wallet">Add New User</a></li>
                                    <li><a href="{{route('cms_users.index')}}" key="t-buy">List User</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#" class="waves-effect">
                                    <i class="bx bx-calendar"></i>
                                    <span key="t-transactions">Log Activity</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="main-content">
                @yield('content')
                @include('admin.partials.footer')
            </div>
        </div>
        <div class="rightbar-overlay"></div>
        @include('admin.partials.script')
    </body>
    @stack('script')
</html>
