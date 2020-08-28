<header>
    <div class="container">
        <div class="header-data">
            <div class="logo">
            <a href="{{url('/')}}">مَجالـ</a>
            </div>
            <!--logo end-->
            @auth

            <div class="search-bar">
                <form action="{{url('/searchuser/')}}" method="get" id="custom-search-input">
                    @csrf
                    <input type="text" id="search" name="search" placeholder="Search...">
                    <button type="submit"><i class="la la-search"></i></button>
                </form>
            </div>
            <!--search-bar end-->
            <nav>
                <ul>
                    <li>
                        <a href="{{url('/AllPages')}}" title="">
                            <span><img src="{{url('images/icon2.png')}}" alt=""></span>
                            الصفحات
                        </a>
                    </li>
                    <li>
                        <a href="{{url('/MarketPlace')}}" title="">
                            <span><img src="{{url('images/icon5.png')}}" alt=""></span>
                            ماركت
                        </a>
                    </li>
                    <li>
                        <a href="#" title="" class="not-box-open">
                            <span><img src="{{url('images/icon6.png')}}" alt=""></span>
                            الرسائل
                        </a>
                        <div class="notification-box msg">
                            <div class="nt-title">

                            </div>
                            <div class="nott-list">
                                @foreach ($chats as $chat)

                                <div class="notfication-details">
                                    <div class="noty-user-img">
                                        <img src="{{url('images/resources/ny-img1.png')}}" alt="">
                                    </div>
                                    <div class="notification-info">
                                        <h3><a href="{{url('/message/'.$chat->sender)}}">{{$chat->userchat->name}}</a> </h3>
                                        <p>{{$chat->message}}</p>
                                        <span>{{$chat->created_at->diffForHumans()}}</span>
                                    </div>
                                    <!--notification-info -->
                                </div>
                                @endforeach

                                <div class="view-all-nots">
                                    <a href="{{('/room')}}" title="">عرض جميع الرسائل</a>
                                </div>
                            </div>
                            <!--nott-list end-->
                        </div>
                        <!--notification-box end-->
                    </li>
                    <li>
                        <a href="#" title="" class="not-box-open">
                            <span><img src="{{url('images/icon7.png')}}" alt=""></span>
                            الاشعارات
                        </a>
                        <div class="notification-box">
                            <div class="nt-title">

                            </div>
                            <div class="nott-list">
                                @foreach ($notfiy as $not)

                                <div class="notfication-details">
                                    @foreach ($AdminUsers as $usernot)
                                    @if ($usernot->id == $not->data['user'])
                                    <div class="noty-user-img">
                                        <img src="{{url('profile/'.$usernot->image)}}" width="30px" height="30px" alt="">
                                    </div>
                                    <div class="notification-info">
                                        <h3><a href="{{url('/show/'.$not->data['user'].'/'.'newfollow')}}" title=""> بمتابعتك{{$usernot->name}} قام</a></h3>
                                        <span>{{$not->created_at->diffForHumans()}}</span>
                                    </div>
                                    @endif
                                    @endforeach
                                    <!--notification-info -->
                                </div>
                                @endforeach

                                <div class="view-all-nots">
                                    <a href="#" title="">View All Notification</a>
                                </div>
                            </div>
                            <!--nott-list end-->
                        </div>
                        <!--notification-box end-->
                    </li>
                    <li>
                        <a href="{{url('/')}}" title="">
                            <span><img src="{{url('images/icon1.png')}}" alt=""></span>
                            الرئيسية
                        </a>
                    </li>
                </ul>
            </nav>
            <!--nav end-->
            @endauth
            <div class="menu-btn">
                <a href="#" title=""><i class="fa fa-bars"></i></a>
            </div>
            <!--menu-btn end-->
            @auth

            <div class="user-account">
                <div class="user-info">
                    <img src="{{ asset('/profile/' . Auth::user()->image)}}" width="35px" height="35px" alt="">
                    <a href="{{url('/profile/'.Auth::user()->name)}}" title="">{{str_limit(Auth::user()->name, 4)}}</a>
                    <i class="la la-sort-down"></i>
                </div>
                <div class="user-account-settingss">
                    <h3>حسابي</h3>
                    <ul class="us-links right">
                        <li><a href="{{url('/profile/'.Auth::user()->name)}}" title="">الصفحة الشخصية</a></li>
                        @if ($pageAuth)
                        <li><a href="{{('/page/'.$pageAuth->id.'/'.$pageAuth->namepage.'/'.$pageAuth->servis)}}" title=""> {{$pageAuth->namepage}}</a></li>
                        @else
                        <li><a href="{{('/AllPages')}}" title=""> انشاء صفحة</a></li>
                        @endif
                    </ul>
                    <!--search_form end-->
                    <h3>اعدادات </h3>
                    <ul class="us-links">
                        <li><a href="{{url('/users/'.Auth::id().'/edit')}}" title=""> تعديل حسابي</a></li>
                        @if ($pageAuth)
                    <li><a href="{{url('/editmypage/'.$pageAuth->id.'/'.$pageAuth->namepage)}}" title="">تعديل صفحتي</a></li>
                        @endif
                        @if (Auth::user()->per == '1')
                    <li><a href="{{url('/dashboard')}}" title="dashboard">dashboard</a></li>
                        @endif
                        {{-- <li><a href="#" title="">Terms & Conditions</a></li> --}}
                    </ul>
                    <h3 class="tc"><a href="{{ route('logout') }}" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();" title="">تسجيل الخروج</a></h3>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
                <!--user-account-settingss end-->
            </div>
            @endauth
        </div>
        <!--header-data end-->
    </div>
</header>
<!--header end-->
