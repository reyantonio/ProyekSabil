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
                  <th>NIK</th>
                  <th>NPWP</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                    <?php $no = 1;?>
                    <?php foreach ($npwp->result() as $n) { ?>
                    <tr>
                        <td width="2px"><?php echo $no; ?></td>
                        <td><?php echo $n->id_pemegang ?></td>
                        <td><?php echo $n->id_npwp ?></td>
                        <td></td>
                    </tr>
                    <?php $no++; } ?>
                </tbody>
          </table>
        </div>
    </div>
</section>
