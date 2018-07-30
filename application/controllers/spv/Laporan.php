<?php
defined('BASEPATH') OR exit('No direct script access allowed');

ini_set('memory_limit', '-1');
ini_set('max_execution_time', 3000);

class Laporan extends CI_Controller {
        
        public $khusus   = 'khusus';
        public $reguler  = 'reguler';
        public $table    = 'cuti_master';
        public $tahun    = '2018';
        
    	public function __construct() {
                parent::__construct();
                if ($this->session->userdata('level')!= "spv") {
                    redirect('auth');                        
            }

            $this->load->model('model_user');
            $this->load->model('model_cuti');
            $this->load->model('model_karyawan');
            $this->load->library('pdf');
        }

        //CUTI REGULER EXCEL
        public function cuti_excel_reguler(){

            header("Content-type:application/vnd.ms-excel");
            header("content-disposition:attachment;filename=laporan_cuti_reguler.xls");

            $spv                = $this->session->userdata('nik');
            $isi['nik']         = $this->session->userdata('nik');
            $isi['username']    = $this->session->userdata('username');
            $isi['reguler']     = $this->model_cuti->get_konfirm_reguler($spv);
            $this->load->view('spv/cuti/view_excel_reguler', $isi);

        }

        //CUTI KHUSUS EXCEL
        public function cuti_excel_khusus(){

            header("Content-type:application/vnd.ms-excel");
            header("content-disposition:attachment;filename=laporan_cuti_khusus.xls");

            $spv                = $this->session->userdata('nik');
            $isi['nik']         = $this->session->userdata('nik');
            $isi['username']    = $this->session->userdata('username');
            $isi['khusus']      = $this->model_cuti->get_konfirm_khusus($spv);
            $this->load->view('spv/cuti/view_excel_khusus', $isi);

        }


        public function cuti_pdf(){

            
            $pdf = new FPDF('P','mm','A4');
            // membuat halaman baru
            $pdf->AddPage();
            // setting jenis font yang akan digunakan
            $pdf->SetFont('Arial','B',12);
            // mencetak string 
            /*$pdf->Cell(190,10,'',0,1);*/
            $pdf->Image('assets/dist/img/logo.png',10,10,-300);
            $pdf->Cell(190,20,'',0,1,'C');
            $pdf->SetFont('Arial','B',10);
            $pdf->Cell(190,15,'LAPORAN REKAPITULASI CUTI TENAGA OUTSOURCHING',0,1,'C');
            
            // Memberikan space kebawah agar tidak terlalu rapat
            $pdf->Cell(10,7,'',0,1);
            $pdf->SetFont('Arial','B',9);
            $pdf->Cell(10,6,'NO',1,0,'C');
            $pdf->Cell(60,6,'NAMA',1,0,'C');
            $pdf->Cell(12,6,'ID',1,0,'C');
            $pdf->Cell(73,6,'BAGIAN',1,0,'C');
            $pdf->Cell(13,6,'HAK',1,0,'C');
            $pdf->Cell(13,6,'TOTAL',1,0,'C');
            $pdf->Cell(13,6,'SISA',1,1,'C');
            
            //isi dari database
            $spv  = $this->session->userdata('nik');
            $cuti = $this->model_cuti->get_konfirm_reguler($spv);
            $no = 1;
            $pdf->SetFont('Arial','',9);

            foreach ($cuti->result() as $c) 
            {
                
                $pdf->Cell(10,6,$no,1,0,'C');
                $pdf->Cell(60,6,$c->nama_karyawan,1,0);
                $pdf->Cell(12,6,$c->id_karyawan,1,0,'C');
                $pdf->Cell(73,6,$c->penempatan,1,0);
                $pdf->Cell(13,6,$c->quota,1,0,'C');
                $pdf->Cell(13,6,$c->jml,1,0,'C');
                $sisa = ($c->quota)-($c->jml);
                $pdf->Cell(13,6,$sisa,1,1,'C');
                $no++; 
            }

            $pdf->Output();
        }




