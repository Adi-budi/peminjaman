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
                            <h3 class="card-title">Basic CRUD</h3>
                            <div class="card-tools">
                                <a href="{{ route('akun.create') }}" type="button" class="btn btn-tool btn-success btn-sm">Akun Baru</a>
                            </div>
                        </div>

                        <div class="card-body table-responsive p-0" style="height: 300px;">
                            <table class="table table-head-fixed text-nowrap">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nama</th>
                                        <th width="280px">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  @forelse ($accounts as $account)
                                    <tr>
                                        <td>{{ ++$i }}</td>
                                        <td>{{ $account->name }}</td>
                                        <td>
                                            <form action="{{ route('generate-pdf') }}" method="post">
                                                {{ @csrf_field() }}
                                                <input type="hidden" value="{{ $account->name }}" name="name">
                                                <button class="btn btn-primary">
                                                <i class="fas fa-download mr-2"></i>PDF
                                                </button>
                                            </form>
                                        </td>
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
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

@endsection
