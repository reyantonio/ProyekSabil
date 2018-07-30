<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_karyawan extends CI_Model {
    
    function  __construct() {
        parent:: __construct();

    }

    function get_agama(){

        $this->db->select('*');
        $hasil = $this->db->get('cv_agama');
        return $hasil;

    }

    function get_darah(){

        $this->db->select('*');
        $hasil = $this->db->get('cv_darah');
        return $hasil;
        
    }

    function get_sipil(){

        $this->db->select('*');
        $hasil = $this->db->get('cv_sipil');
        return $hasil;
        
    }

    function get_suku(){

        $this->db->select('*');
        $hasil = $this->db->get('cv_suku');
        return $hasil;
        
    }

    function get_penempatan(){

        $this->db->select('*');
        $hasil = $this->db->get('cv_bagian');
        return $hasil;

    }

    function get_jurusan(){

        $this->db->select('*');
        $hasil = $this->db->get('cv_jurusan');
        return $hasil;

    }

    function get_user(){

        $this->db->select('*');
        $hasil = $this->db->get('user_master');
        return $hasil;

    }

    function get_pendidikan(){

        $this->db->select('*');
        $hasil = $this->db->get('cv_pendidikan');
        return $hasil;
    } 

    function get_cv($nik, $spv){

        if(!empty($nik)) {

        $query = " SELECT u.user_nik as nik , u.status_user as stat , u.user_email as email, m.nm_karyawan as nama, m.pend_diakui as diakui, m.pend_akhir as akhir, m.jurusan, m.seksi, m.bagian, m.divisi, m.direktorat, date_format(m.kont_awal, '%d-%m-%Y') as kont_awal, date_format(m.kont_akhir, '%d-%m-%Y') as kont_akhir, m.tmp_lahir as tempat, date_format(m.tgl_lahir, '%d-%m-%Y') as tgl, m.status, m.jenis_kelamin, m.agama, m.gol_darah, m.kode_sipil, m.suku, m.bangsa, m.ktp, m.alamat, m.kode_pos, m.no_telp, m.no_hp, m.email, m.tinggi, m.berat, m.foto  from user_master as u, cv_master as m where u.user_nik = '$nik' and m.id_karyawan = '$nik' and u.status_user = 'Y' ";
        
        $hasil = $this->db->query($query);
        return $hasil;

        }else{

            $query = " SELECT p.id_karyawan, p.id_spv , u.status_user, m.nm_karyawan as nama, m.id_karyawan as id, m.bagian, m.status, m.foto  from cv_penempatan as p, cv_master as m, user_master as u where p.id_karyawan = m.id_karyawan and p.id_spv = '$spv' and p.id_karyawan = u.user_nik and u.status_user = 'Y' ";
        
        $hasil = $this->db->query($query);
        return $hasil;
            
        }
    }

    function get_all_cv_spv($spv){

        $query = " SELECT p.id_karyawan, p.id_spv , u.status_user, m.id_karyawan, m.nm_karyawan as nama, m.pend_diakui as diakui, m.pend_akhir as akhir, m.jurusan, m.seksi, m.bagian, m.divisi, m.direktorat, date_format(m.kont_awal, '%d-%m-%Y') as kont_awal, date_format(m.kont_akhir, '%d-%m-%Y') as kont_akhir, m.tmp_lahir as tempat, date_format(m.tgl_lahir, '%d-%m-%Y') as tgl, m.status, m.jenis_kelamin, m.agama, m.gol_darah, m.kode_sipil, m.suku, m.bangsa, m.ktp, m.alamat, m.kode_pos, m.no_telp, m.no_hp, m.email, m.tinggi, m.berat, m.foto  from cv_penempatan as p, cv_master as m, user_master as u where p.id_karyawan = m.id_karyawan and p.id_spv = '$spv' and p.id_karyawan = u.user_nik and u.status_user = 'Y' ";
        
        $hasil = $this->db->query($query);
        return $hasil;

    }


    function get_keluarga($nik, $spv){

        if(!empty($nik)) {

            $query = " SELECT * FROM cv_keluarga WHERE id_karyawan = '$nik' ";
            
            $hasil = $this->db->query($query);
            return $hasil->row();
    
            }else{
    
                $query = " SELECT p.id_karyawan, p.id_spv , u.status_user, m.nm_karyawan as nama, m.id_karyawan as id, m.bagian, m.foto  from cv_penempatan as p, cv_master as m, user_master as u where p.id_karyawan = m.id_karyawan and p.id_spv = '$spv' and p.id_karyawan = u.user_nik and u.status_user = 'Y' ";
            
            $hasil = $this->db->query($query);
            return $hasil->result();
                
            }
    }


    function getStatus(){
        
        $this->db->order_by('id_karyawan', 'desc');
        $penempatan = $this->db->get('cv_penempatan');
        return $penempatan;
    }
    
    function getNpwp() {
        
        $this->db->order_by('id_npwp', 'desc');
        $npwp = $this->db->get('karyawan_npwp');
        return $npwp;       
    }
    
    function getKes(){
        
        $this->db->order_by('npp', 'desc');
        $kes = $this->db->get('karyawan_bpjs_kes');
        return $kes;
    }
    
    function getTk(){
        
        $this->db->order_by('no_peserta', 'desc');
        $tk = $this->db->get('karyawan_bpjs_tk');
        return $tk;
    }
    
    function getPeserta(){
        
        $data = 'PESERTA';
        $sql = "select * from karyawan_bpjs_kes where hubungan = '$data'";
        $kes = $this->db->query($sql);
        return $kes;
    }

    
}    