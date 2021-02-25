<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Jadwal Kursus</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="£">Jadwal Kursus</a></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <?php if ($this->session->flashdata('konfirm')): ?>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="alert alert-info alert-dismissible" id="success-alert">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <h4><i class="icon fa fa-info"></i> Konfirmasi !</h4>
                                <?php echo $this->session->flashdata('konfirm'); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php endif; ?>
            <div class="row">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Peserta Belum Terjadwal</h3>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>                  
                                <tr>
                                    <td style="width: 5%">#</td>
                                    <td style="width: 15%">No.Peserta</td>
                                    <td style="width: 30%">Nama Peserta</td>
                                    <td style="width: 40%">Paket Pilihan</td>
                                    <td style="width: 10%">Act.</td>
                                </tr>
                                </thead>
                                <?php $nom=1; foreach($data_peserta_acc as $dt1) {?>
                                <tr>
                                    <td><?php echo $nom;?></td>
                                    <td><?php echo $dt1['no_pendaftaran'];?><br>
                                    <?php echo date_format(date_create($dt1['tgl_daftar']), "d/M/Y");?></td>
                                    <td><?php echo $dt1['nama_lengkap'];?></td>
                                    <td><?php echo $dt1['nama_paket'];?><br>
                                    Mobil : <?php echo $dt1['nama_mobil'];?><br>
                                    Biaya : Rp. <?php echo number_format($dt1['biaya'], 0, ",", ".");?><br>
                                    Lama Belajar : <?php echo $dt1['jumlah_hari'];?> hari
                                    </td>
                                    <td>
                                            <button class="btn btn-success tbl_jadwal" name="tbl_jadwal" id="<?php echo $dt1['id'];?>" title="Klik untuk pembuatan jadwal" onclick="goJadwal(this)"><i class="fa fa-plus"></i></button>
                                        </td>
                                </tr>
                                <?php $nom++; } ?>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Peserta Yang Telah Terjadwal</h3>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>                  
                                <tr>
                                    <td style="width: 5%">#</td>
                                    <td style="width: 15%">No.Peserta</td>
                                    <td style="width: 30%">Nama Peserta</td>
                                    <td style="width: 30%">Jadwal</td>
                                    <td style="width: 20%">Instruktur</td>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $nom=1; foreach($data_jadwal as $dt2) {?>
                                <tr>
                                    <td><?php echo $nom;?></td>
                                    <td><?php echo $dt2['nama_lengkap'];?></td>
                                    <td><?php echo $dt2['nama_paket'];?><br>
                                    Mobil : <?php echo $dt2['nama_mobil'];?>
                                    </td>
                                    <td><?php echo $dt2['jam'];?><br>
                                    Hari : <?php echo $dt2['hari'];?></td>
                                    <td><?php echo $dt2['nama_instruktur'];?></td>
                                </tr>
                                <?php $nom++; } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
  $(document).ready(function() 
  {
    window.setTimeout(function () { $("#success-alert").alert('close'); }, 2000);
  });
  var goJadwal = function(el)
  {
      var id_pendaftaran = el.id
      window.location.assign("<?php echo base_url();?>admin/buat_jadwal_kursus/"+id_pendaftaran);
  }
</script>
