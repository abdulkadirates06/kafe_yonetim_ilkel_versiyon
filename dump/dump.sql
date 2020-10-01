-- MySQL dump 10.13  Distrib 5.6.45, for Linux (x86_64)
--
-- Host: localhost    Database: dogkn_kafe
-- ------------------------------------------------------
-- Server version	5.6.45

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
-- Current Database: `dogkn_kafe`
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `dogkn_kafe` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `dogkn_kafe`;

--
-- Table structure for table `check_type`
--

DROP TABLE IF EXISTS `check_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `check_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `check_name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `check_type`
--

LOCK TABLES `check_type` WRITE;
/*!40000 ALTER TABLE `check_type` DISABLE KEYS */;
INSERT INTO `check_type` (`id`, `check_name`) VALUES (1,'Bekleyen'),(2,'Hazırlanıyor'),(3,'Hazırlandı'),(4,'Teslim Edildi');
/*!40000 ALTER TABLE `check_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `invoces`
--

DROP TABLE IF EXISTS `invoces`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `invoces` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `is_pay` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `price` float NOT NULL,
  `table_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `table_id` (`table_id`)
) ENGINE=InnoDB AUTO_INCREMENT=166 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `invoces`
--

LOCK TABLES `invoces` WRITE;
/*!40000 ALTER TABLE `invoces` DISABLE KEYS */;
INSERT INTO `invoces` (`id`, `is_pay`, `user_id`, `price`, `table_id`) VALUES (159,0,4,30,13),(160,0,1,0,16),(161,0,1,60,14),(162,0,1,0,15),(165,0,4,30,1);
/*!40000 ALTER TABLE `invoces` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `payments`
--

DROP TABLE IF EXISTS `payments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `payments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `table_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `price` float NOT NULL,
  `pay_type` tinyint(4) NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=222 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `payments`
--

