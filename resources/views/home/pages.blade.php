@extends('layouts.naw_app')
@section('title', 'pages')

@section('contant')

<main class="companies-info">
    <div class="container">
        <div class="post-topbar">
            <div class="user-picy">
                <img src="{{ asset('/profile/' . Auth::user()->image)}}" width="50px" height="50px" alt="">
            </div>
            <div class="post-st">
                <ul>
                    @if ($pageAuth)
                    <li><a class="" href="{{('/page/'.$pageAuth->id.'/'.$pageAuth->namepage.'/'.$pageAuth->servis)}}" title=""> {{$pageAuth->namepage}}</a></li>

                    @else

                    <li><a class="post-jb active" href="#" title="">انشاء صفحتي</a></li>
                    @endif
                </ul>
            </div>
            <!--post-st end-->
        </div>
        <!--company-title end-->
        <div class="companies-list">
            <div class="row">
                @foreach ($pages as $page)
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="company_profile_info">
                        <div class="company-up-info">
                            <img src="{{ asset('/pages/' . $page->pic)}}" width="90px" height="90px" alt="">
                            <h3>{{$page->namepage}}</h3>
                            <h4>{{$page->created_at->diffForHumans()}}</h4>
                            <ul>
                                @if(in_array($page->id,$likeId))
                                <li><a href="#" title="" class="follow">اعجبتك</a></li>
                                @else
                                <li><a href="{{url('/like/'.$page->id)}}" data-id="{{$page->id}}" title="" class="follow">اعجبني</a></li>
                                @endif
                                <li><a title="" class="message-us"> {{$page->pagelike->count()}}<i class="fa fa-eye"></i></a></li>
                            </ul>
                        </div>
                        <a href="{{'/page/'.$page->id.'/'.$page->namepage.'/'.$page->servis}}" title="" class="view-more-pro">View Profile</a>
                    </div>
                    <!--company_profile_info end-->
                </div>
                @endforeach

            </div>
        </div>
        <!--companies-list end-->

        <!--process-comm end-->
    </div>
</main>
<div class="post-popup job_post">
    <div class="post-project">
        <h3>انشاء صفحة</h3>
        <div class="post-project-fields">
            <form action="{{url('/nawpage')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <input type="text" hidden name="user_id">
                    <div class="col-6 col-md-3">
                        <input type="text" placeholder="اسم الصفحة" style="direction: rtl;" name="namepage" id="">
                    </div>
                    <div class="col-6 col-md-3">
                        <input type="text" placeholder="عن الخدمة" style="direction: rtl;" name="servis" id="">
                    </div>
                    <div class="col-6 col-md-3">
                        <input type="text" placeholder="الرقم" style="direction: rtl;" name="phone" id="">
                    </div>
                    <div class="col-6 col-md-3">
                        <select name="place" id="">
                            @foreach ($AdminCity as $city)
                            <option value="{{$city->id}}">{{$city->city_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-lg-12">
                        <textarea placeholder="معلومات عن الصفحة" style="direction: rtl;" name="about"></textarea>
                    </div>
                    <div class="col-6 ">
                        <input type="file" name="pic" id="input-file-now" class="dropify" />
                    </div>
                    <div class="col-6 ">
                        <input type="file" name="cover" id="input-file-now" class="dropify" />
                    </div>
                    <div class="col-lg-12">
                        <ul>
                            <li><button class="active" type="submit" value="post">انشاء</button></li>
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
<script>
    $('#like').click(function(event) {
        event.preventDefault();
        console.log('clicked')

        var id = $(this).attr('data-id');

        console.log('   ' + id);
        $.ajax({
            url: '/like/' + id,
            method: 'get',
            data: {
                page_id: id,
            },
            success: function(response) {
                $('#like').html('اعجبني ').prop('disabled', true);
            }
        })
    })
</script>
@endsection
