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
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
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
                                <div class="card-tools">
                                    <a href="{{ route('pengguna.create') }}" type="button" class="btn btn-success btn-sm">Tambah Pengguna</a>
                                </div>
                            </div>

                            <div class="card-body table-responsive p-0" style="height: 300px;">
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
                                            <td><a href="{{url('pengguna/detail',['nim' => $sis->nim])}}" class="text-secondary">{{ $sis->nama }}</a></td>
                                            <td>{{ $sis->nama_ruang}}</td>
                                            @if (!$sis->tgl_kembali)
                                                <td><span style="padding: 4px; background-color: red; border-radius:50px; color: white; font-size: 10px;">Belum Kembali</span></td>
                                            
                                                <td style="font-size: 10px;">
                                                    <a href="{{ url('pengguna/ubahstatus1',['id' => $sis->id]) }}" class="text-light bg-success" style="padding: 6px; border-radius:30px;" title="klik untuk mengubah">Sudah kembali</a> &nbsp;&nbsp;&nbsp;
                                                    <a href="{{ url('pengguna/ubahstatus0',['id' => $sis->id]) }}" class="text-light bg-danger" style="padding: 6px;border-radius:30px;" title="klik untuk mengubah">Belum kembali</a></td>
                                            @else
                                                <td><span style="padding: 5px; background-color: green; border-radius:50px; color: white; font-size: 10px;">Sudah Kembali</span></td>
                                                <td style="font-size: 10px;">
                                                    <a href="{{ url('pengguna/ubahstatus1',['id' => $sis->id]) }}" class="text-light bg-success" style="padding: 6px; border-radius:30px;" title="klik untuk mengubah">Sudah kembali</a> &nbsp;&nbsp;&nbsp;
                                                    <a href="{{ url('pengguna/ubahstatus0',['id' => $sis->id]) }}" class="text-light bg-danger" style="padding: 6px;border-radius:30px;" title="klik untuk mengubah">Belum kembali</a>
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
