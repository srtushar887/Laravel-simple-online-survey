<aside class="col col-xl-3 order-xl-1 col-lg-6 order-lg-2 col-md-6 col-sm-6 col-12">
    <div class="box mb-3 shadow-sm border rounded bg-white profile-box text-center">
        <div class="py-4 px-3 border-bottom">
            @if (!empty(Auth::user()->profile_image) && file_exists(Auth::user()->profile_image))
                <img src="{{asset(Auth::user()->profile_image)}}" style="height: 150px;width: 150px" class="img-fluid mt-2 rounded-circle" alt="Responsive image">
            @else
                <img src="https://www.slj.com/webfiles/1604461841106/images/default-user.png" style="height: 150px;width: 150px" class="img-fluid mt-2 rounded-circle" alt="Responsive image">
            @endif

            <h5 class="font-weight-bold text-dark mb-1 mt-4">{{Auth::user()->name}}</h5>
            <p class="mb-0 text-muted">{{Auth::user()->email}}</p>
        </div>
        <div class="d-flex">
            <div class="col-6 border-right p-3">
                <h6 class="font-weight-bold text-dark mb-1">
                    {{Auth::user()->balance}}
                </h6>
                <p class="mb-0 text-black-50 small">Balance</p>
            </div>
            <div class="col-6 p-3">
                <h6 class="font-weight-bold text-dark mb-1">{{Auth::user()->total_earning}}</h6>
                <p class="mb-0 text-black-50 small">Total Earning</p>
            </div>
        </div>
        <div class="overflow-hidden border-top">
            <a class="font-weight-bold p-3 d-block" href="profile.html"> View my profile </a>
        </div>
    </div>

</aside>
