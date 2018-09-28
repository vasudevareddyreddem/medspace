/*
SQLyog Community v11.52 (64 bit)
MySQL - 5.6.39-cll-lve : Database - medspace_db
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`medspace_db` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `medspace_db`;

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
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=latin1;

/*Data for the table `admin` */

insert  into `admin`(`a_id`,`role`,`name`,`username`,`email_id`,`password`,`org_password`,`profile_pic`,`status`,`create_at`) values (1,1,'Admin','admin@gmail.com','admin@gmail.com','d37a8f385b5b0366dffd1fe0dd65a5c0','pollution',NULL,1,'2018-06-05 14:57:54'),(35,0,'RAGHU',NULL,'superadmin@gmail.com','e10adc3949ba59abbe56e057f20f883e','123456',NULL,1,NULL),(36,4,'MEDSPACE',NULL,'medspace@gmail.com','e10adc3949ba59abbe56e057f20f883e','123456',NULL,2,NULL),(37,2,'LANDMARK HOSPITALS',NULL,'raghuram7577@gmail.com','e10adc3949ba59abbe56e057f20f883e','123456',NULL,2,NULL),(38,2,'Swetha hospital',NULL,'karanam.baleu@gmail.com','d37a8f385b5b0366dffd1fe0dd65a5c0','pollution',NULL,2,NULL),(39,3,'Madhu',NULL,'Madhu@gmail.com','e10adc3949ba59abbe56e057f20f883e','123456',NULL,2,NULL),(40,4,'Greentech Kolkata',NULL,'greentechenviron@gmail.com','e10adc3949ba59abbe56e057f20f883e','123456',NULL,1,NULL),(41,2,'INK',NULL,'ramakant222@gmail.com','e10adc3949ba59abbe56e057f20f883e','123456',NULL,2,NULL),(42,3,'Ramakant Burman',NULL,'plant@greentechenviron.com','e10adc3949ba59abbe56e057f20f883e','123456',NULL,1,NULL),(43,4,'Greentech Durgapur ',NULL,'info@greentechenviron.com','e10adc3949ba59abbe56e057f20f883e','123456',NULL,1,NULL),(44,2,'INK',NULL,'ramakant222@gmail.com','e10adc3949ba59abbe56e057f20f883e','123456',NULL,1,NULL),(45,3,'murali',NULL,'2015omw@gmail.com','e10adc3949ba59abbe56e057f20f883e','123456',NULL,2,NULL),(46,4,'owm',NULL,'owm@gmail.com','e10adc3949ba59abbe56e057f20f883e','123456',NULL,2,NULL),(47,2,'abc',NULL,'abc@gmail.com','e10adc3949ba59abbe56e057f20f883e','123456',NULL,1,NULL),(48,2,'medspace',NULL,'raghu@gmail.com','e10adc3949ba59abbe56e057f20f883e','123456',NULL,1,NULL),(49,3,'RAMU',NULL,'RAMU@GMAIL.COM','e10adc3949ba59abbe56e057f20f883e','123456',NULL,1,NULL),(50,4,'MEDASPACE',NULL,'MEDSPACE@GMAIL.COM','e10adc3949ba59abbe56e057f20f883e','123456',NULL,1,NULL);

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
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=latin1;

/*Data for the table `bio_medical_waste` */

insert  into `bio_medical_waste`(`id`,`no_of_bags`,`no_of_kgs`,`color_type`,`weight_type`,`barcode`,`status`,`create_at`,`create_by`) values (38,'1','23','Yellow','Kgs','1532174799.png',1,'2018-07-21 17:36:39',37),(39,'1','11','Red','Kgs','1532174819.png',1,'2018-07-21 17:36:59',37),(40,'1','15','Blue','Kgs','1532174840.png',1,'2018-07-21 17:37:20',37),(41,'1','15','White (ppc)','Kgs','1532174874.png',1,'2018-07-21 17:37:54',37),(42,'100','1000','Yellow','Kgs','1532336045.png',1,'2018-07-23 14:24:05',44),(43,'50','560','Red','Kgs','1532336391.png',1,'2018-07-23 14:29:51',44),(44,'1','1','Yellow','Kgs','1534400513.png',1,'2018-08-16 11:51:53',47);

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
  `create_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`h_id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;

