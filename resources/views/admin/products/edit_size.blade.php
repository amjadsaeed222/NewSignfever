@extends('layouts.adminLayout.admin_design')
@section('content')

<div id="content">
  <div id="content-header">
    
    <h1>Edit Product</h1>
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
            <h5>Edit Size</h5>
          </div>
          <div class="widget-content nopadding">
            <form enctype="multipart/form-data" class="form-horizontal" method="post" action="{{ url('admin/edit-size/'. $size->id) }}" name="edit_size" id="edit_size" >{{ csrf_field() }}
              
              <div class="control-group">
                <label class="control-label">Size Title</label>
                <div class="controls">
                  <input type="text" name="size_title" id="size_title" value="{{$size->title}}">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Size SPN</label>
                <div class="controls">
                  <input type="text" name="size_SPN" id="size_SPN" value="{{$size->SPN}}">
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
