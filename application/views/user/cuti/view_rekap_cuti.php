<section class="content">
    <div class="box">
        <div class="box-header">
          <h3 class="box-title center-block">Data Cuti Karyawan</h3>
        </div>
        <!-- /.box-header -->
       
        <div class="box-body">
          <form class="form-horizontal">
            <div class="row">
              <div class="form-group">
                <label for="inputName" class="col-sm-4 control-label">Nama Karyawan</label>
                <div class="col-sm-4">
                  <?php foreach ($bagian->result() as $n) { ?>
                  <input type="text" class="form-control" id="inputName" value="<?php echo $n->nama_karyawan;?>" readonly>
                  <?php  } ?>
                </div>
              </div>
            </div>
          <form class="form-horizontal">
            <div class="row">
              <div class="form-group">
                <label for="inputName" class="col-sm-4 control-label">Id Karyawan</label>
                <div class="col-sm-2">
                  <?php foreach ($bagian->result() as $n) { ?>
                  <input type="text" class="form-control" id="inputName" value="<?php echo $n->id_karyawan;?>" readonly>
                  <?php  } ?>
                </div>
              </div>
            </div>
          <form class="form-horizontal">
            <div class="row">
              <div class="form-group">
                <label for="inputName" class="col-sm-4 control-label">Bagian</label>
                <div class="col-sm-5">
                  <?php foreach ($bagian->result() as $n) { ?>
                  <input type="text" class="form-control" id="inputName" value="<?php echo $n->penempatan;?>" readonly>
                  <?php  } ?>
                </div>
              </div>
            </div></br>
        <table id="example1" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>Tanggal Absen</th>
              <th>Jam Masuk</th>
              <th>Jam Pulang</th>
            </tr>
          </thead>
          <tbody>
            <?php
              
            ?>
          </tbody>
        </table>

         <form class="form-horizontal">
            <div class="row">
              <div class="form-group">
                <div class="col-sm-6 control-label">
                  <a href="<?php echo base_url();?>index.php/user/laporan/cuti_pdf" class="btn btn-danger btn-sm"><i class="glyphicon glyphicon-print"> PDF</i></a>&nbsp;
                  <a href="<?php echo base_url();?>index.php/user/utama" class="btn btn-primary btn-sm"><i class="glyphicon glyphicon-folder-close"> KEMBALI</i></a>
                </div>
              </div>
            </div>

      </div>
  </div>
</section>



