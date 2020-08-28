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
                            <h3>تعديل صفحتي</h3>
                            <div class="post-project-fields">
                                <form action="{{url('/updatemypage/'.$IdPage->id)}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="row">
                                        <input type="text" hidden name="user_id">
                                        <div class="col-6 col-md-3">
                                            <select name="place" id="">
                                            <option value="{{$IdPage->place}}" selected>{{$IdPage->pages->city_name}}</option>
                                                @foreach ($AdminCity as $city)
                                                <option value="{{$city->id}}">{{$city->city_name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-6 col-md-3">
                                            <input type="text" placeholder="الرقم" value="{{$IdPage->phone}}"  style="direction: rtl;" name="phone" id="">
                                        </div>
                                        <div class="col-6 col-md-3">
                                            <input type="text" placeholder="عن الخدمة" value="{{$IdPage->servis}}" style="direction: rtl;" name="servis" id="">
                                        </div>
                                        <div class="col-6 col-md-3">
                                            <input type="text" placeholder="اسم الصفحة" value="{{$IdPage->namepage}}" style="direction: rtl;" name="namepage" id="">
                                        </div>
                                        <div class="col-lg-12">
                                            <textarea placeholder="معلومات عن الصفحة" style="direction: rtl;" name="about">{{$IdPage->about}}</textarea>
                                        </div>
                                        <div class="col-6 ">
                                            <input type="file" name="pic" id="input-file-now" value="$IdPage->pic" class="dropify" @if ($IdPage->pic) data-default-file="{{ asset('/pages/' . $IdPage->pic)}}" @endif />
                                        </div>
                                        <div class="col-6 ">
                                        <input type="file" name="cover" id="input-file-now" value="{{$IdPage->cover}}" class="dropify" @if ($IdPage->cover) data-default-file="{{ asset('/pages/' . $IdPage->cover)}}" @endif />
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
                    </div>
                </div>
            </div><!-- main-section-data end-->
        </div>
    </div>
</main>






@endsection
