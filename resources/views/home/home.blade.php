@extends('layouts.naw_app')
@section('title', 'الرئيسية')

@section('contant')


<main>
    <div class="main-section">
        <div class="container">
            <div class="main-section-data">
                <div class="row">
                    <div class="col-lg-3 col-md-4 pd-left-none no-pd">
                        <div class="main-left-sidebar no-margin">
                            <div class="user-data full-width">
                                <div class="user-profile">
                                    <div class="username-dt">
                                        <div class="usr-pic">
                                            <img src="{{ asset('/profile/' . Auth::user()->image)}}" width="100px" height="100px" alt="">
                                        </div>
                                    </div>
                                    <!--username-dt end-->
                                    <div class="user-specs">
                                        <h3>{{Auth::user()->name}}</h3>
                                        <span>{{Auth::user()->about}}</span>
                                    </div>
                                </div>
                                <!--user-profile end-->
                                <ul class="user-fw-status">
                                    <li>
                                        <h4>اتابع</h4>
                                        <span>@if ($following)
                                            {{$following->count()}}
                                            @endif</span>
                                    </li>
                                    <li>
                                        <h4>متابعين</h4>
                                        <span>@if ($followes)
                                            {{$followes->count()}}
                                            @endif</span>
                                    </li>
                                    <li>
                                        <a href="{{url('/profile/'.Auth::user()->name)}}" title="">صفحتي </a>
                                    </li>
                                </ul>
                            </div>
                            <!--user-data end-->
                            <div class="suggestions full-width">
                                <div class="sd-title">
                                    <h3>اقتراحات</h3>
                                    <i class="la la-ellipsis-v"></i>
                                </div>
                                <!--sd-title end-->
                                <div class="suggestions-list">
                                    @foreach ($users as $user)
                                    @if ($user->id != Auth::id())
                                    <div class="suggestion-usd">
                                        <img src="{{ asset('/profile/' . $user->image)}}" width="40px" alt="">
                                        <div class="sgt-text">
                                            <h4>{{$user->name}}</h4>
                                            <span>{{$user->about}}</span>
                                        </div>
                                        <span> <a href="{{'/freind/'.$user->id}}"><i class="la la-plus"></i></a></span>
                                    </div>
                                    @endif
                                    @endforeach
                                    <div class="view-more">
                                        <a href="{{url('/profiles')}}" title="">View More</a>
                                    </div>
                                </div>

                                <!--suggestions-list end-->
                            </div>
                            <!--suggestions end-->
                            <div class="suggestions full-width">
                                <div class="sd-title">
                                    <h3>شاهدته</h3>
                                    <i class="la la-ellipsis-v"></i>
                                </div>
                                <!--sd-title end-->


                                <div class="suggestions-list">
                                    @foreach ($postsviews as $postsview)
                                    <div class="suggestion-usd">
                                        <img src="{{ asset('/profile/' . $postsview->userpost->image)}}" width="40px" alt="">
                                        <div class="sgt-text">
                                            <h4>{{ $postsview->userpost->name}}</h4>
                                            <span>{{ str_limit($postsview->body, 10) }}</span>
                                        </div>
                                        <span><a href="{{'/posts/'.$postsview->id.'/'.$postsview->body}}"><i class="la la-eye"></i></a></span>
                                    </div>
                                    @endforeach

                                </div>

                                <!--suggestions-list end-->
                            </div>
                            <div class="tags-sec full-width">
                                <ul>
                                    <li><a href="#" title="Help Center">Help Center</a></li>
                                    <li><a href="#" title="">عنا</a></li>
                                </ul>
                                <div class="cp-sec">
                                    <p><img src="{{url('images/cp.png')}}" alt="">Copyright 2020</p>
                                </div>
                            </div>
                            <!--tags-sec end-->
                        </div>
                        <!--main-left-sidebar end-->
                    </div>
                    <div class="col-lg-6 col-md-8 no-pd">
                        <div class="main-ws-sec">
                            <div class="post-topbar">
                                <div class="user-picy">
                                    <img src="{{ asset('/profile/' . Auth::user()->image)}}" width="50px" height="50px" alt="">
                                </div>
                                <div class="post-st">
                                    <ul>
                                        <li><a class="post_project" href="#" title="">قصتي</a></li>
                                        <li><a class="post-jb active" href="#" title="">اضافة منشور</a></li>
                                    </ul>
                                </div>
                                <!--post-st end-->
                            </div>
                            <!--post-topbar end-->

                            <!--post-topbar end-->
                            <div class="posts-section">
                                @foreach ($myposts as $My_Post)
                                <div class="post-bar">
                                    <div class="post_topbar">
                                        <div class="usy-dt">
                                            <img src="{{ asset('/profile/' . $My_Post->userpost->image)}}" width="50px" height="50px" alt="">
                                            <div class="usy-name">
                                                <h3><a href="">{{$My_Post->userpost->name}}</a></h3>
                                                <span><img src="{{url('images/clock.png')}}" alt="">{{$My_Post->created_at->diffForHumans()}}</span>
                                            </div>
                                        </div>
                                        @if ($My_Post->user_id == Auth::id())
                                        <div class="ed-opts">
                                            <a href="#" title="" class="ed-opts-open"><i class="la la-ellipsis-v"></i></a>
                                            <ul class="ed-options">
                                                <li><a href="{{url('/posts/'.$My_Post->id.'/'.'edit')}}" title="">تعديل</a></li>
                                                <li><a href="" onclick="event.preventDefault();
                                                    document.getElementById('deleteposts').submit();" title="">حذف</a></li>
                                                <form id="deleteposts" action="{{url('/deleteposts/'.$My_Post->id)}}" method="POST" style="display: none;">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                            </ul>
                                        </div>
                                        @endif
                                    </div>
                                    <div class="epi-sec">
                                        <ul class="descp">
                                            {{-- <li><img src="images/icon8.png" alt=""><span>Epic Coder</span></li> --}}
                                            <li><img src="{{url('images/icon9.png')}}" alt=""><span>{{$My_Post->userpost->City->city_name}}</span></li>
                                        </ul>

                                    </div>
                                    <a href="{{'/posts/'.$My_Post->id.'/'.$My_Post->body}}" class="job_descp">

                                        <p>{{$My_Post->body}}</p>
                                        <ul class="skill-tags">
                                            @if($My_Post->image != null)
                                            <img src="{{ asset('/coverimage/' . $My_Post->image)}}" class="card-img-top" style="height: 100% !important;" alt="...">
                                            @endif
                                            @if($My_Post->video != null)

                                            <video height="100%" style="width: 100%;" controls>
                                                <source src=" {{ asset('/videos/'. $My_Post->video)}}" type="video/mp4" size="720" />

                                            </video>
                                            @endif
                                        </ul>
                                    </a>
                                    <div class="job-status-bar">
                                        <ul class="like-com">
                                            <li>
                                                @if(in_array($My_Post->id,$likeArr))
                                                <a><i class="la la-heart"></i> {{$My_Post->postlikes->count()}} اعجبني</a>
                                                @else
                                                <a href="{{'/like/'.$My_Post->id}}" data-id="{{$My_Post->id}}" id="like"><i class="la la-heart"></i> {{$My_Post->postlikes->count()}} Likes</a>
                                                @endif
                                            </li>
                                            <li>
                                                <a href="{{'/posts/'.$My_Post->id}}"><i class="la la-comments"></i> {{$My_Post->comments->count()}} Comments</a>
                                            </li>
                                        </ul>
                                        <a><i class="la la-eye"></i>Views {{$My_Post->viewpost->count()}}</a>
                                    </div>
                                    <div class="comment-section">

                                        <div class="comment-sec">
                                            <ul>
                                                @if($My_Post->comments->first())
                                                @foreach ($My_Post->comments as $comment)
                                                <li>
                                                    <div class="comment-list">
                                                        <div class="bg-img">
                                                            <a href="{{'/show/'. $comment->user_id.'/'.$comment->usercomment->name }}">
                                                                <img src="{{ asset('/profile/' . $comment->usercomment->image)}}" width="40px" height="40px" class="avatar" alt="">
                                                            </a>
                                                        </div>
                                                        <div class="comment">
                                                            <h3>{{$comment->usercomment->name}}</h3>
                                                            <span><img src="{{url('images/clock.png')}}" alt=""> {{$comment->created_at->diffForHumans()}}</span>
                                                            <p>{{$comment->body}}</p>
                                                            @if (Auth::id() == $comment->usercomment->id)
                                                            <a href="{{url('/delcomment/'.$comment->id)}}" title="" class="active"><i class="fa fa-trash"></i></a>
                                                            <a href="{{url('/editcomment/'.$comment->id)}}" title="" class=""><i class="fa fa-pencil"></i></a>

                                                                @endif
                                                        </div>
                                                    </div>
                                                    <!--comment-list end-->
                                                </li>
                                                @endforeach
                                                @endif
                                            </ul>
                                        </div>
                                        <!--comment-sec end-->
                                        <div class="post-comment">
                                            <div class="cm_img">
                                                <img src="{{ asset('/profile/' . Auth::user()->image)}}" height="40px" width="40px" alt="">
                                            </div>
                                            <div class="comment_box">
                                                <form action="{{url('/posts/comment/'.$My_Post->id)}}" method="POST">
                                                    {{csrf_field()}}
                                                    <input type="text" name="post_id" value="{{$My_Post->id}}" hidden>
                                                    <input type="text" name="body" class="p-1" style="direction: rtl;" placeholder="اترك تعليقك">
                                                    <button type="submit">تعليق</button>
                                                </form>
                                            </div>
                                        </div>
                                        <!--post-comment end-->
                                    </div>
                                </div>

                                @endforeach

                                <!--post-bar end-->
                                <div class="top-profiles">
                                    <div class="pf-hd" style="text-align: right; direction: rtl;">
                                        <h3 style="float: right;" >قـصـص</h3>
                                    </div>
                                    <div class="profiles-slider">
                                        @foreach ($storys as $story)
                                        <!--user-profy end-->
                                        <div class="user-profy">
                                            <img src="{{ asset('/storys/' . $story->pic)}}" width="150px" height="150px" alt="">

                                            <span>{{$story->story}}</span>

                                            <a href="{{'/show/'. $story->user_id.'/'.$story->userstory->name}}" title="">{{$story->userstory->name}}</a>
                                        </div>
                                        <!--user-profy end-->
                                        @endforeach

                                    </div>
                                    <!--profiles-slider end-->
                                </div>
                                <!--top-profiles end-->

                                <!--post-bar end-->
                                @foreach ($posts as $post)
                                <div class="posty mb-2 ">
                                    <div class="post-bar">
                                        <div class="post_topbar">
                                            <div class="usy-dt">
                                                <img src="{{ asset('/profile/' . $post->userpost->image)}}" width="50px" alt="">
                                                <div class="usy-name">
                                                    <h3><a href="{{'/show/'.$post->userpost->id.'/'.$post->userpost->name}}">{{$post->userpost->name}}</a></h3>
                                                    <span><img src="{{url('images/clock.png')}}" alt="">{{$post->created_at->diffForHumans()}}</span>
                                                </div>
                                            </div>
                                            @if ($post->user_id == Auth::id())
                                            <div class="ed-opts">
                                                <a href="#" title="" class="ed-opts-open"><i class="la la-ellipsis-v"></i></a>
                                                <ul class="ed-options">
                                                    <li><a href="{{url('/posts/'.$My_Post->id.'/'.'edit')}}" title="">تعديل</a></li>
                                                    <li><a href="{{url('/deleteposts/'.$My_Post->id)}}" data-method="delete" title="">حذف</a></li>
                                                </ul>
                                            </div>
                                            @endif
                                        </div>
                                        <div class="epi-sec">
                                            <ul class="descp">
                                                {{-- <li><img src="images/icon8.png" alt=""><span>Epic Coder</span></li> --}}
                                                <li><img src="{{url('images/icon9.png')}}" alt=""><span>{{$post->userpost->City->city_name}}</span></li>
                                            </ul>
                                            <ul class="bk-links">
                                                @if(in_array($post->id,$savedArr))
                                                @else

                                                <li><a href="{{url('/savedpost/'.$post->id)}}" data-id="{{$post->id}}" id="save" title=""><i class="la la-bookmark"></i></a></li>

                                                @endif
                                                <li><a href="{{URL::to('/message/'.$post->userpost->id)}}" title=""><i class="la la-envelope"></i></a></li>
                                            </ul>
                                        </div>
                                        <a href="{{'/posts/'.$post->id.'/'.$post->body}}" class="job_descp">

                                            <p>{{$post->body}}</p>
                                            <ul class="skill-tags">
                                                @if($post->image != null)
                                                <img src="{{ asset('/coverimage/' . $post->image)}}" class="card-img-top" style="height: 100% !important;" alt="...">
                                                @endif
                                                @if($post->video != null)

                                                <video height="100%" style="width: 100%;" controls>
                                                    <source src=" {{ asset('/videos/'. $post->video)}}" type="video/mp4" size="720" />

                                                </video>
                                                @endif
                                            </ul>
                                        </a>
                                        <div class="job-status-bar">
                                            <ul class="like-com">
                                                <li>
                                                    @if(in_array($post->id,$likeArr))
                                                    <a><i class="la la-heart"></i> {{$post->postlikes->count()}} اعجبني</a>
                                                    @else
                                                    <a href="{{'/like/'.$post->id}}" data-id="{{$post->id}}" id="like"><i class="la la-heart"></i> {{$post->postlikes->count()}} Likes</a>
                                                    @endif
                                                </li>
                                                <li>
                                                    <a href="{{'/posts/'.$post->id}}"><i class="la la-comments"></i> {{$post->comments->count()}} Comments</a>
                                                </li>
                                            </ul>
                                            <a><i class="la la-eye"></i>Views {{$post->viewpost->count()}}</a>
                                        </div>
                                        <div class="comment-section">

                                            <div class="comment-sec">
                                                <ul>
                                                    @if($post->comments->first())
                                                    @foreach ($post->comments as $comment)
                                                    <li>
                                                        <div class="comment-list">
                                                            <div class="bg-img">
                                                                <a href="{{'/show/'. $comment->user_id.'/'.$comment->usercomment->name }}">
                                                                    <img src="{{ asset('/profile/' . $comment->usercomment->image)}}" width="40px" height="40px" class="avatar" alt="">
                                                                </a>
                                                            </div>
                                                            <div class="comment">
                                                                <h3>{{$comment->usercomment->name}}</h3>
                                                                <span><img src="{{url('images/clock.png')}}" alt=""> {{$comment->created_at->diffForHumans()}}</span>
                                                                <p>{{$comment->body}}</p>
                                                                @if (Auth::id() == $comment->usercomment->id)
                                                            <a href="{{url('/delcomment/'.$comment->id)}}" title="" class="active"><i class="fa fa-trash"></i></a>
                                                            <a href="{{url('/editcomment/'.$comment->id)}}" title="" class="active"><i class="fa fa-pen"></i></a>

                                                                @endif

                                                            </div>
                                                        </div>
                                                        <!--comment-list end-->
                                                    </li>
                                                    @endforeach
                                                    @endif
                                                </ul>
                                            </div>
                                            <!--comment-sec end-->
                                            <div class="post-comment">
                                                <div class="cm_img mr-2">
                                                    <img src="{{ asset('/profile/' . Auth::user()->image)}}" width="40px" height="40px" alt="">
                                                </div>
                                                <div class="comment_box">
                                                    <form action="{{url('/posts/comment/'.$post->id)}}" method="POST">
                                                        {{csrf_field()}}
                                                        <input type="text" name="post_id" value="{{$post->id}}" hidden>
                                                        <input type="text" class="p-1" name="body" style="direction: rtl;"  placeholder="اترك تعليقك">
                                                        <button type="submit">تعليق</button>
                                                    </form>
                                                </div>
                                            </div>
                                            <!--post-comment end-->
                                        </div>
                                    </div>
                                </div>
                                @endforeach

                                <!--posty end-->
                                <div class="process-comm">
                                    <div class="spinner">
                                        <div class="bounce1"></div>
                                        <div class="bounce2"></div>
                                        <div class="bounce3"></div>
                                    </div>
                                </div>
                                <!--process-comm end-->
                            </div>
                            <!--posts-section end-->
                        </div>
                        <!--main-ws-sec end-->
                    </div>
                    <div class="col-lg-3 pd-right-none no-pd">
                        <div class="right-sidebar">
                            @if ($My_Page)
                            @if ($My_Page->admin == Auth::id())
                            <div class="widget widget-about">
                                <img src="{{'/pages/'.$My_Page->pic}}" class="p-0" style="border-radius: 50%;" height="80px" width="80px" alt="">
                                <h3>{{$My_Page->namepage}}</h3>
                                <span>{{$My_Page->pages->city_name}}</span>
                                <div class="sign_link">
                                    <h3><a href="{{'/page/'.$My_Page->id.'/'.$My_Page->namepage.'/'.$My_Page->servis}}" title="">{{$My_Page->pagelike->count()}} <i class="la la-heart"></i></a></h3>
                                    <a href="{{'/page/'.$My_Page->id.'/'.$My_Page->namepage.'/'.$My_Page->servis}}" title="">View</a>
                                </div>
                            </div>
                            @endif
                            @else
                            @foreach ($pages as $page)
                            <div class="widget widget-about">
                                <img src="{{'/pages/'.$page->pic}}" class="p-0" style="border-radius: 50%;" height="80px" width="80px" alt="">
                                <h3>{{$page->namepage}}</h3>
                                <span>{{$page->pages->city_name}}</span>
                                <div class="sign_link">
                                    <h3><a href="{{'/page/'.$page->id.'/'.$page->namepage.'/'.$page->servis}}" title="">{{$page->pagelike->count()}} <i class="la la-heart"></i></a></h3>
                                    <a href="{{'/page/'.$page->id.'/'.$page->namepage.'/'.$page->servis}}" title="">View</a>
                                </div>
                            </div>
                            @endforeach
                            @endif
                            <!--widget-about end-->
                            <div class="widget suggestions">
                                <div class="sd-title right">
                                    <h3 class="right">صفحة </h3>
                                    <i class="la la-ellipsis-v"></i>
                                </div>
                                <!--sd-title end-->
                                <div class="suggestions-list">

                                    @foreach ($postspage as $postpage)

                                    <div class="suggestion-usd" id="saveds">
                                        <img src="{{ asset('/pages/' . $postpage->pagename->pic)}}" width="40px" height="40px" alt="">
                                        <div class="sgt-text">
                                            <h4>{{$postpage->pagename->namepage}}</h4>
                                            <span>{{ str_limit($postpage->dis, 20) }}</span>
                                        </div>
                                        <span><a href="{{url('/pagepost/'.$postpage->id.'/'.$postpage->dis)}}"><i class="la la-eye"></i></a></span>
                                    </div>
                                    @endforeach
                                    <div class="suggestion-usd" id="saveds">
                                    </div>

                                    <div class="view-more">
                                        <a href="{{url('/AllPages')}}" title="">عرض الكل</a>
                                    </div>
                                </div>
                                <!--suggestions-list end-->
                            </div>
                            <!--widget-jobs end-->
                            <div class="widget suggestions ">
                                <div class="sd-title right">
                                    <h3>متجر </h3>
                                    <i class="la la-ellipsis-v"></i>
                                </div>
                                <!--sd-title end-->
                                <div class="suggestions-list">

                                    @foreach ($services as $service)

                                    <div class="suggestion-usd" id="saveds">
                                        <img src="{{ asset('/pics/' . $service->pic)}}" width="40px" height="40px" alt="">
                                        <div class="sgt-text">
                                            <h4>{{$service->name_services}}</h4>
                                            <span>{{ str_limit($service->dis_services, 20) }}</span>
                                        </div>
                                        <span><a href="{{'/service/'. $service->id.'/'.$service->name_services}}"><i class="la la-eye"></i></a></span>
                                    </div>
                                    @endforeach
                                    <div class="suggestion-usd" id="saveds">
                                    </div>

                                    <div class="view-more">
                                        <a href="{{url('/MarketPlace')}}" title=""> عرض الكل</a>
                                    </div>
                                </div>
                                <!--suggestions-list end-->
                            </div>
                            <!--widget-jobs end-->
                            <div class="widget suggestions full-width">
                                <div class="sd-title right">
                                    <h3>محفوظة </h3>
                                    <i class="la la-ellipsis-v"></i>
                                </div>
                                <!--sd-title end-->
                                <div class="suggestions-list">

                                    @foreach ($saveds as $saved)

                                    <div class="suggestion-usd" id="saveds">
                                        <img src="{{ asset('/profile/' . $saved->userpost->image)}}" width="40px" height="40px" alt="">
                                        <div class="sgt-text">
                                            <h4>{{$saved->userpost->name}}</h4>
                                            <span>{{ str_limit($saved->body, 10) }}</span>
                                        </div>
                                        <span><a href="{{'/posts/'.$saved->id.'/'.$saved->body}}"><i class="la la-eye"></i></a></span>
                                    </div>
                                    @endforeach
                                    <div class="suggestion-usd" id="saveds">
                                    </div>
                                </div>
                                <!--suggestions-list end-->
                            </div>
                        </div>
                        <!--right-sidebar end-->
                    </div>
                </div>
            </div><!-- main-section-data end-->
        </div>
    </div>
