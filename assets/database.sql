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
  `mobile` varchar(250) DEFAULT NULL,
  `username` varchar(250) DEFAULT NULL,
  `email_id` varchar(250) DEFAULT NULL,
  `password` varchar(250) DEFAULT NULL,
  `org_password` varchar(250) DEFAULT NULL,
  `address1` varchar(250) DEFAULT NULL,
  `address2` varchar(250) DEFAULT NULL,
  `city` varchar(250) DEFAULT NULL,
  `state` varchar(250) DEFAULT NULL,
  `country` varchar(250) DEFAULT NULL,
  `pincode` varchar(250) DEFAULT NULL,
  `profile_pic` varchar(250) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `qr_code` varchar(250) DEFAULT NULL,
  `qr_code_text` varchar(250) DEFAULT NULL,
  `create_at` datetime DEFAULT NULL,
  `create_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`a_id`)
) ENGINE=InnoDB AUTO_INCREMENT=264 DEFAULT CHARSET=latin1;

/*Data for the table `admin` */

insert  into `admin`(`a_id`,`role`,`name`,`mobile`,`username`,`email_id`,`password`,`org_password`,`address1`,`address2`,`city`,`state`,`country`,`pincode`,`profile_pic`,`status`,`qr_code`,`qr_code_text`,`create_at`,`create_by`) values (1,5,'GOvt','2233223322',NULL,'gov@gmail.com','e10adc3949ba59abbe56e057f20f883e','123456',NULL,NULL,NULL,'AP',NULL,NULL,'0.33893200156568446057760522_2270185806375485_3272724444866412544_n.jpg',1,NULL,NULL,NULL,NULL),(2,0,'Super admin',NULL,NULL,'superadmin@gmail.com','e10adc3949ba59abbe56e057f20f883e','123456',NULL,NULL,NULL,'AP',NULL,NULL,NULL,1,NULL,NULL,NULL,NULL),(3,5,'Odisha','Odisha',NULL,'odishagov@gmail.com','e10adc3949ba59abbe56e057f20f883e','123456',NULL,NULL,NULL,'OD','India',NULL,'0.02280100156568447561198406_426266057924962_5785865059938861056_n.jpg',1,NULL,NULL,NULL,NULL),(203,1,'PRACHA ADMIN','9875455455',NULL,'admin@gmail.com','e10adc3949ba59abbe56e057f20f883e','123456','kphb','','Hyderabad','AP','India','502300',NULL,2,NULL,NULL,'2019-03-18 11:18:14',2),(204,4,'JAHNAVI',NULL,NULL,'janu@gmail.com','e10adc3949ba59abbe56e057f20f883e','123456',NULL,NULL,NULL,'AP',NULL,NULL,NULL,1,NULL,NULL,NULL,NULL),(205,2,'PRACHAHOSPITAL',NULL,NULL,'prachahospital@gmail.com','e10adc3949ba59abbe56e057f20f883e','123456',NULL,NULL,NULL,'AP',NULL,NULL,NULL,0,NULL,NULL,NULL,NULL),(206,3,'KAVYA',NULL,NULL,'bmw@gmail.com','e10adc3949ba59abbe56e057f20f883e','123456',NULL,NULL,NULL,'AP',NULL,NULL,NULL,1,NULL,NULL,NULL,NULL),(207,1,'ADMIN','9958565233',NULL,'admin@gmail.com','e10adc3949ba59abbe56e057f20f883e','123456','nagole','nagole','Hyderabad','AP','India','500035',NULL,1,NULL,NULL,'2019-03-18 16:40:07',2),(208,4,'PREETHI','0756123784',NULL,'preethi@gmail.com','e10adc3949ba59abbe56e057f20f883e','123456',NULL,NULL,NULL,'AP',NULL,NULL,NULL,2,NULL,NULL,NULL,NULL),(209,3,'ANU',NULL,NULL,'bbmw@gmail.com','e10adc3949ba59abbe56e057f20f883e','123456',NULL,NULL,NULL,'AP',NULL,NULL,NULL,2,NULL,NULL,NULL,NULL),(211,2,'RAGHU','0949442277',NULL,'raghuram8328@gmail.com','e10adc3949ba59abbe56e057f20f883e','123456',NULL,NULL,NULL,'AP',NULL,NULL,NULL,1,NULL,NULL,NULL,NULL),(212,3,'RAGHU','9291622365',NULL,'dr@gmail.com','e10adc3949ba59abbe56e057f20f883e','123456',NULL,NULL,NULL,'AP',NULL,NULL,NULL,1,'1569306605.png','212',NULL,NULL),(213,2,'BABY HOSPITAL','9966511601',NULL,'raghuram7577@gmail.com','e10adc3949ba59abbe56e057f20f883e','123456',NULL,NULL,NULL,'AP',NULL,NULL,NULL,1,NULL,NULL,NULL,NULL),(214,4,'SRIVEN ENVIRON TECHNOLOGIES ','9573489997',NULL,'srivenplant@gmail.com','e10adc3949ba59abbe56e057f20f883e','123456',NULL,NULL,NULL,'AP',NULL,NULL,'0.39747100156887337761198406_426266057924962_5785865059938861056_n.jpg',1,NULL,NULL,NULL,NULL),(215,2,'SAVEERA  HOSPITAL','9966511601',NULL,'saveerahospital@gmail.com','e10adc3949ba59abbe56e057f20f883e','123456',NULL,NULL,NULL,'AP',NULL,NULL,NULL,1,NULL,NULL,NULL,NULL),(216,2,'PCB','9603837089',NULL,'pcb@gmail.com','e10adc3949ba59abbe56e057f20f883e','123456',NULL,NULL,NULL,'AP',NULL,NULL,NULL,1,NULL,NULL,NULL,NULL),(217,2,'GOWRI GOPAL HOSPITAL PVT LTD','9440728285',NULL,'Gowri@gmail.com','e10adc3949ba59abbe56e057f20f883e','123456',NULL,NULL,NULL,'AP',NULL,NULL,NULL,1,NULL,NULL,NULL,NULL),(218,3,'MWS','9440728285',NULL,'MWSKNL@GMAIL.COM','e10adc3949ba59abbe56e057f20f883e','123456',NULL,NULL,NULL,'AP',NULL,NULL,NULL,1,'1569306594.png','218',NULL,NULL),(219,2,'SV HOSPITAL','9581758358',NULL,'sv@gmail.com','e10adc3949ba59abbe56e057f20f883e','123456',NULL,NULL,NULL,'AP',NULL,NULL,NULL,1,NULL,NULL,NULL,NULL),(220,1,'MARIDI ECO INDUSTERIES','7337403346',NULL,'maridi@gmail.com','e10adc3949ba59abbe56e057f20f883e','123456','vizag','vizag','Vizag','AP','India','530018',NULL,1,NULL,NULL,'2019-05-03 14:55:47',2),(221,1,'VASISHTA ENVIRON CARE ','7337332344',NULL,'vasishta@gmail.com','e10adc3949ba59abbe56e057f20f883e','123456','vizag','vizag','Vizag','AP','India','530018',NULL,1,NULL,NULL,'2019-05-03 15:07:29',2),(222,2,'QUEENS NRI HOSPITAL','9177379073',NULL,'nrihos@gmail.com','fb45fe6a0bfc6381b2cb8bbaa0e480af','nri123456',NULL,NULL,NULL,'AP',NULL,NULL,NULL,1,NULL,NULL,NULL,NULL),(223,3,'MARIDI 1','6300334322',NULL,'driverv1@gmail.com','c974f63abee678d0e103167ad9c813a5','driver123',NULL,NULL,NULL,'AP',NULL,NULL,NULL,2,NULL,NULL,NULL,NULL),(224,3,'MARDI','6300334322',NULL,'driverv1@gmail.com','e10adc3949ba59abbe56e057f20f883e','123456',NULL,NULL,NULL,'AP',NULL,NULL,NULL,1,NULL,NULL,NULL,NULL),(225,4,'MARIDI ECO INDUSTIRES ANDHRA PVTL LTD','7007403346',NULL,'maridiplantandhra@gmail.com','e10adc3949ba59abbe56e057f20f883e','123456',NULL,NULL,NULL,'AP',NULL,NULL,NULL,1,NULL,NULL,NULL,NULL),(226,2,'GOVT KGH HOSPITAL','9959470389',NULL,'govkgh@gmail.com','e10adc3949ba59abbe56e057f20f883e','123456',NULL,NULL,NULL,'AP',NULL,NULL,NULL,1,NULL,NULL,NULL,NULL),(227,2,'SEVENHILLS HEALTHCARE PVT LTD','9959470389',NULL,'sevenhillshosp@gmail.com','e10adc3949ba59abbe56e057f20f883e','123456',NULL,NULL,NULL,'AP',NULL,NULL,NULL,1,NULL,NULL,NULL,NULL),(228,2,'INDUS HOSPITAL ','9959470389',NULL,'indushosp@gmail.com','e10adc3949ba59abbe56e057f20f883e','123456',NULL,NULL,NULL,'AP',NULL,NULL,NULL,1,NULL,NULL,NULL,NULL),(229,2,'AMG HOSPITAL','9959470389',NULL,'amghospital@gmail.com','e10adc3949ba59abbe56e057f20f883e','123456',NULL,NULL,NULL,'AP',NULL,NULL,NULL,1,NULL,NULL,NULL,NULL),(230,2,'APOLLO HOSPITAL','9959470389',NULL,'apollohosp@gmail.com','e10adc3949ba59abbe56e057f20f883e','123456',NULL,NULL,NULL,'AP',NULL,NULL,NULL,1,NULL,NULL,NULL,NULL),(231,2,'ABC HOSPITAL','9959470389',NULL,'abchospital@gmail.com','e10adc3949ba59abbe56e057f20f883e','123456',NULL,NULL,NULL,'AP',NULL,NULL,NULL,1,NULL,NULL,NULL,NULL),(232,2,'KALA HOSPITAL','9959470389',NULL,'kalahosp@gmail.com','e10adc3949ba59abbe56e057f20f883e','123456',NULL,NULL,NULL,'AP',NULL,NULL,NULL,1,NULL,NULL,NULL,NULL),(233,2,'PADMASREE HOSPITITAL','9959470389',NULL,'padmasreehosp@gmail.com','e10adc3949ba59abbe56e057f20f883e','123456',NULL,NULL,NULL,'AP',NULL,NULL,NULL,1,NULL,NULL,NULL,NULL),(234,2,'A.N.BEACH HOSPITAL','9959470389',NULL,'anbeachhosp@gmail.com','e10adc3949ba59abbe56e057f20f883e','123456',NULL,NULL,NULL,'AP',NULL,NULL,NULL,1,NULL,NULL,NULL,NULL),(235,3,'CHANDRARAO','9929590345',NULL,'chandrao@gmail.com','e10adc3949ba59abbe56e057f20f883e','123456',NULL,NULL,NULL,'AP',NULL,NULL,NULL,1,NULL,NULL,NULL,NULL),(236,2,'UJHWAL HOSPITAL','9959470389',NULL,'ujhwalhosp@gmail.com','e10adc3949ba59abbe56e057f20f883e','123456',NULL,NULL,NULL,'AP',NULL,NULL,NULL,1,NULL,NULL,NULL,NULL),(237,2,'ST JOSEPH HOSPITAL','9959470389',NULL,'stjosephhosp@gmail.com','e10adc3949ba59abbe56e057f20f883e','123456',NULL,NULL,NULL,'AP',NULL,NULL,NULL,1,NULL,NULL,NULL,NULL),(238,2,'SUJATHA HOSPITAL','9959470389',NULL,'sujathahosp@gmail.com','e10adc3949ba59abbe56e057f20f883e','123456',NULL,NULL,NULL,'AP',NULL,NULL,NULL,1,NULL,NULL,NULL,NULL),(239,2,'PADMAJA HOSPITAL','9959470389',NULL,'padmajahosp@gmail.com','e10adc3949ba59abbe56e057f20f883e','123456',NULL,NULL,NULL,'AP',NULL,NULL,NULL,1,NULL,NULL,NULL,NULL),(240,2,'NIKITHA HOSPITAL','9959470389',NULL,'nikithahosp@gmail.com','e10adc3949ba59abbe56e057f20f883e','123456',NULL,NULL,NULL,'AP',NULL,NULL,NULL,1,NULL,NULL,NULL,NULL),(241,2,'PINNACLE HOSPITAL INDIA PVT LTD','9959470389',NULL,'pinnaclehosp@gmail.com','e10adc3949ba59abbe56e057f20f883e','123456',NULL,NULL,NULL,'AP',NULL,NULL,NULL,1,NULL,NULL,NULL,NULL),(242,2,'STAR PINNACLE HEART CENTRE PVT LTD','9959470389',NULL,'starpinnaclehosp@gmail.com','e10adc3949ba59abbe56e057f20f883e','123456',NULL,NULL,NULL,'AP',NULL,NULL,NULL,1,NULL,NULL,NULL,NULL),(243,3,'RAJESH','8074170053',NULL,'bhanud2@gmail.com','e10adc3949ba59abbe56e057f20f883e','123456',NULL,NULL,NULL,'AP',NULL,NULL,NULL,1,NULL,NULL,NULL,NULL),(244,2,'PRADHAMA MULTI SPLTY HOSPITAL  RESEARCH INSTITUTE','7337403346',NULL,'pradhama@gmail.com','e10adc3949ba59abbe56e057f20f883e','123456',NULL,NULL,NULL,'AP',NULL,NULL,NULL,1,NULL,NULL,NULL,NULL),(245,2,'MAHATHAM GANDHI CANNCER HOSPITAL RESEARCH INSTITUTE','9959470389',NULL,'mahathmagandhihosp@gmail.com','e10adc3949ba59abbe56e057f20f883e','123456',NULL,NULL,NULL,'AP',NULL,NULL,NULL,1,NULL,NULL,NULL,NULL),(246,2,'GAYATHRI VIDYA PARISHAD HOSPITAL','7337403346',NULL,'gayathrividyaparishadhospital@gmail.com','e10adc3949ba59abbe56e057f20f883e','123456',NULL,NULL,NULL,'AP',NULL,NULL,NULL,1,NULL,NULL,NULL,NULL),(247,2,'DEEPTHI NURSING HOME','7337403346',NULL,'maridivsp@gmail.com','e10adc3949ba59abbe56e057f20f883e','123456',NULL,NULL,NULL,'AP',NULL,NULL,NULL,1,NULL,NULL,NULL,NULL),(248,2,'GH','7417417412',NULL,'vishnu.rainbow06@gmail.com','e10adc3949ba59abbe56e057f20f883e','123456',NULL,NULL,NULL,'AP',NULL,NULL,NULL,1,NULL,NULL,NULL,NULL),(249,1,'VASU','9494346081',NULL,'chinnareddem@gmail.com','e10adc3949ba59abbe56e057f20f883e','123456','kadapa','kadapa','Mydukur','OD','Inida','519172',NULL,1,NULL,NULL,'2019-08-13 10:55:38',2),(250,4,'TEST','7896541232',NULL,'nmbjbsdh@gmail.com','e10adc3949ba59abbe56e057f20f883e','123456',NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL),(251,3,'VASUDEVAREDDY','8019345212',NULL,'nmbjbsdhqwedss@gmail.com','e10adc3949ba59abbe56e057f20f883e','123456',NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL),(252,5,'ODISHA','8527418526',NULL,'djzjsdfjg@gmail.com','e10adc3949ba59abbe56e057f20f883e','123456','kadapa','kadapa','Kadapa','OD','Indina','516172',NULL,1,NULL,NULL,'2019-08-13 13:56:45',2),(253,4,'TEST ONE','8500050944',NULL,'rainbowpubllicschool@gmail.com','e10adc3949ba59abbe56e057f20f883e','123456',NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL),(254,4,'BAYAPU','8500226782',NULL,'bayapu004@gmail.com','e10adc3949ba59abbe56e057f20f883e','123456',NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,'1569307920.png','254',NULL,NULL),(255,2,'CHINNA','9639654122',NULL,'chiina321@gmail.com','e10adc3949ba59abbe56e057f20f883e','123456',NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL),(256,2,'SAI KRISHNA','9633696321',NULL,'sai369@gmail.com','e10adc3949ba59abbe56e057f20f883e','123456',NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL),(257,2,'123SAI','9797564345',NULL,'6464@gmail.com','e10adc3949ba59abbe56e057f20f883e','123456',NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL),(258,4,'SAI123','1233221123',NULL,'123321@gmail.com','e10adc3949ba59abbe56e057f20f883e','123456',NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL),(259,2,'SAI KRISHNA32','4545454545',NULL,'541@gmail.com','e10adc3949ba59abbe56e057f20f883e','123456',NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL),(260,3,'VASUDEVAREDDY','8500050944',NULL,'vasudriver@gmail.com','e10adc3949ba59abbe56e057f20f883e','123456',NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,'1569305700.png','260',NULL,NULL),(261,2,'REDDEMSIVA','9874563210',NULL,'reddemhospital@gmail.com','e10adc3949ba59abbe56e057f20f883e','123456',NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,'1569307527.png','261',NULL,NULL),(262,4,'SAI','1234567890',NULL,'saiplant@gmail.com','e10adc3949ba59abbe56e057f20f883e','123456',NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,'1569307893.png','262',NULL,NULL),(263,1,'SAIMED','1233212311',NULL,'saimed@gmail.com','e10adc3949ba59abbe56e057f20f883e','123456','kadapa','kadapa','Kadapa','AP','India','516172',NULL,1,'1569308317.png','263','2019-09-24 12:28:37',2);

/*Table structure for table `bank_details` */

DROP TABLE IF EXISTS `bank_details`;

CREATE TABLE `bank_details` (
  `b_id` int(11) NOT NULL AUTO_INCREMENT,
  `gst_no` varchar(250) DEFAULT NULL,
  `ac_holder_name` varchar(250) DEFAULT NULL,
  `bank_name` varchar(250) DEFAULT NULL,
  `ac_no` varchar(250) DEFAULT NULL,
  `branch` varchar(250) DEFAULT NULL,
  `ifsc` varchar(250) DEFAULT NULL,
  `gst` int(11) DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`b_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `bank_details` */

