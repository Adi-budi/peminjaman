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
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Barang</h3>
                                <div class="card-tools">
                                    <a href="{{ route('tas.create') }}" type="button" class="btn btn-success btn-sm">Tambah Barang</a>
                                </div>
                            </div>

                            <div class="card-body table-responsive p-0" style="height: 300px;">
                                <table class="table table-head-fixed text-nowrap">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>label</th>
                                            <th>Isi</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      @forelse ($tas as $sis)
                                        <tr>
                                            <td>{{ $sis->id }}</td>
                                            <td><a href="{{url('alat/detail',['id' => $sis->id])}}" class="text-secondary">{{ $sis->label }}</a></td>
                                            <td>
                                                <?php
                                                    for ($i=0; $i < count($detail); $i++) { 
                                                        if($detail[$i]->tas == $sis->id){
                                                            echo $detail[$i]->nama.", ";
                                                        }
                                                    }
                                                ?>
                                            </td>
                                            <td><a href="" class="btn btn-primary">Edit</a></td>
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
