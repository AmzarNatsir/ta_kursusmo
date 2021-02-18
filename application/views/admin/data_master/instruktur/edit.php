<form role="form" enctype="multipart/form-data" method="post" action="<?php echo base_url();?>master/rubah_data_instruktur" onsubmit="return konfirm()">
  <input type="hidden" name="id_tabel" name="id_tabel" value="<?php echo $res->id;?>">
  <div class="modal-body">
    <div class="box-body">
        <div class="form-group">
          <div class="col-sm-12">
              <input type="file" name="inp_gambar" id="inp_gambar" class="form-control" onchange="loadFile(this)">
              <input type="hidden" name="tmp_gbr" id="tmp_gbr" value="<?= base_url() ?>assets/upload/instruktur/<?= $res->photo ?>">
          </div>
        </div>
        <div class="form-group row">
          <div class="col-sm-12">
              <img id="preview_upload_edit" style="width: 100%; height: auto;" src="
              <?php if (!empty($res->photo)): ?>
                <?= base_url() ?>assets/upload/instruktur/<?= $res->photo ?>
              <?php endif ?>">
          </div>
        </div>
        <div class="form-group">
            <label for="inp_nama">Nama Instruktur</label>
            <input type="text" name="inp_nama" id="inp_nama" class="form-control" maxlength="100" value="<?php echo $res->nama_instruktur;?>" required>
        </div>
        <div class="form-group">
            <label for="inp_tempat_lahir">Tempat/Tanggal Lahir</label>
            <div class="row">
                <div class="col-7">
                    <input type="text" class="form-control" name="inp_tempat_lahir" id="inp_tempat_lahir" maxlength="100" value="<?php echo $res->tempat_lahir;?>" required>
                </div>
                <div class="col-5">
                    <input type="date" class="form-control"  name="inp_tanggal_lahir" id="inp_tanggal_lahir" value="<?php echo $res->tanggal_lahir;?>" required>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="pil_jenkel">Jenis Kelamin</label>
            <select class="form-control" name="pil_jenkel" id="pil_jenkel">
            <?php
            $arr_jenkel = array("1"=>"Laki-Laki", "2"=>"Perempuan");
            foreach($arr_jenkel as $key => $value){
                if($key==$res->jenkel) {
                    echo "<option value=".$key." selected>".$value."</option>";
                } else {
                    echo "<option value=".$key.">".$value."</option>";
                }
            }
            ?>
            </select>
        </div>

        <div class="form-group">
            <label for="inp_no_identitas">No. Identitas</label>
            <input type="text" name="inp_no_identitas" id="inp_no_identitas" class="form-control" maxlength="50" value="<?php echo $res->no_identitas;?>">
        </div>
        <div class="form-group">
            <label for="inp_alamat">Alamat</label>
            <input type="text" name="inp_alamat" id="inp_alamat" class="form-control" maxlength="100" value="<?php echo $res->alamat;?>" required>
        </div>
        <div class="form-group">
            <label for="inp_notel">No. Telepon </label>
            <input type="text" name="inp_notel" id="inp_notel" class="form-control" maxlength="50" value="<?php echo $res->no_telepon;?>" required>
        </div>
        <div class="form-group">
            <label for="pil_status">Status</label>
            <select class="form-control" name="pil_status" id="pil_status">
            <?php
            $arr_status = array("1"=>"Aktif", "2"=>"Tidak Aktif");
            foreach($arr_status as $key => $value){
                if($key==$res->status_aktif) {
                    echo "<option value=".$key." selected>".$value."</option>";
                } else {
                    echo "<option value=".$key.">".$value."</option>";
                }
            }
            ?>
            </select>
        </div>
    </div>
  </div>
  <div class="modal-footer justify-content-between">
    <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
    <button type="submit" class="btn btn-outline-light">Save changes</button>
    </div>
</form>
<script type="text/javascript">
    var _validFileExtensions = [".jpg", ".jpeg", ".png", ".pdf"];  
  var loadFile = function(oInput) {
  if (oInput.type == "file") {
        var sFileName = oInput.value;
        var sSizeFile = oInput.files[0].size;
        var output = document.getElementById('preview_upload_edit');
        var tmp_output = document.getElementById('tmp_gbr');
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
                alert("Sorry, " + sFileName + " is invalid, allowed extensions are: " + _validFileExtensions.join(", "));
                oInput.value = "";
                output.src = URL.createObjectURL(tmp_output);
                return false;
            } 
            if(sSizeFile>500000) //50 KB
            {
                alert("Sorry, " + sFileName + " is invalid, Ukuran file terlalu besar: " + sSizeFile);
                oInput.value = "";
                output.src = URL.createObjectURL(tmp_output);
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