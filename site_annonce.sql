-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 14, 2019 at 12:58 PM
-- Server version: 5.7.19
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `site_annonce`
--

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

DROP TABLE IF EXISTS `articles`;
CREATE TABLE IF NOT EXISTS `articles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `description` text,
  `price` decimal(10,0) NOT NULL,
  `size` varchar(15) NOT NULL,
  `published_at` datetime NOT NULL,
  `city` varchar(255) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_category` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_user` (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `title`, `description`, `price`, `size`, `published_at`, `city`, `id_user`, `id_category`) VALUES
(10, 'chaussures jordan', '<p>jordan noires&nbsp;</p>', '51', '44', '2019-12-09 17:45:24', 'Quimper', 14, 1),
(11, 'vans rouge', '<p>paires de vans rouge</p>', '20', '42', '2019-12-09 17:48:10', 'Bayonne', 14, 1),
(12, 'robe rose', '<p>robe rose&nbsp;</p>', '25', '41', '2019-12-10 19:51:26', 'Paris', 14, 8),
(13, 'pantalon belge', '<p>pantalon belge</p>', '45', 'XL', '2019-12-10 19:53:25', 'Paris', 14, 7),
(15, 'basket', '<p>Paire de basket blanche</p>', '50', '45', '2019-12-14 07:52:01', 'Paris', 15, 1),
(16, 'chemise noire', '<p>Chemise noire homme</p>', '25', 'L', '2019-12-14 08:25:10', 'Quimper', 15, 9),
(17, 'tee-shirt', '<p>tee-shirt pour homme - coloris ocre</p>', '25', 'M', '2019-12-14 10:38:11', 'Quimper', 15, 5),
(18, 'chassure de ville', '<p>Belle paires de chaussure de ville</p>', '50', '42', '2019-12-14 10:40:50', 'Paris', 15, 1),
(19, 'Chaussette', '<p>Une paire de chaussette bleues.</p>', '10', 'L', '2019-12-14 10:43:45', 'Paris', 15, 6),
(20, 'Chemise grise', '<p>Chemise gris pour homme</p>', '41', 'S', '2019-12-14 10:45:32', 'Paris', 15, 9),
(21, 'Pantalon', '<p>Pantalon vert pour homme&nbsp;</p>', '78', 'S', '2019-12-14 10:47:36', 'Bayonne', 15, 7);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'chaussure'),
(4, 'ceinture'),
(5, 'shirt'),
(6, 'chaussettes'),
(7, 'pantalon'),
(8, 'robe'),
(9, 'chemise');

-- --------------------------------------------------------

--
-- Table structure for table `images_articles`
--

DROP TABLE IF EXISTS `images_articles`;
CREATE TABLE IF NOT EXISTS `images_articles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_article` int(11) NOT NULL,
  `image_path` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_article` (`id_article`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `images_articles`
--

INSERT INTO `images_articles` (`id`, `id_article`, `image_path`) VALUES
(5, 10, 'images/cezs.jpg'),
(6, 11, 'images/ressqa.jpg'),
(7, 12, 'images/robez.jpg'),
(8, 13, 'images/pantalonBlanc.jpg'),
(10, 15, 'images/paire_basket_blanche_homme.jpg'),
(11, 16, 'images/chemise_noire_homme.jpg'),
(12, 17, 'images/tshirt_ocre_homme.jpg'),
(13, 18, 'images/paire_chaussure_marron_vue_cote_homme.jpg'),
(14, 19, 'images/chaussettes_bleue.jpg'),
(15, 20, 'images/chemise_homme_grise.jpg'),
(16, 21, 'images/pantalon_vert_homme.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(25) DEFAULT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'customer',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `password`, `avatar`, `email`, `phone`, `role`) VALUES
(13, 'gynsora', '$2y$10$NeM/jIe3UPmUc0./HuczietoSgUdavZm27bQ13ya1WmVZYPZneZCy', 'images/sapoin.jpg', 'djamaninadjim@gmail.com', '0613252525', 'admin'),
(14, 'gyn', '$2y$10$xW7806huwg9NXiLhM5AYaukukK.rqy58Za.Q1PeGDtKS0aw3mzcFO', 'images/sapoin.jpg', 'gynsora@fgmail.com', '12121212', 'customer'),
(15, 'richard', '$2y$10$8nD15wv94obmlD4XlL3emub3CJLX6ef9.hQN5sbFPpjcxdnympRhS', NULL, 'abscent@fire.com', '12111314', 'customer'),
(17, 'blabla', '$2y$10$hZb8atruvFHSpnTLBU9KTOd8JNtmOLT0ZR.bRfKcaznfxmzEIiDwe', 'images/lolLogo.png', 'night@gmail.com', '12121212', 'customer');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `articles`
--
ALTER TABLE `articles`
  ADD CONSTRAINT `articles_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `images_articles`
--
ALTER TABLE `images_articles`
  ADD CONSTRAINT `images_articles_ibfk_1` FOREIGN KEY (`id_article`) REFERENCES `articles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
