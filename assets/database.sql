/*
SQLyog Community v11.52 (64 bit)
MySQL - 10.1.32-MariaDB : Database - medspace
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`medspace` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `medspace`;

/*Table structure for table `admin` */

DROP TABLE IF EXISTS `admin`;

CREATE TABLE `admin` (
  `a_id` int(11) NOT NULL AUTO_INCREMENT,
  `role` int(11) DEFAULT NULL,
  `name` varchar(250) DEFAULT NULL,
  `username` varchar(250) DEFAULT NULL,
  `email_id` varchar(250) DEFAULT NULL,
  `password` varchar(250) DEFAULT NULL,
  `org_password` varchar(250) DEFAULT NULL,
  `profile_pic` varchar(250) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `create_at` datetime DEFAULT NULL,
  PRIMARY KEY (`a_id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=latin1;

/*Data for the table `admin` */

insert  into `admin`(`a_id`,`role`,`name`,`username`,`email_id`,`password`,`org_password`,`profile_pic`,`status`,`create_at`) values (1,1,'Admin','admin@gmail.com','admin@gmail.com','e10adc3949ba59abbe56e057f20f883e','123456',NULL,1,'2018-06-05 14:57:54'),(20,2,'geetha',NULL,'geetha@gmail.com','e10adc3949ba59abbe56e057f20f883e','123456',NULL,1,NULL),(22,3,'sow',NULL,'sow@gmail.com','e10adc3949ba59abbe56e057f20f883e','123456',NULL,2,NULL),(23,3,'bhanu',NULL,'bhanu@gmail.com','e10adc3949ba59abbe56e057f20f883e','123456',NULL,1,NULL),(24,4,'navya',NULL,'navya@gmail.com','e10adc3949ba59abbe56e057f20f883e','123456',NULL,1,NULL),(26,3,'priya',NULL,'raju@gmail.com','e10adc3949ba59abbe56e057f20f883e','123456',NULL,2,NULL),(27,2,'apollo',NULL,'apollo@gmail.com','e10adc3949ba59abbe56e057f20f883e','123456',NULL,1,NULL),(28,2,'landmark',NULL,'landmark@gmail.com','e10adc3949ba59abbe56e057f20f883e','123456',NULL,1,NULL),(29,2,'pooja Hospitals',NULL,'pooja@gmail.com','e10adc3949ba59abbe56e057f20f883e','123456',NULL,1,NULL),(30,2,'apollo',NULL,'babuchwdr@gmail.com','6d6257e09ecdcb1bae0f5b723e0a5c01','pollutiony',NULL,1,NULL),(31,3,'RAGHU',NULL,'raghuram7577@gmail.com','e10adc3949ba59abbe56e057f20f883e','123456',NULL,1,NULL),(32,3,'balakristna',NULL,'ravi@gmail.com','e10adc3949ba59abbe56e057f20f883e','123456',NULL,1,NULL),(33,4,'awm consulting ltd',NULL,'awm@gmail.com','e10adc3949ba59abbe56e057f20f883e','123456',NULL,1,NULL),(34,2,'svms',NULL,'svms@gmail.com','e10adc3949ba59abbe56e057f20f883e','123456',NULL,1,NULL);

/*Table structure for table `bio_medical_waste` */

DROP TABLE IF EXISTS `bio_medical_waste`;

CREATE TABLE `bio_medical_waste` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `no_of_bags` varchar(250) DEFAULT NULL,
  `no_of_kgs` varchar(250) DEFAULT NULL,
  `color_type` varchar(250) DEFAULT NULL,
  `weight_type` varchar(250) DEFAULT NULL,
  `barcode` varchar(250) DEFAULT NULL,
  `status` int(11) DEFAULT '1',
  `create_at` datetime DEFAULT NULL,
  `create_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=latin1;

/*Data for the table `bio_medical_waste` */

insert  into `bio_medical_waste`(`id`,`no_of_bags`,`no_of_kgs`,`color_type`,`weight_type`,`barcode`,`status`,`create_at`,`create_by`) values (22,'12','25','Red','Kgs','1530776693.png',1,'2018-07-05 13:14:53',20),(23,'12','30','Blue','Kgs','1530855918.png',1,'2018-07-06 11:15:18',29),(24,'4','5','Yellow','Kgs','1530855934.png',1,'2018-07-06 11:15:34',29),(25,'2','800','White (ppc)','Grams','1530855946.png',1,'2018-07-06 11:15:46',29),(26,'2','22','Red','Kgs','1530940199.png',1,'2018-07-07 10:39:59',28),(27,'1','23','Yellow','Kgs','1530940236.png',1,'2018-07-07 10:40:36',28),(28,'1','12','Blue','Kgs','1530940257.png',1,'2018-07-07 10:40:57',28),(29,'1','13','White (ppc)','Kgs','1530940271.png',1,'2018-07-07 10:41:11',28),(30,'20','20','Blue','Kgs','1530942211.png',1,'2018-07-07 11:13:31',27),(31,'1','2.5','Yellow','Kgs','1531203096.png',1,'2018-07-10 11:41:36',30),(32,'1','2.5','Yellow','Kgs','1531206207.png',1,'2018-07-10 12:33:27',30),(33,'1','3','Yellow','Kgs','1531545813.png',1,'2018-07-14 10:53:33',34),(34,'1','5','Red','Kgs','1531545942.png',1,'2018-07-14 10:55:42',34),(35,'1','6','Yellow','Kgs','1531545971.png',1,'2018-07-14 10:56:11',34),(36,'1','5.8','Red','Kgs','1531972497.png',1,'2018-07-19 09:24:57',30),(37,'25','30','Red','Grams','1532083555.png',1,'2018-07-20 16:15:54',29);

/*Table structure for table `cbwtf_daily_report` */

DROP TABLE IF EXISTS `cbwtf_daily_report`;

CREATE TABLE `cbwtf_daily_report` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `plant_id` int(11) DEFAULT NULL,
  `plant_name` varchar(250) DEFAULT NULL,
  `address` varchar(250) DEFAULT NULL,
  `yellow_no_of_Bags` varchar(250) DEFAULT NULL,
  `yellow_qty` varchar(250) DEFAULT NULL,
  `red_no_of_Bags` varchar(250) DEFAULT NULL,
  `red_qty` varchar(250) DEFAULT NULL,
  `white_no_of_Bags` varchar(250) DEFAULT NULL,
  `white_qty` varchar(250) DEFAULT NULL,
  `blue_no_of_Bags` varchar(250) DEFAULT NULL,
  `blue_qty` varchar(250) DEFAULT NULL,
  `datetime` date DEFAULT NULL,
  `create_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `cbwtf_daily_report` */

/*Table structure for table `disposal` */

DROP TABLE IF EXISTS `disposal`;

CREATE TABLE `disposal` (
  `d_id` int(11) NOT NULL AUTO_INCREMENT,
  `disposal_total` varchar(250) DEFAULT NULL,
  `disposal_qty` varchar(250) DEFAULT NULL,
  `disposal_remaining` varchar(250) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `create_at` datetime DEFAULT NULL,
  `create_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`d_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

/*Data for the table `disposal` */

insert  into `disposal`(`d_id`,`disposal_total`,`disposal_qty`,`disposal_remaining`,`status`,`create_at`,`create_by`) values (6,'100','50','50',1,'2018-06-19 14:36:34',24),(7,'200','100','100',1,'2018-06-19 14:37:24',24),(8,'20','10','10',1,'2018-06-21 16:15:35',24);

/*Table structure for table `hospital_daily_report` */

DROP TABLE IF EXISTS `hospital_daily_report`;

CREATE TABLE `hospital_daily_report` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `hospital_id` int(11) DEFAULT NULL,
  `hospital_name` varchar(250) DEFAULT NULL,
  `type` varchar(250) DEFAULT NULL,
  `address` varchar(250) DEFAULT NULL,
  `yellow_no_of_Bags` varchar(250) DEFAULT NULL,
  `yellow_qty` varchar(250) DEFAULT NULL,
  `red_no_of_Bags` varchar(250) DEFAULT NULL,
  `red_qty` varchar(250) DEFAULT NULL,
  `white_no_of_Bags` varchar(250) DEFAULT NULL,
  `white_qty` varchar(250) DEFAULT NULL,
  `blue_no_of_Bags` varchar(250) DEFAULT NULL,
  `blue_qty` varchar(250) DEFAULT NULL,
  `datetime` date DEFAULT NULL,
  `create_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `hospital_daily_report` */

/*Table structure for table `hospital_list` */

DROP TABLE IF EXISTS `hospital_list`;

CREATE TABLE `hospital_list` (
  `h_id` int(11) NOT NULL AUTO_INCREMENT,
  `a_id` int(11) DEFAULT NULL,
  `hospital_name` varchar(250) DEFAULT NULL,
  `type` varchar(250) DEFAULT NULL,
  `route_number` varchar(250) DEFAULT NULL,
  `hospital_id` varchar(250) DEFAULT NULL,
  `mobile` varchar(45) DEFAULT NULL,
  `no_of_beds` varchar(250) DEFAULT NULL,
  `email` varchar(250) DEFAULT NULL,
  `address` varchar(250) DEFAULT NULL,
  `address1` varchar(250) DEFAULT NULL,
  `address2` varchar(250) DEFAULT NULL,
  `city` varchar(250) DEFAULT NULL,
  `state` varchar(250) DEFAULT NULL,
  `country` varchar(250) DEFAULT NULL,
  `pincode` varchar(250) DEFAULT NULL,
  `captcha` varchar(250) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `create_at` datetime DEFAULT NULL,
  `barcode` varchar(250) DEFAULT NULL,
  `barcodetext` varchar(250) DEFAULT NULL,
  `create_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`h_id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

/*Data for the table `hospital_list` */

insert  into `hospital_list`(`h_id`,`a_id`,`hospital_name`,`type`,`route_number`,`hospital_id`,`mobile`,`no_of_beds`,`email`,`address`,`address1`,`address2`,`city`,`state`,`country`,`pincode`,`captcha`,`status`,`create_at`,`barcode`,`barcodetext`,`create_by`) values (19,20,'geetha','HO','2','20','9502710179',NULL,'geetha@gmail.com',NULL,'nagole','nagole','hyd','TS','India','500035','',2,'2018-06-19 11:46:09','152938896920.png','GEETHOTS20',1),(20,27,'apollo','BH','','27','9845627210',NULL,'apollo@gmail.com',NULL,'Plot No: 3, Sheshadri Nagar','Kukatpally','hyderabad','TS','india','500072','',1,'2018-07-06 11:08:13','153085549327.png','APOLBHTS27',1),(21,28,'landmark','CL','','28','9000148000',NULL,'landmark@gmail.com',NULL,'Near JNTU Metro Station Opp.Vasantha Nagar Arch',' Hyder Nagar, Kukatpally','hyderabad','TS','india','500085','',1,'2018-07-06 11:11:32','153085569228.png','LANDCLTS28',1),(22,29,'pooja Hospitals','VH','','29','0448511992',NULL,'pooja@gmail.com',NULL,'Plot No.33, Opp Rainbow Hospital, Dharma Reddy Colony, KPHB Phase II','Hydernagar','Hyderabad','TS','india','500072','',1,'2018-07-06 11:14:28','153085586829.png','POOJVHTS29',1),(23,30,'apollo','BH','','30','9949905189',NULL,'babuchwdr@gmail.com',NULL,'tpt','tpt','tpt','AP','india','517502','',1,'2018-07-10 11:33:56','153120263630.png','APOLBHAP30',1),(24,34,'svms','BH','','34','1234567891','1000','svms@gmail.com',NULL,'alipiri Road Tirupathi','alipiri Road Tirupathi','tirupathi','AP','India','517502','',1,'2018-07-14 10:46:19','153154537934.png','SVMSBHAP34',1);

/*Table structure for table `hospital_waste` */

DROP TABLE IF EXISTS `hospital_waste`;

CREATE TABLE `hospital_waste` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `h_id` int(11) DEFAULT NULL,
  `genaral_waste_kgs` varchar(250) DEFAULT NULL,
  `genaral_waste_qty` varchar(250) DEFAULT NULL,
  `infected_plastics_kgs` varchar(250) DEFAULT NULL,
  `infected_plastics_qty` varchar(250) DEFAULT NULL,
  `infected_waste_kgs` varchar(250) DEFAULT NULL,
  `infected_waste_qty` varchar(250) DEFAULT NULL,
  `glassware_watse_kgs` varchar(250) DEFAULT NULL,
  `glassware_watse_qty` varchar(250) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `total` varchar(250) DEFAULT NULL,
  `create_at` datetime DEFAULT NULL,
  `date` date DEFAULT NULL,
  `create_by` int(11) DEFAULT NULL,
  `current_address` varchar(250) DEFAULT NULL,
  `invoice_name` varchar(250) DEFAULT NULL,
  `invoice_file` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=73 DEFAULT CHARSET=latin1;

/*Data for the table `hospital_waste` */

insert  into `hospital_waste`(`id`,`h_id`,`genaral_waste_kgs`,`genaral_waste_qty`,`infected_plastics_kgs`,`infected_plastics_qty`,`infected_waste_kgs`,`infected_waste_qty`,`glassware_watse_kgs`,`glassware_watse_qty`,`status`,`total`,`create_at`,`date`,`create_by`,`current_address`,`invoice_name`,`invoice_file`) values (51,20,'2','2','2','2','2','2','2','2',1,'16','2018-06-19 12:35:06',NULL,23,'0.0,0.0','arya invoice','arya_20_51.pdf'),(52,20,'2','2','2','2','2','2','2','2',1,'16','2018-06-19 12:38:48',NULL,23,'17.4951125,78.3885862','arya invoice','arya_20_52.pdf'),(53,21,'4','3','4','3','4','3','4','3',1,'48','2018-06-21 16:20:59',NULL,23,'0.0,0.0','Anu invoice','Anu_21_53.pdf'),(54,21,'2','1','3','1','2','1','3','1',1,'10','2018-06-21 16:29:31',NULL,23,'17.4951213,78.3885971','Anu invoice','Anu_21_54.pdf'),(55,21,'100','10','500','45','55','566','667','10',1,'61300','2018-06-28 10:25:01',NULL,18,'17.4951684,78.3885117','Anu invoice','Anu_21_55.pdf'),(56,21,'66','5','87','2','10','6','20','5',1,'664','2018-06-29 14:05:58',NULL,20,'17.4951425,78.3885983','Anu invoice','Anu_21_56.pdf'),(57,21,'2','1','2','1','2','1','2','1',1,'8','2018-07-02 11:26:45',NULL,23,'0.0,0.0','Anu invoice','Anu_21_57.pdf'),(58,21,'2','1','2','1','2','1','2','1',1,'8','2018-07-02 11:28:02',NULL,23,'17.4951494,78.3886001','Anu invoice','Anu_21_58.pdf'),(59,21,'2','1','3','1','26','6','16','1',1,'177','2018-07-03 10:29:59',NULL,20,'17.4951438,78.3885972','Anu invoice','Anu_21_59.pdf'),(60,21,'20','2','25','2','46','4','50','2',1,'374','2018-07-05 12:29:58',NULL,23,'17.4950976,78.3885396','Anu invoice','Anu_21_60.pdf'),(61,21,'4','4','4','4','6','4','6','4',1,'80','2018-07-05 12:36:51',NULL,23,'17.4951477,78.3885992','Anu invoice','Anu_21_61.pdf'),(62,20,'1','1','2','2','3','3','4','1',1,'18','2018-07-06 15:08:43',NULL,23,'17.4951408,78.3885922','apollo invoice','apollo_20_62.pdf'),(63,21,'1','1','3','2','4','3','6','1',1,'25','2018-07-06 16:05:26',NULL,23,'0.0,0.0','landmark invoice','landmark_21_63.pdf'),(64,22,'8','4','9','7','3','4','8','4',1,'139','2018-07-06 16:07:11',NULL,23,'0.0,0.0','pooja Hospitals invoice','pooja Hospitals_22_64.pdf'),(65,22,'12','6','16','8','4','2','14','6',1,'292','2018-07-06 16:08:16',NULL,23,'17.4951439,78.3886094','pooja Hospitals invoice','pooja Hospitals_22_65.pdf'),(66,22,'5','2','5','2','5','2','5','2',1,'40','2018-07-07 15:10:26',NULL,23,'17.4951689,78.388615','pooja Hospitals invoice','pooja Hospitals_22_66.pdf'),(67,21,'2','1','4','3','4','2','4','1',1,'26','2018-07-12 12:28:19',NULL,23,'17.4951345,78.38859','landmark invoice','landmark_21_67.pdf'),(68,23,'4','5','7','4','7','6','9','5',1,'135','2018-07-12 12:46:26',NULL,23,'17.4951335,78.3885926','apollo invoice','apollo_23_68.pdf'),(69,23,'8','5','8','7','5','2','8','5',1,'146','2018-07-12 12:47:53',NULL,23,'0.0,0.0','apollo invoice','apollo_23_69.pdf'),(70,20,'4','2','6','6','5','4','9','2',1,'82','2018-07-12 12:58:31',NULL,23,'0.0,0.0','apollo invoice','apollo_20_70.pdf'),(71,23,'5','4','8','7','6','4','8','4',1,'132','2018-07-12 12:59:36',NULL,23,'0.0,0.0','apollo invoice','apollo_23_71.pdf'),(72,23,'12','12','56','23','3','2','5','12',1,'1498','2018-07-20 16:09:57',NULL,23,'17.4951588,78.3885896','apollo invoice','apollo_23_72.pdf');

/*Table structure for table `hospital_waste_images` */

DROP TABLE IF EXISTS `hospital_waste_images`;

CREATE TABLE `hospital_waste_images` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `hos_id` int(11) DEFAULT NULL,
  `text` varchar(250) DEFAULT NULL,
  `image` varchar(250) DEFAULT NULL,
  `create_at` datetime DEFAULT NULL,
  `creayte_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

/*Data for the table `hospital_waste_images` */

insert  into `hospital_waste_images`(`id`,`hos_id`,`text`,`image`,`create_at`,`creayte_by`) values (1,21,'','0.2915200015306980171530698016778.jpg','2018-07-04 15:23:37',20),(2,2,'','0.354821001530857141home.png','2018-07-06 11:35:41',1),(3,0,'','0.4921570015308597321530859731007.jpg','2018-07-06 12:18:52',23),(4,0,'','0.245480001530860015Screenshot_2018-05-15-20-33-26-479_com.king.candycrushsaga.png','2018-07-06 12:23:35',23),(5,0,'','0.719663001530860117Screenshot_2018-05-29-13-52-03-954_com.android.incallui.png','2018-07-06 12:25:17',23),(6,0,'','0.4123560015308601451511778487165Perfume.jpg','2018-07-06 12:25:45',23),(7,0,'','0.713704001530860826BeautyPlus_20171013183901_save.jpg','2018-07-06 12:37:06',23),(8,0,'','0.314537001530861099BeautyPlus_20171013183901_save.jpg','2018-07-06 12:41:39',23),(9,0,'','0.365867001530861192scanner_20180612_194346.jpg','2018-07-06 12:43:12',23),(10,0,'','0.533078001530863173IMG-20180706-WA0006.jpg','2018-07-06 13:16:13',23),(11,0,'','0.104202001530863318IMG-20180706-WA0003.jpg','2018-07-06 13:18:38',23),(12,0,'','0.041219001530863557IMG-20180706-WA0001.jpg','2018-07-06 13:22:37',23),(13,20,'','0.689792001530869715IMG-20180706-WA0006.jpg','2018-07-06 15:05:15',23),(14,20,'','0.784142001530869725IMG-20180706-WA0006.jpg','2018-07-06 15:05:25',23),(15,20,'','0.9157120015308698311530869825910.jpg','2018-07-06 15:07:11',23),(16,20,'','0.211153001532078593BeautyPlus_20170824094259_save.jpg','2018-07-20 14:53:16',23),(17,20,'','0.702471001532078629IMG_20180720_133009.jpg','2018-07-20 14:53:49',23);

/*Table structure for table `plant` */

DROP TABLE IF EXISTS `plant`;

CREATE TABLE `plant` (
  `p_id` int(11) NOT NULL AUTO_INCREMENT,
  `a_id` int(11) DEFAULT NULL,
  `disposal_plant_name` varchar(250) DEFAULT NULL,
  `disposal_plant_id` varchar(250) DEFAULT NULL,
  `mobile` varchar(250) DEFAULT NULL,
  `email` varchar(250) DEFAULT NULL,
  `address1` varchar(250) DEFAULT NULL,
  `address2` varchar(250) DEFAULT NULL,
  `city` varchar(250) DEFAULT NULL,
  `state` varchar(250) DEFAULT NULL,
  `country` varchar(250) DEFAULT NULL,
  `pincode` varchar(250) DEFAULT NULL,
  `captcha` varchar(250) DEFAULT NULL,
  `status` int(11) DEFAULT '1',
  `create_at` datetime DEFAULT NULL,
  `create_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`p_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

/*Data for the table `plant` */

insert  into `plant`(`p_id`,`a_id`,`disposal_plant_name`,`disposal_plant_id`,`mobile`,`email`,`address1`,`address2`,`city`,`state`,`country`,`pincode`,`captcha`,`status`,`create_at`,`create_by`) values (11,24,'navya','24','9502710179','navya@gmail.com','nagole','nagole','hyd','Telangana','India','500035','',1,'2018-06-19 12:24:27',1),(12,33,'awm consulting ltd','33','9949905189','awm@gmail.com','tpt','tpt','tpt','Andhra Pradesh','India','517502','',1,'2018-07-12 12:28:18',1);

/*Table structure for table `plant_bio_medical_waste` */

DROP TABLE IF EXISTS `plant_bio_medical_waste`;

CREATE TABLE `plant_bio_medical_waste` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `hos_bio_m_id` int(11) DEFAULT NULL,
  `no_of_bags` varchar(250) DEFAULT NULL,
  `no_of_kgs` varchar(250) DEFAULT NULL,
  `color_type` varchar(250) DEFAULT NULL,
  `weight_type` varchar(250) DEFAULT NULL,
  `edited` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT '1',
  `create_at` datetime DEFAULT NULL,
  `create_by` int(11) DEFAULT NULL,
  `invoice_file` varchar(250) DEFAULT NULL,
  `invoice_name` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=58 DEFAULT CHARSET=latin1;

/*Data for the table `plant_bio_medical_waste` */

insert  into `plant_bio_medical_waste`(`id`,`hos_bio_m_id`,`no_of_bags`,`no_of_kgs`,`color_type`,`weight_type`,`edited`,`status`,`create_at`,`create_by`,`invoice_file`,`invoice_name`) values (39,19,'12','25','Red','Kgs',0,1,'2018-07-05 13:20:21',24,NULL,NULL),(40,19,'12','25','Red','Kgs',0,1,'2018-07-06 10:29:02',24,'geetha_40.pdf','geetha invoice'),(41,19,'12','24','Red','Kgs',1,1,'2018-07-06 10:37:48',24,'geetha_41.pdf','geetha invoice'),(42,19,'12','25','Red','Kgs',0,1,'2018-07-06 10:44:40',24,NULL,NULL),(43,19,'12','25','Red','Kgs',1,1,'2018-07-06 10:47:44',24,NULL,NULL),(44,19,'12','25','Red','Kgs',1,1,'2018-07-06 10:52:51',24,NULL,NULL),(45,19,'12','25','Red','Kgs',1,1,'2018-07-06 10:53:03',24,NULL,NULL),(46,22,'12','32','Blue','Kgs',1,1,'2018-07-06 11:16:17',24,NULL,NULL),(47,22,'4','5','Yellow','Kgs',1,1,'2018-07-06 11:16:35',24,'pooja Hospitals_47.pdf','pooja Hospitals invoice'),(48,22,'2','800','White (ppc)','Grams',1,1,'2018-07-06 11:16:44',24,NULL,NULL),(49,20,'20','20','Blue','Kgs',1,1,'2018-07-07 11:13:47',24,NULL,NULL),(50,21,'2','22','Red','Kgs',1,1,'2018-07-07 15:14:52',24,NULL,NULL),(51,21,'1','23','Yellow','Kgs',1,1,'2018-07-07 15:15:06',24,'landmark_51.pdf','landmark invoice'),(52,21,'1','13','White (ppc)','Kgs',1,1,'2018-07-07 15:15:32',24,NULL,NULL),(53,21,'1','13','White (ppc)','Kgs',1,1,'2018-07-07 15:15:37',24,'landmark_53.pdf','landmark invoice'),(54,23,'1','2.5','Yellow','Kgs',1,1,'2018-07-10 11:47:13',24,NULL,NULL),(55,24,'1','3','Yellow','Kgs',1,1,'2018-07-14 11:03:56',24,NULL,NULL),(56,24,'1','3','Yellow','Kgs',1,1,'2018-07-14 11:04:20',24,NULL,NULL),(57,22,'25','30','Red','Grams',1,1,'2018-07-20 16:16:06',24,NULL,NULL);

/*Table structure for table `roles` */

DROP TABLE IF EXISTS `roles`;

CREATE TABLE `roles` (
  `r_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) DEFAULT NULL,
  `status` int(11) DEFAULT '1',
  `create` datetime DEFAULT NULL,
  PRIMARY KEY (`r_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `roles` */

/*Table structure for table `trucks` */

DROP TABLE IF EXISTS `trucks`;

CREATE TABLE `trucks` (
  `t_id` int(11) NOT NULL AUTO_INCREMENT,
  `a_id` int(11) DEFAULT NULL,
  `role` int(1) DEFAULT '3',
  `truck_reg_no` varchar(250) DEFAULT NULL,
  `owner_name` varchar(250) DEFAULT NULL,
  `insurence_number` varchar(250) DEFAULT NULL,
  `owner_mobile` varchar(250) DEFAULT NULL,
  `driver_name` varchar(250) DEFAULT NULL,
  `driver_lic_no` varchar(250) DEFAULT NULL,
  `driver_lic_bad_no` varchar(250) DEFAULT NULL,
  `driver_mobile` varchar(250) DEFAULT NULL,
  `route_no` varchar(250) DEFAULT NULL,
  `description` varchar(250) DEFAULT NULL,
  `email` varchar(250) DEFAULT NULL,
  `address1` varchar(250) DEFAULT NULL,
  `address2` varchar(250) DEFAULT NULL,
  `city` varchar(250) DEFAULT NULL,
  `state` varchar(250) DEFAULT NULL,
  `country` varchar(250) DEFAULT NULL,
  `pincode` varchar(250) DEFAULT NULL,
  `captcha` varchar(250) DEFAULT NULL,
  `status` int(11) DEFAULT '1',
  `create_at` datetime DEFAULT NULL,
  `create_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`t_id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

/*Data for the table `trucks` */

insert  into `trucks`(`t_id`,`a_id`,`role`,`truck_reg_no`,`owner_name`,`insurence_number`,`owner_mobile`,`driver_name`,`driver_lic_no`,`driver_lic_bad_no`,`driver_mobile`,`route_no`,`description`,`email`,`address1`,`address2`,`city`,`state`,`country`,`pincode`,`captcha`,`status`,`create_at`,`create_by`) values (12,22,3,'Ts01ap2345','sow','1234','9502710179','sri','12345','1','9502710179','','test','sow@gmail.com','nagole','nagole','hyd','Telangana','India','500035','',2,'2018-06-19 12:10:12',1),(13,23,3,'Ts01ap2345','bhanu','1234','9502710179','sri','12345','1','9502710179','','test','bhanu@gmail.com','nagole','nagole','hyd','Telangana','India','500035','',1,'2018-06-19 12:19:13',1),(14,26,3,'TS01ap2548','priya','4457547452','9875412354','Raju','2354484785','58','9552455452','','','raju@gmail.com','7-78','SR Nagar','Hyderabad','Telangana','India','502484','',2,'2018-06-21 15:48:51',1),(15,31,3,'TS01RR2311','RAGHU','6767676','9878787878','SAI','878776','09','8789898987','','','raghuram7577@gmail.com','PLOT 66','PLOT 66','hyderabad','Andhra Pradesh','india','515001','',1,'2018-07-10 15:35:35',1),(16,32,3,'ap03td3674','balakristna','123456','9949905189','ravi','12','12','1234567891','','','ravi@gmail.com','tpt','tpt','tpt','Andhra Pradesh','India','517502','',1,'2018-07-12 12:26:50',1);

/*Table structure for table `waste` */

DROP TABLE IF EXISTS `waste`;

CREATE TABLE `waste` (
  `w_id` int(11) NOT NULL AUTO_INCREMENT,
  `truck_id` varchar(250) DEFAULT NULL,
  `route_id` varchar(250) DEFAULT NULL,
  `gen_waste_in_Kg` varchar(250) DEFAULT NULL,
  `gen_waste_in_qty` varchar(250) DEFAULT NULL,
  `inf_pla_waste_in_Kg` varchar(250) DEFAULT NULL,
  `inf_pla_waste_in_qty` varchar(250) DEFAULT NULL,
  `inf_waste_in_Kg` varchar(250) DEFAULT NULL,
  `inf_waste_in_qty` varchar(250) DEFAULT NULL,
  `glassware_waste_in_kg` varchar(250) DEFAULT NULL,
  `glassware_waste_in_qty` varchar(250) DEFAULT NULL,
  `total_waste` varchar(250) DEFAULT NULL,
  `status` int(11) DEFAULT '1',
  `create_at` datetime DEFAULT NULL,
  `create_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`w_id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

/*Data for the table `waste` */

insert  into `waste`(`w_id`,`truck_id`,`route_id`,`gen_waste_in_Kg`,`gen_waste_in_qty`,`inf_pla_waste_in_Kg`,`inf_pla_waste_in_qty`,`inf_waste_in_Kg`,`inf_waste_in_qty`,`glassware_waste_in_kg`,`glassware_waste_in_qty`,`total_waste`,`status`,`create_at`,`create_by`) values (15,'12','','3','3','3','3','3','3','3','3','36',1,'2018-06-19 14:28:03',24),(16,'12','','5','2','5','2','5','2','5','2','40',1,'2018-07-07 15:20:59',24);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
