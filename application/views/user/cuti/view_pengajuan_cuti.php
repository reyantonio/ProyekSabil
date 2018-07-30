<section class="content">
    <div class="box box-info">
        <div class="box-header with-border"><br>
          <center><h3 class="box-title center-block">CUTI REGULER</h3></center>
           <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                      title="Collapse">
                <i class="fa fa-minus"></i></button>
              <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                <i class="fa fa-times"></i></button>
            </div>
          </div>
        <!-- /.box-header -->
        <div class="box-body">
         <!-- form start -->
            <?php echo form_open('user/cuti/reguler');?>
              
              <div class="form-horizontal">
                <div class="row">
                  <div class="form-group"><br>
                    <label for="inputName" class="col-sm-4 control-label">Kode Cuti</label>
                    <div class="col-sm-4">
                      <input type="text" class="form-control" id="kode_cuti" name="kode_cuti" value="<?= $kode_reguler;?>" readonly="">
                    </div>
                  </div>
                </div>

              <input type="hidden" value="<?= $nik ;?>" name="id_karyawan" raedonly>
                
              <div class="form-horizontal">
                <div class="row">
                  <div class="form-group">
                    <label for="inputName" class="col-sm-4 control-label">Nama Karyawan</label>
                    <div class="col-sm-4">
                      <input type="text" class="form-control" id="inputName" name="nama_karyawan" value="<?= $username;?>" readonly="">
                    </div>
                  </div>
                </div>

                <form class="form-horizontal">
                  <div class="row">
                    <div class="form-group">
                      <label for="inputName" class="col-sm-4 control-label" >Mulai Cuti</label>
                      <div class="col-sm-2">
                        <input type="date" class="form-control" id="tgl_mulai" name="tgl_mulai" required="" value ="<?php echo date("Y-m-d"); ?>" >
                      </div>
                      <label for="inputName" class="col-sm-1 control-label">Akhir Cuti</label>
                      <div class="col-sm-2">
                        <input type="date" class="form-control" id="tgl_akhir" name="tgl_akhir" required="" value ="<?php echo date("Y-m-d"); ?>" >
                      </div>
                    </div>
                  </div>

                  <form class="form-horizontal">
                      <div class="row">
                        <div class="form-group">
                          <label for="inputName" class="col-sm-4 control-label">Alasan Cuti</label>
                          <div class="col-sm-5">
                            <textarea class="form-control" rows="4" placeholder="Alasan ..." name="alasan_cuti" required=""></textarea>
                          </div>
                        </div>
                      </div>

                  <input type="hidden" name="status_cuti" value="<?php echo "pengajuan";?>" readonly="">

                  <form class="form-horizontal">
                      <div class="row">
                        <div class="form-group">
                          <div class="col-md-10 control-label">
                            <div class="col-sm-6">
                              <input type="submit" class="btn btn-primary control-label " value="SIMPAN">
                            </div>
                            <div class="col-sm-1">
                              <a href="<?php echo base_url('user/cuti/rekap');?>" class="btn btn-danger control-label ">KEMBALI</a>
                            </div>
                          </div>  
                        </div>
                      </div>
                
              <?php echo form_close();?>
        </div>
    
        <div class="box-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                  <th>No</th>
                  <th>Tgl Mulai</th>
                  <th>Tgl Akhir</th>
                  <th>Alasan Cuti</th>
                  <th>Jumlah Cuti</th>
                  <th>Status Cuti</th>
                </tr>
            </thead>
                <tbody>
              <?php $no = 1;?>
                <?php foreach ($reguler->result() as $r) { ?>
                  <tr>
                    <td width="2"><?php echo $no;?></td>
                    <td><?php echo $r->tgl_mulai;?></td>
                    <td><?php echo $r->tgl_akhir;?></td>
                    <td><?php echo $r->alasan_cuti;?></td>
                    <td><?php echo $r->jml_hari;?></td>
                    <td>
                      <?php if($r->status_cuti == "pengajuan") { ;?>
                          
                          <label class="btn btn-warning btn-xs">
                            <?php echo $r->status_cuti ;?>
                          </label>

                        <?php }else if($r->status_cuti == "proses") { ?>

                          <label class="btn btn-success btn-xs">
                            <?php echo "Disetujui" ;?>
                          </label>

                        <?php }else  { ?>

                          <label class="btn btn-danger btn-xs">
                            <?php echo "Pending" ;?>
                          </label>

                        <?php } ?>

                    </td>
                  </tr>
              <?php $no++; } ?>
                </tbody>
          </table>
        </div>    
      </div>
   </div>
