@extends('layouts.adminLayout.admin_design')
@section('content')

<div id="content">
  
  <div class="container">    
    <h1>Available Material</h1>
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
                  <th>Material ID</th>
                  <th>Material Title</th>
                  <th>Image</th>
                  
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
              	@foreach($materials as $material)
                <tr class="gradeX">
                  <td class="center">{{ $material->id }}</td>
                  <td class="center">{{ $material->title }}</td>
                  <td class="center"><img src="{{ asset('/images/backend_images/product/large/'. $material->configImage ) }}" style="float:right;width:50px;height:50px"></td>
                  <td class="center">
                    <a href="{{ url('/admin/edit-material/'.$material->id) }}" class="btn btn-primary btn-mini">Edit</a> 
                
                    <a id="delMaterial" href="{{ url('/admin/delete-material/'.$material->id) }}"  class="btn btn-danger btn-mini deleteRecord">Delete</a>
                </tr>
                @endforeach
              </tbody>
            </table>{{ $materials->links() }}
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection