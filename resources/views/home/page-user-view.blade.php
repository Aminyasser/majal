@extends('layouts.naw_app')
@section('title', $page->namepage . ' صحفة ' )

@section('contant')

<section class="cover-sec">
    <img src="{{ asset('/pages/' . $page->cover)}}" width="1600px" height="400px" alt="">
</section>
<!--cover-sec end-->


<main>
    <div class="main-section">
        <div class="container">
            <div class="main-section-data">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="main-left-sidebar">
                            <div class="user_profile">
                                <div class="user-pro-img">
                                    <img src="{{ asset('/pages/' . $page->pic)}}" width="170x" height="170px" alt="">
                                </div>
                                <!--user-pro-img end-->
                                <div class="user_pro_status">
                                    <ul class="flw-hr">
                                        <li><a href="#" title="" class="flww"><i class="la la-heart"></i> {{$page->pagelike->count()}} </a></li>
                                        @if ($mylike)
                                        <li><a href="#" data-id="{{$mylike->id}}" title="" id="dellike" class="flww"><i class="la la-heart"></i> لم يعجبني</a></li>
                                        @else
                                        <li><a href="{{'/like/'.$page->id}}" data-id="{{$page->id}}" id="like" title="" class="flww"><i class="la la-heart"></i> يعجبني</a></li>
                                        @endif
                                    </ul>
                                    <ul class="flw-status">
                                        <li>
                                            <span>اعجبهم</span>
                                            <b>{{$page->pagelike->count()}}</b>
                                        </li>
                                    </ul>
                                </div>
                                <!--user_pro_status end-->

                            </div>
                            <!--user_profile end-->
                            <div class="suggestions full-width">
                                <div class="sd-title">
                                    <h3>اقتراحات</h3>
                                    <i class="la la-ellipsis-v"></i>
                                </div>
                                <!--sd-title end-->
                                <div class="suggestions-list">
                                    @foreach ($pages as $onepage)
                                    <div class="suggestion-usd">
                                        <img src="{{ asset('/pages/' . $onepage->pic)}}" width="35px" height="35px" alt="">
                                        <div class="sgt-text">
                                            <h4>{{str_limit($onepage->namepage,15)}}</h4>
                                            <span>{{str_limit($onepage->servis, 10)}}</span>
                                        </div>
                                    <span><a href="{{url('/page/'.$onepage->id.'/'.$onepage->namepage.'/'.$onepage->servis)}}"><i class="la la-eye"></i></a></span>
                                    </div>
                                    @endforeach
                                    <div class="view-more">
                                        <a href="{{'/Allpage'}}" title="">عرض الكل</a>
                                    </div>
                                </div>
                                <!--suggestions-list end-->
                            </div>
                            <!--suggestions end-->
                        </div>
                        <!--main-left-sidebar end-->
                    </div>
                    <div class="col-lg-6">
                        <div class="main-ws-sec">
                            <div class="user-tab-sec">
                                <h3>{{$page->namepage}}.</h3>
                                <div class="star-descp">
                                    <span>{{$page->servis}}</span>

                                </div>
                                <!--star-descp end-->
                                <div class="tab-feed">
                                    <ul>
                                        <li data-tab="feed-dd" class="active">
                                            <a href="#" title="">
                                                <img src="{{url('images/ic1.png')}}" alt="">
                                                <span>Feed</span>
                                            </a>
                                        </li>
                                        <li data-tab="info-dd">
                                            <a href="#" title="">
                                                <img src="{{url('images/ic2.png')}}" alt="">
                                                <span>Info</span>
                                            </a>
                                        </li>
                                        <li data-tab="portfolio-dd">
                                            <a href="#" title="">
                                                <img src="{{url('images/ic3.png')}}" alt="">
                                                <span>Portfolio</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div><!-- tab-feed end-->
                            </div>
                            @if (Auth::id() == $page->admin)
                            <div class="post-topbar">
                                <div class="user-picy">
                                    <img src="{{ asset('/pages/' . $page->pic)}}" width="50px" height="50px" alt="">
                                </div>
                                <div class="post-st">
                                    <ul>
                                        <li><a class="post-jb active" href="#" title="">انشاء منشور</a></li>
                                    </ul>
                                </div>
                                <!--post-st end-->
                            </div>
                            @endif
                            <!--post-topbar end-->
                            <!--user-tab-sec end-->
                            <div class="product-feed-tab current" id="feed-dd">
                                <div class="posts-section">
                                    @foreach ($postspages as $postspage)
                                    <div class="post-bar">
                                        <div class="post_topbar">
                                            <div class="usy-dt">
                                                <img src="{{ asset('/pages/' . $postspage->pagename->pic)}}" width="50px" height="50px" alt="">
                                                <div class="usy-name">
                                                    <h3>{{$postspage->pagename->namepage}}.</h3>
                                                    <span><img src="{{url('images/clock.png')}}" alt="">{{$postspage->created_at->diffForHumans()}}</span>
                                                </div>
                                            </div>
                                            @if ($postspage->pagename->admin == Auth::id())
                                            <div class="ed-opts">
                                                <a href="#" title="" class="ed-opts-open"><i class="la la-ellipsis-v"></i></a>
                                                <ul class="ed-options">
                                                <li><a href="{{url('/editpagepost/'.$postspage->id.'/'.$postspage->dis)}}" title="">تعديل</a></li>
                                                <li><a href="" onclick="event.preventDefault();
                                                    document.getElementById('postspage').submit();" title="">حذف</a></li>
                                                <form id="postspage" action="{{url('/postspage/'.$postspage->id)}}" method="POST" style="display: none;">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                                </ul>
                                            </div>
                                            @endif

                                        </div>
                                        <div class="epi-sec">
                                            <ul class="descp">
                                                <li><img src="{{url('images/icon9.png')}}" alt=""><span>{{$postspage->pagename->pages->city_name}}</span></li>
                                            </ul>
                                        </div>
                                        <a href="{{'/pagepost/'.$postspage->id.'/'.$postspage->dis}}" class="job_descp">

                                            <p>{{$postspage->dis}}</p>
                                            <ul class="skill-tags">
                                                <div class="row">
                                                    <div class="col-6">
                                                        @if($postspage->pic != null)
                                                        <img src="{{ asset('/postpages/' . $postspage->pic)}}" class="card-img-top" height="200px" alt="...">
                                                        @endif
                                                        @if($postspage->pic2 != null)
                                                        <img src="{{ asset('/postpages/' . $postspage->pic2)}}" class="card-img-top" height="200px" alt="...">
                                                        @endif
                                                    </div>
                                                    <div class="col-6">
                                                        @if($postspage->pic3 != null)
                                                        <img src="{{ asset('/postpages/' . $postspage->pic3)}}" class="card-img-top" height="200px" alt="...">
                                                        @endif
                                                        @if($postspage->pic4 != null)
                                                        <img src="{{ asset('/postpages/' . $postspage->pic4)}}" class="card-img-top" height="200px" alt="...">
                                                        @endif

                                                    </div>
                                                </div>


                                            </ul>
                                        </a>
                                        <div class="job-status-bar">
                                            <ul class="like-com">
                                                <li>
                                                    @if(in_array($postspage->id,$likepostpage))
                                                    <a><i class="la la-heart"></i> {{$postspage->pagepostlike->count()}} اعجبني</a>
                                                    @else
                                                    <a href="{{'/like/'.$postspage->id}}" data-id="{{$postspage->id}}" id="likepost"><i class="la la-heart"></i> {{$postspage->pagepostlike->count()}} Like</a>
                                                    @endif
                                                </li>
                                                <li>
                                                    <a href="{{'/posts/'.$postspage->id}}"><i class="la la-comments"></i> {{$postspage->commentpostpage->count()}} Comments</a>
                                                </li>
                                            </ul>
                                            {{-- <a><i class="la la-eye"></i>Views 50</a> --}}
                                        </div>
                                        <div class="comment-section">

                                            <div class="comment-sec">
                                                <ul>
                                                    @if($postspage->commentpostpage->first())
                                                    @foreach ($postspage->commentpostpage as $comment)
                                                    <li>
                                                        <div class="comment-list">
                                                            <div class="bg-img">
                                                                <a href="{{'/show/'. $comment->user_id.'/'.$comment->usercomment->name }}">
                                                                    <img src="{{ asset('/profile/' . $comment->usercomment->image)}}" width="40px" class="avatar" alt="">
                                                                </a>
                                                            </div>
                                                            <div class="comment">
                                                                <h3>{{$comment->usercomment->name}}</h3>
                                                                <span><img src="{{url('images/clock.png')}}" alt=""> {{$comment->created_at->diffForHumans()}}</span>
                                                                <p>{{$comment->body}}</p>
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
                                                    <img src="{{ asset('/profile/' . Auth::user()->image)}}" width="40px" alt="">
                                                </div>
                                                <div class="comment_box">
                                                    <form action="{{url('/posts/comment/'.$postspage->id)}}" method="POST">
                                                        {{csrf_field()}}
                                                        <input type="text" name="post_page_id" value="{{$postspage->id}}" hidden>
                                                        <input type="text" name="body" placeholder="Post a comment">
                                                        <button type="submit">Send</button>
                                                    </form>
                                                </div>
                                            </div>
                                            <!--post-comment end-->
                                        </div>
                                    </div>
                                    <!--post-bar end-->
                                    @endforeach

                                </div>
                                <!--posts-section end-->
                            </div>
                            <!--product-feed-tab end-->
                            <div class="product-feed-tab" id="info-dd">
                                <div class="user-profile-ov" style="text-align: right;">
                                    <h3>عن الصفحة</h3>
                                    <p>{{$page->about}}.</p>
                                </div>
                                <!--user-profile-ov end-->
                                <div class="user-profile-ov st2" style="text-align: right;">
                                    <h3>تاريخ الانشاء</h3>
                                    <span>{{$page->created_at->diffForHumans()}}</span>
                                </div>
                                <!--user-profile-ov end-->
                                <div class="user-profile-ov" style="text-align: right;">
                                    <h3> عدد المعجبين</h3>
                                    <span>{{$page->pagelike->count()}}</span>
                                </div>
                                <!--user-profile-ov end-->
                                <div class="user-profile-ov" style="text-align: right;">
                                    <h3>المكان</h3>
                                    <p>{{$page->pages->city_name}}.</p>

                                </div>
                                <!--user-profile-ov end-->
                            </div>
                            <!--product-feed-tab end-->
                            <div class="product-feed-tab" id="portfolio-dd">
                                <div class="portfolio-gallery-sec">
                                    <h3>Portfolio</h3>
                                    <div class="gallery_pf">
                                        <div class="row">
                                            @foreach ($users as $followersuser)
                                            <div class="col-lg-4 col-md-4 col-sm-4 col-6">
                                                <div class="gallery_pt">
                                                    <img src="{{ asset('/profile/'.$followersuser->image)}}" alt="">

                                                </div>
                                                <div style=" text-align: center;
                                                align-items: center;">
                                                    <a style="color: #e44d3a;" href="{{url('/show/'.$followersuser->id.'/'.$followersuser->name)}}" title=""><img src="images/all-out.png" alt="">{{$followersuser->name}}</a>
                                                </div>
                                                <!--gallery_pt end-->
                                            </div>
                                            @endforeach

                                        </div>
                                    </div>
                                    <!--gallery_pf end-->
                                </div>
                                <!--portfolio-gallery-sec end-->
                            </div>
                            <!--product-feed-tab end-->
                        </div>
                        <!--main-ws-sec end-->
                    </div>
                    <div class="col-lg-3">
                        <div class="right-sidebar">

                            <div class="widget widget-portfolio">
                                <div class="wd-heady">
                                    <h3>Portfolio</h3>
                                    <img src="{{url('images/photo-icon.png')}}" alt="">
                                </div>
                                <div class="pf-gallery">
                                    <ul>
                                        @foreach ($postspages as $postspage)
                                        @if ($postspage->pic != null)
                                        <li><a href="{{'/pagepost/'.$postspage->id.'/'.$postspage->dis}}" title=""><img src="{{ asset('/postpages/' . $postspage->pic)}}" width="70px" height="70px" alt=""></a></li>
                                        @endif
                                        @if ($postspage->pic2 != null)
                                        <li><a href="{{'/pagepost/'.$postspage->id.'/'.$postspage->dis}}" title=""><img src="{{ asset('/postpages/' . $postspage->pic2)}}" width="70px" height="70px" alt=""></a></li>
                                        @endif
                                        @if ($postspage->pic3 != null)
                                        <li><a href="{{'/pagepost/'.$postspage->id.'/'.$postspage->dis}}" title=""><img src="{{ asset('/postpages/' . $postspage->pic3)}}" width="70px" height="70px" alt=""></a></li>
                                        @endif
                                        @if ($postspage->pic4 != null)
                                        <li><a href="{{'/pagepost/'.$postspage->id.'/'.$postspage->dis}}" title=""><img src="{{ asset('/postpages/' . $postspage->pic4)}}" width="70px" height="70px" alt=""></a></li>
                                        @endif
                                        @endforeach
                                    </ul>
                                </div>
                                <!--pf-gallery end-->
                            </div>
                            <!--widget-portfolio end-->
                        </div>
                        <!--right-sidebar end-->
                    </div>
                </div>
            </div><!-- main-section-data end-->
        </div>
    </div>
