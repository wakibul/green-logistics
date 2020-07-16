<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Green Logistics</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  @include('user.layouts.css')
  @yield('css')
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  @include('user.layouts.top_nav')
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->

  @include('user.layouts.sidebar')

  <!-- Content Wrapper. Contains page content -->
    @yield('content')
  <!-- /.content-wrapper -->
  @include('user.layouts.footer')

</div>
<!-- ./wrapper -->

@include('user.layouts.js')
@yield('js')
</body>
</html>
