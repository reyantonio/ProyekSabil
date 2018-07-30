<section class="content">
    <div class="box">
        <div class="box-header"></br>
          <h3 class="box-title center-block">Data Cuti Reguler</h3>
        </div></br>
        <!-- /.box-header -->

          <form class="form-horizontal">
              <div class="row">
                <div class="form-horizontal">
                  <div class="col-sm-4">
                    <div class="col-md-12">
                      <a href="<?php echo base_url();?>spv/cuti/tambahreguler" class="btn btn-primary btn-sm "><i class="glyphicon glyphicon-plus"> DATA</i></a> &nbsp;
                      <a href="<?php echo base_url();?>spv/laporan/cuti_excel_reguler" class="btn btn-success btn-sm "><i class="glyphicon glyphicon-floppy-save"> EXCEL</i></a> &nbsp;
                      <a href="<?php echo base_url();?>spv/laporan/cuti_pdf" class="btn btn-danger btn-sm"><i class="glyphicon glyphicon-print"> SEMUA</i></a>
                    </div>
                  </div>   
                </div>
              </div><br>
              
        <div class="box-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                  <th>No</th>
                  <th>Nama</th>
                  <th>ID</th>
                  <th>Bagian</th>
                  <th>Hak Cuti</th>
                  <th>Total Cuti</th>
                  <th>Sisa Cuti</th>
                  <th>Aksi Cuti</th>
                </tr>
            </thead>
                <tbody>
              <?php $no = 1;?>
                <?php foreach ($p_reguler->result() as $r) { ?>
                  <tr>
                    <td width="2"><?php echo $no;?></td>
                    <td><?php echo $r->nama_karyawan;?></td>
                    <td><?php echo $r->id_karyawan;?></td>
                    <td><?php echo $r->penempatan;?></td>
                    <td><?php echo $r->quota;?></td>
                    <td><?php echo $r->jml;?></td>
                    <td>
                      
                      <?php 
                      if (($r->quota)-($r->jml) > 0) 
                        {echo ($r->quota)-($r->jml);}else
                        {echo "Habis";}?>
                        
                    </td>
                    <td>
                      <a href="<?php echo site_url("spv/cuti/detail_reguler/" . $r->id_karyawan); ?>" class="btn btn-warning btn-xs" ><i class="glyphicon glyphicon-search"> Detail </i></a> &nbsp;
                      <a href="<?php echo site_url("spv/laporan/cuti_pdf_detail/" . $r->id_karyawan); ?>" class="btn btn-danger btn-xs" ><i class="glyphicon glyphicon-print"> Print </i></a>
                    </td>
                  </tr>
              <?php $no++; } ?>
                </tbody>
          </table>
        </div>
    </div>
</section>


<section class="content">
     <div class="box">
        <div class="box-header">
          <h3 class="box-title center-block">Data Cuti Khusus</h3>
        </div><br>
        <!-- /.box-header -->

        <form class="form-horizontal">
              <div class="row">
                <div class="form-horizontal">
                  <div class="col-sm-4">
                    <div class="col-md-12">
                      <a href="<?php echo base_url();?>spv/cuti/tambahkhusus" class="btn btn-primary btn-sm "><i class="glyphicon glyphicon-plus"> DATA</i></a> &nbsp;
                      <a href="<?php echo base_url();?>spv/laporan/cuti_excel_khusus" class="btn btn-success btn-sm "><i class="glyphicon glyphicon-floppy-save"> EXCEL</i></a> &nbsp;
                      <a href="<?php echo base_url();?>spv/laporan/cuti_pdf_khusus" class="btn btn-danger btn-sm"><i class="glyphicon glyphicon-print"> SEMUA</i></a>
                    </div>
                  </div>   
                </div>
              </div><br>

        <div class="box-body">
          <table id="example2" class="table table-bordered table-striped">
            <thead>
                <tr>
                  <th>No</th>
                  <th>Nama</th>
                  <th>ID</th>
                  <th>Bagian</th>
                  <th>Total Cuti</th>
                  <th>Aksi Cuti</th>
                </tr>
            </thead>
                <tbody>
              <?php $no = 1;?>
                <?php foreach ($p_khusus->result() as $k) { ?>
                  <tr>
                    <td width="2"><?php echo $no;?></td>
                    <td><?php echo $k->nama_karyawan;?></td>
                    <td><?php echo $k->id_karyawan;?></td>
                    <td><?php echo $k->penempatan;?></td>
                    <td><?php echo $k->jml;?></td>
                    <td>
                      <a href="<?php echo site_url("spv/cuti/detail_khusus/" . $k->id_karyawan); ?>" class="btn btn-warning btn-xs" ><i class="glyphicon glyphicon-search"> Detail </i></a> &nbsp;
                      <a href="<?php echo site_url("spv/laporan/pdf_khusus_detail/" . $k->id_karyawan); ?>" class="btn btn-danger btn-xs" ><i class="glyphicon glyphicon-print"> Print </i></a>
                    </td>
                  </tr>
              <?php $no++; } ?>
                </tbody>
          </table>
        </div>
    </div>
</section>
