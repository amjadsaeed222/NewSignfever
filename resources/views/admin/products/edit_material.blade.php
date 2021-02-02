@extends('layouts.adminLayout.admin_design')
@section('content')

<div id="content">
  
  <div class="container">
    <h1>Edit Material</h1>
    @if(Session::has('flash_message_error'))
            <div class="alert alert-error alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button> 
                    <strong>{!! session('flash_message_error') !!}</strong>
            </div>
        @endif   
        @if(Session::has('flash_message_success'))
            <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button> 
                    <strong>{!! session('flash_message_success') !!}</strong>
            </div>
        @endif
  
  
            <h5>Edit Material</h5>
            <div class="my-5" id="form">
            <form enctype="multipart/form-data" class="form-horizontal" method="post" action="{{ url('admin/edit-material/'.$material->id) }}" name="add_material" id="add_material" >{{ csrf_field() }}
              <div id="basic_info">
                <div class="form-group row">
                    <label
                        for="material_title"
                        class="col-sm-3 col-form-label"
                        >Material Title</label
                    >
                    <div class="col-sm-9">
                  <input required type="text" class="form-control" name="material_title" id="material_title" value="{{$material->title}}">
              
                @error('material_title')
                <div class="alert alert-danger">{{$message}}</div>
                @enderror
              </div>
            </div>
          </div>
          <div class="form-group row">
              <label
                  for="material_description"
                  class="col-sm-3 col-form-label"
                  >Material Description</label
              >
              <div class="col-sm-9">
                  <textarea name="description" class=" ckeditor form-control" id="description" row="5" cols="10">{{$material->description}}"</textarea>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-sm-3">Config Image</div>
                <div class="col-sm-9">
                  <div class="custom-file">
                  <input required type="file" name="image" class="custom-file-input" id="image">
                  <input required type="hidden" name="current_image" id="current_image" value="{{$material->configImage}}">
                
                  <label
                  class="custom-file-label"
                  for="material_config_image"
                  >Choose A Config Image For Material</label
              >
            </div>
                            
          </div>
      </div>
  </div>
  <div class="form-group row">
    <div class="col-sm-10">
        <button type="submit" class="btn btn-success">
            Update
        </button>
    </div>
</div>
</form>
</div>
</div>
</div>
@endsection
