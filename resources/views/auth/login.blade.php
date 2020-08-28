@extends('layouts.naw_app')
@section('title', 'دخول')

@section('contant')

<div class="wrapper">
    <div class="sign-in-page">
        <div class="signin-popup">
            <div class="signin-pop">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="cmp-info">
                            <div class="cm-logo right">
                                <div>مَجالـ</div>
                                {{-- <img src="{{asset('/logo/'.'logoo.png')}}" style="background-color: black;
                                border-radius: 0px 15px 15px 15px;" alt=""> --}}
                                <p> مَجالـ يقدم لك تجربة فريدة حيث يمكنك ادارة نشاطك التجاري وتكوين صدقات جديدة ومعرفة ما يحدث من حولك وما يتبعه اصدقائك واكثر </p>
                            </div>
                            <!--cm-logo end-->
                            <img src="{{url('images/cm-main-img.png')}}" alt="">
                        </div>
                        <!--cmp-info end-->
                    </div>
                    <div class="col-lg-6">
                        <div class="login-sec">
                            <ul class="sign-control">
                                <li data-tab="tab-1" class="current"><a href="#" title="">تسجيل الدخول</a></li>
                                <li data-tab="tab-2"><a href="#" title="">التسجيل</a></li>
                            </ul>
                            <div class="sign_in_sec current" id="tab-1">
                                <h3> الدخول</h3>
                                <form method="POST" class="center-web" action="{{ route('login') }}">
                                    @csrf
                                    <div class="row">
                                        <div class="col-lg-12 no-pdd">
                                            <div class="sn-field">
                                                <input type="text" name="identity" placeholder="Username Or email" @error('identity') is-invalid @enderror" name="email"
                                                value="{{ old('identity') }}" required autocomplete="identity" autofocus>
                                                <i class="la la-user"></i>
                                                @error('identity')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                            <!--sn-field end-->
                                        </div>
                                        <div class="col-lg-12 no-pdd">
                                            <div class="sn-field">
                                                <input type="password" name="password" placeholder="Password"  @error('password') is-invalid @enderror" name="password"
                                                required autocomplete="current-password">
                                                <i class="la la-lock"></i>
                                                @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-12 no-pdd">
                                            <div class="checky-sec">
                                                <div class="fgt-sec">
                                                    <input type="checkbox"  id="c1" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                                    <label for="c1">
                                                        <span></span>
                                                    </label>
                                                    <small>تذكرني</small>
                                                </div>
                                                <!--fgt-sec end-->
                                                @if (Route::has('password.request'))
                                                <a href="{{ route('password.request') }}" title="">نسيت كلمة المرور</a>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-lg-12 no-pdd right">
                                            <button type="submit" value="submit">الدخول</button>
                                        </div>
                                    </div>
                                </form>
                                {{-- <div class="login-resources">
                                    <h4>Login Via Social Account</h4>
                                    <ul>
                                        <li><a href="#" title="" class="fb"><i class="fa fa-facebook"></i>Login Via Facebook</a></li>
                                        <li><a href="#" title="" class="tw"><i class="fa fa-twitter"></i>Login Via Twitter</a></li>
                                    </ul>
                                </div> --}}
                                <!--login-resources end-->
                            </div>
                            <!--sign_in_sec end-->
                            <div class="sign_in_sec" id="tab-2">
                                <!--signup-tab end-->
                                <div class="dff-tab current" id="tab-3">
                                    <form action="{{ route('register') }}" method="POST">
                                    @csrf

                                        <div class="row">
                                            <div class="col-lg-12 no-pdd">
                                                <div class="sn-field">
                                                    <input type="text" class="right @error('name') is-invalid @enderror" value="{{ old('name') }}" required  name="name" placeholder="الاسم كامل">
                                                    <i class="la la-user"></i>
                                                </div>
                                            </div>
                                            <div class="col-lg-12 no-pdd">
                                                <div class="sn-field">
                                                    <input type="email" name="email"  value="{{ old('email') }}" class="right @error('email') is-invalid @enderror" placeholder="البريد الالكتروني">
                                                    <i class="la la-envelope"></i>
                                                    @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-12 no-pdd">
                                                <div class="sn-field">
                                                    <input type="date" class="right"  required  name="date" placeholder="تاريخ الميلاد">
                                                    <i class="la la-calendar"></i>
                                                </div>
                                            </div>
                                            <div class="col-lg-12 no-pdd">
                                                <div class="sn-field">
                                                    <select>
                                                        <option value="male">ذكر</option>
                                                        <option value="female">انثي</option>
                                                    </select>
                                                    <i class="la la-users"></i>
                                                    <span><i class="fa fa-ellipsis-h"></i></span>
                                                </div>
                                            </div>
                                            <div class="col-lg-12 no-pdd">
                                                <div class="sn-field">
                                                    <input type="password" name="password" class="right @error('password') is-invalid @enderror" placeholder="كلمة المرور">
                                                    <i class="la la-lock"></i>
                                                </div>
                                            </div>
                                            <div class="col-lg-12 no-pdd">
                                                <div class="sn-field">
                                                    <input type="password"  class="right" name="password_confirmation" required placeholder="تاكيد كلمة المرور">
                                                    <i class="la la-lock"></i>
                                                </div>
                                            </div>
                                            <div class="col-lg-12 no-pdd">
                                                <div class="checky-sec st2">
                                                    <div class="fgt-sec right">
                                                        <input type="checkbox" required name="cc" id="c2">
                                                        <label for="c2">
                                                            <span></span>
                                                        </label>
                                                        <small>اوافق علي الـتسـجـيل والشـروط والاحكام التابـعـة لـ مَجالـ</small>
                                                    </div>
                                                    <!--fgt-sec end-->
                                                </div>
                                            </div>
                                            <div class="col-lg-12 no-pdd right">
                                                <button type="submit" value="submit">لـنبدء</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <!--dff-tab end-->

                                <!--dff-tab end-->
                            </div>
                        </div>
                        <!--login-sec end-->
                    </div>
                </div>
            </div>
            <!--signin-pop end-->
        </div>
        <!--signin-popup end-->

        <!--footy-sec end-->
    </div>
    <!--sign-in-page end-->
</div>
<!--theme-layout end-->
<style>
    header {
        display: none;
    }
</style>
@endsection
