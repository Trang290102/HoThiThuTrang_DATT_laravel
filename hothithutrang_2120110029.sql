-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 12, 2023 at 01:55 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hothithutrang_2120110029`
--

-- --------------------------------------------------------

--
-- Table structure for table `httt_brand`
--

CREATE TABLE `httt_brand` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(1000) NOT NULL,
  `slug` varchar(1000) NOT NULL,
  `image` varchar(1000) DEFAULT NULL,
  `sort_order` int(10) UNSIGNED NOT NULL,
  `metakey` varchar(255) NOT NULL,
  `metadesc` varchar(255) NOT NULL,
  `created_by` int(10) UNSIGNED NOT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `httt_brand`
--

INSERT INTO `httt_brand` (`id`, `name`, `slug`, `image`, `sort_order`, `metakey`, `metadesc`, `created_by`, `updated_by`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Guccii', 'guccii', 'gucci.jpg', 0, 'Gucci', 'Gucci', 0, 6, 0, '2023-03-10 09:25:54', '2023-04-07 04:51:21'),
(7, 'Vascara', 'vascara', 'vascara.png', 1, 'Vascara', 'Thương hiệu túi xách, phụ kiện', 11, NULL, 1, '2023-04-04 12:14:29', '2023-04-04 12:14:29'),
(8, 'JUNO', 'juno', 'juno.svg', 2, 'JUNO', 'Thương hiệu thời trang', 6, NULL, 1, '2023-04-04 12:21:32', '2023-04-04 12:21:32'),
(9, 'Chanel', 'chanel', 'chanel.png', 1, 'Chanel', 'Chanel', 6, NULL, 1, '2023-04-05 07:59:10', '2023-04-05 07:59:10'),
(10, 'Gucci', 'gucci', 'gucci.jpg', 3, 'Gucci', 'Gucci', 6, NULL, 1, '2023-04-07 04:51:40', '2023-04-07 04:51:40'),
(11, 'Celine', 'celine', 'celine.png', 3, 'celine', 'Celine', 6, NULL, 1, '2023-04-11 07:37:31', '2023-04-11 07:37:31'),
(12, 'STYLUK', 'styluk', 'styluk.jpg', 2, 'STYLUK', 'STYLUK', 6, NULL, 1, '2023-04-11 07:39:35', '2023-04-11 07:39:35');

-- --------------------------------------------------------

--
-- Table structure for table `httt_category`
--

CREATE TABLE `httt_category` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(1000) NOT NULL,
  `slug` varchar(1000) NOT NULL,
  `parent_id` int(10) UNSIGNED NOT NULL,
  `sort_order` int(10) UNSIGNED NOT NULL,
  `image` varchar(1000) NOT NULL,
  `metakey` varchar(255) NOT NULL,
  `metadesc` varchar(255) NOT NULL,
  `created_by` int(10) UNSIGNED NOT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `httt_category`
--

INSERT INTO `httt_category` (`id`, `name`, `slug`, `parent_id`, `sort_order`, `image`, `metakey`, `metadesc`, `created_by`, `updated_by`, `status`, `created_at`, `updated_at`) VALUES
(4, 'Túi xách', 'tui-xach', 0, 0, 'tui-xach.jpg', 'Túi xách', 'Túi xách', 1, 6, 1, '2023-04-07 05:56:16', '2023-04-07 05:56:16'),
(6, 'Phụ kiện', 'phu-kien', 0, 0, 'phu-kien.jpg', 'phukien', 'Phụ kiện sang trọng', 1, 6, 1, '2023-04-11 07:24:56', '2023-04-11 07:24:56'),
(28, 'Sản phẩm nổi bật', 'san-pham-noi-bat', 0, 0, 'san-pham-noi-bat.jpg', 'Sản phẩm nổi bật', 'Sản phẩm nổi bật', 6, 6, 2, '2023-04-15 23:45:26', '2023-04-15 23:45:26'),
(29, 'Hàng mới về', 'hang-moi-ve', 0, 0, 'hang-moi-ve.webp', 'new', 'Sản phẩm mới', 6, 6, 2, '2023-04-15 23:45:33', '2023-04-15 23:45:33'),
(30, 'Túi xách tay', 'tui-xach-tay', 4, 0, 'tui-deo-cheo.jpg', 'bag', 'Túi đeo chéo', 6, 6, 1, '2023-04-07 05:56:46', '2023-04-07 05:56:46'),
(31, 'Balo', 'balo', 0, 0, 'balo.jpg', 'balo', 'balo', 6, 6, 1, '2023-04-11 07:27:40', '2023-04-11 07:27:40'),
(33, 'Túi đeo chéo', 'tui-deo-cheo', 4, 1, 'tui-deo-cheo.webp', 'Túi đeo chéo', 'Túi đeo chéo', 6, NULL, 1, '2023-04-11 07:20:53', '2023-04-11 07:20:53'),
(34, 'Ví bóp', 'vi-bop', 0, 1, 'vi-bop.jpg', 'Ví bóp', 'Ví bóp', 6, 6, 1, '2023-04-11 07:27:20', '2023-04-11 07:27:20'),
(35, 'Ví da thật', 'vi-da-that', 34, 1, 'vi-da-that.jpg', 'Ví da thật', 'Ví da thật', 6, NULL, 1, '2023-04-11 07:25:43', '2023-04-11 07:25:43'),
(36, 'Ví cầm tay', 'vi-cam-tay', 34, 1, 'vi-cam-tay.jpg', 'Ví cầm tay', 'Ví cầm tay', 6, NULL, 1, '2023-04-11 07:26:59', '2023-04-11 07:26:59'),
(37, 'Ví dự tiệc', 'vi-du-tiec', 34, 1, 'vi-du-tiec.jpg', 'Ví dự tiệc', 'Ví dự tiệc', 6, NULL, 1, '2023-04-11 07:28:28', '2023-04-11 07:28:28'),
(38, 'Mắt kính', 'mat-kinh', 6, 1, 'mat-kinh.jpg', 'Mắt kính', 'Mắt kính', 6, NULL, 1, '2023-04-11 07:29:37', '2023-04-11 07:29:37'),
(39, 'Mũ/Nón', 'munon', 6, 1, 'munon.jpg', 'Mũ/Nón', 'Mũ/Nón', 6, NULL, 1, '2023-04-11 07:30:54', '2023-04-11 07:30:54'),
(40, 'Túi dệt/Lưới', 'tui-detluoi', 6, 1, 'tui-detluoi.jpg', 'Túi dệt/Lưới', 'Túi dệt/Lưới', 6, NULL, 1, '2023-04-11 07:32:10', '2023-04-11 07:32:10'),
(41, 'Tất/Vớ', 'tatvo', 6, 1, 'tatvo.jpg', 'Tất/Vớ', 'Tất/Vớ', 6, NULL, 1, '2023-04-11 07:33:06', '2023-04-11 07:33:06'),
(42, 'Túi da thật', 'tui-da-that', 4, 1, 'tui-da-that.jpg', 'Túi da thật', 'Túi da thật', 6, NULL, 1, '2023-04-11 07:47:37', '2023-04-11 07:47:37'),
(43, 'Thắt lưng', 'that-lung', 6, 1, 'that-lung.jpg', 'Thắt lưng', '<p>Thắt lưng</p>', 6, NULL, 1, '2023-04-15 23:47:32', '2023-04-15 23:47:32');

-- --------------------------------------------------------

--
-- Table structure for table `httt_config`
--

CREATE TABLE `httt_config` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `shop_name` varchar(255) NOT NULL,
  `site_name` varchar(1000) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `twitter` varchar(255) DEFAULT NULL,
  `instagram` varchar(255) DEFAULT NULL,
  `logo` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `metakey` varchar(255) NOT NULL,
  `metadesc` varchar(255) NOT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `httt_config`
--

INSERT INTO `httt_config` (`id`, `shop_name`, `site_name`, `phone`, `email`, `address`, `facebook`, `twitter`, `instagram`, `logo`, `author`, `metakey`, `metadesc`, `status`, `created_at`, `updated_at`) VALUES
(1, 'TrangShop Inc.', 'shop balo & túi xách', '0975030513', 'hothutrang421@gmail.com', '103 Tăng Nhơn Phú, Phước Long B, tp.Thủ Đức, TP.HCM', 'https://www.facebook.com/profile.php?id=100014538392817', NULL, NULL, '.png', 'Thu Trang', 'tt', 'tt', 1, '2023-06-12 01:54:30', '2023-06-12 03:32:20');

-- --------------------------------------------------------

--
-- Table structure for table `httt_contact`
--

CREATE TABLE `httt_contact` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(1000) NOT NULL,
  `phone` varchar(1000) DEFAULT NULL,
  `email` varchar(1000) DEFAULT NULL,
  `title` varchar(1000) NOT NULL,
  `content` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `replay_id` int(10) UNSIGNED DEFAULT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT NULL,
  `status` tinyint(3) UNSIGNED DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `httt_contact`
--

INSERT INTO `httt_contact` (`id`, `user_id`, `name`, `phone`, `email`, `title`, `content`, `created_at`, `replay_id`, `updated_by`, `status`, `updated_at`) VALUES
(1, 14, 'Huệ Ngân', NULL, 'hothutrang421@gmail.com', 'title test', 'question test', '2023-05-16 06:33:04', 6, NULL, 1, '2023-05-16 06:33:04'),
(2, 14, 'Bích Liễu', NULL, 'hothutrang421@gmail.com', 'test 2', 'Question test 2', '2023-05-16 06:46:49', 6, NULL, 1, '2023-05-16 06:46:49'),
(5, 6, 'Trang Ho', NULL, NULL, 'Trả lời Huệ Ngân', 'Trả lời câu hỏi', '2023-05-16 06:33:04', 1, 6, 1, '2023-05-16 06:33:04'),
(7, 6, 'Trang Ho', NULL, NULL, 'Trả lời bích liễu', 'Question test 2 trả lời nhiều nhiều', '2023-05-16 06:47:03', 2, 6, 1, '2023-05-16 06:47:03'),
(8, 13, 'Hồ Thị Thu Trang', NULL, 'hothutrang397@gmail.com', 'câu hour 10 vạn', 'tiếp tục', '2023-05-24 03:43:11', 12, 6, 1, '2023-05-24 03:43:11'),
(9, 6, 'Trang Ho', NULL, NULL, 'test trả lời Hồ Thị Thu Trang', 'nội dung cho tiếp tục', '2023-05-17 02:32:11', 8, NULL, 1, '2023-05-17 02:32:11'),
(10, 13, 'Thu Trang', NULL, 'hothutrang421@gmail.com', 'sadsadsadsad', 'colem colem colem', '2023-05-24 03:41:37', NULL, NULL, 1, '2023-05-24 03:41:37'),
(11, 6, 'Trang Ho', NULL, NULL, 'tr fgvf', 'fgdfgdfg', '2023-05-24 03:42:15', 8, NULL, 1, '2023-05-24 03:42:15'),
(12, 6, 'Trang Ho', NULL, NULL, 'trkeksdksmjsdkjsfkskmldfk', 'kdfdskfmsdfldj', '2023-05-24 03:43:11', 8, NULL, 1, '2023-05-24 03:43:11');

-- --------------------------------------------------------

--
-- Table structure for table `httt_link`
--

CREATE TABLE `httt_link` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `slug` varchar(1000) NOT NULL,
  `table_id` int(10) UNSIGNED NOT NULL,
  `type` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `httt_link`
--

INSERT INTO `httt_link` (`id`, `slug`, `table_id`, `type`) VALUES
(13, 'phu-kien', 16, 'category'),
(16, 'test-danh-muc', 18, 'category'),
(20, 'balo-balo-balo-update-up', 21, 'category'),
(21, 'chieu-truc-update', 5, 'brand'),
(22, 'moi-moi', 22, 'category'),
(23, 'danh-muc-moi', 23, 'category'),
(24, 'danh-muc-test', 24, 'category'),
(25, 'danh-muc-test-24', 25, 'category'),
(26, 'trang-don-12345678', 2, 'page'),
(27, 'trang-don-2', 3, 'page'),
(30, 'ho-thi-thu-trang-update', 26, 'category'),
(31, 'ho-thi-thu-trangddddd', 27, 'category'),
(36, 'vascara', 7, 'brand'),
(37, 'juno', 8, 'brand'),
(38, 'san-pham-noi-bat', 28, 'category'),
(39, 'hang-moi-ve', 29, 'category'),
(40, 'chanel', 9, 'brand'),
(41, 'tui-xach-tay', 30, 'category'),
(42, 'balo', 31, 'category'),
(43, 'tui-xach', 32, 'category'),
(44, 'gucci', 10, 'brand'),
(45, 'tui-deo-cheo', 33, 'category'),
(46, 'vi-bop', 34, 'category'),
(47, 'vi-da-that', 35, 'category'),
(48, 'vi-cam-tay', 36, 'category'),
(49, 'vi-du-tiec', 37, 'category'),
(50, 'mat-kinh', 38, 'category'),
(51, 'munon', 39, 'category'),
(52, 'tui-detluoi', 40, 'category'),
(53, 'tatvo', 41, 'category'),
(54, 'celine', 11, 'brand'),
(55, 'styluk', 12, 'brand'),
(56, 'tui-da-that', 42, 'category'),
(57, 'that-lung', 43, 'category'),
(58, 'su-kien', 7, 'topic'),
(59, 'thong-bao', 8, 'topic'),
(60, 'tuyen-dung', 9, 'topic'),
(61, 'thong-cao-bao-chi', 10, 'topic'),
(62, 'tin-tuc', 11, 'topic'),
(63, 've-chung-toi', 11, 'page'),
(64, 'chinh-sach-quy-dinh-chung', 12, 'page'),
(65, 'phuong-thuc-thanh-toan', 13, 'page'),
(66, 'chinh-sach-bao-mat', 14, 'page'),
(67, 'chinh-sach-doi-tra', 15, 'page');

-- --------------------------------------------------------

--
-- Table structure for table `httt_menu`
--

CREATE TABLE `httt_menu` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(1000) NOT NULL,
  `link` varchar(1000) NOT NULL,
  `table_id` int(10) UNSIGNED DEFAULT NULL,
  `parent_id` int(11) NOT NULL DEFAULT 0,
  `sort_order` int(11) DEFAULT 1,
  `type` varchar(100) NOT NULL,
  `position` varchar(100) NOT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` int(10) UNSIGNED NOT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `httt_menu`
--

