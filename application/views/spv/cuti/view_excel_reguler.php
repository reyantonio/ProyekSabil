<section class="content">
    <div class="box">
        <div class="box-header">
          <h3 class="box-title center-block">LAPORAN REKAPITULASI CUTI REGULER</h3>
        </div></br>
        <!-- /.box-header -->
        <div class="box-body">
          <table class="table table-bordered table-striped">
            <thead>
                <tr>
                  <th>No</th>
                  <th>Nama</th>
                  <th>ID</th>
                  <th>Bagian</th>
                  <th>Hak Cuti</th>
                  <th>Total Cuti</th>
                  <th>Sisa Cuti</th>
                </tr>
            </thead>
                <tbody>
              <?php $no = 1;?>
                <?php foreach ($reguler->result() as $r) { ?>
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
                  </tr>
              <?php $no++; } ?>
                </tbody>
          </table>
        </div>
    </div><br>
    
</section>
