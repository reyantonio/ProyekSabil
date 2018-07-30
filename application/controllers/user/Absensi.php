<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Absensi extends CI_Controller{
    
    public $masuk        = 0;
    public $pulang       = 1;
    public $lmasuk       = 4;
    public $lpulang      = 5;
    
    public function __construct() {
            parent::__construct();
            if ($this->session->userdata('level')!="member") {
                redirect('auth');
            }

            $this->load->model('model_absensi');
            $this->load->model('model_cuti');
            $this->load->model('model_karyawan');
        }
        
    
    public function rekap(){

            $masuk              = $this->masuk;
            $pulang             = $this->pulang;

            $nik                = $this->session->userdata('nik');
            $isi['nik']         = $this->session->userdata('nik');
            $isi['username']    = $this->session->userdata('username');
            $isi['bagian']      = $this->model_cuti->get_bagian($nik);
            $isi['absen']       = $this->data();
            $isi['refm']        = $this->masuk;
            $isi['refp']        = $this->pulang;
            $isi['content']     = 'user/absensi/view_rekap';
            $isi['halaman']     = 'Halaman Absensi';
            $isi['judul']       = 'ABSENSI';
            $isi['subjudul']    = 'Rekap';
            $this->load->view('user/dashbord_user', $isi);
    }

    public function terlambat(){
            
            $nik                = $this->session->userdata('nik');
            $isi['nik']         = $this->session->userdata('nik');
            $isi['username']    = $this->session->userdata('username');
            $isi['content']     = 'user/absensi/view_terlambat';
            $isi['halaman']     = 'Halaman Absensi';
            $isi['judul']       = 'ABSENSI';
            $isi['subjudul']    = 'Terlambat';
            $this->load->view('user/dashbord_user', $isi);
    }

    public function kosong(){
            
            $nik                = $this->session->userdata('nik');
            $isi['nik']         = $this->session->userdata('nik');
            $isi['username']    = $this->session->userdata('username');
            $isi['content']     = 'user/absensi/view_kosong';
            $isi['halaman']     = 'Halaman Absensi';
            $isi['judul']       = 'ABSENSI';
            $isi['subjudul']    = 'Kosong';
            $this->load->view('user/dashbord_user', $isi);
    }

    public function data(){

        $nik   = $this->session->userdata('nik');
        // kita jadikan array untuk kondisi masuk
        $masuk = array(0,4);
        // kita jadikan array untuk kondisi pulang
        $pulang = array(1,5);
        // siapkan array kosong tempat return
        $absensi = [];
        // penampung pembanding dari tanggal yang sudah dibandingkan
        $absensi_pembanding = [];
        // ambil tanggal aktif dari karyawannya
        $tanggal_aktif = $this->model_absensi->get_tanggal_aktif($nik)->result();
        // tanggal aktif tadi kita jadikan array dulu
        $tanggal_pembanding = [];
        // proses menjadikan array
        foreach($tanggal_aktif as $key => $data){
            array_push($tanggal_pembanding,$data->tanggal);
        }
        // ambil absensi karyawannya
        $absen = $this->model_absensi->get_absen($nik)->result();

        // ini proses yang cukup  menyita perhatian
        // pertama kita loop sebanyak tanggal masuk nya dia
        for ($i=0; $i < count($tanggal_pembanding); $i++) {
            // setiap absen yang masuk ke mesin kita loop
            for ($j=0; $j < count($absen) ; $j++) {
                // kalau tanggal yang ada di mesin sama dengan tanggal masuk dia
                if($absen[$j]->tanggal === $tanggal_pembanding[$i]){
                    // kalau gak ada di absensi pembanding, dimana absensi pembanding ini hasil
                    // dari if yang paling atas
                    if(!(in_array($absen[$j]->tanggal,$absensi_pembanding))){
                        // masukkan ke array, strukturnya adalah [0] = tanggalnya, [1] = array(status,jam_masuk),[2] = array(status, jam_keluar)
                        $absensi[$i] = array($absen[$j]->tanggal,array($absen[$j]->status,$absen[$j]->jam));
                    }else{
                        // ini bagian untuk memasukkan array ke 2
                        array_push($absensi[$i],array($absen[$j]->status,$absen[$j]->jam));
                    }
                    // ini bagian untuk menampung hasil dari perbandingan tanggal mesin dan tanggal masuk
                    array_push($absensi_pembanding,$absen[$j]->tanggal);
                }
            }
        }
        
        // return deh, bentuknya array, bisa dilihat di view kok :)
        return $absensi;
    }



    public function logout() {
            $this->session->unset_userdata('username');
            $this->session->unset_userdata('level');
            session_destroy();
            redirect('auth');
        }
    
}    