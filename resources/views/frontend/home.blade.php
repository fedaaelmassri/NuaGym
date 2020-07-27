    @extends('frontend.layouts.master')
@section('style')
@endsection
@section('content')
    <!-----start body ------>
<!--------- Start section1-->
<div class="row section1 home">
              <div class="col-1">
                  <div style="height:154px"  class="" >
                     <div class="progress-text mt-50 ">
                         01
                       </div>
                   <div class="progress">
                       <div class="progress-bar  " role="progressbar" style="width: 30.5%   " aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                     </div>
                   <div class="progress-text mb-50">
                       06
                     </div>
                </div>
               </div>

             <div class="col-5">
                <div class="bigcircle">
                    <img  src="{{asset('public/assets/images/img.png')}}"  />
                </div>
               </div>
          <div class="col-5 ">
            <h1  >
            @if(App::getLocale() == 'en')

            {{App\Settings::where('constant','home_title')->first('value')->value}}
            @endif
            @if(App::getLocale() == 'ar')

{{App\Settings::where('constant','home_title_ar')->first('value')->value}}
@endif

             </h1>
            <p >
            @if(App::getLocale() == 'en')

 
{{App\Settings::where('constant','home_description')->first('value')->value}}
@endif

            @if(App::getLocale() == 'ar')

 
            {{App\Settings::where('constant','home_description_ar')->first('value')->value}}
            @endif

              </p>

          </div>
          <div class="col-1">
           <p class="copyright">
              Nua 2020
           </p>
          </div>

  </div>
   <!--------- Start section2-->
  <div class="row section2">
      <div class="col-6">
         <div class="musebtn" style="background:transparent url('public/assets/images/mouse.svg') 0% 0% no-repeat padding-box"></div>
      </div>
      <div class="col-5 ">
          <!-- <div class="startbtn"> -->
          <a class="btn  btn-lg yellowbtnsec2 mt-310" href="{{route('home-2')}}">
               
              {{trans('lang.started_btn')}}
          </a>
        <!-- </div> -->
        </div>
        <div class="col-1">
         <div class="socialmedia">
           <!-- <a target="_blank"  href=" {{App\Settings::where('constant','facebook')->first('value')->value}}"> <i class="fab fa-facebook-f"></i></atarget="_blank"> -->
           <a target="_blank" href=" {{App\Settings::where('constant','instagram')->first('value')->value}}"> <i class="fab fa-instagram"></i></a>
           <!-- <a target="_blank" href=" {{App\Settings::where('constant','twitter')->first('value')->value}}">    <i class="fab fa-twitter"></i></a> -->
        </div>
        </div>
  </div>
       <!-- end body  -->

@endsection
