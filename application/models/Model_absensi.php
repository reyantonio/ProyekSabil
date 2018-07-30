<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_absensi extends CI_Model {

		function __construct(){

			parent::__construct();


		}


		//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		// UNTUK MEMBER
		//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		
			/**
		 * @param string $nik nomor nik nya
		 * @return mixed
		 */
		public function get_absen($nik){
			$column = "SELECT DISTINCT date_format(tgl_absen, '%Y-%m-%d') AS tanggal, date_format(tgl_absen, '%H:%i') as jam, status as status, nik as nik";
			$from = "FROM tbl_finger";
			$where = "WHERE nik  = '".$nik."'";
			$query = $column.' '.$from.' '.$where;
			return $this->db->query($query);
		}

		/**
		 * @param string $nik nomor nik nya
		 * @return mixed
		 */
		public function get_tanggal_aktif($nik){
			$column = "SELECT DISTINCT date_format(tgl_absen, '%Y-%m-%d') AS tanggal";
			$from = "FROM tbl_finger";
			$where = "WHERE nik  = '".$nik."'";
			$query = $column.' '.$from.' '.$where;
			return $this->db->query($query);
		}

        function get_all($nik){

        	$hasil = $this->db->query(" SELECT DISTINCT nik, date_format(tgl_absen, '%d/%m/%Y') AS tanggal, date_format(tgl_absen, '%H:%i') as masuk, date_format(tgl_absen, '%H:%i') as pulang, status FROM tbl_finger  WHERE nik  = '$nik' ");

		    return $hasil->result();
        } 

		// DATA KESATU AMBIL JAM MASUK
		function get_masuk($spv, $masuk){


		  $hasil = $this->db->query(" SELECT f.no_urut as urut, k.id_karyawan as nik, k.nama_karyawan as nama, k.penempatan as bagian, date_format(f.tgl_absen, '%d-%M-%Y') AS tanggal, date_format(f.tgl_absen, '%H:%i:%s') as masuk, f.status FROM tbl_finger as f , tbl_karyawan as k WHERE f.nik  = k.id_karyawan and k.id_spv = '$spv' and  status = '$masuk' ");

		  return $hasil->result();

		}

		//DATA KEDUA AMBIL JAM PULANG
		function get_pulang($spv, $pulang){


		  $hasil = $this->db->query(" SELECT f.no_urut as urut, k.id_karyawan as nik, k.nama_karyawan as nama, k.penempatan as bagian, date_format(f.tgl_absen, '%d-%M-%Y') AS tanggal, date_format(f.tgl_absen, '%H:%i:%s') as masuk, f.status FROM tbl_finger as f , tbl_karyawan as k WHERE f.nik  = k.id_karyawan and k.id_spv = '$spv' and  status = '$pulang' ");

		  return $hasil->result();

		}

		function get($spv){

		$hasil = $this->db->query(" SELECT f.no_urut as urut, k.id_karyawan as nik, k.nama_karyawan as nama, k.penempatan as bagian, date_format(f.tgl_absen, '%d-%M-%Y') AS tanggal, date_format(f.tgl_absen, '%H:%i:%s') as masuk, f.status FROM tbl_finger as f , tbl_karyawan as k WHERE f.nik  = k.id_karyawan and k.id_spv = '$spv' ");

		  return $hasil->result();
			
		}
		

		
}