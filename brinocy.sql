-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 04, 2016 at 07:01 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `brinocy`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(35) NOT NULL,
  `fullname` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`, `fullname`) VALUES
(1, 'admin', 'admin', 'administrator');

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id_kategori` int(10) NOT NULL,
  `kode_barang` varchar(10) NOT NULL,
  `nama_barang` varchar(25) NOT NULL,
  `harga_barang` int(50) NOT NULL,
  `berat_barang` int(25) NOT NULL,
  `gambar_barang` varchar(100) NOT NULL,
  `keterangan_barang` varchar(250) NOT NULL,
  `stok_barang` int(10) NOT NULL,
  `rekomendasi` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_kategori`, `kode_barang`, `nama_barang`, `harga_barang`, `berat_barang`, `gambar_barang`, `keterangan_barang`, `stok_barang`, `rekomendasi`) VALUES
(3, 'SW01', 'SWEATER PRIA', 155000, 1000, 'IMG_20161204_235704.jpg', '-', 1, 'Y'),
(1, 'TS01', 'TSHIRT PRIA', 75000, 1000, 'IMG_20161204_235649.jpg', '-', 1, 'Y'),
(1, 'TS02', 'TSHIRT PRIA', 75000, 1000, 'IMG_20161204_235657.jpg', '-', 1, 'Y'),
(1, 'TS03', 'TSHIRT PRIA', 75000, 1000, 'IMG_20161204_235700.jpg', '-', 1, 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(10) NOT NULL,
  `nama_kategori` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--
INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
(1, 'T-shirts'),
(3, 'sweater');

-- --------------------------------------------------------

--
-- Table structure for table `orderbarang`
--

CREATE TABLE `orderbarang` (
  `id_orderbarang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `orderdetails`
--

CREATE TABLE `orderdetails` (
  `id_orderdetail` int(11) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `email` varchar(25) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `kota` varchar(25) NOT NULL,
  `kodepos` int(10) NOT NULL,
  `notelfon` int(15) NOT NULL,
  `norekening` int(50) NOT NULL,
  `namarekening` varchar(30) NOT NULL,
  `bank` varchar(30) NOT NULL,
  `statuspemesanan` varchar(1) DEFAULT NULL,
  `total` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orderdetails`
--

INSERT INTO `orderdetails` (`id_orderdetail`, `nama`, `email`, `alamat`, `kota`, `kodepos`, `notelfon`, `norekening`, `namarekening`, `bank`, `statuspemesanan`, `total`) VALUES
(7, 'mochamad syawalu rifai', 'mochamadsyawalu@gmail.com', 'bumi agung permai 1', 'serang', 141211, 2147483647, 2147483647, 'mochamad syawalu rifai', 'Mandiri', NULL, 0),
(20, '', '', '', '', 0, 0, 0, '', '', NULL, 0),
(21, '', '', '', '', 0, 0, 0, '', '', NULL, 0),
(22, '', '', '', '', 0, 0, 0, '', '', NULL, 0),
(23, '', '', '', '', 0, 0, 0, '', '', NULL, 0),
(24, '', '', '', '', 0, 0, 0, '', '', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama_user` varchar(25) NOT NULL,
  `pass_user` varchar(35) NOT NULL,
  `fullname` int(25) NOT NULL,
  `email` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`kode_barang`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `orderbarang`
--
ALTER TABLE `orderbarang`
  ADD PRIMARY KEY (`id_orderbarang`);

--
-- Indexes for table `orderdetails`
--
ALTER TABLE `orderdetails`
  ADD PRIMARY KEY (`id_orderdetail`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `orderbarang`
--
ALTER TABLE `orderbarang`
  MODIFY `id_orderbarang` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `orderdetails`
--
ALTER TABLE `orderdetails`
  MODIFY `id_orderdetail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `user`
--

ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
