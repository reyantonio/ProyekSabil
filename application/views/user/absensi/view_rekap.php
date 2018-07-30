<section class="content">
    <div class="box">
        <div class="box-header">
          <center><h3 class="box-title center-block">Data Absensi Karyawan</h3></center>
        </div><hr>
        <!-- /.box-header -->
        
        <div class="box-body">
          <form class="form-horizontal">
            <div class="row">
              <div class="form-group">
                <label for="inputName" class="col-sm-4 control-label">Nama Karyawan</label>
                <div class="col-sm-4">
                  <?php foreach ($bagian->result() as $n) { ?>
                  <input type="text" class="form-control" id="inputName" value="<?php echo $n->nama_karyawan;?>" readonly>
                  <?php  } ?>
                </div>
              </div>
            </div>
          <form class="form-horizontal">
            <div class="row">
              <div class="form-group">
                <label for="inputName" class="col-sm-4 control-label">Id Karyawan</label>
                <div class="col-sm-2">
                  <?php foreach ($bagian->result() as $n) { ?>
                  <input type="text" class="form-control" id="inputName" value="<?php echo $n->id_karyawan;?>" readonly>
                  <?php  } ?>
                </div>
              </div>
            </div>
          <form class="form-horizontal">
            <div class="row">
              <div class="form-group">
                <label for="inputName" class="col-sm-4 control-label">Bagian</label>
                <div class="col-sm-5">
                  <?php foreach ($bagian->result() as $n) { ?>
                  <input type="text" class="form-control" id="inputName" value="<?php echo $n->penempatan;?>" readonly>
                  <?php  } ?>
                </div>
              </div>
            </div></br>
        
        <table id="example1" class="table table-bordered table-striped">
          <thead>
              <tr>
                <th>No</th>
                <th>Hari</th>
                <th>Tanggal Absen</th>
                <th>Jam Masuk</th>
                <th>Jam Pulang</th>
                <th>Keterangan</th>
              </tr>
          </thead>
              <tbody>
                <?php
                  // inisialisasi lagi untuk masuk dan pulang
                  $masuk  = array(0,4);
                  $pulang = array(1,5);
                  $no     = 1;
                  foreach($absen as $key => $absen){
                    echo "<tr>";
                    echo "<td>".$no."</td>";
                    echo "<td></td>";
                    echo "<td>".$absen[0]."</td>";
                    // cek kalau kalau status nya ada di masuk, keluarkan jam masuk
                    if(in_array($absen[1][0],$masuk)){
                      echo "<td>".$absen[1][1]."</td>";
                    }else{
                      echo "<td> - </td>";
                    }
                    
                    // cek kalau kalau status nya ada di pulang, keluarkan jam pulang
                    if(in_array($absen[2][0],$pulang)){
                      echo "<td>".$absen[2][1]."</td>";
                    }else{
                      echo "<td> - </td>";
                    }
                    //bugnya adalah ketika data dari database ada yang dobel, contoh kalau pakai
                    // NIK orang ini, adalah pada tanggal 10 datanya ada 3
                    echo "<td></td>";
                    echo "</tr>";
                    $no++;
                  }
                ?>
            </tbody>
        </table>

      </div>
  </div>
</section>



