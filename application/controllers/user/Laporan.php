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
            $this->load->model('model_karyawan');
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

        public function cv_pdf(){

            $nik          = $this->session->userdata('nik');
            $data         = $this->model_karyawan->get_cv($nik, $spv='')->row();

            $tgl = $data->tgl;
  
            function hitung_umur($tgl) {
                list($day,$month,$year) = explode("-",$tgl);
                $year_diff  = date("Y") - $year;
                $month_diff = date("m") - $month;
                $day_diff   = date("d") - $day;
                
                if ($month_diff < 0) $year_diff--;
                    elseif (($month_diff==0) && ($day_diff < 0)) $year_diff--;

                $tahun = $year_diff.' Tahun '. $month_diff.' Bulan ';

                return $tahun;
            }
            
            
            $pdf = new FPDF('P','mm','A4');
            // membuat halaman baru
            $pdf->AddPage();
            $pdf->Image('assets/dist/img/logo.png',10,10,-230);
            $pdf->Image('assets/dist/img/biofarma.png',148,2,-230,25);
            $pdf->Image($data->foto ,130,45,-530,50);
            $pdf->Cell(190,20,'',0,1,'C');

            // Memberikan space kebawah agar tidak terlalu rapat
            $pdf->Cell(10,7,'',0,1);
            $pdf->SetFont('Arial','',10);
            $pdf->Cell(10,7,'',0,1);
            
            $pdf->Cell(25,6,'NIK',0,0);
            $pdf->Cell(5,6,':',0,0,'C');
            $pdf->Cell(38,6,$data->nik,0,1);
            
            $pdf->Cell(25,6,'Nama',0,0);
            $pdf->Cell(5,6,':',0,0,'C');
            $pdf->Cell(10,6,$data->nama,0,1);
            $pdf->Cell(10,7,'',0,1);

            $pdf->Cell(25,6,'Pend. Diakui',0,0);
            $pdf->Cell(5,6,':',0,0,'C');
            $pdf->Cell(35,6,$data->diakui,0,1);

            $pdf->Cell(25,6,'Pend. Akhir',0,0);
            $pdf->Cell(5,6,':',0,0,'C');
            $pdf->Cell(35,6,$data->diakui,0,1);

            $pdf->Cell(25,6,'Jurusan',0,0);
            $pdf->Cell(5,6,':',0,0,'C');
            $pdf->Cell(35,6,$data->jurusan,0,1);
            $pdf->Cell(10,8,'',0,1);

            $pdf->Cell(25,6,'Seksi',0,0);
            $pdf->Cell(5,6,':',0,0,'C');
            $pdf->Cell(35,6,$data->seksi,0,1);

            $pdf->Cell(25,6,'Bagian',0,0);
            $pdf->Cell(5,6,':',0,0,'C');
            $pdf->Cell(35,6,$data->bagian,0,1);

            $pdf->Cell(25,6,'Divisi',0,0);
            $pdf->Cell(5,6,':',0,0,'C');
            $pdf->Cell(35,6,$data->divisi,0,1);

            $pdf->Cell(25,6,'Direktorat',0,0);
            $pdf->Cell(5,6,':',0,0,'C');
            $pdf->Cell(35,6,$data->direktorat,0,0);
            $pdf->Cell(50,6,'',0,0);

            $pdf->Cell(25,6,'Kontrak Awal',0,0);
            $pdf->Cell(5,6,':',0,0,'C');
            $pdf->Cell(35,6,$data->kont_awal,0,1);

            $pdf->Cell(25,6,'No Ext',0,0);
            $pdf->Cell(5,6,':',0,0,'C');
            $pdf->Cell(35,6,'',0,0);
            $pdf->Cell(50,6,'',0,0);

            $pdf->Cell(25,6,'Kontrak Akhir',0,0);
            $pdf->Cell(5,6,':',0,0,'C');
            $pdf->Cell(35,6,$data->kont_akhir,0,1);
            $pdf->Cell(10,7,'',0,1);

            $pdf->Cell(25,6,'Status',0,0);
            $pdf->Cell(5,6,':',0,0,'C');
            $pdf->Cell(35,6,$data->status,0,1);
            $pdf->Cell(10,7,'',0,1);

            $pdf->Cell(25,6,'Tempat Lahir',0,0);
            $pdf->Cell(5,6,':',0,0,'C');
            $pdf->Cell(35,6,$data->tempat,0,1);

            $pdf->Cell(25,6,'Tgl Lahir',0,0);
            $pdf->Cell(5,6,':',0,0,'C');
            $pdf->Cell(35,6,$data->tgl,0,1);

            $pdf->Cell(25,6,'Umur',0,0);
            $pdf->Cell(5,6,':',0,0,'C');
            $pdf->Cell(35,6,hitung_umur($tgl),0,1);

            $pdf->Cell(25,6,'Gender',0,0);
            $pdf->Cell(5,6,':',0,0,'C');
            $pdf->Cell(35,6,$data->jenis_kelamin,0,1);

            $pdf->Cell(25,6,'Agama',0,0);
            $pdf->Cell(5,6,':',0,0,'C');
            $pdf->Cell(35,6,$data->agama,0,1);

            $pdf->Cell(25,6,'Gol. Darah',0,0);
            $pdf->Cell(5,6,':',0,0,'C');
            $pdf->Cell(35,6,$data->gol_darah,0,1);

            $pdf->Cell(25,6,'St. Sipil',0,0);
            $pdf->Cell(5,6,':',0,0,'C');
            $pdf->Cell(35,6,$data->kode_sipil,0,1);

            $pdf->Cell(25,6,'Bangsa',0,0);
            $pdf->Cell(5,6,':',0,0,'C');
            $pdf->Cell(35,6,$data->bangsa,0,1);

            $pdf->Cell(25,6,'Suku',0,0);
            $pdf->Cell(5,6,':',0,0,'C');
            $pdf->Cell(35,6,$data->suku,0,1);

            $pdf->Cell(25,6,'No. Identitas',0,0);
            $pdf->Cell(5,6,':',0,0,'C');
            $pdf->Cell(35,6,$data->ktp,0,1);

            $pdf->Cell(25,6,'Alamat',0,0);
            $pdf->Cell(5,6,':',0,0,'C');
            $pdf->Cell(35,6,$data->alamat,0,1);
            $pdf->Cell(10,7,'',0,1);

            $pdf->Cell(25,6,'Kode Pos',0,0);
            $pdf->Cell(5,6,':',0,0,'C');
            $pdf->Cell(35,6,$data->kode_pos,0,1);

            $pdf->Cell(25,6,'No. Telp',0,0);
            $pdf->Cell(5,6,':',0,0,'C');
            $pdf->Cell(35,6,$data->no_telp,0,1);

            $pdf->Cell(25,6,'No. Hp',0,0);
            $pdf->Cell(5,6,':',0,0,'C');
            $pdf->Cell(35,6,$data->no_hp,0,1);

            $pdf->Cell(25,6,'e-mail',0,0);
            $pdf->Cell(5,6,':',0,0,'C');
            $pdf->Cell(35,6,$data->email,0,1);
            $pdf->Cell(10,7,'',0,1);

            $pdf->Cell(25,6,'Tinggi',0,0);
            $pdf->Cell(5,6,':',0,0,'C');
            $pdf->Cell(35,6,$data->tinggi .' cm ',0,1);

            $pdf->Cell(25,6,'Berat',0,0);
            $pdf->Cell(5,6,':',0,0,'C');
            $pdf->Cell(35,6,$data->berat .' kg ',0,1);

            $pdf->Cell(38,6,'',0,1);

            $pdf->Output();
            
        }
            
 	}