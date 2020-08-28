@extends('layouts.naw_app')
@section('title', 'تعديل حسابي')

@section('contant')

<section class="profile-account-setting">
    <div class="container">
        <div class="account-tabs-setting">
            <div class="row">
                <div class="col-lg-3">
                    <div class="acc-leftbar">
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                            <a class="nav-item nav-link active" id="nav-acc-tab" data-toggle="tab" href="#nav-acc" role="tab" aria-controls="nav-acc" aria-selected="true"><i class="la la-image"></i>الصورة الشخصية</a>
                            <a class="nav-item nav-link" id="nav-status-tab" data-toggle="tab" href="#nav-status" role="tab" aria-controls="nav-status" aria-selected="false"><i class="fa fa-line-chart"></i>حالة الحساب</a>
                            <a class="nav-item nav-link" id="nav-password-tab" data-toggle="tab" href="#nav-password" role="tab" aria-controls="nav-password" aria-selected="false"><i class="fa fa-lock"></i>اعدادت الامان</a>
                            <a class="nav-item nav-link" id="nav-notification-tab" data-toggle="tab" href="#nav-notification" role="tab" aria-controls="nav-notification" aria-selected="false"><i class="fa fa-flash"></i>اشعارات حسابك</a>
                            <a class="nav-item nav-link" id="nav-requests-tab" data-toggle="tab" href="#nav-requests" role="tab" aria-controls="nav-requests" aria-selected="false"><i class="fa fa-cogs"></i>اعدادات حسابي</a>
                            <!-- <a class="nav-item nav-link" id="security-login" data-toggle="tab" href="#security-login" role="tab" aria-controls="security-login" aria-selected="false"><i class="fa fa-user-secret"></i>Security and Login</a>
                            <a class="nav-item nav-link" id="privacy" data-toggle="tab" href="#privacy" role="tab" aria-controls="privacy" aria-selected="false"><i class="fa fa-paw"></i>Privacy</a>
                            <a class="nav-item nav-link" id="blockking" data-toggle="tab" href="#blockking" role="tab" aria-controls="blockking" aria-selected="false"><i class="fa fa-cc-diners-club"></i>Blocking</a> -->
                            <a class="nav-item nav-link" id="nav-deactivate-tab" data-toggle="tab" href="#nav-deactivate" role="tab" aria-controls="nav-deactivate" aria-selected="false"><i class="fa fa-close"></i>حذف الحساب</a>
                        </div>
                    </div>
                    <!--acc-leftbar end-->
                </div>
                <div class="col-lg-9">
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="nav-acc" role="tabpanel" aria-labelledby="nav-acc-tab">
                            <div class="acc-setting">
                                <h3>الصور الخاصة بك</h3>k
                                <form action="{{'/userpro/'.$user->id}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="notbar right">
                                        <h4>الصورة الشخصية</h4>
                                        <input type="file" name="image" value="" id="input-file-now" class="dropify" @if ($user->image) data-default-file="{{ asset('/profile/' . $user->image)}}" @endif />
                                    </div>
                                    <!--notbar end-->
                                    <div class="notbar right">
                                        <h4> صورة الغلاف</h4>
                                        <input type="file" name="cover" value="" id="input-file-now" class="dropify" @if ($user->cover) data-default-file="{{ asset('/coverpro/' . $user->cover)}}" @endif />
                                    </div>

                                    <div class="save-stngs center">
                                        <ul>
                                            <li><button type="submit">حفظ </button></li>
                                        </ul>
                                    </div>
                                    <!--save-stngs end-->
                                </form>
                            </div>
                            <!--acc-setting end-->
                        </div>
                        <div class="tab-pane fade" id="nav-status" role="tabpanel" aria-labelledby="nav-status-tab">
                            <div class="acc-setting right">
                                <h3>حالة حسابك</h3>
                                <div class="profile-bx-details">
                                    <div class="row">
                                        <div class="col-lg-3 col-md-6 col-sm-12">
                                            <div class="profile-bx-info">
                                                <div class="pro-bx">
                                                    <img src="images/pro-icon1.png" alt="">
                                                    <div class="bx-info">
                                                    <h3>{{$user->likesprofile->count()}}</h3>
                                                        <h5>عدد الاعجابات</h5>
                                                    </div>
                                                    <!--bx-info end-->
                                                </div>
                                                <!--pro-bx end-->
                                                <p>عدد الاعجابات التي قمت بها </p>
                                            </div>
                                            <!--profile-bx-info end-->
                                        </div>
                                        <div class="col-lg-3 col-md-6 col-sm-12">
                                            <div class="profile-bx-info">
                                                <div class="pro-bx">
                                                    <img src="images/pro-icon2.png" alt="">
                                                    <div class="bx-info">
                                                    <h3>{{$user->commentsprofile->count()}}</h3>
                                                        <h5>عدد التعليقات</h5>
                                                    </div>
                                                    <!--bx-info end-->
                                                </div>
                                                <!--pro-bx end-->
                                                <p>عدد التعليقات التي قمت بها</p>
                                            </div>
                                            <!--profile-bx-info end-->
                                        </div>
                                        <div class="col-lg-3 col-md-6 col-sm-12">
                                            <div class="profile-bx-info">
                                                <div class="pro-bx">
                                                    <img src="images/pro-icon3.png" alt="">
                                                    <div class="bx-info">
                                                    <h3>{{$user->likesprofile->count()}}</h3>
                                                        <h5>عدد المشاهدات</h5>
                                                    </div>
                                                    <!--bx-info end-->
                                                </div>
                                                <!--pro-bx end-->
                                                <p>عدد المشاهدات التي قمت بها</p>
                                            </div>
                                            <!--profile-bx-info end-->
                                        </div>
                                        <div class="col-lg-3 col-md-6 col-sm-12">
                                            <div class="profile-bx-info">
                                                <div class="pro-bx">
                                                    <img src="images/pro-icon4.png" alt="">
                                                    <div class="bx-info">
                                                    <h3>{{$user->posts->count()}}</h3>
                                                        <h5>عدد المنشورات</h5>
                                                    </div>
                                                    <!--bx-info end-->
                                                </div>
                                                <!--pro-bx end-->
                                                <p>عدد المنشورات التي قمت بها</p>
                                            </div>
                                            <!--profile-bx-info end-->
                                        </div>
                                    </div>
                                </div>
                                <!--profile-bx-details end-->
                                <div class="pro-work-status">
                                    <!-- <h4>Work Status  -  Last Months Working Status</h4> -->
                                </div>
                                <!--pro-work-status end-->
                            </div>
                            <!--acc-setting end-->
                        </div>
                        <div class="tab-pane fade" id="nav-password" role="tabpanel" aria-labelledby="nav-password-tab">
                            <div class="acc-setting right">
                                <h3>اعدادت الامان</h3>
                                <form action="{{'/users/'. $user->id}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="cp-field">
                                        <h5>البريد الالكتروني</h5>
                                        <div class="cpp-fiel">
                                            <input type="text" name="email" value="{{$user->email}}" placeholder="Email">
                                            <i class="fa fa-envelope"></i>
                                        </div>
                                    </div>
                                    <div class="cp-field">
                                        <h5>اسم المتسخدم</h5>
                                        <div class="cpp-fiel">
                                            <input type="text" name="user_name" value="{{$user->user_name}}" placeholder="user name">
                                            <i class="fa fa-user"></i>
                                        </div>
                                    </div>
                                    <div class="cp-field">
                                        <h5>كلمة المرور</h5>
                                        <div class="cpp-fiel">
                                            <input type="text" required name="oldpassword" placeholder="Old Password">
                                            <i class="fa fa-lock"></i>
                                        </div>
                                    </div>
                                    <div class="cp-field">
                                        <h5>كلمة المرور الجديدة</h5>
                                        <div class="cpp-fiel">
                                            <input type="text" name="newpassword" placeholder="New Password">
                                            <i class="fa fa-lock"></i>
                                        </div>
                                    </div>
                                    <div class="save-stngs pd2">
                                        <ul class="center">
                                            <li><button type="submit">حفظ</button></li>
                                            <li><button type="reset">الافتراضي</button></li>
                                        </ul>
                                    </div>
                                    <!--save-stngs end-->
                                </form>
                            </div>
                            <!--acc-setting end-->
                        </div>
                        {{-- <div class="tab-pane fade" id="nav-notification" role="tabpanel" aria-labelledby="nav-notification-tab">
                            <div class="acc-setting ">
                                <h3>الاشعارات</h3>
                                <div class="notifications-list">
                                    @foreach ($notfiy as $not)

                                    <div class="notfication-details">
                                        @foreach ($AdminUsers as $usernot)
                                        @if ($usernot->id == $not->data['user'])
                                        <div class="noty-user-img">
                                            <img src="http://via.placeholder.com/35x35" width="35px" height="35px" alt="">
                                        </div>
                                        <div class="notification-info">
                                            <h3><a href="{{url('/show/'.$not->data['user'].'/'.'newfollow')}}" title=""> بمتابعتك{{$usernot->name}} قام</h3>
                                            <span>{{$not->created_at->diffForHumans()}}</span>
                                        </div>
                                        @endif
                                        @endforeach
                                        <!--notification-info -->
                                    </div>

                                    @endforeach
                                    <!--notfication-details end-->
                                </div>
                                <!--notifications-list end-->
                            </div>
                            <!--acc-setting end-->
                        </div> --}}
                        <div class="tab-pane fade" id="nav-requests" role="tabpanel" aria-labelledby="nav-requests-tab">
                            <div class="acc-setting right">
                                <h3>اعدادات الحساب</h3>
                            <form action="{{url('/users/'.$user->id.'/info')}}" method="POST">
                                @csrf
                                @method('PUT')
                                    <div class="cp-field">
                                        <h5>الاسم كامل</h5>
                                        <div class="cpp-fiel">
                                        <input type="text" class="right" value="{{$user->name}}" name="name" placeholder="الاسم كامل">
                                            <i class="fa fa-user"></i>
                                        </div>
                                    </div>
                                    <div class="cp-field">
                                        <h5>الاسم المستعار</h5>
                                        <div class="cpp-fiel">
                                        <input type="text" class="right"  value="{{$user->about}}" name="about" placeholder="الاسم المستعار">
                                            <i class="fa fa-user"></i>
                                        </div>
                                    </div>
                                    <div class="cp-field">
                                        <h5>تاريح الميلاد</h5>
                                        <div class="cpp-fiel">
                                        <input type="date" value="{{$user->date}}" name="date" placeholder="">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                    </div>
                                    <div class="cp-field">
                                        <h5>المكان</h5>
                                        <div class="cpp-fiel">
                                            <select name="city" id="" style="width: 100%;padding: 10px 46px;border: 1px solid #e5e5e5;">
                                            <option value="{{$user->city}}" selected>{{$user->City->city_name}}</option>
                                            @foreach ($AdminCity as $city)
                                            <option value="{{$city->id}}">{{$city->city_name}}</option>
                                            @endforeach
                                            </select>
                                            <i class="fa fa-globe"></i>
                                        </div>
                                    </div>
                                    <div class="cp-field">
                                        <h5>الوظيفة</h5>
                                        <div class="cpp-fiel">
                                            <select name="job" id="" style="width: 100%;padding: 10px 46px;border: 1px solid #e5e5e5;">
                                            <option value="{{$user->job}}" selected>{{$user->Job->job_name}}</option>
                                            @foreach ($Adminjob as $job)
                                            <option value="{{$job->id}}">{{$job->job_name}}</option>
                                            @endforeach
                                            </select>
                                            <i class="fa fa-briefcase"></i>
                                        </div>
                                    </div>
                                    <div class="cp-field">
                                        <h5>الانستجرام</h5>
                                        <div class="cpp-fiel">
                                        <input type="text" value="{{$user->inst}}" class="right" name="inst" placeholder="لينك الانستجرام">
                                            <i class="fa fa-instagram"></i>
                                        </div>
                                    </div>
                                    <div class="save-stngs pd2">
                                        <ul class="center">
                                            <li><button type="submit">حفظ</button></li>
                                        </ul>
                                    </div>
                                    <!--save-stngs end-->
                                </form>
                                <!--requests-list end-->
                            </div>
                            <!--acc-setting end-->
                        </div>
                        <div class="tab-pane fade" id="nav-deactivate" role="tabpanel" aria-labelledby="nav-deactivate-tab">
                            <div class="acc-setting right">
                                <h3>حذف حسابي</h3>
                            <form action="{{url('/users/'.$user->id.'/delete')}}" method="POST">
                                @method('DELETE')
                                @csrf
                                    <div class="cp-field">
                                        <h5>البريد الخاص بالحساب</h5>
                                        <div class="cpp-fiel">
                                        <input type="text" name="email" value="{{$user->email}}" readonly placeholder="Email">
                                            <i class="fa fa-envelope"></i>
                                        </div>
                                    </div>
                                    <div class="cp-field">
                                        <h5>كلمة المرور</h5>
                                        <div class="cpp-fiel">
                                            <input type="password" name="oldpassword" placeholder="Password">
                                            <i class="fa fa-lock"></i>
                                        </div>
                                    </div>
                                    <div class="cp-field">
                                        <h5>يرجي ذكر سبب حذف الحساب</h5>
                                        <textarea style="direction: rtl;"></textarea>
                                    </div>
                                    <div class="cp-field right">
                                        <div class="fgt-sec right">
                                            <input type="checkbox" name="cc" id="c4">
                                            <label for="c4">
                                                <span></span>
                                            </label>
                                            <small>حذف جميع بيانتي</small>
                                        </div>
                                        <p>سيتم حذف جميع بيانتي نهائيأ من الموقع </p>
                                    </div>
                                    <div class="save-stngs pd3">
                                        <ul>
                                            <li><button type="submit">حذف</button></li>
                                        </ul>
                                    </div>
                                    <!--save-stngs end-->
                                </form>
                            </div>
                            <!--acc-setting end-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--account-tabs-setting end-->
    </div>
</section>
@endsection
