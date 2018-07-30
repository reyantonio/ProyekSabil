
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cuti extends CI_Controller{
   
    private $from     = 'it@sabilhudautama.com' ;

    public function __construct() {
            parent::__construct();

            if ($this->session->userdata('level')!="member") {
                redirect('auth');
            }

            $this->load->model('model_user');
            $this->load->model('model_cuti');


        }
    
        
    
    public function pengajuan(){
            
            $nik                   = $this->session->userdata('nik');
            $isi['nik']            = $this->session->userdata('nik');
            $isi['username']       = $this->session->userdata('username');
            $isi['kode_reguler']   = $this->model_cuti->kodereguler();
            $isi['kode_khusus']    = $this->model_cuti->kodekhusus();
            $isi['reguler']        = $this->model_cuti->cuti_reguler_member($nik);
            $isi['khusus']         = $this->model_cuti->cuti_khusus_member($nik);
            $isi['content']        = 'user/cuti/view_pengajuan_cuti';
            $isi['halaman']        = 'Halaman Cuti';
            $isi['judul']          = 'PENGAJUAN';
            $isi['subjudul']       = 'Cuti';
            $this->load->view('user/dashbord_user', $isi);
    }

    public function rekap(){
            
            $email =$this->from;
            $nik                = $this->session->userdata('nik');
            $isi['nik']         = $this->session->userdata('nik');
            $isi['username']    = $this->session->userdata('username');
            $isi['bagian']      = $this->model_cuti->get_bagian($nik);
            $isi['reguler']     = $this->model_cuti->konfirm_member_reguler($nik);
            $isi['khusus']      = $this->model_cuti->konfirm_member_khusus($nik);
            $isi['content']     = 'user/cuti/view_rekap_cuti';
            $isi['halaman']     = 'Halaman Cuti';
            $isi['judul']       = 'REKAP';
            $isi['subjudul']    = 'Cuti';
            $this->load->view('user/dashbord_user', $isi);
    }

    public function reguler(){

            
            $tgl_sekarang   =  date('Y-m-d');
            $tgl_mulai      = $this->input->post('tgl_mulai');
            $tgl_akhir      = $this->input->post('tgl_akhir');
            $jml_hari       = ((abs(strtotime($tgl_mulai) - strtotime($tgl_akhir)))/(60*60*24)) + 1;

            //Validasi Backdate
            if($tgl_mulai < $tgl_sekarang){

                echo "<script>alert('Maaf Tanggal Mulai Salah');
                        window.location.href = 'pengajuan';
                      </script>";

            }else if($tgl_akhir < $tgl_sekarang){

                echo "<script>alert('Maaf Tanggal Mulai Salah');
                        window.location.href = 'pengajuan';
                      </script>";

            }else{

                $data = array(
                                'id_cuti_reguler'  => $this->input->post('kode_cuti'), 
                                'id_karyawan'      => $this->input->post('id_karyawan'),
                                'tgl_input'        => $tgl_sekarang, 
                                'tgl_mulai'        => $tgl_mulai, 
                                'tgl_akhir'        => $tgl_akhir,
                                'jml_hari'         => $jml_hari,
                                'alasan_cuti'      => $this->input->post('alasan_cuti'),
                                'status_cuti'      => $this->input->post('status_cuti'), 
                                'thn_cuti'         => date('Y')
                            );

                $this->db3->insert('cuti_reguler', $data);
                echo "<script>alert('Data Berhasil Ditambahkan');
                        window.location.href = 'pengajuan';
                      </script>";
            }

    }


    public function khusus(){

            $tgl_sekarang   =  date('Y-m-d');
            $tgl_mulai      = $this->input->post('tgl_mulai');
            $tgl_akhir      = $this->input->post('tgl_akhir');
            $jml_hari       = ((abs(strtotime($tgl_mulai) - strtotime($tgl_akhir)))/(60*60*24)) + 1;

            //Validasi Backdate
            if($tgl_mulai < $tgl_sekarang){

                echo "<script>alert('Maaf Tanggal Mulai Salah');
                        window.location.href = 'pengajuan';
                      </script>";

            }else if($tgl_akhir < $tgl_sekarang){

                echo "<script>alert('Maaf Tanggal Mulai Salah');
                        window.location.href = 'pengajuan';
                      </script>";

            }else{

                $data = array(
                                'id_cuti_khusus'   => $this->input->post('kode_cuti'), 
                                'id_karyawan'      => $this->input->post('id_karyawan'),
                                'tgl_input'        => $tgl_sekarang, 
                                'tgl_mulai'        => $tgl_mulai, 
                                'tgl_akhir'        => $tgl_akhir,
                                'jml_hari'         => $jml_hari,
                                'alasan_cuti'      => $this->input->post('alasan_cuti'),
                                'status_cuti'      => $this->input->post('status_cuti'), 
                                'thn_cuti'         => date('Y')
                            );

                $this->db3->insert('cuti_khusus', $data);

                $this->kirim_email_pengajuan();

                echo "<script>alert('Data Berhasil Ditambahkan');
                        window.location.href = 'pengajuan';
                      </script>";
            }

    }


    public function kirim_email_pengajuan(){

        $email = $this->from;
        $nik   = $this->session->userdata('nik');
        $nama   = $this->session->userdata('username');


        $config = [
               'useragent' => 'CodeIgniter',
               'protocol'  => 'smtp',
               'mailpath'  => '/usr/sbin/sendmail',
               'smtp_host' => 'mail.sabilhudautama.com',
               'smtp_user' => 'it@sabilhudautama.com',   // Ganti dengan email gmail Anda.
               'smtp_pass' => '1t$4b1l2017',             // Password gmail Anda.
               'smtp_port' => 587,
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
        $this->email->from($email);    // Email dan nama pegirim.
        //$this->email->to('aditya@sabilhudautama.com');                       // Penerima email.
        $this->email->to('rediridwan7@gmail.com');

        $this->email->set_mailtype('html');
 
        // Lampiran email. Isi dengan url/path file.
        //$this->email->attach('https://masrud.com/themes/masrud/img/logo.png');
        
        $pesan = '<h3 style=" background-color:DodgerBlue; color:#eaeaea; width:50%; font-size:12px; padding:20px; font-style:arial ">PT SABIL HUDA UTAMA</h3>';
        $pesan .= '<p>Karyawan dengan nik : ".<?php echo $nik ?>." </p>';
        $pesan .= '<p>Atas Nama : ".<?php echo $nama ?>." </p>';
        $pesan .= '<br><p>Telah Mengajukan Cuti</p>';
        $pesan .= '<br><p>Terima Kasih</p>';
        $pesan .= '<br><h3 style=" background-color:DodgerBlue; color:#eaeaea; width:50%; font-size:12px; padding:20px "><a href="absensi.sabilhudautama.com">LOGIN</a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Copyright &copy; 2018.  &nbsp;&nbsp;Team IT PT SABIL HUDA UTAMA </h3>';

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


}