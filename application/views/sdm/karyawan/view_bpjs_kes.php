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
                  <th>NAMA</th>
                  <th>KARTU</th>
                  <th>HUBUNGAN</th>
                  <th>STATUS</th>
                  <th>FASKES 1</th>
                  <th>IURAN</th>
                  <th>PENANGGUNG</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                    <?php $no = 1;?>
                    <?php foreach ($kes->result() as $k) { ?>
                    <tr>
                        <td width="2px"><?php echo $no; ?></td>
                        <td width="5px"><?php echo $k->nama_peserta ?></td>
                        <td><?php echo $k->no_kartu ?></td>
                        <td><?php echo $k->hubungan ?></td>
                        <td><?php echo $k->status_peserta ?></td>
                        <td><?php echo $k->faskes_1 ?></td>
                        <td><?php echo $k->iuran ?></td>
                        <td width="2px"><?php echo $k->penanggung ?></td>
                        <td></td>
                    </tr>
                    <?php $no++; } ?>
                </tbody>
          </table>
        </div>
    </div>
</section>
