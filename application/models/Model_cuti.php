<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_cuti extends CI_Model {

          private $tahun     = '2018';
          private $reguler   = 'reguler';
          private $khusus    = 'khusus';
          private $pengajuan = 'pengajuan';
          private $proses    = 'proses';
          private $pending   = 'pending';

	        function __construct(){

              parent::__construct();


          }


          /////////////////////////////////////////////////////////////////////////////////////////////////////////////////
          // UNTUK SUPERVISOR
          /////////////////////////////////////////////////////////////////////////////////////////////////////////////////
          
          public function jml_pengajuan_reguler($spv){

            $kategori = $this->reguler;
            $thn      = $this->tahun;
            $status   = $this->pengajuan;

            $query = "SELECT c.status_cuti, COUNT(c.status_cuti) as 'pengajuan_spv', p.id_spv
                          FROM cuti_reguler as c, cv_master as k, cv_penempatan as p
                          WHERE p.id_karyawan = c.id_karyawan and p.id_spv = $spv and c.status_cuti = '$status' GROUP BY p.id_spv ";
            
            $data = $this->db->query($query);

            return $data;

          }


          public function jml_konfirmasi_reguler($spv){

            $kategori = $this->reguler;
            $thn      = $this->tahun;
            $status   = $this->proses;

            $query = "SELECT c.status_cuti, COUNT(c.status_cuti) as 'konfirmasi_spv'
                          FROM cuti_reguler as c, cv_master as k, cv_penempatan as p
                          WHERE p.id_karyawan = c.id_karyawan and p.id_spv = $spv and c.status_cuti = '$status' GROUP BY p.id_spv ";
            $data = $this->db->query($query);

             return $data;

          }


          public function jml_pengajuan_khusus($spv){

            $kategori = $this->reguler;
            $thn      = $this->tahun;
            $status   = $this->pengajuan;

            $query = "SELECT c.status_cuti, COUNT(c.status_cuti) as 'pengajuan_spv'
                          FROM cuti_khusus as c, cv_master as k, cv_penempatan as p
                          WHERE p.id_karyawan = c.id_karyawan and p.id_spv = $spv and c.status_cuti = '$status' GROUP BY p.id_spv ";
            
            $data = $this->db->query($query);

            return $data;

          }


          public function jml_konfirmasi_khusus($spv){

            $kategori = $this->reguler;
            $thn      = $this->tahun;
            $status   = $this->proses;

            $query = "SELECT c.status_cuti, COUNT(c.status_cuti) as 'konfirmasi_spv'
                          FROM cuti_khusus as c, cv_master as k, cv_penempatan as p
                          WHERE p.id_karyawan = c.id_karyawan and p.id_spv = $spv and c.status_cuti = '$status' GROUP BY p.id_spv ";
            $data = $this->db->query($query);

             return $data;

          }
          
          
          public function approve_spv($kode, $data){

              $isi = array('id_cuti_reguler' => $kode );
              $this->db->update('cuti_reguler' , $data ,$isi );
              
              if($this->db->affected_rows() == 1){

                  return true;

              }else{

                  return false;

              }


          }


          public function hapus($kode, $no){

              if($kode == 'RG'){

                $data = array('id_cuti_reguler' => $no );
                $this->db->delete('cuti_reguler',$data);

                if($this->db->affected_rows() > 0 )
                  {

                    return true;

                  }else{

                    return false;
                  }

              }else{

                $data = array('id_cuti_khusus' => $no );
                $this->db->delete('cuti_khusus',$data);

                if($this->db->affected_rows() > 0 )
                  {

                    return true;

                  }else{

                    return false;
                  }

                }

              
          }


          public function edit($kode, $isi, $no){


              if($kode == 'RG'){

                  $data = array('id_cuti_reguler' => $no );
                  $this->db->update('cuti_reguler',$isi, $data );
                  
                  if($this->db->affected_rows() == 1){

                      return true;

                  }else{

                      return false;

                  }

              }else{


                  $data = array('id_cuti_khusus' => $no );
                  $this->db->update('cuti_khusus',$isi, $data );
                  
                  if($this->db->affected_rows() == 1){

                      return true;

                  }else{

                      return false;

                  }

              }
              
          }

                
          public function get_id_reguler($id_cuti){
                

                $query = "SELECT k.nama_karyawan, k.id_karyawan , k.penempatan, c.id_cuti_reguler,  c.tgl_mulai, c.tgl_akhir, c.jml_hari, c.alasan_cuti, c.approve_spv, c.status_cuti 
                          FROM cuti_reguler as c, cv_master as k
                          WHERE c.id_cuti_reguler = '$id_cuti' and c.id_karyawan = k.id_karyawan
                          ORDER BY tgl_mulai DESC  ";
                $reguler = $this->db->query($query);
                
                return $reguler;

            }

          public function get_id_khusus($id_cuti){


                $query = "SELECT k.nama_karyawan, k.id_karyawan , k.penempatan, c.id_cuti_khusus,  c.tgl_mulai, c.tgl_akhir, c.jml_hari, c.alasan_cuti, c.approve_spv, c.status_cuti 
                          FROM cuti_khusus as c, cv_master as k
                          WHERE c.id_cuti_khusus = '$id_cuti' and c.id_karyawan = k.id_karyawan
                          ORDER BY c.tgl_mulai DESC  ";
                $reguler = $this->db->query($query);
                
                return $reguler;

            }  

          
          public function get_detail_reguler($id_karyawan){
                
                $kategori = $this->reguler;
                $thn      = $this->tahun;
                $status   = $this->proses;

                $query = "SELECT k.nama_karyawan, k.id_karyawan , k.penempatan, c.id_cuti_reguler ,  c.tgl_mulai, c.tgl_akhir, c.jml_hari, c.alasan_cuti, c.status_cuti  
                          FROM cuti_reguler as c, cv_master as k
                          WHERE c.id_karyawan = '$id_karyawan' and c.id_karyawan = k.id_karyawan and c.status_cuti = '$status'  ";

                $reguler = $this->db->query($query);
                
                return $reguler;

            }


          public function get_detail_khusus($id_karyawan){
                
                $kategori = $this->khusus;
                $thn      = $this->tahun;
                $status   = $this->proses;

                $query = "SELECT k.nama_karyawan, k.id_karyawan , k.penempatan, c.id_cuti_khusus ,  c.tgl_mulai, c.tgl_akhir, c.jml_hari, c.alasan_cuti, c.status_cuti  
                          FROM cuti_khusus as c, cv_master as k
                          WHERE c.id_karyawan = '$id_karyawan' and c.id_karyawan = k.id_karyawan and c.status_cuti = '$status' ";

                $reguler = $this->db->query($query);
                
                return $reguler;

            }  
          

          //data rekap cuti reguler 
          public function get_cuti_reguler($spv){

                $kategori  = $this->reguler;
                $thn       = $this->tahun;
                $status    = $this->pengajuan;

                $query = "SELECT k.nama_karyawan, k.id_karyawan , k.penempatan, q.sisa_cuti,  c.id_cuti_reguler, c.tgl_mulai, c.tgl_akhir, c.jml_hari, c.alasan_cuti, c.status_cuti, SUM(c.jml_hari) as 'jml'
                          FROM cuti_reguler as c, cv_master as k , tbl_quota_cuti as q
                          WHERE k.id_karyawan = c.id_karyawan and k.id_spv = '$spv'  and c.status_cuti = '$status' GROUP BY c.id_cuti_reguler ";
                          
                $reguler = $this->db->query($query);
                
                return $reguler;

            }

          //data rekap cuti khusus
        	public function get_cuti_khusus($spv){

                $kategori    = $this->khusus;
                $thn         = $this->tahun;
                $status      = $this->pengajuan;

                $query = "SELECT k.nama_karyawan, k.id_karyawan , k.penempatan, q.sisa_cuti,  c.id_cuti_khusus, c.tgl_mulai, c.tgl_akhir, c.jml_hari, c.alasan_cuti, c.status_cuti, SUM(c.jml_hari) as 'jml'
                          FROM cuti_khusus as c, cv_master as k, tbl_quota_cuti as q
                          WHERE k.id_karyawan = c.id_karyawan and k.id_spv = '$spv'  and c.status_cuti = '$status' GROUP BY c.id_karyawan ";
                          
                $khusus = $this->db->query($query);
                
                return $khusus;
            }

          
          //Data cuti sudah di konfirmasi
          public function get_konfirm_reguler($spv){

                $kategori  = $this->reguler;
                $thn       = $this->tahun;
                $status    = $this->proses;


                $query = "SELECT k.nama_karyawan, k.id_karyawan , k.penempatan, q.sisa_cuti as 'quota',  c.id_cuti_reguler, c.tgl_mulai, c.tgl_akhir, c.jml_hari, c.alasan_cuti, c.status_cuti, SUM(c.jml_hari) as 'jml'
                          FROM cuti_reguler as c, cv_master as k, tbl_quota_cuti as q
                          WHERE k.id_karyawan = c.id_karyawan and k.id_spv = $spv and c.status_cuti = '$status' GROUP BY c.id_karyawan ";
                          
                $reguler = $this->db->query($query);
                
                return $reguler;

            }
          

          //Data cuti sudah di konfirmasi  
          public function get_konfirm_khusus($spv){

                $kategori    = $this->khusus;
                $thn         = $this->tahun;
                $status      = $this->proses;

                $query = "SELECT k.nama_karyawan, k.id_karyawan , k.penempatan, q.sisa_cuti as 'quota',  c.id_cuti_khusus, c.tgl_mulai, c.tgl_akhir, c.jml_hari, c.alasan_cuti, c.status_cuti, SUM(c.jml_hari) as 'jml'
                          FROM cuti_khusus as c, cv_master as k, tbl_quota_cuti as q
                          WHERE k.id_karyawan = c.id_karyawan and k.id_spv = $spv  and c.status_cuti = '$status' GROUP BY c.id_karyawan  ";
                          
                $khusus = $this->db->query($query);
                
                return $khusus;

            }  



            /////////////////////////////////////////////////////////////////////////////////////////////////////////////////
            // UNTUK OUTSOURCHING
            ////////////////////////////////////////////////////////////////////////////////////////////////////////////////

          public function jml_pengajuan_member($nik){

          $kategori = $this->reguler;
          $thn      = $this->tahun;
          $status   = $this->pengajuan;

          $query = "SELECT c.status_cuti, COUNT(c.status_cuti) as 'jml_pengajuan'  
                        FROM cuti_reguler as c, cv_master as k
                        WHERE c.id_karyawan = k.id_karyawan and c.id_karyawan = $nik and c.status_cuti = '$status' GROUP BY c.id_karyawan ";
              
              $reguler = $this->db->query($query);

              return $reguler;

          }  

          public function jml_konfirmasi_member($nik){

            $kategori = $this->reguler;
            $thn      = $this->tahun;
            $status   = $this->proses;

            $query = "SELECT c.status_cuti, COUNT(c.status_cuti) as 'jml_konfirmasi'
                          FROM cuti_reguler as c, cv_master as k
                          WHERE k.id_karyawan = c.id_karyawan and c.id_karyawan = $nik and c.status_cuti = '$status' GROUP BY c.id_karyawan ";
            $data = $this->db->query($query);

             return $data;

          }



          public function konfirm_member_reguler($nik){

                $kategori = $this->reguler;
                $thn      = $this->tahun;
                $status   = $this->proses;

                $query = "SELECT k.nama_karyawan, k.id_karyawan , k.penempatan, c.tgl_mulai, c.tgl_akhir, c.jml_hari, c.alasan_cuti, c.status_cuti, c.approve_spv  
                          FROM cuti_reguler as c, cv_master as k
                          WHERE c.id_karyawan = '$nik' and c.id_karyawan = k.id_karyawan and c.approve_spv = 'Y'  and c.status_cuti = '$status' ";
                
                $reguler = $this->db->query($query);

                return $reguler;
          }



          public function konfirm_member_khusus($nik){

                $kategori = $this->reguler;
                $thn      = $this->tahun;
                $status   = $this->proses;

                $query = "SELECT k.nama_karyawan, k.id_karyawan , k.penempatan, c.tgl_mulai, c.tgl_akhir, c.jml_hari, c.alasan_cuti, c.status_cuti, c.approve_spv  
                          FROM cuti_khusus as c, cv_master as k
                          WHERE c.id_karyawan = '$nik' and c.id_karyawan = k.id_karyawan and c.approve_spv = 'Y'  and c.status_cuti = '$status' ";
                
                $reguler = $this->db->query($query);

                return $reguler;
          }


          public function cuti_reguler_member($nik){


                $query = "SELECT k.nama_karyawan, k.id_karyawan , k.penempatan, c.tgl_mulai, c.tgl_akhir, c.jml_hari, c.alasan_cuti, c.status_cuti, c.approve_spv  
                          FROM cuti_reguler as c, cv_master as k
                          WHERE c.id_karyawan = '$nik' and c.id_karyawan = k.id_karyawan
                          ORDER BY tgl_mulai DESC  ";
                
                $reguler = $this->db->query($query);

                return $reguler;
          }

          public function cuti_khusus_member($nik){


                $query = "SELECT k.nama_karyawan, k.id_karyawan , k.penempatan, c.tgl_mulai, c.tgl_akhir, c.jml_hari, c.alasan_cuti, c.status_cuti, c.approve_spv  
                          FROM cuti_khusus as c, cv_master as k
                          WHERE c.id_karyawan = '$nik' and c.id_karyawan = k.id_karyawan
                          ORDER BY tgl_mulai DESC  ";
                
                $reguler = $this->db->query($query);

                return $reguler;
          }





          //UMUM
          ///////////////////////////////////////////////////////////

          public function kodereguler(){

              $this->db->select('RIGHT(id_cuti_reguler,7) as kode', FALSE);
              $this->db->order_by('id_cuti_reguler','DESC');    
              $this->db->limit(1);     
              $query = $this->db->get('cuti_reguler');      //cek dulu apakah ada sudah ada kode di tabel.    
              if($query->num_rows() <> 0){       
               //jika kode ternyata sudah ada.      
               $data = $query->row();      
               $kode = intval($data->kode) + 1;     
              }
              else{       
               //jika kode belum ada      
               $kode = 00000001;     
              }
              $kodemax = str_pad($kode, 7, "0", STR_PAD_LEFT);    
              $kodejadi = "RG".$kodemax;     
              return $kodejadi; 
          } 

          public function kodekhusus(){

              $this->db->select('RIGHT(id_cuti_khusus,7) as kode', FALSE);
              $this->db->order_by('id_cuti_khusus','DESC');    
              $this->db->limit(1);     
              $query = $this->db->get('cuti_khusus');      //cek dulu apakah ada sudah ada kode di tabel.    
              if($query->num_rows() <> 0){       
               //jika kode ternyata sudah ada.      
               $data = $query->row();      
               $kode = intval($data->kode) + 1;     
              }
              else{       
               //jika kode belum ada      
               $kode = 00000001;     
              }
              $kodemax = str_pad($kode, 7, "0", STR_PAD_LEFT);    
              $kodejadi = "KS".$kodemax;     
              return $kodejadi; 
          }


          public function get_bagian($nik){


                $query = " SELECT k.nama_karyawan, k.id_karyawan , k.penempatan  
                          FROM cv_master as k 
                          WHERE k.id_karyawan = '$nik' ";
                
                $reguler = $this->db->query($query);

                return $reguler;
          }    

          public function get_nama($spv){


                $query = "SELECT k.nama_karyawan, k.id_karyawan , k.penempatan  
                          FROM cv_master as k
                          WHERE k.id_spv = '$spv'   ";
                
                $reguler = $this->db->query($query);

                return $reguler;
          }



}