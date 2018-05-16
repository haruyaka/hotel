-- Adminer 4.6.2 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

CREATE DATABASE `university` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `university`;

DROP TABLE IF EXISTS `fakultas`;
CREATE TABLE `fakultas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

INSERT INTO `fakultas` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1,	'Fakultas Teknologi Informasi',	'2018-05-07 15:26:39',	'2018-05-07 15:27:12'),
(2,	'Fakultas Ekonomi',	'2018-05-07 15:26:39',	'2018-05-07 15:27:21'),
(3,	'Fakultas Hukum',	'2018-05-07 22:23:55',	'2018-05-07 22:23:55'),
(4,	'Fakultas Ilmu Sosiologi',	'2018-05-07 22:23:55',	'2018-05-07 22:23:55');

DROP TABLE IF EXISTS `jurusan`;
CREATE TABLE `jurusan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fakultas_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`),
  KEY `fakultas_id` (`fakultas_id`),
  CONSTRAINT `jurusan_ibfk_1` FOREIGN KEY (`fakultas_id`) REFERENCES `fakultas` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

INSERT INTO `jurusan` (`id`, `fakultas_id`, `name`, `created_at`, `updated_at`) VALUES
(1,	1,	'Teknik Informatika',	'2018-05-07 15:28:17',	'2018-05-07 15:28:17'),
(2,	2,	'Akuntansi Management',	'2018-05-07 15:28:17',	'2018-05-07 15:28:17'),
(3,	1,	'Sistem Informasi',	'2018-05-07 22:25:01',	'2018-05-07 22:25:01'),
(4,	3,	'Notaris',	'2018-05-07 22:25:21',	'2018-05-07 22:25:21'),
(5,	3,	'Pengacara',	'2018-05-07 22:25:21',	'2018-05-07 22:25:21'),
(6,	2,	'Akuntansi Perbankan',	'2018-05-07 22:25:50',	'2018-05-07 22:25:50'),
(7,	2,	'Ekonomi',	'2018-05-07 22:25:50',	'2018-05-07 22:25:50'),
(8,	4,	'Sosiologi',	'2018-05-07 22:26:10',	'2018-05-07 22:26:10'),
(9,	4,	'Sejarah',	'2018-05-07 22:26:10',	'2018-05-07 22:26:10'),
(10,	1,	'Ilmu Komputer',	'2018-05-07 22:26:47',	'2018-05-07 22:26:47'),
(11,	1,	'Perangkat Keras/Networking',	'2018-05-07 22:26:47',	'2018-05-07 22:26:47');

DROP TABLE IF EXISTS `student`;
CREATE TABLE `student` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fakultas_id` int(11) NOT NULL,
  `jurusan_id` int(11) NOT NULL,
  `nim` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `address` varchar(500) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `birthday` date NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nim` (`nim`),
  KEY `fakultas_id` (`fakultas_id`,`jurusan_id`),
  KEY `jurusan_id` (`jurusan_id`),
  CONSTRAINT `student_ibfk_1` FOREIGN KEY (`jurusan_id`) REFERENCES `jurusan` (`id`),
  CONSTRAINT `student_ibfk_2` FOREIGN KEY (`fakultas_id`) REFERENCES `fakultas` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

INSERT INTO `student` (`id`, `fakultas_id`, `jurusan_id`, `nim`, `name`, `address`, `phone`, `birthday`, `created_at`, `updated_at`) VALUES
(1,	1,	1,	1611520014,	'Arief Siswanto',	'Jl Setia Jaya IX No 7A',	'083893829505',	'1996-12-26',	'2018-05-07 15:30:33',	'2018-05-07 15:31:15'),
(3,	1,	1,	1611520015,	'Arief Siswanto',	'JL Jelambar Baru',	'0099922748',	'1996-12-26',	'2018-05-07 22:27:39',	'2018-05-07 22:27:39'),
(12,	1,	1,	1611520013,	'Arief Siswanto',	'JL Jelambar Baru',	'0099922748',	'1996-12-26',	'2018-05-07 22:29:30',	'2018-05-07 22:29:30'),
(13,	1,	1,	1611520016,	'Abdillah M',	'JL Jelambar Baru',	'0099922748',	'1996-12-26',	'2018-05-07 22:29:30',	'2018-05-07 22:29:30'),
(14,	1,	1,	1611520017,	'Arista Hilman',	'JL Jelambar Baru',	'0099922748',	'1996-12-26',	'2018-05-07 22:29:30',	'2018-05-07 22:29:30'),
(15,	1,	1,	1611520018,	'Arbi JS',	'JL Jelambar Baru',	'0099922748',	'1996-12-26',	'2018-05-07 22:29:30',	'2018-05-07 22:29:30'),
(16,	1,	1,	1611520019,	'Danur S',	'JL Jelambar Baru',	'0099922748',	'1996-12-26',	'2018-05-07 22:29:30',	'2018-05-07 22:29:30'),
(17,	1,	1,	1611520020,	'Dede K',	'JL Jelambar Baru',	'0099922748',	'1996-12-26',	'2018-05-07 22:29:30',	'2018-05-07 22:29:30'),
(18,	1,	1,	1611520021,	'Dewi Yuliana',	'JL Jelambar Baru',	'0099922748',	'1996-12-26',	'2018-05-07 22:29:30',	'2018-05-07 22:29:30'),
(19,	1,	1,	1611520022,	'Annisa Untung',	'JL Jelambar Baru',	'0099922748',	'1996-12-26',	'2018-05-07 22:29:30',	'2018-05-07 22:29:30');

-- 2018-05-07 15:32:38