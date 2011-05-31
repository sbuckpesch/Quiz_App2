-- MySQL dump 10.13  Distrib 5.1.56, for redhat-linux-gnu (i386)
--
-- Host: localhost    Database: quiz
-- ------------------------------------------------------
-- Server version	5.1.56

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
-- Table structure for table `answer`
--

DROP TABLE IF EXISTS `answer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `answer` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `question_id` int(10) DEFAULT NULL,
  `name` varchar(200) DEFAULT NULL,
  `image` varchar(200) DEFAULT NULL,
  `outcome_id` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=94 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `answer`
--

LOCK TABLES `answer` WRITE;
/*!40000 ALTER TABLE `answer` DISABLE KEYS */;
INSERT INTO `answer` VALUES (5,15,'feaw','a_image',NULL),(6,15,'faeaef','a_image',NULL),(7,16,'feafwea','a_image',NULL),(8,16,'fweafeaw','a_image',NULL),(9,17,'feaw','a_image',NULL),(10,17,'faeaef','a_image',NULL),(11,18,'feafwea','a_image',NULL),(12,18,'fweafeaw','a_image',NULL),(13,19,'feaw','a_image',NULL),(14,19,'faeaef','a_image',NULL),(15,20,'feafwea','a_image',NULL),(16,20,'fweafeaw','a_image',NULL),(17,21,'feaw','a_image',NULL),(18,22,'feaw','a_image',NULL),(19,23,'feaw','a_image',NULL),(20,24,'feaw','a_image',NULL),(21,25,'feaw','a_image',NULL),(22,26,'feaw','a_image',NULL),(23,27,'feaw','a_image',NULL),(24,28,'feaw','a_image',NULL),(25,29,'feaw','a_image',NULL),(26,30,'feaw','a_image',NULL),(27,31,'feaw','a_image',NULL),(28,32,'feaw','a_image',NULL),(29,33,'feaw','a_image',NULL),(30,34,'feaw','a_image',NULL),(31,35,'feaw','a_image',NULL),(32,36,'feaw','a_image',NULL),(33,37,'feaw','a_image',NULL),(34,38,'feaw','a_image',NULL),(35,39,'feaw','a_image',NULL),(36,40,'feaw','a_image',NULL),(37,41,'feaw','a_image',NULL),(38,42,'feaw','a_image',NULL),(39,43,'feaw','a_image',NULL),(40,44,'feaw','a_image',NULL),(41,45,'feaw','a_image',NULL),(42,46,'feaw','a_image',NULL),(43,47,'feaw','a_image',NULL),(44,48,'feaw','a_image',NULL),(45,49,'feaw','a_image',NULL),(46,50,'feaw','a_image',NULL),(47,51,'feaw','a_image',NULL),(48,52,'feaw','a_image',NULL),(49,53,'feaw','a_image',NULL),(50,54,'feaw','a_image',NULL),(51,55,'feaw','a_image',NULL),(52,56,'feaw','a_image',NULL),(53,57,'feaw','a_image',NULL),(54,58,'feaw','a_image',NULL),(55,59,'feaw','a_image',NULL),(56,60,'feaw','a_image',NULL),(57,61,'feaw','a_image',NULL),(58,62,'feaw','a_image',NULL),(59,63,'fewa','a_image',NULL),(60,64,'fewa','a_image',NULL),(61,65,'','a_image',NULL),(62,66,'','a_image',NULL),(63,67,'fewafewa','a_image',NULL),(64,68,'fawfea','a_image',NULL),(65,69,'bbbbb','a_image',NULL),(66,70,'bbbbb','a_image',NULL),(67,71,'bbbbb','a_image',NULL),(68,72,'bbbb','a_image',NULL),(69,73,'feawe','a_image',NULL),(70,74,'feafea','a_image',NULL),(71,75,'feafea','a_image',NULL),(72,76,'fawfea','a_image',NULL),(73,77,'feafeaw','a_image',NULL),(74,78,'feafeaw','a_image',NULL),(75,79,'ffawfeaw','a_image',NULL),(76,80,'ffawfeaw','a_image',NULL),(77,81,'bbbbbb','a_image',NULL),(78,82,'bbbbbb','a_image',NULL),(79,83,'bbbb','a_image',NULL),(80,84,'ffff','a_image',NULL),(81,85,'ffff','a_image',NULL),(82,86,'ffff','a_image',NULL),(83,87,'ffff','a_image',NULL),(84,88,'1','a_image',NULL),(85,89,'1','a_image',NULL),(86,89,'2','a_image',NULL),(87,90,'1','a_image',NULL),(88,90,'2','a_image',NULL),(89,91,'1','a_image',NULL),(90,91,'2','a_image',NULL),(91,92,'feawfe','a_image',NULL),(92,93,'faew','a_image',NULL),(93,94,'fwafea','a_image',NULL);
/*!40000 ALTER TABLE `answer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `outcome`
--

