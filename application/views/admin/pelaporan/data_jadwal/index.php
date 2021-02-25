<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Pelaporan</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="£">Data Jadwal Kursus</a></li>
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
                            <h3 class="card-title">Data Jadwal Kursus</h3>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>                  
                                <tr>
                                    <td style="width: 5%">#</td>
                                    <td style="width: 15%">No.Peserta</td>
                                    <td style="width: 30%">Nama Peserta</td>
                                    <td style="width: 30%">Jadwal</td>
                                    <td style="width: 20%">Instruktur</td>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $nom=1; foreach($list_data as $dt2) {?>
                                <tr>
                                    <td><?php echo $nom;?></td>
                                    <td><?php echo $dt2['nama_lengkap'];?></td>
                                    <td><?php echo $dt2['nama_paket'];?><br>
                                    Mobil : <?php echo $dt2['nama_mobil'];?>
                                    </td>
                                    <td>Jam : <?php echo $dt2['jam'];?><br>
                                    Hari : <?php echo $dt2['hari'];?></td>
                                    <td><?php echo $dt2['nama_instruktur'];?></td>
                                </tr>
                                <?php $nom++; } ?>
                                </tbody>
                            </table>    
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
