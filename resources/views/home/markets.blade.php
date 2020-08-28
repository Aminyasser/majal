@extends('layouts.naw_app')
@section('title', 'pages')

@section('contant')


<!--search-sec end-->
<main>
    <div class="main-section">
        <div class="container">
            <div class="post-topbar">
                <div class="user-picy">
                    <img src="{{ asset('/profile/' . Auth::user()->image)}}" width="50px" height="50px" alt="">
                </div>
                <div class="post-st">
                    <ul>
                        <li><a class="post-jb active" href="#" title=""> بيع</a></li>
                    </ul>
                </div>
                <!--post-st end-->
            </div>
            <!--company-title end-->
            <div class="companies-list">
                <div class="row">
                    @foreach ($services as $service)
                    <div class="col-lg-4 col-md-4 col-sm-6">
                        <div class="company_profile_info">
                            <div class="company-up-info">
                                <img src="{{ asset('/pics/' . $service->pic)}}" width="90px" height="90px" alt="">
                                <h3>{{str_limit($service->dis_services, 10)}}</h3>
                                <h4>{{$service->created_at->diffForHumans()}}</h4>
                                <ul>
                                    <li><a href="" title="" class="follow">{{$service->viewservices->count()}}</a></li>
                                    <li><a href="" title="" class="follow">{{$service->price}}</a></li>

                                </ul>
                            </div>
                            <a href="{{url('/service/'.$service->id.'/'.$service->dis_services)}}" title="" class="view-more-pro">عرض</a>
                        </div>
                        <!--company_profile_info end-->
                    </div>
                    @endforeach


                </div>
            </div>
            <!--companies-list end-->

            <!--process-comm end-->
        </div>
    </div>
</main>
<div class="post-popup job_post">
    <div class="post-project">
        <h3>انشاء منشور</h3>
        <div class="post-project-fields">

        <form action="{{url('/saveservices')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <input type="text" hidden name="user_id">
                    <div class="col-6 col-md-3">
                        <input type="text" placeholder="السعر" name="price" id="">
                    </div>
                    <div class="col-6 col-md-3">
                        <input type="text" placeholder="اسم الخدمة" name="name_services" id="">
                    </div>
                    <div class="col-6 col-md-3">
                        <input type="text" placeholder="الرقم" name="phone" id="">
                    </div>
                    <div class="col-6 col-md-3">
                        <select name="place" id="">
                            @foreach ($citys as $city)
                            <option value="{{$city->id}}">{{$city->city_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-lg-12">
                        <textarea placeholder="انشر شئيا جديدا"  name="dis_services"></textarea>
                    </div>
                    <div class="col-6 col-md-3">
                        <input type="file" name="pic" id="input-file-now"  class="dropify" />
                    </div>
                    <div class="col-6 col-md-3">
                        <input type="file" name="pic1" id="input-file-now"  class="dropify" />
                    </div>
                    <div class="col-6 col-md-3">
                        <input type="file" name="pic2" id="input-file-now"  class="dropify" />
                    </div>
                    <div class="col-6 col-md-3">
                        <input type="file" name="pic3" id="input-file-now"  class="dropify" />
                    </div>
                    @if (Auth::user()->per == '1')
                    <div class="col-12">
                        <select name="Status" id="">
                            <option value="D">عرض</option>
                            <option value="B">عدم العرض</option>
                        </select>
                    </div>
                    @endif
                    <div class="col-lg-12">
                        <ul>
                            <li><button class="active" type="submit" value="post">Post</button></li>
                        </ul>
                    </div>
                </div>
            </form>

        </div>
        <!--post-project-fields end-->
        <a href="#" title=""><i class="la la-times-circle-o"></i></a>
    </div>
    <!--post-project end-->
</div>

<!--companies-info end-->
@endsection
