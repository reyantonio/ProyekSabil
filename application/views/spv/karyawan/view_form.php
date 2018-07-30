<section class="content">
    <div class="row">
      
      <div class="col-md-3">
        <!-- Profile Image -->
        <div class="box box-primary">
          <div class="box-body box-profile">
            <img class="profile-user-img img-responsive img-circle"  alt="User profile picture">

            <h3 class="profile-username text-center"></h3>

            <p class="text-muted text-center">Jurusan</p>

            <ul class="list-group list-group-unbordered">
              <li class="list-group-item">
                <b>Tanggal Lahir</b> <a class="pull-right"></a>
              </li>
              <li class="list-group-item">
                <b>Kontrak Awal</b> <a class="pull-right"></a>
              </li>
              <li class="list-group-item">
                <b>Kontrak Akhir</b> <a class="pull-right"></a>
              </li>
            </ul>
            <input type="file" class="btn btn-primary btn-block btn-xs" ><br>
            <a href="#" class="btn btn-success btn-block btn-xs"><b>Upload Foto</b></a>
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
                
              </p>
              
              <hr>
              <strong><i class="fa fa-map-marker margin-r-5"></i>Alamat</strong>
              <p class="text-muted"></p>
 
              <hr>
              <strong><i class="fa fa-file-text-o margin-r-5"></i>Keluarga</strong>
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
              <form class="form-horizontal" >
                
                <div class="form-group">
                  <label for="inputName" class="col-sm-3 control-label">ID Karyawan</label>
                  <div class="col-sm-3">
                    <select class="form-control" name="id_karyawan">
                          <option>-- Pilih Id --</option>
                            <?php foreach ($id->result() as $n) { ?>
                            <option value="<?= $n->user_nik; ?>"><?= $n->user_nik; ?></option>
                            <?php  } ?>
                      </select>
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputName" class="col-sm-3 control-label">Nama</label>
                  <div class="col-sm-6">
                    <input type="text" class="form-control" name="nama" >
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputEmail" class="col-sm-3 control-label">Pend. Diakui</label>
                  <div class="col-sm-3">
                    <select class="form-control" name="diakui">
                        <option>-- Pilih Pendidikan --</option>
                            <?php foreach ($pend->result() as $n) { ?>
                            <option value="<?= $n->nm_pendidikan; ?>"><?= $n->nm_pendidikan; ?></option>
                            <?php  } ?>
                      </select>
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputName" class="col-sm-3 control-label">Pend. Akhir</label>
                    <div class="col-sm-3">
                    <select class="form-control" name="diakui">
                        <option>-- Pilih Pendidikan --</option>
                            <?php foreach ($pend->result() as $n) { ?>
                            <option value="<?= $n->nm_pendidikan; ?>"><?= $n->nm_pendidikan; ?></option>
                            <?php  } ?>
                      </select>
                    </div>
                </div>

                <div class="form-group">
                  <label for="inputName" class="col-sm-3 control-label">Jurusan</label>
                    <div class="col-sm-4">
                     <select class="form-control" name="diakui">
                        <option>-- Pilih Jurusan --</option>
                            <?php foreach ($jurusan->result() as $n) { ?>
                            <option value="<?= $n->nm_jurusan; ?>"><?= $n->nm_jurusan; ?></option>
                            <?php  } ?>
                      </select>
                    </div>
                </div>

                <div class="form-group">
                  <label for="inputSkills" class="col-sm-3 control-label">Seksi</label>
                    <div class="col-sm-5">
                        <select class="form-control" name="diakui">
                            <option>-- Pilih Seksi --</option>
                                <?php foreach ($bagian->result() as $n) { ?>
                                <option value="<?= $n->nm_seksi; ?>"><?= $n->nm_seksi; ?></option>
                                <?php  } ?>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                  <label for="inputSkills" class="col-sm-3 control-label">Bagian</label>
                    <div class="col-sm-5">
                    <select class="form-control" name="diakui">
                            <option>-- Pilih Bagian --</option>
                                <?php foreach ($bagian->result() as $n) { ?>
                                <option value="<?= $n->nm_bagian; ?>"><?= $n->nm_bagian; ?></option>
                                <?php  } ?>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                  <label for="inputSkills" class="col-sm-3 control-label">Divisi</label>
                    <div class="col-sm-5">
                            <select class="form-control" name="diakui">
                                <option>-- Pilih Divisi --</option>
                                    <?php foreach ($bagian->result() as $n) { ?>
                                    <option value="<?= $n->nm_divisi; ?>"><?= $n->nm_divisi; ?></option>
                                    <?php  } ?>
                            </select>
                    </div>
                </div>

                <div class="form-group">
                  <label for="inputSkills" class="col-sm-3 control-label">Direktorat</label>
                    <div class="col-sm-4">
                        <select class="form-control" name="diakui">
                            <option>-- Pilih Direktorat --</option>
                                <?php foreach ($bagian->result() as $n) { ?>
                                <option value="<?= $n->nm_direktorat; ?>"><?= $n->nm_direktorat; ?></option>
                                <?php  } ?>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                  <label for="inputSkills" class="col-sm-3 control-label">Tempat Lahir</label>
                    <div class="col-sm-4">
                      <input type="text" class="form-control"  name="tempat" >
                    </div>
                </div>

                <div class="form-group">
                  <label for="inputSkills" class="col-sm-3 control-label">Tanggal Lahir</label>
                    <div class="col-sm-4">
                      <input type="date" class="form-control"  name="tgl" value="<?php echo date("Y-m-d"); ?>" >
                    </div>
                </div>

                <div class="form-group">
                  <label for="inputSkills" class="col-sm-3 control-label">Gender</label>
                    <div class="col-sm-3">
                    <select class="form-control" name="diakui">
                            <option>-- Pilih Jenis Kelamin --</option>
                            <option value="" >Laki - Laki</option>
                            <option value="" >Perempuan</option>   
                        </select>
                    </div>
                </div>

                <div class="form-group">
                  <label for="inputSkills" class="col-sm-3 control-label">Agama</label>
                    <div class="col-sm-3">
                        <select class="form-control" name="diakui">
                            <option>-- Pilih Agama --</option>
                                <?php foreach ($agama->result() as $n) { ?>
                                <option value="<?= $n->nm_agama; ?>"><?= $n->nm_agama; ?></option>
                                <?php  } ?>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                  <label for="inputSkills" class="col-sm-3 control-label">Gol. Darah</label>
                    <div class="col-sm-3">
                        <select class="form-control" name="diakui">
                            <option>-- Pilih Gol. Darah --</option>
                                <?php foreach ($darah->result() as $n) { ?>
                                <option value="<?= $n->nm_gol_darah; ?>"><?= $n->nm_gol_darah; ?></option>
                                <?php  } ?>
                        </select>  
                    </div>
                </div>

                <div class="form-group">
                  <label for="inputSkills" class="col-sm-3 control-label">St.Sipil</label>
                    <div class="col-sm-4">
                        <select class="form-control" name="diakui">
                            <option>-- Pilih Status Sipil --</option>
                                <?php foreach ($sipil->result() as $n) { ?>
                                <option value="<?= $n->nm_status_sipil; ?>"><?= $n->nm_status_sipil; ?></option>
                                <?php  } ?>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                  <label for="inputSkills" class="col-sm-3 control-label">Bangsa</label>
                    <div class="col-sm-5">
                      <input type="text" class="form-control"  value="Indonesia" name="bangsa" >
                    </div>
                </div>

                <div class="form-group">
                  <label for="inputSkills" class="col-sm-3 control-label">Suku</label>
                    <div class="col-sm-3">
                        <select class="form-control" name="diakui">
                            <option>-- Pilih Suku --</option>
                                <?php foreach ($suku->result() as $n) { ?>
                                <option value="<?= $n->nm_suku; ?>"><?= $n->nm_suku; ?></option>
                                <?php  } ?>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                  <label for="inputSkills" class="col-sm-3 control-label">No. Identitas</label>
                    <div class="col-sm-6">
                      <input type="text" class="form-control"  name="ktp" >
                    </div>
                </div>

                <div class="form-group">
                  <label for="inputExperience" class="col-sm-3 control-label">Alamat</label>
                    <div class="col-sm-6">
                      <textarea class="form-control" name="alamat"  rows="5"></textarea>
                    </div>
                </div>

                <div class="form-group">
                  <label for="inputSkills" class="col-sm-3 control-label">Kode Pos</label>
                    <div class="col-sm-4">
                      <input type="text" class="form-control"  name="kode_pos" >
                    </div>
                </div>

                <div class="form-group">
                  <label for="inputSkills" class="col-sm-3 control-label">No. Telp</label>
                    <div class="col-sm-4">
                      <input type="text" class="form-control"  name="no_telp" >
                    </div>
                </div>

                <div class="form-group">
                  <label for="inputSkills" class="col-sm-3 control-label">No. HP</label>
                    <div class="col-sm-4">
                      <input type="text" class="form-control"  name="no_hp" >
                    </div>
                </div>

                <div class="form-group">
                  <label for="inputSkills" class="col-sm-3 control-label">Email</label>
                    <div class="col-sm-5">
                      <input type="text" class="form-control"  name="email" >
                    </div>
                </div>

                <div class="form-group">
                  <label for="inputSkills" class="col-sm-3 control-label">Tinggi</label>
                    <div class="col-sm-3">
                      <input type="text" class="form-control"  name="tinggi" >
                    </div>
                </div>

                <div class="form-group">
                  <label for="inputSkills" class="col-sm-3 control-label">Berat</label>
                    <div class="col-sm-3">
                      <input type="text" class="form-control"  name="berat" >
                    </div>
                </div><br>

                <div class="form-group">
                    <div class="col-sm-10">
                      <center>
                        <button class="btn btn-success ">Simpan</button>&nbsp;&nbsp;
                        <a href="<?php echo base_url('spv/karyawan/profile');?>" class="btn btn-primary">Kembali</a>
                      </center>
                    </div>
                </div>

              </form>
            </div>
          </div>
        </div>
      </div>

    </div>

  </section>