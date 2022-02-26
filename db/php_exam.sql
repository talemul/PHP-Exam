/*
SQLyog Ultimate v11.11 (64 bit)
MySQL - 5.7.28-log : Database - php_exam
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`php_exam` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `php_exam`;

/*Table structure for table `transactions` */

DROP TABLE IF EXISTS `transactions`;

CREATE TABLE `transactions` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `amount` int(10) NOT NULL,
  `buyer` varchar(255) NOT NULL,
  `receipt_id` varchar(20) NOT NULL,
  `items` varchar(255) NOT NULL,
  `buyer_email` varchar(50) NOT NULL,
  `buyer_ip` varchar(20) NOT NULL,
  `note` text NOT NULL,
  `city` varchar(20) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `hash_key` varchar(255) NOT NULL,
  `entry_at` date NOT NULL,
  `entry_by` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4;

/*Data for the table `transactions` */

insert  into `transactions`(`id`,`amount`,`buyer`,`receipt_id`,`items`,`buyer_email`,`buyer_ip`,`note`,`city`,`phone`,`hash_key`,`entry_at`,`entry_by`) values (12,12,'adsadd d 231','ssd','sdf','talemulwi@gmail.com','103.134.24.17','d','Dhaka','01700718951','96d0902c1e2dbce59a3208130f0242bef3bfcc2e71b66756150158dc317280ccab63c9d664babaa1bcff0458ad55b73445ea90aedbb8a15e4c467f2fca276351','2022-02-25',12);
insert  into `transactions`(`id`,`amount`,`buyer`,`receipt_id`,`items`,`buyer_email`,`buyer_ip`,`note`,`city`,`phone`,`hash_key`,`entry_at`,`entry_by`) values (13,12,'dsf','df','df','iamtalemul@gmail.com','103.134.24.17','df','Dhaka','01937517989','2e830f8cac9075e3d57805230a1a8db46ab988eb7ea6bb819851a9b87a0b0594bef217968c72a07519d6cd07e377f480491092314db17f2ccac6a0a1377fbe0c','2022-02-25',23);
insert  into `transactions`(`id`,`amount`,`buyer`,`receipt_id`,`items`,`buyer_email`,`buyer_ip`,`note`,`city`,`phone`,`hash_key`,`entry_at`,`entry_by`) values (14,12,'dsf','df','df','iamtalemul@gmail.com','103.134.24.17','df','Dhaka','01937517989','2e830f8cac9075e3d57805230a1a8db46ab988eb7ea6bb819851a9b87a0b0594bef217968c72a07519d6cd07e377f480491092314db17f2ccac6a0a1377fbe0c','2022-02-25',23);
insert  into `transactions`(`id`,`amount`,`buyer`,`receipt_id`,`items`,`buyer_email`,`buyer_ip`,`note`,`city`,`phone`,`hash_key`,`entry_at`,`entry_by`) values (15,12,'dsf','df','df','iamtalemul@gmail.com','103.134.24.17','df','Dhaka','01937517989','2e830f8cac9075e3d57805230a1a8db46ab988eb7ea6bb819851a9b87a0b0594bef217968c72a07519d6cd07e377f480491092314db17f2ccac6a0a1377fbe0c','2022-02-25',23);
insert  into `transactions`(`id`,`amount`,`buyer`,`receipt_id`,`items`,`buyer_email`,`buyer_ip`,`note`,`city`,`phone`,`hash_key`,`entry_at`,`entry_by`) values (16,12,'dsf','df','df','iamtalemul@gmail.com','103.134.24.17','df','Dhaka','01937517989','2e830f8cac9075e3d57805230a1a8db46ab988eb7ea6bb819851a9b87a0b0594bef217968c72a07519d6cd07e377f480491092314db17f2ccac6a0a1377fbe0c','2022-02-25',23);
insert  into `transactions`(`id`,`amount`,`buyer`,`receipt_id`,`items`,`buyer_email`,`buyer_ip`,`note`,`city`,`phone`,`hash_key`,`entry_at`,`entry_by`) values (17,23,'23','df','fd','talemul@yhaoo.com','103.134.24.17','dsf','Dhaka','01937517989','2e830f8cac9075e3d57805230a1a8db46ab988eb7ea6bb819851a9b87a0b0594bef217968c72a07519d6cd07e377f480491092314db17f2ccac6a0a1377fbe0c','2022-02-25',34);
insert  into `transactions`(`id`,`amount`,`buyer`,`receipt_id`,`items`,`buyer_email`,`buyer_ip`,`note`,`city`,`phone`,`hash_key`,`entry_at`,`entry_by`) values (18,23,'23','df','fd','talemul@yhaoo.com','103.134.24.17','dsf','Dhaka','01937517989','2e830f8cac9075e3d57805230a1a8db46ab988eb7ea6bb819851a9b87a0b0594bef217968c72a07519d6cd07e377f480491092314db17f2ccac6a0a1377fbe0c','2022-02-25',34);
insert  into `transactions`(`id`,`amount`,`buyer`,`receipt_id`,`items`,`buyer_email`,`buyer_ip`,`note`,`city`,`phone`,`hash_key`,`entry_at`,`entry_by`) values (19,23,'23','df','fd','talemul@yhaoo.com','103.134.24.17','dsf','Dhaka','01937517989','2e830f8cac9075e3d57805230a1a8db46ab988eb7ea6bb819851a9b87a0b0594bef217968c72a07519d6cd07e377f480491092314db17f2ccac6a0a1377fbe0c','2022-02-25',34);
insert  into `transactions`(`id`,`amount`,`buyer`,`receipt_id`,`items`,`buyer_email`,`buyer_ip`,`note`,`city`,`phone`,`hash_key`,`entry_at`,`entry_by`) values (20,499,'12345678901234567890','wew','rewt','iamtalemul@gmail.com','103.134.24.17','à¦°à¦•à¦®à¦¾à¦°à¦¿ à¦®à¦¾à¦¨à§‡à¦‡ à¦—à§à¦°à¦¾à¦¹à¦•à¦¦à§‡à¦° à¦œà¦¨à§à¦¯ à¦à¦•à§à¦¸à¦Ÿà§à¦°à¦¾','Barguna','01937517989','3b8b278872b4986c8d9ee301238289d277f18b76e42060be846baa86f2ade8f338dec5b9d0ba8d483dd98c2a4b93fc198536ba8147de327ef83e8280a3b6a5e6','2022-02-25',12);
insert  into `transactions`(`id`,`amount`,`buyer`,`receipt_id`,`items`,`buyer_email`,`buyer_ip`,`note`,`city`,`phone`,`hash_key`,`entry_at`,`entry_by`) values (21,12,'23234','df','dsf','talemul@ssd-tech.io','103.134.24.17','dsfds dfd','Dhaka','8801937517989','2e830f8cac9075e3d57805230a1a8db46ab988eb7ea6bb819851a9b87a0b0594bef217968c72a07519d6cd07e377f480491092314db17f2ccac6a0a1377fbe0c','2022-02-26',12);
insert  into `transactions`(`id`,`amount`,`buyer`,`receipt_id`,`items`,`buyer_email`,`buyer_ip`,`note`,`city`,`phone`,`hash_key`,`entry_at`,`entry_by`) values (22,12,'23234','df','dsf','talemul@ssd-tech.io','103.134.24.17','dsfds dfd','Dhaka','8801937517989','2e830f8cac9075e3d57805230a1a8db46ab988eb7ea6bb819851a9b87a0b0594bef217968c72a07519d6cd07e377f480491092314db17f2ccac6a0a1377fbe0c','2022-02-26',12);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
