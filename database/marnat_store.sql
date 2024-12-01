-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 27, 2024 at 04:40 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `marnat_store`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(2, '2019_08_19_000000_create_failed_jobs_table', 1),
(3, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(4, '2024_10_09_123712_roles', 1),
(5, '2024_10_09_124228_products', 1),
(6, '2024_10_09_130856_payments', 1),
(7, '2024_10_09_140258_users', 1),
(8, '2024_10_09_140404_shop_carts', 1),
(9, '2024_10_09_140456_shop_cart_has_product', 1),
(10, '2024_10_09_140601_purchasings', 1),
(11, '2024_10_09_140655_purchasings_has_product', 1),
(12, '2024_10_09_140732_purchasings_details', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` varchar(10) NOT NULL,
  `payment_method` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` varchar(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `kuantiti` int(11) NOT NULL,
  `kategori` varchar(255) NOT NULL,
  `file_photo` varchar(255) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `price`, `kuantiti`, `kategori`, `file_photo`, `updated_at`, `created_at`) VALUES
('PRD-000002', 'mineral', 'minuman gagal', 70000, 10, 'foods', 'assets/images/product/674193058c47b_sianida.png', '2024-11-23 02:15:26', '2024-11-23 01:32:05'),
('PRD-000003', 'americano', 'kopi', 20000, 5, 'drinks', 'assets/images/product/6741a18818cd5_contoh 3.png', '2024-11-26 05:12:22', '2024-11-23 02:34:00'),
('PRD-000004', 'latte', 'kopi juga', 21000, 10, 'drinks', 'assets/images/product/6741a1a4dc35a_contoh 2.png', '2024-11-23 02:34:28', '2024-11-23 02:34:28'),
('PRD-000005', 'piccolo', 'kopi ah', 75000, 5, 'drinks', 'assets/images/product/6741a1c1179a4_sianida.png', '2024-11-23 02:34:57', '2024-11-23 02:34:57'),
('PRD-000006', 'fries', 'mamm', 25000, 66, 'foods', 'assets/images/product/6741a265ba95d_contoh 3.png', '2024-11-23 02:37:41', '2024-11-23 02:37:41'),
('PRD-000007', 'chicken pop', 'mamm juga bro', 53000, 20, 'foods', 'assets/images/product/6741a284ed28b_contoh 1.png', '2024-11-23 02:38:12', '2024-11-23 02:38:12'),
('PRD-000008', 'spagheti', 'enakk', 22000, 22, 'drinks', 'assets/images/product/6741a2a94539e_sianida.png', '2024-11-23 02:38:49', '2024-11-23 02:38:49'),
('PRD-000009', 'nugreentea', 'teh wenak', 50000, 200, 'drinks', 'assets/images/product/6741a2c742a5e_contoh 2.png', '2024-11-23 02:39:19', '2024-11-23 02:39:19'),
('PRD-000010', 'milk tea', 'minuman segar', 7000, 10, 'drinks', 'assets/images/product/6741a2e395b1a_contoh 1.png', '2024-11-23 02:39:47', '2024-11-23 02:39:47'),
('PRD-000011', 'yoghurt tea', 'minuman yoghurt', 7500, 20, 'drinks', 'assets/images/product/6741a3009df4d_sari_roti.png', '2024-11-23 02:40:16', '2024-11-23 02:40:16'),
('PRD-000012', 'V60', 'minuman skena', 1000, 50, 'coffee', 'assets/images/product/6741c4175879b_sari_roti.png', '2024-11-23 05:01:27', '2024-11-23 05:01:27'),
('PRD-000013', 'ayam goreng', 'makanan ipin', 200000, 5, 'foods', 'assets/images/product/67459184d8e76_ayam_goreng.jpg', '2024-11-26 02:14:44', '2024-11-26 02:14:44');

-- --------------------------------------------------------

--
-- Table structure for table `purchasings`
--

CREATE TABLE `purchasings` (
  `id` varchar(10) NOT NULL,
  `kuantiti_produk` int(11) NOT NULL,
  `date` date NOT NULL,
  `user_id` varchar(10) NOT NULL,
  `payment_id` varchar(10) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `purchasings_detail`
--

CREATE TABLE `purchasings_detail` (
  `id` varchar(10) NOT NULL,
  `date` date NOT NULL,
  `total_price` int(11) NOT NULL,
  `status_order` int(11) NOT NULL,
  `purchasing_id` varchar(10) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `purchasings_has_product`
--

CREATE TABLE `purchasings_has_product` (
  `purchasing_id` varchar(10) NOT NULL,
  `product_id` varchar(10) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` varchar(2) NOT NULL,
  `nama_role` varchar(255) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `nama_role`, `updated_at`, `created_at`) VALUES
('1', 'admin', '2024-10-30 16:03:04', '2024-10-30 16:03:04'),
('3', 'user', '2024-11-23 04:59:58', '2024-11-14 10:10:53');

-- --------------------------------------------------------

--
-- Table structure for table `shop_carts`
--

CREATE TABLE `shop_carts` (
  `id` varchar(10) NOT NULL,
  `kuantiti_produk` int(11) NOT NULL,
  `user_id` varchar(10) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `shop_cart_has_product`
--

CREATE TABLE `shop_cart_has_product` (
  `shop_cart_id` varchar(10) NOT NULL,
  `product_id` varchar(10) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` varchar(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `role_id` varchar(2) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role_id`, `remember_token`, `created_at`, `updated_at`) VALUES
('PGN-000001', 'admin', 'admin@gmail.com', NULL, '$2y$10$JjoFk8CQfkJmYRxO20pMkOsxQ3aghgE4Dhnj66zB6A0pGA5J2TmSu', '1', NULL, NULL, NULL),
('PGN-000005', 'cherno', 'cherno@gmail.com', NULL, '$2y$10$Rk33BM0Eo523GvOS6zEEm.YDzJWbaryXhCry8OSDGubsAgwJbVxkG', '3', NULL, '2024-11-23 02:52:09', '2024-11-23 02:52:09'),
('PGN-000006', 'jessica', 'jessica@gmail.com', NULL, '$2y$10$uSFau7kUYpI2SRt/WQctIu1PWTawSLQUIvxTt6Ia2kxgOk337ZJvW', '3', NULL, '2024-11-23 02:52:34', '2024-11-23 02:52:34'),
('PGN-000007', 'josephine', 'josephine@gmail.com', NULL, '$2y$10$fapgGuY2UBzbQ8YwMkWYRO5bWNQiBD0cs5UzRuEh.T5dzwbuGu1Um', '3', NULL, '2024-11-23 02:52:51', '2024-11-23 02:52:51'),
('PGN-000008', 'chris', 'chris@gmail.com', NULL, '$2y$10$TfPEjLoc0L5h2IrnxPJJi..bxsrfRFRVL7jABIaxhqi7djGo.nKlS', '3', NULL, '2024-11-23 02:53:06', '2024-11-23 02:53:06'),
('PGN-000009', 'josep', 'joseph@gmail.com', NULL, '$2y$10$4Nf9ktYM.4WpD9Kxjzu8aejPT7bO1UNiQF1NhbPr3RoeoqMbo58i6', '3', NULL, '2024-11-23 02:53:18', '2024-11-23 02:53:18'),
('PGN-000010', 'jean', 'jean@gmail.com', NULL, '$2y$10$iIOXwiMXekgm0qqlZANEluEFrQ75xjclLOZ7/BJK2y5SIAjQpxTbi', '3', NULL, '2024-11-23 02:53:31', '2024-11-23 02:53:31'),
('PGN-000011', 'joshua', 'joshua@gmail.com', NULL, '$2y$10$s7nKVKOoHOJG2aTyw7d/OOLTAp/0Q.NNNhTAirG4dBBB5bx98YO2.', '3', NULL, '2024-11-23 02:53:42', '2024-11-23 02:53:42'),
('PGN-000012', 'elmo', 'elmo@gmail.com', NULL, '$2y$10$4G/.0MORktrM3fKq2uNQdOvF9U/uy.GVsALwwI7davVeCVE6UK2.C', '3', NULL, '2024-11-23 02:53:54', '2024-11-23 02:53:54'),
('PGN-000013', 'jopi', 'jopi@gmail.com', NULL, '$2y$10$/ZV/qKiKPbPXS.6eNAbvj.F5q2023N8ZOcN0hyWY23ipeWQB2Ubw2', '3', NULL, '2024-11-23 04:58:36', '2024-11-23 04:58:36'),
('PGN-000014', 'nael', 'nael@gmail.com', NULL, '$2y$10$HgybEPESFtSP4zi1937bS.0PjEj5Bb3L/VNy8HyrmPeGX6YauiCuG', '3', NULL, '2024-11-23 04:59:00', '2024-11-23 04:59:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchasings`
--
ALTER TABLE `purchasings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `purchasings_user_id_foreign` (`user_id`),
  ADD KEY `purchasings_payment_id_foreign` (`payment_id`);

--
-- Indexes for table `purchasings_detail`
--
ALTER TABLE `purchasings_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `purchasings_detail_purchasing_id_foreign` (`purchasing_id`);

--
-- Indexes for table `purchasings_has_product`
--
ALTER TABLE `purchasings_has_product`
  ADD KEY `purchasings_has_product_purchasing_id_foreign` (`purchasing_id`),
  ADD KEY `purchasings_has_product_product_id_foreign` (`product_id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `role_nama_role_unique` (`nama_role`);

--
-- Indexes for table `shop_carts`
--
ALTER TABLE `shop_carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `shop_carts_user_id_foreign` (`user_id`);

--
-- Indexes for table `shop_cart_has_product`
--
ALTER TABLE `shop_cart_has_product`
  ADD KEY `shop_cart_has_product_shop_cart_id_foreign` (`shop_cart_id`),
  ADD KEY `shop_cart_has_product_product_id_foreign` (`product_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_name_unique` (`name`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_role_id_foreign` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `purchasings`
--
ALTER TABLE `purchasings`
  ADD CONSTRAINT `purchasings_payment_id_foreign` FOREIGN KEY (`payment_id`) REFERENCES `payments` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `purchasings_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `purchasings_detail`
--
ALTER TABLE `purchasings_detail`
  ADD CONSTRAINT `purchasings_detail_purchasing_id_foreign` FOREIGN KEY (`purchasing_id`) REFERENCES `purchasings` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `purchasings_has_product`
--
ALTER TABLE `purchasings_has_product`
  ADD CONSTRAINT `purchasings_has_product_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `purchasings_has_product_purchasing_id_foreign` FOREIGN KEY (`purchasing_id`) REFERENCES `purchasings` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `shop_carts`
--
ALTER TABLE `shop_carts`
  ADD CONSTRAINT `shop_carts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `shop_cart_has_product`
--
ALTER TABLE `shop_cart_has_product`
  ADD CONSTRAINT `shop_cart_has_product_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `shop_cart_has_product_shop_cart_id_foreign` FOREIGN KEY (`shop_cart_id`) REFERENCES `shop_carts` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
