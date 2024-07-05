-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 05 Jul 2024 pada 13.03
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_kab_kota`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kab_kota`
--

CREATE TABLE `tb_kab_kota` (
  `id` int(11) NOT NULL,
  `kabupaten_kota` varchar(100) NOT NULL,
  `pusat_pemerintahan` varchar(100) NOT NULL,
  `bupati_walikota` varchar(50) NOT NULL,
  `tanggal_berdiri` date NOT NULL,
  `luas_wilayah` double NOT NULL,
  `jumlah_penduduk` int(11) DEFAULT 0,
  `jumlah_kecamatan` int(11) DEFAULT 0,
  `jumlah_kelurahan` int(11) DEFAULT 0,
  `jumlah_desa` int(11) DEFAULT 0,
  `url_peta_wilayah` varchar(150) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `logo` varchar(100) DEFAULT 'logo_default.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_kab_kota`
--

INSERT INTO `tb_kab_kota` (`id`, `kabupaten_kota`, `pusat_pemerintahan`, `bupati_walikota`, `tanggal_berdiri`, `luas_wilayah`, `jumlah_penduduk`, `jumlah_kecamatan`, `jumlah_kelurahan`, `jumlah_desa`, `url_peta_wilayah`, `deskripsi`, `logo`) VALUES
(1, 'Kabupaten Bengkalis', 'Bengkalis', 'Kasmarni', '1512-07-30', 6975.41, 565569, 11, 19, 122, 'https://upload.wikimedia.org/wikipedia/commons/6/6b/Lokasi_Riau_Kabupaten_Bengkalis.svg', 'Deksripsi Bengkalis', 'bengkalis.png'),
(2, 'Kabupaten Indragiri Hili', 'Tembilahan', 'Muhammad Wardan', '1965-06-14', 12614.78, 654909, 20, 39, 197, 'https://upload.wikimedia.org/wikipedia/commons/8/8b/Lokasi_Riau_Kabupaten_Indragiri_Hilir.svg', 'Deskripsi Kabupaten Indragiri Hilir', 'indragiri_hilir.png'),
(3, 'Kabupaten Indragiri Hulu', 'Rengat', 'Rezita Meylani Yopi', '1956-03-19', 7723.8, 444548, 14, 16, 178, 'https://upload.wikimedia.org/wikipedia/commons/4/49/Lokasi_Riau_Kabupaten_Indragiri_Hulu.svg', 'Deskripsi Kabupaten Indragiri Hulu', 'indragiri_hulu.png'),
(4, 'Kabupaten Kampar', 'Bangkinang', 'Kamsol (Pj.)', '1950-02-06', 10983.47, 841332, 21, 8, 242, 'https://upload.wikimedia.org/wikipedia/commons/d/dd/Lokasi_Riau_Kabupaten_Kampar.svg', 'Deskripsi Kabupaten Kampar', 'kampar.png'),
(5, 'Kabupaten Kepulauan Meranti', 'Selatpanjang', 'Muhammad Adil', '2008-12-19', 3707.84, 206116, 9, 5, 96, 'https://upload.wikimedia.org/wikipedia/commons/9/9f/Lokasi_Riau_Kabupaten_Kepulauan_Meranti.svg', 'Deskripsi Kabupaten Kepulauan Meranti', 'kepulauan_meranti.png'),
(6, 'Kabupaten Kuantan Singingi', 'Taluk Kuantan', 'Suhardiman Amby (Pit.)', '1999-10-04', 5259.36, 334943, 15, 11, 218, 'https://upload.wikimedia.org/wikipedia/commons/b/b8/Lokasi_Riau_Kabupaten_Kuantan_Singingi.svg', 'Deskripsi Kabupaten Kuantan Singingi', 'kuantan_singingi.png'),
(7, 'Kabupaten Pelalawan', 'Pangkalan Kerinci', 'Zukri Misran', '1999-10-12', 12758.45, 390046, 12, 14, 104, 'https://upload.wikimedia.org/wikipedia/commons/f/fc/Lokasi_Riau_Kabupaten_Pelalawan.svg', 'Deskripsi Kabupaten Pelalawan', 'pelalawan.png'),
(8, 'Kabupaten Rokan Hilir', 'Bagansiapiapi', 'Afrizal Sintong', '1999-10-04', 8881.59, 637161, 15, 25, 159, 'https://upload.wikimedia.org/wikipedia/commons/1/16/Lokasi_Riau_Kabupaten_Rokan_Hilir.svg', 'Deskripsi Kabupaten Rokan Hilir', 'rokan_hilir.png'),
(9, 'Kabupaten Rokan Hulu', 'Pasir Pengaraian', 'Sukiman', '1999-10-12', 7588.13, 561385, 16, 6, 139, 'https://upload.wikimedia.org/wikipedia/commons/6/6c/Lokasi_Riau_Kabupaten_Rokan_Hulu.svg', 'Deskripsi Kabupaten Rokan Hulu', 'rokan_hulu.png'),
(10, 'Kabupaten Siak', 'Siak Sri Indrapura', 'Alfedri', '1999-10-12', 8275.18, 457940, 14, 9, 122, 'https://upload.wikimedia.org/wikipedia/commons/e/ed/Lokasi_Riau_Kabupaten_Siak.svg', 'Deskripsi Kabupaten Siak', 'siak.png'),
(11, 'Kota Dumai', 'Dumai', 'Paisal', '1999-04-27', 1623.38, 316782, 7, 36, 0, 'https://upload.wikimedia.org/wikipedia/commons/1/11/Lokasi_Riau_Kota_Dumai.svg', 'Deskripsi Kota Dumai', 'dumai.png'),
(12, 'Kota Pekanbaru', 'Pekanbaru', 'Muflinhun(PJ.)', '1784-06-23', 632.27, 983356, 12, 83, 0, 'https://upload.wikimedia.org/wikipedia/commons/b/b7/Lokasi_Riau_Kota_Pekanbaru.svg', 'Deskripsi Kota Pekanbaru', 'pekanbaru.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  `role` enum('Admin','User') NOT NULL DEFAULT 'User'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`id`, `username`, `email`, `password`, `no_hp`, `role`) VALUES
(6, 'Ucup Castro', 'ucup@gmail.com', 'b16296ede4af55e07756eb64e6af6ffb', '0896-2929-0909', 'User'),
(7, 'Admin Web', 'admin@gmail.com', 'b0f3716c4b2dc540c81df57942e64e2f', '0888-8888-8888', 'Admin');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_kab_kota`
--
ALTER TABLE `tb_kab_kota`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_kab_kota`
--
ALTER TABLE `tb_kab_kota`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
