<!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="<?php echo base_url();?>assets/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">CPanel</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?php echo base_url();?>assets/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Administrator</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="<?php echo base_url();?>" class="nav-link"><i class="nav-icon fas fa-tachometer-alt"></i><p>Dashboard</p></a>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link"><i class="nav-icon fas fa-edit"></i><p>Data Master<i class="right fas fa-angle-left"></i></p></a>
            <ul class="nav nav-treeview">
              <li class="nav-item"><a href="<?php echo base_url();?>master/data_mobil" class="nav-link"><i class="far fa-circle nav-icon"></i><p>Data Mobil</p></a></li>
              <li class="nav-item"><a href="#" class="nav-link"><i class="far fa-circle nav-icon"></i><p>Data Instruktur</p></a></li>
              <li class="nav-item"><a href="#" class="nav-link"><i class="far fa-circle nav-icon"></i><p>Data Peserta</p></a></li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link"><i class="nav-icon fas fa-calendar-alt"></i><p>Jadwal Kursus</p></a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link"><i class="nav-icon fa fa-money-check"></i><p>Pembayaran</p></a>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link"><i class="nav-icon fas fa-chart-pie"></i><p>Pelaporan<i class="right fas fa-angle-left"></i></p></a>
            <ul class="nav nav-treeview">
              <li class="nav-item"><a href="#" class="nav-link"><i class="far fa-circle nav-icon"></i><p>Laporan Data Peserta</p></a></li>
              <li class="nav-item"><a href="#" class="nav-link"><i class="far fa-circle nav-icon"></i><p>Laporan Pembayaran</p></a></li>
              <li class="nav-item"><a href="#" class="nav-link"><i class="far fa-circle nav-icon"></i><p>Laporan Data Instruktur</p></a></li>
              <li class="nav-item"><a href="#" class="nav-link"><i class="far fa-circle nav-icon"></i><p>Laporan Jadwal Kursus</p></a></li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url();?>login/logout" class="nav-link"><i class="nav-icon fas fa-times"></i><p>Logout</p></a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>