/*Data for the table `hospital_list` */

insert  into `hospital_list`(`h_id`,`a_id`,`hospital_name`,`type`,`route_number`,`hospital_id`,`mobile`,`no_of_beds`,`email`,`address`,`address1`,`address2`,`city`,`state`,`country`,`pincode`,`captcha`,`status`,`create_at`,`barcode`,`barcodetext`,`create_by`) values (25,37,'LANDMARK HOSPITALS','NH','01','37','9581758358','500','raghuram7577@gmail.com',NULL,'hyd','hyd','HYDERABAD','TS','INDIA','500072','',2,'2018-07-21 17:32:35','153217455537.png','LANDNHTS37',1),(26,38,'Swetha hospital','BH','','38','9603645434','50','karanam.baleu@gmail.com',NULL,'Bhavaninagar nagar','nagar','Tpt','AP','India','517501','',2,'2018-07-22 18:19:34','153226377438.png','SWETBHAP38',1),(27,41,'INK','BH','2','41','9903050502','150','ramakant222@gmail.com',NULL,'Institute of Neurosciences Kolkata  185/1 A.J.C. Bose Road, Kolkata 700 017','Institute of Neurosciences Kolkata  185/1 A.J.C. Bose Road, Kolkata 700 017','Kolkata','WB','India','700017','',2,'2018-07-23 12:53:07','153233058741.png','INKBHWB41',1),(28,44,'INK','BH','2','44','9903050502','20','ramakant222@gmail.com',NULL,'Institute of Neurosciences Kolkata  185/1 A.J.C. Bose Road, Kolkata 700 017','Institute of Neurosciences Kolkata  185/1 A.J.C. Bose Road, Kolkata 700 017','Kolkata','WB','India','700017','',1,'2018-07-23 14:00:57','153233465744.png','INKBHWB44',1),(29,47,'abc','BH','','47','1234567898','40','abc@gmail.com',NULL,'tpt','tpt','Tirupati','AP','india','517502','',1,'2018-08-16 11:50:56','153440045647.png','ABCBHAP47',1),(30,48,'medspace','CL','','48','8988998987','45','raghu@gmail.com',NULL,'HYDERABAD','HYDERABAD','HYDERABAD','AR','INDIA','500072','',1,'2018-09-12 15:57:09','153674802948.png','MEDSCLAR48',1);

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
) ENGINE=InnoDB AUTO_INCREMENT=78 DEFAULT CHARSET=latin1;

/*Data for the table `hospital_waste` */

insert  into `hospital_waste`(`id`,`h_id`,`genaral_waste_kgs`,`genaral_waste_qty`,`infected_plastics_kgs`,`infected_plastics_qty`,`infected_waste_kgs`,`infected_waste_qty`,`glassware_watse_kgs`,`glassware_watse_qty`,`status`,`total`,`create_at`,`date`,`create_by`,`current_address`,`invoice_name`,`invoice_file`) values (73,25,'6','3','0.5','1','3','2','3','3',1,'33.5','2018-07-21 17:44:49',NULL,35,'17.4951648,78.3885674','LANDMARK HOSPITALS invoice','LANDMARK HOSPITALS_25_73.pdf'),(74,26,'1','1','1','1','1','1','1','1',1,'4','2018-07-22 18:29:24',NULL,39,'13.640166,79.418905','Swetha hospital invoice','Swetha hospital_26_74.pdf'),(75,26,'1','1','1','1','1','1','1','1',1,'4','2018-07-22 19:19:53',NULL,39,'13.640166,79.418905','Swetha hospital invoice','Swetha hospital_26_75.pdf'),(76,26,'1','1','1','1','1','1','1','1',1,'4','2018-07-22 19:20:33',NULL,39,'13.640166,79.418905','Swetha hospital invoice','Swetha hospital_26_76.pdf'),(77,27,'25','5','50','10','120','12','1000','5',1,'7065','2018-07-23 13:57:40',NULL,42,'22.5979751,88.4005431','INK invoice','INK_27_77.pdf');

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
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

/*Data for the table `hospital_waste_images` */

