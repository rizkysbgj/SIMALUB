-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 23, 2019 at 03:57 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.11

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
(40, '2019_03_22_142011_vw_dashboard_performa_tahunan', 14);

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
(1, 'Analisis X', 'AX', 'rudi_heryanto', 'Aktif', 1, '2019-03-23 00:00:00', '2019-03-24 00:00:00', NULL, 'Analisis X', 'PT. X', 0, NULL, 'admin', NULL, '2019-03-23 02:05:48', '2019-03-23 02:05:48');

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
(1, '14032019001', 'Ekstraksi sampel 14032019001', 'ekstrak sample', 1, 'salinah_biofarmaka', 7, '2019-03-24', '2019-03-25', '2019-03-23', NULL, 'Bisa', 'admin', 'admin', '2019-03-23 02:37:56', '2019-03-23 02:49:58');

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
  `Avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mstuser`
--

INSERT INTO `mstuser` (`id`, `IDUser`, `NIK`, `NamaLengkap`, `IDRole`, `Email`, `Password`, `Status`, `CreatedBy`, `UpdatedBy`, `Avatar`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'G64150033', 'Admin Sistem', 1, 'admin@ipb.ac.id', '$2y$10$6mzsG0cbsbuCbsHH5MfZeO1mBSI3Tar35mWU4PW5JgGh1WrUdvyIm', 'Aktif', 'admin', 'admin', NULL, '2019-03-02 17:00:00', '2019-03-03 09:14:26'),
(2, 'wisnu_ananta', 'WAK', 'Wisnu Ananta Kusuma', 2, 'wisnu@ipb.ac.id', '$2y$10$/0aLnEg71pL38huj8J46puWvfyhZoYpcdbQvcCttu2i9ytohgLX2u', 'Aktif', 'admin', 'admin', NULL, '2019-03-03 09:12:22', '2019-03-03 09:15:53'),
(3, 'rudi_heryanto', 'RHE', 'Rudi Heryanto', 3, 'rudi@ipb.ac.id', '$2y$10$cKMHhgDkzYZ/UA8T8pS.nuseIp/sXAYhiWLml6OK1DSJ5bE.6ou1G', 'Aktif', 'admin', NULL, NULL, '2019-03-03 09:25:26', '2019-03-03 09:25:26'),
(4, 'nunuk_biofarmaka', 'NBI', 'Nunuk', 4, 'nunuk@ipb.ac.id', '$2y$10$Q5N/JEsmqR1ItQm1YJRnBOKGV8Keiu4hGrTcvoxCBRMY9dj5tarHS', 'Aktif', 'admin', NULL, NULL, '2019-03-03 11:10:41', '2019-03-03 11:10:41'),
(5, 'salinah_biofarmaka', 'SBI', 'Salinah', 5, 'salinah@ipb.ac.id', '$2y$10$NdSrH7ws/Y6hp.PZUi8wPeQ3XhZ6Eo37I4h976ejXK0rl.ao2kgBi', 'Aktif', 'admin', 'admin', NULL, '2019-03-03 11:19:13', '2019-03-04 04:06:00'),
(6, 'wiwik_biofarmaka', 'WBI', 'Wiwik', 6, 'wiwik@ipb.ac.id', '$2y$10$oaPcbZjmYENUYH86DxzFWOjsoeyWbakORa/uJncJ7evnvfXtkpqHe', 'Aktif', 'admin', NULL, NULL, '2019-03-05 03:11:59', '2019-03-05 03:11:59');

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
(1, 1, 'Bisa', 'Bisa', 'Bisa', 'Bisa', 'Bisa', 'Bisa', '2019-03-23 02:38:25', '2019-03-23 02:38:25');

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
(1, 1, 1, 'admin', NULL, NULL, NULL, 'kurang bahan', 0, NULL, NULL, NULL, NULL, '2019-03-23 02:44:03', '2019-03-23 02:44:03');

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
(1, 1, 2, 'admin', NULL, '2019-03-23 00:00:00', '2019-03-23 00:00:00', 'kerjakan', NULL, NULL, NULL, 'admin', 'admin', '2019-03-23 02:38:13', '2019-03-23 02:38:39'),
(2, 1, 5, 'nunuk_biofarmaka', NULL, '2019-03-23 00:00:00', '2019-03-23 00:00:00', 'selesai', NULL, NULL, NULL, 'admin', 'admin', '2019-03-23 02:38:51', '2019-03-23 02:44:15'),
(3, 1, 8, 'salinah_biofarmaka', NULL, '2019-03-23 00:00:00', '2019-03-23 00:00:00', 'ada kesalahan', NULL, NULL, NULL, 'admin', 'admin', '2019-03-23 02:45:09', '2019-03-23 02:45:59'),
(4, 1, 5, 'nunuk_biofarmaka', 'Ulangan ke-1', '2019-03-23 00:00:00', '2019-03-23 00:00:00', 'sudah diperbaiki', NULL, NULL, NULL, 'admin', 'admin', '2019-03-23 02:45:59', '2019-03-23 02:49:22'),
(5, 1, 8, 'salinah_biofarmaka', 'Ulangan ke-1', NULL, NULL, NULL, NULL, NULL, NULL, 'admin', 'admin', '2019-03-23 02:49:58', '2019-03-23 02:49:58');

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

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vwdashboardperformabulanan`  AS  select `mu`.`IDUser` AS `IDUser`,`mu`.`NamaLengkap` AS `NamaLengkap`,month(`vtt`.`WaktuMulai`) AS `Bulan`,year(`vtt`.`WaktuMulai`) AS `Tahun`,sum((case when ((`vtt`.`IDMilestoneTugas` = 5) and (`vtt`.`Percepatan` = 0)) then 1 else 0 end)) AS `TotalAnalisisBiasa`,sum((case when ((`vtt`.`IDMilestoneTugas` = 5) and (`vtt`.`Percepatan` = 1)) then 1 else 0 end)) AS `TotalAnalisisPercepatan`,sum((case `vtt`.`IDMilestoneTugas` when 5 then 1 else 0 end)) AS `TotalAnalisis`,sum((case `vtt`.`IDMilestoneTugas` when 8 then 1 else 0 end)) AS `TotalSelia` from (`mstuser` `mu` join `vwtrxtugas` `vtt` on(((`vtt`.`IDPenanggungJawab` = `mu`.`IDUser`) and isnull(`vtt`.`StatusTugas`) and (`vtt`.`WaktuMulai` is not null)))) where ((`mu`.`IDRole` = 4) or (`mu`.`IDRole` = 5)) group by `mu`.`IDUser`,month(`vtt`.`WaktuMulai`),year(`vtt`.`WaktuMulai`),`mu`.`NamaLengkap` ;

-- --------------------------------------------------------

--
-- Structure for view `vwdashboardperformatahunan`
--
DROP TABLE IF EXISTS `vwdashboardperformatahunan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vwdashboardperformatahunan`  AS  select `mu`.`IDUser` AS `IDUser`,`mu`.`NamaLengkap` AS `NamaLengkap`,year(`vtt`.`WaktuMulai`) AS `Tahun`,sum((case when ((`vtt`.`IDMilestoneTugas` = 5) and (`vtt`.`Percepatan` = 0)) then 1 else 0 end)) AS `TotalAnalisisBiasa`,sum((case when ((`vtt`.`IDMilestoneTugas` = 5) and (`vtt`.`Percepatan` = 1)) then 1 else 0 end)) AS `TotalAnalisisPercepatan`,sum((case `vtt`.`IDMilestoneTugas` when 5 then 1 else 0 end)) AS `TotalAnalisis`,sum((case `vtt`.`IDMilestoneTugas` when 8 then 1 else 0 end)) AS `TotalSelia` from (`mstuser` `mu` join `vwtrxtugas` `vtt` on(((`vtt`.`IDPenanggungJawab` = `mu`.`IDUser`) and isnull(`vtt`.`StatusTugas`) and (`vtt`.`WaktuMulai` is not null)))) where ((`mu`.`IDRole` = 4) or (`mu`.`IDRole` = 5)) group by `mu`.`IDUser`,year(`vtt`.`WaktuMulai`),`mu`.`NamaLengkap` ;

-- --------------------------------------------------------

--
-- Structure for view `vwproyek`
--
DROP TABLE IF EXISTS `vwproyek`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vwproyek`  AS  select `mp`.`IDProyek` AS `IDProyek`,`mp`.`NamaProyek` AS `NamaProyek`,`mp`.`InisialProyek` AS `InisialProyek`,`mu`.`NamaLengkap` AS `PenanggungJawab`,`mp`.`TanggalMulai` AS `TanggalMulai`,`mp`.`RencanaSelesai` AS `RencanaSelesai`,`mp`.`RealitaSelesai` AS `RealitaSelesai`,(select count(`mt`.`IDTugas`) from `msttugas` `mt` where ((`mt`.`IDProyek` = `mp`.`IDProyek`) and (`mt`.`StatusKajiUlang` <> 'Tidak'))) AS `TotalTugas`,`mp`.`SiapBuatSertifikat` AS `SiapBuatSertifikat` from (`mstproyek` `mp` left join `mstuser` `mu` on((`mp`.`PenanggungJawab` = `mu`.`IDUser`))) ;

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

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vwsubkontrak`  AS  select `msk`.`IDSubKontrak` AS `IDSubKontrak`,`vt`.`IDTugas` AS `IDTugas`,`vt`.`IDProyek` AS `IDProyek`,`vt`.`NamaTugas` AS `NamaTugas`,`msk`.`WaktuDikirim` AS `WaktuDikirim`,`msk`.`WaktuDiterima` AS `WaktuDiterima`,`msk`.`StatusSubKontrak` AS `StatusSubKontrak`,`msk`.`Catatan` AS `Catatan`,`mu`.`NamaLengkap` AS `NamaLengkap` from ((`mstsubkontrak` `msk` left join `vwtugas` `vt` on((`msk`.`IDTugas` = `vt`.`IDTugas`))) left join `mstuser` `mu` on((`msk`.`IDPenanggungJawab` = `mu`.`IDUser`))) ;

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

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vwtrxtugas`  AS  select `tt`.`IDTrxTugas` AS `IDTrxTugas`,`tt`.`IDTugas` AS `IDTugas`,`mt`.`IDProyek` AS `IDProyek`,`mt`.`NamaTugas` AS `NamaTugas`,`tt`.`IDPenanggungJawab` AS `IDPenanggungJawab`,`mu`.`NamaLengkap` AS `NamaLengkap`,`tt`.`IDMilestoneTugas` AS `IDMilestoneTugas`,`mmt`.`MilestoneTugas` AS `MilestoneTugas`,`tt`.`StatusTugas` AS `StatusTugas`,`mp`.`Percepatan` AS `Percepatan`,`tt`.`WaktuMulai` AS `WaktuMulai`,`tt`.`WaktuSelesai` AS `WaktuSelesai`,`tt`.`Catatan` AS `Catatan`,`tt`.`Attachment` AS `Attachment` from ((((`trxtugas` `tt` left join `mstuser` `mu` on((`tt`.`IDPenanggungJawab` = `mu`.`IDUser`))) left join `mstmilestonetugas` `mmt` on((`tt`.`IDMilestoneTugas` = `mmt`.`IDMilestoneTugas`))) left join `msttugas` `mt` on((`tt`.`IDTugas` = `mt`.`IDTugas`))) left join `mstproyek` `mp` on((`mt`.`IDProyek` = `mp`.`IDProyek`))) ;

