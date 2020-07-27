@extends('frontend.layouts.admin')

@section('style')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{asset('assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">

@endsection

@section('content')

<div class="row">
        <div class="col-xs-12">

          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Table With Full Features</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            @if (count($programs) > 0)

              <table id="example1" class="table table-bordered table-striped">
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
                                        Coach
                                    </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($programs as $programs)

                                    <tr id="row-{{$programs->id}}">
                                        <td>
                                            {{$programs->id}}


                                        </td>
                                        <td>
                                        @foreach(App\programs::all() as $programinfo)
                                        @if($programinfo->id==$programs->program_id)

                                        {{$programinfo->name}}
                                        @endif

                                        @endforeach

                                        </td>
                                        <td>
                                        @foreach(App\programs::all() as $programinfo)
                                        @if($programinfo->id==$programs->program_id)

                                        {{$programinfo->cost}}
                                        @endif
                                        @endforeach

                                        </td>

                                        <td class="text-center">
                                        @foreach(App\Coaches::all() as $choachinfo)
                                        @if($choachinfo->id==$programs->coache_id)

                                        {{$choachinfo->name}}
                                        @endif
                                        @endforeach


                                            </td>

                                    </tr>
                                    @endforeach

                                </tbody>

              </table>
              @else

<blockquote>
<p class="blockquote blockquote-primary">
You are not subscripe  in any program yet
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
<script src="{{asset('assets/bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
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
