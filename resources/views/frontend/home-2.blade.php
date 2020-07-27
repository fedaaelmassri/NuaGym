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
                  <input type="hidden"  id="coache_id" name="coache_id">
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

                                  <input type="hidden" id="proid" />

                              @foreach($programs as $programs)
                                <div class="col-lg-4 col-md-3 col-xs-4 ml-22">
                                  <div class="rectangle  "  id="program-{{$programs->id}}" onclick="getid({{$programs->id}})">
                                                  <div class="circle  ">
                                                  <div class="text-circle">
                                                    {{$programs->cost}} <span>$ </span>
                                                    </div>
                                                  </div>
                                                  <div class="text-rectangle  ">
                                                  <span> 
                           
                                                @if(App::getLocale() == 'en')

                                                {{$programs->name}}
                                                @endif
                                                @if(App::getLocale() == 'ar')

                                                  {{$programs->name_ar}}
                                                  @endif
                                                  <span>
                                                  </div>
                                                  <!-- <a class="btn  btn-lg yellowbtnsec1">
                                                      Time
                                                  </a> -->
                                  </div>
                                </div>
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
                                               <img src="{{asset('public/assets/images/before6.PNG')}}" style="width: 175px;height: 250px;" class="img-responsive home3beforeimg">
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
                                             <img src="{{asset('public/assets/images/after6.PNG')}}" style="width: 175px;height: 250px;" class="img-responsive home3afterimg">

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
                      <div class="col-lg-3  d-lg-block d-none">
                            <div class="copyright">
                             Nua 2020
                            </div>
                      </div>     
                </div>
                <div class="spacel-100">
                <a class="btn  btn-lg  stepbtn" href="#" onclick="getcoachforprogram()">
                                      {{trans('lang.next_btn')}}
                </a>
                <a class="btn  btn-lg  stepbtn cancelbtn" href="{{ route('home')}}">
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
       @endsection
       @section('js')
<script src="{{asset('public/assets/js/jquery-3.4.1.min.js')}}"></script>

<script>
$('document').ready(function(){
  getid({{$firstprogram->id}});


});

function getid(id){
    var activeclass=document.getElementById("program-"+id).classList.contains('rectangle-active');
  if(activeclass==false){
    $(".rectangle.rectangle-active").removeClass("rectangle-active");

    $('#program-'+id).addClass('rectangle-active ');
    programDetails(id);

    $('#proid').val(id);

  }else{
       $('#program-'+id).removeClass('rectangle-active');
       $('#proid').val('');

          }
}
function programDetails(id){
     var base_url='{{URL::to('/')}}';
      var lang='{{App::getLocale() }}';

            var url_m='programDetails/?id='+id ;
            $.ajax({
                url: url_m,
                data: {},
                method: 'GET',
                beforeSend:function(){

                },
            }).done(function (data) {
console.log("data",data)
                 $("#pdescription").empty();
                 if(lang=='en')
{
                         $("#pdescription").append(
                           data.programs.description);
                            }else{
                              $("#pdescription").append(
                           data.programs.description_ar);

                        }});

 }
function getcoachforprogram(){
     var url='{{URL::to('/home-7')}}';
    var p_id= $("#proid").val();
    if(p_id!=''){
    var m_url=url+'/'+p_id;
    window.location.href =m_url;
    }else{
      alert('Please select a program');
    }

}

function removeactive(id){
    var activeclass=document.getElementById("program-"+id).classList.contains('rectangle-active');
    $(".rectangle.rectangle-active").removeClass("rectangle-active");

        if(activeclass==false){
  $("#program-"+id).addClass('rectangle-active');
        } 

}   
</script>

@endsection