        public function cuti_pdf_detail(){

            $id_karyawan  = $this->uri->segment(4);
            $spv          = $this->session->userdata('nik');
            $cuti         = $this->model_cuti->get_detail_reguler($id_karyawan);
            $bagian       = $this->model_cuti->get_detail_reguler($id_karyawan)->row_array();
            
            $pdf = new FPDF('P','mm','A4');
            // membuat halaman baru
            $pdf->AddPage();
            // setting jenis font yang akan digunakan
            $pdf->SetFont('Arial','B',16);
            // mencetak string 
            $pdf->Image('assets/dist/img/logo.png',10,10,-300);
            $pdf->Cell(190,20,'',0,1,'C');
            $pdf->SetFont('Arial','B',12);
            $pdf->Cell(190,7,'LAPORAN DETAIL CUTI KHUSUS TENAGA OUTSOURCHING',0,1,'C');
            
            // Memberikan space kebawah agar tidak terlalu rapat
            $pdf->Cell(10,7,'',0,1);
            $pdf->SetFont('Arial','B',10);
            
            $pdf->Cell(25,6,'NAMA',0,0);
            $pdf->Cell(5,6,':',0,0,'C');
            $pdf->Cell(38,6,$bagian['nama_karyawan'],0,1);
            
            $pdf->Cell(25,6,'ID',0,0);
            $pdf->Cell(5,6,':',0,0,'C');
            $pdf->Cell(10,6,$bagian['id_karyawan'],0,1);

            $pdf->Cell(25,6,'BAGIAN',0,0);
            $pdf->Cell(5,6,':',0,0,'C');
            $pdf->Cell(35,6,$bagian['penempatan'],0,1);
            $pdf->Cell(38,6,'',0,1);

            $pdf->Cell(10,6,'NO',1,0,'C');
            $pdf->Cell(25,6,'TGL MULAI',1,0,'C');
            $pdf->Cell(25,6,'TGL AKHIR',1,0,'C');
            $pdf->Cell(10,6,'JML',1,0,'C');
            $pdf->Cell(80,6,'ALASAN CUTI',1,0,'C');
            $pdf->Cell(20,6,'STATUS',1,1,'C');
            
            
            //isi dari database
            $no = 1;
            $pdf->SetFont('Arial','',10);

            foreach ($cuti->result() as $c) 
            {
                
                $pdf->Cell(10,6,$no,1,0,'C');
                $pdf->Cell(25,6,$c->tgl_mulai,1,0,'C');
                $pdf->Cell(25,6,$c->tgl_akhir,1,0,'C');
                $pdf->Cell(10,6,$c->jml_hari,1,0,'C');
                $pdf->Cell(80,6,$c->alasan_cuti,1,0);
                $pdf->Cell(20,6,$c->status_cuti,1,1,'C');
                $no++; 
            }

            $pdf->Output();
        }




        public function cuti_pdf_khusus(){

            
            $pdf = new FPDF('P','mm','A4');
            // membuat halaman baru
            $pdf->AddPage();
            // setting jenis font yang akan digunakan
            $pdf->SetFont('Arial','B',12);
            // mencetak string 
            /*$pdf->Cell(190,10,'',0,1);*/
            $pdf->Image('assets/dist/img/logo.png',10,10,-300);
            $pdf->Cell(190,20,'',0,1,'C');
            $pdf->SetFont('Arial','B',10);
            $pdf->Cell(190,15,'LAPORAN REKAPITULASI CUTI KHUSUS TENAGA OUTSOURCHING',0,1,'C');
            
            // Memberikan space kebawah agar tidak terlalu rapat
            $pdf->Cell(10,7,'',0,1);
            $pdf->SetFont('Arial','B',9);
            $pdf->Cell(10,6,'NO',1,0,'C');
            $pdf->Cell(60,6,'NAMA',1,0,'C');
            $pdf->Cell(12,6,'ID',1,0,'C');
            $pdf->Cell(73,6,'BAGIAN',1,0,'C');
            $pdf->Cell(23,6,'TOTAL CUTI',1,1,'C');
            
            //isi dari database
            $spv  = $this->session->userdata('nik');
            $cuti = $this->model_cuti->get_konfirm_khusus($spv);
            $no = 1;
            $pdf->SetFont('Arial','',9);

            foreach ($cuti->result() as $c) 
            {
                
                $pdf->Cell(10,6,$no,1,0,'C');
                $pdf->Cell(60,6,$c->nama_karyawan,1,0);
                $pdf->Cell(12,6,$c->id_karyawan,1,0,'C');
                $pdf->Cell(73,6,$c->penempatan,1,0);
                $pdf->Cell(23,6,$c->jml,1,1,'C');
                $no++; 
            }

            $pdf->Output();
        }





