-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 29, 2025 at 04:40 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `berita_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Teknologi', '2025-05-12 22:50:46', '2025-05-12 22:50:46'),
(2, 'Politik', '2025-05-12 22:50:46', '2025-05-12 22:50:46'),
(3, 'Hiburan', '2025-05-12 22:50:46', '2025-05-12 22:50:46');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `post_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `content` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `post_id`, `user_id`, `name`, `email`, `content`, `created_at`, `updated_at`) VALUES
(5, 39, 5, 'admin', 'admin@gmail.com', 'menarik', '2025-07-17 00:19:26', '2025-07-17 00:19:26'),
(6, 39, 4, 'udin', 'udin@gmail.com', 'tak sabar nak tunggu', '2025-07-17 00:20:09', '2025-07-17 00:20:09'),
(7, 23, 10, 'marcell', 'marcell@gmail.com', 'keren', '2025-07-17 09:10:09', '2025-07-17 09:10:09');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(4, '2025_05_13_054743_create_categories_table', 1),
(5, '2025_05_13_054832_create_posts_table', 1),
(6, '2025_05_21_061905_create_users_table', 2),
(7, '2025_06_02_063246_add_role_to_users_table', 3),
(8, '2025_07_17_065109_create_comments_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `content`, `image`, `created_at`, `updated_at`, `user_id`) VALUES
(23, 'Apple Resmi Umumkan iPhone 16 dengan Fitur Revolusioner dan Desain Lebih Segar', 'Apple secara resmi meluncurkan iPhone 16 dalam sebuah acara megah yang digelar di Apple Park, Cupertino, dan disiarkan secara global. Peluncuran ini menjadi sorotan utama di dunia teknologi, karena Apple membawa sejumlah inovasi baru yang menjawab ekspektasi pengguna. Dengan tetap mempertahankan identitas desain khas iPhone, seri terbaru ini memperkenalkan berbagai penyempurnaan yang memperkuat posisinya sebagai salah satu ponsel premium terbaik di pasaran.\r\n\r\nSalah satu peningkatan paling mencolok adalah penggunaan chip A18 Bionic, yang dirancang khusus untuk memberikan kinerja lebih cepat dengan efisiensi daya yang tinggi. Apple mengklaim bahwa chip ini mampu menangani tugas berat seperti gaming, pengeditan video 4K, hingga multitasking dengan lebih mulus tanpa menguras baterai secara signifikan. Selain itu, sistem pendingin baru turut ditanamkan untuk menjaga suhu perangkat tetap stabil meskipun digunakan dalam intensitas tinggi.\r\n\r\nDari segi tampilan, iPhone 16 hadir dengan desain yang lebih modern. Bezel layar kini lebih tipis, memberikan pengalaman visual yang lebih imersif. Apple juga memperkenalkan varian warna baru yang elegan seperti Midnight Blue dan Rose Titanium, yang menambah daya tarik estetika perangkat ini. Desain baru ini tidak hanya mempercantik tampilan, tetapi juga mempertahankan ketahanan dan kenyamanan penggunaan sehari-hari.\r\n\r\nKamera iPhone 16 turut mendapatkan perhatian khusus, terutama dalam hal fotografi malam. Sensor baru dan pemrosesan gambar berbasis AI memungkinkan hasil foto di kondisi minim cahaya menjadi lebih terang dan tajam tanpa kehilangan detail. Fitur-fitur kamera lainnya seperti Smart HDR, Cinematic Mode, dan ProRAW juga mengalami peningkatan. iPhone 16 dijadwalkan mulai tersedia di pasaran pada bulan September mendatang, dengan harga yang bervariasi tergantung model dan kapasitas penyimpanan yang dipilih.', 'images/pSXssm4uhM6PLScCLqKTEuxtB99hQeVuP8ivr4ag.png', '2025-06-30 00:24:56', '2025-06-30 00:28:48', 0),
(38, 'Planetshakers Guncang Panggung dengan Lagu “All About You”, Membawa Pesan Harapan untuk Generasi Ini', 'Grup musik rohani ternama Planetshakers kembali mengguncang panggung dengan lagu mereka yang penuh semangat, “All About You”. Dalam konser terbaru mereka, ribuan orang memenuhi arena dengan tangan terangkat, menyanyikan lirik yang membawa suasana penyembahan yang mendalam. Suasana menjadi semakin hidup dengan tata cahaya yang megah dan semangat dari setiap personel Planetshakers yang tampil dengan penuh energi.\r\n\r\nLagu “All About You” sendiri menjadi salah satu anthem penyembahan yang mengingatkan generasi muda untuk kembali memusatkan hidup mereka kepada Tuhan, apapun keadaan yang sedang dihadapi. Dengan musik modern dan lirik yang sederhana namun dalam, Planetshakers berhasil menjembatani generasi muda untuk merasakan sukacita dan pengharapan dalam penyembahan yang penuh semangat.\r\n\r\nTidak hanya sekadar konser, momen ini juga menjadi ajakan untuk banyak orang agar tidak menyerah dalam menghadapi tantangan kehidupan. Melalui konser ini, Planetshakers ingin menyampaikan bahwa setiap orang berharga dan memiliki tujuan dalam hidupnya. Lagu-lagu mereka mengingatkan bahwa di tengah kekhawatiran dan kesibukan, selalu ada harapan yang dapat ditemukan ketika seseorang menyerahkan hidupnya kepada Tuhan.\r\n\r\nPlanetshakers terus menjadi penggerak dalam penyembahan modern dengan semangat yang konsisten dalam setiap konser mereka di berbagai negara. Dengan kombinasi musik yang energik, lirik yang menguatkan, dan penampilan panggung yang profesional, mereka menjadi inspirasi bagi banyak generasi untuk terus memuji Tuhan dengan sukacita, tidak hanya di gereja tetapi juga dalam kehidupan sehari-hari.', 'posts/Ayrp3Moy7fXaYikos5TPYD2ytmTpuBOGjhxFq6Dh.jpg', '2025-07-16 23:30:55', '2025-07-16 23:30:55', 3),
(39, 'Trailer Cyberpunk: Edgerunners Season 2 Resmi Dirilis, Siap Mengguncang Netflix dengan Cerita yang Lebih Gelap', 'Setelah penantian panjang para penggemar, Netflix resmi merilis trailer terbaru untuk Cyberpunk: Edgerunners Season 2 kemarin, yang langsung menjadi perbincangan hangat di media sosial. Trailer ini menghadirkan nuansa neon khas Night City dengan visual yang lebih memukau dan atmosfer yang lebih gelap, menjanjikan kelanjutan cerita yang penuh aksi, drama, dan konflik emosional yang lebih intens.\r\n\r\nDalam trailer terbaru, terlihat beberapa karakter baru yang akan memperkaya alur cerita, serta menghadirkan cuplikan pertarungan brutal dengan animasi yang semakin detail dan sinematik. Studio Trigger tetap mempertahankan gaya animasinya yang khas, memadukan kecepatan aksi dengan sentuhan warna neon yang menghidupkan dunia cyberpunk. Tidak hanya itu, trailer juga memperlihatkan latar cerita yang akan mengeksplorasi sisi gelap teknologi dan pengkhianatan di Night City.\r\n\r\nCyberpunk: Edgerunners Season 2 ini akan membawa penonton lebih dalam ke kisah para edgerunners, mereka yang hidup di pinggiran Night City dengan risiko tinggi demi bertahan hidup. Season baru ini juga disebut akan menjawab banyak pertanyaan yang masih menggantung di season pertama dan memperlihatkan dampak dari pilihan-pilihan yang diambil oleh para karakternya dalam dunia yang keras dan kejam.\r\n\r\nDengan hype yang semakin tinggi setelah perilisan trailernya, banyak penggemar yang sudah tidak sabar untuk menyaksikan bagaimana kisah ini akan berlanjut di Netflix. Serial ini dijadwalkan tayang pada akhir tahun ini dan menjadi salah satu anime yang paling dinanti, dengan harapan dapat mengulang kesuksesan besar yang telah dicapai oleh season pertamanya pada tahun lalu.', 'posts/3M2Mnb82wPDNAaoRPdidJYIbQ7n8z0K2Wxw6KaYF.png', '2025-07-16 23:37:08', '2025-07-16 23:37:08', 4),
(40, 'Demon Slayer: Infinity Castle Tayang Juli Ini, Arc Penentu Pertarungan Terakhir Tanjiro dan Kawan-Kawan!', 'Penggemar anime Demon Slayer akhirnya dapat bernafas lega, karena arc Infinity Castle resmi tayang pada Juli ini. Arc yang sangat dinantikan ini akan menjadi babak penentu perjalanan Tanjiro Kamado dan para pembasmi iblis dalam menghadapi Muzan Kibutsuji.\r\n\r\nArc Infinity Castle akan mengadaptasi bagian klimaks dari manga karya Koyoharu Gotouge, memperlihatkan pertarungan intens antara para Hashira melawan Upper Moon dan Muzan di kastil yang penuh dengan lorong dan ruangan misterius. Para penggemar dapat menantikan animasi spektakuler dari ufotable yang sebelumnya sukses membawa Mugen Train dan Swordsmith Village Arc menjadi trending secara global.\r\n\r\nPenayangan ini dipastikan akan tayang pada Juli 2025 di Jepang, dan akan segera tersedia secara streaming di platform resmi seperti Crunchyroll dan Netflix beberapa saat setelah penayangan perdana. Trailer terbaru yang dirilis menunjukkan adegan pertarungan sengit Rengoku, Giyu, dan Tanjiro melawan Upper Moon, serta suasana kastil yang kelam dengan detail visual yang memukau.\r\n\r\nBanyak penggemar berharap arc ini akan menghadirkan animasi dengan kualitas sinematik seperti yang terlihat pada Mugen Train dan akan menjadi salah satu anime paling ramai dibicarakan pada musim panas ini.\r\n\r\nTetap pantau portal kami untuk informasi jadwal rilis, link streaming resmi, serta pembahasan episode terbaru Demon Slayer: Infinity Castle setiap minggunya!', 'posts/LpSbQ7go2cFvL4OS6LUoiOmS9KzwviTJQw6boHoW.jpg', '2025-07-17 00:28:28', '2025-07-17 00:28:28', 3);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role` enum('admin','user') NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `created_at`, `updated_at`, `role`) VALUES
(3, 'asep', 'asep@gmail.com', '$2y$12$AeIjuCJKSZoPe8vYCGnScujheyfRzUg/kIC1vSBtKNIx5AwbkmIoS', '2025-05-20 23:57:08', '2025-05-20 23:57:08', 'user'),
(4, 'udin', 'udin@gmail.com', '$2y$12$vlER0sjj8N0/4Rhyj939N.fGg/nwGm.nAIYme6aUkYYlaBchNS2R6', '2025-05-20 23:59:44', '2025-05-20 23:59:44', 'user'),
(5, 'admin', 'admin@gmail.com', '$2y$12$4uAQNndSXcCI5Lue7IBprelHfpSQQf44cenR6Hky923obK256Fonm', '2025-05-21 00:00:31', '2025-05-21 00:00:31', 'admin'),
(7, 'widodo', 'widodo@gmail.com', '$2y$12$Q1OpX3dgGYKTBZJkxAJZe.1FTklGMVbTSe2p4kj4tcYSoR4fAKroa', '2025-06-06 03:20:17', '2025-06-06 03:20:17', 'user'),
(10, 'marcell', 'marcell@gmail.com', '$2y$12$6YnidIpqLjUmC5BVGNq7RezrbmOxqPzQOYRcdJ88Uuif/daGvM866', '2025-07-17 09:09:14', '2025-07-17 09:09:14', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_post_id_foreign` (`post_id`),
  ADD KEY `comments_user_id_foreign` (`user_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
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
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `comments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
