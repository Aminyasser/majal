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
            <h2 class="">Users <span class="badge badge-pill badge-warning" style="font-size: 17px"> {{$AdminUsers->count()}} </span></h2>
                <hr>
                <div class="row">
                    <table class="table table-striped table-dark">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Image</th>
                                <th scope="col">Edit</th>
                                <th scope="col">Delete</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($AdminUsers as $user)


                            <tr>
                            <th scope="row">{{$user->id}}</th>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td><img src="{{ asset('/profile/' . $user->image)}}" class="hvr-grow-shadow" width="50px" height="50px" alt=""></td>
                            @if (auth()->user()->per=='1'  )



                            <td scope="row">
                                <a href="{{'/users/'. $user->id . '/edit'}}" class="card-link btn btn-outline-success float-left">
                                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i></i></a>
                            </td>

                            <td scope="row">
                                <form action="{{Route('users.destroy',['id'=> $user->id])}}" method="post">

                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-outline-danger float-left mr-2"><i class="fa fa-trash" aria-hidden="true"></i></button>

                                </form>
                            </td>
                            @else
                        <td> ليس لديك صلاحية</td>
                        <td> ليس لديك صلاحية</td>

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
