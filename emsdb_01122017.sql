/*
SQLyog Ultimate v8.55 
MySQL - 5.5.54 : Database - emsdb
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`emsdb` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `emsdb`;

/*Table structure for table `customer` */

DROP TABLE IF EXISTS `customer`;

CREATE TABLE `customer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `address` varchar(45) DEFAULT NULL,
  `tele` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `customer` */

/*Table structure for table `emp_event` */

DROP TABLE IF EXISTS `emp_event`;

CREATE TABLE `emp_event` (
  `employee_id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `position_id` varchar(50) NOT NULL,
  `event_date` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`employee_id`,`event_id`,`position_id`),
  KEY `fk_emp_team_employee1_idx` (`employee_id`),
  KEY `fk_emp_event_event1_idx` (`event_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `emp_event` */

/*Table structure for table `emp_position` */

DROP TABLE IF EXISTS `emp_position`;

CREATE TABLE `emp_position` (
  `employee_id` int(11) NOT NULL,
  `position_id` varchar(50) NOT NULL,
  PRIMARY KEY (`employee_id`,`position_id`),
  KEY `fk_emp_position_employee1_idx` (`employee_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `emp_position` */

/*Table structure for table `employee` */

DROP TABLE IF EXISTS `employee`;

CREATE TABLE `employee` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `nid` varchar(45) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `gender` varchar(45) DEFAULT NULL,
  `address` varchar(45) DEFAULT NULL,
  `contact_no` varchar(45) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `NewIndex1_nid` (`nid`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `employee` */

insert  into `employee`(`id`,`name`,`nid`,`dob`,`gender`,`address`,`contact_no`,`email`) values (1,'Imalka','887678987V','1988-12-16','Female','Colombo','0719866456','imalka@gmail.com');

/*Table structure for table `event` */

DROP TABLE IF EXISTS `event`;

CREATE TABLE `event` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `event_date` varchar(25) DEFAULT NULL,
  `event_name` varchar(45) NOT NULL,
  `place` varchar(45) DEFAULT NULL,
  `starting_time` time DEFAULT NULL,
  `end_time` time DEFAULT NULL,
  `no_of_cams` int(11) DEFAULT NULL,
  `booked_or_not` varchar(45) NOT NULL,
  `balance_amount` decimal(10,2) DEFAULT NULL,
  `customer_id` int(11) NOT NULL,
  `package_id` int(11) NOT NULL,
  `usercreated` int(11) DEFAULT NULL,
  `timecreated` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `status` varchar(50) DEFAULT 'open',
  PRIMARY KEY (`id`,`event_name`),
  KEY `fk_event_customer1_idx` (`customer_id`),
  KEY `fk_event_package1_idx` (`package_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `event` */

/*Table structure for table `package` */

DROP TABLE IF EXISTS `package`;

CREATE TABLE `package` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `package` varchar(45) NOT NULL,
  `no_of_cameras` int(11) DEFAULT NULL,
  `charge_per_cam` double DEFAULT NULL,
  `description` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

/*Data for the table `package` */

insert  into `package`(`id`,`package`,`no_of_cameras`,`charge_per_cam`,`description`) values (1,'Broadcast',4,26000,'Broadcast'),(2,'Budget',4,15000,'Budget'),(3,'HD',3,18000,'High Definition'),(4,'Production',6,18000,'Low cost Broadcast');

/*Table structure for table `payment` */

DROP TABLE IF EXISTS `payment`;

CREATE TABLE `payment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `paydate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `payment` decimal(10,2) DEFAULT NULL,
  `quotation_id` int(11) NOT NULL,
  `event_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_payment_quotation1_idx` (`quotation_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `payment` */

/*Table structure for table `position` */

DROP TABLE IF EXISTS `position`;

CREATE TABLE `position` (
  `posi` varchar(50) NOT NULL,
  `description` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`posi`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `position` */

insert  into `position`(`posi`,`description`) values ('AUDIO_OPERATER','AUDIO_OPERATER'),('CAMERAMAN','CAMERAMAN'),('CAMERA_ASSISTANT','CAMERA_ASSISTANT'),('CUSTOMER_OFFICER','CUSTOMER_OFFICER'),('FLOW_MANAGER','FLOW_MANAGER'),('MANAGER','MANAGER'),('SETUP_ENGINEER','SETUP_ENGINEER'),('TECHNICAL_ASSISTANT','TECHNICAL_ASSISTANT'),('VISION_OPERATER','VISION_OPERATER');

/*Table structure for table `quotation` */

DROP TABLE IF EXISTS `quotation`;

CREATE TABLE `quotation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `camera_charges` double DEFAULT NULL,
  `other` double DEFAULT NULL,
  `discount` double DEFAULT NULL,
  `total` decimal(10,2) DEFAULT NULL,
  `event_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_quotation_event1_idx` (`event_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `quotation` */

/*Table structure for table `user` */

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(45) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  `employee_id` int(11) NOT NULL,
  `user_type` varchar(20) DEFAULT NULL,
  `status` varchar(60) DEFAULT 'ACTIVE',
  PRIMARY KEY (`id`),
  KEY `fk_user_employee_idx` (`employee_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `user` */

insert  into `user`(`id`,`username`,`password`,`employee_id`,`user_type`,`status`) values (1,'imalka@gmail.com','86f7e437faa5a7fce15d1ddcb9eaeaea377667b8',1,'ADMIN','ACTIVE');

/* Procedure structure for procedure `SPInsertEventTran` */

/*!50003 DROP PROCEDURE IF EXISTS  `SPInsertEventTran` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `SPInsertEventTran`(
IN IN_event_name varchar(45),
IN IN_place varchar(45),
IN IN_starting_time time,
IN IN_end_time time,
IN IN_no_of_cams int,
IN IN_booked_or_not varchar(45),
IN IN_customer_id int,
IN IN_package_id int
)
BEGIN
 
	iNSERT iNTO event(event_name,place,starting_time,end_time,no_of_cams,booked_or_not,customer_id,package_id)
			values (IN_event_name,IN_place,IN_starting_time,IN_end_time,IN_no_of_cams,IN_booked_or_not,
				IN_customer_id,IN_package_id);
	insert into quotation (camera_charges,other,discount,event_id)
		select ev.no_of_cams*pg.charge_per_cam ,null,null,ev.id
		 from event ev
		inner join package pg on ev.package_id=pg.id
		where ev.id=(select max(id) from event);
END */$$
DELIMITER ;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
