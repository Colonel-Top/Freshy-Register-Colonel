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
        /*margin: 10vh auto;*/

        padding: 3%;

        height: 0px;

    }

    .user.open {
        width: 100%;
        max-width: 465px;
        /*margin: 10vh auto;*/
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
            background-position: 10% 0
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

    .newfriends {
        font-family: Kanit-Medium;
        letter-spacing: 6px;
        /*font-size: 2vmin;*/
        color: #777777;
        /*text-align: center;*/

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

    .switch {
        position: relative;
        display: inline-block;
        width: 50px;
        height: 24px;
    }

    /* Hide default HTML checkbox */
    .switch input {
        display: none;
    }

    /* The slider */
    .slider {
        position: absolute;
        cursor: pointer;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: deepskyblue;
        -webkit-transition: .4s;
        transition: .4s;
    }

    .slider:before {
        position: absolute;
        content: "";
        height: 16px;
        width: 16px;
        left: 4px;
        bottom: 4px;
        background-color: white;
        -webkit-transition: .4s;
        transition: .4s;
    }

    input:checked + .slider {
        background-color: lightgreen;
    }

    input:focus + .slider {
        box-shadow: 0 0 1px #2196F3;
    }

    input:checked + .slider:before {
        -webkit-transform: translateX(26px);
        -ms-transform: translateX(26px);
        transform: translateX(26px);
    }

    /* Rounded sliders */
    .slider.round {
        border-radius: 34px;
    }

    .slider.round:before {
        border-radius: 50%;
    }

    .en {
        animation: arrive 400ms ease-in-out 0.66s forwards;

        display: none;
    }

    .th {
        animation: arrive 400ms ease-in-out 0.66s forwards;
        display: block;
    }

    .en2 {
        animation: arrive 400ms ease-in-out 0.66s forwards;

        display: none;
    }

    .th2 {
        animation: arrive 400ms ease-in-out 0.66s forwards;
        display: block;
    }

    .fontthai {
        font-family: GothamRounded-Light;
        font-size: 18px;
    }
</style>
@section('content')

    <div class="container-fluid">


        <div class="user" id="user">
            <header class="user__header" style="text-align: center;">
                {{--<img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/3219/logo.svg" alt=""/>--}}

                <h1 class="user__title formheader"
                    style="letter-spacing: 10px;font-size:9vmin;">STUDENT</h1>
                <br>

                <h3 class="space2px">
                    BECOME FRESHY
                </h3>

                <div id="th2" class="th2">
                    <h3 class="newfriends">ลงทะเบียนรับเพื่อนใหม่</h3>
                </div>

                <div id="en2" class="en2">
                    <h3 class="newfriends">Register Freshy</h3>
                </div>
                <br>
                <section name="switcher" style="text-align: center;">
                    <label class="space3px">TH&nbsp;&nbsp;</label>
                    <label id="switch" class="switch">

                        <input type="checkbox">
                        <span class="slider" onclick="toggleDiv()"></span>

                    </label>
                    <label class="space3px">&nbsp;&nbsp;EN</label>
                </section>
            </header>
            <br>

            <div class="user__header" style="    margin-left: -40px;">

                @if(Session::has('fullseat'))
                    <button class="btn fontthai" type="button" onclick="reg()"><img src="{{secure_asset('/consolex.png')}}"
                                                                                    style="width:30%;">
                        ลงทะเบียน.
                    </button>
                @else
                    <button class="btn fontthai" type="button" onclick="reg()"><img src="{{secure_asset('/consolex.png')}}"
                                                                                    style="width:30%;">
                        ลงทะเบียน. <i class="fa fa-lock" style="font-size: 1.6em;"></i>
                    </button>
                @endif
                <br>
                <button class="btn fontthai" type="button" onclick="codesearch()"><img src="{{secure_asset('/consoleo.png')}}"
                                                                                       style="width:30%;">
                    ค้นหาสถานะ
                </button>
                <br>
                <button class="btn fontthai" type="button" onclick="codelostsearch()"><img
                            src="{{secure_asset('/consoletri.png')}}"
                            style="width:30%;">
                    ค้นหา Code
                </button>
                <br>
                <button class="btn fontthai" type="button" onclick="login()"><img src="{{secure_asset('/consolextra.png')}}"
                                                                                  style="width:30%;">
                    Staff Login
                </button>
                <br>
                <button class="btn fontthai" type="button" onclick="about()"><img src="{{secure_asset('/consolextra.png')}}"
                                                                                  style="width:30%;">
                    About Application
                </button>
                <br>
            </div>

            <div class="user__header" >
                <p style="font-family: Kanit-Medium;">last Activity: {{$lastlog}}</p>
            </div>

        </div>

    </div>

    <script>
        function printDiv(divName) {
            var printContents = document.getElementById(divName).innerHTML;
            var originalContents = document.body.innerHTML;
            document.body.innerHTML = printContents;
            window.print();
            document.body.innerHTML = originalContents;
        }
    </script>

    <script type="text/javascript">
        var state = 1;
        var fn = function () {
            //    alert("Hello");
            $(".user").toggleClass('open');

        }
        var about = function () {
            window.location.href = "{{route('about')}}";

        }
        var back = function () {
            window.location.href = "{{URL::to('/')}}";

        }
        var reg = function () {
            window.location.href = "{{route('freshy')}}";

        }
        var login = function () {
            window.location.href = "{{route('login')}}";

        }
        var relog = function () {
            window.location.href = "{{route('freshy')}}";

        }
        var codesearch = function () {
            window.location.href = "{{route('searchindex')}}";

        }
        var codelostsearch = function () {
            window.location.href = "{{route('searchlostindex')}}";

        }
        var togglelang = function () {
            if (state == "1") {
                $(".en").toggleClass('open');
                $(".th").toggleClass('close');
                state = 2;
            }
            else {
                $(".th").toggleClass('open');
                $(".en").toggleClass('close');
            }
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

        function toggleDiv() {
            var e = document.getElementById('th');
            var x = document.getElementById('en');
            var g = document.getElementById('th2');
            var h = document.getElementById('en2');
            if (e.style.display == null || e.style.display == "none") {
                e.style.display = "block";
                x.style.display = "none";
                g.style.display = "block";
                h.style.display = "none";
            } else {
                e.style.display = "none";
                x.style.display = "block";
                g.style.display = "none";
                h.style.display = "block";
            }

        }
    </script>

@endsection
