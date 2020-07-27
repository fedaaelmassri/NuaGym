@extends('frontend.layouts.master')
@section('style')
@endsection
@section('content')
    <!-----start body ------>
<!--------- Start section1-->
<div class=" section1 aboutus">
  <div class="row">
    <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 ">
      <div clas="row">
        <!-- <div class="col-lg-2 col-md-3 col-sm-2  d-sm-block d-none ">
          <div style="height:154px"  class="" >
                <div class="progress-text mt-50 ">
                      06
                </div>
                <div class="progress">
                    <div class="progress-bar  " role="progressbar" style="width: 30.5%   " aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">
                    </div>
                </div>
                <div class="progress-text mb-50">
                      06
                </div>
            </div>
          </div>
        </div> -->
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12  ">
              <div class="bigcircle">
                  <img  class="img-responsive" src="{{asset('public/assets/images/carlos-andrades6.png')}}"  />
              </div>
          </div>
      </div>
     </div>
      <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 ">
          <div>
            <h1>
              @if(App::getLocale() == 'en')

              {{App\Settings::where('constant','about_title')->first('value')->value}}
              @endif
              @if(App::getLocale() == 'ar')

              {{App\Settings::where('constant','about_title_ar')->first('value')->value}}
              @endif
          </h1>
        </div>
        <div class="row  ">
            <div class="col-sm-9 col-xs-12">
            <div style="margin-left:15px" >
                <p >
                  @if(App::getLocale() == 'en')

                  {{App\Settings::where('constant','about_description')->first('value')->value}}
                  @endif
                  @if(App::getLocale() == 'ar')

                  {{App\Settings::where('constant','about_description_ar')->first('value')->value}}
                  @endif

                </p>
                <a class="btn  btn-lg yellowbtnsec2">
                  {{trans('lang.contact_btn')}}
                </a>
              </div>
            </div>
            <div class="col-sm-3 d-sm-block d-none">
              <div class="copyright">
                  Nua 2020
              </div>
            </div>
        </div>
        </div>
    </div>  
  </div>
</div>
   <!--------- Start section2-->
  <div class="container section2">
           <div class="musebtn" style="background:transparent url('public/assets/images/mouse.svg') 0% 0% no-repeat padding-box"></div>
         <div class="socialmedia float-right">
           <!-- <a target="_blank" href=" {{App\Settings::where('constant','facebook')->first('value')->value}}"> <i class="fab fa-facebook-f"></i></a> -->
           <a target="_blank" href=" {{App\Settings::where('constant','instagram')->first('value')->value}}"> <i class="fab fa-instagram"></i></a>
           <!-- <a target="_blank" href=" {{App\Settings::where('constant','twitter')->first('value')->value}}">    <i class="fab fa-twitter"></i></a> -->
         </div>
  </div>
       <!-- end body  -->

       @endsection
