@extends('layouts.user')
@section('user')
    <main class="col col-xl-6 order-xl-2 col-lg-12 order-lg-1 col-md-12 col-sm-12 col-12">
        <div class="border rounded bg-white mb-3">
            <div class="box-title border-bottom p-3">
                <h6 class="m-0">Active Account</h6>
                <p class="mb-0 mt-0 small"> ENTER PIN TO ACTIVE YOUR ACCOUNT .
                </p>
            </div>
            <div class="box-body p-3">
                <form class="js-validate" novalidate="novalidate" action="{{route('user.pin.active.submit')}}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-sm-12 mb-2">
                            <div class="js-form-message">
                                <label id="nameLabel" class="form-label">
                                    Enter Pin
                                    <span class="text-danger">*</span>
                                </label>
                                <div class="form-group">
                                    <input type="number" class="form-control" name="pin_number" placeholder="Enter pin" aria-label="Enter your name" required="" aria-describedby="nameLabel" data-msg="Please enter your name." data-error-class="u-has-error" data-success-class="u-has-success">
                                </div>
                            </div>
                            <div class="mb-3 text-left">
                                <button class="font-weight-bold btn btn-primary rounded p-3">Submit</button>
                            </div>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </main>
    @include('user.include.leftbar')
    @include('user.include.rightbar')
@endsection
