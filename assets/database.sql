/*
SQLyog Community v11.52 (64 bit)
MySQL - 10.1.21-MariaDB : Database - medspace
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
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

/*Data for the table `admin` */

insert  into `admin`(`a_id`,`role`,`name`,`username`,`email_id`,`password`,`org_password`,`profile_pic`,`status`,`create_at`) values (1,1,'Admin','admin@gmail.com','admin@gmail.com','e10adc3949ba59abbe56e057f20f883e','123456',NULL,1,'2018-06-05 14:57:54'),(2,3,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(15,2,'reddem',NULL,'adminvxcvdgfdg@gmail.com','e10adc3949ba59abbe56e057f20f883e','123456',NULL,1,NULL),(16,2,'pushkar',NULL,'pusjkar123@gmail.com','e10adc3949ba59abbe56e057f20f883e','123456',NULL,1,NULL),(17,2,'vasudevaruyu',NULL,'admin987@gmail.com','e10adc3949ba59abbe56e057f20f883e','123456',NULL,1,NULL),(18,4,'babu plant',NULL,'babu@gmail.com','e10adc3949ba59abbe56e057f20f883e','123456',NULL,1,NULL),(19,2,'like that',NULL,'hos@gmail.com','e10adc3949ba59abbe56e057f20f883e','123456',NULL,1,NULL);

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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `bio_medical_waste` */

insert  into `bio_medical_waste`(`id`,`no_of_bags`,`no_of_kgs`,`color_type`,`weight_type`,`barcode`,`status`,`create_at`,`create_by`) values (1,'10','20','yellow','Grams',NULL,1,'2018-06-15 11:21:38',19),(2,'10','20','yellow','Grams',NULL,1,'2018-06-15 11:21:48',19),(3,'10','20','yellow','Grams',NULL,1,'2018-06-15 11:23:27',19);

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
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=latin1;

/*Data for the table `cbwtf_daily_report` */

insert  into `cbwtf_daily_report`(`id`,`plant_id`,`plant_name`,`address`,`yellow_no_of_Bags`,`yellow_qty`,`red_no_of_Bags`,`red_qty`,`white_no_of_Bags`,`white_qty`,`blue_no_of_Bags`,`blue_qty`,`datetime`,`create_by`) values (43,7,'pracha disposal','flat 22 hno 33, Hyderabad, Telangana, india, 500072','30','30','30','30','30','30','30','30','2018-06-07',18),(44,9,'uytuplant','hyderbad hyd 2, kadapa, Madhya Pradesh, india, 516172',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-06-07',18),(45,10,'babu plant','hyderbad hyderbad, kadapa, Madhya Pradesh, india, 516172','30','2','25','2','10','5','10','5','2018-06-07',18);

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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `disposal` */

insert  into `disposal`(`d_id`,`disposal_total`,`disposal_qty`,`disposal_remaining`,`status`,`create_at`,`create_by`) values (3,'625','600','25',1,'2018-06-05 15:53:30',4),(4,'500','400','100',1,'2018-06-06 14:07:01',9),(5,'500','200','300',1,'2018-06-06 14:31:36',9);

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
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=latin1;

/*Data for the table `hospital_daily_report` */

insert  into `hospital_daily_report`(`id`,`hospital_id`,`hospital_name`,`type`,`address`,`yellow_no_of_Bags`,`yellow_qty`,`red_no_of_Bags`,`red_qty`,`white_no_of_Bags`,`white_qty`,`blue_no_of_Bags`,`blue_qty`,`datetime`,`create_by`) values (24,8,'raghu','','flat 22 flat 33, Hyderabad, Telangana, india, 500072','20','20','40','20','20','20','20','20','2018-06-07',1),(25,9,'pushkar','','hyd hyd, hyd, Telangana, india, 516172',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-06-07',1),(26,10,'vasudevareddy','','kadapa mydukur, kadapa, Arunachal Pradesh, india, 516172',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-06-07',1),(27,11,'blessy','HO','nagole nagole, hyderabad, Telangana, india, 500035',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-06-07',1),(28,12,'like that','Clinic','hyd hyd, kadapa, Maharashtra, india, 516172',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-06-07',1),(29,13,'like that','BH','kadap KADAP, kadapa, Karnataka, india, 516172',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-06-07',1),(30,14,'vaasu','HO','hyd hyd, kadapa, Manipur, india, 516172',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-06-07',1),(31,15,'reddem','HO','hyd hyd, kadapa, MH, india, 516172',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-06-07',1),(32,16,'pushkar','SI','hyderbad hyderbad, hyderabad, KA, india, 516172','20','20','40','20','20','20','20','20','2018-06-07',1),(33,17,'vasudevaruyu','CL','hyderbad hyderbad, hyderabad, KL, india, 516172',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-06-07',1);

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
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

/*Data for the table `hospital_list` */

insert  into `hospital_list`(`h_id`,`a_id`,`hospital_name`,`type`,`route_number`,`hospital_id`,`mobile`,`email`,`address`,`address1`,`address2`,`city`,`state`,`country`,`pincode`,`captcha`,`status`,`create_at`,`barcode`,`barcodetext`,`create_by`) values (8,2,'raghu',NULL,NULL,'','9581758358','raghuram7577@gmail.com',NULL,'flat 22','flat 33','Hyderabad','Telangana','india','500072','218',1,'2018-06-05 15:00:13','15281910132.png',NULL,1),(9,5,'pushkar',NULL,NULL,'5','9494422779','pushkar@gmail.com',NULL,'hyd','hyd','hyd','Telangana','india','516172','48',2,'2018-06-05 15:16:31','15281919915.png',NULL,1),(10,6,'vasudevareddy',NULL,NULL,'6','8500050944','vasudevareddy549@gmail.com',NULL,'kadapa','mydukur','kadapa','Arunachal Pradesh','india','516172','156',1,'2018-06-05 15:44:51','15281936916.png',NULL,1),(11,7,'blessy','HO','4','7','9502710179','anu.kulkarni3592@gmail.com',NULL,'nagole','nagole','hyderabad','AP','india','500035','',1,'2018-06-06 11:49:07','15282659477.png',NULL,1),(12,12,'like that','Clinic',NULL,'12','8500050944','adminvbn@gmail.com',NULL,'hyd','hyd','kadapa','Maharashtra','india','516172','',1,'2018-06-07 12:04:54','152835329412.png',NULL,1),(13,13,'like that','BH',NULL,'13','8500050944','adminbvbxcvbxcvb@gmail.com',NULL,'kadap','KADAP','kadapa','Karnataka','india','516172','',1,'2018-06-07 12:42:09','152835552913.png',NULL,1),(14,14,'vaasu','HO',NULL,'14','8500050944','adminvxcvxvcxc@gmail.com',NULL,'hyd','hyd','kadapa','Manipur','india','516172','',1,'2018-06-07 12:43:46','152835562614.png',NULL,1),(15,15,'reddem','HO',NULL,'15','8500050944','adminvxcvdgfdg@gmail.com',NULL,'hyd','hyd','kadapa','MH','india','516172','',1,'2018-06-07 13:11:32','152835729215.png',NULL,1),(16,16,'pushkar','SI',NULL,'16','9494422779','pusjkar123@gmail.com',NULL,'hyderbad','hyderbad','hyderabad','KA','india','516172','',1,'2018-06-07 13:55:38','152835993816.png',NULL,1),(17,17,'vasudevaruyu','CL',NULL,'17','8500050944','admin987@gmail.com',NULL,'hyderbad','hyderbad','hyderabad','KL','india','516172','',1,'2018-06-07 14:01:11','152836027117.png','VASUCLKL17',1),(18,19,'like that','HO','5','19','8500050944','hos@gmail.com',NULL,'hyderbad','hyd','kadapa','KL','india','516172','',1,'2018-06-09 14:38:26','152853530619.png','LIKEHOKL19',1);

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
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=latin1;

/*Data for the table `hospital_waste` */

insert  into `hospital_waste`(`id`,`h_id`,`genaral_waste_kgs`,`genaral_waste_qty`,`infected_plastics_kgs`,`infected_plastics_qty`,`infected_waste_kgs`,`infected_waste_qty`,`glassware_watse_kgs`,`glassware_watse_qty`,`status`,`total`,`create_at`,`date`,`create_by`,`current_address`,`invoice_name`,`invoice_file`) values (46,8,'10','10','20','10','10','10','10','10',1,'500','2018-06-06 18:56:05','2018-06-06',3,'miyapu',NULL,NULL),(47,8,'10','10','20','10','10','10','10','10',1,'500','2018-06-07 18:56:05','2018-06-06',3,'miyapu',NULL,NULL),(48,8,'10','10','20','10','10','10','10','10',1,'500','2018-06-07 08:56:05','2018-06-06',3,'miyapu',NULL,NULL),(49,16,'10','10','20','10','10','10','10','10',1,'500','2018-06-07 18:56:05','2018-06-06',3,'miyapu',NULL,NULL),(50,16,'10','10','20','10','10','10','10','10',1,'500','2018-06-07 14:56:05','2018-06-06',3,'miyapu','raghu invoice','raghu_8_50.pdf');

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `hospital_waste_images` */

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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

/*Data for the table `plant` */

insert  into `plant`(`p_id`,`a_id`,`disposal_plant_name`,`disposal_plant_id`,`mobile`,`email`,`address1`,`address2`,`city`,`state`,`country`,`pincode`,`captcha`,`status`,`create_at`,`create_by`) values (7,4,'pracha disposal','4','8328579782','kishorebittu792@gmail.com','flat 22','hno 33','Hyderabad','Telangana','india','500072','220',1,'2018-06-05 15:04:26',1),(8,9,'prema','9','9502710179','prema@gmail.com','uppal','uppal','hyderabad','Telangana','india','500035','189',2,'2018-06-06 12:59:05',1),(9,11,'uytuplant','11','8500050944','adminbnn@gmail.com','hyderbad','hyd 2','kadapa','Madhya Pradesh','india','516172','',1,'2018-06-06 16:44:25',1),(10,18,'babu plant','18','8500050944','babu@gmail.com','hyderbad','hyderbad','kadapa','Madhya Pradesh','india','516172','',1,'2018-06-07 18:08:23',1);

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
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

/*Data for the table `trucks` */

insert  into `trucks`(`t_id`,`a_id`,`role`,`truck_reg_no`,`owner_name`,`insurence_number`,`owner_mobile`,`driver_name`,`driver_lic_no`,`driver_lic_bad_no`,`driver_mobile`,`route_no`,`description`,`email`,`address1`,`address2`,`city`,`state`,`country`,`pincode`,`captcha`,`status`,`create_at`,`create_by`) values (9,3,3,'ts01ap2341','ram','667767','9898778787','raghu','gt656665','78','9898778787','02','gg','raghuram8328@gmail.com','flat 22','flat 33','Hyderabad','Telangana','india','500072','60',1,'2018-06-05 15:02:56',1),(10,8,3,'TS01AP2345','olive','1234','9502710179','priya','12','1','9502710179','6','ab','olive@gmail.com','abc','abc','hyderabad','Telangana','india','500035','147',2,'2018-06-06 12:16:59',1),(11,10,3,'AP04AP6382','BAYAPUREDDY','12','8500226782','SIVA','3','D','8500050944','4A','TESTING','bayapu@gmail.com','hyd1','hyd11','hyderabad','Andhra Pradesh','india','500072','226',1,'2018-06-06 14:34:44',1);

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
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

/*Data for the table `waste` */

insert  into `waste`(`w_id`,`truck_id`,`route_id`,`gen_waste_in_Kg`,`gen_waste_in_qty`,`inf_pla_waste_in_Kg`,`inf_pla_waste_in_qty`,`inf_waste_in_Kg`,`inf_waste_in_qty`,`glassware_waste_in_kg`,`glassware_waste_in_qty`,`total_waste`,`status`,`create_at`,`create_by`) values (12,'11','4A','10','10','10','10','10','10','10','10','400',1,'2018-06-07 18:48:33',4),(13,'11','4A','20','20','20','20','20','20','20','20','1600',1,'2018-06-07 18:49:20',4),(14,'11','4A','10','5','25','2','30','2','10','5','210',1,'2018-06-07 18:09:30',18);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
