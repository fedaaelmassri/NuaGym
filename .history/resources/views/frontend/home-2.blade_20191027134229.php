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
             <div class="col-4">
                 <div class="row m-tab " >
                        <nav class="nav menu">
                                <a   class="nav-link " href="{{route('sessions')}}">Sessions</a>
                                <a class="nav-link active " href="#">Programs</a>

                             </nav>
                 </div>
                 @foreach($programs as $programs)
                 <div id="program-{{$programs->id}}" class="rectangle " onclick="">
                        <div class="circle  ">
                         <div class="text-circle">
                         {{$programs->cost}} <span>$ </span>
                         </div>
                        </div>
                        <div class="text-rectangle  ">
                           <span>  {{$programs->name}}<span>
                        </div>
                </div>
                @endforeach
                <!-- <div class="rectangle ">
                    <div class="circle">
                    <div class="text-circle">
                        100 <span>$</span>
                    </div>
                    </div>
                    <div class="text-rectangle">
                    <span> Remote</span>
                    </div>
                </div>
                                    {{$programs->description}}

                -->
                <div class="row">
                <div>
                    <p class="mt-24">
                            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy
                    </p>
                </div>
                </div>

               <div class="row mt-24">
                 <div class="col-6">
                <a class="btn  btn-lg  stepbtn" href="{{route('home-7')}}">
                  NEXT
                </a>
              </div>
              <div class="col-6">
              <a class="btn  btn-lg  stepbtn cancelbtn" href="{{route('home')}}">
                Back
            </a>
      </div>
               </div>
              </div>
          <!-- </div>  -->

          <div class="col-6 ">
            <div class="row">
                    <div class="col-3 ">
                            <div class=" beforeafter">
                                <div class="row">
                            <div class="home3beforeimg">
                            </div>
                           </div>
                           <div class="row">
                              <p>
                              Before
                              </p>
                            </div>
                            </div>
                            </div>
                            <div class="col-3 ">
                                <div class=" ml-80 beforeafter">
                                    <div class="row">
                                <div class="home3afterimg">
                                </div>
                               </div>
                               <div class="row">
                                  <p>
                                  After
                                  </p>
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

//this will attach the class to every target
function getid(id){
$('#program-'+id).on('click', function (event) {
    $target = $(event.target);
       $target.addClass('rectangle-active ');
   });
}
     </script>
     @endsection
