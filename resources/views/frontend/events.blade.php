@extends('frontend.layouts.master')
@section('style')
 
@endsection
@section('content')
    <!-----start body ------>
<!--------- Start section1-->

  <div class="row section1 ">
  <div class="col-md-12 col-sm-12  ">
          <div class="row">
              <div class="col-lg-1 col-md-2 col-sm-2  d-sm-block d-none">
               <div style="height:154px"  class="" >
                     <div class="progress-text mt-50 ">
                        04
                      </div>
                      <div class="progress">
                          <div class="progress-bar  " role="progressbar" style="width: 30.5%   " aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                  <div class="progress-text mb-50">
                      06
                  </div>
                </div>
             </div>
              <div class="col-lg-9 col-md-10 col-sm-10 col-xs-12  ">
                           <div class=" eventTabel  ">
                            <table   class="table table-responsive-lg   table-md table-sm table-xs"  >
                                <input type="hidden" id="eventid" name="eventid" />
                                <input type="hidden" id="payable_type" name="payable_type" value="event"/>
                                        <thead>
                                            <tr id="calendarDays">
                                                  <th></th>
                                                  <th></th>
                                              <th    >Saturday
                                                <span>
                                                    10 September
                                                </span>
                                              </th>
                                              <th >Sunday
                                                  <span>
                                                      11 September
                                                  </span>
                                              </th>
                                              <th  >Monday
                                                  <span>
                                                      12 September
                                                  </span>
                                              </th>
                                              <th >Tuesday
                                                  <span>
                                                      13 September
                                                  </span>
                                              </th>
                                              <th >Wednesday
                                                  <span>
                                                      14 September
                                                  </span>
                                              </th>
                                              <th >Thursday
                                                  <span>
                                                      15 September
                                                  </span>
                                              </th>
                                              <th >Friday
                                                  <span>
                                                      16 September
                                                  </span>
                                              </th>

                                          </tr>
                                            <tr>

                                                  <th></th>
                                                  <th></th>
                                                <th >
                                                {{trans('lang.classes.table.class')}}
                                              </th>

                                              <th>{{trans('lang.classes.table.coach')}} </th>
                                              <th  >
                                              {{trans('lang.classes.table.duration')}}
                                              </th>
                                              
                                              <th>
                                              {{trans('lang.classes.table.time')}}
                                              </th>
                                              <th>{{trans('lang.classes.table.no_of_attendes')}}</th>
                                              <th>{{trans('lang.classes.table.cost')}}</th>
                                            </tr>
                                        </thead>
                                        <tbody id="eventstbl">
                                            @foreach($Events as $events)
                                              <tr style="cursor: pointer;" onclick="classdetails({{$events->id}})" id="row-{{$events->id}}" class="active">
                                                <td colspan="1">
                                                  <label for="rec-{{$events->id}}"></label>
                                                </td>
                                                <td>
                                                    <img  src="{{asset('public/storage/' . $events->image )}}" width="29" height="35"  >
                                                </td>
                                                  <td >{{$events->name}}</td>
                                                <td> 
                                                @foreach($events->coaches as $coach)
                                                {{$coach->name}} <br>
                                                @endforeach
                                                </td>
                                                <td> {{$events->duration}} min</td>
                                                <td >
                                                {{ date('H:i:s', strtotime($events->time))}}
                                                </td>
                                                <td></td>
                                                <td>{{$events->cost}} KD</td>
                                                <td>
                                                <a class="btn btn-sm  btn-lg btn-secondary text-white" onclick="classdetails({{$events->id}}) " style="cursor:pointer;font-size: 12px; height: 30px;padding: 5px;background-color: #3c3c63;border-color: #3c3c63;"> {{trans("lang.classes.moredetails")}}</a>
                                                </td>
                                              </tr>
                                              @endforeach
                                    </tbody>
                            </table>
                          </div>
                    </div>
                    <div class="col-sm-2  d-sm-block d-none">
                        <div class="copyright">
                        Nua 2020
                        </div>
                    </div>
                   
              </div>
          </div>
    </div>
    </div>

   <!--------- Start section2-->
  <div class="container section2">
           <div class="musebtn mt-70" style="background:transparent url('public/assets/images/mouse.svg') 0% 0% no-repeat padding-box"></div>
         <div class="socialmedia ">
           <!-- <a target="_blank" href=" {{App\Settings::where('constant','facebook')->first('value')->value}}"> <i class="fab fa-facebook-f"></i></a> -->
           <a target="_blank" href=" {{App\Settings::where('constant','instagram')->first('value')->value}}"> <i class="fab fa-instagram"></i></a>
           <!-- <a target="_blank" href=" {{App\Settings::where('constant','twitter')->first('value')->value}}">    <i class="fab fa-twitter"></i></a> -->
        </div>
      </div>
        <!-- end body  -->

       @endsection
       @section('js')
 
