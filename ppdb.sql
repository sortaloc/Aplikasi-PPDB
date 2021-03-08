-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 08 Mar 2021 pada 15.51
-- Versi server: 10.4.17-MariaDB
-- Versi PHP: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ppdb`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `admins`
--

INSERT INTO `admins` (`id`, `nama`, `username`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Bagus', 'bagus', '$2y$10$Uxjz6H/S5rq.R9YHDtoXleMjKJdh/3vv34eNT8/fFKiAKPGiOVea6', NULL, '2021-02-15 07:30:17', '2021-02-23 08:52:05');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dokumens`
--

CREATE TABLE `dokumens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_user` int(11) NOT NULL,
  `akta` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `skhun` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ijazah` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ktp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pkh` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kip` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kps` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `dokumens`
--

INSERT INTO `dokumens` (`id`, `id_user`, `akta`, `skhun`, `ijazah`, `kk`, `ktp`, `pkh`, `kip`, `kps`, `created_at`, `updated_at`) VALUES
(9, 1, 'akta1234912.jpg', 'skhun1234912.jpg', 'ijazah1234912.jpg', 'kk1234912.jpg', 'ktp1234912.jpg', '-', '-', '-', '2021-03-04 16:49:12', '2021-03-04 09:57:03'),
(10, 2, 'akta2133524.jpg', 'skhun2133524.jpg', 'ijazah2133524.jpg', 'kk2133524.jpg', 'ktp2133524.jpg', 'pkh2133524.jpg', '-', '-', '2021-03-08 06:35:24', '2021-03-08 06:35:24');

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
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `gurus`
--

CREATE TABLE `gurus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nip` int(11) NOT NULL,
  `nuptk` int(11) NOT NULL,
  `tahun_masuk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pendidikan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tempat_lahir` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jk` enum('Laki-laki','Perempuan') COLLATE utf8mb4_unicode_ci NOT NULL,
  `agama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_hp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `gurus`
--

INSERT INTO `gurus` (`id`, `nip`, `nuptk`, `tahun_masuk`, `nama`, `pendidikan`, `tempat_lahir`, `tanggal_lahir`, `jk`, `agama`, `alamat`, `no_hp`, `email`, `foto`, `created_at`, `updated_at`) VALUES
(4, 2345, 2345, '2019', 'Mikasa Ackerman', 'SMP 1 Tokyo', 'Tokyo, Jepang', '1998-02-01', 'Perempuan', 'Kristen', 'Tokyo', '83113530785', 'mikasa@gmail.com', '2345205222.png', '2021-02-23 13:52:22', '2021-02-23 13:52:22'),
(5, 3456, 3456, '2020', 'Eren Jaeger', 'S1 Ipa', 'Paradise', '1998-03-31', 'Laki-laki', 'Paradise', 'Paradise', '09283387', 'eren@gmail.com', '3456210932.png', '2021-02-25 14:09:32', '2021-03-03 09:33:32'),
(6, 4567, 4567, '2018', 'Sasuke Uchiha', 'S1 Bahasa Jawa', 'Konoha Gakure', '1995-08-23', 'Laki-laki', 'Ninjutsu', 'konoha Gakure', '3742643643', 'sasuke@gmail.com', '4567202855.png', '2021-02-27 13:28:55', '2021-02-27 13:28:55'),
(7, 1234, 1234, '2019', 'Naruto Uzumaki', 'Genin Konoha Gakure', 'Konoha gakure', '1995-03-04', 'Laki-laki', 'Ninja', 'Konoha gakure', '1234567', 'naruto@gmail.com', '1234201307.jpg', '2021-03-07 13:13:07', '2021-03-07 13:13:07');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelas`
--

CREATE TABLE `kelas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_kelas` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_guru` int(11) NOT NULL,
  `wali_kelas` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kelas`
--

INSERT INTO `kelas` (`id`, `nama_kelas`, `id_guru`, `wali_kelas`, `created_at`, `updated_at`) VALUES
(1, '7A', 7, 'Naruto Uzumaki', '2021-02-22 17:33:09', '2021-03-07 06:14:40'),
(4, '7B', 6, 'Sasuke Uchiha', '2021-02-23 07:22:33', '2021-03-07 06:14:48'),
(5, '7C', 4, 'Mikasa Ackerman', '2021-02-23 07:22:41', '2021-02-23 07:22:41'),
(6, '7D', 5, 'Eren Jaeger', '2021-03-07 06:15:02', '2021-03-07 06:15:02');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kritiksarans`
--

