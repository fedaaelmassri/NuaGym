@extends('frontend.layouts.master')
@section('style')
@endsection
@section('content')
    <!-----start body ------>
<!--------- Start section1-->

  <div class="row section1 ">
          <!-- <div class="col-6"> -->
             <div class="col-1">
               <div style="height:154px"  class="pt-117" >
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

            <div class="col-10">

              <div class=" eventTabel">

                         <table class="table">
                                <thead>
                                  <tr>
                                        <th></th>
                                        <th></th>
                                     <th    >Saturday
                                      <p>
                                          10 September
                                      </p>
                                    </th>
                                    <th >Sunday
                                        <p>
                                            11 September
                                        </p>
                                    </th>
                                    <th  >Monday
                                        <p>
                                            12 September
                                        </p>
                                    </th>
                                    <th >Tuesday
                                        <p>
                                            13 September
                                        </p>
                                    </th>
                                    <th >Wednesday
                                        <p>
                                            14 September
                                        </p>
                                    </th>
                                    <th >Thursday
                                        <p>
                                            15 September
                                        </p>
                                    </th>
                                    <th >Friday
                                        <p>
                                            16 September
                                        </p>
                                    </th>

                                  </tr>
                                  <tr>

                                        <th></th>
                                        <th></th>
                                      <th >
                                        Class
                                    </th>

                                    <th></th>
                                    <th></th>
                                    <th  >
                                        Duration
                                    </th>
                                    <th></th>
                                    <th></th>
                                    <th>
                                        Time
                                    </th>
                                  </tr>
                                </thead>
                                <tbody>
                                @foreach($Events as $events)


                                  <tr   id="row-{{$events->id}}" class="active">
                                    <td colspan="1">
                                      <input type="checkbox" checked="checked" id="rec-{{$events->id}}" value="{{$events->id}}">
                                      <label for="Ford"></label>
                                    </td>
                                    <td>
                                        <img src="assets/images/Capa_3.svg" width="29" height="35"  >

                                    </td>
                                    <td >{{$events->name}}</td>
                                    <td></td>
                                    <td></td>

                                   <td> {{$events->duration}} min</td>
                                   <td></td>
                                    <td></td>
                                    <td >{{$events->time}}</td>

                                  </tr>
                                  @endforeach
                                 </tbody>
                              </table>
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
      <div class="col-6">
          <div class="musebtn mt-70" style="background:transparent url('assets/images/mouse.svg') 0% 0% no-repeat padding-box"></div>
       </div>
      <div class="col-5 ">
          <!-- <div class="startbtn"> -->
          <a class="btn  btn-lg yellowbtnsec2 subscribe-btn ">
                Subscribe
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

       @endsection
