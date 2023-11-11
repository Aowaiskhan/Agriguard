 
CREATE DATABASE  db_kishan_insurance;

USE `db_kishan_insurance`;

/*Table structure for table `category` */

DROP TABLE IF EXISTS `category`;

CREATE TABLE `category` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `description` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
);

/*Data for the table `category` */

insert  into `category`(`id`,`name`,`description`,`status`,`created_at`,`updated_at`) values 
(1,'Rabbi Phasal','Cateogry desc',1,'2022-02-03 08:52:50','2023-11-02 08:06:44'),
(2,'Khariph','Cateogry desc',1,'2022-02-03 08:53:32','2023-11-02 08:06:57'),
(3,'Dhan','Cateogry desc',1,'2022-02-03 08:54:52','2023-11-02 08:07:04'),
(4,'tratakr','Cateogry desc',1,'2022-02-03 08:56:25','2023-11-02 10:13:18'),
(5,'Test Category','dec',1,'2023-11-02 07:22:39',NULL),
(6,'rajesh','dds',1,'2023-11-02 07:32:58',NULL),
(7,'suresh','klsdfkjls',1,'2023-11-02 07:34:40',NULL),
(8,'kk','kkk',1,'2023-11-02 07:39:50',NULL),
(9,'kk','kkk',1,'2023-11-02 07:45:10',NULL);

/*Table structure for table `claim_details` */

DROP TABLE IF EXISTS `claim_details`;

CREATE TABLE `claim_details` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int DEFAULT NULL,
  `insurance_id` int DEFAULT NULL,
  `claim_amt` float DEFAULT NULL,
  `claim_percentage` float DEFAULT NULL,
  `received_amt` float DEFAULT NULL,
  `status` enum('Approved','Pending','Rejected','Disposed','Processing') DEFAULT 'Pending',
  `status_desc` text,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ;

/*Data for the table `claim_details` */

/*Table structure for table `client_list` */

DROP TABLE IF EXISTS `client_list`;

