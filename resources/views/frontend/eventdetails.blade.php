@extends('frontend.layouts.master')
@section('style')
@endsection
@section('content')
    <!-----start body ------>
<!--------- Start section1-->

  <div class="  section1">
              <div class="row">
                    <div class="col-lg-1 col-sm-2  d-sm-block d-none">
                        <div style="height:154px"  class="" >
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
                    <div class="col-lg-9 col-sm-8 col-xs-12">
                      <div style=" ">             
                        <img src="{{asset('public/storage/' . $events->image )}}" width="100%"   class="img-responsive img-resize"  />
                      </div>
                    </div>
                    <div class="col-lg-2 col-sm-2  d-sm-block d-none">
                      <div class="copyright">
                      Nua 2020
                      </div>
                    </div>
                </div>
                <div class="row">
                <div class="offset-lg-1"></div>
                <div class="col-xs-11">
                <h1 id="pname" style="margin-left: 13px;">
                    @if(App::getLocale() == 'en')

                      {{$events->name}}
                    @endif
                    @if(App::getLocale() == 'ar')

                    {{$events->name_ar}}
                    @endif
                </h1> 
                </div> 

                </div>
            <div class="row">
            <div class="offset-lg-1"></div>
                <div class="col-lg-7">
                  <input type="hidden" id="eventid" value="{{$events->id}}" />
                  <input type="hidden" id="payable_type" name="payable_type" value="eventsport"/>
                 
                  <div id="pdescription">
                    @if(App::getLocale() == 'en')

                    {{$events->description}}.
                    @endif
                    @if(App::getLocale() == 'ar')
                    {{$events->description_ar}}.

                    @endif

                  </div>
                  </div>
                  <div class="col-lg-4">
                    <table class="border-none table-responsive details-table">
                              <tr>
                              <td> <h5> {{trans('lang.classes.table.duration')}}:</h5></td>
                              <td> <span style="margin-top: -31px; margin-left:10px;  color: #fafafa !important;">   {{$events->duration}}   
                                          @if(App::getLocale() == 'en')

                                                min
                                                @endif
                              @if(App::getLocale() == 'ar')
                              دقيقة
                              @endif


                                </span> 
                                </td>
                              </tr>
                              <tr>
                            <td> <h5> {{trans('lang.classes.table.date')}}:</h5></td>
                            <td> <span  style="  margin-top: -31px; margin-left:10px;  color: #fafafa !important;">                    
                                   {{$events->date}}

                                  </span></td>
                            </tr>
                              <tr>
                            <td> <h5> {{trans('lang.classes.table.time')}}:</h5></td>
                            <td> <span  style="  margin-top: -31px; margin-left:10px;  color: #fafafa !important;">   {{ date('H:i A', strtotime($events->time))}}
                                  </span></td>
                            </tr>
                            <tr>
                            <td> <h5> {{trans('lang.classes.table.cost')}}:</h5></td>
                            <td> <span style=" margin-top: -31px;margin-left:10px;   color: #fafafa !important;">   {{$events->cost}}
                            @if(App::getLocale() == 'en')
                            KD
                            @endif
                            @if(App::getLocale() == 'ar')
                            دينار كويتي
                            @endif

                              
                                                    </span>
                                                    </td>
                            </tr>
                            <tr>
                            <td> <h5> {{trans('lang.classes.table.no_of_attendes')}}:</h5></td>
                            <td> <span style=" margin-top: -31px;margin-left:10px;   color: #fafafa !important;">   {{$events->no_of_attendees}}
                            
                               
                                                    </span>
                                                    </td>
                            </tr>
                            <td> <h5 style="white-space: nowrap;"> {{trans('lang.classes.table.avaliable_subscription')}}:</h5></td>
                            <td> <span style=" margin-top: -31px;margin-left:10px;   color: #fafafa !important;"> {{$events->required_subscribers - $events->no_of_attendees}}
                            
                              
                                                    </span>
                                                    </td>
                            </tr>
                    </table>
                    <a  id="subscribe_btn"class="btn  btn-lg yellowbtnsec2" href="#" onclick="subscripeEvent()" style="    margin-top: 25px;" >
                      {{trans('lang.classes.subscribe_btn')}}
                    </a>
                  </div>
                  
                </div>             

  </div>
   <!--------- Start section2-->
  <div class="container section2">
           <div class="musebtn" style="background:transparent url('/public/assets/images/mouse.svg') 0% 0% no-repeat padding-box"></div>
           
         <div class="socialmedia float-right">
           <!-- <a target="_blank" href=" {{App\Settings::where('constant','facebook')->first('value')->value}}"> <i class="fab fa-facebook-f"></i></a> -->
           <a  target="_blank" href=" {{App\Settings::where('constant','instagram')->first('value')->value}}"> <i class="fab fa-instagram"></i></a>
           <!-- <a target="_blank" href=" {{App\Settings::where('constant','twitter')->first('value')->value}}">    <i class="fab fa-twitter"></i></a> -->
        </div>         
  </div>
  @endsection

@section('js')

       <!-- end body  -->
       <script>
 //   getid({{--{{$firstevent->id}}--}});

// $('document').ready(function(){
//   // getid({{$events[0]['id']}});
// });

 
 
function subscripeEvent(){
  var currentSubscribers={{$currentSubscribers}};
  var requiredSubscribers ={{$requiredSubscribers}};
   if(currentSubscribers==requiredSubscribers){
    alert("Sorry, the number of subscribers has been completed");
 
  }else{
     var url='{{URL::to('/payment')}}';
  // var eventid= $("#eventid").val();
   var eventid= $("#eventid").val();

 
  var payable_type= $("#payable_type").val();
     var m_url=url+'/'+eventid+'/'+payable_type;
    window.location.href =m_url;
  
  }

}

 

 
     </script>
       @endsection
