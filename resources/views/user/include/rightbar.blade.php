<aside class="col col-xl-3 order-xl-3 col-lg-6 order-lg-3 col-md-6 col-sm-6 col-12">


    <div class="box shadow-sm mb-3 rounded bg-white ads-box text-center overflow-hidden">
        @if (Auth::user()->account_type == 1)
        <div class="p-3 border-bottom">
            <h6 class="font-weight-bold text-gold">PLEASE ACTIVE YOUR ACCOUNT</h6>
        </div>
        <div class="p-3">
            <a href="{{route('user.account.verify')}}">

                <button type="button" class="btn btn-outline-gold pl-4 pr-4"> ACTIVE NOW </button>
            </a>

        </div>
        @else
            <div class="p-3 border-bottom">
                <h6 class="font-weight-bold text-gold">ACCOUNT HAS BEEN VERIFIED</h6>
            </div>
            <div class="p-3">
                <button type="button" class="btn btn-outline-gold pl-4 pr-4"> VERIFIED </button>

            </div>
        @endif
    </div>
    <div class="box shadow-sm border rounded bg-white mb-3">
        <div class="box-title border-bottom p-3">
            <h6 class="m-0">Your Recent Post
            </h6>
        </div>
        <div class="box-body p-3">
            <a href="job-profile.html">
                <div class="shadow-sm border rounded bg-white job-item mb-3">
                    <div class="d-flex align-items-center p-3 job-item-header">
                        <div class="overflow-hidden mr-2">
                            <h6 class="font-weight-bold text-dark mb-0 text-truncate">Product Director</h6>
                            <div class="text-truncate text-primary">Spotify Inc.</div>
                            <div class="small text-gray-500"><i class="feather-map-pin"></i> India, Punjab</div>
                        </div>
                        <img class="img-fluid ml-auto" src="{{asset('assets/frontend/')}}/img/l3.png" alt="">
                    </div>
                    <div class="d-flex align-items-center p-3 border-top border-bottom job-item-body">
                        <div class="overlap-rounded-circle">
                            <img class="rounded-circle shadow-sm" data-toggle="tooltip" data-placement="top" title="" src="{{asset('assets/frontend/')}}/img/p9.png" alt="" data-original-title="Sophia Lee">
                            <img class="rounded-circle shadow-sm" data-toggle="tooltip" data-placement="top" title="" src="{{asset('assets/frontend/')}}/img/p10.png" alt="" data-original-title="John Doe">
                            <img class="rounded-circle shadow-sm" data-toggle="tooltip" data-placement="top" title="" src="{{asset('assets/frontend/')}}/img/p11.png" alt="" data-original-title="Julia Cox">
                            <img class="rounded-circle shadow-sm" data-toggle="tooltip" data-placement="top" title="" src="{{asset('assets/frontend/')}}/img/p12.png" alt="" data-original-title="Robert Cook">
                        </div>
                        <span class="font-weight-bold text-muted">18 connections</span>
                    </div>
                    <div class="p-3 job-item-footer">
                        <small class="text-gray-500"><i class="feather-clock"></i> Posted 3 Days ago</small>
                    </div>
                </div>
            </a>
        </div>
    </div>
</aside>
