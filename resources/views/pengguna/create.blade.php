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
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">

                <div class="col-md-12">

                    <div class="card card-success">
                        <div class="card-header">
                            <h3 class="card-title">Tambah</h3>
                        </div>

                        <form action="{{ route('pengguna.store') }}" method="POST">
                            {{ @csrf_field() }}
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="nim">Nim</label>
                                            <input type="number" class="form-control" id="nim" placeholder="nim" name="nim">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="nama">Nama</label>
                                            <input type="text" class="form-control" id="nama" placeholder="Nama lengkap anda" name="nama">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="nomor_telp">Nomor Telepone</label>
                                            <input type="number" class="form-control" id="nomor_telp" placeholder="No telp / No wa Aktif" name="nomor_telp">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="keperluan">Keperluan</label>
                                    <input type="text" class="form-control" id="keperluan" placeholder="keperluan" name="keperluan">
                                </div>
                                <div class="row">
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label for="alat">Barang</label>
                                            <select name="alat" class="form-control select2" >
                                                <option hidden selected disabled>Pilih Barang</option>
                                                @forelse ($alat as $sis)
                                                <option value="{{ $sis->id }}">{{ $sis->label }}</option>
                                                @empty
                                                <option disabled>kotong</option>
                                              @endforelse
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label for="ruangan">Nama Ruangan</label>
                                            <select name="ruangan" class="form-control select2">
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
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </form>
                    </div>

                </div>

            </div>
        </div>
        <!--/. container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection
