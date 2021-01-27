@extends('layouts.adminLayout.admin_design')
@section('content')

<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">Products</a> <a href="#" class="current">Add Attributes</a> </div>
    <h1>Products</h1>
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
            <h5>Add Images</h5>
          </div>
          <div class="widget-content nopadding">
            <form enctype="multipart/form-data" class="form-horizontal" method="post" action="{{ url('/api/admin/add-images/'.$productDetails->id) }}" name="add_product" id="add_product" novalidate="novalidate">{{ csrf_field() }}
              <input type="hidden" name="productAttribute_id" value="{{ $productDetails->id }}">
              {{-- <div class="control-group">
                <label class="control-label">Category Name</label>
                <label class="control-label">{{ $category_name }}</label>
              </div> --}}
              <div class="control-group">
                <label class="control-label">Sign Name</label>
                <label class="control-label">{{ $productDetails->title }}</label>
              </div>
              <div class="control-group">
                <label class="control-label">Sign SKU</label>
                <label class="control-label">{{ $productDetails->sku }}</label>
              </div>
              <div class="control-group">
                <label class="control-label">Sign Size</label>
                <label class="control-label">{{ $productDetails->size }}</label>
              </div>
              <div class="control-group">
                <label class="control-label">Sign Material</label>
                <label class="control-label">{{ $productDetails->materialType }}</label>
              </div>
              <div class="control-group">
                <label class="control-label">Sign Alt Image(s)</label>
                <div class="controls">
                  <div class="uploader" id="uniform-undefined">
                    <input name="image[]" id="image" type="file" multiple="multiple"></div>
                </div>
              </div>
             
              <div class="form-actions">
                <input type="submit" value="Add Images" class="btn btn-success">
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>Images</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>Image ID</th>
                  <th>Design ID</th>
                  <th>Image</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                @foreach($productImages as $image)
                <tr class="gradeX">
                  <td class="center">{{ $image->id }}</td>
                  <td class="center">{{ $image->productAttribute_id }}</td>
                  <td class="center"><img width=130px src="{{ asset('images/backend_images/product/small/'.$image->image) }}"></td>
                  <td class="center"><a id="delImage" rel="{{ $image->id }}" rel1="delete-alt-image" href="javascript:" class="btn btn-danger btn-mini deleteRecord">Delete</a></td>

                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection

