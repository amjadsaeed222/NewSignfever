@extends('layouts.adminLayout.admin_design')
@section('content')

<div id="content">
  
  <div class="container">
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
  
        <div class="my-5" id="form">
            <h5>Edit Size</h5>
          
            <form enctype="multipart/form-data" class="form-horizontal" method="post" action="{{ url('admin/edit-size/'. $size->id) }}" name="edit_size" id="edit_size" >{{ csrf_field() }}
              <div id="basic_info">
                <div class="form-group row">
                    <label for="size_title" class="col-sm-3 col-form-label"
                        >Size Title</label
                    >
                    <div class="col-sm-9">
                  <input required type="text" class="form-control" name="size_title" id="size_title" value="{{$size->title}}">
                
                @error('size_title')
                <div class="alert alert-danger">{{$message}}</div>
                @enderror
                    </div>
              </div>
              <div class="form-group row">
                <label for="size_spn" class="col-sm-3 col-form-label"
                    >Size SPN</label
                >
                <div class="col-sm-9">
                  <input required type="text" class="form-control" name="size_SPN" id="size_SPN" value="{{$size->SPN}}">
                  @error('size_SPN')
                  <div class="alert alert-danger">{{$message}}</div>
                  @enderror
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

@endsection
