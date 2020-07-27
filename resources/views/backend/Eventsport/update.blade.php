@extends('backend.layouts.admin')
@section('style')
<!--begin::Page Vendors Styles(used by this page) -->

<!--end::Page Vendors Styles -->
<style>
.imagebrowes{
    margin-left:20rem !important;
    height:100px !important;

}
</style>

@endsection

@section('content')
<section class="content-header" style="margin-bottom:10px;">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{route('admin.dashboard')}}"><i class="fa fa-dashboard"></i> Home</a></li>
         <li class="active"> <a href="{{route('admin.Eventsport')}}">Event</a></li>

      </ol>
    </section>
<div class="row">

        <div class=" col-md-offset-2 col-md-8  col-md-offset-2 ">
                <!-- Horizontal Form -->
                <div class="box box-info">
                    <div class="box-header with-border">
                    <h3 class="box-title">{{ __('Edit Event') }}</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                       <form   class="form-horizontal" method="post" action="{{route('admin.Eventsport.update',[ 'id' => $Event->id ])}}" enctype="multipart/form-data" >

                     @method('PUT')
                        @csrf

                    <div class="box-body">
                    <div class="form-group ">
                <label for="name" class="col-sm-3 col-form-label">Name</label>
                <div class="col-sm-9 ">
                <input type="text"   id="name" name="name" placeholder="Name"  value="{{$Event->name }}" class="form-control @error('name') is-invalid @enderror">
                @error('name')
                    <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
            </div>
            <div class="form-group ">
                <label for="name_ar" class="col-sm-3 col-form-label">Name_ar</label>
                <div class="col-sm-9 ">
                <input type="text"   id="name_ar" name="name_ar" placeholder="Name_ar"  value="{{$Event->name_ar }}" class="form-control @error('name_ar') is-invalid @enderror">
                @error('name_ar')
                    <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
            </div>
            <div class="form-group   ">
                <label for="description" class="col-sm-3 col-form-label">Description</label>
                <div class="col-sm-9">

                <textarea class="form-control" id="description" name="description" rows="5"  placeholder="Description">
                {{ $Event->description }}
                </textarea>
                @error('description')
                    <p class="text-danger">{{$message}}</p>
                    @enderror

            </div>
            </div>
            <div class="form-group   ">
                <label for="description_ar" class="col-sm-3 col-form-label">Description_ar</label>
                <div class="col-sm-9">

                <textarea class="form-control" id="description_ar" name="description_ar" rows="5"  placeholder="Description_ar">
                {{ $Event->description_ar }}
                </textarea>
                @error('description_ar')
                    <p class="text-danger">{{$message}}</p>
                    @enderror

            </div>
            </div>

            <div class="form-group ">
                <label for="cost" class="col-sm-3 col-form-label">Cost</label>
                <div class="col-sm-9 ">
                <input type="text" value="{{$Event->cost }}" class="form-control @error('cost') is-invalid @enderror" id="cost"  name="cost" placeholder="Cost">
                @error('cost')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                </div>
            </div>
            <div class="form-group ">
                <label for="duration" class="col-sm-3 col-form-label">Duration</label>
                <div class="col-sm-9 ">

                <input type="text" class="form-control" id="duration" name="duration"   placeholder="Duration" value="{{$Event->duration }}" class="form-control @error('duration') is-invalid @enderror">
                @error('duration')
                    <p class="text-danger">{{$message}}</p>
                    @enderror

            </div>
            </div>
            <div class="form-group ">
                <label for="date" class="col-sm-3 col-form-label">Date</label>
                <div class="col-sm-9 ">
                <input type="date" value="{{$Event->date }}" class="form-control @error('date') is-invalid @enderror form-control" id="date" name="date"   >
                 @error('date')
                    <p class="text-danger">{{$message}}</p>
                    @enderror

            </div>
            </div>
            <div class="form-group ">
                <label for="time" class="col-sm-3 col-form-label">Time</label>
                <div class="col-sm-9 ">
                <input type="time"  value="{{date('H:i:s', strtotime($Event->time))}}" class="form-control @error('time') is-invalid @enderror form-control" id="time" name="time"   >

                 @error('time')
                    <p class="text-danger">{{$message}}</p>
                    @enderror

            </div>
            </div>
            <div class="form-group row">
                <label for="required_subscribers" class="col-sm-3  col-form-label">Number of subscribers</label>
                <div class="col-sm-9 ">
                <input type="number"  class="form-control" id="required_subscribers" name="required_subscribers" value="{{$Event->required_subscribers }}" class="form-control @error('required_subscribers') is-invalid @enderror"   >

                 @error('required_subscribers')
                    <p class="text-danger">{{$message}}</p>
                    @enderror

            </div>
            </div>
            <div class="form-group ">
                <label for="name" class="col-sm-3 col-form-label">Image</label>
                <div class="col-sm-8">
                                <div class="custom-file">
                    <input type="file" class="custom-file-input" name="image" id="customFile">
                     @error('image')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                </div>
                </div>
            </div>
            <div class="form-group ">
                        <img class="imagebrowes" src="{{ asset('public/storage/' . $Event->image) }}" height="100" style="margin-left:20rem !important;" />
                    </div>


                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <a href="{{route('admin.dashboard')}}" class="btn btn-default">Cancel</a>
                        <button type="submit" class="btn btn-info pull-right">Save</button>
                    </div>
                    <!-- /.box-footer -->
                    </form>
                </div>
        </div>
 </div>

@endsection
