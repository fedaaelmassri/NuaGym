@extends('frontend.layouts.master')
@section('style')
.swiper-container {
      width: 100%;
      height: 100%;
    }
     .swiper-slide {
      text-align: center;
      font-size: 18px;
      background: #fff;
       /* Center slide text vertically */
      display: -webkit-box;
      display: -ms-flexbox;
      display: -webkit-flex;
      display: flex;
      -webkit-box-pack: center;
      -ms-flex-pack: center;
      -webkit-justify-content: center;
      justify-content: center;
      -webkit-box-align: center;
      -ms-flex-align: center;
      -webkit-align-items: center;
      align-items: center;
    }
@endsection
@section('content')
    <!-----start body ------>
<!--------- Start section1-->

  <div class="row section1 ">
  <div class="col-md-12 col-sm-12  ">
          <div class="row">
              <div class="col-lg-1 col-md-2 col-sm-2  d-sm-block d-none">
               <div style="height:154px"  class="" >
                     <div class="progress-text mt-50 ">
                        04
                      </div>
                      <div class="progress">
                          <div class="progress-bar  " role="progressbar" style="width: 30.5%   " aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                  <div class="progress-text mb-50">
                      06
                  </div>
                </div>
             </div>
              <div class="col-lg-9 col-md-10 col-sm-10 col-xs-12  ">

                        <div class="swiper-container" style="width:100%;height:500px"> 
    <div class="swiper-wrapper">
    @foreach($Events as $events)

      <div class="swiper-slide"   >              
      <a  href="#" onclick="eventdetails({{$events->id}})">               
                             <img  src="{{asset('public/storage/' . $events->image )}}" class="img-responsive" style="width:100%; height:80%"   >
                             </a>
                             <div class="text-center" style="background-color: #292929;height: 90px; padding: 2px ">
                             <h3 style="color: #fafafa;">
                             @if(App::getLocale() == 'en')

                                    {{$events->name}}
                                    @endif
                                    @if(App::getLocale() == 'ar')

                                    {{$events->name_ar}}
                                    @endif    
                                    </h3>  
                                    <h5 class="readmore">   @if(App::getLocale() == 'en')
                                    <a href="#" onclick="eventdetails({{$events->id}})">Read More</a>
                                                @endif
                                                @if(App::getLocale() == 'ar')

                                               <a  href="#" onclick="eventdetails({{$events->id}})"> المزيد</a>
                                                @endif    
                                                </h2>                    
                                     </div>
                    </div>
     @endforeach
    </div>
    <!-- Add Pagination -->
    <div class="swiper-pagination"></div>
    <div class="swiper-button-next"></div>
    <div class="swiper-button-prev"></div>

  </div>

                    </div>
                    <div class="col-sm-2  d-sm-block d-none">
                        <div class="copyright">
                        Nua 2020
                        </div>
                    </div>
                   
              </div>
          </div>
    </div>
    </div>

   <!--------- Start section2-->
  <div class="container section2">
           <div class="musebtn mt-70" style="background:transparent url('public/assets/images/mouse.svg') 0% 0% no-repeat padding-box"></div>
         <div class="socialmedia ">
           <!-- <a target="_blank" href=" {{App\Settings::where('constant','facebook')->first('value')->value}}"> <i class="fab fa-facebook-f"></i></a> -->
           <a target="_blank" href=" {{App\Settings::where('constant','instagram')->first('value')->value}}"> <i class="fab fa-instagram"></i></a>
           <!-- <a target="_blank" href=" {{App\Settings::where('constant','twitter')->first('value')->value}}">    <i class="fab fa-twitter"></i></a> -->
        </div>
      </div>
        <!-- end body  -->

       @endsection
       @section('js')
 
<script>
$( document ).ready(function() {
  
 
});

function eventdetails(e_id){
     var url='{{URL::to('/eventDetails')}}';
     var m_url=url+'/'+e_id ;
    window.location.href =m_url;
   

}
   


</script>
       @endsection
