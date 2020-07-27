@extends('backend.layouts.admin')
@section('style')
<!--begin::Page Vendors Styles(used by this page) -->

<!--end::Page Vendors Styles -->

@endsection

@section('content')



<div class="content">
        <div class="row">
          <div class="col-md-8">
            <div class="card">
              <div class="card-header">
                <h5 class="title">Add Event</h5>
              </div>
              <div class="card-body">
              <form method="post" action="{{route('admin.Event.store')}}" enctype="multipart/form-data" >
              @csrf
                  <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">Name</label>
                <div class="col-sm-10">
                <input type="text" class="form-control" id="name" name="name" placeholder="Name">
                @error('name')
                    <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="cost" class="col-sm-2 col-form-label">Cost</label>
                <div class="col-sm-10">
                <input type="text" class="form-control" id="cost"  name="cost" placeholder="Cost">
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
                <input type="date"id="date" name="date" >
                 @error('date')
                    <p class="text-danger">{{$message}}</p>
                    @enderror

            </div>
            </div>
            <div class="form-group row">
                <label for="time" class="col-sm-2 col-form-label">Time</label>
                <div class="col-sm-10">

                <textarea class="form-control" id="time" name="time"   placeholder="Duration"></textarea>
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
