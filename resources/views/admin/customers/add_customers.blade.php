@extends('layouts.adminLayout.admin_design')
@section('content')

<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">Customer</a> <a href="#" class="current">Customer Sign UP</a> </div>
    <h1>Customer Sign Up</h1>
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
            <h5>New Customer Resgistration</h5>
          </div>
          
          <div class="widget-content nopadding">
            <form enctype="multipart/form-data" class="form-horizontal" method="post" action="{{ url('/api/admin/add-customer') }}" name="add_customer" id="add_customer" novalidate >{{ csrf_field() }}
              
              <div class="control-group">
                <label class="control-label">First Name</label>
                <div class="controls">
                  <input type="text" name="firstname" id="firstname">
                  <span style="color: red">@error('firstname'){{$message}}@enderror</span>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Last Name</label>
                <div class="controls">
                  <input type="text" name="lastname" id="lastname">
                  <span style="color: red">@error('lastname'){{$message}}@enderror</span>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Email</label>
                <div class="controls">
                  <input type="email" name="email" id="email">
                  <span style="color: red">@error('email'){{$message}}@enderror</span>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Password</label>
                <div class="controls">
                  <input type="password" name="password" id="password">
                  <span style="color: red">@error('password'){{$message}}@enderror</span>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Phone No</label>
                <div class="controls">
                  <input type="text" name="phone" id="phone">
                  <span style="color: red">@error('phone'){{$message}}@enderror</span>
                </div>
              </div>
              
              <div class="control-group">
                <label class="control-label">Streed Address</label>
                <div class="controls">
                  <input type="text" name="street" id="street">
                  <span style="color: red">@error('street'){{$message}}@enderror</span>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">City</label>
                <div class="controls">
                  <input type="text" name="city" id="city">
                  <span style="color: red">@error('city'){{$message}}@enderror</span>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">State</label>
                <div class="controls">
                  <input type="state" name="state" id="state">
                  <span style="color: red">@error('state'){{$message}}@enderror</span>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Zipcode</label>
                <div class="controls">
                  <input type="text" name="zipcode" id="zipcode">
                  <span style="color: red">@error('zipcode'){{$message}}@enderror</span>
                </div>
              </div>
              
              <div class="form-actions">
                <input type="submit" value="Register" class="btn btn-success">
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection