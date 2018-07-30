<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Utama extends CI_Controller {
        
        private $from     = 'it@sabilhudautama.com' ;

    	public function __construct() {
            parent::__construct();
            if ($this->session->userdata('level')!="member") {
                redirect('auth');                        
            }

            $this->load->model('model_user');
            $this->load->model('model_karyawan');
        }
        
        public function index() {
            
            $nik                = $this->session->userdata('nik');
            $isi['nik']         = $this->session->userdata('nik'); 
            $isi['cv']          = $this->model_karyawan->get_cv($nik,$spv='')->row();
            $isi['pengajuan']   = $this->model_cuti->jml_pengajuan_member($nik)->row_array();
            $isi['konfirmasi']  = $this->model_cuti->jml_konfirmasi_member($nik)->row_array();
            $isi['content']     = 'user/content';
            $isi['halaman']     = 'Halaman User';
            $isi['judul']       = 'Home';
            $isi['subjudul']    = '';
            $this->load->view('user/dashbord_user', $isi);
        }


        public function profile(){

            $nik                = $this->session->userdata('nik');
            $isi['nik']         = $this->session->userdata('nik');
            $isi['username']    = $this->session->userdata('username');
            $isi['cv']          = $this->model_karyawan->get_cv($nik, $spv='')->row();
            $isi['content']     = 'user/profile/view_profile';
            $isi['halaman']     = 'Halaman User';
            $isi['judul']       = 'Home';
            $isi['subjudul']    = 'Profile';
            $this->load->view('user/dashbord_user', $isi);

        }

        
        public function keluarga(){

            $nik                = $this->session->userdata('nik');
            $isi['nik']         = $this->session->userdata('nik');
            $isi['cv']          = $this->model_karyawan->get_cv($nik, $spv='')->row();
            $isi['kel']         = $this->model_karyawan->get_keluarga($nik, $spv='');
            $isi['content']     = 'user/profile/view_keluarga';
            $isi['halaman']     = 'Halaman User';
            $isi['judul']       = 'Home';
            $isi['subjudul']    = 'Profile';
            $this->load->view('user/dashbord_user', $isi);

        }


        public function pelatihan(){

            $isi['nik']         = $this->session->userdata('nik');
            $isi['username']    = $this->session->userdata('username');
            $nik                = $this->session->userdata('nik');
            $isi['cv']          = $this->model_karyawan->get_cv($nik,$spv='')->row();
            $isi['content']     = 'user/profile/view_pelatihan';
            $isi['halaman']     = 'Halaman User';
            $isi['judul']       = 'Home';
            $isi['subjudul']    = 'Profile';
            $this->load->view('user/dashbord_user', $isi);

        }

        public function ubah_pass(){


            $nik            = $this->session->userdata('nik');
            $data           = $this->model_user->data_user($nik)->row();
            $email          = $this->input->post('email');
            $alternative    = $data->alternative;
            $pass_lama      = md5($this->input->post('pass_lama'));
            $pass_baru      = md5($this->input->post('pass_baru'));
            $level          = $data->lev;
            $status         = 'N';
            $saltid         = md5($email);

            
            if(isset($_POST['submit'])){

                if($data->pass == $pass_lama){

                    $data  = array(
                        
                        'user_nik'             => $nik,
                        'user_email'           => $email,
                        'alternative_email'    => $alternative,
                        'user_password'        => $pass_baru,
                        'user_level'           => $level,
                        'status_user'          => $status

                    );
                    
                    
                    $result = $this->model_user->ubah_pass($nik, $data);

                        if($result == true){

                            if($this->sendemail($email, $saltid)){  
                                // successfully sent mail to user email  
                                $this->session->set_flashdata('msg','<div class="alert alert-success text-center">Please confirm the mail sent to your email id to complete the registration.</div>');  
                                redirect(base_url());  
                                
                                }else{  
                                    
                                    $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Please try again ...</div>');  
                                    redirect(base_url());  
                            }

                        }else{

                            echo "<script>alert('Data Gagal Diproses');
                                            window.location.href = 'profile';
                                        </script>";
                        }

                }else{

                    echo "<script>alert('Maaf Password Lama Tidak Sesuai');
                        window.location.href = 'profile';
                      </script>";
                }
            }
            
        }

        public function registration()  
            {  
                 
                $saltid   = md5($email);  
                $status   = 0;  
                $data = array('fname' => $fname,  
                    'lname' => $lname,  
                    'email' => $email,  
                    'password' => $passhash,  
                    'status' => $status);  
                
                    if($this->user_model->insertuser($data)){  
                        
                        if($this->sendemail($email, $saltid)){  
                            // successfully sent mail to user email  
                            $this->session->set_flashdata('msg','<div class="alert alert-success text-center">Please confirm the mail sent to your email id to complete the registration.</div>');  
                            redirect(base_url());  
                            
                            }else{  
                                
                                $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Please try again ...</div>');  
                                redirect(base_url());  
                        }  
                    }else{  
                        
                        $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Something Wrong. Please try again ...</div>');  
                        redirect(base_url());  
                    }  
                }    
            
        public function sendemail($email,$saltid){  
            
            // configure the email setting  
            
            $config['protocol'] = 'smtp';  
            $config['smtp_host'] = 'ssl://smtp.gmail.com'; //smtp host name  
            $config['smtp_port'] = '465'; //smtp port number  
            $config['smtp_user'] = 'sabilhudautama2017@gmail.com';  
            $config['smtp_pass'] = 's4b1l2017*'; //$from_email password  
            $config['mailtype'] = 'html';  
            $config['charset'] = 'iso-8859-1';  
            $config['wordwrap'] = TRUE;  
            $config['newline'] = "\r\n"; //use double quotes  
            $this->email->initialize($config);  
            $url = base_url()."user/confirmation/".$saltid;  
            $this->email->from('sabilhudautama2017@gmail.com', 'CodesQuery');  
            $this->email->to($email);   
            $this->email->subject('Please Verify Your Email Address');  
            $message = "<html><head><head></head><body><p>Hi,</p><p>Thanks for registration with CodesQuery.</p><p>Please click below link to verify your email.</p>".$url."<br/><p>Sincerely,</p><p>CodesQuery Team</p></body></html>";  
            $this->email->message($message);  
            
            return $this->email->send();  
        }  


        public function confirmation($key) {  
                
            if($this->user_model->verifyemail($key))  
                {  
                    $this->session->set_flashdata('msg','<div class="alert alert-success text-center">Your Email Address is successfully verified!</div>');  
                    redirect(base_url());  
                }  
                else  
                {  
                    $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Your Email Address Verification Failed. Please try again later...</div>');  
                    redirect(base_url());  
                }  
            }  
        

        public function logout() {
                $this->session->unset_userdata('username');
                $this->session->unset_userdata('level');
                session_destroy();
                redirect('auth');
        }
        
}        