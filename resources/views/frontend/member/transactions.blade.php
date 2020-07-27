@extends('frontend.layouts.admin')

@section('style')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{asset('public/assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">

@endsection

@section('content')

<div class="row">
        <div class="col-xs-12">

          <div class="box">
            <div class="box-header">
              <h3 class="box-title">                     
                             {{ trans('lang.member_dashbord.transactions_lbl')}}
</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            @if (count($transactions) > 0)

              <table id="example1" class="table table-bordered table-striped">
              <thead class=" text-primary">
                                    <tr>
                                    <th class="text-center">
                                    {{ trans('lang.member_dashbord.id_lbl')}}
                                    </th>
                                    <th class="text-center">
                                     {{ trans('lang.member_dashbord.transaction_type_lbl')}}

                                    </th>
                                    <th class="text-center">
                                     {{ trans('lang.member_dashbord.product_lbl')}}

                                    </th>
                                    <th class="text-center">
                                     {{ trans('lang.member_dashbord.transaction_amount_lbl')}}

                                    </th>
                                    <th class="text-center">
                                     {{ trans('lang.member_dashbord.transaction_date_lbl')}}

                                    </th>
                                    <th class="text-center">
                                     {{ trans('lang.member_dashbord.quantity_lbl')}}

                                    </th>
                                    <th class="text-center">
                                     {{ trans('lang.member_dashbord.payment_m_lbl')}}

                                    </th>
                                     </tr>
                                </thead>
                                <tbody>

                                    @foreach($transactions as $key => $trans )
                                     <tr  >
                                     <td class="text-center">
                                           {{$key+1}}


                                        </td>
                                        <td class="text-center">

                                            {{$trans->payable_type}}

                                            </td> 
                                            <td class="text-center">

                                    {{$trans->ProductName}}

                                    </td> 
                                            
                                    <td class="text-center">

                                            {{$trans->ExtendedAmount}}

                                            </td> 
                                            <td class="text-center">

                                            {{ date('Y/m/d', strtotime($trans->TransactionDate))}} 

                                            </td> 
                                            <td class="text-center">

                                            {{$trans->Quantity}}

                                            </td> 
                                            <td class="text-center">

                                            {{$trans->PaymentGateway}}

                                            </td>

                                    </tr>
                                    @endforeach

                                </tbody>

              </table>
              @else

            <blockquote>
            <p class="blockquote blockquote-primary">
             {{trans('lang.member_dashbord.transaction_notfound')}}

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
</script>

@endsection
