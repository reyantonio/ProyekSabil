-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 25 Mei 2018 pada 03.19
-- Versi Server: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_cuti`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `cuti_khusus`
--

CREATE TABLE `cuti_khusus` (
  `id_cuti_khusus` varchar(10) NOT NULL,
  `id_karyawan` varchar(10) NOT NULL,
  `tgl_mulai` date NOT NULL,
  `tgl_akhir` date NOT NULL,
  `jml_hari` int(1) NOT NULL,
  `alasan_cuti` varchar(100) NOT NULL,
  `approve_kasie` enum('N','Y') NOT NULL,
  `approve_kabag` enum('N','Y') NOT NULL,
  `approve_spv` enum('N','Y') NOT NULL,
  `approve_sdm` enum('N','Y') NOT NULL,
  `approve_dir` enum('N','Y') NOT NULL,
  `tgl_input` date NOT NULL,
  `status_cuti` enum('pengajuan','proses','tolak') NOT NULL,
  `thn_cuti` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `cuti_khusus`
--

INSERT INTO `cuti_khusus` (`id_cuti_khusus`, `id_karyawan`, `tgl_mulai`, `tgl_akhir`, `jml_hari`, `alasan_cuti`, `approve_kasie`, `approve_kabag`, `approve_spv`, `approve_sdm`, `approve_dir`, `tgl_input`, `status_cuti`, `thn_cuti`) VALUES
('KS0000001', '16107', '2018-05-15', '2018-05-15', 1, 'tes', 'N', 'N', 'N', 'N', 'N', '2018-05-15', 'pengajuan', 2018),
('KS0000002', '16107', '2018-05-16', '2018-05-16', 1, 'aaaa', 'N', 'N', 'N', 'N', 'N', '2018-05-15', 'pengajuan', 2018);

-- --------------------------------------------------------

--
-- Struktur dari tabel `cuti_reguler`
--

CREATE TABLE `cuti_reguler` (
  `id_cuti_reguler` varchar(10) NOT NULL,
  `id_karyawan` varchar(10) NOT NULL,
  `tgl_mulai` date NOT NULL,
  `tgl_akhir` date NOT NULL,
  `jml_hari` int(1) NOT NULL,
  `alasan_cuti` varchar(100) NOT NULL,
  `approve_kasie` enum('N','Y') NOT NULL,
  `approve_kabag` enum('N','Y') NOT NULL,
  `approve_spv` enum('N','Y') NOT NULL,
  `approve_sdm` enum('N','Y') NOT NULL,
  `approve_dir` enum('N','Y') NOT NULL,
  `tgl_input` date NOT NULL,
  `status_cuti` enum('pengajuan','proses','tolak') NOT NULL,
  `thn_cuti` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `cuti_reguler`
--

INSERT INTO `cuti_reguler` (`id_cuti_reguler`, `id_karyawan`, `tgl_mulai`, `tgl_akhir`, `jml_hari`, `alasan_cuti`, `approve_kasie`, `approve_kabag`, `approve_spv`, `approve_sdm`, `approve_dir`, `tgl_input`, `status_cuti`, `thn_cuti`) VALUES
('RG0000001', '16107', '2018-05-15', '2018-05-15', 1, 'tes', 'N', 'N', 'Y', 'N', 'N', '2018-05-15', 'proses', 2018);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_approve_dir`
--

