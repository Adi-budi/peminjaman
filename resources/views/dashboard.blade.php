@extends('layout.layout')
@section('content')

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard v2</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v2</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col">
            <div class="card card-warning">
              <div class="card-header">
                <h3 class="card-title">Catatan</h3>
              </div>
              <div class="card-body">
                <p>Peminjam Hari ini</p>
                <table class="table table-head-fixed text-nowrap">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama Peminjam</th>
                            <th class="col-4">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                      @forelse ($pengguna as $sis)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td><a href="{{url('pengguna/detail',['nim' => $sis->nim])}}" class="text-secondary">{{ $sis->nama }}</a></td>
                            @if ($sis->status =='0')
                                <td><span style="padding: 4px; background-color: red; border-radius:50px; color: white; font-size: 10px;">Belum Kembali</span></td>
                            
                            @else
                                <td><span style="padding: 5px; background-color: green; border-radius:50px; color: white; font-size: 10px;">Sudah Kembali</span></td>
                            @endif
                        </tr>
                      @empty
                        <tr>
                            <td colspan="3">kotong</td>
                        </tr>
                      @endforelse
                    </tbody>
                </table>
              </div>
            </div>
          </div>
            <div class="col-12 col-md-4">
              <div class="card card-success">
                <div class="card-header">
                  <h3 class="card-title">Info</h3>
                </div>
                <div class="card-body">
                  <h6>Total Penggunaan tiap tahun</h6>
                   <table class="table table-head-fixed text-nowrap">
                      <thead>
                          <tr>
                              <th>Tahun</th>
                              <th>Total</th>
                          </tr>
                      </thead>
                      <tbody>
                        @forelse ($totaltahun as $sis)
                        <tr>
                          <td>{{ $sis->tahun }}</td>
                          <td>{{ $sis->per }}</td>
                        </tr>
                        @empty
                        <tr>
                          <td>kotong</td>
                        </tr>
                        @endforelse
                      </tbody>
                    </table>
                </div>
              </div>
            </div>
        </div>
      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  @endsection