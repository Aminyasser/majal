@extends('layouts.naw_app')
@section('title', $profile_id->name)

@section('contant')
<section class="cover-sec">
    <img src="{{ asset('/coverpro/' . $profile_id->cover)}}" width="1600px" height="400px" alt="">
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
                                    <img src="{{ asset('/profile/'.$profile_id->image)}}" width="170px" height="170px" alt="">
                                </div>
                                <!--user-pro-img end-->
                                <div class="user_pro_status">
                                    @if ($profile_id->id != Auth::id() )

                                    <ul class="flw-hr">
                                        @if ($CheckFriend)
                                        <li><a href="{{'/delfreind/'.$CheckFriend->id}}" data-id="{{$CheckFriend->id}}" id="unfollow" title="" class="flww"><i class="la la-close"></i> لا اتابع</a></li>
                                        @else
                                        <li><a href="{{'/freind/'.$profile_id->id}}" data-id="{{$profile_id->id}}" id="follow" title="" class="flww"><i class="la la-plus"></i> اتابعه</a></li>
                                        @endif
                                        <li><a href="#" title="" class="flww"><i class="la la-eye"></i> {{$profile_id->viewprofile->count()}}</a></li>
                                    </ul>
                                    @endif
                                    <ul class="flw-status">
                                        <li>
                                            <span>يتابع</span>
                                            <b>{{$followings}}</b>
                                        </li>
                                        <li>
                                            <span>يتابعه</span>
                                            <b>{{$followers}}</b>
                                        </li>
                                    </ul>
                                </div>
                                <!--user_pro_status end-->
                                <ul class="social_links">
                                    <li><a href="#" title=""><i class="la la-globe"></i> www.example.com</a></li>
                                    @if ($profile_id->inst != null)
                                    <li><a href="#" title=""><i class="fa fa-instagram"></i> {{$profile_id->inst}} </a></li>
                                    @endif
                                    {{-- <li><a href="#" title=""><i class="fa fa-facebook-square"></i> Http://www.facebook.com/john...</a></li>
                                                     <li><a href="#" title=""><i class="fa fa-twitter"></i> Http://www.Twitter.com/john...</a></li>
                                                     <li><a href="#" title=""><i class="fa fa-google-plus-square"></i> Http://www.googleplus.com/john...</a></li>
                                                     <li><a href="#" title=""><i class="fa fa-behance-square"></i> Http://www.behance.com/john...</a></li>
                                                     <li><a href="#" title=""><i class="fa fa-pinterest"></i> Http://www.pinterest.com/john...</a></li> --}}
                                    {{-- <li><a href="#" title=""><i class="fa fa-youtube"></i> Http://www.youtube.com/john...</a></li> --}}
                                </ul>
                            </div>
                            <!--user_profile end-->
                            <!--user_profile end-->
                            <div class="suggestions full-width">
                                <div class="sd-title">
                                    <h3> اقترح </h3>
                                    <i class="la la-ellipsis-v"></i>
                                </div>
                                <!--sd-title end-->
                                <div class="suggestions-list">
                                    @foreach ($newusers as $user)

                                    <div class="suggestion-usd">
                                        <img src="{{asset('/profile/'.$user->image)}}" width="35px" alt="">
                                        <div class="sgt-text">
                                            <h4>{{$user->name}}</h4>
                                            <span> {{$user->about}}</span>
                                        </div>
                                    <span> <a href="{{url('/show/'.$user->id.'/'.$user->name)}}"><i class="la la-eye"></i></a></span>
                                    </div>

                                    @endforeach
                                </div>
                                <!--suggestions-list end-->
                            </div>
                            <!--suggestions end-->
                            <!--suggestions end-->
                        </div>
                        <!--main-left-sidebar end-->
                    </div>
                    <div class="col-lg-6">
                        <div class="main-ws-sec">
                            <div class="user-tab-sec">
                                <h3>{{$profile_id->name}}</h3>
                                <div class="star-descp">
                                    <span>{{$profile_id->about}}</span>

                                </div>
                                <!--star-descp end-->
                                <div class="tab-feed">
                                    <ul>
                                        <li data-tab="feed-dd" class="active">
                                            <a href="feed-dd" title="">
                                                <img src="{{url('images/ic1.png')}}" alt="">
                                                <span>Feed</span>
                                            </a>
                                        </li>
                                        <li data-tab="info-dd">
                                            <a href="info-dd" title="">
                                                <img src="{{url('images/ic2.png')}}" alt="">
                                                <span>Info</span>
                                            </a>
                                        </li>
                                        <li data-tab="portfolio-dd">
                                            <a href="portfolio-dd" title="">
                                                <img src="{{url('images/ic3.png')}}" alt="">
                                                <span>Portfolio</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div><!-- tab-feed end-->
                            </div>
                            <!--user-tab-sec end-->
                            <div class="product-feed-tab current" id="feed-dd">
                                <div class="posts-section">
                                    @foreach ($posts as $post)
                                    <div class="post-bar">
                                        <div class="post_topbar">
                                            <div class="usy-dt">
                                                <img src="{{ asset('/profile/' . $post->userpost->image)}}" width="50px" height="50px" alt="">

                                                <div class="usy-name">
                                                    <h3>{{$post->userpost->name}}</h3>

                                                    <span><img src="{{url('images/clock.png')}}" alt="">{{$post->created_at->diffForHumans()}}</span>

                                                </div>
                                            </div>

                                        </div>
                                        <div class="epi-sec">
                                            <ul class="descp">
                                                <li><img src="{{url('images/icon9.png')}}" alt=""><span>{{$post->userpost->City->city_name}}</span></li>

                                            </ul>
                                            <ul class="bk-links">
                                                @if(in_array($post->id,$savedArr))
                                                @else

                                                <li><a href="{{url('/savedpost/'.$post->id)}}" data-id="{{$post->id}}" id="save" title=""><i class="la la-bookmark"></i></a></li>

                                                @endif

                                            </ul>

                                        </div>
                                        <a href="{{'/posts/'.$post->id.'/'.$post->body}}" class="job_descp">

                                            <p>{{$post->body}}</p>
                                            <ul class="skill-tags">
                                                @if($post->image != null)
                                                <img src="{{ asset('/coverimage/' . $post->image)}}" class="card-img-top" height="200px" alt="...">
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
                                                                    <img src="{{ asset('/profile/' . $comment->usercomment->image)}}" width="50px" height="50px" class="avatar" alt="">
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
                                                    <img src="{{ asset('/profile/' . Auth::user()->image)}}" width="40px" height="40px" alt="">
                                                </div>
                                                <div class="comment_box">
                                                    <form action="{{url('/posts/comment/'.$post->id)}}" method="POST">
                                                        {{csrf_field()}}
                                                        <input type="text" name="post_id" value="{{$post->id}}" hidden>
                                                        <input type="text" name="body" placeholder="Post a comment">
                                                        <button type="submit">تعليق</button>
                                                    </form>
                                                </div>
                                            </div>
                                            <!--post-comment end-->
                                        </div>
                                    </div>
                                    @endforeach
                                    <!--post-bar end-->

                                </div>
                                <!--posts-section end-->
                            </div>
                            <!--product-feed-tab end-->
                            <div class="product-feed-tab" id="info-dd">
                                <div class="user-profile-ov">
                                    <h4>Bio me</h4>
                                    <p>{{$profile_id->bio}}</p>
                                    <p>{{$profile_id->email}}</p>
                                    <p>{{$profile_id->date}}</p>
                                </div>
                                <!--user-profile-ov end-->
                                <div class="user-profile-ov st2">
                                    <h4>Work</h4>
                                    <h4>{{$profile_id->Job->job_name}}</h4>
                                </div>
                                <!--user-profile-ov end-->
                                <div class="user-profile-ov">
                                    <h4>pages</h4>
                                    @if ($pageAuth)
                                    <h3><a href="{{('/homepage')}}" title="" class="skills-open">{{$pageAuth->namepage}}</a> <img src="{{ asset('/pages/' . $pageAuth->pic)}}" height="40px" width="40px" style="border-radius: 50px;" alt=""></h3>
                                    @endif
                                </div>
                                <!--user-profile-ov end-->
                                <div class="user-profile-ov">
                                    <h4>Location </h4>
                                    <h4>{{$profile_id->City->city_name}}</h4>
                                </div>
                                <!--user-profile-ov end-->
                            </div>
                            <!--product-feed-tab end-->
                            <div class="product-feed-tab" id="portfolio-dd">
                                <div class="portfolio-gallery-sec">
                                    <h3>قام بمشاهدة</h3>
                                    @if ($viewsposts->count() > 0)
                                    <div class="gallery_pf">
                                        <div class="row">
                                            @foreach ($viewsposts as $viewspost)
                                            <div class="col-lg-4 col-md-4 col-sm-4 col-6">
                                                <div class="gallery_pt">
                                                    <img src="{{ asset('/coverimage/' . $viewspost->image)}}" width="271px" height="174px" alt="">
                                                </div>
                                                <div style=" text-align: center;
                                                align-items: center;">
                                                    <a style="color: #e44d3a;" href="{{'/posts/'.$viewspost->id.'/'.$viewspost->body}}" title=""><img src="images/all-out.png" alt="">{{$viewspost->body}}</a>
                                                </div>
                                                <!--gallery_pt end-->
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                    @endif
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
                            <div class="message-btn">
                                <a href="{{URL::to('/message/'.$profile_id->id)}}" title=""><i class="fa fa-envelope"></i> Message</a>
                            </div>
                            <div class="widget widget-portfolio">
                                <div class="wd-heady">
                                    <h3>Portfolio</h3>
                                    <img src="{{url('images/photo-icon.png')}}" alt="">
                                </div>
                                <div class="pf-gallery">
                                    <ul>
                                        @foreach ($posts as $item)
                                        <li><a href="{{'/posts/'.$item->id.'/'.$item->body}}" title=""><img src="{{ asset('/coverimage/' . $item->image)}}" width="70px" height="70px" alt=""></a></li>
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
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script>
    $('#follow').click(function(event) {

        event.preventDefault();
        console.log('clicked')

        var id = $(this).attr('data-id');

        console.log('   ' + id);
        $.ajax({
            url: '/freind/' + id,
            method: 'get',
            data: {
                friend: id,
            },
            success: function(response) {
                $('#follow').html('تم المتابعة').attr("href", "#");
            }
        })
    })
</script>
<script>
    $('#unfollow').click(function(event) {

        event.preventDefault();
        console.log('clicked')

        var id = $(this).attr('data-id');

        $.ajax({
            url: '/delfreind/' + id,
            method: 'get',
            data: {
                Friend: id,
            },
            success: function(response) {
                $('#unfollow').html('تم الغاء').attr("href", "#");
            }
        })
    })
</script>
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
@endsection
