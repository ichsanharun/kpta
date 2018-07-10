-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 10, 2018 at 05:16 PM
-- Server version: 10.1.24-MariaDB
-- PHP Version: 7.0.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `si_kpta`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` varchar(15) NOT NULL,
  `nama_admin` varchar(100) DEFAULT NULL,
  `email_admin` varchar(100) DEFAULT NULL,
  `tanggal_lahir_admin` date DEFAULT NULL,
  `tempat_lahir_admin` varchar(40) DEFAULT NULL,
  `agama_admin` varchar(15) DEFAULT NULL,
  `password_admin` varchar(100) DEFAULT NULL,
  `jk_admin` enum('L','P') DEFAULT NULL,
  `status_kerja` enum('Aktif','Tidak Aktif') DEFAULT NULL,
  `alamat_admin` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `nama_admin`, `email_admin`, `tanggal_lahir_admin`, `tempat_lahir_admin`, `agama_admin`, `password_admin`, `jk_admin`, `status_kerja`, `alamat_admin`) VALUES
('adm0001', 'Agi', 'mail@mail.com', '1995-01-01', 'Jakarta', 'Islam', 'admin', 'L', 'Aktif', 'Jakarta');

-- --------------------------------------------------------

--
-- Table structure for table `dosen`
--

CREATE TABLE `dosen` (
  `id_dosen` varchar(15) NOT NULL,
  `nama_dosen` varchar(100) DEFAULT NULL,
  `email_dosen` varchar(100) DEFAULT NULL,
  `tempat_lahir_dosen` varchar(40) DEFAULT NULL,
  `tanggal_lahir_dosen` date DEFAULT NULL,
  `agama_dosen` varchar(15) DEFAULT NULL,
  `password_dosen` varchar(100) DEFAULT NULL,
  `alamat_dosen` text,
  `jk_dosen` enum('L','P') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `dosen`
--

INSERT INTO `dosen` (`id_dosen`, `nama_dosen`, `email_dosen`, `tempat_lahir_dosen`, `tanggal_lahir_dosen`, `agama_dosen`, `password_dosen`, `alamat_dosen`, `jk_dosen`) VALUES
('DSN0001', 'Ichsan Harun', 'vb@mail.com', 'Jakarta', '1997-06-17', 'Islam', 'dosen', 'Jakarta', 'L'),
('DSN0002', 'Safina Dewi', 'sd@mail.com', 'Jakarta', '1995-01-02', 'Islam', 'dosen02', 'Jakarta', 'P');

-- --------------------------------------------------------

--
-- Table structure for table `fakultas`
--

CREATE TABLE `fakultas` (
  `kode_fakultas` varchar(15) NOT NULL,
  `nama_fakultas` varchar(70) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fakultas`
--

INSERT INTO `fakultas` (`kode_fakultas`, `nama_fakultas`) VALUES
('FAI', 'Fakultas Agama Islam'),
('FE', 'Fakultas Ekonomi'),
('FH', 'Fakultas Hukum'),
('FIK', 'Fakultas Ilmu Keperawatan'),
('FIP', 'Fakultas Ilmu Pendidikan'),
('FISIP', 'Fakultas Ilmu Sosial & Ilmu Politik'),
('FK', 'Fakultas Kedokteran'),
('FP', 'Fakultas Pertanian'),
('FT', 'Fakultas Tekni');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal_kp`
--

CREATE TABLE `jadwal_kp` (
  `id_jadwal_kp` varchar(15) NOT NULL,
  `judul_kp` varchar(100) NOT NULL,
  `nim` varchar(15) DEFAULT NULL,
  `nama_instansi` varchar(80) DEFAULT NULL,
  `alamat_instansi` text,
  `periode_daftar_kp` varchar(50) DEFAULT NULL,
  `tanggal_sidang_kp` date DEFAULT NULL,
  `status` varchar(15) DEFAULT NULL,
  `id_dosen` varchar(15) DEFAULT NULL,
  `hasil_sidang_kp` varchar(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `jadwal_kp_detail`
--

CREATE TABLE `jadwal_kp_detail` (
  `id_jadwal_kp` varchar(15) DEFAULT NULL,
  `tanggal_bimbingan` date DEFAULT NULL,
  `pembahasan_bimbingan` text,
  `status` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `jadwal_ta`
--

CREATE TABLE `jadwal_ta` (
  `id_jadwal_ta` varchar(15) NOT NULL,
  `judul_ta` varchar(100) NOT NULL,
  `nim` varchar(15) DEFAULT NULL,
  `periode_daftar_ta` date DEFAULT NULL,
  `tanggal_sidang_ta` date DEFAULT NULL,
  `nama_instansi` varchar(80) DEFAULT NULL,
  `alamat_instansi` text,
  `kebutuhan_instansi` text,
  `id_dosen` varchar(15) DEFAULT NULL,
  `status` varchar(15) DEFAULT NULL,
  `hasil_sidang_ta` varchar(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `jadwal_ta_detail`
--

CREATE TABLE `jadwal_ta_detail` (
  `id_jadwal_ta` varchar(15) DEFAULT NULL,
  `tanggal_bimbingan` date DEFAULT NULL,
  `pembahasan_bimbingan` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `jurusan`
--

CREATE TABLE `jurusan` (
  `kode_jurusan` varchar(15) NOT NULL,
  `nama_jurusan` varchar(70) DEFAULT NULL,
  `kode_fakultas` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jurusan`
