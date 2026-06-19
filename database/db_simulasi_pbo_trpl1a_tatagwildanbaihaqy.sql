-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 19, 2026 at 02:54 AM
-- Server version: 12.3.2-MariaDB
-- PHP Version: 8.5.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_simulasi_pbo_trpl1a_tatagwildanbaihaqy`
--

-- --------------------------------------------------------

--
-- Table structure for table `tabel_pendaftaran`
--

CREATE TABLE `tabel_pendaftaran` (
  `id_pendaftaran` int(11) NOT NULL,
  `nama_calon` varchar(100) NOT NULL,
  `asal_sekolah` varchar(100) NOT NULL,
  `nilai_ujian` decimal(5,2) NOT NULL,
  `biaya_pendaftaran_dasar` decimal(10,2) NOT NULL,
  `jalur_pendaftaran` enum('Reguler','Prestasi','Kedinasan') NOT NULL,
  `pilihan_prodi` varchar(50) DEFAULT NULL,
  `lokasi_kampus` varchar(50) DEFAULT NULL,
  `jenis_prestasi` varchar(50) DEFAULT NULL,
  `tingkat_prestasi` varchar(50) DEFAULT NULL,
  `sk_ikatan_dinas` varchar(50) DEFAULT NULL,
  `instansi_sponsor` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tabel_pendaftaran`
--

INSERT INTO `tabel_pendaftaran` (`id_pendaftaran`, `nama_calon`, `asal_sekolah`, `nilai_ujian`, `biaya_pendaftaran_dasar`, `jalur_pendaftaran`, `pilihan_prodi`, `lokasi_kampus`, `jenis_prestasi`, `tingkat_prestasi`, `sk_ikatan_dinas`, `instansi_sponsor`) VALUES
(1, 'Ahmad Fauzi', 'SMAN 1 Jakarta', 85.50, 250000.00, 'Reguler', 'Teknik Informatika', 'Kampus Utama', NULL, NULL, NULL, NULL),
(2, 'Budi Santoso', 'SMAN 3 Bandung', 78.25, 250000.00, 'Reguler', 'Sistem Informasi', 'Kampus Utama', NULL, NULL, NULL, NULL),
(3, 'Citra Lestari', 'SMA 2 Surabaya', 90.00, 250000.00, 'Reguler', 'Ilmu Komputer', 'Kampus B', NULL, NULL, NULL, NULL),
(4, 'Dedi Dermawan', 'SMKN 1 Yogyakarta', 82.10, 250000.00, 'Reguler', 'Teknik Elektro', 'Kampus Utama', NULL, NULL, NULL, NULL),
(5, 'Eka Putri', 'SMAN 5 Semarang', 88.75, 250000.00, 'Reguler', 'Manajemen Informatika', 'Kampus B', NULL, NULL, NULL, NULL),
(6, 'Fajar Hidayat', 'SMAN 1 Medan', 79.40, 250000.00, 'Reguler', 'Teknik Informatika', 'Kampus Utama', NULL, NULL, NULL, NULL),
(7, 'Gita Gutawa', 'SMAN 8 Jakarta', 92.30, 250000.00, 'Reguler', 'Ilmu Komputer', 'Kampus Utama', NULL, NULL, NULL, NULL),
(8, 'Hendra Wijaya', 'SMAN 1 Boyolali', 95.00, 150000.00, 'Prestasi', 'Teknik Informatika', 'Kampus Utama', 'Olimpiade Matematika', 'Nasional', NULL, NULL),
(9, 'Indah Permata', 'SMAN 3 Malang', 91.50, 150000.00, 'Prestasi', 'Sistem Informasi', 'Kampus Utama', 'Lomba Karya Ilmiah', 'Provinsi', NULL, NULL),
(10, 'Joko Tarub', 'SMAN 1 Solo', 89.00, 150000.00, 'Prestasi', 'Teknik Elektro', 'Kampus B', 'Bulutangkis Tunggal', 'Nasional', NULL, NULL),
(11, 'Kurniawati', 'SMAN 2 Denpasar', 93.20, 150000.00, 'Prestasi', 'Ilmu Komputer', 'Kampus Utama', 'Debat Bahasa Inggris', 'Internasional', NULL, NULL),
(12, 'Laksana Tri', 'SMKN 2 Pengasih', 87.80, 150000.00, 'Prestasi', 'Teknik Informatika', 'Kampus B', 'LKS Web Technologies', 'Nasional', NULL, NULL),
(13, 'Mega Utami', 'SMAN 1 Makassar', 94.10, 150000.00, 'Prestasi', 'Sistem Informasi', 'Kampus Utama', 'Pianis Klasik', 'Provinsi', NULL, NULL),
(14, 'Nugroho Adi', 'SMAN 1 Purworejo', 84.50, 300000.00, 'Kedinasan', 'Teknik Informatika', 'Kampus Utama', NULL, NULL, 'SK-990/KD/2026', 'Kementerian Kominfo'),
(15, 'Oki Setiana', 'SMAN 4 Madiun', 86.00, 300000.00, 'Kedinasan', 'Sistem Informasi', 'Kampus Utama', NULL, NULL, 'SK-112/DIS/2026', 'Dinas Pendidikan Daerah'),
(16, 'Putra Perdana', 'SMAN 1 Cilacap', 83.25, 300000.00, 'Kedinasan', 'Teknik Elektro', 'Kampus B', NULL, NULL, 'SK-404/BUMN/2026', 'PT. Telkom Indonesia'),
(17, 'Qori Sandi', 'SMAN 7 Banjarmasin', 87.10, 300000.00, 'Kedinasan', 'Ilmu Komputer', 'Kampus Utama', NULL, NULL, 'SK-771/KD/2026', 'Kementerian Kominfo'),
(18, 'Rini Astuti', 'SMAN 1 Palembang', 85.90, 300000.00, 'Kedinasan', 'Teknik Informatika', 'Kampus Utama', NULL, NULL, 'SK-555/PEMDA/2026', 'Pemprov Sumsel'),
(19, 'Sultan Malik', 'SMAN 3 Banda Aceh', 88.00, 300000.00, 'Kedinasan', 'Sistem Informasi', 'Kampus B', NULL, NULL, 'SK-812/KD/2026', 'Kementerian Perhubungan'),
(20, 'Taufik Hidayat', 'SMAN 1 Cirebon', 82.80, 300000.00, 'Kedinasan', 'Teknik Elektro', 'Kampus Utama', NULL, NULL, 'SK-234/BUMN/2026', 'PT. PLN (Persero)');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tabel_pendaftaran`
--
ALTER TABLE `tabel_pendaftaran`
  ADD PRIMARY KEY (`id_pendaftaran`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tabel_pendaftaran`
--
ALTER TABLE `tabel_pendaftaran`
  MODIFY `id_pendaftaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
