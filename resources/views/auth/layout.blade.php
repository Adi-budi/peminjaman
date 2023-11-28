<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>KangLab </title>
  <link rel="icon" type="image/x-icon" href="{{ url('img/LOGO pusat teknologi pembelajaran.png') }}">
<!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" /> -->
<!-- Or for RTL support -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.rtl.min.css" />
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ url('plugins/fontawesome-free/css/all.min.css') }}">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{ url('plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ url('css/adminlte.min.css') }}">
  <link rel="stylesheet" href="{{ url('css/style.css') }}">

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
      overflow: hidden;
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
<script src="{{ url('js/script.js') }}"></script>
<!-- <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.0/dist/jquery.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script> -->
<script type="text/javascript">
  $(function() {
    $('.select2').select2();
    $("#ngilang").click(function(){
      $("#sengiki").hide();
    });
    $( '#prepend-button-multiple-field' ).select2( {
        theme: "bootstrap-5",
        width: $( this ).data( 'width' ) ? $( this ).data( 'width' ) : $( this ).hasClass( 'w-100' ) ? '100%' : 'style',
        placeholder: $( this ).data( 'placeholder' ),
        closeOnSelect: false,
    });

    $("#iniklik").click(function(){
      window.location.reload();
    });

    $("#pilih").click(function(){
      $("#input_serch").removeClass("d-none");
      $("#input_nim").addClass("d-none");
    });

    $("#nimInput").keyup(function(){
      if (this.value != "") {
        $("[aria-labelledby='nimInput']").show(); 
      }else{
        $("[aria-labelledby='nimInput']").hide(); 
      }
    })
  });

  var refreshIntervalId;

  $('#formPinjam').submit(function(e) {
        e.preventDefault();
       
        var url = $(this).attr("action");
        var data = $('#formPinjam').serialize();

        $.ajax({
                type:'POST',
                url: url,
                data: data,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: (response) => {
                    $("#nungguAdmin").removeClass("d-none");
                    $("#nungguAdmin").addClass("d-flex");
                    $("#formPinjam").hide();
                    refreshIntervalId = setInterval( "update()", 1000 );
                }
           });
    });

    function update(){
      $.ajax({
        type: "GET",
        url: "{{ route('dashboard.respon') }}",
        success: function(data){
          if(data == "isi lagi"){
            $("#nungguAdmin").removeClass("d-flex");
            $("#nungguAdmin").addClass("d-none");
            $("#formPinjam").show();
            $("#formPinjam")[0].reset();
            clearInterval(refreshIntervalId);
          }
        }
      });

    }

  $('#nim').change(function(){
    var id = $(this).val();
    var url = '{{ route("dashboard.getsemuadatapengguna", ":id") }}';
    url = url.replace(':id', id);

    $.ajax({
        url: url,
        type: 'get',
        dataType: 'json',
        success: function(response){
            if(response != null){
                $('#nama').val(response.nama);
                $('#nomor_telp').val(response.nomor_telp);
            }
        }
    });
      // // console.log(nim);
      // $.ajax({
      //       type:'POST',
      //       url: "{{ route('dashboard.getnim') }}",
      //       data: {"_token": "{{ csrf_token() }}", "nim":nim},
      //       success: (response) => {
      //         var html = '<a class="dropdown-item" href="#">'+response+'</a>';
      //         $(".autocomplete").append(html);
      //       }
      // });
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