--

INSERT INTO `jurusan` (`kode_jurusan`, `nama_jurusan`, `kode_fakultas`) VALUES
('JUR001', 'Kesejahteraan Sosial', 'FISIP'),
('JUR002', 'Administrasi Publik', 'FISIP'),
('JUR003', 'Ilmu Politik', 'FISIP'),
('JUR004', 'Ilmu Komunikasi', 'FISIP'),
('JUR005', 'Magister Ilmu Administrasi', 'FISIP'),
('JUR006', 'Magister Ilmu Komunikasi', 'FISIP'),
('JUR007', 'Pendidikan Agama Islam', 'FAI'),
('JUR008', 'Hukum Keluarga', 'FAI'),
('JUR009', 'Komunikasi Penyiaran Islam', 'FAI'),
('JUR010', 'Perbankan Syariah', 'FAI'),
('JUR011', 'Zakat dan Wakaf', 'FAI'),
('JUR012', 'PGMI', 'FAI'),
('JUR013', 'Magister Studi Islam', 'FAI'),
('JUR014', 'Hukum', 'FH'),
('JUR015', 'Magister Hukum', 'FH'),
('JUR016', 'Manajemen', 'FE'),
('JUR017', 'Akuntasi', 'FE'),
('JUR018', 'Ekonomi Islam', 'FE'),
('JUR019', 'Magister Manajemen', 'FE'),
('JUR020', 'Magister Akuntasi', 'FE'),
('JUR021', 'PG-PAUD', 'FIP'),
('JUR022', 'PG-SD', 'FIP'),
('JUR023', 'Pendidikan Matematika', 'FIP'),
('JUR024', 'Pendidikan Bahasa dan Sastra Indonesia', 'FIP'),
('JUR025', 'Pendidikan Bahasa Inggris', 'FIP'),
('JUR026', 'Magister Teknologi Pendidikan', 'FIP'),
('JUR027', 'Teknik Sipil', 'FT'),
('JUR028', 'Teknik Elektro', 'FT'),
('JUR029', 'Teknik Kimia', 'FT'),
('JUR030', 'Teknik Mesin', 'FT'),
('JUR031', 'Teknik Industri', 'FT'),
('JUR032', 'Arsitektur', 'FT'),
('JUR033', 'Teknik Informatika', 'FT'),
('JUR034', 'Perawatan Alat Belat [D3]', 'FT'),
('JUR035', 'Agroteknologi', 'FP'),
('JUR036', 'Kedokteran', 'FK'),
('JUR037', 'Profesi Dokter', 'FK'),
('JUR038', 'Kesehatan Masyarakat', 'FK'),
('JUR039', 'D3 Kebidanan', 'FK'),
('JUR040', 'Magister Kesehatan Masyarakat', 'FK'),
('JUR041', 'Keperawatan', 'FIK'),
('JUR042', 'Profesi Ners', 'FIK'),
('JUR043', 'D3 Keperawatan', 'FIK'),
('JUR044', 'Magister Keperawatan', 'FIK');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `nim` varchar(15) NOT NULL,
  `nama_mahasiswa` varchar(100) DEFAULT NULL,
  `email_mahasiswa` varchar(100) DEFAULT NULL,
  `tanggal_lahir_mahasiswa` date DEFAULT NULL,
  `tempat_lahir_mahasiswa` varchar(40) DEFAULT NULL,
  `agama_mahasiswa` varchar(15) DEFAULT NULL,
  `password_mahasiswa` varchar(100) DEFAULT NULL,
  `jk_mahasiswa` enum('L','P') DEFAULT NULL,
  `semester_mahasiswa` int(11) DEFAULT NULL,
  `alamat_mahasiswa` text,
  `telepon_mahasiswa` varchar(15) DEFAULT NULL,
  `kode_jurusan` varchar(15) DEFAULT NULL,
  `jumlah_sks` int(11) DEFAULT NULL,
  `foto_mahasiswa` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`nim`, `nama_mahasiswa`, `email_mahasiswa`, `tanggal_lahir_mahasiswa`, `tempat_lahir_mahasiswa`, `agama_mahasiswa`, `password_mahasiswa`, `jk_mahasiswa`, `semester_mahasiswa`, `alamat_mahasiswa`, `telepon_mahasiswa`, `kode_jurusan`, `jumlah_sks`, `foto_mahasiswa`) VALUES
