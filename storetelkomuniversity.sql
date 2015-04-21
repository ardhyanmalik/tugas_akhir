-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 08, 2015 at 06:45 PM
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

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
  `id_konfrimasi` int(11) NOT NULL AUTO_INCREMENT,
  `id_transaksi` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `bankpengirim` varchar(50) NOT NULL,
  `nomor_rekening` int(11) NOT NULL,
  `bank_tujuan` int(11) NOT NULL,
  `nominal` int(11) NOT NULL,
  `file_transaksi` text,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id_konfrimasi`),
  KEY `id_user` (`id_user`),
  KEY `id_transaksi` (`id_transaksi`),
  KEY `id_user_2` (`id_user`)
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
  `version_available` int(11) NOT NULL,
  `produk_title` varchar(50) NOT NULL,
  `produk_type` varchar(20) NOT NULL,
  `produk_harga` int(11) NOT NULL,
  `produk_status` int(11) NOT NULL,
  `produk_downloaded` int(11) NOT NULL,
  `user_rate_total` int(11) NOT NULL,
  `produk_rate_total` decimal(10,1) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id_produk`),
  KEY `id_user` (`id_user`),
  KEY `category_name` (`id_category`),
  KEY `id_produk` (`id_produk`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=76 ;

--
-- Dumping data for table `tb_produk`
--

INSERT INTO `tb_produk` (`id_produk`, `id_user`, `id_category`, `version_available`, `produk_title`, `produk_type`, `produk_harga`, `produk_status`, `produk_downloaded`, `user_rate_total`, `produk_rate_total`, `created_at`, `updated_at`) VALUES
(75, 89, 12, 1, 'Product 1', 'Freemium', 0, 1, 8, 2, '4.5', '2015-04-08 20:29:07', '2015-04-08 23:40:42');

-- --------------------------------------------------------

--
-- Table structure for table `tb_produk_detail`
--

CREATE TABLE IF NOT EXISTS `tb_produk_detail` (
  `id_produk_detail` int(11) NOT NULL AUTO_INCREMENT,
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
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id_produk_detail`),
  KEY `id_produk_detail` (`id_produk_detail`),
  KEY `id_produk` (`id_produk`),
  KEY `id_produk_2` (`id_produk`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=55 ;

--
-- Dumping data for table `tb_produk_detail`
--

INSERT INTO `tb_produk_detail` (`id_produk_detail`, `id_produk`, `id_user`, `produk_ava`, `produk_introduction`, `produk_file`, `produk_link`, `produk_version`, `produk_pict_1`, `produk_pict_2`, `produk_pict_3`, `produk_pict_4`, `produk_pict_5`, `produk_video_youtube`, `produk_desc`, `available`, `produk_main`, `created_at`, `updated_at`) VALUES
(54, 75, 89, 'http://dev.store.ac.id/uploads/products/freemium/75/Product 1_icon.jpeg', 'Product 1', 'http://dev.store.ac.id/uploads/products/freemium/75/1.png', '1428499747f3b6f972f6b17b87a79a0386b70895c3YaTkl8QMoMHehgCctwb9qJskyCjN1DJaVBL8tFC5sVOLwdiyftZfkDfywFmw', '1.00', 'http://dev.store.ac.id/uploads/products/freemium/75/1.png', 'http://dev.store.ac.id/uploads/products/freemium/75/2.png', 'http://dev.store.ac.id/uploads/products/freemium/75/3.png', 'http://dev.store.ac.id/uploads/products/freemium/75/4.png', 'http://dev.store.ac.id/uploads/products/freemium/75/5.png', '', '<p>Product 1 descriptions goes here</p>\r\n', 1, 1, '2015-04-08 20:29:07', '2015-04-08 23:09:16');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=40 ;

--
-- Dumping data for table `tb_rate`
--

INSERT INTO `tb_rate` (`id_rate`, `id_user`, `id_produk`, `review_title`, `review_post`, `user_rate`, `created_at`, `updated_at`) VALUES
(38, 89, 75, 'Test Title 1', 'Test Desc 1', 5, '2015-04-08 23:38:09', '2015-04-08 23:38:09'),
(39, 71, 75, 'Test Title 2', 'Test Desc 2', 4, '2015-04-08 23:40:42', '2015-04-08 23:40:42');

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
-- Table structure for table `tb_transaksi`
--

CREATE TABLE IF NOT EXISTS `tb_transaksi` (
  `id_transaksi` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `total_harga` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id_transaksi`),
  KEY `id_user` (`id_user`),
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
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id_user`),
  KEY `id_user` (`id_user`),
  KEY `role_id` (`role_id`),
  KEY `role_id_2` (`role_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=97 ;

--
-- Dumping data for table `tb_users`
--

INSERT INTO `tb_users` (`id_user`, `id_contributor`, `name`, `email`, `username`, `password`, `password_temp`, `user_photo`, `user_phone`, `user_address`, `code`, `role_id`, `status_user`, `remember_token`, `user_introduction`, `facebook_link`, `twitter_link`, `google_link`, `created_at`, `updated_at`) VALUES
(55, '', 'Administrator', 'telkomuniversitystore@gmail.com', 'administrator1', '$2y$10$wY1vlAAg/PPdkPogWcayOe0MXyKwlms.WJ8bN9UHqEo8F0NWWT9ZW', '', 'http://dev.store.ac.id/assets/user_profpic/55.jpeg', '085224622336', 'Address goes here 1234', '', 1, 1, 'bt2viX7t0lDyBo6Ou4aAyFT5PE90DjMhk2ISdnGu0ADKPJWIaxcZtSwV7pE1', 'Hey I am and administrator of Telkom University Store', 'https://www.facebook.com/yusuf.rahmadi', 'test', '', '2015-03-11 04:36:03', '2015-04-08 20:26:26'),
(71, '', 'Moderator1', 'telustoremod@gmail.com', 'moderator1', '$2y$10$J2pLDaoQbSkLas0kM8qHHekNePBB3TVb.2PBmI1BqERjJzu5Ca0Bq', '', 'http://dev.store.ac.id/assets/user_profpic/71.jpeg', '085224622336', 'address goes here', '', 2, 1, 'jgWCq1XvFXrHfUnCvaJszxTUduKDTqS1KC15iecJGuIrYeyP57mnVviTAAJt', 'introduction speech', 'moderatorlinks', 'twitterlinks', 'googlelinks', '2015-03-13 02:03:50', '2015-04-08 20:37:02'),
(89, '1106110000', 'Contributor', 'telustorecontr@gmail.com', 'contributor', '$2y$10$rsqt7XhGCkzqz6oeR2srSeyWRjdbDk3L69/UAhWfyiggFpcO4NvOC', '', 'http://dev.store.ac.id/assets/user_profpic/89.jpeg', '', '', '', 3, 1, 'pjAw5nuUVHk2zsVGoL86qf9YXa5HTiFN6gkowSfhKVAvV1yR9cjXEK3K2XAK', '', '', '', '', '2015-03-18 13:11:21', '2015-04-08 20:25:28'),
(91, '', 'telustoresales', 'telustoresales@gmail.com', 'telustoresales', '$2y$10$9LgSD2lmSAYm0lgYJjS/h.IXzBk.RUuPBBSZI7UX3a/aBlyCCCZ66', '', 'http://dev.store.ac.id/assets/user_profpic/91.jpeg', '123456789', 'Sales Address', '', 5, 1, 'qmimRWhgJmxf8IWYG8m1dXG9GdlEtwHaUvf6KXVasmLEuEhpX2Sz6ITzb2LB', 'Sales intro', 'facebooklink', 'twitterlink', 'googlelink', '2015-03-22 19:11:51', '2015-03-31 08:28:56'),
(92, '', 'telustorepay', 'telustorepay@gmail.com', 'telustorepay', '$2y$10$zuGSFly0SbAMRV6I/HlXBuvCtrwZguHX7wC65ppU2vRRJyuWiJSvC', '', 'http://dev.store.ac.id/assets/user_profpic/92.jpeg', '1234567890', 'Payment address', '', 6, 1, 'DLzSJSVC7eqUy1Q4pHMPOi98ClxyclAGORCVhDy90X22HBOyFyduACxW8Ys1', 'Payment Intro', 'facebooklink', 'twitterlink', 'googlelink', '2015-03-22 19:12:19', '2015-03-22 19:51:44'),
(96, '', 'Yusuf Rahmadi', 'yusufrahmadi.id@gmail.com', '', '', '', 'https://lh4.googleusercontent.com/-ISxjh07mcs4/AAAAAAAAAAI/AAAAAAAAAC0/eHSVkHXztaI/photo.jpg?sz=200', '', '', '', 4, 1, 'sYnMtPe9XFR5rzTd3sR6XmUReVGY8DxX3taxRUqjs0zG7e9D0oB7YMRqSgzh', '', '', '', 'https://plus.google.com/+YusufRahmadi', '2015-04-07 01:11:59', '2015-04-08 12:18:41');

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
