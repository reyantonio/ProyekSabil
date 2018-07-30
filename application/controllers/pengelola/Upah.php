<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Upah extends CI_Controller{
    
    
    public function __construct() {
            parent::__construct();
            if ($this->session->userdata('level')!="member") {
                redirect('auth');
            }

            //$this->load->model('model_absensi');
        }

    public function rekap(){
            
            $nik                = $this->session->userdata('nik');
            $isi['nik']         = $this->session->userdata('nik');
            $isi['username']    = $this->session->userdata('username');
            $isi['content']     = 'user/upah/view_upah';
            $isi['halaman']     = 'Halaman Upah';
            $isi['judul']       = 'UPAH';
            $isi['subjudul']    = 'Rekap';
            $this->load->view('user/dashbord_user', $isi);
    }

}