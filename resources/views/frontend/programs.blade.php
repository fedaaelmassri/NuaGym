@extends('frontend.layouts.master')
@section('style')
@endsection
@section('content')
    <!-----start body ------>
   
<!--------- Start section1-->
<div class="row section1 ">
          <!-- <div class="col-6"> -->
  
           <div class="col-md-6 col-sm-12 mr-bottom ">
  
          <div class="row">
            <div class="  col-lg-2 col-md-3 col-sm-2  d-sm-block d-none">
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
                  
             <div class="col-lg-10 col-md-9 col-sm-10 col-xs-12 overflow-auto  ">
             
              <input type="hidden"  id="coache_id" name="coache_id">
                  <div class="row  " style="height: 250px; margin-left: 20px;">
                  <input type="hidden" id="proid" />
                    @foreach($programs as $programs)
                        <div class="col-lg-4 col-md-6 col-xs-4 ml-39">
                                   <div class="rectangle  "  id="program-{{$programs->id}}"   onclick="getid({{$programs->id}})">
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
                                   </div>
                       </div>
                    @endforeach
                    </div>
             </div>
        </div>

          </div>
          <div class="col-md-6 col-xs-12  ">
              <div class="" style="margin-left:20px">
                <h1 id="pname">
                </h1>
                <div class="row">
                  <div class=" col-sm-9  col-xs-12">
                      <p id="pdescription" style="word-wrap: break-word; ">
                      </p>
                      
                  </div>
                  <div class=" col-sm-3  d-sm-block d-none  ">
                        <div class="copyright">
                        Nua 2020
                      </div>
                  </div>     
                </div>
                      <a class="btn  btn-lg yellowbtnsec2" href="#" onclick="getcoachforprogram()">
                  {{trans('lang.started_btn')}}
                    </a>
            </div>
          
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


@endsection

@section('js')

       <!-- end body  -->
       <script>
   getid({{$firstprogram->id}});



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
            var url_m='programDetails/?id='+id ;
            var lang='{{App::getLocale()}}';
            $.ajax({
                url: url_m,
                data: {},
                method: 'GET',
                beforeSend:function(){

                },
            }).done(function (data) {

                $("#pname").empty();
                $("#pdescription").empty();
                if(lang=="en"){
                $("#pname").append(
                        data.programs.name

                      );
                         $("#pdescription").append(
                        
                          data.programs.description

                        ); }else{
                          $("#pname").append(
                        data.programs.name_ar

                      );
                         $("#pdescription").append(
                        
                          data.programs.description_ar

                        ); 

                        }
                        
                        });
            

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
        // else{
        //     $("#program-"+id).removeClass('rectangle-active');

        // }


//   $('#program-'+id).on('click mouseover', function () {
//     $(this).addClass('rectangle-active ');
// });

}
     </script>
       @endsection