DROP TABLE IF EXISTS `outcome`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `outcome` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `quiz_id` int(10) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `description` varchar(300) DEFAULT NULL,
  `image` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `outcome`
--

LOCK TABLES `outcome` WRITE;
/*!40000 ALTER TABLE `outcome` DISABLE KEYS */;
/*!40000 ALTER TABLE `outcome` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `question`
--

DROP TABLE IF EXISTS `question`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `question` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `quiz_id` int(10) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `image` varchar(200) DEFAULT NULL,
  `correct` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=95 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `question`
--

LOCK TABLES `question` WRITE;
/*!40000 ALTER TABLE `question` DISABLE KEYS */;
INSERT INTO `question` VALUES (15,14,'feawewa','q_image',1),(16,14,'fewafewa','q_image',2),(17,15,'feawewa','q_image',1),(18,15,'fewafewa','q_image',2),(19,16,'feawewa','q_image',1),(20,16,'fewafewa','q_image',2),(21,17,'feawewa','q_image',1),(22,18,'feawewa','q_image',1),(23,19,'feawewa','q_image',1),(24,20,'feawewa','q_image',1),(25,21,'feawewa','q_image',1),(26,22,'feawewa','q_image',1),(27,23,'feawewa','q_image',1),(28,24,'feawewa','q_image',1),(29,25,'feawewa','q_image',1),(30,26,'feawewa','q_image',1),(31,27,'feawewa','q_image',1),(32,28,'feawewa','q_image',1),(33,29,'feawewa','q_image',1),(34,30,'feawewa','q_image',1),(35,31,'feawewa','q_image',1),(36,32,'feawewa','q_image',1),(37,33,'feawewa','q_image',1),(38,34,'feawewa','q_image',1),(39,35,'feawewa','q_image',1),(40,36,'feawewa','q_image',1),(41,37,'feawewa','q_image',1),(42,38,'feawewa','q_image',1),(43,39,'feawewa','q_image',1),(44,40,'feawewa','q_image',1),(45,41,'feawewa','q_image',1),(46,42,'feawewa','q_image',1),(47,43,'feawewa','q_image',1),(48,44,'feawewa','q_image',1),(49,45,'feawewa','q_image',1),(50,46,'feawewa','q_image',1),(51,47,'feawewa','q_image',1),(52,48,'feawewa','q_image',1),(53,49,'feawewa','q_image',1),(54,50,'feawewa','q_image',1),(55,51,'feawewa','q_image',1),(56,52,'feawewa','q_image',1),(57,53,'feawewa','q_image',1),(58,54,'feawewa','q_image',1),(59,55,'feawewa','q_image',1),(60,56,'feawewa','q_image',1),(61,57,'feawewa','q_image',1),(62,58,'feawewa','q_image',1),(63,59,'fwafewa','q_image',1),(64,60,'fwafewa','q_image',1),(65,71,'Start typing your question','q_image',NULL),(66,72,'Start typing your question','q_image',NULL),(67,73,'faeea','q_image',1),(68,74,'fawea','q_image',1),(69,75,'aaaaaa','q_image',1),(70,76,'aaaaaa','q_image',1),(71,77,'aaaaaa','q_image',1),(72,78,'aaaa','q_image',1),(73,79,'faea','q_image',1),(74,80,'feawfaew','q_image',1),(75,81,'feawfaew','q_image',1),(76,82,'faewfea','q_image',1),(77,83,'feaf','q_image',1),(78,84,'feaf','q_image',1),(79,85,'feawf','q_image',1),(80,86,'feawf','q_image',1),(81,87,'aaaaaaaaa','q_image',1),(82,88,'aaaaaaaaa','q_image',1),(83,89,'aaaaa','q_image',1),(84,90,'dddd','q_image',1),(85,91,'dddd','q_image',1),(86,92,'dddd','q_image',1),(87,93,'dddd','q_image',1),(88,94,'aaaa','q_image',1),(89,95,'aaaa','q_image',2),(90,96,'aaaa','q_image',2),(91,97,'aaaa','q_image',2),(92,98,'fae','q_image',1),(93,99,'feaefa','q_image',1),(94,100,'faw','q_image',1);
/*!40000 ALTER TABLE `question` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `quiz`
--

DROP TABLE IF EXISTS `quiz`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `quiz` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `fb_page_id` varchar(20) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `image` varchar(200) DEFAULT NULL,
  `description` varchar(300) DEFAULT NULL,
  `type` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=101 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `quiz`
--

LOCK TABLES `quiz` WRITE;
/*!40000 ALTER TABLE `quiz` DISABLE KEYS */;
INSERT INTO `quiz` VALUES (14,'100','faewae','','Example: This quiz will show you if you are a real celebrity fashionista! Find out now!',1),(15,'100','faewae','','Example: This quiz will show you if you are a real celebrity fashionista! Find out now!',1),(16,'100','fred\'s quiz ','','Example: This quiz will show you if you are a real celebrity fashionista! Find out now!',1),(17,'100','faewae','','Example: This quiz will show you if you are a real celebrity fashionista! Find out now!',1),(18,'100','faewae','','Example: This quiz will show you if you are a real celebrity fashionista! Find out now!',1),(19,'100','faewae','','Example: This quiz will show you if you are a real celebrity fashionista! Find out now!',1),(20,'100','faewae','','Example: This quiz will show you if you are a real celebrity fashionista! Find out now!',1),(21,'100','faewae','','Example: This quiz will show you if you are a real celebrity fashionista! Find out now!',1),(22,'100','faewae','','Example: This quiz will show you if you are a real celebrity fashionista! Find out now!',1),(23,'100','faewae','','Example: This quiz will show you if you are a real celebrity fashionista! Find out now!',1),(24,'100','faewae','','Example: This quiz will show you if you are a real celebrity fashionista! Find out now!',1),(25,'100','faewae','','Example: This quiz will show you if you are a real celebrity fashionista! Find out now!',1),(26,'100','faewae','','Example: This quiz will show you if you are a real celebrity fashionista! Find out now!',1),(27,'100','faewae','','Example: This quiz will show you if you are a real celebrity fashionista! Find out now!',1),(28,'100','faewae','','Example: This quiz will show you if you are a real celebrity fashionista! Find out now!',1),(29,'100','faewae','','Example: This quiz will show you if you are a real celebrity fashionista! Find out now!',1),(30,'100','faewae','','Example: This quiz will show you if you are a real celebrity fashionista! Find out now!',1),(31,'100','faewae','','Example: This quiz will show you if you are a real celebrity fashionista! Find out now!',1),(32,'100','faewae','','Example: This quiz will show you if you are a real celebrity fashionista! Find out now!',1),(33,'100','faewae','','Example: This quiz will show you if you are a real celebrity fashionista! Find out now!',1),(34,'100','faewae','','Example: This quiz will show you if you are a real celebrity fashionista! Find out now!',1),(35,'100','faewae','','Example: This quiz will show you if you are a real celebrity fashionista! Find out now!',1),(36,'100','faewae','','Example: This quiz will show you if you are a real celebrity fashionista! Find out now!',1),(37,'100','faewae','','Example: This quiz will show you if you are a real celebrity fashionista! Find out now!',1),(38,'100','faewae','','Example: This quiz will show you if you are a real celebrity fashionista! Find out now!',1),(39,'100','faewae','','Example: This quiz will show you if you are a real celebrity fashionista! Find out now!',1),(40,'100','faewae','','Example: This quiz will show you if you are a real celebrity fashionista! Find out now!',1),(41,'100','faewae','','Example: This quiz will show you if you are a real celebrity fashionista! Find out now!',1),(42,'100','faewae','','Example: This quiz will show you if you are a real celebrity fashionista! Find out now!',1),(43,'100','faewae','','Example: This quiz will show you if you are a real celebrity fashionista! Find out now!',1),(44,'100','faewae','','Example: This quiz will show you if you are a real celebrity fashionista! Find out now!',1),(45,'100','faewae','','Example: This quiz will show you if you are a real celebrity fashionista! Find out now!',1),(46,'100','faewae','','Example: This quiz will show you if you are a real celebrity fashionista! Find out now!',1),(47,'100','faewae','','Example: This quiz will show you if you are a real celebrity fashionista! Find out now!',1),(48,'100','faewae','','Example: This quiz will show you if you are a real celebrity fashionista! Find out now!',1),(49,'100','faewae','','Example: This quiz will show you if you are a real celebrity fashionista! Find out now!',1),(50,'100','faewae','','Example: This quiz will show you if you are a real celebrity fashionista! Find out now!',1),(51,'100','faewae','','Example: This quiz will show you if you are a real celebrity fashionista! Find out now!',1),(52,'100','faewae','','Example: This quiz will show you if you are a real celebrity fashionista! Find out now!',1),(53,'100','faewae','','Example: This quiz will show you if you are a real celebrity fashionista! Find out now!',1),(54,'100','faewae','','Example: This quiz will show you if you are a real celebrity fashionista! Find out now!',1),(55,'100','faewae','','Example: This quiz will show you if you are a real celebrity fashionista! Find out now!',1),(56,'100','fafawf','','ddfae',1),(57,'100','fafawf','','ddfae',1),(58,'100','fafawf','','ddfae',1),(59,'100','aaaa','','Example: This quiz will show you if you are a real celebrity fashionista! Find out now!',1),(60,'100','aaaa','','Example: This quiz will show you if you are a real celebrity fashionista! Find out now!',1),(61,'100','aaaa','','Example: This quiz will show you if you are a real celebrity fashionista! Find out now!',1),(62,'100','aaaa','','Example: This quiz will show you if you are a real celebrity fashionista! Find out now!',1),(63,'100','aaaa','','Example: This quiz will show you if you are a real celebrity fashionista! Find out now!',1),(64,'100','aaaa','','Example: This quiz will show you if you are a real celebrity fashionista! Find out now!',1),(65,'100','aaaa','','Example: This quiz will show you if you are a real celebrity fashionista! Find out now!',1),(66,'100','aaaa','','Example: This quiz will show you if you are a real celebrity fashionista! Find out now!',1),(67,'100','aaaa','','Example: This quiz will show you if you are a real celebrity fashionista! Find out now!',1),(68,'100','Start typing a quiz name','','Example: This quiz will show you if you are a real celebrity fashionista! Find out now!',1),(69,'100','Start typing a quiz name','','Example: This quiz will show you if you are a real celebrity fashionista! Find out now!',1),(70,'100','Start typing a quiz name','','Example: This quiz will show you if you are a real celebrity fashionista! Find out now!',1),(71,'100','Start typing a quiz name','','Example: This quiz will show you if you are a real celebrity fashionista! Find out now!',1),(72,'100','Start typing a quiz name','','Example: This quiz will show you if you are a real celebrity fashionista! Find out now!',1),(73,'100','Start typing a quiz name','','Example: This quiz will show you if you are a real celebrity fashionista! Find out now!',1),(74,'100','Start typing a quiz name','','Example: This quiz will show you if you are a real celebrity fashionista! Find out now!',1),(75,'100','Start typing a quiz name','','Example: This quiz will show you if you are a real celebrity fashionista! Find out now!',1),(76,'100','Start typing a quiz name','','Example: This quiz will show you if you are a real celebrity fashionista! Find out now!',1),(77,'100','Start typing a quiz name','','Example: This quiz will show you if you are a real celebrity fashionista! Find out now!',1),(78,'100','Start typing a quiz name','','Example: This quiz will show you if you are a real celebrity fashionista! Find out now!',1),(79,'100','Start typing a quiz name','','Example: This quiz will show you if you are a real celebrity fashionista! Find out now!',1),(80,'100','feafea','','Example: This quiz will show you if you are a real celebrity fashionista! Find out now!',1),(81,'100','feafea','','Example: This quiz will show you if you are a real celebrity fashionista! Find out now!',1),(82,'100','feafa','','Example: This quiz will show you if you are a real celebrity fashionista! Find out now!',1),(83,'100','feafa','','Example: This quiz will show you if you are a real celebrity fashionista! Find out now!',1),(84,'100','feafa','','Example: This quiz will show you if you are a real celebrity fashionista! Find out now!',1),(85,'100','feafa','','Example: This quiz will show you if you are a real celebrity fashionista! Find out now!',1),(86,'100','feafa','','Example: This quiz will show you if you are a real celebrity fashionista! Find out now!',1),(87,'100','Start typing a quiz name','','Example: This quiz will show you if you are a real celebrity fashionista! Find out now!',1),(88,'100','Start typing a quiz name','','Example: This quiz will show you if you are a real celebrity fashionista! Find out now!',1),(89,'100','Start typing a quiz name','','Example: This quiz will show you if you are a real celebrity fashionista! Find out now!',1),(90,'100','aaaa','','Example: This quiz will show you if you are a real celebrity fashionista! Find out now!',1),(91,'100','aaaa','','Example: This quiz will show you if you are a real celebrity fashionista! Find out now!',1),(92,'100','aaaa','','Example: This quiz will show you if you are a real celebrity fashionista! Find out now!',1),(93,'100','aaaa','','Example: This quiz will show you if you are a real celebrity fashionista! Find out now!',1),(94,'100','test','','Example: This quiz will show you if you are a real celebrity fashionista! Find out now!',1),(95,'100','test','','Example: This quiz will show you if you are a real celebrity fashionista! Find out now!',1),(96,'100','test','','Example: This quiz will show you if you are a real celebrity fashionista! Find out now!',1),(97,'100','test','','Example: This quiz will show you if you are a real celebrity fashionista! Find out now!',1),(98,'100','test','','Example: This quiz will show you if you are a real celebrity fashionista! Find out now!',1),(99,'100','Start typing a quiz name','','Example: This quiz will show you if you are a real celebrity fashionista! Find out now!',1),(100,'100','Start typing a quiz name','','Example: This quiz will show you if you are a real celebrity fashionista! Find out now!',1);
/*!40000 ALTER TABLE `quiz` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2011-05-31 14:58:52
