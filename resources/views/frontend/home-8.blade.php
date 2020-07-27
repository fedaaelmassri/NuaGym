@extends('frontend.layouts.master')
@section('style')
@endsection
@section('content')
    <!-----start body ------>
<!--------- Start section1-->

  <div class="row section1  ">
          <!-- <div class="col-6"> -->
          <div class="col-md-6 col-sm-12 mr-bottom ">
            <div class="row">
                <div class="col-lg-2 col-md-3 col-sm-2 d-sm-block d-none">
                      <div style="height:154px"  class="" >
                          <div class="progress-text mt-50 ">
                              06
                          </div>
                          <div class="progress">
                                <div class="progress-bar  " role="progressbar" style="width: 30.5%   " aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
                            <div class="progress-text mb-50">
                                06
                            </div>
                      </div>
                </div>
                <div class="col-lg-10 col-md-9 col-sm-10 col-xs-12  ">
                      <div class="row  spacerow" style="height: 250px;">
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
                                     <input type="hidden" id="payable_type" name="payable_type" value="program"/>
                                     <input type="hidden" id="c_id" name="c_id" value="{{$_GET['c_id']}}"/>
                                     <div class="bigretangle">
                                          <div class="ml-100 circle  ">
                                                  <div class="coaches-endimg">
                                                  <img src="{{asset('public/storage/' . $coache->image )}}" style="width:75px; height:100px;" />
                                                  </div>
                                          </div>
                                          <div class="rectangle   ">
                                              <div class="circle  ">
                                                  <div class="text-circle">
                                                      {{$program->cost}} <span>$</span>
                                                  </div>
                                              </div>
                                              <div class="text-rectangle  ">
                                                  @if(App::getLocale() == 'en')

                                                  {{$program->name}}
                                                  @else
                                                  {{$program->name_ar}}

                                                  @endif
                                              </div>
                                        </div>
                                     </div>
                                  </div>
                                  <div class="row ">

                                  <a class="btn  btn-lg btn-sm  stepbtn" onclick="subscripeProgram({{$_GET['c_id']}})">
                                  {{trans('lang.pay_btn')}}
                                  </a>
                                  <a class="btn  btn-lg btn-sm stepbtn cancelbtn" href="{{route('home-7',['p_id'=>$_GET['p_id']])}}">
                                      {{trans('lang.back_btn')}}

                                    </a>
                                    </div>

                        </div>
                      </div>
                </div>
                    
            </div>
          </div>

          <div class="col-md-6 col-xs-12  ">

           <div class="spacerow2" style=" ">
            
                <div class="row">
                      <div class="col-lg-9  d-lg-block d-none">
                        <div class="row ">
                            <img class="image2" src="{{asset('public/assets/images/image 7@1.png')}}" width= "172px"  height="373px" />
                            <img class="image1" src="{{asset('public/assets/images/image 7.png')}}" width= "172px"  height="373px" />

                          </div>

                      </div>
                      <div class="col-lg-3  d-lg-block d-none">
                            <div class="copyright">
                            Nua 2020
                            </div>
                      </div>     
                </div>
                <div class="row  cus-margin">

                  <a href="#" class="btn btn-lg  "><img src="{{asset('public/assets/images/1024px-Download_on_the_App_Store_Badge.svg.png')}}" /></a>
                  <a href="#" class="btn  btn-lg   "><img src="{{asset('public/assets/images/google-play.png')}}" /></a>
                </div>

           </div>
          
          </div>
  </div>
   <!--------- Start section2-->
  <div class="container section2">
 
           <div class="musebtn" style="background:transparent asset('public/assets/images/mouse.svg') 0% 0% no-repeat padding-box"></div>
          <div class="socialmedia float-right">
           <!-- <a  target="_blank" href=" {{App\Settings::where('constant','facebook')->first('value')->value}}"> <i class="fab fa-facebook-f"></i></a> -->
           <a  target="_blank" href=" {{App\Settings::where('constant','instagram')->first('value')->value}}"> <i class="fab fa-instagram"></i></a>
           <!-- <a target="_blank" href=" {{App\Settings::where('constant','twitter')->first('value')->value}}">    <i class="fab fa-twitter"></i></a> -->
        </div>
  </div>
       <!-- end body  -->
       @endsection

@section('js')
 
<script>
 

function subscripeProgram(){
  var c_id= $("#c_id").val();

      var url='{{URL::to('/payment')}}';
  var programid= {{$_GET['p_id']}};
   var payable_type= $("#payable_type").val();
     var m_url=url+'/'+programid+'/'+payable_type+'/'+c_id;
    window.location.href =m_url;
  
 
}
     </script>
@endsection
