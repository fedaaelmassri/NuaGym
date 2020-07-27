
@extends('frontend.layouts.master')
@section('style')
@endsection
@section('content')
<!-----start body ------>
<!--------- Start section1-->

  <div class="row section1">
          <!-- <div class="col-6"> -->
             <div class="col-1 mt-90">
               <div style="height:154px"  class="pt-117" >
                  <div class="progress-text mt-50 ">
                      03
                    </div>
                <div class="progress">
                    <div class="progress-bar  " role="progressbar" style="width: 30.5%   " aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                <div class="progress-text mb-50">
                    06
                  </div>
             </div>
            </div>
             <div class="col-4">
                 <div class="row m-tab " >
                        <nav class="nav menu">
                                <a   class="nav-link" href="{{route('sessions')}} ">Sessions</a>
                                <a class="nav-link active" href="{{route('home-2')}}">Programs</a>

                             </nav>
                 </div>
                 <div class="bigretangle">
                        <div class="ml-100 circle  ">

                                <div class="coaches-img">

                                  </div>
                             </div>
                        <div class="rectangle   ">
                                <div class="circle  ">
                                 <div class="text-circle">
                                    10 <span>$</span>
                                 </div>
                                </div>
                                <div class="text-rectangle  ">
                                   <span> 1</span> Session
                                </div>
                                </div>

                 </div>


               <div class="row mt-40">
                 <div class="col-6">
                <a class="btn  btn-lg  stepbtn" href="{{--{{route('payPrograms')}}--}}">
                  Pay
                </a>
              </div>
              <div class="col-6">
              <a class="btn  btn-lg  stepbtn cancelbtn" href="{{route('home-7',['p_id'=>request()->route('p_id')])}}">
                Back
            </a>
      </div>
               </div>
              </div>
          <!-- </div>  -->

          <div class="col-6 ">
            <div class="row">
                <div class="col-3 ">

                  </div>
              <div class="col-3 mt-30 ">
                <img class="image1" src="{{asset('assets/images/image 7.png')}}" width= "172px"  height="373px" />
                <img class="image2" src="{{asset('assets/images/image 7@1.png')}}" width= "172px"  height="373px" />
                     <div class="row  cus-margin">
                        <div class="col-6">
                                 <a href="#" class="btn  "><img src="{{asset('assets/images/1024px-Download_on_the_App_Store_Badge.svg.png')}}" /></a>
                  </div>
                  <div class="col-6">
                      <a href="#" class="btn  ml-30 "><img src="{{asset('assets/images/google-play.png')}}" /></a>

                  </div>
                </div>

              </div>
            </div>
          </div>
          <div class="col-1 mt-90">
           <p class="copyright">
              NAU GYM 2019
           </p>
          </div>

  </div>
   <!--------- Start section2-->
  <div class="row section2">
      <div class="col-6">
        </div>
      <div class="col-5 ">

        </div>
        <div class="col-1">
         <div class="socialmedia">
            <i class="fab fa-facebook-f"></i>
            <i class="fab fa-instagram"></i>
            <i class="fab fa-twitter"></i>
        </div>
        </div>
  </div>
     <!-- end body  -->
    <script>
     function getcoachforprogram(){
     var url='{{URL::to('/home-8')}}';
     var p_id='{{request()->route('p_id')}}';
     var p_id='{{request()->route('c_id')}}';
    var c_id= $("#coache_id").val();
    var m_url=url+'/'+p_id+'/'+c_id;
    window.location.href =m_url;

}
     </script>

     @endsection
