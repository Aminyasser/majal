@extends('layouts.naw_app')
@section('title', Auth::user()->name)

@section('contant')

<section class="cover-sec">
    <img src="{{ asset('/coverpro/' . Auth::user()->cover)}}" width="1600px" height="400px" alt="">
<a href="{{url('/users/'.Auth::id().'/edit')}}" title=""><i class="fa fa-camera"></i> تغيير الغلاف</a>
</section>


<main>
    <div class="main-section">
        <div class="container">
            <div class="main-section-data">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="main-left-sidebar">
                            <div class="user_profile">
                                <div class="user-pro-img">
                                    <img src="{{ asset('/profile/'.Auth::user()->image)}}" width="175px" height="175px" alt="">
                                    <a href="{{url('/users/'.Auth::id().'/edit')}}" title=""><i class="fa fa-camera"></i></a>
                                </div>
                                <!--user-pro-img end-->
                                <div class="user_pro_status">

                                    <ul class="flw-status">
                                        <li>
                                            <span>اتابع</span>
                                            <b>{{$following->count()}}</b>
                                        </li>
                                        <li>
                                            <span>يتابع</span>
                                            <b>{{$followers->count()}}</b>
                                        </li>
                                    </ul>
                                </div>
                                <!--user_pro_status end-->
                                <ul class="social_links">
                                    <li><a href="#" title=""><i class="la la-globe"></i> www.example.com</a></li>
                                    @if (Auth::user()->inst != null)
                                    <li><a href="#" title=""><i class="fa fa-instagram"></i> {{Auth::user()->inst}} </a></li>
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
                            <div class="suggestions full-width">
                                <div class="sd-title">
                                    <h3>زار حسابك</h3>
                                    <i class="la la-ellipsis-v"></i>
                                </div>
                                <!--sd-title end-->
                                <div class="suggestions-list">
                                    @foreach ($viewusers as $user)

                                    <div class="suggestion-usd">
                                        <img src="{{asset('/profile/'.$user->image)}}" width="35px" alt="">
                                        <div class="sgt-text">
                                            <h4>{{$user->name}}</h4>
                                            <span> {{$user->about}}</span>
                                        </div>
                                        {{-- <span><i class="la la-plus"></i></span> --}}
                                    </div>
                                    @endforeach
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
                                <h3> {{Auth::user()->name}} </h3>
                                <div class="star-descp">
                                    <span>{{Auth::user()->about}}</span>

                                </div>
                                <!--star-descp end-->
                                <div class="tab-feed st2">
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
                                        <li data-tab="saved-jobs">
                                            <a href="#saved-jobs" title="">
                                                <img src="{{url('images/ic4.png')}}" alt="">
                                                <span>Saved</span>
                                            </a>
                                        </li>
                                        <li data-tab="my-following">
                                            <a href="#" title="">
                                                <img src="{{url('images/ic5.png')}}" alt="">
                                                <span>Following</span>
                                            </a>
                                        </li>
                                        <li data-tab="followrs-dd">
                                            <a href="#" title="">
                                                <img src="{{url('images/ic3.png')}}" alt="">
                                                <span>Followers</span>
                                            </a>
                                        </li>

                                    </ul>
                                </div><!-- tab-feed end-->
                            </div>
                            <!--fuser-tab-sec end-->
                            <div class="product-feed-tab current" id="feed-dd">
                                <div class="posts-section">
                                    @foreach ($posts as $post)
                                    <div class="post-bar">
                                        <div class="post_topbar">
                                            <div class="usy-dt">
                                                <img src="{{ asset('/profile/' . $post->userpost->image)}}" width="50px" alt="">
                                                <div class="usy-name">
                                                    <h3>{{$post->userpost->name}}</h3>
                                                    <span><img src="{{url('images/clock.png')}}" alt="">{{$post->created_at->diffForHumans()}}</span>
                                                </div>
                                            </div>
                                            @if ($post->user_id == Auth::id())
                                            <div class="ed-opts">
                                                <a href="#" title="" class="ed-opts-open"><i class="la la-ellipsis-v"></i></a>
                                                <ul class="ed-options">
                                                    <li><a href="{{url('/posts/'.$post->id.'/'.'edit')}}" title="">تعديل</a></li>
                                                    <li><a href="{{url('/deleteposts/'.$post->id)}}" data-method="delete" title="">حذف</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        @endif
                                        <div class="epi-sec">
                                            <ul class="descp">
                                                <li><img src="{{url('images/icon9.png')}}" alt=""><span>{{$post->userpost->City->city_name}}</span></li>
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
                                                                <span><img src="images/clock.png" alt=""> {{$comment->created_at->diffForHumans()}}</span>
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
                                                    <form action="{{url('/posts/comment/'.$post->id)}}" method="POST">
                                                        {{csrf_field()}}
                                                        <input type="text" name="post_id" value="{{$post->id}}" hidden>
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
                                <div class="user-profile-ov">
                                    <h4>Bio me</h4>
                                    <p>{{Auth::user()->bio}}</p>
                                    <p>{{Auth::user()->email}}</p>
                                    <p>{{Auth::user()->date}}</p>

                                </div>
                                <!--user-profile-ov end-->

                                <div class="user-profile-ov">
                                    <h4>Work</h4>
                                    <h4>{{Auth::user()->Job->job_name}}</h4>

                                </div>
                                <!--user-profile-ov end-->
                                <div class="user-profile-ov">
                                    <h4>Location </h4>
                                    <h4>{{Auth::user()->City->city_name}}</h4>

                                </div>
                                <!--user-profile-ov end-->
                                <div class="user-profile-ov">
                                    <h4>pages</h4>
                                    @if ($pageAuth)
                                    <h3><a href="{{('/homepage')}}" title="" class="skills-open">{{$pageAuth->namepage}}</a> <img src="{{ asset('/pages/' . $pageAuth->pic)}}" height="40px" width="40px" style="border-radius: 50px;" alt=""></h3>
                                    @endif

                                </div>
                                <!--user-profile-ov end-->
                            </div>
                            <!--product-feed-tab end-->
                            <div class="product-feed-tab" id="saved-jobs">
                                <div class="posts-section">
                                    @if ($mysavedspost->count() > 0)
                                    @foreach ($mysavedspost as $savedpost)
                                    <div class="post-bar">
                                        <div class="post_topbar">
                                            <div class="usy-dt">
                                                <img src="{{asset('/profile/' . $savedpost->userpost->image)}}" width="50px" alt="">
                                                <div class="usy-name">
                                                    <h3><a href="{{'/show/'.$savedpost->userpost->id.'/'.$savedpost->userpost->name}}">{{{$savedpost->userpost->name}}}</a></h3>
                                                    <span><img src="{{url('images/clock.png')}}" alt="">{{$savedpost->created_at->diffForHumans()}}</span>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="epi-sec">
                                            <ul class="descp">
                                                <li><img src="{{url('images/icon9.png')}}" alt=""><span>{{$savedpost->userpost->City->city_name}}</span></li>

                                            </ul>
                                            <ul class="bk-links">
                                                @if ($savedpost->userpost->id != Auth::id())

                                                <li><a href="{{URL::to('/message/'.$savedpost->userpost->id)}}" title=""><i class="la la-envelope"></i></a></li>
                                                @endif
                                            </ul>
                                        </div>
                                        <a href="{{'/posts/'.$savedpost->id.'/'.$savedpost->body}}" class="job_descp">

                                            <p>{{$savedpost->body}}</p>
                                            <ul class="skill-tags">
                                                @if($savedpost->image != null)
                                                <img src="{{ asset('/coverimage/' . $savedpost->image)}}" class="card-img-top" height="200px" alt="...">
                                                @endif
                                                @if($savedpost->video != null)

                                                <video height="100%" style="width: 100%;" controls>
                                                    <source src=" {{ asset('/videos/'. $savedpost->video)}}" type="video/mp4" size="720" />

                                                </video>
                                                @endif
                                            </ul>
                                        </a>
                                        <div class="job-status-bar">
                                            <ul class="like-com">
                                                <li>
                                                    @if(in_array($savedpost->id,$likeArr))
                                                    <a><i class="la la-heart"></i> {{$savedpost->postlikes->count()}} اعجبني</a>
                                                    @else
                                                    <a href="{{'/like/'.$savedpost->id}}" data-id="{{$savedpost->id}}" id="like"><i class="la la-heart"></i> {{$post->postlikes->count()}} Likes</a>
                                                    @endif
                                                </li>
                                                <li>
                                                    <a href="{{'/posts/'.$savedpost->id}}"><i class="la la-comments"></i> {{$savedpost->comments->count()}} Comments</a>
                                                </li>
                                            </ul>
                                            <a><i class="la la-eye"></i>Views {{$savedpost->viewpost->count()}}</a>
                                        </div>
                                        <div class="comment-section">

                                            <div class="comment-sec">
                                                <ul>
                                                    @if($savedpost->comments->first())
                                                    @foreach ($savedpost->comments as $comment)
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
                                                    <form action="{{url('/posts/comment/'.$savedpost->id)}}" method="POST">
                                                        {{csrf_field()}}
                                                        <input type="text" name="post_id" value="{{$savedpost->id}}" hidden>
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
                                    @endif

                                </div>
                                <!--posts-section end-->
                            </div>
                            <!--product-feed-tab end-->
                            <div class="product-feed-tab" id="my-following">
                                <div class="portfolio-gallery-sec">
                                    <h3>اتابع</h3>
                                    <div class="row">
                                        @foreach ($followingusers as $followinguser)
                                        <div class="col-lg-4 col-md-4 col-sm-4 col-6">
                                            <div class="gallery_pt">
                                                <img src="{{ asset('/profile/'.$followinguser->image)}}" alt="">
                                            </div>
                                            <div style=" text-align: center;
                                            align-items: center;">
                                                <a style="color: #e44d3a;" href="{{url('/show/'.$followinguser->id.'/'.$followinguser->name)}}" title=""><img src="images/all-out.png" alt="">{{$followinguser->name}}</a>
                                            </div>
                                            <!--gallery_pt end-->
                                        </div>
                                        @endforeach
                                    </div>
                                    <!--company_profile_info end-->

                                    <!--gallery_pf end-->
                                </div>
                                <!--posts-section end-->
                            </div>
                            <!--product-feed-tab end-->
                            <div class="product-feed-tab" id="followrs-dd">
                                <div class="portfolio-gallery-sec">
                                    <h3>يتابعك</h3>
                                    <div class="row">
                                        @foreach ($followrsusers as $followrsuser)
                                        <div class="col-lg-4 col-md-4 col-sm-4 col-6">
                                            <div class="gallery_pt">
                                                <img src="{{ asset('/profile/'.$followrsuser->image)}}" alt="">
                                            </div>
                                            <div style=" text-align: center;
                                            align-items: center;">
                                                <a style="color: #e44d3a;" href="{{url('/show/'.$followrsuser->id.'/'.$followrsuser->name)}}" title=""><img src="images/all-out.png" alt="">{{$followrsuser->name}}</a>
                                            </div>
                                            <!--gallery_pt end-->
                                        </div>
                                        @endforeach
                                    </div>
                                    <!--company_profile_info end-->

                                    <!--gallery_pf end-->
                                </div>
                                <!--portfolio-gallery-sec end-->
                            </div>

                            <!--product-feed-tab end-->
                            {{-- <div class="product-feed-tab" id="payment-dd">
                                <div class="billing-method">
                                    <ul>
                                        <li>
                                            <h3>Add Billing Method</h3>
                                            <a href="#" title=""><i class="fa fa-plus-circle"></i></a>
                                        </li>
                                        <li>
                                            <h3>See Activity</h3>
                                            <a href="#" title="">View All</a>
                                        </li>
                                        <li>
                                            <h3>Total Money</h3>
                                            <span>$0.00</span>
                                        </li>
                                    </ul>
                                    <div class="lt-sec">
                                        <img src="images/lt-icon.png" alt="">
                                        <h4>All your transactions are saved here</h4>
                                        <a href="#" title="">Click Here</a>
                                    </div>
                                </div>
                                <!--billing-method end-->
                                <div class="add-billing-method">
                                    <h3>Add Billing Method</h3>
                                    <h4><img src="images/dlr-icon.png" alt=""><span>With workwise payment protection , only pay for work delivered.</span></h4>
                                    <div class="payment_methods">
                                        <h4>Credit or Debit Cards</h4>
                                        <form>
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="cc-head">
                                                        <h5>Card Number</h5>
                                                        <ul>
                                                            <li><img src="images/cc-icon1.png" alt=""></li>
                                                            <li><img src="images/cc-icon2.png" alt=""></li>
                                                            <li><img src="images/cc-icon3.png" alt=""></li>
                                                            <li><img src="images/cc-icon4.png" alt=""></li>
                                                        </ul>
                                                    </div>
                                                    <div class="inpt-field pd-moree">
                                                        <input type="text" name="cc-number" placeholder="">
                                                        <i class="fa fa-credit-card"></i>
                                                    </div>
                                                    <!--inpt-field end-->
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="cc-head">
                                                        <h5>First Name</h5>
                                                    </div>
                                                    <div class="inpt-field">
                                                        <input type="text" name="f-name" placeholder="">
                                                    </div>
                                                    <!--inpt-field end-->
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="cc-head">
                                                        <h5>Last Name</h5>
                                                    </div>
                                                    <div class="inpt-field">
                                                        <input type="text" name="l-name" placeholder="">
                                                    </div>
                                                    <!--inpt-field end-->
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="cc-head">
                                                        <h5>Expiresons</h5>
                                                    </div>
                                                    <div class="rowwy">
                                                        <div class="row">
                                                            <div class="col-lg-6 pd-left-none no-pd">
                                                                <div class="inpt-field">
                                                                    <input type="text" name="f-name" placeholder="">
                                                                </div>
                                                                <!--inpt-field end-->
                                                            </div>
                                                            <div class="col-lg-6 pd-right-none no-pd">
                                                                <div class="inpt-field">
                                                                    <input type="text" name="f-name" placeholder="">
                                                                </div>
                                                                <!--inpt-field end-->
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="cc-head">
                                                        <h5>Cvv (Security Code) <i class="fa fa-question-circle"></i></h5>
                                                    </div>
                                                    <div class="inpt-field">
                                                        <input type="text" name="l-name" placeholder="">
                                                    </div>
                                                    <!--inpt-field end-->
                                                </div>
                                                <div class="col-lg-12">
                                                    <button type="submit">Continue</button>
                                                </div>
                                            </div>
                                        </form>
                                        <h4>Add Paypal Account</h4>
                                    </div>
                                </div>
                                <!--add-billing-method end-->
                            </div> --}}
                            <!--product-feed-tab end-->
                        </div>
                        <!--main-ws-sec end-->
                    </div>
                    <div class="col-lg-3">
                        <div class="right-sidebar">

                            <div class="widget widget-portfolio">
                                <div class="wd-heady">
                                    <h3>الصور</h3>
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




</div>
<!--theme-layout end-->


@endsection