        public function pdf_khusus_detail(){

            $id_karyawan  = $this->uri->segment(4);
            $spv          = $this->session->userdata('nik');
            $cuti         = $this->model_cuti->get_detail_khusus($id_karyawan);
            $bagian       = $this->model_cuti->get_detail_khusus($id_karyawan)->row_array();
            
            $pdf = new FPDF('P','mm','A4');
            // membuat halaman baru
            $pdf->AddPage();
            // setting jenis font yang akan digunakan
            $pdf->SetFont('Arial','B',16);
            // mencetak string 
            $pdf->Image('assets/dist/img/logo.png',10,10,-300);
            $pdf->Cell(190,20,'',0,1,'C');
            $pdf->SetFont('Arial','B',12);
            $pdf->Cell(190,7,'LAPORAN DETAIL CUTI KHUSUS TENAGA OUTSOURCHING',0,1,'C');
            
            // Memberikan space kebawah agar tidak terlalu rapat
            $pdf->Cell(10,7,'',0,1);
            $pdf->SetFont('Arial','B',10);
            
            $pdf->Cell(25,6,'NAMA',0,0);
            $pdf->Cell(5,6,':',0,0,'C');
            $pdf->Cell(38,6,$bagian['nama_karyawan'],0,1);
            
            $pdf->Cell(25,6,'ID',0,0);
            $pdf->Cell(5,6,':',0,0,'C');
            $pdf->Cell(10,6,$bagian['id_karyawan'],0,1);

            $pdf->Cell(25,6,'BAGIAN',0,0);
            $pdf->Cell(5,6,':',0,0,'C');
            $pdf->Cell(35,6,$bagian['penempatan'],0,1);
            $pdf->Cell(38,6,'',0,1);

            $pdf->Cell(10,6,'NO',1,0,'C');
            $pdf->Cell(25,6,'TGL MULAI',1,0,'C');
            $pdf->Cell(25,6,'TGL AKHIR',1,0,'C');
            $pdf->Cell(10,6,'JML',1,0,'C');
            $pdf->Cell(80,6,'ALASAN CUTI',1,0,'C');
            $pdf->Cell(20,6,'STATUS',1,1,'C');
            
            
            //isi dari database
            $no = 1;
            $pdf->SetFont('Arial','',10);

            foreach ($cuti->result() as $c) 
            {
                
                $pdf->Cell(10,6,$no,1,0,'C');
                $pdf->Cell(25,6,$c->tgl_mulai,1,0,'C');
                $pdf->Cell(25,6,$c->tgl_akhir,1,0,'C');
                $pdf->Cell(10,6,$c->jml_hari,1,0,'C');
                $pdf->Cell(80,6,$c->alasan_cuti,1,0);
                $pdf->Cell(20,6,$c->status_cuti,1,1,'C');
                $no++; 
            }

            $pdf->Output();
        }


