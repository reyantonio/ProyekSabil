<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lembur extends CI_Controller {
        
        public $khusus   = 'khusus';
        public $reguler  = 'reguler';
        public $table    = 'cuti_master';
        public $tahun    = '2018';
        
    	public function __construct() {
                parent::__construct();
                if ($this->session->userdata('level')!= "spv") {
                    redirect('auth');                        
            }

            $this->load->model('model_absensi');
        }


        
        
 	}