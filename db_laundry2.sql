-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 29 Mar 2021 pada 03.24
-- Versi server: 5.7.24
-- Versi PHP: 7.4.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_laundry2`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `cart`
--

CREATE TABLE `cart` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `invoice_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `outlet_id` bigint(20) UNSIGNED NOT NULL,
  `pay_date` date DEFAULT NULL,
  `deadline` date DEFAULT NULL,
  `paket_id` bigint(20) UNSIGNED NOT NULL,
  `weight` int(11) DEFAULT NULL,
  `sub_total` int(11) DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `cart`
--

INSERT INTO `cart` (`id`, `invoice_code`, `date`, `outlet_id`, `pay_date`, `deadline`, `paket_id`, `weight`, `sub_total`, `user_id`, `created_at`, `updated_at`) VALUES
(3, 'INV00000006', '2021-03-20 22:16:54', 1, '2021-03-20', '2021-03-20', 3, 2, 4000, 2, '2021-03-20 15:18:49', '2021-03-20 15:18:49');

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `log_activity`
--

CREATE TABLE `log_activity` (
  `id` int(10) UNSIGNED NOT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `method` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ip` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `agent` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `log_activity`
--

INSERT INTO `log_activity` (`id`, `subject`, `url`, `method`, `ip`, `agent`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'User admin@gmail.comLogin Pada 2021-03-20 11:07:21', 'http://localhost:8000/login', 'POST', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/89.0.4389.90 Safari/537.36', 2, '2021-03-20 04:07:21', '2021-03-20 04:07:21'),
(2, 'User admin@gmail.com Login Pada 2021-03-20 11:13:19', 'http://localhost:8000/login', 'POST', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/89.0.4389.90 Safari/537.36', 2, '2021-03-20 04:13:19', '2021-03-20 04:13:19'),
(3, 'User admin@gmail.com Login Pada 2021-03-20 11:15:44', 'http://localhost:8000/login', 'POST', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/89.0.4389.90 Safari/537.36', 2, '2021-03-20 04:15:44', '2021-03-20 04:15:44'),
(4, 'User admin@gmail.com Login Pada 2021-03-20 11:46:23', 'http://localhost:8000/login', 'POST', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/89.0.4389.90 Safari/537.36', 2, '2021-03-20 04:46:23', '2021-03-20 04:46:23'),
(5, 'User admin@gmail.com Login Pada 2021-03-20 11:47:21', 'http://localhost:8000/login', 'POST', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/89.0.4389.90 Safari/537.36', 2, '2021-03-20 04:47:21', '2021-03-20 04:47:21'),
(6, 'User admin Logout Pada 2021-03-20 11:47:59', 'http://localhost:8000/logout', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/89.0.4389.90 Safari/537.36', 2, '2021-03-20 04:47:59', '2021-03-20 04:47:59'),
(7, 'User admin@gmail.com Login Pada 2021-03-20 11:48:18', 'http://localhost:8000/login', 'POST', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/89.0.4389.90 Safari/537.36', 2, '2021-03-20 04:48:18', '2021-03-20 04:48:18'),
(8, 'User admin Logout Pada 2021-03-20 11:48:46', 'http://localhost:8000/logout', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/89.0.4389.90 Safari/537.36', 2, '2021-03-20 04:48:46', '2021-03-20 04:48:46'),
(9, 'User admin@gmail.com Login Pada 2021-03-20 11:49:17', 'http://localhost:8000/login', 'POST', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/89.0.4389.90 Safari/537.36', 2, '2021-03-20 04:49:17', '2021-03-20 04:49:17'),
(10, 'Menambahkan Member Fatkur', 'http://localhost:8000/admin/member', 'POST', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/89.0.4389.90 Safari/537.36', 2, '2021-03-20 04:53:01', '2021-03-20 04:53:01'),
(11, 'Mengupdate Member sas', 'http://localhost:8000/admin/member/update/1', 'POST', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/89.0.4389.90 Safari/537.36', 2, '2021-03-20 05:00:32', '2021-03-20 05:00:32'),
(12, 'Menghapus Member', 'http://localhost:8000/admin/member/delete/1', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/89.0.4389.90 Safari/537.36', 2, '2021-03-20 05:01:06', '2021-03-20 05:01:06'),
(13, 'Menambahkan Member contoh', 'http://localhost:8000/admin/member', 'POST', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/89.0.4389.90 Safari/537.36', 2, '2021-03-20 05:01:40', '2021-03-20 05:01:40'),
(14, 'Mengupdate Member sas', 'http://localhost:8000/admin/member/update/1', 'POST', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/89.0.4389.90 Safari/537.36', 2, '2021-03-20 05:03:27', '2021-03-20 05:03:27'),
(15, 'Mengupdate Member sas', 'http://localhost:8000/admin/member/update/1', 'POST', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/89.0.4389.90 Safari/537.36', 2, '2021-03-20 05:41:52', '2021-03-20 05:41:52'),
(16, 'Mengupdate Member Aan Febriyan', 'http://localhost:8000/admin/member/update/2', 'POST', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/89.0.4389.90 Safari/537.36', 2, '2021-03-20 05:43:13', '2021-03-20 05:43:13'),
(17, 'User admin Logout Pada 2021-03-20 13:32:32', 'http://localhost:8000/logout', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/89.0.4389.90 Safari/537.36', 2, '2021-03-20 06:32:32', '2021-03-20 06:32:32'),
(18, 'User admin@gmail.com Login Pada 2021-03-20 13:37:04', 'http://localhost:8000/login', 'POST', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/89.0.4389.90 Safari/537.36', 2, '2021-03-20 06:37:05', '2021-03-20 06:37:05'),
(19, 'User admin Logout Pada 2021-03-20 13:45:47', 'http://localhost:8000/logout', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/89.0.4389.90 Safari/537.36', 2, '2021-03-20 06:45:47', '2021-03-20 06:45:47'),
(20, 'User admin@gmail.com Login Pada 2021-03-20 13:46:47', 'http://localhost:8000/login', 'POST', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/89.0.4389.90 Safari/537.36', 2, '2021-03-20 06:46:47', '2021-03-20 06:46:47'),
(21, 'User admin Logout Pada 2021-03-20 14:41:11', 'http://localhost:8000/logout', 'GET', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/89.0.4389.90 Safari/537.36', 2, '2021-03-20 07:41:11', '2021-03-20 07:41:11'),
(22, 'User admin@gmail.com Login Pada 2021-03-20 14:41:27', 'http://localhost:8000/login', 'POST', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/89.0.4389.90 Safari/537.36', 2, '2021-03-20 07:41:27', '2021-03-20 07:41:27'),
(23, 'User admin@gmail.com Login Pada 2021-03-20 21:35:19', 'http://localhost:8000/login', 'POST', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/89.0.4389.90 Safari/537.36', 2, '2021-03-20 14:35:19', '2021-03-20 14:35:19');

-- --------------------------------------------------------

--
-- Struktur dari tabel `member`
--

CREATE TABLE `member` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` enum('L','P') COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `member`
--

INSERT INTO `member` (`id`, `name`, `email`, `address`, `gender`, `phone_number`, `created_at`, `updated_at`) VALUES
(1, 'sas', 'sas@gmail.com', 'gsha', 'L', '221627', '2021-03-09 18:34:45', '2021-03-20 05:41:52'),
(2, 'Aan Febriyan', 'aan@gmail.com', 'sdhsgdsdgfsgfsdgfsda', 'L', '08058848239', '2021-03-12 00:05:25', '2021-03-20 05:43:13'),
(3, 'Fatkur', '', 'sasdadsdfasd', 'L', '088328372436573', '2021-03-20 04:53:01', '2021-03-20 04:53:01'),
(4, 'contoh', '', 'e2e2', 'L', '3438483748', '2021-03-20 05:01:40', '2021-03-20 05:01:40'),
(5, 'djaskdjah', '', 'dsjdhsgdhgsdfghsft', 'L', '93298323782', '2021-03-20 05:04:49', '2021-03-20 05:04:49'),
(6, 'AKbar', '', 'Jepara', 'L', '08327348374', '2021-03-20 05:10:19', '2021-03-20 05:10:19'),
(7, 'feyto', '', 'Bumiharjo', 'L', '088228740010', '2021-03-20 05:15:04', '2021-03-20 05:15:04'),
(8, 'Pandu', 'pandu@gmail.com', 'Semarang', 'L', '088228740010', '2021-03-20 06:47:38', '2021-03-20 06:47:38');

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
(1, '2014_10_12_100000_create_password_resets_table', 1),
(2, '2019_08_19_000000_create_failed_jobs_table', 1),
(3, '2021_03_05_154137_create_permission_tables', 1),
(4, '2021_03_07_230117_create_outlet_table', 1),
(5, '2021_03_07_230420_create_users_table', 2),
(6, '2021_03_07_230600_create_member_table', 3),
(7, '2021_03_07_230649_create_paket_table', 4),
(8, '2021_03_07_230757_create_transaction_table', 5),
(9, '2021_03_07_230906_create_transaction_detail_table', 6),
(10, '2021_03_10_010115_add_columns_to_users_table', 7),
(11, '2021_03_18_081903_create_cart_table', 8),
(12, '2021_03_19_102937_create_transaction_detail_table', 9),
(13, '2021_03_19_103335_create_transaction_table', 10),
(14, '2021_03_19_103438_create_transaction_detail_table', 10),
(15, '2021_03_19_104704_create_transaction_detail_table', 11),
(16, '2021_03_19_110545_create_transaction_detail_table', 12),
(17, '2021_03_19_110917_create_transaction_detail_table', 13),
(18, '2021_03_19_111745_create_transaction_table', 14),
(19, '2021_03_19_112232_create_transaction_table', 15),
(20, '2021_03_20_103726_create_logactivity_table', 16),
(21, '2021_03_20_105153_create_log_activity_table', 17),
(22, '2021_03_20_105954_create_log_activity_table', 18);

-- --------------------------------------------------------

--
-- Struktur dari tabel `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 2),
(2, 'App\\Models\\User', 3),
(1, 'App\\Models\\User', 5),
(3, 'App\\Models\\User', 6);

-- --------------------------------------------------------

--
-- Struktur dari tabel `outlet`
--

CREATE TABLE `outlet` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `outlet`
--

INSERT INTO `outlet` (`id`, `name`, `address`, `phone_number`, `created_at`, `updated_at`) VALUES
(1, 'contoh', 'Bumiharjo', '088228740010', '2021-03-08 03:19:57', '2021-03-09 18:29:46'),
(2, 'contoh', 'saj', '0323236243653', '2021-03-09 18:28:54', '2021-03-20 01:18:45'),
(3, 'Aan Febriyan', 'Ktftggtg', '08058848239', '2021-03-10 06:52:19', '2021-03-10 06:52:19'),
(4, 'hdsjhdjhj', 'ahdjshda', '2932837', '2021-03-20 05:02:17', '2021-03-20 05:02:17'),
(5, 'Jaya', 'Bumiharjo', '08327632', '2021-03-20 05:09:18', '2021-03-20 05:09:18');

-- --------------------------------------------------------

--
-- Struktur dari tabel `paket`
--

CREATE TABLE `paket` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `outlet_id` bigint(20) UNSIGNED NOT NULL,
  `type` enum('kiloan','selimut','bed_cover','kaos','lain') COLLATE utf8mb4_unicode_ci NOT NULL,
  `paket_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `paket`
--

INSERT INTO `paket` (`id`, `outlet_id`, `type`, `paket_name`, `price`, `created_at`, `updated_at`) VALUES
(1, 2, 'selimut', 'hjs', 2000, '2021-03-09 18:38:58', '2021-03-09 18:38:58'),
(2, 1, 'selimut', 'contohkk', 9000, '2021-03-17 23:28:17', '2021-03-17 23:28:17'),
(3, 4, 'bed_cover', 'Paket Express', 2000, '2021-03-20 05:08:48', '2021-03-20 05:08:48');

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
-- Struktur dari tabel `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Administrator', 'web', '2021-03-07 16:18:26', '2021-03-07 16:18:26'),
(2, 'Kasir', 'web', '2021-03-07 16:18:26', '2021-03-07 16:18:26'),
(3, 'Owner', 'web', '2021-03-07 16:18:26', '2021-03-07 16:18:26');

-- --------------------------------------------------------

--
-- Struktur dari tabel `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaction`
--

CREATE TABLE `transaction` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `invoice_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `member_id` bigint(20) UNSIGNED NOT NULL,
  `additional_cost` int(11) DEFAULT NULL,
  `discon` int(11) NOT NULL,
  `tax` int(11) NOT NULL,
  `status` enum('baru','proses','selesai','diambil') COLLATE utf8mb4_unicode_ci NOT NULL,
  `paid` enum('dibayar','belum_dibayar') COLLATE utf8mb4_unicode_ci NOT NULL,
  `sub_total` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pay_total` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `dibayar` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kembalian` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `transaction`
--

INSERT INTO `transaction` (`id`, `invoice_code`, `date`, `member_id`, `additional_cost`, `discon`, `tax`, `status`, `paid`, `sub_total`, `pay_total`, `user_id`, `created_at`, `updated_at`, `dibayar`, `kembalian`) VALUES
(5, 'INV00000001', '2021-03-19', 1, 2, 200, 10, 'proses', 'dibayar', '18000', '39602', 2, '2021-03-19 06:35:06', '2021-03-20 06:24:19', '39602', NULL),
(6, 'INV00000002', '2021-03-19', 2, 5, 1, 10, 'baru', 'belum_dibayar', '47000', '51700', 2, '2021-03-19 14:47:15', '2021-03-19 14:47:15', NULL, NULL),
(7, 'INV00000003', '2021-03-20', 1, 200, 50, 10, 'baru', 'belum_dibayar', '9000', '5150', 2, '2021-03-20 01:45:59', '2021-03-20 01:45:59', NULL, NULL),
(8, 'INV00000004', '2021-03-20', 1, 200, 50, 10, 'baru', 'dibayar', '9000', '5150', 2, '2021-03-20 01:48:04', '2021-03-20 02:41:14', '6000', NULL),
(9, 'INV00000005', '2021-03-20', 8, 2000, 500, 10, 'baru', 'dibayar', '36000', '41100', 2, '2021-03-20 06:49:04', '2021-03-20 06:50:16', '50000', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaction_detail`
--

CREATE TABLE `transaction_detail` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `invoice_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `paket_id` bigint(20) UNSIGNED NOT NULL,
  `outlet_id` bigint(20) UNSIGNED NOT NULL,
  `pay_date` date NOT NULL,
  `deadline` date NOT NULL,
  `weight` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `transaction_detail`
--

INSERT INTO `transaction_detail` (`id`, `invoice_code`, `paket_id`, `outlet_id`, `pay_date`, `deadline`, `weight`, `created_at`, `updated_at`) VALUES
(5, 'INV00000001', 2, 3, '2021-03-19', '2021-03-19', 2, NULL, NULL),
(6, 'INV00000002', 2, 2, '2021-03-19', '2021-03-26', 5, NULL, NULL),
(7, 'INV00000002', 1, 3, '2021-03-19', '2021-03-19', 1, NULL, NULL),
(8, 'INV00000003', 2, 1, '2021-03-20', '2021-03-20', 1, NULL, NULL),
(9, 'INV00000004', 2, 1, '2021-03-20', '2021-03-20', 1, NULL, NULL),
(10, 'INV00000005', 2, 2, '2021-03-20', '2021-03-20', 1, NULL, NULL),
(11, 'INV00000005', 2, 2, '2021-03-20', '2021-03-23', 3, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `outlet_id` bigint(20) UNSIGNED NOT NULL,
  `status` int(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `password`, `photo`, `outlet_id`, `status`, `created_at`, `updated_at`) VALUES
(2, 'admin', 'Administrator', 'admin@gmail.com', '$2y$10$I3rLPOU6nQZTkCSXiQoFTeqZaZbl0I9DMxQUJbtC5W98zRDLbhPPy', '1615339106_09597c6863c22f68cc63cbb2c6b42a72.jpg', 1, 1, '2021-03-08 03:23:04', '2021-03-09 18:18:26'),
(3, 'kasir', 'Kasir', 'kasir@gmail.com', '$2y$10$P6c8NVgh2ihqIu4g8kyHMOf5ze2/0AAQs8nx0LpbkzyFle1mvnAz.', '1616203020_09597c6863c22f68cc63cbb2c6b42a72.jpg', 1, 1, '2021-03-08 03:23:05', '2021-03-20 01:17:00'),
(5, 'admin', 'admin', 'admin1@gmail.com', '$2y$10$fay/wXqmyDt11voaqcai2O3qk7kXs0E2SnkR7fr7EYBSnfCVjL/w2', '1615338676_wk.png', 1, 0, '2021-03-09 18:11:16', '2021-03-11 22:17:39'),
(6, 'Owner', 'owner', 'owner@gmail.com', '$2y$10$RTPglMrAM60NqgyoNv8Q8uyswmklwUxsZjHMNGrAJDJm73cmnBzLG', '1616203075_09597c6863c22f68cc63cbb2c6b42a72.jpg', 1, 1, '2021-03-20 01:17:55', '2021-03-20 01:17:55');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cart_outlet_id_foreign` (`outlet_id`),
  ADD KEY `cart_paket_id_foreign` (`paket_id`),
  ADD KEY `cart_user_id_foreign` (`user_id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `log_activity`
--
ALTER TABLE `log_activity`
  ADD PRIMARY KEY (`id`),
  ADD KEY `log_activity_user_id_foreign` (`user_id`);

--
-- Indeks untuk tabel `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indeks untuk tabel `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indeks untuk tabel `outlet`
--
ALTER TABLE `outlet`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `paket`
--
ALTER TABLE `paket`
  ADD PRIMARY KEY (`id`),
  ADD KEY `paket_outlet_id_foreign` (`outlet_id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indeks untuk tabel `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indeks untuk tabel `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indeks untuk tabel `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transaction_member_id_foreign` (`member_id`),
  ADD KEY `transaction_user_id_foreign` (`user_id`);

--
-- Indeks untuk tabel `transaction_detail`
--
ALTER TABLE `transaction_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transaction_detail_paket_id_foreign` (`paket_id`),
  ADD KEY `transaction_detail_outlet_id_foreign` (`outlet_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `users_outlet_id_foreign` (`outlet_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `cart`
--
ALTER TABLE `cart`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `log_activity`
--
ALTER TABLE `log_activity`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT untuk tabel `member`
--
ALTER TABLE `member`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `outlet`
--
ALTER TABLE `outlet`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `paket`
--
ALTER TABLE `paket`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `transaction`
--
ALTER TABLE `transaction`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `transaction_detail`
--
ALTER TABLE `transaction_detail`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_outlet_id_foreign` FOREIGN KEY (`outlet_id`) REFERENCES `outlet` (`id`),
  ADD CONSTRAINT `cart_paket_id_foreign` FOREIGN KEY (`paket_id`) REFERENCES `paket` (`id`),
  ADD CONSTRAINT `cart_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Ketidakleluasaan untuk tabel `log_activity`
--
ALTER TABLE `log_activity`
  ADD CONSTRAINT `log_activity_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `paket`
--
ALTER TABLE `paket`
  ADD CONSTRAINT `paket_outlet_id_foreign` FOREIGN KEY (`outlet_id`) REFERENCES `outlet` (`id`);

--
-- Ketidakleluasaan untuk tabel `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `transaction`
--
ALTER TABLE `transaction`
  ADD CONSTRAINT `transaction_member_id_foreign` FOREIGN KEY (`member_id`) REFERENCES `member` (`id`),
  ADD CONSTRAINT `transaction_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Ketidakleluasaan untuk tabel `transaction_detail`
--
ALTER TABLE `transaction_detail`
  ADD CONSTRAINT `transaction_detail_outlet_id_foreign` FOREIGN KEY (`outlet_id`) REFERENCES `outlet` (`id`),
  ADD CONSTRAINT `transaction_detail_paket_id_foreign` FOREIGN KEY (`paket_id`) REFERENCES `paket` (`id`);

--
-- Ketidakleluasaan untuk tabel `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_outlet_id_foreign` FOREIGN KEY (`outlet_id`) REFERENCES `outlet` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
