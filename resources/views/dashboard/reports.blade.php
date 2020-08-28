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
                <h2>Reports <span class="badge badge-pill badge-danger" style="font-size: 17px">{{$AdminReports->count()}}</span></h2>
                <hr>

                <div class="col-12">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Reports</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">problem</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <div class="row">
                                <table class="table table-striped table-dark">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Auth reporting </th>
                                            <th scope="col"> Report to </th>
                                            <th scope="col">Time</th>
                                            <th scope="col"> Reporting content </th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($AdminReports as $item)
                                        @if($item->reportuser)
                                        <tr>
                                            <th scope="row">#</th>
                                            <td>
                                             @if($item->reportowner)   <a href="{{'/show/'. $item->Authreoprt->id.'/'.$item->Authreoprt->name}}">{{ $item->Authreoprt->name}}</a> @endif
                                            </td>
                                            <td>
                                            @if($item->reportuser) <a href="{{'/show/'. $item->Userreoprt->id.'/'.$item->Userreoprt->name}}">{{$item->Userreoprt->name}}</a> @endif
                                            </td>
                                            <td>
                                            @if($item->reportuser)   {{ date('d M, h:i a', strtotime($item->created_at)) }} @endif
                                            </td>
                                            <td>{{$item->aboutreport}}</td>
                                        </tr>
                                        @endif
                                        @endforeach
                                    </tbody>

                                </table>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            <div class="row">
                                <table class="table table-striped table-dark">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col"> Retrieval mail </th>
                                            <th scope="col"> The account to be retrieved </th>
                                            <th scope="col">Time</th>
                                            <th scope="col"> question answer </th>
                                            <th scope="col"> New password </th>
                                            <th scope="col"> Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($AdminReports as $item)
                                        @if($item->account)
                                        <tr>
                                            <th scope="row">#</th>
                                            <td>
                                             @if ($item->emailuser)   {{$item->emailuser}} @endif
                                            </td>
                                            <td>
                                                @if ($item->emailuser)
                                                @foreach ($AdminUsers as $user)
                                                @if ($user->email == $item->account)
                                                <i class="fa fa-check" aria-hidden="true"></i>
                                                <a href="{{'/show/'. $user->id.'/'.$user->name }}">{{$user->name}} </a>
                                                @endif
                                                @endforeach
                                                {{$item->account}}
                                                @endif
                                            </td>
                                            <td>  @if ($item->emailuser) {{ date('d M, h:i a', strtotime($item->created_at)) }} @endif </td>
                                            <td>
                                                @foreach ($AdminUsers as $user)
                                                @if ($user->answer == $item->answer  )
                                                <i class="fa fa-check" aria-hidden="true"></i>
                                                @endif
                                                @endforeach
                                            </td>
                                            @foreach ($AdminUsers as $user)
                                                @if ($user->answer == $item->answer  )
                                            <td scope="row">
                                      <form action="{{Route('update.email',['id'=> $user->id])}}" method="post">
                                        @csrf
                                        @method('PUT')
                                      <input type="text" name="email" hidden value="{{$item->emailuser}}">

                                      <button class="btn btn-outline-success" type="submit">Change</button>
                                      </form>
                                            </td>
                                            @else
                                            <td scope="row">
                                                <i class="fa fa-window-close" aria-hidden="true"></i>
                                                      </td>
                                            @endif
                                            @endforeach
                                            <td>
                                                @if ($item->action == 0)
                                                <form action="{{Route('report.update',['id'=> $item->id])}}" method="post">
                                                    <input type="text" value="1" name="action" hidden>
                                                    @csrf
                                                    @method('PUT')
                                                    <button type="submit" class="btn btn-outline-warning float-left mr-2"><i class="fa fa-pause" aria-hidden="true"></i></button>
                                                </form>
                                                @else
                                                <form action="{{Route('report.update',['id'=> $item->id])}}" method="post">
                                                    <input type="text" value="0" name="action" hidden>
                                                    @csrf
                                                    @method('PUT')
                                                    <button type="submit" class="btn btn-outline-success float-left mr-2"><i class="fa fa-check" aria-hidden="true"></i></button>
                                                </form>
                                                @endif
                                            </td>
                                        </tr>
                                        @endif
                                        @endforeach
                                    </tbody>

                                </table>

                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </main>

    </div>
</body>

@endsection
