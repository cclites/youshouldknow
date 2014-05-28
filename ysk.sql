-- MySQL dump 10.13  Distrib 5.5.37, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: youshouldknow
-- ------------------------------------------------------
-- Server version	5.5.37-0ubuntu0.12.04.1

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
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `account`
--

LOCK TABLES `account` WRITE;
/*!40000 ALTER TABLE `account` DISABLE KEYS */;
INSERT INTO `account` VALUES (1,'sdshouldknow','SD'),(2,'cashouldknow','CA'),(3,'mnshouldknow','MN'),(4,'flshouldknow','FL'),(5,'ndshouldknow','ND'),(6,'iashouldknow','IA'),(7,'ksshouldknow','KS'),(8,'ilshouldknow','IL'),(9,'mishouldknow','MI'),(10,'wishouldknow','WI'),(11,'wyshouldknow','WY'),(12,'nyshouldknow','NY'),(13,'neshouldknow','NE'),(14,'mtshouldknow','MT'),(15,'alshouldknow','AL'),(16,'coshouldknow','CO'),(17,'azshouldknow','AZ'),(18,'wvshouldknow','WV'),(19,'utshouldknow','UT'),(20,'orshouldknow','OR'),(23,'akshouldknow','AK'),(24,'hishouldknow','HI'),(25,'kyshouldknow','KY'),(26,'nvshouldknow','NV'),(27,'arshouldknow','AR'),(28,'ctshouldknow','CT'),(29,'deshouldknow','DE'),(30,'gashouldknow','GA'),(31,'idshouldknow','ID'),(32,'inshouldknow','IN'),(33,'lashouldknow','LA'),(34,'meshouldknow','ME'),(35,'mdshouldknow','MD'),(36,'mashouldknow','MA'),(37,'msshouldknow','MS'),(38,'moshouldknow','MO'),(39,'nhshouldknow','NH'),(40,'njshouldknow','NJ'),(41,'nmshouldknow','NM'),(42,'ncshouldknow','NC'),(43,'ohshouldknow','OH'),(44,'okshouldknow','OK'),(45,'rishouldknow','RI'),(46,'scshouldknow','SC'),(47,'pashouldknow','PA'),(48,'tnshouldknow','TN'),(49,'txshouldknow','TX'),(50,'vtshouldknow','VT'),(51,'vashouldknow','VA'),(52,'washouldknow','WA');
/*!40000 ALTER TABLE `account` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `object_ids`
--

DROP TABLE IF EXISTS `object_ids`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `object_ids` (
  `vote` int(10) NOT NULL,
  `bill` int(10) DEFAULT NULL,
  UNIQUE KEY `enforce_unique_index` (`vote`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `object_ids`
--

LOCK TABLES `object_ids` WRITE;
/*!40000 ALTER TABLE `object_ids` DISABLE KEYS */;
INSERT INTO `object_ids` VALUES (114333,0),(114334,332513),(114335,332513),(114336,332513),(114337,0),(114338,0),(114339,332139),(114340,331983),(114341,0),(114342,0),(114343,0),(114344,0),(114345,0),(114346,0),(114347,0),(114348,0),(114349,332685),(114350,332685),(114364,332671),(114365,332671),(114366,0),(114367,332671),(114368,332671),(114369,332671),(114370,0),(114371,332671),(114372,0),(114373,0),(114374,0),(114375,0),(114391,0),(114392,0),(114393,0),(114394,0),(114395,0),(114396,0),(114397,0),(114398,293743),(114399,332852),(114400,332852),(114401,332858),(114402,332840),(114403,332573),(114405,332451),(114406,332451),(114407,332451),(114408,332451),(114409,332451),(114410,332451),(114420,0),(114421,0),(114422,0),(114423,0),(114424,0),(114425,0),(114426,0),(114427,330731),(114430,329949),(114431,0),(114432,332203),(114433,330880),(114434,0),(114435,0),(114436,0),(114437,0),(114438,0),(114439,333034),(114440,332580),(114441,331782),(114442,332580),(114443,332580),(114444,332580),(114445,332580),(114446,332580),(114447,332580),(114448,332580),(114449,332580),(114450,330510),(114451,332580),(114452,332580),(114453,332580),(114454,332580),(114455,0),(114456,329949);
/*!40000 ALTER TABLE `object_ids` ENABLE KEYS */;
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
INSERT INTO `system` VALUES ('max_id','114456'),('yskconsumerkey','jo89S3KRJiYSjyS8rD30cw'),('yskconsumersecret','xz4w7nwPiBq8Ebhvo2Ghd61c5rEQVKzaEhdHZVRUfRU');
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
INSERT INTO `t_configs` VALUES (1,'2416200680-eeXjlEpkib71tRDrLREvsPa8ANfdClxiW2QPCF3','diBuoQgBFpim647e7bpmY06fqrL7v6VULGXjTgal3EJFo'),(2,'2439993757-nSJ0Bi19p5iEFDvdN7mmvES4TFb34hAtQsP90o3','aKHlVmZO4UCPb0E5bZwX4D5DkbZT9jSwvHY2W31vDzsnf'),(4,'2444505374-XcJT2CDAOVbNKFCDSshbKX7DA6ZXclWcR3ytTa7','iX3aSATilRR76VxHaoeFQhIke99Xise5RigpJp7Ne0TDC'),(3,'2444484282-UuoVQd7VQbNzhdcSH6oveA6mSrHLHPtUhBiukxB','Z4plyQZRzRxoO9hiAf7FvVfmildtBMtosUo0VYnur8ToD'),(5,'2444669540-9CRxs92Bhj3NjVnwT4rShK4F6oemFKxZot6ONA8','2H5OfZ1zxmdzptzukM7rlCiBo1SSQSc0uDLjv7PzFm7lX'),(6,'2444535180-qeSPkg2Ma48reU6BMyy9oskEP8qBIyThVo5r94c','Sh0aLQU56myiQDlekqqGMCOFES1IaImFd6YhoN5KKb3jg'),(7,'2444548231-sg7OiWUGqR0LIqiwD1TxMIcpwbvckofIZe00Su5','FnI96itULZ8gX0gGEw94bMAfxrBda5ykrmNK6AdHEZ9aY'),(8,'2444625438-kVUzDDMj4A1CLtTluTW3BdVjOEhmaCTCUisaLZN','ZD8lXxvT2cFfU9RlpuDXK2xxvB7BeIgKNtvzeNTDOeaRt'),(9,'2444656837-AzVAMzwSZ7SGK81Z09Dy12oHWmc2lmOv3assTcD','hAhizN3kvLYtaw9Do3F6Fr5SBM4fp8c09j7VzjEsKfXzL'),(10,'2444695142-NzUeHWRYcxVJDX2KauWdPy6lhAmmPmw8GT4qLtt','BEEZhw0ibEC16V6zf15oiDeV4imLIRgCpZt30RpldWJ26'),(11,'2444696384-Mo4mSHOiUt9Tt0IQikYJX6qzBbzSXJQLa4XRI4z','UHJZ3T79AKkNHUDFmkWlw5I5UkVyKi0GMMu3jmxMZstzh'),(12,'2444674261-wYlg5dcfaeG3F8wLbVK69DDjxsA85fkd6yjDA3i','TYXNlYuapNNqwLMTTwJiz1k2icKjo7l6bf2HcHyIwZftw'),(13,'2444654894-qa6WpyCe3MXX1aeDuwpcU5otz60928jhH2rht4k','6WqQBKKY531mmcRuYC7lrDpQfie5ZRkZUZbKTs9tAp0Jm'),(14,'2444653004-KhngxFxuCDIHbeduVelPSySoP9Y3dRerE0zky9J','iOdz2F1k2KEaqunCt5CYAMxAuJufhmzJosCFn9Kmkpb7J'),(15,'2444564233-lM8pq2SzjwqHtglDkASAst0HPs808IGQA2vUecI','vABqs58Ujumjrp43RfMv9cqZGxahpxiteW0pf5b0tO7Le'),(16,'2444539758-WgJzY3NwmENYLVuImMqrQCk855g5Q913xT8rvNH','YB6pxt5NgBVWSaqOWYt6Mzp2y3W6vdGM4nunn1Z4Yzo81'),(17,'2444544055-c3Jk8PIKo0iOL5Zd3Age8BLK3FqOkEgZvOwrogX','pMEojfLKFfUdCCPENhRLpYVps0m2mXcZnhC0dhjpiDDdZ'),(18,'2444701945-fuXvclM9VISEVCxZHuH0FNoU4c219HzoaGmRvSK','VpztcnpG1D18lEMR0BkfJE2PzcYPbF2OBMWlwVZja97Ps'),(19,'2444683860-DEFWPES0H9iwSr6uzQGAxVdDOdsIoW7EVSpoaRw','3jxnHP1amqRc3FnFRFUO9MLEvVQwZWiH1Q0Zg7RMw9iPU'),(20,'2444672696-NILnVdixqbKpxhCuqiSQerynogpg1TmBnrusEhg','8eQpUC42hwUmibpQIVSTt8P8GRkaLTMIg4LDM7q3BH5u9'),(23,'2444565871-IjEJNlbxBbh5BQN6tWcD1lYsyd7dUR0daRrOBrU','uMFAjYY6ld22htxleIKnSgXhu9l7x58c6lDzt8NAPZ6e7'),(24,'2444622240-IJekkHmuFM50KVRhm2IXdIBoWm1gwGbpDvPKeWO','uIt6HKzzhHDpllZWjUJefqXHtkZho73WiV5oTNZC61i2w'),(25,'2444644999-AXGbWP5UdDPdbkxFBLjGGZIQSgNByha0EMa5gLP','PJe0Xc6oeiLMKDzAb3uRwcbhTTS8RqdhxdUj35JCPxvKQ'),(26,'2444651034-ARvFJWGlyzNMTf4ZB8AjnqDQ0VHFSxBLig7VTQN','6PxySzXtiy7DMXVZBc3k2qPNEWM3WjCV1fGEnLBSXgNk3'),(27,'2444559266-FDvTifSLDHBzMhoOPJT1CTZ9oLGrhrkdqcFqzUV','8EDBiY27NxeQcblen3v5jGDBGBHNY8a5eHW4Zc6LdWcYE'),(28,'2444556174-LyIyhLkjmgRZebTPM3tFBJtFW6DZCMsxzrGuE2A','2BNAPfqBLVO2USJc844KJOXXvysZibCyOOnQiF64p9ggy'),(29,'2444560908-rEmQdIPsTuX0kuZRtrBL5ylkQP7BKvCpBAkr6vC','TkC7UIPWP1sG0fck8INvgmugFujr56elbDNvpB7Dgy9uZ'),(30,'2444620292-MCITgQajLIkZHrygyhP5jFZEfX1fd8uWlV6FaYV','wdVL6Jd45nTzzyBao6CKMxeMnCEl73VqG9lf0SxvvJBFl'),(31,'2444624412-B17TuXlX2oGlBPh3f0eLsBSynFsVUBnO4PuCp3K','bNjgVokdLBBrL8GA1NAyaviMeq1f2nSL86IJSNBxv0SGR'),(32,'2444636024-nM0qHOhM0u649hsBgJ2kPyihnCmZFeVxIXsFpNx','rHVyrWOXZy6mfJQgHvymSj77Dqea1g7OYpucovUkKqp6v'),(33,'2444645845-MxKfV1Gfmy4DkUxdNpjs9GibKovX51KSiXpr7sQ','fl1f6uAjWVQmpnL7ILkrYR5BjlPAdOc3tqKmzRFuCPSSO'),(34,'2444647159-m4DtDLt7ajcTzffpHWNPdndhLyRfOBMgR4yYKfO','16gYYQ1v96L3Y5eIsq2WLth4GdG9T8WmPPOsaVMFs1oAv'),(35,'2444646680-oMczJL9bdbyur73b4j5GbPIQQvtyhDo9Sbhjgvw','kYxHVDMtUH1g6k5LIQJZmIL8UCQ8EvGxKOIezNoyJHFOB'),(36,'2444654995-JMmSbyTKAz7k8kO3Iu0v4bVYolM2ywSt6IoO4Tm','E9UXa89xgN1pduTzaylWyf4I5z9uj1kL9kwrPhNEQilHo'),(37,'2444650898-nNoEkmbXQtTLguNNMazdjjKYaZVX0zxr3tHwSHO','q2QNPZI1V9ULtJBwLThMGkyGEZA4x8zJuEtgo3I9PCoyX'),(38,'2444651654-FHyBSwnJrP1Tr4McUHZ0toa6K9HstV9TumtFAQO','zPMulqrfNYG4DjSz3ALBY3RSiTvaKuC3nmC6WzSRyoWNE'),(39,'2444656946-PcrxHRId2ln5ZmF65GvP3RqxiS7g96R0edImWo7','usCXBguzkUzIXWC44hnRf6LqwwsyRLAIvnHRuJI4AML58'),(41,'2444662248-lLJOBzTjgtH8gWfTgU6gXpVMa5RxwJSRjne98IF','eIVXVWX1f3E0GPM2GfuB51NckuuPO45Y6UJoA8oRlvNh4'),(42,'2444668196-OXXX34AczjG6V3PIBweayspXVO1mspSE9mYNjqv','URcAbs9tyj3v3cQ7OBAbqNB30OV96jknKumBNuqZw9Hje'),(43,'2444678197-WEJEU1X4HjP3kG3ABsVISz2fDL7dJwOPgYL7lti','ChxpldABEaNCc4a9lRwXyB3FGqx688CMcy2xUjR55A584'),(44,'2444668290-ozN58RdEcRVCRPl9zYIh7rujB0meuanUSFFMq7s','sJwGYczhROf35GgsTMZfqGWrXbPviNvMMyP7uwFkYFjAs'),(45,'2444685175-IVATdkBJckrvAoy9NKDgLr9tV2RQutTMZe2Xg0K','mR13WyLtpKMQmUihimnb9VFPehyDAWCclKE8TqN06EWTb'),(46,'2444679948-JAJaRXYzgGpjVSxrLEefINBQ11HSYNHNMOsyaYF','PDdX38zoy3S3LJEOMBUf8cxd9qjT0CgR0ldoFQixJqIc2'),(40,'2444672065-Tdwj5kceA0cJBEQ8Qkqo0qvWdy38ubBIplZBKLQ','zTXkHX98De6sGv1ueBQM0TBy5GQDOmG42I3yNyj6TrK4s'),(47,'2444673728-7gTTb8XZ63tkPKdYVwxAW9uiazgH3EKH75coL1k','WvTs94APw9OEpNuHclcL1a2dELQooeg4VgVa1r56PK3m0'),(48,'2444681304-g1SyKKkwv4CPTLrlnCQHcTeLvZQiEXSnmvjancN','hf2YqnE8TDPcw1esvaWeTnlW9J35b4D4bLZ4a7jjs5k5y'),(49,'2444685596-1CgLg2drgOZnbXNPXRoALIofkFndFmtt1F1zBKt','yj1ukwcrN0QYgtHvvSpBCqERdxONHd9aXbHcPqg1DPoE0'),(50,'2444689154-U7Bq0hTB9kXM5iCkjPFB1ThRig53waYEYpVrcoR','01RepTcpogZvhIsu6aAXe2dhsQOeGchqXvcSYOjijdkLV'),(51,'2444692154-RkLMx4lW4u3dIXzQPKzXYZuwDdeR8AB4gvNYL6A','NYTcVoMNUJ1CPnZrNGlwGgH9p18F4fntalbL7Y24KQZ3o'),(52,'2444692802-oByCKZOkXftglnpJ1yIpPHlplhnkNOQHMsbpPmG','qinfMRJhg4Nu6tNz1ZIHoBcdOeLKLjNzKiEuJztsbUUE8');
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

-- Dump completed on 2014-05-27 16:06:47
