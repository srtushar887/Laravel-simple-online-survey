@extends('layouts.user')
@section('user')
    <main class="col col-xl-6 order-xl-2 col-lg-12 order-lg-1 col-md-12 col-sm-12 col-12">
        <div class="border rounded bg-white mb-3">
            <div class="box-title border-bottom p-3">
                <h6 class="m-0">Mobile Recharge History</h6>
                <p class="mb-0 mt-0 small">
                </p>
            </div>
            <div class="box-body p-3">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Phone Number</th>
                        <th scope="col">Amount</th>
                        <th scope="col">Created Date</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($mobile_recharge as $trans)
                        <tr>
                            <td>{{$trans->recharge_id}}</td>
                            <td>{{$trans->phone_number}}</td>
                            <td>{{$gn->site_currency}}{{$trans->amount}}</td>
                            <td>
                                @if ($trans->status == 1)
                                    Pending
                                @elseif ($trans->status == 2)
                                    Complete
                                @elseif ($trans->status == 3)
                                    Rejected
                                @else
                                    Not Set
                                @endif
                            </td>
                            <td> {{$trans->created_at}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{$mobile_recharge->links()}}
            </div>
        </div>
    </main>
    @include('user.include.leftbar')
    @include('user.include.rightbar')
@endsection
