<style>
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

    .navbar-nav>li>a {
        padding-bottom: 6px !important;
    }

    nav {
        border: 0px !important;
    }

    .navbar-default .navbar-nav .open .dropdown-menu>li>a {
        color: white !important;

    }
    .panel-heading a{
        color: black !important;
    }
    .text-muted{
        color: white;
    }
    .navbar-default .navbar-nav>li>a {
        font-size: 17px !important;
    }

    .dropdown-menu {
        background-color: #1b3542 !important;
    }

    .dropdown-menu>li>a:hover {
        background-color: transparent !important;
    }

    .navbar-nav>li>.dropdown-menu {
        border-radius: 15px 0px 15px 15px !important;
    }
</style>
<div class="container">
    <nav class="navbar navbar-default">
        <div class="container-fluid">
          <!-- Brand and toggle get grouped for better mobile display -->
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" style="    color: white;
            font-size: xx-large;
        font-weight: 600;" href="{{url('/')}}">مَجالـ</a>
          </div>

          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">


            <ul class="nav navbar-nav navbar-right">
              <li><a href="{{url('/profile/'.Auth::user()->name)}}">الصفحة الشخصية</a></li>

            </ul>
          </div>
          <!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
      </nav>
</div>