CREATE TABLE `kritiksarans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pesan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `latarbelakangs`
--

CREATE TABLE `latarbelakangs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sejarah` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `visi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `misi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `latarbelakangs`
--

INSERT INTO `latarbelakangs` (`id`, `sejarah`, `visi`, `misi`, `created_at`, `updated_at`) VALUES
(4, 'SMP Akatsuki dibangun pada tahun 2008', 'Membuat dunia damai tanpa peperangan', 'Mugen Sukoyome', '2021-03-07 23:40:03', '2021-03-07 23:40:03');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mapels`
--

CREATE TABLE `mapels` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_mapel` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kkm` int(11) NOT NULL,
  `guru_mapel` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `mapels`
--

INSERT INTO `mapels` (`id`, `nama_mapel`, `kkm`, `guru_mapel`, `created_at`, `updated_at`) VALUES
(4, 'Matematika', 75, 'Sasuke Uchiha', '2021-02-25 04:01:39', '2021-03-07 06:13:50'),
(5, 'Bahasa Inggris', 80, 'Naruto Uzumaki', '2021-02-25 04:02:14', '2021-03-07 06:13:38'),
(6, 'Bahasa Indonesia', 85, 'Mikasa Ackerman', '2021-02-25 04:02:28', '2021-02-27 06:25:40'),
(7, 'Ilmu Pengetahuan Alam', 80, 'Eren Jaeger', '2021-02-25 07:09:52', '2021-02-27 06:26:12');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mapel_ujians`
--

CREATE TABLE `mapel_ujians` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_mapel` int(11) NOT NULL,
  `nama_mapel` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kkm` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `waktu` int(11) NOT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `mapel_ujians`
--

INSERT INTO `mapel_ujians` (`id`, `id_mapel`, `nama_mapel`, `kkm`, `jumlah`, `waktu`, `foto`, `created_at`, `updated_at`) VALUES
(2, 4, 'Matematika', 70, 10, 20, '4230401.jpg', '2021-02-26 16:04:01', '2021-02-27 13:42:00'),
(3, 7, 'Ilmu Pengetahuan Alam', 75, 10, 20, '7231253.png', '2021-02-26 16:04:26', '2021-03-07 15:16:17'),
(4, 6, 'Bahasa Indonesia', 80, 20, 25, '6231433.jpg', '2021-02-26 16:14:33', '2021-02-27 13:41:09'),
(5, 5, 'Bahasa Inggris', 75, 20, 25, '5231456.jpg', '2021-02-26 16:14:56', '2021-02-27 13:41:44');

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
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_02_14_092858_create_admins_table', 1),
(5, '2021_02_15_134640_create_pendaftarans_table', 1),
(6, '2021_02_17_170148_create_dokumens_table', 2),
(7, '2021_02_21_161950_create_pendaftarans_table', 3),
(8, '2021_02_22_135644_create_gurus_table', 4),
(9, '2021_02_22_142141_create_pendaftarans_table', 4),
(10, '2021_02_22_225536_create_kelas_table', 5),
(11, '2021_02_23_142944_create_siswas_table', 6),
(12, '2021_02_23_160055_create_waktus_table', 6),
(13, '2021_02_25_091034_create_mapels_table', 7),
(14, '2021_02_25_095501_create_soals_table', 8),
(15, '2021_02_26_125949_create_nilais_table', 9),
(16, '2021_02_26_145215_create_mapel_ujians_table', 10),
(17, '2021_03_02_053130_create_tagihans_table', 11),
(18, '2021_03_05_141005_create_latarbelakangs_table', 12),
(19, '2021_03_07_065725_create_kritiksarans_table', 13);

-- --------------------------------------------------------

--
-- Struktur dari tabel `nilais`
--

CREATE TABLE `nilais` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_user` int(11) NOT NULL,
  `tanggal_ujian` date NOT NULL,
  `id_mapel` int(11) NOT NULL,
  `nama_mapel` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kkm` int(11) NOT NULL,
  `nilai` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `nilais`
--

INSERT INTO `nilais` (`id`, `id_user`, `tanggal_ujian`, `id_mapel`, `nama_mapel`, `kkm`, `nilai`, `created_at`, `updated_at`) VALUES
(4, 1, '2021-03-05', 4, 'Matematika', 70, 30, '2021-03-04 17:14:43', '2021-03-04 17:14:43'),
(5, 2, '2021-03-08', 7, 'Ilmu Pengetahuan Alam', 75, 100, '2021-03-08 06:36:46', '2021-03-08 06:36:46');

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
-- Struktur dari tabel `pendaftarans`
--

CREATE TABLE `pendaftarans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_user` int(11) NOT NULL,
  `nisn` int(11) NOT NULL,
  `tanggal_pendaftaran` date NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tempat_lahir` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jk` enum('Laki-laki','Perempuan') COLLATE utf8mb4_unicode_ci NOT NULL,
  `agama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_ayah` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_ibu` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pekerjaan_ayah` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `pekerjaan_ibu` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `tempat_tinggal` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `asal_sekolah` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `transportasi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pendaftarans`
--

INSERT INTO `pendaftarans` (`id`, `id_user`, `nisn`, `tanggal_pendaftaran`, `nama`, `tempat_lahir`, `tanggal_lahir`, `jk`, `agama`, `alamat`, `nama_ayah`, `nama_ibu`, `pekerjaan_ayah`, `pekerjaan_ibu`, `tempat_tinggal`, `asal_sekolah`, `transportasi`, `foto`, `status`, `created_at`, `updated_at`) VALUES
(4, 1, 1234, '2021-03-04', 'Bagus Firgiawan Prakoso', 'Tegal', '1997-08-24', 'Laki-laki', 'Islam', 'Jl. H.Utsman No.06 RT 04 RW 04 desa Cimohong Kec. Bulakamba Kab. Brebes', 'Ayah Bagus', 'Ibu bagus', 'Dagang', 'Guru', 'Bersama Orang Tua', 'SD Cimohong 03', 'Jalan Kaki', '1234354.jpg', 'Proses', '2021-03-04 16:43:16', '2021-03-04 16:43:54'),
(5, 2, 2345, '2021-03-08', 'Rem', 'Brebes', '2003-09-04', 'Perempuan', 'Islam', 'Cimohong', 'Ayah Zahra', 'Ibu Zahra', 'Dagang', 'Masak', 'Bersama Orang Tua', 'SD Cimohong 03', 'Jalan Kaki', '2133401.jpg', 'Proses', '2021-03-08 06:34:01', '2021-03-08 06:53:20');

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswas`
--

