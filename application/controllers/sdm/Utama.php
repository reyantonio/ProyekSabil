<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Utama extends CI_Controller {
        
        
    	public function __construct() {
                parent::__construct();
                if ($this->session->userdata('level')!="sdm") {
                    redirect('auth');                        
            }
            
            $this->load->model('model_user');
        }
        
        
        function index(){

                $isi['username']    = $this->session->userdata('username');
                $isi['content']     = 'sdm/content';
                $isi['halaman']     = 'Halaman Sdm';
                $isi['judul']       = 'Home';
                $isi['subjudul']    = '';
                $this->load->view('sdm/dashbord_sdm', $isi);
        }

        function logout() {
                $this->session->unset_userdata('username');
                $this->session->unset_userdata('level');
                session_destroy();
                redirect('auth');
        }
        
}        