LOCK TABLES `payments` WRITE;
/*!40000 ALTER TABLE `payments` DISABLE KEYS */;
INSERT INTO `payments` (`id`, `table_id`, `user_id`, `price`, `pay_type`, `date`) VALUES (189,13,1,8.1,2,'2019-08-20 17:46:25'),(190,16,1,48,1,'2019-08-20 20:39:02'),(191,13,1,-4.8,1,'2019-08-23 13:30:51'),(192,16,1,-4.8,1,'2019-08-23 13:30:51'),(193,13,2,17.15,1,'2019-08-26 16:47:46'),(194,16,2,20,2,'2019-08-26 16:48:10'),(195,14,1,120,1,'2019-09-15 15:39:52'),(196,14,1,-6,1,'2019-09-15 15:39:58'),(197,14,1,30,1,'2019-09-26 04:15:02'),(198,14,1,15,1,'2019-09-26 04:15:09'),(199,15,1,15,1,'2019-09-26 04:15:09'),(200,15,1,15,1,'2019-09-26 04:15:09'),(201,15,1,-15,1,'2019-09-26 04:15:14'),(202,14,1,-15,1,'2019-09-26 04:15:14'),(203,15,1,-15,1,'2019-09-26 04:15:14'),(204,15,1,-15,1,'2019-09-26 04:15:14'),(205,15,1,-15,1,'2019-09-26 04:15:14'),(206,15,1,45,2,'2019-09-26 04:15:23'),(207,13,1,55,2,'2019-09-26 04:15:39'),(208,1,1,30,2,'2019-09-26 04:17:14'),(209,13,1,50,1,'2019-09-26 04:20:27'),(210,13,1,100,2,'2019-09-26 04:20:31'),(211,14,1,19,2,'2019-09-26 17:25:30'),(212,13,2,40,1,'2019-09-27 15:32:49'),(213,13,2,40,1,'2019-09-27 15:32:49'),(214,13,4,40,1,'2019-09-27 15:34:18'),(215,13,4,40,2,'2019-09-27 15:36:33'),(216,13,4,40,2,'2019-09-27 15:36:33'),(217,13,1,-40,2,'2019-09-27 15:36:52'),(218,1,4,120,2,'2019-09-27 15:39:36'),(219,13,4,460,1,'2019-09-27 16:09:16'),(220,13,1,10,2,'2019-10-01 04:34:27'),(221,13,4,30,2,'2019-10-01 18:26:40');
/*!40000 ALTER TABLE `payments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_type`
--

DROP TABLE IF EXISTS `product_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `product_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_type`
--

LOCK TABLES `product_type` WRITE;
/*!40000 ALTER TABLE `product_type` DISABLE KEYS */;
INSERT INTO `product_type` (`id`, `product_name`) VALUES (5,'BAŞLANGIÇLAR'),(6,'KAHVALTI'),(7,'KUZU STEAK'),(8,'DANA STEAK'),(9,'GÜVEÇ'),(10,'TAVUK'),(11,'SALATA'),(12,'TATLI'),(13,'İÇEÇEKLER');
/*!40000 ALTER TABLE `product_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_name` varchar(100) NOT NULL,
  `product_type` int(11) NOT NULL,
  `price` float NOT NULL,
  `product_image` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` (`id`, `product_name`, `product_type`, `price`, `product_image`) VALUES (14,'KAVURMALI YUMURTA',6,15,'kavurmal_yumurta.jpg'),(15,'PASTIRMALI YUMURTA',6,20,'pas.jpg'),(16,'SUCUKLU YUMURTA',6,20,'sucuklu.jpg'),(17,'YAPRAK CIĞER',5,20,'Başlangıçlar_yaprak_ciğer.jpg'),(18,'SIGARA BÖREĞI PORSIYON',5,15,'Sigara_böreği.jpg'),(19,'PATATES CIPSI (TEK)',5,10,'Patates_cipsi.jpg'),(20,'ELMA DILIM PATATES',5,15,'Elma_dilim_patates.jpg'),(21,'PACANGA BÖREĞI',5,15,'Pacanga_böreği.jpg'),(22,'SOSIS',5,15,'Sosis.jpg'),(23,'KUZU KAFES ( KILO )',5,200,'Kuzu_Kafes.jpg'),(24,'KUZU PIRZOLA - PORSIYON',7,60,'Kuzu_pirzola.jpg');
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `shippings`
--

DROP TABLE IF EXISTS `shippings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `shippings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `count` int(11) DEFAULT NULL,
  `table_id` int(11) NOT NULL,
  `is_check` tinyint(4) NOT NULL DEFAULT '1',
  `date` datetime NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=504 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shippings`
--

LOCK TABLES `shippings` WRITE;
/*!40000 ALTER TABLE `shippings` DISABLE KEYS */;
INSERT INTO `shippings` (`id`, `product_id`, `user_id`, `count`, `table_id`, `is_check`, `date`, `description`) VALUES (475,11,2,1,13,4,'2019-08-20 17:57:36',''),(476,1,2,1,13,4,'2019-08-20 17:57:39',''),(477,3,2,1,13,4,'2019-08-20 17:57:41',''),(478,2,1,2,16,4,'2019-08-20 20:34:12',''),(479,10,1,2,16,4,'2019-08-20 20:34:16',''),(480,11,1,1,16,4,'2019-08-20 20:34:19',''),(483,1,2,2,13,4,'2019-08-30 15:51:35','Zero'),(484,4,2,3,13,4,'2019-08-30 15:52:10',''),(485,2,1,6,14,4,'2019-09-15 15:38:58',''),(486,4,2,1,15,4,'2019-09-20 18:01:40',''),(487,13,2,3,14,4,'2019-09-26 00:28:47',''),(488,13,3,3,1,4,'2019-09-26 00:29:18',''),(490,4,1,10,13,4,'2019-09-26 04:20:17','ESMA SAYS: SUPANGLE YER MİSİN?'),(491,11,1,1,14,4,'2019-09-26 17:25:05',''),(492,4,1,1,14,4,'2019-09-26 17:25:14',''),(493,17,3,2,13,4,'2019-09-27 15:30:04',''),(494,17,5,6,1,4,'2019-09-27 15:38:37',''),(495,18,5,2,13,4,'2019-09-27 16:07:53',''),(496,22,5,2,13,4,'2019-09-27 16:07:56',''),(497,23,5,2,13,4,'2019-09-27 16:07:59',''),(499,14,4,2,13,4,'2019-10-01 18:25:54',''),(500,19,4,1,13,3,'2019-10-01 23:33:19',''),(501,16,4,1,13,3,'2019-10-01 23:33:22',''),(502,18,4,2,1,3,'2019-10-03 17:27:57',''),(503,24,1,1,14,3,'2019-10-16 20:08:27','');
/*!40000 ALTER TABLE `shippings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `table_type`
--

DROP TABLE IF EXISTS `table_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `table_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type_name` varchar(100) NOT NULL,
  `type_path` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `table_type`
--

LOCK TABLES `table_type` WRITE;
/*!40000 ALTER TABLE `table_type` DISABLE KEYS */;
INSERT INTO `table_type` (`id`, `type_name`, `type_path`) VALUES (1,'Boş','bosmasa.jpg'),(2,'Dolu','dolumasa.jpg'),(3,'Reserved','reserv.png');
/*!40000 ALTER TABLE `table_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tables`
--

DROP TABLE IF EXISTS `tables`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tables` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `table_name` varchar(100) NOT NULL,
  `is_busy` int(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tables`
--

LOCK TABLES `tables` WRITE;
/*!40000 ALTER TABLE `tables` DISABLE KEYS */;
INSERT INTO `tables` (`id`, `table_name`, `is_busy`) VALUES (1,'MASA-1',2),(2,'MASA-2',1),(3,'MASA-3',1),(4,'MASA-4',1),(5,'MASA-5',1),(13,'KAPI - 2',2),(14,'KAPI - 3',2),(15,'KAPI - 4',1),(16,'TERAS 1',1);
/*!40000 ALTER TABLE `tables` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `password` char(32) NOT NULL,
  `user_type` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` char(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `surname` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `username`, `password`, `user_type`, `email`, `phone`, `name`, `surname`) VALUES (1,'admin','202cb962ac59075b964b07152d234b70',1,'kadirates6@gmail.com','5317872821','Admin','Bey'),(2,'kadir','202cb962ac59075b964b07152d234b70',2,'kadir113@gmail.com','1234567890','Kadir','Ateş'),(3,'dogukan','202cb962ac59075b964b07152d234b70',1,'dogukan@gmail.com','1234567893','Dogukan','Demir'),(4,'kasiyer','202cb962ac59075b964b07152d234b70',2,'','','Kasiye','Abi'),(5,'garson','202cb962ac59075b964b07152d234b70',3,'','','Garson','Abi');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usertype`
--

DROP TABLE IF EXISTS `usertype`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usertype` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type_name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`,`type_name`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usertype`
--

LOCK TABLES `usertype` WRITE;
/*!40000 ALTER TABLE `usertype` DISABLE KEYS */;
INSERT INTO `usertype` (`id`, `type_name`) VALUES (1,'Admin'),(2,'Kasiyer'),(3,'Garson');
/*!40000 ALTER TABLE `usertype` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'dogkn_kafe'
--

--
-- Dumping routines for database 'dogkn_kafe'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-12-23 23:16:49
