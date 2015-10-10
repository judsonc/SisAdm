-- phpMyAdmin SQL Dump
-- version 4.0.10.7
-- http://www.phpmyadmin.net
--
-- Máquina: localhost
-- Data de Criação: 09-Out-2015 às 17:04
-- Versão do servidor: 5.5.45-cll
-- versão do PHP: 5.4.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de Dados: `angular_new`
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=13 ;

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
(12, 1444089004, 40, 'file_created', 'teste', 'teste', 'files', 'created_self', '["\\/ownCloudUserManual.pdf"]', '', '[]', '/ownCloudUserManual.pdf', 'http://www.angulartopografia.com.br/owncloud/index.php/apps/files?dir=%2F');

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
('backgroundjob', 'lastjob', '2'),
('core', 'installedat', '1444061259.97'),
('core', 'lastcron', '1444399409'),
('core', 'lastupdateResult', '{"version":{},"versionstring":{},"url":{},"web":{}}'),
('core', 'lastupdatedat', '1444227585'),
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=39 ;

--
-- Extraindo dados da tabela `oc_filecache`
--

INSERT INTO `oc_filecache` (`fileid`, `storage`, `path`, `path_hash`, `parent`, `name`, `mimetype`, `mimepart`, `size`, `mtime`, `storage_mtime`, `encrypted`, `unencrypted_size`, `etag`, `permissions`) VALUES
(1, 1, '', 'd41d8cd98f00b204e9800998ecf8427e', -1, '', 2, 1, 2956667, 1444086655, 1444086655, 0, 0, '5613037f2f693', 23),
(2, 1, 'files', '45b963397aa40d4a0063e0d85e4fe7a1', 1, 'files', 2, 1, 36295, 1444061754, 1444061754, 0, 0, '5612a23a59a2c', 31),
(3, 1, 'files/Documents', '0ad78ba05b6961d92f7970b2b3922eca', 2, 'Documents', 2, 1, 36227, 1444061260, 1444061260, 0, 0, '5612a04c1c3a1', 31),
(4, 1, 'files/Documents/Example.odt', 'c89c560541b952a435783a7d51a27d50', 3, 'Example.odt', 4, 3, 36227, 1444061260, 1444061260, 0, 0, '49d76675f25f6627e7c5de1fa55a1ea2', 27),
(5, 1, 'files_trashbin/files/Photos.d1444061754', '74ea4bf133b13ac7586e4bc3efc4c8bb', 25, 'Photos.d1444061754', 2, 1, 678556, 1444061260, 1444061260, 0, 0, '5612a04c30c48', 31),
(6, 1, 'files_trashbin/files/Photos.d1444061754/San Francisco.jpg', '9391b1f3493fb1ffc2bc7d07ad9cc447', 5, 'San Francisco.jpg', 6, 5, 216071, 1444061260, 1444061260, 0, 0, '5116be4859cb0c4f6068430b05f54763', 27),
(7, 1, 'files_trashbin/files/Photos.d1444061754/Paris.jpg', '81600969977c4dd6500f03f09697d530', 5, 'Paris.jpg', 6, 5, 228761, 1444061260, 1444061260, 0, 0, '393cfcaf9ed9a07fc3ee45cb04750a8e', 27),
(8, 1, 'files_trashbin/files/Photos.d1444061754/Squirrel.jpg', 'e880ee34ce77b882805bfaea7105f8de', 5, 'Squirrel.jpg', 6, 5, 233724, 1444061260, 1444061260, 0, 0, '650292031c048fb133970ccdb9e04379', 27),
(9, 1, 'files_trashbin/files/ownCloudUserManual.pdf.d1444061752', 'ed9bcf225301808b22e1be528bc3edbc', 25, 'ownCloudUserManual.pdf.d1444061752', 11, 3, 2241884, 1444061260, 1444061260, 0, 0, '36bc98a56464dd23fdbace1b037ba7be', 27),
(10, 1, 'files/manual.txt', '67ccf074374a02bcbfcedf55cc5aeef7', 2, 'manual.txt', 9, 8, 68, 1444061632, 1444061632, 0, 0, 'd084cd8a78167bbd62b73b75eb67c817', 27),
(11, 1, 'thumbnails', '3b8779ba05b8f0aed49650f3ff8beb4b', 1, 'thumbnails', 2, 1, 18042, 1444061754, 1444061754, 0, 0, '5612a23a62dfd', 31),
(12, 1, 'thumbnails/10', '41b3c4f2913327d69bd8a0251f061ee7', 11, '10', 2, 1, 18042, 1444061637, 1444061637, 0, 0, '5612a1c51ef8e', 31),
(13, 1, 'thumbnails/10/2048-2048-max.png', '0df715bbefd73ed0839bd9530c717709', 12, '2048-2048-max.png', 10, 5, 17166, 1444061636, 1444061636, 0, 0, '0d5203c3b7cc612e33f83fde06765d26', 27),
(14, 1, 'thumbnails/10/36-36.png', '783a6faa6b984886d9be5d0d8497a19f', 12, '36-36.png', 10, 5, 876, 1444061637, 1444061637, 0, 0, '4c029a01c8aa34802447c89db4d23366', 27),
(24, 1, 'files_trashbin', 'fb66dca5f27af6f15c1d1d81e6f8d28b', 1, 'files_trashbin', 2, 1, 2920440, 1444061754, 1444061752, 0, 0, '5612a23a571f1', 31),
(25, 1, 'files_trashbin/files', '3014a771cbe30761f2e9ff3272110dbf', 24, 'files', 2, 1, 2920440, 1444061754, 1444061754, 0, 0, '5612a23a5767e', 31),
(26, 1, 'files_trashbin/versions', 'c639d144d3f1014051e14a98beac5705', 24, 'versions', 2, 1, 0, 1444061752, 1444061752, 0, 0, '5612a238b3126', 31),
(27, 1, 'files_trashbin/keys', '9195c7cfc1b867f229ac78cc1b6a0be3', 24, 'keys', 2, 1, 0, 1444061752, 1444061752, 0, 0, '5612a238b4b5e', 31),
(28, 1, 'cache', '0fea6a13c52b4d4725368f24b045ca84', 1, 'cache', 2, 1, 0, 1444086655, 1444086655, 0, 0, '5613037f2ca3c', 31),
(29, 3, '', 'd41d8cd98f00b204e9800998ecf8427e', -1, '', 2, 1, 2956667, 1444089004, 1444089003, 0, 0, '56130cacec2ae', 23),
(30, 3, 'cache', '0fea6a13c52b4d4725368f24b045ca84', 29, 'cache', 2, 1, 0, 1444089003, 1444089003, 0, 0, '56130cab93003', 31),
(31, 3, 'files', '45b963397aa40d4a0063e0d85e4fe7a1', 29, 'files', 2, 1, 2956667, 1444089004, 1444089004, 0, 0, '56130cacec79e', 31),
(32, 3, 'files/Documents', '0ad78ba05b6961d92f7970b2b3922eca', 31, 'Documents', 2, 1, 36227, 1444089004, 1444089004, 0, 0, '56130cac1b44a', 31),
(33, 3, 'files/Documents/Example.odt', 'c89c560541b952a435783a7d51a27d50', 32, 'Example.odt', 4, 3, 36227, 1444089004, 1444089004, 0, 0, '698f654613b074cd3f8ae0af1d86243b', 27),
(34, 3, 'files/Photos', 'd01bb67e7b71dd49fd06bad922f521c9', 31, 'Photos', 2, 1, 678556, 1444089004, 1444089004, 0, 0, '56130cacbd3eb', 31),
(35, 3, 'files/Photos/San Francisco.jpg', '9fc714efbeaafee22f7058e73d2b1c3b', 34, 'San Francisco.jpg', 6, 5, 216071, 1444089004, 1444089004, 0, 0, '81519bd6c105d480d8adbcb865f5244d', 27),
(36, 3, 'files/Photos/Paris.jpg', 'a208ddedf08367bbc56963107248dda5', 34, 'Paris.jpg', 6, 5, 228761, 1444089004, 1444089004, 0, 0, 'ccbec767b42b3f5a88fad8579fa70942', 27),
(37, 3, 'files/Photos/Squirrel.jpg', 'de85d1da71bcd6232ad893f959063b8c', 34, 'Squirrel.jpg', 6, 5, 233724, 1444089004, 1444089004, 0, 0, 'ba77346029d858d261e1bff0913423f5', 27),
(38, 3, 'files/ownCloudUserManual.pdf', 'c8edba2d1b8eb651c107b43532c34445', 31, 'ownCloudUserManual.pdf', 7, 3, 2241884, 1444089007, 1444089007, 0, 0, '496c7db086e5927f7910fdfedec0a5df', 27);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `oc_files_trash`
--

