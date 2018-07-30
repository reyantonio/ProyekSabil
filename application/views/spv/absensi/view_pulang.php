<section class="content">
    <div class="box">
        <div class="box-header">
          <h3 class="box-title center-block"></h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <table id="example2" class="table table-bordered table-striped">
            <thead>
                <tr>
                  <th>No</th>
                  <th>Nama</th>
                  <th>ID</th>
                  <th>Bagian</th>
                  <th>Tanggal Masuk</th>
                  <th>Jam Pulang</th>
                  <th>Referensi</th>
                  <th>Keterangan</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                <?php $no = 1;?>
                  <?php foreach($pulang as $m) {?>
                    <tr>
                      <td><?php echo $no;?></td>
                      <td><?php echo $m->nama;?></td>
                      <td><?php echo $m->nik;?></td>
                      <td><?php echo $m->bagian;?></td>
                      <td><?php echo $m->tanggal;?></td>
                      <td><?php echo $m->masuk;?></td>
                      <td><?php echo $m->status;?></td>
                      <td></td>
                      <td>
                        <a href="<?php echo site_url("spv/absensi/masuk/".$m->urut)?>" class="btn btn-success btn-xs" ><i class="glyphicon glyphicon-edit"  > Edit </i></a>
                        <button class="btn btn-danger  btn-xs"><i class="glyphicon glyphicon-trash" > Hapus</i></button>
                      </td>
                    </tr>
                  <?php $no++; } ?>
                </tbody>
          </table>
        </div>
    </div>
</section>