<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Layanan Telkom | {{$title}}</title>
  <link rel="icon" href="{{url('images/Icon_Telkom.png')}}" type="image/png">
@include('includes.style')
</head>
<body class="hold-transition layout-top-nav">
    <!-- Navbar -->
@include('includes.navbar1')
  <!-- /.navbar -->
  <div class="content-wrapper">
    <!-- Main content -->
    <div class="content">
      @yield('content')
    </div>
    <!-- /.content -->
  </div>
  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- Default to the left -->
    <strong>Copyright &copy; 2021 Muhammad Nur.</strong> All rights reserved.
  </footer>
</div>
<!-- ./wrapper -->

@include('includes.script')
@stack('script')
</body>
</html>