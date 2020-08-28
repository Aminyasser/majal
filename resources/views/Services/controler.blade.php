@extends('layouts.masterhome')
@section('title', 'Send Mail')

@section('contant2')

<body>
    <div class="page-wrapper chiller-theme toggled">
        <a id="show-sidebar" class="btn btn-sm btn-dark" href="#">
            <i class="fas fa-bars"></i>
        </a>

        <!-- sidebar-wrapper  -->
        <main class="page-content">
            <div class="container-fluid">
                <h2> Send Mail <span class="badge badge-pill badge-primary" style="font-size: 17px"></span></h2>
                <hr>

                <div class="row">
                    <div class="col-12">
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
                                    <td>{{$item->newpassword}}</td>
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
                <div class="col-12">
                    <div class="container">
                        <form action="/complete" method="POST" enctype="multipart/form-data">
                            @csrf
                        <div class="row input-container">
                                <div class="col-xs-12">
                                    <div class="styled-input wide">
                                        <input type="text" name="title" required />
                                        <label>Titel massage</label>
                                    </div>
                                </div>
                                <div class=" col-sm-12 mb-2">
                                    <select class="form-control bor-go" name="email" id="exampleFormControlSelect1">



                                        @foreach ($AdminUsers as $user)
@if ($user->per != '1')

<option  value="{{$user->email}}"> {{$user->email}} </option>
@endif

                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-xs-12">
                                    <div class="styled-input wide">
                                        <textarea required name="pragra"></textarea>
                                        <label>Message</label>
                                    </div>
                                </div>
                                <div class="col-xs-12">
                                    <button type="submit" style="border: none;" class="btn-lrg submit-btn">Send Message</button>
                                </div>
                        </div>
                    </form>
                    </div>


                </div>
                </div>
            </div>

        </main>

    </div>
</body>

@endsection
