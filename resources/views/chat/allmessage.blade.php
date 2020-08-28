@extends('layouts.app')

@section('contentchat')
<?php
$users = DB::table('users')->get();


?>


<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-primary">
                <div class="panel-heading">


                <a onclick="seenUpdate()" style="color:#fff;text-decoration:none; margin-left: 12px;" href="{{URL::to('/room')}}">
                     <span ></span> <b class="smsnum"id="smsnum"></b> الرسائل <i class="fa fa-users" aria-hidden="true"></i>
                </a>


                <a style="color:#fff;text-decoration:none; margin-left: 12px;" href="{{URL::to('/users/room')}}">
                     <span ></span> Friends <i class="fa fa-comments" aria-hidden="true"></i>
                </a>
                </a>



                </div>
                <div class="panel-body">


                    <ul class="chat">
                       <div id="all-chat-message">

                       </div>
                    </ul>

                </div>

            </div>
        </div>
    </div>
</div>
@endsection