</section>

<!-- DATA CUTI KHUSUS -->
<section class="content">
    <div class="box box-info">
        <div class="box-header with-border"><br>
          <center><h3 class="box-title center-block">CUTI KHUSUS</h3></center>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                        title="Collapse">
                  <i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                  <i class="fa fa-times"></i></button>
              </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
         <!-- form start -->
            <?php echo form_open('user/cuti/khusus');?>
              
              <div class="form-horizontal">
                <div class="row"><br>
                  <div class="form-group">
                    <label for="inputName" class="col-sm-4 control-label">Kode Cuti</label>
                    <div class="col-sm-4">
                      <input type="text" class="form-control" id="inputName" name="kode_cuti" value="<?= $kode_khusus;?>" readonly="">
                    </div>
                  </div>
                </div>

              <input type="hidden" value="<?= $nik ;?>" name="id_karyawan" raedonly>
                
              <div class="form-horizontal">
                <div class="row">
                  <div class="form-group">
                    <label for="inputName" class="col-sm-4 control-label">Nama Karyawan</label>
                    <div class="col-sm-4">
                      <input type="text" class="form-control" id="inputName" name="nama_karyawan" value="<?= $username;?>" readonly="">
                    </div>
                  </div>
                </div>

                <form class="form-horizontal">
                  <div class="row">
                    <div class="form-group">
                      <label for="inputName" class="col-sm-4 control-label" >Mulai Cuti</label>
                      <div class="col-sm-2">
                        <input type="date" class="form-control" id="inputName" name="tgl_mulai" required="" value="<?php echo date('Y-m-d');?>" >
                      </div>
                      <label for="inputName" class="col-sm-1 control-label">Akhir Cuti</label>
                      <div class="col-sm-2">
                        <input type="date" class="form-control" id="inputName" name="tgl_akhir" required="" value="<?php echo date('Y-m-d');?>" >
                      </div>
                    </div>
                  </div>

                  <form class="form-horizontal">
                      <div class="row">
                        <div class="form-group">
                          <label for="inputName" class="col-sm-4 control-label">Alasan Cuti</label>
                          <div class="col-sm-5">
                            <textarea class="form-control" rows="4" placeholder="Alasan ..." name="alasan_cuti" required=""></textarea>
                          </div>
                        </div>
                      </div>

                  <input type="hidden" name="status_cuti" value="<?php echo "pengajuan";?>" readonly="">

                  <form class="form-horizontal">
                      <div class="row">
                        <div class="form-group">
                          <div class="col-md-10 control-label">
                            <div class="col-sm-6">
                              <input type="submit" class="btn btn-primary control-label " value="SIMPAN">
                            </div>
                            <div class="col-sm-1">
                              <a href="<?php echo base_url('user/cuti/rekap');?>" class="btn btn-danger control-label ">KEMBALI</a>
                            </div>
                          </div>  
                        </div>
                      </div>
                
              <?php echo form_close();?>
        </div>
    
        <div class="box-body">
          <table id="example2" class="table table-bordered table-striped">
            <thead>
                <tr>
                  <th>No</th>
                  <th>Tgl Mulai</th>
                  <th>Tgl Akhir</th>
                  <th>Alasan Cuti</th>
                  <th>Jumlah Cuti</th>
                  <th>Status Cuti</th>
                </tr>
            </thead>
                <tbody>
              <?php $no = 1;?>
                <?php foreach ($khusus->result() as $k) { ?>
                  <tr>
                    <td width="2"><?php echo $no;?></td>
                    <td><?php echo $k->tgl_mulai;?></td>
                    <td><?php echo $k->tgl_akhir;?></td>
                    <td><?php echo $k->alasan_cuti;?></td>
                    <td><?php echo $k->jml_hari;?></td>
                    <td>
                      <?php if($k->status_cuti == "pengajuan") { ;?>
                          
                          <label class="btn btn-warning btn-xs">
                            <?php echo $k->status_cuti ;?>
                          </label>

                        <?php }else if($k->status_cuti == "approve") { ?>

                          <label class="btn btn-success btn-xs">
                            <?php echo "Disetujui" ;?>
                          </label>

                        <?php }else  { ?>

                          <label class="btn btn-danger btn-xs">
                            <?php echo "Pending" ;?>
                          </label>

                        <?php } ?>

                    </td>
                  </tr>
              <?php $no++; } ?>
                </tbody>
          </table>
        </div>    
      </div>
   </div>
</section>






