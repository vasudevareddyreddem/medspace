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
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

/*Data for the table `admin` */

insert  into `admin`(`a_id`,`role`,`name`,`username`,`email_id`,`password`,`org_password`,`profile_pic`,`status`,`create_at`) values (1,1,'Admin',NULL,'admin@gmail.com','e10adc3949ba59abbe56e057f20f883e',NULL,NULL,1,'2018-05-25 11:45:41'),(3,2,'vasudevaruyu',NULL,'vasu@gmail.com','e10adc3949ba59abbe56e057f20f883e','123456','0.847634001527598351download11.png',1,NULL),(8,3,'hjfghjfghj',NULL,'admin6767gdfgsdf@gmail.com','e10adc3949ba59abbe56e057f20f883e','123456',NULL,0,NULL),(10,4,'rrrr',NULL,'admin678www9@gmail.com','e10adc3949ba59abbe56e057f20f883e','123456',NULL,1,NULL),(11,4,'fjghjgh',NULL,'admin54@gmail.com','e10adc3949ba59abbe56e057f20f883e','123456','0.87265000152750847022.jpg',1,NULL),(12,2,'siva',NULL,'nbfdsgg@gmail.com','e10adc3949ba59abbe56e057f20f883e','123456',NULL,1,NULL),(13,2,'babu tirupathi',NULL,'babu@gmail.com','e10adc3949ba59abbe56e057f20f883e','123456',NULL,1,NULL),(14,3,'babu',NULL,'testdriver@gmail.com','e10adc3949ba59abbe56e057f20f883e','123456',NULL,1,NULL),(15,4,'babu plant',NULL,'babuplant@gmail.com','e10adc3949ba59abbe56e057f20f883e','123456',NULL,1,NULL);

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `disposal` */

insert  into `disposal`(`d_id`,`disposal_total`,`disposal_qty`,`disposal_remaining`,`status`,`create_at`,`create_by`) values (1,'200','150','100',1,'2018-05-28 19:06:54',11),(2,'200','34234','54354',1,'2018-05-29 10:15:45',11);

/*Table structure for table `hospital_list` */

DROP TABLE IF EXISTS `hospital_list`;

