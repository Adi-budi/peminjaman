@extends('layout.layout')
@section('content')

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
<!-- /.col -->
          <div class="col-sm-6">
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-8">
            <div class="page-wrap flex-row align-items-center d-flex" id="nungguAdmin">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-12 text-center text-secondary">
                            <b class="display-1 d-block"><i class="fa fa-bell-slash"></i></b>
                            <b class="mb-4 display-1">Belum Ada Pinjaman</b>
                        </div>
                    </div>
                </div>
            </div>

                    <div class="card card-olive d-none animate__animated animate__bounceIn" id="PinjamanBaru">
                      <div class="card-header">
                        <h3 class="card-title">Pinjaman Baru</h3>
                      </div>
                      <div class="card-body">
                        <div id="isi"></div>
                        <form action="{{ route('dashboard.store_detail') }}" method="POST">
                          {{ @csrf_field() }}
                          <input type="hidden" name="id_pengguna" id="id_pengguna">
                          <div class="form-group">
                              <label>Tas</label>
                              <select name="id_tas" id="tas" class="form-control select2" required onchange="cekAlat()"> 
                                  <option hidden selected disabled>Pilih</option>
                                  @forelse ($tas as $sis)
                                    <option value="{{ $sis->id }}">{{ $sis->label }}</option>
                                  @empty
                                    <option disabled>kotong</option>
                                  @endforelse
                              </select>
                          </div> 
                          <div class="form-group">
                              <label>Isi Tas</label>
                              <div class="row">
                                  @foreach ($alat as $sis)
                                      <div class="form-check col-3">
                                          <input type="checkbox" class="form-check-input" id="{{ $sis->nama }}" name="isi[]" value="{{ $sis->id }}">
                                          <div class="d-inline">
                                            <span class="badge badge-warning" style="font-size:8px;">{{ $sis->jumlah }}</span>
                                            <label class="form-check-label" title="Tersisa {{ $sis->jumlah }} buah {{ $sis->nama }}">{{ $sis->nama }}</label>
                                          </div>
                                      </div>
                                  @endforeach
                              </div>
                          </div>
                          <button type="submit" class="btn btn-info">Aprove <i class="fas fa-check"></i></button>
                          <a href="" class="btn btn-danger" id="hapusbang"><i class="fas fa-times"></i></a>
                        </form>                       
                      </div>
                    </div> 
          </div>
          <div class="col-4">
            <div class="col-12">
              <div class="card card-warning">
                <div class="card-header">
                  <h3 class="card-title">Catatan</h3>
                </div>
                <div class="card-body">
                  <p>Peminjam Hari ini</p>
                  <div class="card-body table-responsive p-0" style="height: 200px;">
                    <table class="table table-head-fixed text-wrap">
                        <thead>
                            <tr>
                                <th>Status</th>
                                <th>Nama Peminjam</th>
                            </tr>
                        </thead>
                        <tbody>
                          @forelse ($pengguna as $sis)
                            <tr>
                                @if ($sis->tgl_kembali)
                                    <td class="text-success" title="sudah dikembalikan"><i class="fas fa-check-circle"></i></td>
                                @else
                                    <td class="text-danger" title="belum dikembalikan"><i class="fas fa-times-circle"></i></td>
                                @endif
                                <td><a href="{{url('pengguna/detail',['nim' => $sis->nim])}}" class="text-secondary">{{ $sis->nama }}</a></td>
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
            </div>
            <div class="col-12">
              <div class="card card-success">
                <div class="card-header">
                  <h3 class="card-title">Info</h3>
                </div>
                <div class="card-body table-responsive">
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
        </div>
      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  @endsection