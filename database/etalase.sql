-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: 28 Apr 2020 pada 18.25
-- Versi Server: 5.7.29-0ubuntu0.18.04.1
-- PHP Version: 7.2.24-0ubuntu0.18.04.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `etalase`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `activities`
--

CREATE TABLE `activities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `art_id` bigint(20) UNSIGNED NOT NULL,
  `judul` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `arts`
--

CREATE TABLE `arts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `ikon` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `arts`
--

INSERT INTO `arts` (`id`, `nama`, `gambar`, `deskripsi`, `ikon`) VALUES
(1, 'MUSIK', 'public/noimage.jpg', 'A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences.', 'flaticon-music'),
(2, 'TARI', 'public/noimage.jpg', 'A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences.', 'flaticon-belly-dance'),
(3, 'PSM', 'public/noimage.jpg', 'A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences.', 'flaticon-choir'),
(4, 'FOTOGRAFI', 'public/noimage.jpg', 'A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences.', 'flaticon-camera'),
(5, 'TEATER', 'public/noimage.jpg', 'A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences.', 'flaticon-theater');

-- --------------------------------------------------------

--
-- Struktur dari tabel `creations`
--

CREATE TABLE `creations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `art_id` bigint(20) UNSIGNED NOT NULL,
  `karya` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `images`
--

CREATE TABLE `images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `images`
--

