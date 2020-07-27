@extends('backend.layouts.admin')
@section('style')
<!--begin::Page Vendors Styles(used by this page) -->

<!--end::Page Vendors Styles -->
<style>
.imagebrowes{
    margin-left:20rem !important;
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
         <li class="active"> <a href="{{route('admin.Coache')}}">Coaches</a></li>

      </ol>
    </section>
<div class="row">

        <div class=" col-md-offset-2 col-md-8  col-md-offset-2 ">
                <!-- Horizontal Form -->
                <div class="box box-info">
                    <div class="box-header with-border">
                    <h3 class="box-title">{{ __('Edit Coache') }}</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                      <form  class="form-horizontal" method="POST" action="{{ route('admin.Coache.update' ,[ 'id' => $coache->id ]) }}" enctype="multipart/form-data">

                     @method('PUT')
                        @csrf

                    <div class="box-body">
                        <div class="form-group">
                            <label for="name" class="col-sm-3  col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-sm-9 ">
                                <input id="name" type="text"     value="{{$coache->name }}"  class="form-control @error('name') is-invalid @enderror" name="name"  required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name_ar" class="col-sm-3  col-form-label text-md-right">{{ __('Name_ar') }}</label>

                            <div class="col-sm-9 ">
                                <input id="name_ar" type="text"     value="{{$coache->name_ar }}"  class="form-control @error('name_ar') is-invalid @enderror" name="name_ar"  required autocomplete="name_ar" autofocus>

                                @error('name_ar')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="identity" class="col-sm-3 col-form-label text-md-right">{{ __('Identity Number') }}</label>

                            <div class="col-sm-9">
                                <input id="identity" type="text" class="form-control @error('identity') is-invalid @enderror" name="identity" value="{{ $coache->identity }}" required autocomplete="identity" autofocus>

                                @error('identity')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email" class="col-sm-3  col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-sm-9 ">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $coache->email }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="mobile" class="col-sm-3  col-form-label text-md-right">{{ __('Mobile Number') }}</label>

                            <div class="col-sm-9 ">
                                <input id="mobile" type="text" class="form-control @error('mobile') is-invalid @enderror" name="mobile" value="{{$coache->mobile }}" required autocomplete="mobile" autofocus>

                                @error('mobile')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="city" class="col-sm-3  col-form-label text-md-right">{{ __('City') }}</label>

                            <div class="col-sm-9 ">
                                <input id="city" type="text" class="form-control @error('city') is-invalid @enderror" name="city" value="{{ $coache->city }}" required autocomplete="city" autofocus>

                                @error('city')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="country" class="col-sm-3  col-form-label text-md-right">{{ __('Country') }}</label>

                            <div class="col-sm-9 ">
                                <input id="country" type="text" class="form-control @error('country') is-invalid @enderror" name="country" value="{{ $coache->country }}" required autocomplete="country" autofocus>

                                @error('country')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="address" class="col-sm-3  col-form-label text-md-right">{{ __('Full Address') }}</label>

                            <div class="col-sm-9 ">
                                <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ $coache->address }}" required autocomplete="address" autofocus>

                                @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group   ">
                        <label for="description" class="col-sm-3 col-form-label">Description</label>
                        <div class="col-sm-9">

                        <textarea class="form-control" id="description" name="description" rows="5"  placeholder="Description">
                        {{ $coache->description }}
                        </textarea>
                        @error('description')
                            <p class="text-danger">{{$message}}</p>
                            @enderror

                    </div>
                 </div>

                 <div class="form-group   ">
                        <label for="description_ar" class="col-sm-3 col-form-label">Description_ar</label>
                        <div class="col-sm-9">

                        <textarea class="form-control" id="description_ar" name="description_ar" rows="5"  placeholder="Description_ar">
                        {{ $coache->description_ar }}
                        </textarea>
                        @error('description_ar')
                            <p class="text-danger">{{$message}}</p>
                            @enderror

                    </div>
                 </div>
                        <div class="form-group ">
                <label for="image" class="col-sm-3  col-form-label text-md-right">{{__('Image')}}</label>
                <div class="col-sm-9 ">
                                <div class="custom-file">
                    <input type="file" class="custom-file-input" name="image" id="customFile"  >
                    <!-- <label class="custom-file-label" for="customFile">Choose file</label> -->
                    @error('image')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                </div>
                </div>
            </div>
            <div class="form-group ">
                        <img class="imagebrowes" src="{{ asset('public/storage/' . $coache->image) }}" height="100" style="margin-left:20rem !important;" />
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
