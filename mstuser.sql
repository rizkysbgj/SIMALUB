-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 18, 2019 at 05:41 AM
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

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mstuser`
--
ALTER TABLE `mstuser`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mstuser`
--
ALTER TABLE `mstuser`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
