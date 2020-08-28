@extends('layouts.naw_app')
@section('title', 'الرئيسية')

@section('contant')


<section class="forum-page">
    <div class="container">
        <div class="forum-questions-sec">
            <div class="row">
                <div class="col-lg-8">
                    <div class="forum-post-view">
                        <div class="usr-question">
                            <div class="usr_img">
                                <img src="{{ asset('/profile/' . $post->userpost->image)}}" width="60px" height="60px" alt="">
                            </div>
                            <div class="usr_quest">
                                @if ($post->user_id == Auth::id())
                                <div class="ed-opts">
                                    <a href="#" title="" class="ed-opts-open"><i class="la la-ellipsis-v"></i></a>
                                    <ul class="ed-options">
                                    <li><a href="{{url('/posts/'.$post->id.'/'.'edit')}}" title="">تعديل</a></li>
                                    <li><a href="" onclick="event.preventDefault();
                                        document.getElementById('deleteposts').submit();" title="">حذف</a></li>
                                    <form id="deleteposts" action="{{url('/deleteposts/'.$post->id)}}" method="POST" style="display: none;">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                    </ul>
                                </div>
                                @endif
                                <h3><a href="{{url('/show/'.$post->userpost->id.'/'.$post->userpost->name)}}">{{$post->userpost->name}}</a></h3>
                                <span><i class="fa fa-clock-o"></i>{{$post->created_at->diffForHumans()}}</span>

                                <div>
                                    <div class="epi-sec">
                                        <ul class="descp">
                                            {{-- <li><img src="images/icon8.png" alt=""><span>Epic Coder</span></li> --}}
                                            <li><img src="{{url('images/icon9.png')}}" alt=""><span>{{$post->userpost->City->city_name}}</span></li>
                                        </ul>
                                        <ul class="bk-links">
                                            @if ($saveAuth)
                                            <li><a href="{{url('/deletesaved/'.$saveAuth->id)}}" data-id="{{$saveAuth->id}}" id="delsave" title=""><i style="background-color: #000000;" class="la la-bookmark"></i></a></li>
                                            @else
                                            <li><a href="{{url('/savedpost/'.$post->id)}}" data-id="{{$post->id}}" id="save" title=""><i class="la la-bookmark"></i></a></li>
                                            @endif

                                            <li><a href="{{URL::to('/message/'.$post->userpost->id)}}" title=""><i class="la la-envelope"></i></a></li>
                                        </ul>
                                    </div>
                                    <p class="">{{$post->body}}</p>
                                    <ul class="skill-tags mt-3">
                                        @if($post->image != null)
                                        <img src="{{ asset('/coverimage/' . $post->image)}}" class="card-img-top" height="100%" alt="...">
                                        @endif
                                        @if($post->video != null)

                                        <video height="100%" style="width: 100%;" controls>
                                            <source src=" {{ asset('/videos/'. $post->video)}}" type="video/mp4" size="720" />

                                        </video>
                                        @endif
                                    </ul>
                                </div>
                                <ul class="react-links mb-2 mt-3">
                                    @if ($likeAuth)
                                    <li><a href="{{'/dellike/'.$likeAuth->id}}" data-id="{{$likeAuth->id}}" id="dellike" title="لم يعجبك"><i class="fa fa-heart"></i> {{$post->postlikes->count()}} لم يعجبني</a></li>
                                    @else
                                    <li><a href="{{'/like/'.$post->id}}" data-id="{{$post->id}}" id="like" title=""><i class="fa fa-heart"></i> {{$post->postlikes->count()}} اعجبني</a></li>
                                    @endif
                                    <li><a title="تعليقات"><i class="fa fa-comments"></i> {{$post->comments->count()}} تعليق</a></li>
                                </ul>

                                <hr>
                                <div class="comment-section">

                                    <div class="comment-sec">
                                        <ul>
                                            @if($post->comments->first())
                                            @foreach ($post->comments as $comment)
                                            <li>
                                                <div class="comment-list">
                                                    <div class="bg-img">
                                                        <img src="{{ asset('/profile/'.$comment->usercomment->image)}}" width="40px" height="40px" alt="">
                                                    </div>
                                                    <div class="comment">
                                                        <h3>{{$comment->usercomment->name}} </h3>
                                                        <span><img src="{{url('images/clock.png')}}" alt=""> {{$comment->created_at->diffForHumans()}} </span>
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
                                </div>
                            </div>
                            <!--usr_quest end-->
                        </div>
                        <!--usr-question end-->
                    </div>
                    <!--forum-post-view end-->
                    <div class="post-comment-box">

                        <div class="user-poster">
                            <div class="usr-post-img">
                                <img src="{{ asset('/profile/'.Auth::user()->image)}}" width="40px" height="40px" alt="">
                            </div>
                            <div class="post_comment_sec">
                                <form action="{{url('/posts/comment/'.$post->id)}}" method="POST">
                                    {{csrf_field()}}
                                    <input type="text" name="post_id" value="{{$post->id}}" hidden>
                                    <textarea name="body" placeholder=" التعليق الخاص بك"></textarea>
                                    <button type="submit">تعليق </button>
                                </form>
                            </div>
                            <!--post_comment_sec end-->
                        </div>
                        <!--user-poster end-->
                    </div>
                    <!--post-comment-box end-->
                    <div class="next-prev">
                        @if ($Roundmpost1)
                        <a href="{{'/posts/'.$Roundmpost1->id.'/'.$Roundmpost1->body}}" title="" class="fl-left">Preview</a>
                        @endif
                        @if ($Roundmpost2)
                        <a href="{{'/posts/'.$Roundmpost2->id.'/'.$Roundmpost2->body}}" title="" class="fl-right">Next</a>
                        @endif
                    </div>
                    <!--next-prev end-->
                </div>
                <div class="col-lg-4">
                    <div class="widget widget-feat">
                        <ul>
                            <li>
                                <i class="fa fa-heart"></i>
                                <span>{{$post->postlikes->count()}}</span>
                            </li>
                            <li>
                                <i class="fa fa-comment"></i>
                                <span>{{$post->comments->count()}}</span>
                            </li>

                            <li>
                                <i class="fa fa-eye"></i>
                                <span>{{$post->viewpost->count()}}</span>
                            </li>
                        </ul>
                    </div>
                    <!--widget-feat end-->
                    <div class="widget widget-user">
                        <h3 class="title-wd right" style="float: right;">مستخدمين</h3>
                        <ul>
                            @foreach ($users as $user)

                            <li>
                                <div class="usr-msg-details">
                                    <div class="usr-ms-img">
                                        <img src="{{ asset('/profile/' . $user->image)}}" width="50px" height="50px" alt="">
                                    </div>
                                    <div class="usr-mg-info">
                                        <h3>{{$user->name}}</h3>
                                        <p>{{$user->about}} </p>
                                    </div>
                                    <!--usr-mg-info end-->
                                </div>
                                <span> <a href="{{url('/show/'.$user->id.'/'.$user->name)}}"><img src="{{url('images/price1.png')}}" alt=""></a></span>
                            </li>
                            @endforeach

                        </ul>
                    </div>
                    <!--widget-user end-->
                    @if ($Roundmpost1)
                    <div class="widget widget-adver">
                    <img src="{{ asset('/coverimage/' . $Roundmpost1->image)}}" width="370px" height="270px" alt="">
                    </div>
                    @endif
                    <!--widget-adver end-->
                </div>
            </div>
        </div>
        <!--forum-questions-sec end-->
    </div>
</section>
<!--forum-page end-->


<!--overview-box end-->

</div>
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
                post_id: id,
            },
            success: function(response) {
                $('#like').html('اعجبك').prop('disabled', true);
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
                post_id: id,
            },
            success: function(response) {
                $('#dellike').html('لم يعجبك').prop('disabled', true);
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

<script>
    $('#delsave').click(function(event) {
        event.preventDefault();

        var id = $(this).attr('data-id');

        console.log('   ' + id);
        $.ajax({
            url: '/deletesaved/' + id,
            method: 'get',
            data: {
                id: id,
            },
            success: function(response) {
                $('#delsave').html('تم الالغاء').prop('disabled', true);
            }
        })
    })
</script>

<!--theme-layout end-->
@endsection
