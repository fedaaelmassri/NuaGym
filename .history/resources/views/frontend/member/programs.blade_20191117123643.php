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
                     <?php
                    //  $programinfo=App\programs::where('id', $programs->program_id);
                     $choachinfo=App\Coaches::where('id', $programs->coache_id);

                    ?>
                    <tr id="row-{{$programs->id}}">
                        <td>
                            {{$programs->id}}


                        </td>
                        @foreach(App\programs::where('id', $programs->program_id) as $programinfo)
                        <td>

                        {{$programinfo->name}}

                        </td>
                        <td>

                        {{$programinfo->cost}}
                        </td>
                        @endforeach

                        <td class="text-center">
                        {{$choachinfo->name}}


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
