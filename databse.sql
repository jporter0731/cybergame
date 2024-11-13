-- MySQL dump 10.13  Distrib 8.0.39, for Linux (x86_64)
--
-- Host: localhost    Database: cybergame
-- ------------------------------------------------------
-- Server version	8.0.39-0ubuntu0.20.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `guesses`
--

DROP TABLE IF EXISTS `guesses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `guesses` (
  `guess_id` int unsigned NOT NULL AUTO_INCREMENT,
  `guess_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `user_guessing` int unsigned DEFAULT NULL,
  `pattern_guessed` int unsigned DEFAULT NULL,
  `correct_pattern` int unsigned DEFAULT NULL,
  `correct_guess` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`guess_id`),
  KEY `fk_user_guessing` (`user_guessing`),
  KEY `fk_pattern_guessing` (`pattern_guessed`),
  KEY `fk_pattern_guessed` (`correct_pattern`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `guesses`
--

LOCK TABLES `guesses` WRITE;
/*!40000 ALTER TABLE `guesses` DISABLE KEYS */;
/*!40000 ALTER TABLE `guesses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `patterns`
--

DROP TABLE IF EXISTS `patterns`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `patterns` (
  `pattern_id` int unsigned NOT NULL AUTO_INCREMENT,
  `difficulty` varchar(150) DEFAULT NULL,
  `char1` varchar(150) DEFAULT NULL,
  `char2` varchar(150) DEFAULT NULL,
  `char3` varchar(150) DEFAULT NULL,
  `char4` varchar(150) DEFAULT NULL,
  `char5` varchar(150) DEFAULT NULL,
  `char6` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`pattern_id`)
) ENGINE=InnoDB AUTO_INCREMENT=444 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `patterns`
--

LOCK TABLES `patterns` WRITE;
/*!40000 ALTER TABLE `patterns` DISABLE KEYS */;
INSERT INTO `patterns` VALUES (1,'Easy','character8.png','character4.png',NULL,NULL,NULL,NULL),(2,'Easy','character2.png',NULL,NULL,NULL,NULL,NULL),(3,'Easy','character15.png','character9.png',NULL,NULL,NULL,NULL),(4,'Easy','character4.png','character4.png','character4.png',NULL,NULL,NULL),(5,'Medium','character7.png','character8.png','character3.png','character15.png',NULL,NULL),(6,'Medium','character2.png','character10.png','character14.png','character4.png',NULL,NULL),(7,'Medium','character2.png','character9.png','character3.png','character10.png',NULL,NULL),(8,'Medium','character14.png','character15.png','character8.png','character9.png',NULL,NULL),(9,'Hard','character8.png','character3.png','character8.png','character4.png','character2.png',NULL),(10,'Hard','character7.png','character4.png','character16.png','character7.png','character3.png','character7.png'),(11,'Hard','character2.png','character4.png','character8.png','character15.png','character2.png','character4.png'),(12,'Hard','character2.png','character9.png','character14.png','character5.png','character8.png','character13.png');
/*!40000 ALTER TABLE `patterns` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `user_id` int unsigned NOT NULL AUTO_INCREMENT,
  `uname` varchar(150) NOT NULL,
  `user_pattern` int unsigned DEFAULT NULL,
  `alias` varchar(150) DEFAULT NULL,
  `score` int unsigned DEFAULT NULL,
  PRIMARY KEY (`user_id`),
  KEY `fk_user_pattern` (`user_pattern`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'jporter',12,'Bouncy Panda',10);
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

-- Dump completed on 2024-11-13 13:11:46
