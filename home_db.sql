-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 17, 2025 at 06:05 AM
-- Server version: 8.0.30
-- PHP Version: 8.3.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `home_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@example.com', '$2y$10$J6YkDqvsrjWeeHVW.b4DzeI8v3HZfruaTXLCP5thGHPD4Lg5rBw5G', 'KbXPpsJfOGHd7Tz34HASEG7oHNEWPCCxFRA1vpJitQVpXxBEKzlcYRxSKWXx', '2025-03-12 04:11:04', '2025-03-12 04:11:04'),
(2, 'Admin 2', 'admin2@example.com', '$2y$10$sVMT3cBidT4AmmKA9EZF5OH34QSCx1tNRVSpPF1YaHHzYbek9O68m', NULL, '2025-03-12 04:11:04', '2025-03-12 04:11:04');

-- --------------------------------------------------------

--
-- Table structure for table `beritas`
--

CREATE TABLE `beritas` (
  `id` bigint UNSIGNED NOT NULL,
  `judul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal` date NOT NULL,
  `caption` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gambar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `beritas`
--

INSERT INTO `beritas` (`id`, `judul`, `isi`, `tanggal`, `caption`, `gambar`, `created_at`, `updated_at`) VALUES
(1, 'Mahasiswa Universitas Semarang Melaksanakan Kegiatan Magang Di Yayasan Nurul Firdaus', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellat nam vel tempora inventore aspernatur omnis magnam nemo minima maxime eos eaque libero, molestiae eius, fuga voluptate beatae, magni id? Deleniti!', '2025-03-12', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellat nam vel tempora inventore aspernatur omnis magnam nemo minima maxime eos eaque libero, molestiae eius, fuga voluptate beatae, magni id? Deleniti!', 'berita/mwdRoD5NEwTDtAYy8HRs2NQ9tH5Qg6iOeArOBeDd.jpg', '2025-03-12 05:16:58', '2025-04-15 04:44:01'),
(2, 'Yayasan Nurul Firdaus Adakan Kegiatan Bakti Sosial di Desa Manggarmas', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellat nam vel tempora inventore aspernatur omnis magnam nemo minima maxime eos eaque libero, molestiae eius, fuga voluptate beatae, magni id? Deleniti!', '2025-03-14', 'Manggarmas - Mahasiswa Universitas Semarang melaksanakan Kegiatan magang di Yayasan Nurul Firdaus, dan meraka sukses menyelesaikan tugasnya dengan membuat sistem website untuk Yayayasan, Mts Dan Ma.', 'berita/8K1tWmRqm9OlQCeoIJOFiX1RpuTMld04poGbgsFk.jpg', '2025-03-14 00:03:09', '2025-04-15 04:43:25'),
(3, 'Penerimaan Siswa Baru Yayasan Nurul Firdaus Tahun Ajaran 2024/2025 Dibuka!', 'Siswa Yayasan Nurul Firdaus kembali menorehkan prestasi gemilang di ajang Olimpiade Sains Nasional (OSN). Dua siswa kami berhasil meraih medali perak dan perunggu dalam bidang Matematika dan Fisika.\r\n\r\nPrestasi ini merupakan kebanggaan bagi Yayasan Nurul Firdaus dan Kabupaten Grobogan. Kami berharap prestasi ini dapat memotivasi siswa lain untuk terus belajar dan berprestasi.', '2025-03-15', 'Mari bergabung bersama kami untuk meraih masa depan yang cerah!', 'berita/7f9RWRy54N7t0sLixdaliNBGLlUZpYflhLKhr62M.png', '2025-03-14 17:04:26', '2025-04-16 08:57:10'),
(4, 'Yayasan Nurul Firdaus Gelar Seminar Pendidikan dengan Tema \"Membangun Generasi Unggul', 'Yayasan Nurul Firdaus Adakan Kegiatan Bakti Sosial di Desa Manggarmas\r\n\r\nSebagai bentuk kepedulian terhadap masyarakat sekitar, Yayasan Nurul Firdaus mengadakan kegiatan bakti sosial di Desa Manggarmas. Kegiatan ini meliputi pembagian sembako, pemeriksaan kesehatan gratis, dan penyuluhan tentang pentingnya menjaga kebersihan lingkungan.\r\n\r\nKegiatan ini diikuti oleh seluruh siswa, guru, dan staf Yayasan Nurul Firdaus. Kami berharap kegiatan ini dapat memberikan manfaat bagi masyarakat Desa Manggarmas dan mempererat tali silaturahmi antara Yayasan Nurul Firdaus dan masyarakat sekitar.', '2025-03-14', 'Meningkatkan wawasan dan kualitas pendidikan di Yayasan Nurul Firdaus', 'berita/l6hLOdXtLMEjiqulI1JJC7ZcjjSDPfaqjfSyoRcb.png', '2025-03-14 18:52:42', '2025-04-16 08:56:46');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `carousels`
--

CREATE TABLE `carousels` (
  `id` bigint UNSIGNED NOT NULL,
  `slide_number` tinyint UNSIGNED NOT NULL,
  `image_path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carousels`
--

INSERT INTO `carousels` (`id`, `slide_number`, `image_path`, `created_at`, `updated_at`) VALUES
(2, 2, 'carousel/OfrdrDLuI4kgxCDMgdK4B0HUaoitAL8G2JjMmQpA.jpg', '2025-03-12 05:19:46', '2025-04-15 09:27:22'),
(6, 3, 'carousel/OGVy9nSTA7GqCQZ7uXdU5KONq5TUwtFHDdTIZV84.jpg', '2025-04-15 09:30:48', '2025-04-15 09:30:48');

-- --------------------------------------------------------

--
-- Table structure for table `carousel_ma`
--

CREATE TABLE `carousel_ma` (
  `id` int NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `carousel_mts`
--

CREATE TABLE `carousel_mts` (
  `id` int NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `carousel_mts`
--

INSERT INTO `carousel_mts` (`id`, `image`, `created_at`, `updated_at`) VALUES
(8, '1744820039.jpg', '2025-03-19 10:30:42', '2025-04-16 09:13:59'),
(10, '1744733220.jpg', '2025-03-19 10:31:07', '2025-04-15 09:07:00');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `gambar_jadwal_ppdb`
--

CREATE TABLE `gambar_jadwal_ppdb` (
  `id` bigint UNSIGNED NOT NULL,
  `gambar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gambar_jadwal_ppdb`
--

INSERT INTO `gambar_jadwal_ppdb` (`id`, `gambar`, `created_at`, `updated_at`) VALUES
(1, 'jadwal/ugRKNpxx3rKxeakXzB3sOPiuB68Teipd4U8kqGw5.png', '2025-03-27 19:51:19', '2025-04-15 06:14:18');

-- --------------------------------------------------------

--
-- Table structure for table `gambar_jadwal_p_p_d_b_s`
--

CREATE TABLE `gambar_jadwal_p_p_d_b_s` (
  `id` bigint UNSIGNED NOT NULL,
  `gambar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `gambar_kegiatan_p_p_d_b`
