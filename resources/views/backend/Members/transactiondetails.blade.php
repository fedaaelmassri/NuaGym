@extends('backend.layouts.admin')

@section('style')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{asset('public/assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
 <style>
 .profile-user-img{
 margin:7px auto !important;
 }
 .box table{
 border:none;
 margin-left: 4px;

 }
 .box table tr{
  height: 35px;

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
         <li class="active"><a href="#"></a>Transaction details</a></li>

      </ol>
    </section>
<div class="row">
        <div class=" col-xs-12">

        <div class="box box-info box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Transaction details</h3>

              <div class="box-tools pull-right">
                
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table>
                 <tr>
                   <td>
                   Invoice Id :
                 
                   </td>
                   <td style="padding-left:100px"> 
                     <strong>          
                            {{$transactions->Invoiceid}}
                  </strong>
                     
                   </td>
                 </tr>
                 <tr>
                   <td>
                   Customer Name   :
                 
                   </td>
                   <td style="padding-left:100px"> 
                     
                     <strong>  {{ App\members::where('id',$transactions->member_id)->first('name')->name}}</strong>                   
                   </td>
                 </tr>
                 <tr>
                   <td>
                   Customer Email   :
                 
                   </td>
                   <td style="padding-left:100px"> 
                     
                     <strong> {{ $transactions->CustomerEmail}}</strong>                   
                   </td>
                 </tr>

                 <tr>
                   <td>
                   Transaction Type  :
                 
                   </td>
                   <td style="padding-left:100px"> 
                     
                     <strong>  {{$transactions->payable_type}}</strong>                   
                   </td>
                 </tr>

                 <tr>
                   <td>
                   Product   :
                 
                   </td>
                   <td style="padding-left:100px"> 
                     
                     <strong> {{$transactions->ProductName}}</strong>                   
                   </td>
                 </tr>
                 <tr>
                   <td>
                   Transaction amount   :
                 
                   </td>
                   <td style="padding-left:100px"> 
                     
                     <strong> {{$transactions->ExtendedAmount}} {{$transactions->Currency}}</strong>                   
                   </td>
                 </tr>
                 <tr>
                   <td>
                   Payment Method   :
                 
                   </td>
                   <td style="padding-left:100px"> 
                     
                     <strong> {{ $transactions->PaymentGateway}}</strong>                   
                   </td>
                 </tr>
                 <tr>
                   <td>
                   Transaction Date   :
                 
                   </td>
                   <td style="padding-left:100px"> 
                     
                     <strong>   {{ date('Y/m/d', strtotime($transactions->TransactionDate))}} </strong>                   
                   </td>
                 </tr>

               
              </table>
             </div>
            <!-- /.box-body -->
          </div>
        <!-- /.col -->
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
 

   

</script>

@endsection