CREATE TABLE `siswas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nisn` int(11) NOT NULL,
  `nis` int(11) NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kelas` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tempat_lahir` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jk` enum('Laki-laki','Perempuan') COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `soals`
--

CREATE TABLE `soals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_mapel` int(11) NOT NULL,
  `nama_mapel` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `soal` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `A` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `B` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `C` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `D` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `E` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `jawaban` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `soals`
--

INSERT INTO `soals` (`id`, `id_mapel`, `nama_mapel`, `soal`, `A`, `B`, `C`, `D`, `E`, `jawaban`, `created_at`, `updated_at`) VALUES
(6, 4, 'Matematika', '-35 x 5 + (-15) = ...', '-180', '-190', '180', '190', '-350', 'B', '2021-02-26 09:25:34', '2021-02-26 18:30:27'),
(7, 4, 'Matematika', '20 x ( 80 : 5 ) - ( 16 + 9 ) = n, n adalah ...', '295', '313', '327', '345', '334', 'A', '2021-02-26 17:50:38', '2021-02-26 18:28:20'),
(8, 4, 'Matematika', 'Hasil Pengerjaan 2.786 + 390 : 26 adalah ...', '122', '2801', '3202', '3378', '2981', 'B', '2021-02-26 18:01:28', '2021-02-26 18:01:28'),
(9, 4, 'Matematika', 'Ani membeli 4 keranjang buah mangga. Tiap keranjang berisi 15 buah. Ternyata setelah dibuka ada 8 buah mangga yang busuk. Kemudian Ani membeli lagi 25 buah mangga. jadi, buah mangga Ani yang masih segar sekarang ada ... buah.', '52', '77', '85', '88', '93', 'B', '2021-02-26 18:06:19', '2021-02-26 18:06:19'),
(10, 4, 'Matematika', 'Di warung Serba Ada tersedia  17 karung gula pasir masing-masing berisi 95 kg. Hari ini warung Serba Ada menerima kiriman gula seberat 125 kg, berat gula di warung Serba Ada sekarang adalah ...', '237', '1615', '1740', '2145', '2021', 'C', '2021-02-26 18:21:32', '2021-02-26 18:21:32'),
(11, 4, 'Matematika', 'Hasil dari -40 + [20 x (-12)] : 4 adalah ...', '70', '-180', '100', '-70', '-100', 'E', '2021-02-26 18:33:33', '2021-02-26 18:33:33'),
(12, 4, 'Matematika', 'Uang Ella : Uang Frita, 2 : 3 sedangkan Uang Frita : Uang Salma 4 : 5. Jika selisih uang Ella dan Salma Rp. 350.000, maka jumlah uang mereka adalah ...', 'Rp. 1.000.000', 'Rp. 1.150.000', 'Rp. 1.350.000', 'Rp. 1.750.000', 'Rp. 1.650.000', 'D', '2021-02-26 18:37:38', '2021-02-26 18:37:38'),
(13, 4, 'Matematika', 'Jarak kota Solo dan kota Semarang 140 km. Kota tersebut digambar dengan skala 1 : 700.000, maka jarak kedua kota pada peta adalah ...', '2 cm', '20 cm', '200 cm', '2000 cm', '20000 cm', 'B', '2021-02-26 18:39:47', '2021-02-26 18:39:47'),
(14, 4, 'Matematika', 'Umur ayah 48 tahun dan umur ibu 40 tahun. Perbandingan umur ayah dan ibu adalah', '6 : 5', '5 : 6', '8 : 4', '4 : 8', '8 : 0', 'A', '2021-02-26 18:44:50', '2021-02-26 18:44:50'),
(15, 4, 'Matematika', 'Kelipatan terkecil (KPK) dari 36, 60 dan 80 adalah ...', '45', '90', '180', '720', '120', 'D', '2021-02-26 19:23:49', '2021-02-26 19:23:49'),
(16, 7, 'Ilmu Pengetahuan Alam', 'Tumbuhan bakau hidup di daerah pantai. Manfaat utama bagi lingkungan adalah ...', 'Mencegah terjadinya gelombang tsunami', 'Tempat hidup hewan laut', 'Menggemburkan tanah pantai', 'Mencegah terjadinya abrasi pantai', 'A dan B benar', 'D', '2021-03-01 08:44:31', '2021-03-01 08:44:31'),
(17, 7, 'Ilmu Pengetahuan Alam', 'Tumbuhan paku memiliki sporogonium yang berfungsi untuk ...', 'Membantu pernafasan', 'Menghasilkan sel kelamin betina', 'Menghasilkan sel kelamin jantan', 'Membantu proses penyerbukan', 'Menghasilkan fotosintesis', 'B', '2021-03-01 08:51:25', '2021-03-01 08:51:25'),
(18, 7, 'Ilmu Pengetahuan Alam', 'Pemerintah membuat undang - undang perlindungan terhadap hewan tertentu yang hampir punah, tujuanya adalah ...', 'Agar hewan lain tidak ikut punah', 'Mendapat penghargaan dunia', 'Menarik wisatawan mancanegara', 'Menjaga keseimbangan ekosistem', 'Dapat dijual ke mancanegara', 'D', '2021-03-01 08:54:25', '2021-03-01 08:54:25'),
(19, 7, 'Ilmu Pengetahuan Alam', 'Ciri-ciri tumbuhan kaktus adalah ...', 'Berdaun lebar', 'Batang berongga dan daun lebar', 'batang berair dan daun kecil', 'Batang besar dan daun lebar', 'Batang berair dan daun lebar', 'C', '2021-03-01 10:21:37', '2021-03-01 10:21:37'),
(20, 7, 'Ilmu Pengetahuan Alam', 'Hewan berikut yang dilindungi UU adalah ...', 'Harimau, Sapi, Banteng', 'Badak, Banteng, Ular', 'Buaya, Bunglon, Biawak', 'Gajah, Kera, kambing', 'Harimau, Komodo, Cendrawasih', 'E', '2021-03-07 06:26:46', '2021-03-07 06:26:46'),
(21, 7, 'Ilmu Pengetahuan Alam', 'Urutan metamorphosis hewan dibawah ini yang benar adalah ...', 'Telur -> Larva -> Pupa -> Jentik-jentik -> Nyamuk', 'Telur -> Larva -> Pupa -> Nyamuk -> Jentik-jentik -> Telur', 'Teur -> Berudu -> Katak berekor -> Katak dewasa', 'Telur -> Kepompong -> Kupu-kupu -> Ulat', 'Telur -> Pupa -> Kecoa muda -> Kecoa dewasa', 'C', '2021-03-07 06:47:09', '2021-03-07 06:47:09'),
(22, 7, 'Ilmu Pengetahuan Alam', 'Perhatikan bentuk hubungan antara dua makhluk hidup berikut!\r\n1. Ikan hiu dengan ikan remora\r\n2. Cacing perut yang hidup dalam tubuh manusia\r\n3. Bunga sepatu dengan kupu-kupu\r\n4. Tumbuhan benalu dengan pohon yang ditumpangi\r\n5. Kutu yang hidup dirambut manusia', '1, 2, dan 3', '1, 3 dan 4', '1, 4 dan 5', '2, 4 dan 5', '3, 4 dan 5', 'D', '2021-03-07 06:51:53', '2021-03-07 06:51:53'),
(23, 7, 'Ilmu Pengetahuan Alam', 'Pohon randu pada musim kemarau beradaptasi dengan cara ...', 'Mempunyai duri pada batangnya', 'Berakar tunggang untuk menyimpan cadangan air', 'Menggugurkan rantingnya', 'Mempunyai kambium untuk memperbesar batangnya', 'Menggugurkan daunya', 'E', '2021-03-07 06:55:29', '2021-03-07 06:55:29'),
(24, 7, 'Ilmu Pengetahuan Alam', 'Tumbuhan sangat dibutuhkan makhluk hidup karena ...', 'Fotosintesis menghasilkan oksigen untuk bernafas', 'Tumbuhan menghasilkan kayu untuk bahan bangunan', 'Makanan pokok manusia dihasilkan oleh tumbuhan', 'Hewan ternak memperoleh makanan dari tumbuhan', 'Burung mendapat makanan dari tumbuhan', 'A', '2021-03-07 07:07:04', '2021-03-07 07:07:04'),
(25, 7, 'Ilmu Pengetahuan Alam', 'Berikut merupakan faktor yang menyebabkan hewan terancam punah yaitu ...', 'Pembentukan hutan lindung', 'Tidak menjual hewan langka', 'Penangkaran hewan langka', 'Penanaman pohon', 'Penebangan pohon', 'E', '2021-03-07 08:15:52', '2021-03-07 08:15:52'),
(26, 6, 'Bahasa Indonesia', 'sadad', 'dsdsa', 'ddfsfs', 'fsfsf', 'fsfsfs', 'fsf', 'A', '2021-03-07 21:58:09', '2021-03-07 21:58:09'),
(27, 6, 'Bahasa Indonesia', 'fsdfs', 'fsfs', 'frsfsf', 'ffsfs', 'ffdf', 'ff', 'A', '2021-03-07 21:59:32', '2021-03-07 21:59:32');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tagihans`
--

