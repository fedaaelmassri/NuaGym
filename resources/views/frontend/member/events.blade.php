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
              {{ trans('lang.member_dashbord.classes_lbl')}}

              </h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            @if (count($Events) > 0)

              <table id="example1" class="table table-bordered table-striped">
              <thead class=" text-primary">
                      <tr> <th class="text-center">
                                    {{ trans('lang.member_dashbord.id_lbl')}}
                                    </th>
                                    <th class="text-center">
                                    {{ trans('lang.member_dashbord.name_lbl')}}

                                    </th>
                                    <th class="text-center">
                                    {{ trans('lang.member_dashbord.coach_lbl')}}

                                    <th class="text-center">
                                    {{ trans('lang.member_dashbord.cost_lbl')}}

                                    </th>
                      <th class="text-center">
                         {{ trans('lang.member_dashbord.date_lbl')}}

                      </th>
                      <th class="text-center">
                         {{ trans('lang.member_dashbord.time_lbl')}}

                      </th>
                      <th class="text-center">
                      
                      {{ trans('lang.member_dashbord.duration_lbl')}}

                                            </th>

                      <th class="text-center">
                         {{ trans('lang.member_dashbord.image_lbl')}}

                      </th>
 
                    </tr>
                    </thead>
                                <tbody>
                     @foreach($Events as $key => $events)

                    <tr id="row-{{$events->id}}">
                    <td class="text-center">
                        {{$key+1}}


                        </td>
                        <td class="text-center">
                        @foreach(App\Events::all() as $eventinfo)
                        @if($eventinfo->id==$events->payable_id)

                        @if(App::getLocale() == 'en')

                      {{$eventinfo->name}}
                      @endif
                      @if(App::getLocale() == 'ar')

                        {{$eventinfo->name_ar}}
                        @endif
                        @endif
                          
                        @endforeach


                        </td>
                        <td class="text-center">
                                        @foreach(App\Coaches::all() as $choachinfo)
                                        @if($choachinfo->id==$events->coache_id)
                                            

                                        @if(App::getLocale() == 'en')

                                          {{$choachinfo->name}}
                                          @endif
                                          @if(App::getLocale() == 'ar')

                                            {{$choachinfo->name_ar}}
                                            @endif


                                          @endif
                                        @endforeach


                                            </td>
                        <td class="text-center">
                        @foreach(App\Events::all() as $eventinfo)
                        @if($eventinfo->id==$events->payable_id)

                        {{$eventinfo->cost}}
                        @endif

                        @endforeach

                        </td>
                        <td class="text-center">
                        @foreach(App\Events::all() as $eventinfo)
                        @if($eventinfo->id==$events->payable_id)

                        {{$eventinfo->date}}
                        @endif

                        @endforeach

                         </td>
                         <td class="text-center">
                        @foreach(App\Events::all() as $eventinfo)
                        @if($eventinfo->id==$events->payable_id)

                         {{ date('H:i:s', strtotime($eventinfo->time))}}

                        @endif

                        @endforeach

                        </td>

                        <td class="text-center">
                        @foreach(App\Events::all() as $eventinfo)
                        @if($eventinfo->id==$events->payable_id)

                        {{$eventinfo->duration}}
                        @endif

                        @endforeach

                         </td>
                        <td class="text-center">
                        @foreach(App\Events::all() as $eventinfo)
                        @if($eventinfo->id==$events->payable_id)
                        <img src="{{asset('public/storage/' . $eventinfo->image )}}" height="40" width="50">

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
            {{trans('lang.member_dashbord.class_notfound')}}
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
