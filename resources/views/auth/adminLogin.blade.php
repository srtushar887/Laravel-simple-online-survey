<!doctype html>
<html lang="en">


<!-- Mirrored from themesbrand.com/minible/layouts/vertical/auth-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 19 Dec 2020 17:10:32 GMT -->
<head>

    <meta charset="utf-8" />
    <title>{{$gn->site_name}} | Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{asset($gn->icon)}}">

    <!-- Bootstrap Css -->
    <link href="{{asset('assets/admin/')}}/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{asset('assets/admin/')}}/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{asset('assets/admin/')}}/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />

</head>

<body class="authentication-bg">

<div class="home-btn d-none d-sm-block">
    <a href="index.html" class="text-dark"><i class="mdi mdi-home-variant h2"></i></a>
</div>
<div class="account-pages my-5 pt-sm-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="text-center">
                    <a href="{{route('admin.login')}}" class="mb-5 d-block auth-logo">
                        <img src="{{asset($gn->logo)}}" alt="" style="width: 25%;height: 66px;" class="logo logo-dark">
                        <img src="{{asset('assets/admin/')}}/images/logo-light.png" alt="" height="22" class="logo logo-light">
                    </a>
                </div>
            </div>
        </div>
        <div class="row align-items-center justify-content-center">
            <div class="col-md-8 col-lg-6 col-xl-5">
                <div class="card">

                    <div class="card-body p-4">
                        <div class="text-center mt-2">
                            <h5 class="text-primary">Welcome Back !</h5>
                            <p class="text-muted">Sign in to continue to Minible.</p>
                        </div>
                        <div class="p-2 mt-4">
                            <form action="{{route('admin.login.submit')}}" method="post">
                                @csrf

                                <div class="form-group">
                                    <label for="username">Username</label>
                                    <input type="text" name="email" class="form-control" id="username" placeholder="Enter username">
                                </div>

                                <div class="form-group">
                                    <div class="float-right">
                                        <a href="auth-recoverpw.html" class="text-muted">Forgot password?</a>
                                    </div>
                                    <label for="userpassword">Password</label>
                                    <input type="password" name="password" class="form-control" id="userpassword" placeholder="Enter password">
                                </div>


                                <div class="mt-3 text-right">
                                    <button class="btn btn-primary w-sm waves-effect waves-light" type="submit">Log In</button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>

                <div class="mt-5 text-center">
                    <?php
                        $date = \Carbon\Carbon::now()->format('Y');
                    ?>
                    <p>© {{$date}} {{$gn->site_name}}. DEVELOPED BY <i class="fas fa-heart"></i> SR TUSHER</p>
                </div>

            </div>
        </div>
        <!-- end row -->
    </div>
    <!-- end container -->
</div>

<!-- JAVASCRIPT -->
<script src="{{asset('assets/admin/')}}/libs/jquery/jquery.min.js"></script>
<script src="{{asset('assets/admin/')}}/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="{{asset('assets/admin/')}}/libs/metismenu/metisMenu.min.js"></script>
<script src="{{asset('assets/admin/')}}/libs/simplebar/simplebar.min.js"></script>
<script src="{{asset('assets/admin/')}}/libs/node-waves/waves.min.js"></script>
<script src="{{asset('assets/admin/')}}/libs/waypoints/lib/jquery.waypoints.min.js"></script>
<script src="{{asset('assets/admin/')}}/libs/jquery.counterup/jquery.counterup.min.js"></script>

<script src="{{asset('assets/admin/')}}/js/app.js"></script>

</body>

<!-- Mirrored from themesbrand.com/minible/layouts/vertical/auth-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 19 Dec 2020 17:10:32 GMT -->
</html>
