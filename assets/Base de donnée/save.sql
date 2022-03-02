SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP DATABASE IF EXISTS `collectingpop`;
CREATE DATABASE `collectingpop` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `collectingpop`;

DROP TABLE IF EXISTS `s4u3u_brands`;
CREATE TABLE `s4u3u_brands` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(25) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `s4u3u_brands` (`id`, `name`) VALUES
(1,	'Moi');

DROP TABLE IF EXISTS `s4u3u_categories`;
CREATE TABLE `s4u3u_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(25) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `s4u3u_categories` (`id`, `name`) VALUES
(24,	'MOVIE'),
(26,	'MUSIC');

DROP TABLE IF EXISTS `s4u3u_categorybrandslink`;
CREATE TABLE `s4u3u_categorybrandslink` (
  `id_brands` int(11) NOT NULL,
  `id_categories` int(11) NOT NULL,
  PRIMARY KEY (`id_brands`,`id_categories`),
  KEY `categoryBrandsLink_categories0_FK` (`id_categories`),
  CONSTRAINT `s4u3u_categorybrandslink_ibfk_2` FOREIGN KEY (`id_brands`) REFERENCES `s4u3u_brands` (`id`) ON DELETE CASCADE,
  CONSTRAINT `s4u3u_categorybrandslink_ibfk_3` FOREIGN KEY (`id_categories`) REFERENCES `s4u3u_categories` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `s4u3u_categorybrandslink` (`id_brands`, `id_categories`) VALUES
(1,	24);

DROP TABLE IF EXISTS `s4u3u_envylists`;
CREATE TABLE `s4u3u_envylists` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_users` int(11) NOT NULL,
  `id_offers` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `envylists_offers_AK` (`id_offers`),
  KEY `envylists_users_AK` (`id_users`),
  CONSTRAINT `s4u3u_envylists_ibfk_1` FOREIGN KEY (`id_offers`) REFERENCES `s4u3u_offers` (`id`) ON DELETE CASCADE,
  CONSTRAINT `s4u3u_envylists_ibfk_2` FOREIGN KEY (`id_users`) REFERENCES `s4u3u_users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `s4u3u_envylists` (`id`, `id_users`, `id_offers`) VALUES
(25,	4,	63);

DROP TABLE IF EXISTS `s4u3u_exclusivities`;
CREATE TABLE `s4u3u_exclusivities` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(25) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `s4u3u_exclusivities` (`id`, `name`) VALUES
(1,	'None'),
(2,	'Rare'),
(3,	'Mini'),
(4,	'Geant'),
(5,	'Parfait');

DROP TABLE IF EXISTS `s4u3u_images`;
CREATE TABLE `s4u3u_images` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `image` varchar(255) NOT NULL,
  `id_offers` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `images_offers_FK` (`id_offers`),
  CONSTRAINT `s4u3u_images_ibfk_2` FOREIGN KEY (`id_offers`) REFERENCES `s4u3u_offers` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `s4u3u_images` (`id`, `image`, `id_offers`) VALUES
(20,	'uploads/disneyRapunzel-removebg-preview.png',	63),
(21,	'uploads/gokuUltraInstint-removebg-preview.png',	63),
(22,	'uploads/simpsonItchy.png',	63),
(26,	'uploads/gokuUltraInstint-removebg-preview.png',	65),
(27,	'uploads/simpsonItchy.png',	65),
(28,	'uploads/disneyRapunzel-removebg-preview.png',	65);

DROP TABLE IF EXISTS `s4u3u_offers`;
CREATE TABLE `s4u3u_offers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` datetime NOT NULL,
  `price` decimal(15,2) NOT NULL,
  `nbrClick` int(11) NOT NULL,
  `id_pops` int(11) NOT NULL,
  `id_exclusivities` int(11) NOT NULL,
  `id_status` int(11) NOT NULL,
  `id_users` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `offers_pops0_FK` (`id_pops`),
  KEY `offers_status2_FK` (`id_status`),
  KEY `offers_exclusivities_FK` (`id_exclusivities`),
  KEY `offers_users_FK` (`id_users`),
  CONSTRAINT `s4u3u_offers_ibfk_1` FOREIGN KEY (`id_pops`) REFERENCES `s4u3u_pops` (`id`) ON DELETE CASCADE,
  CONSTRAINT `s4u3u_offers_ibfk_2` FOREIGN KEY (`id_users`) REFERENCES `s4u3u_users` (`id`) ON DELETE CASCADE,
  CONSTRAINT `s4u3u_offers_ibfk_4` FOREIGN KEY (`id_exclusivities`) REFERENCES `s4u3u_exclusivities` (`id`) ON DELETE CASCADE,
  CONSTRAINT `s4u3u_offers_ibfk_5` FOREIGN KEY (`id_status`) REFERENCES `s4u3u_status` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `s4u3u_offers` (`id`, `date`, `price`, `nbrClick`, `id_pops`, `id_exclusivities`, `id_status`, `id_users`) VALUES
(63,	'2022-03-01 16:13:57',	15.00,	8,	1,	2,	32,	1),
(65,	'2022-03-01 16:16:03',	25.00,	23,	1,	4,	34,	4);

DROP TABLE IF EXISTS `s4u3u_opinions`;
CREATE TABLE `s4u3u_opinions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `content` text NOT NULL,
  `reviewDate` datetime NOT NULL,
  `id_users` int(11) NOT NULL,
  `id_offers` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `opinions_offers_FK` (`id_offers`),
  KEY `opinions_users_FK` (`id_users`),
  CONSTRAINT `s4u3u_opinions_ibfk_2` FOREIGN KEY (`id_offers`) REFERENCES `s4u3u_offers` (`id`) ON DELETE CASCADE,
  CONSTRAINT `s4u3u_opinions_ibfk_3` FOREIGN KEY (`id_users`) REFERENCES `s4u3u_users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `s4u3u_popfilters`;
CREATE TABLE `s4u3u_popfilters` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `popsName` varchar(25) NOT NULL,
  `tags` int(11) NOT NULL,
  `reference` int(11) NOT NULL,
  `price` decimal(15,3) NOT NULL,
  `id_exclusivities` int(11) NOT NULL,
  `id_brands` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `popfilters_exclusivities_FK` (`id_exclusivities`),
  KEY `brands_popfilters_FK` (`id_brands`),
  CONSTRAINT `brands_popfilters_FK` FOREIGN KEY (`id_brands`) REFERENCES `s4u3u_brands` (`id`),
  CONSTRAINT `popfilters_exclusivities_FK` FOREIGN KEY (`id_exclusivities`) REFERENCES `s4u3u_exclusivities` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `s4u3u_pops`;
CREATE TABLE `s4u3u_pops` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(25) NOT NULL,
  `tags` int(11) NOT NULL,
  `reference` int(11) NOT NULL,
  `officialPopImageInTheBox` varchar(255) NOT NULL,
  `officialPopImageOutBox` varchar(255) NOT NULL,
  `id_brands` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `pops_brands0_FK` (`id_brands`),
  CONSTRAINT `s4u3u_pops_ibfk_1` FOREIGN KEY (`id_brands`) REFERENCES `s4u3u_brands` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `s4u3u_pops` (`id`, `name`, `tags`, `reference`, `officialPopImageInTheBox`, `officialPopImageOutBox`, `id_brands`) VALUES
(1,	'Goku',	127,	12547,	'gokuUltraInstint-removebg-preview.png',	'gokuUltraInstint-removebg-preview.png',	1),
(2,	'Gok',	110,	12457,	'disneyRapunzel-removebg-preview.png',	'gokuUltraInstint-removebg-preview.png',	1);

DROP TABLE IF EXISTS `s4u3u_reports`;
CREATE TABLE `s4u3u_reports` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `content` text,
  `id_users` int(11) NOT NULL,
  `id_users_write` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `reports_users_FK` (`id_users`),
  KEY `reports_users0_FK` (`id_users_write`),
  CONSTRAINT `reports_users0_FK` FOREIGN KEY (`id_users_write`) REFERENCES `s4u3u_users` (`id`),
  CONSTRAINT `reports_users_FK` FOREIGN KEY (`id_users`) REFERENCES `s4u3u_users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `s4u3u_roles`;
