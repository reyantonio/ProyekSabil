<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Utama extends CI_Controller {
        
        
    	public function __construct() {
                parent::__construct();
                if ($this->session->userdata('level')!="pu") {
                    redirect('auth');                        
            }
            $this->load->model('model_user');
        }
        
        public function index() {
                
                
                $isi['username']    = $this->session->userdata('username');
                $isi['content']     = 'pu/content';
                $isi['halaman']     = 'Halaman Perdagangan Umum';
                $isi['judul']       = 'Home';
                $isi['subjudul']    = '';
                $this->load->view('pu/dashbord_pu', $isi);
        }

        public function logout() {
                $this->session->unset_userdata('username');
                $this->session->unset_userdata('level');
                session_destroy();
                redirect('auth');
        }
        
}        