<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Selamat Datang | Kursus Mobil AN NAILAH</title>
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
                            <li class="breadcrumb-item"><a href="<?php echo base_url();?>peserta/logout_peserta">Logout</a></li>
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
                                <h5 class="card-title">Biodata Anda</h5>
                                <p class="card-text">
                                <table class="table" style="width: 100%;">
                                <tr>
                                    <td style="width: 40%;">Nama</td>
                                    <td>: <?php echo $profil->nama_lengkap;?></td>
                                </tr>
                                <tr>
                                    <td>No. Identitas</td>
                                    <td>: <?php echo $profil->no_identitas;?></td>
                                </tr>
                                <tr>
                                    <td>Tempat/Tanggal Lahir</td>
                                    <td>: <?php echo $profil->tempat_lahir;?>/ <?php echo $profil->tanggal_lahir;?></td>
                                </tr>
                                <tr>
                                    <td>Jenis Kelamin</td>
                                    <td>: <?php echo ($profil->jenkel==1)?"Laki-Laki":"Perempuan";?></td>
                                </tr>
                                <tr>
                                    <td>Alamat/No. Telepon</td>
                                    <td>: <?php echo $profil->alamat;?>/ <?php echo $profil->no_telepon;?></td>
                                </tr>
                                <tr>
                                    <td>Photo</td>
                                    <td> 
                                    <?php if(empty($profil->file_photo)) {
                                        echo ": Anda belum mengupload photo.";
                                    } else { ?>
                                        <img id="preview_photo" style="width: 50%; height: auto;" src="<?php echo base_url() ?>assets/upload/peserta/<?php echo $profil->file_photo; ?>">
                                    <?php } ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Kartu Identitas/KTP</td>
                                    <td>
                                    <?php if(empty($profil->file_ktp)) {
                                        echo ": Anda belum mengupload Kartu Identitas (KTP).";
                                    } else { ?>
                                        <img id="preview_ktp" style="width: 50%; height: auto;" src="<?php echo base_url() ?>assets/upload/peserta/<?php echo $profil->file_ktp; ?>">
                                    <?php }?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Surat Izin Mengemudi</td>
                                    <td>
                                    <?php if(empty($profil->file_sim)) {
                                        echo ": Anda belum mengupload Surat Izin Mengemudi (SIM).";
                                    } else { ?>
                                        <img id="preview_photo" style="width: 50%; height: auto;" src="<?php echo base_url() ?>assets/upload/peserta/<?php echo $profil->file_photo; ?>">
                                    <?php }?>
                                    </td>
                                </tr>
                                <tr>
                                <td colspan="2">
                                <button class="btn btn-primary tbl_biodata" data-toggle="modal" data-target="#modal-dokumen" id="<?php echo $profil->id;?>" name="tbl_biodata"><i class="fa fa-paperclip"></i> Lengkapi Data Anda</button>
                                <br><span>* Abaikan jika dokumen anda sudah lengkap..</span>
                                </td>
                                </tr>
                                </table>
                                </p>
                            </div>
                        </div>
                        <div class="card card-primary card-outline">
                            <div class="card-body">
                                <h5 class="card-title">Cara Pembayaran</h5>
                                <br>
                                <hr>
                                <p class="card-text">
                                - Lengkapi Biodata Anda<br>
                                - Upload KTP<br>
                                - Pilih paket kursus<br>
                                - Setelah memilih paket, pengajuan anda akan diverifikasi oleh admin<br>
                                - Jika pengajuan/pendaftaran anda disetujui, bayar biaya kursus dengan cara transfer ke No.Rekening 0867xxxxxx.<br>
                                - Upload bukti transfer.<br>
                                - Jadwal Kursus akan ditampilkan di dashboard anda.
                                </p>
                            </div>
                        </div>
                    </div>
                    <?php 
                    if(count($data_pendaftaran)==0) { ?>
                    <div class="col-lg-6">
                        <div class="card card-primary card-outline">
                            <div class="card-body">
                                <h5 class="card-title">Silahkan Pilih Paket Dibawah ini</h5>
                                <table class="table" style="width: 100%;">
                                <?php
                                foreach($data_paket as $paket) { ?>
                                <tr>
                                    <td><strong><?php echo $paket['nama_paket'];?></strong><br>
                                    <?php echo $paket['deskripsi'];?><br>
                                    Mobil : <?php echo $paket['nama_mobil'];?>
                                    <strong><p style="text-align: right; color:blue">Rp. <?php echo number_format($paket['biaya'], 0, ",", ".");?></p></strong>
                                    <button class="btn btn-primary tbl_paket" data-toggle="modal" data-target="#modal-paket" id="<?php echo $paket['id'];?>" name="tbl_paket"><i class="fa fa-check"></i> Pilih Paket</button>
                                    </td>
                                </tr>
                                <?php } ?>
                                </table>
                            </div>
                        </div>
                    </div>
                    <?php } else { ?>
                    <div class="col-lg-6">
                        <div class="card card-primary card-outline">
                            <div class="card-body">
                                <h5 class="card-title">Timelien Proses Pendaftaran Anda</h5>
                            </div>
                            <div class="card-body">
                                <div class="timeline">
                                    <!-- timeline time label -->
                                    <?php 
                                    foreach($data_pendaftaran as $dt) {?>
                                    <div class="time-label">
                                        <span class="bg-red">No. <?php echo $dt['no_pendaftaran'];?> | <?php echo date_format(date_create($dt['tgl_daftar']), "d M Y");?></span>
                                    </div>
                                    <!-- /.timeline-label -->
                                    <!-- timeline item -->
                                    <div>
                                        <i class="fas fa-user bg-blue"></i>
                                        <div class="timeline-item">
                                            <h3 class="timeline-header"><a href="#">Paket Yang Anda Pilih</a></h3>
                                            <div class="timeline-body">
                                                - <?php echo $dt['nama_paket'];?><br>
                                                - <?php echo $dt['nama_mobil'];?><br>
                                                - Biaya Rp. <?php echo number_format($dt['biaya'], 0, ",", ".");?><br>
                                                - Lama belajar <?php echo $dt['jumlah_hari'];?> hari
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <i class="fas fa-check bg-success"></i>
                                        <div class="timeline-item">
                                            <h3 class="timeline-header"><a href="#">Proses Persetujuan</a></h3>
                                            <div class="timeline-body">
                                                <?php if($dt['status_daftar']==1) {
                                                    echo "Pengajuan Pendaftaran Anda Belum Diproses.";
                                                } elseif ($dt['status_daftar']==2) { 
                                                    echo $dt['keterangan'];   
                                                } else {
                                                    echo $dt['keterangan'];
                                                }?>
                                            </div>
                                        </div>
                                    </div>
                                    <?php if($dt['status_daftar']==2) { ?>
                                    <div>
                                        <i class="fas fa-money bg-danger">Rp</i>
                                        <div class="timeline-item">
                                            <h3 class="timeline-header"><a href="#">Pembayaran</a></h3>
                                            <div class="timeline-body">
                                            <?php if(empty($dt['file_invoice'])) { ?>
                                                <form role="form" enctype="multipart/form-data" method="post" action="<?php echo base_url();?>peserta/upload_bukti_pembayaran" onsubmit="return konfirm()">
                                                <input type="hidden" name="id_daftar" value="<?php echo $dt['id'];?>">
                                                <div class="form-group">
                                                    <label for="inp_nama">Upload Bukti Pembayaran Anda</label>
                                                    <div class="col-sm-12">
                                                        <input type="file" name="inp_invoice" id="inp_invoice" class="form-control" onchange="loadFile_file(this)" required>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-sm-12" style="text-align: center;">
                                                                <img id="preview_file" style="width: 50%; height: auto;" src="<?php echo base_url() ?>assets/upload/peserta/no_image_available.png">
                                                    </div>
                                                </div>
                                                <div class="modal-footer justify-content-between">
                                                    <button type="submit" class="btn btn-primary">Upload</button>
                                                </div>
                                                </form>
                                            </div>
                                            <?php } else { ?>
                                                <div class="form-group row">
                                                    <div class="col-sm-12" style="text-align: center;">
                                                                <img id="bukti_pembayaran" style="width: 50%; height: auto;" src="<?php echo base_url() ?>assets/upload/peserta/<?php echo $dt['file_invoice']; ?>">
                                                    </div>
                                                </div>
                                            <?php } ?>
                                        </div>
                                    </div>
                                    <?php } ?>
                                    <?php if($dt['status_daftar']==5) { 
                                        $res_jadwal = $this->model_peserta->get_jadwal_peserta_per_peserta($dt['id']); ?>
                                    <div>
                                        <i class="fas fa-calendar bg-info"></i>
                                        <div class="timeline-item">
                                            <h3 class="timeline-header"><a href="#">Jadwal Kursus</a></h3>
                                            <div class="timeline-body">
                                                <table class="table" style="width: 100%;">
                                                <option>Nama Instruktur : <?php echo $res_jadwal->nama_instruktur;?></option>
                                                <tr>
                                                    <td>Jam</td>
                                                    <td>Hari</td>
                                                </tr>
                                                <tr>
                                                    <td><?php echo $res_jadwal->jam;?></td>
                                                    <td><?php echo $res_jadwal->hari;?></td>
                                                </tr>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <?php } ?>
                                   
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
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
<script>
    $(document).ready(function(){
        $(".tbl_biodata").on("click", function()
        {
            var id_data = this.id;
            $("#frm_biodata").load("<?php echo base_url();?>peserta/frm_dokumen");
        });
        $(".tbl_paket").on("click", function()
        {
            var id_data = this.id;
            $("#frm_paket").load("<?php echo base_url();?>peserta/frm_pilih_paket/"+id_data);
        });
    });
    var _validFileExtensions = [".jpg", ".jpeg", ".png"];  
var loadFile_file = function(oInput) {
if (oInput.type == "file") {
    var sFileName = oInput.value;
    var sSizeFile = oInput.files[0].size;
    var output = document.getElementById('preview_file');
    //alert(sSizeFile);
    if (sFileName.length > 0) {
        var blnValid = false;
        for (var j = 0; j < _validFileExtensions.length; j++) {
            var sCurExtension = _validFileExtensions[j];
            if (sFileName.substr(sFileName.length - sCurExtension.length, sCurExtension.length).toLowerCase() == sCurExtension.toLowerCase()) {
                blnValid = true;
                break;
            }
        }
        
        if (!blnValid) {
            alert("Maaf, " + sFileName + " tidak valid, jenis file yang boleh di upload adalah: " + _validFileExtensions.join(", "));
            oInput.value = "";
            output.src = "";
            return false;
        } 
        if(sSizeFile>500000) //50 KB
        {
            alert("Maaf, " + sFileName + " tidak valid, Ukuran file terlalu besar: " + sSizeFile);
            oInput.value = "";
            output.src = "";
            return false;
        } else {
            
            output.src = URL.createObjectURL(oInput.files[0]);
        }
    }
    
}
return true;

}; 
</script>
</body>
</html>
<div class="modal fade" id="modal-dokumen" data-backdrop="false">
    <div class="modal-dialog">
        <div class="modal-content bg-primary">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Data</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
            </div>
            <div id="frm_biodata"></div>
        </div>
    </div>
</div>
<div class="modal fade" id="modal-paket" data-backdrop="false">
    <div class="modal-dialog">
        <div class="modal-content bg-primary">
            <div class="modal-header">
                <h4 class="modal-title">Pilihan Paket</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
            </div>
            <div id="frm_paket"></div>
        </div>
    </div>
</div>
    
