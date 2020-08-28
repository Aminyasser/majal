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
                <h2>Comments <span class="badge badge-pill badge-primary" style="font-size: 17px">{{$AdminComment->count()}}</span></h2>
                <hr>

                <div class="row">

                    <table class="table table-striped table-dark">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Post</th>
                                <th scope="col">Comment</th>
                                <th scope="col">User Comment</th>
                                <th scope="col">Created At</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($AdminComment as $commet)
                            <tr>
                                <td scope="row">{{$commet->id}}</td>
                                <td scope="row">{{$commet->postcomment->body}}</td>
                                <td scope="row">{{$commet->body}}</td>


                            <td scope="row">{{$commet->usercomment->name}}</td>

                                </td scope="row">
                                <td>{{$commet->created_at->diffForHumans()}}</td>
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
