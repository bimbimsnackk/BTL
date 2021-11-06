-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 31, 2021 at 05:01 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sinhvien`
--

-- --------------------------------------------------------

--
-- Table structure for table `dangnhap`
--

CREATE TABLE `dangnhap` (
  `id` int(11) NOT NULL,
  `account` text NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dangnhap`
--

INSERT INTO `dangnhap` (`id`, `account`, `password`) VALUES
(1, 'admin', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `diemthi`
--

CREATE TABLE `diemthi` (
  `diemthiID` int(11) NOT NULL,
  `sinhvienID` int(11) NOT NULL,
  `ltud` float NOT NULL,
  `ltvm` float NOT NULL,
  `htvt` int(11) NOT NULL,
  `htcm` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `diemthi`
--

INSERT INTO `diemthi` (`diemthiID`, `sinhvienID`, `ltud`, `ltvm`, `htvt`, `htcm`) VALUES
(1, 6, 8, 8.5, 8, 8),
(2, 2, 10, 9, 8, 5),
(3, 12, 8, 7, 8, 7),
(4, 11, 9, 8, 8, 8),
(5, 13, 8, 8, 9, 8);

-- --------------------------------------------------------

--
-- Table structure for table `giangvien`
--

CREATE TABLE `giangvien` (
  `idGiangvien` int(11) NOT NULL,
  `masoGV` text NOT NULL,
  `hoten` text NOT NULL,
  `trinhdo` text NOT NULL,
  `chuyenmon` text NOT NULL,
  `email` text NOT NULL,
  `sdt` text NOT NULL,
  `link_avt_GV` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `giangvien`
--

INSERT INTO `giangvien` (`idGiangvien`, `masoGV`, `hoten`, `trinhdo`, `chuyenmon`, `email`, `sdt`, `link_avt_GV`) VALUES
(1, 'GV001', 'Phạm Tiến Huy', 'Th.s', 'Lập trinh', 'phamhuy@gmail.com', '168465555', 'thayhuy.jpg'),
(2, 'GV002', 'Lê Thị Cúc ', 'Thạc sỹ ', 'Mạng máy tính ', 'lecuc@gmail.com', '0658585858', 'cocuc.jpg'),
(3, 'GV003', 'Nguyễn Thu Thủy ', 'unknown ', 'Chủ nhiệm', 'thuthuy@mail.vn', '025454987', 'cothuy.jpg'),
(4, 'GV004', 'Bill Gate', 'Dr. ', 'Computer Science ', 'billgate@dollar.com', '03548787878', 'billgates.jpg'),
(5, 'GV005', 'Emma Watson', 'Tiến sỹ ', 'Computer Science , Machine Learning ', 'ema@hou.edu.vn', '0145745869', 'emma.jpg'),
(6, 'GV006', 'Harry Potter ', 'Dr. ', 'Magic. ', 'harry@potter.com', '0909900009', 'harry.jpg'),
(7, 'GV007', 'Vũ Song Tùng ', 'Thạc sỹ ', 'Điện tử viễn thông ', 'email@email.com', '09595959', ''),
(9, 'GV008', 'Kudo Shinichi', 'Dr.', 'Mac - Lenin', 'kudo@gmail.com', '254875557', 'kudo.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `lophoc`
--

CREATE TABLE `lophoc` (
  `lopID` int(11) NOT NULL,
  `tenlop` text NOT NULL,
  `chunhiem` text NOT NULL,
  `phonghoc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `lophoc`
--

INSERT INTO `lophoc` (`lopID`, `tenlop`, `chunhiem`, `phonghoc`) VALUES
(8, 'K21-A', 'Phạm Thị Lê Huyền', 'P.101'),
(9, 'K17-A', 'Phạm Thị Lê Huyền', 'P.101'),
(10, 'K19-A', 'Nguyễn Thu Thủy ', 'P.203'),
(11, 'K20-A', 'Nguyễn Thu Thủy', 'P.103'),
(12, 'K16-A', 'Phạm Thị Lê Huyền', 'P.301');

-- --------------------------------------------------------

--
-- Table structure for table `sinhvien`
--

CREATE TABLE `sinhvien` (
  `sinhvienID` int(11) NOT NULL,
  `MaSV` int(11) NOT NULL,
  `lopID` int(11) NOT NULL,
  `name` text NOT NULL,
  `birthday` date NOT NULL,
  `phonenumber` int(11) NOT NULL,
  `address` text NOT NULL,
  `avt` text NOT NULL,
  `so_truong` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sinhvien`
--

INSERT INTO `sinhvien` (`sinhvienID`, `MaSV`, `lopID`, `name`, `birthday`, `phonenumber`, `address`, `avt`, `so_truong`) VALUES
(2, 5, 10, 'Trịnh Đức Duy', '1998-10-30', 168656788, 'Thanh Hóa', '', 'football'),
(3, 4, 8, 'Phạm Tuấn Anh', '1998-10-10', 35656565, 'Phú Yên', '', ''),
(5, 2, 8, 'Phạm Anh Khoa', '2000-10-15', 38456777, 'Hà Nam', '', 'football'),
(6, 1, 10, 'Phạm Viết Hiếu', '1998-09-19', 1684659555, 'Thanh Hóa', 'phamhieu.jpg', 'IT chém gió !'),
(11, 0, 10, 'Lê Minh Hải', '1998-06-22', 95858798, 'Hà Nội', 'minhhai.jpg', 'Cua gái thần chưởng, thả thính đại pháp '),
(12, 0, 10, 'Nguyễn Đức Duy', '1998-10-30', 38469555, 'Thanh Hóa', '', 'Art, Painting '),
(13, 0, 11, 'Nguyễn Đức Độ ', '1998-09-27', 3922300, 'Nam Định', 'ducdo.jpg', ''),
(14, 0, 8, 'Nguyễn Sơn Hoàng ', '2000-10-20', 35484785, 'Thanh Hóa', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dangnhap`
--
ALTER TABLE `dangnhap`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `diemthi`
--
ALTER TABLE `diemthi`
  ADD PRIMARY KEY (`diemthiID`,`sinhvienID`),
  ADD KEY `sinhvienID` (`sinhvienID`);

--
-- Indexes for table `giangvien`
--
ALTER TABLE `giangvien`
  ADD PRIMARY KEY (`idGiangvien`);

--
-- Indexes for table `lophoc`
--
ALTER TABLE `lophoc`
  ADD PRIMARY KEY (`lopID`);

--
-- Indexes for table `sinhvien`
--
ALTER TABLE `sinhvien`
  ADD PRIMARY KEY (`sinhvienID`),
  ADD KEY `lopID` (`lopID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dangnhap`
--
ALTER TABLE `dangnhap`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `diemthi`
--
ALTER TABLE `diemthi`
  MODIFY `diemthiID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `giangvien`
--
ALTER TABLE `giangvien`
  MODIFY `idGiangvien` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `lophoc`
--
ALTER TABLE `lophoc`
  MODIFY `lopID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `sinhvien`
--
ALTER TABLE `sinhvien`
  MODIFY `sinhvienID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `diemthi`
--
ALTER TABLE `diemthi`
  ADD CONSTRAINT `diemthi_ibfk_1` FOREIGN KEY (`sinhvienID`) REFERENCES `sinhvien` (`sinhvienID`);

--
-- Constraints for table `sinhvien`
--
ALTER TABLE `sinhvien`
  ADD CONSTRAINT `sinhvien_ibfk_1` FOREIGN KEY (`lopID`) REFERENCES `lophoc` (`lopID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
