<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin-Telkom | {{$title}} </title>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="apple-touch-icon" href="{{url('images/Icon_Telkom.png')}}">
  <link rel="shortcut icon" href="{{url('images/Icon_Telkom.png')}}">
  @include('includes.style')
</head>

<body class="hold-transition layout-top-nav">
<div class="wrapper">
  <!-- Navbar -->
  @include('includes.navbar')
  <!-- /.navbar -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="padding-top: 15px">
    <!-- Main content -->
    <div class="content">
      @yield('content')
    </div>
    <!-- /.content -->
  </div>
</div>
<!-- REQUIRED SCRIPTS -->
@include('includes.script')
</body>
@stack('script')
</html>
