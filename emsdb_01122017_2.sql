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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `customer` */

insert  into `customer`(`id`,`name`,`address`,`tele`) values (1,'Samantha','Fernando','0715833270');

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

insert  into `emp_event`(`employee_id`,`event_id`,`position_id`,`event_date`) values (2,1,'AUDIO_OPERATER','2017-12-06');

/*Table structure for table `emp_position` */

DROP TABLE IF EXISTS `emp_position`;

CREATE TABLE `emp_position` (
  `employee_id` int(11) NOT NULL,
  `position_id` varchar(50) NOT NULL,
  PRIMARY KEY (`employee_id`,`position_id`),
  KEY `fk_emp_position_employee1_idx` (`employee_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `emp_position` */

insert  into `emp_position`(`employee_id`,`position_id`) values (2,'AUDIO_OPERATER'),(2,'CAMERAMAN'),(2,'CAMERA_ASSISTANT'),(2,'CUSTOMER_OFFICER'),(2,'FLOW_MANAGER'),(2,'MANAGER'),(2,'SETUP_ENGINEER'),(2,'TECHNICAL_ASSISTANT'),(2,'VISION_OPERATER');

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `employee` */

insert  into `employee`(`id`,`name`,`nid`,`dob`,`gender`,`address`,`contact_no`,`email`) values (1,'Imalka','887678987V','1988-12-16','Female','Colombo','0719866456','imalka@gmail.com'),(2,'Ravinath','776655556','2017-12-16','MALE','Gampaha','0987788776','ravi@gmail.com');

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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

/*Data for the table `event` */

insert  into `event`(`id`,`event_date`,`event_name`,`place`,`starting_time`,`end_time`,`no_of_cams`,`booked_or_not`,`balance_amount`,`customer_id`,`package_id`,`usercreated`,`timecreated`,`status`) values (1,'2017-12-06','Weddng','Ragama','08:08:00','16:00:00',2,'booked','50000.00',1,1,1,'2017-12-01 10:57:31','open'),(2,'2018-01-18','Home Coming','Colombo 3','07:55:00','10:33:00',2,'booked','28993.00',1,2,1,'2017-12-01 13:55:42','open'),(3,'2017-12-23','Wedding','Negombo','03:33:00','05:05:00',3,'pending',NULL,1,2,1,'2017-12-01 14:11:17','open'),(4,'2017-12-23','Kumara','Gampaha','04:44:00','05:05:00',3,'pending',NULL,1,1,1,'2017-12-01 14:22:53','open');

/*Table structure for table `ozekimessagein` */

DROP TABLE IF EXISTS `ozekimessagein`;

CREATE TABLE `ozekimessagein` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sender` varchar(30) DEFAULT NULL,
  `receiver` varchar(30) DEFAULT NULL,
  `msg` text,
  `senttime` varchar(100) DEFAULT NULL,
  `receivedtime` varchar(100) DEFAULT NULL,
  `operator` varchar(100) DEFAULT NULL,
  `msgtype` varchar(160) DEFAULT NULL,
  `reference` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `ozekimessagein` */

/*Table structure for table `ozekimessageout` */

DROP TABLE IF EXISTS `ozekimessageout`;

CREATE TABLE `ozekimessageout` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sender` varchar(30) DEFAULT NULL,
  `receiver` varchar(30) DEFAULT NULL,
  `msg` text,
  `senttime` varchar(100) DEFAULT NULL,
  `receivedtime` varchar(100) DEFAULT NULL,
  `reference` varchar(100) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  `msgtype` varchar(160) DEFAULT NULL,
  `operator` varchar(100) DEFAULT NULL,
  `errormsg` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

/*Data for the table `ozekimessageout` */

insert  into `ozekimessageout`(`id`,`sender`,`receiver`,`msg`,`senttime`,`receivedtime`,`reference`,`status`,`msgtype`,`operator`,`errormsg`) values (1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(2,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(3,'0711111111','0715833270',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `payment` */

insert  into `payment`(`id`,`paydate`,`payment`,`quotation_id`,`event_id`) values (1,'2017-12-01 10:58:46','2010.00',1,NULL),(2,'2017-12-01 14:48:28','999.00',2,NULL);

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `quotation` */

insert  into `quotation`(`id`,`camera_charges`,`other`,`discount`,`total`,`event_id`) values (1,52000,30,20,'52010.00',1),(2,30000,2,10,'29992.00',2);

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `user` */

insert  into `user`(`id`,`username`,`password`,`employee_id`,`user_type`,`status`) values (1,'imalka@gmail.com','7c222fb2927d828af22f592134e8932480637c0d',1,'ADMIN','ACTIVE'),(2,'ravi@gmail.com','652fb8cd4fd09fe8cfbf16dda6ec488fb2d432be',2,'EMPLOYEE','ACTIVE');

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
