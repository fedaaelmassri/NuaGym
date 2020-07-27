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
                    <h3 class="box-title">{{ __('Edite Profile') }}</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                      <form class="form-horizontal" method="POST" action="{{ route('admin.userprofile.update',['id'=>Auth::user()->id ]  ) }}">
                    @method('PUT')
                        @csrf

                    <div class="box-body">
                        <div class="form-group">
                            <label for="name" class="col-sm-3  col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-sm-9 ">
                                <input id="name" type="text"     value="{{$userdata->name }}"  class="form-control @error('name') is-invalid @enderror" name="name"  required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="identity" class="col-sm-3 col-form-label text-md-right">{{ __('Identity Number') }}</label>

                            <div class="col-sm-9">
                                <input id="identity" type="text" class="form-control @error('identity') is-invalid @enderror" name="identity" value="{{ $userdata->identity }}" required autocomplete="identity" autofocus>

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
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $userdata->email }}" required autocomplete="email">

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
                                <input id="mobile" type="text" class="form-control @error('mobile') is-invalid @enderror" name="mobile" value="{{$userdata->mobile }}" required autocomplete="mobile" autofocus>

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
                                <input id="city" type="text" class="form-control @error('city') is-invalid @enderror" name="city" value="{{ $userdata->city }}" required autocomplete="city" autofocus>

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
                                <input id="country" type="text" class="form-control @error('country') is-invalid @enderror" name="country" value="{{ $userdata->country }}" required autocomplete="country" autofocus>

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
                                <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ $userdata->address }}" required autocomplete="address" autofocus>

                                @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password" class="col-sm-3  col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-sm-9 ">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password"   required autocomplete="new-password">

                                @error('password')
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
