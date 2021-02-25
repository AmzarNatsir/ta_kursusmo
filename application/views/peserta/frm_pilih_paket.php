<form role="form" enctype="multipart/form-data" method="post" action="<?php echo base_url();?>peserta/simpan_pendaftaran" onsubmit="return konfirm()">
<input type="hidden" name="id_paket" value="<?php echo $profil_paket->id;?>">
<input type="hidden" name="harga_paket" value="<?php echo $profil_paket->biaya;?>">
<input type="hidden" name="jumlah_hari" value="<?php echo $profil_paket->jumlah_hari;?>">
    <div class="modal-body">
        <div class="form-group row">
            <label class="col-sm-12"><h3><?php echo $profil_paket->nama_paket;?></h3><br><?php echo $profil_paket->deskripsi;?></label>
        </div>
        <table class="table" style="width: 100%;">
        <tr>
            <td style="width: 40%;">Biaya</td>
            <td>Rp. <?php echo number_format($profil_paket->biaya, 0, ",", ".");?></td>
        </tr>
        <tr>
            <td>Lama Kursus</td>
            <td><?php echo $profil_paket->jumlah_hari;?> hari</td>
        </tr>
        </table>
    </div>
    <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-outline-light">Pilih Paket</button>
    </div>
</form>
<script>
function konfirm()
  {
    var psn = confirm("Yakin dengan pilihan paket ini ?");
    if(psn==true)
    {
      return true;
    } else {
      return false;
    }
  }
</script>