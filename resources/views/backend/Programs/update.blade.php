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
        <li class="active"><a href="{{route('admin.Program')}}">Programs</a></li>
      </ol>
    </section>
<div class="row">

        <div class=" col-md-offset-2 col-md-8  col-md-offset-2 ">
                <!-- Horizontal Form -->
                <div class="box box-info">
                    <div class="box-header with-border">
                    <h3 class="box-title">{{ __('Edit Program') }}</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                        <form  class="form-horizontal"  method="post" action="{{route('admin.Program.update',[ 'id' => $program->id ])}}" enctype="multipart/form-data" >
                    @method('PUT')
                              @csrf


                    <div class="box-body">
                    <div class="form-group   ">
                <label for="name" class="col-sm-3 col-form-label">Name</label>
                <div class="col-sm-9">
                <input type="text"   id="name" name="name" placeholder="Name"  value="{{$program->name }}" class="form-control @error('name') is-invalid @enderror">
                @error('name')
                    <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
            </div>
            <div class="form-group   ">
                <label for="name_ar" class="col-sm-3 col-form-label">Name_ar</label>
                <div class="col-sm-9">
                <input type="text"   id="name_ar" name="name_ar" placeholder="Name_ar"  value="{{$program->name_ar }}" class="form-control @error('name_ar') is-invalid @enderror">
                @error('name_ar')
                    <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
            </div>

            <div class="form-group   ">
                <label for="cost" class="col-sm-3 col-form-label">Cost</label>
                <div class="col-sm-9">
                <input type="text" value="{{$program->cost }}" class="form-control @error('cost') is-invalid @enderror" id="cost"  name="cost" placeholder="Cost">
                @error('cost')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                </div>
            </div>
            <div class="form-group   ">
                <label for="description" class="col-sm-3 col-form-label">Description</label>
                <div class="col-sm-9">

                <textarea class="form-control" id="description" name="description" rows="5"  placeholder="Description">
                {{ $program->description }}
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
                {{ $program->description_ar }}
                </textarea>
                @error('description_ar')
                    <p class="text-danger">{{$message}}</p>
                    @enderror

            </div>
            </div>
            <div class="form-group   ">
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
            <div class=" form-group ">
                        <img class="imagebrowes" src="{{ asset('public/storage/' . $program->image) }}" height="100" style="margin-left:20rem !important;" />
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
