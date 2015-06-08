-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 08, 2015 at 04:50 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `gpib`
--

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE IF NOT EXISTS `ci_sessions` (
  `id` varchar(40) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) unsigned NOT NULL DEFAULT '0',
  `data` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_berita`
--

CREATE TABLE IF NOT EXISTS `tbl_berita` (
`id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `desk` text NOT NULL,
  `file` varchar(255) NOT NULL,
  `author` int(11) NOT NULL,
  `update_by` int(11) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `update_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_berita`
--

INSERT INTO `tbl_berita` (`id`, `cat_id`, `title`, `slug`, `desk`, `file`, `author`, `update_by`, `create_at`, `update_at`) VALUES
(1, 1, 'Test1', 'test1', '', 'timestamp', 1, 0, '2015-06-05 23:37:13', '2015-06-06 04:37:13'),
(2, 3, 'pass a legal timestamp', 'pass-a-legal-timestamp', '<p>the database query gets executed fine.... but the time that gets set into the mysql table is&nbsp;0000-00-00 00:00:00&nbsp;whereas the&nbsp;&lt;?php echo time() ?&gt;&nbsp;statement shows&nbsp;1307018223&nbsp;in the browser.... which is a valid UNIX timestamp... you can&nbsp;check the timestamp validity here.</p>\r\n', 'pass a legal timestamp', 1, 0, '2015-06-05 23:40:10', '2015-06-06 04:40:10');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE IF NOT EXISTS `tbl_category` (
`id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `desk` text NOT NULL,
  `parent_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`id`, `title`, `slug`, `desk`, `parent_id`) VALUES
(1, 'Catatan dari Meja Pendeta', 'catatan-dari-meja-pendeta', 'Catatan dari Meja Pendeta', 0),
(3, 'Majelis Sinode GPIB', 'majelis-sinode-gpib', 'Majelis Sinode GPIB', 0),
(4, 'Informasi Sekretariat', 'informasi-sekretariat', 'Informasi Sekretariat', 0),
(5, 'Berita GPIB Immanuel Pekanbaru', 'berita-gpib-immanuel-pekanbaru', 'Berita GPIB Immanuel Pekanbaru', 0),
(6, 'Pemberkatan Pernikahan', 'pemberkatan-pernikahan', 'Pemberkatan Pernikahan', 5),
(7, 'Jemaat Sakit', 'jemaat-sakit', 'Jemaat Sakit', 5),
(8, 'Lowongan Kerja', 'lowongan-kerja', 'Lowongan Kerja', 5),
(9, 'Materi / Download', 'materi-download', 'Materi / Download', 5),
(10, 'Berita Gereja dan Dunia', 'berita-gereja-dan-dunia', 'Berita Gereja dan Dunia', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE IF NOT EXISTS `tbl_users` (
`id` int(11) unsigned NOT NULL,
  `username` varchar(255) NOT NULL DEFAULT '',
  `email` varchar(255) NOT NULL DEFAULT '',
  `password` varchar(255) NOT NULL DEFAULT '',
  `avatar` varchar(255) DEFAULT 'default.jpg',
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `is_admin` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `is_confirmed` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `is_deleted` tinyint(1) unsigned NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`id`, `username`, `email`, `password`, `avatar`, `created_at`, `updated_at`, `is_admin`, `is_confirmed`, `is_deleted`) VALUES
(1, 'samson', 'samson@sinaga.or.id', '$2y$10$Nf4j/5ptH2EYAxvDzr0iNODQbDP3OqRE2hPJ/RucyYCY5LUbIkOJG', 'default.jpg', '2015-06-05 03:29:45', NULL, 1, 1, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ci_sessions`
--
ALTER TABLE `ci_sessions`
 ADD PRIMARY KEY (`id`), ADD KEY `ci_sessions_timestamp` (`timestamp`);

--
-- Indexes for table `tbl_berita`
--
ALTER TABLE `tbl_berita`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_berita`
--
ALTER TABLE `tbl_berita`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
