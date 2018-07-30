<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct() {
        parent::__construct();
        
        $this->load->model('model_user');
        $this->load->model('model_karyawan');
    }

    public function index() {
        
        $data['footer'] = 'Copyright &copy 2017 IT PT SABIL HUDA UTAMA';
        $this->load->view('login/form_login', $data);
    }

    public function cek_login() {
        
        if(isset($_POST['submit'])){

        $data = array(
                        'user_email' => $this->input->post('email', TRUE),
                        'user_password' => md5($this->input->post('password', TRUE)   
                    )
            );
            
        $hasil = $this->model_user->cek_user($data);
                
        if ($hasil->num_rows() == 1) {
                
            foreach ($hasil->result() as $sess) {
                    $sess_data['login']     = 'Sudah Loggin';
                    $sess_data['nik']       = $sess->user_nik;
                    $sess_data['email']     = $sess->user_email;
                    $sess_data['level']     = $sess->user_level;
                    $sess_data['status']    = $sess->status_user;
                    $this->session->set_userdata($sess_data);
                }
                    if ($this->session->userdata('level')=='admin' && $this->session->userdata('status')=='Y') {
                        
                        redirect('admin/utama');
                        
                    }elseif ($this->session->userdata('level')=='member' && $this->session->userdata('status')=='Y' ) {
                        
                        redirect('user/utama');
                        
                    }elseif ($this->session->userdata('level')=='spv' && $this->session->userdata('status')=='Y') {
                        
                        redirect('spv/utama');
                        
                    }elseif ($this->session->userdata('level')=='pengelola' && $this->session->userdata('status')=='Y') {
                        
                        redirect('pengelola/utama');
                        
                    }elseif ($this->session->userdata('level')=='direksi' && $this->session->userdata('status')=='Y' ) {
                        
                        redirect('direksi/utama');
                        
                    }elseif ($this->session->userdata('level')=='sdm' && $this->session->userdata('status')=='Y' ) {
                        
                        redirect('sdm/utama');
                        
                    }elseif ($this->session->userdata('level')=='kasie' && $this->session->userdata('status')=='Y' ) {
                        
                        redirect('kasie/utama');
                        
                    }elseif ($this->session->userdata('level')=='kabag' && $this->session->userdata('status')=='Y') {
                        
                        redirect('kabag/utama');
                        
                    }
                        
            
            }else {
                    
                    echo "Cek Username dan Password";
                    redirect('auth');
                    
            }

        }else{

            echo "login Gagal";
            redirect(''); 
                
        }

    }

    
}