        public function pdf_detail_cv(){

            $nik          = $this->uri->segment(4);
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

        public function pdf_all_cv(){

            
  
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

            $pdf  = new FPDF('P','mm','A4');
            $spv  = $this->session->userdata('nik');
            $data = $this->model_karyawan->get_all_cv_spv($spv)->result();
            

            foreach($data as $d){

                $tgl = $d->tgl;
                
                // membuat halaman baru
                $pdf->AddPage();
                $pdf->Image('assets/dist/img/logo.png',10,10,-230);
                $pdf->Image('assets/dist/img/biofarma.png',148,2,-230,25);
                $pdf->Image($d->foto ,130,45,-530,50);
                $pdf->Cell(190,20,'',0,1,'C');

                    // Memberikan space kebawah agar tidak terlalu rapat
                $pdf->Cell(10,7,'',0,1);
                $pdf->SetFont('Arial','',10);
                $pdf->Cell(10,7,'',0,1);
                
                $pdf->Cell(25,6,'NIK',0,0);
                $pdf->Cell(5,6,':',0,0,'C');
                $pdf->Cell(38,6,$d->id_karyawan,0,1);

                $pdf->Cell(25,6,'Nama',0,0);
                $pdf->Cell(5,6,':',0,0,'C');
                $pdf->Cell(10,6,$d->nama,0,1);
                $pdf->Cell(10,7,'',0,1);

                $pdf->Cell(25,6,'Pend. Diakui',0,0);
                $pdf->Cell(5,6,':',0,0,'C');
                $pdf->Cell(35,6,$d->diakui,0,1);

                $pdf->Cell(25,6,'Pend. Akhir',0,0);
                $pdf->Cell(5,6,':',0,0,'C');
                $pdf->Cell(35,6,$d->diakui,0,1);

                $pdf->Cell(25,6,'Jurusan',0,0);
                $pdf->Cell(5,6,':',0,0,'C');
                $pdf->Cell(35,6,$d->jurusan,0,1);
                $pdf->Cell(10,8,'',0,1);

                $pdf->Cell(25,6,'Seksi',0,0);
                $pdf->Cell(5,6,':',0,0,'C');
                $pdf->Cell(35,6,$d->seksi,0,1);

                $pdf->Cell(25,6,'Bagian',0,0);
                $pdf->Cell(5,6,':',0,0,'C');
                $pdf->Cell(35,6,$d->bagian,0,1);

                $pdf->Cell(25,6,'Divisi',0,0);
                $pdf->Cell(5,6,':',0,0,'C');
                $pdf->Cell(35,6,$d->divisi,0,1);

                $pdf->Cell(25,6,'Direktorat',0,0);
                $pdf->Cell(5,6,':',0,0,'C');
                $pdf->Cell(35,6,$d->direktorat,0,0);
                $pdf->Cell(50,6,'',0,0);

                $pdf->Cell(25,6,'Kontrak Awal',0,0);
                $pdf->Cell(5,6,':',0,0,'C');
                $pdf->Cell(35,6,$d->kont_awal,0,1);

                $pdf->Cell(25,6,'No Ext',0,0);
                $pdf->Cell(5,6,':',0,0,'C');
                $pdf->Cell(35,6,'',0,0);
                $pdf->Cell(50,6,'',0,0);

                $pdf->Cell(25,6,'Kontrak Akhir',0,0);
                $pdf->Cell(5,6,':',0,0,'C');
                $pdf->Cell(35,6,$d->kont_akhir,0,1);
                $pdf->Cell(10,7,'',0,1);

                $pdf->Cell(25,6,'Status',0,0);
                $pdf->Cell(5,6,':',0,0,'C');
                $pdf->Cell(35,6,$d->status,0,1);
                $pdf->Cell(10,7,'',0,1);

                $pdf->Cell(25,6,'Tempat Lahir',0,0);
                $pdf->Cell(5,6,':',0,0,'C');
                $pdf->Cell(35,6,$d->tempat,0,1);

                $pdf->Cell(25,6,'Tgl Lahir',0,0);
                $pdf->Cell(5,6,':',0,0,'C');
                $pdf->Cell(35,6,$d->tgl,0,1);

                $pdf->Cell(25,6,'Umur',0,0);
                $pdf->Cell(5,6,':',0,0,'C');
                $pdf->Cell(35,6,hitung_umur($tgl),0,1);

                $pdf->Cell(25,6,'Gender',0,0);
                $pdf->Cell(5,6,':',0,0,'C');
                $pdf->Cell(35,6,$d->jenis_kelamin,0,1);

                $pdf->Cell(25,6,'Agama',0,0);
                $pdf->Cell(5,6,':',0,0,'C');
                $pdf->Cell(35,6,$d->agama,0,1);

                $pdf->Cell(25,6,'Gol. Darah',0,0);
                $pdf->Cell(5,6,':',0,0,'C');
                $pdf->Cell(35,6,$d->gol_darah,0,1);

                $pdf->Cell(25,6,'St. Sipil',0,0);
                $pdf->Cell(5,6,':',0,0,'C');
                $pdf->Cell(35,6,$d->kode_sipil,0,1);

                $pdf->Cell(25,6,'Bangsa',0,0);
                $pdf->Cell(5,6,':',0,0,'C');
                $pdf->Cell(35,6,$d->bangsa,0,1);

                $pdf->Cell(25,6,'Suku',0,0);
                $pdf->Cell(5,6,':',0,0,'C');
                $pdf->Cell(35,6,$d->suku,0,1);

                $pdf->Cell(25,6,'No. Identitas',0,0);
                $pdf->Cell(5,6,':',0,0,'C');
                $pdf->Cell(35,6,$d->ktp,0,1);

                $pdf->Cell(25,6,'Alamat',0,0);
                $pdf->Cell(5,6,':',0,0,'C');
                $pdf->Cell(35,6,$d->alamat,0,1);
                $pdf->Cell(10,7,'',0,1);

                $pdf->Cell(25,6,'Kode Pos',0,0);
                $pdf->Cell(5,6,':',0,0,'C');
                $pdf->Cell(35,6,$d->kode_pos,0,1);

                $pdf->Cell(25,6,'No. Telp',0,0);
                $pdf->Cell(5,6,':',0,0,'C');
                $pdf->Cell(35,6,$d->no_telp,0,1);

                $pdf->Cell(25,6,'No. Hp',0,0);
                $pdf->Cell(5,6,':',0,0,'C');
                $pdf->Cell(35,6,$d->no_hp,0,1);

                $pdf->Cell(25,6,'e-mail',0,0);
                $pdf->Cell(5,6,':',0,0,'C');
                $pdf->Cell(35,6,$d->email,0,1);
                $pdf->Cell(10,7,'',0,1);

                $pdf->Cell(25,6,'Tinggi',0,0);
                $pdf->Cell(5,6,':',0,0,'C');
                $pdf->Cell(35,6,$d->tinggi .' cm ',0,1);

                $pdf->Cell(25,6,'Berat',0,0);
                $pdf->Cell(5,6,':',0,0,'C');
                $pdf->Cell(35,6,$d->berat .' kg ',0,1);
                

            }

            $pdf->Output();

            
            
        }    
            
 	}        
