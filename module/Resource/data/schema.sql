-- MySQL dump 10.16  Distrib 10.1.34-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: kubnete.dev
-- ------------------------------------------------------
-- Server version	10.1.34-MariaDB-0ubuntu0.18.04.1

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
-- Table structure for table `acl_t_users`
--

DROP TABLE IF EXISTS `acl_t_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `acl_t_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `firstname` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `lastname` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `state` varchar(8) COLLATE utf8_unicode_ci NOT NULL,
  `options` longtext COLLATE utf8_unicode_ci,
  `type` varchar(8) COLLATE utf8_unicode_ci DEFAULT '1',
  `createdat` datetime NOT NULL,
  `modifiedat` datetime NOT NULL,
  `rowstatus` int(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `acl_t_users`
--

LOCK TABLES `acl_t_users` WRITE;
/*!40000 ALTER TABLE `acl_t_users` DISABLE KEYS */;
INSERT INTO `acl_t_users` VALUES (1,'info@msbios.com','$2a$04$ZuCmGpgh6i1gMia/U1yb7uYnRA2p6Niy5jA9Wy9m0G25UG86P67ja','developer','Judzhin','Miles','ACTIVE',NULL,'1','0000-00-00 00:00:00','0000-00-00 00:00:00',0);
/*!40000 ALTER TABLE `acl_t_users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cnt_t_documents`
--

DROP TABLE IF EXISTS `cnt_t_documents`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cnt_t_documents` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) DEFAULT '0',
  `document_type_id` int(11) DEFAULT NULL,
  `layout_id` int(11) DEFAULT NULL,
  `view_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `uri` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `order_in` int(11) NOT NULL DEFAULT '0',
  `in_navigation` tinyint(1) DEFAULT '0',
  `is_cached` tinyint(1) DEFAULT '1',
  `locale` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `user_id` int(11) NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_document_layout` (`layout_id`),
  KEY `fk_document_document` (`parent_id`),
  KEY `fk_documents_view` (`view_id`),
  KEY `fk_document_document_type` (`document_type_id`),
  KEY `fk_document_user` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cnt_t_documents`
--

LOCK TABLES `cnt_t_documents` WRITE;
/*!40000 ALTER TABLE `cnt_t_documents` DISABLE KEYS */;
INSERT INTO `cnt_t_documents` VALUES (1,5,1,NULL,1,'Blog','blogs',0,0,0,1,NULL,'0000-00-00 00:00:00',1,'0000-00-00 00:00:00'),(2,1,1,NULL,2,'Item','item-2',0,0,0,1,NULL,'0000-00-00 00:00:00',1,'0000-00-00 00:00:00'),(5,NULL,1,4,3,'Home page','',0,0,0,1,NULL,'0000-00-00 00:00:00',1,'0000-00-00 00:00:00'),(6,NULL,1,NULL,NULL,'Some Name','Some URI',0,0,0,1,NULL,'0000-00-00 00:00:00',0,'0000-00-00 00:00:00'),(7,NULL,3,NULL,5,'Jumbotron heading','jumbotron-heading',0,0,0,1,NULL,'0000-00-00 00:00:00',0,'0000-00-00 00:00:00');
/*!40000 ALTER TABLE `cnt_t_documents` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `core_config_data`
--

DROP TABLE IF EXISTS `core_config_data`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `core_config_data` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `identifier` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `value` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`identifier`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `core_config_data`
--

LOCK TABLES `core_config_data` WRITE;
/*!40000 ALTER TABLE `core_config_data` DISABLE KEYS */;
INSERT INTO `core_config_data` VALUES (1,'dashboard_widgets',''),(2,'debug_is_active','0'),(3,'cache_is_active','0'),(4,'cache_handler','filesystem'),(5,'cache_lifetime','600'),(6,'session_path',''),(7,'session_handler','0'),(8,'site_offline_document',''),(9,'site_404_layout',''),(10,'site_exception_layout',''),(11,'cookie_path','/'),(12,'unsecure_frontend_base_path',''),(13,'secure_frontend_base_path',''),(14,'unsecure_backend_base_path',''),(15,'secure_backend_base_path',''),(16,'unsecure_cdn_base_path',''),(17,'secure_cdn_base_path',''),(18,'force_backend_ssl',''),(19,'force_frontend_ssl','');
/*!40000 ALTER TABLE `core_config_data` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `core_session`
--

DROP TABLE IF EXISTS `core_session`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `core_session` (
  `id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `updated_at` int(11) NOT NULL,
  `lifetime` int(11) NOT NULL,
  `data` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `core_session`
--

LOCK TABLES `core_session` WRITE;
/*!40000 ALTER TABLE `core_session` DISABLE KEYS */;
/*!40000 ALTER TABLE `core_session` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `core_translate`
--

DROP TABLE IF EXISTS `core_translate`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `core_translate` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `source` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `core_translate`
--

LOCK TABLES `core_translate` WRITE;
/*!40000 ALTER TABLE `core_translate` DISABLE KEYS */;
/*!40000 ALTER TABLE `core_translate` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `core_translate_locale`
--

DROP TABLE IF EXISTS `core_translate_locale`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `core_translate_locale` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `destination` text COLLATE utf8_unicode_ci NOT NULL,
  `locale` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `core_translate_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_core_translate_locale_core_translate` (`core_translate_id`),
  CONSTRAINT `fk_core_translate_locale_core_translate` FOREIGN KEY (`core_translate_id`) REFERENCES `core_translate` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `core_translate_locale`
--

LOCK TABLES `core_translate_locale` WRITE;
/*!40000 ALTER TABLE `core_translate_locale` DISABLE KEYS */;
/*!40000 ALTER TABLE `core_translate_locale` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dev_t_document_types`
--

DROP TABLE IF EXISTS `dev_t_document_types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `dev_t_document_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `iconid` int(11) DEFAULT NULL,
  `defaultviewid` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `createdat` datetime NOT NULL,
  `createdby` int(11) NOT NULL,
  `modifiedat` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_document_type_view` (`defaultviewid`),
  KEY `fk_document_type_icon` (`iconid`),
  CONSTRAINT `fk_document_type_icon` FOREIGN KEY (`iconid`) REFERENCES `sys_t_icons` (`id`) ON DELETE SET NULL ON UPDATE SET NULL,
  CONSTRAINT `fk_document_type_view` FOREIGN KEY (`defaultviewid`) REFERENCES `sys_t_templates` (`id`) ON DELETE SET NULL ON UPDATE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dev_t_document_types`
--

LOCK TABLES `dev_t_document_types` WRITE;
/*!40000 ALTER TABLE `dev_t_document_types` DISABLE KEYS */;
INSERT INTO `dev_t_document_types` VALUES (1,1,1,'Some Document Type','Some Document Type Description','2017-01-23 15:21:12',1,'2017-01-23 15:21:12'),(2,NULL,NULL,'Some Name','Some Document Type Description','0000-00-00 00:00:00',0,'0000-00-00 00:00:00'),(3,NULL,NULL,'Jumbotron heading','Jumbotron heading','0000-00-00 00:00:00',0,'0000-00-00 00:00:00');
/*!40000 ALTER TABLE `dev_t_document_types` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dev_t_modules`
--

DROP TABLE IF EXISTS `dev_t_modules`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `dev_t_modules` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dev_t_modules`
--

LOCK TABLES `dev_t_modules` WRITE;
/*!40000 ALTER TABLE `dev_t_modules` DISABLE KEYS */;
/*!40000 ALTER TABLE `dev_t_modules` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dev_t_scripts`
--

DROP TABLE IF EXISTS `dev_t_scripts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `dev_t_scripts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `identifier` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `createdat` datetime NOT NULL,
  `modifiedat` datetime NOT NULL,
  `rowstatus` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`identifier`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dev_t_scripts`
--

LOCK TABLES `dev_t_scripts` WRITE;
/*!40000 ALTER TABLE `dev_t_scripts` DISABLE KEYS */;
/*!40000 ALTER TABLE `dev_t_scripts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `doc_t_properties`
--

DROP TABLE IF EXISTS `doc_t_properties`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `doc_t_properties` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tab_id` int(11) NOT NULL,
  `datatype_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `required` tinyint(1) NOT NULL DEFAULT '0',
  `identifier` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `order_in` int(11) DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`identifier`,`tab_id`),
  KEY `fk_property_datatype` (`datatype_id`),
  KEY `fk_property_tab` (`tab_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `doc_t_properties`
--

LOCK TABLES `doc_t_properties` WRITE;
/*!40000 ALTER TABLE `doc_t_properties` DISABLE KEYS */;
INSERT INTO `doc_t_properties` VALUES (1,1,1,'Name',0,'name','Name Descritpion',0),(2,1,1,'Description',0,'description','Description',0),(3,1,1,'Width',0,'width','Width Descritpion',0),(4,1,1,'Height',0,'height','Height Descritpion',0),(5,3,1,'Name',0,'name','Name',1),(6,3,2,'Description',0,'description','Description',0);
/*!40000 ALTER TABLE `doc_t_properties` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `doc_t_property_values`
--

DROP TABLE IF EXISTS `doc_t_property_values`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `doc_t_property_values` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `document_id` int(11) NOT NULL,
  `property_id` int(11) NOT NULL,
  `value` longblob,
  PRIMARY KEY (`id`),
  KEY `fk_property_value_document` (`document_id`),
  KEY `fk_property_value_property` (`property_id`),
  CONSTRAINT `fk_property_value_document` FOREIGN KEY (`document_id`) REFERENCES `cnt_t_documents` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_property_value_property` FOREIGN KEY (`property_id`) REFERENCES `doc_t_properties` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `doc_t_property_values`
--

LOCK TABLES `doc_t_property_values` WRITE;
/*!40000 ALTER TABLE `doc_t_property_values` DISABLE KEYS */;
INSERT INTO `doc_t_property_values` VALUES (1,5,1,'Hello Property Value'),(2,5,2,'Description Value'),(3,7,5,'Name Document'),(4,7,6,'Descritpion Value Value');
/*!40000 ALTER TABLE `doc_t_property_values` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `doc_t_tabs`
--

DROP TABLE IF EXISTS `doc_t_tabs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `doc_t_tabs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `document_type_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `order_in` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `doc_t_tabs`
--

LOCK TABLES `doc_t_tabs` WRITE;
/*!40000 ALTER TABLE `doc_t_tabs` DISABLE KEYS */;
INSERT INTO `doc_t_tabs` VALUES (1,1,'Some Tab 1 Add Name','Some Description 1 Add Description',0),(2,1,'Some Tab 2','Some Description 2',1),(3,3,'Main','Main',0),(4,3,'Second','Some Second Table',1);
/*!40000 ALTER TABLE `doc_t_tabs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `document_type_dependency`
--

DROP TABLE IF EXISTS `document_type_dependency`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `document_type_dependency` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) NOT NULL,
  `children_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_document_type_dependency_parent_id` (`parent_id`),
  KEY `fk_document_type_dependency_children_id` (`children_id`),
  CONSTRAINT `fk_document_type_dependency_children_id` FOREIGN KEY (`children_id`) REFERENCES `dev_t_document_types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_document_type_dependency_parent_id` FOREIGN KEY (`parent_id`) REFERENCES `dev_t_document_types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `document_type_dependency`
--

LOCK TABLES `document_type_dependency` WRITE;
/*!40000 ALTER TABLE `document_type_dependency` DISABLE KEYS */;
/*!40000 ALTER TABLE `document_type_dependency` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `document_type_view`
--

DROP TABLE IF EXISTS `document_type_view`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `document_type_view` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `view_id` int(11) NOT NULL,
  `document_type_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_document_type_views_views` (`view_id`),
  KEY `fk_document_type_view_document_type` (`document_type_id`),
  CONSTRAINT `fk_document_type_view_document_type` FOREIGN KEY (`document_type_id`) REFERENCES `dev_t_document_types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_document_type_views_views` FOREIGN KEY (`view_id`) REFERENCES `sys_t_templates` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `document_type_view`
--

LOCK TABLES `document_type_view` WRITE;
/*!40000 ALTER TABLE `document_type_view` DISABLE KEYS */;
/*!40000 ALTER TABLE `document_type_view` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `log_url`
--

DROP TABLE IF EXISTS `log_url`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `log_url` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `visit_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `log_url_info_id` bigint(20) unsigned DEFAULT NULL,
  `log_visitor_id` bigint(20) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_log_url_log_visitor` (`log_visitor_id`),
  KEY `fk_log_url_log_url_info` (`log_url_info_id`),
  CONSTRAINT `fk_log_url_log_url_info` FOREIGN KEY (`log_url_info_id`) REFERENCES `log_url_info` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_log_url_log_visitor` FOREIGN KEY (`log_visitor_id`) REFERENCES `log_visitor` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `log_url`
--

LOCK TABLES `log_url` WRITE;
/*!40000 ALTER TABLE `log_url` DISABLE KEYS */;
/*!40000 ALTER TABLE `log_url` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `log_url_info`
--

DROP TABLE IF EXISTS `log_url_info`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `log_url_info` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `url` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `referer` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `log_url_info`
--

LOCK TABLES `log_url_info` WRITE;
/*!40000 ALTER TABLE `log_url_info` DISABLE KEYS */;
/*!40000 ALTER TABLE `log_url_info` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `log_visitor`
--

DROP TABLE IF EXISTS `log_visitor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `log_visitor` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `session_id` char(64) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `http_user_agent` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `http_accept_CHARset` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `http_accept_language` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `server_addr` bigint(20) DEFAULT NULL,
  `remote_addr` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `log_visitor`
--

LOCK TABLES `log_visitor` WRITE;
/*!40000 ALTER TABLE `log_visitor` DISABLE KEYS */;
/*!40000 ALTER TABLE `log_visitor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sys_t_datatypes`
--

DROP TABLE IF EXISTS `sys_t_datatypes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sys_t_datatypes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `form_element` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `createdat` datetime NOT NULL,
  `modifiedat` datetime NOT NULL,
  `rowstatus` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sys_t_datatypes`
--

LOCK TABLES `sys_t_datatypes` WRITE;
/*!40000 ALTER TABLE `sys_t_datatypes` DISABLE KEYS */;
INSERT INTO `sys_t_datatypes` VALUES (1,'Текстовое поле','','Zend\\Form\\Element\\Text','2017-01-23 13:01:38','2017-01-23 13:01:38',1),(2,'Text Area',NULL,'Zend\\Form\\Element\\Textarea','2017-01-23 13:01:38','2017-01-23 13:01:38',1);
/*!40000 ALTER TABLE `sys_t_datatypes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sys_t_icons`
--

DROP TABLE IF EXISTS `sys_t_icons`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sys_t_icons` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sys_t_icons`
--

LOCK TABLES `sys_t_icons` WRITE;
/*!40000 ALTER TABLE `sys_t_icons` DISABLE KEYS */;
INSERT INTO `sys_t_icons` VALUES (1,'Home','/media/icons/home.png'),(2,'Camera','/media/icons/camera.png'),(3,'Box','/media/icons/box.png'),(4,'Calendar','/media/icons/calendar.png'),(5,'Configuration','/media/icons/configuration.png'),(6,'File','/media/icons/file.gif'),(7,'Film','/media/icons/film.png'),(8,'Folder','/media/icons/folder.gif'),(9,'Folder closed','/media/icons/folder-closed.gif'),(10,'Image','/media/icons/image.png'),(11,'Letter blue','/media/icons/letter-blue.png'),(12,'Letter red','/media/icons/letter-red.png'),(13,'Pen green','/media/icons/pen-green.png'),(14,'Pen yellow','/media/icons/pen-yellow.png'),(15,'Printer','/media/icons/printer.png'),(16,'Rss','/media/icons/rss.png'),(17,'Save','/media/icons/save-black.png'),(18,'Save blue','/media/icons/save-blue.png'),(19,'Shell','/media/icons/shell.png'),(20,'Tool','/media/icons/tool.png'),(21,'Trash','/media/icons/trash.png'),(22,'Trash empty','/media/icons/trash-empty.png'),(23,'TV','/media/icons/tv.png'),(24,'Write','/media/icons/write.png');
/*!40000 ALTER TABLE `sys_t_icons` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sys_t_templates`
--

DROP TABLE IF EXISTS `sys_t_templates`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sys_t_templates` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` enum('LAYOUT','VIEW') COLLATE utf8_unicode_ci NOT NULL,
  `identifier` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `code` text COLLATE utf8_unicode_ci NOT NULL,
  `createdat` datetime NOT NULL,
  `modifiedat` datetime NOT NULL,
  `rowstatus` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`identifier`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sys_t_templates`
--

LOCK TABLES `sys_t_templates` WRITE;
/*!40000 ALTER TABLE `sys_t_templates` DISABLE KEYS */;
INSERT INTO `sys_t_templates` VALUES (1,'VIEW','index','Index View','Some Description Or View Conten','','0000-00-00 00:00:00','0000-00-00 00:00:00',1),(2,'VIEW','blog-item','Blog Item Template','Some Description','','0000-00-00 00:00:00','0000-00-00 00:00:00',1),(3,'VIEW','main','Blog Main Page','Some Description','','0000-00-00 00:00:00','0000-00-00 00:00:00',1),(4,'LAYOUT','main-layout','Blog Main Layout','Blog Main Layout','','0000-00-00 00:00:00','0000-00-00 00:00:00',1),(5,'VIEW','view-example-jumbotron-heading','Jumbotron heading','Jumbotron heading Description','gggggg','0000-00-00 00:00:00','0000-00-00 00:00:00',1),(6,'VIEW','dddqqqqqqq','qqqqqqqqqq','qqqqqqq','<?php $a = \"Hello World\";','0000-00-00 00:00:00','0000-00-00 00:00:00',1);
/*!40000 ALTER TABLE `sys_t_templates` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'kubnete.dev'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-08-15 17:19:30
