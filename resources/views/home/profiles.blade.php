@extends('layouts.naw_app')
@section('title', 'pages')

@section('contant')



<section class="companies-info">
    <div class="container">
        <!-- <div class="company-title">
            <h3>All Companies</h3>
        </div> -->
        <!--company-title end-->
        <div class="companies-list">
            <div class="row">
@foreach ($users as $user)

<div class="col-lg-3 col-md-4 col-sm-6">
    <div class="company_profile_info">
        <div class="company-up-info">
        <img src="{{url('/profile/'.$user->image)}}" width="90px" height="90px" alt="">
            <h3>{{$user->name}}.</h3>
        <h4>{{$user->created_at->diffForHumans()}}</h4>
            <ul>
                @if(in_array($user->id,$friendsId))
                <li><a href="#" title="" class="follow">تتابعه</a></li>
                @else
                <li><a href="{{url('/freind/'.$user->id)}}" title="" class="follow">تابعه</a></li>
                @endif
                <li><a href="{{URL::to('/message/'.$user->id)}}" title="" class="message-us"><i class="fa fa-envelope"></i></a></li>
            </ul>
        </div>
        <a href="{{'/show/'.$user->id.'/'.$user->name}}" title="" class="view-more-pro">View Profile</a>
    </div>
    <!--company_profile_info end-->
</div>
@endforeach

            </div>
        </div>
        <!--companies-list end-->
        <div class="process-comm">
            <div class="spinner">
                <div class="bounce1"></div>
                <div class="bounce2"></div>
                <div class="bounce3"></div>
            </div>
        </div>
        <!--process-comm end-->
    </div>
</section>
<!--companies-info end-->

@endsection