</main>

<div class="post-popup pst-pj">
    <div class="post-project">
        <h3>قصتي</h3>
        <div class="post-project-fields">
            <form action="/story" method="POST" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="row">
                    <div class="col-lg-12" >
                        <input type="text" style="text-align: right; direction: rtl;" name="story" placeholder="ما يحدث">
                    </div>
                    <div class="col-12">
                        <input type="file" name="pic" id="input-file-now" class="dropify" />
                    </div>
                    <div class="col-lg-12">
                        <ul>
                            <li><button class="active" type="submit" value="post">شارك</button></li>
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
<!--post-project-popup end-->


<div class="post-popup job_post">
    <div class="post-project">
        <h3>انشاء منشور</h3>
        <div class="post-project-fields">
            <form action="/posts" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-lg-12">
                        <textarea name="body" style="text-align: right; direction: rtl;" placeholder=" {{Auth::user()->name}} بماذا تفكر"></textarea>
                    </div>
                    <div class="col-6">
                        <input type="file" name="coverimage" id="input-file-now" class="dropify" />
                    </div>
                    <div class="col-6">
                        <input type="file" name="video" accept="/mp4" id="input-file-now" class="dropify" />
                    </div>
                    <div class="col-lg-12">
                        <ul>
                            <li><button class="active" type="submit" value="post">نشر</button></li>
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
<!--post-project-popup end-->


<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<!--theme-layout end-->
<script>
    $('#save').click(function(event) {
        event.preventDefault();
        console.log('clicked')

        var id = $(this).attr('data-id');

        console.log('   ' + id);
        $.ajax({
            url: '/savedpost/' + id,
            method: 'get',
            data: {
                post_id: id,
            },
            success: function(response) {
                $('#save').html('تم الحفظ').prop('disabled', true);

            }
        })
    })
</script>

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
                post_id: id,
            },
            success: function(response) {
                $('#like').html('اعجبني ').prop('disabled', true);
            }
        })
    })
</script>
@endsection
