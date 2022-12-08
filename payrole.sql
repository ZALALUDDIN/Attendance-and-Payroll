-- MariaDB dump 10.19  Distrib 10.4.24-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: payrole
-- ------------------------------------------------------
-- Server version	10.4.24-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `attendance`
--

DROP TABLE IF EXISTS `attendance`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `attendance` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `att_date` date NOT NULL,
  `employee_id` int(11) NOT NULL,
  `status` varchar(255) NOT NULL COMMENT '0 absent 1 present 2 leave',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=120 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `attendance`
--

LOCK TABLES `attendance` WRITE;
/*!40000 ALTER TABLE `attendance` DISABLE KEYS */;
INSERT INTO `attendance` VALUES (5,'2022-09-01',1,'1'),(6,'2022-09-01',4,'1'),(7,'2022-09-01',5,'1'),(8,'2022-09-01',6,'1'),(9,'2022-09-01',7,'2'),(10,'2022-09-03',1,'1'),(11,'2022-09-03',4,'1'),(12,'2022-09-03',5,'1'),(13,'2022-09-03',6,'1'),(14,'2022-09-03',7,'0'),(15,'2022-09-04',1,'1'),(16,'2022-09-04',4,'1'),(17,'2022-09-04',5,'1'),(18,'2022-09-04',6,'1'),(19,'2022-09-04',7,'1'),(20,'2022-09-05',1,'1'),(21,'2022-09-05',4,'1'),(22,'2022-09-05',5,'1'),(23,'2022-09-05',6,'1'),(24,'2022-09-05',7,'1'),(25,'2022-09-06',1,'1'),(26,'2022-09-06',4,'1'),(27,'2022-09-06',5,'1'),(28,'2022-09-06',6,'0'),(29,'2022-09-06',7,'1'),(30,'2022-09-07',1,'1'),(31,'2022-09-07',4,'0'),(32,'2022-09-07',5,'1'),(33,'2022-09-07',6,'1'),(34,'2022-09-07',7,'1'),(35,'2022-09-08',1,'1'),(36,'2022-09-08',4,'1'),(37,'2022-09-08',5,'1'),(38,'2022-09-08',6,'1'),(39,'2022-09-08',7,'0'),(40,'2022-09-11',1,'1'),(41,'2022-09-11',4,'1'),(42,'2022-09-11',5,'0'),(43,'2022-09-11',6,'1'),(44,'2022-09-11',7,'1'),(45,'2022-09-12',1,'1'),(46,'2022-09-12',4,'1'),(47,'2022-09-12',5,'1'),(48,'2022-09-12',6,'1'),(49,'2022-09-12',7,'1'),(50,'2022-09-13',1,'1'),(51,'2022-09-13',4,'0'),(52,'2022-09-13',5,'1'),(53,'2022-09-13',6,'1'),(54,'2022-09-13',7,'1'),(55,'2022-09-14',1,'1'),(56,'2022-09-14',4,'1'),(57,'2022-09-14',5,'1'),(58,'2022-09-14',6,'0'),(59,'2022-09-14',7,'1'),(60,'2022-09-15',1,'1'),(61,'2022-09-15',4,'1'),(62,'2022-09-15',5,'1'),(63,'2022-09-15',6,'1'),(64,'2022-09-15',7,'0'),(65,'2022-09-17',1,'1'),(66,'2022-09-17',4,'1'),(67,'2022-09-17',5,'1'),(68,'2022-09-17',6,'1'),(69,'2022-09-17',7,'1'),(70,'2022-09-18',1,'1'),(71,'2022-09-18',4,'1'),(72,'2022-09-18',5,'0'),(73,'2022-09-18',6,'1'),(74,'2022-09-18',7,'1'),(75,'2022-09-19',1,'1'),(76,'2022-09-19',4,'1'),(77,'2022-09-19',5,'1'),(78,'2022-09-19',6,'1'),(79,'2022-09-19',7,'0'),(80,'2022-09-20',1,'1'),(81,'2022-09-20',4,'1'),(82,'2022-09-20',5,'1'),(83,'2022-09-20',6,'1'),(84,'2022-09-20',7,'1'),(85,'2022-09-21',1,'1'),(86,'2022-09-21',4,'1'),(87,'2022-09-21',5,'1'),(88,'2022-09-21',6,'1'),(89,'2022-09-21',7,'1'),(90,'2022-09-22',1,'1'),(91,'2022-09-22',4,'0'),(92,'2022-09-22',5,'1'),(93,'2022-09-22',6,'1'),(94,'2022-09-22',7,'1'),(95,'2022-09-24',1,'1'),(96,'2022-09-24',4,'1'),(97,'2022-09-24',5,'1'),(98,'2022-09-24',6,'1'),(99,'2022-09-24',7,'1'),(100,'2022-09-26',1,'1'),(101,'2022-09-26',4,'1'),(102,'2022-09-26',5,'1'),(103,'2022-09-26',6,'1'),(104,'2022-09-26',7,'0'),(105,'2022-09-27',1,'1'),(106,'2022-09-27',4,'1'),(107,'2022-09-27',5,'1'),(108,'2022-09-27',6,'1'),(109,'2022-09-27',7,'1'),(110,'2022-09-28',1,'1'),(111,'2022-09-28',4,'1'),(112,'2022-09-28',5,'1'),(113,'2022-09-28',6,'1'),(114,'2022-09-28',7,'1'),(115,'2022-09-29',1,'1'),(116,'2022-09-29',4,'1'),(117,'2022-09-29',5,'1'),(118,'2022-09-29',6,'1'),(119,'2022-09-29',7,'1');
/*!40000 ALTER TABLE `attendance` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `employee`
--

DROP TABLE IF EXISTS `employee`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `employee` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `designation` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `nid` varchar(255) NOT NULL,
  `salary` varchar(255) NOT NULL,
  `pf` varchar(255) NOT NULL,
  `hr` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `employee`
--

LOCK TABLES `employee` WRITE;
/*!40000 ALTER TABLE `employee` DISABLE KEYS */;
INSERT INTO `employee` VALUES (1,'Zalal Uddin','CEO','01825468965','kamal@gmail.com','2584656654','50000','12','10'),(4,'Jahid','Manager','01254687523','jahid@gmail.com','2584656654','45000','12','10'),(5,'Md. Rabib Hasan','Sr Programmer','01857955855','rabib@gmail.com','638768416465','40000','10','25'),(6,'Saiful Islam','Sr Programmer','01605436543','saif@gmail.com','43687865465','38000','10','20'),(7,'Mahadi Rahaman','Jr Programmer','01857485456','mahadiidbit@gmail.com','65475654564','32000','10','20');
/*!40000 ALTER TABLE `employee` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `salary`
--

DROP TABLE IF EXISTS `salary`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `salary` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `employee_id` int(11) NOT NULL,
  `salary` int(11) NOT NULL,
  `pf` int(11) NOT NULL,
  `hr` int(11) NOT NULL,
  `deduction` int(11) NOT NULL,
  `payment` int(11) NOT NULL,
  `year` int(11) NOT NULL,
  `month` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `salary`
--

LOCK TABLES `salary` WRITE;
/*!40000 ALTER TABLE `salary` DISABLE KEYS */;
INSERT INTO `salary` VALUES (1,4,45000,5400,4500,4500,39600,2022,9);
/*!40000 ALTER TABLE `salary` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_auth`
--

DROP TABLE IF EXISTS `tbl_auth`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_auth` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email_address` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `contact_no` varchar(255) NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_auth`
--

LOCK TABLES `tbl_auth` WRITE;
/*!40000 ALTER TABLE `tbl_auth` DISABLE KEYS */;
INSERT INTO `tbl_auth` VALUES (4,'Zalal Uddin','zalal.idb@gmail.com','masum','01825870343','16652100806559.jpg','10470c3b4b1fed12c3baac014be15fac67c6e815',1,1,'2022-10-04 08:34:22','2022-10-08 08:21:20',NULL),(5,'Md. Kamal Uddin','kamal@gmail.com','kamal','01647576743',NULL,'10470c3b4b1fed12c3baac014be15fac67c6e815',1,2,'2022-10-06 08:45:42',NULL,NULL);
/*!40000 ALTER TABLE `tbl_auth` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_role`
--

DROP TABLE IF EXISTS `tbl_role`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role_name` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_role`
--

LOCK TABLES `tbl_role` WRITE;
/*!40000 ALTER TABLE `tbl_role` DISABLE KEYS */;
INSERT INTO `tbl_role` VALUES (1,'Super Admin','superadmin'),(2,'Admin','admin');
/*!40000 ALTER TABLE `tbl_role` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-10-13 10:15:12
