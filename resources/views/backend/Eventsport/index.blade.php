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
        <li class="active"> <a href="{{route('admin.Eventsport')}}">Events</a></li>
      </ol>
    </section>
<div class="row">
        <div class="col-xs-12">

          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Events</h3>
              <a href="{{route('admin.Eventsport.create')}}" class="btn btn-md btn-primary btn-simple pull-right">
                        <i class="glyphicon glyphicon-plus"></i>
                        New Record
                    </a>

             
            </div>
            <!-- /.box-header -->
            <div class="box-body">
 
              <table id="example1" class="table  table-striped table-responsive">
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
                            <th>
                              Date
                            </th>
                            <th>
                              Time
                            </th>
                            <th>
                            Duration
                            </th>
                            <th >
                            required subscribers
                            </th>
                            <th  >
                            current subscribers

                            </th>

                            <th class="text-center">
                              Image
                            </th>
                            
                            <th  rowspan="1" colspan="1" style="width: 68.5px;" aria-label="Actions">Actions</th>

                          </tr>
                          </thead>
                        <tbody>
                        @foreach($Events as $index=>$events)

                    <tr id="row-{{$events->id}}">
                        <td>
                            {{$index+1}}


                        </td>
                        <td>
                        {{$events->name}}

                        </td>
                        <td>
                        {{$events->name_ar}}

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
                        <td>
                        {{$events->required_subscribers}}
                        </td>
                        <td>
                        {{$events->no_of_attendees}}
                        </td>
                        <td class="text-center">
                             <img src="{{asset('public/storage/' . $events->image )}}" height="40" width="50">
                            </td>
                            <!-- <td class="text-center">
                          
                       {{-- {{App\transactions::where('payable_type','event')->where('payable_id',$events->id)->count()}}--}}
                               


                                        </td> -->
                            <td nowrap="">

                                    <a href="{{route('admin.Eventsport.edit' , [ 'id' => $events->id ])}}" class="btn btn-sm btn-primary btn-simple " title="Edit"> 
                                      <i class="glyphicon glyphicon-edit"></i>  
                                    </a>

                                    <a href="#" class=" btn btn-sm btn-danger btn-simple sa-remove deleteRecored"  id="{{$events->id}}" onclick="deletrec({{$events->id}})"  data-toggle="modal"> 
                                    <i class="glyphicon glyphicon-trash"></i>  
                                    </a>
                                   
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
                    <h3 class="modal-title" id="exampleModalLabel">events Delete</h3>
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

     

      @endsection

@section('script')
<!-- DataTables -->
<script src="{{asset('public/assets/bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('public/assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
<script>
  $(function () {
    $('#example1').DataTable()
    $('#example3').DataTable()

    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    });
  });
   

 
 
 function getEventId(id){
    var recored_id = id;
         $("#eventid").val(recored_id);

     }
 
 
 
     function deletrec(id){
     var recored_id = id;
           $("#id").val(recored_id);
          $('#deleteModal').modal('show');
     $( "#deleteBtn" ).click(function() {
        // console.log("hhh");
        var url='{{URL::to('/admin/events')}}';
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
