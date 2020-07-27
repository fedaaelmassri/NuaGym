@extends('frontend.layouts.master')
@section('style')
@endsection
@section('content')
    <!-----start body ------>
<!--------- Start section1-->
<div class="row section1 home">
              <div class="col-1">
                  <div style="height:154px"  class="pt-117" >
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
                    <img  src="assets/images/img.png"  />
                </div>
               </div>
          <div class="col-5 ">
            <h1  >
                Start exercising every day
            </h1>
            <p >
                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy
             </p>

          </div>
          <div class="col-1">
           <p class="copyright">
              NAU GYM 2019
           </p>
          </div>

  </div>
   <!--------- Start section2-->
  <div class="row section2">
      <div class="col-6">
         <div class="musebtn" style="background:transparent url('assets/images/mouse.svg') 0% 0% no-repeat padding-box"></div>
      </div>
      <div class="col-5 ">
          <!-- <div class="startbtn"> -->
          <a class="btn  btn-lg yellowbtnsec2 mt-310" href="{{route('home-2')}}">
              GET STARTED
          </a>
        <!-- </div> -->
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

@endsection
