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
            <h5>Add Attributes</h5>
          </div>
          <div class="widget-content nopadding">
            <form enctype="multipart/form-data" class="form-horizontal" method="post" action="{{ url('/api/admin/add-attributes/'.$productDetails->id) }}" name="add_product" id="add_product" novalidate="novalidate">{{ csrf_field() }}
              <input type="hidden" name="product_id" value="{{ $productDetails->id }}">
              <div class="control-group">
                <label class="control-label">Category</label>
                <label class="control-label">{{ $category_name }}</label>
              </div>
              <div class="control-group">
                <label class="control-label">SignBoard Name</label>
                <label class="control-label">{{ $productDetails->product_name }}</label>
              </div>
              <div class="control-group">
                <label class="control-label">SignBoard price</label>
                <label class="control-label">{{ $productDetails->price }}</label>
              </div>
              <div class="control-group">
                <label class="control-label"></label>
                <div class="controls field_wrapper">
                  <input required title="Required" type="text" name="title[]" id="title" placeholder="Title" style="width:120px;">
                  <input required title="Required" type="text" name="sku[]" id="sku" placeholder="SKU" style="width:120px;">
                  <input required title="Required" type="text" name="size[]" id="size" placeholder="Size" style="width:120px;">
                  <input required title="Required" type="text" name="stock[]" id="stock" placeholder="Stock" style="width:120px;">
                  <select required title="Required" name="material[]" id="material" style="width:140px;">
                    <option value="Plastic">Plastic</option>
                    <option value="Aluminum">Aluminum</option>
                    <option value="Wood">Wood</option>
                  </select><a href="javascript:void(0);" class="add_button" title="Add field">Add</a><br>
                </div>
              </div>
             
              <div class="form-actions">
                <input type="submit" value="Add Attributes" class="btn btn-success">
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
            <h5>Attributes</h5>
          </div>
          <div class="widget-content nopadding">
            <form action="{{ url('/api/admin/edit-attributes/'.$productDetails->id) }}" method="post">{{ csrf_field() }}
              <table class="table table-bordered data-table">
                <thead>
                  <tr>
                    <th>Attribute ID</th>
                    <th>SKU</th>
                    <th>Title</th>
                    <th>Size</th>
                    <th>Material</th>
                    <th>Stock</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($productAttribute as $attribute)
                  <tr class="gradeX">
                    
                    <td class="center"><input type="hidden" name="idAttr[]" value="{{ $attribute->id }}">{{ $attribute->id }} </td>
                    <td class="center">{{ $attribute->sku }}</td>
                    <td class="center"><input name="title[]" type="text" value="{{ $attribute->title }}" required style="width:120px;"/></td>
                    <td class="center"><input name="size[]" type="text" value="{{ $attribute->size }}" required style="width:120px;"/></td>
                    <td class="center">
                    <select name="material[]">
                      <option value="Plastic" @if ($attribute->materialType==="Plastic") selected @endif>Plastic</option>
                      <option value="Aluminum" @if ($attribute->materialType==="Aluminum") selected @endif>Aluminum</option>
                      <option value="Wood" @if ($attribute->materialType==="Wood") selected @endif>Wood</option>
                       
                    </select>
                      </td>
                    <td class="center"><input name="stock[]" type="text" value="{{ $attribute->stock }}" required style="width:120px;"/></td> 
                    

                    <td class="center">
                      <a href="{{ url('/api/admin/add-images/'. $attribute->id) }}" class="btn btn-info btn-mini">Add Image</a>
                      <input type="submit" value="Update" class="btn btn-primary btn-mini" />
                      <a rel="{{ $attribute->id }}" rel1="delete-attribute" href="javascript:" class="btn btn-danger btn-mini deleteRecord">Delete</a>
                    </td>

                  </tr>
                  @endforeach
                </tbody>
              </table>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection

