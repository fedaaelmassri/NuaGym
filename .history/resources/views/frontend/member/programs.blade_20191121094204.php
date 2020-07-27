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
                      </div>
                     </div>
            </div>
          </div>

        </div>
      </div>





    <script>

</script>
@endsection
