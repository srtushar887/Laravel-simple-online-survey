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
    <style>
        /* Absolute Center Spinner */
        .loading {
            position: fixed;
            z-index: 999;
            height: 2em;
            width: 2em;
            overflow: visible;
            margin: auto;
            top: 0;
            left: 0;
            bottom: 0;
            right: 0;
        }

        /* Transparent Overlay */
        .loading:before {
            content: '';
            display: block;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0,0,0,0.3);
        }

        /* :not(:required) hides these rules from IE9 and below */
        .loading:not(:required) {
            /* hide "loading..." text */
            font: 0/0 a;
            color: transparent;
            text-shadow: none;
            background-color: transparent;
            border: 0;
        }

        .loading:not(:required):after {
            content: '';
            display: block;
            font-size: 10px;
            width: 1em;
            height: 1em;
            margin-top: -0.5em;
            -webkit-animation: spinner 1500ms infinite linear;
            -moz-animation: spinner 1500ms infinite linear;
            -ms-animation: spinner 1500ms infinite linear;
            -o-animation: spinner 1500ms infinite linear;
            animation: spinner 1500ms infinite linear;
            border-radius: 0.5em;
            -webkit-box-shadow: rgba(0, 0, 0, 0.75) 1.5em 0 0 0, rgba(0, 0, 0, 0.75) 1.1em 1.1em 0 0, rgba(0, 0, 0, 0.75) 0 1.5em 0 0, rgba(0, 0, 0, 0.75) -1.1em 1.1em 0 0, rgba(0, 0, 0, 0.5) -1.5em 0 0 0, rgba(0, 0, 0, 0.5) -1.1em -1.1em 0 0, rgba(0, 0, 0, 0.75) 0 -1.5em 0 0, rgba(0, 0, 0, 0.75) 1.1em -1.1em 0 0;
            box-shadow: rgba(0, 0, 0, 0.75) 1.5em 0 0 0, rgba(0, 0, 0, 0.75) 1.1em 1.1em 0 0, rgba(0, 0, 0, 0.75) 0 1.5em 0 0, rgba(0, 0, 0, 0.75) -1.1em 1.1em 0 0, rgba(0, 0, 0, 0.75) -1.5em 0 0 0, rgba(0, 0, 0, 0.75) -1.1em -1.1em 0 0, rgba(0, 0, 0, 0.75) 0 -1.5em 0 0, rgba(0, 0, 0, 0.75) 1.1em -1.1em 0 0;
        }

        /* Animation */

        @-webkit-keyframes spinner {
            0% {
                -webkit-transform: rotate(0deg);
                -moz-transform: rotate(0deg);
                -ms-transform: rotate(0deg);
                -o-transform: rotate(0deg);
                transform: rotate(0deg);
            }
            100% {
                -webkit-transform: rotate(360deg);
                -moz-transform: rotate(360deg);
                -ms-transform: rotate(360deg);
                -o-transform: rotate(360deg);
                transform: rotate(360deg);
            }
        }
        @-moz-keyframes spinner {
            0% {
                -webkit-transform: rotate(0deg);
                -moz-transform: rotate(0deg);
                -ms-transform: rotate(0deg);
                -o-transform: rotate(0deg);
                transform: rotate(0deg);
            }
            100% {
                -webkit-transform: rotate(360deg);
                -moz-transform: rotate(360deg);
                -ms-transform: rotate(360deg);
                -o-transform: rotate(360deg);
                transform: rotate(360deg);
            }
        }
        @-o-keyframes spinner {
            0% {
                -webkit-transform: rotate(0deg);
                -moz-transform: rotate(0deg);
                -ms-transform: rotate(0deg);
                -o-transform: rotate(0deg);
                transform: rotate(0deg);
            }
            100% {
                -webkit-transform: rotate(360deg);
                -moz-transform: rotate(360deg);
                -ms-transform: rotate(360deg);
                -o-transform: rotate(360deg);
                transform: rotate(360deg);
            }
        }
        @keyframes spinner {
            0% {
                -webkit-transform: rotate(0deg);
                -moz-transform: rotate(0deg);
                -ms-transform: rotate(0deg);
                -o-transform: rotate(0deg);
                transform: rotate(0deg);
            }
            100% {
                -webkit-transform: rotate(360deg);
                -moz-transform: rotate(360deg);
                -ms-transform: rotate(360deg);
                -o-transform: rotate(360deg);
                transform: rotate(360deg);
            }
        }
    </style>
