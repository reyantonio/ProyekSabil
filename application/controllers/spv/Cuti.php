<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cuti extends CI_Controller{
    

        

    public function __construct() {
            parent::__construct();
            if ($this->session->userdata('level')!= "spv") {
                redirect('auth');
            }

            $this->load->model('model_cuti');
        }
     
    public function tes(){

        $this->load->view('spv/cuti/view_tes');
    } 
        
    public function approve_spv(){

        $spv                        = $this->session->userdata('nik');
        $isi['nik']                 = $this->session->userdata('nik');
        $isi['username']            = $this->session->userdata('username');
        $isi['khusus']              = $this->model_cuti->get_cuti_khusus($spv);
        $isi['reguler']             = $this->model_cuti->get_cuti_reguler($spv);
        $isi['content']             = 'spv/cuti/view_approve';
        $isi['halaman']             = 'Halaman Cuti';
        $isi['judul']               = 'KONFIRMASI';
        $isi['subjudul']            = 'Cuti';
        $this->load->view('spv/dashbord_spv', $isi);

    }

    public function status_approve(){

        if(isset($_POST['submit'])){

                $kode      = $this->input->post('no_cuti');
                $tgl_mulai = $this->input->post('tgl_mulai');
                $tgl_akhir = $this->input->post('tgl_akhir');
                $jml_hari  = ((abs(strtotime($tgl_mulai) - strtotime($tgl_akhir)))/(60*60*24)) + 1;
                $status    = $this->input->post('status_cuti');
                $thn       = date('Y');
                
                    if($status === "proses")  {

                            $approve = "Y";
                        
                        }else{

                            $approve = "N";
                    }

                $data  = array(
                                 'id_cuti_reguler'  =>$kode,
                                 'id_karyawan'      =>$this->input->post('id_karyawan'),
                                 'tgl_mulai'        =>$tgl_mulai,
                                 'tgl_akhir'        =>$tgl_akhir,
                                 'jml_hari'         =>$jml_hari,
                                 'alasan_cuti'      =>$this->input->post('alasan_cuti'),
                                 'status_cuti'      =>$status,
                                 'approve_spv'      =>$approve,
                                 'thn_cuti'         =>$thn,
                              );

                $result = $this->model_cuti->approve_spv($kode, $data);

                        if($result == true){

                                echo "<script>alert('Data Berhasil Diapprove');
                                        window.location.href = 'approve_spv';
                                      </script>";
                                $this->kirim_email();

                            }else{

                                echo "<script>alert('Data Gagal Diapprove');
                                        window.location.href = 'rekap';
                                      </script>";
                        }

            }else{

                $id_cuti            = $this->uri->segment(4);
                $nik                = $this->session->userdata('nik');
                $isi['nik']         = $this->session->userdata('nik');
                $isi['username']    = $this->session->userdata('username');
                $isi['reguler']     = $this->model_cuti->get_id_reguler($id_cuti)->row_array();
                //$isi['khusus']      = $this->model_cuti->get_id_khusus($id_cuti)->row_array();
                $isi['content']     = 'spv/cuti/view_status';
                $isi['halaman']     = 'Halaman Cuti';
                $isi['judul']       = 'Persetujuan';
                $isi['subjudul']    = 'Cuti';
                $this->load->view('spv/dashbord_spv', $isi);
            }
    
    }

    public function rekap(){

        $spv                    = $this->session->userdata('nik');
        $isi['nik']             = $this->session->userdata('nik');
        $isi['username']        = $this->session->userdata('username');
        $isi['p_khusus']        = $this->model_cuti->get_konfirm_khusus($spv);
        $isi['p_reguler']       = $this->model_cuti->get_konfirm_reguler($spv);
        $isi['content']         = 'spv/cuti/view_rekap';
        $isi['halaman']         = 'Halaman Cuti';
        $isi['judul']           = 'REKAP';
        $isi['subjudul']        = 'Cuti';
        $this->load->view('spv/dashbord_spv', $isi);    
    }

    public function detail_reguler($id_karyawan){

        $isi['nik']         = $this->session->userdata('nik');
        $isi['username']    = $this->session->userdata('username');            
        $isi['reguler']     = $this->model_cuti->get_detail_reguler($id_karyawan);
        $isi['content']     = 'spv/cuti/view_detail_reguler';
        $isi['halaman']     = 'Halaman Cuti';
        $isi['judul']       = 'Detail';
        $isi['subjudul']    = 'Cuti';
        $this->load->view('spv/dashbord_spv', $isi);    
    }

    public function detail_khusus($id_karyawan){

        $isi['nik']         = $this->session->userdata('nik');
        $isi['username']    = $this->session->userdata('username');            
        $isi['khusus']      = $this->model_cuti->get_detail_khusus($id_karyawan);
        $isi['content']     = 'spv/cuti/view_detail_khusus';
        $isi['halaman']     = 'Halaman Cuti';
        $isi['judul']       = 'Detail';
        $isi['subjudul']    = 'Cuti';
        $this->load->view('spv/dashbord_spv', $isi);    
    }
    
    public function tambahreguler(){

        $spv                   = $this->session->userdata('nik');
        $isi['nik']            = $this->session->userdata('nik');
        $isi['username']       = $this->session->userdata('username');
        $isi['kode_reguler']   = $this->model_cuti->kodereguler();
        $isi['nama']           = $this->model_cuti->get_nama($spv);
        $isi['content']        = 'spv/cuti/view_form_reguler';
        $isi['halaman']        = 'Halaman Cuti';
        $isi['judul']          = 'FORM REGULER';
        $isi['subjudul']       = 'Cuti';
        $this->load->view('spv/dashbord_spv', $isi);

    }


    public function tambahkhusus(){

        $spv                   = $this->session->userdata('nik');
        $isi['nik']            = $this->session->userdata('nik');
        $isi['username']       = $this->session->userdata('username');
        $isi['kode_khusus']    = $this->model_cuti->kodekhusus();
        $isi['nama']           = $this->model_cuti->get_nama($spv);
        $isi['content']        = 'spv/cuti/view_form_khusus';
        $isi['halaman']        = 'Halaman Cuti';
        $isi['judul']          = 'FORM KHUSUS';
        $isi['subjudul']       = 'Cuti';
        $this->load->view('spv/dashbord_spv', $isi);

    }


    public function inputreguler(){
            
            
        $quota = 7;
        $tgl_mulai = $this->input->post('tgl_mulai');
        $tgl_akhir = $this->input->post('tgl_akhir');
        $jml_hari  = ((abs(strtotime($tgl_mulai) - strtotime($tgl_akhir)))/(60*60*24)) + 1;
        $status    = 'proses';
        $approve   = 'Y';

        $tglcuti = array(
                         'id_cuti_reguler'    =>$this->input->post('kode_cuti'),
                         'id_karyawan'        =>$this->input->post('id_karyawan'),
                         'tgl_mulai'          =>$tgl_mulai,
                         'tgl_akhir'          =>$tgl_akhir,
                         'jml_hari'           =>$jml_hari,
                         'alasan_cuti'        =>$this->input->post('alasan_cuti'),
                         'status_cuti'        =>$status,
                         'tgl_input'          =>date('Y-m-d'),
                         'approve_spv'        =>$approve,
                         'thn_cuti'           =>date('Y')
                         );
        
        if($jml_hari <=  $quota){                  
            
            $this->db3->insert('cuti_reguler', $tglcuti );
            echo "<script>alert('Data Berhasil Ditambahkan');
                                        window.location.href = 'rekap';
                                      </script>";
        
        }else{

            echo "<script>alert('Maaf Quota Cuti Habis');
                          window.location.href = 'rekap';
                 </script>";

        }

    }


    public function inputkhusus(){
            
            
        $quota = 7;
        $tgl_mulai = $this->input->post('tgl_mulai');
        $tgl_akhir = $this->input->post('tgl_akhir');
        $jml_hari  = ((abs(strtotime($tgl_mulai) - strtotime($tgl_akhir)))/(60*60*24)) + 1;
        $status    = 'proses';
        $approve   = 'Y';

        $tglcuti = array(
                         'id_cuti_khusus'    =>$this->input->post('kode_cuti'),
                         'id_karyawan'       =>$this->input->post('id_karyawan'),
                         'tgl_mulai'         =>$tgl_mulai,
                         'tgl_akhir'         =>$tgl_akhir,
                         'jml_hari'          =>$jml_hari,
                         'alasan_cuti'       =>$this->input->post('alasan_cuti'),
                         'status_cuti'       =>$status,
                         'tgl_input'         =>date('Y-m-d'),
                         'approve_spv'       =>$approve,
                         'thn_cuti'          =>date('Y')
                         );
        
        if($jml_hari <=  $quota){                  
            
            $this->db3->insert('cuti_khusus', $tglcuti );
            echo "<script>alert('Data Berhasil Ditambahkan');
                                        window.location.href = 'rekap';
                                      </script>";
        
        }else{

            echo "<script>alert('Maaf Quota Cuti Habis');
                          window.location.href = 'rekap';
                 </script>";

        }

    }

    
    public function formedit() {


        $id_cuti  = $this->uri->segment(4);
        $kode     = substr($id_cuti, 0, 2);
        
            if($kode == 'RG'){

                $nik                = $this->session->userdata('nik');
                $isi['nik']         = $this->session->userdata('nik');
                $isi['username']    = $this->session->userdata('username');
                $isi['cuti']        = $this->model_cuti->get_id_reguler($id_cuti)->row_array();
                $isi['content']     = 'spv/cuti/view_edit';
                $isi['halaman']     = 'Halaman Cuti';
                $isi['judul']       = 'Edit';
                $isi['subjudul']    = 'Cuti';
                $this->load->view('spv/dashbord_spv', $isi);

            }else{


                $nik                = $this->session->userdata('nik');
                $isi['nik']         = $this->session->userdata('nik');
                $isi['username']    = $this->session->userdata('username');
                $isi['cuti']        = $this->model_cuti->get_id_khusus($id_cuti)->row_array();
                $isi['content']     = 'spv/cuti/view_edit_khusus';
                $isi['halaman']     = 'Halaman Cuti';
                $isi['judul']       = 'Edit';
                $isi['subjudul']    = 'Cuti';
                $this->load->view('spv/dashbord_spv', $isi);

            }                
                            
        }    

    
    public function prosesedit(){

        $no        = $this->input->post('no_cuti');
        $kode      = substr($no, 0,2);
        $tgl_mulai = $this->input->post('tgl_mulai');
        $tgl_akhir = $this->input->post('tgl_akhir');
        
        $jml_hari  = ((abs(strtotime($tgl_mulai) - strtotime($tgl_akhir)))/(60*60*24)) + 1;

        $isi = array(
                         'id_karyawan'   =>$this->input->post('id_karyawan'),
                         'tgl_mulai'     =>$tgl_mulai,
                         'tgl_akhir'     =>$tgl_akhir,
                         'jml_hari'      =>$jml_hari,
                         'alasan_cuti'   =>$this->input->post('alasan_cuti')
                         );
        
        $result = $this->model_cuti->edit($kode, $isi, $no);

        if($result == true){

                echo "<script>alert('Edit Data Berhasil');
                                        window.location.href = 'rekap';
                                      </script>";

            }else{

                echo "<script>alert('Edit Data Gagal');
                                        window.location.href = 'rekap';
                                      </script>";
        }
    }

    public function hapus(){

        $no      = $this->uri->segment(4);
        $kode    = substr($no,0,2);
        $hasil   = $this->model_cuti->hapus($kode, $no);
        
        if($hasil == true)
            {

                echo "<script>alert('Hapus Data Berhasil');
                                        window.location.href = '../rekap';
                                      </script>";

            }

    }


    public function kirim_email_pengajuan(){


        $config = [
               'useragent' => 'CodeIgniter',
               'protocol'  => 'smtp',
               'mailpath'  => '/usr/sbin/sendmail',
               'smtp_host' => 'smtp.google.com',
               'smtp_user' => 'mardihuda83@gmail.com',   // Ganti dengan email gmail Anda.
               'smtp_pass' => 'mardi12345',             // Password gmail Anda.
               'smtp_port' => 465,
               'smtp_keepalive' => TRUE,
               'smtp_crypto' => 'SSL',
               'wordwrap'  => TRUE,
               'wrapchars' => 80,
               'mailtype'  => 'html',
               'charset'   => 'utf-8',
               'validate'  => TRUE,
               'crlf'      => "\r\n",
               'newline'   => "\r\n",
           ];
 
        // Load library email dan konfigurasinya.
        $this->load->library('email', $config);
 
        // Pengirim dan penerima email.
        $this->email->from('mardihuda83@gmail.com', 'PT SHU');    // Email dan nama pegirim.
        //$this->email->to('aditya@sabilhudautama.com');                       // Penerima email.
        $this->email->to('rediridwan7@gmail.com');

        $this->email->set_mailtype('html');
 
        // Lampiran email. Isi dengan url/path file.
        //$this->email->attach('https://masrud.com/themes/masrud/img/logo.png');
        
        /*$pesan = '<h3 style=" background-color:DodgerBlue; color:#eaeaea; width:50%; font-size:12px; padding:20px; font-style:arial ">PT SABIL HUDA UTAMA</h3>';
        $pesan .= '<br><p>Selamat Cuti Anda telah di Approve</p>';
        $pesan .= '<br><p>Terima Kasih</p>';
        $pesan .= '<br><h3 style=" background-color:DodgerBlue; color:#eaeaea; width:50%; font-size:12px; padding:20px "><a href="absensi.sabilhudautama.com">LOGIN</a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Copyright &copy; 2018.  &nbsp;&nbsp;Team IT PT SABIL HUDA UTAMA </h3>';*/

        $pesan = '<div><table style="width:477px"><tbody><tr style="background-color:#99ccff"><td style="text-align:center"><span>Penyampaian SPT Elektronik</span><br><span>© Direktorat Jenderal Pajak</span></td></tr><tr><td style="background-color:#ccffff;text-align:center">Berikut ini adalah Bukti Penerimaan Elektronik Anda.<br>------------------------------<wbr>---------------------</td></tr><tr><td style="background-color:#ccffff;text-align:center">Nama : YAYA SUPRIYADI<br>NPWP : 496289786009000<br>Tahun Pajak : 2017<br>Masa Pajak : -/-<br>Jenis SPT : 1770S<br>Pembetulan ke : 0<br>Status SPT : Nihil<br>Nominal : 0<br>Tanggal Penyampaian : 14/03/2018<br>Nomor Tanda Terima Elektronik : 727863063981894143410<br></td></tr><tr><td style="background-color:#ccffff;text-align:center">Terima kasih telah menyampaikan Laporan SPT Anda.</td></tr></tbody></table></div>';

        // Subject email.
        $this->email->subject('Tes Email Codeigniter');

        // Isi email. Bisa dengan format html.
        $this->email->message($pesan);
 
            if ($this->email->send())
            {
                echo 'Sukses! email berhasil dikirim.';
            }
            else
            {
                echo $this->email->print_debugger();
            }
        }
    

    public function logout() {
            
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('level');
        session_destroy();
        redirect('auth');
        }
    
    function template_email(){


    } 
}    