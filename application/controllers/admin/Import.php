<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class import extends CI_Controller {


		public function __construct() {
                parent::__construct();
                if ($this->session->userdata('level')!="admin") {
                    redirect('auth');                        
            }
            
            $this->load->model('model_karyawan');
            $this->load->model('model_absensi');
            $this->load->model('model_cuti');
        }


        function finger(){

            $isi['nik']         = $this->session->userdata('nik');
            $isi['username']    = $this->session->userdata('username');
            $isi['content']     = 'admin/import/view_import';
            $isi['halaman']     = 'Halaman Absensi';
            $isi['judul']       = 'Import';
            $isi['subjudul']    = '';           
            $this->load->view('admin/dashbord_admin', $isi);
            
        }


        function karyawan(){

            $isi['nik']         = $this->session->userdata('nik');
            $isi['username']    = $this->session->userdata('username');
            $isi['content']     = 'admin/import/view_karyawan';
            $isi['halaman']     = 'Halaman Absensi';
            $isi['judul']       = 'Import';
            $isi['subjudul']    = '';           
            $this->load->view('admin/dashbord_admin', $isi);
        }


        function user(){

            $isi['nik']         = $this->session->userdata('nik');
            $isi['username']    = $this->session->userdata('username');
            $isi['content']     = 'admin/import/view_user';
            $isi['halaman']     = 'Halaman Absensi';
            $isi['judul']       = 'Import';
            $isi['subjudul']    = '';           
            $this->load->view('admin/dashbord_admin', $isi);  
        }


        public function form(){
        $data = array(); // Buat variabel $data sebagai array
        
        if(isset($_POST['preview'])){ // Jika user menekan tombol Preview pada form
            // lakukan upload file dengan memanggil function upload yang ada di SiswaModel.php
            $upload = $this->SiswaModel->upload_file($this->filename);
            
                if($upload['result'] == "success"){ // Jika proses upload sukses
                    // Load plugin PHPExcel nya
                    include APPPATH.'third_party/PHPExcel/PHPExcel.php';
                    
                    $excelreader = new PHPExcel_Reader_Excel2007();
                    $loadexcel = $excelreader->load('excel/'.$this->filename.'.xlsx'); // Load file yang tadi diupload ke folder excel
                    $sheet = $loadexcel->getActiveSheet()->toArray(null, true, true, true, true, true, true);
                    
                    // Masukan variabel $sheet ke dalam array data yang nantinya akan di kirim ke file form.php
                    // Variabel $sheet tersebut berisi data-data yang sudah diinput di dalam excel yang sudha di upload sebelumnya
                    $data['sheet'] = $sheet; 
                }else{ // Jika proses upload gagal
                    $data['upload_error'] = $upload['error']; // Ambil pesan error uploadnya untuk dikirim ke file form dan ditampilkan
                }
            }
            
            $this->load->view('spv/form', $data);
        }
    
    

    public function import(){
        // Load plugin PHPExcel nya
        include APPPATH.'third_party/PHPExcel/PHPExcel.php';
        
        $excelreader = new PHPExcel_Reader_Excel2007();
        $loadexcel   = $excelreader->load('excel/'.$this->filename.'.xlsx'); // Load file yang telah diupload ke folder excel
        $sheet       = $loadexcel->getActiveSheet()->toArray(null, true, true, true, true, true, true);
        
        // Buat sebuah variabel array untuk menampung array data yg akan kita insert ke database
        $data        = [];
        
        $numrow      = 1;
            
            foreach($sheet as $row){
                // Cek $numrow apakah lebih dari 1
                // Artinya karena baris pertama adalah nama-nama kolom
                // Jadi dilewat saja, tidak usah diimport
                if($numrow > 1){
                    // Kita push (add) array data ke variabel data
                    array_push($data, [
                        'nik'       =>$row['A'], 
                        'tgl_absen' =>$row['B'], 
                        'id_absen'  =>$row['C'],
                        'status'    =>$row['D'], 
                        'ref1'      =>$row['E'], 
                        'ref2'      =>$row['F'],  
                    ]);
                }
                
                $numrow++; // Tambah 1 setiap kali looping
            }

            // Panggil fungsi insert_multiple yg telah kita buat sebelumnya di model
            $this->SiswaModel->insert_multiple($data);
            
            redirect("spv/siswa"); // Redirect ke halaman awal (ke controller siswa fungsi index)
        }

    }


    

