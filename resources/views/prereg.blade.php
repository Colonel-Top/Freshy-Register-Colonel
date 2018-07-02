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

    .trickshot {
        opacity: 0;
    }

    .trickshot.open {
        -webkit-transition: opacity 2.75s;
        -moz-transition: opacity 2.75s;
        -ms-transition: opacity 2.75s;
        -o-transition: opacity 2.75s;
        transition: opacity 2.75s;
        opacity: 1;
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

        /*width: 35%;*/

        -webkit-appearance: none;
        outline: 0;
        border: 0;
        color: black;
        background: none;
        opacity: 0.7;
        transition: 0.3s;

    }

    .btn:hover {

        /*width: 35%;*/

        -webkit-appearance: none;
        outline: 0;
        /*border: 0;*/
        color: black;
        background: none;
        opacity: 0.7;
        transition: 0.3s;
        /*box-shadow: 0 0 5px rgba(81, 203, 238, 1);*/
        border: 2px solid rgb(210, 214, 212);

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
    .imagebutton
    {
        width:27px;
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
            <br><br>
            <div class="user__header" style="font-family: Kanit-Medium;">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12" style="text-align:left; overflow-y:visible;">
                            <h2 class="alert-warning breadcrumb" style="font-family: Kanit-Medium; font-size:16px;">
                                Please Read Agreement</h2>
                            <p style="overflow: auto; height:300px;">English Please Scroll down<br><br>เงื่อนไขการกรอกฟอร์ม
                                <br>
                                <br>
                                จะต้องกรอกข้อมูลลงในฟอร์มตามแบบที่ให้ข้อมูลกับทางมหาวิทยาลัยเพื่อประโยชน์ตัวท่านเอง
                                การกรอกข้อมูลใดอันเป็นเท็จ เจ้าหน้าที่ พี่เลี้ยง พี่สต๊าฟ ผู้ดูแลระบบ
                                จะไม่รับผิดชอบ ในความผิดพลาดของข้อมูลที่กรอกที่เกิดขึ้น ทั้งนี้
                                นักศึกษาสามารถเข้าไปแก้ไขข้อมูลได้โดยใช้รหัสการจองและเลขบัตรประชาชนเป็นรหัสผ่านในหน้าเมนู
                                เข้าสู่ระบบได้
                                ทางผู้เก็บข้อมูลจะขอสงวนสิทธิ์ข้อมูลไว้เพื่อความปลอดภัยและประโยชน์ของตัวนักศึกษาเองอย่างสูงสุดโดยถูกต้องตามกฏหมายราชอาณาจักรไทยฉบับปี พ.ศ.๒๕๖๐
                                โดยระบบมีการเข้ารหัสเพื่อรองรับความปลอดภัยของข้อมูลเป็นที่เรียบร้อย
                                <br> <br>
                                "เป็นคนไทยกรุณากรอกข้อมูลด้วยภาษาไทย"<br><br>หากข้อมูลส่วนใดที่ท่านไม่มีกรุณาใส่ ขีด/dash
                                ด้วยสัญลักษณ์ - <br>หากมีปัญหากรุณาติดต่อ P'Staff
                                <br>
                                การกดปุ่ม Register ถือเป็นการยอมรับและได้รับทราบตามข้อตกลง/บทความข้างต้นแล้ว
                                <br>
                                <br>
                                Please Read before filling the form
                                <br>
                                <br>
                                You need to fill the form with data that you provided same as university. any fault,
                                mistake, wrong information our team will not take any responsibility this is your
                                benefits when any accident could occur. After register you can login @ Main menu to
                                update your information any time.<br>
                                We reserve the right to secure your information for your security and safety under the
                                law of Thailand 2018. We also encrypt your data which happen on this website. that's
                                mean all information will be safe here. Any problem please Contact Staff Team
                                <br>
                                <br>
                                *If you are a foreigner, please use English to fill in the form.<br>
                                *Any Information that you don't have, please insert dash ( - )<br>
                                *(*) Meaning of Required
                                <br><br>
                                By Clicking Register button mean that you are accept agreement and acknowledge this information
                            </p>
                        </div>

                        <br>
                        <br>
                        <br>

                        <div class="row" style="text-align: center;">
                            <div class="col-md-6">
                                <button class="btn" type="button" onclick="reg()"><img
                                            src="{{secure_asset('/consoletri.png')}}"
                                            class="imagebutton">
                                    Register
                                </button>
                            </div>
                            <div class="col-md-6">
                                <button class="btn" type="button" onclick="back()"><img
                                            src="{{secure_asset('/consolextra.png')}}"
                                            class="imagebutton">
                                    Cancel
                                </button>
                            </div>
                        </div>
                        <br><br>

                    </div>
                </div>


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
        var fn = function () {
            //    alert("Hello");
            $(".user").toggleClass('open');

        }
        var fntrickshot = function () {
            //    alert("Hello");
            $(".trickshot").toggleClass('open');

        }

        var back = function () {
            window.location.href = "{{URL::to('/')}}";

        }
        var reg = function () {
            window.location.href = "{{route('freshy')}}";

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

            setTimeout(fntrickshot, 3000);


        });
    </script>
@endsection
