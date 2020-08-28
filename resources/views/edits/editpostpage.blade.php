@extends('layouts.naw_app')
@section('title', '/')

@section('contant')

<main>
    <div class="main-section">
        <div class="container">
            <div class="main-section-data">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="post-project">
                            <h3>تعديل منشور</h3>
                            <div class="post-project-fields">
                                <form action="{{'/updatepagepost/'.$post->id}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="row">
                                        <input type="text" name="page_id" value="{{$post->page_id}}" hidden>
                                        <div class="col-lg-12">
                                            <textarea placeholder="انشر شئيا جديدا" name="dis">{{$post->dis}}</textarea>
                                        </div>
                                        <div class="col-6">
                                            <input type="file" name="pic" id="input-file-now" class="dropify" @if ($post->pic) data-default-file="{{ asset('/postpages/' . $post->pic)}}" @endif />
                                        </div>
                                        <div class="col-6">
                                            <input type="file" name="pic2" id="input-file-now" class="dropify" @if ($post->pic2) data-default-file="{{ asset('/postpages/' . $post->pic2)}}" @endif/>
                                        </div>
                                        <div class="col-6">
                                            <input type="file" name="pic3" id="input-file-now" class="dropify" @if ($post->pic3) data-default-file="{{ asset('/postpages/' . $post->pic3)}}" @endif />
                                        </div>
                                        <div class="col-6">
                                            <input type="file" name="pic4" id="input-file-now" class="dropify" @if ($post->pic4) data-default-file="{{ asset('/postpages/' . $post->pic4)}}" @endif  />
                                        </div>
                                        <div class="col-lg-12">
                                            <ul>
                                                <li><button class="active" type="submit" value="post">Post</button></li>
                                            </ul>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!--post-project-fields end-->
                            <a href="#" title=""><i class="la la-times-circle-o"></i></a>
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
