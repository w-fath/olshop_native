-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 11 Agu 2024 pada 07.25
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
-- Database: `shop`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id` int(11) NOT NULL,
  `kd_kategori` varchar(50) NOT NULL,
  `nama` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id`, `kd_kategori`, `nama`) VALUES
(7, 'KT0102461', 'PHP Native'),
(9, 'KT0102462', 'HTML'),
(12, 'KT0102463', 'CodeIgniter'),
(13, 'KT0102464', 'Laravel');

-- --------------------------------------------------------

--
-- Struktur dari tabel `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','user') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `login`
--

INSERT INTO `login` (`id`, `username`, `password`, `role`, `created_at`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin', '2024-08-05 17:00:00'),
(2, 'user', 'ee11cbb19052e40b07aac0ca060c23ee', 'user', '2024-08-05 17:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `wa` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `messages`
--

INSERT INTO `messages` (`id`, `name`, `wa`, `email`, `message`, `created_at`) VALUES
(1, 'ShopeeLatter', '987654', 'user@gmail.com', 'hallo', '2024-08-09 17:38:10'),
(2, 'ShopeeLatter', '1234567', 'user2@gmail.com', 'Hallo', '2024-08-10 09:51:54'),
(3, 'ShopeeLatter', '098765432', 'user2@gmail.com', 'njk', '2024-08-11 03:50:07');

-- --------------------------------------------------------

--
-- Struktur dari tabel `promo`
--

CREATE TABLE `promo` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `sumber_link` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `promo`
--

INSERT INTO `promo` (`id`, `title`, `sumber_link`, `image`) VALUES
(9, 'Promo Xiaomi 10th Anniversary 17-31 Agustus 2020, mulai HP sampai smart TV', 'https://amp.kontan.co.id/news/promo-xiaomi-10th-anniversary-17-31-agustus-2020-mulai-hp-sampai-smart-tv', 'https://foto.kontan.co.id/-YMHLOcBh3W8AzW_tiq9-3T9QCM=/smart/2020/08/18/1751399625p.jpg'),
(10, 'Promo Harga HP Xiaomi Spesial Agustusan, Ada Diskon Sampai Rp 1 Juta!', 'https://belanjaon.kontan.co.id/news/promo-harga-hp-xiaomi-spesial-agustusan-ada-diskon-sampai-rp-1-juta', 'https://foto.kontan.co.id/6Q6L1_REATjIAiNN4hc2_oIy1M4=/smart/2022/08/02/321931647p.jpg'),
(11, 'Ini Daftar Promo Handphone di Retail Store', 'https://selular.id/2016/08/ini-daftar-promo-handphone-di-retail-store/', 'https://selular.id/wp-content/uploads/2016/08/IMG-20160816-WA000.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `source_code`
--

CREATE TABLE `source_code` (
  `id` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `language` varchar(100) DEFAULT NULL,
  `status` enum('Open','Locked') DEFAULT 'Locked',
  `image` varchar(255) DEFAULT NULL,
  `download_link` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `source_code`
--

INSERT INTO `source_code` (`id`, `id_kategori`, `title`, `description`, `language`, `status`, `image`, `download_link`) VALUES
(18, 7, ',m,m,', '<p>sasa</p>', 'PHP', 'Open', 'upload/img/Screenshot (1).png', 'http://localhost/dashboard/'),
(19, 7, ',m,m,', '<p><br></p>', 'PHP', 'Open', 'upload/img/Screenshot (1).png', 'http://localhost/dashboard/'),
(20, 7, ',m,m,', '<p><br></p>', 'PHP', 'Open', 'upload/img/Screenshot (1).png', 'http://localhost/dashboard/'),
(21, 7, 'nnmnm', '<p>mnm</p>', 'PHP', 'Open', 'upload/img/Screenshot (1).png', 'http://localhost/dashboard/');

-- --------------------------------------------------------

--
-- Struktur dari tabel `template`
--

CREATE TABLE `template` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `download_link` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `template`
--

INSERT INTO `template` (`id`, `name`, `description`, `image`, `download_link`) VALUES
(1, 'Template A', 'Deskripsi untuk Template A', 'asset/img/template-a.png', '#'),
(2, 'Template B', 'Deskripsi untuk Template B', 'asset/img/template-b.png', '#'),
(3, 'Template C', 'Deskripsi untuk Template C', 'asset/img/template-c.png', '#');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indeks untuk tabel `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `promo`
--
ALTER TABLE `promo`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `source_code`
--
ALTER TABLE `source_code`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `template`
--
ALTER TABLE `template`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `promo`
--
ALTER TABLE `promo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `source_code`
--
ALTER TABLE `source_code`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `template`
--
ALTER TABLE `template`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
