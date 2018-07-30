<section class="content">
  <div class="box">
          <div class="box-header">
            <h3 class="box-title center-block">LAPORAN REKAPITULASI CUTI KHUSUS</h3>
          </div>
          <!-- /.box-header -->
        <div class="box-body">
          <table class="table table-bordered table-striped">
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
                </tr>
            </thead>
                <tbody>
              <?php $no = 1;?>
                <?php foreach ($khusus->result() as $k) { ?>
                  <tr>
                    <td width="2"><?php echo $no;?></td>
                    <td><?php echo $k->nama_karyawan;?></td>
                    <td><?php echo $k->id_karyawan;?></td>
                    <td><?php echo $k->penempatan;?></td>
                    <td><?php echo $k->tgl_mulai;?></td>
                    <td><?php echo $k->tgl_akhir;?></td>
                    <td><?php echo $k->jml_hari;?></td>
                    <td><?php echo $k->alasan_cuti;?></td>
                  </tr>
              <?php $no++; } ?>
                </tbody>
          </table>
        </div>
    </div>

</section>