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
(38,	'My Hero Academia'),
(39,	'Attack On Titans'),
(40,	'One Piece');

DROP TABLE IF EXISTS `s4u3u_categories`;
CREATE TABLE `s4u3u_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(25) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `s4u3u_categories` (`id`, `name`) VALUES
(22,	'ANIME');

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
(38,	22),
(39,	22),
(40,	22);

DROP TABLE IF EXISTS `s4u3u_envylists`;
CREATE TABLE `s4u3u_envylists` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nbrOfPopInEnvyList` int(11) DEFAULT NULL,
  `id_users` int(11) NOT NULL,
  `id_popfilters` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `envylists_users_AK` (`id_users`),
  KEY `envylists_popfilters0_FK` (`id_popfilters`),
  CONSTRAINT `envylists_popfilters0_FK` FOREIGN KEY (`id_popfilters`) REFERENCES `s4u3u_popfilters` (`id`),
  CONSTRAINT `envylists_users_FK` FOREIGN KEY (`id_users`) REFERENCES `s4u3u_users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `s4u3u_exclusivities`;
CREATE TABLE `s4u3u_exclusivities` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(25) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `s4u3u_images`;
CREATE TABLE `s4u3u_images` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `image` varchar(255) NOT NULL,
  `id_offers` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `images_offers_FK` (`id_offers`),
  CONSTRAINT `images_offers_FK` FOREIGN KEY (`id_offers`) REFERENCES `s4u3u_offers` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `s4u3u_offers`;
CREATE TABLE `s4u3u_offers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` datetime NOT NULL,
  `price` decimal(15,3) NOT NULL,
  `id_pops` int(11) NOT NULL,
  `id_envylists` int(11) NOT NULL,
  `id_status` int(11) NOT NULL,
  `id_exclusivities` int(11) DEFAULT NULL,
  `id_users` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `offers_envylists_AK` (`id_envylists`),
  KEY `offers_pops0_FK` (`id_pops`),
  KEY `offers_status2_FK` (`id_status`),
  KEY `offers_exclusivities_FK` (`id_exclusivities`),
  KEY `offers_users_FK` (`id_users`),
  CONSTRAINT `offers_envylists1_FK` FOREIGN KEY (`id_envylists`) REFERENCES `s4u3u_envylists` (`id`),
  CONSTRAINT `offers_exclusivities_FK` FOREIGN KEY (`id_exclusivities`) REFERENCES `s4u3u_exclusivities` (`id`),
  CONSTRAINT `offers_pops0_FK` FOREIGN KEY (`id_pops`) REFERENCES `s4u3u_pops` (`id`),
  CONSTRAINT `offers_status2_FK` FOREIGN KEY (`id_status`) REFERENCES `s4u3u_status` (`id`),
  CONSTRAINT `offers_users_FK` FOREIGN KEY (`id_users`) REFERENCES `s4u3u_users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


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


DROP TABLE IF EXISTS `s4u3u_popofenvylist`;
CREATE TABLE `s4u3u_popofenvylist` (
  `id_pops` int(11) NOT NULL,
  `id_envylists` int(11) NOT NULL,
  PRIMARY KEY (`id_pops`,`id_envylists`),
  KEY `popOfEnvyList_envylists0_FK` (`id_envylists`),
  CONSTRAINT `popOfEnvyList_envylists0_FK` FOREIGN KEY (`id_envylists`) REFERENCES `s4u3u_envylists` (`id`),
  CONSTRAINT `popOfEnvyList_pops_FK` FOREIGN KEY (`id_pops`) REFERENCES `s4u3u_pops` (`id`)
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
  CONSTRAINT `pops_brands0_FK` FOREIGN KEY (`id_brands`) REFERENCES `s4u3u_brands` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `s4u3u_pops` (`id`, `name`, `tags`, `reference`, `officialPopImageInTheBox`, `officialPopImageOutBox`, `id_brands`) VALUES
(1,	'Goku',	125,	12458,	'../uploads/drapeauFrance.jpg',	'../uploads/drapeauFrance.jpg',	40);

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
  `descriprion` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


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
(1,	'uploads/OIP.jpg',	'AledOscourt',	'julien.fournier2508@gmail.com',	'$2y$10$ztDbIct3i1MjmvMq9yiLo.otBGFa5oOUzGlYZN8DSmoBAqGhF3zAu',	'2022-02-04',	1),
(2,	NULL,	'Aled',	'julien25.fournier08@gmail.com',	'$2y$10$wrUVPzOw.K/Hq9xQkbc7A.YQGn1j05pjoCl9BAF63j1iqISmoIKeS',	'2022-02-08',	2),
(3,	'uploads/OIP.jpg',	'Aled-Oscoure',	'julien25fournier08@gmail.com',	'$2y$10$raIbWh7MSgYsUMSF7ag2Dup.TC.JYAAAocI/PydsdYzUOEAd/G.F2',	'2022-02-08',	2);

-- 2022-02-10 13:48:47