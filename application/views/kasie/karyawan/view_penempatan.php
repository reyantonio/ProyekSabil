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
                          <th>ID</th>
                          <th>Nama</th>
                          <th>Penempatan</th>
                          <th>Group</th>
                          <th>Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($penempatan->result() as $p) { ?>
                            <tr class="font-light">
                              <td><?php echo $p->id_karyawan ;?></td>
                              <td><?php echo $p->nama_karyawan ;?></td>
                              <td><?php echo $p->penempatan ;?></td>
                              <td><?php echo $p->grup ;?></td>
                              <td></td>
                            </tr>
                        <?php } ?>
                        </tbody>
                  </table>
                </div>
            </div>
       </section>
        
        <script>
            
        </script>
