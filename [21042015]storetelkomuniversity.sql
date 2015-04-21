-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 21, 2015 at 04:38 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `storetelkomuniversity`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_category`
--

CREATE TABLE IF NOT EXISTS `tb_category` (
`id_category` int(11) NOT NULL,
  `category` int(11) NOT NULL,
  `id_parent` int(11) NOT NULL,
  `category_name` varchar(20) NOT NULL,
  `category_status` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_category`
--

INSERT INTO `tb_category` (`id_category`, `category`, `id_parent`, `category_name`, `category_status`, `created_at`, `updated_at`) VALUES
(6, 1, 0, 'Hardware', 1, '2015-03-14 02:54:34', '2015-03-15 03:39:09'),
(7, 2, 0, 'Others', 1, '2015-03-23 14:34:28', '2015-03-26 10:31:58'),
(12, 2, 7, 'Merchandises', 1, '2015-03-25 17:20:27', '2015-03-25 19:30:37'),
(14, 1, 15, 'Android Apps', 1, '2015-03-26 10:09:31', '2015-03-26 10:09:31'),
(15, 1, 0, 'Software', 1, '2015-04-07 11:30:52', '2015-04-07 11:30:52');

-- --------------------------------------------------------

--
-- Table structure for table `tb_comment`
--

CREATE TABLE IF NOT EXISTS `tb_comment` (
`id_comment` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `post_comment` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_konfirmasi`
--

CREATE TABLE IF NOT EXISTS `tb_konfirmasi` (
`id_konfirmasi` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nomor_transaksi` int(11) NOT NULL,
  `bankpengirim` varchar(50) NOT NULL,
  `nama_pengirim` varchar(50) NOT NULL,
  `bank_tujuan` varchar(100) NOT NULL,
  `nominal` int(11) NOT NULL,
  `file_transaksi` text,
  `status_konfirmasi` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_konfirmasi`
--

INSERT INTO `tb_konfirmasi` (`id_konfirmasi`, `id_user`, `nomor_transaksi`, `bankpengirim`, `nama_pengirim`, `bank_tujuan`, `nominal`, `file_transaksi`, `status_konfirmasi`, `created_at`, `updated_at`) VALUES
(1, 98, 0, 'Bank BNI', 'Ardhyan Zulfikar ', 'Bank BNI', 500000, NULL, 0, '2015-04-19 00:00:00', '2015-04-19 00:00:00'),
(2, 98, 2906, 'Bank BNI', 'Ardhyan Zulfikar Malik', 'Bank BNI', 250000, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tb_message`
--

CREATE TABLE IF NOT EXISTS `tb_message` (
`id_message` int(11) NOT NULL,
  `id_user_sender` int(11) NOT NULL,
  `id_user_receiver` int(11) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `message_post` text NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_message`
--

INSERT INTO `tb_message` (`id_message`, `id_user_sender`, `id_user_receiver`, `subject`, `message_post`, `created_at`, `updated_at`) VALUES
(1, 55, 71, 'asdasdasd', '<p>asaasaaasdasdada</p>\r\n', '2015-04-10 19:14:58', '2015-04-10 19:14:58'),
(2, 55, 91, 'ASDAS', '<p>asdasda</p>\r\n', '2015-04-14 16:57:26', '2015-04-14 16:57:26'),
(3, 71, 55, 'Testing', 'asdasdasdasdasdas', '2015-04-15 00:00:00', '2015-04-15 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tb_permission`
--

CREATE TABLE IF NOT EXISTS `tb_permission` (
  `role_id` int(11) NOT NULL,
  `route` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_permission`
--

INSERT INTO `tb_permission` (`role_id`, `route`) VALUES
(1, 'dashboard-administrator'),
(2, 'dashboard-moderator'),
(3, 'dashboard-contributor'),
(4, 'dashboard-guest'),
(5, 'dashboard-sales'),
(6, 'dashboard-payment');

-- --------------------------------------------------------

--
-- Table structure for table `tb_produk`
--

CREATE TABLE IF NOT EXISTS `tb_produk` (
`id_produk` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_category` int(11) NOT NULL,
  `version_available` int(11) NOT NULL,
  `produk_title` varchar(50) NOT NULL,
  `produk_type` varchar(20) NOT NULL,
  `produk_harga` int(11) NOT NULL,
  `produk_status` int(11) NOT NULL,
  `produk_downloaded` int(11) NOT NULL,
  `user_rate_total` int(11) NOT NULL,
  `produk_rate_total` decimal(10,1) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=80 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_produk`
--

INSERT INTO `tb_produk` (`id_produk`, `id_user`, `id_category`, `version_available`, `produk_title`, `produk_type`, `produk_harga`, `produk_status`, `produk_downloaded`, `user_rate_total`, `produk_rate_total`, `created_at`, `updated_at`) VALUES
(75, 89, 12, 1, 'Product 1', 'Freemium', 0, 1, 11, 3, '4.7', '2015-04-08 20:29:07', '2015-04-10 21:47:45'),
(76, 89, 7, 0, 'BPAD Aplikasi', 'Premium', 0, 0, 0, 0, '0.0', '2015-04-09 10:08:14', '2015-04-09 10:08:14'),
(77, 89, 14, 1, 'asdada', 'Freemium', 0, 0, 0, 0, '0.0', '2015-04-09 10:09:42', '2015-04-09 10:09:42'),
(78, 89, 14, 0, 'MYSQL Application', 'Premium', 25000, 1, 0, 0, '0.0', '2015-04-09 10:29:07', '2015-04-10 14:43:22'),
(79, 89, 12, 1, 'MEGA International', 'Premium', 2350000, 1, 0, 0, '0.0', '2015-04-18 16:45:53', '2015-04-18 16:45:53');

-- --------------------------------------------------------

--
-- Table structure for table `tb_produk_detail`
--

CREATE TABLE IF NOT EXISTS `tb_produk_detail` (
`id_produk_detail` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `produk_ava` text NOT NULL,
  `produk_introduction` text NOT NULL,
  `produk_file` text NOT NULL,
  `produk_link` text NOT NULL,
  `produk_version` decimal(10,2) NOT NULL,
  `produk_pict_1` text NOT NULL,
  `produk_pict_2` text NOT NULL,
  `produk_pict_3` text NOT NULL,
  `produk_pict_4` text NOT NULL,
  `produk_pict_5` text NOT NULL,
  `produk_video_youtube` text NOT NULL,
  `produk_desc` text NOT NULL,
  `available` int(11) NOT NULL,
  `produk_main` int(11) NOT NULL,
  `reversioning_by` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=58 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_produk_detail`
--

INSERT INTO `tb_produk_detail` (`id_produk_detail`, `id_produk`, `id_user`, `produk_ava`, `produk_introduction`, `produk_file`, `produk_link`, `produk_version`, `produk_pict_1`, `produk_pict_2`, `produk_pict_3`, `produk_pict_4`, `produk_pict_5`, `produk_video_youtube`, `produk_desc`, `available`, `produk_main`, `reversioning_by`, `created_at`, `updated_at`) VALUES
(54, 75, 89, 'http://dev.store.ac.id/uploads/products/freemium/75/Product 1_icon.jpeg', 'Product 1', 'http://dev.store.ac.id/uploads/products/freemium/75/1.png', '1428499747f3b6f972f6b17b87a79a0386b70895c3YaTkl8QMoMHehgCctwb9qJskyCjN1DJaVBL8tFC5sVOLwdiyftZfkDfywFmw', '1.00', 'http://dev.store.ac.id/uploads/products/freemium/75/1.png', 'http://dev.store.ac.id/uploads/products/freemium/75/2.png', 'http://dev.store.ac.id/uploads/products/freemium/75/3.png', 'http://dev.store.ac.id/uploads/products/freemium/75/4.png', 'http://dev.store.ac.id/uploads/products/freemium/75/5.png', '', '<p>Product 1 descriptions goes here</p>\r\n', 1, 1, 0, '2015-04-08 20:29:07', '2015-04-08 23:09:16'),
(55, 77, 89, 'http://dev.store.ac.id/uploads/products/freemium/77/asdada_icon.jpeg', 'asdadasda', 'http://dev.store.ac.id/uploads/products/freemium/77/tb_transaksi.PNG', '142854898298c6c14acce440c6ab3058d2970d5a0f8IoEYn1OQj2WgqzHy0glwrGbSZpXZHf2W9MpjAfBz8jZWadmwTcY0qKppjiT', '1.00', 'http://dev.store.ac.id/uploads/products/freemium/77/1.PNG', 'http://dev.store.ac.id/uploads/products/freemium/77/2.PNG', '', '', '', '', '<p>adsasdas asdas as das dasda&nbsp;</p>\r\n', 0, 2, 0, '2015-04-09 10:09:43', '2015-04-09 10:09:43'),
(56, 78, 89, 'http://dev.store.ac.id/uploads/products/premium/78/MYSQL Application_icon.jpeg', 'asdadsasd', 'http://dev.store.ac.id/uploads/products/premium/78/tb_transaksi.PNG', '14285501478edd61c59ada5eedf1a743bf88797e18UJqSwOsr5NBsox1zzgFnrsQ133bMduVnVSpAgdRkuCCfzBRNTWVUmnwzciHz', '1.00', 'http://dev.store.ac.id/uploads/products/premium/78/1.PNG', 'http://dev.store.ac.id/uploads/products/premium/78/2.PNG', '', '', '', '', '<p>asdasdasdasdas dasd asd asd a</p>\r\n', 1, 1, 0, '2015-04-09 10:29:07', '2015-04-10 14:43:22'),
(57, 79, 89, 'http://dev.store.ac.id/uploads/products/premium/79/MEGA International_icon.jpeg', 'This is software about modelling business process', 'http://dev.store.ac.id/uploads/products/premium/79/03-MEGAUniversity2013-03-30.rar', '1429350353b55ddf1fea212e25646a47ed48d17e571TWUchc8Mo5DsEjjIAgiSQ2RMUYfTPeJfRRQwBcZYwDyNv9lTlZfYsDqYNrf', '1.00', 'http://dev.store.ac.id/uploads/products/premium/79/1.png', 'http://dev.store.ac.id/uploads/products/premium/79/2.PNG', '', '', '', '', '<p>MEGA is software from France about modelling business process</p>\r\n', 1, 1, 0, '2015-04-18 16:45:53', '2015-04-18 16:45:53');

-- --------------------------------------------------------

--
-- Table structure for table `tb_rate`
--

CREATE TABLE IF NOT EXISTS `tb_rate` (
`id_rate` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `review_title` varchar(50) NOT NULL,
  `review_post` text NOT NULL,
  `user_rate` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_rate`
--

INSERT INTO `tb_rate` (`id_rate`, `id_user`, `id_produk`, `review_title`, `review_post`, `user_rate`, `created_at`, `updated_at`) VALUES
(38, 89, 75, 'Test Title 1', 'Test Desc 1', 5, '2015-04-08 23:38:09', '2015-04-08 23:38:09'),
(39, 71, 75, 'Test Title 2', 'Test Desc 2', 4, '2015-04-08 23:40:42', '2015-04-10 14:54:24'),
(40, 97, 75, 'asdasd', 'Joss', 5, '2015-04-10 21:47:45', '2015-04-10 21:47:45');

-- --------------------------------------------------------

--
-- Table structure for table `tb_reversioning`
--

CREATE TABLE IF NOT EXISTS `tb_reversioning` (
`id_reversioning` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `id_user_owner` int(11) NOT NULL,
  `id_user_offer` int(11) NOT NULL,
  `category_owner` varchar(20) NOT NULL,
  `produk_title` varchar(50) NOT NULL,
  `produk_type` varchar(20) NOT NULL,
  `reversioning_produk_status` int(11) NOT NULL,
  `produk_ava` text NOT NULL,
  `produk_introduction` text NOT NULL,
  `produk_file` text NOT NULL,
  `produk_link` varchar(60) NOT NULL,
  `produk_version` decimal(10,0) NOT NULL,
  `produk_pict_1` text NOT NULL,
  `produk_pict_2` text NOT NULL,
  `produk_pict_3` text,
  `produk_pict_4` text,
  `produk_pict_5` text,
  `produk_video_youtube` text,
  `produk_desc` text NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_transaksi`
--

CREATE TABLE IF NOT EXISTS `tb_transaksi` (
`id_transaksi` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `total_harga` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `status` int(11) NOT NULL,
  `nomortransaksi` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_transaksi`
--

INSERT INTO `tb_transaksi` (`id_transaksi`, `id_user`, `id_produk`, `quantity`, `total_harga`, `alamat`, `status`, `nomortransaksi`, `created_at`, `updated_at`) VALUES
(1, 71, 76, 1, '5000', 'Bandung', 5, 0, '2015-04-12 00:00:00', '2015-04-19 17:47:00'),
(3, 98, 79, 1, '2350000', '', 0, 0, '2015-04-18 17:21:38', '2015-04-18 17:21:38'),
(4, 98, 79, 1, '2350000', '', 0, 9080, '2015-04-18 21:04:39', '2015-04-18 21:04:39'),
(5, 98, 78, 1, '25000', '', 3, 3073, '2015-04-18 21:04:39', '2015-04-18 21:04:39'),
(6, 98, 78, 1, '25000', '', 0, 0, '2015-04-18 21:22:20', '2015-04-18 21:22:20'),
(7, 98, 79, 2, '4700000', '', 0, 0, '2015-04-19 22:36:14', '2015-04-19 22:36:14'),
(10, 98, 79, 1, '2350000', '', 0, 2906, '2015-04-19 22:41:51', '2015-04-19 22:41:51'),
(11, 98, 78, 1, '25000', '', 0, 2906, '2015-04-19 22:41:51', '2015-04-19 22:41:51');

-- --------------------------------------------------------

--
-- Table structure for table `tb_users`
--

CREATE TABLE IF NOT EXISTS `tb_users` (
`id_user` int(11) NOT NULL,
  `id_contributor` varchar(20) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(60) NOT NULL,
  `password_temp` varchar(60) NOT NULL,
  `user_photo` varchar(255) NOT NULL,
  `user_phone` varchar(20) NOT NULL,
  `user_address` text NOT NULL,
  `code` varchar(60) NOT NULL,
  `role_id` int(11) NOT NULL,
  `status_user` int(11) NOT NULL,
  `remember_token` varchar(100) NOT NULL,
  `user_introduction` text NOT NULL,
  `facebook_link` varchar(255) NOT NULL,
  `twitter_link` varchar(255) NOT NULL,
  `google_link` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=100 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_users`
--

INSERT INTO `tb_users` (`id_user`, `id_contributor`, `name`, `email`, `username`, `password`, `password_temp`, `user_photo`, `user_phone`, `user_address`, `code`, `role_id`, `status_user`, `remember_token`, `user_introduction`, `facebook_link`, `twitter_link`, `google_link`, `created_at`, `updated_at`) VALUES
(55, '', 'Administrator', 'telkomuniversitystore@gmail.com', 'administrator1', '$2y$10$wY1vlAAg/PPdkPogWcayOe0MXyKwlms.WJ8bN9UHqEo8F0NWWT9ZW', '', 'http://dev.store.ac.id/assets/user_profpic/55.jpeg', '085224622336', 'Address goes here 1234', '', 1, 1, 'i0P7BmL5sJRLCyVsxSla0yraesRewfx7MEAAeFPOkI2CvIfhkr6kxTGpVWYQ', 'Hey I am and administrator of Telkom University Store', 'https://www.facebook.com/yusuf.rahmadi', 'test', '', '2015-03-11 04:36:03', '2015-04-19 18:11:52'),
(71, '', 'Moderator1', 'telustoremod@gmail.com', 'moderator1', '$2y$10$J2pLDaoQbSkLas0kM8qHHekNePBB3TVb.2PBmI1BqERjJzu5Ca0Bq', '', 'http://dev.store.ac.id/assets/user_profpic/71.jpeg', '085224622336', 'address goes here', '', 2, 1, 'nPHg291uSy6pANvSUi1q3f5CrUjofyNtrQ8lvbj0YYDeuZe0BKEpm9ldgQGW', 'introduction speech', 'moderatorlinks', 'twitterlinks', 'googlelinks', '2015-03-13 02:03:50', '2015-04-15 10:42:12'),
(89, '1106110000', 'Contributor', 'telustorecontr@gmail.com', 'contributor', '$2y$10$rsqt7XhGCkzqz6oeR2srSeyWRjdbDk3L69/UAhWfyiggFpcO4NvOC', '', 'http://dev.store.ac.id/assets/user_profpic/89.jpeg', '', '', '', 3, 1, 'ZBvqBO0Msve8KMiVQ35Yb2rOqi6X5GTieUJBtb0oN45cwRJGTArLFpdUUfcH', '', '', '', '', '2015-03-18 13:11:21', '2015-04-19 17:48:48'),
(91, '', 'telustoresales', 'telustoresales@gmail.com', 'telustoresales', '$2y$10$9LgSD2lmSAYm0lgYJjS/h.IXzBk.RUuPBBSZI7UX3a/aBlyCCCZ66', '', 'http://dev.store.ac.id/assets/user_profpic/91.jpeg', '123456789', 'Sales Address', '', 5, 1, 'Hoqx91BlyCruCxA3QpeNFCmTec6F9tql81wTVo05ulEtEL9KI8gth2SGLjuH', 'Sales intro', 'facebooklink', 'twitterlink', 'googlelink', '2015-03-22 19:11:51', '2015-04-19 23:40:06'),
(92, '', 'telustorepay', 'telustorepay@gmail.com', 'telustorepay', '$2y$10$zuGSFly0SbAMRV6I/HlXBuvCtrwZguHX7wC65ppU2vRRJyuWiJSvC', '', 'http://dev.store.ac.id/assets/user_profpic/92.jpeg', '1234567890', 'Payment address', '', 6, 1, 'GI2LYI2ZdTxEbnYr7lmRUYQfbcNlNDzHozW6sY4MWAuSgtu1jAqlaWgQDzeq', 'Payment Intro', 'facebooklink', 'twitterlink', 'googlelink', '2015-03-22 19:12:19', '2015-04-19 17:59:40'),
(96, '', 'Yusuf Rahmadi', 'yusufrahmadi.id@gmail.com', '', '', '', 'https://lh4.googleusercontent.com/-ISxjh07mcs4/AAAAAAAAAAI/AAAAAAAAAC0/eHSVkHXztaI/photo.jpg?sz=200', '', '', '', 4, 1, 'sYnMtPe9XFR5rzTd3sR6XmUReVGY8DxX3taxRUqjs0zG7e9D0oB7YMRqSgzh', '', '', '', 'https://plus.google.com/+YusufRahmadi', '2015-04-07 01:11:59', '2015-04-08 12:18:41'),
(97, '', 'Ardhyan Zulfikar Malik', 'ardhyan@windowslive.com', '', '', '', 'https://graph.facebook.com/10204303281565644/picture?width=150&height=150', '', '', '', 4, 1, '1vIUxZDub4TndGbPFOgBBFxS1C8wmyTPuAtCbnpYdHirWFeIFJS8LBpFtI0u', '', 'https://www.facebook.com/app_scoped_user_id/10204303281565644/', '', '', '2015-04-10 21:38:31', '2015-04-10 23:26:14'),
(98, '', 'Ardhyan Malik', 'ardhyanzm@gmail.com', '', '', '', 'https://lh3.googleusercontent.com/-XdUIqdMkCWA/AAAAAAAAAAI/AAAAAAAAAAA/4252rscbv5M/photo.jpg?sz=200', '', '', '', 4, 1, 'Cxmwep0TLorJvhLIYoSqsuIGFdRxqWk6E2IsBELF8076IzehtxZ63UJkRyMM', '', '', '', 'https://plus.google.com/117505732564056827297', '2015-04-12 21:41:06', '2015-04-21 15:12:34'),
(99, '', 'Tugas BPAD', 'tugasbpad@gmail.com', '', '', '', 'https://lh3.googleusercontent.com/-XdUIqdMkCWA/AAAAAAAAAAI/AAAAAAAAAAA/4252rscbv5M/photo.jpg?sz=200', '', '', '', 4, 1, 'Xm6p4nUL0WONJoLvY5SknE5OTFvjx02SrVtbFXpYS8Krbtzdd4G0us5BE615', '', '', '', '', '2015-04-19 13:50:44', '2015-04-19 13:50:55');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_category`
--
ALTER TABLE `tb_category`
 ADD PRIMARY KEY (`id_category`), ADD KEY `id_category` (`id_category`);

--
-- Indexes for table `tb_comment`
--
ALTER TABLE `tb_comment`
 ADD PRIMARY KEY (`id_comment`), ADD KEY `id_produk` (`id_produk`);

--
-- Indexes for table `tb_konfirmasi`
--
ALTER TABLE `tb_konfirmasi`
 ADD PRIMARY KEY (`id_konfirmasi`), ADD UNIQUE KEY `nomortransaksi` (`nomor_transaksi`), ADD KEY `id_user` (`id_user`), ADD KEY `id_user_2` (`id_user`);

--
-- Indexes for table `tb_message`
--
ALTER TABLE `tb_message`
 ADD PRIMARY KEY (`id_message`), ADD KEY `id_user_sender` (`id_user_sender`);

--
-- Indexes for table `tb_permission`
--
ALTER TABLE `tb_permission`
 ADD PRIMARY KEY (`role_id`), ADD KEY `role_id` (`role_id`), ADD KEY `role_id_2` (`role_id`);

--
-- Indexes for table `tb_produk`
--
ALTER TABLE `tb_produk`
 ADD PRIMARY KEY (`id_produk`), ADD KEY `id_user` (`id_user`), ADD KEY `category_name` (`id_category`), ADD KEY `id_produk` (`id_produk`);

--
-- Indexes for table `tb_produk_detail`
--
ALTER TABLE `tb_produk_detail`
 ADD PRIMARY KEY (`id_produk_detail`), ADD KEY `id_produk_detail` (`id_produk_detail`), ADD KEY `id_produk` (`id_produk`), ADD KEY `id_produk_2` (`id_produk`);

--
-- Indexes for table `tb_rate`
--
ALTER TABLE `tb_rate`
 ADD PRIMARY KEY (`id_rate`), ADD KEY `id_user` (`id_user`), ADD KEY `id_produk` (`id_produk`);

--
-- Indexes for table `tb_reversioning`
--
ALTER TABLE `tb_reversioning`
 ADD PRIMARY KEY (`id_reversioning`), ADD KEY `id_produk` (`id_produk`);

--
-- Indexes for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
 ADD PRIMARY KEY (`id_transaksi`), ADD KEY `id_user` (`id_user`), ADD KEY `id_produk` (`id_produk`), ADD KEY `nomortransaksi` (`nomortransaksi`), ADD KEY `nomortransaksi_2` (`nomortransaksi`);

--
-- Indexes for table `tb_users`
--
ALTER TABLE `tb_users`
 ADD PRIMARY KEY (`id_user`), ADD KEY `id_user` (`id_user`), ADD KEY `role_id` (`role_id`), ADD KEY `role_id_2` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_category`
--
ALTER TABLE `tb_category`
MODIFY `id_category` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `tb_comment`
--
ALTER TABLE `tb_comment`
MODIFY `id_comment` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tb_konfirmasi`
--
ALTER TABLE `tb_konfirmasi`
MODIFY `id_konfirmasi` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tb_message`
--
ALTER TABLE `tb_message`
MODIFY `id_message` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tb_produk`
--
ALTER TABLE `tb_produk`
MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=80;
--
-- AUTO_INCREMENT for table `tb_produk_detail`
--
ALTER TABLE `tb_produk_detail`
MODIFY `id_produk_detail` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=58;
--
-- AUTO_INCREMENT for table `tb_rate`
--
ALTER TABLE `tb_rate`
MODIFY `id_rate` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT for table `tb_reversioning`
--
ALTER TABLE `tb_reversioning`
MODIFY `id_reversioning` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `tb_users`
--
ALTER TABLE `tb_users`
MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=100;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_comment`
--
ALTER TABLE `tb_comment`
ADD CONSTRAINT `tb_comment_ibfk_1` FOREIGN KEY (`id_produk`) REFERENCES `tb_produk` (`id_produk`);

--
-- Constraints for table `tb_konfirmasi`
--
ALTER TABLE `tb_konfirmasi`
ADD CONSTRAINT `tb_konfirmasi_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tb_users` (`id_user`);

--
-- Constraints for table `tb_message`
--
ALTER TABLE `tb_message`
ADD CONSTRAINT `tb_message_ibfk_1` FOREIGN KEY (`id_user_sender`) REFERENCES `tb_users` (`id_user`);

--
-- Constraints for table `tb_produk`
--
ALTER TABLE `tb_produk`
ADD CONSTRAINT `tb_produk_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tb_users` (`id_user`),
ADD CONSTRAINT `tb_produk_ibfk_2` FOREIGN KEY (`id_category`) REFERENCES `tb_category` (`id_category`);

--
-- Constraints for table `tb_produk_detail`
--
ALTER TABLE `tb_produk_detail`
ADD CONSTRAINT `tb_produk_detail_ibfk_1` FOREIGN KEY (`id_produk`) REFERENCES `tb_produk` (`id_produk`);

--
-- Constraints for table `tb_rate`
--
ALTER TABLE `tb_rate`
ADD CONSTRAINT `tb_rate_ibfk_1` FOREIGN KEY (`id_produk`) REFERENCES `tb_produk` (`id_produk`);

--
-- Constraints for table `tb_reversioning`
--
ALTER TABLE `tb_reversioning`
ADD CONSTRAINT `tb_reversioning_ibfk_1` FOREIGN KEY (`id_produk`) REFERENCES `tb_produk` (`id_produk`);

--
-- Constraints for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
ADD CONSTRAINT `tb_transaksi_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tb_users` (`id_user`),
ADD CONSTRAINT `tb_transaksi_ibfk_2` FOREIGN KEY (`id_produk`) REFERENCES `tb_produk` (`id_produk`);

--
-- Constraints for table `tb_users`
--
ALTER TABLE `tb_users`
ADD CONSTRAINT `tb_users_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `tb_permission` (`role_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
