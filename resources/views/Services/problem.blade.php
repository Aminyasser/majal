@extends('layouts.master')

@section('title','Problem')


@section('contant')

<div class="container mt-5">
    <div class="d-flex justify-content-center">
        <div class="col-md-8 col-10">
            <div class="row">

                <div class=" col-12 ">

                    <div class="inner contact">
                        <!-- Form Area -->
                        <div class="contact-form">

                            <!-- Form -->
                            <form id="contact-us" action="/recover" method="POST">
                                <!-- Left Inputs -->
                                @csrf
                                <div class="col-xs-6 wow animated slideInLeft" data-wow-delay=".5s">
                                    <span>تواصل </span>
                                    <img src="https://www.svgrepo.com/show/184920/team.svg" width="100px" title="خدمة العملاء" alt="">
                                    <span>العملاء</span>
                                    <!-- Name -->
                                    <input type="text" name="emailuser" id="name" required="required" class="form"
                                        placeholder="بريد الاستراجاع" />
                                    <!-- Email -->
                                    <input type="email" name="account" id="mail" required="required" class="form"
                                        placeholder="بريد الحساب الخاص بك لدينا" />
                                    <!-- Subject -->
                                    <input type="text" name="answer" id="subject" required="required" class="form"
                                        placeholder="اجابة السوال السري" />
                                    <!-- Subject -->
                                    <input type="text" name="newpassword" id="subject" required="required" class="form"
                                        placeholder="كلمة المرور الجديدة" />

                                </div><!-- End Left Inputs -->
                                <!-- Right Inputs -->
                                                            <!-- Message -->
                            <textarea name="message" id="message" class="form textarea"  placeholder="Message"></textarea>
                        </div><!-- End Right Inputs -->

                                <!-- Bottom Submit -->
                                <div class="relative fullwidth col-xs-12">
                                    <!-- Send Button -->
                                    <button type="submit" id="submit" name="submit" class="form-btn semibold"><i
                                            class="fa fa-telegram" aria-hidden="true"></i> ارسال الابلاغ </button>
                                </div><!-- End Bottom Submit -->
                                <!-- Clear -->
                                <div class="clear"></div>
                            </form>



                        </div><!-- End Contact Form Area -->
                    </div><!-- End Inner -->

                </div>

            </div>
        </div>
    </div>
</div>
<style>
    #contact {
        padding: 10px 0 10px;
    }

    .contact-text {
        margin: 45px auto;

    }

    #contact-us input,
    textarea {
        text-align: right;
    }

    .mail-message-area {
        width: 100%;
        padding: 0 15px;
    }

    .mail-message {
        width: 100%;
        background: rgba(255, 255, 255, 0.8) !important;
        -webkit-transition: all 0.7s;
        -moz-transition: all 0.7s;
        transition: all 0.7s;
        margin: 0 auto;
        border-radius: 0;
    }

    .not-visible-message {
        height: 0px;
        opacity: 0;
    }

    .visible-message {
        height: auto;
        opacity: 1;
        margin: 25px auto 0;
    }

    /* Input Styles */

    .form {
        width: 100%;
        padding: 15px;
        background: #f8f8f8;
        border: 1px solid rgba(0, 0, 0, 0.075);
        margin-bottom: 25px;
        color: #727272 !important;
        font-size: 13px;
        -webkit-transition: all 0.4s;
        -moz-transition: all 0.4s;
        transition: all 0.4s;
    }

    .form:hover {
        border: 1px solid #8BC3A3;
    }

    .form:focus {
        color: white;
        outline: none;
        border: 1px solid #8BC3A3;
    }

    .textarea {
        height: 200px;
        max-height: 200px;
        max-width: 100%;
    }

    /* Generic Button Styles */

    .button {
        padding: 8px 12px;
        background: #0A5175;
        display: block;
        width: 120px;
        margin: 10px 0 0px 0;
        border-radius: 3px;
        -webkit-transition: all 0.3s;
        -moz-transition: all 0.3s;
        transition: all 0.3s;
        text-align: center;
        font-size: 0.8em;
        box-shadow: 0px 1px 4px rgba(0, 0, 0, 0.10);
        -moz-box-shadow: 0px 1px 4px rgba(0, 0, 0, 0.10);
        -webkit-box-shadow: 0px 1px 4px rgba(0, 0, 0, 0.10);
    }

    .button:hover {
        background: #8BC3A3;
        color: white;
    }

    /* Send Button Styles */

    .form-btn {
        width: 180px;
        display: block;
        height: auto;
        padding: 15px;
        color: #fff;
        background: #8BC3A3;
        border: none;
        border-radius: 3px;
        outline: none;
        -webkit-transition: all 0.3s;
        -moz-transition: all 0.3s;
        transition: all 0.3s;
        margin: auto;
        box-shadow: 0px 1px 4px rgba(0, 0, 0, 0.10);
        -moz-box-shadow: 0px 1px 4px rgba(0, 0, 0, 0.10);
        -webkit-box-shadow: 0px 1px 4px rgba(0, 0, 0, 0.10);
    }

    .form-btn:hover {
        background: #111;
        color: white;
        border: none;
    }

    .form-btn:active {
        opacity: 0.9;
    }

    center {
        margin-top: 330px;
    }

    input {
        position: relative;
        z-index: 9999;
    }
</style>
</div>
@endsection
