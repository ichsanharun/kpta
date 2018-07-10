-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.1.24-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win32
-- HeidiSQL Version:             9.4.0.5169
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping structure for table si_kpta.admin
CREATE TABLE IF NOT EXISTS `admin` (
  `id_admin` varchar(15) NOT NULL,
  `nama_admin` varchar(100) DEFAULT NULL,
  `email_admin` varchar(100) DEFAULT NULL,
  `tanggal_lahir_admin` date DEFAULT NULL,
  `tempat_lahir_admin` varchar(40) DEFAULT NULL,
  `agama_admin` varchar(15) DEFAULT NULL,
  `password_admin` varchar(100) DEFAULT NULL,
  `jk_admin` enum('L','P') DEFAULT NULL,
  `status_kerja` enum('Aktif','Tidak Aktif') DEFAULT NULL,
  `alamat_admin` text,
  PRIMARY KEY (`id_admin`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- Dumping data for table si_kpta.admin: ~0 rows (approximately)
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
REPLACE INTO `admin` (`id_admin`, `nama_admin`, `email_admin`, `tanggal_lahir_admin`, `tempat_lahir_admin`, `agama_admin`, `password_admin`, `jk_admin`, `status_kerja`, `alamat_admin`) VALUES
	('adm0001', 'Agi A', 'mail@mail.com', '1995-01-01', 'Jakarta', 'Islam', 'admin', 'L', 'Aktif', 'Jakarta');
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;

-- Dumping structure for table si_kpta.dosen
CREATE TABLE IF NOT EXISTS `dosen` (
  `id_dosen` varchar(15) NOT NULL,
  `nama_dosen` varchar(100) DEFAULT NULL,
  `email_dosen` varchar(100) DEFAULT NULL,
  `tempat_lahir_dosen` varchar(40) DEFAULT NULL,
  `tanggal_lahir_dosen` date DEFAULT NULL,
  `agama_dosen` varchar(15) DEFAULT NULL,
  `password_dosen` varchar(100) DEFAULT NULL,
  `alamat_dosen` text,
  `jk_dosen` enum('L','P') DEFAULT NULL,
  PRIMARY KEY (`id_dosen`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- Dumping data for table si_kpta.dosen: ~2 rows (approximately)
/*!40000 ALTER TABLE `dosen` DISABLE KEYS */;
REPLACE INTO `dosen` (`id_dosen`, `nama_dosen`, `email_dosen`, `tempat_lahir_dosen`, `tanggal_lahir_dosen`, `agama_dosen`, `password_dosen`, `alamat_dosen`, `jk_dosen`) VALUES
	('DSN0001', 'Ichsan Harun', 'vb@mail.com', 'Jakarta', '1997-06-17', 'Islam', 'dosen', 'Jakarta', 'L'),
	('DSN0002', 'Safina Dewi', 'sd@mail.com', 'Jakarta', '1995-01-02', 'Islam', 'dosen02', 'Jakarta', 'P');
/*!40000 ALTER TABLE `dosen` ENABLE KEYS */;

-- Dumping structure for table si_kpta.fakultas
CREATE TABLE IF NOT EXISTS `fakultas` (
  `kode_fakultas` varchar(15) NOT NULL,
  `nama_fakultas` varchar(70) DEFAULT NULL,
  PRIMARY KEY (`kode_fakultas`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table si_kpta.fakultas: ~9 rows (approximately)
/*!40000 ALTER TABLE `fakultas` DISABLE KEYS */;
REPLACE INTO `fakultas` (`kode_fakultas`, `nama_fakultas`) VALUES
	('FAI', 'Fakultas Agama Islam'),
	('FE', 'Fakultas Ekonomi'),
	('FH', 'Fakultas Hukum'),
	('FIK', 'Fakultas Ilmu Keperawatan'),
	('FIP', 'Fakultas Ilmu Pendidikan'),
	('FISIP', 'Fakultas Ilmu Sosial & Ilmu Politik'),
	('FK', 'Fakultas Kedokteran'),
	('FP', 'Fakultas Pertanian'),
	('FT', 'Fakultas Tekni');
/*!40000 ALTER TABLE `fakultas` ENABLE KEYS */;

-- Dumping structure for table si_kpta.jadwal_kp
CREATE TABLE IF NOT EXISTS `jadwal_kp` (
  `id_jadwal_kp` varchar(15) NOT NULL,
  `judul_kp` varchar(100) NOT NULL,
  `nim` varchar(15) DEFAULT NULL,
  `nama_instansi` varchar(80) DEFAULT NULL,
  `alamat_instansi` text,
  `periode_daftar_kp` varchar(50) DEFAULT NULL,
  `tanggal_sidang_kp` date DEFAULT NULL,
  `status` varchar(15) DEFAULT NULL,
  `id_dosen` varchar(15) DEFAULT NULL,
  `hasil_sidang_kp` varchar(2) DEFAULT NULL,
  `id_surat_kp` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`id_jadwal_kp`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- Dumping data for table si_kpta.jadwal_kp: ~0 rows (approximately)
/*!40000 ALTER TABLE `jadwal_kp` DISABLE KEYS */;
REPLACE INTO `jadwal_kp` (`id_jadwal_kp`, `judul_kp`, `nim`, `nama_instansi`, `alamat_instansi`, `periode_daftar_kp`, `tanggal_sidang_kp`, `status`, `id_dosen`, `hasil_sidang_kp`, `id_surat_kp`) VALUES
	('KP2018070001', 'ANALISA JARINGAN KP', '0330036805', 'PT. Sunrise', 'Medan Satria', NULL, NULL, 'Disetujui', 'DSN0001', NULL, 'SKP2018070001');
/*!40000 ALTER TABLE `jadwal_kp` ENABLE KEYS */;

-- Dumping structure for table si_kpta.jadwal_kp_detail
CREATE TABLE IF NOT EXISTS `jadwal_kp_detail` (
  `id_jadwal_kp` varchar(15) DEFAULT NULL,
  `tanggal_bimbingan` date DEFAULT NULL,
  `pembahasan_bimbingan` text,
  `status` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table si_kpta.jadwal_kp_detail: ~0 rows (approximately)
/*!40000 ALTER TABLE `jadwal_kp_detail` DISABLE KEYS */;
/*!40000 ALTER TABLE `jadwal_kp_detail` ENABLE KEYS */;

-- Dumping structure for table si_kpta.jadwal_ta
CREATE TABLE IF NOT EXISTS `jadwal_ta` (
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
  `hasil_sidang_ta` varchar(3) DEFAULT NULL,
  `id_surat_ta` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`id_jadwal_ta`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table si_kpta.jadwal_ta: ~0 rows (approximately)
/*!40000 ALTER TABLE `jadwal_ta` DISABLE KEYS */;
/*!40000 ALTER TABLE `jadwal_ta` ENABLE KEYS */;

-- Dumping structure for table si_kpta.jadwal_ta_detail
CREATE TABLE IF NOT EXISTS `jadwal_ta_detail` (
  `id_jadwal_ta` varchar(15) DEFAULT NULL,
  `tanggal_bimbingan` date DEFAULT NULL,
  `pembahasan_bimbingan` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- Dumping data for table si_kpta.jadwal_ta_detail: ~0 rows (approximately)
/*!40000 ALTER TABLE `jadwal_ta_detail` DISABLE KEYS */;
/*!40000 ALTER TABLE `jadwal_ta_detail` ENABLE KEYS */;

-- Dumping structure for table si_kpta.jurusan
CREATE TABLE IF NOT EXISTS `jurusan` (
  `kode_jurusan` varchar(15) NOT NULL,
  `nama_jurusan` varchar(70) DEFAULT NULL,
  `kode_fakultas` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`kode_jurusan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table si_kpta.jurusan: ~44 rows (approximately)
/*!40000 ALTER TABLE `jurusan` DISABLE KEYS */;
REPLACE INTO `jurusan` (`kode_jurusan`, `nama_jurusan`, `kode_fakultas`) VALUES
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
/*!40000 ALTER TABLE `jurusan` ENABLE KEYS */;

-- Dumping structure for table si_kpta.mahasiswa
CREATE TABLE IF NOT EXISTS `mahasiswa` (
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
  `foto_mahasiswa` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`nim`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- Dumping data for table si_kpta.mahasiswa: ~2 rows (approximately)
/*!40000 ALTER TABLE `mahasiswa` DISABLE KEYS */;
REPLACE INTO `mahasiswa` (`nim`, `nama_mahasiswa`, `email_mahasiswa`, `tanggal_lahir_mahasiswa`, `tempat_lahir_mahasiswa`, `agama_mahasiswa`, `password_mahasiswa`, `jk_mahasiswa`, `semester_mahasiswa`, `alamat_mahasiswa`, `telepon_mahasiswa`, `kode_jurusan`, `jumlah_sks`, `foto_mahasiswa`) VALUES
	('0330036805', 'Siti Safina', 'ss@gmail.com', '1994-03-30', 'Jakarta', 'Islam', 'mhs', 'P', 8, 'Jakarta', '85711444410', 'JUR033', 100, 'ss.jpg'),
	('12145296', 'Mohammad Ichsan', 'ichsan.clay@gmail.com', '1997-06-17', 'Jakarta', 'Islam', 'mahasiswa', 'L', 8, 'Jakartra', NULL, 'JUR033', 95, NULL);
/*!40000 ALTER TABLE `mahasiswa` ENABLE KEYS */;

-- Dumping structure for table si_kpta.mata_kuliah
CREATE TABLE IF NOT EXISTS `mata_kuliah` (
  `kode_mk` varchar(15) NOT NULL,
  `nama_mk` varchar(70) DEFAULT NULL,
  `sks` int(11) DEFAULT NULL,
  PRIMARY KEY (`kode_mk`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table si_kpta.mata_kuliah: ~0 rows (approximately)
/*!40000 ALTER TABLE `mata_kuliah` DISABLE KEYS */;
/*!40000 ALTER TABLE `mata_kuliah` ENABLE KEYS */;

-- Dumping structure for table si_kpta.nilai
CREATE TABLE IF NOT EXISTS `nilai` (
  `id` varchar(15) NOT NULL,
  `nim` varchar(15) DEFAULT NULL,
  `semester` int(11) DEFAULT NULL,
  `ips` float DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table si_kpta.nilai: ~0 rows (approximately)
/*!40000 ALTER TABLE `nilai` DISABLE KEYS */;
/*!40000 ALTER TABLE `nilai` ENABLE KEYS */;

-- Dumping structure for table si_kpta.nilai_detail
CREATE TABLE IF NOT EXISTS `nilai_detail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nim` varchar(15) DEFAULT '0',
  `semester` int(11) DEFAULT '0',
  `kode_mk` varchar(15) DEFAULT '0',
  `n_absen` float DEFAULT '0',
  `n_tugas` float DEFAULT '0',
  `n_uts` float DEFAULT '0',
  `n_uas` float DEFAULT '0',
  `grade` varchar(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table si_kpta.nilai_detail: ~0 rows (approximately)
/*!40000 ALTER TABLE `nilai_detail` DISABLE KEYS */;
/*!40000 ALTER TABLE `nilai_detail` ENABLE KEYS */;

-- Dumping structure for table si_kpta.peminatan
CREATE TABLE IF NOT EXISTS `peminatan` (
  `kode_peminatan` varchar(15) NOT NULL,
  `nama_peminatan` varchar(50) DEFAULT NULL,
  `kode_jurusan` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`kode_peminatan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table si_kpta.peminatan: ~0 rows (approximately)
/*!40000 ALTER TABLE `peminatan` DISABLE KEYS */;
/*!40000 ALTER TABLE `peminatan` ENABLE KEYS */;

-- Dumping structure for table si_kpta.surat_kp
CREATE TABLE IF NOT EXISTS `surat_kp` (
  `id_surat_kp` varchar(15) NOT NULL,
  `judul_kp` varchar(15) NOT NULL,
  `nim` varchar(15) DEFAULT NULL,
  `nama_instansi` varchar(80) DEFAULT NULL,
  `alamat_instansi` text,
  `kebutuhan_instansi` text,
  `status` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id_surat_kp`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- Dumping data for table si_kpta.surat_kp: ~1 rows (approximately)
/*!40000 ALTER TABLE `surat_kp` DISABLE KEYS */;
REPLACE INTO `surat_kp` (`id_surat_kp`, `judul_kp`, `nim`, `nama_instansi`, `alamat_instansi`, `kebutuhan_instansi`, `status`) VALUES
	('SKP2018070001', '', '0330036805', 'PT. Sunrise', 'Medan Satria', 'Surat Riset dan Izin Dosen.', 'Disetujui');
/*!40000 ALTER TABLE `surat_kp` ENABLE KEYS */;

-- Dumping structure for table si_kpta.surat_ta
CREATE TABLE IF NOT EXISTS `surat_ta` (
  `id_surat_ta` varchar(15) NOT NULL,
  `judul_ta` varchar(100) NOT NULL,
  `nim` varchar(15) DEFAULT NULL,
  `nama_instansi` varchar(80) DEFAULT NULL,
  `alamat_instansi` text,
  `kebutuhan_instansi` text,
  `status` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id_surat_ta`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- Dumping data for table si_kpta.surat_ta: ~0 rows (approximately)
/*!40000 ALTER TABLE `surat_ta` DISABLE KEYS */;
REPLACE INTO `surat_ta` (`id_surat_ta`, `judul_ta`, `nim`, `nama_instansi`, `alamat_instansi`, `kebutuhan_instansi`, `status`) VALUES
	('STA2018070001', 'Analisa Rancang', '0330036805', 'PT. Softtech', 'Jakarta Pusat', 'Surat Izin Observasi.', 'Disetujui');
/*!40000 ALTER TABLE `surat_ta` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
