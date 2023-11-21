SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

DROP DATABASE IF EXISTS `api_rest`;
CREATE DATABASE IF NOT EXISTS `api_rest` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `api_rest`;


DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `nom` varchar(256) NOT NULL,
  `description` text NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


INSERT INTO `categories` (`id`, `nom`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Mode', 'Catégorie pour tout ce qui est en rapport avec la mode.', '2023-06-01 00:32:07', '2023-08-30 15:34:33'),
(2, 'Electronique', 'Gadgets, drones et plus.', '2023-06-03 02:34:11', '2023-01-30 16:34:33'),
(3, 'Moteurs', 'Sports mécaniques', '2023-06-01 10:33:07', '2023-07-30 15:34:54'),
(5, 'Films', 'Produits cinématographiques.', '2023-06-01 10:33:07', '2023-01-08 12:27:26'),
(6, 'Livres', 'E-books, livres audio...', '2023-06-01 10:33:07', '2023-01-08 12:27:47'),
(13, 'Sports', 'Articles de sport.', '2023-01-09 02:24:24', '2023-01-09 00:24:24');

DROP TABLE IF EXISTS `produits`;
CREATE TABLE `produits` (
  `id` int(11) NOT NULL,
  `nom` varchar(32) NOT NULL,
  `description` text NOT NULL,
  `prix` decimal(10,0) NOT NULL,
  `categories_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `produits` (`id`, `nom`, `description`, `prix`, `categories_id`, `created_at`, `updated_at`) VALUES
(65, 'Samsung Galaxy S 23', 'Le dernier né des téléphones Samsung', '899', 2, '2023-09-07 21:19:09', '2023-09-07 19:19:09'),
(66, 'Habemus Piratam', 'Le livre à propos d\'un pirate informatique', '13', 6, '2023-09-07 21:21:11', '2023-09-07 19:21:11');

