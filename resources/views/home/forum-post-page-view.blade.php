@extends('layouts.naw_app')
@section('title', $post->dis)

@section('contant')


<section class="forum-page">
    <div class="container">
        <div class="forum-questions-sec">
            <div class="row">
                <div class="col-lg-8">
                    <div class="forum-post-view">
                        <div class="usr-question">
                            <div class="usr_img">
                                <img src="{{ asset('/pages/' . $post->pagename->pic)}}" width="60px" height="60px" alt="">
                            </div>
                            <div class="usr_quest">
                                <h3> <a href="{{'/page/'.$post->pagename->id.'/'.$post->pagename->namepage.'/'.$post->pagename->servis}}">{{$post->pagename->namepage}} .</a></h3>
                            <span><i class="fa fa-clock-o"></i>{{$post->created_at->diffForHumans()}}</span>
                                {{-- <ul class="quest-tags">
                                    <li><a href="#" title="">Work</a></li>
                                    <li><a href="#" title="">Php</a></li>
                                    <li><a href="#" title="">Design</a></li>
                                </ul> --}}
                            <p>{{$post->dis}}</p>
                            <ul class="skill-tags">
                                <div class="row">
                                    <div class="col-6">
                                        @if($post->pic != null)
                                        <img src="{{ asset('/postpages/' . $post->pic)}}" class="card-img-top" height="200px" alt="...">
                                        @endif
                                        @if($post->pic2 != null)
                                        <img src="{{ asset('/postpages/' . $post->pic2)}}" class="card-img-top" height="200px" alt="...">
                                        @endif
                                    </div>
                                    <div class="col-6">

                                        @if($post->pic3 != null)
                                        <img src="{{ asset('/postpages/' . $post->pic3)}}" class="card-img-top" height="200px" alt="...">
                                        @endif
                                        @if($post->pic4 != null)
                                        <img src="{{ asset('/postpages/' . $post->pic4)}}" class="card-img-top" height="200px" alt="...">
                                        @endif
                                    </div>
                                </div>


                            </ul>
                            <div class="job-status-bar">
                                <ul class="like-com">
                                    <li>
                                        @if($likeAuth)
                                        <a href="" data-id="{{$likeAuth->id}}" id="dellike"><i  class="la la-heart"></i> {{$post->pagepostlike->count()}} اعجبني</a>
                                        @else
                                        <a href="{{'/like/'.$post->id}}" data-id="{{$post->id}}" id="likepost"><i class="la la-heart"></i> {{$post->pagepostlike->count()}} Like</a>
                                        @endif
                                    </li>
                                    <li>
                                        <a href="{{'/posts/'.$post->id}}"><i class="la la-comments"></i> {{$post->commentpostpage->count()}} Comments</a>
                                    </li>
                                </ul>
                                {{-- <a><i class="la la-eye"></i>Views 50</a> --}}
                            </div>
                                <div class="comment-section">

                                    <div class="comment-sec">
                                        <ul>
                                            @if ($post->commentpostpage->first())
                                            @foreach ($post->commentpostpage as $comment)
                                            <li>
                                                <div class="comment-list">
                                                    <div class="bg-img">
                                                        <img src="{{ asset('/profile/'.$comment->usercomment->image)}}" width="40px" height="40px" alt="">
                                                    </div>
                                                    <div class="comment">
                                                        <h3>{{$comment->usercomment->name}} </h3>
                                                        <span><img src="images/clock.png" alt=""> {{$comment->created_at->diffForHumans()}} </span>
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
                                    </div><!--comment-sec end-->
                                </div>
                            </div><!--usr_quest end-->
                        </div><!--usr-question end-->
                    </div><!--forum-post-view end-->
                    <div class="post-comment-box">

                        <div class="user-poster">
                            <div class="usr-post-img">
                                <img src="{{ asset('/profile/'.Auth::user()->image)}}" width="40px" height="40px" alt="">
                            </div>
                            <div class="post_comment_sec">
                                <form action="{{url('/posts/comment/'.$post->id)}}" method="POST">
                                    {{csrf_field()}}
                                    <input type="text" name="post_page_id" value="{{$post->id}}" hidden>
                                    <textarea name="body" placeholder=" التعليق الخاص بك"></textarea>
                                    <button type="submit">تعليق </button>
                                </form>
                            </div>
                            <!--post_comment_sec end-->
                        </div>
                    </div><!--post-comment-box end-->
                    <div class="next-prev">
                        <a href="{{'/pagepost/'.$postpage->id.'/'.$postpage->dis}}" title="" class="fl-left">Preview</a>
                        <a href="{{'/pagepost/'.$postpage->id.'/'.$postpage->dis}}" title="" class="fl-right">Next</a>
                    </div><!--next-prev end-->
                </div>
                <div class="col-lg-4">
                    <div class="widget widget-feat">
                        <ul>
                            <li>
                                <i class="fa fa-heart"></i>
                                <span>{{$post->pagepostlike->count()}}</span>
                            </li>
                            <li>
                                <i class="fa fa-comment"></i>
                                <span>{{$post->commentpostpage->count()}}</span>
                            </li>
                            <li>
                                <i class="fa fa-eye"></i>
                                <span>{{$post->viewpostpage->count()}}</span>
                            </li>
                        </ul>
                    </div><!--widget-feat end-->
                    <div class="widget widget-user">
                        <h3 class="title-wd">Top User of the Week</h3>
                        <ul>
                            @foreach ($posts as $postitem)
                            <li>
                                <div class="usr-msg-details">
                                    <div class="usr-ms-img">
                                    <img src="{{ asset('/profile/' . $postitem->userpost->image)}}" width="50px" height="50px" alt="">
                                    </div>
                                    <div class="usr-mg-info">
                                    <h3><a href="{{'/show/'.$postitem->userpost->id.'/'.$postitem->userpost->name}}">{{$postitem->userpost->name}}</a></h3>
                                    <p>{{$postitem->body}}</p>
                                    </div><!--usr-mg-info end-->
                                </div>

                                <span><a href="{{'/posts/'.$postitem->id.'/'.$postitem->body}}"><i class="fa fa-eye"></i></a></span>
                            </li>
                            @endforeach

                        </ul>
                    </div><!--widget-user end-->

                </div>
            </div>
        </div><!--forum-questions-sec end-->
    </div>
</section><!--forum-page end-->
<!--forum-page end-->


<!--overview-box end-->

</div>
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>

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
                $('#likepost').html('اعجبك').prop('disabled', true);
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




<!--theme-layout end-->
@endsection