CREATE TABLE `client_list` (
  `id` int NOT NULL AUTO_INCREMENT,
  `code` varchar(100) NOT NULL,
  `firstname` text NOT NULL,
  `middlename` text NOT NULL,
  `lastname` text NOT NULL,
  `gender` varchar(100) NOT NULL,
  `dob` date NOT NULL,
  `contact` text NOT NULL,
  `email` text NOT NULL,
  `address` text NOT NULL,
  `image_path` text,
  `status` tinyint NOT NULL DEFAULT '1',
  `delete_flag` tinyint NOT NULL DEFAULT '0',
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_updated` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ;

/*Data for the table `client_list` */

insert  into `client_list`(`id`,`code`,`firstname`,`middlename`,`lastname`,`gender`,`dob`,`contact`,`email`,`address`,`image_path`,`status`,`delete_flag`,`date_created`,`date_updated`) values 
(1,'202202-00001','Mark','D','Cooper','Male','1997-06-23','09123456789','mcooper@sample.com','Block 6 Lot 23, Here Subd., Over There, Anywhere 2306','uploads/clients/1.png?v=1643856423',1,0,'2022-02-03 10:45:56','2022-02-03 10:47:03'),
(2,'202202-00002','Claire','C','Blake','Male','1997-10-14','09456789312','cblake@sample.com','This is her sample address.','uploads/clients/2.png?v=1643859659',1,0,'2022-02-03 11:40:59','2022-02-03 11:40:59'),
(3,'202202-00003','Test12312','Test','Test','Male','2022-02-14','0956465798798','test@samnple.com','Test',NULL,0,1,'2022-02-03 11:41:25','2022-02-03 11:42:47');

/*Table structure for table `insurance_list` */

DROP TABLE IF EXISTS `insurance_list`;

CREATE TABLE `insurance_list` (
  `id` int NOT NULL AUTO_INCREMENT,
  `policy_id` int NOT NULL,
  `code` varchar(100) NOT NULL,
  `insurance_term` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `coverage` float NOT NULL DEFAULT '0',
  `premium` float NOT NULL,
  `details` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `terms_condition` text,
  `status` tinyint NOT NULL DEFAULT '1',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `policy_id` (`policy_id`),
  CONSTRAINT `insurance_list_ibfk_1` FOREIGN KEY (`policy_id`) REFERENCES `policy_list` (`id`) ON DELETE CASCADE
) ;

/*Data for the table `insurance_list` */

insert  into `insurance_list`(`id`,`policy_id`,`code`,`insurance_term`,`coverage`,`premium`,`details`,`terms_condition`,`status`,`created_at`,`updated_at`) values 
(1,2,'202202-00001','GBN-23141507',4999.99,123655000,'Sample Vehicle 101','temmmm',1,'2022-02-03 13:49:19','2023-11-02 08:39:32'),
(3,4,'202202-00002','654985158',1500,5489800000,'Sample 74844158',NULL,1,'2022-02-03 15:16:15','2023-11-02 10:14:23'),
(4,3,'202202-00003','8798754564',4000,8789560000,'Sample Vehicle',NULL,1,'2022-02-03 15:18:47',NULL),
(5,3,'202202-00004','8798754564',4000,8789560000,'Sample Vehicle 101',NULL,1,'2022-02-03 15:19:13',NULL),
(6,1,'cs001','kjklj',4000,50,'delhisdfs','skfjsld',1,'2023-11-02 08:25:28',NULL),
(7,1,'2023-2024','six month',100000,20000,'ddslfsl s','condition gien in destisl',1,'2023-11-02 13:51:48',NULL);

/*Table structure for table `policy_list` */

DROP TABLE IF EXISTS `policy_list`;

CREATE TABLE `policy_list` (
  `id` int NOT NULL AUTO_INCREMENT,
  `category_id` int NOT NULL,
  `code` varchar(100) NOT NULL,
  `name` text NOT NULL,
  `description` text NOT NULL,
  `duration` float NOT NULL DEFAULT '0',
  `cost` float NOT NULL DEFAULT '0',
  `doc_path` text,
  `status` tinyint NOT NULL DEFAULT '1',
  `delete_flag` tinyint NOT NULL DEFAULT '0',
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_updated` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `category_id` (`category_id`),
  CONSTRAINT `policy_list_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE CASCADE
);

/*Data for the table `policy_list` */

insert  into `policy_list`(`id`,`category_id`,`code`,`name`,`description`,`duration`,`cost`,`doc_path`,`status`,`delete_flag`,`date_created`,`date_updated`) values 
(1,2,'123456789','Policy101','policy desc',1,1500,'uploads/policies/1.pdf?v=1643853360',1,0,'2022-02-03 09:34:32','2023-11-02 08:01:04'),
(2,4,'23061415','Policy102','policy desc',3,4999.99,'uploads/policies/2.pdf?v=1643853724',1,0,'2022-02-03 10:02:04','2023-11-02 08:01:10'),
(3,1,'987654321','Commercial Policy1001','policy desc',1,4000,'uploads/policies/3.pdf?v=1643853870',1,0,'2022-02-03 10:04:30','2023-11-02 08:01:23'),
(4,8,'kk001','rajesh','descption',12,1200,'dd/dd.pmh',1,0,'2023-11-02 08:00:15',NULL);

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `password` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `avatar` tinytext CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `usertype` enum('Admin','User','Agent') NOT NULL DEFAULT 'User',
  `status` int NOT NULL DEFAULT '1' COMMENT '0=not verified, 1 = verified',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `reset_token` text,
  `reset_token_expires` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ;

/*Data for the table `users` */

insert  into `users`(`id`,`username`,`password`,`email`,`name`,`avatar`,`usertype`,`status`,`created_at`,`updated_at`,`reset_token`,`reset_token_expires`) values 
(1,'admin','admin','admin@gmail.com','Adminstrator','profile/default.png','Admin',1,'2021-01-20 14:02:37','2023-11-02 10:55:50','45a9225a5f1bd9c65d75d4be6946c9f0','2023-10-27 17:11:41'),
(11,'rajesh','rajesh','suresh@gmail.com','suresh ','profile/bank-account.png','User',1,'2023-10-27 21:23:41','2023-11-02 11:07:07',NULL,NULL);

/*Table structure for table `users_insurance` */

DROP TABLE IF EXISTS `users_insurance`;

CREATE TABLE `users_insurance` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `user_id` int DEFAULT NULL,
  `insurance_id` int DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `primum_amount` float DEFAULT NULL,
  `coverage` float DEFAULT NULL,
  `claim_amount` float DEFAULT NULL,
  `claim_percentage` float DEFAULT NULL,
  `given_by` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `approved_date` datetime DEFAULT NULL,
  `rejecte_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ;

/*Data for the table `users_insurance` */

insert  into `users_insurance`(`id`,`user_id`,`insurance_id`,`status`,`primum_amount`,`coverage`,`claim_amount`,`claim_percentage`,`given_by`,`created_at`,`approved_date`,`rejecte_date`) values 
(1,11,4,NULL,8789560000,4000,NULL,NULL,'11','2023-11-02 11:58:26',NULL,NULL),
(2,11,5,NULL,8789560000,4000,NULL,NULL,'11','2023-11-02 12:05:13',NULL,NULL),
(3,11,4,NULL,8789560000,4000,NULL,NULL,'11','2023-11-02 12:32:53',NULL,NULL),
(4,11,4,NULL,8789560000,4000,NULL,NULL,'11','2023-11-02 13:29:01',NULL,NULL);

 
