<section class="content">
            <div class="box">
                <div class="box-header"></br>
                  <h3 class="box-title center-block">Data Detail Khusus</h3>
                </div></br>
                <!-- /.box-header -->
                <div class="box-body">
                  <table id="example2" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                          <th>No</th>
                          <th>Nama</th>
                          <th>ID</th>
                          <th>Bagian</th>
                          <th>Mulai Cuti</th>
                          <th>Akhir Cuti</th>
                          <th>Jumlah Hari</th>
                          <th>Alasan Cuti</th>
                          <th>Aksi Cuti</th>
                        </tr>
                    </thead>
                        <tbody>
                      <?php $no = 1;?>
                        <?php foreach ($khusus->result() as $c) { ?>
                          <tr>
                            <td width="2"><?php echo $no;?></td>
                            <td><?php echo $c->nama_karyawan;?></td>
                            <td><?php echo $c->id_karyawan;?></td>
                            <td><?php echo $c->penempatan;?></td> 
                            <td><?php echo $c->tgl_mulai;?></td>
                            <td><?php echo $c->tgl_akhir;?></td>
                            <td><?php echo $c->jml_hari;?></td>
                            <td><?php echo $c->alasan_cuti;?></td>
                            <td>
                              <a href="<?php echo site_url("spv/cuti/formedit/" . $c->id_cuti_khusus); ?>" class="btn btn-success btn-xs" ><i class="glyphicon glyphicon-edit"> Ubah </i></a> &nbsp;
                              <a href="<?php echo site_url("spv/cuti/hapus/" . $c->id_cuti_khusus); ?>" class="btn btn-danger btn-xs" onclick = "return confirm('Yakin Akan Menghapus Data Ini!!! ') "><i class="glyphicon glyphicon-trash"> Hapus </i></a>
                            </td>
                          </tr>
                      <?php $no++; } ?>
                        </tbody>
                  </table>
                </div>
            </div>
       </section>     