/*
SQLyog Ultimate v8.55 
MySQL - 5.5.5-10.2.7-MariaDB : Database - emsdb
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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

/*Data for the table `customer` */

insert  into `customer`(`id`,`name`,`address`,`tele`) values (1,'Saubash Ranaweera','255, Katuwana Rd,Homagama','0778568569'),(3,'sdsd','sdsd','1234567890'),(4,'asdasdasd','asdsadsad','09458585858'),(5,'sdssdsdsd','ssdsdsds','312312313131'),(6,'bion','jetminx','0989898987');

/*Table structure for table `emp_event` */

DROP TABLE IF EXISTS `emp_event`;

CREATE TABLE `emp_event` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` date DEFAULT NULL,
  `employee_id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
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

insert  into `emp_position`(`employee_id`,`position_id`) values (0,'AUDIO_OPERATER'),(0,'CAMERAMAN'),(1,'AUDIO_OPERATER'),(2,'AUDIO_OPERATER'),(2,'CAMERAMAN'),(3,'AUDIO_OPERATER'),(3,'CAMERAMAN'),(5,'AUDIO_OPERATER'),(5,'CAMERAMAN'),(12,'AUDIO_OPERATER'),(12,'CAMERAMAN');

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
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

/*Data for the table `employee` */

insert  into `employee`(`id`,`name`,`nid`,`dob`,`gender`,`address`,`contact_no`,`email`) values (1,'sadasd','333','2222-12-13','M','sadsad','2222','aa'),(2,'dfsdfsd','55','1958-12-26','MALE','wqeqwe','33333','sadsad'),(3,'fsdfsdf','77','1958-12-26','MALE','dasdasd','2222','sadsad'),(4,'dsfsdfsf','777','1958-12-26',NULL,NULL,NULL,NULL),(5,'ssdfs','3336','2222-12-13','MALE','wqeqwe','2222','sadsad'),(12,'sam','22335555V','1958-12-26','MALE','dasdasd','2222','dsadsa@dfsdf.com');

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
  `timecreated` timestamp NULL DEFAULT current_timestamp(),
  `status` varchar(50) DEFAULT 'open',
  PRIMARY KEY (`id`,`event_name`),
  KEY `fk_event_customer1_idx` (`customer_id`),
  KEY `fk_event_package1_idx` (`package_id`),
  CONSTRAINT `fk_event_customer1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_event_package1` FOREIGN KEY (`package_id`) REFERENCES `package` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=utf8;

/*Data for the table `event` */

