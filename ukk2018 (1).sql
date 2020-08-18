-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 13 Feb 2018 pada 11.52
-- Versi Server: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ukk2018`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `disposition`
--

CREATE TABLE IF NOT EXISTS `disposition` (
  `ID_DISPO` varchar(11) NOT NULL,
  `ID_USER` varchar(11) DEFAULT NULL,
  `ID_MAIL` varchar(11) DEFAULT NULL,
  `DISPOSITION_AT` date DEFAULT NULL,
  `REPLY_AT` varchar(50) DEFAULT NULL,
  `DESKRIPSI_DIS` text,
  `NOTIFICATION` varchar(50) DEFAULT NULL,
  `STATUS` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `disposition`
--

INSERT INTO `disposition` (`ID_DISPO`, `ID_USER`, `ID_MAIL`, `DISPOSITION_AT`, `REPLY_AT`, `DESKRIPSI_DIS`, `NOTIFICATION`, `STATUS`) VALUES
('DIS001', 'USR001', 'SM001', '0000-00-00', 'Koordinator Perpustakaan', 'surat ', 'Tindak Lanjuti', 'Amat Segera');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mail`
--

CREATE TABLE IF NOT EXISTS `mail` (
  `ID_MAIL` varchar(11) NOT NULL,
  `ID_MTY` varchar(11) DEFAULT NULL,
  `ID_USER` varchar(11) DEFAULT NULL,
  `INCOMING_AT` date DEFAULT NULL,
  `MAIL_CODE` varchar(50) DEFAULT NULL,
  `MAIL_DATE` date DEFAULT NULL,
  `MAIL_FROM` varchar(100) DEFAULT NULL,
  `MAIL_TO` varchar(50) DEFAULT NULL,
  `MAIL_SUBJECT` varchar(100) DEFAULT NULL,
  `DESKRIPSI` text,
  `FILE_UPLOAD` varchar(50) DEFAULT NULL,
  `STATUS` enum('0','1') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mail`
--

INSERT INTO `mail` (`ID_MAIL`, `ID_MTY`, `ID_USER`, `INCOMING_AT`, `MAIL_CODE`, `MAIL_DATE`, `MAIL_FROM`, `MAIL_TO`, `MAIL_SUBJECT`, `DESKRIPSI`, `FILE_UPLOAD`, `STATUS`) VALUES
('SK001', 'MTY002', 'USR001', '2018-12-02', '2e', '2018-10-02', 'vintann', 'dimadaa', 'pentingg', 'ini surat keluarr', 'Lovintania F.M(18).docx', '0'),
('SK002', 'MTY002', 'USR001', '2018-07-02', '20', '2018-06-02', 'Lovintania ', 'Dimada Agusti', 'pribadi', 'ini surat keluar ', '', '0'),
('SK003', 'MTY002', 'USR001', '2018-02-07', '21', '2018-02-05', '1', '1', 'Penting', 'bn,mbn,', 'b.ing.docx', '0'),
('SM001', 'MTY001', 'USR001', '2018-06-02', '6', '2018-05-02', 'dimada', 'lovin', 'Penting', 'ini surat masuk', 'avatar3.png', '1'),
('SM003', 'MTY001', 'USR001', '2018-07-07', 'kfkl99', '2018-05-02', 'vin', 'Kasubag. Tata Usaha', 'pting', 'gtygu', 'eifel.jpg', '0');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mail_type`
--

CREATE TABLE IF NOT EXISTS `mail_type` (
  `ID_MTY` varchar(11) NOT NULL,
  `TYPE` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mail_type`
--

INSERT INTO `mail_type` (`ID_MTY`, `TYPE`) VALUES
('MTY001', 'Surat Masuk'),
('MTY002', 'Surat Keluar');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `ID_USER` varchar(11) NOT NULL,
  `USERNAME` varchar(100) DEFAULT NULL,
  `PASSWORD` varchar(50) DEFAULT NULL,
  `FULLNAME` varchar(100) DEFAULT NULL,
  `LEVEL` varchar(20) DEFAULT NULL,
  `PHOTO` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`ID_USER`, `USERNAME`, `PASSWORD`, `FULLNAME`, `LEVEL`, `PHOTO`) VALUES
('USR001', 'admin', 'admin', 'Lovintania F.M', 'Admin', '20150101_192602A.jpg'),
('USR002', 'operator', 'operator', 'Lovin Tania', 'Operator', '20150101_192602A.jpg'),
('USR003', 'b', 'hhhh', 'hhhhhhh', 'Operator', 'avatar2.png'),
('USR004', 'dsfsdsdfs', 'sdfsd', 'dsfsdfsd', 'Operator', 'avatar04.png'),
('USR005', 'jbj', 'jhjhj', 'jhjh', 'Operator', 'boxed-bg.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `disposition`
--
ALTER TABLE `disposition`
  ADD PRIMARY KEY (`ID_DISPO`), ADD KEY `FK_MENINDAK_LANJUTI` (`ID_MAIL`), ADD KEY `FK_RELATIONSHIP_3` (`ID_USER`);

--
-- Indexes for table `mail`
--
ALTER TABLE `mail`
  ADD PRIMARY KEY (`ID_MAIL`), ADD KEY `FK_MELENGKAPI` (`ID_MTY`), ADD KEY `FK_MENGIRIM` (`ID_USER`);

--
-- Indexes for table `mail_type`
--
ALTER TABLE `mail_type`
  ADD PRIMARY KEY (`ID_MTY`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID_USER`);

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `disposition`
--
ALTER TABLE `disposition`
ADD CONSTRAINT `FK_MENINDAK_LANJUTI` FOREIGN KEY (`ID_MAIL`) REFERENCES `mail` (`ID_MAIL`),
ADD CONSTRAINT `FK_RELATIONSHIP_3` FOREIGN KEY (`ID_USER`) REFERENCES `user` (`ID_USER`);

--
-- Ketidakleluasaan untuk tabel `mail`
--
ALTER TABLE `mail`
ADD CONSTRAINT `FK_MELENGKAPI` FOREIGN KEY (`ID_MTY`) REFERENCES `mail_type` (`ID_MTY`),
ADD CONSTRAINT `FK_MENGIRIM` FOREIGN KEY (`ID_USER`) REFERENCES `user` (`ID_USER`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
