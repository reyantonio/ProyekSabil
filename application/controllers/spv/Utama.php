<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Utama extends CI_Controller {
        
        
    	public function __construct() {
            
            parent::__construct();
            if ($this->session->userdata('level')!="spv") {
                redirect('auth');                        
            }

            $this->load->model('model_user');
        }
        
        public function index() {
            
            $spv                = $this->session->userdata('nik');    
            $isi['username']    = $this->session->userdata('username');
            $isi['nik']         = $this->session->userdata('nik');
            $isi['p_reguler']   = $this->model_cuti->jml_pengajuan_reguler($spv) ->row_array();
            $isi['p_khusus']    = $this->model_cuti->jml_pengajuan_khusus($spv)->row_array();
            $isi['k_reguler']   = $this->model_cuti->jml_konfirmasi_reguler($spv) ->row_array();
            $isi['k_khusus']    = $this->model_cuti->jml_konfirmasi_khusus($spv)->row_array();
            $isi['content']     = 'spv/content';
            $isi['halaman']     = 'Halaman Supervisor';
            $isi['judul']       = 'Home';
            $isi['subjudul']    = '';
            $this->load->view('spv/dashbord_spv', $isi);
        }

        public function logout() {
            
            $this->session->unset_userdata('username');
            $this->session->unset_userdata('level');
            session_destroy();
            redirect('auth');
        } 
        
}        