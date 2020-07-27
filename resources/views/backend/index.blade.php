@extends('backend.layouts.admin')

@section('style')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{asset('public/assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
    <style>
 .box .table tr:hover{
  color: #337ab7;
  background-color: aliceblue;


 }
 </style>
@endsection

@section('content')
<section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>{{App\programs::count()}}</h3>

              <p>Program Number</p>
            </div>
            <div class="icon">
              <i class="fa fa-fw fa-tasks"></i>
            </div>
            <a href="{{route('admin.Program')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3>{{App\Coaches::count()}}<sup style="font-size: 20px"></sup></h3>

              <p>Coach Number </p>
            </div>
            <div class="icon">
              <i class="fa fa-fw fa-street-view"></i>
            </div>
            <a href="{{route('admin.Coache')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3>{{App\members::count()}}</h3>

              <p>Member Registrations</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="{{route('admin.Member')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3>{{App\Events::count()}}</h3>

              <p>Events Number </p>
            </div>
            <div class="icon">
              <i class="fa fa-fw fa-calendar"></i>
            </div>
            <a href="{{route('admin.Event')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>


      <div class="row">
      <div class="col-md-6">
              <!-- USERS LIST -->
              <div class="box box-danger">
                <div class="box-header with-border">
                  <h3 class="box-title">Latest Members</h3>

                  <div class="box-tools pull-right">
                    <span class="label label-danger">10 New Members</span>
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                  </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body no-padding">
                  <ul class="users-list clearfix">
                    @foreach(App\members::orderBy('created_at', 'desc')->take(10)->get() as $members)
                    <li>
                      <img src="{{asset('public/assets/dist/img/avatablu.png')}}" alt="User Image">
                      <a class="users-list-name" href="{{route('admin.MemberDetails',['id'=>$members->id])}}">{{$members->name}}</a>
                      <span class="users-list-date">{{date('Y:m:d', strtotime($members->created_at))}}</span>
                    </li>
                    @endforeach
                
                  </ul>
                  <!-- /.users-list -->
                </div>
                <!-- /.box-body -->
                <div class="box-footer text-center">
                  <a href="{{route('admin.Member')}}" class="uppercase">View All Users</a>
                </div>
                <!-- /.box-footer -->
              </div>
              <!--/.box -->
            </div>
            <div class="col-md-6">
             <!-- TABLE: LATEST Transactions -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Latest Transactions</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
               </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="table-responsive">
                <table class="table no-margin">
                  <thead   >
                  <tr  style="white-space: nowrap;">
                     <th  style=" white-space: nowrap;">
                     Member
                     </th>

                      <th  style=" white-space: nowrap;">
                     Transaction Type
                     </th>
                    <th  style="white-space: nowrap;">
                      Product 
                    </th>
                    <th  style="white-space: nowrap;">Quantity</th>
                   <th style="white-space: nowrap;">
                     Transaction amount
                   </th>
                   <th  style="white-space: nowrap;">
                     Transaction Date
                  </th>

                  </tr>
                  </thead>
                  <tbody>
                  @foreach(App\transactions::orderBy('created_at', 'desc')->take(5)->get()  as $key => $trans )

                  <tr  style="cursor: pointer;" id="trans-{{$trans->id}}" onclick="transactiondetails({{$trans->id}})">
                  <td style="white-space: nowrap;">
                                          @foreach(App\members::all() as $memberinfo)
                        @if($memberinfo->id==$trans->member_id)

                        {{$memberinfo->name}}
                        @endif

                        @endforeach



                                        </td>

                    <td>                                      
                      {{$trans->payable_type}}
                    </td>
                    <td>

                  {{$trans->ProductName}}

                  </td> 
                  <td>

                          {{$trans->Quantity}}

                          </td> 
                          
                          <td>

                          {{$trans->ExtendedAmount}}

                          </td>  <td>

                          <div class="sparkbar" data-color="#00a65a" data-height="20"> 
                           {{$trans->TransactionDate}} 

                          </div>

                          </td>  
                 
                  </tr>
                  
                  @endforeach

                  </tbody>
                </table>
              </div>
              <!-- /.table-responsive -->
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix">
               <a href="{{route('admin.Member.transactions')}}" class="btn btn-sm btn-info  btn-flat pull-right">View All Transactions</a>
            </div>
            <!-- /.box-footer -->
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
function transactiondetails(id){
  var base_url='{{URL::to('/')}}';
    var m_url=base_url+'/admin/members/transactionDetails/'+id;
    window.location.href =m_url;


}
</script>

@endsection
