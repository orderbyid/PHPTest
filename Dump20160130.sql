CREATE DATABASE  IF NOT EXISTS `prontoprodotti` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `prontoprodotti`;
-- MySQL dump 10.13  Distrib 5.7.9, for Win32 (AMD64)
--
-- Host: localhost    Database: prontoprodotti
-- ------------------------------------------------------
-- Server version	5.6.17

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci,
  `created` datetime NOT NULL,
  `ts` datetime NOT NULL,
  `path` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product`
--

LOCK TABLES `product` WRITE;
/*!40000 ALTER TABLE `product` DISABLE KEYS */;
INSERT INTO `product` VALUES (14,'Maionese','La maionese è comunemente usata come condimento per le patate fritte e per il pesce in tutta Europa, come salsa per i tramezzini e come base per l\'insalata russa in Italia, sul pollo freddo e le uova sode in Francia e nei panini imbottiti in Nord America.','2016-01-28 02:15:01','2016-01-30 02:47:08','f56d13bc67b4f75763ed80d7e8e1ef7121cee63c.jpeg'),(30,'Salsa Tartara','La salsa tartara è solitamente usata per i piatti a base di pesce.','2016-01-28 01:02:05','2016-01-30 02:46:51','e1944a162488d39ee67b919647fc6e17839712b2.jpeg'),(31,'Ketchup','Il ketchup è una salsa agrodolce a base di pomodoro di origine orientale, tradizionalmente utilizzata per accompagnare patatine fritte e altri fritti, oppure per insaporire panini imbottiti.','2016-01-28 01:39:48','2016-01-30 02:39:56','0a05fc405c4ffc6dc535cd41430449124308310d.jpeg'),(35,'Olio EVO','L‘olio EVO altro non è che l’ olio extra vergine di oliva usato maggiormente rispetto a quello di oliva normale. In commercio si trovano molte marche di olio extra vergine di oliva e sono preferibili rispetto ad altri tipo di oli.','2016-01-28 01:11:46','2016-01-30 02:52:29','234770cc68facb7b79e4236228cb0e37591d5311.jpeg'),(37,'Salsa Kebab','Ideale per condire carne, pesce, patate, verdure cotte e crude. È molto semplice da fare, non serve accendere i fornelli e poi si conserva bene in frigo per un paio di giorni.','2016-01-30 00:04:00','2016-01-30 04:15:26','f37c1a843492c5619d37d1c48bce9c147eb77281.jpeg');
/*!40000 ALTER TABLE `product` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tag`
--

DROP TABLE IF EXISTS `tag`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tag` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_389B7834584665A` (`product_id`),
  CONSTRAINT `FK_389B7834584665A` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tag`
--

LOCK TABLES `tag` WRITE;
/*!40000 ALTER TABLE `tag` DISABLE KEYS */;
INSERT INTO `tag` VALUES (3,30,'capperi'),(4,30,'erba cipollina'),(6,14,'spalmabile'),(7,31,'pomodoro'),(8,31,'rosso'),(10,35,'pizza'),(11,35,'olive'),(12,35,'mandolino'),(19,31,'ketchup'),(20,14,'abbondante'),(21,37,'jogurt'),(27,37,'erbe aromatiche');
/*!40000 ALTER TABLE `tag` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-01-30  4:18:28
