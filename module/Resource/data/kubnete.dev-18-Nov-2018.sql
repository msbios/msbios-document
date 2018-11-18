-- MySQL dump 10.13  Distrib 5.6.35, for osx10.9 (x86_64)
--
-- Host: localhost    Database: kubnete.dev
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
-- Dumping data for table `acl_t_permissions`
--

LOCK TABLES `acl_t_permissions` WRITE;
/*!40000 ALTER TABLE `acl_t_permissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `acl_t_permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `acl_t_resources`
--

LOCK TABLES `acl_t_resources` WRITE;
/*!40000 ALTER TABLE `acl_t_resources` DISABLE KEYS */;
/*!40000 ALTER TABLE `acl_t_resources` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `acl_t_roles`
--

LOCK TABLES `acl_t_roles` WRITE;
/*!40000 ALTER TABLE `acl_t_roles` DISABLE KEYS */;
INSERT INTO `acl_t_roles` VALUES (1,NULL,'GUEST','Guest','0000-00-00 00:00:00','0000-00-00 00:00:00',0),(2,1,'USER','User','0000-00-00 00:00:00','0000-00-00 00:00:00',0),(3,2,'MODERATOR','Moderator','0000-00-00 00:00:00','0000-00-00 00:00:00',0),(4,3,'ADMIN','Admin','0000-00-00 00:00:00','0000-00-00 00:00:00',0),(5,4,'SUPERADMIN','Super Admin','0000-00-00 00:00:00','0000-00-00 00:00:00',0),(6,5,'DEVELOPER','Developer','0000-00-00 00:00:00','0000-00-00 00:00:00',0);
/*!40000 ALTER TABLE `acl_t_roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `acl_t_rules`
--

LOCK TABLES `acl_t_rules` WRITE;
/*!40000 ALTER TABLE `acl_t_rules` DISABLE KEYS */;
/*!40000 ALTER TABLE `acl_t_rules` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `acl_t_rules_permissions`
--

LOCK TABLES `acl_t_rules_permissions` WRITE;
/*!40000 ALTER TABLE `acl_t_rules_permissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `acl_t_rules_permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `acl_t_rules_roles`
--

LOCK TABLES `acl_t_rules_roles` WRITE;
/*!40000 ALTER TABLE `acl_t_rules_roles` DISABLE KEYS */;
/*!40000 ALTER TABLE `acl_t_rules_roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `acl_t_users`
--

LOCK TABLES `acl_t_users` WRITE;
/*!40000 ALTER TABLE `acl_t_users` DISABLE KEYS */;
INSERT INTO `acl_t_users` VALUES (1,'info@msbios.com','$2a$04$ZuCmGpgh6i1gMia/U1yb7uYnRA2p6Niy5jA9Wy9m0G25UG86P67ja','developer','Judzhin','Miles','ACTIVE',NULL,'1','0000-00-00 00:00:00','0000-00-00 00:00:00',0);
/*!40000 ALTER TABLE `acl_t_users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `acl_t_users_roles`
--

LOCK TABLES `acl_t_users_roles` WRITE;
/*!40000 ALTER TABLE `acl_t_users_roles` DISABLE KEYS */;
INSERT INTO `acl_t_users_roles` VALUES (1,6);
/*!40000 ALTER TABLE `acl_t_users_roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `cnt_t_documents`
--

LOCK TABLES `cnt_t_documents` WRITE;
/*!40000 ALTER TABLE `cnt_t_documents` DISABLE KEYS */;
INSERT INTO `cnt_t_documents` VALUES (1,5,1,NULL,NULL,'Blog','blogs',0,0,0,1,NULL,'0000-00-00 00:00:00',1,'0000-00-00 00:00:00'),(2,1,1,NULL,NULL,'Item','item-2',0,0,0,1,NULL,'0000-00-00 00:00:00',1,'0000-00-00 00:00:00'),(5,NULL,1,4,1,'Home page','',0,0,0,1,NULL,'0000-00-00 00:00:00',1,'0000-00-00 00:00:00'),(6,NULL,1,NULL,NULL,'Some Name','some-uri',0,0,0,1,NULL,'0000-00-00 00:00:00',0,'0000-00-00 00:00:00'),(7,NULL,3,NULL,NULL,'Jumbotron heading','jumbotron-heading',0,0,0,1,NULL,'0000-00-00 00:00:00',0,'0000-00-00 00:00:00');
/*!40000 ALTER TABLE `cnt_t_documents` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `core_session`
--

LOCK TABLES `core_session` WRITE;
/*!40000 ALTER TABLE `core_session` DISABLE KEYS */;
/*!40000 ALTER TABLE `core_session` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `core_translate`
--

LOCK TABLES `core_translate` WRITE;
/*!40000 ALTER TABLE `core_translate` DISABLE KEYS */;
/*!40000 ALTER TABLE `core_translate` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `core_translate_locale`
--

LOCK TABLES `core_translate_locale` WRITE;
/*!40000 ALTER TABLE `core_translate_locale` DISABLE KEYS */;
/*!40000 ALTER TABLE `core_translate_locale` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `dev_t_document_type_views`
--

LOCK TABLES `dev_t_document_type_views` WRITE;
/*!40000 ALTER TABLE `dev_t_document_type_views` DISABLE KEYS */;
/*!40000 ALTER TABLE `dev_t_document_type_views` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `dev_t_document_types`
--

LOCK TABLES `dev_t_document_types` WRITE;
/*!40000 ALTER TABLE `dev_t_document_types` DISABLE KEYS */;
INSERT INTO `dev_t_document_types` VALUES (1,1,1,'Some Document Type','Some Document Type Description','2017-01-23 15:21:12',1,'2017-01-23 15:21:12'),(2,NULL,NULL,'Some Name','Some Document Type Description','0000-00-00 00:00:00',0,'0000-00-00 00:00:00'),(3,NULL,NULL,'Jumbotron heading','Jumbotron heading','0000-00-00 00:00:00',0,'0000-00-00 00:00:00');
/*!40000 ALTER TABLE `dev_t_document_types` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `dev_t_modules`
--

LOCK TABLES `dev_t_modules` WRITE;
/*!40000 ALTER TABLE `dev_t_modules` DISABLE KEYS */;
/*!40000 ALTER TABLE `dev_t_modules` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `dev_t_scripts`
--

LOCK TABLES `dev_t_scripts` WRITE;
/*!40000 ALTER TABLE `dev_t_scripts` DISABLE KEYS */;
/*!40000 ALTER TABLE `dev_t_scripts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `doc_t_properties`
--

LOCK TABLES `doc_t_properties` WRITE;
/*!40000 ALTER TABLE `doc_t_properties` DISABLE KEYS */;
INSERT INTO `doc_t_properties` VALUES (1,1,1,'Name',0,'name','Name Descritpion',0),(2,1,1,'Description',0,'description','Description',0),(3,1,1,'Width',0,'width','Width Descritpion',0),(4,1,1,'Height',0,'height','Height Descritpion',0),(5,3,1,'Name',0,'name','Name',1),(6,3,2,'Description',0,'description','Description',0);
/*!40000 ALTER TABLE `doc_t_properties` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `doc_t_property_values`
--

LOCK TABLES `doc_t_property_values` WRITE;
/*!40000 ALTER TABLE `doc_t_property_values` DISABLE KEYS */;
INSERT INTO `doc_t_property_values` VALUES (1,5,1,'Hello Property Value'),(2,5,2,'Description Value'),(3,7,5,'Name Document'),(4,7,6,'Descritpion Value Value');
/*!40000 ALTER TABLE `doc_t_property_values` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `doc_t_tabs`
--

LOCK TABLES `doc_t_tabs` WRITE;
/*!40000 ALTER TABLE `doc_t_tabs` DISABLE KEYS */;
INSERT INTO `doc_t_tabs` VALUES (1,1,'Some Tab 1 Add Name','Some Description 1 Add Description',0),(2,1,'Some Tab 2','Some Description 2',1),(3,3,'Main','Main',0),(4,3,'Second','Some Second Table',1);
/*!40000 ALTER TABLE `doc_t_tabs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `doc_t_type_dependencies`
--

LOCK TABLES `doc_t_type_dependencies` WRITE;
/*!40000 ALTER TABLE `doc_t_type_dependencies` DISABLE KEYS */;
/*!40000 ALTER TABLE `doc_t_type_dependencies` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `log_t_url_informations`
--

LOCK TABLES `log_t_url_informations` WRITE;
/*!40000 ALTER TABLE `log_t_url_informations` DISABLE KEYS */;
/*!40000 ALTER TABLE `log_t_url_informations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `log_t_urls`
--

LOCK TABLES `log_t_urls` WRITE;
/*!40000 ALTER TABLE `log_t_urls` DISABLE KEYS */;
/*!40000 ALTER TABLE `log_t_urls` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `log_t_visitors`
--

LOCK TABLES `log_t_visitors` WRITE;
/*!40000 ALTER TABLE `log_t_visitors` DISABLE KEYS */;
/*!40000 ALTER TABLE `log_t_visitors` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `sys_t_configurations`
--

LOCK TABLES `sys_t_configurations` WRITE;
/*!40000 ALTER TABLE `sys_t_configurations` DISABLE KEYS */;
INSERT INTO `sys_t_configurations` VALUES (1,'dashboard_widgets',''),(2,'debug_is_active','0'),(3,'cache_is_active','0'),(4,'cache_handler','filesystem'),(5,'cache_lifetime','600'),(6,'session_path',''),(7,'session_handler','0'),(8,'site_offline_document',''),(9,'site_404_layout',''),(10,'site_exception_layout',''),(11,'cookie_path','/'),(12,'unsecure_frontend_base_path',''),(13,'secure_frontend_base_path',''),(14,'unsecure_backend_base_path',''),(15,'secure_backend_base_path',''),(16,'unsecure_cdn_base_path',''),(17,'secure_cdn_base_path',''),(18,'force_backend_ssl',''),(19,'force_frontend_ssl','');
/*!40000 ALTER TABLE `sys_t_configurations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `sys_t_datatypes`
--

LOCK TABLES `sys_t_datatypes` WRITE;
/*!40000 ALTER TABLE `sys_t_datatypes` DISABLE KEYS */;
INSERT INTO `sys_t_datatypes` VALUES (1,'Текстовое поле','Описание поле','Zend\\Form\\Element\\Text','2017-01-23 13:01:38','2017-01-23 13:01:38',1),(2,'Text Area','Описание поле','Zend\\Form\\Element\\Textarea','2017-01-23 13:01:38','2017-01-23 13:01:38',1);
/*!40000 ALTER TABLE `sys_t_datatypes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `sys_t_icons`
--

LOCK TABLES `sys_t_icons` WRITE;
/*!40000 ALTER TABLE `sys_t_icons` DISABLE KEYS */;
INSERT INTO `sys_t_icons` VALUES (1,'Home','/media/icons/home.png'),(2,'Camera','/media/icons/camera.png'),(3,'Box','/media/icons/box.png'),(4,'Calendar','/media/icons/calendar.png'),(5,'Configuration','/media/icons/configuration.png'),(6,'File','/media/icons/file.gif'),(7,'Film','/media/icons/film.png'),(8,'Folder','/media/icons/folder.gif'),(9,'Folder closed','/media/icons/folder-closed.gif'),(10,'Image','/media/icons/image.png'),(11,'Letter blue','/media/icons/letter-blue.png'),(12,'Letter red','/media/icons/letter-red.png'),(13,'Pen green','/media/icons/pen-green.png'),(14,'Pen yellow','/media/icons/pen-yellow.png'),(15,'Printer','/media/icons/printer.png'),(16,'Rss','/media/icons/rss.png'),(17,'Save','/media/icons/save-black.png'),(18,'Save blue','/media/icons/save-blue.png'),(19,'Shell','/media/icons/shell.png'),(20,'Tool','/media/icons/tool.png'),(21,'Trash','/media/icons/trash.png'),(22,'Trash empty','/media/icons/trash-empty.png'),(23,'TV','/media/icons/tv.png'),(24,'Write','/media/icons/write.png');
/*!40000 ALTER TABLE `sys_t_icons` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `sys_t_layouts`
--

LOCK TABLES `sys_t_layouts` WRITE;
/*!40000 ALTER TABLE `sys_t_layouts` DISABLE KEYS */;
/*!40000 ALTER TABLE `sys_t_layouts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `sys_t_modules`
--

LOCK TABLES `sys_t_modules` WRITE;
/*!40000 ALTER TABLE `sys_t_modules` DISABLE KEYS */;
/*!40000 ALTER TABLE `sys_t_modules` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `sys_t_templates`
--

LOCK TABLES `sys_t_templates` WRITE;
/*!40000 ALTER TABLE `sys_t_templates` DISABLE KEYS */;
INSERT INTO `sys_t_templates` VALUES (1,'VIEW','index-view','Index View','Some Description Or View Conten','<div class=\"row\">\r\n\r\n        <div class=\"col-sm-8 blog-main\">\r\n\r\n          <div class=\"blog-post\">\r\n            <h2 class=\"blog-post-title\">Sample blog post</h2>\r\n            <p class=\"blog-post-meta\">January 1, 2014 by <a href=\"#\">Mark</a></p>\r\n\r\n            <p>This blog post shows a few different types of content that\'s supported and styled with Bootstrap. Basic typography, images, and code are all supported.</p>\r\n            <hr>\r\n            <p>Cum sociis natoque penatibus et magnis <a href=\"#\">dis parturient montes</a>, nascetur ridiculus mus. Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum. Sed posuere consectetur est at lobortis. Cras mattis consectetur purus sit amet fermentum.</p>\r\n            <blockquote>\r\n              <p>Curabitur blandit tempus porttitor. <strong>Nullam quis risus eget urna mollis</strong> ornare vel eu leo. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>\r\n            </blockquote>\r\n            <p>Etiam porta <em>sem malesuada magna</em> mollis euismod. Cras mattis consectetur purus sit amet fermentum. Aenean lacinia bibendum nulla sed consectetur.</p>\r\n            <h2>Heading</h2>\r\n            <p>Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Morbi leo risus, porta ac consectetur ac, vestibulum at eros.</p>\r\n            <h3>Sub-heading</h3>\r\n            <p>Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>\r\n            <pre><code>Example code block</code></pre>\r\n            <p>Aenean lacinia bibendum nulla sed consectetur. Etiam porta sem malesuada magna mollis euismod. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa.</p>\r\n            <h3>Sub-heading</h3>\r\n            <p>Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Aenean lacinia bibendum nulla sed consectetur. Etiam porta sem malesuada magna mollis euismod. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>\r\n            <ul>\r\n              <li>Praesent commodo cursus magna, vel scelerisque nisl consectetur et.</li>\r\n              <li>Donec id elit non mi porta gravida at eget metus.</li>\r\n              <li>Nulla vitae elit libero, a pharetra augue.</li>\r\n            </ul>\r\n            <p>Donec ullamcorper nulla non metus auctor fringilla. Nulla vitae elit libero, a pharetra augue.</p>\r\n            <ol>\r\n              <li>Vestibulum id ligula porta felis euismod semper.</li>\r\n              <li>Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</li>\r\n              <li>Maecenas sed diam eget risus varius blandit sit amet non magna.</li>\r\n            </ol>\r\n            <p>Cras mattis consectetur purus sit amet fermentum. Sed posuere consectetur est at lobortis.</p>\r\n          </div><!-- /.blog-post -->\r\n\r\n          <div class=\"blog-post\">\r\n            <h2 class=\"blog-post-title\">Another blog post</h2>\r\n            <p class=\"blog-post-meta\">December 23, 2013 by <a href=\"#\">Jacob</a></p>\r\n\r\n            <p>Cum sociis natoque penatibus et magnis <a href=\"#\">dis parturient montes</a>, nascetur ridiculus mus. Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum. Sed posuere consectetur est at lobortis. Cras mattis consectetur purus sit amet fermentum.</p>\r\n            <blockquote>\r\n              <p>Curabitur blandit tempus porttitor. <strong>Nullam quis risus eget urna mollis</strong> ornare vel eu leo. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>\r\n            </blockquote>\r\n            <p>Etiam porta <em>sem malesuada magna</em> mollis euismod. Cras mattis consectetur purus sit amet fermentum. Aenean lacinia bibendum nulla sed consectetur.</p>\r\n            <p>Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Morbi leo risus, porta ac consectetur ac, vestibulum at eros.</p>\r\n          </div><!-- /.blog-post -->\r\n\r\n          <div class=\"blog-post\">\r\n            <h2 class=\"blog-post-title\">New feature</h2>\r\n            <p class=\"blog-post-meta\">December 14, 2013 by <a href=\"#\">Chris</a></p>\r\n\r\n            <p>Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Aenean lacinia bibendum nulla sed consectetur. Etiam porta sem malesuada magna mollis euismod. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>\r\n            <ul>\r\n              <li>Praesent commodo cursus magna, vel scelerisque nisl consectetur et.</li>\r\n              <li>Donec id elit non mi porta gravida at eget metus.</li>\r\n              <li>Nulla vitae elit libero, a pharetra augue.</li>\r\n            </ul>\r\n            <p>Etiam porta <em>sem malesuada magna</em> mollis euismod. Cras mattis consectetur purus sit amet fermentum. Aenean lacinia bibendum nulla sed consectetur.</p>\r\n            <p>Donec ullamcorper nulla non metus auctor fringilla. Nulla vitae elit libero, a pharetra augue.</p>\r\n          </div><!-- /.blog-post -->\r\n\r\n          <nav>\r\n            <ul class=\"pager\">\r\n              <li><a href=\"#\">Previous</a></li>\r\n              <li><a href=\"#\">Next</a></li>\r\n            </ul>\r\n          </nav>\r\n\r\n        </div><!-- /.blog-main -->\r\n\r\n        <div class=\"col-sm-3 col-sm-offset-1 blog-sidebar\">\r\n          <div class=\"sidebar-module sidebar-module-inset\">\r\n            <h4>About</h4>\r\n            <p>Etiam porta <em>sem malesuada magna</em> mollis euismod. Cras mattis consectetur purus sit amet fermentum. Aenean lacinia bibendum nulla sed consectetur.</p>\r\n          </div>\r\n          <div class=\"sidebar-module\">\r\n            <h4>Archives</h4>\r\n            <ol class=\"list-unstyled\">\r\n              <li><a href=\"#\">March 2014</a></li>\r\n              <li><a href=\"#\">February 2014</a></li>\r\n              <li><a href=\"#\">January 2014</a></li>\r\n              <li><a href=\"#\">December 2013</a></li>\r\n              <li><a href=\"#\">November 2013</a></li>\r\n              <li><a href=\"#\">October 2013</a></li>\r\n              <li><a href=\"#\">September 2013</a></li>\r\n              <li><a href=\"#\">August 2013</a></li>\r\n              <li><a href=\"#\">July 2013</a></li>\r\n              <li><a href=\"#\">June 2013</a></li>\r\n              <li><a href=\"#\">May 2013</a></li>\r\n              <li><a href=\"#\">April 2013</a></li>\r\n            </ol>\r\n          </div>\r\n          <div class=\"sidebar-module\">\r\n            <h4>Elsewhere</h4>\r\n            <ol class=\"list-unstyled\">\r\n              <li><a href=\"#\">GitHub</a></li>\r\n              <li><a href=\"#\">Twitter</a></li>\r\n              <li><a href=\"#\">Facebook</a></li>\r\n            </ol>\r\n          </div>\r\n        </div><!-- /.blog-sidebar -->\r\n\r\n      </div>','0000-00-00 00:00:00','0000-00-00 00:00:00',1),(2,'VIEW','blog-item','Blog Item Template','Some Description','','0000-00-00 00:00:00','0000-00-00 00:00:00',1),(3,'VIEW','main','Blog Main Page','Some Description','','0000-00-00 00:00:00','0000-00-00 00:00:00',1),(4,'LAYOUT','main-layout','Blog Main Layout','Blog Main Layout','<?= $this->doctype() ?>\r\n\r\n<html lang=\"en\">\r\n<head>\r\n    <meta charset=\"utf-8\">\r\n    <?= $this->headTitle(\'ZF Skeleton Application\')->setSeparator(\' - \')->setAutoEscape(false) ?>\r\n\r\n    <?= $this->headMeta()\r\n        ->appendName(\'viewport\', \'width=device-width, initial-scale=1.0\')\r\n        ->appendHttpEquiv(\'X-UA-Compatible\', \'IE=edge\')\r\n    ?>\r\n\r\n    <!-- Le styles -->\r\n    <?= $this->headLink([\'rel\' => \'shortcut icon\', \'type\' => \'image/vnd.microsoft.icon\', \'href\' => $this->basePath() . \'/img/favicon.ico\'])\r\n        ->prependStylesheet($this->basePath(\'default/css/style.css\'))\r\n        ->prependStylesheet($this->basePath(\'default/css/bootstrap-theme.min.css\'))\r\n        ->prependStylesheet($this->basePath(\'default/css/bootstrap.min.css\'))\r\n    ?>\r\n\r\n    <!-- Scripts -->\r\n    <?= $this->headScript()\r\n        ->prependFile($this->basePath(\'default/js/bootstrap.min.js\'))\r\n        ->prependFile($this->basePath(\'default/js/jquery-3.1.0.min.js\'))\r\n    ?>\r\n</head>\r\n<body>\r\n<nav class=\"navbar navbar-inverse navbar-fixed-top\" role=\"navigation\">\r\n    <div class=\"container\">\r\n        <div class=\"navbar-header\">\r\n            <button type=\"button\" class=\"navbar-toggle\" data-toggle=\"collapse\" data-target=\".navbar-collapse\">\r\n                <span class=\"icon-bar\"></span>\r\n                <span class=\"icon-bar\"></span>\r\n                <span class=\"icon-bar\"></span>\r\n            </button>\r\n            <a class=\"navbar-brand\" href=\"<?= $this->url(\'home\') ?>\">\r\n                <img src=\"<?= $this->basePath(\'default/img/zf-logo-mark.svg\') ?>\" height=\"28\"/>\r\n                MSBios Document\r\n            </a>\r\n        </div>\r\n        <div class=\"collapse navbar-collapse\"></div>\r\n    </div>\r\n</nav>\r\n<div class=\"container\">\r\n    <?= $this->content ?>\r\n    <hr>\r\n    <footer>\r\n        <p>&copy; 2005 - <?= date(\'Y\') ?> by Zend Technologies Ltd. All rights reserved. MSBios\r\n            version <?= \\MSBios\\Module::VERSION; ?></p>\r\n    </footer>\r\n</div>\r\n<?= $this->inlineScript() ?>\r\n</body>\r\n</html>','0000-00-00 00:00:00','0000-00-00 00:00:00',1),(5,'VIEW','view-example-jumbotron-heading','Jumbotron heading','Jumbotron heading Description','dddd','0000-00-00 00:00:00','0000-00-00 00:00:00',1);
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

-- Dump completed on 2018-11-18 22:15:11
