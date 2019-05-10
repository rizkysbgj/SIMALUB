-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 10, 2019 at 06:37 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `simalub`
--

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2019_01_30_042740_create_mstusers_table', 1),
(2, '2019_02_04_012652_mst_milestone_flow', 1),
(3, '2019_02_04_013305_mst_milestone_tugas', 1),
(4, '2019_02_04_013629_mst_role', 1),
(5, '2019_02_04_032724_mst_proyek', 1),
(6, '2019_02_07_121748_mst_tugas', 1),
(7, '2019_02_10_181109_mst_sub_kontrak', 1),
(8, '2019_02_10_183914_trx_tugas', 1),
(9, '2019_02_10_184515_mst_kategori_tugas', 1),
(10, '2019_02_11_152704_vw_user', 1),
(11, '2019_02_12_085356_vw_proyek', 1),
(12, '2019_02_12_112261_vw_tugas', 1),
(13, '2019_02_18_084659_trx_tugas_log', 1),
(14, '2019_02_25_152151_trx_lapor', 1),
(15, '2019_02_25_152257_vw_trx_lapor', 1),
(16, '2019_02_26_084412_trx_kaji_ulang', 1),
(17, '2019_03_03_152025_vw_trx_tugas', 1),
(18, '2019_03_11_085154_vw_sub_kontrak', 1),
(19, '2019_03_11_085807_vw_dashboard_manajer_teknis', 1),
(20, '2019_03_12_145244_mst_sertifikat', 1),
(21, '2019_03_18_091636_vw_statistik_proyek', 1),
(22, '2019_02_12_085357_vw_proyek', 2),
(23, '2019_02_07_121749_mst_tugas', 3),
(24, '2019_02_12_085358_vw_proyek', 3),
(25, '2019_02_25_152258_vw_trx_lapor', 4),
(26, '2019_02_10_18111_mst_sub_kontrak', 5),
(27, '2019_03_11_085155_vw_sub_kontrak', 5),
(28, '2019_02_12_112262_vw_tugas', 6),
(29, '2019_03_11_085808_vw_dashboard_manajer_teknis', 7),
(30, '2019_03_22_120108_vw_dashboard_performa', 8),
(31, '2019_03_22_120109_vw_dashboard_performa', 9),
(32, '2019_03_22_120109_vw_dashboard_performa_bulanan', 10),
(33, '2019_03_22_142009_vw_dashboard_performa_tahunan', 10),
(34, '2019_02_04_032725_mst_proyek', 11),
(35, '2019_03_03_152026_vw_trx_tugas', 11),
(36, '2019_03_22_120111_vw_dashboard_performa_bulanan', 12),
(37, '2019_03_22_142010_vw_dashboard_performa_tahunan', 12),
(38, '2019_02_12_112263_vw_tugas', 13),
(39, '2019_03_22_120112_vw_dashboard_performa_bulanan', 14),
(40, '2019_03_22_142011_vw_dashboard_performa_tahunan', 14),
(41, '2019_03_22_120113_vw_dashboard_performa_bulanan', 15),
(42, '2019_03_26_082755_mst_ulasan', 15),
(43, '2019_03_26_131321_vw_ulasan', 15),
(44, '2019_03_22_120114_vw_dashboard_performa_bulanan', 16),
(45, '2019_02_12_085359_vw_proyek', 17),
(46, '2019_03_03_152027_vw_trx_tugas', 17),
(47, '2019_04_01_111105_mst_notifikasi', 18),
(48, '2019_04_15_092404_vw_notifikasi', 19),
(49, '2019_04_15_092405_vw_notifikasi', 20),
(50, '2019_04_15_092406_vw_notifikasi', 21),
(51, '2019_04_15_092407_vw_notifikasi', 22),
(52, '2019_04_15_092408_vw_notifikasi', 23);

-- --------------------------------------------------------

--
-- Table structure for table `mstkategoritugas`
--

