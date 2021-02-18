<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Data Instruktur</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="£">Data Instruktur</a></li>
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
                        <th style="width: 10%">Photo</th>
                        <th style="width: 20%">Nama Instruktur</th>
                        <th style="width: 20%">Tempat/Tgl.Lahir</th>
                        <th style="width: 10%">Jenkel</th>
                        <th style="width: 10%">No.Identitas</th>
                        <th style="width: 20%">Alamat/No.Telepon</th>

                        <th style="width: 10%">Status AKtif</th>
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
                            <td><img src="<?php echo base_url()?>assets/upload/instruktur/<?php echo $dt['photo'] ?>" alt="produk" class="widget-image img-circle pull-left animation-fadeIn" style="width: 80px; height: 80px"></td>
                            <td><?php echo $dt['nama_instruktur'];?></td>
                            <td><?php echo $dt['tempat_lahir'];?>/<?php echo $dt['tanggal_lahir'];?></td>
                            <td><?php echo ($dt['jenkel']==1)? "Laki-Laki" : "Perempuan";?></td>
                            <td><?php echo $dt['no_identitas'];?></td>
                            <td><?php echo $dt['alamat'];?>, <?php echo $dt['no_telepon'];?></td>
                            <td><?php echo ($dt['status_aktif']==1)? "Aktif" : "Tidak Aktif";?></td>
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
      <form role="form" enctype="multipart/form-data" method="post" action="<?php echo base_url();?>master/simpan_data_instruktur" onsubmit="return konfirm()">
      <div class="modal-body">
        <div class="form-group">
            <label for="inp_nama">Photo Instruktur</label>
            <div class="col-sm-12">
              <input type="file" name="inp_gambar" id="inp_gambar" class="form-control" onchange="loadFile(this)" required>
            </div>
        </div>

        <div class="form-group row">
          <div class="col-sm-12">
              <img id="preview_upload" style="width: 100%; height: auto;">
          </div>
        </div>
          <div class="form-group">
            <label for="inp_nama">Nama Instruktur</label>
            <input type="text" name="inp_nama" id="inp_nama" class="form-control" maxlength="100" required>
          </div>
          <div class="form-group">
            <label for="inp_tempat_lahir">Tempat/Tanggal Lahir</label>
            <div class="row">
                <div class="col-7">
                    <input type="text" class="form-control" name="inp_tempat_lahir" id="inp_tempat_lahir" maxlength="100" required>
                </div>
                <div class="col-5">
                    <input type="date" class="form-control"  name="inp_tanggal_lahir" id="inp_tanggal_lahir" required>
                </div>
            </div>
          </div>
          <div class="form-group">
            <label for="pil_jenkel">Jenis Kelamin</label>
            <select class="form-control" name="pil_jenkel" id="pil_jenkel">
              <?php
              $arr_jenkel = array("1"=>"Laki-Laki", "2"=>"Perempuan");
              foreach($arr_jenkel as $key => $value){
                echo "<option value=".$key.">".$value."</option>";
              }
              ?>
            </select>
          </div>

          <div class="form-group">
            <label for="inp_no_identitas">No. Identitas</label>
            <input type="text" name="inp_no_identitas" id="inp_no_identitas" class="form-control" maxlength="50">
          </div>
          <div class="form-group">
            <label for="inp_alamat">Alamat</label>
            <input type="text" name="inp_alamat" id="inp_alamat" class="form-control" maxlength="100" required>
          </div>
          <div class="form-group">
            <label for="inp_notel">No. Telepon </label>
            <input type="text" name="inp_notel" id="inp_notel" class="form-control" maxlength="50" required>
          </div>
          <div class="form-group">
            <label for="pil_status">Status</label>
            <select class="form-control" name="pil_status" id="pil_status">
              <?php
              $arr_status = array("1"=>"Aktif", "2"=>"Tidak Aktif");
              foreach($arr_status as $key => $value){
                echo "<option value=".$key.">".$value."</option>";
              }
              ?>
            </select>
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
    $(".tbl_edit").on("click", function()
    {
      var id_data = this.id;
      $("#frm_modal").load("<?php echo base_url();?>master/edit_data_instruktur/"+id_data);
    });
    $(".tbl_hapus").on("click", function()
    {
      var id_data = this.id;
      var psn = confirm("Yakin akan menghapus data ?");
      if(psn==true)
      {
        $.ajax (
        {
            url : "<?php echo site_url();?>master/hapus_data_instruktur",
            type : "post",
            data : {id_data:id_data},
            success : function(d)
            {
                alert(d)
                window.location.assign("<?php echo base_url();?>master/data_instruktur");
            }
         });
      }
    });
  });
  var _validFileExtensions = [".jpg", ".jpeg", ".png"];  
  var loadFile = function(oInput) {
    if (oInput.type == "file") {
        var sFileName = oInput.value;
        var sSizeFile = oInput.files[0].size;
        var output = document.getElementById('preview_upload');
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
