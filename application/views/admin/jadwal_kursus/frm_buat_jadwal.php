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
              <li class="breadcrumb-item"><a href="#">Pembuatan Jadwal Kursus</a></li>
              <li class="breadcrumb-item"><a href="<?php echo base_url();?>admin/jadwal_kursus">Jadwal Kursus</a></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Form Pembuatan Jadwal Kursus</h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title">Data Peserta</h3>
                                            <table class="table" style="width: 100%;">
                                            <tr>
                                            <td style="width: 40%;">No. Pendaftaran</td>
                                            <td>: <?php echo $res->no_pendaftaran;?></td>
                                            </tr>
                                            <tr>
                                            <td>Tanggal Pendaftaran</td>
                                            <td>: <?php echo date_format(date_create($res->tgl_daftar), "d M Y");?></td>
                                            </tr>
                                            <tr>
                                            <td>Nama</td>
                                            <td>: <?php echo $res->nama_lengkap;?></td>
                                            </tr>
                                            <tr>
                                            <td>No.Identitas</td>
                                            <td>: <?php echo $res->no_identitas;?></td>
                                            </tr>
                                            <tr>
                                            <td>Tempat/Tanggal Lahir</td>
                                            <td>: <?php echo $res->tempat_lahir;?>, <?php echo date_format(date_create($res->tanggal_lahir), "d M Y");?></td>
                                            </tr>
                                            <tr>
                                            <td>Jenis Kelamin</td>
                                            <td>: <?php echo ($res->jenkel==1) ? "Laki-Laki" : "Perempuan";?></td>
                                            </tr>
                                            <tr class="btn-primary">
                                            <td colspan="2">Paket Yang Dipilih</td>
                                            </tr>
                                            <tr>
                                            <td>Nama Paket</td>
                                            <td>: <?php echo $res->nama_paket;?></td>
                                            </tr>
                                            <tr>
                                            <td>Mobil</td>
                                            <td>: <?php echo $res->nama_mobil;?></td>
                                            </tr>
                                            <tr>
                                            <td>Biaya</td>
                                            <td>: Rp. <?php echo number_format($res->biaya, 0, ",", ".");?></td>
                                            </tr>
                                            <tr>
                                            <td>Lama Belajar</td>
                                            <td>: <?php echo $res->jumlah_hari;?> hari</td>
                                            </tr>
                                            <tr class="btn-danger">
                                            <td colspan="2">Dokumen Peserta</td>
                                            </tr>
                                            <tr>
                                                <td>Photo</td>
                                                <td> 
                                                <?php if(empty($res->file_photo)) {
                                                    echo ": Photo belum di upload.";
                                                } else { ?>
                                                    <img id="preview_photo" style="width: 50%; height: auto;" src="<?php echo base_url() ?>assets/upload/peserta/<?php echo $res->file_photo; ?>">
                                                <?php } ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Kartu Identitas/KTP</td>
                                                <td>
                                                <?php if(empty($res->file_ktp)) {
                                                    echo ": Kartu Identitas (KTP) belum diupload.";
                                                } else { ?>
                                                    <img id="preview_ktp" style="width: 50%; height: auto;" src="<?php echo base_url() ?>assets/upload/peserta/<?php echo $res->file_ktp; ?>">
                                                <?php }?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Surat Izin Mengemudi</td>
                                                <td>
                                                <?php if(empty($res->file_sim)) {
                                                    echo ": Surat Izin Mengemudi (SIM) belum diupload.";
                                                } else { ?>
                                                    <img id="preview_sim" style="width: 50%; height: auto;" src="<?php echo base_url() ?>assets/upload/peserta/<?php echo $res->file_photo; ?>">
                                                <?php }?>
                                                </td>
                                            </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title">Pembuatan Jadwal Kursus</h3>
                                        </div>
                                        <form role="form" enctype="multipart/form-data" method="post" action="<?php echo base_url();?>admin/simpan_data_jadwal" onsubmit="return konfirm()">
                                        <input type="hidden" name="id_pendaftaran" value="<?php echo $res->id;?>">
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label for="pil_jam">Pilih Jam</label>
                                                    <select class="form-control" name="pil_jam" id="pil_jam">
                                                    <?php
                                                    $arr_jam = array("8.30 - 11.30 (Kelas Pagi)", "13.00 - 16.00 (Kelas Siang)");
                                                    foreach($arr_jam as $value) {
                                                        echo "<option value=".$value.">".$value."</option>";
                                                    }
                                                    ?>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="pil_hari">Pilih Hari</label>
                                                    <select class="select2" multiple="multiple" name="pil_hari[]" id="pil_hari" data-placeholder="Pilih Hari" style="width: 100%;">
                                                    <?php
                                                    $arr_hari = array("Senin", "Selasa", "Rabu", "Kamis", "Jumat", "sabtu");
                                                    foreach($arr_hari as $value) {
                                                        echo "<option value=".$value.">".$value."</option>";
                                                    }
                                                    ?>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="pil_instruktur">Pilih Instruktur</label>
                                                    <select class="form-control" name="pil_instruktur" id="pil_instruktur">
                                                    <?php
                                                    foreach($instrktur as $inst) {
                                                        echo "<option value=".$inst['id'].">".$inst['nama_instruktur']."</option>";
                                                    }
                                                    ?>
                                                    </select>
                                                </div>
                                                <div class="modal-footer justify-content-between">
                                                    <button type="submit" class="btn btn-primary">Submit</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
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
    $('.select2').select2()
  });
  function konfirm()
  {
    var psn = confirm("Yakin akan menyimpan data ?");
    if(psn==true)
    {
      return true;
    } else {
      return false;
    }
  }
</script>
