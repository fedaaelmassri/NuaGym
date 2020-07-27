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
        <li><a href="{{route('admin.dashboard')}}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active" ><a href="{{route('admin.Member.transactions')}}">Transactions</a></li>
      </ol>
    </section>

<div class="row">
        <div class="col-xs-12">

          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Transactions</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            @if (count($transactions) > 0)

              <table id="example1" class="table   table-striped">
              <thead class=" text-primary">
                                    <tr><th>
                                        ID
                                    </th>
                                    <th>
                                    Member

                                     <th>
                                    Transaction Type
                                    </th>
                                    <th>
                                    Product 
                                    </th>
                                    <th>
                                    Transaction amount
                                    </th>
                                    <th>
                                    Transaction Date
                                    </th>
                                    <th>
                                    Quantity
                                    </th>


                                    <th>
                                    Payment Method
                                    </th>
                                     </tr>
                                </thead>
                                <tbody>

                                    @foreach($transactions as $key => $trans )
                                     <tr   style="cursor: pointer;" id="trans-{{$trans->id}}" onclick="transactiondetails({{$trans->id}})" >
                                        <td>
                                           {{$key+1}}


                                        </td>
                                        <td>
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

                                            {{$trans->ExtendedAmount}}

                                            </td>  <td>

                                             {{$trans->TransactionDate}} 

                                            </td>  <td>

                                            {{$trans->Quantity}}

                                            </td>  <td>

                                            {{$trans->PaymentGateway}}

                                            </td>

                                    </tr>
                                    @endforeach

                                </tbody>

              </table>
              @else

            <blockquote>
            <p class="blockquote blockquote-primary">
            You are didn't   any transactions yet
                        <br>
            <br>
            <small>

            </small>
            </p>
            </blockquote>
            @endif

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
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
  function transactiondetails(id){
    var base_url='{{URL::to('/')}}';
    var m_url=base_url+'/admin/members/transactionDetails/'+id;
    window.location.href =m_url;


  } 
</script>

@endsection
