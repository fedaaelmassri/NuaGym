@extends('frontend.layouts.master')
@section('style')
@endsection
@section('content')
    <!-----start body ------>
<!--------- Start section1-->

  <div class="row section1 coatches">
          <!-- <div class="col-6"> -->
             <div class="col-1">
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
            <input type="hidden"  id="coache_id" name="coache_id">

             <div class="col-5 overflow-auto">
                 <div class="row ">

                 @foreach($coaches as $coaches)
                        <div class="col-4 ml-39">
                        <div class="rectangle  "  id="coache-{{$coaches->id}}"  onclick="getCoache_id({{$coaches->id}})">
                                        <div class="circle  ">

                                            <div class="coaches-img">
                                            <img src="{{asset('storage/' . $coaches->image )}}" />

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
          <!-- </div>  -->

          <div class="col-5 ">
            <h1>
                    Bader Alojairi
            </h1>
            <p >
                The quick, brown fox jumps over a lazy dog. DJs flock by when MTV ax quiz prog. Junk MTV quiz graced by fox whelps.
            </p>
                <p>Bawds jog, flick quartz, vex nymphs. Waltz, bad nymph, for quick jigs vex! Fox nymphs grab quick-jived waltz. Brick quiz whangs jumpy veldt fox. Bright vixens
                </p>
                <p>
                  vexing daft Jim. Sex-charged fop blew my junk TV quiz. How quickly daft jumping zebras vex. Two driven jocks help fax my big quiz. Quick, Baz, get my woven flax jodhpurs! "Now fax quiz Jack!" my brave ghost pled. Five quacking zephyrs jolt my
                </p>
                <p>
                  wax bed. Flummoxed by job, kvetching W. zaps Iraq. Cozy sphinx waves quart jug of bad milk. A very bad quack might jinx zippy fowls. Few quips galvanized the mock
                </p>
                <p>
                  jury box. Quick brown dogs jump over the lazy fox. The jay, pig, fox, zebra, and my wolves quack! Blowzy red vixens fight for a quick jump. Joaquin Phoenix was gazed by MTV for luck. A wizard’s job is to vex chumps quickly in fog. Watch "Jeopardy!", Alex Trebek's fun TV quiz game
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
      <div class="col-5">
          <div class="musebtn" style="background:transparent url('assets/images/mouse.svg') 0% 0% no-repeat padding-box"></div>
       </div>
      <div class="col-3 ">
          <!-- <div class="startbtn"> -->
          <a class="btn  btn-lg yellowbtnsec2 ml-83">
              GET STARTED
          </a>
        <!-- </div> -->
        </div>
        <div class="col-3 ">
                <!-- <div class="startbtn"> -->
                <a class="btn  btn-lg redbutton">
                        PLAY VIDEO
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
<script>
       function getCoache_id(id){
    var activeclass=document.getElementById("coache-"+id).classList.contains('rectangle-active');
  if(activeclass==false){
    $(".rectangle.rectangle-active").removeClass("rectangle-active");

    $('#coache-'+id).addClass('rectangle-active ');
  }else{
       $('#coache-'+id).removeClass('rectangle-active');
          }
     $('#coache_id').val(id);


}
function getprogramforcoach(){
     var url='{{URL::to('/home-8')}}';
     var p_id='{{request()->route('p_id')}}';
    var c_id= $("#coache_id").val();
    var m_url=url+'/'+p_id+'/'+c_id;
    window.location.href =m_url;

}

</script>

       @endsection
