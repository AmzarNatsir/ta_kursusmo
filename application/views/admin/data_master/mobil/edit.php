<form role="form" method="post" action="<?php echo base_url();?>master/rubah_data_mobil" onsubmit="return konfirm()">
  <input type="hidden" name="id_tabel" name="id_tabel" value="<?php echo $res->id;?>">
  <div class="modal-body">
    <div class="box-body">
        <div class="form-group">
            <label for="inp_nopol">Nomor Polisi</label>
            <input type="text" name="inp_nopol" id="inp_nopol" class="form-control" maxlength="20" value="<?php echo $res->nopol;?>" required>
          </div>
          <div class="form-group">
            <label for="inp_nama_mobil">Nama Mobil</label>
            <input type="text" name="inp_nama_mobil" id="inp_nama_mobil" class="form-control" maxlength="100" value="<?php echo $res->nama_mobil;?>" required>
          </div>
          <div class="form-group">
            <label for="inp_warna">Warna</label>
            <input type="text" name="inp_warna" id="inp_warna" class="form-control" maxlength="50" value="<?php echo $res->warna;?>">
          </div>
          <div class="form-group">
            <label for="inp_tahun">Tahun</label>
            <input type="text" name="inp_tahun" id="inp_tahun" class="form-control" maxlength="4" value="<?php echo $res->tahun;?>">
          </div>
          <div class="form-group">
            <label for="pil_kondisi">Kondisi Mobil</label>
            <select class="form-control" name="pil_kondisi" id="pil_kondisi">
              <?php
              $arr_kondisi = array("1"=>"Baik", "2"=>"Rusak");
              foreach($arr_kondisi as $key => $value){
                  if($key==$res->status) {
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