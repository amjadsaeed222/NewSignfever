@extends('layouts.adminLayout.admin_design')
@section('content')

<div id="content">
  
    <div class="container">
    <h1>Available Sizes</h1>
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
                  <th>Size ID</th>
                  <th>Size Title</th>
                  <th>Size SPN</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
              	@foreach($sizes as $size)
                <tr class="gradeX">
                  <td class="center">{{ $size->id }}</td>
                  <td class="center">{{ $size->title }}</td>
                  <td class="center">{{ $size->SPN }}</td>
                  <td class="center">
                    <a href="{{ url('/admin/edit-size/'.$size->id) }}" class="btn btn-primary btn-mini">Edit</a> 
                
                    <a id="delSize"  href="{{ url('/admin/delete-size/'.$size->id) }}"  class="btn btn-danger btn-mini deleteRecord">Delete</a>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>{{ $sizes->links() }}
        </div>
      </div>
    </div>
  </div>
  </div>
</div>

@endsection