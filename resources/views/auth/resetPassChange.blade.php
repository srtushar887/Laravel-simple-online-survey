<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from askbootstrap.com/preview/osahanin/light/sign-in.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 19 Dec 2020 14:34:18 GMT -->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" href="{{asset($gn->icon)}}">
    <title>{{$gn->site_name}}</title>

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
                        <a href="{{route('login')}}"><img src="{{asset($gn->logo)}}" style="width: 300px;height: 66px;" alt=""></a>
                        <h5 class="font-weight-bold mt-3">Reset Your Password</h5>
                        @if (Session::has('pass_error'))
                            <p class="text-danger">{{Session::get('pass_error')}}</p>
                        @endif
                    </div>
                    <form action="{{route('user.reset.pass.change.save')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label class="mb-1">New Password</label>
                            <div class="position-relative icon-form-control">
                                <i class="feather-user position-absolute"></i>
                                <input type="password" name="npass" class="form-control">
                                <input type="hidden" name="ver_code_check" value="{{$ver_code}}" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="mb-1">Confirm Password</label>
                            <div class="position-relative icon-form-control">
                                <i class="feather-unlock position-absolute"></i>
                                <input type="password" name="cpass" class="form-control">
                            </div>
                        </div>
                        <button class="btn btn-primary btn-block text-uppercase" type="submit"> Submit </button>

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
