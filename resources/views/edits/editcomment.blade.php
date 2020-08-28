@extends('layouts.naw_app')
@section('title', 'تعديل التعليق')

@section('contant')

<main>
    <div class="main-section">
        <div class="container">
            <div class="main-section-data">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="post-project">
                            <h3>تعديل التعليق</h3>
                            <div class="post-project-fields">
                                <form action="{{url('/updatecomment/'. $comment->id)}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <textarea style="direction: rtl;" placeholder="انشر شئيا جديدا" name="body">{{$comment->body}}</textarea>
                                        </div>
                                        <div class="col-lg-12">
                                            <ul>
                                                <li><button class="active" type="submit" value="post">تحديث</button></li>
                                            </ul>
                                        </div>
                                    </div>
                                </form>
                            </div>

                        </div>
                        <!--post-project end-->

                        <!--main-ws-sec end-->
                    </div>

                </div>
            </div><!-- main-section-data end-->
        </div>
    </div>
</main>






@endsection