CREATE TABLE `mstkategoritugas` (
  `IDKategori` int(10) UNSIGNED NOT NULL,
  `Kategori` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mstmilestoneflowtugas`
--

CREATE TABLE `mstmilestoneflowtugas` (
  `IDMilestoneFlowTugas` int(10) UNSIGNED NOT NULL,
  `IDMilestoneTugas` int(11) NOT NULL,
  `Kode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Aksi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `IDMilestoneLanjut` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mstmilestoneflowtugas`
--

INSERT INTO `mstmilestoneflowtugas` (`IDMilestoneFlowTugas`, `IDMilestoneTugas`, `Kode`, `Aksi`, `IDMilestoneLanjut`) VALUES
(1, 1, 'MULAI', 'MULAI KAJI ULANG', 2),
(2, 2, 'SELESAI', 'SELESAI KAJI ULANG', 3),
(3, 3, 'PILIH', 'PILIH ANALIS', 4),
(4, 4, 'MULAI', 'MULAI ANALISIS', 5),
(5, 5, 'SELESAI', 'SELESAI ANALISIS', 6),
(6, 6, 'PILIH', 'PILIH PENYELIA', 7),
(7, 7, 'MULAI', 'MULAI PENGOREKSIAN', 8),
(8, 8, 'SALAH', 'KEMBALIKAN KE ANALIS', 4),
(9, 8, 'SELESAI', 'SELESAI DIKOREKSI', 9),
(10, 9, 'MULAI', 'MULAI PEMBUATAN SERTIFIKAT', 10),
(11, 10, 'SELESAI', 'SERTIFIKAT SELESAI', 11);

-- --------------------------------------------------------

--
-- Table structure for table `mstmilestonetugas`
--

CREATE TABLE `mstmilestonetugas` (
  `IDMilestoneTugas` int(10) UNSIGNED NOT NULL,
  `MilestoneTugas` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `IDRole` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mstmilestonetugas`
--

INSERT INTO `mstmilestonetugas` (`IDMilestoneTugas`, `MilestoneTugas`, `IDRole`) VALUES
(1, 'Siap Kaji Ulang', 1),
(2, 'Sedang Dikaji Ulang', 1),
(3, 'Kaji Ulang Selesai', 1),
(4, 'Siap Dianalisis', 1),
(5, 'Sedang Dianalisis', 1),
(6, 'Analisis Selesai', 1),
(7, 'Siap Dikoreksi', 1),
(8, 'Sedang Dikoreksi', 1),
(9, 'Pengoreksian Selesai', 1),
(10, 'Pembuatan Sertifikat', 1),
(11, 'Sertifikat Selesai', 1);

-- --------------------------------------------------------

--
-- Table structure for table `mstnotifikasi`
--

CREATE TABLE `mstnotifikasi` (
  `IDNotifikasi` int(10) UNSIGNED NOT NULL,
  `IDUser` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Pesan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Aksi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Dibaca` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mstnotifikasi`
--

INSERT INTO `mstnotifikasi` (`IDNotifikasi`, `IDUser`, `Pesan`, `Aksi`, `Dibaca`, `created_at`, `updated_at`) VALUES
(1, 'nunuk_biofarmaka', 'Anda menerima tugas baru', '/halamanTugasSaya', 1, '2019-05-10 13:28:58', '2019-05-10 14:02:42'),
(2, 'nunuk_biofarmaka', 'Anda menerima tugas baru', '/halamanTugasSaya', 1, '2019-05-10 13:41:17', '2019-05-10 13:55:22'),
(3, 'ManajerTeknis', 'Anda menerima laporan baru pada proyek Chimory', '/halamanLaporan', 1, '2019-05-10 13:57:49', '2019-05-10 14:00:34'),
(4, 'rioalrasyid', 'Anda menerima tugas baru', '/halamanTugasSaya', 1, '2019-05-10 14:04:00', '2019-05-10 14:08:10'),
(5, 'rioalrasyid', 'Anda menerima tugas baru', '/halamanTugasSaya', 0, '2019-05-10 14:45:13', '2019-05-10 14:45:13'),
(6, 'rioalrasyid', 'Anda menerima tugas baru', '/halamanTugasSaya', 1, '2019-05-10 14:45:15', '2019-05-10 14:55:43'),
(7, 'rioalrasyid', 'Anda menerima tugas baru', '/halamanTugasSaya', 1, '2019-05-10 14:45:16', '2019-05-10 14:55:10'),
(8, 'nunuk_biofarmaka', 'Anda menerima tugas baru', '/halamanTugasSaya', 1, '2019-05-10 15:14:10', '2019-05-10 15:15:53'),
(9, 'rioalrasyid', 'Anda menerima tugas baru', '/halamanTugasSaya', 1, '2019-05-10 15:17:51', '2019-05-10 15:19:50'),
(10, 'nunuk_biofarmaka', 'Anda menerima tugas baru', '/halamanTugasSaya', 1, '2019-05-10 15:43:47', '2019-05-10 15:49:36'),
(11, 'nunuk_biofarmaka', 'Anda menerima tugas baru', '/halamanTugasSaya', 1, '2019-05-10 15:46:12', '2019-05-10 15:53:34'),
(12, 'ManajerTeknis', 'Anda menerima laporan baru pada proyek Pertamina', '/halamanLaporan', 1, '2019-05-10 15:50:47', '2019-05-10 15:58:18'),
(13, 'rioalrasyid', 'Anda menerima tugas baru', '/halamanTugasSaya', 0, '2019-05-10 15:51:51', '2019-05-10 15:51:51'),
(14, 'rioalrasyid', 'Anda menerima tugas baru', '/halamanTugasSaya', 1, '2019-05-10 15:53:17', '2019-05-10 15:54:25');

-- --------------------------------------------------------

--
-- Table structure for table `mstproyek`
--

CREATE TABLE `mstproyek` (
  `IDProyek` int(10) UNSIGNED NOT NULL,
  `NamaProyek` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `InisialProyek` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `PenanggungJawab` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Status` enum('Aktif','Batal') COLLATE utf8mb4_unicode_ci NOT NULL,
  `PinKeMenu` int(11) NOT NULL,
  `TanggalMulai` datetime NOT NULL,
  `RencanaSelesai` datetime NOT NULL,
  `RealitaSelesai` datetime DEFAULT NULL,
  `DeskripsiProyek` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `SponsorProyek` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Percepatan` int(11) NOT NULL DEFAULT '0',
  `SiapBuatSertifikat` int(11) DEFAULT NULL,
  `CreatedBy` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `UpdatedBy` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mstproyek`
--

INSERT INTO `mstproyek` (`IDProyek`, `NamaProyek`, `InisialProyek`, `PenanggungJawab`, `Status`, `PinKeMenu`, `TanggalMulai`, `RencanaSelesai`, `RealitaSelesai`, `DeskripsiProyek`, `SponsorProyek`, `Percepatan`, `SiapBuatSertifikat`, `CreatedBy`, `UpdatedBy`, `created_at`, `updated_at`) VALUES
(1, 'Chimory', 'CHI', 'rudi_heryanto', 'Aktif', 1, '2019-05-10 00:00:00', '2019-05-24 00:00:00', '2019-05-10 00:00:00', 'Analisis produk perusahaan chimory', 'PT Chimory', 1, 3, 'rudi_heryanto', NULL, '2019-05-10 13:21:43', '2019-05-10 15:24:29'),
(2, 'Pertamina', 'PTM', 'rudi_heryanto', 'Aktif', 1, '2019-05-10 00:00:00', '2019-05-24 00:00:00', '2019-05-10 00:00:00', 'Analisis minyak', 'PT Pertamina', 0, 3, 'rudi_heryanto', NULL, '2019-05-10 15:35:37', '2019-05-10 16:01:19');

-- --------------------------------------------------------

--
-- Table structure for table `mstrole`
--

CREATE TABLE `mstrole` (
  `IDRole` int(10) UNSIGNED NOT NULL,
  `Role` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mstrole`
--

INSERT INTO `mstrole` (`IDRole`, `Role`) VALUES
(1, 'Admin Sistem'),
(6, 'Administrasi'),
(4, 'Analis'),
(2, 'Manajer Puncak'),
(3, 'Manajer Teknis'),
(5, 'Penyelia');

-- --------------------------------------------------------

--
-- Table structure for table `mstsertifikat`
--

CREATE TABLE `mstsertifikat` (
  `IDSertifikat` int(10) UNSIGNED NOT NULL,
  `IDProyek` int(11) NOT NULL,
  `Attachment` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ContentType` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `NamaFile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Catatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mstsertifikat`
--

INSERT INTO `mstsertifikat` (`IDSertifikat`, `IDProyek`, `Attachment`, `ContentType`, `NamaFile`, `Catatan`) VALUES
(1, 1, 'public/sertifikat/ISENG.jpg.ISENG.jpg', 'image/jpeg', 'ISENG.jpg', 'Selesai buat sertifikat'),
(2, 2, 'public/sertifikat/citra.jpg.citra.jpg', 'image/jpeg', 'citra.jpg', 'selesai proyek');

-- --------------------------------------------------------

--
-- Table structure for table `mstsubkontrak`
--

CREATE TABLE `mstsubkontrak` (
  `IDSubKontrak` int(10) UNSIGNED NOT NULL,
  `IDTugas` int(11) NOT NULL,
  `WaktuDikirim` date DEFAULT NULL,
  `WaktuDiterima` date DEFAULT NULL,
  `StatusSubKontrak` int(11) NOT NULL DEFAULT '0',
  `Attachment` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ContentType` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `NamaFile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Catatan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `IDPenanggungJawab` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `CreatedBy` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `UpdatedBy` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mstsubkontrak`
--

INSERT INTO `mstsubkontrak` (`IDSubKontrak`, `IDTugas`, `WaktuDikirim`, `WaktuDiterima`, `StatusSubKontrak`, `Attachment`, `ContentType`, `NamaFile`, `Catatan`, `IDPenanggungJawab`, `CreatedBy`, `UpdatedBy`, `created_at`, `updated_at`) VALUES
(1, 4, '2019-05-10', '2019-05-10', 1, 'public/files/3kEDkvwzdjZUHtAbEE83wbBgUgcPpVo2c7J4HqdF.jpeg', 'image/jpeg', 'WhatsApp Image 2017-11-30 at 21.13.54.jpeg', 'sudah ya ditindaklanjuti tugas subkontraknya', 'rudi_heryanto', 'rudi_heryanto', 'rudi_heryanto', '2019-05-10 14:22:18', '2019-05-10 14:23:12'),
(2, 8, '2019-05-10', '2019-05-10', 1, 'public/files/wlHH7XJkJQXWKZYvmSBkcjCbnvmEXIO3fx0pqlhc.jpeg', 'image/jpeg', 'WhatsApp Image 2017-11-30 at 21.13.54.jpeg', 'sudah ditindaklanjuti ya subkontranknya', 'rudi_heryanto', 'rudi_heryanto', 'rudi_heryanto', '2019-05-10 15:47:04', '2019-05-10 15:48:38');

-- --------------------------------------------------------

--
-- Table structure for table `msttugas`
--

CREATE TABLE `msttugas` (
  `IDTugas` int(10) UNSIGNED NOT NULL,
  `InisialTugas` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `NamaTugas` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `DeskripsiTugas` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `IDProyek` int(11) NOT NULL,
  `IDPenanggungJawab` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `IDMilestoneTugas` int(11) NOT NULL,
  `RencanaMulai` date NOT NULL,
  `RencanaSelesai` date NOT NULL,
  `RealitaMulai` date DEFAULT NULL,
  `RealitaSelesai` date DEFAULT NULL,
  `StatusKajiUlang` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `CreatedBy` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `UpdatedBy` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `msttugas`
--

INSERT INTO `msttugas` (`IDTugas`, `InisialTugas`, `NamaTugas`, `DeskripsiTugas`, `IDProyek`, `IDPenanggungJawab`, `IDMilestoneTugas`, `RencanaMulai`, `RencanaSelesai`, `RealitaMulai`, `RealitaSelesai`, `StatusKajiUlang`, `CreatedBy`, `UpdatedBy`, `created_at`, `updated_at`) VALUES
(1, '190520190001', 'Analisis Coklat Conflakes', 'Analisis cokelat dengan kadar gula 50%', 1, 'wiwik_biofarmaka', 11, '2019-05-10', '2019-05-24', '2019-05-10', '2019-05-10', 'Bisa', 'rudi_heryanto', 'rioalrasyid', '2019-05-10 13:25:18', '2019-05-10 15:24:29'),
(2, '130920190002', 'Analisis Susu Chimory', 'Pakai gula 90%', 1, 'wiwik_biofarmaka', 11, '2019-05-10', '2019-05-24', '2019-05-10', '2019-05-10', 'Bisa', 'rudi_heryanto', 'rioalrasyid', '2019-05-10 13:26:33', '2019-05-10 15:24:29'),
(4, '170520190003', 'Analisis Sapi Chimory', 'Gunakan daging iga ya', 1, 'rudi_heryanto', 11, '2019-05-10', '2019-05-24', '2019-05-10', '2019-05-10', 'Tidak', 'rudi_heryanto', 'rudi_heryanto', '2019-05-10 14:20:34', '2019-05-10 15:24:29'),
(5, '150520190004', 'Analisis Tempe', 'tempenya 76%', 1, 'wiwik_biofarmaka', 11, '2019-05-10', '2019-05-24', '2019-05-10', '2019-05-10', 'Bisa', 'rudi_heryanto', 'rioalrasyid', '2019-05-10 15:03:05', '2019-05-10 15:24:29'),
(6, '190520190001', 'Minyak Asam', 'Ethanolnya 76%', 2, 'wiwik_biofarmaka', 11, '2019-05-10', '2019-05-24', '2019-05-10', '2019-05-10', 'Bisa', 'rudi_heryanto', 'rioalrasyid', '2019-05-10 15:39:38', '2019-05-10 16:01:19'),
(7, '150520190002', 'Minyak Basa', 'Soklin 90%', 2, 'wiwik_biofarmaka', 11, '2019-05-10', '2019-05-24', '2019-05-10', '2019-05-10', 'Bisa', 'rudi_heryanto', 'rioalrasyid', '2019-05-10 15:40:22', '2019-05-10 16:01:19'),
(8, '170920190003', 'Minyak Ceria', 'Samplenya 15% saja', 2, 'rudi_heryanto', 11, '2019-05-10', '2019-05-24', '2019-05-10', '2019-05-10', 'Tidak', 'rudi_heryanto', 'rudi_heryanto', '2019-05-10 15:41:14', '2019-05-10 16:01:19');

-- --------------------------------------------------------

--
-- Table structure for table `mstulasan`
--

CREATE TABLE `mstulasan` (
  `IDUlasan` int(10) UNSIGNED NOT NULL,
  `IDProyek` int(11) NOT NULL,
  `Pertanyaan1` int(11) DEFAULT NULL,
  `Pertanyaan2` int(11) DEFAULT NULL,
  `Pertanyaan3` int(11) DEFAULT NULL,
  `Pertanyaan4` int(11) DEFAULT NULL,
  `Pertanyaan5` int(11) DEFAULT NULL,
  `Pertanyaan6` int(11) DEFAULT NULL,
  `Pertanyaan7` int(11) DEFAULT NULL,
  `Pertanyaan8` int(11) DEFAULT NULL,
  `Pertanyaan9` int(11) DEFAULT NULL,
  `KritikSaran` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mstuser`
--

CREATE TABLE `mstuser` (
  `id` int(10) UNSIGNED NOT NULL,
  `IDUser` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `NIK` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `NamaLengkap` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `IDRole` int(11) NOT NULL,
  `Email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Status` enum('Aktif','Tidak Aktif') COLLATE utf8mb4_unicode_ci NOT NULL,
  `CreatedBy` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `UpdatedBy` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'default.png',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `api_token` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mstuser`
--

INSERT INTO `mstuser` (`id`, `IDUser`, `NIK`, `NamaLengkap`, `IDRole`, `Email`, `Password`, `Status`, `CreatedBy`, `UpdatedBy`, `Avatar`, `created_at`, `updated_at`, `api_token`) VALUES
(1, 'admin', 'G64150033', 'Admin Sistem', 1, 'admin@ipb.ac.id', '$2y$10$RhnaypsodKH.fX5ZUyQNiuNBmtue7he92R5ueFs9ZfOwIV2ioqa2i', 'Aktif', 'admin', 'admin', 'admin.jpg', '2019-03-02 17:00:00', '2019-05-10 12:01:45', 'YWRtaW46YWRtaW4='),
(2, 'wisnu_ananta', 'WAK', 'Wisnu Ananta Kusuma', 2, 'wisnu@ipb.ac.id', '$2y$10$/0aLnEg71pL38huj8J46puWvfyhZoYpcdbQvcCttu2i9ytohgLX2u', 'Aktif', 'admin', 'admin', 'default.png', '2019-03-03 09:12:22', '2019-03-03 09:15:53', ''),
(3, 'rudi_heryanto', 'RHE', 'Rudi Heryanto', 3, 'rudi@ipb.ac.id', '$2y$10$cKMHhgDkzYZ/UA8T8pS.nuseIp/sXAYhiWLml6OK1DSJ5bE.6ou1G', 'Aktif', 'admin', NULL, 'default.png', '2019-03-03 09:25:26', '2019-03-03 09:25:26', ''),
(4, 'nunuk_biofarmaka', 'NBI', 'Nunuk', 4, 'nunuk@ipb.ac.id', '$2y$10$Q5N/JEsmqR1ItQm1YJRnBOKGV8Keiu4hGrTcvoxCBRMY9dj5tarHS', 'Aktif', 'admin', NULL, 'default.png', '2019-03-03 11:10:41', '2019-03-03 11:10:41', ''),
(5, 'rizky_ipb', 'RIZ', 'Rizky Subagja', 5, 'rizky@ipb.ac.id', '$2y$10$hBx7aQEK/YjEJLjrM.OWJ.YFCulmc/UtofQOirEu7z30ZQPDs0DFS', 'Aktif', 'admin', 'admin', 'default.png', '2019-03-03 11:19:13', '2019-03-28 04:23:39', ''),
(6, 'wiwik_biofarmaka', 'WBI', 'Wiwik', 6, 'wiwik@ipb.ac.id', '$2y$10$oaPcbZjmYENUYH86DxzFWOjsoeyWbakORa/uJncJ7evnvfXtkpqHe', 'Aktif', 'admin', NULL, 'default.png', '2019-03-05 03:11:59', '2019-03-05 03:11:59', ''),
(7, 'rioalrasyid', 'G64150023', 'Rio Al Rasyid', 4, 'rio@gmail.com', '$2y$10$gHOt6CrWXa.q72Njx./61OC8ULGlCisszlEv2WmT4TMD6x6NrZuRG', 'Aktif', 'admin', 'admin', 'rioalrasyid.jpg', '2019-03-26 01:34:03', '2019-05-10 14:07:10', '');

-- --------------------------------------------------------

--
-- Table structure for table `trxkajiulang`
--

CREATE TABLE `trxkajiulang` (
  `IDTrxKajiUlang` int(10) UNSIGNED NOT NULL,
  `IDTugas` int(11) NOT NULL,
  `Metode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Peralatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Personil` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `BahanKimia` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `KondisiAkomodasi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Kesimpulan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `trxkajiulang`
--

INSERT INTO `trxkajiulang` (`IDTrxKajiUlang`, `IDTugas`, `Metode`, `Peralatan`, `Personil`, `BahanKimia`, `KondisiAkomodasi`, `Kesimpulan`, `created_at`, `updated_at`) VALUES
(1, 1, 'Bisa', 'Bisa', 'Bisa', 'Bisa', 'Bisa', 'Bisa', '2019-05-10 13:27:18', '2019-05-10 13:27:18'),
(2, 2, 'Bisa', 'Bisa', 'Bisa', 'Bisa', 'Bisa', 'Bisa', '2019-05-10 13:35:26', '2019-05-10 13:35:26'),
(4, 4, 'Tidak', 'Tidak', 'Tidak', 'Tidak', 'Tidak', 'Tidak', '2019-05-10 14:22:18', '2019-05-10 14:22:18'),
(5, 5, 'Bisa', 'Bisa', 'Bisa', 'Bisa', 'Bisa', 'Bisa', '2019-05-10 15:10:04', '2019-05-10 15:10:04'),
(6, 6, 'Bisa', 'Bisa', 'Bisa', 'Bisa', 'Bisa', 'Bisa', '2019-05-10 15:42:46', '2019-05-10 15:42:46'),
(7, 7, 'Bisa', 'Bisa', 'Bisa', 'Bisa', 'Bisa', 'Bisa', '2019-05-10 15:45:04', '2019-05-10 15:45:04'),
(8, 8, 'Tidak', 'Tidak', 'Bisa', 'Bisa', 'Bisa', 'Tidak', '2019-05-10 15:47:04', '2019-05-10 15:47:04');

-- --------------------------------------------------------

--
-- Table structure for table `trxlapor`
--

CREATE TABLE `trxlapor` (
  `IDTrxLapor` int(10) UNSIGNED NOT NULL,
  `IDTugas` int(11) NOT NULL,
  `IDProyek` int(11) NOT NULL,
  `IDPelapor` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Attachment` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ContentType` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `NamaFile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Catatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `StatusTindakan` int(11) NOT NULL DEFAULT '0',
  `AttachmentTindakan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ContentTypeTindakan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `NamaFileTindakan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `CatatanTindakan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `trxlapor`
--

INSERT INTO `trxlapor` (`IDTrxLapor`, `IDTugas`, `IDProyek`, `IDPelapor`, `Attachment`, `ContentType`, `NamaFile`, `Catatan`, `StatusTindakan`, `AttachmentTindakan`, `ContentTypeTindakan`, `NamaFileTindakan`, `CatatanTindakan`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'nunuk_biofarmaka', 'public/files/H0BoAWE3KTlbqcQImnwwh9qBc5d3K3bYddXDVjdO.jpeg', 'image/jpeg', 'top.jpg', 'ada kekurangan bahan gula pak', 1, 'public/files/nbUtXjnFwwleCJVsIsy9hPtgKNB21Gmcai8fE8zg.jpeg', 'image/jpeg', 'top.jpg', 'sudah ya ditindak lanjuti', '2019-05-10 13:57:49', '2019-05-10 14:01:18'),
(2, 6, 2, 'nunuk_biofarmaka', 'public/files/4fNjnSa2ZJrUK7kVAEYkwv2CAoXQAWYyYF9q8rFw.png', 'image/png', 'Drone-PNG-Transparent-Image.png', 'mesin rusak pak', 1, 'public/files/RzHymqbEEqn1jwfUr1QwZ2cnXOclVB7SQf5t28ua.png', 'image/png', 'Drone-PNG-Transparent-Image.png', 'sudah ya', '2019-05-10 15:50:47', '2019-05-10 15:58:53');

-- --------------------------------------------------------

--
-- Table structure for table `trxtugas`
--

CREATE TABLE `trxtugas` (
  `IDTrxTugas` int(10) UNSIGNED NOT NULL,
  `IDTugas` int(11) NOT NULL,
  `IDMilestoneTugas` int(11) NOT NULL,
  `IDPenanggungJawab` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `StatusTugas` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `WaktuMulai` datetime DEFAULT NULL,
  `WaktuSelesai` datetime DEFAULT NULL,
  `Catatan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Attachment` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ContentType` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `FileName` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `CreatedBy` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `UpdatedBy` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `trxtugas`
--

INSERT INTO `trxtugas` (`IDTrxTugas`, `IDTugas`, `IDMilestoneTugas`, `IDPenanggungJawab`, `StatusTugas`, `WaktuMulai`, `WaktuSelesai`, `Catatan`, `Attachment`, `ContentType`, `FileName`, `CreatedBy`, `UpdatedBy`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 'rudi_heryanto', NULL, '2019-05-10 00:00:00', '2019-05-10 00:00:00', 'Selesai kaji ulang', 'public/files/MwX80lBkmR6TYEzHgXQvIW6YUYfvQ4v7oQJ6ZCES.jpeg', 'image/jpeg', '1.jpg', 'rudi_heryanto', 'rudi_heryanto', '2019-05-10 13:27:47', '2019-05-10 13:28:28'),
(2, 1, 5, 'nunuk_biofarmaka', NULL, '2019-05-10 00:00:00', '2019-05-10 00:00:00', 'selesai analisis', 'public/files/aijuvqoFgFOh2ybgDjfG1BKiJNc5yFVNhtyaY3tw.jpeg', 'image/jpeg', '2.jpg', 'rudi_heryanto', 'rudi_heryanto', '2019-05-10 13:28:58', '2019-05-10 14:03:13'),
(3, 2, 2, 'rudi_heryanto', NULL, '2019-05-10 00:00:00', '2019-05-10 00:00:00', 'selesai kaji ulang', 'public/files/fXVv7YgSuwylab7MHGv3tFoh0pA26A6DShlu56LY.jpeg', 'image/jpeg', '1.jpg', 'rudi_heryanto', 'rudi_heryanto', '2019-05-10 13:29:27', '2019-05-10 13:40:51'),
(4, 3, 2, 'rudi_heryanto', NULL, '2019-05-10 00:00:00', NULL, NULL, NULL, NULL, NULL, 'rudi_heryanto', 'rudi_heryanto', '2019-05-10 13:37:52', '2019-05-10 13:37:52'),
(5, 2, 5, 'nunuk_biofarmaka', NULL, '2019-05-10 00:00:00', '2019-05-10 00:00:00', 'selesai analisis', 'public/files/wXsZMkgZOUyfjsG1tPHkgYWpB7csL8UCWoY0OPgf.jpeg', 'image/jpeg', '2.jpg', 'rudi_heryanto', 'rudi_heryanto', '2019-05-10 13:41:17', '2019-05-10 14:40:01'),
(6, 1, 8, 'rioalrasyid', 'SELESAI', '2019-05-10 00:00:00', '2019-05-10 00:00:00', 'selesai dikoreksi', 'public/files/3kEDkvwzdjZUHtAbEE83wbBgUgcPpVo2c7J4HqdF.jpeg', 'image/jpeg', '3.jpg', 'nunuk_biofarmaka', 'nunuk_biofarmaka', '2019-05-10 14:04:00', '2019-05-10 14:09:28'),
(7, 2, 8, 'rioalrasyid', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'nunuk_biofarmaka', 'nunuk_biofarmaka', '2019-05-10 14:45:13', '2019-05-10 14:45:13'),
(8, 2, 8, 'rioalrasyid', 'Ulangan ke-1', NULL, NULL, NULL, NULL, NULL, NULL, 'nunuk_biofarmaka', 'nunuk_biofarmaka', '2019-05-10 14:45:15', '2019-05-10 14:45:15'),
(9, 2, 8, 'rioalrasyid', 'SELESAI', '2019-05-10 00:00:00', '2019-05-10 00:00:00', 'selesai analisis', 'public/files/h7x23oK5OcAgLzu3ViZd3yW0frDYA1qKGlqGPvvq.jpeg', 'image/jpeg', '3.jpg', 'nunuk_biofarmaka', 'nunuk_biofarmaka', '2019-05-10 14:45:16', '2019-05-10 14:58:15'),
(10, 4, 2, 'rudi_heryanto', NULL, '2019-05-10 00:00:00', NULL, NULL, NULL, NULL, NULL, 'rudi_heryanto', 'rudi_heryanto', '2019-05-10 15:04:16', '2019-05-10 15:04:16'),
(11, 5, 2, 'rudi_heryanto', NULL, '2019-05-10 00:00:00', '2019-05-10 00:00:00', 'selesai kaji ulang', 'public/files/uhhdpOeATsmbuYc9HSBQivqAonk0IfXrZQXtJTP6.jpeg', 'image/jpeg', '1.jpg', 'rudi_heryanto', 'rudi_heryanto', '2019-05-10 15:12:38', '2019-05-10 15:13:31'),
(12, 5, 5, 'nunuk_biofarmaka', NULL, '2019-05-10 00:00:00', '2019-05-10 00:00:00', 'selesai analisis', 'public/files/OqCqcUc8a7HEmFJVLroYMUNV7lmCWU5Jyk5YeMjb.jpeg', 'image/jpeg', '2.jpg', 'rudi_heryanto', 'rudi_heryanto', '2019-05-10 15:14:10', '2019-05-10 15:16:56'),
(13, 5, 8, 'rioalrasyid', 'SELESAI', '2019-05-10 00:00:00', '2019-05-10 00:00:00', 'selesai koreksi', 'public/files/OancTDQemLT7w6HY9SdQmuRA1y3yl270Jwj0HHDX.jpeg', 'image/jpeg', '3.jpg', 'nunuk_biofarmaka', 'nunuk_biofarmaka', '2019-05-10 15:17:51', '2019-05-10 15:22:04'),
(14, 6, 2, 'rudi_heryanto', NULL, '2019-05-10 00:00:00', '2019-05-10 00:00:00', 'Selesai kaji ulang', 'public/files/E6i8cFybBbiVlWu9y2OHbMirvhu1q8y9RZgAg22M.jpeg', 'image/jpeg', '1.jpg', 'rudi_heryanto', 'rudi_heryanto', '2019-05-10 15:42:19', '2019-05-10 15:43:18'),
(15, 6, 5, 'nunuk_biofarmaka', NULL, '2019-05-10 00:00:00', '2019-05-10 00:00:00', 'selesai analisis', 'public/files/cizLslDaIWgoAgItxTBxMMU0DaRQFo7cRw79aMlY.jpeg', 'image/jpeg', '2.jpg', 'rudi_heryanto', 'rudi_heryanto', '2019-05-10 15:43:47', '2019-05-10 15:51:19'),
(16, 7, 2, 'rudi_heryanto', NULL, '2019-05-10 00:00:00', '2019-05-10 00:00:00', 'selesai kaji ulang', 'public/files/G5Snx5O6yqHn0CvlpTszpHPFaoqQlgGz5bsjS8KI.jpeg', 'image/jpeg', '1.jpg', 'rudi_heryanto', 'rudi_heryanto', '2019-05-10 15:44:22', '2019-05-10 15:45:38'),
(17, 7, 5, 'nunuk_biofarmaka', NULL, '2019-05-10 00:00:00', '2019-05-10 00:00:00', 'selesai analisis', 'public/files/Q14gmPzyEMWd2s6hlkzRgeMklCXAztIKH5uZ20tm.jpeg', 'image/jpeg', '2.jpg', 'rudi_heryanto', 'rudi_heryanto', '2019-05-10 15:46:12', '2019-05-10 15:52:50'),
(18, 8, 2, 'rudi_heryanto', NULL, '2019-05-10 00:00:00', NULL, NULL, NULL, NULL, NULL, 'rudi_heryanto', 'rudi_heryanto', '2019-05-10 15:46:35', '2019-05-10 15:46:35'),
(19, 6, 8, 'rioalrasyid', 'SELESAI', '2019-05-10 00:00:00', '2019-05-10 00:00:00', 'selesai koreksi', 'public/files/cKA6tZUCphHr2OKLDudGfeJuT77mo46hqtz6W0bn.jpeg', 'image/jpeg', '3.jpg', 'nunuk_biofarmaka', 'nunuk_biofarmaka', '2019-05-10 15:51:51', '2019-05-10 15:55:25'),
(20, 7, 8, 'rioalrasyid', 'SELESAI', '2019-05-10 00:00:00', '2019-05-10 00:00:00', 'selesai koreksi', 'public/files/0A0B2WA0nKadqEFKiXBS2R0k4u1NyCaIYm8uvew6.jpeg', 'image/jpeg', '3.jpg', 'nunuk_biofarmaka', 'nunuk_biofarmaka', '2019-05-10 15:53:17', '2019-05-10 15:56:59');

-- --------------------------------------------------------

--
-- Table structure for table `trxtugaslog`
--

CREATE TABLE `trxtugaslog` (
  `IDTrxTugasLog` int(10) UNSIGNED NOT NULL,
  `IDTugas` int(11) NOT NULL,
  `Milestone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `IDUser` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Stand-in structure for view `vwdashboardmanajerteknis`
-- (See below for the actual view)
--
CREATE TABLE `vwdashboardmanajerteknis` (
`IDProyek` int(10) unsigned
,`NamaProyek` varchar(100)
,`InisialProyek` varchar(10)
,`PenanggungJawab` varchar(255)
,`TanggalMulai` datetime
,`RencanaSelesai` datetime
,`RealitaSelesai` datetime
,`TotalTugas` bigint(21)
,`TugasSelesai` bigint(21)
,`TotalSubKontrak` bigint(21)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vwdashboardperformabulanan`
-- (See below for the actual view)
--
CREATE TABLE `vwdashboardperformabulanan` (
`IDUser` varchar(255)
,`NamaLengkap` varchar(255)
,`Bulan` int(2)
,`Tahun` int(4)
,`TotalAnalisisBiasa` decimal(23,0)
,`TotalAnalisisPercepatan` decimal(23,0)
,`TotalAnalisis` decimal(23,0)
,`TotalSelia` decimal(23,0)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vwdashboardperformatahunan`
-- (See below for the actual view)
--
CREATE TABLE `vwdashboardperformatahunan` (
`IDUser` varchar(255)
,`NamaLengkap` varchar(255)
,`Tahun` int(4)
,`TotalAnalisisBiasa` decimal(23,0)
,`TotalAnalisisPercepatan` decimal(23,0)
,`TotalAnalisis` decimal(23,0)
,`TotalSelia` decimal(23,0)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vwnotifikasi`
-- (See below for the actual view)
--
CREATE TABLE `vwnotifikasi` (
`IDNotifikasi` int(10) unsigned
,`IDUser` varchar(255)
,`Pesan` varchar(255)
,`Aksi` varchar(255)
,`Dibaca` tinyint(1)
,`created_at` timestamp
,`WaktuKirim` varchar(32)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vwproyek`
-- (See below for the actual view)
--
CREATE TABLE `vwproyek` (
`IDProyek` int(10) unsigned
,`NamaProyek` varchar(100)
,`InisialProyek` varchar(10)
,`PenanggungJawab` varchar(255)
,`TanggalMulai` datetime
,`RencanaSelesai` datetime
,`RealitaSelesai` datetime
,`DeskripsiProyek` varchar(255)
,`TotalTugas` bigint(21)
,`SiapBuatSertifikat` int(11)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vwstatistikproyek`
-- (See below for the actual view)
--
CREATE TABLE `vwstatistikproyek` (
`Bulan` int(2)
,`Tahun` int(4)
,`TotalProyek` bigint(21)
,`TotalSelesai` bigint(21)
,`TotalBerlangsung` bigint(21)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vwsubkontrak`
-- (See below for the actual view)
--
CREATE TABLE `vwsubkontrak` (
`IDSubKontrak` int(10) unsigned
,`IDTugas` int(10) unsigned
,`IDProyek` int(11)
,`NamaTugas` varchar(255)
,`WaktuDikirim` date
,`WaktuDiterima` date
,`StatusSubKontrak` int(11)
,`Catatan` varchar(255)
,`Attachment` varchar(255)
,`NamaLengkap` varchar(255)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vwtrxlapor`
-- (See below for the actual view)
--
CREATE TABLE `vwtrxlapor` (
`IDTrxLapor` int(10) unsigned
,`IDProyek` int(11)
,`IDTugas` int(11)
,`InisialTugas` varchar(255)
,`NamaTugas` varchar(255)
,`NamaProyek` varchar(100)
,`NamaLengkap` varchar(255)
,`Attachment` varchar(255)
,`Catatan` varchar(255)
,`StatusTindakan` int(11)
,`AttachmentTindakan` varchar(255)
,`CatatanTindakan` varchar(255)
,`WaktuLapor` timestamp
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vwtrxtugas`
-- (See below for the actual view)
--
CREATE TABLE `vwtrxtugas` (
`IDTrxTugas` int(10) unsigned
,`IDTugas` int(11)
,`IDProyek` int(11)
,`NamaTugas` varchar(255)
,`InisialTugas` varchar(255)
,`DeskripsiTugas` varchar(255)
,`IDPenanggungJawab` varchar(255)
,`NamaLengkap` varchar(255)
,`IDMilestoneTugas` int(11)
,`MilestoneTugas` varchar(255)
,`StatusTugas` varchar(255)
,`Percepatan` int(11)
,`WaktuMulai` datetime
,`WaktuSelesai` datetime
,`Catatan` varchar(255)
,`Attachment` varchar(255)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vwtugas`
-- (See below for the actual view)
--
CREATE TABLE `vwtugas` (
`IDTugas` int(10) unsigned
,`InisialTugas` varchar(255)
,`IDProyek` int(11)
,`NamaProyek` varchar(100)
,`NamaTugas` varchar(255)
,`DeskripsiTugas` varchar(255)
,`RencanaMulai` date
,`RencanaSelesai` date
,`RealitaMulai` date
,`RealitaSelesai` date
,`IDPenanggungJawab` varchar(255)
,`StatusKajiUlang` varchar(255)
,`PenanggungJawab` varchar(255)
,`IDMilestoneTugas` int(11)
,`Milestone` varchar(255)
,`TotalKesalahanAnalisis` bigint(21)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vwulasan`
-- (See below for the actual view)
--
CREATE TABLE `vwulasan` (
`IDUlasan` int(10) unsigned
,`IDProyek` int(11)
,`NamaProyek` varchar(100)
,`SponsorProyek` varchar(255)
,`TanggalMulai` datetime
,`RealitaSelesai` datetime
,`Pertanyaan1` int(11)
,`Pertanyaan2` int(11)
,`Pertanyaan3` int(11)
,`Pertanyaan4` int(11)
,`Pertanyaan5` int(11)
,`Pertanyaan6` int(11)
,`Pertanyaan7` int(11)
,`Pertanyaan8` int(11)
,`Pertanyaan9` int(11)
,`KritikSaran` varchar(255)
,`created_at` timestamp
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vwuser`
-- (See below for the actual view)
--
CREATE TABLE `vwuser` (
`id` int(10) unsigned
,`IDUser` varchar(255)
,`NamaLengkap` varchar(255)
,`IDRole` int(11)
,`Role` varchar(25)
,`Status` enum('Aktif','Tidak Aktif')
,`TotalPekerjaan` bigint(21)
);

-- --------------------------------------------------------

--
-- Structure for view `vwdashboardmanajerteknis`
--
DROP TABLE IF EXISTS `vwdashboardmanajerteknis`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vwdashboardmanajerteknis`  AS  select `vp`.`IDProyek` AS `IDProyek`,`vp`.`NamaProyek` AS `NamaProyek`,`vp`.`InisialProyek` AS `InisialProyek`,`vp`.`PenanggungJawab` AS `PenanggungJawab`,`vp`.`TanggalMulai` AS `TanggalMulai`,`vp`.`RencanaSelesai` AS `RencanaSelesai`,`vp`.`RealitaSelesai` AS `RealitaSelesai`,`vp`.`TotalTugas` AS `TotalTugas`,(select count(`vt`.`IDTugas`) from `vwtugas` `vt` where ((`vt`.`IDProyek` = `vp`.`IDProyek`) and (`vt`.`RealitaSelesai` is not null))) AS `TugasSelesai`,(select count(`vsk`.`IDTugas`) from `vwsubkontrak` `vsk` where (`vsk`.`IDProyek` = `vp`.`IDProyek`)) AS `TotalSubKontrak` from `vwproyek` `vp` ;

-- --------------------------------------------------------

--
-- Structure for view `vwdashboardperformabulanan`
--
DROP TABLE IF EXISTS `vwdashboardperformabulanan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vwdashboardperformabulanan`  AS  select `mu`.`IDUser` AS `IDUser`,`mu`.`NamaLengkap` AS `NamaLengkap`,month(`vtt`.`WaktuMulai`) AS `Bulan`,year(`vtt`.`WaktuMulai`) AS `Tahun`,sum((case when ((`vtt`.`IDMilestoneTugas` = 5) and (`vtt`.`Percepatan` = 0)) then 1 else 0 end)) AS `TotalAnalisisBiasa`,sum((case when ((`vtt`.`IDMilestoneTugas` = 5) and (`vtt`.`Percepatan` = 1)) then 1 else 0 end)) AS `TotalAnalisisPercepatan`,sum((case `vtt`.`IDMilestoneTugas` when 5 then 1 else 0 end)) AS `TotalAnalisis`,sum((case `vtt`.`IDMilestoneTugas` when 8 then 1 else 0 end)) AS `TotalSelia` from (`mstuser` `mu` join `vwtrxtugas` `vtt` on(((`vtt`.`IDPenanggungJawab` = `mu`.`IDUser`) and (isnull(`vtt`.`StatusTugas`) or (`vtt`.`StatusTugas` = 'SELESAI')) and (`vtt`.`WaktuMulai` is not null)))) where ((`mu`.`IDRole` = 4) or (`mu`.`IDRole` = 5)) group by `mu`.`IDUser`,month(`vtt`.`WaktuMulai`),year(`vtt`.`WaktuMulai`),`mu`.`NamaLengkap` ;

-- --------------------------------------------------------

--
-- Structure for view `vwdashboardperformatahunan`
--
DROP TABLE IF EXISTS `vwdashboardperformatahunan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vwdashboardperformatahunan`  AS  select `mu`.`IDUser` AS `IDUser`,`mu`.`NamaLengkap` AS `NamaLengkap`,year(`vtt`.`WaktuMulai`) AS `Tahun`,sum((case when ((`vtt`.`IDMilestoneTugas` = 5) and (`vtt`.`Percepatan` = 0)) then 1 else 0 end)) AS `TotalAnalisisBiasa`,sum((case when ((`vtt`.`IDMilestoneTugas` = 5) and (`vtt`.`Percepatan` = 1)) then 1 else 0 end)) AS `TotalAnalisisPercepatan`,sum((case `vtt`.`IDMilestoneTugas` when 5 then 1 else 0 end)) AS `TotalAnalisis`,sum((case `vtt`.`IDMilestoneTugas` when 8 then 1 else 0 end)) AS `TotalSelia` from (`mstuser` `mu` join `vwtrxtugas` `vtt` on(((`vtt`.`IDPenanggungJawab` = `mu`.`IDUser`) and isnull(`vtt`.`StatusTugas`) and (`vtt`.`WaktuMulai` is not null)))) where ((`mu`.`IDRole` = 4) or (`mu`.`IDRole` = 5)) group by `mu`.`IDUser`,year(`vtt`.`WaktuMulai`),`mu`.`NamaLengkap` ;

-- --------------------------------------------------------

--
-- Structure for view `vwnotifikasi`
--
DROP TABLE IF EXISTS `vwnotifikasi`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vwnotifikasi`  AS  select `mn`.`IDNotifikasi` AS `IDNotifikasi`,`mn`.`IDUser` AS `IDUser`,`mn`.`Pesan` AS `Pesan`,`mn`.`Aksi` AS `Aksi`,`mn`.`Dibaca` AS `Dibaca`,`mn`.`created_at` AS `created_at`,(case when (timestampdiff(DAY,`mn`.`created_at`,now()) <> 0) then concat(timestampdiff(DAY,`mn`.`created_at`,now()),' hari lalu') when (timestampdiff(HOUR,`mn`.`created_at`,now()) <> 0) then concat(timestampdiff(HOUR,`mn`.`created_at`,now()),' jam lalu') else concat(timestampdiff(MINUTE,`mn`.`created_at`,now()),' menit lalu') end) AS `WaktuKirim` from `mstnotifikasi` `mn` ;

-- --------------------------------------------------------

--
-- Structure for view `vwproyek`
--
DROP TABLE IF EXISTS `vwproyek`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vwproyek`  AS  select `mp`.`IDProyek` AS `IDProyek`,`mp`.`NamaProyek` AS `NamaProyek`,`mp`.`InisialProyek` AS `InisialProyek`,`mu`.`NamaLengkap` AS `PenanggungJawab`,`mp`.`TanggalMulai` AS `TanggalMulai`,`mp`.`RencanaSelesai` AS `RencanaSelesai`,`mp`.`RealitaSelesai` AS `RealitaSelesai`,`mp`.`DeskripsiProyek` AS `DeskripsiProyek`,(select count(`mt`.`IDTugas`) from `msttugas` `mt` where ((`mt`.`IDProyek` = `mp`.`IDProyek`) and (`mt`.`StatusKajiUlang` <> 'Tidak'))) AS `TotalTugas`,`mp`.`SiapBuatSertifikat` AS `SiapBuatSertifikat` from (`mstproyek` `mp` left join `mstuser` `mu` on((`mp`.`PenanggungJawab` = `mu`.`IDUser`))) ;

-- --------------------------------------------------------

--
-- Structure for view `vwstatistikproyek`
--
DROP TABLE IF EXISTS `vwstatistikproyek`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vwstatistikproyek`  AS  select month(`vp`.`TanggalMulai`) AS `Bulan`,year(`vp`.`TanggalMulai`) AS `Tahun`,count(`vp`.`IDProyek`) AS `TotalProyek`,(select count(`vp`.`IDProyek`) from `vwproyek` `vp` where ((`vp`.`RealitaSelesai` is not null) and (month(`vp`.`TanggalMulai`) = `Bulan`) and (year(`vp`.`TanggalMulai`) = `Tahun`))) AS `TotalSelesai`,(select count(`vp`.`IDProyek`) from `vwproyek` `vp` where (isnull(`vp`.`RealitaSelesai`) and (month(`vp`.`TanggalMulai`) = `Bulan`) and (year(`vp`.`TanggalMulai`) = `Tahun`))) AS `TotalBerlangsung` from `vwproyek` `vp` group by month(`vp`.`TanggalMulai`),year(`vp`.`TanggalMulai`) ;

-- --------------------------------------------------------

--
-- Structure for view `vwsubkontrak`
--
DROP TABLE IF EXISTS `vwsubkontrak`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vwsubkontrak`  AS  select `msk`.`IDSubKontrak` AS `IDSubKontrak`,`vt`.`IDTugas` AS `IDTugas`,`vt`.`IDProyek` AS `IDProyek`,`vt`.`NamaTugas` AS `NamaTugas`,`msk`.`WaktuDikirim` AS `WaktuDikirim`,`msk`.`WaktuDiterima` AS `WaktuDiterima`,`msk`.`StatusSubKontrak` AS `StatusSubKontrak`,`msk`.`Catatan` AS `Catatan`,`msk`.`Attachment` AS `Attachment`,`mu`.`NamaLengkap` AS `NamaLengkap` from ((`mstsubkontrak` `msk` left join `vwtugas` `vt` on((`msk`.`IDTugas` = `vt`.`IDTugas`))) left join `mstuser` `mu` on((`msk`.`IDPenanggungJawab` = `mu`.`IDUser`))) ;

-- --------------------------------------------------------

--
-- Structure for view `vwtrxlapor`
--
DROP TABLE IF EXISTS `vwtrxlapor`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vwtrxlapor`  AS  select `tl`.`IDTrxLapor` AS `IDTrxLapor`,`tl`.`IDProyek` AS `IDProyek`,`tl`.`IDTugas` AS `IDTugas`,`vt`.`InisialTugas` AS `InisialTugas`,`vt`.`NamaTugas` AS `NamaTugas`,`vt`.`NamaProyek` AS `NamaProyek`,`vu`.`NamaLengkap` AS `NamaLengkap`,`tl`.`Attachment` AS `Attachment`,`tl`.`Catatan` AS `Catatan`,`tl`.`StatusTindakan` AS `StatusTindakan`,`tl`.`AttachmentTindakan` AS `AttachmentTindakan`,`tl`.`CatatanTindakan` AS `CatatanTindakan`,`tl`.`created_at` AS `WaktuLapor` from ((`trxlapor` `tl` left join `vwtugas` `vt` on((`tl`.`IDTugas` = `vt`.`IDTugas`))) left join `vwuser` `vu` on((`tl`.`IDPelapor` = `vu`.`IDUser`))) ;

-- --------------------------------------------------------

--
-- Structure for view `vwtrxtugas`
--
DROP TABLE IF EXISTS `vwtrxtugas`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vwtrxtugas`  AS  select `tt`.`IDTrxTugas` AS `IDTrxTugas`,`tt`.`IDTugas` AS `IDTugas`,`mt`.`IDProyek` AS `IDProyek`,`mt`.`NamaTugas` AS `NamaTugas`,`mt`.`InisialTugas` AS `InisialTugas`,`mt`.`DeskripsiTugas` AS `DeskripsiTugas`,`tt`.`IDPenanggungJawab` AS `IDPenanggungJawab`,`mu`.`NamaLengkap` AS `NamaLengkap`,`tt`.`IDMilestoneTugas` AS `IDMilestoneTugas`,`mmt`.`MilestoneTugas` AS `MilestoneTugas`,`tt`.`StatusTugas` AS `StatusTugas`,`mp`.`Percepatan` AS `Percepatan`,`tt`.`WaktuMulai` AS `WaktuMulai`,`tt`.`WaktuSelesai` AS `WaktuSelesai`,`tt`.`Catatan` AS `Catatan`,`tt`.`Attachment` AS `Attachment` from ((((`trxtugas` `tt` left join `mstuser` `mu` on((`tt`.`IDPenanggungJawab` = `mu`.`IDUser`))) left join `mstmilestonetugas` `mmt` on((`tt`.`IDMilestoneTugas` = `mmt`.`IDMilestoneTugas`))) left join `msttugas` `mt` on((`tt`.`IDTugas` = `mt`.`IDTugas`))) left join `mstproyek` `mp` on((`mt`.`IDProyek` = `mp`.`IDProyek`))) ;

-- --------------------------------------------------------

--
-- Structure for view `vwtugas`
--
DROP TABLE IF EXISTS `vwtugas`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vwtugas`  AS  select `mt`.`IDTugas` AS `IDTugas`,`mt`.`InisialTugas` AS `InisialTugas`,`mt`.`IDProyek` AS `IDProyek`,`mp`.`NamaProyek` AS `NamaProyek`,`mt`.`NamaTugas` AS `NamaTugas`,`mt`.`DeskripsiTugas` AS `DeskripsiTugas`,`mt`.`RencanaMulai` AS `RencanaMulai`,`mt`.`RencanaSelesai` AS `RencanaSelesai`,`mt`.`RealitaMulai` AS `RealitaMulai`,`mt`.`RealitaSelesai` AS `RealitaSelesai`,`mt`.`IDPenanggungJawab` AS `IDPenanggungJawab`,`mt`.`StatusKajiUlang` AS `StatusKajiUlang`,`mu`.`NamaLengkap` AS `PenanggungJawab`,`mt`.`IDMilestoneTugas` AS `IDMilestoneTugas`,`mmt`.`MilestoneTugas` AS `Milestone`,(select count(`tt`.`IDTrxTugas`) from `trxtugas` `tt` where ((`tt`.`IDTugas` = `mt`.`IDTugas`) and (`tt`.`IDMilestoneTugas` = 5) and (`tt`.`StatusTugas` is not null))) AS `TotalKesalahanAnalisis` from (((`msttugas` `mt` left join `mstproyek` `mp` on((`mt`.`IDProyek` = `mp`.`IDProyek`))) left join `mstuser` `mu` on((`mt`.`IDPenanggungJawab` = `mu`.`IDUser`))) left join `mstmilestonetugas` `mmt` on((`mt`.`IDMilestoneTugas` = `mmt`.`IDMilestoneTugas`))) ;

-- --------------------------------------------------------

--
-- Structure for view `vwulasan`
--
DROP TABLE IF EXISTS `vwulasan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vwulasan`  AS  select `mu`.`IDUlasan` AS `IDUlasan`,`mu`.`IDProyek` AS `IDProyek`,`mp`.`NamaProyek` AS `NamaProyek`,`mp`.`SponsorProyek` AS `SponsorProyek`,`mp`.`TanggalMulai` AS `TanggalMulai`,`mp`.`RealitaSelesai` AS `RealitaSelesai`,`mu`.`Pertanyaan1` AS `Pertanyaan1`,`mu`.`Pertanyaan2` AS `Pertanyaan2`,`mu`.`Pertanyaan3` AS `Pertanyaan3`,`mu`.`Pertanyaan4` AS `Pertanyaan4`,`mu`.`Pertanyaan5` AS `Pertanyaan5`,`mu`.`Pertanyaan6` AS `Pertanyaan6`,`mu`.`Pertanyaan7` AS `Pertanyaan7`,`mu`.`Pertanyaan8` AS `Pertanyaan8`,`mu`.`Pertanyaan9` AS `Pertanyaan9`,`mu`.`KritikSaran` AS `KritikSaran`,`mu`.`created_at` AS `created_at` from (`mstulasan` `mu` left join `mstproyek` `mp` on((`mu`.`IDProyek` = `mp`.`IDProyek`))) ;

-- --------------------------------------------------------

--
-- Structure for view `vwuser`
--
DROP TABLE IF EXISTS `vwuser`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vwuser`  AS  select `mu`.`id` AS `id`,`mu`.`IDUser` AS `IDUser`,`mu`.`NamaLengkap` AS `NamaLengkap`,`mu`.`IDRole` AS `IDRole`,`mr`.`Role` AS `Role`,`mu`.`Status` AS `Status`,(select count(0) from `msttugas` `mt` where (`mt`.`IDPenanggungJawab` = `mu`.`IDUser`)) AS `TotalPekerjaan` from (`mstuser` `mu` left join `mstrole` `mr` on((`mu`.`IDRole` = `mr`.`IDRole`))) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mstkategoritugas`
--
ALTER TABLE `mstkategoritugas`
  ADD PRIMARY KEY (`IDKategori`);

--
-- Indexes for table `mstmilestoneflowtugas`
--
ALTER TABLE `mstmilestoneflowtugas`
  ADD PRIMARY KEY (`IDMilestoneFlowTugas`);

--
-- Indexes for table `mstmilestonetugas`
--
ALTER TABLE `mstmilestonetugas`
  ADD PRIMARY KEY (`IDMilestoneTugas`);

--
-- Indexes for table `mstnotifikasi`
--
ALTER TABLE `mstnotifikasi`
  ADD PRIMARY KEY (`IDNotifikasi`);

--
-- Indexes for table `mstproyek`
--
ALTER TABLE `mstproyek`
  ADD PRIMARY KEY (`IDProyek`),
  ADD UNIQUE KEY `mstproyek_namaproyek_unique` (`NamaProyek`),
  ADD UNIQUE KEY `mstproyek_inisialproyek_unique` (`InisialProyek`);

--
-- Indexes for table `mstrole`
--
ALTER TABLE `mstrole`
  ADD PRIMARY KEY (`IDRole`),
  ADD UNIQUE KEY `mstrole_role_unique` (`Role`);

--
-- Indexes for table `mstsertifikat`
--
ALTER TABLE `mstsertifikat`
  ADD PRIMARY KEY (`IDSertifikat`);

--
-- Indexes for table `mstsubkontrak`
--
ALTER TABLE `mstsubkontrak`
  ADD PRIMARY KEY (`IDSubKontrak`);

--
-- Indexes for table `msttugas`
--
ALTER TABLE `msttugas`
  ADD PRIMARY KEY (`IDTugas`);

--
-- Indexes for table `mstulasan`
--
ALTER TABLE `mstulasan`
  ADD PRIMARY KEY (`IDUlasan`);

--
-- Indexes for table `mstuser`
--
ALTER TABLE `mstuser`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trxkajiulang`
--
ALTER TABLE `trxkajiulang`
  ADD PRIMARY KEY (`IDTrxKajiUlang`);

--
-- Indexes for table `trxlapor`
--
ALTER TABLE `trxlapor`
  ADD PRIMARY KEY (`IDTrxLapor`);

--
-- Indexes for table `trxtugas`
--
ALTER TABLE `trxtugas`
  ADD PRIMARY KEY (`IDTrxTugas`);

--
-- Indexes for table `trxtugaslog`
--
ALTER TABLE `trxtugaslog`
  ADD PRIMARY KEY (`IDTrxTugasLog`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `mstkategoritugas`
--
ALTER TABLE `mstkategoritugas`
  MODIFY `IDKategori` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mstmilestoneflowtugas`
--
ALTER TABLE `mstmilestoneflowtugas`
  MODIFY `IDMilestoneFlowTugas` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `mstmilestonetugas`
--
ALTER TABLE `mstmilestonetugas`
  MODIFY `IDMilestoneTugas` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `mstnotifikasi`
--
ALTER TABLE `mstnotifikasi`
  MODIFY `IDNotifikasi` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `mstproyek`
--
ALTER TABLE `mstproyek`
  MODIFY `IDProyek` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `mstrole`
--
ALTER TABLE `mstrole`
  MODIFY `IDRole` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `mstsertifikat`
--
ALTER TABLE `mstsertifikat`
  MODIFY `IDSertifikat` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `mstsubkontrak`
--
ALTER TABLE `mstsubkontrak`
  MODIFY `IDSubKontrak` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `msttugas`
--
ALTER TABLE `msttugas`
  MODIFY `IDTugas` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `mstulasan`
--
ALTER TABLE `mstulasan`
  MODIFY `IDUlasan` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mstuser`
--
ALTER TABLE `mstuser`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `trxkajiulang`
--
ALTER TABLE `trxkajiulang`
  MODIFY `IDTrxKajiUlang` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `trxlapor`
--
ALTER TABLE `trxlapor`
  MODIFY `IDTrxLapor` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `trxtugas`
--
ALTER TABLE `trxtugas`
  MODIFY `IDTrxTugas` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `trxtugaslog`
--
ALTER TABLE `trxtugaslog`
  MODIFY `IDTrxTugasLog` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
