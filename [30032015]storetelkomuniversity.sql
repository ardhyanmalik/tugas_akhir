-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 30, 2015 at 06:57 PM
-- Server version: 5.6.16
-- PHP Version: 5.5.9

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
  `id_category` int(11) NOT NULL AUTO_INCREMENT,
  `category` int(11) NOT NULL,
  `id_parent` int(11) NOT NULL,
  `category_name` varchar(20) NOT NULL,
  `category_status` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id_category`),
  KEY `id_category` (`id_category`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `tb_category`
--

INSERT INTO `tb_category` (`id_category`, `category`, `id_parent`, `category_name`, `category_status`, `created_at`, `updated_at`) VALUES
(4, 1, 0, 'Software', 1, '2015-03-14 02:22:17', '2015-03-26 10:39:22'),
(6, 1, 0, 'Hardware', 1, '2015-03-14 02:54:34', '2015-03-15 03:39:09'),
(7, 2, 0, 'Others', 1, '2015-03-23 14:34:28', '2015-03-26 10:31:58'),
(12, 2, 7, 'Merchandises', 1, '2015-03-25 17:20:27', '2015-03-25 19:30:37'),
(14, 1, 4, 'Android Apps', 1, '2015-03-26 10:09:31', '2015-03-26 10:09:31');

-- --------------------------------------------------------

--
-- Table structure for table `tb_comment`
--

CREATE TABLE IF NOT EXISTS `tb_comment` (
  `id_comment` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `post_comment` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id_comment`),
  KEY `id_produk` (`id_produk`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tb_konfirmasi`
--

CREATE TABLE IF NOT EXISTS `tb_konfirmasi` (
  `id_transaksi` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `bankpengirim` varchar(50) NOT NULL,
  `nomor_rekening` int(11) NOT NULL,
  `bank_tujuan` int(11) NOT NULL,
  `nominal` int(11) NOT NULL,
  `file_transaksi` text,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id_transaksi`),
  KEY `id_user` (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tb_message`
--

CREATE TABLE IF NOT EXISTS `tb_message` (
  `id_message` int(11) NOT NULL AUTO_INCREMENT,
  `id_user_sender` int(11) NOT NULL,
  `id_user_receiver` int(11) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `message_post` text NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id_message`),
  KEY `id_user_sender` (`id_user_sender`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tb_permission`
--

CREATE TABLE IF NOT EXISTS `tb_permission` (
  `role_id` int(11) NOT NULL,
  `route` varchar(50) NOT NULL,
  PRIMARY KEY (`role_id`),
  KEY `role_id` (`role_id`),
  KEY `role_id_2` (`role_id`)
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
  `id_produk` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `id_category` int(11) NOT NULL,
  `produk_title` varchar(50) NOT NULL,
  `produk_type` varchar(20) NOT NULL,
  `produk_harga` int(11) NOT NULL,
  `produk_status` int(11) NOT NULL,
  `produk_ava` text NOT NULL,
  `produk_introduction` text NOT NULL,
  `produk_file` text NOT NULL,
  `produk_link` text NOT NULL,
  `produk_version` decimal(10,10) NOT NULL,
  `produk_pict_1` text NOT NULL,
  `produk_pict_2` text NOT NULL,
  `produk_pict_3` text NOT NULL,
  `produk_pict_4` text NOT NULL,
  `produk_pict_5` text NOT NULL,
  `produk_video_youtube` text NOT NULL,
  `produk_desc` text NOT NULL,
  `produk_downloaded` int(11) NOT NULL,
  `user_rate_total` int(11) NOT NULL,
  `produk_rate_total` decimal(10,1) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id_produk`),
  KEY `id_user` (`id_user`),
  KEY `category_name` (`id_category`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `tb_produk`
--

INSERT INTO `tb_produk` (`id_produk`, `id_user`, `id_category`, `produk_title`, `produk_type`, `produk_harga`, `produk_status`, `produk_ava`, `produk_introduction`, `produk_file`, `produk_link`, `produk_version`, `produk_pict_1`, `produk_pict_2`, `produk_pict_3`, `produk_pict_4`, `produk_pict_5`, `produk_video_youtube`, `produk_desc`, `produk_downloaded`, `user_rate_total`, `produk_rate_total`, `created_at`, `updated_at`) VALUES
(16, 89, 6, 'CobaFreemium', 'Freemium', 0, 1, 'http://dev.store.ac.id/uploads/products/freemium/16/CobaFreemium_ava.jpeg', 'Ini perkenalan CobaFreemium', 'http://dev.store.ac.id/uploads/products/freemium/16/modal-gallery.zip', '1427020782df78e673f56ca00767a29c48a244a28d3ij77OhMbocmImeZdU64t8wirs0URIY8IL1KpbnasmdYBvTZxi2KcdEEXLo7', '0.9999999999', 'http://dev.store.ac.id/uploads/products/freemium/16/1.png', 'http://dev.store.ac.id/uploads/products/freemium/16/2.png', 'http://dev.store.ac.id/uploads/products/freemium/16/3.png', 'http://dev.store.ac.id/uploads/products/freemium/16/4.png', 'http://dev.store.ac.id/uploads/products/freemium/16/5.png', '', '<p>Ini deskripsi produk</p>\r\n', 0, 0, '0.0', '2015-03-22 17:39:42', '2015-03-23 22:57:44'),
(17, 89, 7, 'ProductKursi', 'Freemium', 0, 1, 'http://dev.store.ac.id/uploads/products/freemium/17/ProductKursi_icon.jpeg', 'Kursi hooho', 'http://dev.store.ac.id/uploads/products/freemium/17/20150323_142725.jpg', '14270963864715c2a8b58dfe1e224103c54ceadb34KkCxyXYeKRhGK5WW9KoTugQ8gslnL7hmcbGInnI5vqvV5dcSOUmHOgoXvXVB', '0.9999999999', 'http://dev.store.ac.id/uploads/products/freemium/17/1.jpg', 'http://dev.store.ac.id/uploads/products/freemium/17/2.jpg', 'http://dev.store.ac.id/uploads/products/freemium/17/3.jpg', 'http://dev.store.ac.id/uploads/products/freemium/17/4.jpg', '', 'http://www.youtube.com/embed/zpUbAODTddM?rel=0', '<p>Ini deskripsi hohoho</p>\r\n', 0, 0, '0.0', '2015-03-23 14:39:46', '2015-03-23 22:49:11'),
(18, 89, 12, 'Telkom University Bag', 'Freemium', 0, 1, 'http://dev.store.ac.id/uploads/products/freemium/18/Telkom University Bag_icon.jpeg', 'Official Telkom University Bag', 'http://dev.store.ac.id/uploads/products/freemium/18/20150323_142805.jpg', '1427617793a853b087ff1afcdd686ef101e1756a3eoaAZKHPXVuOeK97uFXUuXotWo1KIS0x6SxZE036ZFVP5kibdT2uJl3id3tmB', '0.9999999999', 'http://dev.store.ac.id/uploads/products/freemium/18/1.jpg', 'http://dev.store.ac.id/uploads/products/freemium/18/2.jpg', '', '', '', '', '&lt;p&gt;This is official bag merchendise of Telkom University, there are only two available colors red and dark blue&lt;/p&gt;\n', 0, 0, '0.0', '2015-03-29 15:29:54', '2015-03-29 15:30:40'),
(19, 89, 12, 'Telkom University T-Shirt', 'Freemium', 0, 1, 'http://dev.store.ac.id/uploads/products/freemium/19/Telkom University T-Shirt_icon.jpeg', 'Official T-Shirt of Telkom Univeristy', 'http://dev.store.ac.id/uploads/products/freemium/19/20150323_142818.jpg', '14276181402d2809aaf7c6d2f54ae291baf013c5ffJYNF8lxp6mlfJg29Pyi19IRzrQ1uRA3pV3DpdS1IyXz0qb0pFxhtsuMOSKKS', '0.9999999999', 'http://dev.store.ac.id/uploads/products/freemium/19/1.jpg', 'http://dev.store.ac.id/uploads/products/freemium/19/2.jpg', '', '', '', '', '&lt;p&gt;Official Telkom University T-Shirt&lt;/p&gt;\r\n', 0, 0, '0.0', '2015-03-29 15:35:40', '2015-03-29 15:36:18'),
(20, 89, 12, 'Telkom University Bag', 'Freemium', 0, 1, 'http://dev.store.ac.id/uploads/products/freemium/20/Telkom University Bag_icon.jpeg', 'Telkom University Small Bag', 'http://dev.store.ac.id/uploads/products/freemium/20/20150323_142748.jpg', '1427618284a853b087ff1afcdd686ef101e1756a3eS7NL7yRkw1XLP1IbLm9fv9qCOQBZrPiMC2lzbuYLZdwpCsPSy19vIQkGDpLz', '0.9999999999', 'http://dev.store.ac.id/uploads/products/freemium/20/1.jpg', 'http://dev.store.ac.id/uploads/products/freemium/20/2.jpg', 'http://dev.store.ac.id/uploads/products/freemium/20/3.jpg', '', '', '', '&lt;p&gt;Telkom University Small Bag&lt;/p&gt;\r\n', 0, 0, '0.0', '2015-03-29 15:38:04', '2015-03-29 15:38:14'),
(21, 89, 12, 'Purin Panda Sticker', 'Freemium', 0, 1, 'http://dev.store.ac.id/uploads/products/freemium/21/Purin Panda Sticker_icon.jpeg', 'Purin Panda Sticker', 'http://dev.store.ac.id/uploads/products/freemium/21/hihi.PNG', '1427618444921b4df8b9922f91566aa141efdafe7chn83yo2i5FXi5f8LZ5kT6VNLsEG6MG2zJpJAz73jNnN77GHaAMhUp5GCtyEN', '0.9999999999', 'http://dev.store.ac.id/uploads/products/freemium/21/1.PNG', 'http://dev.store.ac.id/uploads/products/freemium/21/2.png', '', '', '', '', '&lt;p&gt;Purin Panda Sticker&lt;/p&gt;\r\n', 4, 4, '3.8', '2015-03-29 15:40:44', '2015-03-30 23:49:36');

-- --------------------------------------------------------

--
-- Table structure for table `tb_rate`
--

CREATE TABLE IF NOT EXISTS `tb_rate` (
  `id_rate` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `review_title` varchar(50) NOT NULL,
  `review_post` text NOT NULL,
  `user_rate` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id_rate`),
  KEY `id_user` (`id_user`),
  KEY `id_produk` (`id_produk`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Dumping data for table `tb_rate`
--

INSERT INTO `tb_rate` (`id_rate`, `id_user`, `id_produk`, `review_title`, `review_post`, `user_rate`, `created_at`, `updated_at`) VALUES
(23, 91, 21, '5 star', '5 star', 5, '2015-03-30 22:43:30', '2015-03-30 22:43:30'),
(24, 91, 21, '4 star', '4 star', 4, '2015-03-30 22:43:46', '2015-03-30 22:43:46'),
(25, 91, 21, '1 star', '1 star', 1, '2015-03-30 22:44:19', '2015-03-30 22:44:19'),
(26, 91, 21, '5 star', '5 star', 5, '2015-03-30 23:01:44', '2015-03-30 23:01:44');

-- --------------------------------------------------------

--
-- Table structure for table `tb_reversioning`
--

CREATE TABLE IF NOT EXISTS `tb_reversioning` (
  `id_reversioning` int(11) NOT NULL AUTO_INCREMENT,
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
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id_reversioning`),
  KEY `id_produk` (`id_produk`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tb_users`
--

CREATE TABLE IF NOT EXISTS `tb_users` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
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
  `updated_At` datetime NOT NULL,
  PRIMARY KEY (`id_user`),
  KEY `id_user` (`id_user`),
  KEY `role_id` (`role_id`),
  KEY `role_id_2` (`role_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=95 ;

--
-- Dumping data for table `tb_users`
--

INSERT INTO `tb_users` (`id_user`, `id_contributor`, `name`, `email`, `username`, `password`, `password_temp`, `user_photo`, `user_phone`, `user_address`, `code`, `role_id`, `status_user`, `remember_token`, `user_introduction`, `facebook_link`, `twitter_link`, `google_link`, `created_at`, `updated_At`) VALUES
(55, '', 'Administrator', 'telkomuniversitystore@gmail.com', 'administrator1', '$2y$10$wY1vlAAg/PPdkPogWcayOe0MXyKwlms.WJ8bN9UHqEo8F0NWWT9ZW', '', 'http://dev.store.ac.id/assets/user_profpic/55.jpeg', '085224622336', 'Address goes here 1234', '', 1, 1, 'BWU1qWZYZS71XjEXaLjSnQopWtC1gUdsAIBH9VV73PpkBU7m728N4Ua9F7OP', 'Hey I am and administrator of Telkom University Store', 'https://www.facebook.com/yusuf.rahmadi', 'test', '', '2015-03-11 04:36:03', '2015-03-30 21:26:08'),
(71, '', 'Moderator1', 'telustoremod@gmail.com', 'moderator1', '$2y$10$J2pLDaoQbSkLas0kM8qHHekNePBB3TVb.2PBmI1BqERjJzu5Ca0Bq', '', 'http://dev.store.ac.id/assets/user_profpic/71.jpeg', '085224622336', 'address goes here', '', 2, 1, '7PNrBhnTuqIMqWav8SP1nJhezJ8jZYSuBAzbNq7JuVe3ivEWPbUA0E0GygN8', 'introduction speech', 'moderatorlinks', 'twitterlinks', 'googlelinks', '2015-03-13 02:03:50', '2015-03-30 20:59:46'),
(89, '1106110000', 'Contributor', 'telustorecontr@gmail.com', 'contributor', '$2y$10$rsqt7XhGCkzqz6oeR2srSeyWRjdbDk3L69/UAhWfyiggFpcO4NvOC', '', 'http://dev.store.ac.id/assets/user_profpic/89.jpeg', '', '', '', 3, 1, 'wruH3EutWuGLPVxrvOLxEqH5L9QCmeNTgYqVX70k7dvYvMNwGAbRm93gRQXS', '', '', '', '', '2015-03-18 13:11:21', '2015-03-30 21:05:41'),
(91, '', 'telustoresales', 'telustoresales@gmail.com', 'telustoresales', '$2y$10$9LgSD2lmSAYm0lgYJjS/h.IXzBk.RUuPBBSZI7UX3a/aBlyCCCZ66', '', 'http://dev.store.ac.id/assets/user_profpic/91.jpeg', '123456789', 'Sales Address', '', 5, 1, 'o16W8JVhDBsLe2M1fwRr0Fefv7URCBN1B7w1S1WhYEkGY7FxmvDA9pm73Hzb', 'Sales intro', 'facebooklink', 'twitterlink', 'googlelink', '2015-03-22 19:11:51', '2015-03-22 19:37:25'),
(92, '', 'telustorepay', 'telustorepay@gmail.com', 'telustorepay', '$2y$10$zuGSFly0SbAMRV6I/HlXBuvCtrwZguHX7wC65ppU2vRRJyuWiJSvC', '', 'http://dev.store.ac.id/assets/user_profpic/92.jpeg', '1234567890', 'Payment address', '', 6, 1, 'DLzSJSVC7eqUy1Q4pHMPOi98ClxyclAGORCVhDy90X22HBOyFyduACxW8Ys1', 'Payment Intro', 'facebooklink', 'twitterlink', 'googlelink', '2015-03-22 19:12:19', '2015-03-22 19:51:44'),
(94, '', 'YUSUF RAHMADI', 'yusufrahmadi.id@gmail.com', 'rahmadimaru', '$2y$10$EHnjHEJ2.sCqpHPD.bOrte2lK/hT25ALQfaIeocDb2UcknPFChYdy', '', '', '', '', '', 4, 1, '', '', '', '', '', '2015-03-27 11:07:40', '2015-03-27 11:08:19');

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
-- Constraints for table `tb_users`
--
ALTER TABLE `tb_users`
  ADD CONSTRAINT `tb_users_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `tb_permission` (`role_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
