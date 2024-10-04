-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 04 Okt 2024 pada 05.51
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `buku_tamu`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `daftar_tamu_smakji`
--

CREATE TABLE `daftar_tamu_smakji` (
  `id_tamu` varchar(5) NOT NULL,
  `tanggal` date NOT NULL,
  `nama_tamu` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `no_hp` varchar(13) NOT NULL,
  `bertemu` varchar(255) NOT NULL,
  `kepentingan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `daftar_tamu_smakji`
--

INSERT INTO `daftar_tamu_smakji` (`id_tamu`, `tanggal`, `nama_tamu`, `alamat`, `no_hp`, `bertemu`, `kepentingan`) VALUES
('zt004', '2024-09-21', 'Jajang', 'Jl. Cokroaminoto', '0897581625', 'Kepala Sekolah', 'Gapleh'),
('zt005', '2024-09-24', 'Aldi', 'Gg harapan 1', '085947321073', 'Kepala Sekolah', 'Nampol Kepsek'),
('zt006', '2024-09-30', 'Peler', 'Jl. Soedirman', '0832657268', 'Kepala Sekolah', 'Jajan'),
('zt007', '2024-10-04', 'PEB', 'Gg jkpj', '086428242', 'KEpa', ''),
('zt008', '2024-10-04', 'aldi', 'jl', '0821', 'jfaj', 'rapat');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id_user` varchar(5) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_role` enum('admin','operator') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id_user`, `username`, `password`, `user_role`) VALUES
('usr01', 'Kenzo210208', '$2y$10$cOfJSnIE6XHHS05kOSAYRe1nWABctwvLxhIVhFwA4PoREdnoMZ9TO', 'operator'),
('usr02', 'Ajax_3-1', '$2y$10$DHxwgq9FXQFf9bqL4FNdru.RH6mwE1eW1oOsx5CeUf72yaAfkkaNe', 'admin'),
('usr03', 'peler', '$2y$10$tDgrkRNRjGWeHkykONGefuhHRYoB8yb15/thP30Q5xFS2Y3BL.ajO', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `daftar_tamu_smakji`
--
ALTER TABLE `daftar_tamu_smakji`
  ADD PRIMARY KEY (`id_tamu`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