INSERT INTO `images` (`id`, `image`, `created_at`, `updated_at`) VALUES
(2, 'public/gallery/1574217824_Bayu6.jpg', '2019-11-18 00:02:41', '2019-11-19 19:43:44'),
(6, 'public/gallery/1574410569_imgonline-com-ua-resize-INrzKfyNr45whNM.jpg', '2019-11-18 00:35:39', '2019-11-22 01:16:09'),
(7, 'public/gallery/1574410686_imgonline-com-ua-resize-4gR1oXR1uzZSTx.jpg', '2019-11-18 00:36:10', '2019-11-22 01:18:06'),
(9, 'public/gallery/1574410775_imgonline-com-ua-resize-DWjotUjdMgLrJLgf.jpg', '2019-11-21 10:06:57', '2019-11-22 01:19:35'),
(10, 'public/gallery/1574410855_imgonline-com-ua-resize-XzkV6LJhOa7.jpg', '2019-11-21 10:38:16', '2019-11-22 01:20:55'),
(11, 'public/gallery/1574411017_imgonline-com-ua-resize-hZUAuSTlfb.jpg', '2019-11-22 01:23:37', '2019-11-22 01:23:37'),
(12, 'public/gallery/1574411176_imgonline-com-ua-resize-IOjjKgAGIG7mG1W.jpg', '2019-11-22 01:26:16', '2019-11-22 01:26:16'),
(13, 'public/gallery/1574411240_imgonline-com-ua-resize-jjg3brZUMoc.jpg', '2019-11-22 01:27:20', '2019-11-22 01:27:20'),
(14, 'public/gallery/1574412757_imgonline-com-ua-resize-RC5s5A22PPng.jpg', '2019-11-22 01:52:37', '2019-11-22 01:52:37'),
(15, 'public/gallery/1574413002_imgonline-com-ua-resize-VsI3W1W77Gt.jpg', '2019-11-22 01:56:42', '2019-11-22 01:56:42'),
(17, 'public/gallery/1574413562_imgonline-com-ua-resize-WskFnxVkhsTeAcgr.jpg', '2019-11-22 02:06:02', '2019-11-22 02:06:02'),
(18, 'public/gallery/1574413778_imgonline-com-ua-resize-bVlArFF5KzcyXhZ.jpg', '2019-11-22 02:09:38', '2019-11-22 02:09:38'),
(19, 'public/gallery/1574414046_imgonline-com-ua-resize-iqD0OpQwJkEGYgM.jpg', '2019-11-22 02:14:06', '2019-11-22 02:14:06'),
(20, 'public/gallery/1574415727_imgonline-com-ua-resize-y3YkOYOLoYq4zgIx.jpg', '2019-11-22 02:42:07', '2019-11-22 02:42:07'),
(21, 'public/gallery/1574415977_imgonline-com-ua-resize-VcXSNwcksRP.jpg', '2019-11-22 02:46:17', '2019-11-22 02:46:17'),
(22, 'public/gallery/1574416396_WhatsApp Image 2019-09-21 at 11.58.50.jpeg', '2019-11-22 02:53:16', '2019-11-22 02:53:16'),
(23, 'public/gallery/1574416413_WhatsApp Image 2019-09-21 at 12.00.03.jpeg', '2019-11-22 02:53:33', '2019-11-22 02:53:33'),
(24, 'public/gallery/1574416437_WhatsApp Image 2019-09-21 at 12.00.51(1).jpeg', '2019-11-22 02:53:57', '2019-11-22 02:53:57'),
(25, 'public/gallery/1574416637_adek.jpg', '2019-11-22 02:57:17', '2019-11-22 02:57:17'),
(26, 'public/gallery/1574416764_imgonline-com-ua-resize-3QS5qKAKnPBLjhWg.jpg', '2019-11-22 02:59:24', '2019-11-22 02:59:24'),
(27, 'public/gallery/1574416883_imgonline-com-ua-resize-QMW5ItYRnsDPYfx.jpg', '2019-11-22 03:01:23', '2019-11-22 03:01:23'),
(28, 'public/gallery/1574417195_IMG_20190401_000856(Indahnya.jpg', '2019-11-22 03:06:35', '2019-11-22 03:06:35'),
(29, 'public/gallery/1574417389_IMG_20190401_001617 (Penenang dalam Perjalanan).jpg', '2019-11-22 03:09:49', '2019-11-22 03:09:49'),
(30, 'public/gallery/1574417804_DSC_00257 [].JPG', '2019-11-22 03:16:44', '2019-11-22 03:16:44'),
(31, 'public/gallery/1574417848_DSC_003618 [].JPG', '2019-11-22 03:17:28', '2019-11-22 03:17:28'),
(32, 'public/gallery/1574418302_imgonline-com-ua-resize-kpgh1lvDX8EYUh.jpg', '2019-11-22 03:25:02', '2019-11-22 03:25:02');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_11_18_041855_create_images_table', 1),
(4, '2020_04_19_040905_create_structures_table', 2),
(15, '2020_04_27_095043_create_arts_table', 3),
(16, '2020_04_27_095120_create_activities_table', 3),
(17, '2020_04_27_095247_create_profiles_table', 3),
(18, '2020_04_27_095335_create_creations_table', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `profiles`
--

CREATE TABLE `profiles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `logo` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `judul` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `sejarah` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci,
  `kontak` text COLLATE utf8mb4_unicode_ci,
  `email` text COLLATE utf8mb4_unicode_ci,
  `website` text COLLATE utf8mb4_unicode_ci,
  `instagram` text COLLATE utf8mb4_unicode_ci,
  `facebook` text COLLATE utf8mb4_unicode_ci,
  `twitter` text COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `profiles`
--

INSERT INTO `profiles` (`id`, `logo`, `judul`, `deskripsi`, `sejarah`, `alamat`, `kontak`, `email`, `website`, `instagram`, `facebook`, `twitter`) VALUES
(1, 'public/logo/etalase.png', 'UKMK Etalase', 'Etalase adalah Lorem ipsum dolor, sit amet consectetur adipisicing elit. Cumque ipsam quia architecto ad illo odio sapiente perferendis esse amet, maxime, necessitatibus ducimus. Inventore quis magnam commodi voluptas culpa exercitationem molestiae!', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Cumque ipsam quia architecto ad illo odio sapiente perferendis esse amet, maxime, necessitatibus ducimus. Inventore quis magnam commodi voluptas culpa exercitationem molestiae!', 'Jalan. Kalimantan No. 37, Kampus Tegalboto, Jember, Jawa Timur, 68121, Indonesia', NULL, NULL, 'https://etalase.lavinza.me', 'https://instagram.com/etalase.gallery', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `structures`
--

CREATE TABLE `structures` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nia` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jabatan` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `structures`
--

INSERT INTO `structures` (`id`, `nia`, `nama`, `jabatan`, `image`) VALUES
(1, 'UKMKE.4.2017.9', 'Cyril Adib Furqoni', 'Ketua Umum', 'public/noavatar.jpg'),
(2, 'UKMKE.5.2018.2', 'Niki B', 'Sekretaris Umum', 'public/noavatar.jpg'),
(3, 'UKMKE.4.2017.18', 'Nilam Wahidah', 'Bendahara Umum', 'public/noavatar.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Administrator', 'admin@etalase.media', NULL, '$2y$10$sZRB9GZ0IvUwgCqHbiPxgOMLKnCzGJ1YG99EpnSzMDUXziUd4wV..', NULL, '2019-11-17 21:21:20', '2019-11-17 21:21:20');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activities`
--
ALTER TABLE `activities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `activities_art_id_foreign` (`art_id`);

--
-- Indexes for table `arts`
--
ALTER TABLE `arts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `arts_nama_unique` (`nama`);

--
-- Indexes for table `creations`
--
ALTER TABLE `creations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `creations_art_id_foreign` (`art_id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `profiles`
--
ALTER TABLE `profiles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `structures`
--
ALTER TABLE `structures`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `structures_nia_unique` (`nia`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activities`
--
ALTER TABLE `activities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `arts`
--
ALTER TABLE `arts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `creations`
--
ALTER TABLE `creations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `profiles`
--
ALTER TABLE `profiles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `structures`
--
ALTER TABLE `structures`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `activities`
--
ALTER TABLE `activities`
  ADD CONSTRAINT `activities_art_id_foreign` FOREIGN KEY (`art_id`) REFERENCES `arts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `creations`
--
ALTER TABLE `creations`
  ADD CONSTRAINT `creations_art_id_foreign` FOREIGN KEY (`art_id`) REFERENCES `arts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
