@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ isset($url) ? ucwords($url) : ""}} Sign Up</div>

                <div class="card-body">
                    {{-- <form method="POST" action="{{ route('register') }}">
                        @csrf
 --}}
                        @isset($url)
                        <form method="POST" action='{{ url("register/$url") }}' aria-label="{{ __('Register') }}">
                        @else
                        <form method="POST" action="{{ route('register') }}" aria-label="{{ __('Register') }}">
                        @endisset
                            @csrf
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
@endsection
