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
                                <form action="{{url('/posts/'. $post->id.'/update')}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <textarea style="direction: rtl;" placeholder="انشر شئيا جديدا" name="body">{{$post->body}}</textarea>
                                        </div>
                                        <div class="col-6">
                                            <input type="file" name="coverimage" value="" id="input-file-now" class="dropify" @if ($post->image) data-default-file="{{ asset('/coverimage/' . $post->image)}}" @endif />
                                        </div>
                                        <div class="col-6">
                                            <input type="file" name="video" id="input-file-now" value="" class="dropify" @if ($post->video) data-default-file="{{ asset('/videos/' . $post->video)}}" @endif/>
                                        </div>

                                        <div class="col-lg-12">
                                            <ul>
                                                <li><button class="active" type="submit" value="post">Post</button></li>
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
