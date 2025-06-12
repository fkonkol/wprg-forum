/*M!999999\- enable the sandbox mode */ 
-- MariaDB dump 10.19-11.8.2-MariaDB, for osx10.20 (arm64)
--
-- Host: localhost    Database: wprg
-- ------------------------------------------------------
-- Server version	11.7.2-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*M!100616 SET @OLD_NOTE_VERBOSITY=@@NOTE_VERBOSITY, NOTE_VERBOSITY=0 */;

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `categories_slug_idx` (`slug`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
set autocommit=0;
INSERT INTO `categories` VALUES
(1,'French','french'),
(2,'Spanish','spanish'),
(3,'Italian','italian'),
(4,'German','german'),
(12,'Dutch','dutch');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;
commit;

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `discussion_id` int(11) NOT NULL,
  `guest_name` varchar(255) DEFAULT NULL,
  `body` text DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `discussion_id` (`discussion_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`discussion_id`) REFERENCES `discussions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comments`
--

LOCK TABLES `comments` WRITE;
/*!40000 ALTER TABLE `comments` DISABLE KEYS */;
set autocommit=0;
INSERT INTO `comments` VALUES
(47,'2025-06-12 06:14:22',53,NULL,'In French passé composé, most verbs use avoir as the auxiliary, but a small group uses être. And yes — there is logic behind it, though some memorization is still needed.',16),
(48,'2025-06-12 06:15:39',52,NULL,'Gender in French isn’t just grammatical—it can change a word’s meaning entirely. Like “un poste” (a job) vs “une poste” (the post office). So, it’s important to know both the gender and context to understand the right meaning.',16),
(49,'2025-06-12 06:16:47',51,'unloggeduser','Depuis = action started in the past and is still ongoing (e.g., J’habite ici depuis 5 ans.)\r\nPendant = action lasted for a specific duration, usually finished (e.g., J’ai vécu ici pendant 5 ans.)\r\nIl y a = refers to a point in the past, like \"ago\" (e.g., Je suis arrivé il y a 5 minutes.)',NULL),
(51,'2025-06-12 06:18:25',47,NULL,'asd',3);
/*!40000 ALTER TABLE `comments` ENABLE KEYS */;
UNLOCK TABLES;
commit;

--
-- Table structure for table `discussions`
--

DROP TABLE IF EXISTS `discussions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `discussions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `slug` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `category_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `discussions_slug_idx` (`slug`) USING BTREE,
  KEY `category_id` (`category_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `discussions_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  CONSTRAINT `discussions_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `discussions`
--

LOCK TABLES `discussions` WRITE;
/*!40000 ALTER TABLE `discussions` DISABLE KEYS */;
set autocommit=0;
INSERT INTO `discussions` VALUES
(43,'why-does-dutch-sound-like-a-mix-of-english-and-klingon-when-angry-2e0f','Why does Dutch sound like a mix of English and Klingon when angry?','',12,3,'2025-06-12 06:01:20'),
(44,'whats-the-deal-with-compound-words-like-donaudampfschiffahrtsgesellschaftskapitan-dc3d','What’s the deal with compound words like Donaudampfschiffahrtsgesellschaftskapitän?','Please explain!',4,3,'2025-06-12 06:02:03'),
(45,'is-it-buono-or-bene-help-me-compliment-my-pizza-properly-3b54','Is it buono or bene? Help me compliment my pizza properly.','',3,3,'2025-06-12 06:03:08'),
(46,'whats-the-difference-between-savoir-and-connaitre-8de0','What’s the difference between savoir and connaître?','',1,3,'2025-06-12 06:03:27'),
(47,'can-i-survive-in-italy-using-only-hand-gestures-and-ciao-67fc','Can I survive in Italy using only hand gestures and ciao?','',3,3,'2025-06-12 06:04:34'),
(48,'impact-of-indigenous-languages-on-regional-spanish-vocabulary-eg-nahuatl-quechua-921d','Impact of indigenous languages on regional Spanish vocabulary (e.g., Nahuatl, Quechua)?','',2,3,'2025-06-12 06:06:09'),
(49,'in-what-contexts-would-il-y-a-be-less-appropriate-than-voicivoila-when-introducing-objects-c311','In what contexts would \'il y a\' be less appropriate than \'voici/voilà\' when introducing objects?','',1,3,'2025-06-12 06:08:34'),
(50,'how-does-on-differ-culturally-from-nous-df04','How does on differ culturally from nous?','',1,3,'2025-06-12 06:09:49'),
(51,'whats-the-real-nuance-between-depuis-pendant-and-il-y-a-when-talking-about-time-b8e1','What’s the real nuance between depuis, pendant, and il y a when talking about time?','',1,3,'2025-06-12 06:10:24'),
(52,'how-does-gender-affect-meaning-in-french--beyond-just-grammar-c90a','How does gender affect meaning in French — beyond just grammar?','',1,3,'2025-06-12 06:10:36'),
(53,'why-do-some-verbs-use-etre-in-passe-compose---is-there-a-logic-or-is-it-just-memorization-805b','Why do some verbs use être in passé composé — is there a logic or is it just memorization?','',1,3,'2025-06-12 06:10:54');
/*!40000 ALTER TABLE `discussions` ENABLE KEYS */;
UNLOCK TABLES;
commit;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `password` varchar(255) NOT NULL,
  `avatar_url` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_name_idx` (`name`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
set autocommit=0;
INSERT INTO `users` VALUES
(3,'admin','2025-06-02 00:30:12','$2y$12$NrIUquOUi8WrJIoUXM.xXuZ5DOrlUzw8MEu4gdzMWm0ODzFSVF5MG','/static/img/avatar.png','admin'),
(13,'moderator','2025-06-10 15:13:26','$2y$12$27FH34Hm5EWo/vPjcDH6pu7e8Tgkb6tCLr96MumqespmkOiei1Z3u','/static/img/avatar.png','moderator'),
(16,'testuser','2025-06-12 06:13:29','$2y$12$mFFOjDEmRCiob5d86hIuv.7/Bzx27SxnMulA6coil2ln9f.7hePPy','/static/img/avatar.png','user');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
commit;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*M!100616 SET NOTE_VERBOSITY=@OLD_NOTE_VERBOSITY */;

-- Dump completed on 2025-06-12  8:55:03
