 <section class="content">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title center-block">Input Data Cuti</h3>
        </div></br>
                <!-- /.box-header -->
         <div class="box-body">
         <!-- form start -->
            <?php echo form_open('spv/cuti/inputreguler');?>

                <div class="form-horizontal">
                  <div class="row">
                    <div class="form-group">
                      <label for="inputName" class="col-sm-4 control-label">Kode Cuti</label>
                      <div class="col-sm-4">
                        <input type="text" class="form-control" id="inputName" name="kode_cuti" value="<?= $kode_reguler;?>" readonly="">
                      </div>
                    </div>
                </div>

              <div class="form-horizontal">
                <div class="row">
                  <div class="form-group">
                    <label for="inputName" class="col-sm-4 control-label">Nama Karyawan</label>
                    <div class="col-sm-4">
                      <select class="form-control" name="id_karyawan">
                        <?php foreach ($nama->result() as $n) { ?>
                          <option value="<?= $n->id_karyawan; ?>"><?= $n->nama_karyawan; ?></option>
                        <?php  } ?>
                      </select>
                    </div>
                  </div>
                </div>
                
                <form class="form-horizontal">
                  <div class="row">
                    <div class="form-group">
                      <label for="inputName" class="col-sm-4 control-label" >Mulai Cuti</label>
                      <div class="col-sm-2">
                        <input type="date" class="form-control" id="inputName" name="tgl_mulai" required="" value ="<?php echo date('Y-m-d'); ?>" >
                      </div>
                      <label for="inputName" class="col-sm-1 control-label">Akhir Cuti</label>
                      <div class="col-sm-2">
                        <input type="date" class="form-control" id="inputName" name="tgl_akhir" required="" value="<?php echo date("Y-m-d"); ?>" >
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

                  <form class="form-horizontal">
                      <div class="row">
                        <div class="form-group">
                          <div class="col-md-16 control-label">
                            <div class="col-sm-6">
                              <input type="submit" class="btn btn-primary control-label " value="SIMPAN">
                            </div>
                            <div class="col-sm-1">
                              <a href="<?php echo base_url('index.php/spv/cuti/rekap');?>" class="btn btn-danger control-label ">KEMBALI</a>
                            </div>
                          </div>  
                        </div>
                      </div>
                
              <?php echo form_close();?>
        </div>
      </div>
</section>