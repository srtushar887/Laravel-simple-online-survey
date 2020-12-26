<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from askbootstrap.com/preview/osahanin/light/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 19 Dec 2020 14:32:47 GMT -->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" href="img/fav.png">
    <title>{{$gn->site_name}}</title>

    <link rel="stylesheet" type="text/css" href="{{asset('assets/frontend/')}}/vendor/slick/slick.min.css" />
    <link rel="stylesheet" type="text/css" href="{{asset('assets/frontend/')}}/vendor/slick/slick-theme.min.css" />

    <link href="{{asset('assets/frontend/')}}/vendor/icons/feather.css" rel="stylesheet" type="text/css">

    <link href="{{asset('assets/frontend/')}}/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <link href="{{asset('assets/frontend/')}}/css/style.css" rel="stylesheet">
    @livewireStyles


    <script src="https://kit.fontawesome.com/ce870e4a39.js" crossorigin="anonymous"></script>

</head>
<body>

<nav class="navbar navbar-expand navbar-dark bg-dark osahan-nav-top p-0">
    <div class="container" style="max-width: 100%">
        <a class="navbar-brand mr-2" href="{{route('dashboard')}}"><img src="{{asset($gn->logo)}}" style="width: 50px;" alt="">
        </a>

        <ul class="navbar-nav ml-auto d-flex align-items-center">

            <li class="nav-item">
                <a class="nav-link" href="{{route('dashboard')}}"><i class="fas fa-tachometer-alt" style="padding: 5px;"></i> <span class="d-none d-lg-inline">Home</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('user.mobile.recharge')}}"><i class="fas fa-mobile-alt" style="padding: 5px;"></i><span class="d-none d-lg-inline">Mobile Recharge</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('user.withdraw.money')}}"><i class="fas fa-money-check-alt" style="padding: 5px;"></i><span class="d-none d-lg-inline">Withdraw Money</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('user.transfer.money')}}"><i class="fas fa-money-bill-wave" style="padding: 5px;"></i><span class="d-none d-lg-inline">Transfer Money</span></a>
            </li>
            <li class="nav-item dropdown mr-2">
                <a class="nav-link dropdown-toggle pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="feather-file-text mr-2"></i><span class="d-none d-lg-inline">Transactions</span>
                </a>

                <div class="dropdown-menu dropdown-menu-right shadow-sm">
                    <a class="dropdown-item" href="{{route('user.earning.history')}}"><i class="fab fa-stack-exchange"></i> Earning History</a>
                    <a class="dropdown-item" href="{{route('user.withdraw.history')}}"><i class="fab fa-stack-exchange"></i> Withdraw History</a>
                    <a class="dropdown-item" href="{{route('user.sendmoney.history')}}"><i class="fab fa-stack-exchange"></i> Send Money History</a>
                    <a class="dropdown-item" href="{{route('user.mobile.recharge.history')}}"><i class="fab fa-stack-exchange"></i> Mobile Recharge History</a>
                </div>
            </li>


            <li class="nav-item dropdown no-arrow ml-1 osahan-profile-dropdown">
                <a class="nav-link dropdown-toggle pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    @if (!empty(Auth::user()->profile_image) && file_exists(Auth::user()->profile_image))
                    <img class="img-profile rounded-circle" src="{{asset(Auth::user()->profile_image)}}">
                    @else
                    <img class="img-profile rounded-circle" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSc4gAuboBQ2Y-6kl84wtIoK8e18cFsmxvIag&usqp=CAU">
                    @endif
                </a>

                <div class="dropdown-menu dropdown-menu-right shadow-sm">
                    <div class="p-3 d-flex align-items-center">
                        <div class="dropdown-list-image mr-3">
                            @if (!empty(Auth::user()->profile_image) && file_exists(Auth::user()->profile_image))
                            <img class="rounded-circle" src="{{asset(Auth::user()->profile_image)}}" alt="">
                            @else
                            <img class="rounded-circle" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSc4gAuboBQ2Y-6kl84wtIoK8e18cFsmxvIag&usqp=CAU" alt="">
                            @endif
                        </div>
                        <div class="font-weight-bold">
                            <div class="text-truncate">{{Auth::user()->name}}</div>
                        </div>
                    </div>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{route('user.edit.profile')}}"><i class="feather-user mr-1"></i> Edit Profile</a>
                    <a class="dropdown-item" href="{{route('user.change.password')}}"><i class="fas fa-lock"></i> Change Password</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><i class="feather-log-out mr-1"></i> Logout</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </li>
        </ul>
    </div>
</nav>
<div class="py-4">
    <div class="container" style="max-width: 100%">
        <div class="row">

            @yield('user')
        </div>
    </div>
</div>

<script src="{{asset('assets/frontend/')}}/vendor/jquery/jquery.min.js" ></script>
<script src="{{asset('assets/frontend/')}}/vendor/bootstrap/js/bootstrap.bundle.min.js" type="1fb848bc3a56da8eeebef2ff-text/javascript"></script>

<script type="1fb848bc3a56da8eeebef2ff-text/javascript" src="{{asset('assets/frontend/')}}/vendor/slick/slick.min.js"></script>

<script src="{{asset('assets/frontend/')}}/js/osahan.js" type="1fb848bc3a56da8eeebef2ff-text/javascript"></script>
<script src="https://ajax.cloudflare.com/cdn-cgi/scripts/7089c43e/cloudflare-static/rocket-loader.min.js" data-cf-settings="1fb848bc3a56da8eeebef2ff-|49" defer=""></script>
<script defer src="https://static.cloudflareinsights.com/beacon.min.js" data-cf-beacon='{"rayId":"6041d5b50c811900","r":1,"version":"2020.12.1","si":10}'></script>

@livewireScripts

@yield('js')

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
@include('layouts.message')
</body>

<!-- Mirrored from askbootstrap.com/preview/osahanin/light/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 19 Dec 2020 14:33:41 GMT -->
</html>
