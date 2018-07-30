<?php 
  
  $anak1 = $kel->tgl_anak_1;
  $anak2 = $kel->tgl_anak_2;
  $anak3 = $kel->tgl_anak_3;
  $anak4 = $kel->tgl_anak_4;
  $anak5 = $kel->tgl_anak_5;

  function hitung_umur($anak1) {
    list($year,$month,$day) = explode("-",$anak1);
    $year_diff  = date("Y") - $year;
    $month_diff = date("m") - $month;
    $day_diff   = date("d") - $day;
    
    if ($month_diff < 0) $year_diff--;
        elseif (($month_diff==0) && ($day_diff < 0)) $year_diff--;
    return $year_diff;
}
  
?>

<section class="content">
    <div class="row">
      
      <div class="col-md-3">
        <!-- About Me Box -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Tentang Keluarga</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <strong><i class="fa fa-user "></i> Ibu Kandung</strong>
              <p class="text-muted"></p>
              
              <hr>
              <strong><i class="fa fa-user "></i> Nama Isteri</strong>
              <p class="text-muted"></p>
 
              <hr>
              <strong><i class="fa fa-child "></i> Jumlah Anak</strong>
              <p></p>
            
            </div>

            <!-- /.box-body -->
          </div>
        <!-- /.box -->
      </div>

      <div class="col-md-9">
        <div class="row">
          <div class="box box-primary">
            <div class="box-body"><br>
              <form class="form-horizontal">
                
                <div class="form-group">
                  <label for="inputName" class="col-sm-3 control-label">Nama Ibu</label>
                  <div class="col-sm-6">
                    <input type="text" class="form-control" value="<?php echo $kel->nm_ibu_kandung;?>" readonly="" >
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputEmail" class="col-sm-3 control-label">Nama Isteri</label>

                  <div class="col-sm-6">
                    <input type="text" class="form-control" value="<?php echo $kel->nm_isteri;?>" readonly="">
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputName" class="col-sm-3 control-label">Tgl Lahir Anak Ke-1</label>
                   <div class=""> 
                    <div class="col-sm-3">
                      <input type="text" class="form-control" value="<?php echo $kel->tgl_anak_1;?>"  readonly="" >
                    </div>
                    <div class="col-sm-2">
                      <input type="text" class="form-control" value="<?php echo hitung_umur($anak1) . ' Tahun ' ;?>"  readonly="" >
                    </div>
                  </div>
                    
                </div>

                <div class="form-group">
                  <label for="inputSkills" class="col-sm-3 control-label">Tgl Lahir Anak Ke-2</label>
                    <div class="col-sm-3">
                      <input type="text" class="form-control" value="<?php echo $kel->tgl_anak_2;?>" readonly="">
                    </div>
                    <div class="col-sm-3">
                      <input type="text" class="form-control" value="<?php echo hitung_umur($anak2) . ' Tahun ';?>" readonly="">
                    </div>
                </div>

                <div class="form-group">
                  <label for="inputSkills" class="col-sm-3 control-label">Tgl Lahir Anak Ke-3</label>
                    <div class="col-sm-3">
                      <input type="text" class="form-control" value="<?php echo $kel->tgl_anak_3;?>"  readonly="">
                    </div>
                    <div class="col-sm-3">
                      <input type="text" class="form-control" value="<?php echo hitung_umur($anak3) . ' Tahun ';?>" readonly="">
                    </div>
                </div>

                <div class="form-group">
                  <label for="inputSkills" class="col-sm-3 control-label">Tgl Lahir Anak Ke-4</label>
                    <div class="col-sm-3">
                      <input type="text" class="form-control" value="<?php echo $kel->tgl_anak_4;?>" readonly="">
                    </div>
                    <div class="col-sm-3">
                      <input type="text" class="form-control" value="<?php echo hitung_umur($anak4) . ' Tahun ';?>" readonly="">
                    </div>
                </div>

                <div class="form-group">
                  <label for="inputSkills" class="col-sm-3 control-label">Tgl Lahir Anak Ke-5</label>
                    <div class="col-sm-3">
                      <input type="text" class="form-control" value="<?php echo $kel->tgl_anak_5;?>" readonly="">
                    </div>
                    <div class="col-sm-3">
                      <input type="text" class="form-control" value="<?php echo hitung_umur($anak5) . ' Tahun ';?>" readonly="">
                    </div>
                </div>

                <div class="form-group">
                  <label for="inputSkills" class="col-sm-3 control-label">Keterangan KK</label>
                    <div class="col-sm-3">
                      <input type="text" class="form-control" value="<?php echo $kel->ket_kk;?>" readonly="">
                    </div>
                </div>

              </form>
            </div>
          </div>
        </div>
      </div>

    </div>

  </section>