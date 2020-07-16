@extends('auth.layouts.app')
@section('title')
<title>{{env('APP_NAME')}} | Register</title>
@endsection
@section('content')
<div class="login-box">
  <div class="login-logo">
    <a href="javascript:void(0)"><b>Green</b>Logistics</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body register-card-body">
      <p class="login-box-msg">Register a new membership</p>
      @if ($errors->any())
      <div class="alert alert-danger">
      @foreach ($errors->all() as $error)
          <div>{{ $error }}</div>
      @endforeach
      </div>
    @endif

    @if(Session::has('success'))
            <div class="alert alert-success">
            {!! session('success') !!}
            </div>
    @endif
      <form method="POST" action="{{ route('register') }}">
        @csrf
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Full name" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        <div class="input-group mb-3">
          <input type="email" class="form-control" placeholder="Email" name="email" value="{{ old('email') }}" required autocomplete="email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>

        @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror

        <div class="input-group mb-3">
            <select name="country_id" class="form-control" required>
                <option value="">Select</option>
                @foreach($countries as $key=>$value)
                    <option value="{{$value->id}}" @if(old('country_id') == $value->id) Selected @endif>{{$value->name}}</option>
                @endforeach
            </select>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-flag"></span>
              </div>
            </div>
        </div>

        <div class="input-group mb-3">
        <input type="text" class="form-control" name="province" placeholder="Province" value="{{old('province')}}">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-map-marker"></span>
              </div>
            </div>
        </div>

        <div class="input-group mb-3">
            <input type="number" class="form-control" name="phone_no" placeholder="Phone No" value="{{old('phone_no')}}">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-phone"></span>
              </div>
            </div>
        </div>

        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Password" name="password" required autocomplete="new-password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="password_confirmation" required autocomplete="new-password" class="form-control" placeholder="Retype password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="agreeTerms" name="terms" value="agree">
              <label for="agreeTerms">
               I agree to the <a href="#">terms</a>
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Register</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

    <a href="{{route('login')}}" class="text-center">I already have a membership</a>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
@endsection



