@extends('layouts.user')
@section('user')
    <main class="col col-xl-6 order-xl-2 col-lg-12 order-lg-1 col-md-12 col-sm-12 col-12">
        <div class="border rounded bg-white mb-3">
            <div class="box-title border-bottom p-3">
                <h6 class="m-0">Withdraw Money</h6>
                <p class="mb-0 mt-0 small">
                </p>
            </div>
            @include('layouts.error')
            <div class="box-body p-3">
                <form class="js-validate" novalidate="novalidate" action="{{route('user.withdraw.money.save')}}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-sm-12 mb-2">
                            <div class="js-form-message">
                                <label id="nameLabel" class="form-label">
                                    Withdraw Method
                                    <span class="text-danger">*</span>
                                </label>
                                <div class="form-group">
                                    <select class="form-control paymenttype" name="payment_type">
                                        <option value="1">Paypal</option>
                                        <option value="2">Perfect Money</option>
                                        <option value="3">Bank</option>
                                    </select>
                                </div>
                            </div>
                            <div class="js-form-message email_addess">
                                <label id="nameLabel" class="form-label">
                                    Email
                                    <span class="text-danger">*</span>
                                </label>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="address" placeholder="" aria-label="Enter your name" required="" aria-describedby="nameLabel" data-msg="Please enter your name." data-error-class="u-has-error" data-success-class="u-has-success">
                                </div>
                            </div>
                            <div class="js-form-message bank_details">
                                <label id="nameLabel" class="form-label">
                                    Address
                                    <span class="text-danger">*</span>
                                </label>
                                <div class="form-group">
                                    <textarea type="text" class="form-control" name="address" cols="5" rows="5" placeholder="" aria-label="Enter your name" required="" aria-describedby="nameLabel" data-msg="Please enter your name." data-error-class="u-has-error" data-success-class="u-has-success"></textarea>
                                </div>
                            </div>
                            <div class="js-form-message">
                                <label id="nameLabel" class="form-label">
                                    Amount
                                    <span class="text-danger">*</span>
                                </label>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="amount" placeholder="" aria-label="Enter your name" required="" aria-describedby="nameLabel" data-msg="Please enter your name." data-error-class="u-has-error" data-success-class="u-has-success">
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
@section('js')
    <script>
        $(document).ready(function () {
            var pay_type = $('.paymenttype').val();
            $('.bank_details').hide();

            $('.paymenttype').change(function () {
                var id = $(this).val();
                if (id == 1){
                    $('.bank_details').hide();
                    $('.email_addess').show();
                }else if (id == 2){
                    $('.bank_details').hide();
                    $('.email_addess').show();
                }else if (id == 3){
                    $('.bank_details').show();
                    $('.email_addess').hide();
                }else {
                    alert('no type');
                }
            })

        })
    </script>
@endsection
