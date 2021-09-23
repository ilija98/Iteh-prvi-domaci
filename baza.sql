/*
SQLyog Community v13.1.6 (64 bit)
MySQL - 10.4.11-MariaDB : Database - teatar
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`nastup` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `nastup`;
/*Table structure for table `vrste_nastupa` */

DROP TABLE IF EXISTS `vrste_nastupa`;

CREATE TABLE `vrste_nastupa` (
  `id_vrste` int(11) NOT NULL,
  `naziv_vrste` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_vrste`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*Table structure for table `nastup` */

DROP TABLE IF EXISTS `nastup`;

CREATE TABLE `nastup` (
  `id_nastupa` int(11) NOT NULL AUTO_INCREMENT,
  `naslov` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cena` int(11) NOT NULL,
  `trajanje` int(11) NOT NULL,
  `datum_izvodjenja` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `id_vrste` int(11) NOT NULL,
  PRIMARY KEY (`id_nastupa`),
  KEY `id_vrste` (`id_vrste`),
  CONSTRAINT `nastup_ibfk_1` FOREIGN KEY (`id_vrste`) REFERENCES `vrste_nastupa` (`id_vrste`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;





/*Data for the table `vrste_nastupa` */

insert  into `vrste_nastupa`(`id_vrste`,`naziv_vrste`) values 
(1,'Tragedija'),
(2,'Komedija'),
(3,'Opera'),
(4,'Mjuzikl'),
(5,'Balet'),
(6,'Stand-up');

/*Data for the table `nastup` */

insert  into `nastup`(`id_nastupa`,`naslov`,`cena`,`trajanje`,`datum_izvodjenja`,`id_vrste`) values 
(8,'Kakva ti je zena takav ti je zivot',250,120,'11.11.2019.',2);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
