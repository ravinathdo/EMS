/*
SQLyog Ultimate v8.55 
MySQL - 5.5.5-10.1.21-MariaDB : Database - emsdb
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
  KEY `fk_emp_event_event1_idx` (`event_id`),
  CONSTRAINT `fk_emp_event_event1` FOREIGN KEY (`event_id`) REFERENCES `event` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_emp_team_employee1` FOREIGN KEY (`employee_id`) REFERENCES `employee` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=utf8;

/*Data for the table `emp_event` */

insert  into `emp_event`(`id`,`date`,`employee_id`,`event_id`) values (1,'0000-00-00',2,1),(2,'0000-00-00',3,1),(3,'0000-00-00',7,1),(4,'0000-00-00',2,1),(5,'0000-00-00',7,1),(6,'0000-00-00',2,1),(7,'0000-00-00',2,2),(8,'0000-00-00',3,2),(9,'0000-00-00',7,2),(10,'0000-00-00',2,2),(11,'0000-00-00',7,2),(12,'0000-00-00',2,2),(13,'0000-00-00',2,3),(14,'0000-00-00',3,3),(15,'0000-00-00',7,3),(16,'0000-00-00',2,3),(17,'0000-00-00',7,3),(18,'0000-00-00',2,3),(19,'0000-00-00',2,4),(20,'0000-00-00',3,4),(21,'0000-00-00',7,4),(22,'0000-00-00',2,4),(23,'0000-00-00',7,4),(24,'0000-00-00',2,4),(25,'0000-00-00',2,5),(26,'0000-00-00',3,5),(27,'0000-00-00',7,5),(28,'0000-00-00',2,5),(29,'0000-00-00',7,5),(30,'0000-00-00',2,5),(31,'0000-00-00',2,6),(32,'0000-00-00',3,6),(33,'0000-00-00',7,6),(34,'0000-00-00',2,6),(35,'0000-00-00',7,6),(36,'0000-00-00',2,6),(37,'0000-00-00',2,7),(38,'0000-00-00',3,7),(39,'0000-00-00',7,7),(40,'0000-00-00',2,7),(41,'0000-00-00',7,7),(42,'0000-00-00',2,7),(43,'0000-00-00',2,8),(44,'0000-00-00',3,8),(45,'0000-00-00',7,8),(46,'0000-00-00',2,8),(47,'0000-00-00',7,8),(48,'0000-00-00',2,8),(49,'0000-00-00',2,9),(50,'0000-00-00',3,9),(51,'0000-00-00',7,9),(52,'0000-00-00',2,9),(53,'0000-00-00',7,9),(54,'0000-00-00',2,9),(55,'0000-00-00',2,10),(56,'0000-00-00',3,10),(57,'0000-00-00',7,10),(58,'0000-00-00',2,10),(59,'0000-00-00',7,10),(60,'0000-00-00',2,10);

/*Table structure for table `emp_position` */

DROP TABLE IF EXISTS `emp_position`;