</main>
<style>
    .dropify-wrapper {
        height: 150px;
    }
</style>

<div class="post-popup job_post">
    <div class="post-project">
        <h3>انشاء منشور</h3>
        <div class="post-project-fields">
            <form action="/creatpostpage" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <input type="text" name="page_id" hidden value="{{$page->id}}">

                    <div class="col-lg-12">
                        <textarea placeholder="  {{$page->namepage}}  انشر شئيا جديدا" name="dis"></textarea>
                    </div>
                    <div class="col-6">
                        <input type="file" name="pic" id="input-file-now" class="dropify" />
                    </div>
                    <div class="col-6">
                        <input type="file" name="pic2" id="input-file-now" class="dropify" />
                    </div>
                    <div class="col-6">
                        <input type="file" name="pic3" id="input-file-now" class="dropify" />
                    </div>
                    <div class="col-6">
                        <input type="file" name="pic4" id="input-file-now" class="dropify" />
                    </div>
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
<!--post-project-popup end-->

<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
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
<script>
    $('#likepost').click(function(event) {
        event.preventDefault();
        console.log('clicked')

        var id = $(this).attr('data-id');

        console.log('   ' + id);
        $.ajax({
            url: '/like/' + id,
            method: 'get',
            data: {
                post_page_id: id,
            },
            success: function(response) {
                $('#likepost').html('اعجبني ').prop('disabled', true);
            }
        })
    })
</script>
<script>
    $('#dellike').click(function(event) {
        event.preventDefault();
        console.log('clicked')

        var id = $(this).attr('data-id');

        console.log('   ' + id);
        $.ajax({
            url: '/dellike/' + id,
            method: 'get',
            data: {
                page_id: id,
            },
            success: function(response) {
                $('#dellike').html('لم يعجبك').prop('disabled', true);
            }
        })
    })
</script>
@endsection
