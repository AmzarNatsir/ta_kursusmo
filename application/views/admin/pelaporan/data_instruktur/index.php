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
              <li class="breadcrumb-item"><a href="£">Data Peserta</a></li>
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
                            <h3 class="card-title">Data Peserta</h3>
                        </div>
                        <div class="card-body">
                        <table class="table table-bordered">
                            <thead>                  
                                <tr>
                                <th style="width: 5%">#</th>
                                <th style="width: 10%">Photo</th>
                                <th style="width: 20%">Nama Instruktur</th>
                                <th style="width: 20%">Tempat/Tgl.Lahir</th>
                                <th style="width: 10%">Jenkel</th>
                                <th style="width: 10%">No.Identitas</th>
                                <th style="width: 30%">Alamat/No.Telepon</th>
                                <th style="width: 10%">Status AKtif</th>
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
        </div>
    </div>
</div>
