<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Utama extends CI_Controller {
        
        
    	public function __construct() {
            parent::__construct();
            if ($this->session->userdata('level')!="pengelola") {
                redirect('auth');                        
            }
            
            $this->load->model('model_user');
        }
        
        public function index() {
            
            $nik                = $this->session->userdata('nik');    
            $isi['nik']         = $this->session->userdata('nik');
            $isi['username']    = $this->session->userdata('username');
            //$isi['pengajuan']   = $this->model_cuti->jml_pengajuan_member($nik)->row_array();
            //$isi['konfirmasi']  = $this->model_cuti->jml_konfirmasi_member($nik)->row_array();
            $isi['content']     = 'pengelola/content';
            $isi['halaman']     = 'Halaman Pengelola';
            $isi['judul']       = 'Home';
            $isi['subjudul']    = '';
            $this->load->view('pengelola/dashbord_pengelola', $isi);
        }


        public function profile(){
  
            $isi['nik']         = $this->session->userdata('nik');
            $isi['username']    = $this->session->userdata('username');
            $isi['content']     = 'pengelola/profile/view_profile';
            $isi['halaman']     = 'Halaman Pengelola';
            $isi['judul']       = 'Home';
            $isi['subjudul']    = 'Profile';
            $this->load->view('pengelola/dashbord_pengelola', $isi);

        }

        public function logout() {
                $this->session->unset_userdata('username');
                $this->session->unset_userdata('level');
                session_destroy();
                redirect('auth');
        }
        
}        