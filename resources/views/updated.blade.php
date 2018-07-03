@extends('layouts.app')
<style>


    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {

        background-size: 180% 100% !important;
        animation: move2 1.521s ease-in-out forwards;
        /*transform: translate3d(0, 0, 0);*/
        /*background: linear-gradient(45deg, #49D49D 10%, #A2C7E5 90%);*/
        height: 100vh;

    }

    .user {
        width: 100%;
        max-width: 465px;
        margin: 10vh auto;

        padding: 3%;

        height: 0px;

    }

    .user.open {
        width: 100%;
        max-width: 465px;
        margin: 10vh auto;
        background: whitesmoke;
        padding: 3%;

        height: 100px;

        -webkit-transition: height 2.75s ease-in;
        -moz-transition: height 2.75s ease-in;
        -ms-transition: height 2.75s ease-in;
        -o-transition: height 2.75s ease-in;
        transition: height 2.75s ease-in;
    }

    @font-face {
        font-family: Kanit-Medium;
        src: url('{{ secure_asset('fonts/Kanit-Medium.otf')}}') format("opentype");
    }

    @font-face {
        font-family: GothamRounded-Bold;
        src: url('{{ secure_asset('fonts/GothamRounded-Bold.otf')}}') format("opentype");
    }

    @font-face {
        font-family: Gotham-Ultra;
        src: url('{{ secure_asset('fonts/Gotham-Ultra.otf')}}') format("opentype");
    }

    @font-face {
        font-family: GothamRounded-Light;
        src: url('{{ secure_asset('fonts/GothamRounded-Light.otf')}}') format("opentype");
    }

    .user__header {
        text-align: center;
        opacity: 0;
        transform: translate3d(0, 500px, 0);
        animation: arrive 400ms ease-in-out 0.6s forwards;

    }

    .user__title {

        margin-bottom: -10px;
        font-weight: 500;
        color: black;
    }

    .form__group {
        font-size: 16px;
    }

    .form {
        font-family: GothamRounded-Bold;
        margin-top: 40px;
        border-radius: 6px;
        overflow: hidden;
        opacity: 0;
        transform: translate3d(0, 500px, 0);
        animation: arrive 400ms ease-in-out 0.66s forwards;
    }

    .form.open {
        font-family: Kanit-Medium;
        margin-top: 40px;
        border-radius: 6px;
        overflow: hidden;

        transform: translate3d(0, 500px, 0);
        animation: arrive 400ms ease-in-out 0.66s forwards;
    }

    .form--NO {
        /*animation: NO 1s ease-in-out;*/
        opacity: 1;
        transform: translate3d(0, 0, 0);
    }

    .form__input {
        display: block;
        width: 100%;
        padding: 10px;
        margin-bottom: 10px;

        -webkit-appearance: none;
        border: 0;
        outline: 0;
        transition: 0.3s;

        -webkit-transition: all 0.30s ease-in-out;
        -moz-transition: all 0.30s ease-in-out;
        -ms-transition: all 0.30s ease-in-out;
        -o-transition: all 0.30s ease-in-out;

    }

    .form__input:hover {

        box-shadow: 0 0 11px rgba(81, 203, 238, 1);
        border: 2px solid rgba(81, 203, 238, 1);
        -webkit-transition: all 0.30s ease-in-out;
        -moz-transition: all 0.30s ease-in-out;
        -ms-transition: all 0.30s ease-in-out;
        -o-transition: all 0.30s ease-in-out;

    }

    .form__input:focus {

        box-shadow: 0 0 5px rgb(136, 238, 155);
        border: 2px solid rgb(136, 238, 155);
        -webkit-transition: all 0.30s ease-in-out;
        -moz-transition: all 0.30s ease-in-out;
        -ms-transition: all 0.30s ease-in-out;
        -o-transition: all 0.30s ease-in-out;

    }

    @keyframes arrive {
        0% {
            opacity: 0;
            transform: translate3d(0, 50px, 0);
        }

        100% {
            opacity: 0.8;
            transform: translate3d(0, 0, 0);
        }
    }

    @keyframes move2 {
        0% {
            background-position: 0 0
        }

        50% {
            background-position: 100% 0
        }

        100% {
            background-position: 0 0
        }
    }

    * {
        box-sizing: border-box
    }

    .space2px {
        font-family: GothamRounded-Light;
        letter-spacing: 16px;
        font-size: 13px;
        color: #777777;
        text-align: center;
    }

    .btn {

        /*width: 30%;*/

        -webkit-appearance: none;
        outline: 0;
        border: 0;
        color: black;
        background: none;
        opacity: 0.7;
        transition: 0.3s;

    }

    .btn:hover {

        /*width: 30%;*/

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

    .newfriends {
        font-family: Kanit-Medium;
        letter-spacing: 6px;
        font-size: 18px;
        color: #777777;
        text-align: center;
    }

    .formheader {
        font-family: Gotham-Ultra;
        margin-top: 5px;
    }

    .text-js {
        opacity: 0;
    }

    .cursor {
        display: block;
        position: absolute;
        height: 105%;
        top: 7px;
        right: -5px;
        width: 2px;
        /* Change colour of Cursor Here */
        background-color: black;
        z-index: 1;
        animation: flash 0.5s none infinite alternate;
    }

    @keyframes flash {
        0% {
            opacity: 1;
        }
        100% {
            opacity: 0;
        }
    }


</style>
<style>
    @page {
        size: auto;
        margin: 0mm;
    }
</style>
@section('content')

    <div class="container-fluid">


        <div class="user" id="user">
            <header class="user__header ">
                {{--<img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/3219/logo.svg" alt=""/>--}}
                <h1 class="user__title formheader"
                    style="letter-spacing: 10px;font-size:35px;">STUDENT</h1>

                <div style="margin-bottom:10px;"></div>
                {{--&nbsp;<h2 class="space2px"> FRESHY</h2>--}}
                &nbsp;<h2 class="space2px" style="font-weight:bolder; ">

                    BECOME FRESHY
                </h2>
            </header>
            <div class="user__header">
                <br> &nbsp;<h2 class="newfriends">@if (Session::has('regdone'))รหัส@endifลงทะเบียนรับเพื่อนใหม่</h2>
                <br>


                @if (Session::has('error'))
                    <h2 class="alert-danger breadcrumb"
                        style="font-family: Kanit-Medium; font-size:16px;">{{ Session::get('error') }}</h2>
                    <button class="btn" type="button" onclick="relog()"><img src="{{secure_asset('/consoleX.png')}}"
                                                                             style="width:30%;">
                        Try Again
                    </button>
                @endif
                @if (Session::has('seatfull'))
                    <h2 class="alert-secondary breadcrumb"
                        style="font-family: Kanit-Medium; font-size:16px;">{{ Session::get('seatfull') }}</h2>
                @endif
                @if (Session::has('code'))

                    <h1 class="alert-dark formheader">{{ Session::get('code') }}</h1>
                    <br>
                    <h2 class="alert-success breadcrumb"
                        style="font-family: Kanit-Medium; font-size:16px;">Code:{{ Session::get('code') }} Successfully
                        Updated</h2>
                    <br>
                    <h2 class="alert-success breadcrumb" style="font-family: Kanit-Medium; font-size:18px;">การ Update
                        ข้อมูลเสร็จสมบูรณ์</h2>
                    <h2 class="alert-warning breadcrumb" style="font-family: Kanit-Medium; font-size:18px;">กรุณาอย่าลืม
                        Capture / จด / Print Code นี้ไว้เพื่อยืนยันตัวตนในการเข้างาน</h2>
                    <button class="btn" type="button" onclick="printDiv('print');"><img
                                src="{{secure_asset('/consoletri.png')}}"
                                class="imagebutton">
                        Print Code
                    </button>
                @endif

                <button class="btn" type="button" onclick="back()"><img src="{{secure_asset('/consoleo.png')}}"
                                                                        class="imagebutton">
                    Home
                </button>
            </div>


        </div>
        <div class="container" id="print" name="print"
             style="visibility: hidden; text-align:center; width:100%;font-family: GothamRounded-Light;position:absolute;">
            {{--<img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/3219/logo.svg" alt=""/>--}}
            <div style="padding-top:100px;"></div>
            <h1 class="space2px"
                style="letter-spacing: 10px;font-size:55px;">STUDENT</h1>

            <div style="margin-bottom:10px;"></div>
            {{--&nbsp;<h2 class="space2px"> FRESHY</h2>--}}
            &nbsp;<h2 class="space2px" style="font-size:20px; font-weight:bolder; ">

                BECOME FRESHY
            </h2>
            <br>
            <br>
            &nbsp;<h2 class="space2px" style="font-weight:bolder; font-size: 40px; ">

                YOUR CODE
            </h2>
            <br>
            <br>

            @if (Session::has('code'))

                <h1 class="space2px alert-dark"
                    style="font-size: 60px; font-weight: bolder;">{{ Session::get('code') }}</h1>
                <br>
                <br>
                <h2 class="alert-warning" style="font-family: Kanit-Medium; font-size:30px; text-align: center;">
                    กรุณาเก็บ
                    Code นี้ไว้เพื่อยืนยันตัวตนในการเข้างาน</h2>
                <br>
                <h2 class="alert-warning" style="font-family: Kanit-Medium; font-size:10px; text-align: center;">
                    -----------------------------</h2>
                <br>
                <br>
                <div class="container" style="text-align: center;">

                    <div class="col-md-12">
                        <img src="{{secure_asset('/mapforprint.png')}}" style="width:auto;height:50%;"/>

                    </div>

                </div>
            @endif

        </div>
    </div>

    <script>
        function printDiv(divName) {
            var printContents = document.getElementById(divName).innerHTML;
            var originalContents = document.body.innerHTML;


            document.body.innerHTML = printContents;
            window.focus();
            window.print();
            document.body.innerHTML = originalContents;
        }
    </script>

    <script type="text/javascript">
        var fn = function () {
            //    alert("Hello");
            $(".user").toggleClass('open');

        }

        var back = function () {

            window.location.href = "{{URL::to('/')}}";

        }
        var relog = function () {

            window.location.href = "{{route('freshyshowlogin')}}";

        }


        function autoType(elementClass, typingSpeed) {
            var thhis = $(elementClass);
            thhis.css({
                "position": "relative",
                "display": "inline-block"
            });
            thhis.prepend('<div class="cursor" style="right: initial; left:0;"></div>');
            thhis = thhis.find(".text-js");
            var text = thhis.text().trim().split('');
            var amntOfChars = text.length;
            var newString = "";
            thhis.text("|");
            setTimeout(function () {
                thhis.css("opacity", 1);
                thhis.prev().removeAttr("style");
                thhis.text("");
                for (var i = 0; i < amntOfChars; i++) {
                    (function (i, char) {
                        setTimeout(function () {
                            newString += char;
                            thhis.text(newString);
                        }, i * typingSpeed);
                    })(i + 1, text[i]);
                }
            }, 1500);
        }


        $(document).ready(function () {

            // setTimeout(fn, 200);


        });
    </script>
@endsection
