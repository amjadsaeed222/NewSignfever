@extends('layouts.adminLayout.admin_design')
@section('content')

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
  
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <!-- <th>Product</th> -->
                  <th>Product Name</th>
                  <th>Index Name</th>
                  <th>Base Price</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
              	@foreach($products as $product)
                <tr class="">
                  <!-- <td class="center"><img src="" alt=""></td> -->
                  
                  <td class="center">{{ $product->product_name }}</td>
                  <td class="center">{{ $product->index_title }}</td>
                  <td class="center">${{ $product->price }}</td>
                  <td class="center">
                    
                    <a href="{{ url('/admin/edit-product/'.$product->slug) }}" class="btn btn-primary btn-mini">Edit</a> 
                    <a id="delProduct" href="{{ url('/admin/delete-product/'.$product->id) }}"  class="btn btn-danger btn-mini deleteRecord">Delete</a>
 
                        
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>{{ $products->links() }}
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


@endsection