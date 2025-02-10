CREATE DATABASE IF NOT EXISTS `blog`
USE `blog`;

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int NOT NULL AUTO_INCREMENT,
  `category_name` varchar(25) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `categories` (`id`, `category_name`) VALUES
	(1, 'Svētki'),
	(2, 'Mūzika'),
	(3, 'Sports'),
	(6, 'Māksla'),
	(7, 'E-Sports'),
	(8, 'Ēdiens'),
	(9, 'Datori');

CREATE TABLE IF NOT EXISTS `posts` (
  `id` int NOT NULL AUTO_INCREMENT,
  `content` varchar(5200) DEFAULT NULL,
  `category_id` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `posts` (`id`, `content`, `category_id`) VALUES
	(38, 'Lieldienas', 1),
	(40, 'Arnis', 8),
	(41, 'EdzusRage', 1),
	(42, 'Edzus', 8),
	(45, 'Talkas', 6),
	(46, 'Labs dators', 9);