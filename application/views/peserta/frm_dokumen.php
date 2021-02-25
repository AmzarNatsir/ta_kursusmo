<form role="form" enctype="multipart/form-data" method="post" action="<?php echo base_url();?>peserta/simpan_data_dokumen" onsubmit="return konfirm()">
    <div class="modal-body">
        <div class="form-group">
            <label for="inp_nama">Photo Anda</label>
            <div class="col-sm-12">
                <input type="file" name="inp_photo" id="inp_photo" class="form-control" onchange="loadFile_photo(this)" <?php echo (empty($profil->file_photo))? "required" : "" ?>>
                <input type="hidden" name="tmp_file_photo" value="<?php echo $profil->file_photo;?>">
            </div>
        </div>
        <div class="form-group row">
          <div class="col-sm-12" style="text-align: center;">
                <?php if (!empty($profil->file_photo)): ?>
                    <img id="preview_photo" style="width: 50%; height: auto;" src="<?php echo base_url() ?>assets/upload/peserta/<?php echo $profil->file_photo; ?>">
                <?php else : ?>
                    <img id="preview_photo" style="width: 50%; height: auto;" src="<?php echo base_url() ?>assets/upload/peserta/no_image_available.png">
                <?php endif ?>
          </div>
        </div>

        <div class="form-group">
            <label for="inp_nama">Kartu Identitas (KTP) Anda</label>
            <div class="col-sm-12">
                <input type="file" name="inp_ktp" id="inp_ktp" class="form-control" onchange="loadFile_ktp(this)" <?php echo (empty($profil->file_ktp))? "required" : "" ?>>
                <input type="hidden" name="tmp_file_ktp" value="<?php echo $profil->file_ktp;?>">
            </div>
        </div>
        <div class="form-group row">
          <div class="col-sm-12" style="text-align: center;">
                <?php if (!empty($profil->file_ktp)): ?>
                    <img id="preview_ktp" style="width: 50%; height: auto;" src="<?php echo base_url() ?>assets/upload/peserta/<?php echo $profil->file_ktp; ?>">
                <?php else : ?>
                    <img id="preview_ktp" style="width: 50%; height: auto;" src="<?php echo base_url() ?>assets/upload/peserta/no_image_available.png">
                <?php endif ?>
          </div>
        </div>

        <div class="form-group">
            <label for="inp_nama">Surat Izin Mengemudi (SIM) Anda</label>
            <div class="col-sm-12">
                <input type="file" name="inp_sim" id="inp_sim" class="form-control" onchange="loadFile_sim(this)" <?php echo (empty($profil->file_sim))? "required" : "" ?>>
                <input type="hidden" name="tmp_file_sim" value="<?php echo $profil->file_sim;?>">
            </div>
        </div>
        <div class="form-group row">
          <div class="col-sm-12" style="text-align: center;">
                <?php if (!empty($profil->file_sim)): ?>
                    <img id="preview_sim" style="width: 50%; height: auto;" src="<?php echo base_url() ?>assets/upload/peserta/<?php echo $profil->file_sim; ?>">
                <?php else : ?>
                    <img id="preview_sim" style="width: 50%; height: auto;" src="<?php echo base_url() ?>assets/upload/peserta/no_image_available.png">
                <?php endif ?>
          </div>
        </div>
    </div>
    <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-outline-light">Save changes</button>
    </div>
</form>
<script>
var _validFileExtensions = [".jpg", ".jpeg", ".png"];  
var loadFile_photo = function(oInput) {
if (oInput.type == "file") {
    var sFileName = oInput.value;
    var sSizeFile = oInput.files[0].size;
    var output = document.getElementById('preview_photo');
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
            alert("Maaf, " + sFileName + " tidak valid, jenis file photo yang boleh di upload adalah: " + _validFileExtensions.join(", "));
            oInput.value = "";
            output.src = "";
            return false;
        } 
        if(sSizeFile>500000) //50 KB
        {
            alert("Maaf, " + sFileName + " tidak valid, Ukuran file photo terlalu besar: " + sSizeFile);
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
var loadFile_ktp = function(oInput) {
if (oInput.type == "file") {
    var sFileName = oInput.value;
    var sSizeFile = oInput.files[0].size;
    var output = document.getElementById('preview_ktp');
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
            alert("Maaf, " + sFileName + " tidak valid, jenis file ktp yang boleh di upload adalah: " + _validFileExtensions.join(", "));
            oInput.value = "";
            output.src = "";
            return false;
        } 
        if(sSizeFile>500000) //50 KB
        {
            alert("Maaf, " + sFileName + " tidak valid, Ukuran file ktp terlalu besar: " + sSizeFile);
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
var loadFile_sim = function(oInput) {
if (oInput.type == "file") {
    var sFileName = oInput.value;
    var sSizeFile = oInput.files[0].size;
    var output = document.getElementById('preview_sim');
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
            alert("Maaf, " + sFileName + " tidak valid, jenis file sim yang boleh di upload adalah: " + _validFileExtensions.join(", "));
            oInput.value = "";
            output.src = "";
            return false;
        } 
        if(sSizeFile>500000) //50 KB
        {
            alert("Maaf, " + sFileName + " tidak valid, Ukuran file sim terlalu besar: " + sSizeFile);
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