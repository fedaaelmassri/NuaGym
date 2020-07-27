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
        <li class="active"> <a href="{{route('admin.Event')}}">Class</a></li>
      </ol>
    </section>
<div class="row">

        <div class=" col-md-offset-2 col-md-8  col-md-offset-2 ">
                <!-- Horizontal Form -->
                <div class="box box-info">
                    <div class="box-header with-border">
                    <h3 class="box-title">Add Class</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                        <form   class="form-horizontal" method="post" action="{{route('admin.Event.store')}}" enctype="multipart/form-data" >
                        @csrf


                    <div class="box-body">
                    <div class="form-group row">
                <label for="name" class="col-sm-3  col-form-label">Name</label>
                <div class="col-sm-9 ">
                <input type="text" class="form-control" id="name" name="name" placeholder="Name">
                @error('name')
                    <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label for="name_ar" class="col-sm-3  col-form-label">Name_ar</label>
                <div class="col-sm-9 ">
                <input type="text" class="form-control" id="name_ar" name="name_ar" placeholder="Name_ar">
                @error('name_ar')
                    <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
            </div>
            <div class="form-group  ">
                                <label for="description" class="col-sm-3 col-form-label">Description</label>
                                <div class="col-sm-9">

                                <textarea class="form-control" id="description" name="description" rows="5"  placeholder="Description"></textarea>
                                @error('description')
                                    <p class="text-danger">{{$message}}</p>
                                    @enderror

                            </div>
                            </div>
                            <div class="form-group  ">
                                <label for="description_ar" class="col-sm-3 col-form-label">Description_ar</label>
                                <div class="col-sm-9">

                                <textarea class="form-control" id="description_ar" name="description_ar" rows="5"  placeholder="Description_ar"></textarea>
                                @error('description_ar')
                                    <p class="text-danger">{{$message}}</p>
                                    @enderror

                            </div>
                            </div>
            <div class="form-group row">
                <label for="cost" class="col-sm-3  col-form-label">Cost</label>
                <div class="col-sm-9 ">
                <input type="text" class="form-control" id="cost"  name="cost" placeholder="Cost">
                @error('cost')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                </div>
            </div>
            <div class="form-group row">
                <label for="description" class="col-sm-3  col-form-label">Duration</label>
                <div class="col-sm-9 ">

                <input type="text" class="form-control" id="duration" name="duration"   placeholder="Duration">
                @error('duration')
                    <p class="text-danger">{{$message}}</p>
                    @enderror

            </div>
            </div>
            <div class="form-group row">
                <label for="date" class="col-sm-3  col-form-label">Date</label>
                <div class="col-sm-9 ">
                <input type="date" class="form-control" id="date" name="date" value="{{Carbon\Carbon::now()->format('Y-m-d')}}" >
                 @error('date')
                    <p class="text-danger">{{$message}}</p>
                    @enderror

            </div>
            </div>
            <div class="form-group row">
                <label for="time" class="col-sm-3  col-form-label">Time</label>
                <div class="col-sm-9 ">
                <input type="time"  class="form-control" id="time" name="time" value="{{Carbon\Carbon::now()->format('H:i')}}"   >

                 @error('time')
                    <p class="text-danger">{{$message}}</p>
                    @enderror

            </div>
            </div>
            <div class="form-group row">
                <label for="name" class="col-sm-3  col-form-label">Image</label>
                <div class="col-sm-8">
                                <div class="custom-file">
                    <input type="file" class="custom-file-input" name="image" id="customFile">
                     @error('image')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                </div>
                </div>
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