insert  into `bank_details`(`b_id`,`gst_no`,`ac_holder_name`,`bank_name`,`ac_no`,`branch`,`ifsc`,`gst`,`created_at`,`updated_at`,`created_by`) values (1,'1234bvasu','vasdevareddy','SBI','32473655713','mydukur','SBIN0002671',2,'2019-09-21 11:33:24','2019-09-21 11:33:24',207);

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `bio_medical_waste` */

insert  into `bio_medical_waste`(`id`,`no_of_bags`,`no_of_kgs`,`color_type`,`weight_type`,`barcode`,`status`,`create_at`,`create_by`) values (1,'1','12','Red','Kgs','0.00429700 1553321514.png',1,'2019-03-23 11:41:53',211),(2,'12','120','Yellow(C)','Grams','0.72270700 1569319318.png',1,'2019-09-24 15:31:58',213);

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

/*Table structure for table `cover_invoice_list` */

DROP TABLE IF EXISTS `cover_invoice_list`;

CREATE TABLE `cover_invoice_list` (
  `c_i_id` int(11) NOT NULL AUTO_INCREMENT,
  `invoice_id` varchar(250) DEFAULT NULL,
  `e_way_bill_no` varchar(250) DEFAULT NULL,
  `plant_id` varchar(250) DEFAULT NULL,
  `hcf_id` varchar(250) DEFAULT NULL,
  `invoice_name` varchar(250) DEFAULT NULL,
  `pwd` varchar(250) DEFAULT NULL,
  `status` int(11) DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`c_i_id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

/*Data for the table `cover_invoice_list` */

insert  into `cover_invoice_list`(`c_i_id`,`invoice_id`,`e_way_bill_no`,`plant_id`,`hcf_id`,`invoice_name`,`pwd`,`status`,`created_at`,`created_by`) values (1,NULL,'123647125','36','15655','36_156551566126700.pdf',NULL,1,NULL,207),(2,NULL,'123647125','33','15653','33_156531566126918.pdf','515001',1,'2019-08-18 16:45:19',207),(3,'2','567568678','36','15657','36_156571566128878.pdf','516172',1,'2019-08-18 17:17:59',207),(4,'4','123456','36','15656','36_156561566130225.pdf','516172',1,'2019-08-18 17:40:26',207),(5,'5','123647125','33','15656','33_156561566130337.pdf','515001',1,'2019-08-18 17:42:18',207),(6,'6','123647125','33','15654','33_156541566130420.pdf','515001',1,'2019-08-18 17:43:40',207),(7,'7','123456','38','15654','38_156541568964459.pdf','516172',1,'2019-09-20 12:57:40',207),(8,'8','123456','38','15654','38_156541568964482.pdf','516172',1,'2019-09-20 12:58:03',207),(9,'9','123647125','37','15655','37_156551568973238.pdf','516172',1,'2019-09-20 15:24:02',207),(10,'10','123647125','37','15655','37_156551568973274.pdf','516172',1,'2019-09-20 15:24:35',207),(11,'11','123456','38','15652','38_156521568978913.pdf','516172',1,'2019-09-20 16:58:33',207),(12,'12','123647125','37','15652','37_156521568982997.pdf','516172',1,'2019-09-20 18:06:41',207),(13,'13','123456','38','15653','38_156531569040949.pdf','516172',1,'2019-09-21 10:12:32',207),(14,'14','123456','38','15656','38_156561569045804.pdf','516172',1,'2019-09-21 11:33:27',207);

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `disposal` */

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
  `cbmwtf` int(11) DEFAULT NULL,
  `create_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`h_id`)
) ENGINE=InnoDB AUTO_INCREMENT=15684 DEFAULT CHARSET=latin1;

