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
         <li class="active"><a href="{{route('admin.Member')}}">Members</a></li>

      </ol>
    </section>
<div class="row">
        <div class="col-xs-12">

          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Members</h3>
              <!-- <a href="{{route('admin.Program.create')}}" class="btn btn-md btn-primary btn-simple pull-right">
                        <i class="glyphicon glyphicon-plus"></i>
                        New Record
                    </a> -->

            </div>
            <!-- /.box-header -->
            <div class="box-body">
 
            <table id="example1" class="table  table-striped">
                    <thead class="table-bordered text-primary">
                       <tr>
                         <th>
                        ID
                      </th>
                      <th class="text-center">
                        Name
                      </th>

                      <th class="text-center">
                      EMAIL
                      </th>

                      <th  class="text-center" rowspan="1" colspan="1" style="width: 68.5px;" aria-label="Actions">Actions</th>

                    </tr>
                  </thead>
                        <tbody>
                        @foreach($members as $index=>$member)
                                <tr style="cursor: pointer;" id="member-{{$member->id}}" onclick="memberdetails({{$member->id}})">
                                  <td>
                                      {{$index+1}}
                                  </td>
                                  <td class="text-center">
                                  {{$member->name}}

                                  </td>
                                  <td class="text-center">
                                  {{$member->email}}

                                  </td>

                                  <!-- <td class="text-center">
                                      <img src="{{asset('public/storage/' . $member->image )}}" height="40" width="50">
                                      </td> -->
                                      <td nowrap="">

                                <!-- <a href="{{route('admin.Program.edit' , [ 'id' => $member->id ])}}" class="btn btn-md btn-primary btn-simple " title="Edit"> <i class="glyphicon glyphicon-edit"></i> Edit
                                </a> -->


                                <a href="{{route('admin.Member.Activate',['id'=>$member->id])}}" class=" btn btn-md {{$member->status==='0' ? 'btn-success' : 'btn-danger'}}  btn-simple "  id="{{$member->id}}"> @if($member->status==='0') Active @else Block @endif 
                                  <!-- <i class="la la-trash"></i> -->
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
  function memberdetails(id){
    var base_url='{{URL::to('/')}}';
    var m_url=base_url+'/admin/members/memberDetails/'+id;
    window.location.href =m_url;


  }
  

   

</script>

@endsection