INSERT INTO `oc_files_trash` (`auto_id`, `id`, `user`, `timestamp`, `location`, `type`, `mime`) VALUES
(1, 'ownCloudUserManual.pdf', 'angular', '1444061752', '.', NULL, NULL),
(2, 'Photos', 'angular', '1444061754', '.', NULL, NULL);

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
('admin'),
('cliente');

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
('admin', 'angular'),
('cliente', 'teste');

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
(1, 'OCA\\Activity\\BackgroundJob\\EmailNotification', 'null', 1444270288),
(2, 'OCA\\Activity\\BackgroundJob\\ExpireActivities', 'null', 1444399409),
(3, 'OCA\\Files_sharing\\Lib\\DeleteOrphanedSharesJob', 'null', 1444269647);

-- --------------------------------------------------------

--
-- Estrutura da tabela `oc_mimetypes`
--

CREATE TABLE IF NOT EXISTS `oc_mimetypes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mimetype` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  UNIQUE KEY `mimetype_id_index` (`mimetype`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=12 ;

--
-- Extraindo dados da tabela `oc_mimetypes`
--

INSERT INTO `oc_mimetypes` (`id`, `mimetype`) VALUES
(3, 'application'),
(11, 'application/octet-stream'),
(7, 'application/pdf'),
(4, 'application/vnd.oasis.opendocument.text'),
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
('angular', 'files', 'quota', '5 GB'),
('angular', 'firstrunwizard', 'show', '0'),
('angular', 'login', 'lastLogin', '1444227583'),
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
('teste', 'login', 'lastLogin', '1444093940');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=4 ;

--
-- Extraindo dados da tabela `oc_storages`
--

INSERT INTO `oc_storages` (`id`, `numeric_id`) VALUES
('home::angular', 1),
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
('angular', NULL, '1|$2y$10$k5QTMlqQcUuRyh.7uXNLcegb1qvbsX4OoJjl5mnI1br0EqXEJxpuy'),
('teste', NULL, '1|$2y$10$AzerERf2M0zhv2bI5VWW.ONnrjBLf7E28T/0ECJl5PrkGbEUb9FnW');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=12 ;

--
-- Extraindo dados da tabela `tb_administradores`
--

INSERT INTO `tb_administradores` (`ADM_ID`, `ADM_NOME`, `ADM_LOGIN`, `ADM_SENHA`, `ADM_EMAIL`, `ADM_DATA`, `ADM_LOG`, `ADM_STATUS`) VALUES
(11, 'emV6aW4gc2lsdmE=', 'emV6bw==', '$2a$08$NDgxMzcyMDMyNTYxODI4MuJiurGLCJA2k7lXgwkw8NAZgSNv8as8G', 'anVkc29uLnNjb3N0YUBob3RtYWlsLmNvbQ==', 'MjAxNS0xMC0wOSAxNzo0OTowNA==', 'MjAxNS0xMC0wOSAxNzo1Mjo1NA==', 2);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=11 ;

--
-- Extraindo dados da tabela `tb_empresa`
--

INSERT INTO `tb_empresa` (`EMP_ID`, `EMP_ID_ADM`, `EMP_DATA`, `EMP_NOME`, `EMP_END`, `EMP_CEP`, `EMP_BAIRRO`, `EMP_CIDADE`, `EMP_ESTADO`, `EMP_PAIS`, `EMP_TEL1`, `EMP_TEL2`, `EMP_EMAIL`, `EMP_SOBRE`) VALUES
(10, 1, 'MjAxNS0xMC0wOSAxMjoxODoyNg==', 'QW5ndWxhciBUb3BvZ3JhZmlh', 'UnVhIG1vc3NvcsOzLCAxMiwgcGlzbyAz', 'MzMzMzMtMzMz', 'UXVpbnRhcw==', 'TmF0YWw=', 'Uk4=', 'QnJhc2ls', 'KzU1ICg4NCkgOTc4OS03Njg3', 'KzU1ICg4NCkgOTk5OS05OTk5', 'c2FjQGFuZ3VsYXJ0b3BvZ3JhZmlhLmNvbS5icg==', 'PHA+dGVzdGUgc29icmUgYSBlbXByZXNhbGsgYWpka2xhamRhayZjY2VkaWw7ZGphJmNjZWRpbDtsa2RqIGFsa2QgamFrbCBkamFzbGsmY2NlZGlsOyBkamEgbGthc2o8L3A+PHA+a2d1Z2lmaW4gZG9la3Agd2sgd29kamRoZW9qZSBwc2hkaW9lanJ1Jm5ic3A7IHJpZ2tjbm54IGxzJmNjZWRpbDtzcHdvZXV1dGJybGZrZm9lbHBlPC9wPg==');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=43 ;

--
-- Extraindo dados da tabela `tb_fotos`
--

INSERT INTO `tb_fotos` (`FOTO_ID`, `FOTO_ID_ADM`, `FOTO_DATA`, `FOTO_LOG`, `FOTO_NOME`, `FOTO_NOME_ALBUM`, `FOTO_URL`) VALUES
(13, 1, 'MjAxNS0wOS0yNyAxMjozODowOQ==', 'MjAxNS0xMC0wMyAyMjo1OToyOQ==', 'Q2xpZW50ZSAx', 'Y2xpZW50ZXM=', 'aHR0cDovL3d3dy5hbmd1bGFydG9wb2dyYWZpYS5jb20uYnIvZWotYWRtaW4vY29tcG9uZW50cy9pbWcvZTU4MjQ4MjRkMWYyNGNmNjA3NWYyNDkxZDI4MTA2ZTIuc3Zn'),
(14, 1, 'MjAxNS0wOS0yNyAxMjozODoyMQ==', 'MjAxNS0xMC0wNCAxNToyNDo1MQ==', 'Q2xpZW50ZSAy', 'Y2xpZW50ZXM=', 'aHR0cDovL3d3dy5hbmd1bGFydG9wb2dyYWZpYS5jb20uYnIvZWotYWRtaW4vY29tcG9uZW50cy9pbWcvYjI5ODE2NjBhZThhNDkwNzBhYjQ0MWU5YmFmYjcxMmYuc3Zn'),
(15, 1, 'MjAxNS0wOS0yNyAxMjo0MjoyNw==', 'MjAxNS0xMC0wMyAyMzowMDoyMQ==', '', 'U0VSXzI3LTEyLTQyLTI3', 'aHR0cDovL3d3dy5hbmd1bGFydG9wb2dyYWZpYS5jb20uYnIvZWotYWRtaW4vY29tcG9uZW50cy9pbWcvNzE4YzM2OGNkYjljMWQzZmJkN2VhNzNjMDA2NTNmYWIuanBn'),
(16, 1, 'MjAxNS0wOS0yNyAxMjo0MzowMg==', 'MjAxNS0xMC0wNCAwMTowNTo1Ng==', '', 'U0VSXzI3LTEyLTQzLTAy', 'aHR0cDovL3d3dy5hbmd1bGFydG9wb2dyYWZpYS5jb20uYnIvZWotYWRtaW4vY29tcG9uZW50cy9pbWcvNDczNjMyZTEwNGQyYmY5ZDNlYTk0Mzc0NmU3MGQ1MTYuanBn'),
(17, 1, 'MjAxNS0wOS0yNyAxMjo0MzoxOA==', 'MjAxNS0xMC0wNSAxMjo1MTo1Nw==', '', 'U0VSXzI3LTEyLTQzLTE4', 'aHR0cDovL3d3dy5hbmd1bGFydG9wb2dyYWZpYS5jb20uYnIvZWotYWRtaW4vY29tcG9uZW50cy9pbWcvYzQ0ODQzZjIzM2Y2NDBlNjUzYzcwNDNmMzkyOTExMTkuanBn'),
(19, 2, 'MjAxNS0wOS0yNyAxOTo0NzoyMw==', 'MjAxNS0xMC0wOSAxMToxNzoyNw==', '', 'TElOS18yNy0xOS00Ny0yMw==', 'aHR0cDovL3d3dy5hbmd1bGFydG9wb2dyYWZpYS5jb20uYnIvZWotYWRtaW4vY29tcG9uZW50cy9pbWcvNWI4ZWVhOTkwYmJjNzQ2ZjJhOWQ3YjI4YjMwOGVjN2QucG5n'),
(30, 1, 'MjAxNS0wOS0yOCAxOTo1NDo0MA==', 'MjAxNS0xMC0wNCAwMToyODoxNg==', '', 'TElOS18yOC0xOS01NC00MA==', 'aHR0cDovL3d3dy5hbmd1bGFydG9wb2dyYWZpYS5jb20uYnIvZWotYWRtaW4vY29tcG9uZW50cy9pbWcvZTkxZTE3MDM1NTI4NGVmNTY5MjQ3ZGFlMDBlNGE5ODQuanBn'),
(32, 1, 'MjAxNS0wOS0yOCAyMDowOTozOA==', 'MjAxNS0xMC0wNCAxOTozNjowNw==', '', 'TElOS18yOC0yMC0wOS0zOA==', 'aHR0cDovL3d3dy5hbmd1bGFydG9wb2dyYWZpYS5jb20uYnIvZWotYWRtaW4vY29tcG9uZW50cy9pbWcvOWVmZDNiNzk0ODMxYTg0MWQzN2Y5MzI3YWEyN2YzM2UuZ2lm'),
(35, 1, 'MjAxNS0xMC0wMSAyMjo0Mjo0MA==', 'MjAxNS0xMC0wNCAxMjoyNzoxNg==', 'SsOhIGVyYSAvby8=', 'YmFubmVy', 'aHR0cDovL2FuZ3VsYXJ0b3BvZ3JhZmlhLmNvbS5ici9lai1hZG1pbi9jb21wb25lbnRzL2ltZy85NTQ1ZThlZTFjMjYwMjQ4ZGRjY2U1MmNmODdhZWFhNS5qcGc='),
(40, 0, 'MjAxNS0xMC0wNCAwMDowMjoyMA==', 'MjAxNS0xMC0wNCAwMDowMjoyMA==', '', 'ZW1wcmVzYQ==', 'aHR0cDovL3d3dy5hbmd1bGFydG9wb2dyYWZpYS5jb20uYnIvZWotYWRtaW4vY29tcG9uZW50cy9pbWcvYjQ1MmE2YTczNWRhYWQ5NGExNmEzN2MwOWQ5ZDAwYWYucG5n'),
(42, 1, 'MjAxNS0xMC0wNCAwMToyNzoxNA==', 'MjAxNS0xMC0wNCAwMToyNzoxNA==', 'dWh1', 'YmFubmVy', 'aHR0cDovL2FuZ3VsYXJ0b3BvZ3JhZmlhLmNvbS5ici9lai1hZG1pbi9jb21wb25lbnRzL2ltZy9kOWE4YjJlODJkYWUwYWM5ODE4NmM2MDczMzMwMjI2Yi5qcGc=');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=13 ;

--
-- Extraindo dados da tabela `tb_links`
--

INSERT INTO `tb_links` (`LINK_ID`, `LINK_ID_ADM`, `LINK_DATA`, `LINK_LOG`, `LINK_NOME`, `LINK_SOBRE`, `LINK_CHAVE`, `LINK_URL`) VALUES
(5, 2, 'MjAxNS0wOS0yNyAxOTo0NzoyMw==', 'MjAxNS0xMC0wOSAxMToxNzoyNw==', 'RU1CUkFQQQ==', 'PHA+QSBFbXByZXNhIEJyYXNpbGVpcmEgZGUgUGVzcXVpc2EgQWdyb3BlY3UmYWFjdXRlO3JpYSAoRU1CUkFQQSksIHZpbmN1bGFkYSBhbyBNaW5pc3QmZWFjdXRlO3JpbyBkYSBBZ3JpY3VsdHVyYSwgUGVjdWFyaWEgZSBBYmFzdGVjaW1lbnRvIChNQVBBKSwgZm9pIGNyaWFkYSBlbSAxOTczLCBlbSB1bSBtb21lbnRvIGludGVuc28gZGUgY3Jlc2NpbWVudG8gcG9wdWxhY2lvbmFsIGUgZGUgcmVuZGEgcGVyIGNhcGl0YSBubyBQYSZpYWN1dGU7cywgYWwmZWFjdXRlO20gZG8gaW5pY2lvIGRhIGFiZXJ0dXJhIHBhcmEgbyBtZXJjYWRvIGV4dGVybm8uPC9wPg==', 'TElOS18yNy0xOS00Ny0yMw==', 'ZW1icmFwYS5icg=='),
(10, 1, 'MjAxNS0wOS0yOCAxOTo1NDo0MA==', 'MjAxNS0xMC0wNCAwMToyODoxNg==', 'SUJHRQ==', 'PHA+TyBJbnN0aXR1dG8gQnJhc2lsZWlybyBkZSBHZW9ncmFmaWEgZSBFc3RhdCZpYWN1dGU7c3RpY2Egb3UgSUJHRSAmZWFjdXRlOyB1bWEgZnVuZGEmY2NlZGlsOyZhdGlsZGU7byBwJnVhY3V0ZTtibGljYSBkYSBhZG1pbmlzdHJhJmNjZWRpbDsmYXRpbGRlO28gZmVkZXJhbCBicmFzaWxlaXJhLjwvcD48cD4mbmJzcDs8L3A+', 'TElOS18yOC0xOS01NC00MA==', 'aWJnZS5nb3YuYnI='),
(12, 1, 'MjAxNS0wOS0yOCAyMDowOTozOA==', 'MjAxNS0xMC0wNCAxOTozNjowNw==', 'SU5DUkE=', 'PHA+SW1wbGVtZW50YXIgYSBwb2wmaWFjdXRlO3RpY2EgZGUgcmVmb3JtYSBhZ3ImYWFjdXRlO3JpYSBlIHJlYWxpemFyIG8gb3JkZW5hbWVudG8gZnVuZCZpYWN1dGU7YXJpbyBuYWNpb25hbCwgY29udHJpYnVpbmRvIHBhcmEgbyBkZXNlbnZvbHZpbWVudG8gcnVyYWwgc3VzdGVudCZhYWN1dGU7dmVsLjwvcD4=', 'TElOS18yOC0yMC0wOS0zOA==', 'aW5jcmEuZ292LmJy');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_recuperacao`
--

CREATE TABLE IF NOT EXISTS `tb_recuperacao` (
  `REC_ADM` text COLLATE utf8_unicode_ci NOT NULL,
  `REC_CONFIRMACAO` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Extraindo dados da tabela `tb_servicos`
--

INSERT INTO `tb_servicos` (`SER_ID`, `SER_ID_ADM`, `SER_DATA`, `SER_LOG`, `SER_NOME`, `SER_SOBRE`, `SER_CHAVE`) VALUES
(1, 1, 'MjAxNS0wOS0yNyAxMjo0MjoyNw==', 'MjAxNS0xMC0wMyAyMzowMDoyMQ==', 'TG9jYcOnw6NvIGRlIGxpbmhhcywgUGlsYXJlcywgTG90ZXMgZSBldGMu', 'PHA+UHJpbWVpcmEgZm90byBjb20gdGV4dG8gdXBhZGEgZSBlZGl0YWRhPC9wPg==', 'U0VSXzI3LTEyLTQyLTI3'),
(2, 1, 'MjAxNS0wOS0yNyAxMjo0MzowMw==', 'MjAxNS0xMC0wNCAwMTowNTo1Ng==', 'QXNzZXNzb3JpYSB0w6ljbmljYSBlbSBzZXJ2acOnb3MgZGUgYWdyaW1lbnN1cmE=', 'PHA+U2VndW5kYSBmb3RvIHVwYWRhPC9wPg==', 'U0VSXzI3LTEyLTQzLTAy'),
(3, 1, 'MjAxNS0wOS0yNyAxMjo0MzoxOA==', 'MjAxNS0xMC0wNSAxMjo1MTo1Nw==', 'TGV2YW50YW1lbnRvIHRvcG9ncsOhZmljbyBjYWRhc3RyYWlzIGRlIMOhcmVhcyB1cmJhbmFzIGUgcnVyYWlz', 'PHA+VGV4dG9zIGUgbWFpcyB0ZXh0b3MuPC9wPg==', 'U0VSXzI3LTEyLTQzLTE4');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
