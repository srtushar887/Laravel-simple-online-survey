@extends('layouts.admin')
@section('admin')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0">General Settings</h4>

                <div class="page-title-right">

                </div>

            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                     <form class="needs-validation" novalidate="" action="{{route('admin.general.settings.update')}}" method="post" enctype="multipart/form-data">
                         @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="validationCustom01">Site Name</label>
                                    <input type="text" class="form-control" name="site_name" value="{{$gen->site_name}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="validationCustom01">Site Email</label>
                                    <input type="text" class="form-control" name="site_email" value="{{$gen->site_email}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="validationCustom01">Site Phone Number</label>
                                    <input type="text" class="form-control" name="site_phone_number" value="{{$gen->site_phone_number}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="validationCustom01">Site Currency</label>
                                    <input type="text" class="form-control" name="site_currency" value="{{$gen->site_currency}}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="validationCustom01">Comment Get Money</label>
                                    <input type="text" class="form-control" name="per_post_money" value="{{$gen->per_post_money}}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="validationCustom01">Like Get Money</label>
                                    <input type="text" class="form-control" name="per_like_money" value="{{$gen->per_like_money}}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="validationCustom01">Transfer Amount (%)</label>
                                    <input type="text" class="form-control" name="transfer_amount_percentage" value="{{$gen->transfer_amount_percentage}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="validationCustom01">Create Post</label>
                                    <input type="text" class="form-control" name="create_post" value="{{$gen->create_post}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="validationCustom01">Active Commission</label>
                                    <input type="text" class="form-control" name="active_commission" value="{{$gen->active_commission}}">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="validationCustom01">Site Address</label>
                                    <textarea type="text" cols="5" rows="5" class="form-control" name="site_address">{!! $gen->site_address !!}</textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="validationCustom01">Site Logo</label>
                                    <br>
                                    <img src="{{asset($gen->logo)}}" style="height: 100px;width: 100px;">
                                    <input type="file" class="form-control" name="logo">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="validationCustom01">Site Icons</label>
                                    <br>
                                    <img src="{{asset($gen->icon)}}" style="height: 100px;width: 100px;">
                                    <input type="file" class="form-control" name="icon">
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-primary" type="submit">Update</button>
                    </form>
                </div>
            </div>
            <!-- end card -->
        </div> <!-- end col -->

    </div>
@endsection
