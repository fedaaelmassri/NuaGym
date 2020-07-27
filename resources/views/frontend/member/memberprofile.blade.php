@extends('frontend.layouts.admin')
@push('style')
<!--begin::Page Vendors Styles(used by this page) -->
 <!--end::Page Vendors Styles -->
 <style>
 [dir="ltr"] .imagebrowes{
    margin-left:29rem !important;
    height:100px !important;

}
[dir="rtl"] .imagebrowes{
    margin-right:29rem !important;
    height:100px !important;

}
/* [dir="rtl"] .rtl-lable{
float:right !important;
} */

 
</style>
 @endpush

@section('content')
<div class="row">

        <div class=" col-md-offset-2 col-md-8  col-md-offset-2 ">
                <!-- Horizontal Form -->
                <div class="box box-info">
                    <div class="box-header with-border">
                    <h3 class="box-title">{{ trans('lang.member_dashbord.edit_profile_lbl')}}</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                     <form class="form-horizontal" method="POST" action="{{ route('member.memberprofile.update',['id'=> Auth::guard('members')->user()->id]) }}" enctype="multipart/form-data">
                    @method('PUT')
                        @csrf

                    <div class="box-body">
                        <div class="form-group">
                        @if(App::getLocale() == 'en')

<label for="name" class="col-sm-3    col-form-label text-md-right">{{trans('lang.registration.name_lbl')}}</label>
@endif

                            <div class="col-sm-9 ">
                                <input id="name" type="text"     value="{{$userdata->name }}"  class="form-control @error('name') is-invalid @enderror" name="name"  required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            @if(App::getLocale() == 'ar')

                            <label for="name" class="col-sm-3    col-form-label text-md-right">{{trans('lang.registration.name_lbl')}}</label>
                            @endif

                        </div>
                        <div class="form-group ">
                        @if(App::getLocale() == 'en')

                <label for="image" class="col-sm-3  col-form-label text-md-right">{{ trans('lang.member_dashbord.image_lbl')}}</label>
                @endif

                <div class="col-sm-9 ">
                                <div class="custom-file">
                    <input type="file" class="custom-file-input" name="image" id="customFile"  >
                    <!-- <label class="custom-file-label" for="customFile">Choose file</label> -->
                    @error('image')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                </div>
               
                </div>
                @if(App::getLocale() == 'ar')

            <label for="image" class="col-sm-3  col-form-label text-md-right">{{ trans('lang.member_dashbord.image_lbl')}}</label>
            @endif
            </div>
            <div class="form-group ">
                @if($userdata->image!='')
                        <img class="imagebrowes" src="{{ asset('public/storage/' . $userdata->image) }}"  />
                   @else
                   <img src="{{asset('public/assets/dist/img/avatablu.png')}}" class="imagebrowes" alt="User Image">

                        @endif

                    </div>

                        




                        <div class="form-group">
                        @if(App::getLocale() == 'en')

                            <label for="identity" class="col-sm-3 col-form-label text-md-right">{{trans('lang.registration.identity_lbl')}}</label>
                            @endif

                            <div class="col-sm-9">
                                <input id="identity" type="text" class="form-control @error('identity') is-invalid @enderror" name="identity" value="{{ $userdata->identity }}" required autocomplete="identity" autofocus>

                                @error('identity')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            @if(App::getLocale() == 'ar')

<label for="identity" class="col-sm-3 col-form-label text-md-right">{{trans('lang.registration.identity_lbl')}}</label>
@endif
                        </div>
                        <div class="form-group">
                        @if(App::getLocale() == 'en')

                            <label for="email" class="col-sm-3  col-form-label text-md-right">{{trans('lang.registration.email_lbl')}}</label>
                            @endif

                            <div class="col-sm-9 ">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $userdata->email }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            @if(App::getLocale() == 'ar')

<label for="email" class="col-sm-3  col-form-label text-md-right">{{trans('lang.registration.email_lbl')}}</label>
@endif
                        </div>

                        <div class="form-group">
                        @if(App::getLocale() == 'en')

                            <label for="mobile" class="col-sm-3  col-form-label text-md-right">{{trans('lang.registration.phone_lbl')}}</label>
                            @endif

                            <div class="col-sm-9 ">
                                <input id="mobile" type="text" class="form-control @error('mobile') is-invalid @enderror" name="mobile" value="{{$userdata->mobile }}" required autocomplete="mobile" autofocus>

                                @error('mobile')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            @if(App::getLocale() == 'ar')

<label for="mobile" class="col-sm-3  col-form-label text-md-right">{{trans('lang.registration.phone_lbl')}}</label>
@endif
                        </div>

                        <div class="form-group">
                        @if(App::getLocale() == 'en')

                            <label for="city" class="col-sm-3  col-form-label text-md-right">{{trans('lang.registration.city_lbl')}}</label>
                            @endif

                            <div class="col-sm-9 ">
                                <input id="city" type="text" class="form-control @error('city') is-invalid @enderror" name="city" value="{{ $userdata->city }}" required autocomplete="city" autofocus>

                                @error('city')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            @if(App::getLocale() == 'ar')

<label for="city" class="col-sm-3  col-form-label text-md-right">{{trans('lang.registration.city_lbl')}}</label>
@endif

                        </div>
                        <div class="form-group">
                        @if(App::getLocale() == 'en')

                            <label for="country" class="col-sm-3  col-form-label text-md-right">{{trans('lang.registration.country_lbl')}}</label>
                            @endif

                            <div class="col-sm-9 ">
                                <input id="country" type="text" class="form-control @error('country') is-invalid @enderror" name="country" value="{{ $userdata->country }}" required autocomplete="country" autofocus>

                                @error('country')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            @if(App::getLocale() == 'ar')

<label for="country" class="col-sm-3  col-form-label text-md-right">{{trans('lang.registration.country_lbl')}}</label>
@endif

                        </div>

                        <div class="form-group">
                        @if(App::getLocale() == 'en')

                        <label for="address" class="col-sm-3  col-form-label text-md-right">{{trans('lang.registration.address_lbl')}}</label>
                        @endif

                            <div class="col-sm-9 ">
                             

                                <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ $userdata->address }}" required autocomplete="address" autofocus>

                                @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
 
                            @if(App::getLocale() == 'ar')

<label for="address" class="col-sm-3  col-form-label text-md-right">{{trans('lang.registration.address_lbl')}}</label>
@endif

                        </div>

                        <div class="form-group">
                        @if(App::getLocale() == 'en')

                            <label for="password" class="col-sm-3  col-form-label text-md-right">{{trans('lang.registration.password_lbl')}}</label>
                            @endif

                            <div class="col-sm-9 ">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password"   required autocomplete="new-password">
 
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            @if(App::getLocale() == 'ar')

                            <label for="password" class="col-sm-3  col-form-label text-md-right">{{trans('lang.registration.password_lbl')}}</label>
                            @endif
                        </div>

                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <a href="{{route('memberdashboard')}}" class="btn btn-default pull-left">{{trans('lang.member_dashbord.cancle_lbl')}}</a>
                        <button type="submit" class="btn btn-info pull-right">{{trans('lang.member_dashbord.edit_lbl')}}</button>
                    </div>
                    <!-- /.box-footer -->
                    </form>
                </div>
        </div>
 </div>

@endsection
