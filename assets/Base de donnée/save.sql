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
  `id_popfilters` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `envylists_offers_AK` (`id_offers`),
  UNIQUE KEY `envylists_users_AK` (`id_users`),
  KEY `envylists_popfilters0_FK` (`id_popfilters`),
  CONSTRAINT `envylists_offers_FK` FOREIGN KEY (`id_offers`) REFERENCES `s4u3u_offers` (`id`),
  CONSTRAINT `envylists_popfilters0_FK` FOREIGN KEY (`id_popfilters`) REFERENCES `s4u3u_popfilters` (`id`),
  CONSTRAINT `envylists_users_FK` FOREIGN KEY (`id_users`) REFERENCES `s4u3u_users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


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
(10,	'uploads/disneyRapunzel-removebg-preview.png',	9),
(11,	'uploads/disneyRapunzel-removebg-preview.png',	10),
(12,	'uploads/gokuUltraInstint-removebg-preview.png',	11),
(13,	'uploads/disneyRapunzel-removebg-preview.png',	11);

DROP TABLE IF EXISTS `s4u3u_offerofenvylist`;
CREATE TABLE `s4u3u_offerofenvylist` (
  `id_offers` int(11) NOT NULL,
  `id_envylists` int(11) NOT NULL,
  PRIMARY KEY (`id_offers`,`id_envylists`),
  KEY `popOfEnvyList_envylists0_FK` (`id_envylists`),
  CONSTRAINT `s4u3u_offerofenvylist_ibfk_3` FOREIGN KEY (`id_offers`) REFERENCES `s4u3u_offers` (`id`) ON DELETE CASCADE,
  CONSTRAINT `s4u3u_offerofenvylist_ibfk_4` FOREIGN KEY (`id_envylists`) REFERENCES `s4u3u_envylists` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


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
  CONSTRAINT `offers_exclusivities_FK` FOREIGN KEY (`id_exclusivities`) REFERENCES `s4u3u_exclusivities` (`id`),
  CONSTRAINT `offers_status2_FK` FOREIGN KEY (`id_status`) REFERENCES `s4u3u_status` (`id`),
  CONSTRAINT `offers_users_FK` FOREIGN KEY (`id_users`) REFERENCES `s4u3u_users` (`id`),
  CONSTRAINT `s4u3u_offers_ibfk_1` FOREIGN KEY (`id_pops`) REFERENCES `s4u3u_pops` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `s4u3u_offers` (`id`, `date`, `price`, `nbrClick`, `id_pops`, `id_exclusivities`, `id_status`, `id_users`) VALUES
(9,	'2022-02-23 14:24:44',	20.00,	3,	1,	2,	27,	1),
(10,	'2022-02-25 09:27:51',	54.00,	0,	1,	2,	28,	1),
(11,	'2022-02-25 09:28:16',	5486.00,	0,	1,	4,	29,	1),
(12,	'2022-02-23 14:24:44',	20.00,	0,	1,	2,	27,	1),
(13,	'2022-02-25 09:27:51',	54.00,	0,	1,	2,	28,	1),
(14,	'2022-02-25 09:28:16',	5486.00,	0,	1,	4,	29,	1),
(15,	'2022-02-23 14:24:44',	20.00,	0,	1,	2,	27,	1),
(16,	'2022-02-25 09:27:51',	54.00,	1,	1,	2,	28,	1),
(17,	'2022-02-25 09:28:16',	5486.00,	0,	1,	4,	29,	1),
(18,	'2022-02-23 14:24:44',	20.00,	0,	1,	2,	27,	1),
(19,	'2022-02-25 09:27:51',	54.00,	0,	1,	2,	28,	1),
(20,	'2022-02-25 09:28:16',	5486.00,	0,	1,	4,	29,	1),
(22,	'2022-02-23 14:24:44',	20.00,	0,	1,	2,	27,	1),
(23,	'2022-02-25 09:27:51',	54.00,	0,	1,	2,	28,	1),
(24,	'2022-02-25 09:28:16',	5486.00,	0,	1,	4,	29,	1),
(25,	'2022-02-23 14:24:44',	20.00,	0,	1,	2,	27,	1),
(26,	'2022-02-25 09:27:51',	54.00,	0,	1,	2,	28,	1),
(27,	'2022-02-25 09:28:16',	5486.00,	0,	1,	4,	29,	1),
(28,	'2022-02-23 14:24:44',	20.00,	0,	1,	2,	27,	1),
(29,	'2022-02-25 09:27:51',	54.00,	0,	1,	2,	28,	1),
(30,	'2022-02-25 09:28:16',	5486.00,	0,	1,	4,	29,	1),
(31,	'2022-02-23 14:24:44',	20.00,	0,	1,	2,	27,	1),
(32,	'2022-02-25 09:27:51',	54.00,	0,	1,	2,	28,	1),
(33,	'2022-02-25 09:28:16',	5486.00,	0,	1,	4,	29,	1),
(37,	'2022-02-23 14:24:44',	20.00,	0,	1,	2,	27,	1),
(38,	'2022-02-25 09:27:51',	54.00,	0,	1,	2,	28,	1),
(39,	'2022-02-25 09:28:16',	5486.00,	0,	1,	4,	29,	1),
(40,	'2022-02-23 14:24:44',	20.00,	0,	1,	2,	27,	1),
(41,	'2022-02-25 09:27:51',	54.00,	0,	1,	2,	28,	1),
(42,	'2022-02-25 09:28:16',	5486.00,	0,	1,	4,	29,	1),
(43,	'2022-02-23 14:24:44',	20.00,	0,	1,	2,	27,	1),
(44,	'2022-02-25 09:27:51',	54.00,	12,	1,	2,	28,	1),
(45,	'2022-02-25 09:28:16',	5486.00,	0,	1,	4,	29,	1),
(46,	'2022-02-23 14:24:44',	20.00,	0,	1,	2,	27,	1),
(47,	'2022-02-25 09:27:51',	54.00,	0,	1,	2,	28,	1),
(48,	'2022-02-25 09:28:16',	5486.00,	0,	1,	4,	29,	1),
(49,	'2022-02-23 14:24:44',	20.00,	0,	1,	2,	27,	1),
(50,	'2022-02-25 09:27:51',	54.00,	0,	1,	2,	28,	1),
(51,	'2022-02-25 09:28:16',	5486.00,	0,	1,	4,	29,	1),
(52,	'2022-02-23 14:24:44',	20.00,	0,	1,	2,	27,	1),
(53,	'2022-02-25 09:27:51',	54.00,	0,	1,	2,	28,	1),
(54,	'2022-02-25 09:28:16',	5486.00,	0,	1,	4,	29,	1),
(55,	'2022-02-23 14:24:44',	20.00,	0,	1,	2,	27,	1),
(56,	'2022-02-25 09:27:51',	54.00,	0,	1,	2,	28,	1),
(57,	'2022-02-25 09:28:16',	5486.00,	0,	1,	4,	29,	1),
(58,	'2022-02-23 14:24:44',	20.00,	0,	1,	2,	27,	1),
(59,	'2022-02-25 09:27:51',	54.00,	0,	1,	2,	28,	1),
(60,	'2022-02-25 09:28:16',	5486.00,	1,	1,	4,	29,	1);

DROP TABLE IF EXISTS `s4u3u_opinions`;
CREATE TABLE `s4u3u_opinions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `reviewGrade` int(11) NOT NULL,
  `content` text,
  `reviewDate` datetime NOT NULL,
  `id_users` int(11) NOT NULL,
  `id_offers` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `opinions_offers_FK` (`id_offers`),
  KEY `opinions_users_FK` (`id_users`),
  CONSTRAINT `opinions_offers_FK` FOREIGN KEY (`id_offers`) REFERENCES `s4u3u_offers` (`id`),
  CONSTRAINT `opinions_users_FK` FOREIGN KEY (`id_users`) REFERENCES `s4u3u_users` (`id`)
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
(1,	'misdsjsnjs',	'moirzs'),
(7,	'Moi',	'Test'),
(8,	'Moi',	'Test'),
(12,	'Moi',	'Moi '),
(16,	'Moi',	'Moi '),
(17,	'Moi',	'Moi'),
(23,	'Moi',	'Moi'),
(24,	'Perfect ',	'Mosdhk'),
(25,	'Moi',	'Toiss '),
(26,	'Moi',	'Moi '),
(27,	'Toi',	'Bulma is the genius behind the suit but Gohan is the hero behind the mask. In attempt to hide his identity while fighting crime, Gohan takes to the streets as the Great Saiyaman. Add this exclusive Pop! Great Saiyaman to your Dragon Ball Z collection so he can fight alongside the rest of the Dragon Team. Vinyl figure is approximately 4.25-inches tall.'),
(28,	'Moi',	'Pop! Eijiro Kirishima is battle hardened and ready to continue his pro hero training with his fellow U.A. High School students in your My Hero Academia collection. Don\'t let his intense costume and red hair fool you, he is a respectful person and dedicated hero. Vinyl figure is approximately 5-inches tall.'),
(29,	'Moix',	'Pop! Eijiro Kirishima is battle hardened and ready to continue his pro hero training with his fellow U.A. High School students in your My Hero Academia collection. Don\'t let his intense costume and red hair fool you, he is a respectful person and dedicated hero. Vinyl figure is approximately 5-inches tall.');

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
(1,	'uploads/44e640dc1fe8947399c73903713948f8.jpg',	'AledOscourt',	'julien.fournier2508@gmail.com',	'$2y$10$ztDbIct3i1MjmvMq9yiLo.otBGFa5oOUzGlYZN8DSmoBAqGhF3zAu',	'2022-02-04',	1),
(4,	'uploads/anime-paper.gif',	'Aled',	'julien25.fournier08@gmail.com',	'$2y$10$GxMsqAOHBPQQIyHulf0BuONrA/Cz97uxKgKB35G2tc3qbZDtA31mS',	'2022-02-22',	2),
(8,	NULL,	'AledOsc',	'julien25fournier08@gmail.com',	'$2y$10$URp3dppwEw7QYbgWDlIH1ezND6B87d9Fip23SK8z0pSEO4k9Om9e2',	'2022-02-22',	2);

-- 2022-02-27 13:59:20