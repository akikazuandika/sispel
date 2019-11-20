-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 20, 2019 at 08:58 AM
-- Server version: 10.4.7-MariaDB-1:10.4.7+maria~bionic
-- PHP Version: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sispel`
--

-- --------------------------------------------------------

--
-- Table structure for table `kamar`
--

CREATE TABLE `kamar` (
  `id` varchar(255) NOT NULL DEFAULT '',
  `capacity` int(11) NOT NULL DEFAULT 10,
  `code` varchar(1) NOT NULL,
  `nomor` varchar(1) NOT NULL,
  `chairman` varchar(255) DEFAULT NULL,
  `createdAt` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kamar`
--

INSERT INTO `kamar` (`id`, `capacity`, `code`, `nomor`, `chairman`, `createdAt`) VALUES
('A1', 12, 'A', '1', '579e2a574dda211f5877feb76d978925', '2019-09-01 11:21:59'),
('A2', 20, 'A', '2', '579e2a574dda211f5877feb76d978925', '2019-09-01 10:54:58'),
('A3', 20, 'A', '3', '72b0ef664913855641986101291592a9', '2019-09-01 11:20:30');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggaran`
--

CREATE TABLE `pelanggaran` (
  `id` varchar(255) NOT NULL DEFAULT '',
  `santriId` varchar(255) NOT NULL DEFAULT '',
  `kamarId` varchar(3) NOT NULL DEFAULT '',
  `chairmanId` varchar(255) NOT NULL DEFAULT '',
  `createdAt` datetime NOT NULL DEFAULT current_timestamp(),
  `description` varchar(255) DEFAULT '',
  `type` tinyint(1) NOT NULL DEFAULT 3
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pelanggaran`
--

INSERT INTO `pelanggaran` (`id`, `santriId`, `kamarId`, `chairmanId`, `createdAt`, `description`, `type`) VALUES
('0b0fa618f6ad1e606dc2d784cf209607', 'S7c774a110fa09030433d0cabc962427b', '#', '', '2019-09-17 12:29:05', 'hayy', 1),
('3060163fa2b43a0a27f06b8285165032', 'S7c774a110fa09030433d0cabc962427b', 'A1', '579e2a574dda211f5877feb76d978925', '2019-09-17 12:33:43', 'ahhahaha', 1),
('37be03b95199bc3aa193bac7424409e0', 'S7c774a110fa09030433d0cabc962427b', 'A1', '579e2a574dda211f5877feb76d978925', '2019-09-05 04:13:12', 'alahh', 2),
('3ea2610e0f2e5ace7b97578717f6d4db', 'S7c774a110fa09030433d0cabc962427b', 'A1', '579e2a574dda211f5877feb76d978925', '2019-09-05 04:16:26', 'iss iss', 2),
('43a35782e641afd0f6d539ee50fd12d2', 'S7c774a110fa09030433d0cabc962427b', 'A1', '579e2a574dda211f5877feb76d978925', '2019-09-05 04:22:19', 'weww', 2),
('959b5be1c4ab3054502ef446bf8ae5ce', 'S7c774a110fa09030433d0cabc962427b', 'A1', '579e2a574dda211f5877feb76d978925', '2019-09-17 12:13:15', 'woyyy', 1),
('bc7f8b3cc64177bf396bfbdca372d997', 'S7c774a110fa09030433d0cabc962427b', 'A1', '579e2a574dda211f5877feb76d978925', '2019-09-05 03:48:39', 'asd', 3),
('e38008d80565a92d14e3e58c099932b1', 'S7c774a110fa09030433d0cabc962427b', 'A1', '579e2a574dda211f5877feb76d978925', '2019-09-17 12:24:47', 'ahahah', 1),
('e3af508d78f34142db61fd0503cfdf32', 'S7c774a110fa09030433d0cabc962427b', 'A1', '579e2a574dda211f5877feb76d978925', '2019-09-01 12:23:07', 'wkwkw', 1);

-- --------------------------------------------------------

--
-- Table structure for table `santri_kamar`
--

