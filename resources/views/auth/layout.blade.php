<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>KangLab </title>
  <link rel="icon" type="image/x-icon" href="{{ url('img/LOGO pusat teknologi pembelajaran.png') }}">

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ url('plugins/fontawesome-free/css/all.min.css') }}">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{ url('plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ url('css/adminlte.min.css') }}">

  <link rel="stylesheet" href="{{ url('plugins/toastr/toastr.min.css') }}">

  <link rel="stylesheet" href="{{ url('plugins/select2/css/select2.min.css') }}">
  
  <link rel="stylesheet" href="{{ url('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">

  <style>
    * {
      box-sizing: border-box;
    }

    body {
      margin: 0;
      font-family: Arial;
      font-size: 17px;
    }

    #myVideo {
      position: fixed;
      right: 0;
      bottom: 0;
      min-width: 100%; 
      min-height: 100%;
    }
  </style>
</head>
<body class="hold-transition login-page">

@include('layout.loading')

@yield('content')

<!-- jQuery -->

<script src="{{ url('plugins/jquery/jquery.min.js') }}"></script>

<!-- Bootstrap 4 -->
<script src="{{ url('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ url('js/adminlte.min.js') }}"></script>

<script src="{{ url('plugins/toastr/toastr.min.js') }}"></script>

<script src="{{ url('plugins/select2/js/select2.full.min.js') }}"></script>

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

