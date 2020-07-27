@extends('backend.layouts.admin')

@section('style')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{asset('public/assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
 <style>
 .profile-user-img{
 margin:7px auto !important;
 }
 .box p{
  margin-right: 11px !important;

 }
 .box table{
 border:none;
 margin-left: 4px;

 }
 .box table tr{
  height: 40px;

 }
 </style>
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
        <div class="col-xs-offset-1  col-xs-10  col-xs-offset-1 ">
        <div class="box box-info box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Member details</h3>

              <div class="box-tools pull-right">
              <i class="fa fa-address-card margin-r-5"></i>
              </div>
              <!-- /.box-tools -->
            </div>

            <!-- <div class="box-header with-border"> -->
 
 

             <!-- </div> -->
            <!-- /.box-header -->
            <div class="box-body  " style="    margin-left: 18px;">
            <table>
            <tr>
              <td><i class="fa fa-info margin-r-5"></i> Name:</td>
              <td style="padding-left:100px"> 
                 <strong>             
                 {{$member->name}}
              </strong>
            </td>

            </tr>  
               <td><i class="fa fa-address-card margin-r-5"></i> Identity:</td>
              <td style="padding-left:100px"> 
                 <strong>             
                 {{$member->identity}}
              </strong>
            </td>

            </tr>  
              <tr>
              <td><i class="fa fa-envelope margin-r-5"></i> Email:</td>
              <td style="padding-left:100px"> 
                 <strong>             
                  {{$member->email}}
              </strong>
            </td>

            </tr>  
            
            <tr>
              <td>  <i class="fa fa-phone margin-r-5"></i> Telephone:</td>
              <td style="padding-left:100px">  
                <strong>          
                       {{$member->mobile}}
              </strong>
            </td>

            </tr>

            <tr>
              <td>  <i class="fa fa-map-marker margin-r-5"></i> Location:</td>
              <td style="padding-left:100px">  
                <strong>          
                {{$member->address}}
              </strong>
            </td>

            </tr>
            <tr>
              <td>  <i class="fa fa-fw fa-bar-chart margin-r-5"></i> Transactions:</td>
              <td style="padding-left:100px">  
                <strong>          
                {{App\transactions::where('member_id',$member->id)->count()}}
                            </strong>
            </td>

            </tr>
            <tr>
              <td>  <i class="fa fa-calendar margin-r-5"></i> Date of join:</td>
              <td style="padding-left:100px">  
                <strong>          
                {{ date('Y/m/d', strtotime($member->created_at))}} 
                                         </strong>
            </td>

            </tr>
            
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
 

   

</script>

@endsection
