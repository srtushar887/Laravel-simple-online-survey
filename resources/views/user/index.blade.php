@extends('layouts.user')
@section('user')
    @livewire('user.userpost')
    @include('user.include.leftbar')
    @include('user.include.rightbar')
@endsection
@section('js')
    <script>
        $(document).ready(function () {
            $(document).on('click', '.pagination button',function(event)
            {
                event.preventDefault();
                $("html, body").animate({ scrollTop: 0 }, "slow");
            });
        })
    </script>
@endsection
