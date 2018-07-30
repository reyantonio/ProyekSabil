<section class="content">
    <div class="box">
        <div class="box-header">
          <h3 class="box-title center-block"></h3>
        </div>
        <!-- /.box-header -->
        <form>
          <div class="box-body">

            <div>
            <a href="<?php echo base_url("spv/karyawan/form_tambah/");?>" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-search"> Tambah </i></a>&nbsp;&nbsp;
            <a href="<?php echo base_url("spv/laporan/pdf_all_cv/");?>" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-print"> All </i></a>
              </div><br>

            <table id="example1" class="table table-bordered table-striped">
              <thead>
                 <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>ID</th>
                    <th>Bagian</th>
                    <th>Foto</th>
                    <th>Status</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                   <?php $no=1;?>
                  <?php foreach($cv->result() as $row) {?>  
                    <tr>
                      <td><?= $no ?></td>
                      <td><?= $row->nama ?></td>
                      <td><?= $row->id ?></td>
                      <td><?= $row->bagian ?></td>
                      <td><img class="profile-user-img img-responsive" src="<?php echo base_url().$row->foto;?>" ></td>
                      <td><?= $row->status?></td>
                      <td>
                        <a href="<?php echo base_url("spv/karyawan/detail/").$row->id ;?>" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-search"> Detail </i></a>&nbsp;&nbsp;
                        <a href="<?php echo base_url("spv/laporan/pdf_detail_cv/").$row->id ;?>" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-print"> Print </i></a>
                      </td>
                    </tr>
                  <?php $no++?>
                  <?php } ?>
                  </tbody>
            </table>
          </div>
        </form>
    </div>
</section>