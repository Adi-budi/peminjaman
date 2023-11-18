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
          <div class="col-8">
            <div class="page-wrap flex-row align-items-center d-flex" id="nungguAdmin">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-12 text-center">
                            <b class="display-1 d-block"><i class="fa fa-bell-slash"></i></b>
                            <b class="mb-4 display-1">Belum Ada Pinjaman</b>
                        </div>
                    </div>
                </div>
            </div>

                    <div class="card card-olive d-none" id="PinjamanBaru">
                      <div class="card-header">
                        <h3 class="card-title">Pinjaman Baru</h3>
                      </div>
                      <div class="card-body">
                        <div id="isi"></div>
                        <form action="{{ route('dashboard.store_detail') }}" method="POST">
                          {{ @csrf_field() }}
                          <input type="hidden" name="id_pengguna" id="id_pengguna">
                          <div class="form-group">
                              <label for="id_tas">Tas</label>
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
                                          <label class="form-check-label" for="{{ $sis->nama }}">{{ $sis->nama }}</label>
                                      </div>
                                  @endforeach
                              </div>
                          </div>
                          <button type="submit" class="btn btn-info">Aprove *Gambar jempol ng kene*</button>
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
                              @if (!$sis->tgl_kembali)
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
            <div class="col-12">
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
        </div>
      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  @endsection