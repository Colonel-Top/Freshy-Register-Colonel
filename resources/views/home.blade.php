@extends('layouts.app')
<style>
    .btn {

        width: 30%;

        -webkit-appearance: none;
        outline: 0;
        border: 0;
        color: black;
        background: none;
        opacity: 0.7;
        transition: 0.3s;

    }

    .btn:hover {

        width: 30%;

        -webkit-appearance: none;
        outline: 0;
        /*border: 0;*/
        color: black;
        background: none;
        opacity: 0.7;
        transition: 0.3s;
        box-shadow: 0 0 5px rgba(81, 203, 238, 1);
        border: 2px solid rgba(81, 203, 238, 1);

    }
</style>
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Dashboard</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif


                        <button class="btn" type="button" onclick="logoutuser()"><img src="{{secure_asset('/consoletri.png')}}"
                                                                                      style="width:30%;">
                            Logout
                        </button>

                        You are logged in!
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">

        var logoutuser = function () {
            window.location.href = "{{route('logouts')}}";

        }</script>
@endsection