/*Data for the table `hospital_list` */

insert  into `hospital_list`(`h_id`,`a_id`,`hospital_name`,`type`,`route_number`,`hospital_id`,`mobile`,`no_of_beds`,`email`,`address`,`address1`,`address2`,`city`,`state`,`country`,`pincode`,`captcha`,`status`,`create_at`,`barcode`,`barcodetext`,`cbmwtf`,`create_by`) values (15650,205,'PRACHAHOSPITAL','HO','8','205','9855422233','15','prachahospital@gmail.com',NULL,'nagole','nagole','Hyderabad','TS','India','500035','',0,'2019-03-18 11:31:50','1552888910.png','PRACHOTS205',NULL,203),(15652,211,'RAGHU','YO','6','211','0949442277','90','raghuram8328@gmail.com',NULL,'plot no-177, sri vani nilayam','sardar patel nagar','Hyderabad','TS','India','500090','',1,'2019-03-19 09:30:47','1552968047.png','RAGHYOTS211',NULL,207),(15653,213,'BABY HOSPITAL','BH','1','213','9966511601','50','raghuram7577@gmail.com',NULL,'ananthapur','ananthapur','Ananthapur','OD','India','515001','',1,'2019-03-19 11:01:57','1552973517.png','BABYBHAP213',NULL,207),(15654,215,'SAVEERA  HOSPITAL','BH','1','215','9966511601','250','saveerahospital@gmail.com',NULL,'ananthapur','ananthapur','Ananthapur','AP','India','515001','',1,'2019-03-22 20:15:31','1553265931.png','SAVEBHAP215',NULL,207),(15655,216,'PCB','AH','1','216','9603837089','1','pcb@gmail.com',NULL,'hyd','hyd','Hyd','TS','India','500072','',1,'2019-03-23 13:32:28','1553328148.png','PCBAHTS216',NULL,207),(15656,217,'GOWRI GOPAL HOSPITAL PVT LTD','BH','2','217','9440728285','120','Gowri@gmail.com',NULL,'KNL','knl','Knl','AP','India','518002','',1,'2019-03-29 12:30:52','1553842852.png','GOWRBHAP217',NULL,207),(15657,219,'SV HOSPITAL','HO','1','219','9581758358','01','sv@gmail.com',NULL,'vizag','vizag','Vizag','AP','India','500072','',1,'2019-05-03 11:28:16','1556863095.png','SV HHOAP219',NULL,207),(15658,222,'QUEENS NRI HOSPITAL','BH','1','222','9177379073','300','nrihos@gmail.com',NULL,'seethammadhra','near gurdhwara','Visakhapatnam','AP','India','530013','',1,'2019-05-03 18:23:19','1556887999.png','QUEEBHAP222',NULL,220),(15659,226,'GOVT KGH HOSPITAL','BH','1','226','9959470389','1037','govkgh@gmail.com',NULL,'kgh road','maharanipeta','Visakhpatnam','AP','India','530013','',1,'2019-05-10 10:17:48','1557463667.png','GOVTBHAP226',NULL,220),(15660,227,'SEVENHILLS HEALTHCARE PVT LTD','BH','1','227','9959470389','250','sevenhillshosp@gmail.com',NULL,'near raghavendra swami tamplekgh road','vsp','Visakhpatnam','AP','India','530013','',1,'2019-05-10 10:22:16','1557463936.png','SEVEBHAP227',NULL,220),(15661,228,'INDUS HOSPITAL ','BH','1','228','9959470389','150','indushosp@gmail.com',NULL,'kgh down','maharanipeta','Visakhpatnam','AP','India','530013','',1,'2019-05-10 10:26:09','1557464169.png','INDUBHAP228',NULL,220),(15662,229,'AMG HOSPITAL','BH','2','229','9959470389','120','amghospital@gmail.com',NULL,'nakkavanipalem','near mro office','Visakhpatnam','AP','India','530013','',1,'2019-05-10 10:29:16','1557464356.png','AMG BHAP229',NULL,220),(15663,230,'APOLLO HOSPITAL','BH','2','230','9959470389','108','apollohosp@gmail.com',NULL,'ramnagar','ragavendara temple','Visakhpatnam','AP','India','530002','',1,'2019-05-10 10:37:27','1557464847.png','APOLBHAP230',NULL,220),(15664,231,'ABC HOSPITAL','BH','2','231','9959470389','100','abchospital@gmail.com',NULL,'chinnagaddili','arilava road','Visakhpatnam','AP','India','530017','',1,'2019-05-10 10:42:30','1557465150.png','ABC BHAP231',NULL,220),(15665,232,'KALA HOSPITAL','BH','2','232','9959470389','100','kalahosp@gmail.com',NULL,'dwarakanagar','road no-1','Visakhpatnam','AP','India','530014','',1,'2019-05-10 10:44:21','1557465261.png','KALABHAP232',NULL,220),(15666,233,'PADMASREE HOSPITITAL','BH','2','233','9959470389','100','padmasreehosp@gmail.com',NULL,'gurudwar','near highway road','Visakhpatnam','AP','India','530013','',1,'2019-05-10 10:47:06','1557465426.png','PADMBHAP233',NULL,220),(15667,234,'A.N.BEACH HOSPITAL','BH','1','234','9959470389','65','anbeachhosp@gmail.com',NULL,'near beachroad','vsp','Visakhpatnam','AP','India','530001','',1,'2019-05-10 10:54:39','1557465879.png','A.N.BHAP234',NULL,220),(15668,236,'UJHWAL HOSPITAL','BH','3','236','9959470389','59','ujhwalhosp@gmail.com',NULL,'madhurawada','vsp','Visakhpatnam','AP','India','5300017','',1,'2019-05-10 12:44:14','1557472454.png','UJHWBHAP236',NULL,220),(15669,237,'ST JOSEPH HOSPITAL','BH','3','237','9959470389','50','stjosephhosp@gmail.com',NULL,'maharanipeta','krishna temple','Visakhpatnam','AP','India','530001','',1,'2019-05-10 12:46:11','1557472571.png','ST JBHAP237',NULL,220),(15670,238,'SUJATHA HOSPITAL','BH','3','238','9959470389','43','sujathahosp@gmail.com',NULL,'gajuwaka','near highway road','Visakhpatnam','AP','India','530015','',1,'2019-05-10 12:48:09','1557472689.png','SUJABHAP238',NULL,220),(15671,239,'PADMAJA HOSPITAL','BH','2','239','9959470389','60','padmajahosp@gmail.com',NULL,'gajuwaka','near highway road','Visakhpatnam','AP','India','530015','',1,'2019-05-10 13:00:21','1557473421.png','PADMBHAP239',NULL,220),(15672,240,'NIKITHA HOSPITAL','BH','2','240','9959470389','60','nikithahosp@gmail.com',NULL,'seethammadhra','seethammadhara jn','Visakhpatnam','AP','India','530013','',1,'2019-05-10 13:06:21','1557473781.png','NIKIBHAP240',NULL,220),(15673,241,'PINNACLE HOSPITAL INDIA PVT LTD','BH','2','241','9959470389','100','pinnaclehosp@gmail.com',NULL,'chinnagaddili ','arilova','Visakhpatnam','AP','India','5300017','',1,'2019-05-10 13:08:00','1557473880.png','PINNBHAP241',NULL,220),(15674,242,'STAR PINNACLE HEART CENTRE PVT LTD','BH','2','242','9959470389','100','starpinnaclehosp@gmail.com',NULL,'health city','chinna gadilli','Visakhpatnam','AP','India','530017','',1,'2019-05-10 13:10:36','1557474036.png','STARBHAP242',NULL,220),(15675,244,'PRADHAMA MULTI SPLTY HOSPITAL  RESEARCH INSTITUTE','BH','2','244','7337403346','150','pradhama@gmail.com',NULL,'mvp colony','near ','Visakhapatnam','AP','India','530013','',1,'2019-05-11 11:34:19','1557554659.png','PRADBHAP244',NULL,220),(15676,245,'MAHATHAM GANDHI CANNCER HOSPITAL RESEARCH INSTITUTE','BH','2','245','9959470389','100','mahathmagandhihosp@gmail.com',NULL,'mvp colony','near highway road','Visakhpatnam','AP','India','5300014','',1,'2019-05-11 13:06:24','1557560184.png','MAHABHAP245',NULL,220),(15677,246,'GAYATHRI VIDYA PARISHAD HOSPITAL','BH','2','246','7337403346','300','gayathrividyaparishadhospital@gmail.com',NULL,'marikavalasa','madhuravada','Visakhapatnam','AP','India','530021','',1,'2019-05-22 18:18:58','1558529338.png','GAYABHAP246',NULL,220),(15678,247,'DEEPTHI NURSING HOME','BH','2','247','7337403346','10','maridivsp@gmail.com',NULL,'kancharapalem','hiway road','Visakhapatnam','AP','India','530018','',1,'2019-05-24 12:13:52','1558680232.png','DEEPBHAP247',NULL,220),(15679,248,'GH','CL','12','248','7417417412','45','vishnu.rainbow06@gmail.com',NULL,'kadapa','','Hyderabad','AP','India','500072','',1,'2019-07-05 18:28:58','1562331538.png','GHCLAP248',NULL,207),(15680,256,'SAI KRISHNA','CL','45','256','9633696321','12','sai369@gmail.com',NULL,'kadapa','kadAPA','Kadapa','AP','India','516172','',1,'2019-09-19 15:35:09','1568887509.png','SAI CLAP256',NULL,207),(15681,257,'123SAI','CL','343','257','9797564345','3234','6464@gmail.com',NULL,'kadapa','kadapa','Kadapa','AP','Inida','516172','',1,'2019-09-19 15:37:51','1568887671.png','123SCLAP257',38,207),(15682,259,'SAI KRISHNA32','VH','2','259','4545454545','45','541@gmail.com',NULL,'kadapa','kadapa','Kadapa','AP','India','516172','',1,'2019-09-19 16:20:14','1568890214.png','SAI VHAP259',38,207),(15683,261,'REDDEMSIVA','BH','5','261','9874563210','74','reddemhospital@gmail.com',NULL,'kadapa','kadapa','Kadapa','AP','India','516172','',1,'2019-09-24 12:15:28','1569307527.png','REDDBHAP261',37,207);

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
  `infected_c_waste_kgs` varchar(250) DEFAULT NULL,
  `infected_c_waste_qty` varchar(250) DEFAULT NULL,
  `glassware_watse_kgs` varchar(250) DEFAULT NULL,
  `glassware_watse_qty` varchar(250) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `total` varchar(250) DEFAULT NULL,
  `create_at` datetime DEFAULT NULL,
  `date` date DEFAULT NULL,
  `create_by` int(11) DEFAULT NULL,
  `current_address` varchar(250) DEFAULT NULL,
  `scan_code` varchar(250) DEFAULT NULL,
  `invoice_name` varchar(250) DEFAULT NULL,
  `invoice_file` varchar(250) DEFAULT NULL,
  `bio_genaral_waste_kgs` varchar(250) DEFAULT NULL,
  `bio_genaral_waste_qty` varchar(250) DEFAULT NULL,
  `bio_infected_plastics_kgs` varchar(250) DEFAULT NULL,
  `bio_infected_plastics_qty` varchar(250) DEFAULT NULL,
  `bio_infected_waste_kgs` varchar(250) DEFAULT NULL,
  `bio_infected_waste_qty` varchar(250) DEFAULT NULL,
  `bio_infected_c_waste_kgs` varchar(250) DEFAULT NULL,
  `bio_infected_c_waste_qty` varchar(250) DEFAULT NULL,
  `bio_glassware_watse_kgs` varchar(250) DEFAULT NULL,
  `bio_glassware_watse_qty` varchar(250) DEFAULT NULL,
  `bio_current_address` text,
  `crosscheck_total` varchar(250) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `updated_time` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=362 DEFAULT CHARSET=latin1;

