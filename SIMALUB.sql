-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 28, 2019 at 11:15 AM
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
(6, '2019_02_07_121746_mst_tugas', 1),
(7, '2019_02_10_181109_mst_sub_kontrak', 1),
(8, '2019_02_10_183913_trx_tugas', 1),
(9, '2019_02_10_184515_mst_kategori_tugas', 1),
(10, '2019_02_11_152704_vw_user', 1),
(11, '2019_02_12_085354_vwproyek', 1),
(12, '2019_02_12_112259_vw_tugas', 1),
(13, '2019_02_18_084658_trx_tugas_log', 2),
(14, '2019_02_18_084659_trx_tugas_log', 3),
(15, '2019_02_25_152149_trx_lapor', 3),
(16, '2019_02_25_152256_vw_trx_lapor', 4),
(17, '2019_02_26_084412_trx_kaji_ulang', 5);

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
  `CreatedBy` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `UpdatedBy` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mstproyek`
--

INSERT INTO `mstproyek` (`IDProyek`, `NamaProyek`, `InisialProyek`, `PenanggungJawab`, `Status`, `PinKeMenu`, `TanggalMulai`, `RencanaSelesai`, `RealitaSelesai`, `DeskripsiProyek`, `SponsorProyek`, `CreatedBy`, `UpdatedBy`, `created_at`, `updated_at`) VALUES
(2, 'Chimory', 'CHI', 'rudi_heryanto', 'Aktif', 1, '2019-02-18 00:00:00', '2019-03-04 00:00:00', NULL, 'Susu chimory', 'Chimory Riverside', 'Admin', NULL, '2019-02-18 04:59:28', '2019-02-18 04:59:28');

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
(1, 'Admin'),
(6, 'Administrasi'),
(4, 'Analis'),
(2, 'Manajer Puncak'),
(3, 'Manajer Teknis'),
(5, 'Penyelia');

-- --------------------------------------------------------

--
-- Table structure for table `mstsubkontrak`
--

CREATE TABLE `mstsubkontrak` (
  `IDSubKontrak` int(10) UNSIGNED NOT NULL,
  `IDTugas` int(11) NOT NULL,
  `WaktuDikirim` date NOT NULL,
  `WaktuDiterima` date NOT NULL,
  `CreatedBy` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `UpdatedBy` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `msttugas`
--

CREATE TABLE `msttugas` (
  `IDTugas` int(10) UNSIGNED NOT NULL,
  `InisialTugas` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `NamaTugas` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `DeskripsiTugas` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `IDKategori` int(11) NOT NULL,
  `IDProyek` int(11) NOT NULL,
  `PIC` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `IDMilestone` int(11) NOT NULL,
  `RencanaMulai` date NOT NULL,
  `RencanaSelesai` date NOT NULL,
  `RealitaMulai` date DEFAULT NULL,
  `RealitaSelesai` date DEFAULT NULL,
  `Status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `CreatedBy` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `UpdatedBy` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `msttugas`
--

INSERT INTO `msttugas` (`IDTugas`, `InisialTugas`, `NamaTugas`, `DeskripsiTugas`, `IDKategori`, `IDProyek`, `PIC`, `IDMilestone`, `RencanaMulai`, `RencanaSelesai`, `RealitaMulai`, `RealitaSelesai`, `Status`, `CreatedBy`, `UpdatedBy`, `created_at`, `updated_at`) VALUES
(7, 'CHI-2', 'test', 'test', 0, 2, 'nunuk', 2, '2019-02-27', '2019-02-28', '2019-02-26', NULL, 'OK', 'Admin', 'Admin', '2019-02-26 06:26:09', '2019-02-26 06:29:52');

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
(1, 'wisnu_ananta', 'SIMALUB001', 'Wisnu Ananta Kusuma', 2, 'wisnu@gmail.com', '$2y$10$HPU35mSvCdJCNTx8xXhVNuUr72wo/FGQsgKpOCovCEAOhadsTOm42', 'Aktif', 'Admin', NULL, NULL, '2019-02-18 04:53:19', '2019-02-18 04:53:19'),
(2, 'rudi_heryanto', 'SIMALUB002', 'Rudi Heryanto', 3, 'rudi@gmail.com', '$2y$10$cqSwetILHYiKiVfE./xle.FKJj5bGecCwsx66/mORkbuHb.3epcoO', 'Aktif', 'Admin', NULL, NULL, '2019-02-18 04:54:13', '2019-02-18 04:54:13'),
(3, 'salinah', 'SIMALUB003', 'Salinah', 4, 'salinah@gmail.com', '$2y$10$rPrYbMexydkuTulNQW1x8uiBjT683eQplVPjrpyCMQV4HplmDFyCy', 'Aktif', 'Admin', NULL, NULL, '2019-02-18 04:55:50', '2019-02-18 04:55:50'),
(4, 'nunuk', 'SIMALUB004', 'Nunuk', 5, 'nunuk@gmail.com', '$2y$10$Qmy1qLfzyYEX2fj.d0nqMeAI8nhrW163Jnf0agwFMZ93AdiRZ.nNG', 'Aktif', 'Admin', NULL, NULL, '2019-02-18 04:56:40', '2019-02-18 04:56:40'),
(5, 'wiwik', 'SIMALUB005', 'Wiwik', 6, 'wiwik@gmail.com', '$2y$10$JcuZ3l2lWrX4QZ09CXVk1O3yIN/BeHOQHj6W.wlsE..DqCU1Tlh0K', 'Aktif', 'Admin', NULL, NULL, '2019-02-18 04:57:11', '2019-02-18 04:57:11');

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
(1, 6, 'Bisa', 'Bisa', 'Bisa', 'Bisa', 'Bisa', 'Bisa', '2019-02-26 02:48:00', '2019-02-26 02:48:00');

