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
                <h2>Services <span class="badge badge-pill badge-light" style="font-size: 17px">{{$AdminServices->count()}}</span></h2>
                <hr>

                <div class="row">
                    <table class="table table-striped table-dark">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">name</th>
                                <th scope="col"> Edit</th>
                                <th scope="col">delete</th>
                                <th scope="col">Show</th>
                                <th scope="col">Created by</th>
                                <th>show</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($AdminServices as $servis)
                            <tr>
                            <td scope="row">{{$servis->id}}</td>
                              <td scope="row">{{$servis->name_services}}</td>
                              <td scope="row">
                                <a href="/Servis/{{$servis->id}}/{{$servis->name_services}}/edit" class="card-link btn btn-outline-success float-left"> <i class="fa fa-pencil-square-o" aria-hidden="true"></i></i></a>
                              </td>
                              <td scope="row">

                                  <form action="{{Route('service.destroy',['id'=> $servis->id])}}" method="post">

                                      @csrf
                                      @method('DELETE')
                                      <button type="submit" class="btn btn-outline-danger float-left mr-2"><i class="fa fa-trash" aria-hidden="true"></i></button>

                                    </form>
                                </td>
                            <td scope="row">

                              <a href="{{'/Servis/'. $servis->id.'/'.$servis->name_services }}" class="btn btn-outline-primary"> <i class="fa fa-info-circle" aria-hidden="true"></i>  </a></td>

                            </td scope="row">
                              <td>{{$servis->created_at->diffForHumans()}}</td>
                              <td>

          @if($servis->pic)    <img   src="{{ asset('/pics/' . $servis->pic)}}" style="width: 50px" alt="Card image cap"> @endif
          @if($servis->pic1)   <img   src="{{ asset('/pics/' . $servis->pic1)}}" style="width: 50px" alt="Card image cap"> @endif
          @if($servis->pic2)    <img   src="{{ asset('/pics/' . $servis->pic2)}}" style="width: 50px" alt="Card image cap"> @endif
          @if($servis->pic3)    <img   src="{{ asset('/pics/' . $servis->pic3)}}" style="width: 50px" alt="Card image cap"> @endif

                              </td>
                              <td>
                                @if ($servis->Status == 'p')
                                <form action="{{Route('update.services',['id'=> $servis->id])}}" method="post">
                                    <input type="text" value="D" name="Status" hidden>
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="btn btn-outline-warning float-left mr-2"><i class="fa fa-pause" aria-hidden="true"></i></button>
                                </form>
                                @else
                                <form action="{{Route('update.services',['id'=> $servis->id])}}" method="post">
                                    <input type="text" value="p" name="Status" hidden>
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="btn btn-outline-success float-left mr-2"><i class="fa fa-check" aria-hidden="true"></i></button>
                                </form>
                                @endif
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
