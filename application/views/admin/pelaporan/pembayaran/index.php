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
              <li class="breadcrumb-item"><a href="£">Data Pembayaran</a></li>
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
                            <div class="form-group row">
                                <label for="pil_bulan" class="col-sm-3 col-form-label">Pilih Periode Bulan</label>
                                <div class="col-sm-3">
                                    <select class="form-control" name="pil_bulan" id="pil_bulan">
                                        <?php
                                        $bln_ini = date("m");
                                        $arr_bln = array(
                                            "01"=>"Januati",
                                            "02"=>"Februari",
                                            "03"=>"Maret",
                                            "04"=>"April",
                                            "05"=>"Mei",
                                            "06"=>"Juni",
                                            "07"=>"Juli",
                                            "08"=>"Agustus",
                                            "09"=>"September",
                                            "10"=>"Oktober",
                                            "11"=>"November",
                                            "12"=>"Desember"
                                        );
                                        foreach($arr_bln as $key => $value)
                                        {
                                            if($key==$bln_ini) {
                                                echo "<option value=".$key." selected>".$value."</option>";
                                            } else {
                                                echo "<option value=".$key.">".$value."</option>";
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-sm-2">
                                    <input type="text" class="form-control" name="inp_tahun" id="inp_tahun" value="<?php echo date("Y");?>" maxlength="4" required>
                                </div>
                                <div class="col-sm-4">
                                    <button type="button" class="btn btn-primary" name="tbl_filter" id="tbl_filter" onclick="goFilter()">Filter Data</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Preview Data Pembayaran</h3>
                        </div>
                        <div class="card-body" id="view_data"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
  var goFilter = function(el)
  {
      var bulan = $("#pil_bulan").val();
      var tahun = $("#inp_tahun").val();
      if(tahun=="")
      {
          alert("Kolom Tahun tidak boleh kosong");
          return false;
      } else {
          $("#view_data").load("<?php echo base_url();?>admin/view_laporan_pembayaran/"+bulan+"/"+tahun);
      }
  }
</script>
