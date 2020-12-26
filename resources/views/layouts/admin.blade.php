<!doctype html>
<html lang="en">


<!-- Mirrored from themesbrand.com/minible/layouts/vertical/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 19 Dec 2020 17:07:18 GMT -->
<head>

    <meta charset="utf-8" />
    <title>Dashboard | Minible - Responsive Bootstrap 4 Admin Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{asset('assets/admin/')}}/images/favicon.ico">

    <!-- Bootstrap Css -->
    <link href="{{asset('assets/admin/')}}/css/bootstrap.min.css"  rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{asset('assets/admin/')}}/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{asset('assets/admin/')}}/css/app.min.css"  rel="stylesheet" type="text/css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/5.8.55/css/materialdesignicons.min.css"  rel="stylesheet" type="text/css" />
    @yield('css')
</head>


<body>

<!-- <body data-layout="horizontal" data-topbar="colored"> -->

<!-- Begin page -->
<div id="layout-wrapper">


    <header id="page-topbar">
        <div class="navbar-header">
            <div class="d-flex">
                <!-- LOGO -->
                <div class="navbar-brand-box">
                    <a href="index.html" class="logo logo-dark">
                                <span class="logo-sm">
                                    <img src="{{asset('assets/admin/')}}/images/logo-sm.png" alt="" height="22">
                                </span>
                        <span class="logo-lg">
                                    <img src="{{asset('assets/admin/')}}/images/logo-dark.png" alt="" height="20">
                                </span>
                    </a>

                    <a href="index.html" class="logo logo-light">
                                <span class="logo-sm">
                                    <img src="{{asset('assets/admin/')}}/images/logo-sm.png" alt="" height="22">
                                </span>
                        <span class="logo-lg">
                                    <img src="{{asset('assets/admin/')}}/images/logo-light.png" alt="" height="20">
                                </span>
                    </a>
                </div>

                <button type="button" class="btn btn-sm px-3 font-size-16 header-item waves-effect vertical-menu-btn">
                    <i class="fa fa-fw fa-bars"></i>
                </button>

                <!-- App Search-->

            </div>

            <div class="d-flex">




                <div class="dropdown d-inline-block">
                    <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img class="rounded-circle header-profile-user" src="{{asset('assets/admin/')}}/images/users/avatar-4.jpg"
                             alt="Header Avatar">
                        <span class="d-none d-xl-inline-block ml-1 font-weight-medium font-size-15">{{Auth::user()->name}}</span>
                        <i class="uil-angle-down d-none d-xl-inline-block font-size-15"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-right">
                        <!-- item-->
                        <a class="dropdown-item" href="#"><i class="uil uil-user-circle font-size-18 align-middle text-muted mr-1"></i> <span class="align-middle">View Profile</span></a>
                        <a class="dropdown-item" href="#"><i class="uil uil-wallet font-size-18 align-middle mr-1 text-muted"></i> <span class="align-middle">My Wallet</span></a>
                        <a class="dropdown-item d-block" href="#"><i class="uil uil-cog font-size-18 align-middle mr-1 text-muted"></i> <span class="align-middle">Settings</span> <span class="badge badge-soft-success badge-pill mt-1 ml-2">03</span></a>
                        <a class="dropdown-item" href="#"><i class="uil uil-lock-alt font-size-18 align-middle mr-1 text-muted"></i> <span class="align-middle">Lock screen</span></a>
                        <a class="dropdown-item" href="#"><i class="uil uil-sign-out-alt font-size-18 align-middle mr-1 text-muted"></i> <span class="align-middle">Sign out</span></a>
                    </div>
                </div>



            </div>
        </div>
    </header>
    <!-- ========== Left Sidebar Start ========== -->
    <div class="vertical-menu">

        <!-- LOGO -->
        <div class="navbar-brand-box">
            <a href="index.html" class="logo logo-dark">
                        <span class="logo-sm">
                            <img src="{{asset('assets/admin/')}}/images/logo-sm.png" alt="" height="22">
                        </span>
                <span class="logo-lg">
                            <img src="{{asset('assets/admin/')}}/images/logo-dark.png" alt="" height="20">
                        </span>
            </a>

            <a href="index.html" class="logo logo-light">
                        <span class="logo-sm">
                            <img src="{{asset('assets/admin/')}}/images/logo-sm.png" alt="" height="22">
                        </span>
                <span class="logo-lg">
                            <img src="{{asset('assets/admin/')}}/images/logo-light.png" alt="" height="20">
                        </span>
            </a>
        </div>

        <button type="button" class="btn btn-sm px-3 font-size-16 header-item waves-effect vertical-menu-btn">
            <i class="fa fa-fw fa-bars"></i>
        </button>

        <div data-simplebar class="sidebar-menu-scroll">

            <!--- Sidemenu -->
            <div id="sidebar-menu">
                <!-- Left Menu Start -->
                <ul class="metismenu list-unstyled" id="side-menu">
                    <li class="menu-title">Menu</li>

                    <li>
                        <a href="{{route('admin.dashboard')}}">
                            <i class="uil-home-alt"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('admin.general.settings')}}">
                            <i class="uil-home-alt"></i>
                            <span>General Settings</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{route('admin.survey.question')}}">
                            <i class="uil-home-alt"></i>
                            <span>Survey Question</span>
                        </a>
                    </li>

                    <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <i class="uil-window-section"></i>
                            <span>Users</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            <li><a href="{{route('admin.active.users')}}">Active Users</a></li>
                            <li><a href="{{route('admin.inactive.users')}}">In-Active Users</a></li>
                        </ul>
                    </li>


                    <li>
                        <a href="{{route('admin.user.pin')}}">
                            <i class="uil-home-alt"></i>
                            <span>User Pin</span>
                        </a>
                    </li>



                </ul>
            </div>
            <!-- Sidebar -->
        </div>
    </div>
    <!-- Left Sidebar End -->



    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">

                @yield('admin')

            </div> <!-- container-fluid -->
        </div>
        <!-- End Page-content -->


        <footer class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <script>document.write(new Date().getFullYear())</script> © Minible.
                    </div>
                    <div class="col-sm-6">
                        <div class="text-sm-right d-none d-sm-block">
                            Crafted with <i class="mdi mdi-heart text-danger"></i> by <a href="https://themesbrand.com/" target="_blank" class="text-reset">Themesbrand</a>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>
    <!-- end main content-->

</div>
<!-- END layout-wrapper -->


<!-- Right bar overlay-->
<div class="rightbar-overlay"></div>

<!-- JAVASCRIPT -->
<script src="{{asset('assets/admin/')}}/libs/jquery/jquery.min.js"></script>
<script src="{{asset('assets/admin/')}}/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="{{asset('assets/admin/')}}/libs/metismenu/metisMenu.min.js"></script>
<script src="{{asset('assets/admin/')}}/libs/simplebar/simplebar.min.js"></script>
<script src="{{asset('assets/admin/')}}/libs/node-waves/waves.min.js"></script>
<script src="{{asset('assets/admin/')}}/libs/waypoints/lib/jquery.waypoints.min.js"></script>
<script src="{{asset('assets/admin/')}}/libs/jquery.counterup/jquery.counterup.min.js"></script>

<!-- apexcharts -->

<script src="{{asset('assets/admin/')}}/js/app.js"></script>


@yield('js')

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
@include('layouts.message')

</body>


<!-- Mirrored from themesbrand.com/minible/layouts/vertical/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 19 Dec 2020 17:09:22 GMT -->
</html>
