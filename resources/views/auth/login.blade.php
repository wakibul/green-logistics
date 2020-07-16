@extends('auth.layouts.app')
@section('title')
<title>{{env('APP_NAME')}} | Login</title>
@endsection
@section('content')
<div class="login-box">
  <div class="login-logo">
    <a href="javascript:void(0)"><b>Green</b>Logistics</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Sign in to start your session</p>

      <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="input-group mb-3">
          <input type="email" name="email" class="form-control" placeholder="Email" required value="{{ old('email') }}" autofocus>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
          @error('email')
            <span class="alert alert-danger" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Password" name="password" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
          @error('password')
                <strong>{{ $message }}</strong>
          @enderror
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Remember Me
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary  btn-block">
                {{ __('Login') }}
            </button>
          </div>
          <!-- /.col -->
        </div>
      </form>



      <p class="mb-1">
        {{-- <a href="#">I forgot my password</a><br> --}}
        <a href="{{route('register')}}" class="">Create a new account</a>
      </p>

    </div>
    <!-- /.login-card-body -->
  </div>
</div>
@endsection
