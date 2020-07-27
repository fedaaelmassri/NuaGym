@extends('frontend.layouts.admin')

@section('style')
<!--begin::Page Vendors Styles(used by this page) -->
<link href="{{asset('assets/vendors/custom/datatables/datatables.bundle.css')}}" rel="stylesheet" type="text/css" />
 <!--end::Page Vendors Styles -->
@endsection

@section('content')

<div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card ">
              <div class="card-header">
                <h4 class="card-title"> Events</h4>

              </div>
              <div class="card-body">
                <div class="table-responsive ps" >
                  <table class="table tablesorter " id="">
                    <thead class=" text-primary">
                      <tr><th>
                        ID
                      </th>
                      <th>
                        Name
                      </th>
                      <th>
                        Cost
                      </th>
                      <th>
                        Date
                      </th>
                      <th>
                        Time
                      </th>
                      <th>
                      Duration
                      </th>

                      <th class="text-center">
                        Image
                      </th>
                      <th  rowspan="1" colspan="1" style="width: 68.5px;" aria-label="Actions">Actions</th>

                    </tr>
                    </thead>
                 <tbody>
                     @foreach($Events as $events)

                    <tr id="row-{{$events->id}}">
                        <td>
                            {{$events->id}}


                        </td>
                        <td>
                        {{$events->name}}

                        </td>
                        <td>
                        {{$events->cost}}
                        </td>
                        <td>
                        {{$events->date}}
                        </td>
                        <td>
          {{ date('H:i:s', strtotime($events->time))}}
                        </td>

                        <td>
                        {{$events->duration}}
                        </td>
                        <td class="text-center">
                             <img src="{{asset('storage/' . $events->image )}}" height="40" width="50">
                            </td>

                    </tr>
                      @endforeach
                </tbody>
             </table>
                        <!-- <div class="ps__rail-x" style="left: 0px; bottom: 0px;">
                        <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
                        </div>
                        <div class="ps__rail-y" style="top: 0px; right: 0px;">
                        <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div>
                        </div> -->
            </div>
                    </div>
            </div>
          </div>

        </div>
      </div>




 <!-- Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">

            <input type="hidden" id="id" name="id" value="" />

            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">events Delete</h5>
                    <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                         <span aria-hidden="true">&times;</span>
                    </a>
                </div>
                <div class="modal-body">

                <p style="color:#000000;">Are you Sure do you want delete The events?</p>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary deleteBtn" id="deleteBtn">Save</button>
                    <a href="#" class="btn btn-secondary" data-dismiss="modal">Close</a>

                </div>
            </div>
        </div>
    </div>

    <div class="modal fade " id="coacheModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">


            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Coaches</h5>
                    <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                         <span aria-hidden="true">&times;</span>
                    </a>

                </div>
                <div class="modal-body ">
                 <input type="hidden" id="eventsid" name="eventsid"   />


<?php
// $events_id=Request::input('eventsid');
// dd($events_id);


// "<script language=javascript>document.write(profile_viewer_uid);</script>
// echo "<script>document.writeln($('#eventsid').val());</script>";


// $events_id= App/Input::get('eventsid');
// "<script>document.writeln($('#eventsid').val());</script>"
// dd($events_id);
// $coach=App\Coacheseventss::where('events_id',)
 ?>
    <div class="table-responsive ps  " >
                  <table class="table tablesorter  " id="">
                    <thead class=" text-primary ">
                      <tr><th  class="blackcolor">
                        ID


                      </th>
                      <th  class="blackcolor">
                        Name
                      </th>
                      <th  class="blackcolor ">
                        Image
                      </th>
                      <th  class="blackcolor text-center" rowspan="1" colspan="1" style="width: 68.5px;" aria-label="Actions">Actions
                        </th>

                    </tr></thead>
                 <tbody id="coachTable">

                 </tbody>
             </table>
                        <!-- <div class="ps__rail-x" style="left: 0px; bottom: 0px;">
                        <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
                        </div>
                        <div class="ps__rail-y" style="top: 0px; right: 0px;">
                        <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div>
                        </div> -->
            </div>
            </div>
                <div class="modal-footer">
                    <button class="btn btn-primary deleteBtn" id="deleteBtn">Save</button>
                    <a href="#" class="btn btn-secondary" data-dismiss="modal">Close</a>

                </div>
            </div>
        </div>
    </div>
@endsection