CREATE TABLE `santri_kamar` (
  `id` varchar(255) NOT NULL DEFAULT '',
  `idSanti` varchar(255) NOT NULL DEFAULT '',
  `idKamar` varchar(255) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users_admin`
--

CREATE TABLE `users_admin` (
  `id` varchar(255) NOT NULL DEFAULT '',
  `name` varchar(255) NOT NULL DEFAULT '',
  `username` varchar(255) NOT NULL DEFAULT '',
  `level` tinyint(1) NOT NULL DEFAULT 1,
  `password` varchar(255) NOT NULL DEFAULT '',
  `createdAt` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users_admin`
--

INSERT INTO `users_admin` (`id`, `name`, `username`, `level`, `password`, `createdAt`) VALUES
('5b1b01cc622a6e5499ba5ca6710a2b04', 'Super Admin', 'superadmin', 0, '$2y$10$K6WhWtKF80wf45hUKQu21O7z1pBQhlz/7ao17I0u2thpiKScKIHcq', '2019-08-31 08:41:02');

-- --------------------------------------------------------

--
-- Table structure for table `users_chairman`
--

CREATE TABLE `users_chairman` (
  `id` varchar(255) NOT NULL DEFAULT '',
  `name` varchar(255) NOT NULL DEFAULT '',
  `username` varchar(255) NOT NULL DEFAULT '',
  `password` varchar(255) NOT NULL DEFAULT '',
  `createdAt` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users_chairman`
--

INSERT INTO `users_chairman` (`id`, `name`, `username`, `password`, `createdAt`) VALUES
('1e78ae511f35493ae099d11a2bc7f858', 'Andika Wildaa', 'andikawilda', '$2y$10$cqgUAJ1jtVLG2ASx1aZP5.CnAP6T51f6ilDOVXn9T0Pdyp0jKpZPa', '2019-09-17 12:04:23'),
('579e2a574dda211f5877feb76d978925', 'cacawilda', 'cacawilda', '$2y$10$uy0emjjfQ4UHDkQZg7DnXu5VOym7JO1ulRfqAm3kgPtCn/wOs7P.C', '2019-09-01 09:56:04'),
('72b0ef664913855641986101291592a9', 'caca', 'caca', '$2y$10$tBkkFOCBA9ogVn8n6IFqVOGU1qfKypCqU5WGP1cJk8PNifowWnmWa', '2019-09-01 10:25:13');

-- --------------------------------------------------------

--
-- Table structure for table `users_pengasuh`
--

CREATE TABLE `users_pengasuh` (
  `id` varchar(255) NOT NULL DEFAULT '',
  `name` varchar(255) NOT NULL DEFAULT '',
  `username` varchar(255) NOT NULL DEFAULT '',
  `password` varchar(255) NOT NULL DEFAULT '',
  `createdAt` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users_pengasuh`
--

INSERT INTO `users_pengasuh` (`id`, `name`, `username`, `password`, `createdAt`) VALUES
('72b0ef664913855641986101291592a9', 'caca', 'caca', '$2y$10$tBkkFOCBA9ogVn8n6IFqVOGU1qfKypCqU5WGP1cJk8PNifowWnmWa', '2019-09-01 10:25:13'),
('c1a193afba5bba62ae367f2cc01b075e', 'dika', 'wilda', '$2y$10$CQJz5IcFyG4kdMS7KPuACOiAVNNTePYyMSCV1IxQfV7l2XzvSSuOu', '2019-09-17 13:00:48');

-- --------------------------------------------------------

--
-- Table structure for table `users_santri`
--

CREATE TABLE `users_santri` (
  `id` varchar(255) NOT NULL DEFAULT '',
  `name` varchar(255) NOT NULL DEFAULT '',
  `username` varchar(255) NOT NULL DEFAULT '',
  `password` varchar(255) NOT NULL DEFAULT '',
  `active` tinyint(1) NOT NULL DEFAULT 1,
  `createdAt` datetime DEFAULT current_timestamp(),
  `kamar` varchar(3) NOT NULL DEFAULT '',
  `idWali` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users_santri`
--

INSERT INTO `users_santri` (`id`, `name`, `username`, `password`, `active`, `createdAt`, `kamar`, `idWali`) VALUES
('S7c774a110fa09030433d0cabc962427b', 'Akikazu', 'akikazu', '$2y$10$rKYeqWcfOth/HPQSrxnqa.IakJZ6md7rVdqJFpV1Pvn1NJSlVWHYq', 1, '2019-09-01 09:56:04', 'A1', 'W8af66e34971b6e4a95abe038097117b6');

-- --------------------------------------------------------

--
-- Table structure for table `users_security`
--

CREATE TABLE `users_security` (
  `id` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `createdAt` datetime NOT NULL DEFAULT current_timestamp(),
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users_security`
--

INSERT INTO `users_security` (`id`, `username`, `password`, `createdAt`, `name`) VALUES
('6480f686bbe6dad0795d729c7d666d8b', 'andika', '$2y$10$DqrDtT1lGX.Qx3VrxNex8OdRUiqzMYLhlwALKcwLerPW74CDYXVdG', '2019-09-17 12:56:07', 'wilda'),
('72b0ef664913855641986101291592a9', 'caca', '$2y$10$tBkkFOCBA9ogVn8n6IFqVOGU1qfKypCqU5WGP1cJk8PNifowWnmWa', '2019-09-01 10:25:13', 'caca');

-- --------------------------------------------------------

--
-- Table structure for table `users_wali`
--

CREATE TABLE `users_wali` (
  `id` varchar(255) NOT NULL DEFAULT '',
  `name` varchar(255) NOT NULL DEFAULT '',
  `username` varchar(255) NOT NULL DEFAULT '',
  `password` varchar(255) NOT NULL DEFAULT '',
  `createdAt` datetime DEFAULT current_timestamp(),
  `idSantri` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users_wali`
--

INSERT INTO `users_wali` (`id`, `name`, `username`, `password`, `createdAt`, `idSantri`) VALUES
('11', 'Sunarto', '085546468500', '$2y$10$C0SrPtGdFGCb/43vKpoIj.wWYyOrAqI19Ykhn3JvUAzj8G1G43rDK', '2019-08-31 08:41:02', '01'),
('W8af66e34971b6e4a95abe038097117b6', 'asd', '0812', '$2y$10$AsMMvSb0WRLxPNnByPqNcunD45R1Df/5Q/Vfn9FCwPJU//ND8AjsS', '2019-09-03 09:32:12', 'S7c774a110fa09030433d0cabc962427b'),
('W9934f1c25c3ba3a735d41b0c46bb85c6', 'dika', '099', '$2y$10$2OAlc4.vb4hrR.FUmQ5fcePtD5hdkPROQI9EItpcKXEnbxjKf7vwy', '2019-09-17 12:12:48', 'S7a6ddf32511fb5782e688fea28012974');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kamar`
--
ALTER TABLE `kamar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pelanggaran`
--
ALTER TABLE `pelanggaran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `santri_kamar`
--
ALTER TABLE `santri_kamar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_admin`
--
ALTER TABLE `users_admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `users_chairman`
--
ALTER TABLE `users_chairman`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `users_pengasuh`
--
ALTER TABLE `users_pengasuh`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `users_santri`
--
ALTER TABLE `users_santri`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `users_security`
--
ALTER TABLE `users_security`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_wali`
--
ALTER TABLE `users_wali`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
