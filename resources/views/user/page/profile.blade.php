@extends('layouts.user')
@section('user')
    <main class="col col-xl-6 order-xl-2 col-lg-12 order-lg-1 col-md-12 col-sm-12 col-12">
        <div class="border rounded bg-white mb-3">
            <div class="box-title border-bottom p-3">
                <h6 class="m-0">Profile Update</h6>
                <p class="mb-0 mt-0 small"> ENTER INFO TO UPDATE YOUR PROFILE .
                </p>
            </div>
            <div class="box-body p-3">
                <form class="js-validate" novalidate="novalidate" action="{{route('user.profile.update')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-sm-12 mb-2">
                            <div class="js-form-message">
                                <label id="nameLabel" class="form-label">
                                    Name
                                    <span class="text-danger">*</span>
                                </label>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="name" value="{{Auth::user()->name}}"  aria-label="Enter your name" required="" aria-describedby="nameLabel" data-msg="Please enter your name." data-error-class="u-has-error" data-success-class="u-has-success">
                                </div>
                            </div>
                            <div class="js-form-message">
                                <label id="nameLabel" class="form-label">
                                    Email
                                    <span class="text-danger">*</span>
                                </label>
                                <div class="form-group">
                                    <input type="email" class="form-control" name="email" value="{{Auth::user()->email}}"  aria-label="Enter your name" required="" aria-describedby="nameLabel" data-msg="Please enter your name." data-error-class="u-has-error" data-success-class="u-has-success">
                                </div>
                            </div>
                            <div class="js-form-message">
                                <label id="nameLabel" class="form-label">
                                    Phone Number
                                    <span class="text-danger">*</span>
                                </label>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="phone" value="{{Auth::user()->phone}}"  aria-label="Enter your name" required="" aria-describedby="nameLabel" data-msg="Please enter your name." data-error-class="u-has-error" data-success-class="u-has-success">
                                </div>
                            </div>
                            <div class="js-form-message">
                                <label id="nameLabel" class="form-label">
                                    Profile Image
                                    <span class="text-danger">*</span>
                                </label>
                                <div class="form-group">
                                    @if (!empty(Auth::user()->profile_image) && file_exists(Auth::user()->profile_image))
                                        <img src="{{asset(Auth::user()->profile_image)}}" style="height: 100px;width: 100px;">
                                    @else
                                        <img src="https://www.slj.com/webfiles/1604461841106/images/default-user.png" style="height: 100px;width: 100px;">
                                    @endif

                                    <input type="file" class="form-control" name="profile_image"  aria-label="Enter your name" required="" aria-describedby="nameLabel" data-msg="Please enter your name." data-error-class="u-has-error" data-success-class="u-has-success">
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
