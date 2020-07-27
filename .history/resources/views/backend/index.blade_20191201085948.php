@extends('backend.layouts.admin')

@section('style')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{asset('assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">

@endsection

@section('content')

<div class="row">
        <div class="col-xs-12">

          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Events</h3>
              <a href="{{route('admin.Coache.create')}}" class="btn btn-md btn-primary btn-simple pull-right">
                        <i class="glyphicon glyphicon-plus"></i>
                        New Record
                    </a>


            </div>
            <!-- /.box-header -->
            <div class="box-body">

              <table id="example1" class="table  table-striped">
                    <thead class="table-bordered text-primary">
                       <tr>
                         <th>
                        ID
                      </th>
                      <th  class="text-center">
                        Name
                      </th>

                      <th class="text-center">
                        Email
                      </th>
                      <th  rowspan="1" colspan="1" style="width: 68.5px;" aria-label="Actions"  class="text-center">Actions</th>

                    </tr></thead>
                        <tbody>
                        @foreach($coaches as $coache)

                                <tr id="row-{{$coache->id}}">
                                  <td>
                                      {{$coache->id}}
                                  </td>

                                  <td  class="text-center">
                                  {{$coache->name}}
                                  </td>
                                  <td class="text-center">
                                  {{$coache->email}}
                                  </td>

                                  <!-- <td class="text-center">
                                      <img src="{{asset('storage/' . $coache->image )}}" height="40" width="50">
                                      </td> -->
                                      <td nowrap="">

                                <a href="{{route('admin.Coache.edit' , [ 'id' => $coache->id ])}}" class="btn btn-md btn-primary btn-simple " title="Edit">
                                <i class="glyphicon glyphicon-edit"></i> Edit
                                </a>

                                <a href="#" class=" btn btn-md btn-danger btn-simple sa-remove deleteRecored"  id="{{$coache->id}}"  onclick="deletrec({{$coache->id}})"  data-toggle="modal">
                                <i class="glyphicon glyphicon-trash"></i> Delete
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
                    <h5 class="modal-title" id="exampleModalLabel">Coache Delete</h5>
                    <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                         <span aria-hidden="true">&times;</span>
                    </a>
                </div>
                <div class="modal-body">

                <p style="color:#000000;">Are you Sure do you want delete The Coache?</p>
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
<script src="{{asset('assets/bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
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




  function deletrec(id){
     var recored_id = id;
           $("#id").val(recored_id);
          $('#deleteModal').modal('show');
     $( "#deleteBtn" ).click(function() {
        // console.log("hhh");
        var url='{{URL::to('/admin/coaches')}}';
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
