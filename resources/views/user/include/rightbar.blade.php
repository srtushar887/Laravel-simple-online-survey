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
        <?php
            $user_recent_post = \App\Models\survey_question::where('user_type',2)->where('user_id',Auth::user()->id)->take(2)->get();
        ?>
        <div class="box-body p-3">
            @foreach ($user_recent_post as $rpost)
                <a href="{{route('user.post.details',$rpost->id)}}">
                    <div class="shadow-sm border rounded bg-white job-item mb-3">
                        <div class="d-flex align-items-center p-3 job-item-header">
                            <div class="overflow-hidden mr-2">
                                <div class="text-truncate text-primary">{{substr($rpost->title,0,20)}}</div>
                            </div>
                        </div>
                        <div class="p-3 job-item-footer">
                            <small class="text-gray-500"><i class="feather-clock"></i> {{$rpost->created_at->diffforhumans()}}</small>
                        </div>
                    </div>
                </a>
            @endforeach


        </div>
    </div>
</aside>
