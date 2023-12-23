@extends('layout.layout')
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Peminjaman</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard2') }}">Home</a></li>
                        <li class="breadcrumb-item active">Peminjaman</li>
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
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Pengguna</h3>
                                <h3 class="card-title ml-5">
                                    <div class="input-group mb-3 d-none" id="tahun">
                                       <form action="{{ route('pengguna.exportByTahun') }}" method="POST">
                                        {{ @csrf_field() }}
                                        <div class="d-flex">
                                            <select name="tahun" class="form-control select2">
                                                    <option hidden selected disabled>Pilih</option>
                                                    @forelse ($tahun as $sis)
                                                    <option value="{{ $sis->year }}">{{ $sis->year }}</option>
                                                    @empty
                                                    <option disabled>kotong</option>
                                                  @endforelse
                                            </select>&nbsp;&nbsp;&nbsp;
                                          <button class="btn btn-success btn-sm" type="submit">Ambil data</button>
                                        </div>
                                        </form>
                                    </div>
                                    <form action="{{ route('pengguna.exportByHari') }}" method="get">
                                    <div class="input-group mb-3 d-none" id="hari">
                                        {{ @csrf_field() }}
                                      <input type="date" class="form-control" aria-label="Username" name="date1">
                                      <span class="input-group-text">s/d</span>
                                      <input type="date" class="form-control" aria-label="Server" name="date2">
                                      &nbsp;&nbsp;&nbsp;
                                      <button class="btn btn-success btn-sm" type="submit">Ambil data</button>
                                    </div>
                                    </form>
                                </h3>
                                <div class="card-tools">
                                    <div class="form-group d-flex">
                                        <div class="input-group">
                                            <!-- Gawe Input tanggal -->
                                        </div>
                                    </div>
                                    <div class="btn-group mx-2" id="menu">
                                      <a href="{{ route('pengguna.exportAll') }}" type="button" class="btn btn-success btn-sm">Export &nbsp; <i class="fas fa-download"></i></a>
                                      <button type="button" class="btn btn-success btn-sm dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <span class="sr-only">Toggle Dropdown</span>
                                      </button>
                                      <div class="dropdown-menu">
                                        <a class="dropdown-item" href="#" id="harian">Harian</a>
                                        <a class="dropdown-item" href="#" id="tahunan">Tahunan</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="{{ route('pengguna.exportAll') }}">Export Semua</a>
                                      </div>
                                    </div>
                                    <a class="text-secondary" style="font-size:12px;">Format Excel</a>
                                </div>
                            </div>

                            <div class="card-body table-responsive p-0" style="height: 400px;">
                                <table class="table table-head-fixed text-nowrap table-hover">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Nama Peminjam</th>
                                            <th>Tempat</th>
                                            <th class="col-2">Status</th>
                                            <th class="col-2"><center>Aksi untuk status</center></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      @forelse ($pengguna2 as $sis)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            <td ><a href="{{url('pengguna/detail',['nim' => $sis->nim])}}" class="text-secondary">{{ $sis->nama }}</a></td>
                                            <td>{{ $sis->nama_ruang}}</td>
                                            @if (!$sis->tgl_kembali)
                                                <!-- <td><span style="padding: 4px; background-color: red; border-radius:50px; color: white; font-size: 10px;">Belum Kembali</span></td> -->
                                                <td class="text-danger col-2" title="belum dikembalikan"><i class="fas fa-times-circle"></i></td>
                                            
                                                <td style="font-size: 10px;">
                                                    <a href="{{ url('pengguna/ubahstatus1',['id' => $sis->id,'id1' => $sis->id_tas]) }}" class="text-light bg-success" style="padding: 6px; border-radius:30px;" title="klik untuk mengubah">Sudah kembali</a> &nbsp;&nbsp;&nbsp;
                                                    <a href="{{ url('pengguna/ubahstatus0',['id' => $sis->id,'id1' => $sis->id_tas]) }}" class="text-light bg-danger" style="padding: 6px;border-radius:30px;" title="klik untuk mengubah">Belum kembali</a></td>
                                            @else
                                                <!-- <td><span style="padding: 5px; background-color: green; border-radius:50px; color: white; font-size: 10px;">Sudah Kembali</span></td> -->
                                                <td class="text-success col-2" title="sudah dikembalikan"><i class="fas fa-check-circle"></i></td>
                                                <td style="font-size: 10px;">
                                                    <a href="{{ url('pengguna/ubahstatus1',['id' => $sis->id,'id1' => $sis->id_tas]) }}" class="text-light bg-success" style="padding: 6px; border-radius:30px;" title="klik untuk mengubah">Sudah kembali</a> &nbsp;&nbsp;&nbsp;
                                                    <a href="{{ url('pengguna/ubahstatus0',['id' => $sis->id,'id1' => $sis->id_tas]) }}" class="text-light bg-danger" style="padding: 6px;border-radius:30px;" title="klik untuk mengubah">Belum kembali</a>
                                                </td>
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
                </div>
            </div>
            <!--/. container-fluid -->
        </section>
    </div>
    <!-- /row -->
</div>
<!-- /.content-wrapper -->

@endsection
