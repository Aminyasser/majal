@extends('layouts.naw_app')
@section('title', ' نتيجة البحث '.  $filterusers->count())

@section('contant')

		<section class="forum-page">
			<div class="container">
				<div class="forum-questions-sec">
					<div class="row">
						<div class="col-lg-8">
							<div class="forum-questions">
                                @foreach ($filterusers as $user)
								<div class="usr-question">
									<div class="usr_img">
										<img src="{{ asset('/profile/'.$user->image)}}" width="60px" height="60px" alt="">
									</div>
									<div class="usr_quest">
                                    <h3><a href="{{'/show/'.$user->id.'/'.$user->name}}">{{$user->name}}</a></h3>
										<ul class="react-links">
											<li><a href="#" title=""><i class="fa fa-heart"></i> {{$user->likesprofile->count()}}</a></li>
											<li><a href="#" title=""><i class="fa fa-comment"></i> {{$user->commentsprofile->count()}}  </a></li>
											<li><a href="#" title=""><i class="fa fa-eye"></i>{{$user->viewprofile->count()}}</a></li>
										</ul>
										<ul class="quest-tags">
                                            @if(in_array($user->id,$friendsId))
                                            <li><a href="#" title="">تتابعه</a></li>
                                            @else
                                        <li><a href="{{url('/freind/'.$user->id)}}" data-id="{{$user->id}}" id="addfollow"  title="">متابعة</a></li>
                                            @endif
                                            @if(in_array($user->id,$viewsId))
                                            <li><a href="#" title="">شاهدته</a></li>

                                            @endif


										</ul>
									</div><!--usr_quest end-->
									<span class="quest-posted-time"><i class="fa fa-clock-o"></i> {{$user->created_at->diffForHumans()}} </span>
                                </div><!--usr-question end-->
                                @endforeach

							</div><!--forum-questions end-->
							<nav aria-label="Page navigation example" class="full-pagi">
							<ul class="pagination">
						{{$filterusers->links()}}
							</ul>
							</nav>
						</div>
						<div class="col-lg-4">
							<div class="widget widget-user">
								<h3 class="title-wd">Top User of the Week</h3>
								<ul>
                                    @foreach ($filterpost as $post)
									<li>
										<div class="usr-msg-details">
											<div class="usr-ms-img">
												<img src="{{ asset('/profile/' . $post->userpost->image)}}" width="50px" height="50px" alt="">
											</div>
											<div class="usr-mg-info">
                                            <h3>{{$post->userpost->name}}</h3>
												<p> {{str_limit($post->body, 10)}} </p>
											</div><!--usr-mg-info end-->
										</div>
										<span><a href="{{'/posts/'.$post->id.'/'.$post->body}}"><i class="la la-eye"></i></a></span>
									</li>
                                    @endforeach

								</ul>
							</div><!--widget-user end-->
                            {{-- @if ($post->image)
							<div class="widget widget-adver">
                                <img src="{{ asset('/coverimage/' . $post->image)}}" width="370px" height="270px" alt="">
							</div><!--widget-adver end-->
                            @endif --}}
						</div>
					</div>
				</div><!--forum-questions-sec end-->
			</div>
        </section><!--forum-page end-->
        <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
        <script>
            $('#addfollow').click(function(event) {

                event.preventDefault();
                console.log('clicked')

                var id = $(this).attr('data-id');

                $.ajax({
                    url: '/freind/' + id,
                    method: 'get',
                    data: {
                        friend: id,
                    },
                    success: function(response) {
                        $('#addfollow').html('تم المتابعة').attr("href", "#");
                    }
                })
            })
        </script>
@endsection
