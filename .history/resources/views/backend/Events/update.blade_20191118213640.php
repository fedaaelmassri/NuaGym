@extends('backend.layouts.admin')
@section('style')
<!--begin::Page Vendors Styles(used by this page) -->

<!--end::Page Vendors Styles -->
<style>
.imagebrowes{
    margin-left:8rem !important;
    height:100px !important;

}
</style>

@endsection

@section('content')



<div class="content">
        <div class="row">
          <div class="col-md-8">
            <div class="card">
              <div class="card-header">
                <h5 class="title">Edit Program</h5>
              </div>
              <div class="card-body">
              <form method="post" action="{{route('admin.Program.update',[ 'id' => $program->id ])}}" enctype="multipart/form-data" >
              @method('PUT')
                        @csrf
                  <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">Name</label>
                <div class="col-sm-10">
                <input type="text"   id="name" name="name" placeholder="Name"  value="{{$program->name }}" class="form-control @error('name') is-invalid @enderror">
                @error('name')
                    <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="cost" class="col-sm-2 col-form-label">Cost</label>
                <div class="col-sm-10">
                <input type="text" value="{{$program->cost }}" class="form-control @error('cost') is-invalid @enderror" id="cost"  name="cost" placeholder="Cost">
                @error('cost')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                </div>
            </div>
            <div class="form-group row">
                <label for="description" class="col-sm-2 col-form-label">Duration</label>
                <div class="col-sm-10">

                <textarea class="form-control" id="duration" name="duration"   placeholder="Duration"></textarea>
                @error('duration')
                    <p class="text-danger">{{$message}}</p>
                    @enderror

            </div>
            </div>
            <div class="form-group row">
                <label for="date" class="col-sm-2 col-form-label">Date</label>
                <div class="col-sm-10">
                <input type="date" class="form-control" id="date" name="date" value="{{Carbon\Carbon::now()->format('Y-m-d')}}" >
                 @error('date')
                    <p class="text-danger">{{$message}}</p>
                    @enderror

            </div>
            </div>
            <div class="form-group row">
                <label for="time" class="col-sm-2 col-form-label">Time</label>
                <div class="col-sm-10">
                <input type="time"  class="form-control" id="time" name="time" value="{{Carbon\Carbon::now()->format('H:i')}}"   >

                 @error('time')
                    <p class="text-danger">{{$message}}</p>
                    @enderror

            </div>
            </div>
            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">Image</label>
                <div class="col-sm-8">
                                <div class="custom-file">
                    <input type="file" class="custom-file-input" name="image" id="customFile">
                    <label class="custom-file-label" for="customFile">Choose file</label>
                    @error('image')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                </div>
                </div>
            </div>
            <div class="row form-group ">
                        <img class="imagebrowes" src="{{ asset('storage/' . $program->image) }}" height="100" style="margin-left:8rem !important;" />
                    </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-fill btn-primary">Save</button>
              </div>
                </form>
              </div>

            </div>
          </div>

        </div>
      </div>

@endsection
