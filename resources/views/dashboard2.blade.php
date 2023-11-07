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
                        <h3 class="card-title">Belum mengembalikan barang</h3>
                      </div>
                      <div class="card-body table-responsive p-0" style="height: 300px;">
                        <table class="table table-head-fixed text-wrap">
                            <thead>
                                <tr>
                                    <th>Status</th>
                                    <th class="col-9">Nama Peminjam</th>
                                    <th class="col-4">Aksi</th>

                                </tr>
                            </thead>
                            <tbody>
                              @forelse ($pengguna as $sisi)
                                <tr>
                                    <td class="text-danger" title="belum dikembalikan"><i class="fas fa-times-circle"></i></td>
                                    <td>{{ $sisi->nama }}</td>
                                    <td><a href="{{ url('ubahstatus1',['id' => $sisi->id, 'id1' => $sisi->alat]) }}" class="text-light bg-success" style="padding: 8px; border-radius:100px; font-size: 13px;" title="klik untuk mengubah">Sudah</a></td>
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
                                    @if ($sisi->status =='1')
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
                    <form action="{{ route('dashboard.store') }}" method="POST">
                                {{ @csrf_field() }}
                                    <div class="row justify-content-center">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="nim">Nim</label>
                                                <input type="number" class="form-control" id="nim" placeholder="nim" name="nim" autocomplete="off" required>
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
                                    <div class="row justify-content-center">
                                        <div class="col-12">
                                          <div class="row">
                                            <div class="col-12 col-md-6 p-1">
                                              <div class="form-group">
                                                  <label for="alat">Barang</label>
                                                  <select name="alat" class="form-control select2" required>
                                                      <option hidden selected disabled>Pilih Barang</option>
                                                      @forelse ($alat as $sis)
                                                      <option value="{{ $sis->id }}">{{ $sis->nama }}</option>
                                                      @empty
                                                      <option disabled>kotong</option>
                                                    @endforelse
                                                  </select>
                                              </div>
                                            </div>
                                            <div class="col-12 col-md-6 p-1">
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
                                          </div>
                                        </div>
                                    </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-info">Simpan</button>
                                    <a href="{{ route('login') }}" class="text-secondary" style="float: right; margin-top:3px;">Login</a>
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
                      <div class="card-body table-responsive p-0" style="height: 420px;">
                        <table class="table table-head-fixed text-nowrap">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Nama barang</th>

                                </tr>
                            </thead>
                            <tbody>
                              @forelse ($alat as $sis)
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $sis->nama }}</td>
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
  <!-- /.card -->
</div>
<!-- /.login-box -->

@endsection