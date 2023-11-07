@extends('layout.layout')
@section('content')

<style type="text/css">
  u{
    color: red;
    text-decoration: none;
    font-weight: 800;
  }
</style>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
        </div>
    </div>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center text-secondary" style="font-size: 100px;">
                  <i class=" fas fa-user-circle"></i>
                </div>

                <h3 class="profile-username text-center">{{ $penggunalengkap->nama }}</h3>

                <p class="text-muted text-center">Peminjam</p>

                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>Nim</b> <a class="float-right">{{ $penggunalengkap->nim }}</a>
                  </li>
                  <li class="list-group-item">
                    <b>Meminjam Sebanyak</b> <a class="float-right">1,322</a>
                  </li>
                </ul>

                <!-- <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a> -->
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- About Me Box -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">kontak</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <strong><i class="fas fa-phone mr-1"></i> Nomor </strong>

                <p class="text-muted">
                	{{ $penggunalengkap->nomor_telp }}
                </p>

                <hr>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Activity</a></li>
                  <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Settings</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="activity">
                    <!-- Post -->
                  @forelse ($pengguna as $sis)
                    <div class="post" id="sengiki">
                      <div class="user-block">
                        <img class="img-circle img-bordered-sm" src="{{ url('img/blank.png') }}" alt="user image">
                        <!-- <i class="fas fa-user img-circle img-bordered-sm"></i> -->
                        <span class="username">
                          <a href="#">{{ $penggunalengkap->nama }}</a>
                          <a href="#" class="float-right btn-tool" id="ngilang"><i class="fas fa-times"></i></a>
                        </span>
                        <span class="description">Tanggal Pinjam {{ $penggunalengkap->created_at }}</span>
                      </div>
                      <!-- /.user-block -->
                      <p>
                        Saya Meminjam Sebuah <u>{{ $penggunalengkap->nama_alat}}</u> untuk {{ $penggunalengkap->keperluan }} di ruang {{ $penggunalengkap->nama_ruang }}
                      </p>
                    </div>
                    @empty

                    <!-- /.post -->
                  @endforelse

                  </div>

                  <!-- /.tab-pane -->

                  <div class="tab-pane" id="settings">
                  	<!-- tambah route disini -->
                    <form class="form-horizontal">
                      <div class="form-group row">
                        <label for="inputName2" class="col-sm-2 col-form-label">Nim</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="inputName2" placeholder="nim" value="{{$penggunalengkap->nim}}" disabled>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Nama</label>
                        <div class="col-sm-10">
                          <input type="email" class="form-control" id="inputName" placeholder="nama" value="{{$penggunalengkap->nama}}">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputEmail" class="col-sm-2 col-form-label">Nomor telephone</label>
                        <div class="col-sm-10">
                          <input type="email" class="form-control" id="inputEmail" placeholder="No. telp" value="{{$penggunalengkap->nomor_telp}}">
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <button type="submit" class="btn btn-primary">Ubah</button>
                          <button type="reset" class="btn btn-danger">batal</button>
                        </div>
                      </div>
                    </form>
                  </div>
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>




</div>
@endsection