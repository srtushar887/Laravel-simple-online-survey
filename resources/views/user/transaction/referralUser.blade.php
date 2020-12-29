@extends('layouts.user')
@section('user')
    <main class="col col-xl-6 order-xl-2 col-lg-12 order-lg-1 col-md-12 col-sm-12 col-12">
        <div class="border rounded bg-white mb-3">
            <div class="box-title border-bottom p-3">
                <h6 class="m-0">Referral User</h6>
                <p class="mb-0 mt-0 small">
                </p>
            </div>
            <div class="box-body p-3">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">User ID</th>
                        <th scope="col">User Name</th>
                        <th scope="col">User Email</th>
                        <th scope="col">Created Date</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($ref_users as $refuser)
                        <tr>
                            <td>{{$refuser->my_ref_id}}</td>
                            <td>{{$refuser->name}}</td>
                            <td> {{$refuser->email}}</td>
                            <td> {{$refuser->created_at}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{$ref_users->links()}}
            </div>
        </div>
    </main>
    @include('user.include.leftbar')
    @include('user.include.rightbar')
@endsection
