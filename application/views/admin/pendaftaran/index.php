<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Daftar Pendaftaran</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="£">Daftar Pendaftaran</a></li>
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
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Data Pendaftar</h3>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>                  
                                <tr>
                                    <td style="width: 5%">#</td>
                                    <td style="width: 15%">Tanggal Daftar.</td>
                                    <td style="width: 10%">No.Pendaftaran</td>
                                    <td style="width: 20%">Nama Peserta</td>
                                    <td style="width: 30%">Paket Pilihan</td>
                                    <td style="width: 10%">Status</td>
                                    <td style="width: 10%">Act.</td>
                                </tr>
                                </thead>
                                <tbody>
                                <?php 
                                $nom_urut=1;
                                foreach($data_pendaftar as $list) { ?>
                                    <tr>
                                        <td><?php echo $nom_urut;?></td>
                                        <td><?php echo date_format(date_create($list['tgl_daftar']), "d M Y");?></td>
                                        <td><?php echo $list['no_pendaftaran'];?></td>
                                        <td><?php echo $list['nama_lengkap'];?></td>
                                        <td><?php echo $list['nama_paket'];?><br>
                                        Mobil : <?php echo $list['nama_mobil'];?><br>
                                        Biaya : Rp. <?php echo number_format($list['biaya'], 0, ",", ".");?><br>
                                        Lama Belajar : <?php echo $list['jumlah_hari'];?> hari
                                        </td>
                                        <td>
                                        <?php if($list['status_daftar']==1) {
                                            echo "Belum Diproses";
                                        } elseif($list['status_daftar']==2) {
                                            echo "Terdaftar/Disetujui";
                                        } else {
                                            echo "Pending";
                                        } ?>
                                        </td>
                                        <td>
                                            <button class="btn btn-success tbl_acc" name="tbl_acc" id="<?php echo $list['id'];?>" title="Klik untuk memproses pendaftaran" onclick="goAcc(this)"><i class="fa fa-edit"></i></button>
                                        </td>
                                    </tr>
                                <?php $nom_urut++; } ?>
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
  var goAcc = function(el)
  {
      var id_pendaftaran = el.id
      window.location.assign("<?php echo base_url();?>admin/proses_pendaftaran/"+id_pendaftaran);
  }
</script>
