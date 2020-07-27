@extends('frontend.layouts.admin')

@section('style')
<!--begin::Page Vendors Styles(used by this page) -->
<link href="{{asset('assets/vendors/custom/datatables/datatables.bundle.css')}}" rel="stylesheet" type="text/css" />
 <!--end::Page Vendors Styles -->
@endsection

@section('content')

<div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card ">
              <div class="card-header">
                <h4 class="card-title"> Programs</h4>


              </div>
              <div class="card-body">
                    <div class="table-responsive ps" >
                  <table class="table tablesorter " id="">
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
                     $programinfo=App\programs::where('id', $programs->program_id);

                     <!-- @foreach(App\programs::all() as $program) -->

                     <!-- @foreach($programs->programs as $program)
            @foreach(App\programs::where('id', $programs->program_id) as $program)
                                            -->

                    <tr id="row-{{$programs->id}}">
                        <td>
                            {{$programs->id}}


                        </td>
                        <td>

                        {{$programinfo->name}}

                        </td>
                        <td>

                        {{$programinfo->cost}}
                        </td>
                        <td class="text-center">
                        @foreach($program->coaches as $coach)
                        @foreach($coach->programs as $progforcoach)

                              @if($progforcoach->id==$program->id)
                              @foreach($coach->members as $coachformem)
                              @if($coachformem->id==$programs->id)
                              {{$coach->name}}
                              @break
                              @endif
                              @endforeach
                              @endif
                        @endforeach
                        @endforeach
                             </td>

                    </tr>
                      @endforeach
                      @endforeach

                </tbody>
             </table>
                      </div>
                     </div>
            </div>
          </div>

        </div>
      </div>





    <script>

</script>
@endsection
