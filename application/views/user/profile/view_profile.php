<?php 
  
  $tgl = $cv->tgl;
  
  function hitung_umur($tgl) {
    list($day,$month,$year) = explode("-",$tgl);
    $year_diff  = date("Y") - $year;
    $month_diff = date("m") - $month;
    $day_diff   = date("d") - $day;
    
    if ($month_diff < 0) $year_diff--;
        elseif (($month_diff==0) && ($day_diff < 0)) $year_diff--;

    $tahun = $year_diff.' Tahun'. ' ' . $month_diff.' Bulan';
    return $tahun;
}
  
?>
   
   <!-- Main content -->
  <section class="content">
    <div class="row">      
      <div class="col-md-3">
        <!-- Profile Image -->
        <div class="box box-primary">
          <div class="box-body box-profile">
            <img class="profile-user-img img-responsive img-circle" src="<?php echo base_url().$cv->foto;?>" alt="User profile picture">

            <h3 class="profile-username text-center"><?php echo $cv->nama ?></h3>

            <p class="text-muted text-center">Jurusan</p>

            <ul class="list-group list-group-unbordered">
              <li class="list-group-item">
                <b>Tanggal Lahir</b> <a class="pull-right"><?php echo $cv->tgl ?></a>
              </li>
              <li class="list-group-item">
                <b>Kontrak Awal</b> <a class="pull-right"><?php echo $cv->kont_awal ?></a>
              </li>
              <li class="list-group-item">
                <b>Kontrak Akhir</b> <a class="pull-right"><?php echo $cv->kont_akhir ?></a>
              </li>
            </ul>

            <a href="<?php echo base_url('user/laporan/cv_pdf');?>" class="btn btn-primary btn-block"><b>Print</b></a>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
        
        <!-- About Me Box -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Tentang Saya</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <strong><i class="fa fa-book margin-r-5"></i>Pendidikan</strong><br>

              <p class="text-muted">
                Pendidikan Akhir   :  <?= $cv->akhir ?> <br>
                Pendidikan Diakui :  <?= $cv->diakui ?> 
              </p>
              
              <hr>
              <strong><i class="fa fa-map-marker margin-r-5"></i>Alamat</strong>
              <p class="text-muted"><?= $cv->alamat?></p>
 
              <hr>
              <strong><i class="fa fa-file-text-o margin-r-5"></i>Keluarga</strong>
              <p></p>
            </div>

            <!-- /.box-body -->
          </div>
        <!-- /.box -->

        <!-- Data Login -->

        <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Penggantian Password</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <form action="<?php echo base_url('user/utama/ubah_pass');?>" method="POST">
                  <div class="box-body">
                    <strong><i class="fa fa-user margin-r-5"></i>Data Login</strong></br>
                      
                      <label class="control-label">Email</label><br>
                      <input type="email" class="form-control" name="email" required value="<?php echo $cv->email?>" /><br>

                      <label class="control-label">Password Lama</label>
                      <input type="text" class="form-control" name="pass_lama" required /><br>

                      <label class="control-label">Password Baru</label>
                      <input type="text" class="form-control" name="pass_baru" required /><br>

                      <input type="submit" class="btn btn-primary btn-block" name="submit" value="EDIT"/>
                    
                    <hr>
                  </div>
              </form>
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
                  <label for="inputName" class="col-sm-2 control-label">Nama</label>
                  <div class="col-sm-6">
                    <input type="text" class="form-control" readonly="" value="<?= $cv->nama ?>" >
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputEmail" class="col-sm-2 control-label">Pend. Diakui</label>

                  <div class="col-sm-4">
                    <input type="text" class="form-control" readonly="" value="<?= $cv->diakui ?>" >
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputName" class="col-sm-2 control-label">Pend. Akhir</label>
                    <div class="col-sm-4">
                      <input type="text" class="form-control" readonly="" value="<?= $cv->akhir ?>" >
                    </div>
                </div>

                <div class="form-group">
                  <label for="inputSkills" class="col-sm-2 control-label">Seksi</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" readonly="" value="<?= $cv->seksi ?>" >
                    </div>
                </div>

                <div class="form-group">
                  <label for="inputSkills" class="col-sm-2 control-label">Bagian</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" readonly="" value="<?= $cv->bagian ?>" >
                    </div>
                </div>

                <div class="form-group">
                  <label for="inputSkills" class="col-sm-2 control-label">Divisi</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" readonly="" value="<?= $cv->divisi ?>" >
                    </div>
                </div>

                <div class="form-group">
                  <label for="inputSkills" class="col-sm-2 control-label">Direktorat</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" readonly=""  value="<?= $cv->direktorat ?>" >
                    </div>
                </div>

                <div class="form-group">
                  <label for="inputSkills" class="col-sm-2 control-label">Tempat Lahir</label>
                    <div class="col-sm-4">
                      <input type="text" class="form-control" readonly="" value="<?= $cv->tempat ?>" >
                    </div>
                </div>

                <div class="form-group">
                  <label for="inputSkills" class="col-sm-2 control-label">Tanggal Lahir</label>
                    <div class="col-sm-4">
                      <input type="text" class="form-control" readonly="" value="<?= $cv->tgl?>" >
                    </div>
                </div>

                <div class="form-group">
                  <label for="inputSkills" class="col-sm-2 control-label">Umur</label>
                    <div class="col-sm-3">
                      <input type="text" class="form-control" readonly="" value="<?= hitung_umur($tgl) ?>" >
                    </div>
                </div>

                <div class="form-group">
                  <label for="inputSkills" class="col-sm-2 control-label">Gender</label>
                    <div class="col-sm-4">
                      <input type="text" class="form-control" readonly="" value="<?= $cv->jenis_kelamin ?>" >
                    </div>
                </div>

                <div class="form-group">
                  <label for="inputSkills" class="col-sm-2 control-label">Agama</label>
                  <div class="col-sm-5">
                    <input type="text" class="form-control" readonly="" value="<?= $cv->agama ?>" >
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputSkills" class="col-sm-2 control-label">Gol. Darah</label>
                    <div class="col-sm-2">
                      <input type="text" class="form-control" readonly="" value="<?= $cv->gol_darah ?>" >
                    </div>
                </div>

                <div class="form-group">
                  <label for="inputSkills" class="col-sm-2 control-label">St.Sipil</label>
                    <div class="col-sm-4">
                      <input type="text" class="form-control" readonly="" value="<?= $cv->kode_sipil ?>" >
                    </div>
                </div>

                <div class="form-group">
                  <label for="inputSkills" class="col-sm-2 control-label">Bangsa</label>
                    <div class="col-sm-5">
                      <input type="text" class="form-control" readonly="" value="<?= $cv->suku ?>" >
                    </div>
                </div>

                <div class="form-group">
                  <label for="inputSkills" class="col-sm-2 control-label">Suku</label>
                    <div class="col-sm-4">
                      <input type="text" class="form-control" readonly="" value="<?= $cv->suku ?>" >
                    </div>
                </div>

                <div class="form-group">
                  <label for="inputSkills" class="col-sm-2 control-label">No. Identitas</label>
                    <div class="col-sm-6">
                      <input type="text" class="form-control" readonly="" value="<?= $cv->ktp ?>" >
                    </div>
                </div>

                <div class="form-group">
                  <label for="inputExperience" class="col-sm-2 control-label">Alamat</label>
                    <div class="col-sm-6">
                      <textarea class="form-control" id="inputExperience" readonly="" rows="5"><?= $cv->alamat ?></textarea>
                    </div>
                </div>

                <div class="form-group">
                  <label for="inputSkills" class="col-sm-2 control-label">Kode Pos</label>
                    <div class="col-sm-4">
                      <input type="text" class="form-control" readonly="" value="<?= $cv->kode_pos ?>" >
                    </div>
                </div>

                <div class="form-group">
                  <label for="inputSkills" class="col-sm-2 control-label">No. Telp</label>
                    <div class="col-sm-4">
                      <input type="text" class="form-control" readonly="" value="<?= $cv->no_telp ?>" >
                    </div>
                </div>

                <div class="form-group">
                  <label for="inputSkills" class="col-sm-2 control-label">No. HP</label>
                    <div class="col-sm-4">
                      <input type="text" class="form-control" readonly="" value="<?= $cv->no_hp ?>" >
                    </div>
                </div>

                <div class="form-group">
                  <label for="inputSkills" class="col-sm-2 control-label">Email</label>
                    <div class="col-sm-5">
                      <input type="text" class="form-control" readonly="" value="<?= $cv->email ?>" >
                    </div>
                </div>

                <div class="form-group">
                  <label for="inputSkills" class="col-sm-2 control-label">Tinggi</label>
                    <div class="col-sm-3">
                      <input type="text" class="form-control" readonly="" value="<?= $cv->tinggi . '&nbsp;' .'cm' ?>" >
                    </div>
                </div>

                <div class="form-group">
                  <label for="inputSkills" class="col-sm-2 control-label">Berat</label>
                    <div class="col-sm-3">
                      <input type="text" class="form-control" readonly="" value="<?= $cv->berat . '&nbsp;' .'kg'?>" >
                    </div>
                </div>

              </form>
            </div>
          </div>
        </div>
      </div>

    </div>

  </section>