@extends('layouts.app')
<style>


    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {

        background-size: 110% 100% !important;
        animation: move2 3s ease-in forwards;
        /*transform: translate3d(0, 0, 0);*/
        /*background: linear-gradient(45deg, #49D49D 10%, #A2C7E5 90%);*/
        height: 100vh;

    }

    .user {
        width: 100%;
        max-width: 465px;
        margin: 10vh auto;
        background: #9a9a9a;
        padding: 3%;
        opacity: 0;
        height: 0%;
        -webkit-transition: height 0.5s linear;
        -moz-transition: height 0.5s linear;
        -ms-transition: height 0.5s linear;
        -o-transition: height 0.5s linear;
        transition: height 0.5s linear;
    }

    .user.open {
        width: 100%;
        max-width: 465px;
        margin: 10vh auto;
        background: whitesmoke;
        padding: 3%;
        opacity: 0.8;
        height: auto;
        -webkit-transition: height 0.75s linear;
        -moz-transition: height 0.75s linear;
        -ms-transition: height 0.75s linear;
        -o-transition: height 0.75s linear;
        transition: height 0.75s linear;
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
        animation: arrive 500ms ease-in-out 0.7s forwards;

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
        /*letter-spacing: 6px;*/
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
@section('content')

    <div class="container-fluid">


        <div class="user">
            <header class="user__header ">
                {{--<img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/3219/logo.svg" alt=""/>--}}
                {{--<div class="type-js">--}}


                    {{--<h1 class="user__title formheader text-js"--}}
                        {{--style="letter-spacing: 10px;font-size:35px;">STUDENT</h1>--}}

                {{--</div>--}}
                {{--<div style="margin-bottom:10px;"></div>--}}
                {{--&nbsp;<h2 class="space2px"> FRESHY</h2>--}}
                {{--&nbsp;<h2 class="space2px" style="font-weight:bolder; ">--}}

                    {{--BECOME FRESHY--}}
                {{--</h2>--}}
                <div class="row">

                    <div class="col-md-12">
                        <img src="{{secure_asset('/smallping.png')}}"style="width:100%;">
                    </div>

                </div>
            </header>
            <div class="user__header">
                <br> &nbsp;<h2 class="newfriends">ลงทะเบียนรับเพื่อนใหม่</h2>
                <br>
                <h2 class="alert-danger breadcrumb" style="font-family: Kanit-Medium; font-size:16px;">*Required
                    (ต้องกรอก)</h2>
                <h2 class="alert-danger breadcrumb" style="font-family: Kanit-Medium; font-size:16px;">
                    *กรุณากรอกข้อมูลเป็นภาษาไทย</h2>
                <h2 class="alert-danger breadcrumb" style="font-family: Kanit-Medium; font-size:16px;">
                *If you are a foreign person, please use English to fill in the form.</h2>
                <br>
                <ul class="alert-info breadcrumb"
                    style="text-align: center; font-weight: bold; font-family: GothamRounded-Light;">
                    <li>Information</li>

                </ul>

                <h2 class="alert-warning breadcrumb" style="font-family: Kanit-Medium; font-size:13px;">
                    กรุณาใช้ชื่อ-นามสกุลที่ลงทะเบียนกับมหาวิทยาลัยหรือบัตรนักศึกษา</h2>
                <h2 class="alert-warning breadcrumb" style="font-family: Kanit-Medium; font-size:13px;">
                    Please use Information that you provided with university</h2>
            </div>


            <form action="{{ route('freshy-validate') }}" class="form" style="text-align: center;" method="POST"
                  enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="form__group">
                    {{--<label for="name">ชื่อ</label>--}}
                    <input type="text" name="name" placeholder="*ชื่อ / Firstname" class="form__input" required
                           value="{{old('name')}}"/>
                </div>
                <div class="form__group">
                    {{--<label for="name">ชื่อ</label>--}}
                    <input type="text" name="surname" placeholder="*นามสกุล / Lastname" class="form__input" required
                           value="{{old('surname')}}"/>
                </div>

                <div class="form__group">
                    {{--<label for="name">ชื่อ</label>--}}
                    <input type="text" name="nickname" placeholder="*ชื่อเล่น / Nickname" class="form__input" required
                           value="{{old('nickname')}}"/>
                </div>
                <div class="form__group" >
                    {{--<label for="name">ชื่อ</label>--}}
                    <select class="form__input" id="gender" name="gender" required default="{{old('gender')}}" style="border: 1px solid rgba(0, 0, 0, 1);">
                        <option value="" selected disabled>*เพศ / Gender</option>
                        <option value="ชาย">ชาย / Male</option>
                        <option value="หญิง">หญิง / Female</option>
                        {{--<option value="other">ทางเลือก / LGBTQ</option>--}}
                    </select>

                    {{--<input type="text" name="gender" placeholder="เพศ" class="form__input"/>--}}
                </div>

                <div class="form__group">
                    {{--<label for="name">ชื่อ</label>--}}
                    <input type="number" name="cardid" placeholder="*เลขบัตรประชาชน / PassportID" class="form__input" required
                           value="{{old('cardid')}}"/>
                </div>
                <div class="form__group" >
                    {{--<label for="name">ชื่อ</label>--}}

                    <select class="form__input" id="faculty" name="faculty" required default="{{old('faculty')}}" style="border: 1px solid rgba(0, 0, 0, 1);">
                        <option value="" selected disabled>*คณะ / Faculty</option>
                        <option value="คณะนิติศาสตร์">คณะนิติศาสตร์ / Faculty of Law</option>
                        <option value="คณะพาณิชยศาสตร์และการบัญชี">คณะพาณิชยศาสตร์และการบัญชี / Faculty of Commerce and
                            Accountancy
                        </option>
                        <option value="คณะรัฐศาสตร์">คณะรัฐศาสตร์ / Faculty of Political Science</option>
                        <option value="คณะเศรษฐศาสตร์">คณะเศรษฐศาสตร์ / Faculty of Economics</option>
                        <option value="คณะสังคมสงเคราะห์ศาสตร์">คณะสังคมสงเคราะห์ศาสตร์ / Faculty of Social Science
                        </option>
                        <option value="คณะสังคมวิทยาและมานุษยวิทยา">คณะสังคมวิทยาและมานุษยวิทยา / Faculty of Sociology
                            and Anthropology
                        </option>
                        <option value="คณะศิลปศาสตร์">คณะศิลปศาสตร์ / Faculty of Arts</option>
                        <option value="คณะวารสารศาสตร์และสื่อสารมวลชน">คณะวารสารศาสตร์และสื่อสารมวลชน / Faculty of
                            Journalism and Mass Communication
                        </option>
                        <option value="คณะวิทยาศาสตร์และเทคโนโลยี">คณะวิทยาศาสตร์และเทคโนโลยี / Faculty of Science and
                            Technology
                        </option>
                        <option value="คณะวิศวกรรมศาสตร์">คณะวิศวกรรมศาสตร์ / Faculty of Engineering</option>
                        <option value="สถาบันเทคโนโลยีนานาชาติสิรินธร">สถาบันเทคโนโลยีนานาชาติสิรินธร / Sirindhorn
                            International Institute of Technology (SIIT)
                        </option>
                        <option value="คณะสถาปัตยกรรมศาสตร์และการผังเมือง">คณะสถาปัตยกรรมศาสตร์และการผังเมือง / Faculty
                            of Architecture
                        </option>
                        <option value="คณะศิลปกรรมศาสตร์">คณะศิลปกรรมศาสตร์ / Faculty of Fine Arts</option>
                        <option value="คณะแพทยศาสตร์">คณะแพทยศาสตร์ / Faculty of Medicine</option>
                        <option value="คณะสหเวชศาสตร์">คณะสหเวชศาสตร์ / Faculty of Allied Health</option>
                        <option value="คณะทันตแพทยศาสตร์">คณะทันตแพทยศาสตร์ / Faculty of Dentistry</option>
                        <option value="คณะพยาบาลศาสตร์">คณะพยาบาลศาสตร์ / Faculty of Nursing</option>
                        <option value="คณะสาธารณสุขศาสตร์">คณะสาธารณสุขศาสตร์ / Faculty of Public Health</option>
                        <option value="คณะเภสัชศาสตร์">คณะเภสัชศาสตร์ / Faculty of Pharmacy</option>
                        <option value="คณะวิทยาการเรียนรู้และศึกษาศาสตร์">คณะวิทยาการเรียนรู้และศึกษาศาสตร์ / Faculty of
                            Science and Education
                        </option>
                        <option value="วิทยาลัยพัฒนศาสตร์ ป๋วย อึ๊งภากรณ์">วิทยาลัยพัฒนศาสตร์ ป๋วย อึ๊งภากรณ์ / Puey
                            Ungphakorn College
                        </option>
                        <option value="วิทยาลัยนวัตกรรม">วิทยาลัยนวัตกรรม / College of Innovation</option>
                        <option value="วิทยาลัยสหวิทยาการ">วิทยาลัยสหวิทยาการ / Interdisciplinary College</option>
                        <option value="วิทยาลัยนานาชาติ ปรีดี พนมยงค์">วิทยาลัยนานาชาติ ปรีดี พนมยงค์ / Pridi Banomyong
                            International College
                        </option>
                        <option value="วิทยาลัยแพทยศาสตร์นานาชาติจุฬาภรณ์">วิทยาลัยแพทยศาสตร์นานาชาติจุฬาภรณ์ /
                            Chulabhorn International College of Medicine
                        </option>
                        <option value="วิทยาลัยโลกคดีศึกษา">วิทยาลัยโลกคดีศึกษา / World College of Education</option>
                        <option value="สถาบันภาษา">สถาบันภาษา / Language Institute of TU</option>
                        <option value="other">อื่นๆ / Other</option>
                    </select>
                </div>
                <div class="form__group">
                    {{--<label for="name">ชื่อ</label>--}}
                    <input type="text" name="telephone" placeholder="*Telephone No. (Non for (-) )"
                           class="form__input" required value="{{old('telephone')}}"/>
                </div>
                <div class="form__group">
                    {{--<label for="name">ชื่อ</label>--}}
                    <input type="text" name="line" placeholder="LINE ID" class="form__input" value="{{old('line')}}"/>
                </div>
                <div class="form__group">
                    {{--<label for="name">ชื่อ</label>--}}
                    <input type="text" name="facebook" placeholder="Facebook" class="form__input"
                           value="{{old('facebook')}}"/>
                </div>
                <div class="form__group" >
                    {{--<label for="name">ชื่อ</label>--}}

                    <select class="form__input" name="religion" id="religion" required default="{{old('religion')}}" style="border: 1px solid rgba(0, 0, 0, 1);">
                        <option value="" selected disabled>*ศาสนา / Religion</option>
                        <option value="buddhist">พุทธ / Buddhist</option>
                        <option value="christian">คริสต์ / Christian</option>
                        <option value="islam">อิสลาม / Islam</option>
                        <option value="sikhism">ซิกข์ / Sikhism</option>
                        <option value="hinduism">ศาสนาพราหมณ์-ฮินดู / Hinduism</option>
                        <option value="other">อื่นๆ/ไม่มี / ETC.</option>


                    </select>
                </div>

                <br>
                <ul class="alert-info breadcrumb" style="text-align: center; font-family: GothamRounded-Light;">
                    <li>SPECIAL FOOD</li>
                </ul>
                <div class="form__group">
                    {{--<label for="name">ชื่อ</label>--}}
                    <input type="text" name="disfood" placeholder="*อาหารที่แพ้ / Food Allergy (Non for (-))"
                           class="form__input" required value="{{old('disfood')}}"/>
                </div>
                <div class="form__group" style="text-align: left">
                    {{--<label for="name">ชื่อ</label>--}}
                    <row>
                        <input type="checkbox" name="vegetarian" value="1"
                               class="" {{ (! empty(old('vegetarian')) ? 'checked' : '') }}>อาหารเจ / Vegan<br>
                        <input type="checkbox" name="islamic" value="1"
                               class="" {{ (! empty(old('islamic')) ? 'checked' : '') }}>อาหารอิสลาม / Halal<br>
                    </row>
                </div>

                <br>
                <ul class="alert-info breadcrumb" style="text-align: center; font-family: GothamRounded-Light;">
                    <li>SOS Contact</li>
                </ul>

                <div class="form__group">
                    {{--<label for="name">ชื่อ</label>--}}
                    <input type="text" name="disease" placeholder="*โรคประจำตัว / Congenital disease (Non use (-))"
                           class="form__input" required value="{{old('disease')}}"/>
                </div>
                <div class="form__group">
                    {{--<label for="name">ชื่อ</label>--}}
                    <input type="text" name="disdrug" placeholder="*แพ้ยา / Drug Allergic (Non use (-))"
                           class="form__input"
                           required value="{{old('disdrug')}}"/>
                </div>
                <div class="form__group">
                    {{--<label for="name">ชื่อ</label>--}}
                    <input type="text" name="sosname" placeholder="*ชื่อ บุคคลที่ติดต่อได้ / SOS Firstname"
                           class="form__input"
                           required value="{{old('sosname')}}"/>
                </div>
                <div class="form__group">
                    {{--<label for="name">ชื่อ</label>--}}
                    <input type="text" name="sossurname" placeholder="*นามสกุล บุคคลที่ติดต่อได้ / SOS Lastname"
                           class="form__input"
                           required value="{{old('sossurname')}}"/>
                </div>
                <div class="form__group">
                    {{--<label for="name">ชื่อ</label>--}}
                    <input type="text" name="sosrelationship" placeholder="*ความสัมพันธ์ / Relationship (IE. Father)"
                           class="form__input" required value="{{old('sosrelationship')}}"/>
                </div>
                <div class="form__group">
                    {{--<label for="name">ชื่อ</label>--}}
                    <input type="text" name="sostel1" placeholder="*เบอร์ติดต่อฉุกเฉิน / SOS Contact"
                           class="form__input" required
                           value="{{old('sostel1')}}"/>
                </div>
                <div class="form__group">
                    {{--<label for="name">ชื่อ</label>--}}
                    <input type="text" name="sostel2" placeholder="เบอร์ติดต่อฉุกเฉิน 2 / SOS Contact 2"
                           class="form__input"
                           value="{{old('sostel2')}}"/>
                </div>

                <div style="font-size:21px;">
                    <div style="margin-top:15px;">
                        <row>
                            <button class="btn" type="submit"><img src="{{secure_asset('/consoleo.png')}}"
                                                                   class="imagebutton"> Register
                            </button>

                            <button class="btn" type="button" onclick="back()"><img src="{{secure_asset('/consoletri.png')}}"
                                                                                    class="imagebutton">
                                Back
                            </button>
                        </row>
                    </div>
                </div>
            </form>
        </div>

    </div>


    <script type="text/javascript">
        var fn = function () {
            //    alert("Hello");
            $(".user").toggleClass('open');

        }
        var fn2 = function () {
            //    alert("Hello");
            //  $(".user").toggleClass('open');
            $(".form").toggleClass('open');

        }
        var back = function () {

                window.location.href = "{{route('index')}}";

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
                thhis.text("S");
                for (var i = 0; i < amntOfChars; i++) {
                    (function (i, char) {
                        setTimeout(function () {
                            newString += char;
                            thhis.text(newString);
                        }, i * typingSpeed);
                    })(i + 1, text[i]);
                }
            }, 1000);
        }


        $(document).ready(function () {

            setTimeout(fn, 500);
            autoType(".type-js", 200);
            setTimeout(fn2, 1000);

        });
    </script>
    <script>
        var currentGender = null;
        for (var i = 0; i != document.querySelector("#gender").querySelectorAll("option").length; i++) {
            currentGender = document.querySelector("#gender").querySelectorAll("option")[i];
            if (currentGender.getAttribute("value") == "{{ old("gender") }}") {
                currentGender.setAttribute("selected", "selected");
            }
        }
        var currentfaculty = null;
        for (var i = 0; i != document.querySelector("#faculty").querySelectorAll("option").length; i++) {
            currentfaculty = document.querySelector("#faculty").querySelectorAll("option")[i];
            if (currentfaculty.getAttribute("value") == "{{ old("faculty") }}") {
                currentfaculty.setAttribute("selected", "selected");
            }
        }
        var currentreligion = null;
        for (var i = 0; i != document.querySelector("#religion").querySelectorAll("option").length; i++) {
            currentreligion = document.querySelector("#religion").querySelectorAll("option")[i];
            if (currentreligion.getAttribute("value") == "{{ old("religion") }}") {
                currentreligion.setAttribute("selected", "selected");
            }
        }
    </script>
@endsection
