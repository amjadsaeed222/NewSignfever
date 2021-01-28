@extends('layouts.adminLayout.admin_design')
@section('content')
@php
use App\Models\Index;
@endphp
<div id="content">
  
  <div class="container">    
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
  
  <div class="container-fluid">
    <hr>
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>Products</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>Product ID</th>
                  <th>Index Name</th>
                  <th>Product Name</th>
                  <th>Price</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
              	@foreach($products as $product)
                <tr class="gradeX">
                  <td class="center">{{ $product->id }}</td>
                  
                  <td class="center">{{ $product->index_title }}</td>
                  <td class="center">{{ $product->product_name }}</td>
                  <td class="center">{{ $product->price }}</td>
                  
                  <td class="center">
                    
                    <a href="{{ url('/admin/edit-product/'.$product->slug) }}" class="btn btn-primary btn-mini">Edit</a> 
                    <a id="delProduct" rel="{{ $product->id }}" rel1="delete-product" href="javascript:"  class="btn btn-danger btn-mini deleteRecord">Delete</a>
 
                        <div id="myModal{{ $product->id }}" class="modal hide">
                          <div class="modal-header">
                            <button data-dismiss="modal" class="close" type="button">×</button>
                            <h3>{{ $product->product_name }} Full Details</h3>
                          </div>
                          
                            <div class="modal-body">
                            <p>Product ID: {{ $product->id }}</p>
                            <img src="{{ asset('/images/backend_images/product/small/'.$product->image) }}" style="float:right;width:120px;">
                            
                            @php
                              
                              $index=Index::where(['id'=>$product->index_Id])->first();
                              $index_title=$index->title;    
                            @endphp
                            <p>Index : {{ $index_title }}</p>
                            <p>Price: {{ $product->price }}</p>
                            <p>Description: {{ $product->description }}</p>
                            {{-- @if (!empty($product->design))
                              @foreach ($product->design as $key=> $val)
                              <p>SKU:{{$val->sku}}</p>
                              <p>Size:{{$val->size}}</p>
                              <p>Material:{{$val->materialType}}</p>
                              @endforeach    
                            @endif
                             --}}
                          </div>
                        </div>

                  </td>
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