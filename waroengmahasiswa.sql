-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 29 Jun 2020 pada 03.48
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `waroengmahasiswa`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username_admin` varchar(100) NOT NULL,
  `password_admin` varchar(256) NOT NULL,
  `email_admin` varchar(100) NOT NULL,
  `nama_admin` varchar(100) NOT NULL,
  `foto_admin` varchar(100) NOT NULL,
  `id_level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `username_admin`, `password_admin`, `email_admin`, `nama_admin`, `foto_admin`, `id_level`) VALUES
(1, 'bkmcic', '$2y$10$X8KJfcBdVtkWz0jyFRfJrOAG8HD8quQB06.Msjn/Wx5usIx3yqheW', 'alfianrenz25@gmail.com', 'BKM CIC', 'BKM_CIC.jpg', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `akun_mahasiswa`
--

CREATE TABLE `akun_mahasiswa` (
  `id_mahasiswa` int(11) NOT NULL,
  `nim` varchar(20) NOT NULL,
  `email_mahasiswa` varchar(50) NOT NULL,
  `password_mahasiswa` varchar(256) NOT NULL,
  `alamat_mahasiswa` varchar(100) NOT NULL,
  `telepon_mahasiswa` varchar(20) NOT NULL,
  `tanggal_daftar` datetime NOT NULL,
  `foto_mahasiswa` varchar(100) NOT NULL,
  `status_aktif` int(11) NOT NULL,
  `tipe` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `akun_mahasiswa`
--

INSERT INTO `akun_mahasiswa` (`id_mahasiswa`, `nim`, `email_mahasiswa`, `password_mahasiswa`, `alamat_mahasiswa`, `telepon_mahasiswa`, `tanggal_daftar`, `foto_mahasiswa`, `status_aktif`, `tipe`) VALUES
(1, '2016102037', 'alfianrenz25@gmail.com', '$2y$10$tbvL1bu0yn8JTC3/BYrwLOHjrYD0sduDKxzcgSaWKSA308OpHeUJa', 'Karangwareng, Kabupaten Cirebon', '081214674264', '2020-06-25 05:20:59', 'Alfian.jpg', 1, 1),
(2, '2016102038', 'haevahreza@gmail.com', '$2y$10$vKNtmbfBxyfzQQF4GCPL0e3eS7GeHTZhXeKJt8FnOset80WGmzkRa', 'Desa Losari, Kabupaten Cirebon', '089677889068', '2020-06-25 14:27:13', 'Haevah_Reza_Amri_.jpg', 1, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `akun_umum`
--

CREATE TABLE `akun_umum` (
  `id_umum` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(70) NOT NULL,
  `telepon` varchar(20) NOT NULL,
  `password` varchar(256) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `tanggal_daftar` datetime NOT NULL,
  `status_aktif` int(11) NOT NULL,
  `tipe` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `akun_umum`
--

INSERT INTO `akun_umum` (`id_umum`, `username`, `email`, `telepon`, `password`, `foto`, `tanggal_daftar`, `status_aktif`, `tipe`) VALUES
(1, 'Alfianrenz', 'alfianrenz25@gmail.com', '081214674264', '$2y$10$wxLM7uzUDGFiDIfPttzwHe19qAoJrqsITpJQzj9bhGQ.sK3LnJ11u', 'alfianrenz.jpg', '2020-06-25 05:22:50', 1, 2),
(2, 'Jenyver', 'jenyverm95@gmail.com', '089677889907', '$2y$10$JlAF85eEl4ovpQVYlL0qK.szFgFWVGbwH/igp69SFZGnxEte0n0Um', 'Jenyver.jpg', '2020-06-28 18:31:27', 1, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `fakultas`
--

CREATE TABLE `fakultas` (
  `id_fakultas` int(11) NOT NULL,
  `nama_fakultas` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `fakultas`
--

INSERT INTO `fakultas` (`id_fakultas`, `nama_fakultas`) VALUES
(1, 'Teknologi dan Informasi'),
(2, 'Ekonomi dan Bisnis');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
(1, 'Aksesoris'),
(2, 'Fashion Pria'),
(3, 'Fashion Wanita'),
(4, 'Handphone'),
(5, 'Jasa'),
(6, 'Kesehatan'),
(7, 'Makanan'),
(8, 'Minuman'),
(9, 'Produk Seni'),
(10, 'Produk Lainnya');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `nim` varchar(20) NOT NULL,
  `nama_mahasiswa` varchar(100) NOT NULL,
  `id_fakultas` int(11) NOT NULL,
  `id_prodi` int(11) NOT NULL,
  `status_mahasiswa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `mahasiswa`
--

INSERT INTO `mahasiswa` (`nim`, `nama_mahasiswa`, `id_fakultas`, `id_prodi`, `status_mahasiswa`) VALUES
('2016102036', 'Puja Irawan', 1, 2, 1),
('2016102037', 'Alfian', 1, 1, 1),
('2016102038', 'Haevah Reza Amri ', 1, 1, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `prodi`
--

CREATE TABLE `prodi` (
  `id_prodi` int(11) NOT NULL,
  `id_fakultas` int(11) NOT NULL,
  `nama_prodi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `prodi`
--

INSERT INTO `prodi` (`id_prodi`, `id_fakultas`, `nama_prodi`) VALUES
(1, 1, 'Teknik Informatika'),
(2, 1, 'Sistem Informasi'),
(3, 1, 'Desain Komunikasi Visual '),
(4, 1, 'Komputerisasi Akuntansi'),
(5, 1, 'Manajemen Informatika'),
(6, 2, 'Akuntansi'),
(7, 2, 'Manajemen'),
(8, 2, 'Manajemen Bisnis');

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `id_mahasiswa` int(11) NOT NULL,
  `nama_produk` varchar(100) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `harga_produk` int(20) NOT NULL,
  `stok_produk` int(11) NOT NULL,
  `deskripsi_produk` text NOT NULL,
  `foto_produk` varchar(100) NOT NULL,
  `status_produk` int(11) NOT NULL,
  `tanggal_input` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`id_produk`, `id_mahasiswa`, `nama_produk`, `id_kategori`, `harga_produk`, `stok_produk`, `deskripsi_produk`, `foto_produk`, `status_produk`, `tanggal_input`) VALUES
(1, 1, 'Sepatu Ventela Maroon', 1, 50000, 1, '<p>Sepatu Ventela Public Low Maroon<br />\r\nStock tersedia sesuai variasi tersebut, jika size tidak tertera maka stock tersebut habis.</p>\r\n\r\n<p>Ventela Public Low Maroon<br />\r\nProduksi Indonesia kualitas dunia<br />\r\nInsole yang nyaman</p>\r\n\r\n<p>Untuk Informasi lebih lanjut<br />\r\nHubungi : 0812789889890</p>', 'Sepatu_Ventela_Maroon.jpg', 1, '2020-06-28 18:54:19'),
(2, 1, 'Seblak Instan Mommy', 7, 10000, 10, '<p>Seblak Kuah Instan Puspa (Pusaka Parahyangan)</p>\r\n\r\n<p>Seblak Bandung - Seblak Super Pedas<br>\r\nMakanan khas Jawa Barat siap saji, kapan saja dan dimana saja tinggal seduh dan di tunggu 3-5 menit.<br>\r\nSelalu Ready!!!</p>\r\n\r\n<p>Cocok buat bekal di perjalanan atau di rumah saja<br>\r\nCepat dan praktis<br>\r\nPesanan di bawah jam 16.00 akan di kirim di hari yang sama</p>\r\n\r\n<p>Informasi lebih lanjut : 08877897990</p>', 'Seblak_Instan_Mommy.jpg', 1, '2020-06-28 19:04:07'),
(3, 1, 'Jersey Barcelona 2019/2020', 2, 75000, 5, '<p>Jual jersey Barcelona Home 2020</p>\r\n\r\n<p>Untuk ukuran bisa hubungi kontak yang tersedia&nbsp;ya, karena stok terbatas<br />\r\nSponsor original mulus, bordiran rapih<br />\r\nPatch ori bawaan dari pabrik<br />\r\nBahan tidak panas dan ringan&nbsp;<br />\r\nDijamin ORIGINAL !</p>\r\n\r\n<p>Informasi lebih lanjut :&nbsp;<br />\r\nWhats App : 087767009889</p>', 'Jersey_Barcelona_20192020.jpg', 1, '2020-06-28 19:08:41'),
(4, 2, 'Kemeja Putih Wanita', 3, 45000, 5, '<p>Bahan Premium Katun Import</p>\r\n\r\n<p>Tersedia ukuran S,L,M,XL. Bisa pesan terlebih dahulu karena stok terbatas!</p>\r\n\r\n<p>Produk Indonesia kualitas dunia, dijamin ORI!<br />\r\nUntuk warna hanya tersedia putih<br />\r\nLengan Panjang tidak ada lengan pendek</p>\r\n\r\n<p>Informasi lebih lanjut hubungi<br />\r\nWhats App : 0812789890098</p>', 'Kemeja_Putih_Wanita.png', 1, '2020-06-28 19:14:19'),
(5, 2, 'Kue Nastar Kering', 7, 25000, 2, '<p>Sudah di konsumsi di dalam negeri dan sudah banyak dibawa ke luar negeri !<br />\r\nJaminan kualitas nomor 1, Fresh from the oven!<br />\r\n<br />\r\nAlamat toko kami!<br />\r\nJl. Jendral Sudirman<br />\r\nRuko Makutarama No.3, Salatiga, Jawa Tengah<br />\r\nTelepon : 0298-326484/312291<br />\r\nWhats App&nbsp;: 085640653838</p>', 'Kue_Nastar_Kering.jpg', 1, '2020-06-28 19:16:17'),
(6, 2, 'Jam Tangan Casio', 1, 150000, 1, '<p>Jam yang kami jual selalu terjamin kualitasnya dan dipastikan sesuai dengan spesifikasi produk.<br />\r\nJangan tergiur dengan harga lebih murah dari kami tapi spek. Produk &amp; Kualitas Berbeda Jauh!<br />\r\nBE SMART BUYER..GUYS!<br />\r\n=========================================================<br />\r\nBrand&nbsp; &nbsp;: Patek Philippe<br />\r\nSeries&nbsp; &nbsp;: Aquanaut<br />\r\nGender : Man Watch<br />\r\nQuality&nbsp; : Super Premium (CLONE ORI)<br />\r\nStrap Rubber<br />\r\nAutomatic Japan Movement (Otomatis)<br />\r\nCase : Solid Stainless Steel<br />\r\nBezel : Fixed</p>\r\n\r\n<p>Whats App : 081588990098</p>', 'Jam_Tangan_Casio.jpg', 1, '2020-06-28 19:22:23');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_token`
--

CREATE TABLE `user_token` (
  `id_token` int(11) NOT NULL,
  `email` varchar(150) NOT NULL,
  `token` varchar(150) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `akun_mahasiswa`
--
ALTER TABLE `akun_mahasiswa`
  ADD PRIMARY KEY (`id_mahasiswa`);

--
-- Indeks untuk tabel `akun_umum`
--
ALTER TABLE `akun_umum`
  ADD PRIMARY KEY (`id_umum`);

--
-- Indeks untuk tabel `fakultas`
--
ALTER TABLE `fakultas`
  ADD PRIMARY KEY (`id_fakultas`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`nim`);

--
-- Indeks untuk tabel `prodi`
--
ALTER TABLE `prodi`
  ADD PRIMARY KEY (`id_prodi`);

--
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indeks untuk tabel `user_token`
--
ALTER TABLE `user_token`
  ADD PRIMARY KEY (`id_token`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `akun_mahasiswa`
--
ALTER TABLE `akun_mahasiswa`
  MODIFY `id_mahasiswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `akun_umum`
--
ALTER TABLE `akun_umum`
  MODIFY `id_umum` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `fakultas`
--
ALTER TABLE `fakultas`
  MODIFY `id_fakultas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `prodi`
--
ALTER TABLE `prodi`
  MODIFY `id_prodi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `user_token`
--
ALTER TABLE `user_token`
  MODIFY `id_token` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
