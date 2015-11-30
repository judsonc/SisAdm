-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 30-Nov-2015 às 06:11
-- Versão do servidor: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db-teste`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `oc_activity`
--

CREATE TABLE IF NOT EXISTS `oc_activity` (
  `activity_id` int(11) NOT NULL AUTO_INCREMENT,
  `timestamp` int(11) NOT NULL DEFAULT '0',
  `priority` int(11) NOT NULL DEFAULT '0',
  `type` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `user` varchar(64) COLLATE utf8_bin DEFAULT NULL,
  `affecteduser` varchar(64) COLLATE utf8_bin NOT NULL,
  `app` varchar(255) COLLATE utf8_bin NOT NULL,
  `subject` varchar(255) COLLATE utf8_bin NOT NULL,
  `subjectparams` varchar(4000) COLLATE utf8_bin NOT NULL,
  `message` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `messageparams` varchar(4000) COLLATE utf8_bin DEFAULT NULL,
  `file` varchar(4000) COLLATE utf8_bin DEFAULT NULL,
  `link` varchar(4000) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`activity_id`),
  KEY `activity_user_time` (`affecteduser`,`timestamp`),
  KEY `activity_filter_by` (`affecteduser`,`user`,`timestamp`),
  KEY `activity_filter_app` (`affecteduser`,`app`,`timestamp`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=24 ;

--
-- Extraindo dados da tabela `oc_activity`
--

INSERT INTO `oc_activity` (`activity_id`, `timestamp`, `priority`, `type`, `user`, `affecteduser`, `app`, `subject`, `subjectparams`, `message`, `messageparams`, `file`, `link`) VALUES
(1, 1444061627, 40, 'file_created', 'angular', 'angular', 'files', 'created_self', '["\\/manual.txt"]', '', '[]', '/manual.txt', 'http://angulartopografia.com.br/owncloud/index.php/apps/files?dir=%2F'),
(2, 1444061632, 40, 'file_changed', 'angular', 'angular', 'files', 'changed_self', '["\\/manual.txt"]', '', '[]', '/manual.txt', 'http://angulartopografia.com.br/owncloud/index.php/apps/files?dir=%2F'),
(3, 1444061752, 40, 'file_deleted', 'angular', 'angular', 'files', 'deleted_self', '["\\/ownCloudUserManual.pdf"]', '', '[]', '/ownCloudUserManual.pdf', 'http://angulartopografia.com.br/owncloud/index.php/apps/files?dir=%2F'),
(4, 1444061754, 40, 'file_deleted', 'angular', 'angular', 'files', 'deleted_self', '["\\/Photos"]', '', '[]', '/Photos', 'http://angulartopografia.com.br/owncloud/index.php/apps/files?dir=%2F'),
(5, 1444089003, 40, 'file_created', 'teste', 'teste', 'files', 'created_self', '[false]', '', '[]', '', 'http://www.angulartopografia.com.br/owncloud/index.php/apps/files?dir='),
(6, 1444089003, 40, 'file_created', 'teste', 'teste', 'files', 'created_self', '["\\/Documents"]', '', '[]', '/Documents', 'http://www.angulartopografia.com.br/owncloud/index.php/apps/files?dir=%2F'),
(7, 1444089004, 40, 'file_created', 'teste', 'teste', 'files', 'created_self', '["\\/Documents\\/Example.odt"]', '', '[]', '/Documents/Example.odt', 'http://www.angulartopografia.com.br/owncloud/index.php/apps/files?dir=%2FDocuments'),
(8, 1444089004, 40, 'file_created', 'teste', 'teste', 'files', 'created_self', '["\\/Photos"]', '', '[]', '/Photos', 'http://www.angulartopografia.com.br/owncloud/index.php/apps/files?dir=%2F'),
(9, 1444089004, 40, 'file_created', 'teste', 'teste', 'files', 'created_self', '["\\/Photos\\/San Francisco.jpg"]', '', '[]', '/Photos/San Francisco.jpg', 'http://www.angulartopografia.com.br/owncloud/index.php/apps/files?dir=%2FPhotos'),
(10, 1444089004, 40, 'file_created', 'teste', 'teste', 'files', 'created_self', '["\\/Photos\\/Paris.jpg"]', '', '[]', '/Photos/Paris.jpg', 'http://www.angulartopografia.com.br/owncloud/index.php/apps/files?dir=%2FPhotos'),
(11, 1444089004, 40, 'file_created', 'teste', 'teste', 'files', 'created_self', '["\\/Photos\\/Squirrel.jpg"]', '', '[]', '/Photos/Squirrel.jpg', 'http://www.angulartopografia.com.br/owncloud/index.php/apps/files?dir=%2FPhotos'),
(12, 1444089004, 40, 'file_created', 'teste', 'teste', 'files', 'created_self', '["\\/ownCloudUserManual.pdf"]', '', '[]', '/ownCloudUserManual.pdf', 'http://www.angulartopografia.com.br/owncloud/index.php/apps/files?dir=%2F'),
(13, 1444867155, 40, 'file_created', 'teste', 'teste', 'files', 'created_self', '["\\/_Through My Eyes_.mp3"]', '', '[]', '/_Through My Eyes_.mp3', 'http://angulartopografia.com.br/owncloud/index.php/apps/files?dir=%2F'),
(14, 1446132060, 40, 'file_created', 'eject', 'eject', 'files', 'created_self', '[false]', '', '[]', '', 'http://www.angulartopografia.com.br/owncloud/index.php/apps/files?dir='),
(15, 1446132060, 40, 'file_created', 'eject', 'eject', 'files', 'created_self', '["\\/Documents"]', '', '[]', '/Documents', 'http://www.angulartopografia.com.br/owncloud/index.php/apps/files?dir=%2F'),
(16, 1446132060, 40, 'file_created', 'eject', 'eject', 'files', 'created_self', '["\\/Documents\\/Example.odt"]', '', '[]', '/Documents/Example.odt', 'http://www.angulartopografia.com.br/owncloud/index.php/apps/files?dir=%2FDocuments'),
(17, 1446132060, 40, 'file_created', 'eject', 'eject', 'files', 'created_self', '["\\/Photos"]', '', '[]', '/Photos', 'http://www.angulartopografia.com.br/owncloud/index.php/apps/files?dir=%2F'),
(18, 1446132060, 40, 'file_created', 'eject', 'eject', 'files', 'created_self', '["\\/Photos\\/San Francisco.jpg"]', '', '[]', '/Photos/San Francisco.jpg', 'http://www.angulartopografia.com.br/owncloud/index.php/apps/files?dir=%2FPhotos'),
(19, 1446132060, 40, 'file_created', 'eject', 'eject', 'files', 'created_self', '["\\/Photos\\/Paris.jpg"]', '', '[]', '/Photos/Paris.jpg', 'http://www.angulartopografia.com.br/owncloud/index.php/apps/files?dir=%2FPhotos'),
(20, 1446132060, 40, 'file_created', 'eject', 'eject', 'files', 'created_self', '["\\/Photos\\/Squirrel.jpg"]', '', '[]', '/Photos/Squirrel.jpg', 'http://www.angulartopografia.com.br/owncloud/index.php/apps/files?dir=%2FPhotos'),
(21, 1446132061, 40, 'file_created', 'eject', 'eject', 'files', 'created_self', '["\\/ownCloudUserManual.pdf"]', '', '[]', '/ownCloudUserManual.pdf', 'http://www.angulartopografia.com.br/owncloud/index.php/apps/files?dir=%2F'),
(22, 1446132591, 30, 'shared', 'eject', 'eject', 'files_sharing', 'shared_user_self', '["\\/ownCloudUserManual.pdf","angular"]', '', '[]', '/ownCloudUserManual.pdf', 'http://www.angulartopografia.com.br/owncloud/index.php/apps/files?dir=%2F'),
(23, 1446132591, 30, 'shared', 'eject', 'angular', 'files_sharing', 'shared_with_by', '["\\/ownCloudUserManual.pdf","eject"]', '', '[]', '/ownCloudUserManual.pdf', 'http://www.angulartopografia.com.br/owncloud/index.php/apps/files?dir=%2F');

-- --------------------------------------------------------

--
-- Estrutura da tabela `oc_activity_mq`
--

CREATE TABLE IF NOT EXISTS `oc_activity_mq` (
  `mail_id` int(11) NOT NULL AUTO_INCREMENT,
  `amq_timestamp` int(11) NOT NULL DEFAULT '0',
  `amq_latest_send` int(11) NOT NULL DEFAULT '0',
  `amq_type` varchar(255) COLLATE utf8_bin NOT NULL,
  `amq_affecteduser` varchar(64) COLLATE utf8_bin NOT NULL,
  `amq_appid` varchar(255) COLLATE utf8_bin NOT NULL,
  `amq_subject` varchar(255) COLLATE utf8_bin NOT NULL,
  `amq_subjectparams` varchar(4000) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`mail_id`),
  KEY `amp_user` (`amq_affecteduser`),
  KEY `amp_latest_send_time` (`amq_latest_send`),
  KEY `amp_timestamp_time` (`amq_timestamp`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `oc_appconfig`
--

CREATE TABLE IF NOT EXISTS `oc_appconfig` (
  `appid` varchar(32) COLLATE utf8_bin NOT NULL DEFAULT '',
  `configkey` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `configvalue` longtext COLLATE utf8_bin,
  PRIMARY KEY (`appid`,`configkey`),
  KEY `appconfig_config_key_index` (`configkey`),
  KEY `appconfig_appid_key` (`appid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `oc_appconfig`
