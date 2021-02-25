<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Data Paket Kursus</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="£">Data Paket Kursus</a></li>
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
              <div class="card-body">
              <?php if ($this->session->flashdata('konfirm')): ?>
                <div class="alert alert-info alert-dismissible" id="success-alert">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h4><i class="icon fa fa-info"></i> Konfirmasi !</h4>
                  <?php echo $this->session->flashdata('konfirm'); ?>
                </div>
              <?php endif; ?>
                <button class="btn btn-primary" data-toggle="modal" data-target="#modal-tambah" id="tbl_tambah" name="tbl_tambah"><i class="fa fa-plus"></i> Tambah Data Baru</button>
                <table class="table table-bordered">
                    <thead>                  
                        <tr>
                        <th style="width: 5%">#</th>
                        <th style="width: 30%">Nama Paket</th>
                        <th style="width: 15%">Mobil</th>
                        <th style="width: 10%; text-align:right">Biaya (Rp.)</th>
                        <th style="width: 10%">Jumlah Hari</th>
                        <th style="width: 10%">Status</th>
                        <th style="width: 10%">Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                      <?php
                      $nom=1;
                      foreach($list_data as $dt) {
                      ?>
                        <tr>
                            <td><?php echo $nom;?></td>
                            <td><strong><?php echo $dt['nama_paket'];?></strong><br><?php echo $dt['deskripsi'];?></td>
                            <td><?php echo $dt['nama_mobil'];?></td>
                            <td style="text-align: right;"><?php echo number_format($dt['biaya'], 0, ",", ".");?></td>
                            <td><?php echo $dt['jumlah_hari'];?></td>
                            <td><?php echo ($dt['status']==1)? "Aktif" : "Tidak Aktif";?></td>
                            <td>
                            <a href="#" data-toggle="modal" class="tbl_edit" data-target="#modal-edit" id="<?php echo $dt['id'];?>"><i class="btn btn-primary fa fa-edit" title="Edit Data"></i></a>
                            <a href="#" class="tbl_hapus" id="<?php echo $dt['id'];?>"><i class="btn btn-danger fa fa-trash-alt" title="Edit Data"></i></a>
                            </td>
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
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<div class="modal fade" id="modal-tambah" data-backdrop="false">
  <div class="modal-dialog">
    <div class="modal-content bg-primary">
      <div class="modal-header">
        <h4 class="modal-title">Tambah Data</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
      </div>
      <form role="form" method="post" action="<?php echo base_url();?>master/simpan_data_paket" onsubmit="return konfirm()">
      <div class="modal-body">
          <div class="form-group">
            <label for="inp_nama_paket">Nomor Paket</label>
            <input type="text" name="inp_nama_paket" id="inp_nama_paket" class="form-control" maxlength="100" required>
          </div>
          <div class="form-group">
            <label for="inp_deskripsi">Deskripsi</label>
            <textarea class="form-control" name="inp_deskripsi" id="inp_deskripsi" required></textarea>
          </div>
          <div class="form-group">
            <label for="inp_warna">Kendaraan/Mobil</label>
            <select class="form-control" name="pil_mobil" id="pil_mobil">
            <?php
            foreach($list_mobil as $mob) {
                echo "<option value=".$mob['id'].">".$mob['nopol']." - ".$mob['nama_mobil']."</option>";
            }
            ?>
            </select>
          </div>
          <div class="form-group">
            <label for="inp_biaya">Biaya Paket</label>
            <input type="text" name="inp_biaya" id="inp_biaya" class="form-control angka" style="text-align: right;" value="0" required>
          </div>
          <div class="form-group">
            <label for="inp_jumlah_hari">Jumlah Hari</label>
            <input type="text" name="inp_jumlah_hari" id="inp_jumlah_hari" class="form-control angka" value="1" maxlength="2" required>
          </div>
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-outline-light">Save changes</button>
      </div>
      </form>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<!-- Modal Edit -->
<div class="modal fade" id="modal-edit" data-backdrop="false">
  <div class="modal-dialog">
    <div class="modal-content bg-primary">
      <div class="modal-header">
        <h4 class="modal-title">Edit Data</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
      </div>
      <div id="frm_modal"></div>
    </div>
  </div>
</div>
<script type="text/javascript">
  $(document).ready(function() 
  {
    window.setTimeout(function () { $("#success-alert").alert('close'); }, 2000);
    $('.angka').number( true, 0 );
    $(".tbl_edit").on("click", function()
    {
      var id_data = this.id;
      $("#frm_modal").load("<?php echo base_url();?>master/edit_data_paket/"+id_data);
    });
    $(".tbl_hapus").on("click", function()
    {
      var id_data = this.id;
      var psn = confirm("Yakin akan menghapus data ?");
      if(psn==true)
      {
        $.ajax (
        {
            url : "<?php echo site_url();?>master/hapus_data_paket",
            type : "post",
            data : {id_data:id_data},
            success : function(d)
            {
                alert(d)
                window.location.assign("<?php echo base_url();?>master/paket_kursus");
            }
         });
      }
    });
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
