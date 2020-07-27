@extends('backend.layouts.admin')

@section('style')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{asset('public/assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="{{asset('public/assets/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css')}}">
  <!-- Select2 -->
  <link rel="stylesheet" href="{{asset('public/assets/bower_components/select2/dist/css/select2.min.css')}}">

@endsection

@section('content')
<section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{route('admin.dashboard')}}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active" href="{{route('admin.Member.transactions')}}">Account Statement</li>
      </ol>
    </section>

     <!--Form Filter -->
     <div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title">Account Statement</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
           </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="row" style="margin-bottom: 26px;">
            <div class="col-md-12">
                <div class="form-group">
                    <label class="col-md-3 col-form-label  ">Type</label>
                    <div class="col-md-6 "  style="margin-left: -213px;">
                    <select class="  form-control select2" style="width: 100%;" name="payable_type"  id="payable_type" onchange="accountStatementfilter()">
                    <option selected="selected" value=''> Select One</option>
                     @foreach($payable_type as  $type )

                     <option value="{{$type->payable_type}}">{{$type->payable_type}}</option>
                     @endforeach
                    </select>
                    </div>
                <!-- /.form-group -->
                </div>
            </div>
            </div>

            <div class="row">
            <!-- /.col -->
             <div class="col-md-6">
              
              <!-- /.form-group -->
                 <!-- Date -->
 
                        <div class="form-group">
                        <label class="col-md-1 col-form-label  ">From</label>
                    <div class="col-md-5 " >

                            <div class="input-group date">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>
                            <input type="text" class="form-control pull-right" id="fromDate" name="fromDate" onchange="accountStatementfilter()">
                            </div>
                            </div>


                            <!-- /.input group -->
                        </div>
                        
                        <!-- /.form-group -->

                </div>
                <div class="col-md-6" style="margin-left: -213px;">

                    <div class="form-group">
                        <label class="col-md-1 col-form-label  ">To:</label>
                        <div class="col-md-5 " >
                        <div class="input-group date">
                            <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                            </div>
                            <input type="text" class="form-control pull-right" id="toDate"  name="toDate"  onchange="accountStatementfilter()">
                        </div>
                        </div>

                        <!-- /.input group -->
                    </div>
                    <!-- /.form-group -->

 
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
         
      </div>
      <!-- /.box -->
<div class="row">
        <div class="col-xs-12">

          <div class="box">
            <div class="box-header">
              <h3 class="box-title">account Statement</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
 
              <table id="example1" class="table table-bordered table-striped">
 
              <thead class=" text-primary">
                                    <tr><th>
                                    Invoice Id
                                    </th>
                                    <th>
                                     Amount

                                     <th>
                                    Transaction Type
                                    </th>
                                    <th>
                                    PaymentGateway
                                
                                    </th>
                                    <th>
                                    Paid Currency
                                    </th>
                                    <th>
                                     Date
                                    </th>
                                   


                                    
                                     </tr>
                                </thead>
                                <tbody id="transtable">
                                

                                    @foreach($transactions as $key => $trans )
                                     <tr  >
                                        <td>
                                           {{$trans->Invoiceid}}


                                        </td>
                                        <td>

                                        {{$trans->ExtendedAmount}}

                                        </td>
                                        

                                         <td>

                                            {{$trans->payable_type}}

                                            </td> 
                                            <td>

                                            {{$trans->PaymentGateway}}

                                            </td>
                                            <td>

                                    {{$trans->PaidCurrency}}

                                    </td>

                                            
                                              <td>
                                              {{ $trans->TransactionDate}} 



                                            </td>  

                                    </tr>
                                    @endforeach

                                </tbody>

              </table>
 
            <!-- <blockquote>
            <p class="blockquote blockquote-primary">
            You are didn't   any transactions yet
                        <br>
            <br>
            <small>

            </small>
            </p>
            </blockquote> -->
            

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
<!-- bootstrap datepicker -->
<script src="{{asset('public/assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')}}"></script>
<!-- Select2 -->
<script src="{{asset('public/assets/bower_components/select2/dist/js/select2.full.min.js')}}"></script>

<script>
  $(function () {
    $('.select2').select2();
    $('#example1').DataTable();
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    });
        //Date picker

        $('#fromDate').datepicker({
      autoclose: true,
      format: 'yyyy-mm-dd' 
    });
        $('#toDate').datepicker({
      autoclose: true,
      format: 'yyyy-mm-dd' 

    });
    
    
    




  });
  function dateFormate(dDate){
    var d = new Date(dDate);

// var datestring = d.getDate()  + "/" + (d.getMonth()+1) + "/" + d.getFullYear() ;
var datestring = d.getFullYear() + "/" + ("0"+(d.getMonth()+1)).slice(-2) + "/" +("0" + d.getDate()).slice(-2) 
    ;

return datestring;

  }
  function accountStatementfilter(){
     var base_url='{{URL::to('/')}}';
     var url_m='accountStatementfilter/';
    //  var payable_type = payable_type.value;  
     var payable_type = $("#payable_type").val(); 

            var fromDate=$("#fromDate").val();

            // alert(fromDate);
           var  toDate=$("#toDate").val();
        
            $.ajax({
                url: url_m,
                data: {payable_type:payable_type,fromDate:fromDate,toDate:toDate},
                method: 'GET',
                beforeSend:function(){

                },
            }).done(function (data) {
                    /*
                    $("#transtable").append(
                    '<tr  >  <td> '+ value.Invoiceid+ '</td>  <td>'+ value.ExtendedAmount+'</td>  <td>'+
                    payable_type+'</td>  <td'>+ value.PaymentGateway +'</td>  <td>'+value.PaidCurrency  +'</td>  <td'>+value.TransactionDate+'</td></tr>'
                      );
                    
                    */
                $("#transtable").empty();
                 $.map(data.transactions, function(value, i) {  $("#transtable").append('<tr><td>'+value.Invoiceid+'</td><td>'+ value.ExtendedAmount+'</td><td>'+ value.payable_type+'</td><td>'+ value.PaymentGateway +'</td><td>'+value.PaidCurrency  +'</td><td>'+value.TransactionDate +'</td></tr>') });
                // console.log("data"+progs.Invoiceid)

                // $.each(data.transactions,function(index,value){
// alert(value.Invoiceid);
                 
                    // });
  });

 }


</script>

@endsection
