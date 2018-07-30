 <section class="content">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title center-block"></h3>
        </div></br>
                <!-- /.box-header -->
         <div class="box-body">
         
         <?php echo form_open('spv/cuti/status_approve');?> 

              <div class="form-horizontal">
                <div class="row">
                  <div class="form-group">
                    <input type="hidden" class="form-control" id="inputName" name="no_cuti" value="<?php echo $reguler['id_cuti_reguler'];?>" readonly>
                    <input type="hidden" class="form-control" id="inputName" name="id_karyawan" value="<?php echo $reguler['id_karyawan'];?>" readonly>
                    <label for="inputName" class="col-sm-4 control-label">Nama Karyawan</label>
                    <div class="col-sm-4">
                      
                      <input type="text" class="form-control" id="inputName" name="nama_karyawan" value="<?php echo $reguler['nama_karyawan'];?>" readonly>
                    </div>
                  </div>
                </div>
                
                <div class="form-horizontal">
                  <div class="row">
                    <div class="form-group">
                      <label for="inputName" class="col-sm-4 control-label" >Mulai Cuti</label>
                      <div class="col-sm-2">
                        <input type="date" class="form-control" id="inputName" name="tgl_mulai" value="<?php echo $reguler['tgl_mulai'] ;?>" readonly>
                      </div>
                      <label for="inputName" class="col-sm-1 control-label">Akhir Cuti</label>
                      <div class="col-sm-2">
                        <input type="date" class="form-control" id="inputName" name="tgl_akhir" value="<?php echo $reguler['tgl_akhir'] ;?>" readonly>
                      </div>
                    </div>
                  </div>
                </div>
                  <div class="form-horizontal">
                      <div class="row">
                        <div class="form-group">
                          <label for="inputName" class="col-sm-4 control-label">Alasan Cuti</label>
                          <div class="col-sm-5">
                            <textarea class="form-control" rows="4" placeholder="Alasan ..." name="alasan_cuti" required="" readonly=""><?php echo $reguler['alasan_cuti']; ?></textarea>
                          </div>
                        </div>
                      </div>
                    </div>  
                  <div class="form-horizontal">
                      <div class="row">
                        <div class="form-group">
                          <label for="inputName" class="col-sm-4 control-label">Ubah Status</label>
                          <div class="col-sm-3">
                            <select name="status_cuti" class="form-control">
    	                        <option value="pengajuan" 
                              <?php if($reguler['status_cuti'] === 'pengajuan'){ echo "selected";} ?> 
                              >Pengajuan</option>
    	                        <option value="proses" <?php if($reguler['status_cuti'] === 'approve'){ echo "selected";} ?> > Approve</option>
    	                        <option value="pending" <?php if($reguler['status_cuti'] === 'pending'){ echo "selected";} ?> >Pending</option>    
    	                      </select>
                          </div>
                        </div>
                      </div>
                  </div>
                  <input type="hidden" class="form-control" id="inputName" name="approve_spv" value="Y" readonly>
                  <div class="form-horizontal">
                      <div class="row">
                        <div class="form-group">
                          <div class="col-md-10 control-label">
                            <div class="col-sm-7">
                              <input type="submit" name='submit' class="btn btn-warning control-label " value="SETUJUI" >
                            </div>
                            <div class="col-sm-1">
                              <a href="<?php echo base_url();?>index.php/spv/cuti/rekap" class="btn btn-primary control-label ">KEMBALI</a>
                            </div>
                          </div>  
                        </div>
                      </div>
                   </div>
            <?php echo form_close();?>
        </div>
      </div>
</section>
