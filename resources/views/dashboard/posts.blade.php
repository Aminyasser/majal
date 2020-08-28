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
                <h2>Posts <span class="badge badge-pill badge-success" style="font-size: 17px">{{$AdminPosts->count()}}</span></h2>
                <hr>

                <div class="row">
                    <table class="table table-striped table-dark">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Auth Post</th>
                                <th scope="col">Created At</th>
                                <th scope="col">Show</th>
                                <th scope="col">Edit</th>
                                <th scope="col">Delete</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($AdminPosts as $post)
                            <tr>
                                <th scope="row">1</th>
                                <td> <a href="{{'/show/'. $post->user_id.'/'.$post->user->name}}"> {{$post->user->name}}</a>
                                </td>
                                </td scope="row">
                                <td>{{$post->created_at->diffForHumans()}}</td>
                                <td scope="row">

                                    <a href="{{'/posts/'.$post->id}}" class="btn btn-outline-primary"> <i class="fa fa-info-circle" aria-hidden="true"></i> </a></td>
                                <td scope="row">
                                    <a href="{{'/posts/'. $post->id . '/edit'}}" class="card-link btn btn-outline-success float-left"> <i class="fa fa-pencil-square-o" aria-hidden="true"></i></i></a>
                                </td>
                                @if (Auth::user()->per == '1' )
                                <td scope="row">

                                    <form action="{{Route('posts.destroy',['id'=> $post->id])}}" method="post">

                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-outline-danger float-left mr-2"><i class="fa fa-trash" aria-hidden="true"></i></button>

                                    </form>

                                </td>

                                @else

                                <td>
                                    ليس لديك صلاحية
                                </td>

                                @endif

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
