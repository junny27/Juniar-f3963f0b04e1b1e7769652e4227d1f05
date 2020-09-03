-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Waktu pembuatan: 03. September 2020 jam 11:51
-- Versi Server: 5.5.8
-- Versi PHP: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `login`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `logintbl`
--

CREATE TABLE IF NOT EXISTS `logintbl` (
  `username` varchar(8) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `status` varchar(1) NOT NULL,
  `loginTime` datetime NOT NULL,
  `otherBrowser` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `logintbl`
--

INSERT INTO `logintbl` (`username`, `pass`, `status`, `loginTime`, `otherBrowser`) VALUES
('user', '202cb962ac59075b964b07152d234b70', '0', '2020-09-03 16:47:19', '0');