insert  into `hospital_waste_images`(`id`,`hos_id`,`text`,`image`,`create_at`,`creayte_by`) values (18,25,'','0.258459001532175424IMG-20180720-WA0000.jpg','2018-07-21 17:47:04',35);

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
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

/*Data for the table `plant` */

insert  into `plant`(`p_id`,`a_id`,`disposal_plant_name`,`disposal_plant_id`,`mobile`,`email`,`address1`,`address2`,`city`,`state`,`country`,`pincode`,`captcha`,`status`,`create_at`,`create_by`) values (13,36,'MEDSPACE','36','9581758358','medspace@gmial.com','hyd','hyd','HYDERABAD','Telangana','INDIA','500072','',2,'2018-07-21 17:31:09',1),(14,40,'Greentech Kolkata','40','9903391118','greentechenviron@gmail.com','847A, Lake Town , BlockA, Kolkata-700089','Near Speedage Nursing Home at Lake Town Jessore Road Crossing','Kolkata','West Bengal','India','700089','',1,'2018-07-23 12:32:53',1),(15,43,'Greentech Durgapur ','43','9903391118','info@greentechenviron.com','847A, Lake Town , BlockA, Kolkata-700089','Near Speedage Nursing Home at Lake Town Jessore Road Crossing','Kolkata','West Bengal','India','700089','',1,'2018-07-23 13:13:13',1),(16,46,'owm','46','1234567891','owm@gmail.com','ong','ong','ONGOLE','Andhra Pradesh','India','523001','',2,'2018-08-12 14:33:59',1),(17,50,'MEDASPACE','50','9898978798','MEDSPACE@GMAIL.COM','HYDERABAD','HYDERABAD','HYDERABAD','Andhra Pradesh','INDIA','5000072','',1,'2018-09-12 16:00:25',1);

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
) ENGINE=InnoDB AUTO_INCREMENT=59 DEFAULT CHARSET=latin1;

/*Data for the table `plant_bio_medical_waste` */

insert  into `plant_bio_medical_waste`(`id`,`hos_bio_m_id`,`no_of_bags`,`no_of_kgs`,`color_type`,`weight_type`,`edited`,`status`,`create_at`,`create_by`,`invoice_file`,`invoice_name`) values (58,25,'1','11','Blue','Kgs',1,1,'2018-07-21 17:42:39',36,NULL,NULL);

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
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

/*Data for the table `trucks` */

insert  into `trucks`(`t_id`,`a_id`,`role`,`truck_reg_no`,`owner_name`,`insurence_number`,`owner_mobile`,`driver_name`,`driver_lic_no`,`driver_lic_bad_no`,`driver_mobile`,`route_no`,`description`,`email`,`address1`,`address2`,`city`,`state`,`country`,`pincode`,`captcha`,`status`,`create_at`,`create_by`) values (17,35,3,'TS01AB7577','RAGHU','09','9581758358','RAGHU','01','88','8328579782','','','raghu@gmail.com','hyd','hyd','hyderabad','Telangana','INDIA','500072','',2,'2018-07-21 17:29:53',1),(18,39,3,'Ap03td5788','Madhu','12345','1234567899','Balu','123456','12345666','1234567899','','','Madhu@gmail.com','Tpt','Tpt','Tpt','Andhra Pradesh','India','517501','',2,'2018-07-22 18:26:05',1),(19,42,3,'WB19HH2830','Ramakant Burman','33130014132400000','9903391118','Dulal','wb9720160017019','123456','7044000492','','','plant@greentechenviron.com','847A, Lake Town , BlockA, Kolkata-700089','Near Speedage Nursing Home at Lake Town Jessore Road Crossing','Kolkata','West Bengal','India','700089','',1,'2018-07-23 13:06:28',1),(20,45,3,'ap27tw8937','murali','123456','8099999469','ravi','123456','123456','8099999469','','','2015omw@gmail.com','ongole','ogle','ONGOLE','Andhra Pradesh','India','523001','',2,'2018-08-12 14:29:30',1),(21,49,3,'TS07YY4546','RAMU','777','8888876789','RAMU','6','66','9897897989','','','RAMU@GMAIL.COM','HYDERABAD','HYDERABAD','HYDERABAD','Andhra Pradesh','INDIA','50072','',1,'2018-09-12 15:58:42',1);

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
