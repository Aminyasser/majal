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
                <h2>Likes <span class="badge badge-pill badge-primary" style="font-size: 17px">{{$AdminLikes->count()}}</span></h2>
                <hr>

                <div class="row">

                    <table class="table table-striped table-dark">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Post</th>
                                <th scope="col">User Like</th>
                                <th scope="col">Created At</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($AdminLikes as $like)
                            <tr>
                                <td scope="row">{{$like->id}}</td>
                                <td scope="row">{{$like->postlike->body}}</td>

                            <td scope="row">{{$like->userlike->name}}</td>

                                </td scope="row">
                                <td>{{$like->created_at->diffForHumans()}}</td>
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
