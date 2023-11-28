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
  <link rel="stylesheet" href="{{ url('css/style.css') }}">
  <link rel="stylesheet" href="{{ url('plugins/select2/css/select2.min.css') }}">
  <link rel="stylesheet" href="{{ url('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
  />
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
    update();
    $('.select2').select2();
    $("#ngilang").click(function(){
      $("#sengiki").hide();
    });
      $("#iniklik").click(function(){
      window.location.reload();
    });
  });

  var refreshIntervalId = setInterval( "update()", 1000 );

  function update(){
    $.ajax({
      type: "GET",
      url: "{{ route('dashboard.respon') }}",
      success: function(data){
        if(data != "isi lagi"){
            clearInterval(refreshIntervalId);
            $("#id_pengguna").val(data.id);
            var isi = "<dl class='row'>\
                        <dt class='col-sm-4'>Nim</dt>\
                        <dd class='col-sm-8'>"+data.nim+"</dd>\
                        <dt class='col-sm-4'>Nama</dt>\
                        <dd class='col-sm-8'>"+data.nama+"</dd>\
                        <dt class='col-sm-4'>Notelp</dt>\
                        <dd class='col-sm-8'>"+data.nomor_telp+"</dd>\
                        <dt class='col-sm-4'>Keperluan</dt>\
                        <dd class='col-sm-8'>"+data.keperluan+"</dd>\
                              </dl>";
            $("#nungguAdmin").removeClass("d-flex");
            $("#nungguAdmin").addClass("d-none");
            $("#PinjamanBaru").removeClass("d-none");
            $("#PinjamanBaru #isi").html(isi);
            var url = '{{ route("dashboard.hapus", ":id") }}';
            url = url.replace(':id', data.id);
            $("#hapusbang").attr("href", url);
            // window.location.reload();
          }
        console.log(data);
      }
    });
        // 

  }

  function cekAlat() {
    var id = $("#tas").val();

    $.ajax({
        type:'POST',
        url: "{{ route('cekAlat') }}",
        data: {
          "_token": "{{ csrf_token() }}",
          "id": id
        },
        success: (response) => {
            $('input[name="isi[]"]').prop('checked', false);
          response.forEach(function (item, index) {
            $('input[name="isi[]"][value="'+item.alat+'"]').prop('checked', true);
          })
        }
   });
  }
</script>
@if ($message = Session::get('success'))
<script>
  $(function() {
    // $('.select2').select2();
    toastr.success("{{ $message }}");
  });
</script>
@endif
@if ($message = Session::get('error'))
<script>
  $(function() {
    // $('.select2').select2();
    toastr.error("{{ $message }}");
  });
</script>
@endif
</body>
</html>
