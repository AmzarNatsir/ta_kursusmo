<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Selamat Datang | Kursus Mobil AN-NAILAH</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets//dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition layout-top-nav">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
    <div class="container">
      <a href=".<?php echo base_url();?>" class="navbar-brand">
        <img src="<?php echo base_url();?>assets/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light">LEMBAGA KURSUS AN-NAILAH SOPPENG</span>
      </a>
    </div>
  </nav>
  <!-- /.navbar -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container">
                <div class="row mb-2">
                    <div class="col-sm-8">
                        <h1 class="m-0 text-dark"> SELAMAT DATANG</small></h1>
                    </div><!-- /.col -->
                    <div class="col-sm-4">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="<?php echo base_url();?>registrasi">Registrasi</a></li>
                            <li class="breadcrumb-item"><a href="<?php echo base_url();?>peserta">Login</a></li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- Main content -->
        <div class="content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="card card-primary card-outline">
                            <div class="card-body">
                                <h5 class="card-title">Profil</h5>
                                <p class="card-text">
                                Lembaga Kursus An-Nailah Soppeng beralamat di jalan Kayangan, Lalabatrilau, Lalabata, Kabupaten Soppeng
                                </p>
                            </div>
                        </div>
                        <div class="card card-primary card-outline">
                            <div class="card-body">
                                <h5 class="card-title">Instruktur</h5>
                                <table class="table table-bordered">
                                <thead>                  
                                    <tr>
                                    <th style="width: 5%">#</th>
                                    <th style="width: 10%">Photo</th>
                                    <th style="width: 45%">Nama Instruktur</th>
                                    <th style="width: 40%">Alamat/No.Telepon</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                $nom=1;
                                foreach($data_instruktur as $dt) {
                                ?>
                                    <tr>
                                        <td><?php echo $nom;?></td>
                                        <td><img src="<?php echo base_url()?>assets/upload/instruktur/<?php echo $dt['photo'] ?>" alt="produk" class="widget-image img-circle pull-left animation-fadeIn" style="width: 80px; height: 80px"></td>
                                        <td><?php echo $dt['nama_instruktur'];?></td>
                                        <td><?php echo $dt['alamat'];?>, <?php echo $dt['no_telepon'];?></td>
                                    </tr>
                                <?php
                                $nom++;
                                }
                                ?>  
                                </tbody>
                            </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="card card-primary card-outline">
                            <div class="card-body">
                                <h5 class="card-title">Paket</h5>
                                <table class="table" style="width: 100%;">
                                <?php
                                foreach($data_paket as $paket) { ?>
                                <tr>
                                    <td><strong><?php echo $paket['nama_paket'];?></strong><br>
                                    <?php echo $paket['deskripsi'];?><br>
                                    Mobil : <?php echo $paket['nama_mobil'];?>
                                    <strong><p style="text-align: right; color:blue">Rp. <?php echo number_format($paket['biaya'], 0, ",", ".");?></p></strong>
                                    </td>
                                </tr>
                                <?php } ?>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <a id="back-to-top" href="#" class="btn btn-primary back-to-top" role="button" aria-label="Scroll to top">
        <i class="fas fa-chevron-up"></i>
        </a>
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
        <!-- To the right -->
        <div class="float-right d-none d-sm-inline">
            Feri Randaka & Mardiansyah
        </div>
        <!-- Default to the left -->
        <strong>Copyright &copy; 2021</strong>
    </footer>
    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="<?php echo base_url();?>assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url();?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url();?>assets/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url();?>assets/dist/js/demo.js"></script>
</body>
</html>
