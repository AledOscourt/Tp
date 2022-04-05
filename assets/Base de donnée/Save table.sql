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


DROP TABLE IF EXISTS `s4u3u_categories`;
CREATE TABLE `s4u3u_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(25) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `s4u3u_categorybrandslink`;
CREATE TABLE `s4u3u_categorybrandslink` (
  `id_brands` int(11) NOT NULL,
  `id_categories` int(11) NOT NULL,
  PRIMARY KEY (`id_brands`,`id_categories`),
  KEY `categoryBrandsLink_categories0_FK` (`id_categories`),
  CONSTRAINT `s4u3u_categorybrandslink_ibfk_2` FOREIGN KEY (`id_brands`) REFERENCES `s4u3u_brands` (`id`) ON DELETE CASCADE,
  CONSTRAINT `s4u3u_categorybrandslink_ibfk_3` FOREIGN KEY (`id_categories`) REFERENCES `s4u3u_categories` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


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
  CONSTRAINT `s4u3u_images_ibfk_2` FOREIGN KEY (`id_offers`) REFERENCES `s4u3u_offers` (`id`) ON DELETE CASCADE
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
  CONSTRAINT `s4u3u_offers_ibfk_1` FOREIGN KEY (`id_pops`) REFERENCES `s4u3u_pops` (`id`) ON DELETE CASCADE,
  CONSTRAINT `s4u3u_offers_ibfk_2` FOREIGN KEY (`id_users`) REFERENCES `s4u3u_users` (`id`) ON DELETE CASCADE,
  CONSTRAINT `s4u3u_offers_ibfk_4` FOREIGN KEY (`id_exclusivities`) REFERENCES `s4u3u_exclusivities` (`id`) ON DELETE CASCADE,
  CONSTRAINT `s4u3u_offers_ibfk_5` FOREIGN KEY (`id_status`) REFERENCES `s4u3u_status` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


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


DROP TABLE IF EXISTS `s4u3u_status`;
CREATE TABLE `s4u3u_status` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `description` text NOT NULL,
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


-- 2022-03-28 13:40:18