insert  into `event`(`id`,`event_date`,`event_name`,`place`,`starting_time`,`end_time`,`no_of_cams`,`booked_or_not`,`balance_amount`,`customer_id`,`package_id`,`usercreated`,`timecreated`,`status`) values (1,'2017-10-31','Ruwan doratuwa','Dompe','16:30:00','18:30:00',2,'booked','0.00',1,1,NULL,'2017-10-31 05:33:03','open'),(2,'2017-10-31','Ruwan doratuwa','Dompe','16:30:00','18:30:00',2,'booked',NULL,1,1,NULL,'2017-10-31 05:33:03','open'),(3,'2017-10-31','Ruwan doratuwa','Dompe','16:30:00','18:30:00',2,'booked',NULL,1,1,NULL,'2017-10-31 05:33:03','open'),(4,'2017-10-31','Ruwan doratuwa','Dompe','16:30:00','18:30:00',2,'booked',NULL,1,1,NULL,'2017-10-31 05:33:03','open'),(5,'2017-10-31','Ruwan doratuwa','Dompe','16:30:00','18:30:00',2,'booked',NULL,1,1,NULL,'2017-10-31 05:33:03','open'),(6,'2017-10-31','Ruwan doratuwa','Dompe','16:30:00','18:30:00',2,'booked',NULL,1,1,NULL,'2017-10-31 05:33:03','open'),(7,'2017-10-31','Ruwan doratuwa','Dompe','16:30:00','18:30:00',2,'booked',NULL,1,1,NULL,'2017-10-31 05:33:03','open'),(8,'2017-10-31','Ruwan doratuwa','Dompe','16:30:00','18:30:00',2,'booked',NULL,1,1,NULL,'2017-10-31 05:33:03','open'),(9,'2017-10-31','Ruwan doratuwa','Dompe','16:30:00','18:30:00',2,'booked',NULL,1,1,NULL,'2017-10-31 05:33:03','open'),(10,'2017-10-31','Ruwan doratuwa','Dompe','16:30:00','18:30:00',2,'booked',NULL,1,1,NULL,'2017-10-31 05:33:03','open'),(12,'2017-10-31','sdsd','sdsds','04:45:00','04:45:00',5,'pending',NULL,1,1,0,'2017-10-31 09:50:05','open'),(13,'2017-11-02','xx','yy','04:45:00','04:55:00',5,'pending',NULL,1,2,1,'2017-10-31 10:24:27','open'),(14,'2017-11-02','xx','yy','04:45:00','04:55:00',5,'pending',NULL,1,2,1,'2017-10-31 10:28:52','open'),(15,'2017-11-02','xx','yy','04:45:00','04:55:00',5,'pending',NULL,1,2,1,'2017-10-31 10:29:25','open'),(16,'2017-10-07','sdas','asdasd','04:45:00','04:15:00',3,'pending',NULL,1,1,1,'2017-10-31 13:58:30','open'),(17,'2017-10-06','sadasd','sadasd','04:45:00','04:58:00',5,'pending',NULL,1,1,1,'2017-10-31 14:07:24','open'),(18,'2017-11-04','aaaa','dddd','04:54:00','04:51:00',5,'ending',NULL,1,1,1,'2017-11-02 10:16:44','open'),(19,'2017-11-04','aaaa','dddd','04:54:00','04:51:00',5,'ending',NULL,1,1,1,'2017-11-02 11:06:45','open'),(20,'2017-11-04','aaaa','dddd','04:54:00','04:51:00',5,'ending',NULL,1,1,1,'2017-11-02 11:13:20','open'),(21,'2017-11-04','aaaa','dddd','04:54:00','04:51:00',5,'ending',NULL,1,1,1,'2017-11-02 11:18:30','open'),(22,'2017-11-04','aaaa','dddd','04:54:00','04:51:00',5,'ending',NULL,1,1,1,'2017-11-02 11:20:45','open'),(23,'2017-11-04','aaaa','dddd','04:54:00','04:51:00',5,'ending',NULL,1,1,1,'2017-11-02 11:22:47','open'),(24,'2017-11-04','aaaa','dddd','04:54:00','04:51:00',5,'ending',NULL,1,1,1,'2017-11-02 11:25:36','open'),(25,'2017-11-04','aaaa','dddd','04:54:00','04:51:00',5,'ending',NULL,1,1,1,'2017-11-02 11:27:37','open'),(26,'2017-11-04','aaaa','dddd','04:54:00','04:51:00',5,'ending',NULL,1,1,1,'2017-11-02 11:30:16','open'),(27,'2017-11-04','aaaa','dddd','04:54:00','04:51:00',5,'ending',NULL,1,1,1,'2017-11-02 11:36:18','open'),(28,'2017-11-04','aaaa','dddd','04:54:00','04:51:00',5,'ending',NULL,1,1,1,'2017-11-02 11:39:40','open'),(29,'2017-11-04','aaaa','dddd','04:54:00','04:51:00',5,'ending',NULL,1,1,1,'2017-11-02 11:40:34','open'),(30,'2017-11-04','aaaa','dddd','04:54:00','04:51:00',5,'ending',NULL,1,1,1,'2017-11-02 11:41:20','open'),(31,'2017-11-04','aaaa','dddd','04:54:00','04:51:00',5,'ending',NULL,1,1,1,'2017-11-02 11:44:27','open'),(32,'2017-11-04','aaaa','dddd','04:54:00','04:51:00',5,'ending',NULL,1,1,1,'2017-11-02 11:45:10','open'),(33,'2017-11-04','aaaa','dddd','04:54:00','04:51:00',5,'ending',NULL,1,1,1,'2017-11-02 11:46:12','open'),(34,'2017-11-04','aaaa','dddd','04:54:00','04:51:00',5,'ending',NULL,1,1,1,'2017-11-02 12:00:05','open'),(35,'2017-11-04','aaaa','dddd','04:54:00','04:51:00',5,'ending',NULL,1,1,1,'2017-11-02 12:02:07','open'),(36,'2017-11-04','aaaa','dddd','04:54:00','04:51:00',5,'ending',NULL,1,1,1,'2017-11-02 12:03:16','open'),(37,'2017-11-04','aaaa','dddd','04:54:00','04:51:00',5,'ending',NULL,1,1,1,'2017-11-02 12:03:53','open'),(38,'2017-11-04','aaaa','dddd','04:54:00','04:51:00',5,'ending',NULL,1,1,1,'2017-11-02 12:05:13','open'),(39,'2017-11-04','aaaa','dddd','04:54:00','04:51:00',5,'ending',NULL,1,1,1,'2017-11-02 12:05:51','open'),(40,'2017-11-04','aaaa','dddd','04:54:00','04:51:00',5,'ending',NULL,1,1,1,'2017-11-02 12:06:40','open'),(41,'2017-11-04','aaaa','dddd','04:54:00','04:51:00',5,'ending',NULL,1,1,1,'2017-11-02 12:07:37','open'),(42,'2017-11-04','aaaa','dddd','04:54:00','04:51:00',5,'ending',NULL,1,1,1,'2017-11-02 12:08:09','open'),(43,'2017-11-04','aaaa','dddd','04:54:00','04:51:00',5,'ending',NULL,1,1,1,'2017-11-02 12:09:28','open'),(44,'2017-11-04','aaaa','dddd','04:54:00','04:51:00',5,'ending',NULL,1,1,1,'2017-11-02 12:10:21','open'),(45,'2017-11-04','aaaa','dddd','04:54:00','04:51:00',5,'ending',NULL,1,1,1,'2017-11-02 12:12:45','open'),(46,'2017-11-03','sadsda','sadsadsa','04:45:00','05:59:00',5,'pending',NULL,1,2,1,'2017-11-02 12:28:23','open'),(47,'2017-11-03','sadsda','sadsadsa','04:45:00','05:59:00',5,'pending',NULL,1,2,1,'2017-11-02 12:32:28','open'),(48,'2017-11-02','aa','sdsds','04:54:00','05:54:00',5,'pending',NULL,1,1,1,'2017-11-02 17:11:16','open'),(49,'2017-11-02','aa','sdsds','04:54:00','05:54:00',5,'booked','0.00',1,1,1,'2017-11-02 17:14:35','open'),(50,'2017-11-03','sadsad','dsadsadsad','12:12:00','12:05:00',5,'booked','-284621.00',1,1,1,'2017-11-02 17:40:10','open'),(51,'2017-11-17','wewew','weweee','02:22:00','14:32:00',4,'booked','0.00',3,3,1,'2017-11-10 19:53:18','payment done');

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
  `paydate` timestamp NULL DEFAULT current_timestamp(),
  `payment` decimal(10,2) DEFAULT NULL,
  `quotation_id` int(11) NOT NULL,
  `event_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_payment_quotation1_idx` (`quotation_id`),
  CONSTRAINT `fk_payment_quotation1` FOREIGN KEY (`quotation_id`) REFERENCES `quotation` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
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
  KEY `fk_quotation_event1_idx` (`event_id`),
  CONSTRAINT `fk_quotation_event1` FOREIGN KEY (`event_id`) REFERENCES `event` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

/*Data for the table `quotation` */

insert  into `quotation`(`id`,`camera_charges`,`other`,`discount`,`total`,`event_id`) values (1,130000,1500,122,'131378.00',49),(2,130000,155,552,'129603.00',50),(3,130000,2323,233,'132090.00',50),(4,130000,2323,23,'132300.00',50),(5,130000,2323,2323,'130000.00',50),(6,130000,223,44,'130179.00',50),(7,130000,234234,234234,'130000.00',50),(8,130000,32234,423432,'-261198.00',50),(9,72000,4,5,'71999.00',51),(10,72000,121,1123,'70998.00',51);

/*Table structure for table `user` */

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(45) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  `employee_id` int(11) NOT NULL,
  `user_type` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_user_employee_idx` (`employee_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `user` */

insert  into `user`(`id`,`username`,`password`,`employee_id`,`user_type`) values (1,'Shanaka','a',1,'ADMIN'),(2,'dsadsa@dfsdf.com','3e6d2220e0c8750e0ac2d901bdf27da8c25a13ce',12,'EMPLOYEE');

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
