@extends('layouts.naw_app')
@section('title', $Servies->name_services)

@section('contant')

<main>
    <div class="main-section">
        <div class="container">
            <div class="main-section-data">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="post-project">
                            <h3>تعديل الخدمة</h3>
                            <div class="post-project-fields">
                                <form action="{{'/Servisupdate/'.$Servies->id}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="row">
                                        <input type="text" value="{{$Servies->user_id}}" hidden name="user_id">
                                        <div class="col-6">
                                            <input type="text" value="{{$Servies->price}}" placeholder="السعر" name="price" id="">
                                        </div>
                                        <div class="col-6">
                                            <input type="text" value="{{$Servies->name_services}}" placeholder="اسم الخدمة" name="name_services" id="">
                                        </div>
                                        <div class="col-6">
                                            <input type="text" value="{{$Servies->phone}}" placeholder="الرقم" name="phone" id="">
                                        </div>
                                        <div class="col-6">
                                            <select name="place" id="">
                                                <option value="{{$Servies->place}}" selected>{{$Servies->Place->city_name}}</option>
                                                @foreach ($citys as $city)
                                                <option value="{{$city->id}}">{{$city->city_name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-lg-12">
                                            <textarea placeholder="انشر شئيا جديدا" name="dis_services">{{$Servies->dis_services}}</textarea>
                                        </div>
                                        <div class="col-6">
                                        <input type="file" name="pic" value="{{$Servies->pic}}" id="input-file-now" class="dropify" @if ($Servies->pic) data-default-file="{{ asset('/pics/' . $Servies->pic)}}" @endif />
                                        </div>
                                        <div class="col-6">
                                            <input type="file" name="pic1" value="{{$Servies->pic1}}" id="input-file-now" class="dropify" @if ($Servies->pic1) data-default-file="{{ asset('/pics/' . $Servies->pic1)}}" @endif/>
                                        </div>
                                        <div class="col-6">
                                            <input type="file" name="pic2" value="{{$Servies->pic2}}" id="input-file-now" class="dropify" @if ($Servies->pic2) data-default-file="{{ asset('/pics/' . $Servies->pic2)}}" @endif />
                                        </div>
                                        <div class="col-6">
                                            <input type="file" name="pic3" value="{{$Servies->pic3}}" id="input-file-now" class="dropify" @if ($Servies->pic3) data-default-file="{{ asset('/pics/' . $Servies->pic3)}}" @endif />
                                        </div>
                                        @if (Auth::user()->per == '1')
                                        <div class="col-12">
                                            <select name="Status" id="">
                                                <option value="D">عرض</option>
                                                <option value="B">عدم العرض</option>
                                            </select>
                                        </div>
                                        @endif
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
