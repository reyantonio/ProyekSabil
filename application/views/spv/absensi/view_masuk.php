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
                  <th>Nama</th>
                  <th>ID</th>
                  <th>Bagian</th>
                  <th>Tanggal Masuk</th>
                  <th>Jam Masuk</th>
                  <th>Referensi</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody id="absensi">
                <!--  -->
               </tbody>
          </table>
        </div>
    </div>
</section>

<script>
    $(document).ready(function(){
        
        tampil_data_barang();   //pemanggilan fungsi tampil barang.
         
        //$('#example1').dataTable();
          
        //fungsi tampil barang
        function tampil_data_barang(){
            $.ajax({
                type  : 'ajax',
                url   : '<?php echo base_url()?>spv/absensi/tes',
                async : false,
                dataType : 'json',
                success : function(data){
                    var html = '';
                    var i;
                    for(i=0; i<data.length; i++){
                        html += '<tr>'+
                                '<td>'+data[i].nik+'</td>'+
                                '<td>'+data[i].tgl_absen+'</td>'+
                                '<td>'+data[i].status+'</td>'+
                                '</tr>';
                    }
                    $('#absensi').html(html);
                }
 
            });
        }
 
    });
</script>