@extends('auth.layout')
@section('content')

<video autoplay muted loop id="myVideo">
  <source src="{{ url('videos\ocean.mp4') }}" type="video/mp4">
  Your browser does not support HTML5 video.
</video>

@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Error!</strong> <br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="login-box shadow w-100">
  <!-- /.login-logo -->
  <div class="row p-2">
    <div class="col-4">
        <div class="col">
            <section class="content">
                <div class="container-fluid">
                    <div class="card card-warning">
                      <div class="card-header">
                        <h3 class="card-title">Ojo Dihapus</h3>
                      </div>
                      <div class="card-body" style="height: 300px;">
                        <!-- <div class="d-none">
                            <label for="nim">Nim</label>
                            <div class="input-group mb-3">
                              <input type="text" class="form-control"  placeholder="Masukkan nim" aria-label="Recipient's username" aria-describedby="button-addon2" name="nim">
                              <button class="btn btn-outline-secondary" type="button" id="pilih" id="button-addon2"><i class="fas fa-search"></i></button>
                            </div>
                        </div> -->
                      </div>
                    </div> 
                </div>
            </section>           
        </div>
        <div class="col mt-2">
            <section class="content">
                <div class="container-fluid">
                    <div class="card card-olive">
                      <div class="card-header">
                        <h3 class="card-title">Peminjam Hari ini</h3>
                      </div>
                      <div class="card-body table-responsive p-0" style="height: 200px;">
                        <table class="table table-head-fixed text-wrap">
                            <thead>
                                <tr>
                                    <th class="col-9">Nama Peminjam</th>
                                    <th class="col-4">Status</th>

                                </tr>
                            </thead>
                            <tbody>
                              @forelse ($pengguna_selesai as $sisi)
                                <tr>
                                    @if ($sisi->tgl_kembali)
                                        <td>{{ $sisi->nama }}</td>
                                        <td class="text-success" title="sudah dikembalikan"><i class="fas fa-check-circle"></i></td>
                                    @else
                                        <td>{{ $sisi->nama }}</td>
                                        <td class="text-danger" title="belum dikembalikan"><i class="fas fa-times-circle"></i></td>
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
            </section>           
        </div>

    </div>
    <div class="col-6"> 
        <section class="content">
            <div class="container-fluid">
                <div class="card card-info">
                  <div class="card-header">
                    <h3 class="card-title">Input</h3>
            			<!-- <a class=" text-light float-end" href="{{ route('logout') }}" role="button">LOGIN</a> -->
                  </div>
                  <div class="card-body">
                    <div class="page-wrap flex-row align-items-center d-none" id="nungguAdmin">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-md-12 text-center">
                                    <span class="display-1 d-block">Tunggu Sebentar</span>
                                    <div class="mb-4 lead">menunggu diaprove admin</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <form action="{{ route('dashboard.store') }}" id="formPinjam" method="POST">
                                {{ @csrf_field() }}
                                    <div class="row justify-content-center">
                                        <div class="col-12">
                                            <div class="form-group" id="input_nim">
                                                <label for="nim" class="form-label">Nim</label>
                                                <input class="form-control" list="datalistOptions" id="nim" name="nim2" placeholder="Masukkan Nim">
                                                <datalist id="datalistOptions">
                                                    @foreach ($nim as $n)
                                                        <option value="{{$n->nim}}">{{$n->nama}}</option>
                                                    @endforeach
                                                </datalist>
                                            </div>
                                            <div class="form-group d-none" id="input_serch">
                                                <!-- <label for="nim">Nim</label> -->
                                                <div class="form-group">
                                                    <!-- <select id="nim" class="form-control select2"> -->
                                                      <option selected disabled hidden>Pilih</option>
                                                    @foreach ($pengguna as $soplist)
                                                      <option value="{{ $soplist->nim }}">{{ $soplist->nim }}</option>
                                                    @endforeach
                                                    <!-- </select> -->
                                                <!-- <input type="text" class="form-control" placeholder="nim" name="nim" autocomplete="off" required onkeyup="isi_otomatis()" 
                                                id="nimInput" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <div class="autocomplete" aria-labelledby="nimInput" id="isinim">
                                                </div> -->
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="nama">Nama</label>
                                                <input type="text" class="form-control" id="nama" placeholder="Nama lengkap anda" name="nama" autocomplete="off" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row justify-content-center">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="nomor_telp">Nomor Telepone</label>
                                                <input type="number" class="form-control" id="nomor_telp" placeholder="No telp / No wa Aktif" name="nomor_telp" autocomplete="off" required>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                          <div class="form-group">
                                              <label for="keperluan">Keperluan</label>
                                              <input type="text" class="form-control" id="keperluan" placeholder="keperluan" name="keperluan" autocomplete="off" required>
                                          </div>
                                        </div>
                                    </div>
                                    <div style="width:auto;">
                                      <div class="form-group">
                                          <label for="ruangan">Nama Ruangan</label>
                                          <select name="ruangan" class="form-control select2" required> 
                                              <option hidden selected disabled>Pilih</option>
                                              @forelse ($ruangan as $sis)
                                              <option value="{{ $sis->id }}">{{ $sis->nama_ruang }}</option>
                                              @empty
                                              <option disabled>kotong</option>
                                            @endforelse
                                          </select>
                                      </div>
                                    </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-info">Simpan</button>
                                    <button type="reset" class="btn btn-danger" id="iniklik">Refresh</button>
                                    <!-- <a href="{{ route('login') }}" class="text-secondary" style="float: right; margin-top:3px;">Login</a> -->
                                </div>
                            </form>
                  </div>
               </div>
            </div>
        </section>
    </div>
    <div class="col-2">
        <section class="content">
                <div class="container-fluid">
                    <div class="card card-olive">
                      <div class="card-header">
                        <h3 class="card-title">Barang yang tersedia</h3>
                      </div>
                      <div class="card-body table-responsive p-0" style="height: 420px; font-size: 12px;">
                        <table class="table table-head-fixed text-nowrap">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Nama barang</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td colspan="3">kotong</td>
                                </tr>
                              <!-- @forelse ($alat as $sis)
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $sis->nama }}</td>
                                </tr>
                              @empty -->
                              <!-- @endforelse -->
                            </tbody>
                        </table>
                      </div>
                    </div> 
                </div>
        </section>
    </div>
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->

@endsection
