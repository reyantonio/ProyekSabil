 <section class="content">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title center-block"></h3>
        </div></br>
                <!-- /.box-header -->
         <div class="box-body">
         
         <!-- form start -->
            <?php echo form_open('spv/cuti/prosesedit');?>
              <div class="form-horizontal">
                <div class="row">
                  <div class="form-group">
                    <input type="hidden" class="form-control" id="inputName" name="no_cuti" value="<?php echo $cuti['id_cuti_khusus'];?>" >
                    <input type="hidden" class="form-control" id="inputName" name="id_karyawan" value="<?php echo $cuti['id_karyawan'];?>" >
                    <label for="inputName" class="col-sm-4 control-label">Nama Karyawan</label>
                    <div class="col-sm-4">
                      
                      <input type="text" class="form-control" id="inputName" name="nama_karyawan" value="<?php echo $cuti['nama_karyawan'];?>" readonly>
                    </div>
                  </div>
                </div>
                
                <form class="form-horizontal">
                  <div class="row">
                    <div class="form-group">
                      <label for="inputName" class="col-sm-4 control-label" >Mulai Cuti</label>
                      <div class="col-sm-2">
                        <input type="date" class="form-control" id="inputName" name="tgl_mulai" value="<?php echo $cuti['tgl_mulai'] ;?>">
                      </div>
                      <label for="inputName" class="col-sm-1 control-label">Akhir Cuti</label>
                      <div class="col-sm-2">
                        <input type="date" class="form-control" id="inputName" name="tgl_akhir" value="<?php echo $cuti['tgl_akhir'] ;?>" >
                      </div>
                    </div>
                  </div>

                  
                  <form class="form-horizontal">
                      <div class="row">
                        <div class="form-group">
                          <label for="inputName" class="col-sm-4 control-label">Alasan Cuti</label>
                          <div class="col-sm-5">
                            <textarea class="form-control" rows="4" placeholder="Alasan ..." name="alasan_cuti" required=""><?php echo $cuti['alasan_cuti']; ?></textarea>
                          </div>
                        </div>
                      </div>

                  <form class="form-horizontal">
                      <div class="row">
                        <div class="form-group">
                          <div class="col-md-10 control-label">
                            <div class="col-sm-6">
                              <input type="submit" class="btn btn-primary control-label " value="EDIT"  name="submit">
                            </div>
                            <div class="col-sm-1">
                              <a href="<?php echo base_url();?>index.php/spv/cuti/rekap" class="btn btn-danger control-label ">KEMBALI</a>
                            </div>
                          </div>  
                        </div>
                      </div>
                
              <?php echo form_close();?>
        </div>
      </div>
</section>