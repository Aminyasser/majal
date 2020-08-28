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
                <h2>Job <span class="badge badge-pill badge-primary" style="font-size: 17px">{{$Adminjob->count()}}</span></h2>
                <hr>

                <div class="row">
                    <div class="col-6">
                        <form action="/job" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <input type="text" name="job" class="form-control" required id="exampleInputEmail1"
                                    aria-describedby="emailHelp" placeholder="اضافة الوظيفة">
                            </div>
                        </form>
                    </div>
                    <table class="table table-striped table-dark">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Title</th>
                                <th scope="col">update</th>
                                <th scope="col">Created At</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($Adminjob as $job)
                            <tr>
                                <td scope="row">{{$job->id}}</td>
                                <td scope="row">{{$job->job_name}}</td>

                                <td scope="row">

                                    <form action="{{Route('job.destroy',['id'=> $job->id])}}" method="post">

                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-outline-danger float-left mr-2"><i class="fa fa-trash"
                                                aria-hidden="true"></i></button>

                                    </form>
                                </td>


                                </td scope="row">
                                <td>{{$job->created_at->diffForHumans()}}</td>


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
