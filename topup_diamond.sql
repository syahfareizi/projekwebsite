-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 06, 2021 at 05:10 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `topup_diamond`
--

-- --------------------------------------------------------

--
-- Table structure for table `list_voucher`
--

CREATE TABLE `list_voucher` (
  `id` int(10) NOT NULL,
  `namagame` varchar(20) NOT NULL,
  `namavoucher` varchar(20) NOT NULL,
  `hargavoucher` int(20) NOT NULL,
  `foto` text NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `list_voucher`
--

INSERT INTO `list_voucher` (`id`, `namagame`, `namavoucher`, `hargavoucher`, `foto`, `deskripsi`) VALUES
(1, 'FreeFire', 'Voucher 140 Diamond', 20000, 'https://image.winudf.com/v2/image1/Y29tLmR0cy5mcmVlZmlyZXRoX3NjcmVlbl8wXzE2MDEzNjA1NjJfMDYx/screen-0.jpg?fakeurl=1&type=.jpg', 'Voucher 140 Diamond Freefire\r\n\r\nUsaha Kami memberi yang terbaik, Anda puas kami puas\r\nTerus support toko kami dan beri penilaian ya :)\r\n\r\nTerima kasih. '),
(2, 'FreeFire', 'Voucher 355 Diamond', 50000, 'https://www.harapanrakyat.com/wp-content/uploads/2020/06/11.-Garena-Free-Fire-Banned-Permanent-118-Juta-Akun-Tak-Sportif-digit.in_.jpg', 'Voucher 355 Diamond Freefire \r\n\r\nUsaha Kami memberi yang terbaik, Anda puas kami puas\r\nTerus support toko kami dan beri penilaian ya :)\r\n\r\nTerima kasih.\r\n'),
(3, 'FreeFire', 'Voucher 720 Diamond', 100000, 'https://deifoexkvnt11.cloudfront.net/assets/article/2020/05/19/070_feature.jpg', 'Voucher 720 Diamond Freefire\r\n\r\nUsaha Kami memberi yang terbaik, Anda puas kami puas\r\nTerus support toko kami dan beri penilaian ya :)\r\n\r\nTerima kasih.'),
(4, 'Mobile Legend', 'Voucher 170 Diamond', 50000, 'https://dailyspin.id/wp-content/uploads/2020/08/Hero-Nerf-Mobile-Legends.jpg', 'Voucher 170 Diamond Mobile Legend\r\n\r\nUsaha Kami memberi yang terbaik, Anda puas kami puas\r\nTerus support toko kami dan beri penilaian ya :)\r\n\r\nTerima kasih.'),
(5, 'Mobile Legend', 'Voucher 408 Diamond', 110000, 'https://public.urbanasia.com/images/post/2020/uploads/cbab2a4980e1491bab3bafffa862cf7c.jpg', 'Voucher 408 Diamond Mobile Legend\r\n\r\nUsaha Kami memberi yang terbaik, Anda puas kami puas\r\nTerus support toko kami dan beri penilaian ya :)\r\n\r\nTerima kasih.'),
(6, 'Mobile Legend', 'Voucher 875 Diamond', 230000, 'https://i.pinimg.com/originals/59/fc/78/59fc78fac16b8c31483f0795f8e6ed02.jpg', 'Voucher 875 Diamond Mobile Legend\r\n\r\nUsaha Kami memberi yang terbaik, Anda puas kami puas\r\nTerus support toko kami dan beri penilaian ya :)\r\n\r\nTerima kasih.');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id` int(10) NOT NULL,
  `jenisvoucher` varchar(100) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `nomerhp` int(15) NOT NULL,
  `nickname` varchar(20) NOT NULL,
  `idnickname` int(20) NOT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'On - Proses',
  `tanggal` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id`, `jenisvoucher`, `nama`, `nomerhp`, `nickname`, `idnickname`, `status`, `tanggal`) VALUES
(46, '3', '12313', 213213, '213213', 213123, ' Selesai ', '2020-12-24'),
(47, '', 'nabila', 2147483647, 'neb', 8152, ' Selesai ', '2020-12-25'),
(48, '', 'dhjsjsbsk', 59564986, 'shshhdbd', 59598989, ' Selesai ', '2020-12-25');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(20) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `email`, `password`) VALUES
(6, 'faris', 'ofarisyeah@gmail.com', 'e10adc3949ba59abbe56e057f20f883e'),
(10, 'Syah Fareizi', 'ofarisyeahhh@gmail.com', 'e10adc3949ba59abbe56e057f20f883e'),
(11, 'faris ganteng', 'syahmuhammadalfareizi@yahoo.com', '4297f44b13955235245b2497399d7a93'),
(12, 'Sempak', 'faris@gmail.com', '4297f44b13955235245b2497399d7a93');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `list_voucher`
--
ALTER TABLE `list_voucher`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `list_voucher`
--
ALTER TABLE `list_voucher`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
