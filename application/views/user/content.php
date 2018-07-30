    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title"></h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
            <div class="row">
              <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-aqua">
                  <div class="inner">
                    <h3></h3>
                    <p>ABSEN MANUAL</p>
                    <label></label>  &nbsp; <label><?php echo "";?></label><br>
                    <label></label>  &nbsp; <label><?php echo "";?></label><br>
                  </div>
                  <div class="icon">
                    <i class="ion ion-person-stalker"></i>
                  </div>
                  <a href="#" class="small-box-footer">More Info<i class="fa fa-arrow-circle-right"></i></a>
                </div>
              </div>
              <!-- ./col -->
              <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-green">
                  <div class="inner">
                    <h3><sup style="font-size: 20px"></sup></h3>
                    <p>TERLAMBAT</p>
                    <label></label>  &nbsp; <label><?php echo "";?></label><br>
                    <label></label>  &nbsp; <label><?php echo "";?></label><br>
                  </div>
                  <div class="icon">
                    <i class="ion ion-pie-graph"></i>
                  </div>
                  <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
              </div>
              <!-- ./col -->
              <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-yellow">
                  <div class="inner">
                    <h3><sup style="font-size: 20px"></sup></h3>
                    <p>CUTI</p>
                    <label>Pengajuan</label>  :&nbsp; 
                    <label><?php  
                          if($pengajuan['jml_pengajuan'] > 0 )
                          { echo ' <span class="label label-primary">'. $pengajuan['jml_pengajuan'] .' </span>' ; }else
                          { echo 0;}
                           ;?>
                    </label><br>
                    
                    <label>Konfirmasi</label> :&nbsp; 
                    <label><?php 
                            if($konfirmasi['jml_konfirmasi'] > 0 )
                          { echo ' <span class="label label-primary">'. $konfirmasi['jml_konfirmasi'] .' </span>' ; }else
                          { echo 0;}
                           ;?>
                    </label><br>
                  </div>
                  <div class="icon">
                    <i class="ion ion-pie-graph"></i>
                  </div>
                  <a href="<?php echo base_url();?>index.php/user/cuti/pengajuan" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
              </div>
              <!-- ./col -->
              <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-red">
                  <div class="inner">
                    <h3></h3>
                    <p>LEMBUR</p>
                    <label></label>  &nbsp; <label><?php echo "";?></label><br>
                    <label></label>  &nbsp; <label><?php echo "";?></label><br>
                  </div>
                  <div class="icon">
                    <i class="ion ion-person"></i>
                  </div>
                  <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
              </div>
              <!-- ./col -->
            </div>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
          
        </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