-- --------------------------------------------------------

--
-- Table structure for table `trxlapor`
--

CREATE TABLE `trxlapor` (
  `IDTrxLapor` int(10) UNSIGNED NOT NULL,
  `IDProyek` int(11) NOT NULL,
  `IDTugas` int(11) NOT NULL,
  `Pelapor` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Attachment` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ContentType` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `NamaFile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Catatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `trxlapor`
--

INSERT INTO `trxlapor` (`IDTrxLapor`, `IDProyek`, `IDTugas`, `Pelapor`, `Attachment`, `ContentType`, `NamaFile`, `Catatan`, `created_at`, `updated_at`) VALUES
(1, 2, 6, 'Admin', NULL, NULL, NULL, 'woy', '2019-02-26 04:23:16', '2019-02-26 04:23:16');

-- --------------------------------------------------------

--
-- Table structure for table `trxtugas`
--

CREATE TABLE `trxtugas` (
  `IDTrxTugas` int(10) UNSIGNED NOT NULL,
  `IDTugas` int(11) NOT NULL,
  `IDMilestoneTugas` int(11) NOT NULL,
  `PIC` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `WaktuMulai` datetime DEFAULT NULL,
  `WaktuSelesai` datetime DEFAULT NULL,
  `Catatan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Attachment` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ContentType` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `FileName` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `CreatedBy` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `UpdatedBy` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `trxtugas`
--

INSERT INTO `trxtugas` (`IDTrxTugas`, `IDTugas`, `IDMilestoneTugas`, `PIC`, `WaktuMulai`, `WaktuSelesai`, `Catatan`, `Attachment`, `ContentType`, `FileName`, `CreatedBy`, `UpdatedBy`, `created_at`, `updated_at`) VALUES
(23, 6, 2, 'Admin', '2019-02-25 00:00:00', '2019-02-25 00:00:00', 'done kaji ulang', NULL, NULL, NULL, 'Admin', 'Admin', '2019-02-25 07:02:26', '2019-02-25 07:02:53'),
(24, 6, 5, 'salinah', '2019-02-25 00:00:00', '2019-02-25 00:00:00', 'done analisis', NULL, NULL, NULL, 'Admin', 'Admin', '2019-02-25 07:03:11', '2019-02-25 07:04:12'),
(25, 6, 8, 'salinah', '2019-02-25 00:00:00', '2019-02-25 00:00:00', NULL, NULL, NULL, NULL, 'Admin', 'Admin', '2019-02-25 07:05:11', '2019-02-25 07:06:00'),
(26, 6, 5, 'salinah', '2019-02-25 00:00:00', '2019-02-25 00:00:00', 'done feedback', NULL, NULL, NULL, 'Admin', 'Admin', '2019-02-25 07:06:00', '2019-02-25 07:08:57'),
(27, 6, 8, 'salinah', '2019-02-25 00:00:00', '2019-02-25 00:00:00', 'done koreksi', NULL, NULL, NULL, 'Admin', 'Admin', '2019-02-25 07:09:25', '2019-02-25 07:09:59'),
(28, 7, 2, 'Admin', '2019-02-26 00:00:00', NULL, NULL, NULL, NULL, NULL, 'Admin', 'Admin', '2019-02-26 06:29:52', '2019-02-26 06:29:52');

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
,`InisialTugas` varchar(10)
,`NamaTugas` varchar(255)
,`Pelapor` varchar(255)
,`Attachment` varchar(255)
,`ContentType` varchar(255)
,`NamaFile` varchar(255)
,`Catatan` varchar(255)
,`WaktuLapor` timestamp
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vwtugas`
-- (See below for the actual view)
--
CREATE TABLE `vwtugas` (
`IDTugas` int(10) unsigned
,`InisialTugas` varchar(10)
,`IDProyek` int(11)
,`NamaProyek` varchar(100)
,`NamaTugas` varchar(255)
,`Kategori` varchar(255)
,`DeskripsiTugas` varchar(255)
,`RencanaMulai` date
,`RencanaSelesai` date
,`RealitaMulai` date
,`RealitaSelesai` date
,`IDPIC` varchar(255)
,`Status` varchar(255)
,`PenanggungJawab` varchar(255)
,`IDMilestone` int(11)
,`Milestone` varchar(255)
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
-- Structure for view `vwproyek`
--
DROP TABLE IF EXISTS `vwproyek`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vwproyek`  AS  select `mp`.`IDProyek` AS `IDProyek`,`mp`.`NamaProyek` AS `NamaProyek`,`mp`.`InisialProyek` AS `InisialProyek`,`mu`.`NamaLengkap` AS `PenanggungJawab`,`mp`.`TanggalMulai` AS `TanggalMulai`,`mp`.`RencanaSelesai` AS `RencanaSelesai`,`mp`.`RealitaSelesai` AS `RealitaSelesai`,(select count(`msttugas`.`IDTugas`) from `msttugas` where ((`msttugas`.`IDProyek` = `mp`.`IDProyek`) and (`msttugas`.`Status` = 'Bisa'))) AS `TotalTugas` from (`mstproyek` `mp` left join `mstuser` `mu` on((`mp`.`PenanggungJawab` = `mu`.`IDUser`))) ;

-- --------------------------------------------------------

--
-- Structure for view `vwtrxlapor`
--
DROP TABLE IF EXISTS `vwtrxlapor`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vwtrxlapor`  AS  select `tl`.`IDTrxLapor` AS `IDTrxLapor`,`tl`.`IDProyek` AS `IDProyek`,`tl`.`IDTugas` AS `IDTugas`,`vt`.`InisialTugas` AS `InisialTugas`,`vt`.`NamaTugas` AS `NamaTugas`,`tl`.`Pelapor` AS `Pelapor`,`tl`.`Attachment` AS `Attachment`,`tl`.`ContentType` AS `ContentType`,`tl`.`NamaFile` AS `NamaFile`,`tl`.`Catatan` AS `Catatan`,`tl`.`created_at` AS `WaktuLapor` from (`trxlapor` `tl` join `vwtugas` `vt` on((`tl`.`IDTugas` = `vt`.`IDTugas`))) ;

-- --------------------------------------------------------

--
-- Structure for view `vwtugas`
--
DROP TABLE IF EXISTS `vwtugas`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vwtugas`  AS  select `mt`.`IDTugas` AS `IDTugas`,`mt`.`InisialTugas` AS `InisialTugas`,`mt`.`IDProyek` AS `IDProyek`,`mp`.`NamaProyek` AS `NamaProyek`,`mt`.`NamaTugas` AS `NamaTugas`,`mkt`.`Kategori` AS `Kategori`,`mt`.`DeskripsiTugas` AS `DeskripsiTugas`,`mt`.`RencanaMulai` AS `RencanaMulai`,`mt`.`RencanaSelesai` AS `RencanaSelesai`,`mt`.`RealitaMulai` AS `RealitaMulai`,`mt`.`RealitaSelesai` AS `RealitaSelesai`,`mt`.`PIC` AS `IDPIC`,`mt`.`Status` AS `Status`,`mu`.`NamaLengkap` AS `PenanggungJawab`,`mt`.`IDMilestone` AS `IDMilestone`,`mmt`.`MilestoneTugas` AS `Milestone` from ((((`msttugas` `mt` left join `mstproyek` `mp` on((`mt`.`IDProyek` = `mp`.`IDProyek`))) left join `mstkategoritugas` `mkt` on((`mt`.`IDKategori` = `mkt`.`IDKategori`))) left join `mstuser` `mu` on((`mt`.`PIC` = `mu`.`IDUser`))) left join `mstmilestonetugas` `mmt` on((`mt`.`IDMilestone` = `mmt`.`IDMilestoneTugas`))) ;

-- --------------------------------------------------------

--
-- Structure for view `vwuser`
--
DROP TABLE IF EXISTS `vwuser`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vwuser`  AS  select `mu`.`id` AS `id`,`mu`.`IDUser` AS `IDUser`,`mu`.`NamaLengkap` AS `NamaLengkap`,`mu`.`IDRole` AS `IDRole`,`mr`.`Role` AS `Role`,`mu`.`Status` AS `Status`,(select count(`msttugas`.`IDTugas`) from `msttugas` where (`msttugas`.`PIC` = `mu`.`IDUser`)) AS `TotalPekerjaan` from (`mstuser` `mu` left join `mstrole` `mr` on((`mu`.`IDRole` = `mr`.`IDRole`))) ;

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
-- Indexes for table `mstsubkontrak`
--
ALTER TABLE `mstsubkontrak`
  ADD PRIMARY KEY (`IDSubKontrak`);

--
-- Indexes for table `msttugas`
--
ALTER TABLE `msttugas`
  ADD PRIMARY KEY (`IDTugas`),
  ADD UNIQUE KEY `msttugas_inisialtugas_unique` (`InisialTugas`);

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

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
  MODIFY `IDProyek` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `mstrole`
--
ALTER TABLE `mstrole`
  MODIFY `IDRole` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `mstsubkontrak`
--
ALTER TABLE `mstsubkontrak`
  MODIFY `IDSubKontrak` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `msttugas`
--
ALTER TABLE `msttugas`
  MODIFY `IDTugas` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `mstuser`
--
ALTER TABLE `mstuser`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
  MODIFY `IDTrxTugas` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `trxtugaslog`
--
ALTER TABLE `trxtugaslog`
  MODIFY `IDTrxTugasLog` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
