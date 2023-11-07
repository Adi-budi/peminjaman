    <!-- Main Sidebar Container -->
    <style type="text/css">
      .bbb{
        color: white;
      }
    </style>
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('dashboard2') }}" class="brand-link">
      <img src="{{ url('img/LOGO pusat teknologi pembelajaran.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Penggunaan</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar" style="background-color: #1b263b;">
      <!-- Sidebar user (optional) -->
<!--       <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image"> 
          <img src="/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Alexander Pierce</a>
        </div>
      </div> -->

      <!-- SidebarSearch Form -->
      <div class="form-inline mt-3">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="{{ route('ruangan') }}" class="nav-link {{ (request()->is('ruangan*')) ? 'active' : '' }}">
              <i class="fas fa-home "></i> &nbsp;&nbsp;&nbsp;&nbsp;
              <p class="">
                Ruangan
                <!-- <span class="right "><i class="fas fa-info-circle"></i></span> -->
              </p>
            </a>
          </li>
          <li class="nav-item {{ (request()->is('pengguna*')) ? 'menu-open' : '' }}">
            <a href="#" class="nav-link {{ (request()->is('pengguna*')) ? 'active' : '' }}">
              <i class="fas fa-users "></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <p class="">
                Penggunaan
                <i class="right fas fa-angle-left "></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('pengguna.create') }}" class="nav-link {{ (request()->is('pengguna/create')) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Tambah pengguna</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('pengguna') }}" class="nav-link 
                  {{ (request()->is('pengguna')) ? 'active' : ((request()->is('pengguna/detail*')) ? 'active' : '')}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Tabel data pengguna</p>
                </a>
              </li>
            </ul>
          </li>
          <!-- Menu guru -->
          <!-- <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="fas fa-user-tie "></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <p class="">
                Menu guru
                <i class="right fas fa-angle-left "></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Tambah data guru</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Tabel data guru</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="fas fa-toolbox "></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <p class="">
               Alat Bantu
                <i class="right fas fa-angle-left "></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('akun.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>CRUD</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('user.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Join Table</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('gallery') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Upload Gambar</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('excel') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Import/export Excel</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('pdf') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>PDF maker</p>
                </a>
              </li>
            </ul>
          </li> -->
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
 