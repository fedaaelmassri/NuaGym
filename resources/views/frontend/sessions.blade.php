@extends('frontend.layouts.master')
@section('style')
@endsection
@section('content')
    <!-----start body ------>
<!--------- Start section1-->

  <div class="row section1">
          <!-- <div class="col-6"> -->
             <div class="col-1">
               <div style="height:154px"  class="" >
                  <div class="progress-text mt-50 ">
                      02
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
                <div class="rectangle rectangle-active ">
                    <div class="circle  ">
                     <div class="text-circle">
                        10 <span>$</span>
                     </div>
                    </div>
                    <div class="text-rectangle  ">
                       <span> 1</span> Session
                    </div>
                    </div>
            <div class="rectangle ">
            <div class="circle">
             <div class="text-circle">
                100 <span>$</span>
             </div>
            </div>
            <div class="text-rectangle">
              <span>  12</span> Session
            </div>
            </div>
            <div class="rectangle ">
                <div class="circle">
                 <div class="text-circle">
                    150 <span>$</span>
                 </div>
                </div>
                <div class="text-rectangle">
                    <span>30</span> Session
                </div>
                </div>

              </div>
          <!-- </div>  -->

          <div class="col-5 ">
            <h1>
              Sessions
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
          <a class="btn  btn-lg yellowbtnsec2">
              GET STARTED
          </a>
        <!-- </div> -->
        </div>
        <div class="col-1">
        <div class="socialmedia">
           <!-- <a  target="_blank" href=" {{App\Settings::where('constant','facebook')->first('value')->value}}"> <i class="fab fa-facebook-f"></i></a> -->
           <a target="_blank" href=" {{App\Settings::where('constant','instagram')->first('value')->value}}"> <i class="fab fa-instagram"></i></a>
           <!-- <a target="_blank" href=" {{App\Settings::where('constant','twitter')->first('value')->value}}">    <i class="fab fa-twitter"></i></a> -->
        </div>
        </div>
  </div>
         <!-- end body  -->

@endsection
