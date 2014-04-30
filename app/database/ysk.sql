-- MySQL dump 10.13  Distrib 5.5.34, for Win32 (x86)
--
-- Host: localhost    Database: youshouldknow
-- ------------------------------------------------------
-- Server version	5.5.34

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
-- Table structure for table `account`
--

DROP TABLE IF EXISTS `account`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `account` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(20) NOT NULL,
  `state` char(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `account`
--

LOCK TABLES `account` WRITE;
/*!40000 ALTER TABLE `account` DISABLE KEYS */;
INSERT INTO `account` VALUES (1,'sdshouldknow','SD'),(2,'cashouldknow','CA'),(3,'mnshouldknow','MN'),(4,'flshouldknow','FL');
/*!40000 ALTER TABLE `account` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `system`
--

DROP TABLE IF EXISTS `system`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `system` (
  `name` varchar(20) NOT NULL,
  `value` varchar(65) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `system`
--

LOCK TABLES `system` WRITE;
/*!40000 ALTER TABLE `system` DISABLE KEYS */;
INSERT INTO `system` VALUES ('max_id','114337'),('yskconsumerkey','jo89S3KRJiYSjyS8rD30cw'),('yskconsumersecret','xz4w7nwPiBq8Ebhvo2Ghd61c5rEQVKzaEhdHZVRUfRU');
/*!40000 ALTER TABLE `system` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `t_configs`
--

DROP TABLE IF EXISTS `t_configs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `t_configs` (
  `user_id` int(11) DEFAULT NULL,
  `access_token` varchar(50) NOT NULL,
  `access_key` varchar(50) NOT NULL,
  KEY `user_id` (`user_id`),
  CONSTRAINT `t_configs_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `account` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t_configs`
--

LOCK TABLES `t_configs` WRITE;
/*!40000 ALTER TABLE `t_configs` DISABLE KEYS */;
INSERT INTO `t_configs` VALUES (1,'2416200680-eeXjlEpkib71tRDrLREvsPa8ANfdClxiW2QPCF3','diBuoQgBFpim647e7bpmY06fqrL7v6VULGXjTgal3EJFo'),(2,'2439993757-nSJ0Bi19p5iEFDvdN7mmvES4TFb34hAtQsP90o3','aKHlVmZO4UCPb0E5bZwX4D5DkbZT9jSwvHY2W31vDzsnf'),(4,'2444505374-XcJT2CDAOVbNKFCDSshbKX7DA6ZXclWcR3ytTa7','iX3aSATilRR76VxHaoeFQhIke99Xise5RigpJp7Ne0TDC'),(3,'2444484282-UuoVQd7VQbNzhdcSH6oveA6mSrHLHPtUhBiukxB','Z4plyQZRzRxoO9hiAf7FvVfmildtBMtosUo0VYnur8ToD');
/*!40000 ALTER TABLE `t_configs` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;


DROP TABLE IF EXISTS 'object_ids';
CREATE TABLE object_ids(
  vote int(10) NOT NULL,
  bill int(10)
)ENGINE=InnoDB DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS 'voter_vote';
CREATE TABLE voter_vote(
  vote_id int(10) NOT NULL,
  vote TEXT,
  FOREIGN KEY (vote_id) REFERENCES object_ids(vote) ON DELETE CASCADE
)ENGINE=InnoDB DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS 'bill';
CREATE TABLE voter_vote(
  bill_id int(10) NOT NULL,
  vote TEXT,
  FOREIGN KEY (`bill_id`) REFERENCES `object_ids` (`bill`) ON DELETE CASCADE
)ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dump completed on 2014-04-27 12:06:12
