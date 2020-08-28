<?php
$recever=Route::input('id');
?>

<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>الدردشة</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('css/hover-min.css') }}">
    <link rel="stylesheet" href="{{ asset('cssChat/app.css') }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">


    <link rel="stylesheet" href="{{ asset('/cssChat/stylechat.css') }}">

    {{-- <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css" rel="stylesheet"> --}}
    <link href="{{ asset('/cssChat/bootstrap.css') }}" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <style>


    </style>
  <script>

 setInterval(soundCheck,2000);
 var first_run=0;
function soundCheck() {


   var oldMessage=$('#sound_check').val();
    $.ajax({
        type:'get',
        url:'{{URL::to('/sound')}}',
        datatype:'html',
        success:function(response){
            $('#sound_check').val(response);


            if (response != oldMessage) {
                response=oldMessage;
                            if(first_run===0) {
                                first_run = 1; //if the user just loaded the page, we want to acknowledge that so the chime will play next time if there is a new chat
                            } else {
                             var audio = document.getElementById("audio");
                             audio.play();
                            }

               }



           }
        });
}

  </script>
<script>
 setInterval(seenMessage,1000);
 setInterval(allMessageView,1000);

function seenMessage() {


    $.ajax({
        type:'get',
        url:'{{URL::to('/seen')}}',
        datatype:'html',
        success:function(response){

            if(response > 0){
                $('#smsnum').show();
                $('#smsnum').html(response);

            }else{
                $('#smsnum').hide();
            }

           }
        });
}
function allMessageView() {


    $.ajax({
        type:'get',
        url:'{{URL::to('/allmessageview')}}',
        datatype:'html',
        success:function(response){
           $('#all-chat-message').html(response);
           }
        });
}

function seenUpdate() {

    $.ajax({
        type:'get',
        url:'{{URL::to('/seenUpdate')}}',
        datatype:'html'
        });
}
function singleSeenUpdate(id) {
 var sender=id;
    $.ajax({
        type:'get',
        url:'{{URL::to('/singleSeenUpdate')}}/'+sender,
        datatype:'html'
        });
}

</script>

</head>

<body>
<input type="hidden"id="sound_check">
<audio id="audio" src="https://notificationsounds.com/soundfiles/acc3e0404646c57502b480dc052c4fe1/file-sounds-1140-just-saying.mp3" ></audio>

    <div id="app">
    @include('includes.navbarChat')


        @yield('contentchat')
    </div>




</body>
</html>
