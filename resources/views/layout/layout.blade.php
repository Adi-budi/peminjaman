<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>LAB</title>
  <link rel="icon" type="image/x-icon" href="{{ url('img/LOGO pusat teknologi pembelajaran.png') }}">

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{ url('plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Toastr -->
  <link rel="stylesheet" href="{{ url('plugins/toastr/toastr.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ url('css/adminlte.min.css') }}">
  <link rel="stylesheet" href="{{ url('plugins/select2/css/select2.min.css') }}">
  <link rel="stylesheet" href="{{ url('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
</head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">

    @include('layout.loading')

    @include('layout.navbar')

    @include('layout.sidebar')

    @yield('content')

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-light" style="background-color: #1b263b;">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

    @include('layout.footer')
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{ url('plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ url('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- Toastr -->
<script src="{{ url('plugins/toastr/toastr.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ url('js/adminlte.min.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ url('js/demo.js') }}"></script>
<script src="{{ url('plugins/select2/js/select2.full.min.js') }}"></script>

<!-- Page specific script -->
<script type="text/javascript">
  $(function() {
    $('.select2').select2();
    $("#ngilang").click(function(){
      $("#sengiki").hide();
    });
  });
  
</script>
@if ($message = Session::get('success'))
<script>
  $(function() {
    // $('.select2').select2();
    toastr.success("{{ $message }}");
  });
</script>
@endif
</body>
</html>