CREATE TABLE `tbl_approve_dir` (
  `id_approve_kasie` int(11) NOT NULL,
  `id_cuti` varchar(10) NOT NULL,
  `tgl_approve_kasie` date NOT NULL,
  `approve_kasie` enum('Y','N') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_approve_kabag`
--

CREATE TABLE `tbl_approve_kabag` (
  `id_approve_kabag` int(11) NOT NULL,
  `id_cuti` varchar(10) NOT NULL,
  `tgl_approve_kabag` date NOT NULL,
  `approve_kabag` enum('Y','N') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_approve_kasie`
--

CREATE TABLE `tbl_approve_kasie` (
  `id_approve_kasie` int(11) NOT NULL,
  `id_cuti` varchar(10) NOT NULL,
  `tgl_approve_kasie` date NOT NULL,
  `approve_kasie` enum('Y','N') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_approve_sdm`
--

CREATE TABLE `tbl_approve_sdm` (
  `id_approve_sdm` int(11) NOT NULL,
  `id_cuti` varchar(10) NOT NULL,
  `tgl_approve_sdm` date NOT NULL,
  `approve_sdm` enum('Y','N') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_approve_spv`
--

CREATE TABLE `tbl_approve_spv` (
  `id_approve_spv` int(11) NOT NULL,
  `id_cuti` varchar(10) NOT NULL,
  `tgl_approve_spv` date NOT NULL,
  `approve_spv` enum('Y','N') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_karyawan`
--

CREATE TABLE `tbl_karyawan` (
  `id_karyawan` varchar(10) NOT NULL,
  `nama_karyawan` varchar(50) NOT NULL,
  `penempatan` varchar(100) NOT NULL,
  `grup` enum('pkwt','existing','pengelola','koperasi') NOT NULL,
  `id_spv` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_karyawan`
--

INSERT INTO `tbl_karyawan` (`id_karyawan`, `nama_karyawan`, `penempatan`, `grup`, `id_spv`) VALUES
('10001', 'RIFQI ALHAOLANI', 'PU', 'pengelola', '20046'),
('10002', 'FITHRIA FAHMAWATI', 'AKEU', 'pengelola', '20046'),
('10003', 'WINARTI SUDARISMAN', 'SDM', 'pengelola', '20046'),
('10004', 'ADITYA RAMANDA KUSNADI', 'JASA', 'pengelola', '20046'),
('10005', 'YADI SETIADI', 'JASA', 'pengelola', '20046'),
('10006', 'REDI MUHAMAD RIDWAN', 'IT & GA', 'pengelola', '20046'),
('10007', 'SUBECHI', 'JASA', 'pengelola', '20046'),
('10008', 'ALI MIFTAHUDDIN', 'AKEU', 'pengelola', '20046'),
('10010', 'DADAN RAKHMAN', 'JASA', 'pengelola', '10000'),
('10013', 'HUSNI MUBAROK', 'JASA', 'pengelola', '10000'),
('10015', 'BUBUN BUNYAMIN', 'JASA', 'pengelola', '10000'),
('10026', 'RENO', 'JASA', 'pengelola', '10000'),
('16001', 'Rizky Suharyandhika', 'Pembiakan Hewan Lab.', 'pkwt', '10007'),
('16002', 'Supriyatna', 'Pembiakan Hewan Lab.', 'pkwt', '10007'),
('16003', 'Hendra Sosang P.', 'Corporate Social Responsibility', 'pkwt', '10005'),
('16004', 'Ahmad Saehudin', 'Distribusi', 'pkwt', '10007'),
('16005', 'Atin Prihatini Sukmana', 'Distribusi', 'pkwt', '10007'),
('16006', 'Budiman Cahyadi', 'Distribusi', 'pkwt', '10007'),
('16007', 'Chairul Rizal', 'Distribusi', 'pkwt', '10007'),
('16008', 'Dhian Purnama Putra', 'Distribusi', 'pkwt', '10007'),
('16009', 'Hasbi Hanafi', 'Distribusi', 'pkwt', '10007'),
('16010', 'Herdi Andiyansyah', 'Distribusi', 'pkwt', '10007'),
('16011', 'Wina Melya Yulistiani', 'Distribusi', 'pkwt', '10007'),
('16012', 'Acep Rahayu Sofyan Hidayat', 'Formulasi & Pengisian Vaksin dan Pelarut', 'pkwt', '10005'),
('16013', 'Aditya Nurpratama', 'Formulasi & Pengisian Vaksin dan Pelarut', 'pkwt', '10005'),
('16014', 'Andrian Hardie Somantri', 'Formulasi & Pengisian Vaksin dan Pelarut', 'pkwt', '10005'),
('16015', 'Hendra Erlangga', 'Formulasi & Pengisian Vaksin dan Pelarut', 'pkwt', '10005'),
('16016', 'Irwan Wiguna', 'Formulasi & Pengisian Vaksin dan Pelarut', 'pkwt', '10005'),
('16017', 'Jeni Bahagia Saputra', 'Formulasi & Pengisian Vaksin dan Pelarut', 'pkwt', '10005'),
('16018', 'MOCH GANI CHAERUL AKBAR', 'Formulasi & Pengisian Vaksin dan Pelarut', 'pkwt', '10005'),
('16019', 'Mulyaman', 'Formulasi & Pengisian Vaksin dan Pelarut', 'pkwt', '10005'),
('16020', 'Mustofa Kamal', 'Formulasi & Pengisian Vaksin dan Pelarut', 'pkwt', '10005'),
('16021', 'Nur Sapto Hudoyo', 'Formulasi & Pengisian Vaksin dan Pelarut', 'pkwt', '10005'),
('16022', 'Triana Kusumah', 'Formulasi & Pengisian Vaksin dan Pelarut', 'pkwt', '10005'),
('16023', 'Trivio Gresdiano', 'Formulasi & Pengisian Vaksin dan Pelarut', 'pkwt', '10005'),
('16025', 'Agus Rahmat Gustaman', 'Formulasi & Pengisian Vaksin dan Sera', 'pkwt', '10005'),
('16026', 'Agus Rianto', 'Formulasi & Pengisian Vaksin dan Sera', 'pkwt', '10005'),
('16027', 'Aldian Juandani', 'Formulasi & Pengisian Vaksin dan Sera', 'pkwt', '10005'),
('16028', 'Anjas Miftah Maulana', 'Formulasi & Pengisian Vaksin dan Sera', 'pkwt', '10005'),
('16029', 'Bambang Irawan', 'Formulasi & Pengisian Vaksin dan Sera', 'pkwt', '10005'),
('16030', 'Cecep Heru Kurniawan', 'Formulasi & Pengisian Vaksin dan Sera', 'pkwt', '10005'),
('16031', 'Dwi Mardiansyah', 'Formulasi & Pengisian Vaksin dan Sera', 'pkwt', '10005'),
('16032', 'Eko Prasetio', 'Formulasi & Pengisian Vaksin dan Sera', 'pkwt', '10005'),
('16033', 'Erin Regiana', 'Formulasi & Pengisian Vaksin dan Sera', 'pkwt', '10005'),
('16034', 'Erri Sapari', 'Formulasi & Pengisian Vaksin dan Sera', 'pkwt', '10005'),
('16035', 'Gelar Ramadan', 'Formulasi & Pengisian Vaksin dan Sera', 'pkwt', '10005'),
('16036', 'Indra Permana', 'Formulasi & Pengisian Vaksin dan Sera', 'pkwt', '10005'),
('16037', 'Irpan Jamaludin', 'Formulasi & Pengisian Vaksin dan Sera', 'pkwt', '10005'),
('16038', 'Isep Awaludin', 'Formulasi & Pengisian Vaksin dan Sera', 'pkwt', '10005'),
('16039', 'IYAN SOFYAN S', 'Formulasi & Pengisian Vaksin dan Sera', 'pkwt', '10005'),
('16040', 'Lingga Wibowo', 'Formulasi & Pengisian Vaksin dan Sera', 'pkwt', '10005'),
('16041', 'MOCH HENDRA IRAWAN', 'Formulasi & Pengisian Vaksin dan Sera', 'pkwt', '10005'),
('16042', 'MUHAMAD YUSUF ISMAIL', 'Formulasi & Pengisian Vaksin dan Sera', 'pkwt', '10005'),
('16043', 'NIKO PRATOMO ', 'Formulasi & Pengisian Vaksin dan Sera', 'pkwt', '10005'),
('16044', 'Rachmat Irvan Setiawan', 'Formulasi & Pengisian Vaksin dan Sera', 'pkwt', '10005'),
('16047', 'Risna Syabana', 'Formulasi & Pengisian Vaksin dan Sera', 'pkwt', '10005'),
('16048', 'Riyan Febriyanto', 'Formulasi & Pengisian Vaksin dan Sera', 'pkwt', '10005'),
('16049', 'Roni Yusfauzi', 'Formulasi & Pengisian Vaksin dan Sera', 'pkwt', '10005'),
('16050', 'Safitri Asri Pratami', 'Formulasi & Pengisian Vaksin dan Sera', 'pkwt', '10005'),
('16051', 'Sobari Hambali', 'Formulasi & Pengisian Vaksin dan Sera', 'pkwt', '10005'),
('16052', 'Sunardiansah', 'Formulasi & Pengisian Vaksin dan Sera', 'pkwt', '10005'),
('16053', 'Vivayanti Nurhidayah', 'Formulasi & Pengisian Vaksin dan Sera', 'pkwt', '10005'),
('16054', 'YUDIANSYAH ACHMAD PRIBADI', 'Formulasi & Pengisian Vaksin dan Sera', 'pkwt', '10005'),
('16055', 'Muhamad Iqbal Syafrudin', 'Hewan SPF', 'pkwt', '10007'),
('16056', 'Teddy Kurniawan', 'Hewan SPF', 'pkwt', '10007'),
('16057', 'Sandi Ahadi', 'Lingkungan, Kesehatan & Keselamatan', 'pkwt', '10005'),
('16058', 'Ana Meryawati', 'Manajemen Karir', 'pkwt', '10005'),
('16059', 'Tri Susanto', 'Manajemen Pengembangan', 'pkwt', '10005'),
('16060', 'Agung Surya Somantri', 'Matriks Pengembangan Produk', 'pkwt', '10005'),
('16061', 'Anwar Mubarok', 'Matriks Pengembangan Produk', 'pkwt', '10005'),
('16062', 'Handi Mahendra', 'Matriks Pengembangan Produk', 'pkwt', '10005'),
('16063', 'Sarip Hidayat', 'Matriks Pengembangan Produk', 'pkwt', '10005'),
('16064', 'Ari Kurniawan', 'Mekanik & Utilitas', 'pkwt', '10007'),
('16065', 'Arip Nugraha', 'Mekanik & Utilitas', 'pkwt', '10007'),
('16066', 'Fahmy Baharuddin Jabbar', 'Mekanik & Utilitas', 'pkwt', '10007'),
('16067', 'Hendrik Sutisna', 'Mekanik & Utilitas', 'pkwt', '10007'),
('16068', 'Wahyu Diansyah', 'Mekanik & Utilitas', 'pkwt', '10007'),
('16069', 'Helma Musa', 'Patologi & Toksikologi', 'pkwt', '10005'),
('16071', 'Abdul Halim', 'Produksi Hewan Donor', 'pkwt', '10007'),
('16072', 'Agung Giri Purnama', 'Pembiakan Hewan Lab.', 'pkwt', '10007'),
('16073', 'Agus Jaelani', 'Produksi Hewan Donor', 'pkwt', '10007'),
('16075', 'Amien Permadi', 'Pembiakan Hewan Lab.', 'pkwt', '10007'),
('16076', 'ANDRI PRASETYA NURJAMAN', 'Pembiakan Hewan Lab.', 'pkwt', '10007'),
('16077', 'Aries Rahmatulloh', 'Pembiakan Hewan Lab.', 'pkwt', '10007'),
('16078', 'Asep Setiawan', 'Produksi Hewan Donor', 'pkwt', '10007'),
('16079', 'Asep Suherman', 'Pembiakan Hewan Lab.', 'pkwt', '10007'),
('16080', 'Cephi Cherdianto', 'Pembiakan Hewan Lab.', 'pkwt', '10007'),
('16081', 'Dedi Sodikin', 'Pembiakan Hewan Lab.', 'pkwt', '10007'),
('16082', 'Deni Sopyan', 'Produksi Hewan Donor', 'pkwt', '10007'),
('16083', 'Dicky Suwarno', 'Produksi Hewan Donor', 'pkwt', '10007'),
('16084', 'Ega Nurpendiana', 'Pembiakan Hewan Lab.', 'pkwt', '10007'),
('16085', 'Egi Ramdani', 'Produksi Hewan Donor', 'pkwt', '10007'),
('16086', 'Hapiz Muslim', 'Pembiakan Hewan Lab.', 'pkwt', '10007'),
('16087', 'Hendra Kurnia', 'Pembiakan Hewan Lab.', 'pkwt', '10007'),
('16088', 'Iden Wigio', 'Pembiakan Hewan Lab.', 'pkwt', '10007'),
('16089', 'Imam Abdul Hakim', 'Produksi Hewan Donor', 'pkwt', '10007'),
('16090', 'Jajat Jatnika', 'Produksi Hewan Donor', 'pkwt', '10007'),
('16091', 'Kiki Hadiansyah', 'Pembiakan Hewan Lab.', 'pkwt', '10007'),
('16092', 'Muhammad Solehudin Syah', 'Produksi Hewan Donor', 'pkwt', '10007'),
('16093', 'Oki Robiyanto', 'Pembiakan Hewan Lab.', 'pkwt', '10007'),
('16094', 'Ridwan Nuryadin', 'Produksi Hewan Donor', 'pkwt', '10007'),
('16095', 'Septianda Liswanto', 'Pembiakan Hewan Lab.', 'pkwt', '10007'),
('16096', 'Tantan Hadiansyah', 'Pembiakan Hewan Lab.', 'pkwt', '10007'),
('16097', 'Taufik Hidayat', 'Produksi Hewan Donor', 'pkwt', '10007'),
('16098', 'Ucok Ocman Lubis', 'Produksi Hewan Donor', 'pkwt', '10007'),
('16099', 'Ujang Suhendar', 'Produksi Hewan Donor', 'pkwt', '10007'),
('16100', 'Zulharman Fauji', 'Produksi Hewan Donor', 'pkwt', '10007'),
('16101', 'Arief Chandra Firmawan', 'Pendingin & Bangunan', 'pkwt', '10007'),
('16102', 'Deni Mulyana', 'Penunjang Pembelian', 'pkwt', '10007'),
('16103', 'Resa Rachmaditia Alamsyah', 'Penunjang Pembelian', 'pkwt', '10007'),
('16104', 'Sona Hanapia', 'Penunjang Pembelian', 'pkwt', '10007'),
('16105', 'Abdul Azis', 'Pengemasan', 'pkwt', '10004'),
('16106', 'Acep Wahyu', 'Pengemasan', 'pkwt', '10004'),
('16107', 'Ade Cahyan', 'Pengemasan', 'pkwt', '10004'),
('16108', 'Ade Ivan Saepudin', 'Pengemasan', 'pkwt', '10004'),
('16109', 'Adi Hadian', 'Pengemasan', 'pkwt', '10004'),
('16110', 'Aditia Junaedi', 'Pengemasan', 'pkwt', '10004'),
('16111', 'Aditia Warman', 'Pengemasan', 'pkwt', '10004'),
('16112', 'Afrian Ramdani Atmaja', 'Pengemasan', 'pkwt', '10004'),
('16113', 'Agus Setiawan', 'Pengemasan', 'pkwt', '10004'),
('16115', 'Ali Ferdian', 'Pengemasan', 'pkwt', '10004'),
('16116', 'Ali Rachman', 'Pengemasan', 'pkwt', '10004'),
('16117', 'Alifian Rahmatuloh', 'Pengemasan', 'pkwt', '10004'),
('16118', 'Andri Permana', 'Pengemasan', 'pkwt', '10004'),
('16119', 'Andri Suryandani', 'Pengemasan', 'pkwt', '10004'),
('16121', 'Anggun Nurbayuningsih', 'Pengemasan', 'pkwt', '10004'),
('16122', 'Ardi Zaenuri', 'Pengemasan', 'pkwt', '10004'),
('16123', 'Asep Muhammad Taufik ', 'Pengemasan', 'pkwt', '10004'),
('16124', 'ASHARI M. CAHYADI', 'Pengemasan', 'pkwt', '10004'),
('16125', 'Bagus Ristanto Ayudhia', 'Pengemasan', 'pkwt', '10004'),
('16126', 'Bayu Satya Nugraha', 'Pengemasan', 'pkwt', '10004'),
('16127', 'Budi Haryanto', 'Pengemasan', 'pkwt', '10004'),
('16128', 'Cecep Ganjar', 'Pengemasan', 'pkwt', '10004'),
('16129', 'Cecep Rizal Rukmana', 'Pengemasan', 'pkwt', '10004'),
('16130', 'DADAN JIDAN ALAWI', 'Pengemasan', 'pkwt', '10004'),
('16132', 'Decky Riswanto', 'Pengemasan', 'pkwt', '10004'),
('16133', 'Dedi Junaedi', 'Pengemasan', 'pkwt', '10004'),
('16134', 'Deni Prasetya', 'Pengemasan', 'pkwt', '10004'),
('16135', 'Deri Hermawan', 'Pengemasan', 'pkwt', '10004'),
('16136', 'Dini Nurjanah', 'Pengemasan', 'pkwt', '10004'),
('16137', 'Doni Hadianto', 'Pengemasan', 'pkwt', '10004'),
('16138', 'Doni Permana', 'Pengemasan', 'pkwt', '10004'),
('16139', 'Egi Riyandi', 'Pengemasan', 'pkwt', '10004'),
('16140', 'Encep Kusmawan', 'Pengemasan', 'pkwt', '10004'),
('16141', 'Erwin Febrian Setiadi', 'Pengemasan', 'pkwt', '10004'),
('16142', 'Fahmi Fahrudin', 'Pengemasan', 'pkwt', '10004'),
('16143', 'Fauzan Imam Mujahid', 'Pengemasan', 'pkwt', '10004'),
('16144', 'Faza Rusyda Aghnia', 'Pengemasan', 'pkwt', '10004'),
('16145', 'Firman Razif', 'Pengemasan', 'pkwt', '10004'),
('16146', 'Gia Imron Maulana', 'Pengemasan', 'pkwt', '10004'),
('16147', 'Hanifah Hendiani', 'Pengemasan', 'pkwt', '10004'),
('16148', 'Hapiadi', 'Pengemasan', 'pkwt', '10004'),
('16149', 'Hari Firmansyah', 'Pengemasan', 'pkwt', '10004'),
('16150', 'Hary Teguh Safari', 'Pengemasan', 'pkwt', '10004'),
('16151', 'Hendra Lesmana', 'Pengemasan', 'pkwt', '10004'),
('16152', 'HERI HENSEN OKTARA', 'Pengemasan', 'pkwt', '10004'),
('16153', 'Herik Munggaran', 'Pengemasan', 'pkwt', '10004'),
('16154', 'ICHSAN ANUGRAH MASHURI', 'Pengemasan', 'pkwt', '10004'),
('16155', 'Ilham Mujtahid', 'Pengemasan', 'pkwt', '10004'),
('16156', 'Imam Pamungkas', 'Pengemasan', 'pkwt', '10004'),
('16157', 'Indra Nurdiansyah Tajudin', 'Pengemasan', 'pkwt', '10004'),
('16159', 'Insani Maulana Yusuf', 'Pengemasan', 'pkwt', '10004'),
('16160', 'Iqbal Abdul Aziz', 'Pengemasan', 'pkwt', '10004'),
('16161', 'Jepri Hermansyah', 'Pengemasan', 'pkwt', '10004'),
('16162', 'Kartika Solihat', 'Pengemasan', 'pkwt', '10004'),
('16163', 'Lucky Valera', 'Pengemasan', 'pkwt', '10004'),
('16164', 'Mega Suci Nurani', 'Pengemasan', 'pkwt', '10004'),
('16165', 'Mochamad Akmal Hizballoh', 'Pengemasan', 'pkwt', '10004'),
('16166', 'Mochammad Rizal Fadlillah', 'Pengemasan', 'pkwt', '10004'),
('16167', 'Moh Dwiki Maryanto', 'Pengemasan', 'pkwt', '10004'),
('16168', 'Muh. Taufiq Hidayat', 'Pengemasan', 'pkwt', '10004'),
('16169', 'Muhammad Faishal Fakhri', 'Pengemasan', 'pkwt', '10004'),
('16172', 'Muhammad Rizqi Nurfajri Sidiq', 'Pengemasan', 'pkwt', '10004'),
('16173', 'Muhammad Syahid Fithyadinullah', 'Pengemasan', 'pkwt', '10004'),
('16174', 'Mulyadi', 'Pengemasan', 'pkwt', '10004'),
('16175', 'Nadia Destiana', 'Pengemasan', 'pkwt', '10004'),
('16176', 'Ndaru Wicaksono', 'Pengemasan', 'pkwt', '10004'),
('16177', 'Neni Susanti', 'Pengemasan', 'pkwt', '10004'),
('16179', 'Pipin Riandi', 'Pengemasan', 'pkwt', '10004'),
('16180', 'R. Yulloh Yamaeka Putra', 'Pengemasan', 'pkwt', '10004'),
('16181', 'Rama Sundana Putra', 'Pengemasan', 'pkwt', '10004'),
('16182', 'Ramdan Muharam', 'Pengemasan', 'pkwt', '10004'),
('16183', 'Randi Ridmawan', 'Pengemasan', 'pkwt', '10004'),
('16184', 'Reinaldho Arif Yusuf Anshory', 'Pengemasan', 'pkwt', '10004'),
('16186', 'Reza Romansyah', 'Pengemasan', 'pkwt', '10004'),
('16187', 'Ria Irawati', 'Pengemasan', 'pkwt', '10004'),
('16188', 'Rian Hardiansyah', 'Pengemasan', 'pkwt', '10004'),
('16189', 'Riansyah Sabastian', 'Pengemasan', 'pkwt', '10004'),
('16190', 'Ricky Widyanatha', 'Pengemasan', 'pkwt', '10004'),
('16191', 'Rico Agus Riandi', 'Pengemasan', 'pkwt', '10004'),
('16193', 'Riski Aripramanto', 'Pengemasan', 'pkwt', '10004'),
('16194', 'Rita Rohaeni', 'Pengemasan', 'pkwt', '10004'),
('16195', 'Rizki Faizal Ibrahim', 'Pengemasan', 'pkwt', '10004'),
('16196', 'Robby Hendrawan', 'Pengemasan', 'pkwt', '10004'),
('16198', 'Roni Romansyah', 'Pengemasan', 'pkwt', '10004'),
('16199', 'Roniawan', 'Pengemasan', 'pkwt', '10004'),
('16200', 'Said Muhamad Raja', 'Pengemasan', 'pkwt', '10004'),
('16201', 'Sani Hardiansyah', 'Pengemasan', 'pkwt', '10004'),
('16202', 'Senia Isnaeni Rizky', 'Pengemasan', 'pkwt', '10004'),
('16203', 'SEPTIAN AJI RAMDANI', 'Pengemasan', 'pkwt', '10004'),
('16204', 'Sulistyo Haryadi', 'Pengemasan', 'pkwt', '10004'),
('16205', 'Taupik Gustiana', 'Pengemasan', 'pkwt', '10004'),
('16206', 'Tedy Chahyanto', 'Pengemasan', 'pkwt', '10004'),
('16207', 'Try Mulyanto', 'Pengemasan', 'pkwt', '10004'),
('16209', 'Wahyu Ramadhan', 'Pengemasan', 'pkwt', '10004'),
('16210', 'Willy Warisman', 'Pengemasan', 'pkwt', '10004'),
('16211', 'Yanda Trisnawan', 'Pengemasan', 'pkwt', '10004'),
('16212', 'Yogi Wihatmana', 'Pengemasan', 'pkwt', '10004'),
('16214', 'Ega Januar Saplega', 'Pengujian Mutu Kimia & Fisika', 'pkwt', '10005'),
('16215', 'Imanda Fitria Nurambiya', 'Pengujian Mutu Mikrobiologi', 'pkwt', '10005'),
('16216', 'Agus Hermawan', 'Penjualan Sektor Swasta', 'pkwt', '10007'),
('16218', 'Andri Kusrana', 'Pergudangan', 'pkwt', '10007'),
('16219', 'Jajang Jamaludin', 'Pergudangan', 'pkwt', '10007'),
('16220', 'MUHAMMAD YUSUF NURALIM', 'Pergudangan', 'pkwt', '10007'),
('16221', 'Taufik Firmansyah', 'PPIC', 'pkwt', '10007'),
('16222', 'LUKMAN HARDI SOPIAN H', 'Produksi Media', 'pkwt', '10005'),
('16223', 'MOCH.RIZAL', 'Produksi Media', 'pkwt', '10005'),
('16224', 'Nanan Suparman', 'Produksi Media', 'pkwt', '10005'),
('16225', 'Rizqi Agung Prasetyo', 'Produksi Media', 'pkwt', '10005'),
('16226', 'Cecep Ginanjar', 'Produksi OPV', 'pkwt', '10005'),
('16227', 'Firman Kusdiana', 'Produksi OPV', 'pkwt', '10005'),
('16228', 'Fitrhiyah Umayi', 'Produksi OPV', 'pkwt', '10005'),
('16229', 'Luthfi Oktaviantoro Pambudi', 'Produksi OPV', 'pkwt', '10005'),
('16231', 'R.RUKKY MUHAMAD NUGRAHA', 'Produksi OPV', 'pkwt', '10005'),
('16232', 'Riki Firmansyah', 'Produksi OPV', 'pkwt', '10005'),
('16233', 'Dani Permana', 'Produksi Vaksin BCG', 'pkwt', '10005'),
('16234', 'Muhamad Ramdan', 'Uji Hewan', 'pkwt', '10007'),
('16235', 'MOCH HERU BAHARUDIN', 'Produksi Vaksin Hib', 'pkwt', '10005'),
('16236', 'MUHAMAD SUSANTO RAMDANI', 'Produksi Vaksin Hib', 'pkwt', '10005'),
('16237', 'Roby Suci Akbar', 'Produksi Vaksin Hib', 'pkwt', '10005'),
('16238', 'Muhammad Hanif', 'Produksi Vaksin Pertusis', 'pkwt', '10005'),
('16239', 'Rendy Priadi Wijaya', 'Produksi Vaksin Pertusis', 'pkwt', '10005'),
('16240', 'MOCHAMAD NAUFAL W.', 'Produksi Vaksin sIPV', 'pkwt', '10005'),
('16241', 'RYAN TAUFIK HIDAYAT', 'Pusat Imunisasi', 'pkwt', '10007'),
('16242', 'Achmad Mubaroq', 'Uji Hewan', 'pkwt', '10007'),
('16243', 'AGUNG ZULFIKAR', 'Uji Hewan', 'pkwt', '10007'),
('16244', 'Agus Firmansyah', 'Uji Hewan', 'pkwt', '10007'),
('16245', 'Ahmad Haerul Amin', 'Uji Hewan', 'pkwt', '10007'),
('16246', 'Bayu Suryo Wibowo', 'Uji Hewan', 'pkwt', '10007'),
('16247', 'Dian Widianto', 'Uji Hewan', 'pkwt', '10007'),
('16248', 'Gozwan Zulfikar Cantona', 'Uji Hewan', 'pkwt', '10007'),
('16249', 'Ilham Nurrohman', 'Uji Hewan', 'pkwt', '10007'),
('16250', 'Kiki Kusnadi', 'Uji Hewan', 'pkwt', '10007'),
('16251', 'Ruli Sakti Rahman', 'Uji Hewan', 'pkwt', '10007'),
('16252', 'Wawan Kurniawan', 'Uji Hewan', 'pkwt', '10007'),
('16253', 'Dinda Asti Arumawati', 'HC Service', 'pkwt', '10005'),
('16254', 'Sri Wijayanti Ningrum', 'Manajemen Aset', 'pkwt', '10005'),
('16256', 'Angga Rangga Malela', 'Produksi Vaksin sIPV', 'pkwt', '10005'),
('16257', 'LUTFHI KAMIL', 'Produksi Hewan Donor', 'pkwt', '10007'),
('16259', 'ALDI OKTRIYADI', 'Pembiakan Hewan Lab.', 'pkwt', '10007'),
('16260', 'Mahmud Mulyadi', 'Teknologi Informasi', 'pkwt', '10007'),
('16261', 'Warna', 'Pembiakan Hewan Lab.', 'pkwt', '10007'),
('16262', 'Deni Herdiansyah', 'Formulasi & Pengisian Vaksin dan Sera', 'pkwt', '10005'),
('16263', 'Muhammad Abdussyukur', 'Pengemasan', 'pkwt', '10004'),
('16264', 'Ai Komalasari', 'Pengemasan', 'pkwt', '10004'),
('16265', 'Fauzi Khoirudin', 'Pengemasan', 'pkwt', '10004'),
('16266', 'Jiehan Firdaus Mahland', 'Pengemasan', 'pkwt', '10004'),
('16267', 'Taufik Ramadhan', 'Pengemasan', 'pkwt', '10004'),
('16268', 'SHALAHUDIN MUTAQIN', 'Pengemasan', 'pkwt', '10004'),
('16269', 'Hendra Taryana', 'Pengemasan', 'pkwt', '10004'),
('16271', 'AGUS MOCH. PURNAMA', 'Formulasi & Pengisian Vaksin dan Pelarut', 'pkwt', '10005'),
('16272', 'Rakhmat Febrian', 'Jasinga', 'pkwt', '10005'),
('16273', 'Widya Maulani Adi', 'Jasinga', 'pkwt', '10005'),
('16274', 'Asep Paturohman', 'Jasinga', 'pkwt', '10005'),
('16275', 'Miati Dewi', 'Formulasi & Pengisian Vaksin dan Sera', 'pkwt', '10005'),
('16276', 'Agung Pandina', 'Pengemasan', 'pkwt', '10004'),
('16277', 'Tisar Maulana Yusup', 'Produksi Hewan Donor', 'pkwt', '10007'),
('16278', 'Dina Kusdiana', 'Produksi Hewan Donor', 'pkwt', '10007'),
('16279', 'Septriana Prasetya', 'Formulasi Pengisian Vaksin dan Sera', 'pkwt', '10005'),
('16280', 'Husna Permana', 'Pengemasan', 'pkwt', '10004'),
('16281', 'Gilang Ramadhan', 'Pengemasan', 'pkwt', '10004'),
('16282', 'Sulton Abdurahman', 'Pengemasan', 'pkwt', '10004'),
('16283', 'ulfah Sarah Rakhmawati', 'Pengemasan', 'pkwt', '10004'),
('16284', 'Ananda Alfiansyah', 'Pengemasan', 'pkwt', '10004'),
('16285', 'Damayadi ', 'Pengemasan', 'pkwt', '10004'),
('16286', 'Oki Andriansyah', 'Teknik Pendingin dan Bangunan', 'pkwt', '10007'),
('16287', 'Pajar Firmansyah', 'Teknik Pendingin dan Bangunan', 'pkwt', '10007'),
('16288', 'M Mahmud Jaelani', 'Produksi Vaksin Tetanus', 'pkwt', '10005'),
('16289', 'Cecep Mahpudin', 'Produksi Hewan Donor', 'pkwt', '10007'),
('16290', 'Rizky Delansyah', 'Produksi Hewan Donor', 'pkwt', '10007'),
('16291', 'Saeful Zaman', 'Produksi Hewan Donor', 'pkwt', '10007'),
('16292', 'Nia Kurniawati', 'Formulasi Pengisian Vaksin dan Sera', 'pkwt', '10005'),
('16293', 'Irwan Feriawan', 'Produksi Hewan Donor', 'pkwt', '10007'),
('16294', 'Robi Diana', 'Produksi Hewan Donor', 'pkwt', '10007'),
('16295', 'Asep Kurnia', 'Produksi Hewan Donor', 'pkwt', '10007'),
('16296', 'Topan Suwarman', 'Produksi Hewan Donor', 'pkwt', '10007'),
('16297', 'Angga Harlisma Septianto', 'Uji Hewan', 'pkwt', '10007'),
('16298', 'Rizky Septiana', 'Pengemasan', 'pkwt', '10004'),
('16299', 'Indra Nugraha', 'Pengemasan', 'pkwt', '10004'),
('16300', 'Bangun Robani', 'Pengemasan', 'pkwt', '10004'),
('16301', 'Vianto Erlangga', 'Pengemasan', 'pkwt', '10004'),
('16303', 'Fian Yudiartanto', 'Pengemasan', 'pkwt', '10004'),
('16307', 'Riska Widiya Agustin', 'Pengemasan', 'pkwt', '10004'),
('16308', 'Rikana Erdianti', 'Pengemasan', 'pkwt', '10004'),
('16309', 'M. Salman Alghani', 'Pengemasan', 'pkwt', '10004'),
('16312', 'Iim Irnha Naufakhrani', 'Pengemasan', 'pkwt', '10004'),
('16313', 'Sahdan', 'Pengemasan', 'pkwt', '10004'),
('16315', 'Tedi Setiadi', 'Pengemasan', 'pkwt', '10004'),
('16316', 'Hari Prasetyo', 'Validasi & Kalibrasi', 'pkwt', '10007'),
('16317', 'Fanji Rismawan', 'Pendingin & Bangunan', 'pkwt', '10007'),
('16318', 'Riansyah', 'Pendingin & Bangunan', 'pkwt', '10007'),
('16319', 'Candra Agus Priatna', 'Listrik dan Jaringan', 'pkwt', '10007'),
('16320', 'Gema Melinda', 'Mekanik & Utilitas', 'pkwt', '10007'),
('16321', 'Yogi Taufik', 'Penjualan Sektor Swasta', 'pkwt', '10007'),
('16322', 'Jauhar Kholid', 'Pengujian Mutu Kimia & Fisika', 'pkwt', '10005'),
('16323', 'Budi Ramdani', 'Mekanik & Utilitas', 'pkwt', '10007'),
('16325', 'Hermawan', 'Pengemasan', 'pkwt', '10004'),
('16326', 'Septian Panji Permadi ', 'Pengemasan', 'pkwt', '10004'),
('16327', 'Vindy Pretty Titania', 'Pengemasan', 'pkwt', '10004'),
('16328', 'Rini Widaningsih', 'Pengemasan', 'pkwt', '10004'),
('16329', 'M. Malgi Alpariz K', 'Pengemasan', 'pkwt', '10004'),
('16330', 'Helmy Dwitady Surya ', 'Pengemasan', 'pkwt', '10004'),
('16331', 'M. Fachru Rizzal', 'Pengemasan', 'pkwt', '10004'),
('16332', 'Intan Widia Permatasari', 'Pengemasan', 'pkwt', '10004'),
('16333', 'Nafthalita Ghaniyu', 'Pengemasan', 'pkwt', '10004'),
('16334', 'Baiq Anita Rahmawati', 'Pengemasan', 'pkwt', '10004'),
('16336', 'Taufik Ahmad Sobandi', 'Pengemasan', 'pkwt', '10004'),
('16337', 'Ilham Subagja', 'Pengemasan', 'pkwt', '10004'),
('16338', 'Acep Rohmat Zaenudin ', 'Pengemasan', 'pkwt', '10004'),
('16339', 'Aditya Aldiansyah', 'Pengemasan', 'pkwt', '10004'),
('16340', 'Apriliani Alifah ', 'Pengemasan', 'pkwt', '10004'),
('16341', 'Azis Muslim Pauzy', 'Pengemasan', 'pkwt', '10004'),
('16342', 'Denta Rugeri Sudrajat ', 'Pengemasan', 'pkwt', '10004'),
('16343', 'M. Yunus', 'Pengemasan', 'pkwt', '10004'),
('16344', 'Moch. Sam Abdul Bashir', 'Pengemasan', 'pkwt', '10004'),
('16345', 'Pinsa Prahadian', 'Pengemasan', 'pkwt', '10004'),
('16346', 'Riska Supriatin', 'Pengemasan', 'pkwt', '10004'),
('16347', 'Rizal Zainul Arifin ', 'Pengemasan', 'pkwt', '10004'),
('16348', 'Robby Kuncahyo', 'Pengemasan', 'pkwt', '10004'),
('16350', 'Widi Karismawati', 'Pengemasan', 'pkwt', '10004'),
('16351', 'Dadan Tri Cahya', 'SPF', 'pkwt', '10007'),
('16352', 'Asep Ridwan Firmansyah', 'Formulasi & Pengisian Vaksin dan Pelarut', 'pkwt', '10005'),
('16353', 'Azmi Fauzi', 'Formulasi & Pengisian Vaksin dan Pelarut', 'pkwt', '10005'),
('16354', 'Eneng Elin Nurliani', 'Formulasi & Pengisian Vaksin dan Pelarut', 'pkwt', '10005'),
('16355', 'Fikri Haqi Maulana', 'Formulasi & Pengisian Vaksin dan Pelarut', 'pkwt', '10005'),
('16356', 'Lupiani Ramadani', 'Formulasi & Pengisian Vaksin dan Pelarut', 'pkwt', '10005'),
('16357', 'Purnama Nurkalam Kholifatulloh', 'Formulasi & Pengisian Vaksin dan Pelarut', 'pkwt', '10005'),
('16358', 'Saepul Hidayat', 'Formulasi & Pengisian Vaksin dan Pelarut', 'pkwt', '10005'),
('16359', 'Sukron Gunawan', 'Formulasi & Pengisian Vaksin dan Pelarut', 'pkwt', '10005'),
('16360', 'Wili Cahyadi', 'Formulasi & Pengisian Vaksin dan Pelarut', 'pkwt', '10005'),
('16361', 'Nadya Addina Tantyhartsa', 'Pembiakan Hewan Lab.', 'pkwt', '10007'),
('16362', 'Andhini Fauzia', 'Manajemen Pengembangan', 'pkwt', '10005'),
('20042', 'BILLY IBRAHIM', 'PU', 'pengelola', '20046'),
('20043', 'ERWIN HERMAWAN', 'IT & GA', 'pengelola', '20046'),
('20044', 'ZAINAL MUSTOFA', 'PU', 'pengelola', '20046'),
('20045', 'RANI RACHMAWATI', 'PU', 'pengelola', '20046'),
('20046', 'YAYA SUPRIADI', 'DIREKSI', 'pengelola', '10000'),
('20047', 'AEP S', 'PU', 'pengelola', '20046'),
('20048', 'NANI SUMARNI', 'ADMINISTRASI', 'pengelola', '20046'),
('30001', 'ACEP IMAN RUDIANSYAH', 'CLEANING SERVICE', 'existing', '10015'),
('30002', 'ACHMAD SETIAWAN', 'CLEANING SERVICE', 'existing', '10015'),
('30003', 'ADANG', 'CLEANING SERVICE', 'existing', '10026'),
('30004', 'ADE HOERUDIN', 'CLEANING SERVICE', 'existing', '10026'),
('30005', 'ADEF KOSWARA', 'CLEANING SERVICE', 'existing', '10015'),
('30006', 'ADI CAHYADI', 'CLEANING SERVICE', 'existing', '10015'),
('30007', 'AEP ROHENDI', 'CLEANING SERVICE', 'existing', '10015'),
('30008', 'AGUS HERIYANTO', 'CLEANING SERVICE', 'existing', '10015'),
('30009', 'AGUS KURNIAWAN', 'CLEANING SERVICE', 'existing', '10026'),
('30010', 'AHMAD MUAMAR', 'CLEANING SERVICE', 'existing', '10026'),
('30011', 'AHMAD SOPANDI', 'CLEANING SERVICE', 'existing', '10015'),
('30012', 'ANDRI PERMANA 2', 'CLEANING SERVICE', 'existing', '10015'),
('30013', 'ARIPIN', 'CLEANING SERVICE', 'existing', '10026'),
('30014', 'ASEP DIANA', 'CLEANING SERVICE', 'existing', '10026'),
('30015', 'ASEP HAMDAN', 'CLEANING SERVICE', 'existing', '10015'),
('30016', 'ASEP ISHAK', 'CLEANING SERVICE', 'existing', '10015'),
('30017', 'ASEP SUMARNA', 'CLEANING SERVICE', 'existing', '10015'),
('30018', 'ATEP SUPRIADI', 'CLEANING SERVICE', 'existing', '10015'),
('30020', 'DADAN SUKMANA', 'CLEANING SERVICE', 'existing', '10015'),
('30021', 'DADANG', 'CLEANING SERVICE', 'existing', '10026'),
('30022', 'DADANG HADIANSYAH', 'CLEANING SERVICE', 'existing', '10026'),
('30023', 'DADANG TENDI', 'CLEANING SERVICE', 'existing', '10015'),
('30024', 'DEDE MIFTAHUDIN', 'CLEANING SERVICE', 'existing', '10015'),
('30025', 'Deden Setiawan', 'Teknologi Informasi', 'pkwt', '10007'),
('30026', 'Desi Rahmawati', 'Produksi OPV', 'pkwt', '10005'),
('30027', 'DINDIN KARDINI', 'CLEANING SERVICE', 'existing', '10015'),
('30028', 'RD. DODI PURNAMA', 'CLEANING SERVICE', 'existing', '10026'),
('30029', 'DONI JULIANA', 'CLEANING SERVICE', 'existing', '10015'),
('30030', 'DONI ROMDONI', 'CLEANING SERVICE', 'existing', '10026'),
('30031', 'EDI HEDIAN', 'CLEANING SERVICE', 'existing', '10026'),
('30032', 'EKO FEBRIYANTO', 'CLEANING SERVICE', 'existing', '10015'),
('30033', 'EKO HENDRA KUSWARA', 'CLEANING SERVICE', 'existing', '10015'),
('30034', 'FAUZY RIZKI PRATAMA', 'CLEANING SERVICE', 'existing', '10026'),
('30035', 'FIRMAN ARDIANSYAH', 'CLEANING SERVICE', 'existing', '10015'),
('30036', 'FIRMAN SEPTIAWAN', 'CLEANING SERVICE', 'existing', '10015'),
('30037', 'GUNGUN WIJANA', 'CLEANING SERVICE', 'existing', '10015'),
('30038', 'HANDRI SUJANA', 'CLEANING SERVICE', 'existing', '10026'),
('30039', 'Hasanudin', 'Produksi Hewan Donor', 'pkwt', '10007'),
('30040', 'HEDI JUNAEDI', 'CLEANING SERVICE', 'existing', '10015'),
('30041', 'HENDI DARMAWAN', 'CLEANING SERVICE', 'existing', '10026'),
('30042', 'HENDRA ERMAWAN', 'CLEANING SERVICE', 'existing', '10026'),
('30043', 'HERU', 'CLEANING SERVICE', 'existing', '10026'),
('30044', 'IFAN GUNAWAN', 'CLEANING SERVICE', 'existing', '10026'),
('30045', 'IIN HASIM', 'CLEANING SERVICE', 'existing', '10015'),
('30046', 'IKBAL RAHAYU', 'CLEANING SERVICE', 'existing', '10026'),
('30047', 'IRAWAN', 'CLEANING SERVICE', 'existing', '10026'),
('30049', 'LILI JAJULI', 'CLEANING SERVICE', 'existing', '10015'),
('30050', 'MIFTAH FARID', 'CLEANING SERVICE', 'existing', '10015'),
('30051', 'MUHAMAD TEGAR GINANJAR', 'CLEANING SERVICE', 'existing', '10015'),
('30052', 'MUHAMMAD LUTHFI SUKMAWAN', 'CLEANING SERVICE', 'existing', '10015'),
('30053', 'MUHIBUDIN', 'CLEANING SERVICE', 'existing', '10015'),
('30054', 'NURYADI', 'CLEANING SERVICE', 'existing', '10015'),
('30055', 'PRAJA ZAKARIA', 'CLEANING SERVICE', 'existing', '10015'),
('30056', 'RAAFIANSYAH SANDAVA', 'CLEANING SERVICE', 'existing', '10015'),
('30057', 'Rachmat Indra Gunawan', 'Mekanik & Utilitas', 'pkwt', '10007'),
('30058', 'RACHMAT RAMDANI', 'CLEANING SERVICE', 'existing', '10015'),
('30059', 'REDI ERAWAN', 'CLEANING SERVICE', 'existing', '10015'),
('30060', 'RENGGA ROMAENGGA', 'CLEANING SERVICE', 'existing', '10026'),
('30061', 'REZA AGUS NUGRAHA', 'CLEANING SERVICE', 'existing', '10015'),
('30062', 'RIDWAN GUNAWAN', 'CLEANING SERVICE', 'existing', '10015'),
('30063', 'RONI SULISTIYANA', 'CLEANING SERVICE', 'existing', '10015'),
('30064', 'SAEFUL MUIN', 'CLEANING SERVICE', 'existing', '10015'),
('30065', 'SUMARNA', 'CLEANING SERVICE', 'existing', '10015'),
('30066', 'SURYONO', 'CLEANING SERVICE', 'existing', '10015'),
('30068', 'TAUPIK NURHIDAYAT', 'CLEANING SERVICE', 'existing', '10015'),
('30069', 'TISNA', 'CLEANING SERVICE', 'existing', '10015'),
('30070', 'TONI RAMDAN', 'CLEANING SERVICE', 'existing', '10015'),
('30071', 'WANDI', 'CLEANING SERVICE', 'existing', '10015'),
('30072', 'YANTO DARMAWAN', 'CLEANING SERVICE', 'existing', '10015'),
('30073', 'YAYA INDRIANA', 'CLEANING SERVICE', 'existing', '10026'),
('30074', 'Yogi Anggara S', 'Produksi Hewan Donor', 'pkwt', '10007'),
('30075', 'YOSEP NUGRAHA', 'CLEANING SERVICE', 'existing', '10015'),
('30076', 'YUSUF SUNANDAR', 'CLEANING SERVICE', 'existing', '10015'),
('30077', 'ZULVIKAR KAHFI HUDAYA', 'CLEANING SERVICE', 'existing', '10015'),
('30078', 'DUDI SUPRIYADI ', 'CLEANING SERVICE', 'existing', '10026'),
('30080', 'Ade Sujana', 'Pembiakan Hewan Lab.', 'pkwt', '10007'),
('30082', 'DANISWAN', 'CLEANING SERVICE', 'existing', '10026'),
('30083', 'DEDIH KARYANA', 'CLEANING SERVICE', 'existing', '10026'),
('30084', 'Choerunisa', 'CS Jakarta', 'pkwt', '10007'),
('40001', 'ABU SOFYAN', 'SECURITY', 'existing', '10010'),
('40002', 'ADANG KUSDINAR', 'SECURITY', 'existing', '10010'),
('40003', 'ADE MUJAFARUDIN', 'SECURITY', 'existing', '10010'),
('40004', 'AGUS DWI OKTIANTORO', 'SECURITY', 'existing', '10010'),
('40005', 'AGUS PERI HERDIKA', 'SECURITY', 'existing', '10010'),
('40006', 'AGUS SETIADI', 'SECURITY', 'existing', '10010'),
('40007', 'AGUS SOLEH', 'SECURITY', 'existing', '10010'),
('40008', 'ANDRI IRAWAN', 'SECURITY', 'existing', '10010'),
('40009', 'ARI SOPARI', 'SECURITY', 'existing', '10010'),
('40010', 'ARIANTO', 'SECURITY', 'existing', '10010'),
('40011', 'ASEP S DIPURA', 'SECURITY', 'existing', '10010'),
('40012', 'BUDIMAN SEPTIADI', 'SECURITY', 'existing', '10010'),
('40013', 'BUDIYANA', 'SECURITY', 'existing', '10010'),
('40014', 'CECEP FEBRI H', 'SECURITY', 'existing', '10010'),
('40015', 'DANI BUDIMAN', 'SECURITY', 'existing', '10010'),
('40016', 'DANI JAELANI', 'SECURITY', 'existing', '10010'),
('40017', 'DANI MUSLIHAT', 'SECURITY', 'existing', '10010'),
('40018', 'DANI PARDANI', 'SECURITY', 'existing', '10010'),
('40019', 'DANU SUMPENA', 'SECURITY', 'existing', '10010'),
('40020', 'DENI', 'SECURITY', 'existing', '10010'),
('40021', 'DENI RAMDANI', 'SECURITY', 'existing', '10010'),
('40022', 'DIAN HADIANSYAH', 'SECURITY', 'existing', '10010'),
('40023', 'EDI ROHIMAT', 'SECURITY', 'existing', '10010'),
('40024', 'ELANG ALI HUSENSYAH', 'SECURITY', 'existing', '10010'),
('40025', 'ENCANG', 'SECURITY', 'existing', '10010'),
('40026', 'ETTIH', 'SECURITY', 'existing', '10010'),
('40027', 'FARID HAMDY NUGRAHA', 'SECURITY', 'existing', '10010'),
('40028', 'GUSDIANA', 'SECURITY', 'existing', '10010'),
('40029', 'HADI BRATA', 'SECURITY', 'existing', '10010'),
('40030', 'HADI SAPARI', 'SECURITY', 'existing', '10010'),
('40031', 'HENDAR HERMAWAN', 'SECURITY', 'existing', '10010'),
('40032', 'HENDRIYANTO', 'SECURITY', 'existing', '10010'),
('40033', 'HERI SUMARNA', 'SECURITY', 'existing', '10010'),
('40034', 'HERU CHAERUDIN', 'SECURITY', 'existing', '10010'),
('40035', 'IRMAN NUROHMAN', 'SECURITY', 'existing', '10010'),
('40037', 'MAMAN RAHMAN', 'SECURITY', 'existing', '10010'),
('40038', 'MOHAMMAD ROYZEN', 'SECURITY', 'existing', '10010'),
('40039', 'NANA RUSYANA', 'SECURITY', 'existing', '10010'),
('40040', 'NANA SUPRIATNA', 'SECURITY', 'existing', '10010'),
('40041', 'NANDANG SYARIPUDIN', 'SECURITY', 'existing', '10010'),
('40042', 'OIM NURROHIM', 'SECURITY', 'existing', '10010'),
('40043', 'ONO KUSWANA', 'SECURITY', 'existing', '10010'),
('40044', 'PEPEP ROMANSYAH', 'SECURITY', 'existing', '10010'),
('40045', 'RACHMAN', 'SECURITY', 'existing', '10010'),
('40046', 'ROBI HIDAYAT', 'SECURITY', 'existing', '10010'),
('40047', 'ROPRILANI JATNIKA', 'SECURITY', 'existing', '10010'),
('40048', 'ROSSY SULASTRI HANDAYANI', 'SECURITY', 'existing', '10010'),
('40049', 'RULLY YUSNANDAR', 'SECURITY', 'existing', '10010'),
('40050', 'SANTI SEFTIAMILA', 'SECURITY', 'existing', '10010'),
('40051', 'SONDA SABARA', 'SECURITY', 'existing', '10010'),
('40052', 'SUMARNA', 'SECURITY', 'existing', '10010'),
('40053', 'TANTY WIDYANINGSIH', 'SECURITY', 'existing', '10010'),
('40055', 'UDIN JAENUDDIN', 'SECURITY', 'existing', '10010'),
('40056', 'YUDI EFENDI', 'SECURITY', 'existing', '10010'),
('40057', 'YUSUP SUPRIADI', 'SECURITY', 'existing', '10010'),
('40058', 'AGUS TEDI SETIADI', 'SECURITY', 'existing', '10010'),
('40059', 'ABDULLAH JAELANI', 'SECURITY', 'existing', '10010'),
('50001', 'ARIF KURNIAWAN', 'DRIVER', 'existing', '10010'),
('50002', 'CECEP SUPARWAN', 'DRIVER', 'existing', '10010'),
('50003', 'ENDI WITAPA', 'DRIVER', 'existing', '10010'),
('50004', 'HERA HERMANSYAH', 'DRIVER', 'existing', '10010'),
('50005', 'NANA SUBARNA', 'DRIVER', 'existing', '10010'),
('50006', 'SAEPULOH', 'DRIVER', 'existing', '10010'),
('50007', 'SURYANA', 'DRIVER', 'existing', '10010'),
('50008', 'YUSUP MAULANA', 'DRIVER', 'existing', '10010'),
('50009', 'YUYU YUHANA', 'DRIVER', 'existing', '10010'),
('50010', 'IMAN NURHIDAYAT', 'DRIVER', 'existing', '10010'),
('50011', 'REZKY YANIANTO', 'DRIVER', 'existing', '10010'),
('50012', 'AGAM NURMANSYAH', 'DRIVER', 'existing', '10010'),
('50013', 'AGUNG SAIMAN', 'DRIVER', 'existing', '10010'),
('50014', 'JUNGGO', 'DRIVER', 'existing', '10010'),
('60001', 'A. DADANG DARUSIN', 'TEKNIK PENDINGIN & BANGUNAN', 'existing', '10013'),
('60002', 'ANA DIDI SUMADI', 'TEKNIK PENDINGIN & BANGUNAN', 'existing', '10013'),
('60003', 'ASEP MARLIN HAFID', 'TEKNIK PENDINGIN & BANGUNAN', 'existing', '10013'),
('60004', 'ASEP SAEPUDIN', 'TEKNIK PENDINGIN & BANGUNAN', 'existing', '10013'),
('60005', 'SUHERMAN', 'TEKNIK PENDINGIN & BANGUNAN', 'existing', '10013'),
('60006', 'ATIP SUKANDI', 'TEKNIK PENDINGIN & BANGUNAN', 'existing', '10013'),
('60007', 'DEDE ROSADI', 'TEKNIK PENDINGIN & BANGUNAN', 'existing', '10013'),
('60008', 'EKO WIDODO', 'TEKNIK PENDINGIN & BANGUNAN', 'existing', '10013'),
('60009', 'HENDI ROHENDI', 'TEKNIK PENDINGIN & BANGUNAN', 'existing', '10013'),
('60010', 'IMANSYAH KUSNADI', 'TEKNIK PENDINGIN & BANGUNAN', 'existing', '10013'),
('60011', 'IWAN', 'TEKNIK PENDINGIN & BANGUNAN', 'existing', '10013'),
('60012', 'NANA PERMANA', 'TEKNIK PENDINGIN & BANGUNAN', 'existing', '10013'),
('60013', 'OMAN SUHERMAN', 'TEKNIK PENDINGIN & BANGUNAN', 'existing', '10013'),
('60014', 'RISWAN PRIATNA', 'TEKNIK PENDINGIN & BANGUNAN', 'existing', '10013'),
('60015', 'SALIM', 'TEKNIK PENDINGIN & BANGUNAN', 'existing', '10013'),
('60016', 'TATANG SUPRIADI', 'TEKNIK PENDINGIN & BANGUNAN', 'existing', '10013'),
('60017', 'TONDY AMINURAHMAN', 'TEKNIK PENDINGIN & BANGUNAN', 'existing', '10013'),
('60018', 'U RUHIAT', 'TEKNIK PENDINGIN & BANGUNAN', 'existing', '10013'),
('60019', 'WIRAWAN', 'TEKNIK PENDINGIN & BANGUNAN', 'existing', '10013'),
('60020', 'YANTO', 'TEKNIK PENDINGIN & BANGUNAN', 'existing', '10013'),
('60021', 'ACHMAD DADAN KURNIAWAN', 'TEKNIK MEKANIK & UTILITAS', 'existing', '10013'),
('60022', 'AGUS KUSNADI', 'TEKNIK MEKANIK & UTILITAS', 'existing', '10013'),
('60023', 'ARIE KUSUMA', 'TEKNIK PENDINGIN & BANGUNAN', 'existing', '10013'),
('60024', 'ARIEF DIMYATI', 'TEKNIK MEKANIK & UTILITAS', 'existing', '10013'),
('60025', 'DJUANSAH', 'TEKNIK MEKANIK & UTILITAS', 'existing', '10013'),
('60027', 'ERIS RISNANDI', 'TEKNIK MEKANIK & UTILITAS', 'existing', '10013'),
('60028', 'FAJAR SIDIK', 'TEKNIK MEKANIK & UTILITAS', 'existing', '10013'),
('60029', 'IKMAL MUHAMMAD ALIF SYAHIDIN', 'TEKNIK MEKANIK & UTILITAS', 'existing', '10013'),
('60030', 'JULI TRIANSYAH', 'TEKNIK MEKANIK & UTILITAS', 'existing', '10013'),
('60031', 'OLEH SAENUDIN', 'TEKNIK MEKANIK & UTILITAS', 'existing', '10013'),
('60032', 'SAEPUDIN', 'TEKNIK MEKANIK & UTILITAS', 'existing', '10013'),
('60033', 'SUGIMAN DIATMOJO', 'TEKNIK MEKANIK & UTILITAS', 'existing', '10013'),
('60034', 'ADI FIRMAN HIDAYAT', 'TEKNIK LISTRIK & JARINGAN', 'existing', '10013'),
('60035', 'HANDI GUMELAR', 'TEKNIK MEKANIK & UTILITAS', 'existing', '10013'),
('60036', 'RAMDAN GUNAWAN', 'TEKNIK LISTRIK & JARINGAN', 'existing', '10013'),
('60037', 'SUGIARTO', 'TEKNIK LISTRIK & JARINGAN', 'existing', '10013'),
('60038', 'SUPRIYANTO', 'TEKNIK LISTRIK & JARINGAN', 'existing', '10013'),
('60039', 'TONI ROHENDI', 'TEKNIK MEKANIK & UTILITAS', 'existing', '10013'),
('60040', 'ADE DARMAWAN', 'TEKNIK VALIDASI & KALIBRASI', 'existing', '10013'),
('60041', 'ASRI KOMALASARI', 'TEKNIK VALIDASI & KALIBRASI', 'existing', '10013'),
('60042', 'IRMAN HIDAYAT', 'TEKNIK VALIDASI & KALIBRASI', 'existing', '10013'),
('60043', 'YUSRAL YULIAN', 'TEKNIK VALIDASI & KALIBRASI', 'existing', '10013'),
('60044', 'ABDUL WAHAB', 'PERGUDANGAN', 'existing', '10013'),
('60045', 'ANDRIYAN AFTOHADI', 'PERGUDANGAN', 'existing', '10013'),
('60046', 'DIDIN SAPRUDIN', 'PERGUDANGAN', 'existing', '10013'),
('60047', 'ERKI SANDHI NUGRAHA', 'PERGUDANGAN', 'existing', '10013'),
('60048', 'ERWIN NURDIANSYAH', 'PERGUDANGAN', 'existing', '10013'),
('60049', 'FEBI FINOSA', 'PERGUDANGAN', 'existing', '10013'),
('60050', 'TEDI HIDAYAT', 'PERGUDANGAN', 'existing', '10013'),
('60051', 'VYAN RIVIANO SAPUTRA', 'PERGUDANGAN', 'existing', '10013'),
('60052', 'HARIS JAELANI', 'EHS / LKK', 'existing', '10013'),
('60053', 'OO SUARDI', 'EHS / LKK', 'existing', '10013'),
('60054', 'ROHIMAT', 'EHS / LKK', 'existing', '10013'),
('60055', 'YANTO RIYANTO', 'EHS / LKK', 'existing', '10013'),
('60056', 'AGUS YANA', '   DISTRIBUSI', 'existing', '10013'),
('60057', 'DANDI ZAENAL ARIFIN', '   DISTRIBUSI', 'existing', '10013'),
('60058', 'IRSAN FAHTURAHMAN', '   DISTRIBUSI', 'existing', '10013'),
('60059', 'MILDI HAKIM', '   DISTRIBUSI', 'existing', '10013'),
('60060', 'MOHAMAD SURYANA', '   DISTRIBUSI', 'existing', '10013'),
('60061', 'ANDRI PRAMA PRIBADI', 'EHS / LKK', 'existing', '10013'),
('60062', 'GILANG MUHAMMAD RAMADHAN', 'EHS / LKK', 'existing', '10013');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_quota_cuti`
--

CREATE TABLE `tbl_quota_cuti` (
  `id_quota` int(11) NOT NULL,
  `thn_cuti` int(11) NOT NULL,
  `cuti_pemerintah` int(11) NOT NULL,
  `cuti_bersama` int(11) NOT NULL,
  `sisa_cuti` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_quota_cuti`
--

INSERT INTO `tbl_quota_cuti` (`id_quota`, `thn_cuti`, `cuti_pemerintah`, `cuti_bersama`, `sisa_cuti`) VALUES
(1, 2018, 12, 5, 7);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cuti_khusus`
--
ALTER TABLE `cuti_khusus`
  ADD PRIMARY KEY (`id_cuti_khusus`);

--
-- Indexes for table `cuti_reguler`
--
ALTER TABLE `cuti_reguler`
  ADD PRIMARY KEY (`id_cuti_reguler`);

--
-- Indexes for table `tbl_approve_dir`
--
ALTER TABLE `tbl_approve_dir`
  ADD PRIMARY KEY (`id_approve_kasie`);

--
-- Indexes for table `tbl_approve_kabag`
--
ALTER TABLE `tbl_approve_kabag`
  ADD PRIMARY KEY (`id_approve_kabag`);

--
-- Indexes for table `tbl_approve_kasie`
--
ALTER TABLE `tbl_approve_kasie`
  ADD PRIMARY KEY (`id_approve_kasie`);

--
-- Indexes for table `tbl_approve_sdm`
--
ALTER TABLE `tbl_approve_sdm`
  ADD PRIMARY KEY (`id_approve_sdm`);

--
-- Indexes for table `tbl_approve_spv`
--
ALTER TABLE `tbl_approve_spv`
  ADD PRIMARY KEY (`id_approve_spv`);

--
-- Indexes for table `tbl_karyawan`
--
ALTER TABLE `tbl_karyawan`
  ADD PRIMARY KEY (`id_karyawan`);

--
-- Indexes for table `tbl_quota_cuti`
--
ALTER TABLE `tbl_quota_cuti`
  ADD PRIMARY KEY (`id_quota`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_approve_dir`
--
ALTER TABLE `tbl_approve_dir`
  MODIFY `id_approve_kasie` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_approve_kabag`
--
ALTER TABLE `tbl_approve_kabag`
  MODIFY `id_approve_kabag` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_approve_kasie`
--
ALTER TABLE `tbl_approve_kasie`
  MODIFY `id_approve_kasie` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_approve_sdm`
--
ALTER TABLE `tbl_approve_sdm`
  MODIFY `id_approve_sdm` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_approve_spv`
--
ALTER TABLE `tbl_approve_spv`
  MODIFY `id_approve_spv` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_quota_cuti`
--
ALTER TABLE `tbl_quota_cuti`
  MODIFY `id_quota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
