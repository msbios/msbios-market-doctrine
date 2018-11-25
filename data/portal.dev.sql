-- MySQL dump 10.13  Distrib 5.6.35, for osx10.9 (x86_64)
--
-- Host: localhost    Database: portal.dev
-- ------------------------------------------------------
-- Server version	5.6.35

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
-- Table structure for table `acl_t_permissions`
--

DROP TABLE IF EXISTS `acl_t_permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `acl_t_permissions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `resourceid` int(11) DEFAULT NULL,
  `code` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `createdat` datetime NOT NULL,
  `modifiedat` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_29B9690519715813` (`resourceid`),
  CONSTRAINT `FK_29B9690519715813` FOREIGN KEY (`resourceid`) REFERENCES `acl_t_resources` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `acl_t_permissions`
--

LOCK TABLES `acl_t_permissions` WRITE;
/*!40000 ALTER TABLE `acl_t_permissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `acl_t_permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `acl_t_resources`
--

DROP TABLE IF EXISTS `acl_t_resources`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `acl_t_resources` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pid` int(11) DEFAULT NULL,
  `code` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `createdat` datetime NOT NULL,
  `modifiedat` datetime NOT NULL,
  `rowstatus` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_98792725550C4ED` (`pid`),
  CONSTRAINT `FK_98792725550C4ED` FOREIGN KEY (`pid`) REFERENCES `acl_t_resources` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `acl_t_resources`
--

LOCK TABLES `acl_t_resources` WRITE;
/*!40000 ALTER TABLE `acl_t_resources` DISABLE KEYS */;
/*!40000 ALTER TABLE `acl_t_resources` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `acl_t_roles`
--

DROP TABLE IF EXISTS `acl_t_roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `acl_t_roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pid` int(11) DEFAULT NULL,
  `code` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `createdat` datetime NOT NULL,
  `modifiedat` datetime NOT NULL,
  `rowstatus` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_63BF437D5550C4ED` (`pid`),
  CONSTRAINT `FK_63BF437D5550C4ED` FOREIGN KEY (`pid`) REFERENCES `acl_t_roles` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `acl_t_roles`
--

LOCK TABLES `acl_t_roles` WRITE;
/*!40000 ALTER TABLE `acl_t_roles` DISABLE KEYS */;
INSERT INTO `acl_t_roles` VALUES (1,NULL,'GUEST','Guest','0000-00-00 00:00:00','0000-00-00 00:00:00',0),(2,1,'USER','User','0000-00-00 00:00:00','0000-00-00 00:00:00',0),(3,2,'MODERATOR','Moderator','0000-00-00 00:00:00','0000-00-00 00:00:00',0),(4,3,'ADMIN','Admin','0000-00-00 00:00:00','0000-00-00 00:00:00',0),(5,4,'SUPERADMIN','Super Admin','0000-00-00 00:00:00','0000-00-00 00:00:00',0),(6,5,'DEVELOPER','Developer','0000-00-00 00:00:00','0000-00-00 00:00:00',0);
/*!40000 ALTER TABLE `acl_t_roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `acl_t_rules`
--

DROP TABLE IF EXISTS `acl_t_rules`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `acl_t_rules` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `resourceid` int(11) DEFAULT NULL,
  `access` enum('ALLOW','DENY') COLLATE utf8_unicode_ci NOT NULL COMMENT '(MSRD2Type:rule_type)',
  `name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `raw` longtext COLLATE utf8_unicode_ci COMMENT '(DC2Type:json_array)',
  `createdat` datetime NOT NULL,
  `modifiedat` datetime NOT NULL,
  `rowstatus` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_5C1BF48619715813` (`resourceid`),
  CONSTRAINT `FK_5C1BF48619715813` FOREIGN KEY (`resourceid`) REFERENCES `acl_t_resources` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `acl_t_rules`
--

