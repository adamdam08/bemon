-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 04, 2019 at 04:49 AM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bemon`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `nama` varchar(40) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `no_ktp` varchar(16) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `image` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `nama`, `tgl_lahir`, `no_ktp`, `no_hp`, `jenis_kelamin`, `image`) VALUES
(3, 'adam rachmawan', '1999-02-27', '3503112511000003', '085815368963', 'L', '');

-- --------------------------------------------------------

--
-- Table structure for table `admin_acc`
--

CREATE TABLE `admin_acc` (
  `id_admin` int(12) NOT NULL,
  `email` varchar(34) NOT NULL,
  `password` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_acc`
--

INSERT INTO `admin_acc` (`id_admin`, `email`, `password`) VALUES
(3, 'adamrahmawan110@gmail.com', '9a16d5b9004780f875df4f013202cecd');

-- --------------------------------------------------------

--
-- Table structure for table `berkala`
--

CREATE TABLE `berkala` (
  `id_berkala` int(11) NOT NULL,
  `tipe_berkala` varchar(32) NOT NULL,
  `harga` int(32) NOT NULL,
  `keterangan` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `berkala`
--

INSERT INTO `berkala` (`id_berkala`, `tipe_berkala`, `harga`, `keterangan`) VALUES
(1, '10000KM', 78000, 'ganti oli'),
(2, '20000KM', 120000, 'ganti oli,ganti busi'),
(3, '30000KM', 80000, 'ganti oli,cek filter'),
(4, '40000KM', 210000, 'ganti oli,ganti busi,cek filter oli');

-- --------------------------------------------------------

--
-- Table structure for table `cleaning`
--

CREATE TABLE `cleaning` (
  `id_cleaning` int(10) NOT NULL,
  `nama_cleaning` varchar(32) NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cleaning`
--

INSERT INTO `cleaning` (`id_cleaning`, `nama_cleaning`, `harga`) VALUES
(1, 'cuci biasa', 10000),
(2, 'detailing', 300000);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id_customer` int(11) NOT NULL,
  `nama` varchar(40) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `saldo` int(32) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id_customer`, `nama`, `no_hp`, `saldo`) VALUES
(1, 'adam rahmawanzx', '6281249863296', 9100000);

-- --------------------------------------------------------

--
-- Table structure for table `customer_acc`
--

CREATE TABLE `customer_acc` (
  `id_customer` int(11) NOT NULL,
  `email` varchar(34) NOT NULL,
  `password` varchar(32) NOT NULL,
  `verifikasi` varchar(32) NOT NULL DEFAULT 'belum'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer_acc`
--

INSERT INTO `customer_acc` (`id_customer`, `email`, `password`, `verifikasi`) VALUES
(1, 'adamrahmawan9320@gmail.com', '58fdc71a23e68e4cf2ea18fdef4497ef', 'sudah');

-- --------------------------------------------------------

--
-- Table structure for table `emergency`
--

CREATE TABLE `emergency` (
  `id_emergency` int(11) NOT NULL,
  `nama_darurat` varchar(32) NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `emergency`
--

INSERT INTO `emergency` (`id_emergency`, `nama_darurat`, `harga`) VALUES
(1, 'Angkut sepeda motor', 50000),
(2, 'Motor mogok', 35000),
(3, 'Ban bocor', 45000);

-- --------------------------------------------------------

--
-- Table structure for table `konsultasi`
--

CREATE TABLE `konsultasi` (
  `id_konsultasi` int(10) NOT NULL,
  `tipe_masalah` varchar(32) NOT NULL,
  `harga` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `konsultasi`
--

INSERT INTO `konsultasi` (`id_konsultasi`, `tipe_masalah`, `harga`) VALUES
(1, 'Motor tidak bisa hidup', 25000),
(2, 'Mesin bekerja tidak normal', 15000),
(3, 'Mesin susah hidup', 15000),
(4, 'Rem tidak pakem', 15000);

-- --------------------------------------------------------

--
-- Table structure for table `montir`
--

CREATE TABLE `montir` (
  `id_montir` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `no_ktp` varchar(32) NOT NULL,
  `no_sim` varchar(32) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `rating` float DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `montir`
--

INSERT INTO `montir` (`id_montir`, `nama`, `tgl_lahir`, `jenis_kelamin`, `no_ktp`, `no_sim`, `no_hp`, `rating`) VALUES
(1, 'adam achmat', '2019-03-03', 'L', '000003511111111001', '000003511111111001', '6285815368964', 100);

-- --------------------------------------------------------

--
-- Table structure for table `montir_acc`
--

CREATE TABLE `montir_acc` (
  `id_montir` int(10) NOT NULL,
  `email` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `montir_acc`
--

INSERT INTO `montir_acc` (`id_montir`, `email`, `password`) VALUES
(1, 'adamrahmawan120@gmail.com', '9a16d5b9004780f875df4f013202cecd');

-- --------------------------------------------------------

--
-- Table structure for table `order_cleaning`
--

CREATE TABLE `order_cleaning` (
  `id_order` int(32) NOT NULL,
  `id_user` int(32) NOT NULL,
  `id_layanan` int(32) NOT NULL,
  `id_kendaraan` varchar(32) NOT NULL,
  `status` varchar(32) NOT NULL,
  `biaya` int(32) NOT NULL,
  `id_montir` int(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_cleaning`
--

INSERT INTO `order_cleaning` (`id_order`, `id_user`, `id_layanan`, `id_kendaraan`, `status`, `biaya`, `id_montir`) VALUES
(1, 1, 1, '5', 'Mencari montir', 10000, 0);

-- --------------------------------------------------------

--
-- Table structure for table `order_emergency`
--

CREATE TABLE `order_emergency` (
  `id_order` int(32) NOT NULL,
  `id_user` int(32) NOT NULL,
  `id_layanan` int(32) NOT NULL,
  `id_kendaraan` varchar(32) NOT NULL,
  `status` varchar(32) NOT NULL,
  `biaya` int(32) NOT NULL,
  `id_montir` int(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_emergency`
--

INSERT INTO `order_emergency` (`id_order`, `id_user`, `id_layanan`, `id_kendaraan`, `status`, `biaya`, `id_montir`) VALUES
(5, 1, 3, '3', 'Pekerjaan Selesai', 45000, 1),
(7, 1, 2, '3', 'Pekerjaan Dimulai', 35000, 1);

-- --------------------------------------------------------

--
-- Table structure for table `order_konsultasi`
--

CREATE TABLE `order_konsultasi` (
  `id_order` int(32) NOT NULL,
  `id_user` int(32) NOT NULL,
  `id_layanan` int(32) NOT NULL,
  `id_kendaraan` int(32) NOT NULL,
  `status` varchar(32) NOT NULL,
  `biaya` int(32) NOT NULL,
  `keluhan` varchar(256) NOT NULL,
  `id_montir` int(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_konsultasi`
--

INSERT INTO `order_konsultasi` (`id_order`, `id_user`, `id_layanan`, `id_kendaraan`, `status`, `biaya`, `keluhan`, `id_montir`) VALUES
(3, 1, 4, 4, 'Pekerjaan Selesai', 15000, 'fdas', 1),
(4, 1, 4, 5, 'Mencari montir', 15000, 'a', 0);

-- --------------------------------------------------------

--
-- Table structure for table `order_servis_berkala`
--

CREATE TABLE `order_servis_berkala` (
  `id_order` int(32) NOT NULL,
  `id_user` int(32) NOT NULL,
  `id_layanan` int(32) NOT NULL,
  `tipe_kendaraan` varchar(32) NOT NULL,
  `status` varchar(32) NOT NULL,
  `biaya` int(32) NOT NULL,
  `id_montir` int(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_servis_berkala`
--

INSERT INTO `order_servis_berkala` (`id_order`, `id_user`, `id_layanan`, `tipe_kendaraan`, `status`, `biaya`, `id_montir`) VALUES
(1, 1, 2, '7', 'Mencari montir', 120000, 0);

-- --------------------------------------------------------

--
-- Table structure for table `order_servis_umum`
--

CREATE TABLE `order_servis_umum` (
  `id_order` int(32) NOT NULL,
  `id_user` int(32) NOT NULL,
  `id_layanan` int(32) NOT NULL,
  `id_kendaraan` varchar(32) NOT NULL,
  `status` varchar(32) NOT NULL,
  `biaya` int(32) NOT NULL,
  `id_montir` int(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_servis_umum`
--

INSERT INTO `order_servis_umum` (`id_order`, `id_user`, `id_layanan`, `id_kendaraan`, `status`, `biaya`, `id_montir`) VALUES
(1, 1, 1, '21', 'Mencari montir', 45000, 0);

-- --------------------------------------------------------

--
-- Table structure for table `order_spare_part`
--

CREATE TABLE `order_spare_part` (
  `id_order` int(32) NOT NULL,
  `id_user` int(32) NOT NULL,
  `id_sparepart` int(32) NOT NULL,
  `layanan` varchar(32) NOT NULL,
  `status` varchar(32) NOT NULL,
  `biaya` int(32) NOT NULL,
  `id_montir` int(32) NOT NULL,
  `id_layanan` int(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran_saldo`
--

CREATE TABLE `pembayaran_saldo` (
  `id_pembayaran` int(10) NOT NULL,
  `id_saldo` int(10) NOT NULL,
  `gambar` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembayaran_saldo`
--

INSERT INTO `pembayaran_saldo` (`id_pembayaran`, `id_saldo`, `gambar`) VALUES
(5, 3, '55fc74b11ee7cb7b59e24ab99df006ad_t.jpg'),
(6, 4, 'E46.jpeg'),
(8, 5, '03ae130fb02f517c27b9dc26397c4809_t.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `penilaian`
--

CREATE TABLE `penilaian` (
  `id_order` int(32) NOT NULL,
  `id_user` int(32) NOT NULL,
  `id_montir` int(32) NOT NULL,
  `saran` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `saldo`
--

CREATE TABLE `saldo` (
  `id_saldo` int(10) NOT NULL,
  `id_customer` int(32) NOT NULL,
  `nominal` int(10) NOT NULL,
  `status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `saldo`
--

INSERT INTO `saldo` (`id_saldo`, `id_customer`, `nominal`, `status`) VALUES
(3, 1, 1000000, 'Lunas'),
(4, 1, 5000000, 'Lunas'),
(5, 1, 100000, 'Lunas');

-- --------------------------------------------------------

--
-- Table structure for table `sparepart`
--

CREATE TABLE `sparepart` (
  `id_sparepart` varchar(10) NOT NULL,
  `nama_sparepart` varchar(150) NOT NULL,
  `jenis_sparepart` varchar(50) NOT NULL,
  `harga_sparepart` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sparepart`
--

INSERT INTO `sparepart` (`id_sparepart`, `nama_sparepart`, `jenis_sparepart`, `harga_sparepart`) VALUES
('101', 'CORSA ECOMAX H01 90/90-14 TUBETYPE', 'BAN HONDA', 139000),
('102', 'CORSA PLANETO XE-30 80/90-14 (F)', 'BAN HONDA', 167000),
('103', 'CORSA PLANETO XE-30 70/90-14 (R)', 'BAN HONDA', 142000),
('104', 'CORSA ECOMAX H01 80/90-14 TUBETYPE', 'BAN HONDA', 112000),
('105', 'CORSA ECOMAX H01 70/90-14 TUBETYPE', 'BAN HONDA', 89000),
('106', 'CORSA PLANETO SE-30 90/90-14 (F/R)', 'BAN HONDA', 160000),
('107', 'CORSA PLANETO SE-30 80/90-14 (F/R)', 'BAN HONDA', 133000),
('108', 'CORSA PLANETO SE-30 70/90-14 (F/R)', 'BAN HONDA', 111000),
('109', 'CORSA TL FREAK 110/80-14', 'BAN HONDA', 249000),
('110', 'CORSA FREAK 100/80-14', 'BAN HONDA', 219000),
('111', 'CORSA FREAK 90/80-14', 'BAN HONDA', 188000),
('112', 'CORSA B-TRACK 80/80-14', 'BAN HONDA', 145000),
('113', 'Corsa B-TRACK 100/80-14', 'BAN HONDA', 222000),
('114', 'Corsa B-TRACK 90/80-14', 'BAN HONDA', 195000),
('115', 'CORSA PLANETO SE-30 TUBETYPE R14', 'BAN HONDA', 111000),
('116', 'CORSA FREAK', 'BAN HONDA', 188000),
('117', 'CORSA ECOMAX H01 TUBETYPE R14', 'BAN HONDA', 89000),
('118', 'CORSA ECOMAX H01 TUBLESS R14', 'BAN HONDA', 109000),
('119', 'CORSA PLANETO XE-30 R14', 'BAN HONDA', 142000),
('120', 'CORSA B-TRACK RING 14', 'BAN HONDA', 145000),
('121', 'ASPIRA PREMIO SPORTIVO R12', 'BAN HONDA', 225000),
('122', 'CORSA B-TRACK 80/80-14', 'BAN HONDA', 139000),
('123', 'PIRELLI ANGEL SCOOTER R14', 'BAN HONDA', 430000),
('125', 'FDR MP-27 90/80-17', 'BAN HONDA', 364000),
('126', 'FDR MP-57 90/80-17', 'BAN HONDA', 364000),
('127', 'FDR MP-96 90/80-17', 'BAN HONDA', 374000),
('128', 'CORSA TT ECOMAX H02 70/90-17', 'BAN HONDA', 113000),
('129', 'CORSA TT ECOMAX H02 80/90-17', 'BAN HONDA', 142000),
('130', 'CORSA ECOMAX H02 TUBETYPE R17', 'BAN HONDA', 113000),
('131', 'CORSA PLANETO SE-30 R17', 'BAN HONDA', 129000),
('132', 'IRC REBORN NR87', 'BAN HONDA', 167000),
('133', 'MICHELIN PILOT ROAD 4 160/60 R17', 'BAN HONDA', 2041000),
('134', 'MICHELIN PILOT ROAD 4 150/70-17', 'BAN HONDA', 1995000),
('135', 'MICHELIN PILOT ROAD 4 120/70-17', 'BAN HONDA', 1586000),
('136', 'MICHELIN PILOT ROAD 4 120/60-17', 'BAN HONDA', 1539000),
('137', 'MICHELIN PILOT POWER 3 RAD 160/60 R17', 'BAN HONDA', 1937000),
('138', 'MICHELIN PILOT POWER 3 120/60 R17', 'BAN HONDA', 1539000),
('139', 'MICHELIN PILOT STREET RAD 160/60-17', 'BAN HONDA', 1298000),
('140', 'MICHELIN PILOT STREET RAD 150/60-17', 'BAN HONDA', 1226000),
('141', 'CORSA ECOMAX H01 90/90-14 TUBETYPE', 'BAN YAMAHA', 139000),
('142', 'CORSA ECOMAX H01 70/90-14 TUBETYPE', 'BAN YAMAHA', 89000),
('143', 'CORSA PLANETO XE-30 70/90-14 (R)', 'BAN YAMAHA', 142000),
('144', 'CORSA PLANETO XE-30 80/90-14 (F)', 'BAN YAMAHA', 167000),
('145', 'CORSA PLANETO SE-30 90/90-14 (F/R)', 'BAN YAMAHA', 160000),
('146', 'CORSA PLANETO SE-30 80/90-14 (F/R)', 'BAN YAMAHA', 133000),
('147', 'CORSA PLANETO SE-30 70/90-14 (F/R)', 'BAN YAMAHA', 111000),
('148', 'CORSA TL FREAK 110/80-14', 'BAN YAMAHA', 249000),
('149', 'CORSA FREAK 100/80-14', 'BAN YAMAHA', 219000),
('150', 'CORSA FREAK 90/80-14', 'BAN YAMAHA', 188000),
('151', 'FDR MP-27 90/80-17', 'BAN YAMAHA', 364000),
('152', 'FDR MP-57 90/80-17', 'BAN YAMAHA', 364000),
('153', 'FDR MP-96 90/80-17', 'BAN YAMAHA', 374000),
('154', 'CORSA TT ECOMAX H02 70/90-17', 'BAN YAMAHA', 113000),
('155', 'CORSA TT ECOMAX H02 80/90-17', 'BAN YAMAHA', 142000),
('156', 'CORSA ECOMAX H02 TUBETYPE R17', 'BAN YAMAHA', 113000),
('157', 'CORSA PLANETO SE-30 R17', 'BAN YAMAHA', 129000),
('158', 'IRC REBORN NR87', 'BAN YAMAHA', 167000),
('159', 'IRC EXATO NR88', 'BAN YAMAHA', 250000),
('160', 'CORSA PLANETO XE-30 R17', 'BAN YAMAHA', 163000),
('161', 'MICHELIN PILOT ROAD 4 160/60 R17', 'BAN YAMAHA', 2041000),
('162', 'CORSA TT ECOMAX H02 80/90-17', 'BAN YAMAHA', 142000),
('163', 'CORSA TT ECOMAX H02 70/90-17', 'BAN YAMAHA', 113000),
('164', 'MICHELIN PILOT ROAD 4 150/70-17', 'BAN YAMAHA', 1995000),
('165', 'MICHELIN PILOT ROAD 4 120/70-17', 'BAN YAMAHA', 1586000),
('166', 'SWALLOW TERRA CROSS (SB-114) R16', 'BAN YAMAHA', 430000),
('167', 'CORSA MT CROSS X R16', 'BAN YAMAHA', 395000),
('168', 'CORSA MT CROSS X R19', 'BAN YAMAHA', 375000),
('169', 'CORSA MT CROSS X R18', 'BAN YAMAHA', 503000),
('170', 'CORSA ECOMAX H01 90/90-14 TUBETYPE', 'BAN SUZUKI', 139000),
('171', 'CORSA PLANETO XE-30 80/90-14 (F)', 'BAN SUZUKI', 167000),
('172', 'CORSA PLANETO XE-30 70/90-14 (R)', 'BAN SUZUKI', 142000),
('173', 'CORSA ECOMAX H01 80/90-14 TUBETYPE', 'BAN SUZUKI', 112000),
('174', 'CORSA ECOMAX H01 70/90-14 TUBETYPE', 'BAN SUZUKI', 89000),
('175', 'CORSA PLANETO SE-30 90/90-14 (F/R)', 'BAN SUZUKI', 160000),
('176', 'CORSA PLANETO SE-30 80/90-14 (F/R)', 'BAN SUZUKI', 133000),
('177', 'CORSA PLANETO SE-30 70/90-14 (F/R)', 'BAN SUZUKI', 111000),
('178', 'CORSA TL FREAK 110/80-14', 'BAN SUZUKI', 249000),
('179', 'CORSA FREAK 100/80-14', 'BAN SUZUKI', 219000),
('180', 'CORSA FREAK 90/80-14', 'BAN SUZUKI', 188000),
('181', 'FDR MP-27 90/80-17', 'BAN SUZUKI', 364000),
('182', 'FDR MP-57 90/80-17', 'BAN SUZUKI', 364000),
('183', 'FDR MP-96 90/80-17', 'BAN SUZUKI', 374000),
('184', 'CORSA TT ECOMAX H02 70/90-17', 'BAN SUZUKI', 113000),
('185', 'CORSA MT CROSS X R19 ', 'BAN SUZUKI', 375000),
('186', 'MICHELIN PILOT ROAD 4 150/70-17', 'BAN SUZUKI', 1995000),
('187', 'MICHELIN PILOT ROAD 4 160/60 R17', 'BAN SUZUKI', 2041000),
('188', 'MICHELIN PILOT ROAD 4 120/70-17', 'BAN SUZUKI', 1586000),
('189', 'MICHELIN PILOT ROAD 4 120/60-17', 'BAN SUZUKI', 1539000),
('190', 'MICHELIN PILOT POWER 3 RAD 160/60 R17', 'BAN SUZUKI', 1927000),
('191', 'FDR MP-27 90/80-17 ', 'BAN KAWASAKI', 364000),
('192', 'FDR MP-57 90/80-17  ', 'BAN KAWASAKI', 364000),
('193', 'FDR MP-96 90/80-17  ', 'BAN KAWASAKI', 374000),
('194', 'CORSA TT ECOMAX H02 70/90-17  ', 'BAN KAWASAKI', 113000),
('195', 'CORSA TT ECOMAX H02 80/90-17  ', 'BAN KAWASAKI', 142000),
('196', 'CORSA ECOMAX H02 TUBETYPE R17  ', 'BAN KAWASAKI', 113000),
('197', 'CORSA PLANETO SE-30 R17 ', 'BAN KAWASAKI', 129000),
('198', 'IRC REBORN NR87  ', 'BAN KAWASAKI', 167000),
('199', 'IRC EXATO NR88 ', 'BAN KAWASAKI', 250000),
('200', 'CORSA PLANETO XE-30 R17', 'BAN KAWASAKI', 163000),
('201', 'MICHELIN PILOT ROAD 4 120/60-17  ', 'BAN KAWASAKI', 1539000),
('202', 'MICHELIN PILOT ROAD 4 150/70-17', 'BAN KAWASAKI', 1995000),
('203', 'MICHELIN PILOT ROAD 4 120/70-17', 'BAN KAWASAKI', 1586000),
('204', 'MICHELIN PILOT POWER 3 RAD 160/60 R17', 'BAN KAWASAKI', 1927000),
('205', 'MICHELIN PILOT POWER 3 120/60 R17  ', 'BAN KAWASAKI', 1539000),
('206', 'SWALLOW TERRA CROSS (SB-114) R16', 'BAN KAWASAKI', 430000),
('207', 'CORSA MT CROSS X R16', 'BAN KAWASAKI', 395000),
('208', 'CORSA MT CROSS X R19', 'BAN KAWASAKI', 375000),
('209', 'CORSA MT CROSS X R18', 'BAN KAWASAKI', 503000),
('210', 'X-TEN MATIC SAE 10W40 800ml', 'OLI MOTOR MATIC', 42000),
('211', 'X-TEN SUPER MATIC SAE 10W40 1000ml', 'OLI MOTOR MATIC', 55000),
('212', 'X-TEN MATIC SAE 10W30 800ml', 'OLI MOTOR MATIC', 42000),
('213', 'X-TEN SPORT SAE 10W40 1000ml ', 'OLI MOTOR SPORT', 52000),
('214', 'X-TEN PREMIUM SPORT SAE 5W30 1000ml  ', 'OLI MOTOR SPORT', 65000),
('215', 'X-TEN BEBEK SAE 10W40 800ml', 'OLI MOTOR BEBEK', 42000),
('216', 'ACCU BOSCH M8 GEL RBTZ-5 3.5 AH  ', 'AKI', 245000),
('217', 'X-POWER ACCU XTZ5S-BS ', 'AKI', 160000),
('218', '12N10-3BM', 'AKI', 179000),
('219', 'YTX9-BS', 'AKI', 461000),
('220', 'YB3L-B', 'AKI', 96000),
('221', 'GM3-3A', 'AKI', 99000),
('222', 'GM5Z-3B', 'AKI', 121000),
('225', 'ASPIRA BRAKESHOE', 'KAMPAS REM', 40000),
('227', 'X-Guard Cairan Anti Bocor 500ML ', 'ANTI BOCOR', 41000),
('228', 'OSRAM HS1 64185CB PX43T Lampu Motor', 'LAMPU ', 35000),
('237', 'Osram LED Bohlam Lampu Utama Motor - Putih ', 'LAMPU ', 57900),
('238', 'SSS Paket Gir Motor', 'GEAR', 235000),
('241', 'AHM 06401-KYZ-900 Honda Genuine Parts Gear', 'GEAR', 335000),
('243', 'TK TK9 00782 44T-428 Gir', 'GEAR', 175000),
('247', 'Aspira Astra Drive Chain ', 'GEAR', 139000);

-- --------------------------------------------------------

--
-- Table structure for table `tipe_kendaraan`
--

CREATE TABLE `tipe_kendaraan` (
  `id_kendaraan` int(32) NOT NULL,
  `nama_kendaraan` varchar(30) NOT NULL,
  `cc` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tipe_kendaraan`
--

INSERT INTO `tipe_kendaraan` (`id_kendaraan`, `nama_kendaraan`, `cc`) VALUES
(1, 'Honda Beat', 110),
(2, 'Honda CB 150R', 150),
(3, 'Honda CBR', 150),
(4, 'Honda CBR 250', 250),
(5, 'Honda Revo', 100),
(6, 'Honda Vario', 125),
(7, 'Kawasaki Bajaj Pulsar', 150),
(8, 'Kawasaki D-Tracker', 250),
(9, 'Kawasaki Klx 150', 150),
(10, 'Kawasaki Klx 250', 250),
(11, 'Kawasaki Ninja Fi', 250),
(12, 'Kawasaki Ninja Mono R', 250),
(13, 'Kawasaki Ninja R', 150),
(14, 'Kawasaki Ninja RR', 150),
(15, 'Suzuki Address', 125),
(16, 'Suzuki GSX 150 Bandit', 150),
(17, 'Suzuki GSX-R150. ', 150),
(18, 'Suzuki New Smash FI', 125),
(19, 'Suzuki NEX II', 115),
(20, 'Suzuki Satria F150', 150),
(21, 'Yamaha Mio', 125),
(22, 'Yamaha N-max', 150),
(23, 'Yamaha R15', 150),
(24, 'Yamaha R25', 250),
(25, 'Yamaha Scorpion', 225),
(26, 'Yamaha Vixion', 150);

-- --------------------------------------------------------

--
-- Table structure for table `umum`
--

CREATE TABLE `umum` (
  `id_umum` int(11) NOT NULL,
  `tipe_umum` varchar(32) NOT NULL,
  `harga` int(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `umum`
--

INSERT INTO `umum` (`id_umum`, `tipe_umum`, `harga`) VALUES
(1, 'servis mesin', 45000),
(2, 'servis kelistrikan', 80000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `admin_acc`
--
ALTER TABLE `admin_acc`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `berkala`
--
ALTER TABLE `berkala`
  ADD PRIMARY KEY (`id_berkala`);

--
-- Indexes for table `cleaning`
--
ALTER TABLE `cleaning`
  ADD PRIMARY KEY (`id_cleaning`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id_customer`);

--
-- Indexes for table `customer_acc`
--
ALTER TABLE `customer_acc`
  ADD PRIMARY KEY (`id_customer`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `emergency`
--
ALTER TABLE `emergency`
  ADD PRIMARY KEY (`id_emergency`);

--
-- Indexes for table `konsultasi`
--
ALTER TABLE `konsultasi`
  ADD PRIMARY KEY (`id_konsultasi`);

--
-- Indexes for table `montir`
--
ALTER TABLE `montir`
  ADD PRIMARY KEY (`id_montir`);

--
-- Indexes for table `montir_acc`
--
ALTER TABLE `montir_acc`
  ADD PRIMARY KEY (`id_montir`);

--
-- Indexes for table `order_cleaning`
--
ALTER TABLE `order_cleaning`
  ADD PRIMARY KEY (`id_order`);

--
-- Indexes for table `order_emergency`
--
ALTER TABLE `order_emergency`
  ADD PRIMARY KEY (`id_order`);

--
-- Indexes for table `order_konsultasi`
--
ALTER TABLE `order_konsultasi`
  ADD PRIMARY KEY (`id_order`);

--
-- Indexes for table `order_servis_berkala`
--
ALTER TABLE `order_servis_berkala`
  ADD PRIMARY KEY (`id_order`);

--
-- Indexes for table `order_servis_umum`
--
ALTER TABLE `order_servis_umum`
  ADD PRIMARY KEY (`id_order`);

--
-- Indexes for table `order_spare_part`
--
ALTER TABLE `order_spare_part`
  ADD PRIMARY KEY (`id_order`);

--
-- Indexes for table `pembayaran_saldo`
--
ALTER TABLE `pembayaran_saldo`
  ADD PRIMARY KEY (`id_pembayaran`);

--
-- Indexes for table `saldo`
--
ALTER TABLE `saldo`
  ADD PRIMARY KEY (`id_saldo`);

--
-- Indexes for table `sparepart`
--
ALTER TABLE `sparepart`
  ADD PRIMARY KEY (`id_sparepart`);

--
-- Indexes for table `tipe_kendaraan`
--
ALTER TABLE `tipe_kendaraan`
  ADD PRIMARY KEY (`id_kendaraan`);

--
-- Indexes for table `umum`
--
ALTER TABLE `umum`
  ADD PRIMARY KEY (`id_umum`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `admin_acc`
--
ALTER TABLE `admin_acc`
  MODIFY `id_admin` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `berkala`
--
ALTER TABLE `berkala`
  MODIFY `id_berkala` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `cleaning`
--
ALTER TABLE `cleaning`
  MODIFY `id_cleaning` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id_customer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `customer_acc`
--
ALTER TABLE `customer_acc`
  MODIFY `id_customer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `emergency`
--
ALTER TABLE `emergency`
  MODIFY `id_emergency` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `konsultasi`
--
ALTER TABLE `konsultasi`
  MODIFY `id_konsultasi` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `montir`
--
ALTER TABLE `montir`
  MODIFY `id_montir` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `montir_acc`
--
ALTER TABLE `montir_acc`
  MODIFY `id_montir` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `order_cleaning`
--
ALTER TABLE `order_cleaning`
  MODIFY `id_order` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `order_emergency`
--
ALTER TABLE `order_emergency`
  MODIFY `id_order` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `order_konsultasi`
--
ALTER TABLE `order_konsultasi`
  MODIFY `id_order` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `order_servis_berkala`
--
ALTER TABLE `order_servis_berkala`
  MODIFY `id_order` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `order_servis_umum`
--
ALTER TABLE `order_servis_umum`
  MODIFY `id_order` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `order_spare_part`
--
ALTER TABLE `order_spare_part`
  MODIFY `id_order` int(32) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pembayaran_saldo`
--
ALTER TABLE `pembayaran_saldo`
  MODIFY `id_pembayaran` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `saldo`
--
ALTER TABLE `saldo`
  MODIFY `id_saldo` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tipe_kendaraan`
--
ALTER TABLE `tipe_kendaraan`
  MODIFY `id_kendaraan` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `umum`
--
ALTER TABLE `umum`
  MODIFY `id_umum` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
