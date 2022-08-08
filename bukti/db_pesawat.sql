-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 07 Agu 2022 pada 07.54
-- Versi server: 10.4.20-MariaDB
-- Versi PHP: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_pesawat`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tiket`
--

CREATE TABLE `tiket` (
  `id_tiket` int(20) NOT NULL,
  `kode_tiket` varchar(255) NOT NULL,
  `kode_pesawat` varchar(255) NOT NULL,
  `nm_pembeli` varchar(255) NOT NULL,
  `tgl_berangkat` date NOT NULL,
  `waktu_berangkat` time NOT NULL,
  `waktu_sampai` time NOT NULL,
  `harga` int(100) NOT NULL,
  `no_kursi` int(100) NOT NULL,
  `kelas` varchar(35) NOT NULL,
  `berangkat` varchar(40) NOT NULL,
  `tujuan` varchar(40) NOT NULL,
  `total` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tiket`
--

INSERT INTO `tiket` (`id_tiket`, `kode_tiket`, `kode_pesawat`, `nm_pembeli`, `tgl_berangkat`, `waktu_berangkat`, `waktu_sampai`, `harga`, `no_kursi`, `kelas`, `berangkat`, `tujuan`, `total`) VALUES
(69, 'TIKET_1', 'KD001', 'adi saputra', '2021-11-01', '22:46:00', '00:00:00', 1300000, 1, 'VVIP', 'aktif', 'Griya Bukit Jaya', 1300000),
(70, 'TIKET_2', 'KD01', 'Adi Saputra', '0000-00-00', '00:00:00', '00:00:00', 0, 0, 'Pilih Kelas Pesawat', '', '', 0),
(71, 'TIKET_3', 'KD01', '', '0000-00-00', '00:00:00', '00:00:00', 0, 0, 'Pilih Kelas Pesawat', '', 'asda', 0),
(72, 'TIKET_4', 'KD003', 'asda', '2022-08-08', '17:28:00', '00:00:00', 0, 0, 'Kelas Pesawat', '', 'asdasd', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `id_tiket` int(100) NOT NULL,
  `total` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(50) NOT NULL,
  `user` varchar(50) NOT NULL,
  `pass` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `user`, `pass`) VALUES
(0, 'bisakenapa135', 'adisaputra');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tiket`
--
ALTER TABLE `tiket`
  ADD PRIMARY KEY (`id_tiket`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tiket`
--
ALTER TABLE `tiket`
  MODIFY `id_tiket` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