CREATE TABLE `tagihans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_tagihan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah_tagihan` int(11) NOT NULL,
  `batas` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tagihans`
--

INSERT INTO `tagihans` (`id`, `nama_tagihan`, `jumlah_tagihan`, `batas`, `created_at`, `updated_at`) VALUES
(1, 'Pendaftaran Pertama', 50000, '2021-03-30', '2021-03-02 00:05:31', '2021-03-02 00:15:06'),
(4, 'Pendaftaran Kedua', 100000, '2021-03-31', '2021-03-02 00:17:42', '2021-03-02 00:17:42');

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
(1, 'Bagus Firgiawan Prakoso', '1234', NULL, '$2y$10$ts.e0W..QxDWjaR3vi6lyu/Pag2hDp0Yc/rIuq0Di6LUNoVDqCRQ.', NULL, '2021-02-15 23:28:02', '2021-03-04 09:43:40'),
(2, 'Rem', '2345', NULL, '$2y$10$PRbK2se4pDavGvyBk1qx6eGKrM/d7Iji2xy2VxXVWrdXBeUUQl2TO', NULL, '2021-02-17 01:05:14', '2021-03-08 06:53:20'),
(3, 'Andi', '3456', NULL, '$2y$10$hcV8jseKZ3MeGMlmnLjifub9zYzRlwD4uCHafuNISMJ53CEq.cirq', NULL, '2021-02-21 21:03:49', '2021-02-21 21:03:49'),
(4, 'Akhmad', '4567', NULL, '$2y$10$5O.iHkgIALn9M9m8qFwZEul33desIzZUeDXsOx0LRjq24fCQRkYcW', NULL, '2021-02-21 21:04:16', '2021-02-21 21:04:16'),
(5, 'Cacha Santika', '5678', NULL, '$2y$10$xcc18uLTp5/jQ/gY/NtGPunkWHogKqO.yKj2mqlKsxUGSrbg7AVcq', NULL, '2021-02-21 21:05:08', '2021-02-21 21:05:08'),
(6, 'Dedy Jaya', '6789', NULL, '$2y$10$QjpMpeTYdqfGP.tLwOQ3S.FsIjt4oVPnonsTsME4dCAw8ku43FfkO', NULL, '2021-02-21 21:05:44', '2021-02-21 21:05:44'),
(7, 'Dewi Sri', '7890', NULL, '$2y$10$UhVjDeIkl90MvoRWYWKfce0oMf5Ua5beUys0KPeiF.pU2JUkcW8CW', NULL, '2021-02-21 21:06:03', '2021-02-21 21:06:03'),
(8, 'Eren Jaeger', '8901', NULL, '$2y$10$fz5geZtmY67L1NZXd8rrqeZaK.Pn53MEm3tFMJykAup2fZVccX7b2', NULL, '2021-02-21 21:06:32', '2021-02-21 21:06:32'),
(9, 'Levi Ackerman', '9012', NULL, '$2y$10$.6vnRn5tx0D4nrrq2txdYu6qgXHkOJPLldqoy9qRVO4puvunG5I4S', NULL, '2021-02-21 21:06:50', '2021-02-21 21:06:50'),
(10, 'Mikasa Ackerman', '0123', NULL, '$2y$10$XmXk19V1l.9q6PQokXJC8O9ZkwFHk.MrvJ2qe5WyrY29AlKGvJf7i', NULL, '2021-02-21 21:07:51', '2021-02-21 21:07:51'),
(11, 'Armin Arlert', '0987', NULL, '$2y$10$8ANCa9xC8gGZGnuGw8Fxt.Opeo1IkHjkr770OrwnlndOefvOThxym', NULL, '2021-02-21 21:08:24', '2021-02-21 21:08:24'),
(12, 'Subkhan Juli', '9876', NULL, '$2y$10$NiweIO4kWbizLwWbMcTfrupPXwCrPmCKwvlhmKC.Fp0A2mrLRRIeu', NULL, '2021-02-21 21:09:21', '2021-02-21 21:09:21'),
(13, 'Kaneki Ken', '8765', NULL, '$2y$10$3C/c6anBwKWf6RutCJjX2.d2ljw9FZmZ8VSLvyco4Su1z/cfTyFYa', NULL, '2021-02-21 21:10:00', '2021-02-21 21:10:00'),
(14, 'Natsuki Subaru', '7654', NULL, '$2y$10$dAltcUXm89JvSjAtTYIv3OnVY4l49WbpWqweWEccf0cclKdZLgJsW', NULL, '2021-02-21 21:10:30', '2021-02-21 21:10:30'),
(15, 'Kirito', '6543', NULL, '$2y$10$JGRjY2qfBPuQT3YoFmZHlumLtqHMTXINvsA.yRCIJ76xElvixVotq', NULL, '2021-02-21 21:11:08', '2021-02-21 21:11:08'),
(16, 'Asuna', '5432', NULL, '$2y$10$AylzhyVg.qeFj.eQ9qf1KucVV1BgyKm9CsH50Uedlf2UZJ5Q07bMC', NULL, '2021-02-21 21:11:25', '2021-02-21 21:11:25'),
(17, 'Saitama', '4321', NULL, '$2y$10$ptIKTvgahZlJHYRWYmn1zO9NMKdiqng2nfbl/po/d4ifDyynQobt2', NULL, '2021-02-21 21:12:14', '2021-02-21 21:29:44');

-- --------------------------------------------------------

--
-- Struktur dari tabel `waktus`
--

CREATE TABLE `waktus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `jenis` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `buka` date NOT NULL,
  `tutup` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `waktus`
