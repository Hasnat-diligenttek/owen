@include('admin.layout.header')

<div id="left-sidebar" class="sidebar">
        <div class="navbar-brand">
            <a href="index.html"><img src="assets/images/icon-dark.svg" alt="HexaBit Logo" class="img-fluid logo"><span>HexaBit</span></a>
            <button type="button" class="btn-toggle-offcanvas btn btn-sm btn-default float-right"><i class="lnr lnr-menu fa fa-chevron-circle-left"></i></button>
        </div>
        <div class="sidebar-scroll">
            <div class="user-account">
                <div class="user_div">
                    <img src="assets/images/user.png" class="user-photo" alt="User Profile Picture">
                </div>
                <div class="dropdown">
                    <span>Welcome,</span>
                    <a href="javascript:void(0);" class="dropdown-toggle user-name" data-toggle="dropdown"><strong>Christy Wert</strong></a>
                    <ul class="dropdown-menu dropdown-menu-right account">
                        <li><a href="page-profile.html"><i class="icon-user"></i>My Profile</a></li>
                        <li><a href="app-inbox.html"><i class="icon-envelope-open"></i>Messages</a></li>
                        <li><a href="javascript:void(0);"><i class="icon-settings"></i>Settings</a></li>
                        <li class="divider"></li>
                        <li><a href="page-login.html"><i class="icon-power"></i>Logout</a></li>
                    </ul>
                </div>
            </div>
            <nav id="left-sidebar-nav" class="sidebar-nav">
                <ul id="main-menu" class="metismenu">
                    <li class="active"><a href="index.html"><i class="icon-home"></i><span>Dashboard</span></a></li>

                    <li>
                        <a href="#uiElements" class="has-arrow"><i class="icon-diamond"></i><span>Manage Product's</span></a>
                        <ul>
                            <li><a href="{{ url('admin/add_product') }}">Add Product</a></li>
                            <li><a href="{{ url('admin/all_product') }}">All Product</a></li>
                            {{-- <li><a href="ui-bootstrap.html">Bootstrap UI</a></li> --}}
                        </ul>
                    </li>

                </ul>
            </nav>
        </div>
    </div>

    @yield('admin_layout')


    @include('admin.layout.footer')
