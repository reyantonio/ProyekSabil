<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_user extends CI_Model {
            
    public function cek_user($data)
	{
         $query = $this->db->get_where('user_master', $data);
	     return $query;
	}
	
	public function data_user($nik){

		$sql   = "SELECT u.user_nik as nik, u.user_email as email, u.alternative_email as alternative, u.user_password as pass, u.user_level as lev, u.status_user as stat, cv.nm_karyawan as nama FROM user_master as u, cv_master as cv WHERE u.user_nik = cv.id_karyawan and cv.id_karyawan = '$nik'  ";
		$query = $this->db->query($sql);
		return $query;
	}

	public function ubah_pass($nik, $data){

		$isi = array('user_nik' => $nik);
		$this->db->update('user_master', $data, $isi);

		if($this->db->affected_rows() == 1){

			return true;

		}else{
			
			return false;

		}
	
	 }
	 
	
   
   	public function verifyemail($key){  
	
		$data = array('status' => Y);  
		
		$this->db->where('md5(email)', $key);  
		return $this->db->update('user_master', $data);
	  
   }
}
