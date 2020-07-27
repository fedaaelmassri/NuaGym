@extends('backend.layouts.admin')

@section('style')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{asset('public/assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">

@endsection

@section('content')
<section class="content-header" style="margin-bottom:10px;">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{route('admin.dashboard')}}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"> <a href="{{route('admin.Program')}}">Programs</a></li>
      </ol>
    </section>
<div class="row">
        <div class="col-xs-12">

          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Programs</h3>
              <a href="{{route('admin.Program.create')}}" class="btn btn-md btn-primary btn-simple pull-right">
              <i class="glyphicon glyphicon-plus"></i>
                        New Record
                    </a>

            </div>
            <!-- /.box-header -->
            <div class="box-body">
 
            <table id="example1" class="table  table-striped">
                    <thead class="table-bordered text-primary">
                      <tr><th>
                        ID
                      </th>
                      <th>
                        Name
                      </th>
                      <th>
                        Name_ar
                      </th>

                      <th>
                        Cost
                      </th>
                      <th class="text-center">
                        Image
                      </th>
                      <th class="text-center">
                            Subscribers
                            </th>

                      <th  rowspan="1" colspan="1" style="width: 68.5px;" aria-label="Actions">Actions</th>

                    </tr>
                    </thead>
                        <tbody>
                        @foreach($programs as $program)

<tr id="row-{{$program->id}}">
    <td>
        {{$program->id}}


    </td>
    <td>
    {{$program->name}}

    </td>
    <td>
    {{$program->name_ar}}

    </td>
    <td>
    {{$program->cost}}
    </td>
    <td class="text-center">
         <img src="{{asset('public/storage/' . $program->image )}}" height="40" width="50">
        </td>
        <td class="text-center">
                          
                          {{App\transactions::where('payable_type','program')->where('payable_id',$program->id)->count()}}
                                 
  
  
                                          </td>
  
        <td nowrap="">

                <a href="{{route('admin.Program.edit' , [ 'id' => $program->id ])}}" class="btn btn-md btn-primary btn-simple " title="Edit"> <i class="glyphicon glyphicon-edit"></i> Edit
                </a>

                <a href="#" class=" btn btn-md btn-danger btn-simple sa-remove deleteRecored"  id="{{$program->id}}" onclick="deletrec({{$program->id}})"  data-toggle="modal"> <i class="glyphicon glyphicon-trash"></i> Delete
                </a>
                <a href="#coacheModal" class=" btn btn-md btn-success btn-simple "  id="program-{{$program->id}}"  onclick="getProgramId({{$program->id}});getAllCoach({{$program->id}})"  data-toggle="modal"> <i class="fa fa-fw fa-street-view"></i>Coaches
                </a

                </td>
</tr>
  @endforeach
                </tbody>

              </table>
           

            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>


 <!-- Modal -->
 <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">

        <input type="hidden" id="id" name="id" value="" />

            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="exampleModalLabel">Program Delete</h3>
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
                    <h3 class="modal-title" id="exampleModalLabel">Coaches</h3>
                    <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                         <span aria-hidden="true">&times;</span>
                    </a>

                </div>
                <div class="modal-body ">
                <input type="hidden" id="programid" name="programid"   />

     <table id="example3" class="table table-bordered table-striped">
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

                    </tr>
                 </thead>
                 <tbody id="coachTable">

                 </tbody>
             </table>
                         
             </div>
                <div class="modal-footer">
                     <a href="#" class="btn btn-primary " data-dismiss="modal">Close</a>

                </div>
            </div>
        </div>
    </div>



      @endsection

@section('script')
<!-- DataTables -->
<script src="{{asset('public/assets/bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('public/assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable()

    $('#example3').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    });
  });
 

      


  function getAllCoach(pid){
    var base_url='{{URL::to('/')}}';
    var url='{{URL::to('/admin/programs')}}';
         var m_url=url+'/getallcoach';
         $.ajax({
            url:m_url ,
            type: 'GET',
            data: {},
            success: function(data) {

                $('#coachTable').html(' ');
                $.each(data.data, function(index,obj) {
              $('#coachTable').append('<tr id="row-'+obj.id+'"><td  style="color:#000000 !important;">'+obj.id+'</td><td  style="color:#000000 !important;">'+obj.name+'</td>'+
            '  <td  class=" text-center" style="color:#000000 !important;">'+
                            '<img src="'+base_url+'/public/storage/'+ obj.image+'" height="40" width="50">'
                            +'</td>'+
                            ' <td nowrap=""   style="color:#000000 !important;">'+

                     '<a       href="#" id="addcoach-'+pid+obj.id+'"  onclick="addcoache('+obj.id+')"> <i class="glyphicon glyphicon-ok-circle text-success"></i></a>'+

           '<a href="#" style="display:none"    id="removecoach-'+pid+obj.id+'" onclick="deletcoach('+obj.id+')"  > <i class="glyphicon glyphicon-remove-circle text-danger"></i></a>'+
                '</td></tr>');
                var progs = $.map(obj.programs, function(e, i) { return e.id });
                // console.log(pid, progs);
                // console.log($.inArray(pid, progs));
                if ($.inArray(pid, progs) != -1) {

$("#addcoach-"+pid+""+obj.id).css("display", "none");
$("#removecoach-"+pid+""+obj.id).css("display", "block");

} else {
$("#addcoach-"+pid+""+obj.id).css("display", "block");
$("#removecoach-"+pid+""+obj.id).css("display", "none");
}  
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
     var progid=parseInt(p_id, 10);


    var m_url=url+'/addcoach/'+p_id+'/'+c_id;
    $.ajax({
            url:m_url ,
            type: 'POST',
            //'p_id':p_id,'c_id':c_id
            data: {'_token': '{{ csrf_token() }}'},
            success: function(data) {
              // getProgramId(p_id);
                    getAllCoach(progid);

                    //  $('#deleteModal').modal('toggle');
                    toastr.success(""+data.message);
                    // $('#example3').DataTable();

                    // $( "#coachtable" ).load();

            }



        });
}
function deletcoach(c_id){
      var url='{{URL::to('/admin/programs')}}';
    var p_id= $("#programid").val();
    var progid=parseInt(p_id, 10);

    var m_url=url+'/deletecoach/'+p_id+'/'+c_id;
         $.ajax({
            url:m_url ,
            type: 'GET',
            data: {'_token': '{{ csrf_token() }}'},
            success: function(data) {
              // getProgramId(p_id);
                    getAllCoach(progid);

                    //  $('#deletecoachModal').modal('toggle');
                    toastr.success(""+data.message);
                    // $('#example3').DataTable();

                    // $( "#coachtable" ).load();
 


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
