@extends('layouts.adminLayout.admin_design')
@section('content')

<div id="content">
  
  <div class="container">    
    <h1>All Index</h1>
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
            <table class="table table-hover text-left">
              <thead>
                <tr>
                  <th>Image</th>
                  <th>Index ID</th>
                  <th>Category Name</th>
                  <th>Name</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
              	@foreach($allIndexes as $index)
                <tr class="">
                  <td class="text-center"><img src="{{ asset('/images/backend_images/index/'.$index->image) }}" width="100px"></td>
                  <td class="center">{{ $index->id }}</td>
                  <td class="center">{{ $index->category_name }}</td>
                  <td class="center">{{ $index->title }}</td>
                  <!-- style="float:right;width:25px;height:25px" -->
                  <td class="center">
                    <a href="{{ url('/admin/edit-index/'.$index->slug) }}" class="btn btn-primary btn-mini">Edit</a> 
                    <a id="delIndex"  href="{{ url('/admin/delete-index/'.$index->id) }}"  class="btn btn-danger btn-mini deleteRecord">Delete</a>
                  </tr>
                @endforeach
              </tbody>
            </table>{{ $allIndexes->links() }}
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection