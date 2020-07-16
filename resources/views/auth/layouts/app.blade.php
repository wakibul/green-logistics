<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  @yield('title')
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('public/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{asset('public/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('public/dist/css/adminlte.min.css')}}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <style>
.login-page, .register-page{
    height: auto !important;
}

  </style>
  @yield('css')

</head>
<body class="hold-transition login-page">
    <div class="container">
        <nav class="navbar navbar-default">
          <div class="container-fluid">
            <div class="navbar-header">

              <a class="navbar-brand" href="#"><img src="{{asset('public/images/logo.png')}}" alt="Green Logistics">
              </a>
            </div>

            <!--/.nav-collapse -->
          </div>
          <!--/.container-fluid -->
        </nav>
      </div>
@yield('content')

<script src="{{asset('public/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('public/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('public/dist/js/adminlte.min.js')}}"></script>
@yield('js')
</body>
</html>