-- --------------------------------------------------------

--
-- Structure for view `vwtugas`
--
DROP TABLE IF EXISTS `vwtugas`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vwtugas`  AS  select `mt`.`IDTugas` AS `IDTugas`,`mt`.`InisialTugas` AS `InisialTugas`,`mt`.`IDProyek` AS `IDProyek`,`mp`.`NamaProyek` AS `NamaProyek`,`mt`.`NamaTugas` AS `NamaTugas`,`mt`.`DeskripsiTugas` AS `DeskripsiTugas`,`mt`.`RencanaMulai` AS `RencanaMulai`,`mt`.`RencanaSelesai` AS `RencanaSelesai`,`mt`.`RealitaMulai` AS `RealitaMulai`,`mt`.`RealitaSelesai` AS `RealitaSelesai`,`mt`.`IDPenanggungJawab` AS `IDPenanggungJawab`,`mt`.`StatusKajiUlang` AS `StatusKajiUlang`,`mu`.`NamaLengkap` AS `PenanggungJawab`,`mt`.`IDMilestoneTugas` AS `IDMilestoneTugas`,`mmt`.`MilestoneTugas` AS `Milestone`,(select count(`tt`.`IDTrxTugas`) from `trxtugas` `tt` where ((`tt`.`IDTugas` = `mt`.`IDTugas`) and (`tt`.`IDMilestoneTugas` = 5) and (`tt`.`StatusTugas` is not null))) AS `TotalKesalahanAnalisis` from (((`msttugas` `mt` left join `mstproyek` `mp` on((`mt`.`IDProyek` = `mp`.`IDProyek`))) left join `mstuser` `mu` on((`mt`.`IDPenanggungJawab` = `mu`.`IDUser`))) left join `mstmilestonetugas` `mmt` on((`mt`.`IDMilestoneTugas` = `mmt`.`IDMilestoneTugas`))) ;

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

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
-- AUTO_INCREMENT for table `mstproyek`
--
ALTER TABLE `mstproyek`
  MODIFY `IDProyek` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `mstrole`
--
ALTER TABLE `mstrole`
  MODIFY `IDRole` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `mstsertifikat`
--
ALTER TABLE `mstsertifikat`
  MODIFY `IDSertifikat` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mstsubkontrak`
--
ALTER TABLE `mstsubkontrak`
  MODIFY `IDSubKontrak` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `msttugas`
--
ALTER TABLE `msttugas`
  MODIFY `IDTugas` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `mstuser`
--
ALTER TABLE `mstuser`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `trxkajiulang`
--
ALTER TABLE `trxkajiulang`
  MODIFY `IDTrxKajiUlang` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `trxlapor`
--
ALTER TABLE `trxlapor`
  MODIFY `IDTrxLapor` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `trxtugas`
--
ALTER TABLE `trxtugas`
  MODIFY `IDTrxTugas` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `trxtugaslog`
--
ALTER TABLE `trxtugaslog`
  MODIFY `IDTrxTugasLog` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
