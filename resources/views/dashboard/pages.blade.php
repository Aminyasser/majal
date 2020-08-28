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
                <h2>Pages <span class="badge badge-pill badge-primary" style="font-size: 17px">{{$AdminPages->count()}}</span></h2>
                <hr>

                <div class="row">
                    <table class="table table-striped table-dark">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Auth Page</th>
                                <th scope="col">Name page</th>
                                <th scope="col">place</th>
                                <th scope="col">servis</th>
                                <th scope="col">Created At</th>
                                <th scope="col">Delete</th>
                                <th scope="col">Likes</th>


                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($AdminPages as $page)
                            <tr>
                                <th scope="row">1</th>
                            <td> <a href="{{'/show/'.$page->Authpage->id.'/'.$page->Authpage->name}}">{{$page->Authpage->name}}</a></td>
                            <td> <a href="{{'/page/'.$page->id.'/'.$page->namepage.'/'.$page->servis}}}">{{$page->Authpage->name}}</a></td>
                            <td>{{$page->pages->city_name}}</td>
                            <td>{{$page->servis}}</td>
                            <td>{{$page->created_at->diffForHumans()}}</td>
                            @if (Auth::user()->per == '1' )
                            <td scope="row">

                                <form action="{{Route('page.delete',['id'=> $page->id])}}" method="post">

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
                            <td>
                                    {{$page->pagelike->count()}}
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
