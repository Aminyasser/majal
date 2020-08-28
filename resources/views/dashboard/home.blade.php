<!------ Include the above in your HEAD tag ---------->




@extends('layouts.masterhome')

@section('contant2')




</head>

<body>
    <div class="page-wrapper chiller-theme toggled">
        <a id="show-sidebar" class="btn btn-sm btn-dark" href="#">
            <i class="fas fa-bars"></i>
        </a>

        <!-- sidebar-wrapper  -->
        <main class="page-content">
            <div class="container-fluid">
                <h2>Home </h2>
                <hr>

                <div class="row">
                    <div class=" admin-card users col-6 col-md-4 ">
                        <h5>Users</h5>
                        <span><i class="fa fa-users" aria-hidden="true"></i></span>
                        <p>
                            {{$AdminUsers->count()}}
                        </p>
                    </div>
                    <div class=" admin-card posts col-6 col-md-4 ">
                        <h5>Posts</h5>
                        <span><i class="fa fa-rss" aria-hidden="true"></i></span>
                        <p>
                            {{$AdminPosts->count()}}
                        </p>
                        <span></span>
                    </div>
                    <div class=" admin-card pages col-6 col-md-4 ">
                        <h5>Pages</h5>
                        <span><i class="fa fa-flag" aria-hidden="true"></i></span>
                       <p> {{$AdminPages->count()}}</p>
                    </div>
                    <div class=" admin-card post_page col-6 col-md-4 ">
                        <h5>postpage</h5>
                        <span><i class="fa fa-th" aria-hidden="true"></i></span>
                        <p>{{$AdminPostsPages->count()}}</p>
                    </div>
                    <div class=" admin-card market col-6 col-md-4 ">
                        <h5>Market</h5>
                        <span><i class="fa fa-shopping-bag" aria-hidden="true"></i></span>
                        <p>{{$AdminServices->count()}}</p>
                    </div>
                    <div class=" admin-card comments col-6 col-md-4 ">
                        <h5>Reports</h5>
                        <span><i class="fa fa-book" aria-hidden="true"></i></span>
                        <p>{{$AdminReports->count()}}</p>
                    </div>


                </div>
            </div>

        </main>
        <!-- page-content" -->
    </div>
    <!-- page-wrapper -->



</body>


</html>
@endsection
