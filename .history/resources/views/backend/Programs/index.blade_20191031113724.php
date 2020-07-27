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
                <div class="table-responsive ps">
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
                    <tbody>
                    @foreach($programs as $program)

                      <tr>
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

<a href="#" class=" btn btn-md btn-danger btn-simple sa-remove deleteRecored"  id="{{$program->id}}"> Delete<i class="la la-trash"></i>
</a>



</td>
                        </tr>
                      @endforeach
                    </tbody>
                  </table>
                <div class="ps__rail-x" style="left: 0px; bottom: 0px;"><div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps__rail-y" style="top: 0px; right: 0px;"><div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div></div></div>
              </div>
            </div>
          </div>

        </div>
      </div>
@endsection



@section('js')
<!--begin::Page Vendors(used by this page) -->
<script src="{{asset('assets/vendors/custom/datatables/datatables.bundle.js')}}" type="text/javascript"></script>
<script src="https://cdn.jsdelivr.net/sweetalert2/6.4.1/sweetalert2.js"></script>
<!--end::Page Vendors -->
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

                <p>Are you Sure do you want delete The Program?</p>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary deleteBtn">Save</button>
                    <a href="#" class="btn btn-secondary" data-dismiss="modal">Close</a>

                </div>
            </div>
        </div>
    </div>


    <script>

$(document).ready(function() {
    var current_location="";

    $(document).on("click", '.deleteRecored', function() {
        var recored_id = this.id;
        // alert(news_id);
        // console.log(news_id);
        $("#id").val(recored_id);
        current_location = $(this);
        $('#deleteModal').modal('show');
    });
$(document).on("click", '.deleteBtn', function() {
    // console.log("hhh");
    var url='{{URL::to('/admin/programs')}}';
//  alert(url);
    var id = $("#id").val();
    var deleteurl=url+'/delete/'+id;
    // alert(deleteurl);
    $.ajax({
        url:deleteurl ,
        type: 'GET',
        data: {'id':id},
        dataType: 'JSON',
        success: function(data) {
            //  alert(data);
            if(data.success==true){
               if(data.parentCategory>0){
                current_location.closest("tr").remove();
            $('#deleteModal').modal('toggle');
            toastr.success(""+data.message);
            location.reload(true);
            }
            if(data.parentCategory==0){
                current_location.closest("tr").remove();
            $('#deleteModal').modal('toggle');
            toastr.success(""+data.message);

            }

        }
        if(data.success==false){
                $('#deleteModal').modal('toggle');
                toastr.error(""+data.message);

        }
        }

});
});

//-----------------------------------------------------------
});

var KTDatatablesBasicPaginations = function() {

    var initTable1 = function() {
        var table = $('#kt_table_1');

        // begin first table
        table.DataTable({});
    }
    return {

        //main function to initiate the module
        init: function() {
            initTable1();
        }

    };
}();

jQuery(document).ready(function() {

    KTDatatablesBasicPaginations.init();



});



</script>

@endsection
