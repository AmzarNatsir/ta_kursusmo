<form role="form" method="post" action="<?php echo base_url();?>master/rubah_data_paket" onsubmit="return konfirm()">
<input type="hidden" name="id_data" id="id_data" value="<?php echo $res->id;?>">
<div class="modal-body">
    <div class="form-group">
    <label for="inp_nama_paket">Nomor Paket</label>
    <input type="text" name="inp_nama_paket" id="inp_nama_paket" class="form-control" maxlength="100" value="<?php echo $res->nama_paket;?>" required>
    </div>
    <div class="form-group">
    <label for="inp_deskripsi">Deskripsi</label>
    <textarea class="form-control" name="inp_deskripsi" id="inp_deskripsi" required><?php echo $res->deskripsi;?></textarea>
    </div>
    <div class="form-group">
    <label for="inp_warna">Kendaraan/Mobil</label>
    <select class="form-control" name="pil_mobil" id="pil_mobil">
    <?php
    foreach($list_mobil as $mob) {
        if($mob['id']==$res->id_mobil) {
            echo "<option value=".$mob['id']." selected>".$mob['nopol']." - ".$mob['nama_mobil']."</option>";
        } else {
            echo "<option value=".$mob['id'].">".$mob['nopol']." - ".$mob['nama_mobil']."</option>";
        }
    }
    ?>
    </select>
    </div>
    <div class="form-group">
    <label for="inp_biaya">Biaya Paket</label>
    <input type="text" name="inp_biaya" id="inp_biaya" class="form-control angka" style="text-align: right;" value="<?php echo $res->biaya;?>" required>
    </div>
    <div class="form-group">
    <label for="inp_jumlah_hari">Jumlah Hari</label>
    <input type="text" name="inp_jumlah_hari" id="inp_jumlah_hari" class="form-control angka" value="<?php echo $res->jumlah_hari;?>" maxlength="2" required>
    </div>
    <div class="form-group">
    <label for="pil_status">Status Aktif </label>
    <select class="form-control" name="pil_status" id="pil_status">
        <?php
        $arr_status = array("1"=>"Aktif", "2"=>"Tidak Aktif");
        foreach($arr_status as $key => $value){
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
<div class="modal-footer justify-content-between">
<button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
<button type="submit" class="btn btn-outline-light">Save changes</button>
</div>
</form>
<script type="text/javascript">
  $(document).ready(function() 
  {
    $('.angka').number( true, 0 );
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