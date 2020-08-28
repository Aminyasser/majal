
<body>
    <div class="page-wrapper chiller-theme toggled ">
        <nav id="sidebar" class="sidebar-wrapper">
            <div class="sidebar-content">
                <div class="sidebar-brand">
                    <a href="{{ url('/') }}"> Home  <i class="fa fa-home" ></i> </a>
                    <div id="close-sidebar">
                        <i class="fas fa-times"></i>
                    </div>
                </div>
                <div class="sidebar-header">
                    <div class="user-pic">
                        <img class="img-responsive img-rounded" src="{{ asset('/profile/' . auth()->user()->image)}}" alt="User picture">
                    </div>
                    <div class="user-info">
                        <span class="user-name">
                            <strong>{{auth()->user()->name}}</strong>
                        </span>
                        <span class="user-role">{{auth()->user()->roleuser->rol}}</span>
                        <span class="user-status">
                            <i class="fa fa-circle"></i>
                            <span></span>
                        </span>
                    </div>
                </div>
                <!-- sidebar-header  -->
                <div class="sidebar-search">
                    <div>
                        <div class="input-group">
                            <input type="text" class="form-control search-menu" placeholder="Search...">
                            <div class="input-group-append">
                                <span class="input-group-text">
                                    <i class="fa fa-search" aria-hidden="true"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- sidebar-search  -->
                <div class="sidebar-menu">
                    <ul>
                        <li class="header-menu">
                            <span>General</span>
                        </li>
                        <li>
                            <a href="{{ url('/dashboard') }}">
                                <i class="fa fa-sun-o" aria-hidden="true"></i>

                                <span>Dashbord</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('/dashboard/users') }}">
                                <i class="fa fa-users"></i>
                                <span>Users</span>
                                <span class="badge badge-pill badge-warning">{{$AdminUsers->count()}}</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('/dashboard/posts') }}">
                                <i class="fa fa-rss"></i>
                                <span>Posts</span>
                                <span class="badge badge-pill badge-success">{{$AdminPosts->count()}}</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('/dashboard/pages') }}">
                                <i class="fa fa-flag"></i>
                                <span>Pages</span>
                                <span class="badge badge-pill badge-primary">{{$AdminPages->count()}}</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('/dashboard/postpages') }}">
                                <i class="fa fa-th"></i>
                                <span>PostPage</span>
                                <span class="badge badge-pill badge-info">{{$AdminPostsPages->count()}}</span>
                            </a>
                        </li>
                        <li>

                            <a href="{{ url('/dashboard/market') }}">
                                <i class="fa fa-shopping-bag"></i>
                                <span>Market</span>
                                <span class="badge badge-pill badge-light">{{$AdminServices->count()}}</span>
                            </a>
                        </li>

                        <li>

                            <a href="{{ url('/dashboard/reports') }}">
                                <i class="fa fa-book"></i>
                                <span>Reports</span>
                                <span class="badge badge-pill badge-danger">{{$AdminReports->count()}}</span>
                            </a>
                        </li>
                        {{-- --}}
                        <li class="header-menu">
                            <span> component</span>
                        </li>
                        <li class="sidebar-dropdown">
                            <a href="#">
                                <i class="fa fa-globe"></i>
                                <span>Add component</span>
                            </a>
                            <div class="sidebar-submenu">
                                <ul>
                                    <li>
                                        <a href="{{ url('/dashboard/city') }}"> City ( {{$AdminCity->count()}} )</a>
                                    </li>
                                    <li>
                                        <a href="{{ url('/dashboard/job') }}">Job ( {{$Adminjob->count()}} )</a>
                                    </li>
                                    <li>
                                        <a href="{{ url('/dashboard/music') }}">Music ( {{$Adminmusic->count()}} )</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        {{-- --}}
                        <li class="header-menu">
                            <span>Extra</span>
                        </li>
                        <li class="sidebar-dropdown">
                            <a href="#">
                                <i class="fa fa-globe"></i>
                                <span>Conntion</span>
                            </a>
                            <div class="sidebar-submenu">
                                <ul>
                                    <li>
                                        <a href="{{ url('/dashboard/sendemail') }}">Mail</a>
                                    </li>
                                    <li>
                                        <a href="{{ url('/dashboard/likes') }}"> Likes</a>
                                    </li>
                                    <li>
                                        <a href="{{ url('/dashboard/comments') }}">Comments</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        {{-- --}}

                    </ul>
                </div>
                <!-- sidebar-menu  -->
            </div>
            <!-- sidebar-content  -->
            {{-- <div class="sidebar-footer">
      <a href="#">
        <i class="fa fa-bell"></i>
        <span class="badge badge-pill badge-warning notification">3</span>
      </a>
      <a href="#">
        <i class="fa fa-envelope"></i>
        <span class="badge badge-pill badge-success notification">7</span>
      </a>
      <a href="#">
        <i class="fa fa-cog"></i>
        <span class="badge-sonar"></span>
      </a>
      <a href="#">
        <i class="fa fa-power-off"></i>
      </a>
    </div> --}}
        </nav>
    </div>
</body>


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
<div class="alert alert-danger center alert-dismissible fade show col-12" role="alert">
    {{ session()->get('delete') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif
