@extends('frontend.layouts.master')
@section('style')
@endsection
@section('content')
    <!-----start body ------>
<!--------- Start section1-->

  <div class="row section1 coatches">
          <!-- <div class="col-6"> -->
          <div class="col-md-6 col-sm-12 mr-bottom ">
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
                  <div class="row  " style="height: 250px;margin-left: 20px;">
                    @foreach($coaches as $coaches)
                        <div class="col-lg-4 col-md-6 col-xs-4 ml-39">
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
                    </div>
             </div>
        </div>

          </div>
          <div class="col-md-6 col-sm-12  ">

          <div class="" style="margin-left:20px">
            <h1 id="cname">
             </h1>
             <div class="row">
             <div class="col-xs-9">

            <p id="cdescription" style="word-wrap: break-word; ">
                   
            </p>
            </div>
            <div class="col-sm-3  d-sm-block d-none">

            <div class="copyright">
            Nua 2020
           </div>
            </div>     
                   </div>


            <a class="btn  btn-lg yellowbtnsec2  " onclick="getprogramforcoach();">
               {{trans('lang.started_btn')}}
          </a>
        <a class="btn  btn-lg redbutton  "  data-toggle="modal" data-target="#playVideo">
                         {{trans('lang.video_btn')}}
                     </a>          </div>
          
   </div>
  </div>
   <!--------- Start section2-->
  <div class="container section2">
           <div class="musebtn" style="background:transparent url('public/assets/images/mouse.svg') 0% 0% no-repeat padding-box"></div>
          <div class="socialmedia float-right">
           <!-- <a  target="_blank" href=" {{App\Settings::where('constant','facebook')->first('value')->value}}"> <i class="fab fa-facebook-f"></i></a> -->
           <a  target="_blank" href=" {{App\Settings::where('constant','instagram')->first('value')->value}}"> <i class="fab fa-instagram"></i></a>
           <!-- <a target="_blank" href=" {{App\Settings::where('constant','twitter')->first('value')->value}}">    <i class="fab fa-twitter"></i></a> -->
        </div>
  </div>
       <!-- end body  -->
       @endsection
 
<!-- Modal -->
<div class="modal fade" id="playVideo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          
         <iframe id="player" class="w-100" height="400" src="https://www.youtube.com/embed/{{$videoUrl}}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
         </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
       </div>
    </div>
  </div>
</div>
@section('js')

     <script>
         var tag = document.createElement('script');
  tag.id = 'iframe-demo';
  tag.src = 'https://www.youtube.com/iframe_api';
  var firstScriptTag = document.getElementsByTagName('script')[0];
  firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);
  // player = new YT.Player('video', {
  //   events: {
  //     // call this function when player is ready to use
  //     'onReady': onPlayerReady
  //   }
  // });
  

      $('#playVideo').on('hidden.bs.modal', function (e) {
        // $('#player').get(0).stopVideo();
        // callPlayer('player', 'stopVideo');
        $("#playVideo iframe").attr("src", $("#playVideo iframe").attr("src"));
   
  
  
 })
  
  getCoache_id({{$firstcoache->id}});
       function getCoache_id(id){
    var activeclass=document.getElementById("coache-"+id).classList.contains('rectangle-active');
  if(activeclass==false){
    $(".rectangle.rectangle-active").removeClass("rectangle-active");

    $('#coache-'+id).addClass('rectangle-active ');
    coachesDetails(id);
    $('#coache_id').val(id);

  }else{
       $('#coache-'+id).removeClass('rectangle-active');
       $('#coache_id').val('');

          }


}
function coachesDetails(id){
     var base_url='{{URL::to('/')}}';
            var url_m='coachesDetails/?id='+id ;
            var lang='{{App::getLocale()}}';

            $.ajax({
                url: url_m,
                data: {},
                method: 'GET',
                beforeSend:function(){

                },
            }).done(function (data) {

                $("#cname").empty();
                $("#cdescription").empty();
                if(lang=="en"){

                $("#cname").append(
                        data.coaches.name

                      );
                      $("#cdescription").append(
                        
                        data.coaches.description

                      );
                      }else{
                        $("#cname").append(
                        data.coaches.name_ar

                      );
                      $("#cdescription").append(
                        
                        data.coaches.description_ar

                      );
                      }
                         });

 }
function getprogramforcoach(){
    var url='{{URL::to('/home-2')}}';
    var cid= $("#coache_id").val();
    if(cid!=''){
    var m_url=url+'/'+cid;
    window.location.href =m_url;
    }else{
    alert('Please select a coache');
    }

}

</script>

       @endsection