<script>
$( document ).ready(function() {
  loadCalendarDays();
 
 
});

function classdetails(e_id){
     var url='{{URL::to('/classDetails')}}';
     var m_url=url+'/'+e_id ;
    window.location.href =m_url;
   

}
     var currentdate = new Date();
        var currentmonth = currentdate.getMonth();
        var currentyear = currentdate.getFullYear();
 
   
        var days = ['Saturday','Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday'];
         
function loadCalendarDays() {
   $("#calendarDays").empty();
  
           var curr = new Date ();
            var week = [];
           var dayName=[];
           var lastindex;
           var firstindex;
           var nextweekinex;
           var prevweekindex;
          var weekday = new Array(7);
          var lang='{{App::getLocale()}}';

              if(lang=="en"){

                weekday[0] = "Sunday";
                weekday[1] = "Monday";
                weekday[2] = "Tuesday";
                weekday[3] = "Wednesday";
                weekday[4] = "Thursday";
                weekday[5] = "Friday";
                weekday[6] = "Saturday";
              }else{
                weekday[0] = "الأحد";
                weekday[1] = "الإثنين";
                weekday[2] = "الثلاثاء";
                weekday[3] = "الأربعاء";
                weekday[4] = "الخميس";
                weekday[5] = "الجمعة";
                weekday[6] = "السبت";
              }
          for (var i = 0; i < 7; i++) {
            var first = curr.getDate() - curr.getDay() + i ;
            var day = new Date(curr.setDate(first)).toISOString().slice(0, 10);
            week.push(day);
             dayName.push(weekday[curr.getDay()]);

          }
            lastindex=week[week.length-1];
               
    for (var i = 0; i <week.length; i++) {
      if(i==0){
      lastindex=week[week.length-1];
       nextweekinex=new Date(lastindex);
      firstindex=week[i] ;
      prevweekindex=new Date(firstindex);
      
      if(lang=="en"){

$("#calendarDays").append("<th><a class='btn btn-sm  btn-secondary text-white' onclick='priveusWeek(\""+firstindex+"\"),eventInWeek(\""+ new Date(prevweekindex.setDate(new Date(prevweekindex).getDate() - 7)).toISOString().slice(0, 10)+"\",\""+new Date(prevweekindex.setDate(new Date(prevweekindex).getDate() + 6)).toISOString().slice(0, 10)+"\")'><i class='fas fa-backward'></i></a> </th><th></th>");
}else{
  $("#calendarDays").append("<th><a class='btn btn-sm  btn-secondary text-white' onclick='priveusWeek(\""+firstindex+"\"),eventInWeek(\""+ new Date(prevweekindex.setDate(new Date(prevweekindex).getDate() - 7)).toISOString().slice(0, 10)+"\",\""+new Date(prevweekindex.setDate(new Date(prevweekindex).getDate() + 6)).toISOString().slice(0, 10)+"\")'><i class='fas fa-forward'></i></a> </th><th></th>");

}
}
        var d = document.createElement("th");
        d.id = "day_" + i;
        d.innerHTML=dayName[i] +"<br>";
        var p=document.createElement("span");
        p.id = "day_name_" + i;
          p.innerHTML=week[i];
         d.append(p);
         document.getElementById("calendarDays").appendChild(d);
       
        if(i==week.length-1){
 
          lastindex=week[i];
          if(lang=="en"){

            $("#calendarDays").append("<th><a class='btn  btn-sm btn-secondary text-white' onclick='nextWeek(\""+lastindex+"\"),eventInWeek(\""+ new Date(nextweekinex.setDate(new Date(nextweekinex).getDate() + 1)).toISOString().slice(0, 10)+"\",\""+new Date(nextweekinex.setDate(new Date(nextweekinex).getDate() + 6)).toISOString().slice(0, 10)+"\")'> <i class='fas fa-forward'></i></a> </th><th></th>");
          }else{
            $("#calendarDays").append("<th><a class='btn btn-sm  btn-secondary text-white' onclick='nextWeek(\""+lastindex+"\"),eventInWeek(\""+ new Date(nextweekinex.setDate(new Date(nextweekinex).getDate() + 1)).toISOString().slice(0, 10)+"\",\""+new Date(nextweekinex.setDate(new Date(nextweekinex).getDate() + 6)).toISOString().slice(0, 10)+"\")'> <i class='fas fa-backward'></i></a> </th><th></th>");

          }
          eventInWeek(firstindex,lastindex);
        }



    }


}
function nextWeek(nextdateweek){
  $("#calendarDays").empty();
  var nextweek = [];
  var nextdayName=[];
  var lastindex;
  var firstindex;

          var nextweekday = new Array(7);
          var lang='{{App::getLocale()}}';

            if(lang=="en"){

              nextweekday[0] = "Sunday";
              nextweekday[1] = "Monday";
              nextweekday[2] = "Tuesday";
              nextweekday[3] = "Wednesday";
              nextweekday[4] = "Thursday";
              nextweekday[5] = "Friday";
              nextweekday[6] = "Saturday";
            }else{
              nextweekday[0] = "الأحد";
              nextweekday[1] = "الإثنين";
              nextweekday[2] = "الثلاثاء";
              nextweekday[3] = "الأربعاء";
              nextweekday[4] = "الخميس";
              nextweekday[5] = "الجمعة";
              nextweekday[6] = "السبت";
            }
        var firstDay = new Date(nextdateweek);
       var nextWeekstart = new Date(firstDay.getTime() + 7 * 24 * 60 * 60 * 1000);
       var prevweekindex ;

                  for (var i = 0; i < 7; i++) {
            var first = firstDay.getDate() + 1 ;
            var day = new Date(firstDay.setDate(first)).toISOString().slice(0, 10);
            nextweek.push(day);
            nextdayName.push(nextweekday[firstDay.getDay()]);
              }
             for (var i = 0; i <nextweek.length; i++) {
              if(i==0){
           lastindex=nextweek[nextweek.length-1];
         firstindex=nextweek[i] ;
         prevweekindex=new Date(firstindex);
         if(lang=="en"){

        $("#calendarDays").append("<th><a class='btn btn-sm btn-secondary text-white' onclick='priveusWeek(\""+firstindex+"\"), eventInWeek(\""+ new Date(prevweekindex.setDate(new Date(prevweekindex).getDate() - 7)).toISOString().slice(0, 10)+"\",\""+new Date(prevweekindex.setDate(new Date(prevweekindex).getDate() + 6)).toISOString().slice(0, 10)+"\")'><i class='fas fa-backward'></i></a> </th><th></th>");
         }else{
          $("#calendarDays").append("<th><a class='btn btn-sm  btn-secondary text-white' onclick='priveusWeek(\""+firstindex+"\"), eventInWeek(\""+ new Date(prevweekindex.setDate(new Date(prevweekindex).getDate() - 7)).toISOString().slice(0, 10)+"\",\""+new Date(prevweekindex.setDate(new Date(prevweekindex).getDate() + 6)).toISOString().slice(0, 10)+"\")'><i class='fas fa-forward'></i></a> </th><th></th>");

         }
        }
        var d = document.createElement("th");
        d.id = "day_" + i;
        d.innerHTML=nextdayName[i]+"<br>";
        var p=document.createElement("span");
        p.id = "day_name_" + i;
          p.innerHTML=nextweek[i];
         d.append(p);
        document.getElementById("calendarDays").appendChild(d);
        
        if(i==nextweek.length-1){

        lastindex=nextweek[i] ;
        if(lang=="en"){


       $("#calendarDays").append("<th><a class='btn btn-sm btn-secondary text-white' onclick='nextWeek(\""+lastindex+"\"), eventInWeek(\""+ new Date(firstDay.setDate(new Date(lastindex).getDate() + 1)).toISOString().slice(0, 10)+"\",\""+new Date(firstDay.setDate(new Date(lastindex).getDate() + 7)).toISOString().slice(0, 10)+"\")'> <i class='fas fa-forward'></i></a> </th><th></th>");
        }else{
          $("#calendarDays").append("<th><a class='btn btn-sm  btn-secondary text-white' onclick='nextWeek(\""+lastindex+"\"), eventInWeek(\""+ new Date(firstDay.setDate(new Date(lastindex).getDate() + 1)).toISOString().slice(0, 10)+"\",\""+new Date(firstDay.setDate(new Date(lastindex).getDate() + 7)).toISOString().slice(0, 10)+"\")'> <i class='fas fa-backward'></i></a> </th><th></th>");

        }
        }
    }

}
function priveusWeek(predateweek){
   
  $("#calendarDays").empty();
  var preweek = [];
  var predayName=[];
  var lastindex;
  var firstindex;
  var nextweekinex;
  var prevweekindex;
 
          var preweekday = new Array(7);
          var lang='{{App::getLocale()}}';

          if(lang=="en"){

          preweekday[0] = "Sunday";
          preweekday[1] = "Monday";
          preweekday[2] = "Tuesday";
          preweekday[3] = "Wednesday";
          preweekday[4] = "Thursday";
          preweekday[5] = "Friday";
          preweekday[6] = "Saturday";
          }else{
          preweekday[0] = "الأحد";
          preweekday[1] = "الإثنين";
          preweekday[2] = "الثلاثاء";
          preweekday[3] = "الأربعاء";
          preweekday[4] = "الخميس";
          preweekday[5] = "الجمعة";
          preweekday[6] = "السبت";
          }
        var firstDay = new Date(predateweek);
       var preWeekstart = new Date(firstDay.getTime() - 7 * 24 * 60 * 60 * 1000);
                  for (var i = 0; i < 7; i++) {
            var first = firstDay.getDate() - 1 ;
             var day = new Date(firstDay.setDate(first)).toISOString().slice(0, 10);
            preweek.push(day);
            predayName.push(preweekday[firstDay.getDay()]);
              }
             for (var i = preweek.length-1; i >=0; i--) {
              if(i==6){
        lastindex=preweek[0] ;
        nextweekinex=new Date(lastindex);
        firstindex=preweek[i] ;
        prevweekindex=new Date(firstindex);
        if(lang=="en"){

        $("#calendarDays").append("<th><a class='btn btn-sm  btn-secondary text-white' onclick='priveusWeek(\""+firstindex+"\"), eventInWeek(\""+ new Date(prevweekindex.setDate(new Date(prevweekindex).getDate() - 7)).toISOString().slice(0, 10)+"\",\""+new Date(prevweekindex.setDate(new Date(prevweekindex).getDate() + 6)).toISOString().slice(0, 10)+"\")'><i class='fas fa-backward'></i></a> </th><th></th>");
        }else{
          $("#calendarDays").append("<th><a class='btn  btn-sm  btn-secondary text-white' onclick='priveusWeek(\""+firstindex+"\"), eventInWeek(\""+ new Date(prevweekindex.setDate(new Date(prevweekindex).getDate() - 7)).toISOString().slice(0, 10)+"\",\""+new Date(prevweekindex.setDate(new Date(prevweekindex).getDate() + 6)).toISOString().slice(0, 10)+"\")'><i class='fas fa-forward'></i></a> </th><th></th>");

        }
        }
        var d = document.createElement("th");
        d.id = "day_" + i;
        d.innerHTML=predayName[i]+"<br>";
        var p=document.createElement("span");
        p.id = "day_name_" + i;
          p.innerHTML=preweek[i];
         d.append(p);
        document.getElementById("calendarDays").appendChild(d);
       
        if(i==0){

 lastindex=preweek[i] ;
 if(lang=="en"){

$("#calendarDays").append("<th><a class='btn btn-sm btn-secondary text-white' onclick='nextWeek(\""+lastindex+"\"); eventInWeek(\""+ new Date(nextweekinex.setDate(new Date(nextweekinex).getDate() + 1)).toISOString().slice(0, 10)+"\",\""+new Date(nextweekinex.setDate(new Date(nextweekinex).getDate() + 6)).toISOString().slice(0, 10)+"\")'> <i class='fas fa-forward'></i></a> </th><th></th>");
 }else{
  $("#calendarDays").append("<th><a class='btn  btn-sm  btn-secondary text-white' onclick='nextWeek(\""+lastindex+"\"); eventInWeek(\""+ new Date(nextweekinex.setDate(new Date(nextweekinex).getDate() + 1)).toISOString().slice(0, 10)+"\",\""+new Date(nextweekinex.setDate(new Date(nextweekinex).getDate() + 6)).toISOString().slice(0, 10)+"\")'> <i class='fas fa-backward'></i></a> </th><th></th>");
  
 }
 }
    }

}
 function eventInWeek(fromDate,toDate){
  var base_url='{{URL::to('/')}}';
   var url_m='/eventInWeek';
   var lang='{{App::getLocale()}}';
   $.ajax({
                url: url_m,
                data: {fromDate:fromDate,toDate:toDate},
                method: 'GET',
                beforeSend:function(){

                },
            }).done(function (data) {
                    
                $("#eventstbl").empty();
 
                 $.map(data.events, function(value, i) { 
                  if(lang=="en"){

                    $("#eventstbl").append(
 
                      '<tr style="cursor: pointer;" onclick="classdetails('+value.id+')" id="row-'+value.id+'" class="active"><td colspan="1">'+
                                      '<label for="rec-'+value.id+'"></label></td><td>'+
                                       ' <img  src="'+base_url+'/public/storage/'+value.image+'" width="29" height="35"  ></td><td >'+
                                    value.name +'</td><td id="coachesforevent">'
                                  + '</td> <td>'+
                                  value.duration +' min</td><td>'+ value.time.toString()+'</td><td>'+value.no_of_attendees+'</td><td>'+value.cost+'KD</td>  <td>'+
                                    ' <a class="btn btn-sm  btn-lg btn-secondary text-white" onclick="classdetails('+value.id+') " style="cursor:pointer;font-size: 12px; height: 30px;padding: 5px;background-color: #3c3c63;border-color: #3c3c63;"> {{trans("lang.classes.moredetails")}}</a> </td></tr>'
                                      );
                                      $.each(value.coaches, function(obj,val) {
                                      $("#coachesforevent").append(
                               '<span>'+ val.name +'</span><br>' );
                                     });
                  }else{
                    $("#eventstbl").append(
 
 '<tr style="cursor: pointer;" onclick="classdetails('+value.id+')" id="row-'+value.id+'" class="active"><td colspan="1">'+
                 '<label for="rec-'+value.id+'"></label></td><td>'+
                  ' <img  src="'+base_url+'/public/storage/'+value.image+'" width="29" height="35"  ></td><td >'+
               value.name_ar +'</td><td id="coachesforevent">'
             + '</td> <td>'+
             value.duration +' دقيقة</td><td>'+ value.time.toString()+'</td><td>'+value.no_of_attendees+'</td><td>'+value.cost+' دينار كويتي</td>  <td>'+
               ' <a class="btn btn-sm  btn-lg btn-secondary text-white" onclick="classdetails('+value.id+') " style="cursor:pointer;font-size: 12px; height: 30px;padding: 5px;background-color: #3c3c63;border-color: #3c3c63;"> {{trans("lang.classes.moredetails")}}</a> </td></tr>'
                 );
                 $.each(value.coaches, function(obj,val) {
                 $("#coachesforevent").append(
          '<span>'+ val.name_ar +'</span><br>' );
                });
                  }
                       });
 
                // $.each(data.transactions,function(index,value){
                   
                    // });
  });

 }


</script>
       @endsection
