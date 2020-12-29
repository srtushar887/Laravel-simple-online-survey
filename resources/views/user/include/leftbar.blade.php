<aside class="col col-xl-3 order-xl-1 col-lg-6 order-lg-2 col-md-6 col-sm-6 col-12">
    <div class="box mb-3 shadow-sm border rounded bg-white profile-box text-center">
        <div class="py-4 px-3 border-bottom">
            @if (!empty(Auth::user()->profile_image) && file_exists(Auth::user()->profile_image))
                <img src="{{asset(Auth::user()->profile_image)}}" style="height: 150px;width: 150px" class="img-fluid mt-2 rounded-circle" alt="Responsive image">
            @else
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSc4gAuboBQ2Y-6kl84wtIoK8e18cFsmxvIag&usqp=CAU" style="height: 150px;width: 150px" class="img-fluid mt-2 rounded-circle" alt="Responsive image">
            @endif

            <h5 class="font-weight-bold text-dark mb-1 mt-4">{{Auth::user()->name}}</h5>
            <p class="mb-0 text-muted">{{Auth::user()->email}}</p>
        </div>
        <div class="d-flex">
            <div class="col-6 border-right p-3">
                <h6 class="font-weight-bold text-dark mb-1">
                    {{$gn->site_currency}}{{Auth::user()->balance}}
                </h6>
                <p class="mb-0 text-black-50 small">Balance</p>
            </div>
            <div class="col-6 p-3">
                <h6 class="font-weight-bold text-dark mb-1">{{$gn->site_currency}}{{Auth::user()->total_income}}</h6>
                <p class="mb-0 text-black-50 small">Total Earning</p>
            </div>
        </div>
        <div class="overflow-hidden border-top">

        </div>
    </div>

    <div class="box mb-3 shadow-sm rounded bg-white view-box overflow-hidden">
        <div class="box-title border-bottom p-3">
            <h6 class="m-0">My Referral ID : 12345678</h6>
        </div>
        <div class="box-title border-bottom p-3">
            <h6 class="m-0">Referral URL</h6>
            <?php

            ?>
            <input type="text" class="form-control" id="myInput" value="{{route('referralurl',Auth::user()->my_ref_id)}}" readonly>
            <br>
            <button class="btn btn-success btn-sm btn-block" onclick="myFunction()">COPY REFERRAL URL</button>
        </div>
    </div>

</aside>
