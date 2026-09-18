-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 08, 2026 at 12:53 PM
-- Server version: 8.0.30
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_metrologi`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_jenis_tera`
--

CREATE TABLE `tb_jenis_tera` (
  `id_jenis` int NOT NULL,
  `kategori_id` int NOT NULL,
  `nama_jenis` varchar(200) NOT NULL,
  `desk_jenis` text NOT NULL,
  `satuan_jenis` varchar(20) NOT NULL,
  `jt_tarif_kantor` int NOT NULL,
  `jt_tarif_tpakai` int NOT NULL,
  `jtu_kantor` int NOT NULL,
  `jtu_tpakai` int NOT NULL,
  `gambar` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Dumping data for table `tb_jenis_tera`
--

INSERT INTO `tb_jenis_tera` (`id_jenis`, `kategori_id`, `nama_jenis`, `desk_jenis`, `satuan_jenis`, `jt_tarif_kantor`, `jt_tarif_tpakai`, `jtu_kantor`, `jtu_tpakai`, `gambar`) VALUES
(1, 1, 'Kapasitas sampai dengan 1  m', '', 'buah', 3000, 13000, 4000, 14000, ''),
(2, 1, 'Lebih dari 1 m sampai dengan 2 m', '', 'buah', 15000, 25000, 20000, 25000, ''),
(3, 1, 'Lebih dari 2 m sampai dengan 10 m', '', 'buah', 20000, 30000, 25000, 30000, ''),
(4, 1, 'Lebih dari 10 m sampai dengan 20 m', '', 'buah', 30000, 40000, 30000, 35000, ''),
(5, 1, 'Lebih dari 20 m sampai dengan 30 m', '', 'buah', 35000, 45000, 35000, 40000, ''),
(6, 1, 'Lebih dari 30 m sampai dengan 40 m', '', 'buah', 40000, 50000, 40000, 45000, ''),
(7, 1, 'Lebih dari 40 m sampai dengan 50 m', '', 'buah', 45000, 55000, 45000, 50000, ''),
(8, 1, 'Lebih dari 50 m', '', 'buah', 50000, 60000, 50000, 55000, ''),
(9, 1, 'Ukuran panjang jenis :', '', '', 0, 0, 0, 0, ''),
(10, 1, '        1.     Alat Ukur tinggi orang', '', 'buah', 10000, 30000, 10000, 30000, ''),
(11, 1, '        2.    Counter Meter', '', 'buah', 15000, 35000, 15000, 35000, ''),
(12, 2, 'Mekanik', '', 'buah', 150000, 400000, 150000, 400000, ''),
(13, 2, 'Elektronik', '', 'buah', 200000, 500000, 200000, 500000, ''),
(14, 3, 'Kapasitas sampai dengan 2 L', '', 'buah', 500, 11500, 500, 11500, ''),
(15, 3, 'Lebih dari 2 L sampai dengan 25 L', '', 'buah', 1000, 12000, 1000, 12000, ''),
(16, 3, 'Lebih dari 25 L', '', 'buah', 5000, 16000, 5000, 16000, ''),
(17, 4, 'Bentuk Silinder Tegak', '', '', 0, 0, 0, 0, ''),
(18, 4, '      1.     Kapasitas sampai 500 kl ', '', 'buah', 0, 200000, 0, 225000, ''),
(19, 4, '      2.     Lebih dari 500 kl sampai 1000 kl', '', 'buah', 0, 300000, 0, 375000, ''),
(20, 4, '      3.     Lebih dari 1000 kl sampai dengan 2000 kl', '', 'buah', 0, 450000, 0, 575000, ''),
(21, 4, '      4.     Lebih dari 2000 kl sampai dengan 5000 kl', '', 'buah', 0, 600000, 0, 675000, ''),
(22, 4, '      5.     Lebih dari 5000 kl sampai dengan 10000 kl', '', 'buah', 0, 750000, 0, 825000, ''),
(23, 4, '      6.     Lebih dari 10000 kl sampai dengan 50000 kl', '', 'buah', 0, 1500000, 0, 1500000, ''),
(24, 4, '      7.     Lebih dari 50000 kl sampai dengan 100000 kl', '', 'buah', 0, 3000000, 0, 3000000, ''),
(25, 4, '      8.     Lebih dari 100000 kl', '', 'buah', 0, 5000000, 0, 5000000, ''),
(26, 4, 'Bentuk Bola', '', '', 0, 0, 0, 0, ''),
(27, 4, '      1.     Kapasitas sampai dengan 500 kl', '', 'buah', 0, 500000, 0, 500000, ''),
(28, 4, '      2.     Lebih dari 500 kl sampai dengan 1000 kl ', '', 'buah', 0, 750000, 0, 750000, ''),
(29, 4, '      3.     Lebih dari 1000 kl sampai dengan 5000 kl', '', 'buah', 0, 2000000, 0, 2000000, ''),
(30, 4, '      4.     Lebih dari 5000 kl sampai dengan 10000 kl', '', 'buah', 0, 3500000, 0, 3500000, ''),
(31, 4, '      5.     Lebih dari 10000 kl ', '', 'buah', 0, 6500000, 0, 6500000, ''),
(32, 4, 'Bentuk Silinder Datar', '', '', 0, 0, 0, 0, ''),
(33, 4, '     1.     Kapasitas sampai dengan 10 kl ', '', 'buah', 0, 325000, 0, 325000, ''),
(34, 4, '     2.     Lebih dari 10 kl sampai dengan 15 kl', '', 'buah', 0, 400000, 0, 400000, ''),
(35, 4, '     3.     Lebih dari 15 kl sampai dengan 20 kl', '', 'buah', 0, 500000, 0, 500000, ''),
(36, 4, '     4.     Lebih dari 20 kl sampai dengan 25 kl', '', 'buah', 0, 600000, 0, 600000, ''),
(37, 4, '     5.     Lebih dari 25 kl sampai dengan 30 kl', '', 'buah', 0, 700000, 0, 700000, ''),
(38, 4, '     6.     Lebih dari  30 kl sampai dengan 40 kl', '', 'buah', 0, 800000, 0, 800000, ''),
(39, 4, '     7.     Lebih dari 40 kl', '', 'buah', 0, 1100000, 0, 1100000, ''),
(40, 5, 'Tangki Ukur Mobil', '', '', 0, 0, 0, 0, ''),
(41, 5, '     1.     Kapasitas sampai dengan 5 kl', '', 'buah', 110000, 120000, 110000, 120000, ''),
(42, 5, '     2.     Lebih dari 5 kl sampai dengan 10 kl', '', 'buah', 120000, 180000, 120000, 180000, ''),
(43, 5, '     3.     Lebih dari 10 kl sampai dengan 15 kl', '', 'buah', 250000, 260000, 250000, 260000, ''),
(44, 5, '     4.     Lebih dari 15 kl', '', 'buah', 300000, 310000, 300000, 310000, ''),
(45, 5, 'Tangki Ukur Wagon', '', '', 0, 0, 0, 0, ''),
(46, 5, '     1.     kapasitas sampai dengan 5 kl', '', 'buah', 0, 120000, 0, 120000, ''),
(47, 5, '     2.     Lebih dari 5 kl sampai dengan 10 kl ', '', 'buah', 0, 180000, 0, 180000, ''),
(48, 5, '     3.     Lebih dari 10 kl sampai dengan 15 kl', '', 'buah', 0, 260000, 0, 260000, ''),
(49, 5, '     4.     Lebih dari 15 kl', '', 'buah', 0, 310000, 0, 310000, ''),
(50, 5, 'Tangki Ukur Tongkang, Tangki Ukur Pindah, Tangki Ukur Apung dan Kapal', '', 'buah', 0, 0, 0, 0, ''),
(51, 5, '     1.     Kapasitas sampai dengan 50 kl', '', 'buah', 0, 220000, 0, 250000, ''),
(52, 5, '     2.     Lebih dari 50 kl sampai dengan 75 kl', '', 'buah', 0, 270000, 0, 300000, ''),
(53, 5, '     3.     Lebih dari 75 kl sampai dengan 100 kl', '', 'buah', 0, 310000, 0, 350000, ''),
(54, 5, '     4.     Lebih dari 100 kl sampai dengan 250 kl', '', 'buah', 0, 500000, 0, 525000, ''),
(55, 5, '     5.     Lebih dari 250 kl sampai dengan 500 kl', '', 'buah', 0, 675000, 0, 700000, ''),
(56, 5, '     6.     Lebih dari 500 kl sampai dengan 1000 kl', '', 'buah', 0, 950000, 0, 975000, ''),
(57, 5, '     7.     Lebih dari 1000 kl sampai dengan 5000 kl', '', 'buah', 0, 2250000, 0, 2400000, ''),
(58, 6, 'Labu Ukur, Pipet, Mikro Pipet Skala Tunggal', '', 'buah', 35000, 0, 35000, 0, ''),
(59, 6, 'Gelas Ukur, Buret Pipet, Mikropipet Skala Majemuk', '', 'buah', 40000, 0, 40000, 0, ''),
(60, 7, 'Kapasitas sampai dengan 50 L', '', 'buah', 75000, 150000, 75000, 150000, ''),
(61, 7, 'Lebih dari 50 L sampai dengan 200 L ', '', 'buah', 125000, 250000, 125000, 250000, ''),
(62, 7, 'Lebih dari 200 L sampai dengan  500 L', '', 'buah', 150000, 300000, 150000, 300000, ''),
(63, 7, 'Lebih dari 500 L sampai dengan 1000 L', '', 'buah', 200000, 400000, 200000, 400000, ''),
(64, 7, 'Lebih dari 1000 L sampai dengan 2000 L', '', 'buah', 300000, 500000, 300000, 500000, ''),
(65, 7, 'Lebih dari 2000 L sampai dengan 5000 L', '', 'buah', 450000, 750000, 450000, 750000, ''),
(66, 8, 'METER TAKSI', '', 'buah', 60000, 70000, 60000, 60000, ''),
(67, 9, 'Meter Induk', '', '', 0, 0, 0, 0, ''),
(68, 9, '          1.     Kapasitas sampai dengan 25 m3/h', '', 'buah', 0, 175000, 0, 175000, ''),
(69, 9, '          2.     Lebih dari  25 m3/h sampai dengan 100 m3/h', '', 'buah', 0, 575000, 0, 575000, ''),
(70, 9, '          3.     Lebih dari 100 m3/h sampai dengan 500 m3/h', '', 'buah', 0, 1950000, 0, 1950000, ''),
(71, 9, '          4.     Lebih dari 500 m3/h', '', 'buah', 0, 2600000, 0, 2600000, ''),
(72, 9, 'Meter Kerja', '', '', 0, 0, 0, 0, ''),
(73, 9, '          1.     Kapasitas sampai dengan 15 m3/h', '', 'buah', 100000, 125000, 100000, 125000, ''),
(74, 9, '          2.     Lebih dari 15 m3/h sampai dengan 100 m3/h', '', 'buah', 350000, 400000, 350000, 400000, ''),
(75, 9, '          3.     Lebih dari 100 m3/h sampai dengan 500 m3/h', '', 'buah', 1250000, 1350000, 1250000, 1350000, ''),
(76, 9, '          4.     Lebih dari 500 m3/h', '', 'buah', 1750000, 1850000, 1750000, 1850000, ''),
(77, 9, 'Pompa Ukur BBM', '', '', 0, 0, 0, 0, ''),
(78, 9, '          Untuk setiap pesawat', '', 'buah', 0, 150000, 0, 150000, ''),
(79, 10, ' Meter Induk', '', '', 0, 0, 0, 0, ''),
(80, 10, '          1.     Kapasitas sampai dengan 100 m3/h', '', 'buah', 0, 250000, 0, 250000, ''),
(81, 10, '          2.     Lebih dari 100 m3/h sampai dengan 500 m3/h', '', 'buah', 0, 450000, 0, 450000, ''),
(82, 10, '          3.     Lebih dari 500 m3/h sampai dengan 1000 m3/h', '', 'buah', 0, 600000, 0, 600000, ''),
(83, 10, '          4.     Lebih dari 1000 m3/h sampai dengan 2000 m3/h', '', 'buah', 0, 750000, 0, 750000, ''),
(84, 10, '          5.     Lebih dari 2000 m3/h', '', 'buah', 0, 1000000, 0, 1000000, ''),
(85, 10, 'Meter Kerja', '', '', 0, 0, 0, 0, ''),
(86, 10, '          1.     Kapasitas sampai dengan 50 m3/h', '', 'buah', 0, 150000, 0, 150000, ''),
(87, 10, '          2.     Lebih dari 50 m3/h sampai dengan 500 m3/h', '', 'buah', 0, 250000, 0, 250000, ''),
(88, 10, '          3.     Lebih dari 500 m3/h sampai dengan 1000 m3/h', '', 'buah', 0, 350000, 0, 350000, ''),
(89, 10, '          4.     Lebih dari 1000 m3/h sampai dengan 2000 m3/h', '', 'buah', 0, 450000, 0, 450000, ''),
(90, 10, '          5.     Lebih dari 2000 m3/h', '', 'buah', 0, 750000, 0, 750000, ''),
(91, 10, 'Meter Gas Orifle dan sejenisnya ( Merupakan satu sistem / unit alat ukur )', '', 'buah', 0, 300000, 0, 300000, ''),
(92, 10, 'Perlengkapan Meter Gas Orifle ( jika diuji sendiri ) setiap alat perlengkapan.', '', 'buah', 0, 75000, 0, 75000, ''),
(93, 10, 'Pompa Ukur Bahan Bakar Gas ( BBG ) Flod setiap badan ukur.', '', 'buah', 0, 150000, 0, 150000, ''),
(94, 11, 'Meter Induk', '', '', 0, 0, 0, 0, ''),
(95, 11, '          1.     Kapasitas sampai dengan 15 m3/h', '', 'buah', 100000, 120000, 150000, 175000, ''),
(96, 11, '          2.     Lebih dari 15 m3/h sampai dengan 100 m3/h', '', 'buah', 150000, 170000, 250000, 275000, ''),
(97, 11, '          3.     Lebih dari 100 m3/h', '', 'buah', 200000, 220000, 13, 375000, ''),
(98, 11, 'Meter Kerja', '', 'buah', 0, 0, 0, 0, ''),
(99, 11, '          1.     Kapasitas sampai dengan 10 m3/h', '', 'buah', 2500, 4000, 5000, 7500, ''),
(100, 11, '          2.     Lebih dari 10 m3/h sampai dengan 100 m3/h', '', 'buah', 10000, 12000, 15000, 17500, ''),
(101, 11, '          3.     Lebih dari 100 m3/h', '', 'buah', 25000, 27500, 50000, 55000, ''),
(102, 12, 'Meter Induk', '', '', 0, 0, 0, 0, ''),
(103, 12, '          1.     Kapasitas sampai dengan 15 m3/h', '', 'buah', 0, 125000, 0, 125000, ''),
(104, 12, '          2.     Lebih dari 15 m3/h sampai dengan 100 m3/h', '', 'buah', 0, 175000, 0, 175000, ''),
(105, 12, '          3.     Lebih dari 100 m3/h', '', 'buah', 0, 225000, 0, 225000, ''),
(106, 12, 'Meter Kerja', '', '', 0, 0, 0, 0, ''),
(107, 12, '          1.     Kapasitas sampai dengan 10 m3/h', '', 'buah', 0, 27500, 0, 27500, ''),
(108, 12, '          2.     Lebih dari 10 m3/h sampai dengan 100 m3/h', '', 'buah', 0, 37500, 0, 37500, ''),
(109, 12, '          3.     Lebih dari 100 m3/h', '', 'buah', 0, 75000, 0, 75000, ''),
(110, 13, 'TEKANAN / KOMPENSASI LAINYA', '', 'buah', 0, 100000, 0, 100000, ''),
(111, 14, ' Kapasitas sampai dengan 2000 L', '', 'buah', 0, 300000, 0, 300000, ''),
(112, 14, 'Lebih dari 2.000 L sampai dengan 10.000 L', '', 'buah', 0, 500000, 0, 500000, ''),
(113, 14, 'Lebih dari 10.000 L', '', 'buah', 0, 750000, 0, 750000, ''),
(114, 15, ' Kapasitas 10 kg/min', '', 'buah', 0, 150000, 0, 150000, ''),
(115, 15, 'Lebih dari 10 kg/min sampai dengan 100 kg/min', '', 'buah', 0, 350000, 0, 350000, ''),
(116, 15, 'Lebih dari 100 kg/min sampai dengan 500 kg/min', '', 'buah', 0, 950000, 0, 950000, ''),
(117, 15, 'Lebih dari 500 kg/min sampai dengan 1000 kg/min', '', 'buah', 0, 1500000, 0, 1500000, ''),
(118, 15, 'Lebih dari 1000 kg/min', '', 'buah', 0, 2250000, 0, 2250000, ''),
(119, 16, 'Untuk setiap jenis media', '', 'buah', 0, 90000, 0, 90000, ''),
(120, 17, 'Kelas 0,2 atau kurang', '', '', 0, 0, 0, 0, ''),
(121, 17, '          1.     tiga phasa', '', 'buah', 60000, 70000, 60000, 70000, ''),
(122, 17, '          2.     satu phasa', '', 'buah', 20000, 30000, 20000, 30000, ''),
(123, 17, 'Kelas 0,5 atau 1', '', 'buah', 0, 0, 0, 0, ''),
(124, 17, '          1.     tiga phasa', '', 'buah', 7500, 8500, 7500, 8500, ''),
(125, 17, '          2.     satu phasa', '', 'buah', 2500, 3500, 2500, 3500, ''),
(126, 17, 'Kelas 2', '', 'buah', 0, 0, 0, 0, ''),
(127, 17, '          1.     tiga phasa', '', 'buah', 4500, 5500, 4500, 5500, ''),
(128, 17, '          2.     satu phasa', '', 'buah', 1500, 2500, 1500, 2500, ''),
(129, 18, 'PEMBATAS ARUS LISTRIK', '', 'buah', 2000, 3000, 2000, 3000, ''),
(130, 19, 'Ketelitian Biasa ( M1 & M2 )', '', '', 0, 0, 0, 0, ''),
(131, 19, '          1.     Sampai dengan 1 kg', '', 'buah', 300, 300, 500, 1500, ''),
(132, 19, '          2.     Lebih dari 1 kg sampai dengan 5 kg', '', 'buah', 500, 500, 1000, 2000, ''),
(133, 19, '          3.     Lebih dari 5 kg sampai dengan 50 kg', '', 'buah', 1500, 1500, 2500, 3500, ''),
(134, 19, 'Ketelitian Khusus ( F2 & M2 )', '', 'buah', 0, 0, 0, 0, ''),
(135, 19, '          1.     Sampai dengan 1 kg', '', 'buah', 1000, 1000, 2000, 3000, ''),
(136, 19, '          2.     Lebih dari 1 kg sampai dengan 5 kg', '', 'buah', 1500, 1500, 2500, 3500, ''),
(137, 19, '          3.     Lebih dari 5 kg sampai dengan 50 kg', '', 'buah', 7500, 7500, 10000, 11000, ''),
(138, 19, 'Ketelitian Khusus ( F2 & F1 )', '', '', 0, 0, 0, 0, ''),
(139, 19, '          1.     Sampai dengan 1 kg', '', 'buah', 25000, 35000, 30000, 30000, ''),
(140, 19, '          2.     Lebih dari 1 kg sampai dengan 5 kg', '', 'buah', 30000, 45000, 35000, 45000, ''),
(141, 19, '          3.     Lebih dari 5 kg sampai dengan 50 kg', '', 'buah', 35000, 55000, 50000, 60000, ''),
(142, 20, 'Neraca', '', 'buah', 11000, 31000, 20000, 40000, ''),
(143, 20, 'Dacin', '', '', 0, 0, 0, 0, ''),
(144, 20, '          1.     Kapasitas sampai dengan 25 kg', '', 'buah', 1500, 21500, 12500, 1, ''),
(145, 20, '          2.     Lebih dari 25 kg', '', 'buah', 2500, 22500, 15000, 35000, ''),
(146, 20, 'Sentisimal', '', '', 0, 0, 0, 0, ''),
(147, 20, '          1.     Kapasitas sampai dengan 150 kg', '', 'buah', 7500, 22500, 20000, 40000, ''),
(148, 20, '          2.     Lebih dari 150 kg sampai dengan 500 kg', '', 'buah', 8000, 28000, 22500, 42500, ''),
(149, 20, '          3.     Lebih dari 500 kg', '', 'buah', 15000, 40000, 40000, 75000, ''),
(150, 20, 'Desimal / Milisimal', '', 'buah', 8000, 28000, 22500, 42500, ''),
(151, 20, 'Bobot Ingsut', '', '', 0, 0, 0, 0, ''),
(152, 20, '          1.     Kapasitas sampai dengan 25 kg', '', 'buah', 6500, 26500, 17500, 37000, ''),
(153, 20, '          2.     Lebih besar dari 25 kg sampai dengan 150 kg', '', 'buah', 7500, 27500, 20000, 40000, ''),
(154, 20, '          3.     Lebih dari 150 kg', '', 'buah', 11500, 31500, 25000, 60000, ''),
(155, 20, 'Meja Beranger', '', 'buah', 1500, 21500, 12500, 25000, ''),
(156, 20, 'Pegas', '', '', 0, 0, 0, 0, ''),
(157, 20, '          1.     Kapasitas sampai dengan 25 kg', '', 'buah', 6500, 26500, 12500, 32500, ''),
(158, 20, '          2.     Lebih besar dari 25 kg', '', 'buah', 10000, 30000, 22500, 32500, ''),
(159, 20, 'Cepat', '', '', 0, 0, 0, 0, ''),
(160, 20, '          1.     Kapasitas sampai dengan 500 kg', '', 'buah', 20000, 40000, 40000, 60000, ''),
(161, 20, '          2.     Lebih dari 500 kg', '', 'buah', 25000, 45000, 50000, 70000, ''),
(162, 20, 'Elektronik ( Kelas III & Kelas IV )', '', '', 0, 0, 0, 0, ''),
(163, 20, '          1.     Kapasitas sampai dengan 25 kg ', '', 'buah', 27500, 47500, 27500, 47500, ''),
(164, 20, '          2.     Lebih dari 25 kg sampai dengan 150 kg ', '', 'buah', 30000, 50000, 30000, 50000, ''),
(165, 20, '          3.     Lebih dari 150 kg sampai dengan 500 kg ', '', 'buah', 35000, 55000, 35000, 55000, ''),
(166, 20, '          4.     Lebih dari 500 kg sampai dengan 1000 kg', '', 'buah', 50000, 70000, 50000, 70000, ''),
(167, 20, '          5.     Lebih dari 1000 kg ', '', 'buah', 130000, 150000, 130000, 150000, ''),
(168, 20, 'Elektronik ( Kelas II ) ', '', '', 0, 0, 0, 0, ''),
(169, 20, '         1.     Kapasitas sampai dengan 1 kg', '', 'buah', 50000, 60000, 50000, 60000, ''),
(170, 20, '         2.     Lebih dari 1 kg', '', 'buah', 60000, 70000, 60000, 70000, ''),
(171, 20, 'Elektronik ( Kelas I )', '', '', 0, 0, 0, 0, ''),
(172, 20, '         1.     Kapasitas sampai dengan 1 kg', '', 'buah', 125000, 135000, 125000, 135000, ''),
(173, 20, '         2.     Lebih dari 1 kg', '', 'buah', 150000, 160000, 150000, 160000, ''),
(174, 20, 'Timbangan Jembatan', '', '', 0, 0, 0, 0, ''),
(175, 20, '          1.     Kapasitas sampai dengan 50 ton', '', 'buah', 0, 1000000, 1000000, 0, ''),
(176, 20, '          2.     Lebih besar dari 50 ton', '', 'buah', 0, 1500000, 1500000, 0, ''),
(177, 20, 'Timbangan Ban Berjalanan', '', '', 0, 0, 0, 0, ''),
(178, 20, '          1.     Kapasitas sampai dengan 100 ton/h', '', 'buah', 0, 400000, 400000, 0, ''),
(179, 20, '          2.     Lebih besar dari 100 ton/h sampai dengan 500 ton/h', '', 'buah', 0, 550000, 550000, 0, ''),
(180, 20, '          3.     Lebih besar dari 500 ton ', '', 'buah', 0, 650000, 650000, 0, ''),
(181, 21, 'Dead Weight Testing Machine', '', '', 0, 0, 0, 0, ''),
(182, 21, '          1.     Kapasitas sama dengan 100 kg/cm2', '', 'buah', 20000, 0, 20000, 0, ''),
(183, 21, '          2.     Lebih dari 100 kg / cm2 sampai dengan 1000 kg/cm2', '', 'buah', 25000, 0, 25000, 0, ''),
(184, 21, '          3.     Lebih dari 1000 kg/cm2', '', 'buah', 50000, 0, 50000, 0, ''),
(185, 21, 'Alat Ukur Tekanan Darah', '', 'buah', 25000, 35000, 25000, 35000, ''),
(186, 21, 'Manometer Minyak', '', '', 0, 0, 0, 0, ''),
(187, 21, '          1.     Kapasitas sama dengan 100 kg/cm2', '', 'buah', 25000, 35000, 25000, 35000, ''),
(188, 21, '          2.     Lebih dari 100 kg / cm2 sampai dengan 1000 kg/cm2', '', 'buah', 30000, 40000, 30000, 40000, ''),
(189, 21, '          3.     Lebih dari 1000 kg/cm2', '', 'buah', 35000, 45000, 35000, 45000, ''),
(190, 21, 'Pressure Calibrator', '', 'buah', 50000, 75000, 75000, 100000, ''),
(191, 21, 'Pressure Recorder', '', '', 0, 0, 0, 0, ''),
(192, 21, '          1.     Kapasitas sama dengan 100 kg/cm2', '', 'buah', 20000, 30000, 30000, 40000, ''),
(193, 21, '          2.     Lebih dari 100 kg / cm2 sampai dengan 1000 kg/cm2', '', 'buah', 30000, 40000, 40000, 50000, ''),
(194, 21, '          3.     Lebih dari 1000 kg/cm2', '', 'buah', 40000, 50000, 70000, 80000, ''),
(195, 22, 'Untuk biji-bijian tidak mengandung minyak, setiap komoditi.', '', 'buah', 25000, 35000, 35000, 45000, 'default.jpg'),
(196, 22, 'Untuk kayu dan komoditi lain, setiap komoditi', '', 'buah', 50000, 60000, 70000, 80000, 'default.jpg'),
(197, 22, 'Untuk biji-bijian mengandung minyak, kapas, dan tekstil, setiap komoditi.', '', 'buah', 40000, 50000, 60000, 70000, 'default.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kategori_tera`
--

CREATE TABLE `tb_kategori_tera` (
  `id_kategori` int NOT NULL,
  `nama_kategori` varchar(100) NOT NULL,
  `desk_kategori` text NOT NULL,
  `header` varchar(50) NOT NULL,
  `gambar` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Dumping data for table `tb_kategori_tera`
--

INSERT INTO `tb_kategori_tera` (`id_kategori`, `nama_kategori`, `desk_kategori`, `header`, `gambar`) VALUES
(1, 'UKURAN PANJANG', '(Meter dengan pegangan,Meter Kayu, Meter Meja dari Logam,Tongkat duga, Meter saku baja, Ban Ukur, Deoth Tape)', 'Panjang dan Tekanan', 'ukuranpanjang.jpg'),
(2, 'ALAT UKUR PERMUKAAN CAIRAN', '', '0', 'default.jpg'),
(3, 'TAKARAN (BASAH / KERING)', '', '0', 'default.jpg'),
(4, 'TANGKI UKUR ', 'Tangki Ukur Silinder Datar yang mempunyai dua kompartemen atau lebih, setiap kompartemen dihitung satu alat ukur.', '0', 'default.jpg'),
(5, 'TANGKI UKUR GERAK', 'Tangki Ukur Gerak Datar yang mempunyai dua kompartemen atau lebih, setiap kompartemen dihitung satu alat ukur.', 'Volume', 'tangkiukurgerak.jpg'),
(6, 'ALAT UKUR DARI GELAS', '', 'Volume', 'alatukurdarigelas.jpg'),
(7, 'BEJANA UKUR', '', 'Volume', 'bejanaukur.jpg'),
(8, 'METER TAKSI', '', 'Panjang dan Tekanan', 'metertaksi.jpg'),
(9, 'ALAT UKUR CAIRAN MINYAK', ' Meter Bahan Bakar Minyak ', 'Volume', 'alatukurcairanminyak.jpg'),
(10, 'ALAT UKUR GAS', '', '0', 'default.jpg'),
(11, 'METER AIR ', '', 'Volume', 'meterair.jpg'),
(12, 'METER CAIRRAN MINUM SELAIN AIR', '', '0', 'default.jpg'),
(13, 'ALAT KOMPENSASI SUHU ( ATC )', '', '0', 'default.jpg'),
(14, 'METER PROVER', 'Meter Prover yang memiliki dua seksi atau lebih, maka setiap seksi dihitung sebagai satu alat ukur', '0', 'default.jpg'),
(15, 'METER ARUS MASSA', '', '0', 'default.jpg'),
(16, 'ALAT UKUR PENGISI ( FILLING MACHINE )', '', '0', 'default.jpg'),
(17, 'METER LISTIK ( kWh )', '', '0', 'default.jpg'),
(18, 'PEMBATAS ARUS LISTRIK', '', '0', 'default.jpg'),
(19, 'ANAK TIMBANGAN', '', 'Massa Timbangan', 'anaktimbangan.jpg'),
(20, 'TIMBANGAN', '', 'Massa Timbangan', 'timbangan.jpg'),
(21, 'ALAT UKUR TEKANAN', '', 'Panjang dan Tekanan', 'alatukurtekanan.jpg'),
(22, 'METER KADAR AIR', '', '0', 'default.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_notifikasi`
--

CREATE TABLE `tb_notifikasi` (
  `id` int NOT NULL,
  `user_id` int DEFAULT NULL,
  `pengajuan_id` int DEFAULT NULL,
  `judul` varchar(200) NOT NULL,
  `pesan` text NOT NULL,
  `tipe` enum('pengajuan_baru','verifikasi','sertifikat','info') NOT NULL DEFAULT 'info',
  `dibaca` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_pengajuan`
--

CREATE TABLE `tb_pengajuan` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `no_registrasi` varchar(50) NOT NULL,
  `nama_pemohon` varchar(100) NOT NULL,
  `nama_pemilik` varchar(150) NOT NULL COMMENT 'Nama pemilik atau instansi',
  `dokumen_pendukung` varchar(255) DEFAULT NULL COMMENT 'Path to uploaded document',
  `jenis_layanan` enum('Tera','Tera Ulang','Pengujian','Kalibrasi') NOT NULL,
  `tempat_pengerjaan` enum('Di Tempat','Di Kantor') NOT NULL,
  `jenis_uttp` varchar(100) NOT NULL,
  `kapasitas` varchar(100) NOT NULL,
  `jumlah_alat` int NOT NULL DEFAULT '1',
  `catatan` text COMMENT 'Catatan untuk petugas',
  `petugas_id` int DEFAULT NULL,
  `verified_at` timestamp NULL DEFAULT NULL,
  `verified_by` int DEFAULT NULL,
  `catatan_admin` text,
  `status` enum('pending','diproses','selesai','ditolak') NOT NULL DEFAULT 'pending',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_pengajuan`
--

INSERT INTO `tb_pengajuan` (`id`, `user_id`, `no_registrasi`, `nama_pemohon`, `nama_pemilik`, `dokumen_pendukung`, `jenis_layanan`, `tempat_pengerjaan`, `jenis_uttp`, `kapasitas`, `jumlah_alat`, `catatan`, `petugas_id`, `verified_at`, `verified_by`, `catatan_admin`, `status`, `created_at`, `updated_at`) VALUES
(4, 7, 'REG-20260208-0001', 'Ramlan Sumarjo', 'Ramlan Sumarjo', NULL, 'Pengujian', 'Di Tempat', 'Anak Timbangan', '5 KG', 100, 'Tolong hubungi saya jika mau melakukan pengujian', 3, '2026-02-08 10:32:45', 6, 'Ahmad Fauzi segera menuju ke tempat anda.', 'selesai', '2026-02-08 10:31:17', '2026-02-08 12:24:12');

-- --------------------------------------------------------

--
-- Table structure for table `tb_petugas`
--

CREATE TABLE `tb_petugas` (
  `id` int NOT NULL,
  `nama` varchar(100) NOT NULL,
  `nip` varchar(30) DEFAULT NULL,
  `jabatan` varchar(100) NOT NULL DEFAULT 'Penera',
  `no_telepon` varchar(20) DEFAULT NULL,
  `status` enum('aktif','nonaktif') NOT NULL DEFAULT 'aktif',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_petugas`
--

INSERT INTO `tb_petugas` (`id`, `nama`, `nip`, `jabatan`, `no_telepon`, `status`, `created_at`) VALUES
(1, 'Budi Santoso', '198501012010011001', 'Penera Ahli Muda', '081234567890', 'aktif', '2026-02-07 14:28:37'),
(2, 'Dewi Lestari', '198702152011012002', 'Penera Ahli Pertama', '081234567891', 'aktif', '2026-02-07 14:28:37'),
(3, 'Ahmad Fauzi', '199003202012011003', 'Penera Terampil', '081234567892', 'aktif', '2026-02-07 14:28:37');

-- --------------------------------------------------------

--
-- Table structure for table `tb_profil`
--

CREATE TABLE `tb_profil` (
  `id_profil` int NOT NULL,
  `header_img` varchar(255) NOT NULL,
  `header1` varchar(255) NOT NULL,
  `header2` varchar(255) NOT NULL,
  `header3` varchar(255) NOT NULL,
  `header4` varchar(255) NOT NULL,
  `judul_profil` varchar(255) NOT NULL,
  `desk_profil1` text NOT NULL,
  `desk_profil2` text NOT NULL,
  `visi` text NOT NULL,
  `misi` text NOT NULL,
  `alur_pelayanan` varchar(255) NOT NULL,
  `desk_alur` text NOT NULL,
  `ruang` varchar(255) NOT NULL,
  `desk_ruang` text NOT NULL,
  `alamat_kantor` text NOT NULL,
  `jam_kerja` varchar(255) NOT NULL,
  `telpon_kantor` varchar(50) NOT NULL,
  `email_kantor` varchar(100) NOT NULL,
  `facebook` varchar(255) NOT NULL,
  `twitter` varchar(255) NOT NULL,
  `instagram` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Dumping data for table `tb_profil`
--

INSERT INTO `tb_profil` (`id_profil`, `header_img`, `header1`, `header2`, `header3`, `header4`, `judul_profil`, `desk_profil1`, `desk_profil2`, `visi`, `misi`, `alur_pelayanan`, `desk_alur`, `ruang`, `desk_ruang`, `alamat_kantor`, `jam_kerja`, `telpon_kantor`, `email_kantor`, `facebook`, `twitter`, `instagram`) VALUES
(4, 'slide-1.jpg', 'METROLOGI', 'KOTA SEMARANG', 'PELAYANAN TERA DAN TERA ULANG', 'SELAMAT DATANG DI', 'TENTANG KAMI', 'UPTD Metrologi Legal mempunyai tugas melaksanakan sebagian kegiatan teknis operasional Dinas Perdagangan meliputi penyelenggaraan pelayanan kemetrologian.', 'Memberikan pelayanan tera dan tera ulang UTTP di kantor maupun ditempat usaha anda.', 'Mewujudkan tertib ukur di segala bidang untuk melindungi kepentingan umum, keadilan, dan kepercayaan konsumen. ', '1. Penertiban dan Standardisasi: Menertibkan penggunaan satuan ukuran berdasarkan Sistem Internasional (SI).\n2. Peningkatan Akurasi: Meningkatkan ketepatan hasil pengukuran dan penimbangan, terutama untuk transaksi perdagangan.\n3. Pelayanan Tera/Tera Ulang: Melaksanakan tera dan tera ulang pada Alat Ukur, Takar, Timbang, dan Perlengkapannya (UTTP).\n4. Perlindungan Konsumen: Melindungi kepentingan umum dan konsumen dari ketidakakuratan pengukuran.\n5. Peningkatan Kapasitas: Meningkatkan kompetensi sumber daya manusia (SDM) serta sarana dan prasarana pendukung kemetrologian.\n6. Penegakan Hukum: Memberikan kepastian hukum melalui pengawasan dan penegakan aturan kemetrologian. ', 'ALUR PELAYANAN', 'Prosedur pelayanan tera dan tera ulang', 'RUANG LINGKUP', 'Jenis alat ukur yang dilayani', 'Jl. Siliwangi No. 360 Semarang', 'Senin - Jumat: 08:00 - 15:00', '(024) 7607777', 'metrologi.smg@gmail.com', 'https://facebook.com', 'https://twitter.com', 'https://instagram.com');

-- --------------------------------------------------------

--
-- Table structure for table `tb_sertifikat`
--

CREATE TABLE `tb_sertifikat` (
  `id` int NOT NULL,
  `pengajuan_id` int NOT NULL,
  `no_sertifikat` varchar(50) NOT NULL,
  `tanggal_terbit` date NOT NULL,
  `tanggal_berlaku` date DEFAULT NULL,
  `file_sertifikat` varchar(255) DEFAULT NULL,
  `keterangan` text,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_sertifikat`
--

INSERT INTO `tb_sertifikat` (`id`, `pengajuan_id`, `no_sertifikat`, `tanggal_terbit`, `tanggal_berlaku`, `file_sertifikat`, `keterangan`, `created_at`) VALUES
(3, 4, 'SERT/MET/2026/02/0001', '2026-02-08', '2027-02-08', NULL, '', '2026-02-08 12:24:12');

-- --------------------------------------------------------

--
-- Table structure for table `tb_users`
--

CREATE TABLE `tb_users` (
  `id` int NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `whatsapp` varchar(20) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `role` enum('admin','user') NOT NULL DEFAULT 'user',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_users`
--

INSERT INTO `tb_users` (`id`, `username`, `password`, `nama_lengkap`, `whatsapp`, `email`, `role`, `created_at`) VALUES
(6, 'Salafudin', '$2y$10$ooEYDm0cnx5Go1GWw.grVOjyIQKut6K8HCJgnMHjQKpTOmT4FiC.6', 'Mochamad Salafudin', '085333757579', 'mchmd.salafudin@gmail.com', 'admin', '2026-02-08 10:26:16'),
(7, 'Ramlan', '$2y$10$2X5sUoZ3SaQmEdyimxkVb.L6owmeNZGCtuM5Y8tbhAH7ydcTPM7/S', 'Ramlan Sumarjo', '085612345678', 'ramlan@gmail.com', 'user', '2026-02-08 10:28:38');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_jenis_tera`
--
ALTER TABLE `tb_jenis_tera`
  ADD PRIMARY KEY (`id_jenis`);

--
-- Indexes for table `tb_kategori_tera`
--
ALTER TABLE `tb_kategori_tera`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `tb_notifikasi`
--
ALTER TABLE `tb_notifikasi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `pengajuan_id` (`pengajuan_id`);

--
-- Indexes for table `tb_pengajuan`
--
ALTER TABLE `tb_pengajuan`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `no_registrasi` (`no_registrasi`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `fk_pengajuan_petugas` (`petugas_id`);

--
-- Indexes for table `tb_petugas`
--
ALTER TABLE `tb_petugas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_profil`
--
ALTER TABLE `tb_profil`
  ADD PRIMARY KEY (`id_profil`);

--
-- Indexes for table `tb_sertifikat`
--
ALTER TABLE `tb_sertifikat`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `no_sertifikat` (`no_sertifikat`),
  ADD KEY `pengajuan_id` (`pengajuan_id`);

--
-- Indexes for table `tb_users`
--
ALTER TABLE `tb_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_jenis_tera`
--
ALTER TABLE `tb_jenis_tera`
  MODIFY `id_jenis` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=199;

--
-- AUTO_INCREMENT for table `tb_kategori_tera`
--
ALTER TABLE `tb_kategori_tera`
  MODIFY `id_kategori` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `tb_notifikasi`
--
ALTER TABLE `tb_notifikasi`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_pengajuan`
--
ALTER TABLE `tb_pengajuan`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_petugas`
--
ALTER TABLE `tb_petugas`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_profil`
--
ALTER TABLE `tb_profil`
  MODIFY `id_profil` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_sertifikat`
--
ALTER TABLE `tb_sertifikat`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_users`
--
ALTER TABLE `tb_users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_pengajuan`
--
ALTER TABLE `tb_pengajuan`
  ADD CONSTRAINT `fk_pengajuan_petugas` FOREIGN KEY (`petugas_id`) REFERENCES `tb_petugas` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `fk_user_pengajuan_v2` FOREIGN KEY (`user_id`) REFERENCES `tb_users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tb_sertifikat`
--
ALTER TABLE `tb_sertifikat`
  ADD CONSTRAINT `fk_sertifikat_pengajuan` FOREIGN KEY (`pengajuan_id`) REFERENCES `tb_pengajuan` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