--

INSERT INTO `waktus` (`id`, `jenis`, `buka`, `tutup`, `created_at`, `updated_at`) VALUES
(6, 'ujian', '2021-03-07', '2021-04-07', '2021-03-05 23:01:12', '2021-03-07 06:15:41'),
(7, 'pendaftaran', '2021-03-07', '2021-04-07', '2021-03-05 23:01:23', '2021-03-07 08:17:17');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `dokumens`
--
ALTER TABLE `dokumens`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `gurus`
--
ALTER TABLE `gurus`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `gurus_nip_unique` (`nip`),
  ADD UNIQUE KEY `gurus_nuptk_unique` (`nuptk`),
  ADD UNIQUE KEY `gurus_email_unique` (`email`);

--
-- Indeks untuk tabel `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kelas_nama_kelas_unique` (`nama_kelas`),
  ADD UNIQUE KEY `Id_guru` (`id_guru`);

--
-- Indeks untuk tabel `kritiksarans`
--
ALTER TABLE `kritiksarans`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `latarbelakangs`
--
ALTER TABLE `latarbelakangs`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `mapels`
--
ALTER TABLE `mapels`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `mapel_ujians`
--
ALTER TABLE `mapel_ujians`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `mapel_ujians_id_mapel_unique` (`id_mapel`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `nilais`
--
ALTER TABLE `nilais`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `pendaftarans`
--
ALTER TABLE `pendaftarans`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pendaftarans_nisn_unique` (`nisn`);

--
-- Indeks untuk tabel `siswas`
--
ALTER TABLE `siswas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `siswas_nisn_unique` (`nisn`),
  ADD UNIQUE KEY `siswas_nis_unique` (`nis`);

--
-- Indeks untuk tabel `soals`
--
ALTER TABLE `soals`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tagihans`
--
ALTER TABLE `tagihans`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indeks untuk tabel `waktus`
--
ALTER TABLE `waktus`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `dokumens`
--
ALTER TABLE `dokumens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `gurus`
--
ALTER TABLE `gurus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `kritiksarans`
--
ALTER TABLE `kritiksarans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `latarbelakangs`
--
ALTER TABLE `latarbelakangs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `mapels`
--
ALTER TABLE `mapels`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `mapel_ujians`
--
ALTER TABLE `mapel_ujians`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `nilais`
--
ALTER TABLE `nilais`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `pendaftarans`
--
ALTER TABLE `pendaftarans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `siswas`
--
ALTER TABLE `siswas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `soals`
--
ALTER TABLE `soals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT untuk tabel `tagihans`
--
ALTER TABLE `tagihans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `waktus`
--
ALTER TABLE `waktus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