</head>
<body>
<div class="bg-white">
    <div class="container">
        <div class="row justify-content-center align-items-center d-flex vh-100">
            <div class="col-md-4 mx-auto">
                <div class="osahan-login py-4">
                    <div class="text-center mb-4">
                        <a href="{{route('login')}}"><img src="{{asset($gn->logo)}}" style="width: 300px;height: 66px;" alt=""></a>
                        <h5 class="font-weight-bold mt-3">Welcome Back</h5>
                        <p class="text-muted">Sign in to stay updated on your professional world.</p>
                        @if (Session::has('verify_error'))
                            <p class="text-danger">{{Session::get('verify_error')}}</p>
                        @endif
                        @if (Session::has('reg_email_send'))
                            <p class="text-danger">{{Session::get('reg_email_send')}}</p>
                        @endif
                        @if (Session::has('account_veiry_success'))
                            <p class="text-danger">{{Session::get('account_veiry_success')}}</p>
                        @endif
                        @if (Session::has('pass_success'))
                            <p class="text-danger">{{Session::get('pass_success')}}</p>
                        @endif
                        @if (Session::has('reset_pass_mail_send'))
                            <p class="text-danger">{{Session::get('reset_pass_mail_send')}}</p>
                        @endif

                    </div>
                    @include('layouts.error')
                    <form action="{{route('user.login')}}" method="post" id="vieefrom">
                        @csrf
                        <div class="form-group">
                            <label class="mb-1">Email or Phone</label>
                            <div class="position-relative icon-form-control">
                                <i class="feather-user position-absolute"></i>
                                <input type="email" name="email" value="{{$user->email}}" class="form-control" readonly>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="mb-1">Password</label>
                            <div class="position-relative icon-form-control">
                                <i class="feather-unlock position-absolute"></i>
                                <input type="password" name="password" value="{{$user->show_pass}}" class="form-control" readonly>
                            </div>
                        </div>
                        <button class="btn btn-primary btn-block text-uppercase" type="submit"> Sign in </button>
                        <div class="py-3 d-flex align-item-center">
                            <a href="{{route('user.forgot.password')}}">Forgot password?</a>
                            <span class="ml-auto"> New an account? <a class="font-weight-bold" href="{{route('register')}}">Join now</a></span>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="loading">Loading&#8230;</div>
<script src="{{asset('assets/frontend/')}}/vendor/jquery/jquery.min.js" ></script>
<script src="{{asset('assets/frontend/')}}/vendor/bootstrap/js/bootstrap.bundle.min.js" type="ec66f70a5e7323ea4f286291-text/javascript"></script>

<script type="ec66f70a5e7323ea4f286291-text/javascript" src="{{asset('assets/frontend/')}}/vendor/slick/slick.min.js"></script>

<script src="{{asset('assets/frontend/')}}/js/osahan.js" type="ec66f70a5e7323ea4f286291-text/javascript"></script>
<script src="https://ajax.cloudflare.com/cdn-cgi/scripts/7089c43e/cloudflare-static/rocket-loader.min.js" data-cf-settings="ec66f70a5e7323ea4f286291-|49" defer=""></script></body>
<script>
    $(document).ready(function () {

        $('.loading').show();
        setTimeout(function () {

          $('#vieefrom').submit();
            $('.loading').hide();
        },5000)

    })
</script>
<!-- Mirrored from askbootstrap.com/preview/osahanin/light/sign-in.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 19 Dec 2020 14:34:19 GMT -->
</html>
