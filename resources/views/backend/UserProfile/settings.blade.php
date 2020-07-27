@extends('backend.layouts.admin')
@section('style')
<!--begin::Page Vendors Styles(used by this page) -->

<!--end::Page Vendors Styles -->
<style>
.imagebrowes{
    margin-left:8rem !important;
    height:100px !important;

}
</style>

@endsection

@section('content')
<section class="content-header" style="margin-bottom:10px;">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{route('admin.dashboard')}}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"> <a href="{{route('admin.userprofile.edit')}}">Edite Profile</a></li>
      </ol>
    </section>
<div class="row">

        <div class=" col-md-offset-2 col-md-8  col-md-offset-2 ">
                <!-- Horizontal Form -->
                <div class="box box-info">
                    <div class="box-header with-border">
                    <h3 class="box-title">{{ __('Settings') }}</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                      <form class="form-horizontal" method="post"  action="{{ route('admin.setting.update') }}">
                    @method('PUT')
                        @csrf

                    <div class="box-body">
                    <h4 style="margin-bottom:20px" class="text-primary">Social media settings</h4>
                        <div class="form-group">
                            <label  class="col-sm-3  col-form-label text-md-right">FaceBook:</label>

                            <div class="col-sm-9 ">
                                <input id="{{$facebook->constant }}" type="text"     value="{{$facebook->value }}"  class="form-control @error('$facebook->constant') is-invalid @enderror" name="{{$facebook->constant }}"   autofocus>

                                @error('{{$facebook->constant}}')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label  class="col-sm-3  col-form-label text-md-right">Instagram:</label>

                        <div class="col-sm-9 ">
                                <input id="{{$instagram->constant }}" type="text"     value="{{$instagram->value }}"  class="form-control @error('$instagram->constant') is-invalid @enderror" name="{{$instagram->constant }}"    autofocus>

                                @error('{{$instagram->constant}}')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label  class="col-sm-3  col-form-label text-md-right">Telephone:</label>

                        <div class="col-sm-9 ">
                                <input id="{{$telephone->constant }}" type="text"     value="{{$telephone->value }}"  class="form-control @error('$telephone->constant') is-invalid @enderror" name="{{$telephone->constant }}"    autofocus>

                                @error('{{$telephone->constant}}')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label  class="col-sm-3  col-form-label text-md-right">Whatsapp:</label>

                        <div class="col-sm-9 ">
                                <input id="{{$whatsapp->constant }}" type="text"     value="{{$whatsapp->value }}"  class="form-control @error('$whatsapp->constant') is-invalid @enderror" name="{{$whatsapp->constant }}"    autofocus>

                                @error('{{$whatsapp->constant}}')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label  class="col-sm-3  col-form-label text-md-right">Instagram:</label>

                        <div class="col-sm-9 ">
                                <input id="{{$instagram->constant }}" type="text"     value="{{$instagram->value }}"  class="form-control @error('$instagram->constant') is-invalid @enderror" name="{{$instagram->constant }}"    autofocus>

                                @error('{{$instagram->constant}}')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label  class="col-sm-3  col-form-label text-md-right">Twitter:</label>

                        <div class="col-sm-9 ">
                                <input id="{{$twitter->constant }}" type="text"     value="{{$twitter->value }}"  class="form-control @error('$twitter->constant') is-invalid @enderror" name="{{$twitter->constant }}"     autofocus>

                                @error('{{$twitter->constant}}')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label  class="col-sm-3  col-form-label text-md-right">Location:</label>

                        <div class="col-sm-9 ">
                                <input id="{{$location->constant }}" type="text"     value="{{$location->value }}"  class="form-control @error('$location->constant') is-invalid @enderror" name="{{$location->constant }}"    autofocus>

                                @error('{{$location->constant}}')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <h4 style="margin-bottom:20px" class="text-primary">Payment settings</h4>
                        <div class="form-group">
                            <label  class="col-sm-3  col-form-label text-md-right">Api key:</label>

                        <div class="col-sm-9 ">
                                <input id="{{$apikey->constant }}" type="text"     value="{{$apikey->value }}"  class="form-control @error('$apikey->constant') is-invalid @enderror" name="{{$apikey->constant }}"     autofocus>

                                @error('{{$apikey->constant}}')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label  class="col-sm-3  col-form-label text-md-right">User name:</label>

                        <div class="col-sm-9 ">
                                <input id="{{$username->constant }}" type="text"     value="{{$username->value }}"  class="form-control @error('$username->constant') is-invalid @enderror" name="{{$username->constant }}"     autofocus>

                                @error('{{$username->constant}}')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label  class="col-sm-3  col-form-label text-md-right">Password:</label>

                        <div class="col-sm-9 ">
                                <input id="{{$password->constant }}" type="password"     value="{{$password->value }}"  class="form-control @error('$password->constant') is-invalid @enderror" name="{{$password->constant }}"     autofocus>

                                @error('{{$password->constant}}')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <h4 style="margin-bottom:20px" class="text-primary">Pages settings</h4>

                        <div class="form-group">
                            <label  class="col-sm-3  col-form-label text-md-right">Home title:</label>

                        <div class="col-sm-9 ">
                                <input id="{{$home_title->constant }}" type="text"     value="{{$home_title->value }}"  class="form-control @error('$home_title->constant') is-invalid @enderror" name="{{$home_title->constant }}"  autofocus>

                                @error('{{$home_title->constant}}')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label  class="col-sm-3  col-form-label text-md-right">Home title_ar:</label>

                        <div class="col-sm-9 ">
                                <input id="{{$home_title_ar->constant }}" type="text"     value="{{$home_title_ar->value }}"  class="form-control @error('$home_title_ar->constant') is-invalid @enderror" name="{{$home_title_ar->constant }}"  autofocus>

                                @error('{{$home_title_ar->constant}}')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label  class="col-sm-3  col-form-label text-md-right">Home  description :</label>

                        <div class="col-sm-9 ">
                                 <textarea id="{{$home_description->constant }}"   class="form-control @error('$home_description->constant') is-invalid @enderror" name="{{$home_description->constant }}"      rows="5"  autofocus >
                                      {{$home_description->value }}                                                  
                                         </textarea>

                                @error('{{$home_description->constant}}')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label  class="col-sm-3  col-form-label text-md-right">Home  description_ar :</label>

                        <div class="col-sm-9 ">
                                 <textarea id="{{$home_description_ar->constant }}"   class="form-control @error('$home_description_ar->constant') is-invalid @enderror" name="{{$home_description_ar->constant }}"      rows="5"  autofocus >
                                      {{$home_description_ar->value }}                                                  
                                         </textarea>

                                @error('{{$home_description_ar->constant}}')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label  class="col-sm-3  col-form-label text-md-right">Coaches Video Url:</label>

                        <div class="col-sm-9 ">
                                <input id="{{$video_url->constant }}" type="text"     value="{{$video_url->value }}"  class="form-control @error('$video_url->constant') is-invalid @enderror" name="{{$video_url->constant }}"  autofocus>

                                @error('{{$video_url->constant}}')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label  class="col-sm-3  col-form-label text-md-right">About us title:</label>

                        <div class="col-sm-9 ">
                                <input id="{{$about_title->constant }}" type="text"     value="{{$about_title->value }}"  class="form-control @error('$about_title->constant') is-invalid @enderror" name="{{$about_title->constant }}"     autofocus>

                                @error('{{$about_title->constant}}')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label  class="col-sm-3  col-form-label text-md-right">About us title_ar:</label>

                        <div class="col-sm-9 ">
                                <input id="{{$about_title_ar->constant }}" type="text"     value="{{$about_title_ar->value }}"  class="form-control @error('$about_title_ar->constant') is-invalid @enderror" name="{{$about_title_ar->constant }}"     autofocus>

                                @error('{{$about_title_ar->constant}}')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                      <div class="form-group   ">
                               <label  class="col-sm-3  col-form-label text-md-right">About us description:</label>
                                    <div class="col-sm-9">

                                      <textarea id="{{$about_description->constant }}"   class="form-control @error('$about_description->constant') is-invalid @enderror" name="{{$about_description->constant }}"      rows="5"  autofocus >
                                      {{$about_description->value }}                                                  
                                         </textarea>
               
                            @error('{{$about_description->constant}}')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>
                            </div>
                                        
                            <div class="form-group   ">
                               <label  class="col-sm-3  col-form-label text-md-right">About us description_ar:</label>
                                    <div class="col-sm-9">

                                      <textarea id="{{$about_description_ar->constant }}"   class="form-control @error('$about_description_ar->constant') is-invalid @enderror" name="{{$about_description_ar->constant }}"      rows="5"  autofocus >
                                      {{$about_description_ar->value }}                                                  
                                         </textarea>
               
                            @error('{{$about_description_ar->constant}}')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>
                            </div>
                                        

                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                    <a href="{{route('admin.dashboard')}}" class="btn btn-default">Cancel</a>
                        <button type="submit" class="btn btn-info pull-right">Edit</button>
                    </div>
                    <!-- /.box-footer -->
                    </form>
                </div>
        </div>
 </div>

@endsection
