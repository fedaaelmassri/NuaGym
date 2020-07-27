@extends('backend.layouts.admin')

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
                <h4 class="card-title"> Programs</h4>

                    <a href="{{route('admin.Program.create')}}" class="btn btn-brand btn-elevate btn-icon-sm float-right">
                        <i class="la la-plus"></i>
                        New Record
                    </a>
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
                      <th class="text-center">
                        Image
                      </th>
                      <th  rowspan="1" colspan="1" style="width: 68.5px;" aria-label="Actions">Actions</th>

                    </tr></thead>
                 <tbody  >
                     @foreach($programs as $program)

                    <tr id="row-{{$program->id}}">
                        <td>
                            {{$program->id}}


                        </td>
                        <td>
                        {{$program->name}}

                        </td>
                        <td>
                        {{$program->cost}}
                        </td>
                        <td class="text-center">
                             <img src="{{asset('storage/' . $program->image )}}" height="40" width="50">
                            </td>
                            <td nowrap="">

                                    <a href="{{route('admin.Program.edit' , [ 'id' => $program->id ])}}" class="btn btn-md btn-primary btn-simple " title="Edit"> Edit<i class="la la-edit"></i>
                                    </a>

                                    <a href="#" class=" btn btn-md btn-danger btn-simple sa-remove deleteRecored"  id="{{$program->id}}" onclick="deletrec({{$program->id}})"  data-toggle="modal"> Delete<i class="la la-trash"></i>
                                    </a>
                                    <a href="#coacheModal" class=" btn btn-md btn-danger btn-simple "  id="program-{{$program->id}}"  onclick="getProgramId({{$program->id}});getAllCoach({{$program->id}})"  data-toggle="modal"> Coaches<i class="la la-trash"></i>
                                    </a

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
                    <h5 class="modal-title" id="exampleModalLabel">Program Delete</h5>
                    <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                         <span aria-hidden="true">&times;</span>
                    </a>
                </div>
                <div class="modal-body">

                <p style="color:#000000;">Are you Sure do you want delete The Program?</p>
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
                 <input type="text" id="programid" name="programid"   />


<?php
// $program_id=Request::input('programid');
// dd($program_id);


// "<script language=javascript>document.write(profile_viewer_uid);</script>
// echo "<script>document.writeln($('#programid').val());</script>";


// $program_id= App/Input::get('programid');
// "<script>document.writeln($('#programid').val());</script>"
// dd($program_id);
// $coach=App\CoachesPrograms::where('program_id',)
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

    <script>

 function getAllCoach(id){
    var base_url='{{URL::to('/')}}';
     alert(base_url);
   var url='{{URL::to('/admin/programs')}}';
         var m_url=url+'/getallcoach';
         $.ajax({
            url:m_url ,
            type: 'GET',
            data: {},
            success: function(data) {

                $('#coachTable').html(' ');
                $.each(data.data, function(index,obj) {
              $('#coachTable').append('<tr id="row-'+obj.id+'"><td  style="color:#000000 !important;">'+obj.id+'</td><td  style="color:#000000 !important;">'+obj.name+'</td><td  style="color:#000000 !important;"></td>'+
            '  <td  class=" text-center" style="color:#000000 !important;">'+
                            '<img src="'+base_url+'/'+ obj['image']+'" height="40" width="50">'
                            +'</td>'+
                            ' <td nowrap=""   style="color:#000000 !important;">'+

                     '<a    href="#" id="addcoach-'+obj.id+'"  onclick="addcoache('+obj.id+')"> <i class="fas fa-check-circle text-success"></i></a>'+

           '<a href="#" class=""   id="removecoach-'+obj.id+'" onclick="deletcoach('+obj.id+')"  > <i class="fas fa-times-circle text-danger"></i></a>'+
                '</td></tr>');
            });

                     }
        });

 }
function getProgramId(id){
    var recored_id = id;
         $("#programid").val(recored_id);

     }
 function checkfoundcoach(c_id){
    var url='{{URL::to('/admin/programs')}}';
    var p_id= $("#programid").val();
    var m_url=url+'/checkfoundcoach/'+p_id+'/'+c_id;
         $.ajax({
            url:m_url ,
            type: 'GET',
            data: {},
            success: function(data) {
                    //  $('#deletecoachModal').modal('toggle');
                    if(data.success=='true'){
                        //$("#removecoach"+c_id).css("display", "block");
                        $("#addcoach-"+c_id).css("display", "none");

                    }else{
                        $("#removecoach-"+c_id).css("display", "none");


                    }

            }



        });

 }
function addcoache(c_id){
    var url='{{URL::to('/admin/programs')}}';
    var p_id= $("#programid").val();

    var m_url=url+'/addcoach/'+p_id+'/'+c_id;
    $.ajax({
            url:m_url ,
            type: 'POST',
            //'p_id':p_id,'c_id':c_id
            data: {'_token': '{{ csrf_token() }}'},
            success: function(data) {
                    //  $('#deleteModal').modal('toggle');
                    toastr.success(""+data.message);
                    $( "#coachtable" ).load();

            }



        });
}
function deletcoach(c_id){
      var url='{{URL::to('/admin/programs')}}';
    var p_id= $("#programid").val();
    var m_url=url+'/deletecoach/'+p_id+'/'+c_id;
         $.ajax({
            url:m_url ,
            type: 'GET',
            data: {},
            success: function(data) {
                    //  $('#deletecoachModal').modal('toggle');
                    toastr.success(""+data.message);

            }



        });

}
     function deletrec(id){
     var recored_id = id;
           $("#id").val(recored_id);
          $('#deleteModal').modal('show');
     $( "#deleteBtn" ).click(function() {
        // console.log("hhh");
        var url='{{URL::to('/admin/programs')}}';
    //  alert(url);
        var delid = $("#id").val();
        var deleteurl=url+'/delete/'+id;
        // alert(deleteurl);
        $.ajax({
            url:deleteurl ,
            type: 'GET',
            data: {'id':delid},
            success: function(data) {
                 $('#row-'+id).remove();
                     $('#deleteModal').modal('toggle');
                    toastr.success(""+data.message);

            }



        });
});
}

</script>
@endsection
