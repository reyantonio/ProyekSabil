<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Absensi extends CI_Controller {
        
        public $masuk        = 0;
        public $pulang       = 1;
        public $lmasuk       = 4;
        public $lpulang      = 5;

    	public function __construct() {
                
                parent::__construct();
                

                if ($this->session->userdata('level')!= "spv") {
                    redirect('auth'); 

                }

                $this->load->model('model_absensi');
                $this->load->model('model_cuti');
                $this->load->model('model_karyawan');
          }
        
        public function import(){

            $spv                = $this->session->userdata('nik');
            $isi['nik']         = $this->session->userdata('nik');
            $isi['username']    = $this->session->userdata('username');
            $isi['content']     = 'spv/absensi/view_import';
            $isi['halaman']     = 'Halaman Absensi';
            $isi['judul']       = 'Import';
            $isi['subjudul']    = 'Absen';
            $this->load->view('spv/dashbord_spv', $isi);

        }

        public function kosong(){

            $spv                = $this->session->userdata('nik');
            $isi['nik']         = $this->session->userdata('nik');
            $isi['username']    = $this->session->userdata('username');
            $isi['content']     = 'spv/absensi/view_kosong';
            $isi['halaman']     = 'Halaman Absensi';
            $isi['judul']       = 'Absensi';
            $isi['subjudul']    = 'Kosong';
            $this->load->view('spv/dashbord_spv', $isi);

        }

        public function terlambat(){

            $spv                = $this->session->userdata('nik');
            $isi['nik']         = $this->session->userdata('nik');
            $isi['username']    = $this->session->userdata('username');
            $isi['content']     = 'spv/absensi/view_terlambat';
            $isi['halaman']     = 'Halaman Absensi';
            $isi['judul']       = 'Absensi';
            $isi['subjudul']    = 'Terlambat';
            $this->load->view('spv/dashbord_spv', $isi);

            
        }

        public function harian(){

            $spv                = $this->session->userdata('nik');
            $isi['nik']         = $this->session->userdata('nik');
            $isi['username']    = $this->session->userdata('username');
            $isi['content']     = 'spv/absensi/view_harian';
            $isi['halaman']     = 'Halaman Absensi';
            $isi['judul']       = 'Absensi';
            $isi['subjudul']    = 'Harian';
            $this->load->view('spv/dashbord_spv', $isi);
            
        }

        public function masuk(){

            $masuk              = $this->masuk;

            $spv                = $this->session->userdata('nik');
            $isi['nik']         = $this->session->userdata('nik');
            $isi['username']    = $this->session->userdata('username');
            $isi['masuk']       = $this->model_absensi->get_masuk($spv, $masuk);
            $isi['content']     = 'spv/absensi/view_masuk';
            $isi['halaman']     = 'Halaman Absensi';
            $isi['judul']       = 'Absensi';
            $isi['subjudul']    = 'Masuk';
            $this->load->view('spv/dashbord_spv', $isi, $masuk);
            
        }


        public function pulang(){

            $pulang             = $this->pulang;

            $spv                = $this->session->userdata('nik');
            $isi['nik']         = $this->session->userdata('nik');
            $isi['username']    = $this->session->userdata('username');
            $isi['pulang']      = $this->model_absensi->get_pulang($spv, $pulang);
            $isi['content']     = 'spv/absensi/view_pulang';
            $isi['halaman']     = 'Halaman Absensi';
            $isi['judul']       = 'Absensi';
            $isi['subjudul']    = 'Masuk';
            $this->load->view('spv/dashbord_spv', $isi);
            
        }


        public function rekap(){

            $spv                = $this->session->userdata('nik');
            $isi['nik']         = $this->session->userdata('nik');
            $isi['username']    = $this->session->userdata('username');
            $isi['content']     = 'spv/absensi/view_rekap';
            $isi['halaman']     = 'Halaman Absensi';
            $isi['judul']       = 'Absensi';
            $isi['subjudul']    = 'Rekap';
            $this->load->view('spv/dashbord_spv', $isi);

        }

        public function logout() {
            $this->session->unset_userdata('username');
            $this->session->unset_userdata('level');
            session_destroy();
            redirect('auth');
        }

        public function tes(){

            $masuk              = $this->masuk;

            $spv                = $this->session->userdata('nik');
            $isi['nik']         = $this->session->userdata('nik');
            $isi['username']    = $this->session->userdata('username');
            $isi['jam']         = $this->model_absensi->get($spv);
            echo json_encode($isi['jam']);
            $isi['content']     = 'spv/absensi/view_masuk';
            $isi['halaman']     = 'Halaman Absensi';
            $isi['judul']       = 'Absensi';
            $isi['subjudul']    = 'Masuk';
            $this->load->view('spv/dashbord_spv', $isi);

        }
        
}        