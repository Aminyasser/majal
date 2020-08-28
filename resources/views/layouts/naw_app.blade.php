<!DOCTYPE html>
<html lang="ar">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

	<meta name="description" content="" />
	<meta name="keywords" content="" />
	<link rel="stylesheet" type="text/css" href="{{url('new_css/animate.css')}}">
	<link rel="stylesheet" type="text/css" href="{{url('new_css/bootstrap.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{url('new_css/line-awesome.css')}}">
	<link rel="stylesheet" type="text/css" href="{{url('new_css/line-awesome-font-awesome.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{url('new_css/font-awesome.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{url('new_css/jquery.mCustomScrollbar.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{url('lib/slick/slick.css')}}">
	<link rel="stylesheet" type="text/css" href="{{url('lib/slick/slick-theme.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('new_css/style.css')}}">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css">
    <link rel="stylesheet" type="text/css" href="{{url('new_css/responsive.css')}}">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,300,700,900|Roboto+Condensed:400,300,700' rel='stylesheet' type='text/css'>
    {{-- <link rel="stylesheet" href="{{url('new_css/demo.css')}}"> --}}
    <link rel="stylesheet" href="{{url('new_css/dropify.min.css')}}">
    {{-- <link rel="stylesheet" href="{{url('new_css/dropify.min.css')}}"> --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title> مجالـ -  @yield ('title')</title>
<style>
    .center{
        text-align: center;
    }
    .right{
        text-align: right;
    }
</style>
</head>

<body>
	<div class="wrapper">
        @if (count($errors))
        @foreach ($errors->all() as $error)
        <div class="alert alert-warning center mt-1 alert-dismissible fade show"  role="alert">
        <strong></strong> {{$error}}
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        @endforeach
       @endif
       @if(Session::has('success'))

       <div class="alert alert-success" style="text-align: center;">

       <strong>   </strong> {{ Session::get('success') }}

       </div>

       @endif

       @if(Session::has('sorry'))

       <div class="alert alert-denger" style="text-align: center;">

       <strong>  </strong>{{ Session::get('sorry') }}

       </div>

       @endif
    @include('includes.new_nav')


    @yield('contant')
    </div>
    <script type="text/javascript" src="{{url('new_js/jquery.min.js')}}"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>

    <script type="text/javascript" src="{{url('new_js/popper.js')}}"></script>
    <script type="text/javascript" src="{{url('new_js/bootstrap.min.js')}}"></script>
    <script type="text/javascript" src="{{url('new_js/jquery.mCustomScrollbar.js')}}"></script>
    <script type="text/javascript" src="{{url('lib/slick/slick.min.js')}}"></script>
    <script type="text/javascript" src="{{url('new_js/scrollbar.js')}}"></script>
    <script type="text/javascript" src="{{url('new_js/dropify.min.js')}}"></script>
<script type="text/javascript" src="{{url('new_js/script.js')}}"></script>

<script>
    $(document).ready(function(){
        // Basic
        $('.dropify').dropify();

        // Translated
        $('.dropify-fr').dropify({
            messages: {
                default: 'Glissez-déposez un fichier ici ou cliquez',
                replace: 'Glissez-déposez un fichier ou cliquez pour remplacer',
                remove:  'Supprimer',
                error:   'Désolé, le fichier trop volumineux'
            }
        });

        // Used events
        var drEvent = $('#input-file-events').dropify();

        drEvent.on('dropify.beforeClear', function(event, element){
            return confirm("Do you really want to delete \"" + element.file.name + "\" ?");
        });

        drEvent.on('dropify.afterClear', function(event, element){
            alert('File deleted');
        });

        drEvent.on('dropify.errors', function(event, element){
            console.log('Has Errors');
        });

        var drDestroy = $('#input-file-to-destroy').dropify();
        drDestroy = drDestroy.data('dropify')
        $('#toggleDropify').on('click', function(e){
            e.preventDefault();
            if (drDestroy.isDropified()) {
                drDestroy.destroy();
            } else {
                drDestroy.init();
            }
        })
    });
</script>
<script>
    $(document).ready(function() {
       $( "#search" ).autocomplete({

           source: function(request, response) {
               $.ajax({
               url: "{{url('autocomplete')}}",
               data: {
                       term : request.term
                },
               dataType: "json",
               success: function(data){
                  var resp = $.map(data,function(obj){
                       //console.log(obj.city_name);
                       return obj.name;
                  });

                  response(resp);
               }
           });
       },
       minLength: 1
    });
   });

   </script>
</body>

</html>
