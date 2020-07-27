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

                    <a href="{{route('admin.Program.create')}}" class="btn btn-brand btn-elevate btn-icon-sm float-right">
                        <i class="la la-plus"></i>
                        New Record
                    </a>
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
                     @foreach($programs->programs as $program)

                    <tr id="row-{{$program->id}}">
                        <td>
                            {{$program->id}}


                        </td>
                        <td>
                        {{$program->name}}

                        </td>
                        <td>
                        {{$program->cost}}
                        </td>
                        <td class="text-center">
                        @foreach($program->coaches as $coach)
                        @foreach($coach->programs as $coachpr)

                              @if($coachpr->id==$program->id)
                              {{$coach->name}}
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
