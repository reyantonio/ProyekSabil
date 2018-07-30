<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {
        
        public $khusus   = 'khusus';
        public $reguler  = 'reguler';
        public $table    = 'cuti_master';
        public $tahun    = '2018';
        
    	public function __construct() {
                parent::__construct();
                if ($this->session->userdata('level')!="member") {
                    redirect('auth');                        
            }

            $this->load->model('model_user');
            $this->load->model('model_cuti');
            $this->load->library('pdf');
        }


        public function cuti_pdf(){

            $nik      = $this->session->userdata('nik');
            $cuti     = $this->model_cuti->cuti_konfirm_member($nik);
            $bagian   = $this->model_cuti->get_bagian($nik)->row_array();
            
            $pdf = new FPDF('P','mm','A4');
            // membuat halaman baru
            $pdf->AddPage();
            // setting jenis font yang akan digunakan
            $pdf->SetFont('Arial','B',12);
            // mencetak string
            $pdf->Image('assets/dist/img/logo.png',10,10,-300); 
            $pdf->Cell(190,20,'',0,1);
            $pdf->SetFont('Arial','B',10);
            $pdf->Cell(190,20,'FORM CUTI',0,1,'C');
            
            // Memberikan space kebawah agar tidak terlalu rapat
            $pdf->SetFont('Arial','B',10);
            $pdf->Cell(25,6,'NAMA',0,0);
            $pdf->Cell(5,6,':',0,0);
            $pdf->Cell(55,6,$bagian['nama_karyawan'],0,1);   
            
            $pdf->Cell(25,6,'ID',0,0);
            $pdf->Cell(5,6,':',0,0);      
            $pdf->Cell(55,6,$bagian['id_karyawan'],0,1);
            
            $pdf->Cell(25,6,'BAGIAN',0,0);
            $pdf->Cell(5,6,':',0,0);  
            $pdf->Cell(55,6,$bagian['penempatan'],0,1);
            
            $pdf->Cell(25,6,'SISA HAK CUTI 2018 = 7 HARI KERJA',0,1);
            $pdf->Cell(190,7,'',0,1,'C');

            $pdf->Cell(10,6,'NO',1,0,'C');
            $pdf->Cell(23,6,'MULAI',1,0,'C');
            $pdf->Cell(23,6,'SAMPAI',1,0,'C');
            $pdf->Cell(23,6,'KATEGORI',1,0,'C');
            $pdf->Cell(75,6,'ALASAN',1,0,'C');
            $pdf->Cell(20,6,'JUMLAH',1,0,'C');
            $pdf->Cell(20,6,'STATUS',1,1,'C');
            
            //isi dari database
            $no = 1;
            $pdf->SetFont('Arial','',9);

            foreach ($cuti->result() as $c) 
            {
                
                $pdf->Cell(10,6,$no,1,0,'C');
                $pdf->Cell(23,6,$c->tgl_mulai,1,0,'C');
                $pdf->Cell(23,6,$c->tgl_akhir,1,0,'C');
                $pdf->Cell(23,6,$c->kategori_cuti,1,0,'C');
                $pdf->Cell(75,6,$c->alasan_cuti,1,0,'C');
                $pdf->Cell(20,6,$c->jml_hari,1,0,'C');
                $pdf->Cell(20,6,$c->status_cuti,1,1,'C');
                $no++; 
            }

            $pdf->Output();
        }
            
 	}