-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 02, 2016 at 04:19 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `menshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `ctdh`
--

CREATE TABLE `ctdh` (
  `madh` int(11) NOT NULL,
  `masp` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `soluong` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ctdh`
--

INSERT INTO `ctdh` (`madh`, `masp`, `soluong`) VALUES
(5, 'ASM02', 2),
(5, 'ASM03', 1),
(5, 'QJ01', 1),
(6, 'ASM02', 3),
(6, 'ASM03', 2),
(7, 'ASM03', 1),
(7, 'AT02', 2),
(7, 'QJ01', 2),
(8, 'ASM01', 1),
(9, 'ASM01', 5),
(9, 'AT02', 2),
(10, 'ASM02', 1),
(11, 'ASM02', 1),
(18, 'ASM02', 1),
(19, 'ASM01', 1),
(20, 'ASM01', 1),
(21, 'ASM01', 1),
(21, 'ASM02', 1),
(22, 'ASM01', 2);

-- --------------------------------------------------------

--
-- Table structure for table `donhang`
--

CREATE TABLE `donhang` (
  `madh` int(11) NOT NULL,
  `username` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `ngaydh` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `tongtien` int(11) NOT NULL,
  `hotennn` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `diachinn` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `sdt` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `trangthaitt` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `donhang`
--

INSERT INTO `donhang` (`madh`, `username`, `ngaydh`, `tongtien`, `hotennn`, `diachinn`, `sdt`, `trangthaitt`) VALUES
(5, 'triluong', '2016-08-19 00:28:54', 860000, 'tran minh tam', '9 hien vuong', '1667876090', 0),
(6, 'josvantri1', '2016-08-25 14:53:34', 940000, 'Lương Văn Trí', '99 Man Thiện-Tăng Nhơn Phú A-Q.9-Tp.HCM', '1667476284', 0),
(7, 'josvantri1', '2016-08-25 16:56:26', 1100000, 'Lương Văn Trí', '99 Man Thiện-Tăng Nhơn Phú A-Q.9-Tp.HCM', '1667476284', 0),
(8, 'josvantri1', '2016-10-14 01:38:29', 180000, 'Lương Văn Trí', '99 Man Thiện-Tăng Nhơn Phú A-Q.9-Tp.HCM', '1667476284', 0),
(9, 'triluong', '2016-11-17 14:05:42', 1200000, 'Lương Văn Tai', '99 Man Thiện-Tăng Nhơn Phú A-Q.9-Tp.HCM', '1667476284', 1),
(10, 'triluong', '2016-11-19 17:45:17', 180000, 'Lương Văn Trí', '99 Man Thiện-Tăng Nhơn Phú A-Q.9-Tp.HCM', '1667476284', 0),
(11, 'triluong', '2016-11-22 14:28:40', 180000, 'Lương Văn Trí', '99 Man Thiện-Tăng Nhơn Phú A-Q.9-Tp.HCM', '1667476284', 0),
(18, 'triluong', '2016-11-28 23:02:50', 180000, 'luong van tri', '99 man thien', '1667476284', 1),
(19, 'triluong', '2016-11-28 23:05:03', 180000, 'luong van tri', '99 man thien', '1667476284', 1),
(20, 'triluong', '2016-11-28 23:18:41', 180000, 'Lương Văn Trí', '99 Man Thiện-Tăng Nhơn Phú A-Q.9-Tp.HCM', '1667476284', 0),
(21, 'triluong', '2016-11-29 01:32:28', 360000, 'luong van tri', '99 man thien', '1667476284', 1),
(22, 'triluong', '2016-11-29 13:24:38', 360000, 'luong van tri', '99 man thien', '1667476284', 0);

-- --------------------------------------------------------

--
-- Table structure for table `khachhang`
--

CREATE TABLE `khachhang` (
  `username` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `fullname` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `diachi` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `sdt` int(11) NOT NULL,
  `role` tinyint(1) NOT NULL,
  `ngaylap` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `khachhang`
--

INSERT INTO `khachhang` (`username`, `password`, `fullname`, `email`, `diachi`, `sdt`, `role`, `ngaylap`) VALUES
('josvantri1', 'tamthanh', 'Lương Văn Trí', 'pet.vantri@yahoo.com.vn', '99 Man Thiện-Tăng Nhơn Phú A-Q.9-Tp.HCM', 1667476284, 1, '2016-11-18 08:00:19'),
('ngoctuyen', 'ngoctuyen', 'Phan Thị Ngọc Tuyền', 'ngoctuyen@gmail.com', '99 Man Thiện Q9 TpHCm', 1699169113, 0, '2016-11-18 08:01:52'),
('triluong', 'tamthanh', 'luong van tri', 'pet.vantri@yahoo.com.vn', '99 man thien', 1667476284, 0, '2016-11-18 08:00:19'),
('triluong123', 'triluong', 'luong van tri', 'pet.vantri@yahoo.com.vn', '9 hiên vuong', 1667476352, 0, '2016-11-18 08:00:19');

-- --------------------------------------------------------

--
-- Table structure for table `nhomsp`
--

CREATE TABLE `nhomsp` (
  `manhom` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `tennhom` varchar(30) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `nhomsp`
--

INSERT INTO `nhomsp` (`manhom`, `tennhom`) VALUES
('ASM', 'Áo Sơ Mi'),
('AT', 'Áo Thun'),
('G', 'Giày'),
('QJ', 'Quần Jean'),
('QK', 'Quần Kaki');

-- --------------------------------------------------------

--
-- Table structure for table `sanpham`
--

CREATE TABLE `sanpham` (
  `masp` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `manhom` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `tensp` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `anhsp` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `gia` int(11) NOT NULL,
  `soluong` int(11) NOT NULL,
  `khuyenmai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sanpham`
--

INSERT INTO `sanpham` (`masp`, `manhom`, `tensp`, `anhsp`, `gia`, `soluong`, `khuyenmai`) VALUES
('ASM01', 'ASM', 'Áo Sơ Mi A01', 's1.jpg', 180000, 4, 10),
('ASM02', 'ASM', 'Áo Sơ Mi A02', 's2.jpg', 180000, 4, 0),
('ASM03', 'ASM', 'Áo Sơ Mi A03', 's3.jpg', 200000, 10, 20),
('ASM04', 'ASM', 'Áo Sơ Mi A04', 's4.jpg', 200000, 10, 0),
('ASM05', 'ASM', 'Áo Sơ Mi A05', 's5.jpg', 220000, 10, 0),
('ASM06', 'ASM', 'Áo Sơ Mi A06', 's6.jpg', 180000, 10, 10),
('ASM07', 'ASM', 'Áo Sơ Mi A07', 's7.jpg', 180000, 10, 20),
('ASM08', 'ASM', 'Áo Sơ Mi A08', 's8.jpg', 180000, 10, 0),
('AT01', 'AT', 'Áo Thun T01', 't1.jpg', 150000, 10, 0),
('AT02', 'AT', 'Áo Thun T02', 't2.jpg', 150000, 8, 15),
('AT03', 'AT', 'Áo Thun T03', 't3.jpg', 130000, 10, 10),
('AT04', 'AT', 'Áo Thun T04', 't4.jpg', 160000, 0, 0),
('AT05', 'AT', 'Áo Thun T05', 't5.jpg', 160000, 10, 0),
('AT06', 'AT', 'Áo Thun T06', 't6.jpg', 170000, 10, 20),
('AT07', 'AT', 'Áo Thun T07', 't7.jpg', 150000, 10, 0),
('AT08', 'AT', 'Áo Thun T08', 't8.jpg', 140000, 10, 0),
('G01', 'G', 'GIày G01', 'g1.jpg', 320000, 10, 15),
('G02', 'G', 'GIày G02', 'g2.jpg', 300000, 10, 0),
('G03', 'G', 'GIày G03', 'g3.jpg', 300000, 10, 15),
('G04', 'G', 'GIày G04', 'g4.jpg', 320000, 10, 10),
('G05', 'G', 'GIày G05', 'g5.jpg', 300000, 10, 0),
('G06', 'G', 'GIày G06', 'g6.jpg', 320000, 10, 0),
('G07', 'G', 'GIày G07', 'g7.jpg', 320000, 10, 0),
('G08', 'G', 'GIày G08', 'g8.jpg', 300000, 0, 10),
('QJ01', 'QJ', 'Quần Jean J01', 'j1.jpg', 300000, 0, 15),
('QJ02', 'QJ', 'Quần Jean J02', 'j2.jpg', 320000, 0, 0),
('QJ03', 'QJ', 'Quần Jean J03', 'j3.jpg', 350000, 0, 0),
('QJ04', 'QJ', 'Quần Jean J04', 'j4.jpg', 320000, 0, 20),
('QJ05', 'QJ', 'Quần Jean J05', 'j5.jpg', 350000, 0, 0),
('QJ06', 'QJ', 'Quần Jean J06', 'j6.jpg', 300000, 0, 10),
('QK01', 'QK', 'Quần Kaki K01', 'k1.jpg', 250000, 0, 0),
('QK02', 'QK', 'Quần Kaki K02', 'k2.jpg', 250000, 0, 0),
('QK03', 'QK', 'Quần Kaki K03', 'k3.jpg', 250000, 0, 10),
('QK04', 'QK', 'Quần Kaki K04', 'k4.jpg', 250000, 0, 0),
('QK05', 'QK', 'Quần Kaki K05', 'k5.jpg', 250000, 0, 10),
('QK06', 'QK', 'Quần Kaki K06', 'k6.jpg', 270000, 0, 15);

-- --------------------------------------------------------

--
-- Table structure for table `size`
--

CREATE TABLE `size` (
  `masize` int(11) NOT NULL,
  `tensize` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `size`
--

INSERT INTO `size` (`masize`, `tensize`) VALUES
(1, 'S'),
(2, 'M'),
(3, 'L'),
(4, 'XL');

-- --------------------------------------------------------

--
-- Table structure for table `size_sanpham`
--

CREATE TABLE `size_sanpham` (
  `masize` int(11) NOT NULL,
  `masp` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `size_sanpham`
--

INSERT INTO `size_sanpham` (`masize`, `masp`) VALUES
(1, 'ASM01'),
(2, 'ASM01'),
(3, 'ASM01'),
(4, 'ASM01'),
(1, 'ASM02'),
(2, 'ASM02');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ctdh`
--
ALTER TABLE `ctdh`
  ADD KEY `masp` (`masp`),
  ADD KEY `madh` (`madh`);

--
-- Indexes for table `donhang`
--
ALTER TABLE `donhang`
  ADD PRIMARY KEY (`madh`),
  ADD KEY `username` (`username`);

--
-- Indexes for table `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `nhomsp`
--
ALTER TABLE `nhomsp`
  ADD PRIMARY KEY (`manhom`);

--
-- Indexes for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`masp`),
  ADD KEY `manhom` (`manhom`),
  ADD KEY `manhom_2` (`manhom`),
  ADD KEY `manhom_3` (`manhom`);

--
-- Indexes for table `size`
--
ALTER TABLE `size`
  ADD PRIMARY KEY (`masize`);

--
-- Indexes for table `size_sanpham`
--
ALTER TABLE `size_sanpham`
  ADD KEY `masize` (`masize`),
  ADD KEY `masp` (`masp`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `donhang`
--
ALTER TABLE `donhang`
  MODIFY `madh` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `size`
--
ALTER TABLE `size`
  MODIFY `masize` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `ctdh`
--
ALTER TABLE `ctdh`
  ADD CONSTRAINT `ctdh_ibfk_1` FOREIGN KEY (`masp`) REFERENCES `sanpham` (`masp`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ctdh_ibfk_2` FOREIGN KEY (`madh`) REFERENCES `donhang` (`madh`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `donhang`
--
ALTER TABLE `donhang`
  ADD CONSTRAINT `donhang_ibfk_1` FOREIGN KEY (`username`) REFERENCES `khachhang` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `sanpham_ibfk_1` FOREIGN KEY (`manhom`) REFERENCES `nhomsp` (`manhom`);

--
-- Constraints for table `size`
--
ALTER TABLE `size`
  ADD CONSTRAINT `size_ibfk_1` FOREIGN KEY (`masize`) REFERENCES `size_sanpham` (`masize`);

--
-- Constraints for table `size_sanpham`
--
ALTER TABLE `size_sanpham`
  ADD CONSTRAINT `size_sanpham_ibfk_1` FOREIGN KEY (`masp`) REFERENCES `sanpham` (`masp`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