/*Data for the table `hospital_waste` */

insert  into `hospital_waste`(`id`,`h_id`,`genaral_waste_kgs`,`genaral_waste_qty`,`infected_plastics_kgs`,`infected_plastics_qty`,`infected_waste_kgs`,`infected_waste_qty`,`infected_c_waste_kgs`,`infected_c_waste_qty`,`glassware_watse_kgs`,`glassware_watse_qty`,`status`,`total`,`create_at`,`date`,`create_by`,`current_address`,`scan_code`,`invoice_name`,`invoice_file`,`bio_genaral_waste_kgs`,`bio_genaral_waste_qty`,`bio_infected_plastics_kgs`,`bio_infected_plastics_qty`,`bio_infected_waste_kgs`,`bio_infected_waste_qty`,`bio_infected_c_waste_kgs`,`bio_infected_c_waste_qty`,`bio_glassware_watse_kgs`,`bio_glassware_watse_qty`,`bio_current_address`,`crosscheck_total`,`updated_by`,`updated_time`) values (299,15650,'','','','','','',NULL,NULL,'5','1',1,'5','2019-03-18 12:02:33','2019-03-18',206,'167A, Sardar Patel Nagar Rd, Sardar Patel Nagar, Bhagat Singh Nagar, Kukatpally Housing Board Colony, Kukatpally, Hyderabad, Telangana 500085, India\nHyderabad\nTelangana\nIndia\n500085\n167A\n','15650_Blue_0.86283900 1552890615',NULL,NULL,'','','','','','',NULL,NULL,'5','1','167A, Sardar Patel Nagar Rd, Sardar Patel Nagar, Bhagat Singh Nagar, Kukatpally Housing Board Colony, Kukatpally, Hyderabad, Telangana 500085, India\nHyderabad\nTelangana\nIndia\n500085\n167A\n','5',204,'2019-03-18 12:07:58'),(300,15650,'1','1','1','1','1','1',NULL,NULL,'1','1',1,'4','2019-03-18 12:13:25','2019-03-18',206,'167A, Sardar Patel Nagar Rd, Sardar Patel Nagar, Bhagat Singh Nagar, Kukatpally Housing Board Colony, Kukatpally, Hyderabad, Telangana 500085, India\nHyderabad\nTelangana\nIndia\n500085\n167A\n',NULL,'PRACHAHOSPITAL invoice','PRACHAHOSPITAL_15650_300.pdf',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(301,15651,'','','','','2','1',NULL,NULL,'','',1,'2','2019-03-18 18:47:24','2019-03-18',181,'3rd Cross, LLR Marg, Kunjibettu, Udupi, Karnataka 576102, India\nUdupi\nKarnataka\nIndia\n576102\nLLR Marg\n','15651_Yellow_0.32456500 1552914858',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(302,15651,'','','5','1','','',NULL,NULL,'','',1,'5','2019-03-18 18:47:49','2019-03-18',181,'3rd Cross, LLR Marg, Kunjibettu, Udupi, Karnataka 576102, India\nUdupi\nKarnataka\nIndia\n576102\nLLR Marg\n','15651_Red_0.42802100 1552914937',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(303,15652,'','','','','2','1',NULL,NULL,'','',1,'2','2019-03-19 10:25:59','2019-03-19',212,'GMR Plaza, Ram Nagar, Kovur Nagar, Anantapur, Andhra Pradesh 515004, India\nAnantapur\nAndhra Pradesh\nIndia\n515004\nGMR Plaza\n','15652_Yellow_0.51764300 1552971036',NULL,NULL,'','','','','2','1',NULL,NULL,'','','Near Kammabhavan, Ramnagar Main Road,, Anantapur, Andhra Pradesh 515004, India\nAnantapur\nAndhra Pradesh\nIndia\n515004\nAnantapur\n','2',208,'2019-03-19 10:33:47'),(304,15652,'0','0','3','1','2.5','1',NULL,NULL,'5','1',1,'10.5','2019-03-19 10:29:20','2019-03-19',212,'Rudrampeta Road, Kovur Nagar, Anantapur, Andhra Pradesh 515004, India\nAnantapur\nAndhra Pradesh\nIndia\n515004\nRudrampeta Road\n',NULL,'RAGHU invoice','RAGHU_15652_304.pdf','0','0','3','1','2.5','1',NULL,NULL,'5','1','Rudrampeta Road, Kovur Nagar, Anantapur, Andhra Pradesh 515004, India\nAnantapur\nAndhra Pradesh\nIndia\n515004\nRudrampeta Road\n','10.5',208,'2019-03-19 10:36:44'),(305,0,'','','','','','',NULL,NULL,'','',1,'0','2019-03-19 11:05:33','2019-03-19',212,'Rudrampeta Road, Kovur Nagar, Anantapur, Andhra Pradesh 515004, India\nAnantapur\nAndhra Pradesh\nIndia\n515004\nRudrampeta Road\n','BABYBHAP213',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(306,15653,'1','1','5','2','13','2',NULL,NULL,'15','3',1,'82','2019-03-19 11:06:30','2019-03-19',212,'Rudrampeta Road, Kovur Nagar, Anantapur, Andhra Pradesh 515004, India\nAnantapur\nAndhra Pradesh\nIndia\n515004\nRudrampeta Road\n',NULL,'BABY HOSPITAL invoice','BABY HOSPITAL_15653_306.pdf','1','1','5','2','13','2',NULL,NULL,'15','3','Rudrampeta Road, Kovur Nagar, Anantapur, Andhra Pradesh 515004, India\nAnantapur\nAndhra Pradesh\nIndia\n515004\nRudrampeta Road\n','82',208,'2019-03-19 11:08:38'),(307,15646,'','','','','3','1',NULL,NULL,'','',1,'3','2019-03-19 11:46:37','2019-03-19',181,'Mudarangadi - Nandikur Rd, Yellur, Karnataka 574111, India\nYellur\nKarnataka\nIndia\n574111\nMudarangadi - Nandikur Road\n','15646_Yellow_0.43354700 1552464372',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(308,15651,'','','3','1','','',NULL,NULL,'','',1,'3','2019-03-19 15:25:19','2019-03-19',181,'Mudarangadi - Nandikur Rd, Yellur, Karnataka 574111, India\nYellur\nKarnataka\nIndia\n574111\nMudarangadi - Nandikur Road\n','15651_Red_0.94872200 1552914936',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(309,15653,'','','','','','',NULL,NULL,'10','1',1,'10','2019-04-08 17:10:37','2019-04-08',212,'Unnamed Road, Sardar Patel Nagar, Kukatpally Housing Board Colony, Kukatpally, Hyderabad, Telangana 500085, India\nHyderabad\nTelangana\nIndia\n500085\nUnnamed Road\n','15653_Blue_0.83691600 1554723115',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(310,15653,'','','','','','',NULL,NULL,'25','1',1,'25','2019-04-08 17:10:59','2019-04-08',212,'Unnamed Road, Sardar Patel Nagar, Kukatpally Housing Board Colony, Kukatpally, Hyderabad, Telangana 500085, India\nHyderabad\nTelangana\nIndia\n500085\nUnnamed Road\n','15653_Blue_0.96646000 1554723115',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(311,15652,'','','','','22','1',NULL,NULL,'','',1,'22','2019-04-08 17:13:30','2019-04-08',212,'Unnamed Road, Sardar Patel Nagar, Kukatpally Housing Board Colony, Kukatpally, Hyderabad, Telangana 500085, India\nHyderabad\nTelangana\nIndia\n500085\nUnnamed Road\n','15652_Yellow_0.70429400 1554723777',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(312,15652,'','','','','12','1',NULL,NULL,'','',1,'12','2019-04-08 17:13:38','2019-04-08',212,'Unnamed Road, Sardar Patel Nagar, Kukatpally Housing Board Colony, Kukatpally, Hyderabad, Telangana 500085, India\nHyderabad\nTelangana\nIndia\n500085\nUnnamed Road\n','15652_Yellow_0.64139700 1554723777',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(313,15652,'','','','','10','1',NULL,NULL,'','',1,'10','2019-04-08 17:25:06','2019-04-08',212,'Unnamed Road, Sardar Patel Nagar, Kukatpally Housing Board Colony, Kukatpally, Hyderabad, Telangana 500085, India\nHyderabad\nTelangana\nIndia\n500085\nUnnamed Road\n','15652_Yellow_0.10686400 1554723778',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(314,15652,'','','','','20','1',NULL,NULL,'','',1,'20','2019-04-08 18:31:12','2019-04-08',212,'Unnamed Road, Sardar Patel Nagar, Kukatpally Housing Board Colony, Kukatpally, Hyderabad, Telangana 500085, India\nHyderabad\nTelangana\nIndia\n500085\nUnnamed Road\n','15652_Yellow_0.04850500 1554723778',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(315,15653,'','','22','1','','',NULL,NULL,'','',1,'22','2019-04-08 18:36:42','2019-04-08',212,'Unnamed Road, Sardar Patel Nagar, Kukatpally Housing Board Colony, Kukatpally, Hyderabad, Telangana 500085, India\nHyderabad\nTelangana\nIndia\n500085\nUnnamed Road\n','15653_Red_0.62045300 1554728760',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(316,15653,'','','20','1','','',NULL,NULL,'','',1,'20','2019-04-08 18:36:54','2019-04-08',212,'500085, Sardar Patel Nagar, IDPL Staff Cooperative Housing Society, Kukatpally Housing Board Colony, Kukatpally, Hyderabad, Telangana 500085, India\nHyderabad\nTelangana\nIndia\n500085\nSardar Patel Nagar\n','15653_Red_0.89659200 1554728760',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(317,15652,'22','22','22','22','22','22',NULL,NULL,'22','22',1,'1936','2019-04-09 10:05:00','2019-04-09',212,'Unnamed Road, Sardar Patel Nagar, Kukatpally Housing Board Colony, Kukatpally, Hyderabad, Telangana 500085, India\nHyderabad\nTelangana\nIndia\n500085\nUnnamed Road\n',NULL,'RAGHU invoice','RAGHU_15652_317.pdf',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(318,15653,'','','','','25','1',NULL,NULL,'','',1,'25','2019-04-18 17:34:26','2019-04-18',212,'HiTech Avenue, B-Block, Vittal Rao Nagar, HITEC City, Hyderabad, Telangana 500081, India\nHyderabad\nTelangana\nIndia\n500081\nHiTech Avenue, B-Block\n','15653_Yellow_0.69110700 1555589020',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(319,0,'','','','','','',NULL,NULL,'','',1,'0','2019-04-20 16:43:22','2019-04-20',212,'Unnamed Road, Sardar Patel Nagar, Kukatpally Housing Board Colony, Kukatpally, Hyderabad, Telangana 500085, India\nHyderabad\nTelangana\nIndia\n500085\nUnnamed Road\n','GOWRBHAP217',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(320,0,'','','','','','',NULL,NULL,'','',1,'10','2019-04-22 12:57:17','2019-04-22',212,'Unnamed Road, Sardar Patel Nagar, Kukatpally Housing Board Colony, Kukatpally, Hyderabad, Telangana 500085, India\nHyderabad\nTelangana\nIndia\n500085\nUnnamed Road\n','SAVEBHAP215',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(321,0,'','','','','','',NULL,NULL,'','',1,'10','2019-04-22 17:43:08','2019-04-22',212,'Unnamed Road, Sardar Patel Nagar, Kukatpally Housing Board Colony, Kukatpally, Hyderabad, Telangana 500085, India\nHyderabad\nTelangana\nIndia\n500085\nUnnamed Road\n','PCBAHTS216',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(322,0,'','','','','','',NULL,NULL,'','',1,'10','2019-04-22 17:50:28','2019-04-22',218,'Unnamed Road, Sardar Patel Nagar, Kukatpally Housing Board Colony, Kukatpally, Hyderabad, Telangana 500085, India\nHyderabad\nTelangana\nIndia\n500085\nUnnamed Road\n','RAGHYOTS211',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(323,15653,'','','00.235','1','','',NULL,NULL,'','',1,'0.235','2019-05-06 14:45:55','2019-05-06',212,'Unnamed Road, Sardar Patel Nagar, Kukatpally Housing Board Colony, Kukatpally, Hyderabad, Telangana 500085, India\nHyderabad\nTelangana\nIndia\n500085\nUnnamed Road\n','15653_Red_0.48262500 1557134125',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(324,15658,'.400','1','2','5','5','10',NULL,NULL,'.500','1',1,'60.9','2019-05-08 13:56:57','2019-05-08',224,'50-107-2, North Extension, Balayya Sastri Layout, Seethammadara, Visakhapatnam, Andhra Pradesh 530013, India\nVisakhapatnam\nAndhra Pradesh\nIndia\n530013\n50-107-2\n',NULL,'QUEENS NRI HOSPITAL invoice','QUEENS NRI HOSPITAL_15658_324.pdf',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(325,15664,'.5','1','5','10','60','20',NULL,NULL,'1','1',1,'1251.5','2019-05-10 13:36:30','2019-05-10',224,'50-107-2, North Extension, Balayya Sastri Layout, Seethammadara, Visakhapatnam, Andhra Pradesh 530013, India\nVisakhapatnam\nAndhra Pradesh\nIndia\n530013\n50-107-2\n',NULL,'ABC HOSPITAL invoice','ABC HOSPITAL_15664_325.pdf',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(326,15663,'05','1','25','50','75','30',NULL,NULL,'.5','2',1,'3506','2019-05-10 13:41:58','2019-05-10',224,'50-53-11/9, TPT Colony, Balayya Sastri Layout, Seethammadara, Visakhapatnam, Andhra Pradesh 530013, India\nVisakhapatnam\nAndhra Pradesh\nIndia\n530013\n50-53-11/9\n',NULL,'APOLLO HOSPITAL invoice','APOLLO HOSPITAL_15663_326.pdf',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(327,15658,'.8','1','3','6','30','6',NULL,NULL,'.5','1',1,'199.3','2019-05-10 13:56:46','2019-05-10',243,'50-107-2, North Extension, Balayya Sastri Layout, Seethammadara, Visakhapatnam, Andhra Pradesh 530013, India\nVisakhapatnam\nAndhra Pradesh\nIndia\n530013\n50-107-2\n',NULL,'QUEENS NRI HOSPITAL invoice','QUEENS NRI HOSPITAL_15658_327.pdf',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(328,15674,'7','4','14','11','5','7',NULL,NULL,'5','2',1,'227','2019-05-10 14:32:38','2019-05-10',243,'Unnamed Road, Chinna Gadhili, Hanumanthavaka, Visakhapatnam, Andhra Pradesh 530040, India\nVisakhapatnam\nAndhra Pradesh\nIndia\n530040\nUnnamed Road\n',NULL,'STAR PINNACLE HEART CENTRE PVT LTD invoice','STAR PINNACLE HEART CENTRE PVT LTD_15674_328.pdf',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(329,15673,'5','3','18','14','11','8',NULL,NULL,'7','4',1,'383','2019-05-10 14:34:49','2019-05-10',243,'13, Mudasarlova Rd, Chinna Gadhili, Hanumanthavaka, Visakhapatnam, Andhra Pradesh 530040, India\nVisakhapatnam\nAndhra Pradesh\nIndia\n530040\n13\n',NULL,'PINNACLE HOSPITAL INDIA PVT LTD invoice','PINNACLE HOSPITAL INDIA PVT LTD_15673_329.pdf',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(330,15663,'3','1','74','37','47','28',NULL,NULL,'2','1',1,'4059','2019-05-10 14:59:31','2019-05-10',243,'18-88, Mudasarlova Rd, Pedda Gadhili Junction, Pedda Gadhili, Hanumanthavaka, Visakhapatnam, Andhra Pradesh 530040, India\nVisakhapatnam\nAndhra Pradesh\nIndia\n530040\n18-88\n',NULL,'APOLLO HOSPITAL invoice','APOLLO HOSPITAL_15663_330.pdf',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(331,0,'','','','','','',NULL,NULL,'','',1,'0','2019-05-10 18:27:06','2019-05-10',224,'50-107-4, North Extension, Balayya Sastri Layout, Seethammadara, Visakhapatnam, Andhra Pradesh 530013, India\nVisakhapatnam\nAndhra Pradesh\nIndia\n530013\n50-107-4\n','GOVTBHAP226',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(332,0,'','','','','','',NULL,NULL,'','',1,'0','2019-05-10 18:27:53','2019-05-10',224,'50-107-2, North Extension, Balayya Sastri Layout, Seethammadara, Visakhapatnam, Andhra Pradesh 530013, India\nVisakhapatnam\nAndhra Pradesh\nIndia\n530013\n50-107-2\n','INDUBHAP228',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(333,7661510,'','','','','','',NULL,NULL,'','',1,'0','2019-05-10 18:29:16','2019-05-10',224,'50-107-2, North Extension, Balayya Sastri Layout, Seethammadara, Visakhapatnam, Andhra Pradesh 530013, India\nVisakhapatnam\nAndhra Pradesh\nIndia\n530013\n50-107-2\n','07661510',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(334,17730213,'','','','','','',NULL,NULL,'','',1,'0','2019-05-10 18:37:06','2019-05-10',224,'50-107-2, North Extension, Balayya Sastri Layout, Seethammadara, Visakhapatnam, Andhra Pradesh 530013, India\nVisakhapatnam\nAndhra Pradesh\nIndia\n530013\n50-107-2\n','17730213',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(335,15674,'.3','1','1','3','1','2',NULL,NULL,'0','0',1,'5.3','2019-05-10 18:59:07','2019-05-10',224,'50-107-2, North Extension, Balayya Sastri Layout, Seethammadara, Visakhapatnam, Andhra Pradesh 530013, India\nVisakhapatnam\nAndhra Pradesh\nIndia\n530013\n50-107-2\n',NULL,'STAR PINNACLE HEART CENTRE PVT LTD invoice','STAR PINNACLE HEART CENTRE PVT LTD_15674_335.pdf',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(336,15666,'.4','1','3','6','4','8',NULL,NULL,'.5','1',1,'50.9','2019-05-11 08:18:23','2019-05-11',224,'50-27-16/1, Seethammadhara (NE), Ram Mohan Chamber, First Floor, Room No - 1,, Visakhapatnam, Andhra Pradesh 530013, India\nVisakhapatnam\nAndhra Pradesh\nIndia\n530013\nVisakhapatnam\n',NULL,'PADMASREE HOSPITITAL invoice','PADMASREE HOSPITITAL_15666_336.pdf',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(337,15675,'0.6','2','26','18','33','24',NULL,NULL,'0','0',1,'1261.2','2019-05-11 13:37:06','2019-05-11',243,'1-57-4, Muvvala Vari Veedhi, Sector- 6, MVP Colony, Visakhapatnam, Andhra Pradesh 530017, India\nVisakhapatnam\nAndhra Pradesh\nIndia\n530017\n1-57-4\n',NULL,'PRADHAMA MULTI SPLTY HOSPITAL  RESEARCH INSTITUTE invoice','PRADHAMA MULTI SPLTY HOSPITAL  RESEARCH INSTITUTE_15675_337.pdf',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(338,15676,'5','6','38','32','28','18',NULL,NULL,'0','0',1,'1750','2019-05-11 14:16:51','2019-05-11',243,'69/16, MVP Sector 3, Sector 3, MVP Colony, Visakhapatnam, Andhra Pradesh 530017, India\nVisakhapatnam\nAndhra Pradesh\nIndia\n530017\n69/16\n',NULL,'MAHATHAM GANDHI CANNCER HOSPITAL RESEARCH INSTITUTE invoice','MAHATHAM GANDHI CANNCER HOSPITAL RESEARCH INSTITUTE_15676_338.pdf',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(339,15620,'','','100','1','','',NULL,NULL,'','',1,'100','2019-05-15 14:40:38','2019-05-15',212,'Unnamed Road, Sardar Patel Nagar, Kukatpally Housing Board Colony, Kukatpally, Hyderabad, Telangana 500085, India\nHyderabad\nTelangana\nIndia\n500085\nUnnamed Road\n','15620_Red_0.45808800 1552285476',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(340,15620,'','','123','1','','',NULL,NULL,'','',1,'123','2019-05-15 14:49:15','2019-05-15',212,'Unnamed Road, Sardar Patel Nagar, Kukatpally Housing Board Colony, Kukatpally, Hyderabad, Telangana 500085, India\nHyderabad\nTelangana\nIndia\n500085\nUnnamed Road\n','15620_Red_0.24377900 1552285476',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(341,15620,'','','66','1','','',NULL,NULL,'','',1,'66','2019-05-15 15:03:09','2019-05-15',212,'Unnamed Road, Sardar Patel Nagar, Kukatpally Housing Board Colony, Kukatpally, Hyderabad, Telangana 500085, India\nHyderabad\nTelangana\nIndia\n500085\nUnnamed Road\n','15620_Red_0.17647200 1552285476',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(342,15620,'','','88','1','','',NULL,NULL,'','',1,'88','2019-05-15 15:03:30','2019-05-15',212,'Unnamed Road, Sardar Patel Nagar, Kukatpally Housing Board Colony, Kukatpally, Hyderabad, Telangana 500085, India\nHyderabad\nTelangana\nIndia\n500085\nUnnamed Road\n','15620_Red_0.60387200 1552285476',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(343,15620,'','','668','1','','',NULL,NULL,'','',1,'668','2019-05-15 15:04:11','2019-05-15',212,'Unnamed Road, Sardar Patel Nagar, Kukatpally Housing Board Colony, Kukatpally, Hyderabad, Telangana 500085, India\nHyderabad\nTelangana\nIndia\n500085\nUnnamed Road\n','15620_Red_0.75495100 1552285476',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(344,15620,'','','02.330','1','','',NULL,NULL,'','',1,'2.33','2019-05-15 15:13:16','2019-05-15',212,'Unnamed Road, Sardar Patel Nagar, Kukatpally Housing Board Colony, Kukatpally, Hyderabad, Telangana 500085, India\nHyderabad\nTelangana\nIndia\n500085\nUnnamed Road\n','15620_Red_0.55780400 1552285476',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(345,15620,'','','54','1','','',NULL,NULL,'','',1,'54','2019-05-15 15:13:53','2019-05-15',212,'Unnamed Road, Sardar Patel Nagar, Kukatpally Housing Board Colony, Kukatpally, Hyderabad, Telangana 500085, India\nHyderabad\nTelangana\nIndia\n500085\nUnnamed Road\n','15620_Red_0.21035500 1552285476',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(346,15654,'','','','','12.3','1',NULL,NULL,'','',1,'12.3','2019-05-15 15:37:25','2019-05-15',212,'Sardar Patel Nagar Rd, Sardar Patel Nagar, Dharma Reddy Colony Phase II, Kukatpally Housing Board Colony, Kukatpally, Hyderabad, Telangana 500085, India\nHyderabad\nTelangana\nIndia\n500085\nSardar Patel Nagar Road\n','15654_Yellow_0.05367700 1557914777',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(347,15656,'','','','','','',NULL,NULL,'05.570','1',1,'5.57','2019-05-15 15:42:15','2019-05-15',212,'Unnamed Road, Sardar Patel Nagar, Kukatpally Housing Board Colony, Kukatpally, Hyderabad, Telangana 500085, India\nHyderabad\nTelangana\nIndia\n500085\nUnnamed Road\n','15656_Blue_0.71639100 1557915063',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(348,15656,'','','','','','',NULL,NULL,'100','1',1,'100','2019-05-15 15:43:34','2019-05-15',212,'Unnamed Road, Sardar Patel Nagar, Kukatpally Housing Board Colony, Kukatpally, Hyderabad, Telangana 500085, India\nHyderabad\nTelangana\nIndia\n500085\nUnnamed Road\n','15656_Blue_0.85503400 1557915063',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(349,15656,'','','100','1','','',NULL,NULL,'','',1,'100','2019-05-15 15:47:27','2019-05-15',212,'Unnamed Road, Sardar Patel Nagar, Kukatpally Housing Board Colony, Kukatpally, Hyderabad, Telangana 500085, India\nHyderabad\nTelangana\nIndia\n500085\nUnnamed Road\n','15656_Red_0.12574900 1557915427',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(350,15656,'','','111','1','','',NULL,NULL,'','',1,'111','2019-05-15 15:59:12','2019-05-15',212,'Unnamed Road, Sardar Patel Nagar, Kukatpally Housing Board Colony, Kukatpally, Hyderabad, Telangana 500085, India\nHyderabad\nTelangana\nIndia\n500085\nUnnamed Road\n','15656_Red_0.28762600 1557915427',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(351,15656,'','','05.420','1','','',NULL,NULL,'','',1,'5.42','2019-05-15 16:01:15','2019-05-15',212,'Unnamed Road, Sardar Patel Nagar, Kukatpally Housing Board Colony, Kukatpally, Hyderabad, Telangana 500085, India\nHyderabad\nTelangana\nIndia\n500085\nUnnamed Road\n','15656_Red_0.19314300 1557915427',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(352,15656,'','','03.500','1','','',NULL,NULL,'','',1,'3.5','2019-05-15 16:09:02','2019-05-15',212,'Unnamed Road, Sardar Patel Nagar, Kukatpally Housing Board Colony, Kukatpally, Hyderabad, Telangana 500085, India\nHyderabad\nTelangana\nIndia\n500085\nUnnamed Road\n','15656_Red_0.25709200 1557915427',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(353,15656,'','','111','1','','',NULL,NULL,'','',1,'111','2019-05-15 17:13:40','2019-05-15',212,'Unnamed Road, Sardar Patel Nagar, Kukatpally Housing Board Colony, Kukatpally, Hyderabad, Telangana 500085, India\nHyderabad\nTelangana\nIndia\n500085\nUnnamed Road\n','15656_Red_0.44162800 1557915427',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(354,15656,'','','222','1','','',NULL,NULL,'','',1,'222','2019-05-15 17:13:57','2019-05-15',212,'Unnamed Road, Sardar Patel Nagar, Kukatpally Housing Board Colony, Kukatpally, Hyderabad, Telangana 500085, India\nHyderabad\nTelangana\nIndia\n500085\nUnnamed Road\n','15656_Red_0.47312900 1557915427',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(355,15656,'','','333','1','','',NULL,NULL,'','',1,'333','2019-05-15 17:14:36','2019-05-15',212,'Unnamed Road, Sardar Patel Nagar, Kukatpally Housing Board Colony, Kukatpally, Hyderabad, Telangana 500085, India\nHyderabad\nTelangana\nIndia\n500085\nUnnamed Road\n','15656_Red_0.50436000 1557915427',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(356,15656,'','','04.720','1','','',NULL,NULL,'','',1,'4.72','2019-05-15 17:15:37','2019-05-15',212,'Unnamed Road, Sardar Patel Nagar, Kukatpally Housing Board Colony, Kukatpally, Hyderabad, Telangana 500085, India\nHyderabad\nTelangana\nIndia\n500085\nUnnamed Road\n','15656_Red_0.41074800 1557915427',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(357,15656,'','','00.250','1','','',NULL,NULL,'','',1,'0.25','2019-05-15 17:26:56','2019-05-15',212,'Sardar Patel Nagar Rd, Sardar Patel Nagar, Dharma Reddy Colony Phase II, Kukatpally Housing Board Colony, Kukatpally, Hyderabad, Telangana 500085, India\nHyderabad\nTelangana\nIndia\n500085\nSardar Patel Nagar Road\n','15656_Red_0.68509400 1557915427',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(358,15656,'','','455','1','','',NULL,NULL,'','',1,'455','2019-05-15 17:27:15','2019-05-15',212,'Sardar Patel Nagar Rd, Sardar Patel Nagar, Dharma Reddy Colony Phase II, Kukatpally Housing Board Colony, Kukatpally, Hyderabad, Telangana 500085, India\nHyderabad\nTelangana\nIndia\n500085\nSardar Patel Nagar Road\n','15656_Red_0.84301800 1557915427',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(359,15677,'6','2','6','6','5','5',NULL,NULL,'8','1',1,'81','2019-05-22 18:22:16','2019-05-22',224,'50-107-2, North Extension, Balayya Sastri Layout, Seethammadara, Visakhapatnam, Andhra Pradesh 530013, India\nVisakhapatnam\nAndhra Pradesh\nIndia\n530013\n50-107-2\n',NULL,'GAYATHRI VIDYA PARISHAD HOSPITAL invoice','GAYATHRI VIDYA PARISHAD HOSPITAL_15677_359.pdf',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(360,15678,'0.5','1','6','3','5','2',NULL,NULL,'0.5','2',1,'29.5','2019-05-31 12:29:49','2019-05-31',243,'50-107-2, North Extension, Balayya Sastri Layout, Seethammadara, Visakhapatnam, Andhra Pradesh 530013, India\nVisakhapatnam\nAndhra Pradesh\nIndia\n530013\n50-107-2\n',NULL,'DEEPTHI NURSING HOME invoice','DEEPTHI NURSING HOME_15678_360.pdf',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(361,15662,'.8','1','0.6','3','1.0','5',NULL,NULL,'4','1',1,'11.6','2019-05-31 12:51:44','2019-05-31',243,'50-107-2, North Extension, Balayya Sastri Layout, Seethammadara, Visakhapatnam, Andhra Pradesh 530013, India\nVisakhapatnam\nAndhra Pradesh\nIndia\n530013\n50-107-2\n',NULL,'AMG HOSPITAL invoice','AMG HOSPITAL_15662_361.pdf',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);

/*Table structure for table `hospital_waste_images` */

DROP TABLE IF EXISTS `hospital_waste_images`;

CREATE TABLE `hospital_waste_images` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `hos_id` int(11) DEFAULT NULL,
  `text` varchar(250) DEFAULT NULL,
  `address` text,
  `image` varchar(250) DEFAULT NULL,
  `create_at` datetime DEFAULT NULL,
  `creayte_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=66 DEFAULT CHARSET=latin1;

/*Data for the table `hospital_waste_images` */

insert  into `hospital_waste_images`(`id`,`hos_id`,`text`,`address`,`image`,`create_at`,`creayte_by`) values (61,15650,'HI','167A, Sardar Patel Nagar Rd, Sardar Patel Nagar, Bhagat Singh Nagar, Kukatpally Housing Board Colony, Kukatpally, Hyderabad, Telangana 500085, India\nHyderabad\nTelangana\nIndia\n500085\n167A\n','0.8650920015528913201552891318543.jpg','2019-03-18 12:12:00',206),(62,15653,'HI','167A, Sardar Patel Nagar Rd, Sardar Patel Nagar, Bhagat Singh Nagar, Kukatpally Housing Board Colony, Kukatpally, Hyderabad, Telangana 500085, India\nHyderabad\nTelangana\nIndia\n500085\n167A\n','0.6200540015533132961553313294312.jpg','2019-03-23 09:24:56',212),(63,15660,'HI','50-107-2, North Extension, Balayya Sastri Layout, Seethammadara, Visakhapatnam, Andhra Pradesh 530013, India\nVisakhapatnam\nAndhra Pradesh\nIndia\n530013\n50-107-2\n','0.0380460015574768661557476864906.jpg','2019-05-10 13:57:46',243),(64,15663,'HI','Nuber-8, White House Apartments, Seethammadhara, Visakhapatnam, Andhra Pradesh 530013, India\nVisakhapatnam\nAndhra Pradesh\nIndia\n530013\nVisakhapatnam\n','0.6456070015574890481557489046512.jpg','2019-05-10 17:20:48',243),(65,15666,'HI','50-107-2, North Extension, Balayya Sastri Layout, Seethammadara, Visakhapatnam, Andhra Pradesh 530013, India\nVisakhapatnam\nAndhra Pradesh\nIndia\n530013\n50-107-2\n','0.4764130015575429711557542969738.jpg','2019-05-11 08:19:31',224);

/*Table structure for table `hospital_waste_invoice` */

DROP TABLE IF EXISTS `hospital_waste_invoice`;

CREATE TABLE `hospital_waste_invoice` (
  `h_w_i_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'hospital waste invoice id',
  `hos_id` int(11) DEFAULT NULL,
  `invoice_file` varchar(250) DEFAULT NULL,
  `invoice_name` varchar(250) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `hos_wast_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`h_w_i_id`)
) ENGINE=MyISAM AUTO_INCREMENT=74 DEFAULT CHARSET=latin1;

/*Data for the table `hospital_waste_invoice` */

insert  into `hospital_waste_invoice`(`h_w_i_id`,`hos_id`,`invoice_file`,`invoice_name`,`date`,`hos_wast_id`,`created_at`) values (49,15653,'BABY HOSPITAL_15653_2019-03-19.pdf','BABY HOSPITAL_15653_2019-03-19','2019-03-19',306,'2019-04-08 18:18:03'),(48,15652,'RAGHU_15652_2019-04-08.pdf','RAGHU_15652_2019-04-08','2019-04-08',311,'2019-04-08 18:18:00'),(46,15651,'__2019-03-19.pdf','__2019-03-19','2019-03-19',308,'2019-04-08 18:17:55'),(47,15652,'RAGHU_15652_2019-03-19.pdf','RAGHU_15652_2019-03-19','2019-03-19',303,'2019-04-08 18:17:58'),(45,15651,'__2019-03-18.pdf','__2019-03-18','2019-03-18',301,'2019-04-08 18:17:52'),(44,15650,'PRACHAHOSPITAL_15650_2019-03-18.pdf','PRACHAHOSPITAL_15650_2019-03-18','2019-03-18',299,'2019-04-08 18:17:50'),(43,15646,'__2019-03-19.pdf','__2019-03-19','2019-03-19',307,'2019-04-08 18:17:47'),(42,0,'__2019-03-19.pdf','__2019-03-19','2019-03-19',305,'2019-04-08 18:17:45'),(50,15653,'BABY HOSPITAL_15653_2019-04-08.pdf','BABY HOSPITAL_15653_2019-04-08','2019-04-08',309,'2019-04-08 18:18:05'),(51,15652,'RAGHU_15652_2019-04-09.pdf','RAGHU_15652_2019-04-09','2019-04-09',317,'2019-04-09 12:30:10'),(52,15653,'BABY HOSPITAL_15653_2019-04-18.pdf','BABY HOSPITAL_15653_2019-04-18','2019-04-18',318,'2019-04-19 12:30:08'),(53,0,'__2019-04-20.pdf','__2019-04-20','2019-04-20',319,'2019-04-21 12:30:05'),(54,0,'__2019-04-22.pdf','__2019-04-22','2019-04-22',320,'2019-04-23 12:30:08'),(55,15653,'BABY HOSPITAL_15653_2019-05-06.pdf','BABY HOSPITAL_15653_2019-05-06','2019-05-06',323,'2019-05-07 12:30:11'),(56,15658,'QUEENS NRI HOSPITAL_15658_2019-05-08.pdf','QUEENS NRI HOSPITAL_15658_2019-05-08','2019-05-08',324,'2019-05-09 12:30:09'),(57,0,'__2019-05-10.pdf','__2019-05-10','2019-05-10',331,'2019-05-11 12:30:05'),(58,15658,'QUEENS NRI HOSPITAL_15658_2019-05-10.pdf','QUEENS NRI HOSPITAL_15658_2019-05-10','2019-05-10',327,'2019-05-11 12:30:09'),(59,15663,'APOLLO HOSPITAL_15663_2019-05-10.pdf','APOLLO HOSPITAL_15663_2019-05-10','2019-05-10',326,'2019-05-11 12:30:09'),(60,15664,'ABC HOSPITAL_15664_2019-05-10.pdf','ABC HOSPITAL_15664_2019-05-10','2019-05-10',325,'2019-05-11 12:30:10'),(61,15666,'PADMASREE HOSPITITAL_15666_2019-05-11.pdf','PADMASREE HOSPITITAL_15666_2019-05-11','2019-05-11',336,'2019-05-11 12:30:10'),(62,15673,'PINNACLE HOSPITAL INDIA PVT LTD_15673_2019-05-10.pdf','PINNACLE HOSPITAL INDIA PVT LTD_15673_2019-05-10','2019-05-10',329,'2019-05-11 12:30:11'),(63,15674,'STAR PINNACLE HEART CENTRE PVT LTD_15674_2019-05-10.pdf','STAR PINNACLE HEART CENTRE PVT LTD_15674_2019-05-10','2019-05-10',328,'2019-05-11 12:30:11'),(64,7661510,'__2019-05-10.pdf','__2019-05-10','2019-05-10',333,'2019-05-11 12:30:11'),(65,17730213,'__2019-05-10.pdf','__2019-05-10','2019-05-10',334,'2019-05-11 12:30:12'),(66,15675,'PRADHAMA MULTI SPLTY HOSPITAL  RESEARCH INSTITUTE_15675_2019-05-11.pdf','PRADHAMA MULTI SPLTY HOSPITAL  RESEARCH INSTITUTE_15675_2019-05-11','2019-05-11',337,'2019-05-12 12:30:12'),(67,15676,'MAHATHAM GANDHI CANNCER HOSPITAL RESEARCH INSTITUTE_15676_2019-05-11.pdf','MAHATHAM GANDHI CANNCER HOSPITAL RESEARCH INSTITUTE_15676_2019-05-11','2019-05-11',338,'2019-05-12 12:30:12'),(68,15620,'__2019-05-15.pdf','__2019-05-15','2019-05-15',339,'2019-05-16 12:30:06'),(69,15654,'SAVEERA  HOSPITAL_15654_2019-05-15.pdf','SAVEERA  HOSPITAL_15654_2019-05-15','2019-05-15',346,'2019-05-16 12:30:09'),(70,15656,'GOWRI GOPAL HOSPITAL PVT LTD_15656_2019-05-15.pdf','GOWRI GOPAL HOSPITAL PVT LTD_15656_2019-05-15','2019-05-15',347,'2019-05-16 12:30:09'),(71,15677,'GAYATHRI VIDYA PARISHAD HOSPITAL_15677_2019-05-22.pdf','GAYATHRI VIDYA PARISHAD HOSPITAL_15677_2019-05-22','2019-05-22',359,'2019-05-23 12:30:16'),(72,15678,'DEEPTHI NURSING HOME_15678_2019-05-31.pdf','DEEPTHI NURSING HOME_15678_2019-05-31','2019-05-31',360,'2019-05-31 12:30:10'),(73,15662,'AMG HOSPITAL_15662_2019-05-31.pdf','AMG HOSPITAL_15662_2019-05-31','2019-05-31',361,'2019-06-01 12:30:09');

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
  `logo` varchar(250) DEFAULT NULL,
  `status` int(11) DEFAULT '1',
  `create_at` datetime DEFAULT NULL,
  `create_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`p_id`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=latin1;

/*Data for the table `plant` */

insert  into `plant`(`p_id`,`a_id`,`disposal_plant_name`,`disposal_plant_id`,`mobile`,`email`,`address1`,`address2`,`city`,`state`,`country`,`pincode`,`captcha`,`logo`,`status`,`create_at`,`create_by`) values (31,204,'JAHNAVI','204','0987456134','janu@gmail.com','kphb','','Hyderabad','Telangana','India','502300','',NULL,1,'2019-03-18 11:30:54',203),(32,208,'PREETHI','208','0756123784','preethi@gmail.com','kphb','','Hyderabad','Telangana','India','502300','',NULL,2,'2019-03-18 16:43:44',207),(33,214,'SRIVEN ENVIRON TECHNOLOGIES ','214','9573489997','srivenplant@gmail.com','ananthapur','ananthapur','Ananthapur','Andhra Pradesh','India','515001','',NULL,1,'2019-03-22 20:14:22',207),(34,225,'MARIDI ECO INDUSTIRES ANDHRA PVTL LTD','225','7007403346','maridiplantandhra@gmail.com','madhurawada','madhurawada','Visakhapatnam','Andhra Pradesh','India','530018','',NULL,1,'2019-05-08 13:59:36',220),(35,250,'TEST','250','7896541232','nmbjbsdh@gmail.com','kadapa','kadapa','Kadapa','Odisha','India','516172','',NULL,1,'2019-08-13 12:20:55',249),(36,253,'TEST ONE','253','8500050944','rainbowpubllicschool@gmail.com','kadapa','kadapa one town','Kadapa','Andhra Pradesh','India','516172','',NULL,1,'2019-08-18 12:39:24',207),(37,254,'BAYAPU','254','8500226782','bayapu004@gmail.com','kadapa','kadapa','Kadapa','Andhra Pradesh','India','516172','','',1,'2019-09-17 10:35:04',207),(38,258,'SAI123','258','1233221123','123321@gmail.com','kadapa','kadapa','Kadapa','Andhra Pradesh','Inida','516172','','1568888838.png',1,'2019-09-19 15:55:10',207),(39,262,'SAI','262','1234567890','saiplant@gmail.com','kadapa','kadapa','Kadapa','Andhra Pradesh','India','516172','','',1,'2019-09-24 12:21:33',207);

/*Table structure for table `plant_bio_medical_waste` */

DROP TABLE IF EXISTS `plant_bio_medical_waste`;

CREATE TABLE `plant_bio_medical_waste` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `h_id` int(11) DEFAULT NULL,
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `plant_bio_medical_waste` */

/*Table structure for table `prints_count` */

DROP TABLE IF EXISTS `prints_count`;

CREATE TABLE `prints_count` (
  `p_c_id` int(11) NOT NULL AUTO_INCREMENT,
  `hos_id` int(11) DEFAULT NULL,
  `type` varchar(250) DEFAULT NULL,
  `num` int(11) DEFAULT NULL,
  `tnum` varchar(250) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`p_c_id`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=latin1;

/*Data for the table `prints_count` */

insert  into `prints_count`(`p_c_id`,`hos_id`,`type`,`num`,`tnum`,`created_at`,`created_by`) values (1,15653,'Red',15,'0-15','2019-08-06 09:53:26',207),(2,15653,'Red',15,'15-30','2019-08-06 09:57:27',207),(3,15653,'Red',15,'30-45','2019-08-06 09:57:32',207),(5,15653,'Yellow',48,'0-48','2019-08-06 10:07:47',207),(6,15653,'Yellow',48,'48-96','2019-09-13 17:34:15',207),(7,15653,'Yellow',48,'96-144','2019-09-13 17:34:28',207),(8,15653,'Blue',48,'0-48','2019-09-13 17:36:24',207),(9,15653,'Blue',48,'48-96','2019-09-13 17:37:02',207),(10,15653,'Blue',48,'96-144','2019-09-13 17:38:54',207),(11,15653,'Blue',48,'144-192','2019-09-13 17:40:26',207),(12,15653,'Yellow',48,'144-192','2019-09-13 18:06:12',207),(13,15653,'Yellow(C)',48,'0-48','2019-09-24 13:25:06',207),(14,15653,'Yellow(C)',10,'48-58','2019-09-24 13:25:25',207),(15,15653,'Yellow(C)',48,'58-106','2019-09-24 13:25:41',207),(16,15653,'Red',48,'45-93','2019-09-24 13:26:13',207),(17,15653,'Yellow',48,'192-240','2019-09-24 13:27:04',207),(18,15653,'Yellow(C)',2,'106-108','2019-09-24 14:46:10',207),(19,15653,'Yellow(C)',2,'108-110','2019-09-24 14:46:56',207),(20,15653,'Yellow(C)',2,'110-112','2019-09-24 14:47:20',207),(21,15653,'Red',2,'93-95','2019-09-24 14:48:11',207),(22,15653,'Yellow(C)',2,'112-114','2019-09-24 14:49:20',207),(23,15653,'Yellow(C)',2,'114-116','2019-09-24 14:49:36',207),(24,15653,'Yellow(C)',2,'116-118','2019-09-24 14:50:25',207),(25,15653,'Red',2,'95-97','2019-09-24 14:50:30',207),(26,15653,'Red',2,'97-99','2019-09-24 14:50:33',207),(27,15653,'Red',2,'99-101','2019-09-24 14:51:37',207),(28,15653,'Yellow(C)',2,'118-120','2019-09-24 14:51:48',207),(29,15653,'Yellow(C)',2,'120-122','2019-09-24 14:52:19',207),(30,15653,'Yellow(C)',2,'122-124','2019-09-24 14:53:34',207),(31,15653,'Yellow(C)',2,'124-126','2019-09-24 14:53:43',207),(32,15653,'Yellow(C)',2,'126-128','2019-09-24 14:53:54',207),(33,15653,'Red',2,'101-103','2019-09-24 14:54:08',207),(34,15656,'Yellow(C)',48,'0-48','2019-09-24 14:54:54',207),(35,15653,'Yellow',48,'240-254','2019-09-24 14:59:58',207),(36,15653,'Yellow',48,'288-302','2019-09-24 15:00:13',207),(37,15653,'Yellow',48,'336-350','2019-09-24 15:01:47',207),(38,15653,'Red',48,'103-117','2019-09-24 15:01:57',207),(39,15653,'Yellow(C)',48,'128-142','2019-09-24 16:26:13',207);

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
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=latin1;

/*Data for the table `trucks` */

insert  into `trucks`(`t_id`,`a_id`,`role`,`truck_reg_no`,`owner_name`,`insurence_number`,`owner_mobile`,`driver_name`,`driver_lic_no`,`driver_lic_bad_no`,`driver_mobile`,`route_no`,`description`,`email`,`address1`,`address2`,`city`,`state`,`country`,`pincode`,`captcha`,`status`,`create_at`,`create_by`) values (36,206,3,'TS01PH0011','KAVYA','5478456123','0756123789','KEERTHI','8741236547842','8','0756123789','','','bmw@gmail.com','Ameerpet','','Hyderabad','Telangana','India','5002500','',1,'2019-03-18 11:35:11',203),(37,209,3,'TS098Ap765','ANU','12','9855422233','ARYA','1234','45','9855422233','','','bbmw@gmail.com','nagole','nagole','Hyderabad','Telangana','India','500035','',2,'2019-03-18 16:47:05',207),(38,212,3,'ts02ee3456','RAGHU','f5t5555','9581758358','RAGHU','8898u','888','9291622365','','','dr@gmail.com','Lig 451, kphb road3,  Hyderabad','hyd','Hyderabad','Telangana','India','500072','',1,'2019-03-19 10:00:32',207),(39,218,3,'AP21TU0290','MWS','NEW INDIA','8328579782','MOULALI','KNL','KNL','9440728285','','','MWSKNL@GMAIL.COM','KNL','KNL','KNL','Andhra Pradesh','India','518002','',1,'2019-03-29 12:37:46',207),(40,223,3,'ap31te3728','MARIDI 1','united123456789','6300334322','PRAVEEN','lic123456789','badge123456789','6300334322','','','driverv1@gmail.com','eenadu','eenadu','Visakhapatnam','Andhra Pradesh','India','530018','',2,'2019-05-08 13:13:33',220),(41,224,3,'ap31te3728','MARDI','united123456789','6300334322','PRAVEEN','lic123456789','badge123456789','6300334322','','','driverv1@gmail.com','vsp','vsp','Visakhapatnam','Andhra Pradesh','India','530018','',1,'2019-05-08 13:25:38',220),(42,235,3,'ap31te0668','CHANDRARAO','123456789','9929590345','CHANDRARO','123456789','123456','9929590345','','','chandrao@gmail.com','seethammadhra vsp-13','near setharamaraju statue','Visakhapatnam','Andhra Pradesh','India','530013','',1,'2019-05-10 11:23:19',220),(43,243,3,'ap31te0531','RAJESH','123456789','9959470389','BHANU','123456789','123456','8074170053','','','bhanud2@gmail.com','visakhapatnam','eenadu','Visakhpatnam','Andhra Pradesh','India','530013','',1,'2019-05-10 13:49:17',220),(44,1001,3,NULL,'MARIDI 1','united123456789','6300334322','PRAVEEN','lic123456789','badge123456789',NULL,NULL,NULL,NULL,'eenadu','eenadu','Visakhapatnam',NULL,'','530018',NULL,1,'2019-06-04 15:22:55',937),(45,1002,3,NULL,'CHANDRARAO','123456789','9929590345','CHANDRARO','123456789','123456',NULL,NULL,NULL,NULL,'seethammadhra vsp-13','near setharamaraju statue','Visakhapatnam',NULL,'','530013',NULL,1,'2019-06-04 15:22:55',937),(46,1003,3,NULL,'RAJESH','123456789','9959470389','BHANU','123456789','123456',NULL,NULL,NULL,NULL,'visakhapatnam','eenadu','Visakhpatnam',NULL,'','530013',NULL,1,'2019-06-04 15:22:56',937),(47,1005,3,'ap31te3728','MARIDI 1','united123456789','6300334322','PRAVEEN','lic123456789','badge123456789','6300334322','','','driverv1@gmail.com','eenadu','eenadu','Visakhapatnam','Andhra Pradesh','India','530018',NULL,1,'2019-06-04 15:30:17',937),(48,1006,3,'ap31te0668','CHANDRARAO','123456789','9929590345','CHANDRARO','123456789','123456','9929590345','','','chandrao@gmail.com','seethammadhra vsp-13','near setharamaraju statue','Visakhapatnam','Andhra Pradesh','India','530013',NULL,1,'2019-06-04 15:30:17',937),(49,1007,3,'ap31te0531','RAJESH','123456789','9959470389','BHANU','123456789','123456','8074170053','','','bhanud2@gmail.com','visakhapatnam','eenadu','Visakhpatnam','Andhra Pradesh','India','530013',NULL,1,'2019-06-04 15:30:17',937),(50,251,3,'AP04bf1131','VASUDEVAREDDY','126ygghghjg','8500050944','CHIINA','032434xcmkZNXCMn','xzcxzc','8019345212','','','nmbjbsdhqwedss@gmail.com','kadapa','kadapa','Kadapa','Odisha','India','516172','',1,'2019-08-13 12:22:23',249),(51,260,3,'Ap04bf1191','VASUDEVAREDDY','12664hhdhh','9494346081','VASUDEVAREDDY','122454df','1454','8500050944','','','vasudriver@gmail.com','kadapa','kadapa','Kadapa','Andhra Pradesh','India','516172','',1,'2019-09-24 11:45:00',207);

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `waste` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
