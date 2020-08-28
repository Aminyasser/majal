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
                                <img src="{{ asset('/profile/' . $servies->Services->image)}}" width="60px" height="60px" alt="">
                            </div>
                            @if ($servies->Services->id == Auth::id())
                            <div class="ed-opts">
                                <a href="#" title="" class="ed-opts-open"><i class="la la-ellipsis-v"></i></a>
                                <ul class="ed-options">
                                    <li><a href="{{url('/Servis/'.$servies->id.'/'.$servies->name_services.'/edit')}}" title="">تعديل</a></li>
                                <li><a href="" onclick="event.preventDefault();
                                        document.getElementById('Servisdel').submit();" title="">حذف</a></li>
                                    <form id="Servisdel" action="{{url('/Servisdel/'.$servies->id)}}" method="POST" style="display: none;">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </ul>
                            </div>
                            @endif
                            <div class="usr_quest">
                                <h3><a href="{{url('/show/'.$servies->Services->id.'/'.$servies->Services->name)}}">{{$servies->Services->name}}</a></h3>
                                <span><i class="fa fa-clock-o"></i>{{$servies->created_at->diffForHumans()}}</span>

                                <div>
                                    <div class="epi-sec">
                                        <ul class="descp">
                                            {{-- <li><img src="images/icon8.png" alt=""><span>Epic Coder</span></li> --}}
                                            <li><img src="{{url('images/icon9.png')}}" alt=""><span>{{$servies->Place->city_name}}</span></li>
                                        </ul>
                                        <ul class="bk-links">
                                            <li><a href="tel:{{$servies->phone}}" title=""><i class="la la-phone"></i></a></li>
                                            {{-- @if ($saveAuth)
                                            <li><a href="{{url('/deletesaved/'.$saveAuth->id)}}" data-id="{{$servies->id}}" id="delsave" title=""><i style="background-color: #000000;" class="la la-bookmark"></i></a></li>
                                            @else
                                            @endif --}}

                                            <li><a href="{{URL::to('/message/'.$servies->Services->id)}}" title=""><i class="la la-envelope"></i></a></li>
                                        </ul>
                                    </div>
                                    <h2>{{$servies->name_services}}</h2>
                                    <p class="">{{$servies->price}}</p>
                                    <p class="">{{$servies->dis_services}}</p>
                                    <ul class="skill-tags mt-3">
                                        <div class="row">
                                            <div class="col-6">
                                                @if($servies->pic != null)
                                                <img src="{{ asset('/pics/' . $servies->pic)}}" class="card-img-top" height="200px" alt="...">
                                                @endif
                                            </div>
                                            <div class="col-6">

                                                @if($servies->pic1 != null)
                                                <img src="{{ asset('/pics/' . $servies->pic1)}}" class="card-img-top" height="200px" alt="...">
                                                @endif
                                            </div>
                                            <div class="col-6">
                                                @if($servies->pic2 != null)
                                                <img src="{{ asset('/pics/' . $servies->pic2)}}" class="card-img-top" height="200px" alt="...">
                                                @endif
                                            </div>
                                            <div class="col-6">
                                                @if($servies->pic3 != null)
                                                <img src="{{ asset('/pics/' . $servies->pic3)}}" class="card-img-top" height="200px" alt="...">
                                                @endif
                                            </div>
                                        </div>
                                    </ul>
                                </div>

                                <hr>

                            </div>
                            <!--usr_quest end-->
                        </div>
                        <!--usr-question end-->
                    </div>
                    <!--forum-post-view end-->

                    <!--post-comment-box end-->
                    <div class="next-prev">
                        @if ($serviesroundm)
                        <a href="{{'/service/'.$serviesroundm->id.'/'.$serviesroundm->dis_services}}" title="" class="fl-left">Preview</a>
                        @endif
                        @if ($serviesroundm2)
                        <a href="{{'/service/'.$serviesroundm2->id.'/'.$serviesroundm2->dis_services}}" title="" class="fl-right">Next</a>
                        @endif
                    </div>
                    <!--next-prev end-->
                </div>
                <div class="col-lg-4">
                    <div class="widget widget-feat">
                        <ul>

                            <li>
                                <i class="fa fa-eye"></i>
                                <span>{{$servies->viewservices->count()}}</span>
                            </li>
                        </ul>
                    </div>
                    <!--widget-feat end-->
                    <div class="widget widget-user">
                        <h3 class="title-wd right">اخـري</h3>
                        <ul>
                            @foreach ($serviesRoundmAll as $serviesRoundmone)
                            <li>
                                <div class="usr-msg-details">
                                    <div class="usr-ms-img">
                                        <img src="{{ asset('/pics/' . $serviesRoundmone->pic)}}" width="50px" height="50px" alt="">
                                    </div>
                                    <div class="usr-mg-info">
                                        <h3>{{$serviesRoundmone->name_services}}</h3>
                                        <p>{{$serviesRoundmone->price}} </p>
                                    </div>
                                    <!--usr-mg-info end-->
                                </div>
                                <span> <a href="{{url('/service/'.$serviesRoundmone->id.'/'.$serviesRoundmone->name_services)}}"><img src="{{url('images/price1.png')}}" alt=""></a></span>
                            </li>
                            @endforeach

                        </ul>
                    </div>
                    <!--widget-user end-->
                    {{-- @if ($Roundmpost1)
                    <div class="widget widget-adver">
                    <img src="{{ asset('/coverimage/' . $Roundmpost1->image)}}" width="370px" height="270px" alt="">
                </div>
                @endif --}}
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


<!--theme-layout end-->
@endsection
