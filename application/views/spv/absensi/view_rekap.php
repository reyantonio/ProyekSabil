<section class="content">
    <div class="box">
        <div class="box-header">
          <h3 class="box-title center-block">Rekap Absensi Outsourching</h3>
        </div><br>
        <!-- /.box-header -->
        <form class="form-horizontal">
              <div class="row">
                <div class="form-horizontal">
                  <div class="col-sm-6">
                    <div class="col-md-16">
                      <a href="<?php echo base_url();?>spv/absensi/import" class="btn btn-primary btn-sm "><i class="glyphicon glyphicon-plus"> IMPORT</i></a> &nbsp;
                      <a href="<?php echo base_url();?>spv/laporan/absensi_excel" class="btn btn-success btn-sm "><i class="glyphicon glyphicon-floppy-save"> EXCEL</i></a> &nbsp;
                      <a href="<?php echo base_url();?>spv/laporan/absensi_pdf" class="btn btn-danger btn-sm"><i class="glyphicon glyphicon-print"> SEMUA</i></a>
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
                  <th>Kerja Normal</th>
                  <th>Cuti</th>
                  <th>Alpa</th>
                  <th>Sakit</th>
                  <th>Total Masuk</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                  <td width="2px">1</td>
                  <td>Redi Muhamad Ridwan</td>
                  <td>10005</td>
                  <td>IT & GA</td>
                  <td>20</td>
                  <td width="2px">0</td>
                  <td width="2px">1</td>
                  <td width="2px">1</td>
                  <td>18</td>
                  <td>
                    <a href="<?php echo site_url("spv/cuti/detail/"); ?>" class="btn btn-warning btn-xs" ><i class="glyphicon glyphicon-search"> Detail </i></a> &nbsp;
                      <a href="<?php echo site_url("spv/laporan/cuti_pdf_detail/"); ?>" class="btn btn-danger btn-xs" ><i class="glyphicon glyphicon-print"> Print </i></a>
                  </td>
                </tr>
                </tbody>
          </table>
        </div>
    </div>
</section>