@extends('layouts.adminLayout.admin_design')
@section('content')

<div id="content">
  <div id="content-header">
    
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
  </div>
  <div class="container-fluid"><hr>
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
            <h5>Edit Material</h5>
          </div>
          <div class="widget-content nopadding">
            <form enctype="multipart/form-data" class="form-horizontal" method="post" action="{{ url('admin/edit-material/'.$material->id) }}" name="add_material" id="add_material" >{{ csrf_field() }}
              
              <div class="control-group">
                <label class="control-label">Material Title</label>
                <div class="controls">
                  <input type="text" name="material_title" id="material_title" value="{{$material->title}}">
                </div>
              </div>
              
              <div class="control-group">
                <label class="control-label">Material Description</label>
                <div class="controls">
                  <textarea name="description" id="description" row="5" cols="10">{{$material->description}}"</textarea>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Image</label>
                <div class="controls">
                  <input type="file" name="image" id="image">
                  <input type="hidden" name="current_image" id="current_image" value="{{$material->image}}">
                </div>
              </div>
              <div class="form-actions">
                <input type="submit" value="Update" class="btn btn-success">
              </div>
            </form>

          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
