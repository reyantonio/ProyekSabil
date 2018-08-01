<section class="content">
    <div class="box box-info">
        <div class="box-header with-border"></br>
          <h3 class="box-title center-block">Konfirmasi Cuti Reguler</h3>
        </div></br>
        <!-- /.box-header -->
        <div class="box-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                  <th width="2">No</th>
                  <th>Kode</th>
                  <th>Nama</th>
                  <th>ID</th>
                  <th>Bagian</th>
                  <th>Hak Cuti</th>
                  <th>Total Cuti</th>
                  <th>Sisa Cuti</th>
                  <th>Status Cuti</th>
                  <th>Aksi Cuti</th>
                </tr>
            </thead>
                <tbody>
              <?php $no = 1;?>
                <?php foreach ($reguler->result() as $r) { ?>
                  <tr>
                    <td><?php echo $no;?></td>
                    <td><?php echo $r->id_cuti_reguler;?></td>
                    <td><?php echo $r->nama_karyawan;?></td>
                    <td><?php echo $r->id_karyawan;?></td>
                    <td><?php echo $r->penempatan;?></td>
                    <td><?php echo $r->sisa_cuti;?></td>
                    <td><?php echo $r->jml;?></td>
                    <td>
                      
                      <?php 
                      if (($r->sisa_cuti)-($r->jml) > 0) 
                        {echo ($r->sisa_cuti)-($r->jml);}
                      else if (($r->sisa_cuti)-($r->jml) > 6)
                        {echo "Habis";}
                      else
                        {echo ""; }

                        ?>
                        
                    </td>
                    <td>
                      <?php if($r->status_cuti == "pengajuan") { ;?>
                          
                          <label class="btn btn-warning btn-xs">
                            <?php echo $r->status_cuti ;?>
                          </label>

                        <?php }else if($r->status_cuti == "approve") { ?>

                          <label class="btn btn-success btn-xs">
                            <?php echo "Disetujui" ;?>
                          </label>

                        <?php }else  { ?>

                          <label class="btn btn-danger btn-xs">
                            <?php echo "Pending" ;?>
                          </label>

                        <?php } ?>

                    </td>
                    <td>
                       
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
        <div class="box-header"></br>
          <h3 class="box-title center-block">Konfirmasi Cuti Khusus</h3>
        </div></br>
        <!-- /.box-header -->
      <div class="box-body">
          <table id="example2" class="table table-bordered table-striped">
            <thead>
                <tr>
                  <th width="2">No</th>
                  <th>Kode</th>
                  <th>Nama</th>
                  <th>ID</th>
                  <th>Bagian</th>
                  <th>Total Cuti</th>
                  <th>Status Cuti</th>
                  <th>Aksi Cuti</th>
                </tr>
            </thead>
                <tbody>
              <?php $no = 1;?>
                <?php foreach ($khusus->result() as $r) { ?>
                  <tr>
                    <td><?php echo $no;?></td>
                    <td><?php echo $r->id_cuti_khusus;?></td>
                    <td><?php echo $r->nama_karyawan;?></td>
                    <td><?php echo $r->id_karyawan;?></td>
                    <td><?php echo $r->penempatan;?></td>
                    <td><?php echo $r->jml;?></td>
                    <td>
                      <td>
                      <?php if($r->status_cuti == "pengajuan") { ;?>
                          
                          <label class="btn btn-warning btn-xs">
                            <?php echo $r->status_cuti ;?>
                          </label>

                        <?php }else if($r->status_cuti == "approve") { ?>

                          <label class="btn btn-success btn-xs">
                            <?php echo "Disetujui" ;?>
                          </label>

                        <?php }else  { ?>

                          <label class="btn btn-danger btn-xs">
                            <?php echo "Pending" ;?>
                          </label>

                        <?php } ?>

                    </td>
                    <td>
                      <a href="<?php echo site_url("spv/cuti/status_approve/" . $r->id_cuti_khusus); ?>" onclick=" return confirm('Yakin Approve Cuti Karyawan???')" class="btn btn-primary btn-xs" ><i class="glyphicon glyphicon-pencil
                        "> Approve </i></a> 
                    </td>
                  </tr>
              <?php $no++; } ?>
                </tbody>
          </table>
        </div>
    </div>

</section>
