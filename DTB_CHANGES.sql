-- MySQL dump 10.13  Distrib 5.5.31, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: admin
-- ------------------------------------------------------
-- Server version	5.5.31-0+wheezy1

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
-- Table structure for table `fi_depense_methods`
--

DROP TABLE IF EXISTS `fi_depense_methods`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fi_depense_methods` (
  `depense_method_id` int(11) NOT NULL AUTO_INCREMENT,
  `depense_method_name` varchar(35) NOT NULL,
  PRIMARY KEY (`depense_method_id`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `fi_depenses`
--

DROP TABLE IF EXISTS `fi_depenses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fi_depenses` (
  `depense_id` int(11) NOT NULL AUTO_INCREMENT,
  `depense_method_id` int(11) NOT NULL DEFAULT '0',
  `depense_date` date NOT NULL,
  `depense_amount` decimal(10,2) NOT NULL,
  `depense_note` longtext NOT NULL,
  `iddevise` tinyint(4) NOT NULL,
  `depense_CAD` decimal(10,2) NOT NULL,
  PRIMARY KEY (`depense_id`),
  KEY `depense_method_id` (`depense_method_id`)
) ENGINE=MyISAM AUTO_INCREMENT=621 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `fi_devises`
--

DROP TABLE IF EXISTS `fi_devises`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fi_devises` (
  `iddevise` smallint(5) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `nomdfr` varchar(80) NOT NULL,
  `taux` float NOT NULL,
  PRIMARY KEY (`iddevise`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

