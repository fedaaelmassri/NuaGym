
@extends('frontend.layouts.master')
@section('style')
@endsection
@section('content')
<!-----start body ------>
<!--------- Start section1-->

  <div class="row section1 coatches">
          <!-- <div class="col-6"> -->
             <div class="col-1 mt-90">
               <div style="height:154px"  class="pt-117" >
                  <div class="progress-text mt-50 ">
                      05
                    </div>
                <div class="progress">
                    <div class="progress-bar  " role="progressbar" style="width: 30.5%   " aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                <div class="progress-text mb-50">
                    06
                  </div>
               </div>
            </div>
             <div class="col-4 ">
                 <div class="pos-rel">
                            <div class="row m-tab " >
                                   <nav class="nav menu">
                                           <a   class="nav-link    " href="{{route('sessions')}}">Sessions</a>
                                           <a class="nav-link active " href="{{route('home-2')}}">Programs</a>

                                        </nav>
               </div>

                 <div class="row  overflowrow">
                 <input type="hidden"  id="coache_id" name="coache_id">
                     @foreach($coaches as $coachesprog)
                          @foreach($coachesprog->coaches as $coaches)
                        <div class="col-4 ml-39" >
                                <div class="rectangle  "  id="coache-{{$coaches->id}}"  onclick="getCoache_id({{$coaches->id}})">
                                        <div class="circle  ">

                                            <div class="coaches-img">
                                           <img src="{{asset('assets/images/carlos-andrades.png')}}" />
                                              </div>
                                         </div>
                                        <div class="text-rectangle  ">
                                            <p> {{$coaches->name}}</p>
                                         </div>
                                         <a class="btn  btn-lg yellowbtnsec1">
                                            Time
                                        </a>
                                        </div>
                            </div>
                             @endforeach
                             @endforeach
                            <!-- <div class="col-4 ml-39">
                                <div class="rectangle  ">
                                        <div class="circle  ">

                                            <div class="coaches-img">

                                              </div>
                                         </div>
                                        <div class="text-rectangle  ">
                                            <p class="darkcolor">Omar Khaled</p>
                                         </div>
                                         <a class="btn  btn-lg  yellowbtnsec1">
                                            Time
                                        </a>
                                        </div>
                            </div>
                             <div class="col-4 ml-39">
                                <div class="rectangle  ">
                                        <div class="circle  ">

                                            <div class="coaches-img">

                                              </div>
                                         </div>
                                        <div class="text-rectangle  ">
                                            <p class="darkcolor">Ahmed Samir</p>
                                         </div>
                                         <a class="btn  btn-lg yellowbtnsec1 ">
                                            Time
                                        </a>
                                        </div>
                            </div>
                            <div class="col-4 ml-39">
                                <div class="rectangle  ">
                                        <div class="circle  ">

                                            <div class="coaches-img">

                                              </div>
                                         </div>
                                        <div class="text-rectangle  ">
                                            <p class="darkcolor">Samir Hosam</p>
                                         </div>
                                         <a class="btn  btn-lg yellowbtnsec1 ">
                                            Time
                                        </a>
                                        </div>
                            </div>
                            <div class="col-4 ml-39">
                                <div class="rectangle   ">
                                        <div class="circle  ">

                                            <div class="coaches-img">

                                              </div>
                                         </div>
                                        <div class="text-rectangle  ">
                                            <p class="darkcolor">Osama Ahmed</p>
                                         </div>
                                         <a class="btn  btn-lg yellowbtnsec1 ">
                                            Time
                                        </a>
                                        </div>
                            </div>
                            <div class="col-4 ml-39">
                                <div class="rectangle   ">
                                        <div class="circle  ">

                                            <div class="coaches-img">

                                              </div>
                                         </div>
                                        <div class="text-rectangle  ">
                                            <p class="darkcolor">Ali Raid</p>
                                         </div>
                                         <a class="btn  btn-lg yellowbtnsec1">
                                            Time
                                        </a>
                                        </div>
                            </div> -->




                </div>
            </div>
                <div class="row mt-40">
                        <div class="col-6">
                       <a class="btn  btn-lg  stepbtn" href="{{route('home-8')}}">
                         NEXT
                       </a>
                     </div>
                     <div class="col-6">
                     <a class="btn  btn-lg  stepbtn cancelbtn" href="{{route('home-2')}}">
                            BACK
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
                <div class="home7beforeimg">
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
                    <div class="home7afterimg">
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
          <div class="col-1">
           <p class="copyright">
              NAU GYM 2019
           </p>
          </div>

  </div>

   <!--------- Start section2-->
  <div class="row section2">
      <div class="col-5">
        </div>
      <div class="col-3 ">

        </div>
        <div class="col-3 ">

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
function getCoache_id(id){
    // document.getElementById("coache_id").value = id;
    $('#coache-'+id).addClass('rectangle-active ');
    $('#coache_id').val(id);

    // $('#coache_id').val(id);

}
function addactive(id){
     $('#coache-'+id).addClass('rectangle-active ');
     $('#coaid').val(id);

}

function getcoachforprogram(){
     var url='{{URL::to('/home-7')}}';
    var p_id= $("#proid").val();
    var m_url=url+'/'+p_id;
    window.location.href =m_url;

}
     </script>
     @endsection
