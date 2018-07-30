<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Karyawan extends CI_Controller {
        
        
    	public function __construct() {
                parent::__construct();
                if ($this->session->userdata('level')!= "spv") {
                    redirect('auth');                        
            }

            $this->load->model('model_karyawan');

          }

        
        public function profile(){

        	$spv                = $this->session->userdata('nik');
            $isi['nik']         = $this->session->userdata('nik');
            $isi['username']    = $this->session->userdata('username');
            $isi['cv']          = $this->model_karyawan->get_cv($nik='', $spv);
            $isi['content']     = 'spv/karyawan/view_cv';
            $isi['halaman']     = 'Halaman Karyawan';
            $isi['judul']       = 'DATA';
            $isi['subjudul']    = 'Pribadi';
        	$this->load->view('spv/dashbord_spv', $isi);
        }


        public function detail(){


            $nik                = $this->uri->segment(4);
            $spv                = $this->session->userdata('nik');
            $isi['nik']         = $this->session->userdata('nik');
            $isi['username']    = $this->session->userdata('username');
            $isi['cv']          = $this->model_karyawan->get_cv($nik, $spv='')->row();
            $isi['content']     = 'spv/karyawan/view_detail_cv';
            $isi['halaman']     = 'Halaman Karyawan';
            $isi['judul']       = 'DATA';
            $isi['subjudul']    = 'Pribadi';
            $this->load->view('spv/dashbord_spv', $isi);

        } 

        
        public function keluarga(){

        	$spv                = $this->session->userdata('nik');
            $isi['nik']         = $this->session->userdata('nik');
            $isi['username']    = $this->session->userdata('username');
            $isi['content']     = 'spv/karyawan/view_keluarga';
            $isi['halaman']     = 'Halaman Karyawan';
            $isi['judul']       = 'DATA';
            $isi['subjudul']    = 'Keluarga';
        	$this->load->view('spv/dashbord_spv', $isi);
        }

        public function kelengkapan(){

        	$spv                = $this->session->userdata('nik');
            $isi['nik']         = $this->session->userdata('nik');
            $isi['username']    = $this->session->userdata('username');
            $isi['content']     = 'spv/karyawan/view_kelengkapan';
            $isi['halaman']     = 'Halaman Karyawan';
            $isi['judul']       = 'DATA';
            $isi['subjudul']    = 'Kelengkapan';
        	$this->load->view('spv/dashbord_spv', $isi);
        } 

        public function pelatihan(){

        	$spv                = $this->session->userdata('nik');
            $isi['nik']         = $this->session->userdata('nik');
            $isi['username']    = $this->session->userdata('username');
            $isi['content']     = 'spv/karyawan/view_pelatihan';
            $isi['halaman']     = 'Halaman Karyawan';
            $isi['judul']       = 'DATA';
            $isi['subjudul']    = 'Pelatihan';
        	$this->load->view('spv/dashbord_spv', $isi);
        }

        public function form_tambah(){

        	$spv                = $this->session->userdata('nik');
            $isi['username']    = $this->session->userdata('username');
            $isi['id']          = $this->model_karyawan->get_user();
            $isi['pend']        = $this->model_karyawan->get_pendidikan();
            $isi['jurusan']     = $this->model_karyawan->get_jurusan();
            $isi['agama']       = $this->model_karyawan->get_agama();
            $isi['darah']       = $this->model_karyawan->get_darah();
            $isi['sipil']       = $this->model_karyawan->get_sipil();
            $isi['suku']        = $this->model_karyawan->get_suku();
            $isi['bagian']      = $this->model_karyawan->get_penempatan();
            $isi['content']     = 'spv/karyawan/view_form';
            $isi['halaman']     = 'Halaman Karyawan';
            $isi['judul']       = 'Data';
            $isi['subjudul']    = 'Karyawan';
        	$this->load->view('spv/dashbord_spv', $isi);
        }
}