INSERT INTO `httt_menu` (`id`, `name`, `link`, `table_id`, `parent_id`, `sort_order`, `type`, `position`, `status`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(1, 'Trang chủ', '/', 1, 0, 2, 'custom', 'mainmenu', 1, NULL, '2023-04-05 08:01:25', 0, 6),
(16, 'Túi xách', 'tui-xach', 4, 0, 1, 'category', 'mainmenu', 1, '2023-04-06 12:25:58', '2023-04-06 12:26:10', 6, 6),
(17, 'Túi xách tay', 'tui-xach-tay', 30, 16, 3, 'category', 'mainmenu', 1, '2023-04-06 12:26:06', '2023-04-06 13:04:07', 6, 6),
(18, 'Balo', 'balo', 31, 0, 1, 'category', 'mainmenu', 1, '2023-04-06 13:03:51', '2023-04-07 05:57:39', 6, 6),
(20, 'Túi da thật', 'tui-da-that', 42, 16, 3, 'category', 'mainmenu', 1, '2023-04-12 08:36:49', '2023-04-12 08:37:17', 6, 6),
(21, 'Túi đeo chéo', 'tui-deo-cheo', 33, 16, 3, 'category', 'mainmenu', 1, '2023-04-12 08:36:49', '2023-04-15 23:49:59', 6, 6),
(22, 'Phụ kiện', 'phu-kien', 6, 0, 1, 'category', 'mainmenu', 1, '2023-04-15 23:51:43', '2023-04-15 23:51:45', 6, 6),
(23, 'Thắt lưng', 'that-lung', 43, 22, 3, 'category', 'mainmenu', 1, '2023-04-15 23:52:14', '2023-04-15 23:58:06', 6, 6),
(24, 'Tất/Vớ', 'tatvo', 41, 22, 3, 'category', 'mainmenu', 1, '2023-04-15 23:52:14', '2023-04-15 23:58:04', 6, 6),
(25, 'Túi dệt/Lưới', 'tui-detluoi', 40, 22, 3, 'category', 'mainmenu', 1, '2023-04-15 23:52:14', '2023-04-15 23:58:08', 6, 6),
(26, 'Mũ/Nón', 'munon', 39, 22, 3, 'category', 'mainmenu', 1, '2023-04-15 23:52:14', '2023-04-15 23:58:09', 6, 6),
(27, 'Mắt kính', 'mat-kinh', 38, 22, 3, 'category', 'mainmenu', 1, '2023-04-15 23:52:14', '2023-04-15 23:58:11', 6, 6),
(28, 'Ví dự tiệc', 'vi-du-tiec', 37, 29, 3, 'category', 'mainmenu', 1, '2023-04-17 10:33:15', '2023-04-17 10:33:52', 6, 6),
(29, 'Ví bóp', 'vi-bop', 34, 0, 1, 'category', 'mainmenu', 1, '2023-04-17 10:33:15', '2023-04-17 10:33:20', 6, 6),
(30, 'Ví cầm tay', 'vi-cam-tay', 36, 29, 3, 'category', 'mainmenu', 1, '2023-04-17 10:33:15', '2023-04-17 10:33:53', 6, 6),
(31, 'Ví da thật', 'vi-da-that', 35, 29, 3, 'category', 'mainmenu', 1, '2023-04-17 10:33:15', '2023-04-17 10:33:55', 6, 6),
(32, 'Tin tức', 'tin-tuc', 11, 0, 1, 'topic', 'mainmenu', 1, '2023-04-17 10:47:50', '2023-04-17 10:47:54', 6, 6),
(33, 'Thông cáo báo chí', 'thong-cao-bao-chi', 10, 32, 3, 'topic', 'mainmenu', 1, '2023-04-17 10:47:50', '2023-04-17 10:48:04', 6, 6),
(34, 'Tuyển dụng', 'tuyen-dung', 9, 32, 3, 'topic', 'mainmenu', 1, '2023-04-17 10:47:50', '2023-04-17 10:48:14', 6, 6),
(35, 'Thông báo', 'thong-bao', 8, 32, 3, 'topic', 'mainmenu', 1, '2023-04-17 10:47:50', '2023-04-17 10:48:34', 6, 6),
(36, 'Sự kiện', 'su-kien', 7, 32, 3, 'topic', 'mainmenu', 1, '2023-04-17 10:47:50', '2023-04-17 10:48:36', 6, 6),
(37, 'Cửa hàng', '/', NULL, 0, 3, 'custom', 'footermenu', 1, '2023-04-27 00:22:42', '2023-04-27 00:40:42', 6, 6),
(38, 'Balo', 'balo', 31, 37, 3, 'category', 'footermenu', 1, '2023-04-27 00:26:21', '2023-04-27 00:27:58', 6, 6),
(39, 'Ví bóp', 'vi-bop', 34, 37, 3, 'category', 'footermenu', 1, '2023-04-27 00:26:21', '2023-04-27 00:27:56', 6, 6),
(40, 'Phụ kiện', 'phu-kien', 6, 37, 3, 'category', 'footermenu', 1, '2023-04-27 00:26:21', '2023-04-27 00:27:54', 6, 6),
(41, 'Túi xách', 'tui-xach', 4, 37, 3, 'category', 'footermenu', 1, '2023-04-27 00:26:21', '2023-04-27 00:27:52', 6, 6),
(42, 'Dịch vụ', '/', NULL, 0, 1, 'custom', 'footermenu', 0, '2023-04-27 00:47:06', '2023-05-13 03:08:30', 6, 6),
(43, 'Chính sách', '/', NULL, 0, 1, 'custom', 'footermenu', 1, '2023-04-27 00:47:18', '2023-04-27 00:47:45', 6, 6),
(44, 'Giới thiệu', '/', NULL, 0, 3, 'custom', 'footermenu', 1, '2023-04-27 00:47:27', '2023-04-27 00:47:43', 6, 6),
(45, 'Về chúng tôi', 've-chung-toi', 11, 44, 3, 'page', 'footermenu', 1, '2023-04-27 00:59:36', '2023-04-27 00:59:56', 6, 6),
(46, 'Chính sách bảo mật', 'chinh-sach-bao-mat', 14, 43, 3, 'page', 'footermenu', 1, '2023-04-27 01:28:16', '2023-04-27 01:28:45', 6, 6),
(47, 'Phương thức thanh toán', 'phuong-thuc-thanh-toan', 13, 43, 3, 'page', 'footermenu', 1, '2023-04-27 01:28:16', '2023-04-27 01:29:00', 6, 6),
(49, 'Liên hệ', 'lien-he', NULL, 0, 1, 'custom', 'mainmenu', 1, '2023-05-03 07:57:34', '2023-05-03 07:57:37', 6, 6),
(50, 'Hỗ trợ', '/', NULL, 0, 3, 'custom', 'footermenu', 1, '2023-05-13 02:56:55', '2023-05-13 02:57:21', 6, 6),
(51, 'Liên hệ', 'lien-he', NULL, 50, 3, 'custom', 'footermenu', 1, '2023-05-13 03:09:07', '2023-05-13 03:09:21', 6, 6),
(52, 'Chính sách đổi trả', 'chinh-sach-doi-tra', 15, 43, 3, 'page', 'footermenu', 1, '2023-05-13 03:10:55', '2023-05-13 03:11:46', 6, 6),
(53, 'Chính sách & Quy định chung', 'chinh-sach-quy-dinh-chung', 12, 43, 3, 'page', 'footermenu', 1, '2023-05-13 03:12:04', '2023-05-13 03:12:15', 6, 6),
(54, 'Về chúng tôi', 've-chung-toi', 11, 0, 3, 'page', 'mainmenu', 1, '2023-05-13 06:47:11', '2023-05-13 06:47:20', 6, 6),
(55, 'Tất cả sản phẩm', 'product', NULL, 37, 3, 'custom', 'footermenu', 1, '2023-05-24 07:42:43', '2023-05-24 07:43:05', 6, 6);

-- --------------------------------------------------------

--
-- Table structure for table `httt_order`
--

CREATE TABLE `httt_order` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `note` text DEFAULT NULL,
  `updated_by` tinyint(3) UNSIGNED DEFAULT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `httt_order`
--

INSERT INTO `httt_order` (`id`, `user_id`, `name`, `phone`, `email`, `address`, `note`, `updated_by`, `status`, `created_at`, `updated_at`) VALUES
(59, 13, 'kh1', '1234567891', 'kh1@gmail.com', 'kh1', NULL, 6, 5, '2023-06-04 08:03:36', '2023-06-04 08:03:36'),
(60, 13, 'kh1', '1234567891', 'kh1@gmail.com', 'kh1', NULL, 6, 0, '2023-05-28 05:17:21', '2023-05-28 05:17:21'),
(61, 14, 'kh2', '1234567890', 'hothutrang397@gmail.com', 'đại tín, phước lộc', NULL, 14, 1, '2023-06-05 07:16:13', '2023-06-04 09:07:13'),
(62, 14, 'kh2', '1234567890', 'hothutrang397@gmail.com', 'đại tín, phước lộc', NULL, 6, 0, '2023-06-04 09:10:25', '2023-06-04 09:10:25'),
(63, 14, 'kh2', '1234567890', 'hothutrang397@gmail.com', 'đại tín, phước lộc', NULL, 6, 4, '2023-06-04 09:11:36', '2023-06-04 09:11:36'),
(64, 14, 'kh2', '1234567890', 'hothutrang397@gmail.com', 'đại tín, phước lộc', NULL, 6, 2, '2023-06-04 09:10:22', '2023-06-04 09:10:22'),
(65, 14, 'kh2', '1234567890', 'hothutrang397@gmail.com', 'đại tín, phước lộc', NULL, 14, 0, '2023-06-11 07:20:17', '2023-06-11 07:20:17'),
(66, 14, 'Huệ Ngân', '1234567890', 'hothutrang397@gmail.com', 'đại tín, phước lộc', NULL, NULL, 1, '2023-06-08 03:10:23', '2023-06-08 03:10:23'),
(67, 14, 'Huệ Ngân', '1234567890', 'hothutrang397@gmail.com', 'đại tín, phước lộc', NULL, NULL, 1, '2023-06-10 10:01:32', '2023-06-10 10:01:32'),
(68, 14, 'Huệ Ngân', '1234567890', 'hothutrang397@gmail.com', 'đại tín, phước lộc', NULL, NULL, 1, '2023-06-11 02:45:01', '2023-06-11 02:45:01');

-- --------------------------------------------------------

--
-- Table structure for table `httt_orderdetail`
--

CREATE TABLE `httt_orderdetail` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `qty` int(10) UNSIGNED NOT NULL,
  `amount` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `httt_orderdetail`
--

INSERT INTO `httt_orderdetail` (`id`, `order_id`, `product_id`, `price`, `qty`, `amount`) VALUES
(95, 59, 14, '1425000', 4, '5700000'),
(96, 60, 14, '1425000', 18, '25650000'),
(97, 61, 52, '457500', 1, '457500'),
(98, 61, 30, '965000', 8, '7720000'),
(99, 61, 27, '925000', 4, '3700000'),
(100, 62, 14, '1425000', 1, '1425000'),
(101, 62, 52, '457500', 1, '457500'),
(102, 63, 14, '1425000', 1, '1425000'),
(103, 63, 52, '457500', 1, '457500'),
(104, 64, 14, '1425000', 1, '1425000'),
(105, 64, 52, '457500', 1, '457500'),
(106, 65, 14, '1425000', 1, '1425000'),
(107, 65, 59, '535500', 1, '535500'),
(108, 66, 55, '490500', 5, '2452500'),
(109, 67, 30, '965000', 1, '965000'),
(110, 68, 52, '457500', 1, '457500'),
(111, 68, 14, '1425000', 1, '1425000'),
(112, 68, 77, '905000', 1, '905000'),
(113, 68, 56, '490500', 1, '490500');

-- --------------------------------------------------------

--
-- Table structure for table `httt_post`
--

CREATE TABLE `httt_post` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `topic_id` int(10) UNSIGNED DEFAULT NULL,
  `title` varchar(1000) NOT NULL,
  `slug` varchar(1000) NOT NULL,
  `detail` longtext NOT NULL,
  `images` varchar(1000) NOT NULL,
  `type` varchar(100) NOT NULL,
  `metakey` varchar(255) NOT NULL,
  `metadesc` longtext NOT NULL,
  `created_by` tinyint(3) UNSIGNED NOT NULL,
  `updated_by` tinyint(3) UNSIGNED DEFAULT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `httt_post`
--

INSERT INTO `httt_post` (`id`, `topic_id`, `title`, `slug`, `detail`, `images`, `type`, `metakey`, `metadesc`, `created_by`, `updated_by`, `status`, `created_at`, `updated_at`) VALUES
(2, NULL, 'trang đơn 12345678', 'trang-don-12345678', 'trang đơn 123', 'trang-don-12345678.jpg', 'page', 'trang đơn 123', 'trang đơn 1234', 1, 6, 2, '2023-05-13 05:39:24', '2023-05-13 05:39:24'),
(3, NULL, 'trang đơn 2', 'trang-don-2', 'trang đơn 2', 'trang-don-2.jpg', 'page', 'trang đơn 2', 'trang đơn 2', 1, 6, 2, '2023-05-13 05:39:19', '2023-05-13 05:39:19'),
(6, 5, 'bài viết 234', 'bai-viet-234', '<p><img alt=\"\" src=\"http://localhost:81/HoThiThuTrang_2120110029/public/upload/files/1.jpg\" style=\"height:557px; width:600px\" />b&agrave;i viết 23</p>', 'bai-viet-234.gif', 'post', 'bài viết 2', '<p>b&agrave;i viết 2345</p>', 1, 6, 1, '2023-04-15 10:01:38', '2023-04-15 10:01:38'),
(8, 7, 'VASCARA đồng hàng cùng IVY MODA trong show diễn xuân hè 2023', 'vascara-dong-hang-cung-ivy-moda-trong-show-dien-xuan-he-2023', '<p><img alt=\"\" src=\"https://www.vascara.com/uploads/web/900/News/TIN-TUC/IVYMODA.jpg\" style=\"height:353px; width:800px\" /></p>\r\n\r\n<p>Ng&agrave;y 25/3 vừa qua, show diễn thời trang Xu&acirc;n H&egrave; 2023 HARMONY của IVY moda với sự đồng h&agrave;nh từ thương hiệu Vascara đ&atilde; ch&iacute;nh thức diễn ra tại White Palace Phạm Văn Đồng, Thủ Đức. Show diễn đ&atilde; mang đến những ph&uacute;t gi&acirc;y thời trang thăng hoa v&agrave; đẳng cấp nhất cho giới mộ điệu.</p>\r\n\r\n<p><img alt=\"\" src=\"https://www.vascara.com/uploads/web/900/News/ivy-moda/1.jpg\" style=\"height:396px; width:800px\" /></p>\r\n\r\n<p><img alt=\"\" src=\"https://www.vascara.com/uploads/web/900/News/ivy-moda/2.jpg\" style=\"height:396px; width:800px\" /></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Xuất hiện trong show diễn n&agrave;y, Vascara &ldquo;thắp s&aacute;ng&rdquo; đường băng catwalk với những mẫu gi&agrave;y v&agrave; t&uacute;i đặc sắc trong BST mới nhất của th&aacute;ng 4, b&ecirc;n cạnh đ&oacute; l&agrave; những mẫu cao g&oacute;t độc đ&aacute;o, rực rỡ được Vascara thiết kế ri&ecirc;ng show diễn Harmony, theo đ&uacute;ng tuy&ecirc;n ng&ocirc;n t&iacute;nh nữ với sự kết nối mạnh mẽ v&agrave;o trong t&acirc;m tr&iacute; ph&aacute;i đẹp, cổ vũ v&agrave; th&ocirc;i th&uacute;c họ l&agrave;m những điều m&igrave;nh y&ecirc;u, chấp nhận sự kh&ocirc;ng ho&agrave;n hảo để t&igrave;m thấy b&igrave;nh y&ecirc;n b&ecirc;n trong.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><img alt=\"\" src=\"https://www.vascara.com/uploads/web/900/News/ivy-moda/3.jpg\" style=\"height:396px; width:800px\" /></p>\r\n\r\n<p><img alt=\"\" src=\"https://www.vascara.com/uploads/web/900/News/ivy-moda/4.jpg\" style=\"height:396px; width:800px\" /></p>\r\n\r\n<p>Tại thảm đỏ đ&atilde; xuất hiện h&agrave;ng loạt người đẹp nổi tiếng của showbiz Việt như Minh Hằng, T&oacute;c Ti&ecirc;n, Sam, si&ecirc;u mẫu ch&acirc;u &Aacute; &ndash; Quỳnh Anh, &Aacute; hậu Phương Nhi, Quỳnh Anh Shyn, diễn vi&ecirc;n Cao Th&aacute;i H&agrave;, &Aacute; qu&acirc;n của cuộc thi Vietnam&#39;s Next Top Model 2010 - Tuyết Lan, si&ecirc;u mẫu B&ugrave;i Quỳnh Hoa c&ugrave;ng c&aacute;c th&iacute; sinh Miss International Queen.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><img alt=\"\" src=\"https://www.vascara.com/uploads/web/900/News/ivy-moda/5.jpg\" style=\"height:396px; width:800px\" /></p>\r\n\r\n<p><img alt=\"\" src=\"https://www.vascara.com/uploads/web/900/News/ivy-moda/6.jpg\" style=\"height:396px; width:800px\" /></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Với t&ocirc;ng hồng chủ đạo, pha lẫn sắc đen, trắng, IVY moda đ&atilde; chi&ecirc;u đ&atilde;i kh&aacute;n giả buổi tiệc thời trang m&atilde;n nh&atilde;n, mang nhiều x&uacute;c cảm, &yacute; nghĩa, truyền tải những c&acirc;u chuyện, ước mơ v&agrave; kh&aacute;t vọng mạnh mẽ.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><img alt=\"\" src=\"https://www.vascara.com/uploads/web/900/News/ivy-moda/7.jpg\" style=\"height:396px; width:800px\" /></p>\r\n\r\n<p><img alt=\"\" src=\"https://www.vascara.com/uploads/web/900/News/ivy-moda/8.jpg\" style=\"height:396px; width:800px\" /></p>\r\n\r\n<p>Kh&ocirc;ng chỉ tự h&agrave;o khi trở th&agrave;nh một trong những thương hiệu gi&agrave;y d&eacute;p v&agrave; t&uacute;i x&aacute;ch h&agrave;ng đầu d&agrave;nh cho ph&aacute;i nữ, Vascara c&ograve;n l&agrave; nh&atilde;n h&agrave;ng đ&atilde; v&agrave; đang đồng h&agrave;nh c&ugrave;ng nhiều NTK Việt trong v&ocirc; số show diễn thời trang đặc sắc trong lẫn ngo&agrave;i nước với t&acirc;m huyết trong từng thiết kế, sự chuy&ecirc;n nghiệp, chỉn chu v&agrave; tinh thần t&ocirc;n vinh những gi&aacute; trị thời trang Việt.</p>\r\n\r\n<p>C&aacute;c n&agrave;ng đo&aacute;n thử xem sản phẩm n&agrave;o sẽ c&oacute; mặt tại Vascara trong th&aacute;ng 4 sắp tới?</p>\r\n\r\n<p><img alt=\"\" src=\"https://www.vascara.com/uploads/web/900/News/ivy-moda/11.jpg\" style=\"height:396px; width:800px\" /></p>\r\n\r\n<p>Những khoảnh khắc ấn tượng của Show diễn HARMONY được cập nhật tại đ&acirc;y.</p>', 'vascara-dong-hanh-cung-ivy-moda-trong-show-dien-xuan-he-2023.jpg', 'post', 'Vascara IVY-MODA', '<p><em>Vascara đ&aacute;nh dấu sự khởi đầu của năm 2023 đầy s&ocirc;i động khi ch&iacute;nh thức&nbsp;</em><em>đ</em><em>ồng h&agrave;nh c&ugrave;ng thương hiệu thời trang IVY moda trong BST HARMONY - Đ&Aacute;NH THỨC THANH &Acirc;M TRONG BẠN.</em></p>', 6, 6, 2, '2023-05-13 05:39:00', '2023-05-13 05:39:00'),
(9, 7, 'VASCARA bắt tay cùng NTK Adrian Anh Tuấn trong show diễn \"Thong Dong\"', 'vascara-bat-tay-cung-ntk-adrian-anh-tuan-trong-show-dien-thong-dong', '<p>Chiều 13/4, Vascara đ&atilde; đồng h&agrave;nh c&ugrave;ng show diễn giới thiệu bộ sưu tập &ldquo;Thong dong&rdquo; của NTK Adrian Anh Tuấn diễn ra tại Hồ Tr&agrave;m, Vũng T&agrave;u. Những mẫu thiết kế đ&atilde; truyền tải vẻ đẹp ph&oacute;ng kho&aacute;ng v&agrave; tinh thần sẵn s&agrave;ng cho những chuyến đi giữa kh&ocirc;ng gian dịu m&aacute;t của những tia nắng đầu h&egrave;.</p>\r\n\r\n<p><img alt=\"\" src=\"http://localhost:81/HoThiThuTrang_2120110029/public/upload/images/bai-viet/1.jpg\" style=\"height:402px; width:800px\" /></p>\r\n\r\n<p><img alt=\"\" src=\"http://localhost:81/HoThiThuTrang_2120110029/public/upload/images/bai-viet/2.jpg\" style=\"height:402px; width:800px\" /></p>\r\n\r\n<p>Đảm nhận vai tr&ograve; thể hiện c&aacute;i hồn của bộ sưu tập l&agrave; c&aacute;c &quot;n&agrave;ng hậu&quot; như H&rsquo;Hen Ni&ecirc;, Ngọc Ch&acirc;u, Kim Duy&ecirc;n, Lệ Hằng, Minh T&uacute;, Hương Giang, top 3 Miss International Queen Vietnam 2023,...</p>\r\n\r\n<p><img alt=\"\" src=\"http://localhost:81/HoThiThuTrang_2120110029/public/upload/images/bai-viet/3.jpg\" style=\"height:402px; width:800px\" /></p>\r\n\r\n<p><img alt=\"\" src=\"http://localhost:81/HoThiThuTrang_2120110029/public/upload/images/bai-viet/4.jpg\" style=\"height:402px; width:800px\" /></p>\r\n\r\n<p>BST &ldquo;Thong Dong&rdquo; bắt nguồn từ những cảm hứng th&acirc;n thuộc, từ những ng&agrave;y h&egrave; thong thả bỏ lại c&ocirc;ng việc ph&iacute;a sau để d&agrave;nh ra những ph&uacute;t gi&acirc;y tận hưởng cuộc sống như một c&aacute;ch tự chăm s&oacute;c v&agrave; n&acirc;ng niu lấy ch&iacute;nh m&igrave;nh. BST cũng được NTK Adrian Anh Tuấn định nghĩa một c&aacute;ch khi&ecirc;m tốn l&agrave; &ldquo;kh&ocirc;ng c&oacute; g&igrave; to t&aacute;t&rdquo; nhằm đại diện cho những vẻ đẹp đơn giản thường ng&agrave;y.</p>\r\n\r\n<p><img alt=\"\" src=\"http://localhost:81/HoThiThuTrang_2120110029/public/upload/images/bai-viet/5.jpg\" style=\"height:402px; width:800px\" /></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Nếu như phần 1 của BST l&agrave; những thiết kế rực rỡ những sắc m&agrave;u của m&ugrave;a h&egrave; như m&agrave;u xanh cốm, xanh l&aacute; c&acirc;y, xanh da trời, hồng baby, hồng fushia v&agrave; họa tiết những tr&aacute;i chanh v&agrave;ng m&aacute;t rượi của m&ugrave;a h&egrave;, th&igrave; phần 2 l&agrave; những trang phục trong họa tiết gốm b&aacute;t tr&agrave;ng độc đ&aacute;o, tr&ecirc;n nền m&agrave;u xanh - trắng, mở ra một m&ugrave;a h&egrave; tươi m&aacute;t.</p>\r\n\r\n<p><img alt=\"\" src=\"http://localhost:81/HoThiThuTrang_2120110029/public/upload/images/bai-viet/6.jpg\" style=\"height:402px; width:800px\" /></p>\r\n\r\n<p>Đặc biệt, 80 thiết kế của BST lần n&agrave;y đều đều được s&aacute;ng tạo tr&ecirc;n nền chất liệu th&acirc;n thiện với m&ocirc;i trường như tre, h&agrave;u, c&agrave; ph&ecirc;&hellip; tạo cho người mặc cảm gi&aacute;c gần gũi, h&ograve;a m&igrave;nh với thi&ecirc;n nhi&ecirc;n.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><img alt=\"\" src=\"http://localhost:81/HoThiThuTrang_2120110029/public/upload/images/bai-viet/7.jpg\" style=\"height:402px; width:800px\" /></p>\r\n\r\n<p><img alt=\"\" src=\"http://localhost:81/HoThiThuTrang_2120110029/public/upload/images/bai-viet/8.jpg\" style=\"height:402px; width:800px\" /></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Trong show diễn n&agrave;y, Vascara đ&atilde; đem đến những mẫu sandal cao g&oacute;t xinh đẹp, thiết kế d&acirc;y quai thanh mảnh, với những gam m&agrave;u rực rỡ của ng&agrave;y h&egrave;, gi&uacute;p c&aacute;c người mẫu c&oacute; thể tự tin sải bước tr&ecirc;n ngọn đồi lộng gi&oacute; của s&acirc;n golf The Bluffs Grand Ho Tram.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><img alt=\"\" src=\"http://localhost:81/HoThiThuTrang_2120110029/public/upload/images/bai-viet/9.jpg\" style=\"height:402px; width:800px\" /></p>\r\n\r\n<p>Sự kiện đ&atilde; quy tụ nhiều mỹ nh&acirc;n v&agrave; d&agrave;n sao &quot;khủng&quot; của showbiz như<br />\r\nHoa hậu Tiểu Vy, Hoa hậu Lương Thuỳ Linh, Hoa hậu Đo&agrave;n Thi&ecirc;n &Acirc;n, &Aacute; hậu Phương Nhi, &Aacute; hậu Ngọc Thảo, &Aacute; hậu Lona Kiều Loan, Vợ chồng &Aacute; hậu Phương Nga - B&igrave;nh An, Hoa hậu Gi&aacute;ng My, Hoa hậu Phương Kh&aacute;nh, &Aacute; hậu Mai Ng&ocirc;, &Aacute; hậu Thủy Ti&ecirc;n, si&ecirc;u mẫu Quỳnh Hoa, si&ecirc;u mẫu H&agrave; Anh,...</p>\r\n\r\n<p><img alt=\"\" src=\"http://localhost:81/HoThiThuTrang_2120110029/public/upload/images/bai-viet/10.jpg\" style=\"height:402px; width:800px\" /></p>\r\n\r\n<p><img alt=\"\" src=\"http://localhost:81/HoThiThuTrang_2120110029/public/upload/images/bai-viet/11.jpg\" style=\"height:402px; width:800px\" /></p>\r\n\r\n<p>C&ugrave;ng chờ đ&oacute;n xem, mẫu gi&agrave;y n&agrave;o trong show diễn n&agrave;y sẽ l&ecirc;n kệ Vascara th&aacute;ng 5 tới nh&eacute;!</p>\r\n\r\n<p><img alt=\"\" src=\"http://localhost:81/HoThiThuTrang_2120110029/public/upload/images/bai-viet/12.jpg\" style=\"height:402px; width:800px\" /></p>\r\n\r\n<p><img alt=\"\" src=\"http://localhost:81/HoThiThuTrang_2120110029/public/upload/images/bai-viet/13.jpg\" style=\"height:402px; width:800px\" /></p>\r\n\r\n<p><img alt=\"\" src=\"http://localhost:81/HoThiThuTrang_2120110029/public/upload/images/bai-viet/14.jpg\" style=\"height:402px; width:800px\" /></p>', 'vascara-bat-tay-cung-ntk-adrian-anh-tuan-trong-show-dien-thong-dong.jpg', 'post', 'VASCARA, Adrian Anh Tuấn', '<p><em>Chiều 13/4, Vascara đ&atilde; đồng h&agrave;nh c&ugrave;ng show diễn giới thiệu bộ sưu tập &ldquo;Thong dong&rdquo; của NTK Adrian Anh Tuấn diễn ra tại Hồ Tr&agrave;m, Vũng T&agrave;u. Những mẫu thiết kế đ&atilde; truyền tải vẻ đẹp ph&oacute;ng kho&aacute;ng v&agrave; tinh thần sẵn s&agrave;ng cho những chuyến đi giữa kh&ocirc;ng gian dịu m&aacute;t của những tia nắng đầu h&egrave;.</em></p>', 6, 6, 1, '2023-04-19 08:50:16', '2023-04-19 08:50:16'),
(10, 7, 'VASCARA đồng hành bảo trợ Fashion Voyage No.5 - Dating with a kiss', 'vascara-dong-hanh-bao-tro-fashion-voyage-no5-dating-with-a-kiss', '<p>&nbsp;</p>\r\n\r\n<p><img alt=\"\" src=\"http://localhost:81/HoThiThuTrang_2120110029/public/upload/images/bai-viet/15.jpg\" style=\"height:402px; width:800px\" /></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Đ&acirc;y l&agrave; một trong những sự kiện thời trang lớn nhất nửa đầu năm 2023 của địa hạt thời trang Việt. Show diễn đ&atilde; đem đến cho giới mộ điệu một trải nghiệm mới về phong c&aacute;ch thưởng l&atilde;m thời trang giữa kh&ocirc;ng gian thi&ecirc;n nhi&ecirc;n, kiến tr&uacute;c với s&agrave;n diễn linh hoạt đầy cảm hứng v&agrave; truyền tải th&ocirc;ng điệp thời trang của c&aacute;c NTK qua mỗi chủ đề, điểm đến kh&aacute;c nhau.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><img alt=\"\" src=\"http://localhost:81/HoThiThuTrang_2120110029/public/upload/images/bai-viet/16.jpg\" style=\"height:402px; width:800px\" /></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>3 n&agrave;ng vedette biểu tượng thời trang Thanh Hằng, Hoa hậu H&#39;Hen Ni&ecirc; v&agrave; Hoa hậu Ngọc Ch&acirc;u c&ugrave;ng h&agrave;ng trăm người mẫu đ&atilde; trao gửi những chiếc h&ocirc;n nồng thắm qua từng sải bước tr&ecirc;n đường catwalk d&agrave;i hơn 1000m.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><img alt=\"\" src=\"http://localhost:81/HoThiThuTrang_2120110029/public/upload/images/bai-viet/17.jpg\" style=\"height:402px; width:800px\" /></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>H&agrave;ng loạt ng&ocirc;i sao đ&igrave;nh đ&aacute;m showbiz Việt đ&atilde; đến tham dự, như: Hoa hậu Ngọc Ch&acirc;u, Hoa hậu Lương Th&ugrave;y Linh, &Aacute; hậu Kim Duy&ecirc;n, &Aacute; hậu Phương Nhi, &Aacute; hậu Thảo Nhi L&ecirc;, &Aacute; hậu Phương Anh, diễn vi&ecirc;n Jun Vũ, ca sĩ Gil L&ecirc;,..</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><img alt=\"\" src=\"http://localhost:81/HoThiThuTrang_2120110029/public/upload/images/bai-viet/18.jpg\" style=\"height:402px; width:800px\" /></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><img alt=\"\" src=\"http://localhost:81/HoThiThuTrang_2120110029/public/upload/images/bai-viet/19.jpg\" style=\"height:402px; width:800px\" /></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><img alt=\"\" src=\"http://localhost:81/HoThiThuTrang_2120110029/public/upload/images/bai-viet/20.jpg\" style=\"height:402px; width:800px\" /></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><img alt=\"\" src=\"http://localhost:81/HoThiThuTrang_2120110029/public/upload/images/bai-viet/21.jpg\" style=\"height:402px; width:800px\" /></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Fashion Voyage No.5 - Dating with a Kiss l&agrave; chuyến hải tr&igrave;nh đ&aacute;nh dấu nửa thập kỷ ra đời v&agrave; chinh phục giới mộ điệu của Fashion Voyage - show thời trang kết hợp du lịch do đạo diễn Long Kan s&aacute;ng lập. Kh&aacute;n giả thật sự được đắm m&igrave;nh trong kh&ocirc;ng gian nghệ thuật thăng hoa bất tận th&ocirc;ng qua BST &quot;CTP No2&quot; của NTK Chung Thanh Phong, BST &aacute;o d&agrave;i &quot;Ới a ơi &agrave;&quot; của NTK Thủy Nguyễn v&agrave; BST v&aacute;y cưới &ldquo;La Rosa&rdquo; của NTK Phương Linh.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><img alt=\"\" src=\"http://localhost:81/HoThiThuTrang_2120110029/public/upload/images/bai-viet/22.jpg\" style=\"height:402px; width:800px\" /></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Vascara rất h&acirc;n hạnh khi được đồng h&agrave;nh c&ugrave;ng những show thời trang đẳng cấp như Fashion Voyage No.5</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><img alt=\"\" src=\"http://localhost:81/HoThiThuTrang_2120110029/public/upload/images/bai-viet/23.jpg\" style=\"height:402px; width:800px\" /></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><img alt=\"\" src=\"http://localhost:81/HoThiThuTrang_2120110029/public/upload/images/bai-viet/24.jpg\" style=\"height:402px; width:800px\" /></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><img alt=\"\" src=\"http://localhost:81/HoThiThuTrang_2120110029/public/upload/images/bai-viet/25.jpg\" style=\"height:402px; width:800px\" /></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><img alt=\"\" src=\"http://localhost:81/HoThiThuTrang_2120110029/public/upload/images/bai-viet/26.jpg\" style=\"height:402px; width:800px\" /></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><img alt=\"\" src=\"http://localhost:81/HoThiThuTrang_2120110029/public/upload/images/bai-viet/27.jpg\" style=\"height:402px; width:800px\" /></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><img alt=\"\" src=\"http://localhost:81/HoThiThuTrang_2120110029/public/upload/images/bai-viet/28.jpg\" style=\"height:402px; width:800px\" /></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><img alt=\"\" src=\"http://localhost:81/HoThiThuTrang_2120110029/public/upload/images/bai-viet/29.jpg\" style=\"height:402px; width:800px\" /></p>', 'vascara-dong-hanh-bao-tro-fashion-voyage-no5-dating-with-a-kiss.jpg', 'post', 'Fashion Voyage', '<p><em>Show diễn thời trang &ldquo;Dating with a kiss&rdquo; của Fashion Voyage tại đảo ngọc Ph&uacute; Quốc do Vascara bảo trợ đ&atilde; ch&iacute;nh thức kh&eacute;p lại nhưng dư &acirc;m vẫn c&ograve;n vang vọng m&atilde;i.</em></p>', 6, 6, 1, '2023-04-19 09:15:42', '2023-04-19 09:15:42'),
(11, NULL, 'Về chúng tôi', 've-chung-toi', '<p><img alt=\"\" src=\"http://localhost:81/HoThiThuTrang_2120110029/public/upload/images/banner-gioi-thieu.jpg\" style=\"height:315px; width:848px\" /></p>\r\n\r\n<p><strong>TRANGSHOP &ndash; DẪN ĐẦU XU HƯỚNG THỜI TRANG</strong></p>\r\n\r\n<p>Được s&aacute;ng tạo bởi C&ocirc;ng ty CP Thời trang Quốc tế Glamor, <strong>TRANGSHOP </strong>l&agrave; một cửa h&agrave;ng phụ kiện thời trang cao cấp h&agrave;ng đầu Việt Nam với c&aacute;c d&ograve;ng sản phẩm chủ đạo gồm t&uacute;i x&aacute;ch, gi&agrave;y d&eacute;p, k&iacute;nh mắt, d&acirc;y lưng thuộc c&aacute;c thương hiệu uy t&iacute;n d&agrave;nh cho cả nam v&agrave; nữ. Phong c&aacute;ch thời trang Ph&aacute;p l&agrave; n&eacute;t đặc trưng trong c&aacute;c thiết kế của <strong>TRANGSHOP</strong>, với sự kết hợp ho&agrave;n hảo của c&aacute;c yếu tố cổ điển v&agrave; hiện đại, sang trọng v&agrave; ph&oacute;ng kho&aacute;ng, đơn giản, tiện dụng nhưng lại hết sức tinh tế. C&aacute;c sản phẩm của <strong>TRANGSHOP </strong>từ l&acirc;u đ&atilde; hiện diện trong tủ đồ của những người y&ecirc;u thời trang như một lựa chọn h&agrave;ng đầu cho bất kỳ sự kiện n&agrave;o trong cuộc sống h&agrave;ng ng&agrave;y, đi l&agrave;m, đi chơi, gặp gỡ đối t&aacute;c hay c&aacute;c buổi tiệc trang trọng. Đảm bảo 100% h&agrave;ng ch&iacute;nh h&atilde;ng.</p>\r\n\r\n<p><strong>TRANGSHOP </strong>hiện đang sở hữu hệ thống gần 1 showroom c&ugrave;ng k&ecirc;nh thương mại điện tử được đầu tư b&agrave;i bản, phục vụ h&agrave;ng triệu lượt kh&aacute;ch h&agrave;ng tr&ecirc;n to&agrave;n Việt Nam. Tầm nh&igrave;n của <strong>TRANGSHOP</strong>trong những năm tới l&agrave; đạt mốc 20 showroom tại Việt Nam, đồng thời mở rộng hoạt động tại c&aacute;c nước Đ&ocirc;ng Nam &Aacute; như Singapore, Th&aacute;i Lan, Malaysia, Indonesia, Philippines v&agrave; xa hơn nữa l&agrave; chinh phục thị trường v&agrave; người ti&ecirc;u d&ugrave;ng Ch&acirc;u &Aacute;.</p>', 've-chung-toi.jpg', 'page', 'giới thiệu', '<p>Giới thiệu</p>', 6, 6, 1, '2023-04-27 01:07:10', '2023-04-27 01:07:10'),
(12, NULL, 'Chính sách & Quy định chung', 'chinh-sach-quy-dinh-chung', '<p><strong>Ch&agrave;o mừng Bạn đến với TRANGSHOP</strong></p>\r\n\r\n<p>Sau khi truy cập v&agrave;o website&nbsp;<strong>TRANGSHOP&nbsp;</strong>để tham khảo hoặc mua sắm, bạn đ&atilde; đồng &yacute; tu&acirc;n thủ v&agrave; r&agrave;ng buộc với những quy định của <strong>TRANGSHOP</strong>. Vui l&ograve;ng xem kỹ c&aacute;c quy định v&agrave; hợp t&aacute;c với ch&uacute;ng t&ocirc;i để x&acirc;y dựng&nbsp;<strong>TRANGSHOP</strong> ng&agrave;y c&agrave;ng th&acirc;n thiện v&agrave; phục vụ tốt những y&ecirc;u cầu của ch&iacute;nh bạn. Ngo&agrave;i ra, nếu c&oacute; bất cứ c&acirc;u hỏi n&agrave;o về những thỏa thuận tr&ecirc;n đ&acirc;y, vui l&ograve;ng E-mail cho ch&uacute;ng t&ocirc;i qua địa chỉ&nbsp;<a href=\"mailto:hothutrang421@gmail.com\">cskh@trangshop.vn</a></p>\r\n\r\n<p>Qu&yacute; kh&aacute;ch vui l&ograve;ng kiểm tra thường xuy&ecirc;n để cập nhật những thay đổi của ch&uacute;ng t&ocirc;i.</p>\r\n\r\n<p><strong>1. Hư</strong><strong>ớ</strong><strong>ng d</strong><strong>ẫ</strong><strong>n s</strong><strong>ử</strong><strong>&nbsp;d</strong><strong>ụ</strong><strong>ng web</strong></p>\r\n\r\n<p>Khi v&agrave;o web của ch&uacute;ng t&ocirc;i, người d&ugrave;ng tối thiểu phải 18 tuổi hoặc truy cập dưới sự gi&aacute;m s&aacute;t của cha mẹ hay người gi&aacute;m hộ hợp ph&aacute;p.</p>\r\n\r\n<p>Ch&uacute;ng t&ocirc;i cấp giấy ph&eacute;p sử dụng để bạn c&oacute; thể mua sắm tr&ecirc;n web trong khu&ocirc;n khổ Điều khoản v&agrave; Điều kiện sử dụng đ&atilde; đề ra.</p>\r\n\r\n<p>Nghi&ecirc;m cấm sử dụng bất kỳ phần n&agrave;o của trang web n&agrave;y với mục đ&iacute;ch thương mại hoặc nh&acirc;n danh bất kỳ đối t&aacute;c thứ ba n&agrave;o nếu kh&ocirc;ng được ch&uacute;ng t&ocirc;i cho ph&eacute;p bằng văn bản. Nếu vi phạm bất cứ điều n&agrave;o trong đ&acirc;y, ch&uacute;ng t&ocirc;i sẽ hủy giấy ph&eacute;p của bạn m&agrave; kh&ocirc;ng cần b&aacute;o trước.</p>\r\n\r\n<p>Trang web n&agrave;y chỉ d&ugrave;ng để cung cấp th&ocirc;ng tin sản phẩm chứ ch&uacute;ng t&ocirc;i kh&ocirc;ng phải nh&agrave; sản xuất n&ecirc;n những nhận x&eacute;t hiển thị tr&ecirc;n web l&agrave; &yacute; kiến c&aacute; nh&acirc;n của kh&aacute;ch h&agrave;ng, kh&ocirc;ng phải của ch&uacute;ng t&ocirc;i.</p>\r\n\r\n<p>Qu&yacute; kh&aacute;ch phải đăng k&yacute; t&agrave;i khoản với th&ocirc;ng tin x&aacute;c thực về bản th&acirc;n v&agrave; phải cập nhật nếu c&oacute; bất kỳ thay đổi n&agrave;o. Mỗi người truy cập phải c&oacute; tr&aacute;ch nhiệm với mật khẩu, t&agrave;i khoản v&agrave; hoạt động của m&igrave;nh tr&ecirc;n web. Hơn nữa, qu&yacute; kh&aacute;ch phải th&ocirc;ng b&aacute;o cho ch&uacute;ng t&ocirc;i biết khi t&agrave;i khoản bị truy cập tr&aacute;i ph&eacute;p. Ch&uacute;ng t&ocirc;i kh&ocirc;ng chịu bất kỳ tr&aacute;ch nhiệm n&agrave;o, d&ugrave; trực tiếp hay gi&aacute;n tiếp, đối với những thiệt hại hoặc mất m&aacute;t g&acirc;y ra do qu&yacute; kh&aacute;ch kh&ocirc;ng tu&acirc;n thủ quy định.</p>\r\n\r\n<p>Trong suốt qu&aacute; tr&igrave;nh đăng k&yacute;, qu&yacute; kh&aacute;ch đồng &yacute; nhận E-mail quảng c&aacute;o từ Website <strong>TRANGSHOP</strong>. Sau đ&oacute;, nếu kh&ocirc;ng muốn tiếp tục nhận E-mail, qu&yacute; kh&aacute;ch c&oacute; thể từ chối bằng c&aacute;ch nhấp v&agrave;o đường link ở dưới c&ugrave;ng trong mọi E-mail quảng c&aacute;o.</p>\r\n\r\n<p><strong>2. &Yacute; ki</strong><strong>ế</strong><strong>n kh&aacute;ch h&agrave;ng</strong></p>\r\n\r\n<p>Tất cả nội dung trang web v&agrave; &yacute; kiến ph&ecirc; b&igrave;nh của qu&yacute; kh&aacute;ch đều l&agrave; t&agrave;i sản của ch&uacute;ng t&ocirc;i. Nếu ch&uacute;ng t&ocirc;i ph&aacute;t hiện bất kỳ th&ocirc;ng tin giả mạo n&agrave;o, ch&uacute;ng t&ocirc;i sẽ kh&oacute;a t&agrave;i khoản của qu&yacute; kh&aacute;ch ngay lập tức hoặc &aacute;p dụng c&aacute;c biện ph&aacute;p kh&aacute;c theo quy định của ph&aacute;p luật Việt Nam.</p>\r\n\r\n<p><strong>3. Ch</strong><strong>ấ</strong><strong>p nh</strong><strong>ậ</strong><strong>n đơn h&agrave;ng v&agrave; gi&aacute; c</strong><strong>ả</strong></p>\r\n\r\n<p>Ch&uacute;ng t&ocirc;i c&oacute; quyền từ chối hoặc hủy đơn h&agrave;ng của qu&yacute; kh&aacute;ch v&igrave; bất kỳ l&yacute; do g&igrave; v&agrave;o bất kỳ l&uacute;c n&agrave;o. Ch&uacute;ng t&ocirc;i c&oacute; thể hỏi th&ecirc;m về số điện thoại v&agrave; địa chỉ trước khi nhận đơn h&agrave;ng.</p>\r\n\r\n<p>Ch&uacute;ng t&ocirc;i cam kết sẽ cung cấp th&ocirc;ng tin gi&aacute; cả ch&iacute;nh x&aacute;c nhất cho người ti&ecirc;u d&ugrave;ng. Tuy nhi&ecirc;n, đ&ocirc;i l&uacute;c vẫn c&oacute; sai s&oacute;t xảy ra, v&iacute; dụ như trường hợp gi&aacute; sản phẩm kh&ocirc;ng hiển thị ch&iacute;nh x&aacute;c tr&ecirc;n trang web hoặc sai gi&aacute;, t&ugrave;y theo từng trường hợp ch&uacute;ng t&ocirc;i sẽ li&ecirc;n hệ hướng dẫn hoặc th&ocirc;ng b&aacute;o hủy đơn h&agrave;ng đ&oacute; cho qu&yacute; kh&aacute;ch. Ch&uacute;ng t&ocirc;i cũng c&oacute; quyền từ chối hoặc hủy bỏ bất kỳ đơn h&agrave;ng n&agrave;o d&ugrave; đơn h&agrave;ng đ&oacute; đ&atilde; hay chưa được x&aacute;c nhận hoặc đ&atilde; bị thanh to&aacute;n.</p>\r\n\r\n<p><strong>4. Thương hi</strong><strong>ệ</strong><strong>u v&agrave; b</strong><strong>ả</strong><strong>n quy</strong><strong>ề</strong><strong>n</strong></p>\r\n\r\n<p>Mọi quyền sở hữu tr&iacute; tuệ (đ&atilde; đăng k&yacute; hoặc chưa đăng k&yacute;), nội dung th&ocirc;ng tin v&agrave; tất cả c&aacute;c thiết kế, văn bản, đồ họa, phần mềm, h&igrave;nh ảnh, video, &acirc;m nhạc, &acirc;m thanh, bi&ecirc;n dịch phần mềm, m&atilde; nguồn v&agrave; phần mềm cơ bản đều l&agrave; t&agrave;i sản của ch&uacute;ng t&ocirc;i. To&agrave;n bộ nội dung của trang web được bảo vệ bởi luật bản quyền của Việt Nam v&agrave; c&aacute;c c&ocirc;ng ước quốc tế. Bản quyền đ&atilde; được bảo lưu.</p>\r\n\r\n<p><strong>5. Quy</strong><strong>ề</strong><strong>n ph&aacute;p l&yacute;</strong></p>\r\n\r\n<p>C&aacute;c điều kiện, điều khoản v&agrave; nội dung của trang web n&agrave;y được điều chỉnh bởi luật ph&aacute;p Việt Nam v&agrave; T&ograve;a &aacute;n c&oacute; thẩm quyền tại Việt Nam sẽ giải quyết bất kỳ tranh chấp n&agrave;o ph&aacute;t sinh từ việc sử dụng tr&aacute;i ph&eacute;p trang web n&agrave;y.</p>\r\n\r\n<p><strong>6. Quy đ</strong><strong>ị</strong><strong>nh v</strong><strong>ề</strong><strong>&nbsp;b</strong><strong>ả</strong><strong>o m</strong><strong>ậ</strong><strong>t</strong></p>\r\n\r\n<p>Trang web của ch&uacute;ng t&ocirc;i coi trọng việc bảo mật th&ocirc;ng tin v&agrave; sử dụng c&aacute;c biện ph&aacute;p tốt nhất bảo vệ th&ocirc;ng tin v&agrave; việc thanh to&aacute;n của qu&yacute; kh&aacute;ch. Th&ocirc;ng tin của qu&yacute; kh&aacute;ch trong qu&aacute; tr&igrave;nh giao dịch sẽ được m&atilde; h&oacute;a để đảm bảo an to&agrave;n. Sau khi qu&yacute; kh&aacute;ch ho&agrave;n th&agrave;nh qu&aacute; tr&igrave;nh đặt h&agrave;ng, qu&yacute; kh&aacute;ch sẽ tho&aacute;t khỏi chế độ an to&agrave;n.</p>\r\n\r\n<p>Qu&yacute; kh&aacute;ch kh&ocirc;ng được sử dụng bất kỳ chương tr&igrave;nh, c&ocirc;ng cụ hay h&igrave;nh thức n&agrave;o kh&aacute;c để can thiệp v&agrave;o hệ thống hay l&agrave;m thay đổi cấu tr&uacute;c dữ liệu. Trang web cũng nghi&ecirc;m cấm việc ph&aacute;t t&aacute;n, truyền b&aacute; hay cổ vũ cho bất kỳ hoạt động n&agrave;o nhằm can thiệp, ph&aacute; hoại hay x&acirc;m nhập v&agrave;o dữ liệu của hệ thống. C&aacute; nh&acirc;n hay tổ chức vi phạm sẽ bị tước bỏ mọi quyền lợi cũng như sẽ bị truy tố trước ph&aacute;p luật nếu cần thiết.</p>\r\n\r\n<p>Mọi th&ocirc;ng tin giao dịch sẽ được bảo mật nhưng trong trường hợp cơ quan ph&aacute;p luật y&ecirc;u cầu, ch&uacute;ng t&ocirc;i sẽ buộc phải cung cấp những th&ocirc;ng tin n&agrave;y cho c&aacute;c cơ quan ph&aacute;p luật.</p>\r\n\r\n<p><strong>7. Thanh to&aacute;n an to&agrave;n v&agrave; ti</strong><strong>ệ</strong><strong>n l</strong><strong>ợ</strong><strong>i</strong></p>\r\n\r\n<p>&ndash; Mọi kh&aacute;ch h&agrave;ng tham gia giao dịch tại&nbsp;<strong>TRANGSHOP</strong>&nbsp;đều được bảo mật an to&agrave;n, nhanh ch&oacute;ng v&agrave; tiện lợi.</p>\r\n\r\n<p><strong>8. Giao k</strong><strong>ế</strong><strong>t giao d</strong><strong>ị</strong><strong>ch</strong></p>\r\n\r\n<p>Nhằm mang đến qu&yacute; kh&aacute;ch những trải nghiệm mua sắm trực tuyến tuyệt vời nhất tại <strong>TRANGSHOP</strong>, ch&uacute;ng t&ocirc;i đưa ra nhiều phương thức thanh to&aacute;n để qu&yacute; kh&aacute;ch dễ d&agrave;ng lựa chọn:</p>\r\n\r\n<p>&ndash; Thanh to&aacute;n khi nhận h&agrave;ng (COD)</p>\r\n\r\n<p><strong>9. Thanh to&aacute;n khi nh</strong><strong>ậ</strong><strong>n h&agrave;ng (COD / Cash On Delivery)</strong></p>\r\n\r\n<p>&ndash; L&agrave; c&aacute;ch thanh to&aacute;n dễ d&agrave;ng nhất, đặc biệt khi qu&yacute; kh&aacute;ch kh&ocirc;ng quen với c&aacute;c h&igrave;nh thức thanh to&aacute;n trực tuyến.<br />\r\n&ndash; Ngay sau khi nhận được đơn h&agrave;ng, TRANGSHOP&nbsp;sẽ x&aacute;c nhận với qu&yacute; kh&aacute;ch qua email v&agrave; Gọi điện thoại trực tiếp x&aacute;c nhận đơn h&agrave;ng v&agrave; phương thức thanh to&aacute;n cụ thể<br />\r\n&ndash; Kh&aacute;ch h&agrave;ng lựa chọn quyết định phương thức thanh to&aacute;n COD hoặc Chuyển khoản.<br />\r\n&ndash; TRANGSHOP&nbsp;tiến h&agrave;nh thực hiện đơn h&agrave;ng v&agrave; giao h&agrave;ng trong thời gian quy định. TRANGSHOP&nbsp;cũng sẽ thường xuy&ecirc;n cập nhật trạng th&aacute;i đơn h&agrave;ng của qu&yacute; kh&aacute;ch th&ocirc;ng qua E-mail hoặc tin nhắn SMS. TRANGSHOP&nbsp;li&ecirc;n kết với đối t&aacute;c giao h&agrave;ng tin cậy, thanh to&aacute;n tại TRANGSHOP&nbsp;thật Đơn giản, An to&agrave;n.<br />\r\nQu&yacute; kh&aacute;ch muốn biết l&agrave;m thế n&agrave;o để chọn phương thức thanh to&aacute;n ph&ugrave; hợp?<br />\r\n<strong>COD l&agrave; g&igrave;?</strong></p>\r\n\r\n<p>COD&nbsp;<em>(l&agrave; vi</em><em>ế</em><em>t t</em><em>ắ</em><em>t c</em><em>ủ</em><em>a Cash On Delivery)</em>&nbsp;nghĩa l&agrave; thanh to&aacute;n khi nhận h&agrave;ng. Với phương thức thanh to&aacute;n n&agrave;y, qu&yacute; kh&aacute;ch trả tiền mặt cho nh&acirc;n vi&ecirc;n giao h&agrave;ng ngay khi nhận được đơn h&agrave;ng của m&igrave;nh. Ch&uacute;ng t&ocirc;i chấp nhận h&igrave;nh thức thanh to&aacute;n khi nhận h&agrave;ng (COD) cho tất cả c&aacute;c đơn h&agrave;ng tr&ecirc;n to&agrave;n quốc.<br />\r\n<strong>10. L&agrave;m th</strong><strong>ế</strong><strong>&nbsp;n&agrave;o đ</strong><strong>ể</strong><strong>&nbsp;bi</strong><strong>ế</strong><strong>t đư</strong><strong>ợ</strong><strong>c giao d</strong><strong>ị</strong><strong>ch thanh to&aacute;n c</strong><strong>ủ</strong><strong>a t&ocirc;i c&oacute; th&agrave;nh c&ocirc;ng kh&ocirc;ng?</strong></p>\r\n\r\n<p>Kết quả của giao dịch thanh to&aacute;n sẽ được th&ocirc;ng b&aacute;o qua E-mail, Tin nhắn sms, TRANGSHOP&nbsp;gọi điện thoại x&aacute;c nhận sau khi đơn h&agrave;ng của qu&yacute; kh&aacute;ch đ&atilde; được ghi nhận.</p>\r\n\r\n<p>Ch&uacute;ng t&ocirc;i chịu tr&aacute;ch nhiệm về nội dung th&ocirc;ng tin cung cấp tr&ecirc;n trang website&nbsp;<strong>TRANGSHOP</strong>&nbsp;, thực hiện quy định của Ph&aacute;p Luật về giao kết hợp đồng, đặt h&agrave;ng, thanh to&aacute;n.</p>\r\n\r\n<ol>\r\n	<li><strong>Thay đ</strong><strong>ổ</strong><strong>i, h</strong><strong>ủ</strong><strong>y b</strong><strong>ỏ</strong><strong>&nbsp;giao d</strong><strong>ị</strong><strong>ch t</strong><strong>ại&nbsp;TRANGSHOP&nbsp;</strong><br />\r\n	Trong mọi trường hợp, kh&aacute;ch h&agrave;ng đều c&oacute; quyền chấm dứt giao dịch nếu đ&atilde; thực hiện c&aacute;c biện ph&aacute;p sau đ&acirc;y:</li>\r\n	<li>Th&ocirc;ng b&aacute;o cho &nbsp;<strong>TRANGSHOP&nbsp;</strong>về việc hủy giao dịch qua đường d&acirc;y n&oacute;ng &nbsp;hoặc lời ghi nhắn tại mục Li&ecirc;n hệ.</li>\r\n	<li>Trả lại h&agrave;ng ho&aacute; đ&atilde; nhận nhưng chưa sử dụng hoặc hưởng bất kỳ lợi &iacute;ch n&agrave;o từ h&agrave;ng h&oacute;a đ&oacute; theo quy định của ch&iacute;nh s&aacute;ch đổi trả h&agrave;ng.</li>\r\n	<li><strong>Gi</strong><strong>ả</strong><strong>i quy</strong><strong>ế</strong><strong>t h</strong><strong>ậ</strong><strong>u qu</strong><strong>ả</strong><strong>&nbsp;do l</strong><strong>ỗ</strong><strong>i nh</strong><strong>ậ</strong><strong>p sai th&ocirc;ng tin tại&nbsp;TRANGSHOP&nbsp;</strong><br />\r\n	Kh&aacute;ch h&agrave;ng c&oacute; tr&aacute;ch nhiệm cung cấp th&ocirc;ng tin đầy đủ v&agrave; ch&iacute;nh x&aacute;c khi tham gia giao dịch tại&nbsp;&nbsp;<strong>TRANGSHOP&nbsp;</strong>. Trong trường hợp kh&aacute;ch h&agrave;ng nhập sai th&ocirc;ng tin gửi v&agrave;o trang th&ocirc;ng tin điện tử b&aacute;n h&agrave;ng&nbsp;&nbsp;<strong>TRANGSHOP</strong>,&nbsp;<strong>TRANGSHOP</strong>&nbsp;c&oacute; quyền từ chối thực hiện giao dịch. Ngo&agrave;i ra, trong mọi trường hợp, kh&aacute;ch h&agrave;ng đều c&oacute; quyền đơn phương chấm dứt giao dịch nếu đ&atilde; thực hiện c&aacute;c biện ph&aacute;p sau đ&acirc;y:</li>\r\n	<li>Th&ocirc;ng b&aacute;o cho&nbsp;&nbsp;<strong>TRANGSHOP&nbsp;</strong> qua đường d&acirc;y n&oacute;ng&nbsp;<strong>097.503.0513&nbsp;</strong>hoặc lời nhập nhắn tại mục Li&ecirc;n hệ.</li>\r\n	<li>Trả lại h&agrave;ng ho&aacute; đ&atilde; nhận nhưng chưa sử dụng hoặc hưởng bất kỳ lợi &iacute;ch n&agrave;o từ h&agrave;ng h&oacute;a đ&oacute;.</li>\r\n	<li><strong>Gi</strong><strong>ả</strong><strong>i quy</strong><strong>ế</strong><strong>t tranh ch</strong><strong>ấ</strong><strong>p</strong></li>\r\n</ol>\r\n\r\n<p>Bất kỳ tranh c&atilde;i, khiếu nại hoặc tranh chấp ph&aacute;t sinh tử hoặc li&ecirc;n quan đến giao dịch tại <strong>TRANGSHOP</strong>&nbsp;hoặc c&aacute;c Quy định v&agrave; Điều kiện n&agrave;y đều sẽ được giải quyết bằng h&igrave;nh thức thương lượng, h&ograve;a giải, trọng t&agrave;i v&agrave;/hoặc T&ograve;a &aacute;n theo Luật bảo vệ Người ti&ecirc;u d&ugrave;ng Chương 4 về Giải quyết tranh chấp giữa người ti&ecirc;u d&ugrave;ng v&agrave; tổ chức, c&aacute; nh&acirc;n kinh doanh h&agrave;ng h&oacute;a, dịch vụ.</p>\r\n\r\n<p><strong>&nbsp; &nbsp; 11. Lu</strong><strong>ậ</strong><strong>t ph&aacute;p v&agrave; th</strong><strong>ẩ</strong><strong>m quy</strong><strong>ề</strong><strong>n t</strong><strong>ạ</strong><strong>i Vi</strong><strong>ệ</strong><strong>t Nam</strong></p>\r\n\r\n<p>Tất cả c&aacute;c Điều Khoản v&agrave; Điều Kiện n&agrave;y v&agrave; Hợp Đồng (v&agrave; tất cả nghĩa vụ ph&aacute;t sinh ngo&agrave;i hợp đồng hoặc c&oacute; li&ecirc;n quan) sẽ bị chi phối v&agrave; được hiểu theo luật ph&aacute;p của Việt Nam. Nếu c&oacute; tranh chấp ph&aacute;t sinh bởi c&aacute;c Quy định Sử dụng n&agrave;y, qu&yacute; kh&aacute;ch gửi khiếu nại l&ecirc;n t&ograve;a &aacute;n Việt Nam để giải quyết.</p>', 'chinh-sach-quy-dinh-chung.jpg', 'page', 'chính sách', '<p>Ch&iacute;nh s&aacute;ch &amp; Quy định chung</p>', 6, NULL, 1, '2023-04-27 01:18:08', '2023-04-27 01:18:08'),
(13, NULL, 'Phương thức thanh toán', 'phuong-thuc-thanh-toan', '<h1><img alt=\"\" src=\"http://localhost:81/HoThiThuTrang_2120110029/public/upload/images/phuong-thuc-thanh-toan-7.png\" /></h1>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Kh&aacute;ch h&agrave;ng&nbsp;c&oacute; thể tham khảo c&aacute;c phương thức thanh to&aacute;n sau đ&acirc;y v&agrave; lựa chọn &aacute;p dụng phương thức ph&ugrave; hợp:</p>\r\n\r\n<p><em><strong>- C&aacute;ch 1:</strong></em>&nbsp;Thanh to&aacute;n khi nhận h&agrave;ng (COD &ndash; giao h&agrave;ng v&agrave; thu tiền tận nơi).</p>\r\n\r\n<p><em><strong>- C&aacute;ch 2:</strong></em>&nbsp;Thanh to&aacute;n trực tuyến th&ocirc;ng qua thẻ t&iacute;n dụng quốc tế.</p>\r\n\r\n<p><em><strong>- C&aacute;ch 3:&nbsp;</strong></em>Thanh to&aacute;n trực tuyến th&ocirc;ng qua thẻ ng&acirc;n h&agrave;ng trong nước c&oacute; đăng k&iacute; Internet Banking.</p>\r\n\r\n<p><em><strong>- C&aacute;ch 4:&nbsp;</strong></em>Thanh to&aacute;n qua c&aacute;c&nbsp;v&iacute; điện tử (MoMo, ZaloPay, ShopeePay, VNPay).</p>\r\n\r\n<p>Đối với người mua h&agrave;ng từ TRANGSHOP th&igrave; phải tu&acirc;n thủ theo ch&iacute;nh s&aacute;ch thanh to&aacute;n của c&ocirc;ng ty.</p>', 'phuong-thuc-thanh-toan.png', 'page', 'thanh toán', '<p>Thanh to&aacute;n</p>', 6, NULL, 1, '2023-04-27 01:21:41', '2023-04-27 01:21:41'),
(14, NULL, 'Chính sách bảo mật', 'chinh-sach-bao-mat', '<p>Tại TRANGSHOP sự ri&ecirc;ng tư của kh&aacute;ch h&agrave;ng l&agrave; điều v&ocirc; c&ugrave;ng quan trọng. V&igrave; thế, TRANGSHOP sẽ chỉ thu thập những th&ocirc;ng tin cần thiết v&agrave; c&oacute; li&ecirc;n quan đến giao dịch giữa qu&yacute; kh&aacute;ch h&agrave;ng v&agrave; TRANGSHOP. Những th&ocirc;ng tin n&agrave;y gồm c&oacute; t&ecirc;n, số điện thoại v&agrave; một số th&ocirc;ng tin kh&aacute;c của qu&yacute; kh&aacute;ch h&agrave;ng theo c&aacute;ch được đề ra trong &quot;Ch&iacute;nh S&aacute;ch Bảo Mật&quot; n&agrave;y.</p>\r\n\r\n<p>Qu&yacute; kh&aacute;ch c&oacute; thể gh&eacute; thăm trang web TRANGSHOP m&agrave; kh&ocirc;ng cần phải cung cấp bất kỳ th&ocirc;ng tin c&aacute; nh&acirc;n n&agrave;o. Khi truy cập trang web, qu&yacute; kh&aacute;ch sẽ lu&ocirc;n ở trong t&igrave;nh trạng v&ocirc; danh trừ khi qu&yacute; kh&aacute;ch đăng k&yacute; t&agrave;i khoản tr&ecirc;n web v&agrave; đăng nhập v&agrave;o t&agrave;i khoản đ&oacute;.</p>\r\n\r\n<p>Quy định Bảo mật của TRANGSHOP ho&agrave;n to&agrave;n tu&acirc;n theo theo Quy định của Ph&aacute;p luật về Bảo mật th&ocirc;ng tin c&aacute; nh&acirc;n.<br />\r\n1. Thu thập th&ocirc;ng tin c&aacute; nh&acirc;n<br />\r\n- TRANGSHOP kh&ocirc;ng b&aacute;n, chia sẻ hay trao đổi th&ocirc;ng tin c&aacute; nh&acirc;n của kh&aacute;ch h&agrave;ng thu thập tr&ecirc;n website cho một b&ecirc;n thứ ba n&agrave;o kh&aacute;c.</p>\r\n\r\n<p>- Th&ocirc;ng tin c&aacute; nh&acirc;n của qu&yacute; kh&aacute;ch h&agrave;ng sẽ chỉ được sử dụng trong nội bộ cửa h&agrave;ng.&nbsp;</p>\r\n\r\n<p>- Khi qu&yacute; kh&aacute;ch đăng k&yacute; t&agrave;i khoản TRANGSHOP, th&ocirc;ng tin c&aacute; nh&acirc;n m&agrave; ch&uacute;ng t&ocirc;i thu thập bao gồm:</p>\r\n\r\n<p>&bull; Họ &amp; T&ecirc;n<br />\r\n&bull; Địa chỉ giao h&agrave;ng<br />\r\n&bull; Địa chỉ<br />\r\n&bull; Email<br />\r\n&bull; Số điện thoại cố định<br />\r\n&bull; Số điện thoại di động<br />\r\n&bull; Ng&agrave;y sinh<br />\r\n&bull; Giới t&iacute;nh<br />\r\nNhững th&ocirc;ng tin tr&ecirc;n sẽ được sử dụng cho một hoặc tất cả c&aacute;c mục đ&iacute;ch sau đ&acirc;y:</p>\r\n\r\n<p>&bull; Gửi c&aacute;c th&ocirc;ng tin tiếp thị quảng c&aacute;o dạng tin nhắn văn bản (newlsletters) kh&ocirc;ng c&aacute; nh&acirc;n h&oacute;a định kỳ theo c&aacute;c chương tr&igrave;nh của TRANGSHOP h&agrave;ng tuần, h&agrave;ng th&aacute;ng hoặc qu&yacute;.<br />\r\n&bull; Gửi c&aacute;c th&ocirc;ng tin tiếp thị quảng c&aacute;o dạng tin nhắn văn bản (newlsletters) c&aacute; nh&acirc;n h&oacute;a định kỳ theo c&aacute;c chương tr&igrave;nh của TRANGSHOP h&agrave;ng tuần, h&agrave;ng th&aacute;ng hoặc qu&yacute;.<br />\r\n&bull; Giao h&agrave;ng qu&yacute; kh&aacute;ch đ&atilde; mua tại TRANGSHOP.<br />\r\n&bull; Th&ocirc;ng b&aacute;o về việc giao h&agrave;ng v&agrave; hỗ trợ kh&aacute;ch h&agrave;ng.<br />\r\n&bull; Cung cấp th&ocirc;ng tin li&ecirc;n quan đến sản phẩm.<br />\r\n&bull; Xử l&yacute; đơn đặt h&agrave;ng v&agrave; cung cấp dịch vụ v&agrave; th&ocirc;ng tin qua trang web của ch&uacute;ng t&ocirc;i theo y&ecirc;u cầu của qu&yacute; kh&aacute;ch.<br />\r\nNgo&agrave;i ra, ch&uacute;ng t&ocirc;i sẽ sử dụng th&ocirc;ng tin qu&yacute; kh&aacute;ch cung cấp để hỗ trợ quản l&yacute; t&agrave;i khoản kh&aacute;ch h&agrave;ng; x&aacute;c nhận v&agrave; thực hiện c&aacute;c giao dịch t&agrave;i ch&iacute;nh li&ecirc;n quan đến c&aacute;c khoản thanh to&aacute;n trực tuyến của qu&yacute; kh&aacute;ch; kiểm tra dữ liệu tải từ trang web của ch&uacute;ng t&ocirc;i; cải thiện giao diện v&agrave;/hoặc nội dung của c&aacute;c trang mục tr&ecirc;n trang web v&agrave; t&ugrave;y chỉnh để dễ d&agrave;ng hơn khi sử dụng; nhận diện kh&aacute;ch đến thăm trang web; nghi&ecirc;n cứu về nh&acirc;n khẩu học của người sử dụng; gửi đến qu&yacute; kh&aacute;ch th&ocirc;ng tin m&agrave; ch&uacute;ng t&ocirc;i nghĩ sẽ c&oacute; &iacute;ch hoặc do qu&yacute; kh&aacute;ch y&ecirc;u cầu, bao gồm th&ocirc;ng tin về sản phẩm v&agrave; dịch vụ, với điều kiện qu&yacute; kh&aacute;ch đồng &yacute; kh&ocirc;ng phản đối việc được li&ecirc;n lạc cho c&aacute;c mục đ&iacute;ch tr&ecirc;n.</p>\r\n\r\n<p>Ch&uacute;ng t&ocirc;i c&oacute; thể chia sẻ t&ecirc;n v&agrave; địa chỉ của qu&yacute; kh&aacute;ch cho dịch vụ chuyển ph&aacute;t nhanh hoặc nh&agrave; cung cấp của ch&uacute;ng t&ocirc;i để c&oacute; thể giao h&agrave;ng cho qu&yacute; kh&aacute;ch.</p>\r\n\r\n<p>Khi qu&yacute; kh&aacute;ch đăng k&yacute; l&agrave;m th&agrave;nh vi&ecirc;n tr&ecirc;n trang web TRANGSHOP, ch&uacute;ng t&ocirc;i cũng sẽ sử dụng th&ocirc;ng tin c&aacute; nh&acirc;n của qu&yacute; kh&aacute;ch để gửi c&aacute;c th&ocirc;ng tin khuyến m&atilde;i/tiếp thị. Qu&yacute; kh&aacute;ch c&oacute; thể hủy nhận c&aacute;c th&ocirc;ng tin đ&oacute; bất kỳ l&uacute;c n&agrave;o bằng c&aacute;ch sử dụng chức năng hủy đăng k&yacute; trong c&aacute;c th&ocirc;ng b&aacute;o quảng c&aacute;o.</p>\r\n\r\n<p>C&aacute;c khoản thanh to&aacute;n m&agrave; qu&yacute; kh&aacute;ch thực hiện qua trang web sẽ được xử l&yacute; bởi TRANGSHOP. Qu&yacute; kh&aacute;ch phải cung cấp cho ch&uacute;ng t&ocirc;i, đại l&yacute; của ch&uacute;ng t&ocirc;i hoặc trang web những th&ocirc;ng tin ch&iacute;nh x&aacute;c v&agrave; phải lu&ocirc;n cập nhật th&ocirc;ng tin v&agrave; th&ocirc;ng b&aacute;o cho ch&uacute;ng t&ocirc;i biết nếu c&oacute; thay đổi.</p>\r\n\r\n<p>Chi tiết đơn h&agrave;ng của qu&yacute; kh&aacute;ch sẽ được ch&uacute;ng t&ocirc;i lưu trữ nhưng v&igrave; l&yacute; do bảo mật, n&ecirc;n ch&uacute;ng t&ocirc;i kh&ocirc;ng c&ocirc;ng khai trực tiếp được. Tuy nhi&ecirc;n, qu&yacute; kh&aacute;ch c&oacute; thể kiểm tra th&ocirc;ng tin đ&oacute; bằng c&aacute;ch đăng nhập v&agrave;o t&agrave;i khoản ri&ecirc;ng của m&igrave;nh tr&ecirc;n trang web. Tại đ&oacute;, qu&yacute; kh&aacute;ch c&oacute; thể theo d&otilde;i đầy đủ chi tiết của c&aacute;c đơn h&agrave;ng đ&atilde; ho&agrave;n tất, những đơn h&agrave;ng mở v&agrave; những đơn h&agrave;ng sắp được giao cũng như quản l&yacute; th&ocirc;ng tin về địa chỉ, th&ocirc;ng tin về ng&acirc;n h&agrave;ng v&agrave; những bản tin m&agrave; qu&yacute; kh&aacute;ch đ&atilde; đăng k&yacute; nhận. Qu&yacute; kh&aacute;ch cần bảo đảm l&agrave; th&ocirc;ng tin được truy cập một c&aacute;ch b&iacute; mật v&agrave; kh&ocirc;ng l&agrave;m lộ cho một b&ecirc;n thứ ba kh&ocirc;ng c&oacute; quyền. Ch&uacute;ng t&ocirc;i sẽ kh&ocirc;ng chịu tr&aacute;ch nhiệm đối với việc sử dụng sai mật khẩu trừ khi đ&oacute; l&agrave; lỗi của ch&uacute;ng t&ocirc;i.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>2. Cập nhật th&ocirc;ng tin c&aacute; nh&acirc;n<br />\r\nCập nhật th&ocirc;ng tin c&aacute; nh&acirc;n Qu&yacute; kh&aacute;ch c&oacute; thể cập nhật th&ocirc;ng tin c&aacute; nh&acirc;n của m&igrave;nh bất kỳ l&uacute;c n&agrave;o bằng c&aacute;ch đăng nhập v&agrave;o trang web TRANGSHOP.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>3. Bảo mật th&ocirc;ng tin c&aacute; nh&acirc;n<br />\r\nTRANGSHOP đảm bảo rằng mọi th&ocirc;ng tin thu thập được sẽ được lưu giữ an to&agrave;n. Ch&uacute;ng t&ocirc;i bảo vệ th&ocirc;ng tin c&aacute; nh&acirc;n của qu&yacute; kh&aacute;ch bằng c&aacute;ch:</p>\r\n\r\n<p>&bull; Giới hạn truy cập th&ocirc;ng tin c&aacute; nh&acirc;n.<br />\r\n&bull; Sử dụng sản phẩm c&ocirc;ng nghệ để ngăn chặn truy cập m&aacute;y t&iacute;nh tr&aacute;i ph&eacute;p.<br />\r\n&bull; X&oacute;a th&ocirc;ng tin c&aacute; nh&acirc;n của qu&yacute; kh&aacute;ch khi n&oacute; kh&ocirc;ng c&ograve;n cần thiết cho mục đ&iacute;ch lưu trữ hồ sơ của ch&uacute;ng t&ocirc;i<br />\r\n&nbsp;<br />\r\n4. Tiết lộ th&ocirc;ng tin c&aacute; nh&acirc;n<br />\r\nCh&uacute;ng t&ocirc;i sẽ kh&ocirc;ng chia sẻ th&ocirc;ng tin của qu&yacute; kh&aacute;ch cho bất kỳ một c&ocirc;ng ty n&agrave;o kh&aacute;c ngoại trừ những c&ocirc;ng ty v&agrave; c&aacute;c b&ecirc;n thứ ba c&oacute; li&ecirc;n quan trực tiếp đến việc giao h&agrave;ng m&agrave; qu&yacute; kh&aacute;ch đ&atilde; mua tại TRANGSHOP. Trong một v&agrave;i trường hợp đặc biệt, TRANGSHOP c&oacute; thể bị y&ecirc;u cầu phải tiết lộ th&ocirc;ng tin c&aacute; nh&acirc;n, v&iacute; dụ như khi c&oacute; căn cứ cho việc tiết lộ th&ocirc;ng tin l&agrave; cần thiết để ngăn chặn c&aacute;c mối đe dọa về t&iacute;nh mạng v&agrave; sức khỏe, hay cho mục đ&iacute;ch thực thi ph&aacute;p luật. TRANGSHOP cam kết tu&acirc;n thủ Đạo luật Bảo Mật v&agrave; c&aacute;c Nguy&ecirc;n tắc Bảo mật Quốc gia.</p>\r\n\r\n<p>Thu thập dữ liệu m&aacute;y t&iacute;nh khi qu&yacute; kh&aacute;ch đến thăm TRANGSHOP, m&aacute;y chủ của c&ocirc;ng ty ch&uacute;ng t&ocirc;i sẽ tự động lưu trữ th&ocirc;ng tin m&agrave; tr&igrave;nh duyệt của qu&yacute; kh&aacute;ch gửi đến. Những th&ocirc;ng tin n&agrave;y bao gồm:</p>\r\n\r\n<p>&bull; Địa chỉ IP của qu&yacute; kh&aacute;ch<br />\r\n&bull; Loại tr&igrave;nh duyệt<br />\r\n&bull; C&aacute;c trang web m&agrave; qu&yacute; kh&aacute;ch đ&atilde; gh&eacute; thăm trước khi đến trang web của ch&uacute;ng t&ocirc;i<br />\r\n&bull; Những trang mục trong TRANGSHOP m&agrave; qu&yacute; kh&aacute;ch gh&eacute; thăm<br />\r\n&bull; Khoảng thời gian qu&yacute; kh&aacute;ch gi&agrave;nh ra đ&atilde; xem những trang mục đ&oacute;, sản phẩm, t&igrave;m kiếm th&ocirc;ng tin tr&ecirc;n trang web, thời gian v&agrave; ng&agrave;y th&aacute;ng truy cập, v&agrave; c&aacute;c số liệu thống k&ecirc; kh&aacute;c.<br />\r\nC&aacute;c th&ocirc;ng tin đ&oacute; được thu thập cho mục đ&iacute;ch ph&acirc;n t&iacute;ch v&agrave; đ&aacute;nh gi&aacute; để g&oacute;p phần cải thiện trang web, dịch vụ, v&agrave; sản phẩm m&agrave; ch&uacute;ng t&ocirc;i cung cấp. Những dữ liệu đ&oacute; sẽ kh&ocirc;ng c&oacute; li&ecirc;n quan g&igrave; đến c&aacute;c th&ocirc;ng tin c&aacute; nh&acirc;n kh&aacute;c.</p>\r\n\r\n<p>Như đ&atilde; đề cập ở phần tr&ecirc;n, TRANGSHOP sẽ sử dụng t&iacute;nh năng của Google Analytics dựa tr&ecirc;n những dữ liệu về quảng c&aacute;o bằng h&igrave;nh ảnh (Display advertising) bao gồm những phần sau: b&aacute;o c&aacute;o về Re-marketing, b&aacute;o c&aacute;o về số lượt hiện quảng c&aacute;o h&igrave;nh ảnh tr&ecirc;n mạng lưới trang web của Google, b&aacute;o c&aacute;o về Double Click, thống k&ecirc; h&agrave;nh vi &amp; sở th&iacute;ch kh&aacute;ch h&agrave;ng tr&ecirc;n Google Analytics. H&atilde;y chọn mục thiết lập quảng c&aacute;o của Google (https://www.google.com/settings/ads ), để bạn c&oacute; thể tắt phần hiển thị quảng c&aacute;o từ Google Analytics v&agrave; t&ugrave;y chỉnh quảng c&aacute;o tr&ecirc;n hệ thống Google Display Network.</p>\r\n\r\n<p>Ngo&agrave;i ra, TRANGSHOP c&ograve;n sử dụng chức năng Re-marketing của Google Analytic để quảng c&aacute;o trực tuyến; c&aacute;c b&ecirc;n thứ ba (bao gồm Google) sẽ c&oacute; thể hiển thị quảng c&aacute;o của TRANGSHOP tr&ecirc;n c&aacute;c website li&ecirc;n kết. TRANGSHOP v&agrave; b&ecirc;n cung cấp thứ 3, bao gồm cả Google, sẽ sử dụng cookies của b&ecirc;n thứ nhất (như Google Analytics cookies v&agrave; cookie) của b&ecirc;n thứ 3 (như DoubleClick) để th&ocirc;ng b&aacute;o, tối ưu h&oacute;a v&agrave; tr&igrave;nh chiếu c&aacute;c mẫu quảng c&aacute;o dựa tr&ecirc;n những lần kh&aacute;ch h&agrave;ng truy cập website trước đ&oacute;, đồng thời cho biết kết quả phản ứng của kh&aacute;ch h&agrave;ng đối với mẫu quảng c&aacute;o, những c&aacute;ch sử dụng kh&aacute;c của quảng c&aacute;o v&agrave; độ tương t&aacute;c của những mẫu quảng c&aacute;o n&agrave;y v&agrave; dịch vụ quảng c&aacute;o đến số lượng truy cập v&agrave;o trang TRANGSHOP.<br />\r\n&nbsp;<br />\r\n5. Sử dụng Cookie<br />\r\nKhi kh&aacute;ch h&agrave;ng sử dụng dịch vụ hoặc xem nội dung do TRANGSHOP cung cấp, ch&uacute;ng t&ocirc;i tự động thu thập v&agrave; lưu trữ một số th&ocirc;ng tin trong nhật k&yacute; m&aacute;y chủ. Những th&ocirc;ng tin n&agrave;y bao gồm:</p>\r\n\r\n<p>&bull; C&aacute;c chi tiết về c&aacute;ch kh&aacute;ch h&agrave;ng sử dụng dịch vụ của TRANGSHOP chẳng hạn như truy vấn t&igrave;m kiếm.<br />\r\n&bull; Địa chỉ giao thức Internet.<br />\r\n&bull; Th&ocirc;ng tin sự cố thiết bị như lỗi, hoạt động của hệ thống, c&agrave;i đặt phần cứng, loại tr&igrave;nh duyệt, ng&ocirc;n ngữ tr&igrave;nh duyệt, ng&agrave;y v&agrave; thời gian bạn y&ecirc;u cầu v&agrave; URL giới thiệu.<br />\r\n&bull; Cookie c&oacute; thể nhận dạng duy nhất tr&igrave;nh duyệt hoặc T&agrave;i khoản của kh&aacute;ch h&agrave;ng</p>\r\n\r\n<p>6. Ch&iacute;nh s&aacute;ch bảo mật thanh to&aacute;n<br />\r\n- Hệ thống thanh to&aacute;n thẻ tr&ecirc;n TRANGSHOP được cung cấp bởi c&aacute;c đối t&aacute;c cổng thanh to&aacute;n đ&atilde; được cấp ph&eacute;p hoạt động hợp ph&aacute;p tại Việt Nam. Do đ&oacute;, c&aacute;c ti&ecirc;u chuẩn bảo mật thanh to&aacute;n thẻ của TRANGSHOP đảm bảo tu&acirc;n thủ theo c&aacute;c ti&ecirc;u chuẩn bảo mật của Đối t&aacute;c cộng thanh to&aacute;n.</p>\r\n\r\n<p>- Ngo&agrave;i ra, TRANGSHOP c&ograve;n c&oacute; c&aacute;c ti&ecirc;u chuẩn bảo mật giao dịch thanh to&aacute;n ri&ecirc;ng để đảm bảo an to&agrave;n c&aacute;c th&ocirc;ng tin thanh to&aacute;n của kh&aacute;ch h&agrave;ng.</p>\r\n\r\n<p>7. Thay đổi của Ch&iacute;nh s&aacute;ch Bảo mật&nbsp;<br />\r\nTRANGSHOP c&oacute; quyền thay đổi v&agrave; chỉnh sửa Quy định Bảo mật v&agrave;o bất kỳ l&uacute;c n&agrave;o. Bất cứ thay đổi n&agrave;o về ch&iacute;nh s&aacute;ch n&agrave;y đều được đăng tr&ecirc;n trang web của ch&uacute;ng t&ocirc;i.</p>', 'chinh-sach-bao-mat.png', 'page', 'bảo mật', '<p>Ch&iacute;nh s&aacute;ch bảo mật</p>', 6, 6, 1, '2023-04-27 01:27:48', '2023-04-27 01:27:48');
INSERT INTO `httt_post` (`id`, `topic_id`, `title`, `slug`, `detail`, `images`, `type`, `metakey`, `metadesc`, `created_by`, `updated_by`, `status`, `created_at`, `updated_at`) VALUES
(15, NULL, 'Chính sách đổi trả', 'chinh-sach-doi-tra', '<p><strong>1. Điều kiện đổi trả</strong></p>\r\n\r\n<p>Qu&yacute; Kh&aacute;ch h&agrave;ng cần kiểm tra t&igrave;nh trạng h&agrave;ng h&oacute;a v&agrave; c&oacute; thể đổi h&agrave;ng/ trả lại h&agrave;ng&nbsp;ngay tại thời điểm giao/nhận h&agrave;ng&nbsp;trong những trường hợp sau:</p>\r\n\r\n<ul>\r\n	<li>H&agrave;ng kh&ocirc;ng đ&uacute;ng chủng loại, mẫu m&atilde; trong đơn h&agrave;ng đ&atilde; đặt hoặc như tr&ecirc;n website tại thời điểm đặt h&agrave;ng.</li>\r\n	<li>Kh&ocirc;ng đủ số lượng, kh&ocirc;ng đủ bộ như trong đơn h&agrave;ng.</li>\r\n	<li>T&igrave;nh trạng b&ecirc;n ngo&agrave;i bị ảnh hưởng như r&aacute;ch bao b&igrave;, bong tr&oacute;c, bể vỡ&hellip;</li>\r\n</ul>\r\n\r\n<p>&nbsp;Kh&aacute;ch h&agrave;ng c&oacute; tr&aacute;ch nhiệm tr&igrave;nh giấy tờ li&ecirc;n quan chứng minh sự thiếu s&oacute;t tr&ecirc;n để ho&agrave;n th&agrave;nh việc&nbsp;ho&agrave;n trả/đổi trả h&agrave;ng h&oacute;a.&nbsp;</p>\r\n\r\n<p><strong>2. Quy định về thời gian th&ocirc;ng b&aacute;o v&agrave; gửi sản phẩm đổi trả</strong></p>\r\n\r\n<ul>\r\n	<li><strong>Thời gian th&ocirc;ng b&aacute;o đổi trả</strong>:&nbsp;trong v&ograve;ng 48h kể từ khi nhận sản phẩm đối với trường hợp sản phẩm thiếu phụ kiện, qu&agrave; tặng hoặc bể vỡ.</li>\r\n	<li><strong>Thời gian gửi chuyển trả sản phẩm</strong>: trong v&ograve;ng 14 ng&agrave;y kể từ khi nhận sản phẩm.</li>\r\n	<li><strong>Địa điểm đổi trả sản phẩm</strong>: Kh&aacute;ch h&agrave;ng c&oacute; thể mang h&agrave;ng trực tiếp đến văn ph&ograve;ng/ cửa h&agrave;ng của ch&uacute;ng t&ocirc;i hoặc chuyển qua đường bưu điện.</li>\r\n</ul>\r\n\r\n<p>Trong trường hợp Qu&yacute; Kh&aacute;ch h&agrave;ng c&oacute; &yacute; kiến đ&oacute;ng g&oacute;p/khiếu nại li&ecirc;n quan đến chất lượng sản phẩm, Qu&yacute; Kh&aacute;ch h&agrave;ng vui l&ograve;ng li&ecirc;n hệ đường d&acirc;y chăm s&oacute;c kh&aacute;ch h&agrave;ng&nbsp;của ch&uacute;ng t&ocirc;i.</p>', 'chinh-sach-doi-tra.png', 'page', 'đổi trả', '<p>ch&iacute;nh s&aacute;ch đổi trả&nbsp;</p>', 6, NULL, 1, '2023-04-27 03:42:42', '2023-04-27 03:42:42'),
(16, 8, 'HAPPY EARTH DAY - HAPPY SHOPPING', 'happy-earth-day-happy-shopping', '<p><img alt=\"\" src=\"http://localhost:81/HoThiThuTrang_2120110029/public/upload/images/bai-viet/31.jpg\" style=\"height:375px; width:850px\" /></p>\r\n\r\n<ul>\r\n	<li>&Aacute;p dụng duy nhất ng&agrave;y<strong>&nbsp;22.05.2023</strong>&nbsp;tại c&aacute;c cửa h&agrave;ng Vascara tr&ecirc;n to&agrave;n quốc.</li>\r\n	<li>&Aacute;p dụng chung với Mid-Season Sale.</li>\r\n</ul>\r\n\r\n<p>V&igrave; thế, c&aacute;c n&agrave;ng h&atilde;y chuẩn bị t&uacute;i đựng đồ khi shopping tại Vascara để nhận ưu đ&atilde;i nh&eacute;!</p>\r\n\r\n<p><strong>Điều kiện chương tr&igrave;nh:</strong></p>\r\n\r\n<ul>\r\n	<li>Kh&aacute;ch h&agrave;ng mới vui l&ograve;ng điền đầy đủ th&ocirc;ng tin để nhận ưu đ&atilde;i từ chương tr&igrave;nh.</li>\r\n	<li>Được &aacute;p dụng với thẻ VIP (kh&ocirc;ng &aacute;p dụng đối với h&agrave;ng đồng gi&aacute;).</li>\r\n	<li>Chỉ &aacute;p dụng ưu đ&atilde;i tr&ecirc;n tổng gi&aacute; trị h&oacute;a đơn (kh&ocirc;ng &aacute;p dụng t&aacute;ch h&oacute;a đơn, giới hạn mỗi kh&aacute;ch h&agrave;ng nhận ưu đ&atilde;i tối đa 2 lần)</li>\r\n	<li>Kh&ocirc;ng &aacute;p dụng với c&aacute;c loại Phiếu qu&agrave; tặng (trừ Phiếu qu&agrave; tặng b&aacute;n, Phiếu qu&agrave; tặng MoMo/GOTIT/URBOX v&agrave; Gift Cards khi thanh to&aacute;n).</li>\r\n	<li>Kh&ocirc;ng &aacute;p dụng chung với c&aacute;c chương tr&igrave;nh khuyến m&atilde;i kh&aacute;c (trừ chương tr&igrave;nh VNPay/MoMo/ShopeePay nếu c&oacute;).</li>\r\n	<li>Kh&ocirc;ng &aacute;p dụng đồng thời với chương tr&igrave;nh &quot;Kh&ocirc;ng lấy hộp giảm 5.000đ&quot;</li>\r\n	<li>Kh&ocirc;ng &aacute;p dụng cho h&agrave;ng đồng gi&aacute; v&agrave; phụ kiện (Gồm: Miếng l&oacute;t gi&agrave;y, vớ, n&oacute;n, t&uacute;i lưới, ốp lưng điện thoại).</li>\r\n	<li>Đối với những sản phẩm c&oacute; quy c&aacute;ch đ&oacute;ng g&oacute;i bao gồm t&uacute;i v&agrave; hộp (Gi&agrave;y, v&iacute;, thắt lưng v.v.) th&igrave; kh&aacute;ch h&agrave;ng kh&ocirc;ng lấy t&uacute;i v&agrave; hộp mới được &aacute;p dụng chương tr&igrave;nh.</li>\r\n	<li>Đối với những sản phẩm c&oacute; quy c&aacute;ch đ&oacute;ng g&oacute;i chỉ c&oacute; t&uacute;i, kh&aacute;ch h&agrave;ng kh&ocirc;ng lấy t&uacute;i sẽ được &aacute;p dụng chương tr&igrave;nh.</li>\r\n	<li>T&iacute;ch lũy điểm b&igrave;nh thường sau khi giảm trừ c&aacute;c ưu đ&atilde;i.</li>\r\n	<li>Trường hợp đổi sản phẩm, Đối với c&aacute;c sản phẩm sale dưới 20%, vui l&ograve;ng đổi trả trong thời gian diễn ra chương tr&igrave;nh để được &aacute;p dụng mức ưu đ&atilde;i.&nbsp;</li>\r\n	<li>Đối với c&aacute;c sản phẩm sale đồng gi&aacute; v&agrave; sản phẩm sale từ 20% trở l&ecirc;n, kh&ocirc;ng &aacute;p dụng đổi trả.&nbsp;&nbsp;</li>\r\n	<li>Trong mọi trường hợp, quyết định của Vascara l&agrave; cuối c&ugrave;ng.&nbsp;</li>\r\n</ul>', 'happy-earth-day-happy-shopping.jpg', 'post', 'HAPPY EARTH DAY - HAPPY SHOPPING', '<p>Hưởng ứng Chiến dịch Ng&agrave;y Tr&aacute;i Đất 2023 v&agrave; c&ugrave;ng chung tay bảo vệ m&ocirc;i trường, Vascara GIẢM NGAY 30.000đ cho c&aacute;c kh&aacute;ch h&agrave;ng mua sắm nhưng kh&ocirc;ng sử dụng t&uacute;i v&agrave; hộp đựng sản phẩm.</p>', 6, 6, 1, '2023-05-13 03:27:57', '2023-05-13 03:27:57'),
(17, 8, 'HAPPY MOTHER\'S DAY - Ngày của những người phụ nữ phi thường', 'happy-mothers-day-ngay-cua-nhung-nguoi-phu-nu-phi-thuong', '<p><img alt=\"\" src=\"http://localhost:81/HoThiThuTrang_2120110029/public/upload/images/bai-viet/33.png\" style=\"height:353px; width:800px\" /></p>\r\n\r\n<ul>\r\n	<li>&Aacute;p dụng cho h&oacute;a đơn sau Vip.</li>\r\n	<li>&Aacute;p dụng với h&oacute;a đơn c&oacute; &iacute;t nhất 1 sản phẩm t&uacute;i x&aacute;ch/balo/v&iacute;.&nbsp;</li>\r\n	<li>Từ&nbsp;<strong>11.05 - 14.05.2023.</strong></li>\r\n</ul>\r\n\r\n<p><strong>Điều kiện &aacute;p dụng:</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li>Kh&aacute;ch h&agrave;ng mới vui l&ograve;ng điền đầy đủ th&ocirc;ng tin để được nhận ưu đ&atilde;i từ chương tr&igrave;nh.&nbsp;</li>\r\n	<li>Được &aacute;p dụng với thẻ VIP cho h&agrave;ng nguy&ecirc;n gi&aacute; (theo quy định của thẻ VIP).</li>\r\n	<li>Kh&ocirc;ng &aacute;p dụng với Phiếu qu&agrave; tặng kh&aacute;c (trừ Phiếu qu&agrave; tặng b&aacute;n, Phiếu qu&agrave; tặng GOTIT/MOMO/URBOX &amp; Gift Cards) khi thanh to&aacute;n.</li>\r\n	<li>Kh&ocirc;ng &aacute;p dụng cho c&aacute;c sản phẩm sale.</li>\r\n	<li>Kh&aacute;ch h&agrave;ng c&oacute; thể mua c&aacute;c sản phẩm gi&agrave;y, d&eacute;p, t&uacute;i, v&iacute;, balo, mắt k&iacute;nh nguy&ecirc;n gi&aacute; (trừ c&aacute;c phụ kiện kh&aacute;c) để đạt hạng mức v&agrave; phải c&oacute; &iacute;t nhất 1 sản phẩm t&uacute;i x&aacute;ch/v&iacute;/balo trong h&oacute;a đơn.</li>\r\n	<li>Kh&ocirc;ng &aacute;p dụng khi mua Gift Cards.</li>\r\n	<li>Kh&ocirc;ng &aacute;p dụng cộng dồn h&oacute;a đơn.</li>\r\n	<li>Được &aacute;p dụng sau khi giảm trừ c&aacute;c ưu đ&atilde;i từ thẻ VIP. Đối với trường hợp sử dụng Phiếu qu&agrave; tặng b&aacute;n, Phiếu qu&agrave; tặng MoMo/GOT IT/URBOX v&agrave; Gift Cards khi thanh to&aacute;n vẫn được t&iacute;nh v&agrave;o gi&aacute; trị h&oacute;a đơn.</li>\r\n	<li>Qu&agrave; tặng kh&ocirc;ng được đổi trả, kh&ocirc;ng bảo h&agrave;nh v&agrave; kh&ocirc;ng c&oacute; gi&aacute; trị quy ra tiền mặt. Số lượng qu&agrave; tặng c&oacute; hạn, chương tr&igrave;nh c&oacute; thể kết th&uacute;c sớm hơn dự kiến.&nbsp;</li>\r\n	<li>Kh&ocirc;ng &aacute;p dụng chung với c&aacute;c chương tr&igrave;nh khuyến m&atilde;i kh&aacute;c (trừ chương tr&igrave;nh VNPay/MoMo/ShopeePay nếu c&oacute;).</li>\r\n	<li>Trong mọi trường hợp, quyết định của Vascara l&agrave; cuối c&ugrave;ng.</li>\r\n</ul>', 'happy-mothers-day-ngay-cua-nhung-nguoi-phu-nu-phi-thuong.png', 'post', 'happy', '<p>&#39;MẸ&quot;, một tiếng gọi đơn giản nhưng đem lại những cảm x&uacute;c thi&ecirc;ng li&ecirc;ng nhất m&agrave; tạo ho&aacute; đ&atilde; ban tặng cho lo&agrave;i người. Thật hạnh ph&uacute;c cho những ai sinh ra tr&ecirc;n đời được cất tiếng gọi mẹ. Để b&agrave;y tỏ t&igrave;nh cảm tr&acirc;n qu&yacute; d&agrave;nh cho đấng sinh th&agrave;nh, Vascara TẶNG ngay 1 chai nước tẩy trang Cocoon cho h&oacute;a đơn từ 800,000đ trong dịp đặc biệt n&agrave;y.&nbsp;</p>', 6, NULL, 1, '2023-05-12 13:42:11', '2023-05-12 13:42:11'),
(18, 7, 'BƯỚC CHUYỂN MÌNH ẤN TƯỢNG VỚI “SENSE”', 'buoc-chuyen-minh-an-tuong-voi-sense', '<p><img alt=\"\" src=\"http://localhost:81/HoThiThuTrang_2120110029/public/upload/images/bai-viet/34.png\" style=\"height:500px; width:800px\" /></p>\r\n\r\n<p>Dưới ng&ocirc;n ngữ ống k&iacute;nh, diễn giải sự ưu nh&atilde; v&agrave; hiện đại đan xen. Trải nghiệm cảm gi&aacute;c thời trang mới lạ được ph&aacute;c hoạ trong mỗi thiết kế của Vascara. Lớp vỏ thời trang c&oacute; thể phai mờ theo năm th&aacute;ng, nhưng điều quan trọng l&agrave; biết c&aacute;ch giữ nhiệt cho những thứ kh&ocirc;ng bao giờ phai nhạt đ&oacute; ch&iacute;nh l&agrave; cảm gi&aacute;c &ldquo;SENSE&rdquo;.</p>\r\n\r\n<p><img alt=\"\" src=\"http://localhost:81/HoThiThuTrang_2120110029/public/upload/images/bai-viet/35.png\" style=\"height:780px; width:500px\" /></p>\r\n\r\n<p>Tr&ecirc;n h&agrave;nh tr&igrave;nh đi đến &ldquo;c&aacute;i t&ocirc;i&rdquo; Vascara muốn lan toả th&ocirc;ng điệp &ldquo;SENSE&rdquo;: cảm gi&aacute;c từ m&agrave;u sắc đến form d&aacute;ng trong BST Resort đều mang t&iacute;nh thời đại, ph&aacute; c&aacute;ch hơn.</p>\r\n\r\n<p><img alt=\"\" src=\"http://localhost:81/HoThiThuTrang_2120110029/public/upload/images/bai-viet/36.png\" style=\"height:751px; width:500px\" /></p>\r\n\r\n<p>VASCARA được xem l&agrave; dẫn đầu ng&agrave;nh thời trang Việt, hợp t&aacute;c với nhiều nh&agrave; thiết kế c&oacute; phong c&aacute;ch ấn tượng. Nhưng thời trang l&agrave; h&agrave;nh tr&igrave;nh lu&ocirc;n đi t&igrave;m c&aacute;i mới, v&igrave; vậy Vascara lần n&agrave;y đ&atilde; bước ra khỏi ngưỡng cửa an to&agrave;n để đem đến những h&igrave;nh ảnh đầy &ldquo;c&aacute;i t&ocirc;i&rdquo;. Minh chứng bằng việc cho ra mắt những sản phẩm c&oacute; gam m&agrave;u mang t&iacute;nh thử th&aacute;ch.</p>\r\n\r\n<p><img alt=\"\" src=\"http://localhost:81/HoThiThuTrang_2120110029/public/upload/images/bai-viet/37.png\" style=\"height:751px; width:500px\" /></p>\r\n\r\n<p>Kh&ocirc;ng chỉ đơn thuần l&agrave; qu&yacute; c&ocirc; c&ocirc;ng sở giản dị với những chiếc t&uacute;i basic, m&agrave; trong BST RESORT 2023: SENSE đ&atilde; xuất hiện những form d&aacute;ng c&aacute; t&iacute;nh v&agrave; thời thượng hơn.</p>\r\n\r\n<p><img alt=\"\" src=\"http://localhost:81/HoThiThuTrang_2120110029/public/upload/images/bai-viet/38.png\" style=\"height:438px; width:700px\" /></p>\r\n\r\n<p>Chất liệu v&acirc;n da kỳ đ&agrave; được Vascara ưa chuộng sử dụng cho nhiều thiết kế đặc trưng, lần n&agrave;y Vascara đ&atilde; bắt kịp trend đưa chất liệu n&agrave;y v&agrave;o trong thiết kế t&uacute;i đeo vai mang đậm phong c&aacute;ch IT girls ch&iacute;nh hiệu.</p>\r\n\r\n<p><img alt=\"\" src=\"http://localhost:81/HoThiThuTrang_2120110029/public/upload/images/bai-viet/39.png\" style=\"height:438px; width:700px\" /></p>\r\n\r\n<p>Vascara đ&atilde; chuyển m&igrave;nh ng&agrave;y một đa dạng hơn: từ c&aacute;c thiết kế trơn m&agrave;u cơ bản đến c&aacute;ch điệu trong hoạ tiết, để đ&aacute;p ứng trọn vẹn nhu cầu thời trang của ph&aacute;i đẹp. V&agrave; điểm nhấn đặc biệt trong BST SENSE ch&iacute;nh l&agrave; chiếc t&uacute;i x&aacute;ch hoạ tiết th&ecirc;u Sakura đậm chất Xu&acirc;n H&egrave;.</p>\r\n\r\n<p><img alt=\"\" src=\"http://localhost:81/HoThiThuTrang_2120110029/public/upload/images/bai-viet/40.png\" style=\"height:438px; width:700px\" /></p>\r\n\r\n<p>Gi&agrave;y Mary Jane tạo n&ecirc;n c&uacute; sốt trong thời gian gần đ&acirc;y, h&agrave;ng loạt nh&agrave; tạo mốt đ&atilde; tiếp tay cho xu hướng n&agrave;y được nở rộ. Vốn mang đậm phong c&aacute;ch cổ điển nhưng đ&atilde; được Vascara biến tấu đầy tinh tế với điểm nhấn phần mũi vu&ocirc;ng bằng tone m&agrave;u đậm tiệp với phần đế gi&agrave;y. Sự kết hợp h&agrave;i ho&agrave; giữa hiện đại v&agrave; cổ điển tạo n&ecirc;n sự hấp dẫn kh&ocirc;ng những cho c&aacute;c c&ocirc; n&agrave;ng c&ocirc;ng sở m&agrave; cả thế hệ GenZ cũng kh&ocirc;ng thể bỏ qua items hot n&agrave;y.</p>\r\n\r\n<p><strong><em>Bắt nhịp xu hướng thời trang quốc tế, Vascara cung cấp những d&ograve;ng sản phẩm: gi&agrave;y d&eacute;p, t&uacute;i x&aacute;ch, ba l&ocirc;, v&iacute;, mắt k&iacute;nh,&hellip; được thiết kế hiện đại, ph&ugrave; hợp với thị hiếu của ph&aacute;i&nbsp; đẹp v&agrave; xu hướng thời trang mới nhất tr&ecirc;n thế giới.&nbsp;</em></strong></p>', 'buoc-chuyen-minh-an-tuong-voi-sense.jpg', 'post', 'sense', '<p><strong>VASCARA đem đến BST Resort 2023: SENSE với những cảm gi&aacute;c ch&acirc;n thực hơn về người phụ nữ hiện đại bước ra khỏi ngưỡng cửa an to&agrave;n để thể hiện &ldquo;c&aacute;i t&ocirc;i&rdquo; mạnh mẽ.</strong></p>', 6, 6, 1, '2023-05-12 14:41:20', '2023-05-12 14:41:20'),
(19, 7, 'VASCARA TIẾP TỤC HỢP TÁC CÙNG NTK LÊ THANH HÒA TRONG FASHION VOYAGE', 'vascara-tiep-tuc-hop-tac-cung-ntk-le-thanh-hoa-trong-fashion-voyage', '<p><img alt=\"\" src=\"http://localhost:81/HoThiThuTrang_2120110029/public/upload/images/bai-viet/33.jpg\" style=\"height:533px; width:800px\" /></p>\r\n\r\n<p>Trong khu&ocirc;n khổ chương tr&igrave;nh Fashion Voyage 3 &ldquo;Chasing The Sun&rdquo;, NTK L&ecirc; Thanh H&ograve;a mang đến s&agrave;n diễn thời trang BST &ldquo;Like The Sunshine&rdquo; đầy ấn tượng với c&aacute;c thiết kế mang đậm sắc m&agrave;u của những ng&agrave;y hạ, niềm cảm hứng từ kh&iacute; hậu nhiệt đới c&ugrave;ng phong c&aacute;ch du mục tự do, ph&oacute;ng kho&aacute;ng.</p>\r\n\r\n<p><img alt=\"\" src=\"http://localhost:81/HoThiThuTrang_2120110029/public/upload/images/bai-viet/34.jpg\" style=\"height:533px; width:800px\" /></p>\r\n\r\n<p>Ở BST lần n&agrave;y, Vascara - thương hiệu gi&agrave;y d&eacute;p v&agrave; t&uacute;i x&aacute;ch h&agrave;ng đầu d&agrave;nh cho ph&aacute;i nữ lại tiếp tục hợp t&aacute;c c&ugrave;ng NTK L&ecirc; Thanh H&ograve;a s&aacute;ng tạo ra những thiết kế mang phong c&aacute;ch thời trang bohemian r&otilde; n&eacute;t. Cảm hứng du mục, kh&iacute; hậu nhiệt đới những chiếc v&aacute;y mềm mại bay bổng l&agrave; những g&igrave; m&agrave; NTK đ&atilde; h&igrave;nh dung trước khi cho ra mắt BST &ldquo;Like the sunshine&rdquo;.</p>\r\n\r\n<p><img alt=\"\" src=\"http://localhost:81/HoThiThuTrang_2120110029/public/upload/images/bai-viet/35.jpg\" style=\"height:533px; width:800px\" /></p>\r\n\r\n<p>Phụ kiện của BST &ldquo;Like The Sunshine&rdquo; như gi&agrave;y sandal chiến binh, những chiếc n&oacute;n c&oacute;i rộng v&agrave;nh được đan l&aacute;t tỉ mỉ, những chiếc t&uacute;i c&oacute;i, t&uacute;i sợi đan từ mini đến to bản, đặc biệt l&agrave; chiếc t&uacute;i nắp gập m&ocirc; phỏng vỏ s&ograve; được thực hiện tỉ mỉ cũng l&agrave; một điểm s&aacute;ng trong c&aacute;c thiết kế của L&ecirc; Thanh H&ograve;a lần n&agrave;y. Những tia nắng ngập tr&agrave;n sức sống của v&ugrave;ng đất Địa Trung Hải thơ mộng, c&aacute;c c&ocirc; n&agrave;ng bước đi khoan thai trong bộ trang phục y&ecirc;u th&iacute;ch khiến bao người phải ngo&aacute;y nh&igrave;n.</p>\r\n\r\n<p><img alt=\"\" src=\"http://localhost:81/HoThiThuTrang_2120110029/public/upload/images/bai-viet/36.jpg\" style=\"height:533px; width:800px\" /></p>\r\n\r\n<p><img alt=\"\" src=\"http://localhost:81/HoThiThuTrang_2120110029/public/upload/images/bai-viet/37.jpg\" style=\"height:533px; width:800px\" /></p>\r\n\r\n<p><img alt=\"\" src=\"http://localhost:81/HoThiThuTrang_2120110029/public/upload/images/bai-viet/39.jpg\" style=\"height:1200px; width:800px\" /></p>', 'vascara-tiep-tuc-hop-tac-cung-ntk-le-thanh-hoa-trong-fashion-voyage.jpg', 'post', 'VASCARA', '<p><em>Hơn cả sự kết hợp th&ocirc;ng thường, Vascara v&agrave; NTK L&ecirc; Thanh H&ograve;a l&agrave; những tri kỷ thời trang khi c&ugrave;ng nhau s&aacute;ng tạo v&agrave; thổi hồn v&agrave;o BST &ldquo;Like the sunshine&rdquo; trong khu&ocirc;n khổ chương tr&igrave;nh Fashion Voyage 2023.</em></p>', 6, NULL, 1, '2023-05-13 06:04:31', '2023-05-13 06:04:31'),
(20, 7, 'SỰ KẾT HỢP CỦA CÁC NTK TÊN TUỔI TRONG FASHION VOYAGE #3', 'su-ket-hop-cua-cac-ntk-ten-tuoi-trong-fashion-voyage-3', '<p><img alt=\"\" src=\"http://localhost:81/HoThiThuTrang_2120110029/public/upload/images/bai-viet/41.jpg\" style=\"height:533px; width:800px\" /></p>\r\n\r\n<p>Hơn cả một cuộc h&agrave;nh tr&igrave;nh viễn du, Fashion Voyage #3 vừa diễn ra tại Ph&uacute; Quốc lấy cảm hứng sắc m&agrave;u rực rỡ Địa Trung Hải, kh&ocirc;ng gian nhộn nhịp của những con phố ven biển c&ugrave;ng c&aacute;c t&iacute;nh đồ thời trang đ&atilde; mang đến cho giới mộ điệu thời trang một bức tranh to&agrave;n cảnh sống động.&nbsp;</p>\r\n\r\n<p><img alt=\"\" src=\"http://localhost:81/HoThiThuTrang_2120110029/public/upload/images/bai-viet/42.jpg\" style=\"height:533px; width:800px\" /></p>\r\n\r\n<p><br />\r\nNếu như ở Fashion Voyage #1 v&agrave; #2, kh&aacute;n giả được chi&ecirc;m ngưỡng c&aacute;c bộ c&aacute;nh thời trang với bước đi mơ mộng của những người mẫu từ tr&ecirc;n cao (Awalk to the Sky) hay n&eacute;t thanh khiết hoang sơ kh&ocirc;ng k&eacute;m phần ma mị của n&uacute;i đồi Sapa (Another Day) th&igrave; tại Fashion Voyage #3, kh&aacute;n giả sẽ được h&ograve;a m&igrave;nh v&agrave;o bức tranh to&agrave;n cảnh v&ugrave;ng biển Địa Trung Hải với nhiều hoạt động kh&aacute;c nhau.&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><img alt=\"\" src=\"http://localhost:81/HoThiThuTrang_2120110029/public/upload/images/bai-viet/43.jpg\" style=\"height:533px; width:800px\" /></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Với sứ mệnh quảng b&aacute; Thời trang kết hợp những điểm đến đẹp v&agrave; độc đ&aacute;o, Fashion Voyage tiếp tục đưa những t&iacute;n đồ thời trang đến chi&ecirc;m ngưỡng v&agrave; trải nghiệm vẻ đẹp sắc m&agrave;u đặc trưng Địa Trung Hải h&agrave;i ho&agrave; giữa thi&ecirc;n nhi&ecirc;n kỳ vĩ của đảo ngọc Ph&uacute; Quốc qua chuyến viễn du thời trang.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><img alt=\"\" src=\"http://localhost:81/HoThiThuTrang_2120110029/public/upload/images/bai-viet/44.jpg\" style=\"height:533px; width:800px\" /></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><img alt=\"\" src=\"http://localhost:81/HoThiThuTrang_2120110029/public/upload/images/bai-viet/45.jpg\" style=\"height:533px; width:800px\" /></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><img alt=\"\" src=\"http://localhost:81/HoThiThuTrang_2120110029/public/upload/images/bai-viet/46.jpg\" style=\"height:533px; width:800px\" /></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><img alt=\"\" src=\"http://localhost:81/HoThiThuTrang_2120110029/public/upload/images/bai-viet/47.jpg\" style=\"height:533px; width:800px\" /></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><img alt=\"\" src=\"http://localhost:81/HoThiThuTrang_2120110029/public/upload/images/bai-viet/48.jpg\" style=\"height:533px; width:800px\" /></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><img alt=\"\" src=\"http://localhost:81/HoThiThuTrang_2120110029/public/upload/images/bai-viet/49.jpg\" style=\"height:533px; width:800px\" /></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><img alt=\"\" src=\"http://localhost:81/HoThiThuTrang_2120110029/public/upload/images/bai-viet/50.jpg\" style=\"height:533px; width:800px\" /></p>', 'su-ket-hop-cua-cac-ntk-ten-tuoi-trong-fashion-voyage-3.jpg', 'post', 'FASHION', '<p><em>Vascara - thương hiệu thời trang h&agrave;ng đầu d&agrave;nh cho ph&aacute;i nữ vừa kết hợp th&agrave;nh c&ocirc;ng c&ugrave;ng Đạo Diễn Long Kan trong show thời trang nổi tiếng Fashion Voyage #3.&nbsp;</em></p>', 6, NULL, 1, '2023-05-13 06:14:38', '2023-05-13 06:14:38');

-- --------------------------------------------------------

--
-- Table structure for table `httt_product`
--

CREATE TABLE `httt_product` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `brand_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(1000) NOT NULL,
  `slug` varchar(1000) NOT NULL,
  `price_buy` int(11) NOT NULL,
  `detail` longtext NOT NULL,
  `metakey` varchar(255) NOT NULL,
  `metadesc` longtext NOT NULL,
  `created_by` tinyint(3) UNSIGNED NOT NULL,
  `updated_by` tinyint(3) UNSIGNED DEFAULT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `httt_product`
--

INSERT INTO `httt_product` (`id`, `category_id`, `brand_id`, `name`, `slug`, `price_buy`, `detail`, `metakey`, `metadesc`, `created_by`, `updated_by`, `status`, `created_at`, `updated_at`) VALUES
(14, 4, 7, 'TÚI TOTE DOUBLE POCKET', 'tui-tote-double-pocket', 1425000, '<ul>\r\n	<li><img alt=\"\" src=\"http://localhost:81/HoThiThuTrang_2120110029/public/upload/files/tui-tote-double-pocket-tot-0116-mau-xanh-la-5.jpg\" style=\"float:right; height:410px; width:300px\" />K&iacute;ch thước (d&agrave;i x rộng x cao): 20.7 x 12 x 19 cm</li>\r\n	<li>Chất liệu:Da nh&acirc;n tạo</li>\r\n	<li>Chất liệu d&acirc;y đeo: D&acirc;y da</li>\r\n	<li>Kiểu kh&oacute;aKh&oacute;a k&eacute;o</li>\r\n	<li>Số ngăn3 ngăn lớn, 2 ngăn nhỏ</li>\r\n	<li>K&iacute;ch cỡ: Nhỏ</li>\r\n	<li>Ph&ugrave; hợp sử dụng: Đi l&agrave;m, đi chơi</li>\r\n</ul>\r\n\r\n<p>T&uacute;i x&aacute;ch lớn tote thiết kế tối giản, tinh tế. B&ecirc;n trong t&uacute;i c&oacute; 01 ngăn lớn, rộng r&atilde;i v&agrave; 01 ngăn nhỏ tiện dụng. Chất liệu da tổng hợp mềm mại, bền đẹp, dễ vệ sinh.</p>\r\n\r\n<p><strong>SALE&nbsp;20%&nbsp;PHỤ KIỆN (TRỪ MẮT K&Iacute;NH) KHI MUA C&Ugrave;NG GI&Agrave;Y/T&Uacute;I/V&Iacute; NGUY&Ecirc;N GI&Aacute;</strong></p>\r\n\r\n<p><strong>GIẢM 100% PH&Iacute; VẬN CHUYỂN TI&Ecirc;U CHUẨN CHO ĐƠN TỪ 799K (TỐI ĐA 30K)</strong></p>\r\n\r\n<p>&nbsp;</p>', 'túi tote', '<p>T&uacute;i x&aacute;ch lớn tote thiết kế tối giản, tinh tế. B&ecirc;n trong t&uacute;i c&oacute; 01 ngăn lớn, rộng r&atilde;i v&agrave; 01 ngăn nhỏ tiện dụng. Chất liệu da tổng hợp mềm mại, bền đẹp, dễ vệ sinh.</p>', 6, NULL, 1, '2023-05-23 03:13:17', '2023-05-23 03:13:17'),
(17, 29, 8, 'Túi HOBO quai cài', 'tui-hobo-quai-cai', 905000, 'Túi xách nhỏ bán nguyệt đính đinh tán kiểu dáng bò tròn sành điệu, thời trang\r\n\r\nNắp túi đính đinh đầy nổi bật và thu hút \r\n\r\nCó nhiều sự lựa chọn về màu sắc để nàng thoải mái phối đồ và tạo phong cách mới', 'hobo', 'Túi xách nhỏ bán nguyệt đính đinh tán kiểu dáng bò tròn sành điệu, thời trang\r\n\r\nNắp túi đính đinh đầy nổi bật và thu hút \r\n\r\nCó nhiều sự lựa chọn về màu sắc để nàng thoải mái phối đồ và tạo phong cách mới', 6, NULL, 1, '2023-04-05 09:27:12', '2023-04-05 09:27:12'),
(18, 29, 7, 'TÚI TOTE DOUBLE - ĐEN', 'tui-tote-double-den', 1425000, '<p>T&uacute;i x&aacute;ch trung đeo vai tote double black thiết kế thời trang T&uacute;i gắn charm h&igrave;nh con bướm mang đến n&eacute;t tự tin thoải m&aacute;i cho người diện C&oacute; nhiều sự lựa chọn về m&agrave;u sắc để n&agrave;ng thoải m&aacute;i phối đồ v&agrave; tạo phong c&aacute;ch mới</p>', 'tote', '<p>T&uacute;i x&aacute;ch trung đeo vai tote double black thiết kế thời trang T&uacute;i gắn charm h&igrave;nh con bướm mang đến n&eacute;t tự tin thoải m&aacute;i cho người diện C&oacute; nhiều sự lựa chọn về m&agrave;u sắc để n&agrave;ng thoải m&aacute;i phối đồ v&agrave; tạo phong c&aacute;ch mới</p>', 6, NULL, 1, '2023-05-19 09:06:31', '2023-05-19 09:06:31'),
(21, 31, 7, 'BALO MINI NHẤN KHÓA KÉO', 'balo-mini-nhan-khoa-keo', 705000, 'Balo nhỏ trang trí logo cách điệu dập nổi xinh xắn\r\n\r\nBên trong có một ngăn lớn rộng, đựng được nhiều vận dụng cần thiết và phối khóa kéo tiện dụng\r\n\r\nChất liệu da tổng hợp cao cấp bền đẹp, dễ vệ sinh, sử dụng nhiều dịp: đi làm, dạo phố..', 'balo', 'Balo nhỏ trang trí logo cách điệu dập nổi xinh xắn\r\n\r\nBên trong có một ngăn lớn rộng, đựng được nhiều vận dụng cần thiết và phối khóa kéo tiện dụng\r\n\r\nChất liệu da tổng hợp cao cấp bền đẹp, dễ vệ sinh, sử dụng nhiều dịp: đi làm, dạo phố..', 6, NULL, 1, '2023-04-05 09:58:04', '2023-04-05 09:58:04'),
(22, 36, 12, 'VÍ CẦM TAY ĐÍNH TRANG TRÍ KIM LOẠI', 'vi-cam-tay-dinh-trang-tri-kim-loai', 645000, 'VÍ CẦM TAY ĐÍNH TRANG TRÍ KIM LOẠI', 'VÍ CẦM TAY ĐÍNH TRANG TRÍ KIM LOẠI', 'VÍ CẦM TAY ĐÍNH TRANG TRÍ KIM LOẠI', 6, NULL, 1, '2023-04-11 07:45:52', '2023-04-11 07:45:52'),
(23, 30, 7, 'TÚI XÁCH TAY NHẤN KHÓA KIM LOẠI PHỐI SỌC', 'tui-xach-tay-nhan-khoa-kim-loai-phoi-soc', 1295000, 'TÚI XÁCH TAY NHẤN KHÓA KIM LOẠI PHỐI SỌC', 'TÚI XÁCH TAY NHẤN KHÓA KIM LOẠI PHỐI SỌC', 'TÚI XÁCH TAY NHẤN KHÓA KIM LOẠI PHỐI SỌC', 6, NULL, 1, '2023-04-11 07:49:50', '2023-04-11 07:49:50'),
(24, 30, 9, 'TÚI XÁCH NHẤN DÂY CHUỖI HẠT VÂN ĐÁ', 'tui-xach-nhan-day-chuoi-hat-van-da', 895000, 'TÚI XÁCH NHẤN DÂY CHUỖI HẠT VÂN ĐÁ', 'TÚI XÁCH NHẤN DÂY CHUỖI HẠT VÂN ĐÁ', 'TÚI XÁCH NHẤN DÂY CHUỖI HẠT VÂN ĐÁ', 6, NULL, 1, '2023-04-11 07:52:31', '2023-04-11 07:52:31'),
(25, 30, 7, 'TÚI TOTE QUAI ĐÔI NHẤN VIỀN', 'tui-tote-quai-doi-nhan-vien', 975000, 'TÚI TOTE QUAI ĐÔI NHẤN VIỀN', 'TÚI TOTE QUAI ĐÔI NHẤN VIỀN', 'TÚI TOTE QUAI ĐÔI NHẤN VIỀN', 6, NULL, 1, '2023-04-11 07:54:19', '2023-04-11 07:54:19'),
(26, 30, 8, 'TÚI XÁCH TAY NHẤN KHÓA GÀI', 'tui-xach-tay-nhan-khoa-gai', 1325000, 'TÚI XÁCH TAY NHẤN KHÓA GÀI', 'TÚI XÁCH TAY NHẤN KHÓA GÀI', 'TÚI XÁCH TAY NHẤN KHÓA GÀI', 6, NULL, 1, '2023-04-11 07:56:04', '2023-04-11 07:56:04'),
(27, 30, 7, 'TÚI XÁCH TAY QUAI NGẮN DẬP VÂN NỔI', 'tui-xach-tay-quai-ngan-dap-van-noi', 925000, 'TÚI XÁCH TAY QUAI NGẮN DẬP VÂN NỔI', 'TÚI XÁCH TAY QUAI NGẮN DẬP VÂN NỔI', 'TÚI XÁCH TAY QUAI NGẮN DẬP VÂN NỔI', 6, NULL, 1, '2023-04-11 07:58:46', '2023-04-11 07:58:46'),
(28, 30, 7, 'TÚI XÁCH TAY PHỐI KHĂN FLORAL - KEM', 'tui-xach-tay-phoi-khan-floral-kem', 965000, 'TÚI XÁCH TAY PHỐI KHĂN FLORAL - KEM', 'TÚI XÁCH TAY PHỐI KHĂN FLORAL - KEM', 'TÚI XÁCH TAY PHỐI KHĂN FLORAL - KEM', 6, 6, 1, '2023-04-12 12:23:14', '2023-04-12 12:23:14'),
(29, 30, 7, 'TÚI XÁCH TAY PHỐI KHĂN FLORAL - TÍM', 'tui-xach-tay-phoi-khan-floral-tim', 965000, 'TÚI XÁCH TAY PHỐI KHĂN FLORAL - TÍM', 'TÚI XÁCH TAY PHỐI KHĂN FLORAL - TÍM', 'TÚI XÁCH TAY PHỐI KHĂN FLORAL - TÍM', 6, NULL, 1, '2023-04-11 08:02:11', '2023-04-11 08:02:11'),
(30, 30, 7, 'TÚI TOTE QUAI ĐÔI ĐÍNH KIM LOẠI - ĐỎ', 'tui-tote-quai-doi-dinh-kim-loai-do', 965000, 'TÚI TOTE QUAI ĐÔI ĐÍNH KIM LOẠI - ĐỎ', 'TÚI TOTE QUAI ĐÔI ĐÍNH KIM LOẠI - ĐỎ', 'TÚI TOTE QUAI ĐÔI ĐÍNH KIM LOẠI - ĐỎ', 6, 6, 1, '2023-04-13 04:42:09', '2023-04-13 04:42:09'),
(31, 30, 12, 'TÚI XÁCH TAY MINI SỌC DẬP NỔI - TÍM', 'tui-xach-tay-mini-soc-dap-noi-tim', 905000, '<p>T&Uacute;I X&Aacute;CH TAY MINI SỌC DẬP NỔI - T&Iacute;M</p>', 'TÚI XÁCH TAY MINI SỌC DẬP NỔI - TÍM', '<p>T&Uacute;I X&Aacute;CH TAY MINI SỌC DẬP NỔI - T&Iacute;M</p>', 6, NULL, 1, '2023-06-02 10:55:24', '2023-06-02 10:55:24'),
(32, 31, 7, 'BALO MINI VÂN CÁ SẤU - HỒNG NHẠT', 'balo-mini-van-ca-sau-hong-nhat', 695000, 'BALO MINI VÂN CÁ SẤU - HỒNG NHẠT', 'BALO MINI VÂN CÁ SẤU - HỒNG NHẠT', 'BALO MINI VÂN CÁ SẤU - HỒNG NHẠT', 6, NULL, 1, '2023-04-11 08:14:38', '2023-04-11 08:14:38'),
(33, 31, 8, 'BALO MINI NHẤN TÚI PHỤ - KEM', 'balo-mini-nhan-tui-phu-kem', 925000, 'BALO MINI NHẤN TÚI PHỤ - KEM', 'BALO MINI NHẤN TÚI PHỤ - KEM', 'BALO MINI NHẤN TÚI PHỤ - KEM', 6, NULL, 1, '2023-04-11 08:16:24', '2023-04-11 08:16:24'),
(34, 31, 7, 'BALO CANVAS NẮP GẬP - MÀU VÀNG CHANH', 'balo-canvas-nap-gap-mau-vang-chanh', 975000, 'BALO CANVAS NẮP GẬP - MÀU VÀNG CHANH', 'BALO CANVAS NẮP GẬP - MÀU VÀNG CHANH', 'BALO CANVAS NẮP GẬP - MÀU VÀNG CHANH', 6, 6, 1, '2023-04-13 04:40:52', '2023-04-13 04:40:52'),
(35, 31, 7, 'BALO MAY CHẦN PHỐI TRANG TRÍ KIM LOẠI - MÀU CAM', 'balo-may-chan-phoi-trang-tri-kim-loai-mau-cam', 965000, 'BALO MAY CHẦN PHỐI TRANG TRÍ KIM LOẠI - MÀU CAM', 'BALO MAY CHẦN PHỐI TRANG TRÍ KIM LOẠI - MÀU CAM', 'BALO MAY CHẦN PHỐI TRANG TRÍ KIM LOẠI - MÀU CAM', 6, NULL, 1, '2023-04-11 08:21:45', '2023-04-11 08:21:45'),
(36, 31, 8, 'BALO NẮP GẬP PHỐI CHARM KIM LOẠI - MÀU XANH BẠC HÀ', 'balo-nap-gap-phoi-charm-kim-loai-mau-xanh-bac-ha', 965000, 'BALO NẮP GẬP PHỐI CHARM KIM LOẠI - MÀU XANH BẠC HÀ', 'BALO NẮP GẬP PHỐI CHARM KIM LOẠI - MÀU XANH BẠC HÀ', 'BALO NẮP GẬP PHỐI CHARM KIM LOẠI - MÀU XANH BẠC HÀ', 6, NULL, 1, '2023-04-11 08:23:19', '2023-04-11 08:23:19'),
(37, 31, 7, 'BALO MINI RISING STARS - MÀU VÀNG', 'balo-mini-rising-stars-mau-vang', 945000, 'BALO MINI RISING STARS - MÀU VÀNG', 'BALO MINI RISING STARS - MÀU VÀNG', 'BALO MINI RISING STARS - MÀU VÀNG', 6, NULL, 1, '2023-04-11 08:24:55', '2023-04-11 08:24:55'),
(40, 31, 7, 'BALO MINI VÂN CÁ SẤU - VÀNG NHẠT', 'balo-mini-van-ca-sau-vang-nhat', 895000, 'BALO MINI VÂN CÁ SẤU - VÀNG NHẠT', 'BALO MINI VÂN CÁ SẤU - VÀNG NHẠT', 'BALO MINI VÂN CÁ SẤU - VÀNG NHẠT', 6, 6, 1, '2023-04-12 12:23:57', '2023-04-12 12:23:57'),
(41, 31, 7, 'BALO MINI HIỆU ỨNG ÁNH BẠC - MÀU KEM', 'balo-mini-hieu-ung-anh-bac-mau-kem', 945000, 'BALO MINI HIỆU ỨNG ÁNH BẠC - MÀU KEM', 'BALO MINI HIỆU ỨNG ÁNH BẠC - MÀU KEM', 'BALO MINI HIỆU ỨNG ÁNH BẠC - MÀU KEM', 6, 6, 1, '2023-04-13 04:44:12', '2023-04-13 04:44:12'),
(52, 33, 7, 'TÚI ĐEO CHÉO KHÓA TẠO KIỂU CHỮ V', 'tui-deo-cheo-khoa-tao-kieu-chu-v', 457500, '<p>M&atilde; sản phẩm:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;1011SHO0200</p>\r\n\r\n<p>Loại sản phẩm:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;T&uacute;i Đeo Ch&eacute;o</p>\r\n\r\n<p>Chất liệu:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Da nh&acirc;n tạo</p>\r\n\r\n<p>K&iacute;ch thước (d&agrave;i x rộng x cao):&nbsp;&nbsp;23.9*7*15.2 cm</p>\r\n\r\n<p>Chất liệu d&acirc;y đeo:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;D&acirc;y da</p>\r\n\r\n<p>Kiểu kh&oacute;a:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Kh&oacute;a đẩy</p>\r\n\r\n<p>Số ngăn:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2 ngăn lớn, 2 ngăn nhỏ</p>\r\n\r\n<p>K&iacute;ch cỡ:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Nhỏ</p>\r\n\r\n<p>Ph&ugrave; hợp sử dụng:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Đi l&agrave;m, đi chơi</p>', 'TÚI ĐEO CHÉO KHÓA TẠO KIỂU CHỮ V', '<p>Thời trang, s&agrave;nh điều.</p>', 6, NULL, 1, '2023-05-19 10:41:23', '2023-05-19 10:41:23'),
(53, 38, 12, 'KÍNH MÁT GỌNG KIM LOẠI WAYFARER', 'kinh-mat-gong-kim-loai-wayfarer', 562500, '<p>Chất liệu gọng: Plastic &amp; Kim loại</p>\r\n\r\n<p>C&ocirc;ng nghệ tr&ograve;ng k&iacute;nh: C&ocirc;ng nghệ Polarized chống ch&oacute;i</p>\r\n\r\n<p>Kiểu k&iacute;nh: K&iacute;nh gọng vu&ocirc;ng / K&iacute;nh gọng h&igrave;nh thang</p>\r\n\r\n<p>Kiểu gương mặt ph&ugrave; hợp: Mặt tr&aacute;i xoan, mặt tr&ograve;n, mặt tr&aacute;i tim</p>', 'xanh dương', '<p>Sản phẩm Mắt k&iacute;nh thuộc thương hiệu Vascara, được thiết kế tinh tế với kiểu d&aacute;ng thời trang v&agrave; m&agrave;u sắc đa dạng, ph&ugrave; hợp với nhiều kiểu d&aacute;ng gương mặt.</p>', 6, NULL, 1, '2023-04-26 02:28:08', '2023-04-26 02:28:08'),
(54, 38, 9, 'KÍNH MẮT HÌNH ĐA GIÁC GỌNG NHỎ', 'kinh-mat-hinh-da-giac-gong-nho', 490500, '<p>&nbsp;</p>\r\n\r\n<p>Chất liệu gọng: Plastic &amp; Kim loại</p>\r\n\r\n<p>C&ocirc;ng nghệ tr&ograve;ng k&iacute;nh: C&ocirc;ng nghệ Polarized chống ch&oacute;i</p>\r\n\r\n<p>Kiểu k&iacute;nh: K&iacute;nh gọng vu&ocirc;ng / K&iacute;nh gọng h&igrave;nh thang</p>\r\n\r\n<p>Kiểu gương mặt ph&ugrave; hợp: Mặt tr&aacute;i xoan, mặt tr&ograve;n, mặt tr&aacute;i tim</p>', 'mắt kính', '<p>Sản phẩm Mắt k&iacute;nh thuộc thương hiệu Vascara, được thiết kế tinh tế với kiểu d&aacute;ng thời trang v&agrave; m&agrave;u sắc đa dạng, ph&ugrave; hợp với nhiều kiểu d&aacute;ng gương mặt.</p>', 6, NULL, 1, '2023-04-26 02:32:14', '2023-04-26 02:32:14'),
(55, 38, 7, 'Kính mắt hình tròn thanh lịch', 'kinh-mat-hinh-tron-thanh-lich', 490500, '<p>Chất liệu gọng: Plastic &amp; Kim loại</p>\r\n\r\n<p>C&ocirc;ng nghệ tr&ograve;ng k&iacute;nh: C&ocirc;ng nghệ Polarized chống ch&oacute;i</p>\r\n\r\n<p>Kiểu k&iacute;nh: K&iacute;nh gọng vu&ocirc;ng / K&iacute;nh gọng h&igrave;nh thang</p>\r\n\r\n<p>Kiểu gương mặt ph&ugrave; hợp: Mặt tr&aacute;i xoan, mặt tr&ograve;n, mặt tr&aacute;i tim</p>', 'kính mắt', '<p>Sản phẩm Mắt k&iacute;nh thuộc thương hiệu Vascara, được thiết kế tinh tế với kiểu d&aacute;ng thời trang v&agrave; m&agrave;u sắc đa dạng, ph&ugrave; hợp với nhiều kiểu d&aacute;ng gương mặt.</p>', 6, 6, 1, '2023-04-26 12:54:26', '2023-04-26 12:54:26'),
(56, 38, 7, 'Kính gọng kim loại mắt tròn', 'kinh-gong-kim-loai-mat-tron', 490500, '<p>Chất liệu gọng: Plastic &amp; Kim loại</p>\r\n\r\n<p>C&ocirc;ng nghệ tr&ograve;ng k&iacute;nh: C&ocirc;ng nghệ Polarized chống ch&oacute;i</p>\r\n\r\n<p>Kiểu k&iacute;nh: K&iacute;nh gọng vu&ocirc;ng / K&iacute;nh gọng h&igrave;nh thang</p>\r\n\r\n<p>Kiểu gương mặt ph&ugrave; hợp: Mặt tr&aacute;i xoan, mặt tr&ograve;n, mặt tr&aacute;i tim</p>', 'kính mắt', '<p>Sản phẩm Mắt k&iacute;nh thuộc thương hiệu Vascara, được thiết kế tinh tế với kiểu d&aacute;ng thời trang v&agrave; m&agrave;u sắc đa dạng, ph&ugrave; hợp với nhiều kiểu d&aacute;ng gương mặt.</p>', 6, 6, 1, '2023-04-26 12:54:24', '2023-04-26 12:54:24'),
(57, 38, 7, 'Kính gọng bản mảnh hình lục giác', 'kinh-gong-ban-manh-hinh-luc-giac', 490500, '<p>Chất liệu gọng: Plastic &amp; Kim loại</p>\r\n\r\n<p>C&ocirc;ng nghệ tr&ograve;ng k&iacute;nh: C&ocirc;ng nghệ Polarized chống ch&oacute;i</p>\r\n\r\n<p>Kiểu k&iacute;nh: K&iacute;nh gọng vu&ocirc;ng / K&iacute;nh gọng h&igrave;nh thang</p>\r\n\r\n<p>Kiểu gương mặt ph&ugrave; hợp: Mặt tr&aacute;i xoan, mặt tr&ograve;n, mặt tr&aacute;i tim<br />\r\n&nbsp;</p>', 'Kính gọng', '<p>Sản phẩm Mắt k&iacute;nh thuộc thương hiệu Vascara, được thiết kế tinh tế với kiểu d&aacute;ng thời trang v&agrave; m&agrave;u sắc đa dạng, ph&ugrave; hợp với nhiều kiểu d&aacute;ng gương mặt.</p>', 6, NULL, 1, '2023-04-26 02:38:59', '2023-04-26 02:38:59'),
(58, 38, 7, 'KÍNH MÁT HÌNH MẮT VUÔNG BO TRÒN', 'kinh-mat-hinh-mat-vuong-bo-tron', 490500, '<p>Chất liệu gọng: Plastic &amp; Kim loại</p>\r\n\r\n<p>C&ocirc;ng nghệ tr&ograve;ng k&iacute;nh: C&ocirc;ng nghệ Polarized chống ch&oacute;i</p>\r\n\r\n<p>Kiểu k&iacute;nh: K&iacute;nh gọng vu&ocirc;ng / K&iacute;nh gọng h&igrave;nh thang</p>\r\n\r\n<p>Kiểu gương mặt ph&ugrave; hợp: Mặt tr&aacute;i xoan, mặt tr&ograve;n, mặt tr&aacute;i tim<br />\r\n&nbsp;</p>', 'kính', '<p>Sản phẩm Mắt k&iacute;nh thuộc thương hiệu Vascara, được thiết kế tinh tế với kiểu d&aacute;ng thời trang v&agrave; m&agrave;u sắc đa dạng, ph&ugrave; hợp với nhiều kiểu d&aacute;ng gương mặt.</p>', 6, 6, 1, '2023-04-26 12:54:21', '2023-04-26 12:54:21'),
(59, 38, 7, 'KÍNH WAYFARER GỌNG PHỐI VIỀN KIM', 'kinh-wayfarer-gong-phoi-vien-kim', 535500, '<p>C&ocirc;ng nghệ tr&ograve;ng k&iacute;nh: C&ocirc;ng nghệ Polarized chống ch&oacute;i</p>\r\n\r\n<p>Kiểu k&iacute;nh: K&iacute;nh gọng vu&ocirc;ng / K&iacute;nh gọng h&igrave;nh thang</p>\r\n\r\n<p>Kiểu gương mặt ph&ugrave; hợp: Mặt tr&aacute;i xoan, mặt tr&ograve;n, mặt tr&aacute;i tim</p>', 'WAYFARER', '<p>Sản phẩm Mắt k&iacute;nh thuộc thương hiệu Vascara, được thiết kế tinh tế với kiểu d&aacute;ng thời trang v&agrave; m&agrave;u sắc đa dạng, ph&ugrave; hợp với nhiều kiểu d&aacute;ng gương mặt.</p>', 6, 6, 1, '2023-04-26 12:54:34', '2023-04-26 12:54:34'),
(60, 38, 7, 'KÍNH MÁT HÌNH MẮT VUÔNG CÁ TÍNH', 'kinh-mat-hinh-mat-vuong-ca-tinh', 5350500, '<p>Chất liệu gọng: Plastic &amp; Kim loại</p>\r\n\r\n<p>C&ocirc;ng nghệ tr&ograve;ng k&iacute;nh: C&ocirc;ng nghệ Polarized chống ch&oacute;i</p>\r\n\r\n<p>Kiểu k&iacute;nh: K&iacute;nh gọng vu&ocirc;ng / K&iacute;nh gọng h&igrave;nh thang</p>\r\n\r\n<p>Kiểu gương mặt ph&ugrave; hợp: Mặt tr&aacute;i xoan, mặt tr&ograve;n, mặt tr&aacute;i tim</p>', 'kính mát', '<p>Sản phẩm Mắt k&iacute;nh thuộc thương hiệu Vascara, được thiết kế tinh tế với kiểu d&aacute;ng thời trang v&agrave; m&agrave;u sắc đa dạng, ph&ugrave; hợp với nhiều kiểu d&aacute;ng gương mặt.</p>', 6, 6, 1, '2023-05-27 04:39:12', '2023-05-27 04:39:12'),
(61, 43, 7, 'THẮT LƯNG KHÓA CÀI HÌNH VUÔNG - MÀU HỒNG', 'that-lung-khoa-cai-hinh-vuong-mau-hong', 346500, '<p>Loại sản phẩm:&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Thắt Lưng</p>\r\n\r\n<p>Chất liệu:&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Da tổng hợp</p>\r\n\r\n<p>Bản d&acirc;y:&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 2 cm</p>\r\n\r\n<p>Chiều d&agrave;i:&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 83 cm (S); 90 cm (M); 100 cm (L)</p>', 'thắt lưng', '<p>Sản phẩm thắt lưng của Vascara</p>', 6, 6, 1, '2023-04-26 12:54:14', '2023-04-26 12:54:14'),
(62, 43, 7, 'THẮT LƯNG DÂY MẢNH KHÓA CÀI DÁNG BẦU', 'that-lung-day-manh-khoa-cai-dang-bau', 301500, '<p>Chất liệu:&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Da tổng hợp</p>\r\n\r\n<p>Bản d&acirc;y:&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 1 cm</p>\r\n\r\n<p>Chiều d&agrave;i:&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 74 cm (S); 80 cm(M); 90 cm (L)</p>', 'thắt lưng', '<p>Sản phẩm thắt lưng thuộc thương hiệu Vascara.</p>', 6, NULL, 1, '2023-04-26 12:01:55', '2023-04-26 12:01:55'),
(63, 43, 7, 'THẮT LƯNG KHÓA CÀI GOLDEN OCTAGON', 'that-lung-khoa-cai-golden-octagon', 274500, '<p>Chất liệu:&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Da tổng hợp</p>\r\n\r\n<p>Bản d&acirc;y:&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 1 cm</p>\r\n\r\n<p>Chiều d&agrave;i:&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 74 cm (S); 80 cm(M); 90 cm (L)</p>', 'GOLDEN OCTAGON', '<p>Sản phẩm thắt lưng thuộc thương hiệu Vascara.</p>', 6, 6, 1, '2023-04-26 12:54:12', '2023-04-26 12:54:12'),
(66, 43, 7, 'THẮT LƯNG KHÓA CÀI HÌNH VUÔNG - MÀU XÁM', 'that-lung-khoa-cai-hinh-vuong-mau-xam', 346500, '<p>Chất liệu:&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Da tổng hợp</p>\r\n\r\n<p>Bản d&acirc;y:&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 1 cm</p>\r\n\r\n<p>Chiều d&agrave;i:&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 74 cm (S); 80 cm(M); 90 cm (L)</p>', 'thắt lưng', '<p>Sản phẩm thắt lưng thuộc thương hiệu Vascara.</p>', 6, NULL, 1, '2023-04-26 12:07:56', '2023-04-26 12:07:56'),
(67, 43, 7, 'THẮT LƯNG DÂY MẢNH KHÓA GEOMETRIC', 'that-lung-day-manh-khoa-geometric', 256500, '<p>Chất liệu:&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Da tổng hợp</p>\r\n\r\n<p>Bản d&acirc;y:&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 1 cm</p>\r\n\r\n<p>Chiều d&agrave;i:&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 74 cm (S); 80 cm(M); 90 cm (L)</p>', 'test', '<p>Sản phẩm thắt lưng thuộc thương hiệu Vascara.</p>', 6, 6, 1, '2023-04-26 12:54:17', '2023-04-26 12:54:17'),
(68, 43, 7, 'THẮT LƯNG DÂY MẢNH KHÓA CÀI CYLINDER', 'that-lung-day-manh-khoa-cai-cylinder', 274500, '<p>Chất liệu:&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Da tổng hợp</p>\r\n\r\n<p>Bản d&acirc;y:&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 1 cm</p>\r\n\r\n<p>Chiều d&agrave;i:&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 74 cm (S); 80 cm(M); 90 cm (L)</p>', 'thắt lưng', '<p>Sản phẩm thắt lưng thuộc thương hiệu Vascara.</p>', 6, 6, 1, '2023-04-26 12:54:31', '2023-04-26 12:54:31'),
(69, 39, 8, 'Mũ Bucket May Viền Chỉ Nổi', 'mu-bucket-may-vien-chi-noi', 280250, '<p>Loại sản phẩm:&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Mũ / N&oacute;n</p>\r\n\r\n<p>Chất liệu:&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Ramie Cotton</p>\r\n\r\n<p>K&iacute;ch thước v&ograve;ng đầu:&nbsp; &nbsp; &nbsp; 58 cm</p>', 'bucket', '<p>Sản phẩm mũ n&oacute;n thuộc thương hiệu JUNO</p>', 6, NULL, 1, '2023-04-26 12:23:13', '2023-04-26 12:23:13'),
(70, 39, 12, 'MŨ BUCKET PHỐI MÀU TƯƠNG PHẢN - Trắng', 'mu-bucket-phoi-mau-tuong-phan-trang', 427500, '<p>Loại sản phẩm:&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Mũ / N&oacute;n</p>\r\n\r\n<p>Chất liệu:&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Ramie Cotton</p>\r\n\r\n<p>K&iacute;ch thước v&ograve;ng đầu:&nbsp; &nbsp; &nbsp; 58 cm</p>', 'BUCKET', '<p>Sản phẩm mũ n&oacute;n thuộc thương hiệu STYLUK</p>', 6, NULL, 1, '2023-04-26 12:25:14', '2023-04-26 12:25:14'),
(71, 41, 12, 'VỚ LƯỜI HỌA TIẾT TRƠN', 'vo-luoi-hoa-tiet-tron', 67500, '<p>K&iacute;ch thước (d&agrave;i x rộng x cao):&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 18 x 6.5 x 7 cm</p>\r\n\r\n<p>Chất liệu/th&agrave;nh phần:&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Sợi b&ocirc;ng, Sợi spandex, Sợi cao su</p>\r\n\r\n<p>Hoa văn:&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Trơn</p>\r\n\r\n<p>Ph&ugrave; hợp sử dụng:&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Sneaker cổ ngắn / Loafer / Gi&agrave;y b&uacute;p b&ecirc;</p>', 'vớ', '<p>Mua 2 đ&ocirc;i tặng 1 đ&ocirc;i. Vui l&ograve;ng chọn 3 đ&ocirc;i vớ khi thanh to&aacute;n để nhận ưu đ&atilde;i.</p>', 6, 6, 1, '2023-04-26 12:54:10', '2023-04-26 12:54:10'),
(72, 41, 7, 'VỚ CỔ CAO HỌA TIẾT SỌC DỌC - DA', 'vo-co-cao-hoa-tiet-soc-doc-da', 94500, '<p>K&iacute;ch thước (d&agrave;i x rộng x cao):&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 18 x 6.5 x 7 cm</p>\r\n\r\n<p>Chất liệu/th&agrave;nh phần:&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Sợi b&ocirc;ng, Sợi spandex, Sợi cao su</p>\r\n\r\n<p>Hoa văn:&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Sọc dọc</p>\r\n\r\n<p>Ph&ugrave; hợp sử dụng:&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Sneaker cổ ngắn / Loafer / Gi&agrave;y b&uacute;p b&ecirc;</p>', 'vớ', '<p>Mua 2 đ&ocirc;i tặng 1 đ&ocirc;i. Vui l&ograve;ng chọn 3 đ&ocirc;i vớ khi thanh to&aacute;n để nhận ưu đ&atilde;i.</p>', 6, NULL, 1, '2023-04-26 12:31:03', '2023-04-26 12:31:03'),
(73, 40, 7, 'LEN ĐAN TÚI LƯỚI - MÀU CAM', 'len-dan-tui-luoi-mau-cam', 166500, '<p>Chất liệu:&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Len</p>\r\n\r\n<p>Vật liệu:&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; bảo vệ m&ocirc;i trường</p>', 'LEN', '<p>Nguy&ecirc;n vật liệu d&ugrave;ng để đang t&uacute;i lưới.</p>', 6, NULL, 1, '2023-04-26 12:34:17', '2023-04-26 12:34:17'),
(74, 40, 9, 'TÚI KNIT ĐAN LƯỚI - XANH NAVY', 'tui-knit-dan-luoi-xanh-navy', 265500, '<p>Loại sản phẩm:&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; T&uacute;i Dệt / Lưới</p>\r\n\r\n<p>K&iacute;ch thước (d&agrave;i x rộng x cao):&nbsp; &nbsp; &nbsp; &nbsp;38 x 1.4 x 31.5 cm</p>\r\n\r\n<p>Chất liệu:&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Vải</p>', 'túi', '<p>Sản phẩm t&uacute;i lưới thuộc thương hiệu chanel.</p>', 6, NULL, 1, '2023-04-26 12:36:56', '2023-04-26 12:36:56'),
(75, 40, 9, 'Túi Knit Đan Lưới - Màu Xanh Lá Sáng', 'tui-knit-dan-luoi-mau-xanh-la-sang', 265500, '<p>Loại sản phẩm:&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; T&uacute;i Dệt / Lưới</p>\r\n\r\n<p>K&iacute;ch thước (d&agrave;i x rộng x cao):&nbsp; &nbsp; &nbsp; &nbsp;38 x 1.4 x 31.5 cm</p>\r\n\r\n<p>Chất liệu:&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Vải</p>', 'túi', '<p>Sản phẩm t&uacute;i lưới thuộc thương hiệu Chanel.</p>', 6, NULL, 1, '2023-04-26 12:39:16', '2023-04-26 12:39:16'),
(76, 37, 7, 'VÍ CẦM TAY NHẤN KHÓA VÂN ĐÁ - MÀU BE', 'vi-cam-tay-nhan-khoa-van-da-mau-be', 895000, '<p>Chất liệu:&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Da nh&acirc;n tạo</p>\r\n\r\n<p>K&iacute;ch thước (d&agrave;i x rộng x cao):&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;22.3 x 4 x .13.2 cm</p>\r\n\r\n<p>Chất liệu d&acirc;y đeo:&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;D&acirc;y da</p>\r\n\r\n<p>Kiểu kh&oacute;a:&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;N&uacute;t c&agrave;i</p>\r\n\r\n<p>Số ngăn:&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;1 ngăn lớn, 2 ngăn nhỏ, 6 ngăn đựng thẻ</p>\r\n\r\n<p>K&iacute;ch cỡ:&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Trung b&igrave;nh</p>\r\n\r\n<p>Ph&ugrave; hợp sử dụng:&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Đi tiệc</p>', 'be', '<p>v&iacute; cầm tay nhấn kh&oacute;a v&acirc;n đ&aacute;.</p>\r\n\r\n<p><strong>GIẢM 100% PH&Iacute; VẬN CHUYỂN TI&Ecirc;U CHUẨN CHO ĐƠN TỪ 799K (TỐI ĐA 30K)</strong></p>', 6, 6, 1, '2023-05-28 04:22:16', '2023-05-28 04:22:16'),
(77, 36, 12, 'CLUTCH DỰ TIỆC KHÓA CRYSTAL - MÀU XANH ĐEN', 'clutch-du-tiec-khoa-crystal-mau-xanh-den', 905000, '<p>Chất liệu:&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Chất liệu đặt biệt</p>\r\n\r\n<p>K&iacute;ch thước (d&agrave;i x rộng x cao):&nbsp; &nbsp; &nbsp; &nbsp; 22.3 x 4 x .13.2 cm</p>\r\n\r\n<p>Chất liệu d&acirc;y đeo:&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;D&acirc;y da</p>\r\n\r\n<p>Kiểu kh&oacute;a:&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;N&uacute;t c&agrave;i</p>\r\n\r\n<p>Số ngăn:&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;1 ngăn lớn, 1 ngăn nhỏ</p>\r\n\r\n<p>K&iacute;ch cỡ:&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Trung b&igrave;nh</p>\r\n\r\n<p>Ph&ugrave; hợp sử dụng:&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Đi tiệc</p>', 'CRYSTAL', '<p><strong>TẶNG NƯỚC TẨY TRANG COCOON CHO ĐƠN H&Agrave;NG NGUY&Ecirc;N GI&Aacute; TỪ 800K C&Oacute; T&Uacute;I/BALO/V&Iacute;</strong></p>\r\n\r\n<p><strong>GIẢM 100% PH&Iacute; VẬN CHUYỂN TI&Ecirc;U CHUẨN CHO ĐƠN TỪ 799K (TỐI ĐA 30K)</strong></p>', 6, 6, 1, '2023-06-02 11:31:47', '2023-06-02 11:31:47'),
(78, 35, 10, 'CLUTCH quai đeo họa tiết da báo', 'clutch-quai-deo-hoa-tiet-da-bao', 875000, '<p>Chất liệu:&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Chất liệu da</p>\r\n\r\n<p>K&iacute;ch thước (d&agrave;i x rộng x cao):&nbsp; &nbsp; &nbsp; &nbsp; 22.3 x 4 x .13.2 cm</p>\r\n\r\n<p>Chất liệu d&acirc;y đeo:&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;D&acirc;y da</p>\r\n\r\n<p>Kiểu kh&oacute;a:&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;N&uacute;t c&agrave;i</p>\r\n\r\n<p>Số ngăn:&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;1 ngăn lớn, 1 ngăn nhỏ</p>\r\n\r\n<p>K&iacute;ch cỡ:&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Trung b&igrave;nh</p>\r\n\r\n<p>Ph&ugrave; hợp sử dụng:&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Đi tiệc</p>', 'CLUTCH', '<p><strong>TẶNG NƯỚC TẨY TRANG COCOON CHO ĐƠN H&Agrave;NG NGUY&Ecirc;N GI&Aacute; TỪ 800K C&Oacute; T&Uacute;I/BALO/V&Iacute;</strong></p>\r\n\r\n<p><strong>GIẢM 100% PH&Iacute; VẬN CHUYỂN TI&Ecirc;U CHUẨN CHO ĐƠN TỪ 799K (TỐI ĐA 30K)</strong></p>\r\n\r\n<p>TẶNG COUPON 100K &Aacute;P DỤNG ĐƠN H&Agrave;NG ĐẦU TI&Ecirc;N.&nbsp;</p>', 6, 6, 2, '2023-05-27 04:39:03', '2023-05-27 04:39:03'),
(79, 37, 11, 'CLUTCH DỰ TIỆC BARREL MAY CHẦN BÔNG - MÀU TRẮNG', 'clutch-du-tiec-barrel-may-chan-bong-mau-trang', 945000, '<p>Chất liệu:&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Chất liệu đặt biệt</p>\r\n\r\n<p>K&iacute;ch thước (d&agrave;i x rộng x cao):&nbsp; &nbsp; &nbsp; &nbsp; 22.3 x 4 x .13.2 cm</p>\r\n\r\n<p>Chất liệu d&acirc;y đeo:&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; D&acirc;y da</p>\r\n\r\n<p>Kiểu kh&oacute;a:&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; N&uacute;t c&agrave;i</p>\r\n\r\n<p>Số ngăn:&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;1 ngăn lớn, 1 ngăn nhỏ</p>\r\n\r\n<p>K&iacute;ch cỡ:&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Trung b&igrave;nh</p>\r\n\r\n<p>Ph&ugrave; hợp sử dụng:&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Đi tiệc</p>', 'BARREL', '<p><strong>TẶNG NƯỚC TẨY TRANG COCOON CHO ĐƠN H&Agrave;NG NGUY&Ecirc;N GI&Aacute; TỪ 800K C&Oacute; T&Uacute;I/BALO/V&Iacute;</strong></p>\r\n\r\n<p><strong>GIẢM 100% PH&Iacute; VẬN CHUYỂN TI&Ecirc;U CHUẨN CHO ĐƠN TỪ 799K (TỐI ĐA 30K)</strong></p>', 6, 6, 1, '2023-05-24 07:32:06', '2023-05-24 07:32:06');

-- --------------------------------------------------------

--
-- Table structure for table `httt_product_image`
--

CREATE TABLE `httt_product_image` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `image` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `httt_product_image`
--

INSERT INTO `httt_product_image` (`id`, `product_id`, `image`) VALUES
(69, 14, 'tui-tote-double-pocket-tot-0116-mau-xanh-la-1.jpg'),
(70, 14, 'tui-tote-double-pocket-tot-0116-mau-xanh-la-2.jpg'),
(71, 14, 'tui-tote-double-pocket-tot-0116-mau-xanh-la-3.jpg'),
(72, 14, 'tui-tote-double-pocket-tot-0116-mau-xanh-la-4.jpg'),
(73, 14, 'tui-tote-double-pocket-tot-0116-mau-xanh-la-5.jpg'),
(74, 15, 'tui-xach-trung-top-handle-1.jpg'),
(75, 15, 'tui-xach-trung-top-handle-2.jpg'),
(76, 15, 'tui-xach-trung-top-handle-3.jpg'),
(77, 15, 'tui-xach-trung-top-handle-4.jpg'),
(78, 15, 'tui-xach-trung-top-handle-5.jpg'),
(84, 17, 'tui-hobo-quai-cai-1.jpg'),
(85, 17, 'tui-hobo-quai-cai-2.jpg'),
(86, 17, 'tui-hobo-quai-cai-3.jpg'),
(87, 17, 'tui-hobo-quai-cai-4.jpg'),
(88, 17, 'tui-hobo-quai-cai-5.jpg'),
(89, 18, 'tui-tote-double-den-1.jpg'),
(90, 18, 'tui-tote-double-den-2.jpg'),
(91, 18, 'tui-tote-double-den-3.jpg'),
(92, 18, 'tui-tote-double-den-4.jpg'),
(93, 18, 'tui-tote-double-den-5.jpg'),
(94, 19, 'tui-vai-1.webp'),
(95, 20, 'tui-1.webp'),
(96, 21, 'balo-mini-nhan-khoa-keo-1.jpg'),
(97, 21, 'balo-mini-nhan-khoa-keo-2.jpg'),
(98, 21, 'balo-mini-nhan-khoa-keo-3.jpg'),
(99, 21, 'balo-mini-nhan-khoa-keo-4.jpg'),
(100, 21, 'balo-mini-nhan-khoa-keo-5.jpg'),
(101, 21, 'balo-mini-nhan-khoa-keo-6.jpg'),
(103, 22, 'vi-cam-tay-dinh-trang-tri-kim-loai-1.jpg'),
(104, 22, 'vi-cam-tay-dinh-trang-tri-kim-loai-2.jpg'),
(105, 22, 'vi-cam-tay-dinh-trang-tri-kim-loai-3.jpg'),
(106, 22, 'vi-cam-tay-dinh-trang-tri-kim-loai-4.jpg'),
(107, 22, 'vi-cam-tay-dinh-trang-tri-kim-loai-5.jpg'),
(108, 23, 'tui-xach-tay-nhan-khoa-kim-loai-phoi-soc-1.jpg'),
(109, 23, 'tui-xach-tay-nhan-khoa-kim-loai-phoi-soc-2.jpg'),
(110, 23, 'tui-xach-tay-nhan-khoa-kim-loai-phoi-soc-3.jpg'),
(111, 23, 'tui-xach-tay-nhan-khoa-kim-loai-phoi-soc-4.jpg'),
(112, 23, 'tui-xach-tay-nhan-khoa-kim-loai-phoi-soc-5.jpg'),
(113, 24, 'tui-xach-nhan-day-chuoi-hat-van-da-1.jpg'),
(114, 24, 'tui-xach-nhan-day-chuoi-hat-van-da-2.jpg'),
(115, 24, 'tui-xach-nhan-day-chuoi-hat-van-da-3.jpg'),
(116, 24, 'tui-xach-nhan-day-chuoi-hat-van-da-4.jpg'),
(117, 24, 'tui-xach-nhan-day-chuoi-hat-van-da-5.jpg'),
(118, 25, 'tui-tote-quai-doi-nhan-vien-1.jpg'),
(119, 25, 'tui-tote-quai-doi-nhan-vien-2.jpg'),
(120, 25, 'tui-tote-quai-doi-nhan-vien-3.jpg'),
(121, 25, 'tui-tote-quai-doi-nhan-vien-4.jpg'),
(122, 25, 'tui-tote-quai-doi-nhan-vien-5.jpg'),
(123, 25, 'tui-tote-quai-doi-nhan-vien-6.jpg'),
(124, 26, 'tui-xach-tay-nhan-khoa-gai-1.jpg'),
(125, 26, 'tui-xach-tay-nhan-khoa-gai-2.jpg'),
(126, 26, 'tui-xach-tay-nhan-khoa-gai-3.jpg'),
(127, 26, 'tui-xach-tay-nhan-khoa-gai-4.jpg'),
(128, 26, 'tui-xach-tay-nhan-khoa-gai-5.jpg'),
(129, 27, 'tui-xach-tay-quai-ngan-dap-van-noi-1.jpg'),
(130, 27, 'tui-xach-tay-quai-ngan-dap-van-noi-2.jpg'),
(131, 27, 'tui-xach-tay-quai-ngan-dap-van-noi-3.jpg'),
(132, 27, 'tui-xach-tay-quai-ngan-dap-van-noi-4.jpg'),
(133, 27, 'tui-xach-tay-quai-ngan-dap-van-noi-5.jpg'),
(134, 27, 'tui-xach-tay-quai-ngan-dap-van-noi-6.jpg'),
(135, 28, 'tui-xach-tay-phoi-khan-floral-kem-1.jpg'),
(136, 28, 'tui-xach-tay-phoi-khan-floral-kem-2.jpg'),
(137, 28, 'tui-xach-tay-phoi-khan-floral-kem-3.jpg'),
(138, 28, 'tui-xach-tay-phoi-khan-floral-kem-4.jpg'),
(139, 29, 'tui-xach-tay-phoi-khan-floral-tim-1.jpg'),
(140, 29, 'tui-xach-tay-phoi-khan-floral-tim-2.jpg'),
(141, 29, 'tui-xach-tay-phoi-khan-floral-tim-3.jpg'),
(142, 29, 'tui-xach-tay-phoi-khan-floral-tim-4.jpg'),
(143, 30, 'tui-tote-quai-doi-dinh-kim-loai-do-1.jpg'),
(144, 30, 'tui-tote-quai-doi-dinh-kim-loai-do-2.jpg'),
(145, 30, 'tui-tote-quai-doi-dinh-kim-loai-do-3.jpg'),
(146, 30, 'tui-tote-quai-doi-dinh-kim-loai-do-4.jpg'),
(147, 30, 'tui-tote-quai-doi-dinh-kim-loai-do-5.jpg'),
(148, 30, 'tui-tote-quai-doi-dinh-kim-loai-do-6.jpg'),
(149, 31, 'tui-xach-tay-mini-soc-dap-noi-tim-1.jpg'),
(150, 31, 'tui-xach-tay-mini-soc-dap-noi-tim-2.jpg'),
(151, 31, 'tui-xach-tay-mini-soc-dap-noi-tim-3.jpg'),
(152, 31, 'tui-xach-tay-mini-soc-dap-noi-tim-4.jpg'),
(153, 31, 'tui-xach-tay-mini-soc-dap-noi-tim-5.jpg'),
(154, 32, 'balo-mini-van-ca-sau-hong-nhat-1.jpg'),
(155, 32, 'balo-mini-van-ca-sau-hong-nhat-2.jpg'),
(156, 32, 'balo-mini-van-ca-sau-hong-nhat-3.jpg'),
(157, 32, 'balo-mini-van-ca-sau-hong-nhat-4.jpg'),
(158, 32, 'balo-mini-van-ca-sau-hong-nhat-5.jpg'),
(159, 33, 'balo-mini-nhan-tui-phu-kem-1.jpg'),
(160, 33, 'balo-mini-nhan-tui-phu-kem-2.jpg'),
(161, 33, 'balo-mini-nhan-tui-phu-kem-3.jpg'),
(162, 33, 'balo-mini-nhan-tui-phu-kem-4.jpg'),
(163, 33, 'balo-mini-nhan-tui-phu-kem-5.jpg'),
(164, 33, 'balo-mini-nhan-tui-phu-kem-6.jpg'),
(165, 34, 'balo-canvas-nap-gap-mau-vang-chanh-1.jpg'),
(166, 34, 'balo-canvas-nap-gap-mau-vang-chanh-2.jpg'),
(167, 34, 'balo-canvas-nap-gap-mau-vang-chanh-3.jpg'),
(168, 34, 'balo-canvas-nap-gap-mau-vang-chanh-4.jpg'),
(169, 34, 'balo-canvas-nap-gap-mau-vang-chanh-5.jpg'),
(170, 34, 'balo-canvas-nap-gap-mau-vang-chanh-6.jpg'),
(171, 35, 'balo-may-chan-phoi-trang-tri-kim-loai-mau-cam-1.jpg'),
(172, 35, 'balo-may-chan-phoi-trang-tri-kim-loai-mau-cam-2.jpg'),
(173, 35, 'balo-may-chan-phoi-trang-tri-kim-loai-mau-cam-3.jpg'),
(174, 35, 'balo-may-chan-phoi-trang-tri-kim-loai-mau-cam-4.jpg'),
(175, 35, 'balo-may-chan-phoi-trang-tri-kim-loai-mau-cam-5.jpg'),
(176, 35, 'balo-may-chan-phoi-trang-tri-kim-loai-mau-cam-6.jpg'),
(177, 36, 'balo-nap-gap-phoi-charm-kim-loai-mau-xanh-bac-ha-1.jpg'),
(178, 36, 'balo-nap-gap-phoi-charm-kim-loai-mau-xanh-bac-ha-2.jpg'),
(179, 36, 'balo-nap-gap-phoi-charm-kim-loai-mau-xanh-bac-ha-3.jpg'),
(180, 36, 'balo-nap-gap-phoi-charm-kim-loai-mau-xanh-bac-ha-4.jpg'),
(181, 36, 'balo-nap-gap-phoi-charm-kim-loai-mau-xanh-bac-ha-5.jpg'),
(182, 37, 'balo-mini-rising-stars-mau-vang-1.jpg'),
(183, 37, 'balo-mini-rising-stars-mau-vang-2.jpg'),
(184, 37, 'balo-mini-rising-stars-mau-vang-3.jpg'),
(185, 37, 'balo-mini-rising-stars-mau-vang-4.jpg'),
(186, 37, 'balo-mini-rising-stars-mau-vang-5.jpg'),
(187, 37, 'balo-mini-rising-stars-mau-vang-6.jpg'),
(194, 40, 'balo-mini-van-ca-sau-vang-nhat-1.jpg'),
(195, 40, 'balo-mini-van-ca-sau-vang-nhat-2.jpg'),
(196, 40, 'balo-mini-van-ca-sau-vang-nhat-3.jpg'),
(197, 40, 'balo-mini-van-ca-sau-vang-nhat-4.jpg'),
(198, 40, 'balo-mini-van-ca-sau-vang-nhat-5.jpg'),
(199, 41, 'balo-mini-hieu-ung-anh-bac-mau-kem-1.jpg'),
(200, 41, 'balo-mini-hieu-ung-anh-bac-mau-kem-2.jpg'),
(201, 41, 'balo-mini-hieu-ung-anh-bac-mau-kem-3.jpg'),
(202, 41, 'balo-mini-hieu-ung-anh-bac-mau-kem-4.jpg'),
(203, 41, 'balo-mini-hieu-ung-anh-bac-mau-kem-5.jpg'),
(221, 42, 'san-pham-test-12345678-1.jpg'),
(222, 42, 'san-pham-test-12345678-2.jpg'),
(223, 42, 'san-pham-test-12345678-3.jpg'),
(224, 43, 'test-xoa-1.png'),
(225, 43, 'test-xoa-2.webp'),
(226, 43, 'test-xoa-3.jpg'),
(227, 45, 'test-1-1.jpg'),
(230, 46, 'test-123456-2.jpg'),
(239, 49, 'tui-tui-1-1.jpg'),
(240, 49, 'tui-tui-1-2.jpg'),
(241, 49, 'tui-tui-1-3.jpg'),
(249, 52, 'tui-deo-cheo-khoa-tao-kieu-chu-v-1.jpg'),
(250, 52, 'tui-deo-cheo-khoa-tao-kieu-chu-v-2.jpg'),
(251, 52, 'tui-deo-cheo-khoa-tao-kieu-chu-v-3.jpg'),
(252, 52, 'tui-deo-cheo-khoa-tao-kieu-chu-v-4.jpg'),
(253, 52, 'tui-deo-cheo-khoa-tao-kieu-chu-v-5.jpg'),
(254, 52, 'tui-deo-cheo-khoa-tao-kieu-chu-v-6.jpg'),
(255, 53, 'kinh-mat-gong-kim-loai-wayfarer-1.jpg'),
(256, 53, 'kinh-mat-gong-kim-loai-wayfarer-2.jpg'),
(257, 53, 'kinh-mat-gong-kim-loai-wayfarer-3.jpg'),
(258, 53, 'kinh-mat-gong-kim-loai-wayfarer-4.jpg'),
(259, 54, 'kinh-mat-hinh-da-giac-gong-nho-1.jpg'),
(260, 54, 'kinh-mat-hinh-da-giac-gong-nho-2.jpg'),
(261, 54, 'kinh-mat-hinh-da-giac-gong-nho-3.jpg'),
(262, 54, 'kinh-mat-hinh-da-giac-gong-nho-4.jpg'),
(263, 54, 'kinh-mat-hinh-da-giac-gong-nho-5.jpg'),
(264, 55, 'kinh-mat-hinh-tron-thanh-lich-1.jpg'),
(265, 55, 'kinh-mat-hinh-tron-thanh-lich-2.jpg'),
(266, 55, 'kinh-mat-hinh-tron-thanh-lich-3.jpg'),
(267, 55, 'kinh-mat-hinh-tron-thanh-lich-4.jpg'),
(268, 55, 'kinh-mat-hinh-tron-thanh-lich-5.jpg'),
(269, 56, 'kinh-gong-kim-loai-mat-tron-1.jpg'),
(270, 56, 'kinh-gong-kim-loai-mat-tron-2.jpg'),
(271, 56, 'kinh-gong-kim-loai-mat-tron-3.jpg'),
(272, 57, 'kinh-gong-ban-manh-hinh-luc-giac-1.jpg'),
(273, 57, 'kinh-gong-ban-manh-hinh-luc-giac-2.jpg'),
(274, 57, 'kinh-gong-ban-manh-hinh-luc-giac-3.jpg'),
(275, 57, 'kinh-gong-ban-manh-hinh-luc-giac-4.jpg'),
(276, 57, 'kinh-gong-ban-manh-hinh-luc-giac-5.jpg'),
(277, 58, 'kinh-mat-hinh-mat-vuong-bo-tron-1.jpg'),
(278, 58, 'kinh-mat-hinh-mat-vuong-bo-tron-2.jpg'),
(279, 58, 'kinh-mat-hinh-mat-vuong-bo-tron-3.jpg'),
(280, 59, 'kinh-wayfarer-gong-phoi-vien-kim-1.jpg'),
(281, 59, 'kinh-wayfarer-gong-phoi-vien-kim-2.jpg'),
(282, 59, 'kinh-wayfarer-gong-phoi-vien-kim-3.jpg'),
(283, 60, 'kinh-mat-hinh-mat-vuong-ca-tinh-1.jpg'),
(284, 60, 'kinh-mat-hinh-mat-vuong-ca-tinh-2.jpg'),
(285, 60, 'kinh-mat-hinh-mat-vuong-ca-tinh-3.jpg'),
(286, 61, 'that-lung-khoa-cai-hinh-vuong-mau-hong-1.jpg'),
(287, 61, 'that-lung-khoa-cai-hinh-vuong-mau-hong-2.jpg'),
(288, 62, 'that-lung-day-manh-khoa-cai-dang-bau-1.jpg'),
(289, 62, 'that-lung-day-manh-khoa-cai-dang-bau-2.jpg'),
(290, 63, 'that-lung-khoa-cai-golden-octagon-1.jpg'),
(293, 66, 'that-lung-khoa-cai-hinh-vuong-mau-xam-1.jpg'),
(294, 66, 'that-lung-khoa-cai-hinh-vuong-mau-xam-2.jpg'),
(295, 67, 'that-lung-day-manh-khoa-geometric-1.jpg'),
(296, 67, 'that-lung-day-manh-khoa-geometric-2.jpg'),
(297, 68, 'that-lung-day-manh-khoa-cai-cylinder-1.jpg'),
(298, 68, 'that-lung-day-manh-khoa-cai-cylinder-2.jpg'),
(299, 69, 'mu-bucket-may-vien-chi-noi-1.jpg'),
(300, 69, 'mu-bucket-may-vien-chi-noi-2.jpg'),
(301, 69, 'mu-bucket-may-vien-chi-noi-3.jpg'),
(302, 69, 'mu-bucket-may-vien-chi-noi-4.jpg'),
(303, 70, 'mu-bucket-phoi-mau-tuong-phan-trang-1.jpg'),
(304, 70, 'mu-bucket-phoi-mau-tuong-phan-trang-2.jpg'),
(305, 70, 'mu-bucket-phoi-mau-tuong-phan-trang-3.jpg'),
(306, 70, 'mu-bucket-phoi-mau-tuong-phan-trang-4.jpg'),
(307, 71, 'vo-luoi-hoa-tiet-tron-1.jpg'),
(308, 71, 'vo-luoi-hoa-tiet-tron-2.jpg'),
(309, 71, 'vo-luoi-hoa-tiet-tron-3.jpg'),
(310, 71, 'vo-luoi-hoa-tiet-tron-4.jpg'),
(311, 71, 'vo-luoi-hoa-tiet-tron-5.jpg'),
(312, 72, 'vo-co-cao-hoa-tiet-soc-doc-da-1.jpg'),
(313, 72, 'vo-co-cao-hoa-tiet-soc-doc-da-2.jpg'),
(314, 72, 'vo-co-cao-hoa-tiet-soc-doc-da-3.jpg'),
(315, 72, 'vo-co-cao-hoa-tiet-soc-doc-da-4.jpg'),
(316, 72, 'vo-co-cao-hoa-tiet-soc-doc-da-5.jpg'),
(317, 73, 'len-dan-tui-luoi-mau-cam-1.jpg'),
(318, 73, 'len-dan-tui-luoi-mau-cam-2.jpg'),
(319, 73, 'len-dan-tui-luoi-mau-cam-3.jpg'),
(320, 73, 'len-dan-tui-luoi-mau-cam-4.jpg'),
(321, 73, 'len-dan-tui-luoi-mau-cam-5.jpg'),
(322, 74, 'tui-knit-dan-luoi-xanh-navy-1.jpg'),
(323, 74, 'tui-knit-dan-luoi-xanh-navy-2.jpg'),
(324, 75, 'tui-knit-dan-luoi-mau-xanh-la-sang-1.jpg'),
(325, 75, 'tui-knit-dan-luoi-mau-xanh-la-sang-2.jpg'),
(326, 76, 'vi-cam-tay-nhan-khoa-van-da-mau-be-1.jpg'),
(327, 76, 'vi-cam-tay-nhan-khoa-van-da-mau-be-2.jpg'),
(328, 76, 'vi-cam-tay-nhan-khoa-van-da-mau-be-3.jpg'),
(329, 76, 'vi-cam-tay-nhan-khoa-van-da-mau-be-4.jpg'),
(330, 77, 'clutch-du-tiec-khoa-crystal-mau-xanh-den-1.jpg'),
(331, 77, 'clutch-du-tiec-khoa-crystal-mau-xanh-den-2.jpg'),
(332, 77, 'clutch-du-tiec-khoa-crystal-mau-xanh-den-3.jpg'),
(333, 77, 'clutch-du-tiec-khoa-crystal-mau-xanh-den-4.jpg'),
(334, 77, 'clutch-du-tiec-khoa-crystal-mau-xanh-den-5.jpg'),
(335, 78, 'clutch-quai-deo-hoa-tiet-da-bao-1.jpg'),
(336, 78, 'clutch-quai-deo-hoa-tiet-da-bao-2.jpg'),
(337, 78, 'clutch-quai-deo-hoa-tiet-da-bao-3.jpg'),
(338, 78, 'clutch-quai-deo-hoa-tiet-da-bao-4.jpg'),
(339, 78, 'clutch-quai-deo-hoa-tiet-da-bao-5.jpg'),
(340, 78, 'clutch-quai-deo-hoa-tiet-da-bao-6.jpg'),
(341, 79, 'clutch-du-tiec-barrel-may-chan-bong-mau-trang-1.jpg'),
(342, 79, 'clutch-du-tiec-barrel-may-chan-bong-mau-trang-2.jpg'),
(343, 79, 'clutch-du-tiec-barrel-may-chan-bong-mau-trang-3.jpg'),
(344, 79, 'clutch-du-tiec-barrel-may-chan-bong-mau-trang-4.jpg'),
(345, 79, 'clutch-du-tiec-barrel-may-chan-bong-mau-trang-5.jpg'),
(346, 79, 'clutch-du-tiec-barrel-may-chan-bong-mau-trang-6.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `httt_product_option`
--

CREATE TABLE `httt_product_option` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(1000) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `httt_product_sale`
--

CREATE TABLE `httt_product_sale` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `price_sale` decimal(10,0) NOT NULL,
  `date_begin` datetime NOT NULL,
  `date_end` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `httt_product_sale`
--

INSERT INTO `httt_product_sale` (`id`, `product_id`, `price_sale`, `date_begin`, `date_end`) VALUES
(2, 14, '1400000', '2023-04-04 00:00:00', '2023-04-20 00:00:00'),
(3, 22, '630000', '2023-04-10 00:00:00', '2023-04-29 00:00:00'),
(4, 42, '444', '2023-04-19 00:00:00', '2023-04-27 00:00:00'),
(8, 49, '1400000', '2023-04-19 00:00:00', '2023-04-27 00:00:00'),
(10, 52, '450000', '2023-05-18 00:00:00', '2023-06-02 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `httt_product_store`
--

CREATE TABLE `httt_product_store` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `qty` int(10) UNSIGNED NOT NULL,
  `created_by` int(10) UNSIGNED NOT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `httt_product_store`
--

INSERT INTO `httt_product_store` (`id`, `product_id`, `price`, `qty`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 15, '250', 5, 1, NULL, '2023-05-23 03:01:26', NULL),
(2, 1, '250', 5, 1, NULL, '2023-03-27 08:03:54', NULL),
(3, 14, '1300000', 19, 6, 6, '2023-05-24 03:27:38', '2023-05-23 03:13:17'),
(4, 16, '750000', 15, 6, NULL, '2023-04-05 09:21:05', NULL),
(5, 17, '700000', 20, 6, NULL, '2023-04-05 09:27:12', NULL),
(6, 18, '1000000', 100, 6, NULL, '2023-05-19 09:06:31', NULL),
(7, 21, '550000', 30, 6, NULL, '2023-04-05 09:58:04', NULL),
(8, 22, '600000', 5, 6, NULL, '2023-04-11 07:45:53', NULL),
(13, 49, '250000', 34, 6, NULL, '2023-04-16 11:47:22', NULL),
(14, 79, '800000', 1, 6, 6, '2023-05-24 07:32:13', '2023-05-24 07:32:06'),
(15, 52, '400000', 99, 6, 6, '2023-05-23 15:08:14', '2023-05-19 10:41:23'),
(16, 77, '800000', 99, 6, NULL, '2023-05-23 15:08:14', NULL),
(17, 78, '800000', 100, 6, NULL, '2023-05-23 01:36:20', NULL),
(18, 76, '800000', 100, 6, NULL, '2023-05-23 01:36:01', NULL),
(19, 59, '150000', 100, 6, NULL, '2023-05-23 01:36:20', NULL),
(20, 68, '400000', 0, 6, NULL, '2023-05-24 07:32:13', NULL),
(21, 60, '300000', 100, 6, 6, '2023-05-19 10:41:23', '2023-05-19 10:41:23'),
(22, 55, '300000', 99, 6, NULL, '2023-05-23 15:08:14', NULL),
(23, 56, '400000', 100, 6, NULL, '2023-05-23 01:36:20', NULL),
(24, 58, '400000', 100, 6, NULL, '2023-05-23 01:36:01', NULL),
(25, 67, '150000', 100, 6, NULL, '2023-05-23 01:36:20', NULL),
(26, 61, '200000', 100, 6, 6, '2023-05-19 10:41:23', '2023-05-19 10:41:23'),
(27, 63, '200000', 86, 6, NULL, '2023-05-23 02:53:09', NULL),
(28, 73, '150000', 100, 6, NULL, '2023-05-23 01:36:20', NULL),
(29, 72, '50000', 100, 6, NULL, '2023-05-23 01:36:01', NULL),
(30, 66, '150000', 100, 6, NULL, '2023-05-23 01:36:20', NULL),
(31, 62, '300000', 50, 6, NULL, '2023-05-19 09:59:25', NULL),
(32, 57, '300000', 100, 6, 6, '2023-05-19 10:41:23', '2023-05-19 10:41:23'),
(33, 41, '400000', 100, 6, NULL, '2023-05-23 01:36:01', NULL),
(34, 30, '500000', 89, 6, NULL, '2023-05-26 07:25:21', NULL),
(35, 34, '400000', 99, 6, NULL, '2023-05-23 15:14:50', NULL),
(36, 40, '150000', 99, 6, NULL, '2023-05-23 15:14:50', NULL),
(37, 28, '600000', 100, 6, NULL, '2023-05-23 01:36:20', NULL),
(38, 37, '700000', 99, 6, 6, '2023-05-23 15:14:50', '2023-05-19 10:41:23'),
(39, 35, '500000', 100, 6, NULL, '2023-05-23 01:36:01', NULL),
(40, 32, '500000', 100, 6, NULL, '2023-05-23 01:36:20', NULL),
(41, 29, '500000', 100, 6, NULL, '2023-05-23 01:36:01', NULL),
(42, 27, '500000', 96, 6, NULL, '2023-05-23 03:07:07', NULL),
(43, 23, '500000', 100, 6, NULL, '2023-05-23 01:36:01', NULL),
(44, 69, '200000', 100, 6, 6, '2023-05-19 10:41:23', '2023-05-19 10:41:23'),
(45, 36, '700000', 99, 6, NULL, '2023-05-23 15:14:50', NULL),
(46, 33, '600000', 100, 6, NULL, '2023-05-23 01:36:20', NULL),
(47, 26, '500000', 100, 6, NULL, '2023-05-24 03:27:38', NULL),
(48, 75, '150000', 100, 6, 6, '2023-05-19 10:41:23', '2023-05-19 10:41:23'),
(49, 74, '200000', 100, 6, NULL, '2023-05-23 01:36:01', NULL),
(50, 54, '400000', 100, 6, NULL, '2023-05-23 01:36:20', NULL),
(51, 24, '500000', 100, 6, NULL, '2023-05-24 03:27:38', NULL),
(52, 71, '50000', 100, 6, 6, '2023-05-19 10:41:23', '2023-05-19 10:41:23'),
(53, 53, '300000', 100, 6, NULL, '2023-05-23 01:36:01', NULL),
(54, 77, '700000', 77, 6, NULL, '2023-06-02 10:44:41', NULL),
(55, 31, '800000', 0, 6, NULL, '2023-06-02 10:55:24', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `httt_product_value`
--

CREATE TABLE `httt_product_value` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `option_id` int(10) UNSIGNED NOT NULL,
  `sort_order` int(10) UNSIGNED NOT NULL,
  `value` varchar(255) NOT NULL,
  `created_by` int(10) UNSIGNED NOT NULL,
  `updated_by` int(10) UNSIGNED NOT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `httt_slider`
--

CREATE TABLE `httt_slider` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `link` varchar(1000) NOT NULL,
  `sort_order` int(10) UNSIGNED NOT NULL,
  `image` varchar(1000) NOT NULL,
  `position` varchar(255) NOT NULL,
  `created_by` int(10) UNSIGNED NOT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `httt_slider`
--

INSERT INTO `httt_slider` (`id`, `name`, `link`, `sort_order`, `image`, `position`, `created_by`, `updated_by`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Slider 1', '#', 1, 'slider_1.jpg', 'slideshow', 1, 6, 1, '2023-05-13 03:13:08', '2023-05-13 03:13:08'),
(2, 'Slider 2', '#', 1, 'slider_2.jpg', 'slideshow', 1, 6, 1, '2023-05-13 03:13:06', '2023-05-13 03:13:06'),
(3, 'Slider 3', '#', 1, 'slider_3.jpg', 'slideshow', 1, 6, 1, '2023-05-13 03:13:10', '2023-05-13 03:13:10'),
(4, 'CHIẾU TRÚC', '#', 1, 'chieu-truc.jpg', 'slideshow', 1, 6, 0, '2023-04-12 05:07:55', '2023-04-12 05:07:55'),
(5, 'Hồ Thị Thu Trang', '#', 1, '.webp', 'slideshow', 1, 1, 0, '2023-03-24 08:12:12', '2023-03-24 08:12:12'),
(6, 'Slider 4', '#', 1, 'slider-4.jpg', 'slideshow', 6, 6, 2, '2023-05-13 03:13:15', '2023-05-13 03:13:15'),
(7, 'Slider 5', '#', 1, 'slider-5.jpg', 'slideshow', 6, 6, 2, '2023-05-13 03:13:12', '2023-05-13 03:13:12');

-- --------------------------------------------------------

--
-- Table structure for table `httt_topic`
--

CREATE TABLE `httt_topic` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(1000) NOT NULL,
  `slug` varchar(1000) NOT NULL,
  `parent_id` int(10) UNSIGNED NOT NULL,
  `sort_order` int(10) UNSIGNED NOT NULL,
  `image` varchar(1000) DEFAULT NULL,
  `metakey` varchar(255) NOT NULL,
  `metadesc` varchar(255) NOT NULL,
  `created_by` int(10) UNSIGNED NOT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `httt_topic`
--

INSERT INTO `httt_topic` (`id`, `name`, `slug`, `parent_id`, `sort_order`, `image`, `metakey`, `metadesc`, `created_by`, `updated_by`, `status`, `created_at`, `updated_at`) VALUES
(7, 'Sự kiện', 'su-kien', 11, 0, 'su-kien.jpg', 'Sự kiện', 'Sự kiện', 6, NULL, 1, '2023-04-17 03:04:08', '2023-04-17 03:47:16'),
(8, 'Thông báo', 'thong-bao', 11, 0, 'thong-bao.jpg', 'Thông báo', 'Thông báo', 6, NULL, 1, '2023-04-17 03:04:47', '2023-04-17 03:39:32'),
(9, 'Tuyển dụng', 'tuyen-dung', 11, 0, 'tuyen-dung.jpg', 'Tuyển dụng', 'Tuyển dụng', 6, NULL, 1, '2023-04-17 03:35:05', '2023-04-17 03:47:01'),
(10, 'Thông cáo báo chí', 'thong-cao-bao-chi', 11, 0, 'thong-cao-bao-chi.jpg', 'Thông cáo báo chí', 'Thông cáo báo chí', 6, NULL, 1, '2023-04-17 03:37:32', '2023-04-17 03:45:32'),
(11, 'Tin tức', 'tin-tuc', 0, 0, 'tin-tuc.jpg', 'Tin tức', 'Tin tức', 6, NULL, 1, '2023-04-17 03:39:01', '2023-04-17 03:39:01');

-- --------------------------------------------------------

--
-- Table structure for table `httt_users`
--

CREATE TABLE `httt_users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `roles` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_by` int(10) UNSIGNED DEFAULT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL,
  `remember_token` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `httt_users`
--

INSERT INTO `httt_users` (`id`, `name`, `username`, `password`, `email`, `phone`, `address`, `gender`, `roles`, `image`, `created_by`, `updated_by`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(6, 'Trang Ho', 'Hồ Thị Thu Trang', '$2y$10$JRY0EgzbimQ01HZJqsFpl.0fcNruEkbOKJ4.wTirQh6c.4W/QOy8O', 'hothutrang421@gmail.com', '0975030513', '103 Tăng Nhơn Phú, phường Phước Long B', '0', '1', 'ho-thi-thu-trang.jpg', 4, 6, 1, NULL, '2023-04-02 07:56:13', '2023-04-01 02:33:01'),
(11, 'SuuSuu', 'Suu Ho', '$2y$10$sq3vTKvBJti7aq6nj4DnEO9HFzE/XCuonb4M/zvLNt0vjS7wBmdQC', 'susu@gmail.com', '0975030514', '29', '0', '1', 'suusuu.jpg', 6, NULL, 1, NULL, '2023-04-04 08:27:26', '2023-04-04 08:27:26'),
(12, 'admin', 'admin', '$2y$10$VYshv37QiQCwE3XoKPrkVuwnz9sCnR4mgT9dUsBHi9IJmo7Xd9Usm', 'admin@gmail.com', '0975123456', 'đại tín', '1', '1', 'admin.jpg', 6, NULL, 1, NULL, '2023-04-22 04:07:30', '2023-04-22 04:07:30'),
(13, 'kh1', 'kh1', '$2y$10$LC2CqKoPm6kH8ZBFoVC74u0FqQLIiYfaQLaCBo9TjstH.gIMPOV/6', 'kh1@gmail.com', '1234567891', 'kh1', '1', '2', 'kh1.jpg', 12, 6, 1, NULL, '2023-04-22 07:29:46', '2023-04-22 07:29:46'),
(14, 'Huệ Ngân', 'kh2', '$2y$10$u0y46nMcq.Bwtv7WTxMIf.v8QNogilvDfHSulsjCm5F7fvH4bY.bq', 'hothutrang397@gmail.com', '1234567890', 'đại tín, phước lộc', '0', '2', NULL, NULL, 14, 1, NULL, '2023-06-07 08:12:08', '2023-06-07 08:12:08'),
(15, 'Hồ Thị Thu Trang', 'Thu Trang', '$2y$10$TnqtGQMFB3hZuYfqZF2/o.mcL43v.uWaBy8E65Tkx7okOZqPgUJAm', 'hothutrang421@gmail.com', '0975030513', '29', '0', '2', NULL, NULL, NULL, 1, NULL, '2023-04-30 11:01:29', '2023-04-30 11:01:29'),
(16, 'Cẩm Nhung', 'Nhung', '$2y$10$ZQp55sHSiVvT/v0YpIqukOrAAPNiVPhEej4okR9.Ls7X.m6wCMjWi', 'hothutrang2929@gmail.com', '0866693943', '103 Tăng Nhơn Phú, phường Phước Long B', '0', '2', NULL, NULL, NULL, 1, NULL, '2023-05-04 10:43:20', '2023-05-04 10:43:20'),
(17, 'Hữu Thắng 123', 'Thắng 123456', '$2y$10$aRure/PcZ1hJOUo6adi1QeeA482ajmr7Z1YUfIUGVw5R95R7iuI5C', 'hothutrang1225@gmail.com', '0975030515', '109 Tăng Nhơn Phú, phường Phước Long B', '1', '2', NULL, NULL, 17, 1, NULL, '2023-05-26 08:18:52', '2023-05-26 08:18:52');

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(3, '2023_03_05_033735_create_product_table', 1),
(4, '2023_03_05_033851_create_brand_table', 1),
(5, '2023_03_05_033949_create_category_table', 1),
(6, '2023_03_05_034044_create_config_table', 1),
(7, '2023_03_05_034135_create_contact_table', 1),
(8, '2023_03_05_041012_create_link_table', 1),
(9, '2023_03_05_041132_create_menu_table', 1),
(10, '2023_03_05_041420_create_order_table', 1),
(11, '2023_03_05_041512_create_orderdetail_table', 1),
(12, '2023_03_05_041553_create_post_table', 1),
(13, '2023_03_05_041657_create_product_image_table', 1),
(14, '2023_03_05_041743_create_product_store_table', 1),
(15, '2023_03_05_042004_create_product_option_table', 1),
(16, '2023_03_05_042058_create_product_sale_table', 1),
(17, '2023_03_05_042329_create_product_value_table', 1),
(18, '2023_03_05_042541_create_slider_table', 1),
(19, '2023_03_05_042617_create_topic_table', 1);

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

--
-- Indexes for dumped tables
--

--
-- Indexes for table `httt_brand`
--
ALTER TABLE `httt_brand`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `httt_category`
--
ALTER TABLE `httt_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `httt_config`
--
ALTER TABLE `httt_config`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `httt_contact`
--
ALTER TABLE `httt_contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `httt_link`
--
ALTER TABLE `httt_link`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `httt_menu`
--
ALTER TABLE `httt_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `httt_order`
--
ALTER TABLE `httt_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `httt_orderdetail`
--
ALTER TABLE `httt_orderdetail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `httt_post`
--
ALTER TABLE `httt_post`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `httt_product`
--
ALTER TABLE `httt_product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `httt_product_image`
--
ALTER TABLE `httt_product_image`
  ADD PRIMARY KEY (`id`,`product_id`);

--
-- Indexes for table `httt_product_option`
--
ALTER TABLE `httt_product_option`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `httt_product_sale`
--
ALTER TABLE `httt_product_sale`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `httt_product_store`
--
ALTER TABLE `httt_product_store`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `httt_product_value`
--
ALTER TABLE `httt_product_value`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `httt_slider`
--
ALTER TABLE `httt_slider`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `httt_topic`
--
ALTER TABLE `httt_topic`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `httt_users`
--
ALTER TABLE `httt_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `httt_brand`
--
ALTER TABLE `httt_brand`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `httt_category`
--
ALTER TABLE `httt_category`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `httt_config`
--
ALTER TABLE `httt_config`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `httt_contact`
--
ALTER TABLE `httt_contact`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `httt_link`
--
ALTER TABLE `httt_link`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `httt_menu`
--
ALTER TABLE `httt_menu`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `httt_order`
--
ALTER TABLE `httt_order`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `httt_orderdetail`
--
ALTER TABLE `httt_orderdetail`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=114;

--
-- AUTO_INCREMENT for table `httt_post`
--
ALTER TABLE `httt_post`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `httt_product`
--
ALTER TABLE `httt_product`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT for table `httt_product_image`
--
ALTER TABLE `httt_product_image`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=347;

--
-- AUTO_INCREMENT for table `httt_product_option`
--
ALTER TABLE `httt_product_option`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `httt_product_sale`
--
ALTER TABLE `httt_product_sale`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `httt_product_store`
--
ALTER TABLE `httt_product_store`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `httt_product_value`
--
ALTER TABLE `httt_product_value`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `httt_slider`
--
ALTER TABLE `httt_slider`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `httt_topic`
--
ALTER TABLE `httt_topic`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `httt_users`
--
ALTER TABLE `httt_users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
