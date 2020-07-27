@extends('frontend.layouts.master')
@section('style')
@endsection
@section('content')
    <!-----start body ------>
<!--------- Start section1-->

  <div class="row section1 coatches">
          <!-- <div class="col-6"> -->
          <div class="col-lg-6 col-md-8 col-sm-12 mr-bottom ">
            <div class="row">
                <div class="col-lg-2 col-md-3 col-sm-2 d-sm-block d-none">
                      <div style="height:154px"  class="" >
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
                <div class="col-lg-10 col-md-9 col-sm-10 col-xs-12 overflow-auto  ">
                       <div class="row spacer-100 " style="height: 250px;margin-left: 20px;">
                        <div class="pos-rel">
                                  <div class="row m-tab " >
                                        <nav class="nav menu">
                                            <!-- <a   class="nav-link" href="{{--{{route('sessions')}}--}} ">Sessions</a> -->
                                          
                                            <a class="nav-link active " href="{{route('home-2')}}">             
                                                {{trans('lang.home.menu.programs')}}
                                            </a>
                                          </nav>
                                  </div>
                                  <div class="row   ">

                                  <input type="hidden"  id="coache_id" name="coache_id">
                 <input type="hidden" id="payable_type" name="payable_type" value="event"/>


                                  @foreach($coaches as $coachesprog)
                                @foreach($coachesprog->coaches as $coaches)
                                <div class="col-lg-4 col-md-3 col-xs-4 ml-22">
                                <div class="rectangle  "  id="coache-{{$coaches->id}}"  onclick="getCoache_id({{$coaches->id}})">
                                                  <div class="circle  ">
                                                  <div class="coaches-img">
                                                        <img src="{{asset('public/storage/' . $coaches->image )}}" />
                                                      </div>
                                                  </div>
                                                  <div class="text-rectangle  ">
                                                      <span> 
                                                          @if(App::getLocale() == 'en')
                                                          {{$coaches->name}}
                                                                      @endif
                                                          @if(App::getLocale() == 'ar')
                                                          {{$coaches->name_ar}}
                                                          @endif
                                                      </span>
                                                  </div>
                                                   <!-- <a class="btn  btn-lg yellowbtnsec1">
                                                      Time
                                                  </a> -->
                                  </div>
                                </div>
                                @endforeach
                            @endforeach
                             
                            </div>
                            <!-- <div class="row">
                <div class="col-xs-12">
                    <p  id="pdescription">
                    {{--@if(App::getLocale() == 'en')

                    {{$firstprogram->description}}
                @endif
                @if(App::getLocale() == 'ar')

                {{$firstprogram->description_ar}}
                  @endif
                  --}}
                   </p>
                </div>
                </div> -->

                        </div>
                      </div>
                </div>

            </div>
          </div>

          <div class="col-lg-6 col-md-4 col-sm-12  ">

           <div class="" style=" ">
            
                <div class="row">
                      <div class="col-lg-9  col-md-9  d-lg-block d-none">
                        <div class="row">
                        <div class="col-lg-6 col-md-6 col-xs-6">
                                <div class=" beforeafter">
                                        <div class="row">
                                               <img src="{{asset('public/assets/images/before4.PNG')}}" style="width: 175px;height: 250px;" class="img-responsive home7beforeimg">
                                         </div>
                                    <div class="row">
                                      <p>
                                      {{trans('lang.before')}}
                                      </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-xs-6">
                                <div class="   beforeafter space-img">
                                        <div class="row">
                                             <img src="{{asset('public/assets/images/after4.PNG')}}" style="width: 175px;height: 250px;" class="img-responsive home7afterimg">

                                         </div>
                                        <div class="row">
                                            <p>
                                            {{trans('lang.after')}}
                                            </p>
                                        </div>
                                </div>
                            </div>
                        </div>
                      </div>
                      <div class="col-lg-3 col-md-12  d-lg-block d-none">
                            <div class="copyright">
                            Nua 2020
                            </div>
                      </div>     
                </div>
                <div class="spacel-100">
                <a class="btn  btn-lg  stepbtn" href="#" onclick="subscripeEvent()">

                {{trans('lang.next_btn')}}

                </a>

               
                <a class="btn  btn-lg  stepbtn cancelbtn" href="{{route('eventDetails',['id'=>request()->route('e_id')])}}">

                {{trans('lang.back_btn')}}

                </a>
                </div> 

           </div>
          
          </div>
  </div>
   <!--------- Start section2-->
  <div class="container section2">
           <div class="musebtn" style="background:transparent url('/public/assets/images/mouse.svg') 0% 0% no-repeat padding-box"></div>
          <div class="socialmedia float-right">
           <!-- <a  target="_blank" href=" {{App\Settings::where('constant','facebook')->first('value')->value}}"> <i class="fab fa-facebook-f"></i></a> -->
           <a  target="_blank" href=" {{App\Settings::where('constant','instagram')->first('value')->value}}"> <i class="fab fa-instagram"></i></a>
           <!-- <a target="_blank" href=" {{App\Settings::where('constant','twitter')->first('value')->value}}">    <i class="fab fa-twitter"></i></a> -->
        </div>
  </div>
       <!-- end body  -->
       <script src="{{asset('public/assets/js/jquery-3.4.1.min.js')}}"></script>

<script>
        
function getCoache_id(id){
    var activeclass=document.getElementById("coache-"+id).classList.contains('rectangle-active');
  if(activeclass==false){
    $(".rectangle.rectangle-active").removeClass("rectangle-active");

    $('#coache-'+id).addClass('rectangle-active ');
    $('#coache_id').val(id);

  }else{
       $('#coache-'+id).removeClass('rectangle-active');
       $('#coache_id').val('');

          }


}
function addactive(id){
     $('#coache-'+id).addClass('rectangle-active ');
     $('#coache_id').val(id);

}


function subscripeEvent(){
     var url='{{URL::to('/payment')}}';
  // var eventid= $("#eventid").val();
  var eventid='{{request()->route('e_id')}}';
 
     var c_id= $("#coache_id").val();
    if(c_id!=''){

  var payable_type= $("#payable_type").val();
     var m_url=url+'/'+eventid+'/'+payable_type+'/'+c_id;
    window.location.href =m_url;
  }
  else{
    alert('Please select a coach');
  }

}
     </script>
     @endsection
