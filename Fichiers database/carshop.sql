-- MariaDB dump 10.19-11.3.0-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: carshop
-- ------------------------------------------------------
-- Server version	11.3.0-MariaDB

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
-- Table structure for table `businesshours`
--

DROP TABLE IF EXISTS `businesshours`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `businesshours` (
  `id` tinyint(1) NOT NULL AUTO_INCREMENT,
  `openingmorning` char(5) DEFAULT NULL,
  `closingmorning` char(5) DEFAULT NULL,
  `secondperiod` tinyint(1) DEFAULT NULL,
  `openingafternoon` char(5) DEFAULT NULL,
  `closingafternoon` char(5) DEFAULT NULL,
  `open` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `businesshours`
--

LOCK TABLES `businesshours` WRITE;
/*!40000 ALTER TABLE `businesshours` DISABLE KEYS */;
INSERT INTO `businesshours` VALUES
(1,'07:15','11:10',0,'13:20','19:50',0),
(2,'07:30','19:00',1,NULL,NULL,0),
(3,'07:30','19:00',1,NULL,NULL,0),
(4,'09:30','11:30',0,'12:30','17:30',0),
(5,'07:30','17:30',1,NULL,NULL,0),
(6,'07:15','11:45',1,NULL,NULL,0),
(7,NULL,NULL,1,NULL,NULL,1);
/*!40000 ALTER TABLE `businesshours` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cars`
--

DROP TABLE IF EXISTS `cars`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cars` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `carName` varchar(70) NOT NULL,
  `mileage` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `firstCirculation` int(5) DEFAULT NULL,
  `photoNames` text DEFAULT NULL,
  `options` text DEFAULT NULL,
  `brand` varchar(70) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cars`
--

LOCK TABLES `cars` WRITE;
/*!40000 ALTER TABLE `cars` DISABLE KEYS */;
INSERT INTO `cars` VALUES
(2,'aaaa',2500,15100.00,2001,'aaaa.png,aaaa(1).png,aaaa(2).webp,aaaa(3).webp,aaaa(4).jpg','aaa','aaaa'),
(7,'pepo',1554549,365448.00,1976,'','aa','marque'),
(9,'330D',250000,17000.00,2002,'330D.bmp','Siege chauffant','BMW'),
(10,'330D',1700,17000.00,2002,'330D.bmp,330D(1).jpg,330D(2).png,330D(3).png,330D(4).webp,330D(5).webp,330D(6).jpg',',,,,','bmw'),
(11,'Test',1114564,12500.00,2001,'Test.png','Test','Test');
/*!40000 ALTER TABLE `cars` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contact`
--

DROP TABLE IF EXISTS `contact`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `contact` (
  `name` varchar(55) NOT NULL,
  `firstName` varchar(55) NOT NULL,
  `phoneNumber` char(10) NOT NULL,
  `carid` varchar(22) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `contact` text NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contact`
--

LOCK TABLES `contact` WRITE;
/*!40000 ALTER TABLE `contact` DISABLE KEYS */;
INSERT INTO `contact` VALUES
('Jean','Test','6666666660',NULL,'test@test.fr','aaaaaaa',1),
('rarrara','rarararra','0000000000',NULL,'test@test.fr','546+8161616848+',3),
('ezffezezsfe','fzzffzaafzzf','0000000000','11','test@test.fr','1654135651',4);
/*!40000 ALTER TABLE `contact` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `feedback`
--

DROP TABLE IF EXISTS `feedback`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `feedback` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `content` text DEFAULT NULL,
  `name` varchar(55) NOT NULL,
  `note` tinyint(1) NOT NULL,
  `status` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=79 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `feedback`
--

LOCK TABLES `feedback` WRITE;
/*!40000 ALTER TABLE `feedback` DISABLE KEYS */;
INSERT INTO `feedback` VALUES
(77,'</body>','Ca marche',2,1),
(78,'C\'est nul <a href=\"google.com\"> </a>','Ca marche pas des masses',0,2);
/*!40000 ALTER TABLE `feedback` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `servicesandproduct`
--

DROP TABLE IF EXISTS `servicesandproduct`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `servicesandproduct` (
  `name` varchar(75) DEFAULT NULL,
  `prices` decimal(8,2) DEFAULT NULL,
  `options` text DEFAULT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `servicesandproduct`
--

LOCK TABLES `servicesandproduct` WRITE;
/*!40000 ALTER TABLE `servicesandproduct` DISABLE KEYS */;
INSERT INTO `servicesandproduct` VALUES
('Changement de pneus',250.00,'Pneus michelins issus de l\'usine de Lille.',3),
('Changement de pneus',250.00,'Pneus michelins issus de l\'usine de Lille.',4),
('Vidange',250.00,'Pneus michelins issus de l\'usine de Lille.',5);
/*!40000 ALTER TABLE `servicesandproduct` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `username` varchar(254) DEFAULT NULL,
  `password` varchar(72) DEFAULT NULL,
  `role` tinyint(1) NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES
('Vparrot@gmail.com','$2y$10$6fnGBT09jqi4KGH80izXb.m3bRDu5cqNnAQMt1rFyT2dBR7RRRdjO',1,1),
('jeandelacompta@gmail.com','$2y$10$II5lExHA0y3MOA9i8lcuKe9PQizYay99FVfndAJGAZEUGe2XbsV.e',2,3);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-11-21 18:20:44