CREATE TABLE `hospital_list` (
  `h_id` int(11) NOT NULL AUTO_INCREMENT,
  `a_id` int(11) DEFAULT NULL,
  `hospital_name` varchar(250) DEFAULT NULL,
  `hospital_id` varchar(250) DEFAULT NULL,
  `mobile` varchar(45) DEFAULT NULL,
  `email` varchar(250) DEFAULT NULL,
  `address` varchar(250) DEFAULT NULL,
  `captcha` varchar(250) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `create_at` datetime DEFAULT NULL,
  `barcode` varchar(250) DEFAULT NULL,
  `create_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`h_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `hospital_list` */

insert  into `hospital_list`(`h_id`,`a_id`,`hospital_name`,`hospital_id`,`mobile`,`email`,`address`,`captcha`,`status`,`create_at`,`barcode`,`create_by`) values (1,3,'vasudevaruyu','1','8500050944','vasu@gmail.com','kothapalli khajipet mandal','150',1,'2018-05-25 13:13:13','15272341933.png',1),(2,13,'babu tirupathi','112233456','8500050944','babu@gmail.com','tirupathi','268',0,'2018-05-30 11:05:54','152765855413.png',1);

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
  `create_at` datetime DEFAULT NULL,
  `create_by` int(11) DEFAULT NULL,
  `current_address` varchar(250) DEFAULT NULL,
  `invoice_name` varchar(250) DEFAULT NULL,
  `invoice_file` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

/*Data for the table `hospital_waste` */

insert  into `hospital_waste`(`id`,`h_id`,`genaral_waste_kgs`,`genaral_waste_qty`,`infected_plastics_kgs`,`infected_plastics_qty`,`infected_waste_kgs`,`infected_waste_qty`,`glassware_watse_kgs`,`glassware_watse_qty`,`status`,`create_at`,`create_by`,`current_address`,`invoice_name`,`invoice_file`) values (17,1,'100','10','200','10','450','12','350','5',1,'2018-05-29 18:39:01',3,'miyapur','vasudevaruyuinvoice','vasudevaruyu_1_17.pdf'),(18,1,'100','10','200','10','450','12','350','5',1,'2018-05-29 18:39:04',3,'miyapur','vasudevaruyuinvoice','vasudevaruyu_1_18.pdf'),(19,2,'100','10','200','10','450','12','350','5',1,'2018-05-30 11:20:44',13,'miyapur','babu tirupathi invoice','babu tirupathi_2_19.pdf');

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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `hospital_waste_images` */

insert  into `hospital_waste_images`(`id`,`hos_id`,`text`,`image`,`create_at`,`creayte_by`) values (4,2,'ghjkhj','0.34982300152767189022.jpg','2018-05-30 14:48:10',1);

/*Table structure for table `plant` */

DROP TABLE IF EXISTS `plant`;

CREATE TABLE `plant` (
  `p_id` int(11) NOT NULL AUTO_INCREMENT,
  `a_id` int(11) DEFAULT NULL,
  `disposal_plant_name` varchar(250) DEFAULT NULL,
  `disposal_plant_id` varchar(250) DEFAULT NULL,
  `mobile` varchar(250) DEFAULT NULL,
  `email` varchar(250) DEFAULT NULL,
  `address` varchar(250) DEFAULT NULL,
  `captcha` varchar(250) DEFAULT NULL,
  `status` int(11) DEFAULT '1',
  `create_at` datetime DEFAULT NULL,
  `create_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`p_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `plant` */

insert  into `plant`(`p_id`,`a_id`,`disposal_plant_name`,`disposal_plant_id`,`mobile`,`email`,`address`,`captcha`,`status`,`create_at`,`create_by`) values (2,10,'rrrr','jfgjfghj','8500050944','admin678www9@gmail.com','trter','197',1,'2018-05-25 18:29:41',1),(3,11,'fjghjgh','jfgjfghj','6745674567','admin54@gmail.com','testing','231',1,'2018-05-28 09:56:02',1),(4,15,'babu plant','plant11','8500050944','babuplant@gmail.com','tirupathi','192',1,'2018-05-30 11:10:54',1);

/*Table structure for table `roles` */

DROP TABLE IF EXISTS `roles`;

CREATE TABLE `roles` (
  `r_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) DEFAULT NULL,
  `status` int(11) DEFAULT '1',
  `create` datetime DEFAULT NULL,
  PRIMARY KEY (`r_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `roles` */

insert  into `roles`(`r_id`,`name`,`status`,`create`) values (1,'admin',1,NULL),(2,'Hospital',1,NULL),(3,'Truck',1,NULL),(4,'Plant',1,NULL);

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
  `captcha` varchar(250) DEFAULT NULL,
  `status` int(11) DEFAULT '1',
  `create_at` datetime DEFAULT NULL,
  `create_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`t_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `trucks` */

insert  into `trucks`(`t_id`,`a_id`,`role`,`truck_reg_no`,`owner_name`,`insurence_number`,`owner_mobile`,`driver_name`,`driver_lic_no`,`driver_lic_bad_no`,`driver_mobile`,`route_no`,`description`,`email`,`captcha`,`status`,`create_at`,`create_by`) values (3,8,3,'ap02ap1123','hjfghjfghj','vbcbv','6546765767','ghdgfh','gdfgh','ghfh','6746746766','kghkjk','jkgkhjkhj','admin6767gdfgsdf@gmail.com','248',0,'2018-05-25 17:55:49',1),(4,14,3,'ap04ap1124','babu','ghfg45454','8500050944','test','12567565fgh','fgfd45767','8019345212','1','testing','testdriver@gmail.com','138',1,'2018-05-30 11:09:42',1);

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
  `status` int(11) DEFAULT '1',
  `create_at` datetime DEFAULT NULL,
  `create_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`w_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

/*Data for the table `waste` */

insert  into `waste`(`w_id`,`truck_id`,`route_id`,`gen_waste_in_Kg`,`gen_waste_in_qty`,`inf_pla_waste_in_Kg`,`inf_pla_waste_in_qty`,`inf_waste_in_Kg`,`inf_waste_in_qty`,`glassware_waste_in_kg`,`glassware_waste_in_qty`,`status`,`create_at`,`create_by`) values (1,'3','kghkjk','200','10','250','10','300','10','4560','12',1,'2018-04-18 18:48:17',11),(2,'3','kghkjk','200','10','250','10','300','10','4560','12',1,'2018-03-18 18:49:50',11),(3,'3','kghkjk','50','20','250','10','300','10','4560','12',1,'2018-02-28 18:58:29',11),(4,'3','kghkjk','10','10','20','10','30','10','40','10',1,'2018-04-29 11:20:55',11),(5,'3','kghkjk','65','654','5645','4564','645','6456','6456','645',1,'2018-04-29 11:20:55',11),(6,'3','kghkjk','78','7','876','7876','878','878','787','87',1,'2018-05-29 11:21:12',11),(7,'3','kghkjk','555','45','578','46','46','46','4467','69',1,'2018-05-29 11:21:38',11),(8,'3','kghkjk','675','23','898','34','789','44','780','55',1,'2018-05-29 11:22:14',11);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
