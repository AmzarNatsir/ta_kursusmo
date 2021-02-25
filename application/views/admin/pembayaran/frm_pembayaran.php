<form role="form" enctype="multipart/form-data" method="post" action="<?php echo base_url();?>admin/simpan_data_pembayaran" onsubmit="return konfirm()">
    <input type="hidden" name="id_pendaftaran" value="<?php echo $res->id;?>">
    <table class="table" style="width: 100%;">
        <tr>
        <td style="width: 40%;">No. Pendaftaran</td>
        <td>: <?php echo $res->no_pendaftaran;?></td>
        </tr>
        <tr>
        <td>Nama</td>
        <td>: <?php echo $res->nama_lengkap;?></td>
        </tr>
        <tr>
            <td>Nama Paket</td>
            <td>: <?php echo $res->nama_paket;?></td>
        </tr>
        <tr>
            <td>Jumlah Pembayaran</td>
            <td><input type="text" class="form-control" name="inp_nominal" id="inp_nominal" value="<?php echo number_format($res->biaya, 0, ",", ".");?>" style="text-align: right;" readonly>
            </td>
        </tr>
        <tr>
            <td>Keterangan</td>
            <td>
            <textarea class="form-control" name="inp_keterangan" id="inp_keterangan" required></textarea>
            </td>
        </tr>
        <tr>
            <td>Bukti Pembayaran</td>
            <td>
            <img id="preview_invoice" style="width: 50%; height: auto;" src="<?php echo base_url() ?>assets/upload/peserta/<?php echo $res->file_invoice; ?>">
            </td>
        </tr>
    </table>
    <div class="modal-footer justify-content-between">
        <button type="submit" class="btn btn-primary">Simpan Pembayaran</button>
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
