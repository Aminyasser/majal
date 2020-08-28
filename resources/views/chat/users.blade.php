@extends('layouts.app')

@section('contentchat')


<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-primary">
                <div class="panel-heading">


                <a onclick="seenUpdate()" style="color:#fff;text-decoration:none; margin-left: 12px;" href="{{URL::to('/room')}}">
                    <i class="fa fa-comments-o" aria-hidden="true"></i>
                     <span >
                     </span> <b class="smsnum"id="smsnum"></b> الرسائل
                </a>


                <a style="color:#fff;text-decoration:none; margin-left: 12px;" href="{{URL::to('/users/room')}}">
                     <span ></span> Friends
                </a>
                </a>



                </div>
                <div class="panel-body">

                    <ul class="chat">
                    @foreach($userchat as $user)
                     @if($user->id != Auth::id())
                        <a href="{{URL::to('/message/'.$user->id)}}">
                        <li class="left clearfix">
                                <span class="chat-img pull-left">
                                <img alt="User Avatar" class="img-circle" width="50px" height="50px" src="{{ asset('/profile/' . $user->image)}}"></span>
                                <div class="chat-body clearfix">
                                    <div class="header">
                                        <strong class="primary-font" style="color: white;">{{$user->name}}</strong>
                                    </div>
                                </div>
                            </li>
                        </a>
                        @endif
                      @endforeach
                    </ul>

                </div>

            </div>
        </div>
    </div>
</div>
@endsection
