<table class="table" style="width: 100%;">
    <tr>
        <td style="width: 5%;">#</td>
        <td style="width: 10%;">Tgl.Trnsaksi</td>
        <td style="width: 60%;">Keterangan</td>
        <td style="width: 10%;">No.Reff</td>
        <td style="width: 15%; text-align:right">Nominal</td>
    </tr>
    <?php 
    $nom=1;
    $total=0;
    foreach($list_data as $dt) {?>
    <tr>
        <td><?php echo $nom;?></td>
        <td><?php echo date_format(date_create($dt['tgl_pembayaran']), "d M Y");?></td>
        <td><?php echo $dt['keterangan'];?><br>
            Paket : <?php echo $dt['nama_paket'];?></td>
        <td><?php echo $dt['no_pendaftaran'];?></td>
        <td style="text-align: right;"><?php echo number_format($dt['nominal'], 0, ",", ".");?></td>
    </tr>
    <?php $nom++; $total+=$dt['nominal']; } ?>
    <tr>
        <td colspan="4">TOTAL</td>
        <td style="text-align: right;"><?php echo number_format($total, 0, ",", ".");?></td>
    </tr>
</table>