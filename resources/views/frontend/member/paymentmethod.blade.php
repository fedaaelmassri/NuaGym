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
            <h3 class="box-title">{{ trans('lang.member_dashbord.payment_lbl')}}</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            @if (count($paymentMethod) > 0)

              <table id="example1" class="table table-bordered table-striped">
              <thead class=" text-primary">
                                    <tr>
                                    <th class="text-center">
                                    {{ trans('lang.member_dashbord.id_lbl')}}
                                    </th>
                                    <th class="text-center">
                                    {{ trans('lang.member_dashbord.payment_m_lbl')}}
                                    
                                      </th>
                                     </tr>
                                </thead>
                                <tbody>
                                 
                                    @foreach($paymentMethod as $key => $method )
                                     <tr  >
                                        <td class="text-center">
                                           {{$key+1}} 


                                        </td>
                                        <td class="text-center">
                                      
                                        {{$method->PaymentGateway}}
                                      
                                        </td>
                                         

                                    </tr>
                                    @endforeach

                                </tbody>

              </table>
              @else

            <blockquote>
            <p class="blockquote blockquote-primary">
            {{trans('lang.member_dashbord.payment_notfound')}}

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