CREATE TABLE `s4u3u_roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(25) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `s4u3u_roles` (`id`, `name`) VALUES
(1,	'Administrateur'),
(2,	'Utilisateur');

DROP TABLE IF EXISTS `s4u3u_status`;
CREATE TABLE `s4u3u_status` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `s4u3u_status` (`id`, `name`, `description`) VALUES
(32,	'En bonne état',	'En plus tôt bonne état!'),
(33,	'Tvjcwncww',	'En plus tôt bonne état!'),
(34,	'Hdfqfuidbcq',	'En plus tôt bonne état!');

DROP TABLE IF EXISTS `s4u3u_users`;
CREATE TABLE `s4u3u_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `profilePicture` varchar(255) DEFAULT NULL,
  `userName` varchar(25) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `registerDate` date NOT NULL,
  `id_roles` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `users_roles_FK` (`id_roles`),
  CONSTRAINT `users_roles_FK` FOREIGN KEY (`id_roles`) REFERENCES `s4u3u_roles` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `s4u3u_users` (`id`, `profilePicture`, `userName`, `email`, `password`, `registerDate`, `id_roles`) VALUES
(1,	'uploads/8fc7ddb164b4e333534db61cb2ebd098.jpg',	'AledOscourt',	'julien.fournier2508@gmail.com',	'$2y$10$ztDbIct3i1MjmvMq9yiLo.otBGFa5oOUzGlYZN8DSmoBAqGhF3zAu',	'2022-02-04',	1),
(4,	'uploads/e91f80d066849cce22e9001ddda05c6d.gif',	'Aled',	'julien25.fournier08@gmail.com',	'$2y$10$6x2Bw4CzHzn31yIjPBvkCObuHzAmblcH3Rh7W/DLt9Ag0boPZcvgC',	'2022-02-22',	2),
(8,	NULL,	'AledOsc',	'julien25fournier08@gmail.com',	'$2y$10$URp3dppwEw7QYbgWDlIH1ezND6B87d9Fip23SK8z0pSEO4k9Om9e2',	'2022-02-22',	2);

-- 2022-03-02 15:25:20