-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 14, 2023 at 10:07 AM
-- Server version: 8.0.21
-- PHP Version: 8.1.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `elecar`
--

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

DROP TABLE IF EXISTS `brand`;
CREATE TABLE IF NOT EXISTS `brand` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`id`, `name`) VALUES
(1, 'Porsche'),
(2, 'Tesla'),
(3, 'Audi'),
(5, 'Mercedes'),
(6, 'Lexus'),
(7, 'Renault');

-- --------------------------------------------------------

--
-- Table structure for table `car`
--

DROP TABLE IF EXISTS `car`;
CREATE TABLE IF NOT EXISTS `car` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `model` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_header` tinyint(1) NOT NULL,
  `front_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `left_side_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `right_side_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `speed` int DEFAULT NULL,
  `acceleration` double DEFAULT NULL,
  `autonomy` int DEFAULT NULL,
  `price` int DEFAULT NULL,
  `brand_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_773DE69D44F5D008` (`brand_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `car`
--

INSERT INTO `car` (`id`, `name`, `model`, `is_header`, `front_image`, `left_side_image`, `right_side_image`, `speed`, `acceleration`, `autonomy`, `price`, `brand_id`) VALUES
(2, 'Taycan', 'Turbo S', 1, '1b85d16a59739c99598d15b407b8abfdfb650b5b.png', '597b15c75686ad3ffe91b5fa850357d769042b31.png', '6adc63f5f6bff675049a16e9d7ec39aeba33ad3c.png', 300, 2.8, 500, 91000, 1),
(3, '99X Electric', 'Formule E', 0, '69053fab26f94cbf479f2944ec8307223c293100.jpg', '2135aeebbddd793f5542dddcdf17afba3c7b4ba7.jpg', '7abd8838a1e58b4328851825a49cc4b0c05351b7.jpg', 150, 15.08, 100, 9000, 1),
(4, 'Twizy', 'GT', 0, 'fc22a34cb35e524eef877e4ef10cf1edcd935b65.jpg', 'b4e7ce90fd45f349dc20435d8d58c2d63b3c8c23.jpg', '37a82b913938d9a19f7cbf25fd6b0e33ce6703a4.jpg', 500, 1.95, 1000, 10000, 7),
(5, 'Model', 'Y', 0, 'f5a17e7dca63c0b5862c1f7ec13ec0547f4b5c34.png', '16db0b695dfb6f8dc58180d2155a29ce7ef8cdca.png', 'a09044abe34df3e41272478b816abd5d5c9f7222.png', 250, 3.7, 531, 47000, 2),
(6, 'Q4', 'E Tron', 0, '082c615b11aa228ff54b6e6cbb9901bd618cc60d.png', '74c3f1dbc96569e96f56dbbe5320825a9b22d7e1.png', 'bd18faa9557ddca76875d3a690a9178ed7350397.png', 180, 6.1, 400, 53000, 3);

-- --------------------------------------------------------

--
-- Table structure for table `doctrine_migration_versions`
--

DROP TABLE IF EXISTS `doctrine_migration_versions`;
CREATE TABLE IF NOT EXISTS `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20230202095146', '2023-02-10 10:14:46', 311),
('DoctrineMigrations\\Version20230202102448', '2023-02-10 10:14:46', 44),
('DoctrineMigrations\\Version20230210101150', '2023-02-10 10:14:46', 191);

-- --------------------------------------------------------

--
-- Table structure for table `header`
--

DROP TABLE IF EXISTS `header`;
CREATE TABLE IF NOT EXISTS `header` (
  `id` int NOT NULL AUTO_INCREMENT,
  `car_id` int NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_6E72A8C1C3C6F69F` (`car_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `header`
--

INSERT INTO `header` (`id`, `car_id`, `title`) VALUES
(2, 4, 'Choose The Best Car');

-- --------------------------------------------------------

--
-- Table structure for table `messenger_messages`
--

DROP TABLE IF EXISTS `messenger_messages`;
CREATE TABLE IF NOT EXISTS `messenger_messages` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `body` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `headers` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue_name` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `available_at` datetime NOT NULL,
  `delivered_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_75EA56E0FB7336F0` (`queue_name`),
  KEY `IDX_75EA56E0E3BD61CE` (`available_at`),
  KEY `IDX_75EA56E016BA31DB` (`delivered_at`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int NOT NULL AUTO_INCREMENT,
  `email` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` json NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_8D93D649E7927C74` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `email`, `roles`, `password`) VALUES
(1, 'admin@admin.admin', '[]', '$2y$13$EkaEBMKOavgQFYM/FLmN5ui/Nh2DSPo46kSF7l8nTdPtzR5YyrbeO'),
(2, 'test@test.com', '[]', '$2y$13$oJdRwJ4AeymytYlKIY4zw.T.IAkSGpDo.zifOMR//4f5Y3gVqXJ9e'),
(3, 'truc@truc.com', '[]', '$2y$13$ETWC5WSk7i4GD8xMfB5ui.Fq.dh8h5DyyjW4S22unJPa2Z/Ne5RF6');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `car`
--
ALTER TABLE `car`
  ADD CONSTRAINT `FK_773DE69D44F5D008` FOREIGN KEY (`brand_id`) REFERENCES `brand` (`id`);

--
-- Constraints for table `header`
--
ALTER TABLE `header`
  ADD CONSTRAINT `FK_6E72A8C1C3C6F69F` FOREIGN KEY (`car_id`) REFERENCES `car` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
