/*
SQLyog Community v12.01 (64 bit)
MySQL - 5.1.41 : Database - sistem_mentoring
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`sistem_mentoring` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `sistem_mentoring`;

/*Table structure for table `anggota_kelompok` */

DROP TABLE IF EXISTS `anggota_kelompok`;

CREATE TABLE `anggota_kelompok` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_kelompok` int(11) DEFAULT NULL,
  `id_anggota` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_kelompok` (`id_kelompok`),
  KEY `id_anggota` (`id_anggota`),
  CONSTRAINT `anggota_kelompok_ibfk_1` FOREIGN KEY (`id_kelompok`) REFERENCES `kelompok_mentoring` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `anggota_kelompok_ibfk_2` FOREIGN KEY (`id_anggota`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `anggota_kelompok` */

/*Table structure for table `kehadiran_mentee` */

DROP TABLE IF EXISTS `kehadiran_mentee`;

CREATE TABLE `kehadiran_mentee` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_mentee` int(11) DEFAULT NULL,
  `id_log` int(11) DEFAULT NULL,
  `kehadiran` varchar(2) DEFAULT NULL,
  `keterangan` text,
  PRIMARY KEY (`id`),
  KEY `id_mentee` (`id_mentee`),
  KEY `id_log` (`id_log`),
  CONSTRAINT `kehadiran_mentee_ibfk_1` FOREIGN KEY (`id_mentee`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `kehadiran_mentee_ibfk_2` FOREIGN KEY (`id_log`) REFERENCES `log_mentoring` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `kehadiran_mentee` */

/*Table structure for table `kelompok_mentoring` */

DROP TABLE IF EXISTS `kelompok_mentoring`;

CREATE TABLE `kelompok_mentoring` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_mentor` int(11) DEFAULT NULL,
  `nama` varchar(16) DEFAULT NULL,
  `tanggal_aktif` date DEFAULT NULL,
  `gender` char(1) DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_mentor` (`id_mentor`),
  CONSTRAINT `kelompok_mentoring_ibfk_1` FOREIGN KEY (`id_mentor`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `kelompok_mentoring` */

/*Table structure for table `log` */

DROP TABLE IF EXISTS `log`;

CREATE TABLE `log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `timestamp` datetime DEFAULT NULL,
  `aktivitas` varchar(128) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `log` */

/*Table structure for table `log_mentoring` */

DROP TABLE IF EXISTS `log_mentoring`;

CREATE TABLE `log_mentoring` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_kelompok` int(11) DEFAULT NULL,
  `id_periode` int(11) DEFAULT NULL,
  `rencana_berikutnya` text,
  `penugasan` text,
  `id_pengisi` int(11) DEFAULT NULL,
  `id_materi` int(11) DEFAULT NULL,
  `lokasi` varchar(64) DEFAULT NULL,
  `metode_penyampaian` text,
  `tanggal` date DEFAULT NULL,
  `jam_mulai` time DEFAULT NULL,
  `jam_selesai` time DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_kelompok` (`id_kelompok`),
  KEY `id_periode` (`id_periode`),
  KEY `id_pengisi` (`id_pengisi`),
  KEY `id_materi` (`id_materi`),
  CONSTRAINT `log_mentoring_ibfk_1` FOREIGN KEY (`id_kelompok`) REFERENCES `kelompok_mentoring` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `log_mentoring_ibfk_2` FOREIGN KEY (`id_periode`) REFERENCES `periode` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `log_mentoring_ibfk_3` FOREIGN KEY (`id_pengisi`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `log_mentoring_ibfk_4` FOREIGN KEY (`id_materi`) REFERENCES `materi_mentoring` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `log_mentoring` */

/*Table structure for table `materi_mentoring` */

DROP TABLE IF EXISTS `materi_mentoring`;

CREATE TABLE `materi_mentoring` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_tingkat` int(11) DEFAULT NULL,
  `judul` varchar(32) DEFAULT NULL,
  `deskripsi` text,
  `bahan` varchar(64) DEFAULT NULL,
  `tanggal_mulai` date DEFAULT NULL,
  `tanggal_berakhir` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_tingkat` (`id_tingkat`),
  CONSTRAINT `materi_mentoring_ibfk_1` FOREIGN KEY (`id_tingkat`) REFERENCES `tingkat` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `materi_mentoring` */

/*Table structure for table `pendidikan` */

DROP TABLE IF EXISTS `pendidikan`;

CREATE TABLE `pendidikan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `tingkat` varchar(16) DEFAULT NULL,
  `institusi` varchar(32) DEFAULT NULL,
  `kelas` varchar(16) DEFAULT NULL,
  `jurusan` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `pendidikan_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `pendidikan` */

/*Table structure for table `pengumuman` */

DROP TABLE IF EXISTS `pengumuman`;

CREATE TABLE `pengumuman` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `judul` varchar(23) DEFAULT NULL,
  `konten` text,
  `timestamp` datetime DEFAULT NULL,
  `jenis` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `pengumuman_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `pengumuman` */

/*Table structure for table `periode` */

DROP TABLE IF EXISTS `periode`;

CREATE TABLE `periode` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(20) DEFAULT NULL,
  `tanggal_mulai` date DEFAULT NULL,
  `tanggal_berakhir` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `periode` */

/*Table structure for table `pesan` */

DROP TABLE IF EXISTS `pesan`;

CREATE TABLE `pesan` (
  `id_pesan` int(11) NOT NULL AUTO_INCREMENT,
  `id_pengirim` int(11) DEFAULT NULL,
  `id_penerima` int(11) DEFAULT NULL,
  `judul` varchar(128) DEFAULT NULL,
  `isi` text,
  `urgensi` varchar(16) DEFAULT NULL,
  `timestamp` datetime DEFAULT NULL,
  PRIMARY KEY (`id_pesan`),
  KEY `id_pengirim` (`id_pengirim`),
  KEY `id_penerima` (`id_penerima`),
  CONSTRAINT `pesan_ibfk_1` FOREIGN KEY (`id_pengirim`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `pesan_ibfk_2` FOREIGN KEY (`id_penerima`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `pesan` */

/*Table structure for table `role` */

DROP TABLE IF EXISTS `role`;

CREATE TABLE `role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role_name` varchar(16) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `role` */

insert  into `role`(`id`,`role_name`) values (1,'Admin'),(2,'Pembinaan'),(3,'Mentor'),(4,'Mentee');

/*Table structure for table `tingkat` */

DROP TABLE IF EXISTS `tingkat`;

CREATE TABLE `tingkat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tingkat` */

/*Table structure for table `user` */

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(10) DEFAULT NULL,
  `nama` varchar(30) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `gender` char(1) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `jumlah_kakak` varchar(2) DEFAULT NULL,
  `jumlah_adik` varchar(2) DEFAULT NULL,
  `angkatan` char(4) DEFAULT NULL,
  `golongan_darah` char(1) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `nama_ayah` varchar(30) DEFAULT NULL,
  `pekerjaan_ayah` varchar(30) DEFAULT NULL,
  `nama_ibu` varchar(30) DEFAULT NULL,
  `pekerjaan_ibu` varchar(30) DEFAULT NULL,
  `alamat_rumah` varchar(255) DEFAULT NULL,
  `alamat_kos` varchar(255) DEFAULT NULL,
  `no_hp` varchar(12) DEFAULT NULL,
  `telepon_rumah` varchar(12) DEFAULT NULL,
  `status_perkawinan` varchar(10) DEFAULT NULL,
  `state` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `user` */

insert  into `user`(`id`,`username`,`nama`,`password`,`foto`,`gender`,`email`,`jumlah_kakak`,`jumlah_adik`,`angkatan`,`golongan_darah`,`tanggal_lahir`,`nama_ayah`,`pekerjaan_ayah`,`nama_ibu`,`pekerjaan_ibu`,`alamat_rumah`,`alamat_kos`,`no_hp`,`telepon_rumah`,`status_perkawinan`,`state`) values (1,'ryan.riand','ryan','10c7ccc7a4f0aff03c915c485565b9da',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(2,'ryan','ryan','10c7ccc7a4f0aff03c915c485565b9da',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(3,'riandi','ryan','10c7ccc7a4f0aff03c915c485565b9da',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(4,'riandi.rya',NULL,'10c7ccc7a4f0aff03c915c485565b9da',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);

/*Table structure for table `user_role` */

DROP TABLE IF EXISTS `user_role`;

CREATE TABLE `user_role` (
  `user_id` int(11) DEFAULT NULL,
  `role_id` int(11) DEFAULT NULL,
  KEY `user_id` (`user_id`),
  KEY `role_id` (`role_id`),
  CONSTRAINT `user_role_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `user_role_ibfk_2` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `user_role` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
