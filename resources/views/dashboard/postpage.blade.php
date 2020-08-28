@extends('layouts.masterhome')

@section('contant2')

<body>
    <div class="page-wrapper chiller-theme toggled">
        <a id="show-sidebar" class="btn btn-sm btn-dark" href="#">
            <i class="fas fa-bars"></i>
        </a>

        <!-- sidebar-wrapper  -->
        <main class="page-content">
            <div class="container-fluid">
                <h2>Post Page <span class="badge badge-pill badge-info" style="font-size: 17px"> {{$AdminPostsPages->count()}} </span></h2>
                <hr>

                <div class="row">
                    <table class="table table-striped table-dark">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Page Name</th>
                                <th scope="col">post</th>
                                <th scope="col">Dis</th>
                                <th scope="col">Delete</th>
                                <th scope="col">Time</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($AdminPostsPages as $postpage)

                            <tr>
                                <th scope="row">1</th>
                                <td>{{$postpage->pagename->namepage}}</td>
                                <td>
                                   @if($postpage->pic) <img src="{{ asset('/postpages/' . $postpage->pic)}}" style="width: 50px" alt="Card image cap"> @endif
                                   @if($postpage->pic1) <img src="{{ asset('/postpages/' . $postpage->pic1)}}" style="width: 50px" alt="Card image cap"> @endif
                                   @if($postpage->pic2)  <img src="{{ asset('/postpages/' . $postpage->pic2)}}" style="width: 50px" alt="Card image cap"> @endif
                                  @if($postpage->pic3)  <img src="{{ asset('/postpages/' . $postpage->pic3)}}" style="width: 50px" alt="Card image cap"> @endif
                                </td>
                                <td><a href="{{'/pagepost/'.$postpage->id.'/'.$postpage->dis}}" class="btn btn-outline-primary"> <i class="fa fa-info-circle" aria-hidden="true"></i> </a></td>

                                <td>
                                    <form action="{{Route('postspage.destroy',['id'=> $postpage->id])}}" method="post">

                                        @csrf @method('DELETE')
                                        <button type="submit" class="btn btn-outline-danger "> <i class="fa fa-trash" aria-hidden="true"></i></button>

                                    </form>
                                </td>
                                <td>{{$postpage->created_at->diffForHumans()}}</td>
                            </tr>
                            @endforeach
                        </tbody>

                    </table>

                </div>
            </div>

        </main>

    </div>
</body>

@endsection