--

CREATE TABLE `gambar_kegiatan_p_p_d_b` (
  `id` bigint UNSIGNED NOT NULL,
  `gambar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gambar_kegiatan_p_p_d_b`
--

INSERT INTO `gambar_kegiatan_p_p_d_b` (`id`, `gambar`, `created_at`, `updated_at`) VALUES
(3, 'kegiatan/F6txjA7p6fGzqan8ETCKBUM0ASxd2Fu6z4mNUkZS.jpg', '2025-03-27 19:47:43', '2025-03-27 19:50:46'),
(5, 'kegiatan/VwKBNJ3z9jRJiNkxpQGM1cOHnzybGi7t5NiyNJnm.jpg', '2025-03-27 19:48:29', '2025-03-27 19:51:03'),
(6, 'kegiatan/u3jaZE27Ub9hhv5RwjD8ry48xlGXsAn5AlRMoieu.jpg', '2025-04-15 06:18:41', '2025-04-15 06:18:41');

-- --------------------------------------------------------

--
-- Table structure for table `gambar_menu_ppdb`
--

CREATE TABLE `gambar_menu_ppdb` (
  `id` bigint UNSIGNED NOT NULL,
  `background` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `gurus`
--

CREATE TABLE `gurus` (
  `id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `guru_ma`
--

CREATE TABLE `guru_ma` (
  `id` int NOT NULL,
  `nama` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `mapel` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `foto` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `guru_ma`
--

INSERT INTO `guru_ma` (`id`, `nama`, `mapel`, `foto`, `created_at`, `updated_at`) VALUES
(1, 'Rasmudi, S.Pd.I', 'Akidah Akhlak', '1742407169_Rasmudi.jpg', '2025-03-16 05:35:00', '2025-03-19 10:59:29'),
(2, 'Siti Fatimah, S.Pd.I', 'Fiqih', '1742271271_Siti Fatimah.jpg', '2025-03-16 05:38:34', '2025-03-17 21:14:31'),
(3, 'Naela Izzatur Rohmah', 'Qur\'an Hadits', '1742271354_Naela Izzatur.jpg', '2025-03-16 05:47:25', '2025-03-17 21:15:54'),
(8, 'Siti Nurkasanah,S.Pd.I', 'IPA', '1742271455_Siti Nurkasanah.jpg', '2025-03-17 06:33:09', '2025-03-17 21:17:35'),
(10, 'Khofifah Titan Palupi. S. Pd', 'Matematika', '1742271500_Khofifah.jpg', '2025-03-17 06:42:57', '2025-03-17 21:18:20'),
(11, 'Sukamti,S.Pd.I', 'Bahasa inggris', '1742271601_sukamti.jpg', '2025-03-17 07:04:01', '2025-03-17 21:20:01'),
(14, 'Murtinah, S.Pd.I', 'Bahasa Indonesia', '1742271670_murtinah.jpg', '2025-03-17 07:20:44', '2025-03-17 21:21:10'),
(15, 'Mujahidin,S.Pd.I', 'Fikih/SKI', '1742271735_mujahidin.jpg', '2025-03-17 07:21:29', '2025-03-17 21:22:15'),
(16, 'Tri Eva Handayani, S.Pd', 'Bahasa Jawa', '1742271811_Tri eva.jpg', '2025-03-17 07:22:25', '2025-03-17 21:23:31');

-- --------------------------------------------------------

--
-- Table structure for table `guru_mts`
--

CREATE TABLE `guru_mts` (
  `id` int NOT NULL,
  `nama` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `mapel` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `foto` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `guru_mts`
--

INSERT INTO `guru_mts` (`id`, `nama`, `mapel`, `foto`, `created_at`, `updated_at`) VALUES
(2, 'Rasmudi, S.Pd.I', 'Akidah Akhlak', '1742407302_Rasmudi.jpg', '2025-03-19 11:01:42', '2025-03-19 11:01:42'),
(3, 'Siti Fatimah, S.Pd.I', 'Fiqih', '1742407330_Siti Fatimah (1).jpg', '2025-03-19 11:02:10', '2025-03-19 11:02:10'),
(4, 'Naela Izzatur Rohmah', 'Qur\'an Hadits', '1742407356_Naela Izzatur.jpg', '2025-03-19 11:02:36', '2025-03-19 11:02:36'),
(5, 'Siti Nurkasanah,S.Pd.I', 'IPA', '1742407379_Siti Nurkasanah.jpg', '2025-03-19 11:02:59', '2025-03-19 11:02:59'),
(6, 'Khofifah Titan Palupi. S. Pd', 'Matematika', '1742407410_Khofifah.jpg', '2025-03-19 11:03:30', '2025-03-19 11:03:30'),
(7, 'Sukamti,S.Pd.I', 'Bahasa inggris', '1742407464_sukamti.jpg', '2025-03-19 11:04:24', '2025-03-19 11:04:24'),
(8, 'Murtinah, S.Pd.I', 'Bahasa Indonesia', '1742407493_murtinah.jpg', '2025-03-19 11:04:53', '2025-03-19 11:04:53'),
(9, 'Mujahidin,S.Pd.I', 'Fikih/SKI', '1742407523_mujahidin.jpg', '2025-03-19 11:05:23', '2025-03-19 11:05:23'),
(10, 'Tri Eva Handayani, S.Pd', 'Bahasa Jawa', '1742407554_Tri eva.jpg', '2025-03-19 11:05:54', '2025-03-19 11:05:54');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `queue` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kegiatan_ma`
--

CREATE TABLE `kegiatan_ma` (
  `id` bigint UNSIGNED NOT NULL,
  `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kegiatan_ma`
--

INSERT INTO `kegiatan_ma` (`id`, `nama`, `foto`, `created_at`, `updated_at`) VALUES
(5, 'Upacara 17 Agustus', 'uploads/kegiatan_ma/1742276349_IMG_20240817_082719 (1).jpg', '2025-03-16 10:43:57', '2025-03-17 22:39:09'),
(6, 'Camping Pramuka', 'uploads/kegiatan_ma/1742276493_IMG_20240824_210056 (1).jpg', '2025-03-16 10:45:27', '2025-03-17 22:41:33'),
(7, 'Belajar Bahasa Arab', 'uploads/kegiatan_ma/1742276585_IMG_20240716_115705 (1).jpg', '2025-03-16 10:58:31', '2025-03-17 22:43:05'),
(9, 'Buka Bersama', 'uploads/kegiatan_ma/1742276688_IMG_20240716_182108 (1).jpg', '2025-03-17 22:44:48', '2025-03-17 22:44:48'),
(10, 'Sholat Berjama\'ah', 'uploads/kegiatan_ma/1742276781_IMG_20240716_175809 (1).jpg', '2025-03-17 22:46:21', '2025-03-17 22:46:21');

-- --------------------------------------------------------

--
-- Table structure for table `kegiatan_mts`
--

CREATE TABLE `kegiatan_mts` (
  `id` int NOT NULL,
  `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `foto` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kegiatan_mts`
--

INSERT INTO `kegiatan_mts` (`id`, `nama`, `foto`, `created_at`, `updated_at`) VALUES
(1, 'Upacara 17 Agustus', 'uploads/kegiatan_ma/1742407724_IMG_20240817_082719 (1).jpg', '2025-03-19 11:08:45', '2025-03-19 11:13:13'),
(3, 'Camping Pramuka', 'uploads/kegiatan_ma/1742408011_IMG_20240824_210056 (1).jpg', '2025-03-19 11:13:31', '2025-03-19 11:13:31'),
(4, 'Buka Bersama', 'uploads/kegiatan_ma/1742408033_IMG_20240716_182108 (1).jpg', '2025-03-19 11:13:53', '2025-03-19 11:14:09'),
(5, 'Belajar Bahasa Arab', 'uploads/kegiatan_ma/1742408079_IMG_20240716_115705 (1).jpg', '2025-03-19 11:14:39', '2025-03-19 11:14:39'),
(6, 'Sholat Berjama\'ah', 'uploads/kegiatan_ma/1742408106_IMG_20240716_175809 (1).jpg', '2025-03-19 11:15:06', '2025-03-19 11:15:06');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2025_03_12_110110_create_admins_table', 2),
(6, '2025_03_12_110347_create_beritas_table', 3),
(7, '2025_03_12_110532_create_sambutans_table', 4),
(8, '2025_03_12_110727_create_strukturals_table', 5),
(9, '2025_03_12_111157_create_carousels_table', 6),
(10, '2025_03_03_055655_create_gambar_menu_ppdb_table', 7),
(11, '2025_03_03_114444_create_gambar_jadwal_p_p_d_b_s_table', 7),
(12, '2025_03_04_074133_create_gambar_jadwal_ppdb_table', 7),
(13, '2025_03_05_015734_create_gambar_kegiatan_ppdb_table', 7);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pendaftaran`
--

CREATE TABLE `pendaftaran` (
  `id` bigint UNSIGNED NOT NULL,
  `nisn` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_lengkap` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_kk` varchar(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nik` varchar(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tempat_lahir` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `nama_ayah` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_ibu` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_hp` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `sekolah_asal` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `prestasi` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `bukti_prestasi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `program_pilihan` enum('MA','MTS') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_verifikasi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Tidak Terverifikasi',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pendaftaran`
--

INSERT INTO `pendaftaran` (`id`, `nisn`, `nama_lengkap`, `no_kk`, `nik`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `nama_ayah`, `nama_ibu`, `email`, `no_hp`, `alamat`, `sekolah_asal`, `prestasi`, `bukti_prestasi`, `program_pilihan`, `status_verifikasi`, `created_at`, `updated_at`) VALUES
(2, '1111111111', 'samsul arif', '1111111111111111', '1111111111111111', 'Laki-laki', 'semarang', '2008-09-08', 'gunawan', 'mama', 'awikwok@gmail.com', '089729338398', 'jalan manggarmas', 'SMANDA', NULL, NULL, 'MA', 'Sudah Diverifikasi', '2025-01-31 20:03:31', '2025-02-01 20:16:31'),
(8, '2378923288', 'Naufal', '1112233435346459', '1233409877876878', 'Laki-laki', 'Semarang', '9133-02-12', 'apasih', 'Fransisca', 'ELSAAA@gmail.com', '0887655675', 'jateng', 'Theresiana', 'juara basket', NULL, 'MA', 'Sudah Diverifikasi', '2025-02-04 05:54:35', '2025-02-04 05:55:17'),
(9, '2378923280', 'Kim', '1112233435346451', '1233409877876870', 'Laki-laki', 'Semarang', '2025-02-03', 'apasih', 'Fransisca', 'ELSAAA@gmail.com', '0887655675', 'jateng', 'Theresiana', NULL, NULL, 'MTS', 'Sudah Diverifikasi', '2025-02-15 06:25:27', '2025-03-31 22:32:27'),
(11, '2580359032', 'yanto samosa', '3535939684386099', '6896898989898989', 'Laki-laki', 'merauke', '2025-03-18', 'gunawan', 'elsa', 'ELSAAA@gmail.com', '0868498279298', 'Kendal, Jawa tengah', 'Theresiana', NULL, NULL, 'MTS', 'Tidak Terverifikasi', '2025-03-21 01:16:04', '2025-03-21 01:16:04');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sambutans`
--

CREATE TABLE `sambutans` (
  `id` bigint UNSIGNED NOT NULL,
  `nama_kepala` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sambutan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto_kepala` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sambutans`
--

INSERT INTO `sambutans` (`id`, `nama_kepala`, `sambutan`, `foto_kepala`, `created_at`, `updated_at`) VALUES
(1, 'Dr. Wafda Vivid Izziyana, S.H., M.H.', 'Selamat datang di website resmi Yayasan Nurul Firdaus, yang menaungi MTs Nurul Firdaus dan MA Nurul Firdaus. Website ini kami hadirkan sebagai media informasi resmi untuk seluruh siswa, orang tua, guru, serta masyarakat. Melalui platform ini, kami berharap dapat memberikan kemudahan dalam mengakses berbagai informasi terkait kegiatan, program, serta perkembangan pendidikan di lingkungan Yayasan Nurul Firdaus.TERIMA KASIH.', 'sambutan/RIMaGcBVsCW1mifwOF1ZYhDOT9iH4CyM18B5LdRU.jpg', '2025-03-14 17:51:47', '2025-04-15 04:52:21');

-- --------------------------------------------------------

--
-- Table structure for table `sambutan_ma`
--

CREATE TABLE `sambutan_ma` (
  `id` bigint UNSIGNED NOT NULL,
  `foto` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `sambutan` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sambutan_ma`
--

INSERT INTO `sambutan_ma` (`id`, `foto`, `nama`, `sambutan`, `created_at`, `updated_at`) VALUES
(1, 'img/1742376906.jpg', 'Naufal Baskara, STh.I., M.Si', 'Selamat datang di website resmi Yayasan Nurul Firdaus, yang menaungi MTs Nurul Firdaus dan MA Nurul Firdaus. Website ini kami hadirkan sebagai media informasi resmi untuk seluruh siswa, orang tua, guru, serta masyarakat. Melalui Platform ini, kami berharap dapat memberikan kemudahan dalam mengakses berbagai informasi terkait kegiatan, program, serta perkembangan pendidikan di lingkungan Yayasan Nurul Firdaus.', NULL, '2025-03-19 02:35:06');

-- --------------------------------------------------------

--
-- Table structure for table `sambutan_mts`
--

CREATE TABLE `sambutan_mts` (
  `id` int NOT NULL,
  `foto` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nama` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `sambutan` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sambutan_mts`
--

INSERT INTO `sambutan_mts` (`id`, `foto`, `nama`, `sambutan`, `updated_at`) VALUES
(1, 'img/1742406414.jpg', 'Bu Ira', 'Selamat datang di website resmi Yayasan Nurul Firdaus, yang menaungi MTs Nurul Firdaus dan MA Nurul Firdaus. Website ini kami hadirkan sebagai media informasi resmi untuk seluruh siswa, orang tua, guru, serta masyarakat. Melalui platform ini, kami berharap dapat memberikan kemudahan dalam mengakses berbagai informasi terkait kegiatan, program, serta perkembangan pendidikan di lingkungan Yayasan Nurul Firdaus.', '2025-03-19 10:46:54');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sosmed_ma`
--

CREATE TABLE `sosmed_ma` (
  `id` int NOT NULL,
  `name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `url` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sosmed_ma`
--

INSERT INTO `sosmed_ma` (`id`, `name`, `url`, `created_at`, `updated_at`) VALUES
(1, '1742150546_tiktok.png', 'https://www.tiktok.com/@user7520780304813?_t=ZS-8ukkyRQp4oq&_r=1', '2025-03-16 18:31:05', '2025-03-17 00:54:20'),
(2, '1742150546_facebook.png', 'https://www.facebook.com', '2025-03-16 18:31:05', '2025-03-16 11:42:26'),
(3, '1742150546_linkedin.png', 'https://www.linkedin.com', '2025-03-16 18:31:45', '2025-03-16 11:42:26'),
(4, '1742150546_instagram.png', 'https://www.instagram.com', '2025-03-16 18:31:45', '2025-03-16 11:42:26');

-- --------------------------------------------------------

--
-- Table structure for table `sosmed_mts`
--

CREATE TABLE `sosmed_mts` (
  `id` int NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `url` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sosmed_mts`
--

INSERT INTO `sosmed_mts` (`id`, `name`, `url`, `created_at`, `updated_at`) VALUES
(1, '1742410193_1742150546_tiktok.png', 'https://www.tiktok.com/@user7520780304813?_t=ZS-8ukkyRQp4oq&_r=1', '2025-03-19 18:40:24', '2025-03-19 11:49:53'),
(2, '1742410193_1742150546_facebook.png', 'https://www.facebook.com', '2025-03-19 18:40:24', '2025-03-19 11:52:45'),
(3, '1742410193_1742150546_linkedin.png', 'https://www.linkedin.com', '2025-03-19 18:41:35', '2025-03-19 11:54:08'),
(4, '1742410193_1742150546_instagram.png', 'https://www.instagram.com', '2025-03-19 18:41:35', '2025-03-19 11:54:08');

-- --------------------------------------------------------

--
-- Table structure for table `strukturals`
--

CREATE TABLE `strukturals` (
  `id` bigint UNSIGNED NOT NULL,
  `image_path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `strukturals`
--

INSERT INTO `strukturals` (`id`, `image_path`, `created_at`, `updated_at`) VALUES
(1, 'struktural/NCVEunR2Al9mjpQS0ubI9oOKrctU9yMzv0QQ0u9a.png', '2025-03-14 19:46:15', '2025-04-16 08:54:32');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `beritas`
--
ALTER TABLE `beritas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `carousels`
--
ALTER TABLE `carousels`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `carousels_slide_number_unique` (`slide_number`);

--
-- Indexes for table `carousel_ma`
--
ALTER TABLE `carousel_ma`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `carousel_mts`
--
ALTER TABLE `carousel_mts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `gambar_jadwal_ppdb`
--
ALTER TABLE `gambar_jadwal_ppdb`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gambar_jadwal_p_p_d_b_s`
--
ALTER TABLE `gambar_jadwal_p_p_d_b_s`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gambar_kegiatan_p_p_d_b`
--
ALTER TABLE `gambar_kegiatan_p_p_d_b`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gambar_menu_ppdb`
--
ALTER TABLE `gambar_menu_ppdb`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gurus`
--
ALTER TABLE `gurus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `guru_ma`
--
ALTER TABLE `guru_ma`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `guru_mts`
--
ALTER TABLE `guru_mts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kegiatan_ma`
--
ALTER TABLE `kegiatan_ma`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kegiatan_mts`
--
ALTER TABLE `kegiatan_mts`
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
-- Indexes for table `pendaftaran`
--
ALTER TABLE `pendaftaran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `sambutans`
--
ALTER TABLE `sambutans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `strukturals`
--
ALTER TABLE `strukturals`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `beritas`
--
ALTER TABLE `beritas`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `carousels`
--
ALTER TABLE `carousels`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gambar_jadwal_ppdb`
--
ALTER TABLE `gambar_jadwal_ppdb`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `gambar_jadwal_p_p_d_b_s`
--
ALTER TABLE `gambar_jadwal_p_p_d_b_s`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gambar_kegiatan_p_p_d_b`
--
ALTER TABLE `gambar_kegiatan_p_p_d_b`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `gambar_menu_ppdb`
--
ALTER TABLE `gambar_menu_ppdb`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `pendaftaran`
--
ALTER TABLE `pendaftaran`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sambutans`
--
ALTER TABLE `sambutans`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `strukturals`
--
ALTER TABLE `strukturals`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
