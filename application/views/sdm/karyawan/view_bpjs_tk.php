<section class="content">
    <div class="box">
        <div class="box-header">
          <h3 class="box-title center-block"></h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                  <th>No</th>
                  <th>No Peserta</th>
                  <th>Nama</th>
                  <th>Total Iuran</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                    <?php $no = 1;?>
                    <?php foreach ($tk->result() as $t) { ?>
                    <tr>
                        <td width="2px"><?php echo $no; ?></td>
                        <td><?php echo $t->no_peserta ?></td>
                        <td><?php echo $t->nama_peserta ?></td>
                        <td><?php echo $t->total ?></td>
                        <td></td>
                    </tr>
                    <?php $no++; } ?>
                </tbody>
          </table>
        </div>
    </div>
</section>
