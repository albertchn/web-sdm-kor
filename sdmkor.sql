-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 27 Jun 2022 pada 10.32
-- Versi server: 10.4.21-MariaDB
-- Versi PHP: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sdmkor`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `komponen`
--

CREATE TABLE `komponen` (
  `id_komponen` int(11) NOT NULL,
  `nama_komponen` varchar(255) NOT NULL,
  `isi_komponen` varchar(255) DEFAULT NULL,
  `waktu_dibuat` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `komponen`
--

INSERT INTO `komponen` (`id_komponen`, `nama_komponen`, `isi_komponen`, `waktu_dibuat`) VALUES
(1, 'judul_index', 'Selamat Datang!', '2022-06-13 02:05:38'),
(2, 'deskripsi_index', 'Mari jaga keamanan hati ketika dimintai dokumen-dokumen lama. Back up dokumen adalah cara terbaik demi menjaga keamanan hati dan pikiran jangka panjang!', '2022-06-13 02:09:18'),
(3, 'folder_srtmsk', 'Folder Surat Masuk', '2022-06-13 02:13:14'),
(4, 'folder_srtklr', 'Folder Surat Keluar', '2022-06-13 02:13:20'),
(5, 'judul_srtmsk', 'SURAT MASUK', '2022-06-14 08:17:17'),
(6, 'judul_srtklr', 'SURAT KELUAR', '2022-06-14 08:36:52'),
(7, 'judul_anggota', 'DAFTAR ANGGOTA', '2022-06-14 08:54:31'),
(8, 'foto_index', 'jett.jpg,logo.jpg,sage.png,valorant-omen-4k-v9-1920x1080.jpg,viper-valorant-game-4k-cp-1920x1080.jpg', '2022-06-27 08:28:07'),
(9, 'footer', 'Created by Albert Christian D &amp; Dennis Montero Pankratov', '2022-06-14 08:54:57');

-- --------------------------------------------------------

--
-- Struktur dari tabel `surat_keluar`
--

CREATE TABLE `surat_keluar` (
  `id_surat` int(11) NOT NULL,
  `tgl_surat` date NOT NULL,
  `no_surat` varchar(255) NOT NULL,
  `perihal` varchar(255) NOT NULL,
  `file` varchar(255) NOT NULL,
  `waktu_diinput` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `surat_masuk`
--

CREATE TABLE `surat_masuk` (
  `id_surat` int(11) NOT NULL,
  `no_surat` varchar(255) NOT NULL,
  `terima_dari` varchar(255) NOT NULL,
  `tgl_surat` date NOT NULL,
  `perihal` varchar(255) NOT NULL,
  `kepada` varchar(50) NOT NULL,
  `file` varchar(255) NOT NULL,
  `waktu_diinput` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `username` int(8) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` varchar(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `nama`, `username`, `password`, `status`) VALUES
(1, 'Nizar Wahyu', 94030033, '94030033', 'admin'),
(2, 'Hendra Permana', 94041590, '94041590', 'anggota');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `komponen`
--
ALTER TABLE `komponen`
  ADD PRIMARY KEY (`id_komponen`);

--
-- Indeks untuk tabel `surat_keluar`
--
ALTER TABLE `surat_keluar`
  ADD PRIMARY KEY (`id_surat`);

--
-- Indeks untuk tabel `surat_masuk`
--
ALTER TABLE `surat_masuk`
  ADD PRIMARY KEY (`id_surat`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `komponen`
--
ALTER TABLE `komponen`
  MODIFY `id_komponen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `surat_keluar`
--
ALTER TABLE `surat_keluar`
  MODIFY `id_surat` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `surat_masuk`
--
ALTER TABLE `surat_masuk`
  MODIFY `id_surat` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
