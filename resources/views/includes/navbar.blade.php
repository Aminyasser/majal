<style>
    .navbar>.container {
        margin-bottom: 0px;
        margin-top: 0px;
    }

    .navbar-brand span:first-child {
        color: #1cec38;
        font-weight: bold;
    }

    .navbar-brand span:last-child {
        color: #08526d;
        font-weight: bold;
    }

    .navbar-brand>span {
        font-size: 30px;
        font-weight: bolder;
    }

    .navbar-nav .nav-link {
        color: #d5e3e7 !important;
        font-size: 16px;
        font-weight: bold;
        margin-left: 20px;
        text-transform: uppercase;
    }

    .navbar-nav .active>.nav-link {
        color: #1cec38 !important;
    }

    .ser {
        outline: 0;
        float: left;
        -webkit-box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12), 0 1px 2px rgba(0, 0, 0, 0.24);
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12), 0 1px 2px rgba(0, 0, 0, 0.24);
        -webkit-border-radius: 4px;
        border-radius: 4px;
    }

    .ser>.textbox {
        outline: 0;
        height: 42px;
        width: 244px;
        line-height: 42px;
        padding: 0 16px;
        background-color: rgba(255, 255, 255, 0.8);
        color: #212121;
        border: 0;
        float: left;
        -webkit-border-radius: 4px 0 0 4px;
        border-radius: 4px 0 0 4px;
    }

    .ser>.textbox:focus {
        outline: 0;
        background-color: #FFF;
    }

    .ser>.button {
        outline: 0;
        background: none;
        background-color: rgba(38, 50, 56, 0.8);
        float: left;
        height: 42px;
        width: 42px;
        text-align: center;
        line-height: 42px;
        border: 0;
        color: #FFF;
        font: normal normal normal 14px/1 FontAwesome;
        font-size: 16px;
        text-rendering: auto;
        text-shadow: 0 1px 1px rgba(0, 0, 0, 0.2);
        -webkit-transition: background-color .4s ease;
        transition: background-color .4s ease;
        -webkit-border-radius: 0 4px 4px 0;
        border-radius: 0 4px 4px 0;
    }

    .ser>.button:hover {
        background-color: rgba(0, 150, 136, 0.8);
        transition: all 1s;
    }
</style>

<div class="container">




    <div class="container-fluid">
        <nav class="navbar navbar-expand-lg navbar-light  fixed-top ">

            <a class="navbar-brand m-0" style="width: 150px;
    background: white;
    font-size: x-large;
    font-weight: 700;
    color:#e44d3a;
    border-radius: 10px;" href="{{ url('/') }}" style="width: 150px">
مًجالـ
            </a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">

                    <li class="nav-item dropdown">
                        @guest
                    <li class="nav-item gold">
                        <a class="nav-link hvr-underline-from-center" href="{{ route('login') }}"> <i class="fa fa-sign-in" aria-hidden="true"></i> تسجيل دخول</a>
                    </li>


                    <li class="nav-item gold">
                        <a class="nav-link gold hvr-underline-from-center" href="{{ route('register') }}"> <i class="fa fa-user-plus" aria-hidden="true"></i> مستخدم جديد</a>
                    </li>

                    @endguest
                </ul>
            </div>

        </nav>
    </div>


    @if(session()->has('message'))
    <div class="alert alert-success alert-dismissible fade show col-12" role="alert">
        {{ session()->get('message') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>

    @endif
    @section('contant')
    @if(session()->has('delete'))
    <div class="alert alert-danger alert-dismissible fade show col-12" role="alert">
        {{ session()->get('delete') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif


    <script>
        $('.alert').alert(2000)
    </script>
</div>