CREATE TABLE `emp_position` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `employee_id` int(11) NOT NULL,
  `position` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_emp_position_employee1_idx` (`employee_id`),
  CONSTRAINT `fk_emp_position_employee1` FOREIGN KEY (`employee_id`) REFERENCES `employee` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8;

/*Data for the table `emp_position` */

insert  into `emp_position`(`id`,`employee_id`,`position`) values (1,2,'c'),(2,2,'se'),(3,2,'vo'),(4,3,'c'),(5,3,'se'),(6,4,'c'),(7,4,'se'),(8,5,'c'),(9,5,'se'),(10,6,'c'),(11,6,'se'),(12,7,'ta'),(13,7,'ao'),(14,7,'vo'),(15,8,'ta'),(16,8,'ao'),(17,8,'vo'),(18,9,'ta'),(19,9,'ao'),(20,9,'vo'),(21,10,'ta'),(22,10,'ao'),(23,10,'vo'),(24,11,'fm'),(25,12,'ca'),(26,12,'fm'),(27,13,'ca'),(28,13,'fm'),(29,14,'ca'),(30,14,'fm'),(31,15,'ca'),(32,15,'fm'),(33,16,'ca'),(34,16,'fm'),(35,17,'ca'),(36,17,'fm'),(37,18,'c'),(38,18,'se');

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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

/*Data for the table `employee` */

insert  into `employee`(`id`,`name`,`nid`,`dob`,`gender`,`address`,`contact_no`) values (1,'Shanaka Kodagoda','895648962V','1989-05-07','Male','Katuwana Rd,Homagama','0716364868'),(2,'Nuwan Malinda','8795689563V','1987-05-12','Male','Niripola, Hanwella','0778956234'),(3,'Harshana Silva','8796589658V','1987-09-08','Male','Warallawaththa, Yakkala','0778956428'),(4,'Dasun Rajapaksha','88569325896V','1988-04-02','Male','Bandarawaththa,Biyagama','0718956489'),(5,'Nimal kumara','8579895648V','0985-02-06','Male','Miriswaththa,Gampaha','0778945692'),(6,'Lakmal Siriwardana','8625369874V','1986-03-25','Male','Nawagamuwa','07189564269'),(7,'Sandun Perera','9025896348V','1990-03-03','Male','Hokandara','0718956234'),(8,'Jayantha Susiripala','7989564689V','1979-08-14','Male','Delkanda','0789564896'),(9,'Nishantha Ranaweera','8856497256V','1988-07-28','Male','Hanwella','0718956483'),(10,'Kasun Jayathilaka','9189576324V','1991-05-29','Male','Maharagama','0789632451'),(11,'Sujeewa Nimalasiri','7985632415V','1979-10-12','Male','Baththaramulla','0772468971'),(12,'Ruwan Perera','8896352417V','1988-05-22','Male','Rathmalana','0789654236'),(13,'Sisira Jayamal','8754231536V','1987-06-20','Male','Kadawatha','0775624893'),(14,'Sandaruwan Nonis','8765324215V','1987-04-25','Male','Jaela','0714562583'),(15,'Malitha Pathirana','8675394621V','1986-09-15','Male','Kolonnawa','0780236335'),(16,'Ravi Silva','7853369841V','1978-06-04','Male','Rajagiriya','0778546985'),(17,'Buddika Sandaruwan','8864275839V','1988-03-18','Male','Malambe','0715564321'),(18,'Nalan Hapuwaththa','8025896764V','1980-10-15','Male','Madampe','0784562589');

/*Table structure for table `event` */

DROP TABLE IF EXISTS `event`;

CREATE TABLE `event` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `event_name` varchar(45) NOT NULL,
  `place` varchar(45) DEFAULT NULL,
  `starting_time` time DEFAULT NULL,
  `end_time` time DEFAULT NULL,
  `no_of_cams` int(11) DEFAULT NULL,
  `booked_or_not` varchar(45) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `package_id` int(11) NOT NULL,
  `usercreated` int(11) DEFAULT NULL,
  `timecreated` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`,`event_name`),
  KEY `fk_event_customer1_idx` (`customer_id`),
  KEY `fk_event_package1_idx` (`package_id`),
  CONSTRAINT `fk_event_customer1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_event_package1` FOREIGN KEY (`package_id`) REFERENCES `package` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

/*Data for the table `event` */

insert  into `event`(`id`,`event_name`,`place`,`starting_time`,`end_time`,`no_of_cams`,`booked_or_not`,`customer_id`,`package_id`,`usercreated`,`timecreated`) values (1,'Ruwan doratuwa','Dompe','16:30:00','18:30:00',2,'booked',1,1,NULL,'2017-10-31 05:33:03'),(2,'Ruwan doratuwa','Dompe','16:30:00','18:30:00',2,'booked',1,1,NULL,'2017-10-31 05:33:03'),(3,'Ruwan doratuwa','Dompe','16:30:00','18:30:00',2,'booked',1,1,NULL,'2017-10-31 05:33:03'),(4,'Ruwan doratuwa','Dompe','16:30:00','18:30:00',2,'booked',1,1,NULL,'2017-10-31 05:33:03'),(5,'Ruwan doratuwa','Dompe','16:30:00','18:30:00',2,'booked',1,1,NULL,'2017-10-31 05:33:03'),(6,'Ruwan doratuwa','Dompe','16:30:00','18:30:00',2,'booked',1,1,NULL,'2017-10-31 05:33:03'),(7,'Ruwan doratuwa','Dompe','16:30:00','18:30:00',2,'booked',1,1,NULL,'2017-10-31 05:33:03'),(8,'Ruwan doratuwa','Dompe','16:30:00','18:30:00',2,'booked',1,1,NULL,'2017-10-31 05:33:03'),(9,'Ruwan doratuwa','Dompe','16:30:00','18:30:00',2,'booked',1,1,NULL,'2017-10-31 05:33:03'),(10,'Ruwan doratuwa','Dompe','16:30:00','18:30:00',2,'booked',1,1,NULL,'2017-10-31 05:33:03');

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
  `date` date DEFAULT NULL,
  `payed` double DEFAULT NULL,
  `quotation_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_payment_quotation1_idx` (`quotation_id`),
  CONSTRAINT `fk_payment_quotation1` FOREIGN KEY (`quotation_id`) REFERENCES `quotation` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `payment` */

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
  PRIMARY KEY (`id`),
  KEY `fk_user_employee_idx` (`employee_id`),
  CONSTRAINT `fk_user_employee` FOREIGN KEY (`employee_id`) REFERENCES `employee` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `user` */

insert  into `user`(`id`,`username`,`password`,`employee_id`,`user_type`) values (1,'Shanaka','a',1,'ADMIN');

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