LOCK TABLES `acl_t_rules` WRITE;
/*!40000 ALTER TABLE `acl_t_rules` DISABLE KEYS */;
/*!40000 ALTER TABLE `acl_t_rules` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `acl_t_rules_permissions`
--

DROP TABLE IF EXISTS `acl_t_rules_permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `acl_t_rules_permissions` (
  `ruleid` int(11) NOT NULL,
  `permissionid` int(11) NOT NULL,
  PRIMARY KEY (`ruleid`,`permissionid`),
  KEY `IDX_8E9868027165609` (`ruleid`),
  KEY `IDX_8E986802F5D02112` (`permissionid`),
  CONSTRAINT `FK_8E9868027165609` FOREIGN KEY (`ruleid`) REFERENCES `acl_t_rules` (`id`),
  CONSTRAINT `FK_8E986802F5D02112` FOREIGN KEY (`permissionid`) REFERENCES `acl_t_permissions` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `acl_t_rules_permissions`
--

LOCK TABLES `acl_t_rules_permissions` WRITE;
/*!40000 ALTER TABLE `acl_t_rules_permissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `acl_t_rules_permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `acl_t_rules_roles`
--

DROP TABLE IF EXISTS `acl_t_rules_roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `acl_t_rules_roles` (
  `ruleid` int(11) NOT NULL,
  `roleid` int(11) NOT NULL,
  PRIMARY KEY (`ruleid`,`roleid`),
  KEY `IDX_ABE5C4497165609` (`ruleid`),
  KEY `IDX_ABE5C4492D46D92A` (`roleid`),
  CONSTRAINT `FK_ABE5C4492D46D92A` FOREIGN KEY (`roleid`) REFERENCES `acl_t_roles` (`id`),
  CONSTRAINT `FK_ABE5C4497165609` FOREIGN KEY (`ruleid`) REFERENCES `acl_t_rules` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `acl_t_rules_roles`
--

LOCK TABLES `acl_t_rules_roles` WRITE;
/*!40000 ALTER TABLE `acl_t_rules_roles` DISABLE KEYS */;
/*!40000 ALTER TABLE `acl_t_rules_roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `acl_t_user_providers`
--

DROP TABLE IF EXISTS `acl_t_user_providers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `acl_t_user_providers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `identifier` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `createdat` datetime NOT NULL,
  `modifiedat` datetime NOT NULL,
  `rowstatus` tinyint(1) NOT NULL,
  `userid` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_18F3CA40F132696E` (`userid`),
  KEY `rowstatus` (`rowstatus`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `acl_t_user_providers`
--

LOCK TABLES `acl_t_user_providers` WRITE;
/*!40000 ALTER TABLE `acl_t_user_providers` DISABLE KEYS */;
INSERT INTO `acl_t_user_providers` VALUES (6,'10210699664074409','facebook','2018-11-10 11:06:20','2018-11-10 11:06:20',1,12);
/*!40000 ALTER TABLE `acl_t_user_providers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `acl_t_users`
--

DROP TABLE IF EXISTS `acl_t_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `acl_t_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `firstname` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `lastname` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `state` varchar(8) COLLATE utf8_unicode_ci NOT NULL,
  `options` longtext COLLATE utf8_unicode_ci COMMENT '(DC2Type:json_array)',
  `createdat` datetime NOT NULL,
  `modifiedat` datetime NOT NULL,
  `rowstatus` tinyint(1) NOT NULL,
  `type` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `acl_t_users`
--

LOCK TABLES `acl_t_users` WRITE;
/*!40000 ALTER TABLE `acl_t_users` DISABLE KEYS */;
INSERT INTO `acl_t_users` VALUES (1,'developer','Judzhin','Miles','info@msbios.com','$2a$04$iGrokx9ytH/WTC6UDHKA5eIx0MQl9CTqUi2Z6LywjhQDfBGIMDmv6','ACTIVE','[]','0000-00-00 00:00:00','0000-00-00 00:00:00',0,NULL),(12,'facebook10210699664074409','Judzhin','Miles','shykor@mail.ru',NULL,'ACTIVE','[]','2018-11-10 11:06:20','2018-11-10 11:06:20',1,'REGULAR');
/*!40000 ALTER TABLE `acl_t_users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `acl_t_users_roles`
--

DROP TABLE IF EXISTS `acl_t_users_roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `acl_t_users_roles` (
  `userid` int(11) NOT NULL,
  `roleid` int(11) NOT NULL,
  PRIMARY KEY (`userid`,`roleid`),
  KEY `IDX_551D2FE4F132696E` (`userid`),
  KEY `IDX_551D2FE42D46D92A` (`roleid`),
  CONSTRAINT `FK_551D2FE42D46D92A` FOREIGN KEY (`roleid`) REFERENCES `acl_t_roles` (`id`),
  CONSTRAINT `FK_551D2FE4F132696E` FOREIGN KEY (`userid`) REFERENCES `acl_t_users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `acl_t_users_roles`
--

LOCK TABLES `acl_t_users_roles` WRITE;
/*!40000 ALTER TABLE `acl_t_users_roles` DISABLE KEYS */;
INSERT INTO `acl_t_users_roles` VALUES (1,6);
/*!40000 ALTER TABLE `acl_t_users_roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cnt_t_comments`
--

DROP TABLE IF EXISTS `cnt_t_comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cnt_t_comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parentid` int(11) DEFAULT NULL,
  `refid` int(11) NOT NULL,
  `reftype` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `author` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `message` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `anonymously` tinyint(1) NOT NULL,
  `authorip` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `postdate` datetime NOT NULL,
  `state` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `options` longtext COLLATE utf8_unicode_ci COMMENT '(DC2Type:json_array)',
  `createdat` datetime NOT NULL,
  `modifiedat` datetime NOT NULL,
  `rowstatus` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_71ED74B4856A684C` (`parentid`),
  CONSTRAINT `FK_71ED74B4856A684C` FOREIGN KEY (`parentid`) REFERENCES `cnt_t_comments` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cnt_t_comments`
--

LOCK TABLES `cnt_t_comments` WRITE;
/*!40000 ALTER TABLE `cnt_t_comments` DISABLE KEYS */;
INSERT INTO `cnt_t_comments` VALUES (1,NULL,1,'PERSONS','Judzhin Miles','Some Message',0,'91.91.91.91','2017-12-04 14:43:00','NONE',NULL,'2017-12-04 00:00:00','2017-12-04 00:00:00',1),(2,NULL,1,'PERSONS','Judzhin Miles','asdasdasd',0,'127.0.0.1','2017-12-04 18:41:48','NONE','[]','2017-12-04 18:41:48','2017-12-04 18:41:48',1),(3,NULL,1,'PERSONS','Judzhin Miles','Test message Again',0,'127.0.0.1','2017-12-04 18:42:01','NONE','[]','2017-12-04 18:42:01','2017-12-04 18:42:01',1),(4,NULL,1,'PERSONS','Judzhin Miles','Some Comment',0,'127.0.0.1','2017-12-04 18:56:35','NONE','[]','2017-12-04 18:56:35','2017-12-04 18:56:35',1),(5,NULL,1,'PERSONS','Judzhin Miles','Anonimus Comment',1,'127.0.0.1','2017-12-04 19:06:59','NONE','[]','2017-12-04 19:06:59','2017-12-04 19:06:59',1),(6,NULL,1,'PERSONS','Judzhin Miles','Саша дуже вредний, самий вредний',0,'127.0.0.1','2017-12-04 19:08:49','NONE','[]','2017-12-04 19:08:49','2017-12-04 19:08:49',1),(7,NULL,1,'PERSONS','Judzhin Miles','Саша дуже вредний, самий вредний',1,'127.0.0.1','2017-12-04 19:08:58','NONE','[]','2017-12-04 19:08:58','2017-12-04 19:08:58',1),(8,NULL,1,'PERSONS','Judzhin Miles','Test Message',0,'127.0.0.1','2017-12-04 19:21:53','NONE','[]','2017-12-04 19:21:53','2017-12-04 19:21:53',1);
/*!40000 ALTER TABLE `cnt_t_comments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cnt_t_news`
--

DROP TABLE IF EXISTS `cnt_t_news`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cnt_t_news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8_unicode_ci NOT NULL,
  `postdate` datetime DEFAULT NULL,
  `options` longtext COLLATE utf8_unicode_ci COMMENT '(DC2Type:json_array)',
  `createdat` datetime NOT NULL,
  `modifiedat` datetime NOT NULL,
  `rowstatus` tinyint(1) NOT NULL,
  `createdby` int(11) DEFAULT NULL,
  `modifiedby` int(11) DEFAULT NULL,
  `type` enum('IMAGE','VIDEO','NONE') COLLATE utf8_unicode_ci NOT NULL COMMENT '(MSRD2Type:news_type)',
  `state` enum('DRAFT','PREVIEW','PUBLISHED') COLLATE utf8_unicode_ci NOT NULL COMMENT '(MSRD2Type:publishing_state)',
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_A61BDA86989D9B62` (`slug`),
  KEY `IDX_A61BDA8646D262E0` (`createdby`),
  KEY `IDX_A61BDA86797D53BF` (`modifiedby`),
  KEY `rowstatus` (`rowstatus`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cnt_t_news`
--

LOCK TABLES `cnt_t_news` WRITE;
/*!40000 ALTER TABLE `cnt_t_news` DISABLE KEYS */;
INSERT INTO `cnt_t_news` VALUES (1,'Sample blog post 1','sample-blog-post','                    <p>This blog post shows a few different types of content that\'s supported and styled with Bootstrap. Basic typography, images, and code are all supported.</p>\r\n                    <hr>\r\n                    <p>Cum sociis natoque penatibus et magnis <a href=\"#\">dis parturient montes</a>, nascetur ridiculus mus. Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum. Sed posuere consectetur est at lobortis. Cras mattis consectetur purus sit amet fermentum.</p>\r\n                    <blockquote>\r\n                        <p>Curabitur blandit tempus porttitor. <strong>Nullam quis risus eget urna mollis</strong> ornare vel eu leo. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>\r\n                    </blockquote>\r\n                    <p>Etiam porta <em>sem malesuada magna</em> mollis euismod. Cras mattis consectetur purus sit amet fermentum. Aenean lacinia bibendum nulla sed consectetur.</p>\r\n                    <h2>Heading</h2>\r\n                    <p>Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Morbi leo risus, porta ac consectetur ac, vestibulum at eros.</p>\r\n                    <h3>Sub-heading</h3>\r\n                    <p>Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>\r\n                    <pre><code>Example code block</code></pre>\r\n                    <p>Aenean lacinia bibendum nulla sed consectetur. Etiam porta sem malesuada magna mollis euismod. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa.</p>\r\n                    <h3>Sub-heading</h3>\r\n                    <p>Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Aenean lacinia bibendum nulla sed consectetur. Etiam porta sem malesuada magna mollis euismod. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>\r\n                    <ul>\r\n                        <li>Praesent commodo cursus magna, vel scelerisque nisl consectetur et.</li>\r\n                        <li>Donec id elit non mi porta gravida at eget metus.</li>\r\n                        <li>Nulla vitae elit libero, a pharetra augue.</li>\r\n                    </ul>\r\n                    <p>Donec ullamcorper nulla non metus auctor fringilla. Nulla vitae elit libero, a pharetra augue.</p>\r\n                    <ol>\r\n                        <li>Vestibulum id ligula porta felis euismod semper.</li>\r\n                        <li>Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</li>\r\n                        <li>Maecenas sed diam eget risus varius blandit sit amet non magna.</li>\r\n                    </ol>\r\n                    <p>Cras mattis consectetur purus sit amet fermentum. Sed posuere consectetur est at lobortis.</p>','2018-03-01 00:00:00',NULL,'2018-03-05 18:34:33','2018-03-12 12:33:30',1,1,1,'IMAGE','DRAFT'),(3,'Sample blog post 2','sample-blog-post-1\r\n','                    <p>This blog post shows a few different types of content that\'s supported and styled with Bootstrap. Basic typography, images, and code are all supported.</p>\r\n                    <hr>\r\n                    <p>Cum sociis natoque penatibus et magnis <a href=\"#\">dis parturient montes</a>, nascetur ridiculus mus. Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum. Sed posuere consectetur est at lobortis. Cras mattis consectetur purus sit amet fermentum.</p>\r\n                    <blockquote>\r\n                        <p>Curabitur blandit tempus porttitor. <strong>Nullam quis risus eget urna mollis</strong> ornare vel eu leo. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>\r\n                    </blockquote>\r\n                    <p>Etiam porta <em>sem malesuada magna</em> mollis euismod. Cras mattis consectetur purus sit amet fermentum. Aenean lacinia bibendum nulla sed consectetur.</p>\r\n                    <h2>Heading</h2>\r\n                    <p>Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Morbi leo risus, porta ac consectetur ac, vestibulum at eros.</p>\r\n                    <h3>Sub-heading</h3>\r\n                    <p>Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>\r\n                    <pre><code>Example code block</code></pre>\r\n                    <p>Aenean lacinia bibendum nulla sed consectetur. Etiam porta sem malesuada magna mollis euismod. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa.</p>\r\n                    <h3>Sub-heading</h3>\r\n                    <p>Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Aenean lacinia bibendum nulla sed consectetur. Etiam porta sem malesuada magna mollis euismod. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>\r\n                    <ul>\r\n                        <li>Praesent commodo cursus magna, vel scelerisque nisl consectetur et.</li>\r\n                        <li>Donec id elit non mi porta gravida at eget metus.</li>\r\n                        <li>Nulla vitae elit libero, a pharetra augue.</li>\r\n                    </ul>\r\n                    <p>Donec ullamcorper nulla non metus auctor fringilla. Nulla vitae elit libero, a pharetra augue.</p>\r\n                    <ol>\r\n                        <li>Vestibulum id ligula porta felis euismod semper.</li>\r\n                        <li>Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</li>\r\n                        <li>Maecenas sed diam eget risus varius blandit sit amet non magna.</li>\r\n                    </ol>\r\n                    <p>Cras mattis consectetur purus sit amet fermentum. Sed posuere consectetur est at lobortis.</p>','2018-03-01 00:00:00',NULL,'2018-03-05 18:34:33','2018-03-05 18:34:33',1,1,1,'IMAGE','DRAFT'),(4,'Sample blog post 3','sample-blog-post-3\r\n','                    <p>This blog post shows a few different types of content that\'s supported and styled with Bootstrap. Basic typography, images, and code are all supported.</p>\r\n                    <hr>\r\n                    <p>Cum sociis natoque penatibus et magnis <a href=\"#\">dis parturient montes</a>, nascetur ridiculus mus. Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum. Sed posuere consectetur est at lobortis. Cras mattis consectetur purus sit amet fermentum.</p>\r\n                    <blockquote>\r\n                        <p>Curabitur blandit tempus porttitor. <strong>Nullam quis risus eget urna mollis</strong> ornare vel eu leo. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>\r\n                    </blockquote>\r\n                    <p>Etiam porta <em>sem malesuada magna</em> mollis euismod. Cras mattis consectetur purus sit amet fermentum. Aenean lacinia bibendum nulla sed consectetur.</p>\r\n                    <h2>Heading</h2>\r\n                    <p>Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Morbi leo risus, porta ac consectetur ac, vestibulum at eros.</p>\r\n                    <h3>Sub-heading</h3>\r\n                    <p>Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>\r\n                    <pre><code>Example code block</code></pre>\r\n                    <p>Aenean lacinia bibendum nulla sed consectetur. Etiam porta sem malesuada magna mollis euismod. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa.</p>\r\n                    <h3>Sub-heading</h3>\r\n                    <p>Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Aenean lacinia bibendum nulla sed consectetur. Etiam porta sem malesuada magna mollis euismod. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>\r\n                    <ul>\r\n                        <li>Praesent commodo cursus magna, vel scelerisque nisl consectetur et.</li>\r\n                        <li>Donec id elit non mi porta gravida at eget metus.</li>\r\n                        <li>Nulla vitae elit libero, a pharetra augue.</li>\r\n                    </ul>\r\n                    <p>Donec ullamcorper nulla non metus auctor fringilla. Nulla vitae elit libero, a pharetra augue.</p>\r\n                    <ol>\r\n                        <li>Vestibulum id ligula porta felis euismod semper.</li>\r\n                        <li>Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</li>\r\n                        <li>Maecenas sed diam eget risus varius blandit sit amet non magna.</li>\r\n                    </ol>\r\n                    <p>Cras mattis consectetur purus sit amet fermentum. Sed posuere consectetur est at lobortis.</p>','2018-03-01 00:00:00',NULL,'2018-03-05 18:34:33','2018-03-05 18:34:33',1,1,1,'IMAGE','DRAFT'),(5,'Sample blog post 4','sample-blog-post-4\r\n','                    <p>This blog post shows a few different types of content that\'s supported and styled with Bootstrap. Basic typography, images, and code are all supported.</p>\r\n                    <hr>\r\n                    <p>Cum sociis natoque penatibus et magnis <a href=\"#\">dis parturient montes</a>, nascetur ridiculus mus. Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum. Sed posuere consectetur est at lobortis. Cras mattis consectetur purus sit amet fermentum.</p>\r\n                    <blockquote>\r\n                        <p>Curabitur blandit tempus porttitor. <strong>Nullam quis risus eget urna mollis</strong> ornare vel eu leo. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>\r\n                    </blockquote>\r\n                    <p>Etiam porta <em>sem malesuada magna</em> mollis euismod. Cras mattis consectetur purus sit amet fermentum. Aenean lacinia bibendum nulla sed consectetur.</p>\r\n                    <h2>Heading</h2>\r\n                    <p>Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Morbi leo risus, porta ac consectetur ac, vestibulum at eros.</p>\r\n                    <h3>Sub-heading</h3>\r\n                    <p>Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>\r\n                    <pre><code>Example code block</code></pre>\r\n                    <p>Aenean lacinia bibendum nulla sed consectetur. Etiam porta sem malesuada magna mollis euismod. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa.</p>\r\n                    <h3>Sub-heading</h3>\r\n                    <p>Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Aenean lacinia bibendum nulla sed consectetur. Etiam porta sem malesuada magna mollis euismod. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>\r\n                    <ul>\r\n                        <li>Praesent commodo cursus magna, vel scelerisque nisl consectetur et.</li>\r\n                        <li>Donec id elit non mi porta gravida at eget metus.</li>\r\n                        <li>Nulla vitae elit libero, a pharetra augue.</li>\r\n                    </ul>\r\n                    <p>Donec ullamcorper nulla non metus auctor fringilla. Nulla vitae elit libero, a pharetra augue.</p>\r\n                    <ol>\r\n                        <li>Vestibulum id ligula porta felis euismod semper.</li>\r\n                        <li>Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</li>\r\n                        <li>Maecenas sed diam eget risus varius blandit sit amet non magna.</li>\r\n                    </ol>\r\n                    <p>Cras mattis consectetur purus sit amet fermentum. Sed posuere consectetur est at lobortis.</p>','2018-03-01 00:00:00',NULL,'2018-03-05 18:34:33','2018-03-05 18:34:33',1,1,1,'IMAGE','DRAFT'),(6,'Sample blog post 5','sample-blog-post-6\r\n','                    <p>This blog post shows a few different types of content that\'s supported and styled with Bootstrap. Basic typography, images, and code are all supported.</p>\r\n                    <hr>\r\n                    <p>Cum sociis natoque penatibus et magnis <a href=\"#\">dis parturient montes</a>, nascetur ridiculus mus. Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum. Sed posuere consectetur est at lobortis. Cras mattis consectetur purus sit amet fermentum.</p>\r\n                    <blockquote>\r\n                        <p>Curabitur blandit tempus porttitor. <strong>Nullam quis risus eget urna mollis</strong> ornare vel eu leo. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>\r\n                    </blockquote>\r\n                    <p>Etiam porta <em>sem malesuada magna</em> mollis euismod. Cras mattis consectetur purus sit amet fermentum. Aenean lacinia bibendum nulla sed consectetur.</p>\r\n                    <h2>Heading</h2>\r\n                    <p>Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Morbi leo risus, porta ac consectetur ac, vestibulum at eros.</p>\r\n                    <h3>Sub-heading</h3>\r\n                    <p>Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>\r\n                    <pre><code>Example code block</code></pre>\r\n                    <p>Aenean lacinia bibendum nulla sed consectetur. Etiam porta sem malesuada magna mollis euismod. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa.</p>\r\n                    <h3>Sub-heading</h3>\r\n                    <p>Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Aenean lacinia bibendum nulla sed consectetur. Etiam porta sem malesuada magna mollis euismod. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>\r\n                    <ul>\r\n                        <li>Praesent commodo cursus magna, vel scelerisque nisl consectetur et.</li>\r\n                        <li>Donec id elit non mi porta gravida at eget metus.</li>\r\n                        <li>Nulla vitae elit libero, a pharetra augue.</li>\r\n                    </ul>\r\n                    <p>Donec ullamcorper nulla non metus auctor fringilla. Nulla vitae elit libero, a pharetra augue.</p>\r\n                    <ol>\r\n                        <li>Vestibulum id ligula porta felis euismod semper.</li>\r\n                        <li>Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</li>\r\n                        <li>Maecenas sed diam eget risus varius blandit sit amet non magna.</li>\r\n                    </ol>\r\n                    <p>Cras mattis consectetur purus sit amet fermentum. Sed posuere consectetur est at lobortis.</p>','2018-03-01 00:00:00',NULL,'2018-03-05 18:34:33','2018-03-05 18:34:33',1,1,1,'IMAGE','DRAFT'),(7,'Some Title','some-title','<p>Some Content</p>\r\n','2018-10-10 00:00:00','{\"video\":{\"src\":\"some url to video\"},\"images\":[{\"name\":\"03.lorempixel1204x768.jpg\",\"type\":\"image\\/jpeg\",\"width\":\"480\",\"height\":\"320\",\"src\":\"\\/uploads\\/U8\\/kg\\/b4\\/pY\\/phpcI0OMs_5aabbc8b38c1b7_26903502.jpg\",\"size\":\"66571\",\"error\":\"0\",\"thumb\":{\"width\":\"320\",\"height\":\"270\",\"src\":\"\\/uploads\\/U8\\/kg\\/b4\\/pY\\/thumb\\/phpcI0OMs_5aabbc8b38c1b7_26903502.jpg\"}}]}','2018-03-12 12:54:38','2018-03-16 12:51:07',1,1,1,'VIDEO','PREVIEW');
/*!40000 ALTER TABLE `cnt_t_news` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mrk_t_brands`
--

DROP TABLE IF EXISTS `mrk_t_brands`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mrk_t_brands` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `mtitle` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `mkeywords` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `mdescription` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `createdat` datetime NOT NULL,
  `createdby` int(11) DEFAULT NULL,
  `modifiedat` datetime NOT NULL,
  `modifiedby` int(11) DEFAULT NULL,
  `rowstatus` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_DD6DD238989D9B62` (`slug`),
  KEY `IDX_DD6DD23846D262E0` (`createdby`),
  KEY `IDX_DD6DD238797D53BF` (`modifiedby`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mrk_t_brands`
--

LOCK TABLES `mrk_t_brands` WRITE;
/*!40000 ALTER TABLE `mrk_t_brands` DISABLE KEYS */;
INSERT INTO `mrk_t_brands` VALUES (1,'Apple','apple','Apple','Apple','Apple','2018-11-25 00:28:31',1,'2018-11-25 00:28:31',1,1),(2,'BlackBerry','blackberry','BlackBerry','BlackBerry','BlackBerry','2018-11-25 00:28:31',1,'2018-11-25 00:28:31',1,1),(3,'Dyson','dyson','Dyson','Dyson','Dyson','2018-11-25 00:28:31',1,'2018-11-25 00:28:31',1,1),(4,'Zelmer','zelmer','Zelmer','Zelmer','Zelmer','2018-11-25 00:28:31',1,'2018-11-25 00:28:31',1,1);
/*!40000 ALTER TABLE `mrk_t_brands` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mrk_t_categories`
--

DROP TABLE IF EXISTS `mrk_t_categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mrk_t_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parentid` int(11) DEFAULT NULL,
  `name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `mtitle` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `mkeywords` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `mdescription` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `createdat` datetime NOT NULL,
  `createdby` int(11) DEFAULT NULL,
  `modifiedat` datetime NOT NULL,
  `modifiedby` int(11) DEFAULT NULL,
  `rowstatus` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_8A060441989D9B62` (`slug`),
  KEY `IDX_8A060441856A684C` (`parentid`),
  KEY `IDX_8A06044146D262E0` (`createdby`),
  KEY `IDX_8A060441797D53BF` (`modifiedby`),
  CONSTRAINT `FK_8A060441856A684C` FOREIGN KEY (`parentid`) REFERENCES `mrk_t_categories` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mrk_t_categories`
--

LOCK TABLES `mrk_t_categories` WRITE;
/*!40000 ALTER TABLE `mrk_t_categories` DISABLE KEYS */;
INSERT INTO `mrk_t_categories` VALUES (1,NULL,'Мобильные телефоны','mobilnyie-telefonyi','Мобильные телефоны','Мобильные телефоны','Мобильные телефоны','2018-11-24 23:04:59',1,'2018-11-24 23:04:59',1,1),(2,NULL,'Бытовая техника','byitovaya-tehnika','Бытовая техника','Бытовая техника','Бытовая техника','2018-11-24 23:04:59',1,'2018-11-24 23:04:59',1,1),(3,2,'Пылесосы','pyilesosyi','Пылесосы','Пылесосы','Пылесосы','2018-11-24 23:04:59',1,'2018-11-24 23:04:59',1,1),(4,2,'Миксеры','miksery','Миксеры','Миксеры','Миксеры','2018-11-24 23:04:59',1,'2018-11-24 23:04:59',1,1);
/*!40000 ALTER TABLE `mrk_t_categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mrk_t_product_categories`
--

DROP TABLE IF EXISTS `mrk_t_product_categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mrk_t_product_categories` (
  `productid` int(11) NOT NULL,
  `categoryid` int(11) NOT NULL,
  PRIMARY KEY (`productid`,`categoryid`),
  KEY `IDX_C9A184D0A3FDB2A7` (`productid`),
  KEY `IDX_C9A184D09B32FD3` (`categoryid`),
  CONSTRAINT `FK_C9A184D09B32FD3` FOREIGN KEY (`categoryid`) REFERENCES `mrk_t_categories` (`id`),
  CONSTRAINT `FK_C9A184D0A3FDB2A7` FOREIGN KEY (`productid`) REFERENCES `mrk_t_products` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mrk_t_product_categories`
--

LOCK TABLES `mrk_t_product_categories` WRITE;
/*!40000 ALTER TABLE `mrk_t_product_categories` DISABLE KEYS */;
INSERT INTO `mrk_t_product_categories` VALUES (1,1),(2,1),(3,3),(4,4);
/*!40000 ALTER TABLE `mrk_t_product_categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mrk_t_products`
--

DROP TABLE IF EXISTS `mrk_t_products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mrk_t_products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `brandid` int(11) DEFAULT NULL,
  `name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `annotation` longtext COLLATE utf8_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8_unicode_ci NOT NULL,
  `mtitle` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `mkeywords` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `mdescription` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `createdat` datetime NOT NULL,
  `createdby` int(11) DEFAULT NULL,
  `modifiedat` datetime NOT NULL,
  `modifiedby` int(11) DEFAULT NULL,
  `rowstatus` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_66380E8989D9B62` (`slug`),
  KEY `IDX_66380E893AE6E6` (`brandid`),
  KEY `IDX_66380E846D262E0` (`createdby`),
  KEY `IDX_66380E8797D53BF` (`modifiedby`),
  CONSTRAINT `FK_66380E893AE6E6` FOREIGN KEY (`brandid`) REFERENCES `mrk_t_brands` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mrk_t_products`
--

LOCK TABLES `mrk_t_products` WRITE;
/*!40000 ALTER TABLE `mrk_t_products` DISABLE KEYS */;
INSERT INTO `mrk_t_products` VALUES (1,1,'Apple iPhone 4S 16Gb','apple-iphone-4s-16gb','<p>iPhone 4 стал настоящим хитом продаж по всему миру, но компания Apple не стоит на месте, усовершенствованная модель iPhone 4s обзавелась новым процессором, 8ми мегапиксельной камерой и голосовым помошником Siri. Многие оценят тот факт, что наряду с моделями оснащенными 16Gb и 32Gb памяти теперб можно купить айфон с 64Gb памяти.</p>','<p><span>iPhone 4 получил 3,5-дюймовый дисплей с разрешением 960 x 640 пикселей. Толщина устройства всего 9,3 мм. Передняя и задняя стороны аппарата обе плоские, выполнены из стекла, торцевая окантовка - стальная. У телефона есть фронтальная камера для видеозвонков, дополнительный микрофон для шумоподавления, а слот SIM сменился на Micro SIM. Батарея обеспечивает до 14 часов в режиме разговора, 6/10 часов в режиме веб-серфинга по 3G/Wi-Fi, 10 часов просмотра видео, 40 часов прослушивания музыки и 300 часов режима ожидания. Кроме того, добавлена поддержка Wi-Fi 802.11n. Разрешение основной камеры 5 МП, имеется поддержка видеосъемки с разрешением 1280 x 720 пикселей со скоростью 30 кадров в секунду.Дисплей 3,5 дюйма, 640х960 точек, IPS, олеофобное покрытие / Двухъядерный A5 Чип, Графический ускоритель PowerVR SGX543MP2 / 8-мегапиксельная фотокамера, HD видео (1080pх) / Bluetooth 4.0 и Wi-Fi 802.11b/g/n / гарантия - 12 месяцев.</span></p>','','','','2018-11-25 17:24:55',1,'2018-11-25 17:24:55',1,1),(2,2,'BlackBerry Bold 9900','blackberry-torch-9800','<p>BlackBerry (Блэкберри) torch 9800 считают одним из наиболее современных и, конечно же, востребованных мобильных устройств от популярного производителя RIM. Отличительной чертой от большинства конкурентов является то, что телефоны гармонично комбинируют в себе слайдеры со стандартным расположением алфавита (QWERTY), а также сенсорные экраны.</p>','<p>Torch 9800 базируется на платформе BlackBerry OS 6 и оснащен веб-браузером на движке Webkit. Смартфон выполнен в форм-факторе вертикального слайдера, оснащен сенсорным экраном и выдвигающейся книзу QWERTY-клавиатурой. Устройство обладает 5-МП камерой, 512 МБ ОЗУ, 512 МБ ПЗУ и 4 ГБ дополнительной встроенной памяти, которую можно расширить с помощью карт microSD.</p>','','','','2018-11-25 17:24:55',1,'2018-11-25 17:24:55',1,1),(3,3,'Dyson DC32 Exclusive','dyson-dc32-exclusive','<p>Пылесос Dyson DC32 EXCLUSIVE - является машиной, основное предназначение которой, сбор пыли, удаление мусора, а также грязи. Пылесос может, например, чистить любые ковровые изделия, а также убирает мусор с пола в квартире. Очень не сложен в использовании на практике.</p>','<p>Пылесос Dyson DC32 EXCLUSIVE - является машиной, основное предназначение которой, сбор пыли, удаление мусора, а также грязи. Пылесос может, например, чистить любые ковровые изделия, а также убирает мусор с пола в квартире. Очень не сложен в использовании на практике.</p>','','','','2018-11-25 17:24:55',1,'2018-11-25 17:24:55',1,1),(4,4,'Миксер Zelmer 481.67','mikser-zelmer-48167','<p>Современная модель миксера Zelmer 481.67. Эффективное сочетание компактного размера и высокой мощности. Миксер универсален. Отличается от других моделей серии тем, что оснащен встроенными в чашу весами с LCD - дисплеем.</p>','<p>Современная модель миксера Zelmer 481.67. Эффективное сочетание компактного размера и высокой мощности. Миксер универсален. Отличается от других моделей серии тем, что оснащен встроенными в чашу весами с LCD - дисплеем. Вы всегда будет знать количество взбиваемых продуктов! Хотите сэкономить - приобретите эту модель и наслаждайтесь комфортным и быстрым приготовлением пищи! При работе на подставке миксер Zelmer 481.67 совершает колебательные движения, равномерно перемешивающие продукты, а вращающаяся чаша распределяет их до однородной массы. Специально предусмотренная функция блендера является одним из дополнительных плюсов этого миксера. В комплект поставки входят разнообразные насадки: насадка для протирания овощей, венчики и мешалки из нержавеющей стали, для перемешивания и взбивания, лопатка и шпатель, устанавливающийся на чашу, для свободного перемешивания теста. Также в комплект входит стакан для блендера. Емкость рабочей чаши составляет 3 литра. Предусмотрены 5 скоростей для различных режимов работы. Максимальные предел взвешивания для весов 3 кг.</p>','','','','2018-11-25 17:24:55',1,'2018-11-25 17:24:55',1,1);
/*!40000 ALTER TABLE `mrk_t_products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sys_t_layouts`
--

DROP TABLE IF EXISTS `sys_t_layouts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sys_t_layouts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `template` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `createdat` datetime NOT NULL,
  `modifiedat` datetime NOT NULL,
  `rowstatus` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sys_t_layouts`
--

LOCK TABLES `sys_t_layouts` WRITE;
/*!40000 ALTER TABLE `sys_t_layouts` DISABLE KEYS */;
INSERT INTO `sys_t_layouts` VALUES (1,'SOME_LAYOUT_IDENTIFIER','Test6','2017-09-11 14:33:41','2018-03-07 12:50:53',1),(2,'SOME_LAYOUT_IDENTIFIER','Test','0000-00-00 00:00:00','0000-00-00 00:00:00',0);
/*!40000 ALTER TABLE `sys_t_layouts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sys_t_modules`
--

DROP TABLE IF EXISTS `sys_t_modules`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sys_t_modules` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `module` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `createdat` datetime NOT NULL,
  `modifiedat` datetime NOT NULL,
  `rowstatus` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sys_t_modules`
--

LOCK TABLES `sys_t_modules` WRITE;
/*!40000 ALTER TABLE `sys_t_modules` DISABLE KEYS */;
INSERT INTO `sys_t_modules` VALUES (1,'OpenPower\\Application','OpenPower Application','2017-09-29 09:43:43','2017-09-29 13:36:56',1);
/*!40000 ALTER TABLE `sys_t_modules` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sys_t_page_types`
--

DROP TABLE IF EXISTS `sys_t_page_types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sys_t_page_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `moduleid` int(11) DEFAULT NULL,
  `controller` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `action` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `icon` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `createdat` datetime NOT NULL,
  `modifiedat` datetime NOT NULL,
  `rowstatus` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_C2FE785E30694023` (`moduleid`),
  CONSTRAINT `FK_C2FE785E30694023` FOREIGN KEY (`moduleid`) REFERENCES `sys_t_modules` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sys_t_page_types`
--

LOCK TABLES `sys_t_page_types` WRITE;
/*!40000 ALTER TABLE `sys_t_page_types` DISABLE KEYS */;
/*!40000 ALTER TABLE `sys_t_page_types` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sys_t_routes`
--

DROP TABLE IF EXISTS `sys_t_routes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sys_t_routes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `createdat` datetime NOT NULL,
  `modifiedat` datetime NOT NULL,
  `rowstatus` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sys_t_routes`
--

LOCK TABLES `sys_t_routes` WRITE;
/*!40000 ALTER TABLE `sys_t_routes` DISABLE KEYS */;
/*!40000 ALTER TABLE `sys_t_routes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sys_t_sessions`
--

DROP TABLE IF EXISTS `sys_t_sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sys_t_sessions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `value` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT '(DC2Type:object)',
  `modified` int(11) NOT NULL,
  `lifetime` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sys_t_sessions`
--

LOCK TABLES `sys_t_sessions` WRITE;
/*!40000 ALTER TABLE `sys_t_sessions` DISABLE KEYS */;
/*!40000 ALTER TABLE `sys_t_sessions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sys_t_settings`
--

DROP TABLE IF EXISTS `sys_t_settings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sys_t_settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `identifier` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `base_url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ssl_base_url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cdn_url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ssl_cdn_url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `forcessl` smallint(6) NOT NULL,
  `locale` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `timezone` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `options` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT '(DC2Type:json_array)',
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `rowstatus` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sys_t_settings`
--

LOCK TABLES `sys_t_settings` WRITE;
/*!40000 ALTER TABLE `sys_t_settings` DISABLE KEYS */;
/*!40000 ALTER TABLE `sys_t_settings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sys_t_themes`
--

DROP TABLE IF EXISTS `sys_t_themes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sys_t_themes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `template` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `rowstatus` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sys_t_themes`
--

LOCK TABLES `sys_t_themes` WRITE;
/*!40000 ALTER TABLE `sys_t_themes` DISABLE KEYS */;
/*!40000 ALTER TABLE `sys_t_themes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vot_t_option_translations`
--

DROP TABLE IF EXISTS `vot_t_option_translations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `vot_t_option_translations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `object_id` int(11) DEFAULT NULL,
  `locale` varchar(8) COLLATE utf8_unicode_ci NOT NULL,
  `field` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`),
  UNIQUE KEY `lookup_unique_idx` (`locale`,`object_id`,`field`),
  KEY `IDX_103D899D232D562B` (`object_id`),
  CONSTRAINT `FK_103D899D232D562B` FOREIGN KEY (`object_id`) REFERENCES `vot_t_options` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vot_t_option_translations`
--

LOCK TABLES `vot_t_option_translations` WRITE;
/*!40000 ALTER TABLE `vot_t_option_translations` DISABLE KEYS */;
/*!40000 ALTER TABLE `vot_t_option_translations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vot_t_options`
--

DROP TABLE IF EXISTS `vot_t_options`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `vot_t_options` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pollid` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ponderability` int(11) NOT NULL,
  `priority` int(11) NOT NULL,
  `createdat` datetime NOT NULL,
  `modifiedat` datetime NOT NULL,
  `rowstatus` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_2557BC5C6F5F43AE` (`pollid`),
  KEY `rowstatus` (`rowstatus`),
  CONSTRAINT `FK_2557BC5C6F5F43AE` FOREIGN KEY (`pollid`) REFERENCES `vot_t_polls` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vot_t_options`
--

LOCK TABLES `vot_t_options` WRITE;
/*!40000 ALTER TABLE `vot_t_options` DISABLE KEYS */;
INSERT INTO `vot_t_options` VALUES (1,1,'Options 1',0,0,'2018-02-26 00:00:00','2018-02-26 00:00:00',1),(2,1,'Options 2',0,0,'2018-02-26 00:00:00','2018-02-26 00:00:00',1),(3,1,'Options 3',0,0,'2018-02-26 00:00:00','2018-02-26 00:00:00',1);
/*!40000 ALTER TABLE `vot_t_options` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vot_t_poll_relations`
--

DROP TABLE IF EXISTS `vot_t_poll_relations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `vot_t_poll_relations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pollid` int(11) DEFAULT NULL,
  `relation` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `createdat` datetime NOT NULL,
  `modifiedat` datetime NOT NULL,
  `rowstatus` tinyint(1) NOT NULL,
  `total` int(11) NOT NULL,
  `avg` double NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_FD34EAFA6F5F43AE` (`pollid`),
  CONSTRAINT `FK_FD34EAFA6F5F43AE` FOREIGN KEY (`pollid`) REFERENCES `vot_t_polls` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vot_t_poll_relations`
--

LOCK TABLES `vot_t_poll_relations` WRITE;
/*!40000 ALTER TABLE `vot_t_poll_relations` DISABLE KEYS */;
INSERT INTO `vot_t_poll_relations` VALUES (1,1,'SOME_RELATION[100550]','2018-02-26 11:22:45','2018-02-26 11:22:45',1,0,0),(2,1,'SOME_RELATION[101]','2018-02-26 11:59:53','2018-02-26 11:59:53',1,1,0);
/*!40000 ALTER TABLE `vot_t_poll_relations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vot_t_poll_translations`
--

DROP TABLE IF EXISTS `vot_t_poll_translations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `vot_t_poll_translations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `object_id` int(11) DEFAULT NULL,
  `locale` varchar(8) COLLATE utf8_unicode_ci NOT NULL,
  `field` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`),
  UNIQUE KEY `lookup_unique_idx` (`locale`,`object_id`,`field`),
  KEY `IDX_867A6557232D562B` (`object_id`),
  CONSTRAINT `FK_867A6557232D562B` FOREIGN KEY (`object_id`) REFERENCES `vot_t_polls` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vot_t_poll_translations`
--

LOCK TABLES `vot_t_poll_translations` WRITE;
/*!40000 ALTER TABLE `vot_t_poll_translations` DISABLE KEYS */;
/*!40000 ALTER TABLE `vot_t_poll_translations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vot_t_polls`
--

DROP TABLE IF EXISTS `vot_t_polls`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `vot_t_polls` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `subject` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `createdat` datetime NOT NULL,
  `modifiedat` datetime NOT NULL,
  `rowstatus` tinyint(1) NOT NULL,
  `total` int(11) NOT NULL,
  `avg` double NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_42547AFB77153098` (`code`),
  KEY `rowstatus` (`rowstatus`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vot_t_polls`
--

LOCK TABLES `vot_t_polls` WRITE;
/*!40000 ALTER TABLE `vot_t_polls` DISABLE KEYS */;
INSERT INTO `vot_t_polls` VALUES (1,'SOME_RELATION','Poll Subject','2018-02-26 00:00:00','2018-02-26 00:00:00',1,0,0);
/*!40000 ALTER TABLE `vot_t_polls` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vot_t_user_relations`
--

DROP TABLE IF EXISTS `vot_t_user_relations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `vot_t_user_relations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `voteid` int(11) DEFAULT NULL,
  `createdat` datetime NOT NULL,
  `modifiedat` datetime NOT NULL,
  `rowstatus` tinyint(1) NOT NULL,
  `userid` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_36034EEA237AE44C` (`voteid`),
  KEY `IDX_36034EEAF132696E` (`userid`),
  KEY `rowstatus` (`rowstatus`),
  CONSTRAINT `FK_36034EEA237AE44C` FOREIGN KEY (`voteid`) REFERENCES `vot_t_vote_relations` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vot_t_user_relations`
--

LOCK TABLES `vot_t_user_relations` WRITE;
/*!40000 ALTER TABLE `vot_t_user_relations` DISABLE KEYS */;
INSERT INTO `vot_t_user_relations` VALUES (1,2,'2018-02-26 11:59:58','2018-02-26 11:59:58',1,1);
/*!40000 ALTER TABLE `vot_t_user_relations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vot_t_users`
--

DROP TABLE IF EXISTS `vot_t_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `vot_t_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `voteid` int(11) DEFAULT NULL,
  `createdat` datetime NOT NULL,
  `modifiedat` datetime NOT NULL,
  `rowstatus` tinyint(1) NOT NULL,
  `userid` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_4BEB19FC237AE44C` (`voteid`),
  KEY `IDX_4BEB19FCF132696E` (`userid`),
  KEY `rowstatus` (`rowstatus`),
  CONSTRAINT `FK_4BEB19FC237AE44C` FOREIGN KEY (`voteid`) REFERENCES `vot_t_votes` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vot_t_users`
--

LOCK TABLES `vot_t_users` WRITE;
/*!40000 ALTER TABLE `vot_t_users` DISABLE KEYS */;
/*!40000 ALTER TABLE `vot_t_users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vot_t_vote_relations`
--

DROP TABLE IF EXISTS `vot_t_vote_relations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `vot_t_vote_relations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `relationid` int(11) DEFAULT NULL,
  `optionid` int(11) DEFAULT NULL,
  `createdat` datetime NOT NULL,
  `modifiedat` datetime NOT NULL,
  `rowstatus` tinyint(1) NOT NULL,
  `total` int(11) NOT NULL,
  `percent` double NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_74AF04CB763A25A6` (`relationid`),
  KEY `IDX_74AF04CB5BFC936E` (`optionid`),
  KEY `rowstatus` (`rowstatus`),
  CONSTRAINT `FK_74AF04CB5BFC936E` FOREIGN KEY (`optionid`) REFERENCES `vot_t_options` (`id`),
  CONSTRAINT `FK_74AF04CB763A25A6` FOREIGN KEY (`relationid`) REFERENCES `vot_t_poll_relations` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vot_t_vote_relations`
--

LOCK TABLES `vot_t_vote_relations` WRITE;
/*!40000 ALTER TABLE `vot_t_vote_relations` DISABLE KEYS */;
INSERT INTO `vot_t_vote_relations` VALUES (1,1,1,'2018-02-26 11:22:49','2018-02-26 11:22:53',1,0,0),(2,2,1,'2018-02-26 11:59:57','2018-02-26 11:59:57',1,1,100);
/*!40000 ALTER TABLE `vot_t_vote_relations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vot_t_votes`
--

DROP TABLE IF EXISTS `vot_t_votes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `vot_t_votes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pollid` int(11) DEFAULT NULL,
  `optionid` int(11) DEFAULT NULL,
  `composition` int(11) NOT NULL,
  `createdat` datetime NOT NULL,
  `modifiedat` datetime NOT NULL,
  `rowstatus` tinyint(1) NOT NULL,
  `total` int(11) NOT NULL,
  `percent` double NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_EE3C6DA5BFC936E` (`optionid`),
  KEY `IDX_EE3C6DA6F5F43AE` (`pollid`),
  KEY `rowstatus` (`rowstatus`),
  CONSTRAINT `FK_EE3C6DA5BFC936E` FOREIGN KEY (`optionid`) REFERENCES `vot_t_options` (`id`),
  CONSTRAINT `FK_EE3C6DA6F5F43AE` FOREIGN KEY (`pollid`) REFERENCES `vot_t_polls` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vot_t_votes`
--

LOCK TABLES `vot_t_votes` WRITE;
/*!40000 ALTER TABLE `vot_t_votes` DISABLE KEYS */;
/*!40000 ALTER TABLE `vot_t_votes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'portal.dev'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-11-25 22:25:39