('0330036805', 'Siti Safina', 'ss@gmail.com', '1994-03-30', 'Jakarta', 'Islam', 'mhs', 'P', 8, 'Jakarta', '85711444410', 'JUR033', 100, 'ss.jpg'),
('12145296', 'Mohammad Ichsan', 'ichsan.clay@gmail.com', '1997-06-17', 'Jakarta', 'Islam', 'mahasiswa', 'L', 8, 'Jakartra', NULL, 'JUR033', 95, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `mata_kuliah`
--

CREATE TABLE `mata_kuliah` (
  `kode_mk` varchar(15) NOT NULL,
  `nama_mk` varchar(70) DEFAULT NULL,
  `sks` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `nilai`
--

CREATE TABLE `nilai` (
  `id` varchar(15) NOT NULL,
  `nim` varchar(15) DEFAULT NULL,
  `semester` int(11) DEFAULT NULL,
  `ips` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `nilai_detail`
--

CREATE TABLE `nilai_detail` (
  `id` int(11) NOT NULL,
  `nim` varchar(15) DEFAULT '0',
  `semester` int(11) DEFAULT '0',
  `kode_mk` varchar(15) DEFAULT '0',
  `n_absen` float DEFAULT '0',
  `n_tugas` float DEFAULT '0',
  `n_uts` float DEFAULT '0',
  `n_uas` float DEFAULT '0',
  `grade` varchar(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `peminatan`
--

CREATE TABLE `peminatan` (
  `kode_peminatan` varchar(15) NOT NULL,
  `nama_peminatan` varchar(50) DEFAULT NULL,
  `kode_jurusan` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `surat_kp`
--

CREATE TABLE `surat_kp` (
  `id_surat_kp` varchar(15) NOT NULL,
  `judul_kp` varchar(15) NOT NULL,
  `nim` varchar(15) DEFAULT NULL,
  `nama_instansi` varchar(80) DEFAULT NULL,
  `alamat_instansi` text,
  `kebutuhan_instansi` text,
  `status` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `surat_kp`
--

INSERT INTO `surat_kp` (`id_surat_kp`, `judul_kp`, `nim`, `nama_instansi`, `alamat_instansi`, `kebutuhan_instansi`, `status`) VALUES
('SKP2018070001', '', '0330036805', 'PT. Sunrise', 'Medan Satria', 'Surat Riset dan Izin Dosen.', 'Disetujui');

-- --------------------------------------------------------

--
-- Table structure for table `surat_ta`
--

CREATE TABLE `surat_ta` (
  `id_surat_ta` varchar(15) NOT NULL,
  `judul_ta` varchar(100) NOT NULL,
  `nim` varchar(15) DEFAULT NULL,
  `nama_instansi` varchar(80) DEFAULT NULL,
  `alamat_instansi` text,
  `kebutuhan_instansi` text,
  `status` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `surat_ta`
--

INSERT INTO `surat_ta` (`id_surat_ta`, `judul_ta`, `nim`, `nama_instansi`, `alamat_instansi`, `kebutuhan_instansi`, `status`) VALUES
('STA2018070001', 'Analisa Rancang', '0330036805', 'PT. Softtech', 'Jakarta Pusat', 'Surat Izin Observasi.', 'Disetujui');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`id_dosen`);

--
-- Indexes for table `fakultas`
--
ALTER TABLE `fakultas`
  ADD PRIMARY KEY (`kode_fakultas`);

--
-- Indexes for table `jadwal_kp`
--
ALTER TABLE `jadwal_kp`
  ADD PRIMARY KEY (`id_jadwal_kp`);

--
-- Indexes for table `jadwal_ta`
--
ALTER TABLE `jadwal_ta`
  ADD PRIMARY KEY (`id_jadwal_ta`);

--
-- Indexes for table `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`kode_jurusan`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`nim`);

--
-- Indexes for table `mata_kuliah`
--
ALTER TABLE `mata_kuliah`
  ADD PRIMARY KEY (`kode_mk`);

--
-- Indexes for table `nilai`
--
ALTER TABLE `nilai`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nilai_detail`
--
ALTER TABLE `nilai_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `peminatan`
--
ALTER TABLE `peminatan`
  ADD PRIMARY KEY (`kode_peminatan`);

--
-- Indexes for table `surat_kp`
--
ALTER TABLE `surat_kp`
  ADD PRIMARY KEY (`id_surat_kp`);

--
-- Indexes for table `surat_ta`
--
ALTER TABLE `surat_ta`
  ADD PRIMARY KEY (`id_surat_ta`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `nilai_detail`
--
ALTER TABLE `nilai_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
