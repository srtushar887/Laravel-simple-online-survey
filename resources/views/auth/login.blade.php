<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from askbootstrap.com/preview/osahanin/light/sign-in.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 19 Dec 2020 14:34:18 GMT -->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" href="img/fav.png">
    <title>Osahanin - Job Portal & Social Network HTML Template</title>

    <link rel="stylesheet" type="text/css" href="{{asset('assets/frontend/')}}/vendor/slick/slick.min.css" />
    <link rel="stylesheet" type="text/css" href="{{asset('assets/frontend/')}}/vendor/slick/slick-theme.min.css" />

    <link href="{{asset('assets/frontend/')}}/vendor/icons/feather.css" rel="stylesheet" type="text/css">

    <link href="{{asset('assets/frontend/')}}/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <link href="{{asset('assets/frontend/')}}/css/style.css" rel="stylesheet">
</head>
<body>
<div class="bg-white">
    <div class="container">
        <div class="row justify-content-center align-items-center d-flex vh-100">
            <div class="col-md-4 mx-auto">
                <div class="osahan-login py-4">
                    <div class="text-center mb-4">
                        <a href="{{route('login')}}"><img src="{{asset('assets/frontend/')}}/img/logo.svg" alt=""></a>
                        <h5 class="font-weight-bold mt-3">Welcome Back</h5>
                        <p class="text-muted">Don't miss your next opportunity. Sign in to stay updated on your professional world.</p>
                    </div>
                    <form action="{{route('user.login')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label class="mb-1">Email or Phone</label>
                            <div class="position-relative icon-form-control">
                                <i class="feather-user position-absolute"></i>
                                <input type="email" name="email" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="mb-1">Password</label>
                            <div class="position-relative icon-form-control">
                                <i class="feather-unlock position-absolute"></i>
                                <input type="password" name="password" class="form-control">
                            </div>
                        </div>
                        <button class="btn btn-primary btn-block text-uppercase" type="submit"> Sign in </button>
                        <div class="text-center mt-3 border-bottom pb-3">
                            <p class="small text-muted">Or login with</p>
                            <div class="row">
                                <div class="col-6">
                                    <button type="button" class="btn btn-sm btn-outline-instagram btn-block"><i class="feather-instagram"></i> Instagram</button>
                                </div>
                                <div class="col-6">
                                    <button type="button" class="btn btn-sm btn-outline-linkedin btn-block"><i class="feather-linkedin"></i> Linkedin</button>
                                </div>
                            </div>
                        </div>
                        <div class="py-3 d-flex align-item-center">
                            <a href="forgot-password.html">Forgot password?</a>
                            <span class="ml-auto"> New an account? <a class="font-weight-bold" href="{{route('register')}}">Join now</a></span>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="{{asset('assets/frontend/')}}/vendor/jquery/jquery.min.js" type="ec66f70a5e7323ea4f286291-text/javascript"></script>
<script src="{{asset('assets/frontend/')}}/vendor/bootstrap/js/bootstrap.bundle.min.js" type="ec66f70a5e7323ea4f286291-text/javascript"></script>

<script type="ec66f70a5e7323ea4f286291-text/javascript" src="{{asset('assets/frontend/')}}/vendor/slick/slick.min.js"></script>

<script src="{{asset('assets/frontend/')}}/js/osahan.js" type="ec66f70a5e7323ea4f286291-text/javascript"></script>
<script src="https://ajax.cloudflare.com/cdn-cgi/scripts/7089c43e/cloudflare-static/rocket-loader.min.js" data-cf-settings="ec66f70a5e7323ea4f286291-|49" defer=""></script></body>

<!-- Mirrored from askbootstrap.com/preview/osahanin/light/sign-in.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 19 Dec 2020 14:34:19 GMT -->
</html>