--

INSERT INTO `oc_appconfig` (`appid`, `configkey`, `configvalue`) VALUES
('activity', 'enabled', 'yes'),
('activity', 'installed_version', '2.0.2'),
('activity', 'types', 'filesystem'),
('backgroundjob', 'lastjob', '1'),
('core', 'installedat', '1444061259.97'),
('core', 'lastcron', '1447556312'),
('core', 'lastupdateResult', '{"version":{},"versionstring":{},"url":{},"web":{}}'),
('core', 'lastupdatedat', '1447241308'),
('core', 'public_files', 'files_sharing/public.php'),
('core', 'public_gallery', 'gallery/public.php'),
('core', 'public_webdav', 'files_sharing/publicwebdav.php'),
('core', 'remote_files', 'files/appinfo/remote.php'),
('core', 'remote_webdav', 'files/appinfo/remote.php'),
('files', 'default_quota', '1 GB'),
('files', 'enabled', 'yes'),
('files', 'installed_version', '1.1.10'),
('files', 'types', 'filesystem'),
('files_locking', 'enabled', 'yes'),
('files_locking', 'installed_version', ''),
('files_locking', 'types', 'filesystem'),
('files_pdfviewer', 'enabled', 'yes'),
('files_pdfviewer', 'installed_version', '0.7'),
('files_pdfviewer', 'ocsid', '166049'),
('files_pdfviewer', 'types', ''),
('files_sharing', 'enabled', 'yes'),
('files_sharing', 'installed_version', '0.6.2'),
('files_sharing', 'types', 'filesystem'),
('files_texteditor', 'enabled', 'yes'),
('files_texteditor', 'installed_version', '0.4'),
('files_texteditor', 'ocsid', '166051'),
('files_texteditor', 'types', ''),
('files_trashbin', 'enabled', 'yes'),
('files_trashbin', 'installed_version', '0.6.3'),
('files_trashbin', 'types', 'filesystem'),
('files_versions', 'enabled', 'yes'),
('files_versions', 'installed_version', '1.0.6'),
('files_versions', 'types', 'filesystem'),
('files_videoviewer', 'enabled', 'yes'),
('files_videoviewer', 'installed_version', '0.1.3'),
('files_videoviewer', 'ocsid', '166054'),
('files_videoviewer', 'types', ''),
('firstrunwizard', 'enabled', 'yes'),
('firstrunwizard', 'installed_version', '1.1'),
('firstrunwizard', 'ocsid', '166055'),
('firstrunwizard', 'types', ''),
('gallery', 'enabled', 'yes'),
('gallery', 'installed_version', '0.6.0'),
('gallery', 'types', ''),
('provisioning_api', 'enabled', 'yes'),
('provisioning_api', 'installed_version', '0.2'),
('provisioning_api', 'types', 'filesystem'),
('templateeditor', 'enabled', 'yes'),
('templateeditor', 'installed_version', '0.1'),
('templateeditor', 'types', ''),
('updater', 'enabled', 'yes'),
('updater', 'installed_version', '0.6'),
('updater', 'types', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `oc_filecache`
--

CREATE TABLE IF NOT EXISTS `oc_filecache` (
  `fileid` int(11) NOT NULL AUTO_INCREMENT,
  `storage` int(11) NOT NULL DEFAULT '0',
  `path` varchar(4000) COLLATE utf8_bin DEFAULT NULL,
  `path_hash` varchar(32) COLLATE utf8_bin NOT NULL DEFAULT '',
  `parent` int(11) NOT NULL DEFAULT '0',
  `name` varchar(250) COLLATE utf8_bin DEFAULT NULL,
  `mimetype` int(11) NOT NULL DEFAULT '0',
  `mimepart` int(11) NOT NULL DEFAULT '0',
  `size` bigint(20) NOT NULL DEFAULT '0',
  `mtime` int(11) NOT NULL DEFAULT '0',
  `storage_mtime` int(11) NOT NULL DEFAULT '0',
  `encrypted` int(11) NOT NULL DEFAULT '0',
  `unencrypted_size` bigint(20) NOT NULL DEFAULT '0',
  `etag` varchar(40) COLLATE utf8_bin DEFAULT NULL,
  `permissions` int(11) DEFAULT '0',
  PRIMARY KEY (`fileid`),
  UNIQUE KEY `fs_storage_path_hash` (`storage`,`path_hash`),
  KEY `fs_parent_name_hash` (`parent`,`name`),
  KEY `fs_storage_mimetype` (`storage`,`mimetype`),
  KEY `fs_storage_mimepart` (`storage`,`mimepart`),
  KEY `fs_storage_size` (`storage`,`size`,`fileid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=93 ;

--
-- Extraindo dados da tabela `oc_filecache`
--

INSERT INTO `oc_filecache` (`fileid`, `storage`, `path`, `path_hash`, `parent`, `name`, `mimetype`, `mimepart`, `size`, `mtime`, `storage_mtime`, `encrypted`, `unencrypted_size`, `etag`, `permissions`) VALUES
(1, 1, '', 'd41d8cd98f00b204e9800998ecf8427e', -1, '', 2, 1, 2956667, 1447242067, 1446131940, 0, 0, '564329536655c', 23),
(2, 1, 'files', '45b963397aa40d4a0063e0d85e4fe7a1', 1, 'files', 2, 1, 36295, 1444061754, 1444061754, 0, 0, '56323b81e9232', 31),
(3, 1, 'files/Documents', '0ad78ba05b6961d92f7970b2b3922eca', 2, 'Documents', 2, 1, 36227, 1444061260, 1444061260, 0, 0, '5612a04c1c3a1', 31),
(4, 1, 'files/Documents/Example.odt', 'c89c560541b952a435783a7d51a27d50', 3, 'Example.odt', 4, 3, 36227, 1444061260, 1444061260, 0, 0, '49d76675f25f6627e7c5de1fa55a1ea2', 27),
(10, 1, 'files/manual.txt', '67ccf074374a02bcbfcedf55cc5aeef7', 2, 'manual.txt', 9, 8, 68, 1444061632, 1444061632, 0, 0, 'd084cd8a78167bbd62b73b75eb67c817', 27),
(11, 1, 'thumbnails', '3b8779ba05b8f0aed49650f3ff8beb4b', 1, 'thumbnails', 2, 1, 25143, 1447242067, 1444061754, 0, 0, '56432953669eb', 31),
(12, 1, 'thumbnails/10', '41b3c4f2913327d69bd8a0251f061ee7', 11, '10', 2, 1, 25143, 1447242067, 1447242067, 0, 0, '5643295366dbb', 31),
(13, 1, 'thumbnails/10/2048-2048-max.png', '0df715bbefd73ed0839bd9530c717709', 12, '2048-2048-max.png', 10, 5, 17166, 1444061636, 1444061636, 0, 0, '0d5203c3b7cc612e33f83fde06765d26', 27),
(14, 1, 'thumbnails/10/36-36.png', '783a6faa6b984886d9be5d0d8497a19f', 12, '36-36.png', 10, 5, 876, 1444061637, 1444061637, 0, 0, '4c029a01c8aa34802447c89db4d23366', 27),
(28, 1, 'cache', '0fea6a13c52b4d4725368f24b045ca84', 1, 'cache', 2, 1, 0, 1446837873, 1446837873, 0, 0, '563cfe71ccf8b', 31),
(29, 3, '', 'd41d8cd98f00b204e9800998ecf8427e', -1, '', 2, 1, 2956667, 1446137651, 1444867092, 0, 0, '56324f33ca22b', 23),
(30, 3, 'cache', '0fea6a13c52b4d4725368f24b045ca84', 29, 'cache', 2, 1, 0, 1444089003, 1444089003, 0, 0, '56130cab93003', 31),
(31, 3, 'files', '45b963397aa40d4a0063e0d85e4fe7a1', 29, 'files', 2, 1, 8136093, 1444867183, 1444867183, 0, 0, '561eec6fe8247', 31),
(32, 3, 'files/Documents', '0ad78ba05b6961d92f7970b2b3922eca', 31, 'Documents', 2, 1, 36227, 1444089004, 1444089004, 0, 0, '56130cac1b44a', 31),
(33, 3, 'files/Documents/Example.odt', 'c89c560541b952a435783a7d51a27d50', 32, 'Example.odt', 4, 3, 36227, 1444089004, 1444089004, 0, 0, '698f654613b074cd3f8ae0af1d86243b', 27),
(34, 3, 'files/Photos', 'd01bb67e7b71dd49fd06bad922f521c9', 31, 'Photos', 2, 1, 2920440, 1444867183, 1444867183, 0, 0, '561eec6fe88ed', 31),
(35, 3, 'files/Photos/San Francisco.jpg', '9fc714efbeaafee22f7058e73d2b1c3b', 34, 'San Francisco.jpg', 6, 5, 216071, 1444089004, 1444089004, 0, 0, '81519bd6c105d480d8adbcb865f5244d', 27),
(36, 3, 'files/Photos/Paris.jpg', 'a208ddedf08367bbc56963107248dda5', 34, 'Paris.jpg', 6, 5, 228761, 1444089004, 1444089004, 0, 0, 'ccbec767b42b3f5a88fad8579fa70942', 27),
(37, 3, 'files/Photos/Squirrel.jpg', 'de85d1da71bcd6232ad893f959063b8c', 34, 'Squirrel.jpg', 6, 5, 233724, 1444089004, 1444089004, 0, 0, 'ba77346029d858d261e1bff0913423f5', 27),
(38, 3, 'files/Photos/ownCloudUserManual.pdf', 'a83fffc042bf3cc47c04b64fac92f6d9', 34, 'ownCloudUserManual.pdf', 7, 3, 2241884, 1444089007, 1444089007, 0, 0, '496c7db086e5927f7910fdfedec0a5df', 27),
(39, 3, 'thumbnails', '3b8779ba05b8f0aed49650f3ff8beb4b', 29, 'thumbnails', 2, 1, 328471, 1446137651, 1444867159, 0, 0, '56324f33caf24', 31),
(40, 3, 'thumbnails/36', 'dcfa310a86e2ad0b12114c1c650bda75', 39, '36', 2, 1, 105384, 1444867122, 1444867122, 0, 0, '561eec3241a34', 31),
(41, 3, 'thumbnails/36/1024-683-max.png', '72e0ae88a7e7edd4bf1b87faf463c41f', 40, '1024-683-max.png', 10, 5, 79994, 1444867093, 1444867093, 0, 0, 'd089521418084d96dcb237009f022c58', 27),
(42, 3, 'thumbnails/36/48-48.png', '3b194b33a5af3897645039820e762ad1', 40, '48-48.png', 10, 5, 1155, 1444867093, 1444867093, 0, 0, '0574ae7d74bd58395fe0635b7b00d046', 27),
(43, 3, 'thumbnails/35', 'ee1e9f896e07e2a980ea88d2bee7d404', 39, '35', 2, 1, 121353, 1444867122, 1444867122, 0, 0, '561eec322d235', 31),
(44, 3, 'thumbnails/37', 'aa1a401cfe05b1afcc7fca6e0f5ad666', 39, '37', 2, 1, 97298, 1444867103, 1444867103, 0, 0, '561eec1f1fa46', 31),
(45, 3, 'thumbnails/35/1024-683-max.png', 'd3b50e4045ca715e129b6675f5159032', 43, '1024-683-max.png', 10, 5, 91662, 1444867094, 1444867094, 0, 0, 'c13d1ba55f64bdacb181a35f3c4453f0', 27),
(46, 3, 'thumbnails/37/1024-768-max.png', '8bb885b2c6c57a364db7a8bbe3f90142', 44, '1024-768-max.png', 10, 5, 73058, 1444867094, 1444867094, 0, 0, '043ff636e9698d5b4bbe71fdd7de287c', 27),
(47, 3, 'thumbnails/35/48-48.png', '984651e41d12e90c0ce7e83eb3aadea5', 43, '48-48.png', 10, 5, 1254, 1444867094, 1444867094, 0, 0, '57e949b21f7d5cb4c693d476a422fac6', 27),
(48, 3, 'thumbnails/37/48-48.png', '4ed8e953eba9a83919fa0f59b881df75', 44, '48-48.png', 10, 5, 1271, 1444867094, 1444867094, 0, 0, '8cfa55b21909f8a45d333d74e4c65986', 27),
(49, 3, 'thumbnails/37/540-405-with-aspect.png', '8b189f5dd6d4e3b64a67c9f62bfce7ae', 44, '540-405-with-aspect.png', 10, 5, 22969, 1444867103, 1444867103, 0, 0, 'c62717a12d3d88edd4041d3cd59b88b3', 27),
(50, 3, 'thumbnails/35/540-360-with-aspect.png', 'ec0aa0260092ee2464124ff8752a48e4', 43, '540-360-with-aspect.png', 10, 5, 28437, 1444867122, 1444867122, 0, 0, '09f037cf7fec9c406f11e4389543cd62', 27),
(51, 3, 'thumbnails/36/540-360-with-aspect.png', 'd66b0bc71f691a0cc02df5dccc6e1e66', 40, '540-360-with-aspect.png', 10, 5, 24235, 1444867122, 1444867122, 0, 0, '461ab543a39763e2403b83059784bfd8', 27),
(52, 3, 'files/_Through My Eyes_.mp3', '8b5a73c28b289c1b879c888c901cbd78', 31, '_Through My Eyes_.mp3', 13, 12, 5179426, 1444867155, 1444867155, 0, 0, '3fe7e153f1e7d1fd0f3c63d2c5e43f25', 27),
(53, 3, 'thumbnails/52', 'e379469d4e879c045b5a367512f09f46', 39, '52', 2, 1, 4436, 1446137651, 1446137651, 0, 0, '56324f33cb353', 31),
(54, 3, 'thumbnails/52/32-32-max.png', 'f27108ed10ad35d357ca98e2cbeb364d', 53, '32-32-max.png', 10, 5, 880, 1444867159, 1444867159, 0, 0, '8c7967da8a93b57d606e9347565fc296', 27),
(55, 3, 'thumbnails/52/48-48.png', '457a1125974e59851f25f33f005ee7ac', 53, '48-48.png', 10, 5, 1331, 1444867159, 1444867159, 0, 0, 'c0385e1e6c0bfc6960b75f824cf7d269', 27),
(56, 3, 'thumbnails/52/36-36.png', 'c5b92ce77e512e790caea6f5167abdaa', 53, '36-36.png', 10, 5, 1020, 1445276223, 1445276223, 0, 0, 'db196779bb98499a0827d89056ec25f0', 27),
(59, 1, 'avatar.jpg', 'ad7bc863acc50ad3b747c51c2f85b431', 1, 'avatar.jpg', 6, 5, 2608, 1446131679, 1446131679, 0, 0, '351724a3f5e810be467356ecb0a96345', 27),
(60, 1, 'files_trashbin', 'fb66dca5f27af6f15c1d1d81e6f8d28b', 1, 'files_trashbin', 2, 1, 0, 1446131940, 1446131940, 0, 0, '563238e4ad338', 31),
(61, 1, 'files_trashbin/files', '3014a771cbe30761f2e9ff3272110dbf', 60, 'files', 2, 1, 0, 1446131940, 1446131940, 0, 0, '563238e4ab244', 31),
(62, 4, '', 'd41d8cd98f00b204e9800998ecf8427e', -1, '', 2, 1, 2956667, 1446132266, 1446132266, 0, 0, '56323a2ace1d9', 23),
(63, 4, 'cache', '0fea6a13c52b4d4725368f24b045ca84', 62, 'cache', 2, 1, 57853, 1446132266, 1446132266, 0, 0, '56323a2ad0077', 31),
(64, 4, 'files', '45b963397aa40d4a0063e0d85e4fe7a1', 62, 'files', 2, 1, 2956667, 1446132061, 1446132061, 0, 0, '5632395d4039a', 31),
(65, 4, 'files/Documents', '0ad78ba05b6961d92f7970b2b3922eca', 64, 'Documents', 2, 1, 36227, 1446132060, 1446132060, 0, 0, '5632395c5d62a', 31),
(66, 4, 'files/Documents/Example.odt', 'c89c560541b952a435783a7d51a27d50', 65, 'Example.odt', 4, 3, 36227, 1446132060, 1446132060, 0, 0, 'a27f85455566e629f52aafbe2fe3ddae', 27),
(67, 4, 'files/Photos', 'd01bb67e7b71dd49fd06bad922f521c9', 64, 'Photos', 2, 1, 678556, 1446132060, 1446132060, 0, 0, '5632395cda9d0', 31),
(68, 4, 'files/Photos/San Francisco.jpg', '9fc714efbeaafee22f7058e73d2b1c3b', 67, 'San Francisco.jpg', 6, 5, 216071, 1446132060, 1446132060, 0, 0, '3d07653aef8b44a5a71035352566c7c0', 27),
(69, 4, 'files/Photos/Paris.jpg', 'a208ddedf08367bbc56963107248dda5', 67, 'Paris.jpg', 6, 5, 228761, 1446132060, 1446132060, 0, 0, '0774d3841236a00977be7a41ba4b714a', 27),
(70, 4, 'files/Photos/Squirrel.jpg', 'de85d1da71bcd6232ad893f959063b8c', 67, 'Squirrel.jpg', 6, 5, 233724, 1446132061, 1446132061, 0, 0, '96cf732e99cbe6e8be554e41704653ec', 27),
(71, 4, 'files/ownCloudUserManual.pdf', 'c8edba2d1b8eb651c107b43532c34445', 64, 'ownCloudUserManual.pdf', 7, 3, 2241884, 1446132063, 1446132063, 0, 0, 'c30671e66b4ede0e519ee741dbaf7570', 27),
(72, 4, 'cache/avatar_upload', '0fb9d45d838c2e86e685cb6cc595704c', 63, 'avatar_upload', 11, 3, 57853, 1446139450, 1446139450, 0, 0, '1ba564525d78ff6bc6fb23741b30c961', 27),
(75, 4, 'thumbnails', '3b8779ba05b8f0aed49650f3ff8beb4b', 62, 'thumbnails', 2, 1, 247990, 1446132184, 1446132184, 0, 0, '563239d88b827', 31),
(76, 4, 'thumbnails/69', '5835efc654467f8d6b52306359c9d4a6', 75, '69', 2, 1, 81039, 1446132184, 1446132184, 0, 0, '563239d82d144', 31),
(77, 4, 'thumbnails/69/1024-683-max.png', '4e230e125304b0baf6b041bae7dc5607', 76, '1024-683-max.png', 10, 5, 79994, 1446132184, 1446132184, 0, 0, 'd242cbbdc73f1647a38afa81ba9d23ad', 27),
(78, 4, 'thumbnails/70', '46c8ab6a17fc206095f228ce254e1b51', 75, '70', 2, 1, 74170, 1446132184, 1446132184, 0, 0, '563239d86291d', 31),
(79, 4, 'thumbnails/69/36-36.png', 'acb2edb447f3a7d04e317230adfef7ca', 76, '36-36.png', 10, 5, 1045, 1446132184, 1446132184, 0, 0, '81087610f7fd99dcdc8754d9451b4bf9', 27),
(80, 4, 'thumbnails/70/1024-768-max.png', '6587cb521519b4d38313272894ca624f', 78, '1024-768-max.png', 10, 5, 73058, 1446132184, 1446132184, 0, 0, 'be9073efb52b599b1e1cfbfac1909f9c', 27),
(81, 4, 'thumbnails/68', '60d35e3956828ec107af836e686c0043', 75, '68', 2, 1, 92781, 1446132184, 1446132184, 0, 0, '563239d88bdd6', 31),
(82, 4, 'thumbnails/70/36-36.png', '6f80c2d7680e850bbd3e4b0cb6611c43', 78, '36-36.png', 10, 5, 1112, 1446132184, 1446132184, 0, 0, '0307798cf65ee53247bf5f9cda4e81e3', 27),
(83, 4, 'thumbnails/68/1024-683-max.png', '6574a39af7ec129857d96b558a8aaa63', 81, '1024-683-max.png', 10, 5, 91662, 1446132184, 1446132184, 0, 0, '2fb119b16d8d369bc2a3d5db90526f3a', 27),
(84, 4, 'thumbnails/68/36-36.png', 'c16984854301ea1869a1f4ec1d3d8b92', 81, '36-36.png', 10, 5, 1119, 1446132184, 1446132184, 0, 0, '47cd91330dda7e2818c9ffeb87861474', 27),
(90, 4, 'avatar.png', '4a301072dec6b6a49050e5b294cd7983', 62, 'avatar.png', 10, 5, 42317, 1446132266, 1446132266, 0, 0, '1c32e4878b7c35b0988cc6550d541e3d', 27),
(91, 3, 'thumbnails/52/150-150.png', '1d3d96cd113b1d21afb6c192cb077739', 53, '150-150.png', 10, 5, 1205, 1446137651, 1446137651, 0, 0, '1a75ae97612a7357acc9ce4263067860', 27),
(92, 1, 'thumbnails/10/150-150.png', '17777270dcf5d010f9b58577698dc5a7', 12, '150-150.png', 10, 5, 7101, 1447242067, 1447242067, 0, 0, 'c4bcc452bfb4c1446abbfbd065c7fd89', 27);

-- --------------------------------------------------------

--
-- Estrutura da tabela `oc_files_trash`
--

CREATE TABLE IF NOT EXISTS `oc_files_trash` (
  `auto_id` int(11) NOT NULL AUTO_INCREMENT,
  `id` varchar(250) COLLATE utf8_bin NOT NULL DEFAULT '',
  `user` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `timestamp` varchar(12) COLLATE utf8_bin NOT NULL DEFAULT '',
  `location` varchar(512) COLLATE utf8_bin NOT NULL DEFAULT '',
  `type` varchar(4) COLLATE utf8_bin DEFAULT NULL,
  `mime` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`auto_id`),
  KEY `id_index` (`id`),
  KEY `timestamp_index` (`timestamp`),
  KEY `user_index` (`user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `oc_file_map`
--

CREATE TABLE IF NOT EXISTS `oc_file_map` (
  `logic_path` varchar(512) COLLATE utf8_bin NOT NULL DEFAULT '',
  `logic_path_hash` varchar(32) COLLATE utf8_bin NOT NULL DEFAULT '',
  `physic_path` varchar(512) COLLATE utf8_bin NOT NULL DEFAULT '',
  `physic_path_hash` varchar(32) COLLATE utf8_bin NOT NULL DEFAULT '',
  PRIMARY KEY (`logic_path_hash`),
  UNIQUE KEY `file_map_pp_index` (`physic_path_hash`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estrutura da tabela `oc_groups`
--

CREATE TABLE IF NOT EXISTS `oc_groups` (
  `gid` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  PRIMARY KEY (`gid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `oc_groups`
--

INSERT INTO `oc_groups` (`gid`) VALUES
('Clientes'),
('admin');

-- --------------------------------------------------------

--
-- Estrutura da tabela `oc_group_admin`
--

CREATE TABLE IF NOT EXISTS `oc_group_admin` (
  `gid` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `uid` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  PRIMARY KEY (`gid`,`uid`),
  KEY `group_admin_uid` (`uid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estrutura da tabela `oc_group_user`
--

CREATE TABLE IF NOT EXISTS `oc_group_user` (
  `gid` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `uid` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  PRIMARY KEY (`gid`,`uid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `oc_group_user`
--

INSERT INTO `oc_group_user` (`gid`, `uid`) VALUES
('Clientes', 'teste'),
('admin', 'angular'),
('admin', 'eject');

-- --------------------------------------------------------

--
-- Estrutura da tabela `oc_jobs`
--

CREATE TABLE IF NOT EXISTS `oc_jobs` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `class` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `argument` varchar(4000) COLLATE utf8_bin NOT NULL DEFAULT '',
  `last_run` int(11) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `job_class_index` (`class`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=4 ;

--
-- Extraindo dados da tabela `oc_jobs`
--

INSERT INTO `oc_jobs` (`id`, `class`, `argument`, `last_run`) VALUES
(1, 'OCA\\Activity\\BackgroundJob\\EmailNotification', 'null', 1447556312),
(2, 'OCA\\Activity\\BackgroundJob\\ExpireActivities', 'null', 1447378206),
(3, 'OCA\\Files_sharing\\Lib\\DeleteOrphanedSharesJob', 'null', 1447538933);

-- --------------------------------------------------------

--
-- Estrutura da tabela `oc_mimetypes`
--

CREATE TABLE IF NOT EXISTS `oc_mimetypes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mimetype` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  UNIQUE KEY `mimetype_id_index` (`mimetype`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=14 ;

--
-- Extraindo dados da tabela `oc_mimetypes`
--

INSERT INTO `oc_mimetypes` (`id`, `mimetype`) VALUES
(3, 'application'),
(11, 'application/octet-stream'),
(7, 'application/pdf'),
(4, 'application/vnd.oasis.opendocument.text'),
(12, 'audio'),
(13, 'audio/mpeg'),
(1, 'httpd'),
(2, 'httpd/unix-directory'),
(5, 'image'),
(6, 'image/jpeg'),
(10, 'image/png'),
(8, 'text'),
(9, 'text/plain');

-- --------------------------------------------------------

--
-- Estrutura da tabela `oc_preferences`
--

CREATE TABLE IF NOT EXISTS `oc_preferences` (
  `userid` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `appid` varchar(32) COLLATE utf8_bin NOT NULL DEFAULT '',
  `configkey` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `configvalue` longtext COLLATE utf8_bin,
  PRIMARY KEY (`userid`,`appid`,`configkey`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `oc_preferences`
--

INSERT INTO `oc_preferences` (`userid`, `appid`, `configkey`, `configvalue`) VALUES
('angular', 'activity', 'notify_email_file_changed', ''),
('angular', 'activity', 'notify_email_file_created', ''),
('angular', 'activity', 'notify_email_file_deleted', ''),
('angular', 'activity', 'notify_email_file_restored', ''),
('angular', 'activity', 'notify_email_files_favorites', ''),
('angular', 'activity', 'notify_email_public_links', ''),
('angular', 'activity', 'notify_email_remote_share', '1'),
('angular', 'activity', 'notify_email_shared', '1'),
('angular', 'activity', 'notify_setting_batchtime', '604800'),
('angular', 'activity', 'notify_setting_self', '1'),
('angular', 'activity', 'notify_setting_selfemail', ''),
('angular', 'activity', 'notify_stream_file_changed', '1'),
('angular', 'activity', 'notify_stream_file_created', '1'),
('angular', 'activity', 'notify_stream_file_deleted', '1'),
('angular', 'activity', 'notify_stream_file_restored', '1'),
('angular', 'activity', 'notify_stream_files_favorites', ''),
('angular', 'activity', 'notify_stream_public_links', '1'),
('angular', 'activity', 'notify_stream_remote_share', '1'),
('angular', 'activity', 'notify_stream_shared', '1'),
('angular', 'core', 'lang', 'pt_BR'),
('angular', 'core', 'timezone', 'America/Sao_Paulo'),
('angular', 'files', 'quota', 'none'),
('angular', 'firstrunwizard', 'show', '0'),
('angular', 'login', 'lastLogin', '1447243073'),
('angular', 'settings', 'email', 'contato@angulartopografia.com.br'),
('eject', 'core', 'timezone', 'America/Argentina/Buenos_Aires'),
('eject', 'firstrunwizard', 'show', '0'),
('eject', 'login', 'lastLogin', '1446132060'),
('teste', 'activity', 'notify_email_file_changed', ''),
('teste', 'activity', 'notify_email_file_created', ''),
('teste', 'activity', 'notify_email_file_deleted', ''),
('teste', 'activity', 'notify_email_file_restored', ''),
('teste', 'activity', 'notify_email_files_favorites', ''),
('teste', 'activity', 'notify_email_public_links', ''),
('teste', 'activity', 'notify_email_remote_share', '1'),
('teste', 'activity', 'notify_email_shared', '1'),
('teste', 'activity', 'notify_setting_batchtime', '604800'),
('teste', 'activity', 'notify_setting_self', '1'),
('teste', 'activity', 'notify_setting_selfemail', ''),
('teste', 'activity', 'notify_stream_file_changed', '1'),
('teste', 'activity', 'notify_stream_file_created', '1'),
('teste', 'activity', 'notify_stream_file_deleted', '1'),
('teste', 'activity', 'notify_stream_file_restored', '1'),
('teste', 'activity', 'notify_stream_files_favorites', ''),
('teste', 'activity', 'notify_stream_public_links', '1'),
('teste', 'activity', 'notify_stream_remote_share', '1'),
('teste', 'activity', 'notify_stream_shared', '1'),
('teste', 'core', 'timezone', 'America/Argentina/Buenos_Aires'),
('teste', 'files', 'quota', '1 GB'),
('teste', 'firstrunwizard', 'show', '0'),
('teste', 'login', 'lastLogin', '1446137563');

-- --------------------------------------------------------

--
-- Estrutura da tabela `oc_privatedata`
--

CREATE TABLE IF NOT EXISTS `oc_privatedata` (
  `keyid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `app` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `key` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `value` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  PRIMARY KEY (`keyid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `oc_properties`
--

CREATE TABLE IF NOT EXISTS `oc_properties` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `propertypath` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `propertyname` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `propertyvalue` varchar(255) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`),
  KEY `property_index` (`userid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `oc_share`
--

CREATE TABLE IF NOT EXISTS `oc_share` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `share_type` smallint(6) NOT NULL DEFAULT '0',
  `share_with` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `uid_owner` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `parent` int(11) DEFAULT NULL,
  `item_type` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `item_source` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `item_target` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `file_source` int(11) DEFAULT NULL,
  `file_target` varchar(512) COLLATE utf8_bin DEFAULT NULL,
  `permissions` smallint(6) NOT NULL DEFAULT '0',
  `stime` bigint(20) NOT NULL DEFAULT '0',
  `accepted` smallint(6) NOT NULL DEFAULT '0',
  `expiration` datetime DEFAULT NULL,
  `token` varchar(32) COLLATE utf8_bin DEFAULT NULL,
  `mail_send` smallint(6) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `item_share_type_index` (`item_type`,`share_type`),
  KEY `file_source_index` (`file_source`),
  KEY `token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `oc_share_external`
--

CREATE TABLE IF NOT EXISTS `oc_share_external` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `remote` varchar(512) COLLATE utf8_bin NOT NULL COMMENT 'Url of the remove owncloud instance',
  `remote_id` int(11) NOT NULL DEFAULT '-1',
  `share_token` varchar(64) COLLATE utf8_bin NOT NULL COMMENT 'Public share token',
  `password` varchar(64) COLLATE utf8_bin DEFAULT NULL COMMENT 'Optional password for the public share',
  `name` varchar(64) COLLATE utf8_bin NOT NULL COMMENT 'Original name on the remote server',
  `owner` varchar(64) COLLATE utf8_bin NOT NULL COMMENT 'User that owns the public share on the remote server',
  `user` varchar(64) COLLATE utf8_bin NOT NULL COMMENT 'Local user which added the external share',
  `mountpoint` varchar(4000) COLLATE utf8_bin NOT NULL COMMENT 'Full path where the share is mounted',
  `mountpoint_hash` varchar(32) COLLATE utf8_bin NOT NULL COMMENT 'md5 hash of the mountpoint',
  `accepted` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `sh_external_mp` (`user`,`mountpoint_hash`),
  KEY `sh_external_user` (`user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `oc_storages`
--

CREATE TABLE IF NOT EXISTS `oc_storages` (
  `id` varchar(64) COLLATE utf8_bin DEFAULT NULL,
  `numeric_id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`numeric_id`),
  UNIQUE KEY `storages_id_index` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=5 ;

--
-- Extraindo dados da tabela `oc_storages`
--

INSERT INTO `oc_storages` (`id`, `numeric_id`) VALUES
('home::angular', 1),
('home::eject', 4),
('home::teste', 3),
('local::/home/angular/public_html/owncloud/data/', 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `oc_users`
--

CREATE TABLE IF NOT EXISTS `oc_users` (
  `uid` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `displayname` varchar(64) COLLATE utf8_bin DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `oc_users`
--

INSERT INTO `oc_users` (`uid`, `displayname`, `password`) VALUES
('angular', 'Angular Topografia', '1|$2y$10$k5QTMlqQcUuRyh.7uXNLcegb1qvbsX4OoJjl5mnI1br0EqXEJxpuy'),
('eject', 'EJECT - UFRN', '1|$2y$10$qS6lY5XYgiJtKWOATwv6Jed5OKXCbJdTqJeZOJz1kupaE/ZQ6sOuO'),
('teste', 'Teste', '1|$2y$10$sZHda5bflcFW0iumyM6k3eBaEIASOL6B5OZnZ678qUsWghY1D7xLu');

-- --------------------------------------------------------

--
-- Estrutura da tabela `oc_vcategory`
--

CREATE TABLE IF NOT EXISTS `oc_vcategory` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uid` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `type` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `category` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `uid_index` (`uid`),
  KEY `type_index` (`type`),
  KEY `category_index` (`category`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `oc_vcategory_to_object`
--

CREATE TABLE IF NOT EXISTS `oc_vcategory_to_object` (
  `objid` int(10) unsigned NOT NULL DEFAULT '0',
  `categoryid` int(10) unsigned NOT NULL DEFAULT '0',
  `type` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  PRIMARY KEY (`categoryid`,`objid`,`type`),
  KEY `vcategory_objectd_index` (`objid`,`type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_administradores`
--

CREATE TABLE IF NOT EXISTS `tb_administradores` (
  `ADM_ID` int(11) NOT NULL AUTO_INCREMENT,
  `ADM_NOME` text COLLATE utf8_unicode_ci NOT NULL,
  `ADM_LOGIN` text COLLATE utf8_unicode_ci NOT NULL,
  `ADM_SENHA` text COLLATE utf8_unicode_ci NOT NULL,
  `ADM_EMAIL` text COLLATE utf8_unicode_ci NOT NULL,
  `ADM_DATA` text COLLATE utf8_unicode_ci NOT NULL,
  `ADM_LOG` text COLLATE utf8_unicode_ci NOT NULL,
  `ADM_STATUS` tinyint(1) NOT NULL,
  PRIMARY KEY (`ADM_ID`),
  UNIQUE KEY `ADM_ID` (`ADM_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `tb_administradores`
--

INSERT INTO `tb_administradores` (`ADM_ID`, `ADM_NOME`, `ADM_LOGIN`, `ADM_SENHA`, `ADM_EMAIL`, `ADM_DATA`, `ADM_LOG`, `ADM_STATUS`) VALUES
(1, 'VGVzdGUgRUpFQ1Q=', 'ZWplY3Q=', '$2a$08$MTE5NDg2NzI4NzU2MTlkMuJw9DUI8zRyBjC4S9otumNy0KeWdnDyS', 'Y29udGF0b0BlamVjdHVmcm4uY29tLmJy', 'MjAxNS0xMC0xMSAwMDoxMTozNA==', 'MjAxNS0xMS0zMCAwMzowOToxNQ==', 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_emails`
--

CREATE TABLE IF NOT EXISTS `tb_emails` (
  `EM_ID` int(11) NOT NULL AUTO_INCREMENT,
  `EM_DATA` text COLLATE utf8_unicode_ci NOT NULL,
  `EM_NOME` text COLLATE utf8_unicode_ci NOT NULL,
  `EM_EMAIL` text COLLATE utf8_unicode_ci NOT NULL,
  `EM_ASSUNTO` text COLLATE utf8_unicode_ci NOT NULL,
  `EM_MENSAGEM` text COLLATE utf8_unicode_ci NOT NULL,
  `EM_TEL` text COLLATE utf8_unicode_ci NOT NULL,
  `EM_STATUS` int(11) NOT NULL,
  PRIMARY KEY (`EM_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `tb_emails`
--

INSERT INTO `tb_emails` (`EM_ID`, `EM_DATA`, `EM_NOME`, `EM_EMAIL`, `EM_ASSUNTO`, `EM_MENSAGEM`, `EM_TEL`, `EM_STATUS`) VALUES
(1, 'MjAxNS0xMS0xMCAwOTowMTowNw==', 'RUpFQ1Q=', 'Y29udGF0b0BlamVjdHVmcm4uY29tLmJy', 'TWVuc2FnZW0gVGVzdGU=', 'RXN0w6EgbWVuc2FnZW0gZm9pIGVudmlhZGEgYXBlbmFzIHBhcmEgdGVzdGVzIGRlIG9wZXJhw6fDo28gZG8gc2Vydmlkb3Iu', '', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_empresa`
--

CREATE TABLE IF NOT EXISTS `tb_empresa` (
  `EMP_ID` int(11) NOT NULL AUTO_INCREMENT,
  `EMP_ID_ADM` int(11) NOT NULL,
  `EMP_DATA` text COLLATE utf8_unicode_ci NOT NULL,
  `EMP_NOME` text COLLATE utf8_unicode_ci NOT NULL,
  `EMP_END` text COLLATE utf8_unicode_ci NOT NULL,
  `EMP_CEP` text COLLATE utf8_unicode_ci NOT NULL,
  `EMP_BAIRRO` text COLLATE utf8_unicode_ci NOT NULL,
  `EMP_CIDADE` text COLLATE utf8_unicode_ci NOT NULL,
  `EMP_ESTADO` text COLLATE utf8_unicode_ci NOT NULL,
  `EMP_PAIS` text COLLATE utf8_unicode_ci NOT NULL,
  `EMP_TEL1` text COLLATE utf8_unicode_ci NOT NULL,
  `EMP_TEL2` text COLLATE utf8_unicode_ci NOT NULL,
  `EMP_EMAIL` text COLLATE utf8_unicode_ci NOT NULL,
  `EMP_SOBRE` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`EMP_ID`),
  UNIQUE KEY `EMP_ID` (`EMP_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `tb_empresa`
--

INSERT INTO `tb_empresa` (`EMP_ID`, `EMP_ID_ADM`, `EMP_DATA`, `EMP_NOME`, `EMP_END`, `EMP_CEP`, `EMP_BAIRRO`, `EMP_CIDADE`, `EMP_ESTADO`, `EMP_PAIS`, `EMP_TEL1`, `EMP_TEL2`, `EMP_EMAIL`, `EMP_SOBRE`) VALUES
(1, 0, 'MjAxNS0xMS0zMCAwMzoxMDoxNg==', 'QW5ndWxhciBUb3BvZ3JhZmlh', 'UnVhIG1vc3NvcsOzLCAxMg==', 'MzMzMzMtMzMz', 'TGFnb2E=', 'TmF0YWw=', 'Uk4=', 'QnJhc2ls', 'KzU1ICg4NCkgOTk5OTktOTk5OQ==', 'KzU1ICg4NCkgOTk5OS05OTk5', 'Y29udGF0b0Bhbmd1bGFydG9wb2dyYWZpYS5jb20uYnI=', 'PHA+QSBBbmd1bGFyIGF0dWEgbmEgw6FyZWEgZGUgdG9wb2dyYWZpYSBlbSBpYnJhcyBjaXZpYyAobcOpZGlvIGUgZ3JhbmRlIHBvcnRlKSBlc3BlY2lhbGl6YWRhIGVtIGxldmFudGFtZW50b3MgdG9wb2dyw6FmaWNvcywgZ2VvcnJlZmVuY2lhbWVudG8gZGUgaW1vdsOpaXMgcnVyYWlzLCBsb2Nhw6fDtWVzIGUgYWNvbXBhbmhhbWVudG8gZGUgb2JyYXMgZW0gZ2VyYWwuIFBvZGVtb3MgZGVzdGFjYXIgb2JyYXMgbm9zIGVzdGFkb3MgZG8gUk4sIFBCLCBDRSBlIFBFLjwvcD48cD5CdXNjYW1vcyBzZW1wcmUgYSBzYXRpc2Zhw6fDo28gZG8gbm9zc28gY2xpZW50ZSwgYSBleGNlbMOqbmNpYSBlbSBub3Nzb3Mgc2VydmnDp29zIGNvbSBwcm9maXNzaW9uYWlzIHF1YWxpZmljYWRvcyAoY29uaGVjaW1lbnRvIHTDqWNuaWNvIGUgcHLDoXRpY28gY29tIHF1YWxpZmljYcOnw6NvKS4gVXRpbGl6YW1vcyBvIHF1ZSBow6EgZGUgbWVsaG9yIGVtIGVxdWlwYW1lbnRvcywgYmVtIGNvbW8gZXN0YcOnw7VlcyB0b3RhaXMsIHJlY2VwdG9yZXMgR1BTIGUgbsOtdmVpcy48L3A+');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_fotos`
--

CREATE TABLE IF NOT EXISTS `tb_fotos` (
  `FOTO_ID` int(11) NOT NULL AUTO_INCREMENT,
  `FOTO_ID_ADM` int(11) NOT NULL,
  `FOTO_DATA` text COLLATE utf8_unicode_ci NOT NULL,
  `FOTO_LOG` text COLLATE utf8_unicode_ci NOT NULL,
  `FOTO_NOME` text COLLATE utf8_unicode_ci NOT NULL,
  `FOTO_NOME_ALBUM` text COLLATE utf8_unicode_ci NOT NULL,
  `FOTO_URL` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`FOTO_ID`),
  UNIQUE KEY `FOTO_ID` (`FOTO_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=13 ;

--
-- Extraindo dados da tabela `tb_fotos`
--

INSERT INTO `tb_fotos` (`FOTO_ID`, `FOTO_ID_ADM`, `FOTO_DATA`, `FOTO_LOG`, `FOTO_NOME`, `FOTO_NOME_ALBUM`, `FOTO_URL`) VALUES
(1, 0, 'MjAxNS0xMC0xMSAwMDoyMDowNg==', 'MjAxNS0xMC0xMSAwMDoyMDowNg==', '', 'ZW1wcmVzYQ==', 'aHR0cDovL3d3dy5hbmd1bGFydG9wb2dyYWZpYS5jb20uYnIvZWotYWRtaW4vY29tcG9uZW50cy9pbWcvYjJlMDdkM2VhMjIwNjcxMWNiMzZjODY0M2E2MDVjZmEucG5n'),
(2, 1, 'MjAxNS0xMC0xNCAwNjo0NToxMA==', 'MjAxNS0xMC0yMSAwMDozODo1NQ==', '', 'U0VSXzE0LTA2LTQ1LTEw', 'aHR0cDovL2FuZ3VsYXJ0b3BvZ3JhZmlhLmNvbS5ici9lai1hZG1pbi9jb21wb25lbnRzL2ltZy85ODhkZWMzYzk1MDMzZTcxYTg0NTc3ODU4YzUwNjY3Zi5qcGc='),
(3, 1, 'MjAxNS0xMC0xNSAxNzo1MjozOA==', 'MjAxNS0xMS0xMiAxOToyMTo0OA==', 'VGVzdGUgYmFubmVyIDIgLSBFSkVDVCAvIFVGUk4=', 'YmFubmVy', 'aHR0cDovL3d3dy5hbmd1bGFydG9wb2dyYWZpYS5jb20uYnIvZWotYWRtaW4vY29tcG9uZW50cy9pbWcvZTYyOWQ3MzJlY2IwMDFlNTgxNTUzMWY4NWJjZWQ4ZTMucG5n'),
(5, 1, 'MjAxNS0xMC0xNSAxODo1NjowNg==', 'MjAxNS0xMC0yMSAwMjowNzozNA==', 'VGVzdGUgQ2xpZW50ZSB8IEVKRUNUIA==', 'Y2xpZW50ZXM=', 'aHR0cDovL2FuZ3VsYXJ0b3BvZ3JhZmlhLmNvbS5ici9lai1hZG1pbi9jb21wb25lbnRzL2ltZy80ZTNmM2MwYzEzOTllZjU2OTg0OThiMzU2YjY5Y2M3NC5wbmc='),
(6, 1, 'MjAxNS0xMC0xNSAyMDoyODoxNA==', 'MjAxNS0xMC0yMSAwMjowMDo0Ng==', '', 'TElOS18xNS0yMC0yOC0xNA==', 'aHR0cDovL3d3dy5hbmd1bGFydG9wb2dyYWZpYS5jb20uYnIvZWotYWRtaW4vY29tcG9uZW50cy9pbWcvMDU3ZThjMTgyYTM4YmQ0NTliN2VjNTE0ZGVhZDE3MjQuZ2lm'),
(8, 1, 'MjAxNS0xMC0xOSAxNDoyMjowNw==', 'MjAxNS0xMC0yMSAwMjowNzowOA==', 'VGVzdGUgQ2xpZW50ZSB8IFJOIErDum5pb3I=', 'Y2xpZW50ZXM=', 'aHR0cDovL2FuZ3VsYXJ0b3BvZ3JhZmlhLmNvbS5ici9lai1hZG1pbjIvY29tcG9uZW50cy9pbWcvNzBlNWFkZTdhY2UxYzJlMDBjZGFkZGIyY2M2YjQ2YjEucG5n'),
(9, 1, 'MjAxNS0xMC0xOSAxNDoyOTozMA==', 'MjAxNS0xMC0xOSAxNDozMzozMA==', 'Q2FyYWN0w6lyZXMgRXNwZWNpYWlzIMOhfnF+ZcOjw7LDksOTKiYl', 'YmFubmVy', 'aHR0cDovL2FuZ3VsYXJ0b3BvZ3JhZmlhLmNvbS5ici9lai1hZG1pbi9jb21wb25lbnRzL2ltZy81MjRmYTA0NWVjNTk4MzczZjljMGU3Zjg1NmM3M2RmMS5wbmc='),
(11, 1, 'MjAxNS0xMC0yMCAyMDozNjo0NA==', 'MjAxNS0xMS0xMiAxOToxNTo0Mw==', 'VGVzdGUgQmFubmVyIC8gVUZSTg==', 'YmFubmVy', 'aHR0cDovL2FuZ3VsYXJ0b3BvZ3JhZmlhLmNvbS5ici9lai1hZG1pbi9jb21wb25lbnRzL2ltZy9jODA2MjFmMTk2NmIzNDdlODM2ZjhlYWY2ZDlkZjM3My5wbmc='),
(12, 1, 'MjAxNS0xMC0yMCAyMDo0NjoyMQ==', 'MjAxNS0xMC0yMCAyMDo0NjoyMQ==', 'VGVzdGUgQmFubmVyIHwgQnJhc2lsIErDum5pb3I=', 'YmFubmVy', 'aHR0cDovL2FuZ3VsYXJ0b3BvZ3JhZmlhLmNvbS5ici9lai1hZG1pbi9jb21wb25lbnRzL2ltZy84NTkwYjY2ODEyNzI1M2ZlOGVjYTcxYjljYWI3NzZlNC5wbmc=');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_links`
--

CREATE TABLE IF NOT EXISTS `tb_links` (
  `LINK_ID` int(11) NOT NULL AUTO_INCREMENT,
  `LINK_ID_ADM` int(11) NOT NULL,
  `LINK_DATA` text COLLATE utf8_unicode_ci NOT NULL,
  `LINK_LOG` text COLLATE utf8_unicode_ci NOT NULL,
  `LINK_NOME` text COLLATE utf8_unicode_ci NOT NULL,
  `LINK_SOBRE` text COLLATE utf8_unicode_ci NOT NULL,
  `LINK_CHAVE` text COLLATE utf8_unicode_ci NOT NULL,
  `LINK_URL` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`LINK_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `tb_links`
--

INSERT INTO `tb_links` (`LINK_ID`, `LINK_ID_ADM`, `LINK_DATA`, `LINK_LOG`, `LINK_NOME`, `LINK_SOBRE`, `LINK_CHAVE`, `LINK_URL`) VALUES
(1, 1, 'MjAxNS0xMC0xNSAyMDoyODoxNA==', 'MjAxNS0xMC0yMSAwMjowMDo0Ng==', 'SU5DUkE=', 'PHA+SW1wbGVtZW50YXIgYSBwb2wmaWFjdXRlO3RpY2EgZGUgcmVmb3JtYSBhZ3ImYWFjdXRlO3JpYSBlIHJlYWxpemFyIG8gb3JkZW5hbWVudG8gZnVuZGkmYWFjdXRlO3JpbyBuYWNpb25hbCwgY29udHJpYnVpbmRvIHBhcmEgbyBkZXNlbnZvbHZpbWVudG8gcnVyYWwgc3VzdGVudCZhYWN1dGU7dmVsLjwvcD4=', 'TElOS18xNS0yMC0yOC0xNA==', 'aW5jcmEuZ292LmJy');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_recuperacao`
--

CREATE TABLE IF NOT EXISTS `tb_recuperacao` (
  `REC_ADM` text COLLATE utf8_unicode_ci NOT NULL,
  `REC_CONFIRMACAO` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `tb_recuperacao`
--

INSERT INTO `tb_recuperacao` (`REC_ADM`, `REC_CONFIRMACAO`) VALUES
('Y29udGF0b0BlamVjdHVmcm4uY29tLmJy', '55394ad6428fc1931ec92e899370aba348a7b7f1');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_servicos`
--

CREATE TABLE IF NOT EXISTS `tb_servicos` (
  `SER_ID` int(11) NOT NULL AUTO_INCREMENT,
  `SER_ID_ADM` int(11) NOT NULL,
  `SER_DATA` text COLLATE utf8_unicode_ci NOT NULL,
  `SER_LOG` text COLLATE utf8_unicode_ci NOT NULL,
  `SER_NOME` text COLLATE utf8_unicode_ci NOT NULL,
  `SER_SOBRE` text COLLATE utf8_unicode_ci NOT NULL,
  `SER_CHAVE` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`SER_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `tb_servicos`
--

INSERT INTO `tb_servicos` (`SER_ID`, `SER_ID_ADM`, `SER_DATA`, `SER_LOG`, `SER_NOME`, `SER_SOBRE`, `SER_CHAVE`) VALUES
(1, 1, 'MjAxNS0xMC0xNCAwNjo0NToxMA==', 'MjAxNS0xMC0yMSAwMDozODo1NQ==', 'QXNzZXNzb3JpYSB0w6ljbmljYSBlbSBzZXJ2acOnb3MgZGUgYWdyaW1lbnN1cmE=', 'PHA+QXF1aSBzZXImYWFjdXRlOyBhIGRlc2NyaSZjY2VkaWw7JmF0aWxkZTtvIGRvIHNlcnZpJmNjZWRpbDtvIGEgc2VyIGRpZ2l0YWRvIHBlbG8gYWRtaW5pc3RyYWRvciBkbyBzaXRlPC9wPg==', 'U0VSXzE0LTA2LTQ1LTEw');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
