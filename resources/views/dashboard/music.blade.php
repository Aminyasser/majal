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
                <h2>Music <span class="badge badge-pill badge-primary" style="font-size: 17px">{{$Adminmusic->count()}}</span></h2>
                <hr>

                <div class="row">
                    <div class="col-6">
                        <form action="/music" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">

                                <label for="exampleInputEmail1">music name </label>
                                <input type="text" name="musicname" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="">
                                <small id="emailHelp" class="form-text text-muted">title the music</small>
                            </div>

                            <div class="form-group">
                                <label for="exampleFormControlFile1">music file  </label>
                                <input type="file" class="form-control-file" name="music" id="exampleFormControlFile1">
                            </div>

                            <div class="d-flex justify-content-center mt-3">
                                <button type="submit " class="btn btn-primary "> uplode <i class="fa fa-check-square" aria-hidden="true"></i></button>
                            </div>
                        </form>
                    </div>
                    <table class="table table-striped table-dark">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">name</th>
                                <th scope="col">delete</th>

                                <th scope="col">Created by</th>

                              </tr>
                        </thead>
                        <tbody>
                            @foreach ($Adminmusic as $music)
                            <tr>
                                <td scope="row">{{$music->id}}</td>
                                  <td scope="row">{{$music->name}}</td>

                                  <td scope="row">

                                      <form action="{{Route('music.destroy',['id'=> $music->id])}}" method="post">

                                          @csrf
                                          @method('DELETE')
                                          <button type="submit" class="btn btn-outline-danger float-left mr-2"><i class="fa fa-trash" aria-hidden="true"></i></button>

                                        </form>
                                    </td>


                                </td scope="row">
                                  <td>{{$music->created_at->diffForHumans()}}</td>
                                  <td>
                                      <audio height="100px" width="200px" controls>
                                          <source src=" {{ asset('/musics/'. $music->music)}}" type="video/mp4">
                                      </audio>
                                  </td>

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
