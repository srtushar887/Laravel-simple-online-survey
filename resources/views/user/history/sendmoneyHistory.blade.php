@extends('layouts.user')
@section('user')
    <main class="col col-xl-6 order-xl-2 col-lg-12 order-lg-1 col-md-12 col-sm-12 col-12">
        <div class="border rounded bg-white mb-3">
            <div class="box-title border-bottom p-3">
                <h6 class="m-0">Send Money History</h6>
                <p class="mb-0 mt-0 small">
                </p>
            </div>
            <div class="box-body p-3">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Receiver Name</th>
                        <th scope="col">Amount</th>
                        <th scope="col">Created Date</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($sendmoney as $trans)
                        <?php
                            $receiver_name = \App\Models\User::where('id',$trans->receiver_id)->first();
                        ?>
                        <tr>
                            <td>{{$trans->transfer_id}}</td>
                            <td>
                                @if ($receiver_name)
                                    {{$receiver_name->name}}
                                @else
                                    Not Set
                                @endif
                                </td>
                            <td>{{$gn->site_currency}}{{$trans->amount}}</td>
                            <td> {{$trans->created_at}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{$sendmoney->links()}}
            </div>
        </div>
    </main>
    @include('user.include.leftbar')
    @include('user.include.rightbar')
@endsection
